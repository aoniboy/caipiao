var common = {
    init: function(){
        this.bindEvent();
        this.kf();
        this.checklogin();
    },
    bindEvent: function(){
        $(".w_heiht").height($(window).height());
    },
    kf: function(){
    	$(".kf").on('touchend', function(){
	        var iTop = (window.screen.availHeight-30-570)/2; //获得窗口的垂直位置;
	        var iLeft = (window.screen.availWidth-10-750)/2; //获得窗口的水平位置;
	        var url = $('#kefu').val();
	        var winOption = "height=570,width=750,top="+iTop+",left="+iLeft+",toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,fullscreen=1";
	        var newWin = window.open(url,window, winOption);
	        return false;
    	});
    },
    checklogin: function() {//每5秒检查用户是否在线
    	var timer=null;
        timer=setInterval(function(){
        	//默认期号
            $.post('/index.php/user/checklogin',function(data){
                if(!data.code){
                	if(data.data){
                		window.location.href='/index.php/user/login';
                		return false;
                	}
                    
                }
            },'json' );
            
        },5000);
    },
}
common.init();
