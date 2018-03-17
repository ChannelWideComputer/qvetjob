<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Cwcontrol</title>

    <?php $this->load->view('cwcontrol/script');?> 
    
</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0px;">
            
            <?php $this->load->view('cwcontrol/header');?>   
            <!-- /.navbar-top-links -->

			
            <?php $this->load->view('cwcontrol/left_menu');?>   
            
            <!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper">

			<style>
select {
	width: auto !important;
	height: auto !important;
	padding: 1px !important;
}

.pagination {
	margin: 0px 0 !important;
	float: right;
}
</style>
			<div class="row">
				<div class="col-lg-12" style="margin-top: 20px;">

					<div class="panel panel-default">
						<div class="panel-heading">
							<strong>Admin</strong>
						</div>
						<div class="panel-body">



							<div class="col-lg-12">
							<h3>function</h3>
								<div class="table-responsive">


									<table class="table table-striped table-bordered table-hover"
										style="margin-top: 10px;" width="100%">
										<thead>
											<tr>
												<td width="3%" align="center">ลำดับ</td>
												<td width="7%" align="center">สถานะ</td>
												<td width="5%" aligh="center">เรียงลำดับ</td>
												<td width="90%" align="center">ชื่อ</td>

											</tr>
										</thead>
										<tbody>
										<?php
										if (! isset($row)) {
										    ?>
										<tr>
												<td colspan="11" align="center">ไม่พบข้อมูล</td>
											</tr>
											<?php
											} else {
											    $i = 0;
											    foreach ($row as $row) {
											        
											        $i ++;
											        ?>    
											 <tr>
												<td align="center"><?php echo $i;?></td>
												<td align="center"><input type="checkbox" class="status"
													data-size="mini" data-on-color="success"
													id="<?php echo $row["id"];?>"
													<?php if($row["manage_status"] == 1){ echo "checked";}?>></td>
												<td align="center">
													<select class="form-control Sort" id="<?php echo $row['id'];?>">
									    			<?php									        
												        $query2 = $this->db->get('tb_manage');
												        $num = $query2->num_rows();									        
									        			for ($t = 1; $t <= $num; $t ++) {            
											        ?>
														<option value="<?php echo $t;?>" <?php if($row["manage_sort"] == $t){ echo "selected"; }?>><?php echo $t;?></option>
													<?php }?>
										 			</select>
												</td>
												
												<td align="center"> <?php echo $row["manage_name"];?></td>
											</tr>
 
 										<?php }}?>
 
 										</tbody>
									</table>
								</div>


							</div>
							
							
							
							<div class="col-lg-12">
<h3>Meta</h3>
								<div class="table-responsive">


									<table class="table table-striped table-bordered table-hover"
										style="margin-top: 10px;" width="100%">
										<thead>
											<tr>
												<td width="3%" align="center">ลำดับ</td>
												<td width="7%" align="center">สถานะ</td>
												<td width="90%" align="center">ชื่อ</td>

											</tr>
										</thead>
										<tbody>
											<?php
											if (! isset($meta)) {
											    ?>
											<tr>
												<td colspan="11" align="center">ไม่พบข้อมูล</td>
											</tr>
											<?php
											} else {
											    $i = 0;
											    foreach ($meta as $row) {
											        
											        $i ++;
											        ?>    
											 <tr>
												<td align="center"><?php echo $i;?></td>
												<td align="center"><input type="checkbox" class="meta_status"
													data-size="mini" data-on-color="success"
													id="<?php echo $row["id"];?>"
													<?php if($row["meta_status"] == 1){ echo "checked";}?>>												
												</td>
												
												<td align="center"> <?php echo $row["meta_page"];?></td>
											</tr>
 
 <?php }}?>
 
 </tbody>
									</table>
								</div>


							</div>




						</div>
						<!-- /.row (nested) -->

					</div>
					<!-- /.panel-body -->
				</div>

<?php //print_r($_SESSION)?>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>

		<script type="text/javascript">
$(document).ready(function(){ 
	
	$(".status").bootstrapSwitch({
		  onSwitchChange: function(event, state) {
			var ID = $(this).attr("id");
			//alert(ID);
			$.ajax({
					url: '<?php echo base_url('cwcontrol/'.$page.'/status');?>',
					type: 'post',
					data: {id:ID},
					success:function(data){
						//alert(data);
						location.reload();
						
					}
			});
		  }
		});

	});

</script>

		<script type="text/javascript">
$(document).ready(function(){ 
	
	$(".meta_status").bootstrapSwitch({
		  onSwitchChange: function(event, state) {
			var ID = $(this).attr("id");
			//alert(ID);
			$.ajax({
					url: '<?php echo base_url('cwcontrol/'.$page.'/meta_status');?>',
					type: 'post',
					data: {id:ID},
					success:function(data){
						//alert(data);
						//location.reload();
						
					}
			});
		  }
		});
		
		$('.Sort').change(function(){
			
			var ID = $(this).attr("id");
			var no = $(this).val();
			//alert(no);
			$.ajax({
					url: '<?php echo base_url('cwcontrol/'.$page.'/Sort');?>',
					type: 'post',
					data: {id:ID,value:no,},
					success:function(data){
						//alert(data);
						location.reload();
						
					}
				});
			
			});

	});

</script>




		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
<?php $this->load->view('cwcontrol/footer');?>
    </div>
	<!-- /#wrapper -->





</body>
</html>