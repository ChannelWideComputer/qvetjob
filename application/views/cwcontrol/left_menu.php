<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">

           <!--
        <li><a href="<?php echo base_url('cwcontrol/home');?>"><i class="fa fa-home fa-fw"></i> Home </a></li>
        <li><a href="<?php echo base_url('cwcontrol/about');?>"><i class="fa fa-info-circle fa-fw"></i> About Us </a></li>
        <li><a href="<?php echo base_url('cwcontrol/portfolio');?>"><i class="fa fa-briefcase fa-fw"></i> Portfolio </a></li>
        <li><a href="<?php echo base_url('cwcontrol/services');?>"><i class="fa fa-wrench fa-fw"></i> Service </a></li>
        <li><a href="#"><i class="fa fa-book fa-fw"></i> Products <span class="fa arrow"></span></a>
        
        	<ul class="nav nav-second-level">
				<li><a href="<?php echo base_url('cwcontrol/category');?>">Category</a></li>
				<li><a href="<?php echo base_url('cwcontrol/product');?>">Products</a></li>
			</ul>
        
        </li>
        <li><a href="<?php echo base_url('cwcontrol/faq');?>"><i class="fa fa-question-circle fa-fw"></i> Q & A </a></li>
        <li><a href="<?php echo base_url('cwcontrol/contact');?>"><i class="fa fa-phone fa-fw"></i> Contact Us </a></li>
        <li><a href="<?php echo base_url('cwcontrol/member');?>"><i class="fa fa-users fa-fw"></i> Member </a></li>
        <li><a href="<?php echo base_url('cwcontrol/email');?>"><i class="fa fa-envelope fa-fw"></i> Email </a></li> -->

        <!-- Menu Fix -->
        <!--
        <?php       
        $sql = " SELECT * FROM tb_manage WHERE manage_status = 1 ORDER BY manage_sort ";
        $row = $this->db->query($sql)->result_array();              
        foreach ($row as $row){         
        ?>
        
            <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']); ?>"><i class="fa <?php echo $row['manage_icon'] ?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
             
        <?php } ?>
      -->
      
      <?php 
      $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 1';
      $row = $this->db->query($sql)->result_array();
      foreach ($row as $row) {
        if ($row['manage_status'] == '1') {?>
        <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
        <?php }} ?>

        <?php 
        $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 2';
        $row = $this->db->query($sql)->result_array();
        foreach ($row as $row) {
          if ($row['manage_status'] == '1') {?>
          <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
          <?php }} ?>

          <?php 
          $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 3';
          $row = $this->db->query($sql)->result_array();
          foreach ($row as $row) {
            if ($row['manage_status'] == '1') {?>
            <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
            <?php }} ?>

            <?php 
            $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 4';
            $row = $this->db->query($sql)->result_array();
            foreach ($row as $row) {
              if ($row['manage_status'] == '1') {?>
              <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
              <?php }} ?>

              <?php 
              $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 5';
              $row = $this->db->query($sql)->result_array();
              foreach ($row as $row) {
                if ($row['manage_status'] == '1') {?>
                <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
                <?php }} ?>

                <?php 
                $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 6';
                $row = $this->db->query($sql)->result_array();
                foreach ($row as $row) {
                  if ($row['manage_status'] == '1') {?>
                  <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
                  <?php }}?>





                  <?php 
                  $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 8';
                  $row = $this->db->query($sql)->result_array();
                  foreach ($row as $row) {
                    if ($row['manage_status'] == '1') {?>
                    <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
                    <?php }} ?>

                    <?php 
                    $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 9';
                    $row = $this->db->query($sql)->result_array();
                    foreach ($row as $row) {
                      if ($row['manage_status'] == '1') {?>
                      <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
                      <?php }} ?>


                      <?php 
                      $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 11';
                      $row = $this->db->query($sql)->result_array();
                      foreach ($row as $row) {
                        if ($row['manage_status'] == '1') {?>
                        <li><a href="#"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?> <span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('cwcontrol/industries');?>">MAIN INDUSTRIES</a></li>
                            <li><a href="<?php echo base_url('cwcontrol/vacancies');?>">URGENT VACANCIES</a></li>
                          </ul> 
                        </li>
                        <?php }} ?>

                        <?php 
                        $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 18';
                        $row = $this->db->query($sql)->result_array();
                        foreach ($row as $row) {
                          if ($row['manage_status'] == '1') {?>
                          <li><a href="#"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?> <span class="fa arrow"></span></a>
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
                          <?php }} ?>

<!--
                    <li><a href="#"><i class="fa fa-book fa-fw"></i> Products <span class="fa arrow"></span></a>

                      <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url('cwcontrol/category');?>">Category</a></li>
                        <li><a href="<?php echo base_url('cwcontrol/product');?>">Products</a></li>
                      </ul>

                    </li>-->

                    <?php 
                    $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 7';
                    $row = $this->db->query($sql)->result_array();
                    foreach ($row as $row) {
                      if ($row['manage_status'] == '1') {?>
                      <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
                      <?php }}?>

                      <?php 
                      $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 14';
                      $row = $this->db->query($sql)->result_array();
                      foreach ($row as $row) {
                        if ($row['manage_status'] == '1') {?>
                        <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
                        <?php }}?>


                        <?php 
                        $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 10';
                        $row = $this->db->query($sql)->result_array();
                        foreach ($row as $row) {
                          if ($row['manage_status'] == '1') {?>
                          <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
                          <?php }}?>

                          <?php 
                          $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 19';
                          $row = $this->db->query($sql)->result_array();
                          foreach ($row as $row) {
                            if ($row['manage_status'] == '1') {?>
                            <li><a href="<?php echo base_url('cwcontrol/'.$row['manage_page']);?>"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?></a></li>
                            <?php }} ?>

                            <?php 
                            $sql = 'SELECT * FROM `tb_manage` WHERE manage_status = 1 AND manage_sort = 20';
                            $row = $this->db->query($sql)->result_array();
                            foreach ($row as $row) {
                              if ($row['manage_status'] == '1') {?>
                              <li><a href="#"><i class="fa <?php echo $row['manage_icon']?> fa-fw"></i> <?php echo $row['manage_name'] ?> <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                  <li><a href="<?php echo base_url('cwcontrol/job');?>">Jobs</a></li>
                                  <li><a href="<?php echo base_url('cwcontrol/register');?>">Resume</a></li>

                                </ul> 
                              </li>
                              <?php }} ?>

                              <!-- admin -->
                              <?php if ($_SESSION['user_username']=='admin') {?>
                              <li><a href="<?php echo base_url('cwcontrol/admin');?>"><i class="fa fa-unlock-alt fa-fw"></i> admin</a></li>
                              <?php }?>



                            </ul>
                          </div>
                          <!-- /.sidebar-collapse -->
                        </div>
