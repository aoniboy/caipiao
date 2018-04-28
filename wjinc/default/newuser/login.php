<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?=$this->iff($args[0], $args[0] . '－'). $this->settings['webName']?></title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body>
<div class="wrap_box w_height">
    <div class="rel">
        <img src="/wjinc/default/images/login_bg.jpg">
        <img class="login_logo" src="/wjinc/default/images/logo.png">
    </div>
    <div class="login_con">
        <form >
            <div class="login_item rel">
                <i class="iconfont icon-zhucedengluyonghuming"></i>
                <input class="login_name" type="text" name="name" placeholder="请输入账号">
                <p class="error">请输入账号</p>
            </div>
            <div class="login_item rel">
                <i class="iconfont icon-mima"></i>
                <input class="login_password" type="password" name="password" placeholder="请输入登录密码">
                <p class="error">请输入密码</p>
            </div>
        </form>
        <div class="login_btns">
            <a class="login_btn fff mbg login_btn1 tc" href="javascript:;" action="/index.php/user/loginedto" method="post" onajax="userBeforeLoginto" enter="true" call="userLoginto" target="ajax">登录</a>
        </div>
        <div class="tc login_ques kf f24">如有任何疑问请<a href="">联系客服</a></div>
    </div>
</div>

    <script src="/wjinc/default/js/login.js"></script>
    <script src="/wjinc/default/js/common.js"></script>

</body>
</html>
