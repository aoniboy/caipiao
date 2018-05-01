<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>提现申请</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <script src="js/jquery.min.js"></script>
</head>
<body class="bgf5">
<style>
</style>
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>个人资料</div>
    <div class="myi_title">登录密码管理</div>
    <form class="myi_form1">
        <ul class="myi_list">
            <li class="clearfix rel">
                <div class="fl myw">原始密码：</div>
                <input  class="col67 fl pas1" type="password" name="oldpassword" value="">
            </li>
            <li class="clearfix">
                <div class="fl myw">新密码：</div>
                <input  class="col67 fl pas2" type="password" name="newpassword">
            </li>
            <li class="clearfix">
                <div class="fl myw">确认密码：</div>
                <input class="col67 fl pas3" type="password" name="" value="">
            </li>
        </ul>
    <div class="myi_btns flex myt_btns ">
        <div class="tc fx myi_btns1 " id="login_btn">修改密码</div>
        <input class="tc fx myi_btns2" type="reset" value="重置" />
    </div>
    </form>
    <div class="myi_title">资金密码管理</div>
    <form class="myi_form2">
        <ul class="myi_list">
            <li class="clearfix rel">
                <div class="fl myw">原始密码：</div>
                <input  class="col67 fl pas1" type="password" name="oldpassword" value="">
            </li>
            <li class="clearfix">
                <div class="fl myw">新密码：</div>
                <input  class="col67 fl pas2" type="password" name="newpassword" value="">
            </li>
            <li class="clearfix">
                <div class="fl myw">确认密码：</div>
                <input class="col67 fl pas3" type="password" name="" value="">
            </li>
        </ul>
    <div class="myi_btns flex myt_btns">
        <div class="tc fx myi_btns1 " id="pay_btn">修改密码</div>
        <input class="tc fx myi_btns2" type="reset" value="重置" />
    </div>
    </form>
    <div class="hint_pop hide">
        <div class="gameo_mask"></div>
        <div class="hint_con">
            <div class="hint_title f32 tc hint_titles">错误提示</div>
            <div class="hint_cont f24"></div>
            <div class="tc hint_btn f32">确定</div>
        </div>
    </div>
</div>

<script src="js/common.js"></script>
<script src="js/my.js"></script>
</body>
</html>
