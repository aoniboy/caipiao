<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body>
<div class="wrap_box wrap_top">
    <div class="rel">
        <img src="/wjinc/default/images/index_img.jpg">
    </div>

    <div class="marquee">
        <div class="rel" id="scroll_div">
            <div id="scroll_begin">
                <?php if($this->noticeinfo) foreach($this->noticeinfo as $key=>$var){ 
        
    ?><span><?=$var['title']?></span>
    <?php } ?>
            </div>
            <div id="scroll_end"></div>
            <i class="marquee_icon"></i>
        </div>
    </div> 
    <div>
        <div class="title tc">热门彩票</div>
        <ul class="index_cont clearfix">
            <li>
                <a class="clearfix alink" href="javascript:void(0)" data-href="/index.php/index/game/1/2" data-open="true">
                    <img class="fl" src="/wjinc/default/images/index_logo1.jpg">
                    <p class="fl">重庆时时彩</p>
                </a>
            </li>
            <li>
                <a class="alink" href="javascript:void(0)" data-href="/index.php/index/game/14/59" data-open="true">
                    <img class="fl" src="/wjinc/default/images/index_logo14.jpg">
                    <p class="fl">幸运300秒</p>
                </a>
            </li>
            <li>
                <a class="clearfix alink" href="javascript:void(0)" data-href="/index.php/index/game/12/2" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo12.jpg">
                    <p class="fl">新疆时时彩</p>
                </a>
            </li>
            <li>
                <a class="alink" href="javascript:void(0)" data-href="/index.php/index/game/6/10" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo6.jpg">
                    <p class="fl">广东11选5</p>
                </a>
            </li>
            <li>
                <a class="clearfix alink" href="javascript:void(0)" data-href="/index.php/index/game/7/10" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo7.jpg">
                    <p class="fl">山东11选5</p>
                </a>
            </li>
            <li>
                <a class="alink" href="javascript:void(0)" data-href="/index.php/index/game/16/10" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo16.jpg">
                    <p class="fl">江西多乐彩</p>
                </a>
            </li>
            <li>
                <a class="clearfix alink" href="javascript:void(0)" data-href="/index.php/index/game/25/39" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo25.jpg">
                    <p class="fl">江苏快3</p>
                </a>
            </li>
            <li>
                <a class="alink" href="javascript:void(0)" data-href="/index.php/index/game/52/39" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo52.jpg">
                    <p class="fl">广西快3</p>
                </a>
            </li>
            <li>
                <a class="clearfix alink" href="javascript:void(0)" data-href="/index.php/index/game/50/39" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo50.jpg">
                    <p class="fl">湖北快3</p>
                </a>
            </li>
            <li>
                <a class="alink" href="javascript:void(0)" data-href="/index.php/index/game/9/16" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo9.jpg">
                    <p class="fl">福彩3D</p>
                </a>
            </li>
            <li>
                <a class="clearfix alink" href="javascript:void(0)" data-href="/index.php/index/game/10/16" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo10.jpg">
                    <p class="fl">体彩P3</p>
                </a>
            </li>
            <li>
                <a class="alink" href="javascript:void(0)" data-href="/index.php/index/game/20/26" data-open="false">
                    <img class="fl" src="/wjinc/default/images/index_logo20.jpg">
                    <p class="fl">北京PK10</p>
                </a>
            </li>
            
        </ul>
    </div>
    <div>
        <div class="title tc">最新中奖榜</div>
        <div id="win_list" class="win_list" style="overflow: hidden;">
        <ul class="index_rank clearfix">
        		<?php
                    $this->getSystemSettings();
                    $this->getTypes();
                    $types=array(1,3,5,6,9,10,12,14,15,16,20,7);
                    $name=explode('|',$this->settings['paihangsjnr']);
                    $name2=explode('|',$this->settings['paihangsjje']);
                    $gg=$this->getRows("select * from {$this->prename}bets where zjCount=1  and bonus>8000 and bonus<180000 order by id desc limit 10",$this->settings['sbje']);
                    if($gg) foreach($gg as $var){
                        


                ?>
            <li class="rel clearfix">
                <div class="fl f24"><?php echo $var['nickname']?></div>
                <p class="tc">喜中<?php echo $var['bonus']?></p>
                <div class="fr">购买<?php
                            switch($var['type']){
                                case 1:
                                    echo "重庆时时彩";
                                    break;
                                case 14:
                                    echo "幸运300秒";
                                    break;
                                default:
                                    break;

                            }
                            ?></div>
            </li>
            <?php }?>
        </ul>
        </div>
    </div>
     <?php $this->display('newinc_footer.php'); ?>
</div>

<script src="/wjinc/default/js/index_home.js"></script>
<script src="/wjinc/default/js/common.js"></script>
<script type="text/javascript"> 
function ScrollImgLeft(){ 
    var speed=1; 
    var scroll_begin = document.getElementById("scroll_begin"); 
    var scroll_end = document.getElementById("scroll_end"); 
    var scroll_div = document.getElementById("scroll_div"); 
    scroll_end.innerHTML=scroll_begin.innerHTML; 
    function Marquee(){ 
    if(scroll_end.offsetWidth-scroll_div.scrollLeft<=0) 
        scroll_div.scrollLeft-=scroll_begin.offsetWidth; 
    else 
        scroll_div.scrollLeft++; 
    } 
    var MyMar=setInterval(Marquee,speed); 

} 
ScrollImgLeft();
</script> 
</body>
</html>
