<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>提现申请</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
     <?php
        $bank=$this->getRow("select m.*,b.logo logo, b.name bankName from {$this->prename}member_bank m, {$this->prename}bank_list b where m.bankId=b.id and b.isDelete=0 and m.uid=? limit 1", $this->user['uid']);
        $this->freshSession(); 
        $date=strtotime('00:00:00');
        $date2=strtotime('00:00:00');
        $time=strtotime(date('Y-m-d', $this->time));
        $cashAmout=0;
            $rechargeAmount=0;
            $rechargeTime=strtotime('00:00');
            if($this->settings['cashMinAmount']){
                $cashMinAmount=$this->settings['cashMinAmount']/100;
                $gRs=$this->getRow("select sum(case when rechargeAmount>0 then rechargeAmount else amount end) as rechargeAmount from {$this->prename}member_recharge where  uid={$this->user['uid']} and state in (1,2,9) and isDelete=0 and rechargeTime>=".$rechargeTime);
                if($gRs){
                    $rechargeAmount=$gRs["rechargeAmount"];
                }
            }
        $cashAmout=$this->getValue("select sum(mode*beiShu*actionNum) from {$this->prename}bets where actionTime>={$rechargeTime} and uid={$this->user['uid']} and isDelete=0");
        $times=$this->getValue("select count(*) from {$this->prename}member_cash where actionTime>=$time and uid=?", $this->user['uid']);
    ?>
</head>
<body class="bgf5">
<style>
.myi_list li .col67{ min-width: 3.5rem; }
</style>

<?php
    $key='9cc1ab94e49d22ff';
    $timess=md5(time());
    $token=md5($key.$timess);
?>
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>提现申请</div>
    <div class="f24 myt_text">每天提现<span class="mcol f32"><?=$this->getValue("select maxToCashCount from {$this->prename}member_level where level=?", $this->user['grade'])?></span>次，今天您已经成功发起了<span class="f34 mlv"><?=$times?></span>次提现申请<br>
        每天的提现时间处理时间为：<br><span class="mcol f32">早上<?=$this->settings['cashFromTime']?>至晚上<?=$this->settings['cashToTime']?></span>
        提现10分钟内到账。（如遇高峰期，可能需要延迟到三十分钟内到账）<br>
        <span class="mlan">银行卡用户每天最小提现<?=$this->settings['cashMin']?>元，最大体现<?=$this->settings['cashMax']?>元。<br>
            财务通/支付宝用户，最小提现100元，最大提现1000000元。
        </span>
    </div>
    <form class="myt_form">
    <input name="CANKIF_BOK" type="hidden" value="<?=$timess?>" />
    <input name="TOLKEASF_ASH" type="hidden" value="<?=$token?>" />
    <ul class="myi_list myt_list">
        <li class="clearfix rel">
            <div class="fl myw">银行类型：</div>
            <img class="fl col67" src="/<?=$bank['logo']?>" title="<?=$bank['bankName']?>" style="    width: auto;margin: .05rem 0;height: .6rem;">
        </li>
        <li class="clearfix">
            <div class="fl myw">银行账号：</div>
            <input class="col67 fl" type="text col67" readonly value="<?=preg_replace('/^.*(\w{4})$/', '***\1', $bank['account'])?>">
        </li>
        <li class="clearfix">
            <div class="fl myw">账户名：</div>
            <input class="col67 fl" type="text" readonly name="address" value="<?=preg_replace('/^(\w).*$/', '\1**', $bank['username'])?>">
        </li>
        <li class="clearfix">
            <div class="fl myw">提款金额：</div>
            <input class="col67 fl" type="tel" name="amount" placeholder="单笔体现限额为:最低100元，最高1000000元"  value="">
        </li>
        <li class="clearfix">
            <div class="fl myw">提现金额(大写)：</div>
            <input class="col67 fl" type="tel" readonly placeholder=""  value="">
        </li>
        <li class="clearfix">
            <div class="fl myw">资金密码：</div>
            <input class="col67 fl" type="password" name="coinpwd" value="">
        </li>
    </ul>
    <input class="myt_btn tc" type="button" value="确认">
    </form>
    
</div>

<script src="/wjinc/default/js/common.js"></script>

</body>
</html>
