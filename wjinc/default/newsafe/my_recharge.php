<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>充值</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css<?=$this->sversion?>">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css<?=$this->sversion?>">
    <script src="/wjinc/default/js/jquery.min.js<?=$this->sversion?>"></script>

</head>
<body class="bgf5">
<?php
$set=$this->getSystemSettings(); ?>
<script type="text/javascript">
$(function(){
    $('form').trigger('reset');
    $(':radio').click(function(){
        var data=$(this).data('bank'),
        box=$('#display-dom');
        
        $('#bank-type-icon', box).attr('src', '/'+data.logo);
        //$('#bank-link', box).attr('href', data.home);
        //$('#bank-account', box).val(data.account);
        //$('#bank-username', box).val(data.username);
        //$('.example2', box).attr('rel', data.rechargeDemo);
        
        // if($.cookie('rechargeBank')!=data.id) $.cookie('rechargeBank', data.id, 360*24);
    });
    
    var bankId=$.cookie('rechargeBank')||$(':radio').attr('value');
    $(':radio[value='+bankId+']').click();
    
    $('.copy').click(function(){
        var text=document.getElementById($(this).attr('for')).value;
        if(!CopyToClipboard(text, function(){
            alert('复制成功');
        }));
    });
    
    $('.example2').click(function(){
        var src='/'+$(this).attr('rel');
        if(src) $('<div>').append($('<img>',{src:src,width:'640px',height:'480px'})).dialog({width:630,height:500,title:'充值演示'});
    });
});

function checkRecharge(){
    if(!this.amount.value) throw('请填写充值金额');
    //showPaymentFee();
    //if(isNaN(amount)) throw('充值金额错误');
    //if(!this.amount.value.match(/^\d+(\.\d{0,2})?$/)) throw('充值金额错误');
    showPaymentFee();
    var amount=parseInt(this.amount.value),
    $this=$('input[name=amount]',this),
    min=parseInt($this.attr('min')),
    max=parseInt($this.attr('max'));
    min1=parseInt($this.attr('min1')),
    max1=parseInt($this.attr('max1'));
    
    if($('input[name=mBankId]').val()==2||$('input[name=mBankId]').val()==3||$('input[name=mBankId]').val()==21){
        if(amount<min1) throw('支付宝/微信充值金额最小为'+min1+'元');
        if(amount>max1) throw('支付宝/微信充值金额最多限额为'+max1+'元');
        showPaymentFee();
    }else{
        if(amount<min) throw('充值金额最小为'+min+'元');
        if(amount>max) throw('充值金额最多限额为'+max+'元');
        showPaymentFee();

    }
    if(!this.vcode.value) throw('请输入验证码');
    if(this.vcode.value<4) throw('验证码至少4位');
    showPaymentFee();
}
function toCash(err, data){
    //console.log(err);
    if(err){
        alert(err)
        $("#vcode").trigger("click");
    }else{
        $(':password').val('');
        $('input[name=amount]').val('');
        $('.biao-cont').html(data);
    }
}
$(function(){
    $('input[name=amount]').keypress(function(event){
        //console.log(event);
        event.keyCode=event.keyCode || event.charCode;
        return !!(
            // 数字键
            (event.keyCode>=48 && event.keyCode<=57)
            || event.keyCode==13
            || event.keyCode==8
            || event.keyCode==9
            || event.keyCode==46
        )
    });
});
</script>
<script type="text/javascript">
$(function(){
    $('.example2').click(function(){
        var src='/'+$(this).attr('rel');
        if(src) $('<img>',{src:src}).css({width:'640px',height:'480px'}).dialog({width:660,height:500,title:'充值演示'});
    });

    $('.bankchoice input').click(function(){
        if($(this).attr('bankid')==2 || $(this).attr('bankid')==3 || $(this).attr('bankid')==21)
        {
            $('#rechargemsg').html('(  单笔充值限额   最低： <b style="color:#FF0000"><?=$set['rechargeMin1']?></b>  元，最高：  <b style="color:#FF0000"><?=$set['rechargeMax1']?></b>  元 )');
        }
        else
        {
            $('#rechargemsg').html('(  单笔充值限额   最低： <b style="color:#FF0000"><?=$set['rechargeMin']?></b>  元，最高：  <b style="color:#FF0000"><?=$set['rechargeMax']?></b>  元 )');
        }
    });
    <?php

    $fromTime = strtotime(date('Y-m-d 10:00:00'));
    $toTime = strtotime(date('Y-m-d 17:00:00'));
    $fromTime2 = strtotime(date('Y-m-d 19:00:00'));
    $toTime2 = strtotime(date('Y-m-d 23:59:59'));
    if ((time() > $fromTime && time() < $toTime) || ($fromTime2 < time() && $toTime2 > time())) {}else{
    ?>
    $('.bankchoice input').each(function(){

        if($(this).attr('bankid')==2 || $(this).attr('bankid')==3 || $(this).attr('bankid')==21) {
            $(this).parent().hide();
        }
    });
    <?php
    }

    ?>
    //$('.copy').click(function(){
    //  var text=document.getElementById($(this).attr('for')).value;
    //  if(!CopyToClipboard(text, function(){
    //      alert('复制成功');
    //  }));
    //});
});
</script>
?>
<style>
.myi_list li .col67{ min-width: 3.5rem; }
.myt_list li .myw{ width:1.65rem; }
.yzmNum{position: absolute;right:.2rem; top:0;}
.cz_pos{ position: absolute;right:.1rem;top:0; }
</style>

<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>充值</div>
    <div class="f24 myt_text">1、<b style="display:inline;color:#ff2525;">在线网银充值</b>则为<b style="display:inline;color:#ff2525;">24小时不间断</b>；<br>
              2、<b style="display:inline;color:#ff2525;">微信、支付宝</b>每天的充值处理时间为：<b style="display:inline;color:#ff2525;">10:00-17：00，19：00-24：00</b>，填写充值金额，点击[下一步]后，将有详细的文字说明 ；<br>
              3、充值后，<b style="display:inline;color:#ff2525;">请手动刷新&nbsp&nbsp</b>  你的余额及查看相关账变信息，若超过5分钟未加金额，请与在线客服联系。
    </div>

    <form class="myt_form">
        <input name="CANKIF_BOK" type="hidden" value="<?=$timess?>" />
        <input name="TOLKEASF_ASH" type="hidden" value="<?=$token?>" />
        <ul class="myi_list myt_list myt_list1">
            <li class="clearfix rel">
                <div class="fl myw">充值方式：</div>

                <div class="fl ol67 pay_fs">
                    <?php
                        if($banks) foreach($banks as $bank){
                    ?>
                    <div class="bankchoice">
                        <label><input class="pay_checked" value="<?=$bank['id']?>" type="radio" bankid="<?=$bank['bankId']?>" name="mBankId" data-bank='<?=json_encode($bank)?>' style="width:auto;" /><span style="background:url(/<?=$bank['logo']?>);" ></span></label>
                    </div>
                    <?php } ?>
                </div>
            </li>
            <li class="clearfix rel">
                <div class="fl myw">充值金额：</div>
                <input class="col67 fl n2" type="text col67" style="width:1rem;" name="amount"  value="<?=preg_replace('/^.*(\w{4})$/', '***\1', $bank['account'])?>">
                <span class="f20 cz_pos" style="pointer-events:none" id="rechargemsg">(单笔限额 最低： <b style="color:#ff2525"><?=$set['rechargeMin']?></b>  元，最高：  <b style="color:#ff2525"><?=$set['rechargeMax']?></b>  元)</span>
            </li>
            <li class="clearfix rel">
                <div class="fl myw">验证码：</div>
                <input class="col67 fl n3" type="text"  name="vcode" value="<?=preg_replace('/^(\w).*$/', '\1**', $bank['username'])?>">
                <b class="yzmNum"><img width="80" height="30" border="0" style="cursor:pointer;margin-bottom:0px;" id="vcode" alt="看不清？点击更换" align="absmiddle" src="/index.php/user/vcode/<?=$this->time?>" title="看不清楚，换一张图片" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"/></b>
            </li>
        </ul>
        <input class="myt_btn  tixian_btn tc chongzhi_btn" type="button" value="下一步">
    </form>
        <div class="hint_pop hide">
        <div class="gameo_mask"></div>
        <div class="hint_con">
            <div class="hint_title f32 tc hint_titles">错误提示</div>
            <div class="hint_cont f24"></div>
            <div class="tc hint_btn f32">确定</div>
        </div>
    </div>
    <div class=" hide hint_pop1">
        <div class="gameo_mask"></div>
        <div class="hint_con">
            <div class="hint_title f32 tc hint_titles">系统提示</div>
            <div class="hint_cont f24"></div>
            <div class="tc hint_btn f32">确定</div>
        </div>
    </div>
    <div class=" hide hint_pop2">
        <div class="gameo_mask"></div>
        <div class="hint_con">
            <div class="hint_title f32 tc hint_titles">充值二维码</div>
            <div class="hint_cont f24"></div>
            <div class="tc hint_btn f32">确定</div>
        </div>
    </div>
</div>

<script src="/wjinc/default/js/common.js<?=$this->sversion?>"></script>
<script src="/wjinc/default/js/my.js<?=$this->sversion?>"></script>
<script type="text/javascript">
    $(".chongzhi_btn").click(function(){

        if($('.pay_checked:checked').val()){
            $(".hint_pop").show();
            $(".hint_pop .hint_cont").text('请选择充值方式');
            return
        }
        if($(".n2").val()==""){
            $(".hint_pop").show();
            $(".hint_pop .hint_cont").text('请输入充值金额');
            return
        }
        if($(".n3").val()==""){
            $(".hint_pop").show();
            $(".hint_pop .hint_cont").text('请输入验证码');
            return
        }
        $.post('/index.php/cash/inRecharge',$('.myt_form').serialize(), function(res){
            if(!res.code){
                var url = res.data;
                var html = '<img style="display:block;width:90%;margin:0 auto;" src='+url+'>';
                $(".hint_pop2 .hint_cont").html(html); 
            }else{
                $(".hint_pop1").show();
                $(".hint_pop .hint_cont").text(res.msg);
            }

        })
    })
</script>
</body>
</html>
