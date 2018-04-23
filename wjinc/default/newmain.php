<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>详情</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body>
<style>
.bgf5{ background: #f5f5f5; }
.bgfff{ background: #fff; }
.gameo_num{ padding-bottom: .25rem; border-bottom: 1px solid #ff2525}
.gameo_toptitle{ padding:.25rem .2rem ; }
.gameo_stitle{ padding:.15rem 0; }
.game_stakes{  text-align: right; margin-right: .2rem;}
.game_stakes >i{ font-size: .32rem; width:.55rem; height:.55rem;line-height: .55rem;}
.game_stakes >span{width:.53rem;height:.53rem;line-height: .53rem;border:.01rem solid #c3c3c3;}
.game_stakes >i,.game_stakes >span{display: inline-block;margin-bottom:.2rem;color:#fff;  border-radius: 100px;background: linear-gradient(#e4e4e4, #9a9898); text-align: center; margin-right: 2px;}
.game_stakes >i.active{ background: linear-gradient(#fb7b5c, #fb3b38); }
.game_sposl{ position: absolute;left:0;top:0;border-top-left-radius: .1rem;border-bottom-right-radius: .1rem; color:#fff;background: #c5c5c5; font-size: .22rem; padding:.05rem .1rem;}
.gameo_cont li{ margin:0 .2rem .2rem .2rem;padding:.2rem; border:1px solid #c5c5c5; border-radius: .1rem; background: #fff; }
.game_add{ width:2.45rem; background: #fb3e3a; color:#fff; height: .6rem; border-radius: .1rem; }
.gameo_check{ border:1px solid #999; border-radius: 100px; display: inline-block;width:.26rem ;height: .26rem; margin:2px .2rem 0 .1rem; position: relative;}
.gameo_check.active{border:1px solid #79b5f3;}
.gameo_check.active:after{ content: ''; background: #79b5f3; width:.13rem; height: .13rem; position: absolute;left:50%;top:50%; transform: translate(-50%,-50%); border-radius: 100px; }
.gameo_numc{ display: inline-block; width:.28rem; height:.28rem;color:#999;border: 1px solid #999; text-align: center; line-height: .28rem; margin-right: .1rem; }
.gameo_numi{ line-height: .28rem;height:.28rem; color:#333; background: #fff;border: 1px solid #999; margin-right: .1rem;width:.7rem;  text-align: center; font-size: .26rem; }
.gameo_cz li{ margin:0 0 .2rem .2rem; }
.gameo_clearall{ border-radius: 100px; padding: .1rem .4rem; background: #f4a908; color:#875408; }
.game_ls{ background: #fff; padding:.2rem; border-top:1px solid #bfbfbf; }
.game_ls .fl{ padding:.1rem 0 0 0 ; }
.game_tzlist{ margin: 0 .2rem; }
.game_tzlist table{ min-height: 1rem;width:100%;text-align: center; }
.game_tzlist table tr{ padding:0 .2rem; }
.flex{ display: flex; padding:0 .2rem; }
.fx{ flex:1; } 
.gameo_btns{ margin:.3rem  0 0 .2rem; }
.gameo_btns >div{ width:37%; padding:.1rem 0; border-radius: .1rem; }
.gameo_btns .gameo_btns1{background: #fb3e3a; color:#4c0301;  margin-right: 11%;}
.gameo_btns .gameo_btns2{background: #f5c037; color:#5a3f04;  margin-right: .3rem;}
.gameo_list{ width:100%; text-align: center; margin:.3rem 0 0 0 ; }
.gameo_list thead tr th{ background: #fb3e3a; padding:.1rem 0; color:#fff; border:none; }
/*.gameo_list thead tr,.gameo_list tbody tr{ display: flex; width:100% }
.gameo_list thead th,.gameo_list tbody td{ flex:1; }*/
.gameo_list tbody td{ font-size: .20rem; }
.gameo_titles{ line-height: 1.2; display: inline-block;margin:.1rem 0 0 0; }
.gameo_sel{ padding-right: .35rem; font-size: .20rem; }
.gameo_sel:before{ position: absolute;right: 0;top:-1px; }
.select_pop{ position: fixed;width:100%; height:100%; left:0;top:.8rem; z-index: 99 }
.select_title{ background: #fff; }
.select_title li{ width:33.3333%; float: left; font-size: .22rem;}
.select_title li div { padding:.2rem 0; text-align: center; border-bottom: 1px solid #5d5c5c; border-right:1px solid #5d5c5c; }
.gameo_mask{ position: fixed;left:0;top:0; background: rgba(0,0,0,0.7);width:100%;height: 100%; }
.select_title li:nth-child(3n) div{ border-right:none; }
.hint_pop{  }
.hint_title{color:#000; padding:.3rem 0 .1rem 0;}
.hint_cont{ padding:0 .3rem .3rem .3rem; }
.hint_btn{color:#79b5f3; border-top:1px solid #aeaeae; padding:.2rem 0;}
.hint_con{width:80%; position:fixed;left:50%;top:50%; transform: translate(-50%,-50%); background: #e9e9e9; border-radius: .1rem;}
.tz_con{width:80%; position:fixed;left:50%;top:50%; transform: translate(-50%,-50%); background: #e9e9e9; border-radius: .1rem;}
.tz_table{ padding:.2rem 0; }
.tz_table table{ width:100%; font-size: .2rem; text-align: center; }
.tz_btn{ display: flex }
.tz_btn div{color:#79b5f3; border-top:1px solid #aeaeae; padding:.2rem 0; flex:1; border-right: 1px solid #aeaeae}
.tz_btn div:nth-child(2){border-right:none; color:#333;}
.tz_allnum{ margin:.2rem 0; }
</style>
<div class="title_top tc">
    <a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>
    <span class="iconfont icon-gantanhao iconright"></span>
    <span class="gameo_titles">优游分分彩<br>
        <span class="f20 gameo_sel iconfont icon-sanjiao1 rel">三星直选</span>
    </span>
</div>
<div class="wrap_box wrap_top bgf5">

    <div class="bgfff">
        <p class="gameo_toptitle f24">优游分分彩 第<span class="gameo_qi">20180406-123</span>期 总共<span class="mcol">288期</span></p>
        <div class="lot_num tc gameo_num">
            <span>1</span>
            <span>3</span>
            <span>5</span>
            <span>6</span>
            <span>9</span>
        </div>
    </div>
    <div>
        <p class="tc f24 gameo_stitle">距 20180406-123 期投注截止还有 <span class="mcol gameo_minute">00</span> 分 <span class="mcol gameo_second">30</span> 秒</p>
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
                <tr>
                    <td>110X9R0H</td>
                    <td>重庆彩</td>
                    <td>前三复式</td>
                    <td>20180421-062</td>
                    <td>250</td>
                    <td>未开奖</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="select_pop hide">
        <div class="gameo_mask"></div>
        <ul class="select_title rel clearfix">
            <li id="1"><div class="tover">三星通选-直选复式</div></li>
            <li id="1"><div class='tover'>三星直选-后三</div></li>
            <li id="1"><div class='tover'>三星组三-后三</div></li>
            <li id="1"><div class='tover'>三星通选-直选复式</div></li>
            <li id="1"><div class='tover'>三星通选-直选复式</div></li>
            <li id="1"><div class='tover'>三星直选-后三</div></li>
            <li id="1"><div class='tover'>三星组三-后三</div></li>
            <li id="1"><div class='tover'>三星通选-直选复式</div></li>
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
    <div class="footer">
        <a class="active" href="">
            <div class="iconfont icon-home"></div>
            <p>首页</p>
        </a>
        <a href="">
            <div class="iconfont icon-qian"></div>
            <p>游戏</p>
        </a>
        <a href="">
            <div class="iconfont icon-jiangbei"></div>
            <p>开奖</p>
        </a>
        <a href="">
            <div class="iconfont icon-icon_gerenzhongxin"></div>
            <p>账户</p>
        </a>
    </div>
</div>
<audio class="kaijiang" loop src="/wjinc/default/sound/kaijiang.wav"></audio>
<script src="/wjinc/default/js/game.js"></script>
<script>
var type = '<?=$this->type?>'
</script>
</body>
</html>
