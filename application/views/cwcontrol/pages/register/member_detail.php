<?php foreach ($aaa as $query) { ?>
  
      
<table class="plus" style="line-height:25px; border-bottom:0px; font-size: 18px; " width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td width="29%" align="right"><strong>First Name :</strong></td>
    <td width="1%" align="right">&nbsp;</td>
    <td width="70%"><?= $query->register_Fname ?></td>
  </tr>

  
  <tr>
    <td align="right"><strong>Last Name :</strong></td>
    <td align="right">&nbsp;</td>
    <td><?= $query->register_Lname ?></td>
  </tr>

  <tr>
    <td align="right"><strong>Email Address  : </strong></td>
    <td align="right">&nbsp;</td>
    <td><?= $query->register_Email ?></td>
  </tr>
  
  <tr>
    <td align="right"><strong>Home Phone :</strong></td>
    <td align="right">&nbsp;</td>
    <td><?= $query->register_Phone ?></td>
  </tr>
  
<tr>
    <td align="right"><strong>Mobile Phone :</strong></td>
    <td align="right">&nbsp;</td>
    <td><?= $query->register_Mobile ?></td>
  </tr>
  
  <tr>
    <td align="right"><strong>Address :</strong></td>
    <td align="right">&nbsp;</td>
    <td><?= $query->register_Add ?></td>
  </tr>
  
  <tr>
    <td align="right"><strong>City/Province :</strong></td>
    <td align="right">&nbsp;</td>
    <td><?= $query->register_City ?></td>
  </tr>

<tr>
    <td align="right"><strong>State :</strong></td>
    <td align="right">&nbsp;</td>
    <td><?= $query->register_State ?></td>
  </tr>
  
<tr>
    <td align="right"><strong>Country :</strong></td>
    <td align="right">&nbsp;</td>
    <td><?= $query->register_Country ?></td>
  </tr>    
  
  
  
  
  <tr>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php } ?>
        
