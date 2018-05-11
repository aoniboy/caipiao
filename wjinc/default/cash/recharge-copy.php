<?php
$mBankId=$_POST['mBankId'];
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
        <ul class="myi_list myt_list myt_list1">
            <li class="clearfix rel">
                <div class="fl myw">充值方式：</div>
                <img class="col67 fl" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>">
            </li>
            <li class="clearfix rel">
                <div class="fl myw">充值金额：</div>
                <p class="col67 fl"><?=$_POST['amount']?></p>
            </li>
            <li class="clearfix rel" style="">
                <span class="f20">*充值金额必须与网站填写金额一致方能到账！</span>
            </li>
            <li class="clearfix rel">
                <div class="fl myw">充值编号：</div>
                <p class="col67 fl"><?=$_POST['rechargeId']?></p>
            </li>
            <li class="clearfix rel">
               *网银充值请务必将此编号填写到汇款“附言”里，每个充值编号仅用于一笔充值！
            </li>
            <li class="clearfix rel tc" style="background:#eee;">
               <a style="display: block;"> href="/index/help/<?=$memberBank['bankId']==2?2:1?>">支付帮助</a>
            </li>
        </ul>
        <img style="width:80%;display: block;margin:.1rem auto;" src="http://www.g19u.com/<?=$memberBank['qrcode']?>">
<!-- <table width="100%" border="0" cellspacing="1" cellpadding="3" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys">充值方式：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" />
      </td> 
    </tr>

     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$_POST['amount']?>" />
      <div class="btn-a copy" for="recharg-amount">
	 </div>&nbsp;&nbsp;&nbsp;<div class="spn12" style="display:inline;">*充值金额必须与网站填写金额一致方能到账！</div>
      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值编号：</td>
      <td align="left"><input id="username" readonly value="<?=$_POST['rechargeId']?>" />
         <div class="btn-a copy" for="username">
        </div>&nbsp;&nbsp;&nbsp;<div class="spn12"  style="display:inline;">*网银充值请务必将此编号填写到汇款“附言”里，每个充值编号仅用于一笔充值！</div>
	   </td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
        <td align="right" style="font-weight:bold;"></td>
        <td align="left" >
            <a style="width:130px; height:36px; background-color: #58a948;display: block; text-align: center;border-radius: 10px;line-height: 36px;    color: #fff;" href='/index/help/<?=$memberBank['bankId']==2?2:1?>' target="_blank" >支付帮助</a>
        </td>
    </tr>
    <tr>
        <td height="40" colspan="4" align="center">
          <img src="http://www.g19u.com/<?=$memberBank['qrcode']?>"> </td>
    </tr>
   <div class="tips">
	<dl>
        <dt>充值说明：</dt>
        <dd>1.扫二维码支付，需要在<b style="display:inline;color:#FF0000;">备注输入充值帐号信息</b>，<b style="display:inline;color:#FF0000;">如：充值帐号：123456。</b></dd>
        <dd>2.转账后如<b style="display:inline;color:#FF0000;">5分钟</b>未到账，请联系客服，告知您的充值编号和您的充值金额及你的充值账号。</dd>
        <dd>3.充值有效金额：<b style="display:inline;color:#FF0000;"><?=$set['rechargeMin1']?>元-<?=$set['rechargeMax1']?>元</b>。充值金额请输入非整数，以便平台更快速为您进行充值，谢谢！例如：充值<b style="display:inline;color:#FF0000;">2000.01</b>元。</dd>
    </dl>
</div>
</table> -->
