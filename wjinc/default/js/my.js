var my = {
    init: function(){
        this.bindEvent();
        this.passwordEdit();
        this.myInfo();
    },
    bindEvent: function(){

        $(".hint_btn").on('click', function(){
            $(".hint_pop .hint_title").text('错误提示');
            $(".hint_pop").hide();
        })

    },
    myInfo: function(){
        $("#my_info_edit").on('touchend',function(){
            for(var i=0;i<5;i++){
                console.log($(".i"+i));
                if($(".i"+i).val() ==""){
                    $(".hint_pop").show();
                    $(".hint_pop .hint_cont").text('不能为空');
                    return;
                }
            }
            $.post('/index.php/', {data:$(".myi_form").serialize()}, function(data){
                    
            },'json' );
        })
    },
    passwordEdit: function(){
       //登录密码修改
        $("#login_btn").on('touchend', function(){
            if($(".myi_form1 .pas1").val() ==""){
                $(".hint_pop").show();
                $(".hint_pop .hint_cont").text('密码不能为空');
                return;
            }
            if($(".myi_form1 .pas2").val() != $(".myi_form1 .pas3").val() || $(".myi_form1 .pas2").val() ==""){
                $(".hint_pop").show();
                $(".hint_pop .hint_cont").text('新密码不一致');
                return;
            }
            $.post('/index.php/safe/setPasswd', $(".myi_form1").serialize(), function(data){
                    
            },'json' );
        })
        //支付密码修改
        $("#pay_btn").on('touchend', function(){
            if($(".myi_form2 .pas1").val() ==""){
                $(".hint_pop").show();
                $(".hint_pop .hint_cont").text('密码不能为空');
                return;
            }
            if($(".myi_form2 .pas2").val() != $(".myi_form2 .pas3").val() || $(".myi_form2 .pas2").val() ==""){
                $(".hint_pop").show();
                $(".hint_pop .hint_cont").text('新密码不一致');
                return;
            }
            $.post('/index.php/safe/setCoinPwd2', {data:$(".myi_form1").serialize()}, function(data){
                    
            },'json' );
        })
    },
    dlEvent: function(){
        //会员管理
        $("#dl_add").on('touchend', function(){

            
            $.post('', {data:$(".myi_form").serialize()}, function(data){
                    
            },'json' );
        })

    }
}
my.init();