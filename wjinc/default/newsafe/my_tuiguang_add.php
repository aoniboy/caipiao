<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>添加推广链接</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body class="bgf5">
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>添加推广链接</div>
    <div class="myi_title">新增注册链接</div>
    <form class="myi_form">
        <ul class="myi_list dla_list">
            <li class="clearfix rel">
                <div class="fl myw">账号类型：</div>
                <div class="fl ol67">
                    <label><input type="radio" name="type" value="1" title="代理" checked="checked" style="-webkit-appearance: radio "> 代理</label>
                    <label><input name="type" type="radio" value="0" title="会员" style="-webkit-appearance:radio; margin-left: .2rem"> 会员</label>
                </div>
            </li>
            <li class="clearfix">
                <div class="fl myw">返点：</div>
                <input class="col67 fl i4" name="fanDian" max="0.0" value="0" fandiandiff="0.1" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                <span class="">0-0%</span>
            </li>
            <li class="clearfix">
                <div class="fl myw">不定位返点：</div>
                <input class="col67 fl i4" name="fanDianBdw" max="0.0" value="" ōnkeyup="if(isNaN(value))execCommand(''undo'')" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                <span class="fl">0-0%</span>
            </li>
        </ul>
        <div class="myi_btns flex">
            <div class="tc fx myi_btns1" id="dl_tgadd">添加链接</div>
            <input class="tc fx myi_btns2" type="reset" value="重置" />
        </div>
    </form>
    <?php $this->display('newinc_footer.php'); ?>
</div>

<script src="/wjinc/default/js/common.js"></script>
<script src="/wjinc/default/js/my.js"></script>
</body>
</html>
