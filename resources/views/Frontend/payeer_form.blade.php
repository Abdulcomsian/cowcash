<form method="post" id="payeer-form" style="display: none" action="https://payeer.com/merchant/"> 
 <input type="hidden" name="m_shop" value="<?=$m_shop?>">
 <input type="hidden" name="m_orderid" value="<?=$m_orderid?>">
 <input type="hidden" id="hiddensumm" name="m_amount" value="<?=$m_amount?>">
 <input type="hidden" name="m_curr" value="<?=$m_curr?>">
 <input type="hidden" name="m_desc" value="<?=$m_desc?>">
 <input type="hidden" name="m_sign" value="<?=$sign?>">
 <button type="submit" name="m_process" >proceed to payment</button>
</form>
<script type="text/javascript">
    window.onload=function(){
            document.getElementById('payeer-form').submit();
    }

</script>