
<?php foreach ($aaa as $query) { ?>
  
      
<table class="plus" style="line-height:25px; border-bottom:0px; font-size: 18px; " width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td width="29%" align="right"><strong>Date :</strong></td>
    <td width="1%" align="right">&nbsp;</td>
    <td width="70%"><?= $query->pay_time ?></td>
  </tr>
  <tr>
    
    <td width="70%" colspan="3"><img src="../upload/payment/<?= $query->pay_image  ?>" width="100%" ></td>
  </tr>

  
</table>

<?php } ?>
        



