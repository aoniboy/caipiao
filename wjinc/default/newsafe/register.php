<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>会员注册</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body class="bgf5">
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>会员管理</div>
     <div class="clearfix myp_top dlm_top">
         <?php if($args[0] && $args[1]){
        
		$sql="select * from {$this->prename}links where lid=?";
		$linkData=$this->getRow($sql, $args[1]);
		$sql="select * from {$this->prename}members where uid=?";
		$userData=$this->getRow($sql, $args[0]);
	
		?>

		<form class="dl_form" action="/index.php/user/registered" method="post" onajax="registerBeforSubmit" enter="true" call="registerSubmit" target="ajax">
        	<input type="hidden" name="parentId" value="<?=$args[0]?>" />
            <input type="hidden" name="lid" value="<?=$linkData['lid']?>"  />
          	<dl>
            	<dt>用户名：</dt>
                <dd><input name="username" type="text" id="username" class="login-text" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"/></dd>
            </dl>
            <dl>
            	<dt>密  码：</dt>
                <dd><input name="password" type="password" id="password" class="login-text" /></dd>
            </dl>
             <dl>
            	<dt>确认密码：</dt>
                <dd><input name="cpasswd" type="password" id="cpasswd" class="login-text" /></dd>
            </dl>
             <dl>
            	<dt>微  信：</dt>
                <dd><input name="qq" type="test" id="qq" class="login-text" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></dd>
            </dl>
            <dl>
            	<dt>验证码：</dt>
                <dd style="position:relative;"><input name="vcode" type="text" class="login-text" /><div class="yzmNum"><img width="72" height="24" border="0" id="vcode" style="cursor:pointer;" align="absmiddle" src="/index.php/user/vcode/<?=$this->time?>" title="看不清楚，换一张图片" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"/></div></dd>
            </dl>
             <dl>
            	<dt class="hide"><input type="submit" value=""/></dt>
                <dd><button class="login-btn" tabindex="5" type="button" onclick="$(this).closest('form').submit()">注　册</button></dd>
            </dl>
          </form>
           <?php }else{?>
           <div style="text-align:center; line-height:50px; color:#FF0; font-size:20px; font-weight:bold;">链接失效！</div>
           <?php }?>
        </div>
   
</div>

<script src="/wjinc/default/js/common.js"></script>
<script src="/wjinc/default/js/my.js"></script>
</body>
</html>
