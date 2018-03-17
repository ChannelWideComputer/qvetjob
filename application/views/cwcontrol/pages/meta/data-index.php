
<style>
#list1 li {
	/*display: inline-block;*/
	float: left;
}
/*.placeHolder{
        width: 100%;
        height: 100%;
        border: 2px dashed #c2cdda;
        border-radius: 4px;
    }    */
</style>
<?php //echo $this->session->flashdata('rela');$this->input->get('rele')?>
<?php
if ($this->input->get('rele') != '' || $this->session->flashdata('rela') != '') {
    $rela = 're';
} else {
    $rela = '';
}

?>

<div class="row">
	<div class="col-lg-12" style="margin-top: 20px;">


		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>จัดการแต่ละหน้า</strong>

			</div>

			<div class="row">

				<div class="panel-body">
					<ul class="nav nav-tabs">
							<?php
    
						    	$i = 0; $c = 0;
						    	foreach ($row as $row_tap) {
        					?>
							<li class="<?php echo ($i == '0') ? 'active' : ''?>">
								<a data-toggle="tab" href="#menu<?php echo $i?>"><?php echo $row_tap['meta_page']?></a>
							</li>
							
							<?php $i++;}?>
					</ul>

					<div class="tab-content">
					<?php foreach ($row as $row_con) { ?>
						<div id="menu<?php echo $c?>" class="tab-pane fade <?php echo ($c == '0') ? 'in active' : ''?>">
							<div class="panel-body">
								<h3><?php echo $row_con['meta_page_name']?></h3>
								<div class="panel-body">
									<form role="form"
										action="<?php echo base_url('cwcontrol/'.$page.'/update');?>"
										method="post" enctype="multipart/form-data">

										<div class="row">
											<div class="col-lg-9">
												<div class="form-group">
													<label>Meta Titte</label>
													<input name="id_page" value="<?php echo $row_con['id']?>" type="hidden" />
													<input name="page" value="<?php echo $c?>" type="hidden" />
													<input type="text" class="form-control" name="meta_titte" value="<?php echo $row_con['meta_titte']?>" />

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-9">
												<div class="form-group">
													<label>Meta Description</label>
													<input type="text" class="form-control" name="meta_description"	value="<?php echo $row_con['meta_description']?>">

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-9">
												<div class="form-group">
													<label>Meta Keywords</label> <input type="text"
														class="form-control" name="meta_keywords"
														value="<?php echo $row_con['meta_keywords']?>">

												</div>
											</div>
										</div>
										<div class="col-lg-12 text-right">
											<button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php $c++;}?>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>

<!-- /.row (nested) -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>

<script type="text/javascript">

tinymce.init({
    selector: 'textarea.ckeditor',
	menubar : false,
	force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : '',
	height: 300, 
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
saveOrder();	
  $("#list1").dragsort({ dragSelector: "img", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });

  function saveOrder() {
        $("#list1.sort").find("input#sort").each(function(k,v){
            $(v).val(k+1);
        });
	  $("#aaa").find(".jFiler-input-caption").find("span").text($("#list1.sort").find("input#sort").length+" files were chosen");
	  
};
</script>

<script type="text/javascript">
$(document).ready(function(){ 


	$('.delete').click(function(){
		
		$('#Modal_delete').modal('show');
		
		var ID = $(this).attr("id");
		var dataString='id='+ID;
		
		$('#btn_delete').click(function(){
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url('cwcontrol/'.$page.'/delete_rela');?>",
			data: {id:ID},
			cache: false,
			success: function(html)
				{
					alert(html);
					location.reload();
					
				}
		});//จบการส่งข้อมูล
		});
 		return false;
	});
			
	});

</script>


<div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="panel panel-danger" style="margin-bottom: 0px;">
				<div class="panel-heading">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					สินค้าที่เกี่ยวข้อง

				</div>
				<div class="panel-body" align="center">
					<p>ลบสินค้าที่เกี่ยวข้อง</p>
				</div>
				<div class="modal-footer">
					<button type="button" id="btn_delete" class="btn btn-danger">ลบข้อมูล</button>
				</div>
			</div>
		</div>
	</div>
</div>


