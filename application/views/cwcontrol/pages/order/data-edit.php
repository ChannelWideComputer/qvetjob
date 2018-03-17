<form role="form" action="<?= base_url('cwcontrol/'.$page.'/update_payment');?>" method="post" enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?= $sales["sales_id"]?>"/>

	<div class="row">
		<div class="col-lg-12" style="margin-top:20px;">
			<div class="panel panel-default">
				<div class="panel-heading">

					<strong>รายละเอียดการสั่งซื้อ</strong>


				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">  
							<label>วันที่ สั่งซื้อ : <?= $sales["sales_date"]?></label>
						</div> 
						
						<div class="col-lg-6 text-right">  
							<!-- <button type="submit" class="btn btn-success " <?= (isset($sales['pay_detail']))? "" : "disabled"; ?> >Payment Confirm</button> -->
							<?php $status = $this->db->where('sast_id',$sales["sales_pay_status"])->get('tb_sales_status')->row_array(); ?>
							<label class="btn btn-<?= $status['sast_color']; ?>"><?= $status['sast_name']; ?></label>
						</div>  
						
						<div class="col-lg-12">

							<div class="row">
								<div class="col-lg-4">  
									<div id="Email" class="form-group has-feedback">

										<label><?= $sales['sales_inv']; ?></label><br>


										<label>Customers Detail</label><br>
										<div class="col-lg-6">
											<label><?= $sales["sachk_email"]?></label>
											<br>
											<label><?= $sales["sachk_name"]?></label>
											<br>
											<label>เบอร์ติดต่อ</label> 
											<label><?= $sales["sachk_tel"]?></label>
											<br>
											<label>สถานที่จัดส่ง</label><br>
											<label><?= $sales["sachk_des"]?></label>
											<br>
											<label>ลายละเอียดเพืมเติม</label><br>
											<label><?= $sales["sachk_add"]?></label>
											<br>
										</div>

									</div>  
								</div>
							</div>


							<div class="row">
								<div class="col-lg-12">  

									<div style="text-align: center;">

										<label> รายละเอียดการสั่งซื้อ </label>

									</div>

									<table class="table table-striped table-bordered table-hover" style="margin-top:10px;" width="100%">
										<thead>
											<tr>
												<td width="4%" align="center">No</td>
												<td width="30%" align="center">Product Images</td>
												<td width="30%" align="center">Product Name</td>
												<td width="10%" align="center">Qty</td>
												<td width="10%" align="center">Price / Unit</td>
												<td width="10%" align="center">Total Price</td>
											</tr>
										</thead>
										<tbody>
											<?php if (isset($sales["sales_detail"])) { $i = 0; foreach ($sales["sales_detail"] as $ref) { 
												$i++;
												?>
												<tr>
													<td align="center"><?= $i;?></td>
													<td align="center"><img src="../upload/product/<?= $ref['product_Images']; ?>" style="width: 40%"></td>
													<td align="center"><?= $ref['product_Name_TH']; ?></td>
													<td align="center"><?= $ref['sade_qty'] ; ?></td>
													<td align="center"><?= $ref['sade_price_lang'] . ":" . number_format($ref['sade_price'],2); ?></td>
													<td align="center"><?= $ref['sade_price_lang'] . ":" . number_format($ref['sade_price'] * $ref['sade_qty'],2); ?></td>
												</tr>
												<?php } } ?>
											</tbody>

											<tfoot>
												<tr>
													<td colspan="4" align="right"><strong> Total </strong></td>
													<td colspan="2" align="right"><strong><?= $ref['sade_price_lang'] . ":" .  number_format($sales['sales_total_amount'],2); ?></strong> </td>
												</tr>
											</tfoot>

										</table>
										


									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">  

										<div style="text-align: center;">

											<h2> Pay-in </h2> <br>





											<p><?= (isset($sales['pay_detail']))? $sales['pay_detail'][0]['pay_time']: "PENDING PAYMENT ";  ?></p>



											<img src="../upload/payment/<?= (isset($sales['pay_detail']))? $sales['pay_detail'][0]['pay_image'] : "nopay.jpg"; ?>">


											


										</div>


										


									</div>
								</div>


							</div>
							<?php if ($_GET['status'] == 'pending') { ?>
							<!-- <div class="col-lg-12 text-right">  
								<button type="submit" class="btn btn-success " <?= (isset($sales['pay_detail']))? "" : "disabled"; ?> >Payment Confirm</button>
							</div>   -->
							<?php } ?>

						</div>

						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->          
		</div>
	</form>


	<script type="text/javascript">

		tinymce.init({
			selector: 'textarea.ckeditor',
			menubar : false,
			force_br_newlines : true,
			force_p_newlines : false,
			forced_root_block : '',
			height: 400, 
	//width : 1100,
	plugins: [
	"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	"save table contextmenu directionality emoticons template paste textcolor moxiemanager colorpicker layer textpattern"
	],    
	toolbar: 'insertfile undo redo | table | styleselect fontselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print nonbreaking hr emoticons code',
	
	
});

</script>
<script type="text/javascript">
	$(document).ready(function(){


		$("#member_Email").change(function(){
			var member_Mail1 = $("#member_Email").val();
				//alert(member_Mail1);
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
				if (filter.test(member_Mail1) == false) {

						//$('#myModalLabel').html('ตรวจสอบอีเมล์')						
						$('#EmailBlock1').html('รูปแบบอีเมล์ไม่ถูกต้อง')
						$('#Email').removeClass("has-success");
						$('#Emailicon').removeClass("glyphicon-ok");
						
						$('#Email').addClass("has-error");
						$('#Emailicon').addClass("glyphicon-remove");
						
						$("#member_Email").focus();
						$("#member_Email").val("");
						exit();
						
					}
				});

		$("#member_Email").change(function(){
			var member_Email1 = $("#member_Email").val();

			$.post("<?= base_url('cwcontrol/'.$page.'/query');?>", { 
				method:'chk_mail',
				member_Email: member_Email1, }, 
				function(result){
						//alert(result);
						if(result){
							$('#EmailBlock1').html('อีเมล์นี้ใช้ได้ค่ะ')
							$('#Email').removeClass("has-error");
							$('#Emailicon').removeClass("glyphicon-remove");
							
							$('#Email').addClass("has-success");
							$('#Emailicon').addClass("glyphicon-ok");

							
							
						}else{
							
							$('#EmailBlock1').html('อีเมล์นี้มีในระบบแล้วค่ะ')
							$('#Email').removeClass("has-success");
							$('#Emailicon').removeClass("glyphicon-ok");

							$('#Email').addClass("has-error");
							$('#Emailicon').addClass("glyphicon-remove");
							
							$("#member_Email").focus();
							$("#member_Email").val("");
							
							
						}
					});
		});

		



// Password //
$("#member_Pass").change(function(){
	var member_Pass = $("#member_Pass").val();
	//pattern="[a-zA-Z0-9]{6,}$"
	
	var pattern_pass = /[a-zA-Z0-9]{4,}$/;
	if (pattern_pass.test(member_Pass) == false) {
		

		$('#PassBlock1').html('รหัสผ่านจะต้องเป็นตัวอักษร a-z, A-Z, 0-9 และไม่ต่ำกว่า 4 ตัวอักษร')
		$('#Pass').removeClass("has-success");
		$('#Passicon').removeClass("glyphicon-ok");
		
		$('#Pass').addClass("has-error");
		$('#Passicon').addClass("glyphicon-remove");

		$("#member_Pass").focus();
		$("#member_Pass").val("");
		

	}else{
		
		$('#PassBlock1').html('')
		$('#Pass').removeClass("has-error");
		$('#Passicon').removeClass("glyphicon-remove");
		
		$('#Pass').addClass("has-success");
		$('#Passicon').addClass("glyphicon-ok");
		
	}
});




});
</script>

