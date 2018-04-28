var login = {
    init: function(){
        this.bindEvent();
        this.login();
    },
    logindo:function(err, data) {
    	if(err){
            alert(err);

        }else{
            location='/';
        }
    },
    kf:function(){
    	$(".login_ques").on('touchend', function(){
	        var iTop = (window.screen.availHeight-30-570)/2; //获得窗口的垂直位置;
	        var iLeft = (window.screen.availWidth-10-750)/2; //获得窗口的水平位置;
	        var url = 'http://api.pop800.com/chat/331095';
	        var winOption = "height=570,width=750,top="+iTop+",left="+iLeft+",toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,fullscreen=1";
	        var newWin = window.open(url,window, winOption);
	        return false;
    	});
    },
    login: function(){
        $(".login_btn1").on('touchend', function(){
            if($(".login_name").val() ==""){
                $(".login_name").siblings('.error').show();
                return ;
            }else if($(".login_password").val() ==""){
                $(".login_password").siblings('.error').show();
                return ;
            }
            var data	= [],
            $this		= $(this),
            self		= this,            
            call		= login.logindo;
	        
	        $.ajax({
	            url:$this.attr('action'),
	            async:true,
	            data:{username:$(".login_name").val(),password:$(".login_password").val()},
	            type:$this.attr('method')||'get',
	            dataType:'json',
	            headers:{"x-form-call":1},
	            error:function(xhr, textStatus, errThrow){
	            	var errorMessage=xhr.getResponseHeader('X-Error-Message');
	                call.call(self, decodeURIComponent(errorMessage), data);
	            },
	            success:function(data, textStatus, xhr, headers){
	                var errorMessage=xhr.getResponseHeader('X-Error-Message');
	                if(errorMessage){
	                    call.call(self, decodeURIComponent(errorMessage), data);
	                }else{
	                    call.call(self, null, data);
	                }
	            }
	        });
 
           
        })
    }
    
}
login.init();