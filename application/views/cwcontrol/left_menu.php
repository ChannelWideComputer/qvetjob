<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">

      <!-- keeree menufix -->
      <?php 
      $tb = $this->db->where('manage_status',1)->order_by('manage_sort','ASC')->get('tb_manage')->result_array();
      foreach ($tb as $tb) { ?>
      <?php if ($tb['manage_page']=="") { ?>

      <li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
         <li><a href="<?php echo base_url('cwcontrol/job');?>">Job</a></li>
         <li><a href="<?php echo base_url('cwcontrol/careers');?>">Resume</a></li>
       </ul>  
     </li>

     <?php // }else{ ?>

     <?php }elseif ($tb['manage_page']=="") { ?>

     <li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
      <ul class="nav nav-second-level">
       <li><a href="<?php echo base_url('cwcontrol/news');?>">ข่าวสาร</a></li>
       <li><a href="<?php echo base_url('cwcontrol/knowledge');?>">แหล่งความรู้</a></li>
     </ul> 
   </li>

   <?php //}else{ ?>

   <?php }elseif ($tb['manage_page']=="slide") { ?>

     <li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
      <ul class="nav nav-second-level">
       <li><a href="<?php echo base_url('cwcontrol/slide');?>">ภาพสไลด์หลัก</a></li>
       <li><a href="<?php echo base_url('cwcontrol/slidesub');?>">ภาพสไลด์รอง</a></li>
     </ul> 
   </li>

   <?php //}else{ ?>


     <?php }elseif ($tb['manage_page']=="order") { ?>

     <li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
      <ul class="nav nav-second-level">
       <li><a href="<?php echo base_url('cwcontrol/bank');?>">Bank account</a></li>
       <li><a href="<?php echo base_url('cwcontrol/order'."?status=pending");?>">Pending Payment</a></li>
       <li><a href="<?php echo base_url('cwcontrol/order'."?status=confirm");?>">Success</a></li>
     </ul> 
   </li>

   <?php //}else{ ?>

   <?php }elseif ($tb['manage_page']=="document") { ?>

   <li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
     <li><a href="<?php echo base_url('cwcontrol/document');?>">ข้อความ</a></li>
     <li><a href="<?php echo base_url('cwcontrol/link_D');?>">รูปภาพ + ลิ้งค์</a></li>
     <li><a href="<?php echo base_url('cwcontrol/Download');?>">ดาวน์โหลด</a></li>
   </ul>  
 </li>

 <?php //}else{ ?>

 <?php }elseif ($tb['manage_page']=="stocklist") { ?>

   <li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
     <li><a href="<?php echo base_url('cwcontrol/stocklist');?>">ข้อความ</a></li>
     <li><a href="<?php echo base_url('cwcontrol/link');?>">รูปภาพ + ลิ้งค์</a></li>
     <li><a href="<?php echo base_url('cwcontrol/brochure');?>">โบว์ชัว</a></li>
   </ul>  
 </li>

 <?php //}else{ ?>


 <?php  }elseif ($tb['manage_page']=="home") { ?>

 <li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
   <li><a href="<?php echo base_url('cwcontrol/home');?>">พันธมิตร</a></li>
   <li><a href="<?php echo base_url('cwcontrol/clients');?>">ลูกค้า</a></li>
 </ul>  
</li>

<?php // }else{ ?>

<?php  }elseif ($tb['manage_page']=="about") { ?>

 <li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
   <li><a href="<?php echo base_url('cwcontrol/ourprofile');?>">OUR PROFILE</a></li>
   <li><a href="<?php echo base_url('cwcontrol/vision');?>">VISION & MISSION</a></li>
   <li><a href="<?php echo base_url('cwcontrol/companyprofile');?>">COMPANY PROFILE</a></li>
   <li><a href="<?php echo base_url('cwcontrol/management');?>">MANAGEMENT STAFF</a></li>
   <li><a href="<?php echo base_url('cwcontrol/histroy');?>">HISTORY</a></li>
   <li><a href="<?php echo base_url('cwcontrol/milestones');?>">MILESTONES</a></li>
 </ul>  
</li>

<?php // }else{ ?>

<?php }elseif ($tb['manage_page']=="help") { ?>

<li><a href="#"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?> <span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
    <li><a href="<?php echo base_url('cwcontrol/faq');?>">FAQ</a></li>
    <li><a href="<?php echo base_url('cwcontrol/help/basic');?>">Basic Infomation</a></li>
    <li><a href="<?php echo base_url('cwcontrol/htb');?>">How2Buy</a></li>
    <li><a href="<?php echo base_url('cwcontrol/bank');?>">Payment Channel</a></li>
    <li><a href="<?php echo base_url('cwcontrol/help/privilege');?>">Privilege</a></li>
    <li><a href="<?php echo base_url('cwcontrol/help/delivery');?>">Delivery</a></li>
    <li><a href="<?php echo base_url('cwcontrol/tracking');?>">Product Status</a></li>
    <li><a href="<?php echo base_url('cwcontrol/help/re_turn');?>">Return Product</a></li>
    <li><a href="<?php echo base_url('cwcontrol/help/size');?>">Size</a></li>
  </ul> 
</li>

<?php }else{ ?>
<li>
  <a href="<?php echo base_url('cwcontrol/'.$tb['manage_page']);?>"><i class="fa <?php echo $tb['manage_icon']?> fa-fw"></i> <?php echo $tb['manage_name'] ?>
  </a>
</li>
<?php } ?>


<?php } ?>

<!-- keeree menufix -->
<!-- ex multi-->
      <!-- <?php 
      $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 16';
      $row = $this->db->query($sql)->result_array();
      foreach ($row as $row) {
        if ($row['manage_status'] == '1') {?>
        <li><a href="#"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
           <li><a href="<?php echo base_url('cwcontrol/bank');?>">บัญชีธนาคาร</a></li>
           <li><a href="<?php echo base_url('cwcontrol/order'."?status=pending");?>">รายการเตรียมชำระเงิน</a></li>
           <li><a href="<?php echo base_url('cwcontrol/order'."?status=confirm");?>">รายการชำระเงินแล้ว</a></li>
         </ul>  
       </li>
       <?php }} ?> -->




       <!-- admin -->
       <?php if ($_SESSION['user_username']=='admin') {?>
       <li><a href="<?php echo base_url('cwcontrol/admin');?>"><i class="fa fa-unlock-alt fa-fw"></i> admin</a></li>
       <?php }?>



     </ul>
   </div>
   <!-- /.sidebar-collapse -->
 </div>
