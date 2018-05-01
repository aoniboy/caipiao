var game = {
    init: function(){
        this.bindEvent();
    },
    code:[],
    allCont:{
        all_stake:0,
        all_money:0,
        playid:'',
        groupid:'',
        actionNo:'',
        kjTime:'1524574800',
        type:'',
    },
    del_id:1,
    is_false:false,
    all_len:'',
    data:[],
    global:{
    	cid:0,
    	gametimer:null,
        datainfo:{
            num:0,
            bonus:0,
            fun:''
        }
    },
    bindEvent: function(){
        //默认数据
        var cid = $(".playedtype").val();
        game.global.cid = cid;
        game.allCont.type = cid;
        //定时获取开奖信息
        game.qhinfo();
        $.post('/index.php/index/playedType/'+cid, function(res){
            game.data = res.data;
            game.allCont.playid = game.data[0].id;
            var shtml ='';
            for(var i =0;i<res.data.length;i++){
                shtml +='<li data-num="'+game.data[i].selectNum+'" data-bonusProp="'+game.data[i].bonusProp+'" data-bonusPropBase="'+game.data[i].bonusPropBase+'" data-desc="'+game.data[i].simpleInfo+'" data-fun="'+game.data[i].betCountFun+'" id="'+game.data[i].id+'" data-groupid="'+game.data[i].groupId+'"><div class="tover">'+game.data[i].name+'</div></li>';
                if(i ===0) {
                    game.global.datainfo.num = game.data[i].selectNum;
                    game.global.datainfo.fun = game.data[i].betCountFun;
                    game.global.datainfo.bonus = game.data[i].bonusPropBase;
                }
            }
            game.renderHtml(game.allCont.playid)
            $(".select_title").html(shtml)
        },'json' );
        //获取order
        game.getOrder();

        

        //选择游戏
        $(".gameo_titles").on('touchend', function(){
            $(".select_pop").show();
            var html = '';
        })
        $(document).on('touchend', '.select_title li', function(){
            game.allCont.playid = $(this).attr('id');
            game.allCont.groupid = $(this).attr('data-groupid');
            game.global.datainfo.num = $(this).attr('data-num');
            game.global.datainfo.fun = $(this).attr('data-fun');
            game.global.datainfo.bonus = $(this).attr('data-bonuspropbase');
            $(".gameo_sel").text($(this).find('div').text());
            $(".select_pop").hide();
            game.renderHtml(game.allCont.playid);
            return false;
        })
        
        //清单双大小全
        var dan_len,dan_money,dan_stake;
    	$(document).on('click', '.game_stakes > span', function(){
            var id = $(this).data("id");
            var parent = $(this).parent(".game_stakes");
            var len = $(parent).find('i.active').length;
            switch(id){
                case 'clear':
                    $(parent).find('i').removeClass('active');
                    break;
                case 'even':
                    $(parent).find('i').removeClass('active');
                    $(parent).find('i:even').addClass('active');
                    break;
                case 'odd':
                    $(parent).find('i').removeClass('active');
                    $(parent).find('i:odd').addClass('active');
                    break;
                case 'small':
                    $(parent).find('i').removeClass('active');
                    $(parent).find('a').prevAll().addClass('active');
                    break;
                case 'big':
                    $(parent).find('i').removeClass('active');
                    $(parent).find('a').nextAll().addClass('active');
                    break;
                case 'all':
                    $(parent).find('i').addClass('active');
                    break;
            }
            game.currentCount();
    	})
  
        //数字选中 
    	$(document).on('click','.game_stakes > i', function(){
    	    if($(this).hasClass("active")){
                $(this).removeClass("active");
            }else{
                $(this).addClass("active");
            }
            game.currentCount();
        })
        //元
        $(".gameo_check").on('touchend', function(){
            $(".gameo_check").removeClass("active");
            $(this).addClass("active");
            game.currentCount();
        })
        //加减
        $(".gameo_numc").on('touchend', function(){
            var op = $(this).data('op');
            var num = parseInt($(".gameo_numi").val());
            if(op=='add'){
                num = num+1;
            }else if(op=='subtract'){
                num = num-1;
            }
            if(num <=0){
                num =1;
            }
            $(".gameo_numi").val(num);
            game.currentCount();
        })
        //倍数不能小于1
        $(".gameo_numi").on('keyup', function(){
            if($(this).val()==0){
                $(this).val(1)
            }
            game.currentCount();
        })
        //添加
        $(".game_add").on('touchend', function(){
            if(!game.currentCount()){
               return false; 
            }else{
            	var flag=$.parseJSON($.ajax('/index.php/game/checkBuy',{async:false}).responseText);
            	if(flag.data){
                    $(".hint_pop .hint_cont").text('暂停销售');
                    $(".hint_pop").show();
                    return false;
            	}
                var list ={};
                var num = parseInt($(this).attr('data-num'));
                var numarr = [];
                var lens =1;
                var html_num =''
                if(game.all_len.length ==1 && game.all_len[0] =='1'){
                    var input_val =$(".gameo_int").val();
                    for(var i =0;i<$(".gameo_int").val().length;i++){
                    	if(i%2 ==0 && html_num){
                            html_num+="|"+input_val[i];
                        }else{
                            html_num+=","+input_val[i];
                        }
                        numarr = html_num.split("|");
                        lens = numarr.length;
                    }
                    html_num = html_num.substring(1, html_num.length); //去掉最前面逗号
                }else if(game.all_len.length ==1 && game.all_len[0] =='2'){

                    var input_val =$(".gameo_int").val();
                    for(var i =0;i<$(".gameo_int").val().length;i++){
                        if(i%3 ==0 && html_num){
                            html_num+="|"+input_val[i];
                        }else{
                            html_num+=","+input_val[i];
                        }
                        numarr = html_num.split("|");
                        lens = numarr.length;
                    }
                    
                    html_num = html_num.substring(1, html_num.length); //去掉最前面逗号
                }else{
                    for(var i=0;i<$(".game_stakes").length;i++){
                        var len =$(".game_stakes").eq(i).find('i.active').length;
                        lens*=len;
                        numarr[i] = $(".game_stakes").eq(i).find('i.active').text();
                        html_num +=numarr[i]+',';
                        if(len ==0){
                            $(".hint_pop .hint_cont").text('请选3位数字');
                            $(".hint_pop").show();
                            return;
                        }
                    }
                    html_num = html_num.substring(0, html_num.length - 1); //去掉最后一个逗号
                    
                }
               
                var mode =$(".gameo_check.active").data('money');
                var multiple = $(".gameo_multiple").val();
                list.fanDian = 0; //不确定
                list.bonusProp = '1931.00';
                list.mode =2;
                list.beiShu =multiple;
                list.orderId = (new Date()) -2147483647*623; 
                list.actionData = html_num;
                list.actionNum = lens;
                list.weiShu = 0; //不确定；
                list.playedGroup = game.allCont.groupid
                list.playedId = game.allCont.playid; //playedGroup,playedId 合并一个
                list.type = cid;
                list.del_id = game.del_id;
                game.del_id ++;

                list.money = (mode*lens*multiple).toFixed(2);
                $(this).attr('data-num',num+1);
                game.code.push(list);
                $(".game_stakes").find('i').removeClass('active');
                //添加的html


                list.title = $(".gameo_sel").text();
                var html = '';
                html+='        <tr>'
                html+='            <td>'+list.title+'</td>'
                html+='            <td>'+html_num+'</td>'
                html+='            <td>'+list.actionNum+'注</td>'
                html+='            <td>'+list.beiShu+'倍</td>'
                html+='            <td>'+list.money+'元</td>'
                html+='            <td>奖－返：1931.85-0.0%</td>'
                html+='            <td class="iconfont icon-icon-cross-squre gameo_delete" id='+num+' data-del='+list.del_id+' data-money='+list.money+' data-stake='+list.actionNum+'></td>'
                html+='        </tr>'
                $(".game_tzlist table").append(html);
                game.allCont.all_money += parseInt(list.money);
                game.allCont.all_stake += parseInt(list.actionNum);
                $(".all_money").text(game.allCont.all_money.toFixed(2));
                $(".all_stake").text(game.allCont.all_stake)
                $(".gameo_int").val('');
            };
            
        })
        //删除
        $(document).on('click','.gameo_delete', function(){
            var id = parseInt($(this).attr('data-del'));
            $(this).parents('tr').remove();
            var money = $(this).attr('data-money');
            var stake = $(this).attr('data-stake');
            game.allCont.all_money = game.allCont.all_money - parseInt(money);
            game.allCont.all_stake = game.allCont.all_stake - parseInt(stake);
            $(".all_money").text(game.allCont.all_money.toFixed(2));
            $(".all_stake").text(game.allCont.all_stake);
            for(var i=0;i<game.code.length;i++){
                if(game.code[i].del_id ==id){
                    console.log(game.code.splice(i,1));
                }
            }
            console.log(game.code,id);
        })
        //清空号码
        $(".gameo_clearall").on('touchend', function(){
            game.code = [];
            game.allCont.all_stake =0;
            game.allCont.all_money =0;
            $(".game_tzlist table").html('');
            $(".all_money").text(game.allCont.all_money.toFixed(2));
            $(".all_stake").text(game.allCont.all_stake);
            $(".dan_text").text('');
        })
        //确认是否投注
        $(".gameo_btns2").on('touchend',function(){
            if($('#wjdl'))
            {
                    if(parseInt($('#wjdl').val())>0){
                            $(".hint_pop .hint_cont").text('代理不能买单');
                $(".hint_pop").show();
                            return false;
                    }
            }
            if($(".game_tzlist table tr").length>0){
                $(".tz_pop").show();

                //确认是否投注html
                $(".tz_title").text(game.allCont.actionNo);
                var is_html = '';
                var list = game.code;
                for(var i=0;i<list.length;i++){
                    var mode_name = '';
                    if(list[i].mode<1){
                        mode_name = '角';
                    }else{
                        mode_name = '元';
                    }
                    is_html+='        <tr>'
                    is_html+='            <td>'+list[i].title+'</td>'
                    is_html+='            <td>'+list[i].actionData+'</td>'
                    is_html+='            <td>'+list[i].actionNum+'</td>'
                    is_html+='            <td>'+list[i].beiShu+'倍</td>'
                    is_html+='            <td>'+mode_name+'</td>'
                    is_html+='        </tr>'
                }
                $(".tz_table table tbody").html(is_html);
            }else{
                $(".hint_pop .hint_cont").text('您还未添加预投注');
                $(".hint_pop").show();
            }
        })
        $(".hint_btn").on('touchend', function(){
            $(".hint_pop .hint_title").text('错误提示');
            $(".hint_pop").hide();
            return false;
        })
        $(".hint_btn2").on('touchend', function(){
            $(".hint_pop1").hide();
            game.code = [];
            game.allCont.all_stake =0;
            game.allCont.all_money =0;
            $(".game_tzlist table").html('');
            $(".all_money").text(game.allCont.all_money.toFixed(2));
            $(".all_stake").text(game.allCont.all_stake);
            $(".dan_text").text('');
            return false;
        })
        $(".hint_btn3").on('touchend', function(){
            $(".hint_pop1").hide();
            return false;
        })
        //提交
        $(".tz_btn1").on('touchend', function(){
            $(".hint_pop").hide();
            $(".tz_pop").hide();
            $.post('/index.php/game/getNo/'+cid,function(data){
                if(!data.code){
                	//if(game.allCont.actionNo == data.data.actionNo.actionNo) {
	                	game.allCont.actionNo = data.data.actionNo.actionNo;
	                	game.allCont.kjTime = data.data.actionNo.actionTime;
	                	$.post('/index.php/game/postCode', {code:game.code,para:game.allCont}, function(res){
	                        if(!res.code){
	                            game.getOrder();
	                            game.code = [];
	                            game.allCont.all_stake =0;
	                            game.allCont.all_money =0;
	                            $(".game_tzlist table").html('');
	                            $(".all_money").text(game.allCont.all_money.toFixed(2));
	                            $(".all_stake").text(game.allCont.all_stake);
	                            $(".hint_pop .hint_title").text('系统提示');
	                            $(".hint_pop .hint_cont").text(res.msg);
	                            $(".hint_pop").show();
	                        }else{
                                    $(".hint_pop .hint_cont").text(res.msg);
	                            $(".hint_pop").show();
	                    	}
	                    },'json' );
//                	}else{
//                            $(".hint_pop .hint_cont").text("你投注的期数："+game.allCont.actionNo+"已经停止销售!");
//                            $(".hint_pop").show();
//                	}
            	}else{
            	    $(".hint_pop .hint_cont").text(data.msg);
                    $(".hint_pop").show();
            	}
                return false;
           
            },'json' );
        })
        //撤单
        $(document).on('touchend', 'td.prize_col', function(){
            var id = $(this).attr('id');
            $.post('/index.php/game/deleteCode/'+id,function(data){
                if(!data.code){
                    $(".hint_pop .hint_title").text('提示');
                    $(".hint_pop .hint_cont").text('撤单成功');
                    $(".hint_pop").show();
                }else{
                    $(".hint_pop .hint_cont").text(data.msg);
                    $(".hint_pop").show();
                }
            },'json' );
        })
        $(".tz_btn2").on('touchend', function(){
            $(".tz_pop").hide();
        })
        //只能是数字
        $(document).on('keyup', '.gameo_int', function(){
            $(this).val().replace(/[^\d]/g,'');
            game.currentCount();
        })
    },
    renderHtml: function(id){
        var narr =[];
        for(var i =0;i<game.data.length;i++){
            if(game.data[i].id == id){
                game.allCont.groupid = game.data[i].groupId;
                $(".gameo_sel").text(game.data[i].name)
                $(".gameo_tips").text("说明："+game.data[i].simpleInfo)
                
                narr = game.data[i].position;
                game.all_len = game.data[i].position;
                var html =''
                if(game.all_len.length==1 && game.all_len[0]=='1'){
                    html = '<li><input class="gameo_int" placeholder="输入至少1个两位位数号码组成一注" type="tel"></li>';
                }else if(game.all_len.length==1 && game.all_len[0]=='2'){
                    html = '<li><input class="gameo_int" placeholder="输入至少1个三位位数号码组成一注" type="tel"></li>';
                }else{
                    for(var j =0;j<narr.length;j++){
                        if(narr[j]==3 || narr[j]==4){
                            narr[j] = '选择';
                        }
                        html+='    <li class="game_stakes rel" >'
                        html+='        <i>0</i>'
                        html+='        <i>1</i>'
                        html+='        <i>2</i>'
                        html+='        <i>3</i>'
                        html+='        <i>4</i>'
                        html+='        <a class="game_sposl">'+narr[j]+'</a>'
                        html+='        <i>5</i>'
                        html+='        <i>6</i>'
                        html+='        <i>7</i><br>'
                        html+='        <i>8</i>'
                        html+='        <i>9</i>'
                        html+='        <span data-id="clear">清</span>'
                        html+='        <span data-id="even">双</span>'
                        html+='        <span data-id="odd">单</span>'
                        html+='        <span data-id="small">小</span>'
                        html+='        <span data-id="big">大</span>'
                        html+='        <span data-id="all">全</span>'
                        html+='    </li>'
                    }
                }
                $(".gameo_cont").html(html)
            }
        }
    },
    currentCount:function(){
            window.sscqzh3xfs = function  sscqzh3xfs(){
//                var code=[], len=1,codeLen=parseInt(this.attr('length')), delimiter=this.attr('delimiter')||"";
//                if(this.has('.checked').length!=codeLen) throw('请选'+codeLen+'位数字');
//                this.each(function(i){
//                        var $code=$('input.code.checked', this);
//                        if($code.length==0){
//                                code[i]='-';
//                        }else{
//                                len*=$code.length;
//                                code[i]=[];
//                                $code.each(function(){
//                                        code[i].push(this.value);
//                                });
//                                code[i]=code[i].join(delimiter);
//                        }
//                });
//                return {actionData:code.join(','), actionNum:len};
            }
            var lens= 1;
            console.log(game)
            if(game.all_len.length ==1){
                //12 输入  34 选择
                switch(parseInt(game.all_len[0])){
                    case 1:
                        if($(".gameo_int").val().length<2 || $(".gameo_int").val().length%2 !=0){
                            $(".dan_text").text('至少1个两位数号码组成一注');
                            lens =0;
                            return false;
                        }
                        break;
                    case 2:
                        if($(".gameo_int").val().length<3 || $(".gameo_int").val().length%3 !=0){
                            $(".dan_text").text('至少1个三位数号码组成一注');
                            lens =0;
                            return false;
                        }
                        break;
                    case 3:
                    case 4:
                        console.log(game.global)
                        for(var i=0;i<game.global.datainfo.num;i++){
                            var len =$(".game_stakes").eq(i).find('i.active').length;
                            lens*=len;
                            if(len ===0){
                                $(".dan_text").text('请选'+game.global.datainfo.num+'个或'+game.global.datainfo.num+'个以上数字');
                                return false;
                            }
                        }
                        break;
                }
            }else{
                console.log(game.global)
                for(var i=0;i<game.global.datainfo.num;i++){
                    console.log(i)
                    var len =$(".game_stakes").eq(i).find('i.active').length;
                    lens*=len;
                    if(len ===0){
                        $(".dan_text").text('请选'+game.global.datainfo.num+'位数字');
                        return false;
                    }
                } 
            }

            if(lens>0){
                var dan_stake = lens;
                calcFun =  game.global.datainfo.fun;
                var data = {actionNum:0,actionData:''};
                if(calcFun && (calcFun=window[calcFun]) && (typeof calcFun=='function')) {
                   
                    calcFun.call(data);
                   
                }
                console.log(data) 
                
                
                var dan_multiple = $(".gameo_multiple").val();
                var dan_money = $(".gameo_check.active").attr('data-money');
                var dan_allmoney = (dan_money*lens*dan_multiple).toFixed(2);
                $(".dan_text").text('共'+dan_stake+'注，金额'+dan_allmoney+'元');
                return true;
            }
            
    },
    countdown: function(times){ //倒计时
        var timer=null;
        timer=setInterval(function(){
            var day=0,
            hour=0,
            minute=0,
            second=0;//时间默认值
            if(times > 0){
                day = Math.floor(times / (60 * 60 * 24));
                hour = Math.floor(times / (60 * 60)) - (day * 24);
                minute = Math.floor(times / 60) - (day * 24 * 60) - (hour * 60);
                second = Math.floor(times) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
            }
            
            $(".gameo_second").text(game.checkTime(second));
            $(".gameo_minute").text(game.checkTime(minute));
            if(hour>0){
                $(".gameo_hour").text(game.checkTime(hour));
            }
            if(day>0){
                $(".gameo_day").text(game.checkTime(day));
            }
            if(times ==5 ){
                $(".kaijiang")[0].play();
            }
            if(times<=0){
                clearInterval(timer);
                $(".kaijiang")[0].pause();
                $(".hint_pop1 .hint_titles").text('第'+ game.allCont.actionNo+'期投注已截止!');
                $(".hint_pop1 .hint_cont").text('清空预投注内容请点击"确定"，不刷新页面请点击"取消"。');
                $(".hint_pop1").show();
                $(".hint_pop").hide();
                $(".tz_pop").hide();
                game.qhinfo();
            }
            times--;
        },1000);
    },
    checkTime: function(i){ //将0-9的数字前面加上0，例1变为01 
        if(i<10) { 
            i = "0" + i; 
        } 
        return i; 
    },
    kjinfo: function() {
    	var kjtimer=null;
        kjtimer=setInterval(function(){
        	//默认期号
            $.post('/index.php/game/getkjinfo/'+game.global.cid,function(data){
                if(!data.code){
                    if(data.data.kjNo){
                        clearInterval(game.global.gametimer);
                        $(".gameo_num").html(data.data.kjNo);
                        game.is_false = false;
                        clearInterval(kjtimer);
                        game.getOrder();
                    }else{
                    	if(!game.is_false){
                            game.global.gametimer =setInterval(function(){
                                for(var i=0;i<$(".gameo_num span").length;i++){
                                    $(".gameo_num span").eq(i).text(game.randomNum())
                                } 
                            },50)
                            game.is_false = true;

                        }
                    }
                }else{
                    $(".hint_pop .hint_cont").text(data.msg);
                    $(".hint_pop").show();
                }
            },'json' );
            
        },1000);
    },
    qhinfo: function(i) {
    	
    	//默认期号
        $.post('/index.php/game/getqhinfo/'+game.global.cid,function(data){
            if(!data.code){
                $(".gameo_qi").text(data.data.actionNo.actionNo);
                $(".gameo_qiall").text(data.data.num);
                game.allCont.actionNo = data.data.actionNo.actionNo;
                //倒计时
                game.countdown(data.data.actionNo.difftime);
                game.global.gametimer = null;
                if(!data.data.kjNo){
                    
                    if(!game.is_false){
                        game.global.gametimer =setInterval(function(){
                            for(var i=0;i<$(".gameo_num span").length;i++){
                                $(".gameo_num span").eq(i).text(game.randomNum())
                            } 
                        },50)
                        game.kjinfo();
                        game.is_false = true;

                    }
                }else{ 
                	
                    $(".gameo_num").html(data.data.kjNo);
                }
            }else{
                $(".hint_pop .hint_cont").text(data.msg);
                $(".hint_pop").show();
            }
        },'json' );
    },
    getOrder: function(){
    	//默认底部数据
        $.post('/index.php/game/getOrdered/'+game.global.cid,function(data){
            if(!data.code){
                var list = data.data;
                var html = '';
                var text = '';
                var prize_col = '';
                for(var i=0;i<list.length;i++){
                    if(list[i].status ==1){
                        text ='已撤单';
                        prize_col='';
                    }else if(list[i].status ==2){
                        text ='未开奖';
                        prize_col='';
                    }else if(list[i].status ==3){
                        text ='中奖';
                        prize_col='';
                    }else if(list[i].status ==4){
                        text ='未中奖';
                        prize_col='';
                    }else if(list[i].status ==5){
                        text ='撤单';
                        prize_col='prize_col';
                    }                               
                    html+='    <tr>'
                    html+='        <td>'+list[i].wjorderId+'</td>'
                    html+='        <td>'+list[i].gamename+'</td>'
                    html+='        <td>'+list[i].playname+'</td>'
                    html+='        <td>'+list[i].actionNo+'</td>'
                    html+='        <td>'+list[i].money+'</td>'
                    html+='        <td id="'+list[i].id+'" class="'+prize_col+'">'+text+'</td>'
                    html+='    </tr>'
                }
                $(".gameo_list tbody").html(html);
            }else{
                $(".hint_pop .hint_cont").text(data.msg);
                $(".hint_pop").show();
            }
        },'json' );
    },
    randomNum: function(){
        return(Math.floor(Math.random()*9))
    },
   
    //自定义组合函数(就是数学排列组合里的C)  
    C: function(m,n){  
        return game.factorial(m,n)/game.factorial(n,n);//就是Cmn(上面是n，下面是m) = Amn(上面是n，下面是m)/Ann(上下都是n)  
    },  
    //自定义排列函数(就是数学排列组合里的A)  
    A:function (m,n){  
        return game.factorial(m,n);//就是数学里的Amn,上面是n，下面是m  
    }, 
  
  
    //自定义一个阶乘函数，就是有n个数相乘，从m开始，每个数减1，如factorial(5,4)就是5*(5-1)*(5-2)*(5-3),相乘的数有4个  
    factorial: function(m,n){  
        var num = 1;  
        var count = 0;  
        for(var i = m;i > 0;i--){  
            if(count == n){//当循环次数等于指定的相乘个数时，即跳出for循环  
                break;  
            }  
            num = num * i;  
            count++;  
        }  
        return num;  
    }  

}
game.init();
