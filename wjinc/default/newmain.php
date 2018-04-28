<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>游戏</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
    <script type="text/javascript" src="/skin/js/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
    <link type="text/css" rel="stylesheet" href="/skin/js/jqueryui/skin/smoothness/jquery-ui-1.8.21.custom.css" />
</head>
<body>
<style>

</style>
<div class="title_top tc">
    <a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>
    <span class="iconfont icon-gantanhao iconright"></span>
    <span class="gameo_titles"><?=$this->finalgameinfo[$this->type]['title']?><br>
        <span class="f20 gameo_sel iconfont icon-sanjiao1 rel">前三复式</span>
    </span>
</div>
<div class="wrap_box wrap_top bgf5">

    <div class="bgfff">
        <p class="gameo_toptitle f24"><?=$this->finalgameinfo[$this->type]['title']?> 第<span class="gameo_qi"></span>期 总共<span class="mcol gameo_qiall"></span>期</p>
        <div class="lot_num tc gameo_num">
            <span>1</span>
            <span>3</span>
            <span>5</span>
            <span>6</span>
            <span>9</span>
        </div>
    </div>
    <div>
        <p class="tc f24 gameo_stitle">距
         <span class="gameo_qi"></span> 期投注截止还有 
         <span class="mcol gameo_minute">00</span> 分 <span class="mcol gameo_second">00</span> 秒</p>
        <ul class="gameo_cont">
            <li class="game_stakes rel" >
                <i>0</i>
                <i>1</i>
                <i>2</i>
                <i>3</i>
                <i>4</i>
                <a class="game_sposl">百位</a>
                <i>5</i>
                <i>6</i>
                <i>7</i><br>
                <i>8</i>
                <i>9</i>
                <span data-id="clear">清</span>
                <span data-id="even">双</span>
                <span data-id="odd">单</span>
                <span data-id="small">小</span>
                <span data-id="big">大</span>
                <span data-id="all">全</span>
            </li>
            
        </ul>

        <ul class="gameo_cz">
            <li class="clearfix">
                <div class="fl">模式：</div>
                <div class="fl">
                    <span class="fl">元<i class="gameo_check active fr" data-money='2.00'></i></span>
                    <span class="fl">角<i class="gameo_check  fr" data-money="0.20"></i></span>
                </div>
            </li>
            <li class="clearfix">
                <div class="fl">倍数：</div>
                <div>
                    <span class="f32 gameo_numc fl" data-op="subtract">-</span>
                    <input class="gameo_numi fl gameo_multiple" type="tel" name="" value="1">
                    <span class="f32 gameo_numc fl" data-op="add">+</span>
                </div>
            </li>
            <li>
                <input class="game_add" type="button" value="添加" data-num='0'>
            </li>
        </ul>
        <div class="clearfix game_ls">
            <div class="fl dan_text"></div>
            <div class="fr gameo_clearall">清空号码</div>
        </div>
        <div class="game_tzlist">
            <table class=" f20">
            </table>
        </div>

        <div class="flex">
            <div class="fx">总投注数：<span class="mcol all_stake">0</span> 注</div>
            <div class="fx">购买金额：<span class="mcol all_money">0.00</span> 元</div>
        </div>
        <div class="clearfix gameo_btns">
            <div class="tc fl gameo_btns1"><i class="iconfont icon-shanchu-fangkuang"></i> 我要追号</div>
            <div class="tc fl gameo_btns2"><i class="iconfont icon-shanchu-fangkuang"></i> 确认投注</div>
        </div>
        <table class="gameo_list">
            <thead>
                <tr>
                    <th>单号</th>
                    <th>彩种</th>
                    <th>玩法</th>
                    <th>期号</th>
                    <th>金额</th>
                    <th>操作</th> 
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="select_pop hide">
        <div class="gameo_mask"></div>
        <ul class="select_title rel clearfix">
            
        </ul>
    </div>
    <div class="hint_pop hide">
        <div class="gameo_mask"></div>
        <div class="hint_con">
            <div class="hint_title f32 tc hint_titles">错误提示</div>
            <div class="hint_cont f24"></div>
            <div class="tc hint_btn f32">确定</div>
        </div>
    </div>
    <div class="hint_pop1 hide">
        <div class="gameo_mask"></div>
        <div class="hint_con">
            <div class="hint_title f32 tc hint_titles">系统提示</div>
            <div class="hint_cont f24"></div>
            <div class="tc hint_btn1 f32">
                <div class="tc hint_btn2">确定</div>
                <div class="tc hint_btn3">取消</div>
            </div>
        </div>
    </div>
    <div class="fandian-k" style="display: none"> <span class="spn8">奖金/返点：</span>
            <div class="fandian-box">
              <input type="button" class="min" value="" step="-0.1"/>
              <div id="slider" class="slider" value="<?=$this->ifs($_COOKIE['fanDian'], 0)?>" data-bet-count="<?=$this->settings['betMaxCount']?>" data-bet-zj-amount="<?=$this->settings['betMaxZjAmount']?>" max="<?=$this->user['fanDian']?>" game-fan-dian="<?=$this->settings['fanDianMax']?>" fan-dian="<?=$this->user['fanDian']?>" game-fan-dian-bdw="<?=$this->settings['fanDianBdwMax']?>" fan-dian-bdw="<?=$this->user['fanDianBdw']?>" min="0" step="0.1" slideCallBack="gameSetFanDian"></div>
              <input type="button" class="max" value="" step="0.1"/>
            </div>
            <span id="fandian-value" class="fdmoney">
            <?=$maxPl?>
            /0%</span>
    </div>
    <?php if($this->settings['switchDLBuy']==0){ //代理不能买单?>
    <input name="wjdl" type="hidden" value="<?=$this->ifs($this->user['type'],1)?>" id="wjdl" />
    <?php } ?>
    <div class="tz_pop hide">
        <div class="gameo_mask"></div>
        <div class="tz_con">
        <div class="hint_title f28 tc">确定要购买第<span class="tz_title"></span>期彩票？</div>
        <div class="tz_table">
            <table class="">
                <thead>
                    <tr>
                        <th>彩种</th>
                        <th>号码</th>
                        <th>注数</th>
                        <th>倍数</th>
                        <th>模式</th> 
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="flex tz_allnum">
            <div class="fx">总投注数：<span class="all_stake mcol"></span>注</div>
            <div class="fx">购买金额：<span class="all_money mcol">50.00</span>元</div>
        </div>
        <div class="tc tz_btn f32">
            <div class="tc tz_btn1">确定</div>
            <div class="tc tz_btn2">取消</div>
        </div>
        </div>
    </div>
	<?php $this->display('newinc_footer.php'); ?>
</div>
<input type="hidden" class="playedtype" value="<?=$this->type?>"/>
<audio class="kaijiang" loop src="/wjinc/default/sound/kaijiang.wav"></audio>
<script src="/wjinc/default/js/game.js"></script>
<script src="/wjinc/default/js/common.js"></script>
<script type="text/javascript">
$( "#slider" ).slider();
</script>
</body>
</html>
