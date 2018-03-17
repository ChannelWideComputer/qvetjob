 
	<!-- <div class="col-lg-12 text-right"> 
		<a href="#" class="btn btn-primary">เพิ่มข้อมูล</a>
	</div>  -->
	<div class="row">
		<div class="col-lg-12" style="margin-top: 20px;">

			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Admin</strong>
				</div>
				<div class="panel-body">



					<div class="col-lg-12">
						<h3>function<a href="<?= base_url().'cwcontrol/'.$page.'/?type=add' ?>" class="btn btn-primary">เพิ่มเมนู</a></h3>
						<div class="table-responsive">


							<table class="table table-striped table-bordered table-hover"
							style="margin-top: 10px;" width="100%">
							<thead>
								<tr>
									<td width="3%" align="center">ลำดับ</td>
									<td width="7%" align="center">สถานะ</td>
									<td width="8%" aligh="center">เรียงลำดับ</td>
									<td width="88%" align="center">ชื่อ</td>
									<td width="15%" align="center">แก้ไข</td>
									<td width="15%" align="center">ลบ</td>

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
													<td align="center"><a href="<?php echo base_url().'cwcontrol/admin/?type=edit&id='.$row["id"];?>"><i class="fa fa-cog" style="color:#333;font-size:1.4em"></i></a></td>
													<td align="center"><a href="#" class="delete" id="<?php echo $row['id'];?>"><i class="fa fa-trash-o" style="color:#333;font-size:1.4em"></i></a></td>
												</tr>
												
												<?php }}?>
												
											</tbody>
										</table>
									</div>


								</div>
								
								
								
								<div class="col-lg-12">
									<h3>Meta<a href="<?= base_url().'cwcontrol/'.$page.'/?type=add&t=meta' ?>" class="btn btn-primary">เพิ่มเมนู</a></h3>
									<div class="table-responsive">


										<table class="table table-striped table-bordered table-hover"
										style="margin-top: 10px;" width="100%">
										<thead>
											<tr>
												<td width="3%" align="center">ลำดับ</td>
												<td width="7%" align="center">สถานะ</td>
												<td width="8%" aligh="center">เรียงลำดับ</td>
												<td width="90%" align="center">ชื่อ</td>
												<td width="15%" align="center">แก้ไข</td>
												<td width="15%" align="center">ลบ</td>

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
														<td align="center">
															<select class="form-control Sort2" id="<?php echo $row['id'];?>">
																<?php									        
																$query2 = $this->db->get('tb_meta')->result_array();
																$t=0;	foreach ($query2 as $key) {		$t++;	
																		?>
																		<option value="<?php echo $t;?>" <?php if($row["meta_sort"] == $t){ echo "selected"; }?>><?php echo $t;?></option>
																		<?php }?>
																	</select>
																</td>
																<td align="center"> <?php echo $row["meta_page"];?></td>
																<td align="center"><a href="<?php echo base_url().'cwcontrol/admin/?type=edit&id='.$row["id"].'&t=meta';?>"><i class="fa fa-cog" style="color:#333;font-size:1.4em"></i></a></td>
																<td align="center"><a href="#" class="delete2" id="<?php echo $row['id'];?>"><i class="fa fa-trash-o" style="color:#333;font-size:1.4em"></i></a></td>
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

								$('.delete').click(function(){

									$('#Modal_delete').modal('show');

									var ID = $(this).attr("id");
									var dataString='id='+ID;

									$('#btn_delete').click(function(){
										jQuery.ajax({
											type: "POST",
											url: "<?php echo base_url('cwcontrol/'.$page.'/delete');?>",
											data: {id:ID},
											cache: false,
											success: function(html)
											{
										// alert(data);
										location.reload();

									}
		});//จบการส่งข้อมูล
									});
									return false;
								});

								$('.delete2').click(function(){

									$('#Modal_delete').modal('show');

									var ID = $(this).attr("id");
									var dataString='id='+ID;

									$('#btn_delete').click(function(){
										jQuery.ajax({
											type: "POST",
											url: "<?php echo base_url('cwcontrol/'.$page.'/delete_mate');?>",
											data: {id:ID},
											cache: false,
											success: function(html)
											{
										// alert(data);
										location.reload();

									}
		});//จบการส่งข้อมูล
									});
									return false;
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

								$('.Sort2').change(function(){

									var ID = $(this).attr("id");
									var no = $(this).val();
			//alert(no);
			$.ajax({
				url: '<?php echo base_url('cwcontrol/'.$page.'/Sort_mate');?>',
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





					</body>
					</html>

					<div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="panel panel-danger" style="margin-bottom:0px;">
									<div class="panel-heading">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										ลบข้อมูล

									</div>
									<div class="panel-body" align="center">
										<p> ยืนยันการลบข้อมูล</p>
									</div>
									<div class="modal-footer">        
										<button type="button" id="btn_delete" class="btn btn-danger">ลบข้อมูล</button>              
									</div>
								</div>
							</div>
						</div>
					</div>