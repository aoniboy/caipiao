<?php
$mBankId=$this->param['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome,mb.qrcode from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where mb.id=$mBankId and b.isDelete=0 and mb.bankId=b.id";

$memberBank=$this->getRow($sql);
$set=$this->getSystemSettings();

?>
         <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>充值信息</div>
    <div class="f24 myt_text">
              充值说明：<br>
        1.扫二维码支付，需要在<b style="display:inline;color:#ff2525;">备注输入充值帐号信息</b>，<b style="display:inline;color:#ff2525;">如：充值帐号：123456。</b><br>
        2.转账后如<b style="display:inline;color:#ff2525;">5分钟</b>未到账，请联系客服，告知您的充值编号和您的充值金额及你的充值账号。<br>
        3.充值有效金额：<b style="display:inline;color:#ff2525;"><?=$set['rechargeMin1']?>元-<?=$set['rechargeMax1']?>元</b>。充值金额请输入非整数，以便平台更快速为您进行充值，谢谢！例如：充值<b style="display:inline;color:#ff2525;">2000.01</b>元。
    </div>
        <ul class="myi_list myt_list myt_list1" style="padding-bottom: 0;">
            <li class="clearfix rel">
                <div class="fl myw">充值方式：</div>
                <img class="col67 fl" style="min-width: auto;width: auto;" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>">
            </li>
            <li class="clearfix rel">
                <div class="fl myw">充值金额：</div>
                <p class="col67 fl"><?=$_POST['amount']?></p>
            </li>
            <li class="clearfix rel f22" style="padding:.1rem 0 .2rem .2rem; color:#666; line-height: 1.4;height: auto;">
                *充值金额必须与网站填写金额一致方能到账！
            </li>
            <li class="clearfix rel">
                <div class="fl myw">充值编号：</div>
                <p class="col67 fl"><?=$this->param['rechargeId']?></p>
            </li>
            <li class="clearfix rel f22" style="padding:.1rem 0 .2rem .2rem; color:#666; line-height: 1.4;height: auto;">
               *网银充值请务必将此编号填写到汇款“附言”里，每个充值编号仅用于一笔充值！
            </li>
            
        </ul>
        <img style="width:80%;display: block;margin:.1rem auto; padding-bottom: .3rem" src="<?=$memberBank['qrcode']?>">

