<?php
$mBankId=$GET['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome,mb.qrcode from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where mb.id=$mBankId and b.isDelete=0 and mb.bankId=b.id";
print_r($mBankId);exit;
$memberBank=$this->getRow($sql);

$set=$this->getSystemSettings();
if($memberBank['bankId']==12){
?>
<!--左边栏body-->
<style type="text/css">
<!--
.banklogo input{
height:15px; width:15px
}
.banklogo{}
-->
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" height="80" class="copyss">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copyss">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" />
     </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copyss"> 充值编号 ：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" />
        </td> 
    </tr>
	<tr height=25 class='table_b_tr_h'>
    <td colspan="2" align="right" class="copyss">


	 <form  action="http://pay.jshya.top/bank_pay.php" method="post" name="a" target="_blank" >



         <input name="order_no" type="hidden" value="<?=$args[0]['rechargeId']?>" />
    <input name="amount" type="hidden" value="<?=$args[0]['amount']?>" />
    <input name="username" type="hidden" value="<?=$this->user['username']?>" />

<table   border="0" cellspacing="1" cellpadding="4" class='table_b' width="100%">
    <tr height=25 class='table_b_tr_b' style="display: none;">
      <td align="right" style="font-weight:bold;">充值银行：</td>
      <td align="left">
	  <SCRIPT language=Javascript type=text/javascript>
	    function SelectBank(n) {
           document.getElementById("bank" + n).checked = true;
	    }
	  </SCRIPT>
	  <table  border="0" width="100%" align="left" cellpadding="0" cellspacing="0"   >
          <tr>
              <td width="5"></td>
              <td width="30" ><input type="radio"   style="width:15px;" name="bank_code" id="bank0" value="qq"  checked="checked"/></td>
              <td width="1" colspan="3" ><div align="left"><a href="javascript:SelectBank(0);"><img src="/mpay/imagesc/bankqq.png"  alt="QQ扫码支付" /></a></div></td>
          </tr>
          <tr>
          <td width="5"></td>
          <td width="30" ><input type="radio"   style="width:15px;" name="bank_code" id="bank1" value="ICBC" /></td>
          <td width="1" ><div align="left"><a href="javascript:SelectBank(1);"><img src="/mpay/imagesc/bankicbc.gif"  alt="中国工商银行" /></a></div></td>
          <td width="30"><input type="radio" style="width:15px;" name="bank_code"  id="bank14" value="PAB"></td>
          <td><div align="left"><a href="javascript:SelectBank(14);"><img src="/mpay/imagesc/bandpingan.gif"  alt="中国平安银行" /></a></div></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="radio" style="width:15px;" name="bank_code"  id="bank2" value="CMB"></td>
          <td width="1"><div align="left"><a href="javascript:SelectBank(2);"><img src="/mpay/imagesc/bankcmb.gif"  alt="中国招商银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="bank_code"  id="bank3" value="CMBC"></td>
          <td><div align="left"><a href="javascript:SelectBank(3);"><img src="/mpay/imagesc/minsheng.gif"  alt="民生银行" width="154" height="33" /></a></div></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="radio" style="width:15px;" name="bank_code" id="bank4" value="ABC"></td>
          <td width="1"><div align="left"><a href="javascript:SelectBank(4);"><img src="/mpay/imagesc/bankabc.gif"  alt="中国农业银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="bank_code"  id="bank5" value="HXB"></td>
          <td><div align="left"><a href="javascript:SelectBank(5);"><img src="/mpay/imagesc/bankhx.gif" id="bank1" alt="中国华夏银行" /></a></div></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="radio" style="width:15px;" name="bank_code" id="bank6" value="CCB"></td>
          <td width="1"><div align="left"><a href="javascript:SelectBank(6);"><img src="/mpay/imagesc/bankccb.gif"  alt="中国建设银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="bank_code"   id="bank7" value="BOC"></td>
          <td><div align="left"><a href="javascript:SelectBank(7);"><img src="/mpay/imagesc/zhongguo.gif"  id="bank1" alt="中国东亚银行" width="154" height="33" /></a></div></td>
        </tr>
  
        <tr>
          <td></td>
          <td><input type="radio" style="width:15px;" name="bank_code"  id="bank8" value="COMM"></td>
          <td width="1"><div align="left"><a href="javascript:SelectBank(8);"><img src="/mpay/imagesc/bankbcc.gif"  alt="中国交通银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="bank_code" id="bank9" value="CEB"></td>
          <td><div align="left"><a href="javascript:SelectBank(9);"><img src="/mpay/imagesc/guangda.gif"  alt="中国光大银行" width="154" height="33" /></a></div></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="radio" style="width:15px;" name="bank_code" id="bank10" value="CIB"></td>
          <td width="1"><div align="left"><a href="javascript:SelectBank(1);"><img src="/mpay/imagesc/bankcib.gif"  alt="中国兴业银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="bank_code"  id="bank15" value="SPDB"></td>
          <td><div align="left"><a href="javascript:SelectBank(15);"><img src="/mpay/imagesc/bankshpd.gif"  alt="中国上海浦东发展银行" /></a></div></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="radio" style="width:15px;" name="bank_code" id="bank11" value="GDB"></td>
          <td width="1"><div align="left"><a href="javascript:SelectBank(11);"><img src="/mpay/imagesc/bankgdb.gif"  alt="广东发展银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="bank_code" id="bank12" value="PSBC"></td>
          <td><div align="left"><a href="javascript:SelectBank(12);"><img src="/mpay/imagesc/bankpost.gif"  alt="中国邮政银行" /></a></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="left"><input type="radio" style="width:15px;" name="bank_code" id="bank13" value="CNCB" /></div></td>
          <td width="1"><a href="javascript:SelectBank(13);"><img src="/mpay/imagesc/bankzx.gif"  alt="中国中信银行" /></a> </td>
        </tr>
      </table>
	  </td>
    </tr>
    <tr height=25 class='table_b_tr_b'>
        <input type="hidden" name="product_code"    value="7516" >
        <input type="hidden" name="order_time" value="<?php echo time()?>">
      <td align="right" style="font-weight:bold;width:40%"><input name="submit2" type='submit' style="width:130px; height:36px;" value="确认支付" /></td>
      <td align="left" >
          <a style="width:130px; height:36px; background-color: #58a948;display: block; text-align: center;border-radius: 10px;line-height: 36px;    color: #fff;" href='/index/help' target="_blank" >支付帮助</a>
      </td>
    </tr>
    </table>
</form>
</td>
</tr>
</table>

    <!--左边栏body结束-->
<? }else if($memberBank['bankId']==2 || $memberBank['bankId']==3 || $memberBank['bankId']==21){  //支付宝 ?>

<table width="100%" border="0" cellspacing="1" cellpadding="3" class='table_b'>
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
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" />
      <div class="btn-a copy" for="recharg-amount">
	 </div>&nbsp;&nbsp;&nbsp;<div class="spn12" style="display:inline;">*充值金额必须与网站填写金额一致方能到账！</div>
      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值编号：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" />
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
</table>
<?php }else{  //其它收款方式 ?>
<!--左边栏body-->
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" />
            <a id="bank-link" target="_blank" href="<?=$memberBank['bankHome']?>" class="spn11" style="margin-left:50px;">进入银行网站>></a>
      </td> 
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">收款户名：</td>
      <td align="left" ><input id="bank-username" readonly value="<?=$memberBank["username"]?>" style="width:200px"/>
	  <div class="btn-a copy" for="bank-username">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-bankuser" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" width="62" height="23" name="copy-bankuser" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object> 
	  </div></td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys" >收款账号：</td>
      <td align="left" ><input id="bank-account" readonly value="<?=$memberBank["account"]?>"  style="width:200px"/>
	  <div class="btn-a copy" for="bank-account">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-account" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" width="62" height="23" name="copy-account" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object>
		</div>
	  </td> 
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" />
      <div class="btn-a copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="23" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </div>&nbsp;&nbsp;&nbsp;<div class="spn12" style="display:inline;">*网银充值金额必须与网站填写金额一致方能到账！</div>
      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值编号：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" />
         <div class="btn-a copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="23" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
        </div>&nbsp;&nbsp;&nbsp;<div class="spn12"  style="display:inline;">*网银充值请务必将此编号填写到汇款“附言”里，每个充值编号仅用于一笔充值！</div>
	   </td> 
    </tr>
<!--左边栏body结束-->
<?php if($memberBank["rechargeDemo"]){?>
   <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left" > <div class="example">充值图示：<div class="example2" rel="<?=$memberBank["rechargeDemo"]?>">查看</div></div></td> 
  </tr>
<?php }?>
<tr>
<div class="tips">
	<dl>
        <dt>充值说明：</dt>
        <dd>1.每次"充值编号"均不相同,务必将"充值编号"正确复制填写到引号汇款页面的"附言"栏目中;</dd>
        <dd>2.帐号不固定，转帐前请仔细核对该帐号;</dd>
        <dd>3.充值金额与网友转账金额不符，充值将无法到账;</dd>
        <dd>4.转账后如10分钟未到账，请联系客服，告知您的充值编号和您的充值金额及你的银行用户姓名。</dd>
    </dl>
</div>
</tr>
</table> 
<?php }?>