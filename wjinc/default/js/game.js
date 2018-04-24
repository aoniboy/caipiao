var game = {
    init: function(){
        this.bindEvent();
    },
    formData:[],
    allCont:{
        all_stake:0,
        all_money:0,
        id:'',
        current_date:''
    },
    is_textarea:false,
    all_len:'',
    data:[],
    bindEvent: function(){
        //默认数据
        var cid = $(".playedtype").val()
        $.post('/index.php/index/playedType/'+cid, function(res){
            game.data = res.data;
            console.log(res.data,222);
            var id = 11;
            game.allCont.id = id;
            var shtml ='';
            var narr =[]
            for(var i =0;i<res.data.length;i++){
                shtml +='<li id="'+game.data[i].id+'"><div class="tover">'+game.data[i].name+'</div></li>';
                if(game.data[i].id == id){
                	 $(".gameo_sel").text(game.data[i].name)
	                narr = game.data[i].position;
	                game.all_len = narr;
	                var html =''
	                if(game.all_len.length==1 && game.all_len[0]=='1'){
                        html = '<li><input class="gameo_int" placeholder="输入至少1个两位位数号码组成一注" type="tel"></li>';
	                }else if(game.all_len.length==1 && game.all_len[0]=='2'){
                        html = '<li><input class="gameo_int" placeholder="输入至少1个三位位数号码组成一注" type="tel"></li>';
                    }else if(game.all_len.length>=2){
	                    for(var j =0;j<narr.length;j++){
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
	                gameball()
	                gameballother()
                }
            }
            $(".select_title").html(shtml)
        },'json' );
        //随机数字
        setInterval(function(){
            for(var i=0;i<$(".gameo_num span").length;i++){
                $(".gameo_num span").eq(i).text(game.randomNum())
            } 
        },50)
        //选择游戏
        $(".gameo_titles").on('touchend', function(){
            $(".select_pop").show();
            var html = '';
        })
        $(document).on('touchend', '.select_title li', function(){
            game.allCont.id = $(this).attr('id');
            $(".gameo_sel").text($(this).find('div').text());
            $(".select_pop").hide();
        })
        //清单双大小全
        var dan_len,dan_money,dan_stake;
        var gameballother = function(){
        	$(".game_stakes > span").on('touchend', function(){
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
        }
        //数字选中 
        var gameball = function() {
        	$(".game_stakes > i").on('touchend', function(){
        		if($(this).hasClass("active")){
                    $(this).removeClass("active");
                }else{
                    $(this).addClass("active");
                }
                game.currentCount();
            })
        	
        }
            
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
        // console.log($(".game_stakes").length)
        $(".game_add").on('touchend', function(){
            if(!game.currentCount()){
               return false; 
            }else{
            var list ={};
            var num = parseInt($(this).attr('data-num'));
            var numarr = [];
            var lens =1;
            var html_num =''
            if(game.all_len.length ==1 && game.all_len[0] =='1'){
                for(var i =0;i<$(".gameo_int").val().length;i++){
                    if(i%2 ==0 && html_num){
                        html_num+=","+val[i];
                    }else{
                        html_num+=val[i];
                    }
                    numarr = html_num.split(",");
                }
            }else if(game.all_len.length ==1 && game.all_len[0] =='1'){
                for(var i =0;i<$(".gameo_int").val().length;i++){
                    if(i%3 ==0 && html_num){
                        html_num+=","+val[i];
                    }else{
                        html_num+=val[i];
                    }
                    numarr = html_num.split(",");
                }
            }else{
                for(var i=0;i<$(".game_stakes").length;i++){
                    var len =$(".game_stakes").eq(i).find('i.active').length;
                    lens*=len;
                    numarr[i] = $(".game_stakes").eq(i).find('i.active').text();
                    html_num +=numarr[i]+',';
                    console.log(lens,999999999);
                    if(len ==0){
                        $(".hint_pop .hint_cont").text('请选3位数字111');
                        $(".hint_pop").show();
                        return;
                    }
                }
            }
            var mode =$(".gameo_check.active").data('money');
            var multiple = $(".gameo_multiple").val();
            list.numarr = numarr;
            list.mode =mode
            list.multiple =multiple
            list.stake = lens;
            console.log(list.stake,22)
            list.money = (mode*lens*multiple).toFixed(2);
            $(this).attr('data-num',num+1);
            game.formData.push(list);
            $(".game_stakes").find('i').removeClass('active');
            //添加的html

            var mode_name = '';
            if(mode<1){
                mode_name = '角';
            }else{
                mode_name = '元';
            }
            list.title = $(".gameo_sel").text();
            var html = '';
            html+='        <tr>'
            html+='            <td>'+list.title+'</td>'
            html+='            <td>'+html_num+'</td>'
            html+='            <td>'+list.stake+'注</td>'
            html+='            <td>'+list.multiple+'倍</td>'
            html+='            <td>'+list.money+'元</td>'
            html+='            <td>奖－返：1931.85-0.0%</td>'
            html+='            <td class="iconfont icon-icon-cross-squre gameo_delete" id='+num+' data-money='+list.money+' data-stake='+list.stake+'></td>'
            html+='        </tr>'
            $(".game_tzlist table").append(html);
            $(".dan_text").text('共'+list.stake+'注，金额'+list.money+'元');
            $(".dan_stake").text(list.stake);
            game.allCont.all_money += parseInt(list.money);
            game.allCont.all_stake += parseInt(list.stake);
            game.allCont.current_date = $(".gameo_qi").text();
            $(".all_money").text(game.allCont.all_money.toFixed(2));
            $(".all_stake").text(game.allCont.all_stake)
            //确认是否投注html
            $(".tz_title").text(game.allCont.current_date)
            var is_html = '';
            is_html+='        <tr>'
            is_html+='            <td>'+list.title+'</td>'
            is_html+='            <td>'+html_num+'</td>'
            is_html+='            <td>'+list.stake+'</td>'
            is_html+='            <td>'+list.multiple+'倍</td>'
            is_html+='            <td>'+mode_name+'</td>'
            is_html+='        </tr>'
            $(".tz_table table tbody").append(is_html);
            };
            
        })
        //删除
        $(document).on('click','.gameo_delete', function(){
            var id = parseInt($(this).attr('id'));
            $(this).parents('tr').remove();
            var money = $(this).attr('data-money');
            var stake = $(this).attr('data-stake');
            game.allCont.all_money = game.allCont.all_money - parseInt(money);
            game.allCont.all_stake = game.allCont.all_stake - parseInt(stake);
            $(".all_money").text(game.allCont.all_money.toFixed(2));
            $(".all_stake").text(game.allCont.all_stake)
        })
        //清空号码
        $(".gameo_clearall").on('touchend', function(){
            game.formData = [];
            game.allCont.all_stake =0;
            game.allCont.all_money =0;
            $(".game_tzlist table").html('');
            $(".all_money").text(game.allCont.all_money.toFixed(2));
            $(".all_stake").text(game.allCont.all_stake);
            // $(".dan_text").text('');

        })
        //确认是否投注
        $(".gameo_btns2").on('touchend',function(){
            if($(".game_tzlist table tr").length>0){
                $(".tz_pop").show();
            }else{
                $(".hint_pop .hint_cont").text('您还未添加预投注');
                $(".hint_pop").show();
            }
        })
        $(".hint_btn").on('touchend', function(){
            $(".hint_pop").hide();
        })
        //提交
        $(".tz_btn1").on('touchend', function(){
            $(".hint_pop").hide();
            console.log(game.formData)
            $.post('/index.php/game/postCode', {page:''}, function(data){
                console.log(game.formData)
            },'json' );
        })
        $(".tz_btn2").on('touchend', function(){
            console.log(11)
            $(".tz_pop").hide();
        })
        //只能是数字
        $(document).on('keyup', '.gameo_int', function(){
            $(this).val().replace(/[^\d]/g,'');
            game.currentCount();
        })

        //倒计时
        game.randomNum();
        game.countdown('2','5');
    },
    currentCount:function(){
            var lens= 1;
            if(game.all_len.length ==1){
                //12 输入  34 选择
                console.log(game.all_len[0]);
                switch(game.all_len[0]){
                    case 1:
                        if($(".gameo_int").val().length<2 || $(".gameo_int").val().length%2 !=0){
                            $(".dan_text").text('至少1个两位数号码组成一注');
                            console.log(111)
                            lens =0;
                            return false;
                        }
                        break;
                    case 2:
                        if($(".gameo_int").val().length<3 || $(".gameo_int").val().length%3 !=0){
                            $(".dan_text").text('至少1个三位数号码组成一注');
                            console.log(111)
                            lens =0;
                            return false;
                        }
                        break;
                    case 3:
                        for(var i=0;i<$(".game_stakes").length;i++){
                            var len =$(".game_stakes").eq(i).find('i.active').length;
                            console.log(111)
                            lens*=len;
                            if(len <2){
                                $(".dan_text").text('请选2个或2个以上数字');
                                return false;
                            }
                        }
                        break;
                    case '4':
                        for(var i=0;i<$(".game_stakes").length;i++){
                            var len =$(".game_stakes").eq(i).find('i.active').length;
                            console.log(111)
                            lens*=len;
                            if(len <3){
                                $(".dan_text").text('请选3个或3个以上数字');
                                return false;
                            }
                        }
                        break;
                }
                // if(game.all_len[0] == 1){
                //     if($(".gameo_int").length()<2 || $(".gameo_int").length()%2 !=0){
                //         $(".dan_text").text('至少输入1个两位数号码组成一注');
                //     }
                // }else if(game.all_len[0] == 2){
                //     if($(".gameo_int").length()<3 || $(".gameo_int").length()%3 !=0){
                //         $(".dan_text").text('至少输入1个三位数号码组成一注');
                //     }
                // }else if(game.all_len[0] == 3){
                //     for(var i=0;i<$(".game_stakes").length;i++){
                //         var len =$(".game_stakes").eq(i).find('i.active').length;
                //         lens*=len;
                //         if(len >=2){
                //             $(".dan_text").text('请选2个或2个以上数字');
                //         }
                //     }
                // }else if(game.all_len[0] == 4){
                //     for(var i=0;i<$(".game_stakes").length;i++){
                //         var len =$(".game_stakes").eq(i).find('i.active').length;
                //         lens*=len;
                //         if(len >=3){
                //             $(".dan_text").text('请选3个或3个以上数字');
                //         }
                //     }
                // }
            }else{
                // console.log(111);
                for(var i=0;i<$(".game_stakes").length;i++){
                    var len =$(".game_stakes").eq(i).find('i.active').length;
                    lens*=len;
                    if(len ==0){
                        $(".dan_text").text('请选3位数字');
                        return false;
                    }
                } 
            }

            if(lens>0){
                var dan_stake = lens;
                var dan_multiple = $(".gameo_multiple").val();
                var dan_money = $(".gameo_check.active").attr('data-money');
                var dan_allmoney = (dan_money*lens*dan_multiple).toFixed(2);
                console.log(dan_money*lens*dan_multiple)
                $(".dan_text").text('共'+dan_stake+'注，金额'+dan_allmoney+'元');
                return true;
            }
    },
    countdown: function(m,s){ //倒计时
        var minute = parseInt(m);
        var second = parseInt(s);
        var timer = setInterval(function(){
            second = second -1;
            $(".gameo_second").text(game.checkTime(second));
            $(".gameo_minute").text(game.checkTime(minute));
            if(second =='00' && minute>0){
                second = 5;
                minute = minute -1;
            }else if(second =='3' && minute=='0'){
                $(".kaijiang")[0].play();
            }else if(second =='0' && minute=='0'){
                clearInterval(timer);
                $(".kaijiang")[0].pause();
                $(".hint_pop .hint_titles").text('第'+ game.allCont.current_date+'期投注已截止!');
                $(".hint_pop .hint_cont").text('清空预投注内容请点击"确定"，不刷新页面请点击"取消"。');
                $(".hint_pop").show();
            }
        },1000)
    },
    checkTime: function(i){ //将0-9的数字前面加上0，例1变为01 
        if(i<10) { 
            i = "0" + i; 
        } 
        return i; 
    },
    randomNum: function(){
        return(Math.floor(Math.random()*9))
        // return(Math.floor(Math.random()*10)

    }

}
game.init();