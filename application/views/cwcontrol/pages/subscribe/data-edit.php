
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
<form role="form"
action="<?php echo base_url('cwcontrol/'.$page.'/update');?>"
method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $subscribe["subscribe_ID"]?>" />

<div class="row">
	<div class="col-lg-12" style="margin-top: 20px;">
		<div class="panel panel-default">
			<div class="panel-heading">

				<strong>แก้ไขข้อมูล</strong>


			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">&nbsp;</div>
					<div class="col-lg-6 text-right">
						<button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
					</div>
					<div class="col-lg-12">

					

						<div class="tab-content">

							<div id="home" class="tab-pane fade in active">
								<br>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>ชื่อ TH</label> <input type="text"
											class="form-control" name="subscribe_Email" required value="<?php echo $subscribe["subscribe_Email"]?>">

										</div>
									</div>
								</div>
							</div>
						</div>

						<hr>
						<!-- ////////////////////////////////////////////////////////////////////////// -->


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
	saveOrder();	
	$("#list1").dragsort({ dragSelector: "img", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });

	function saveOrder() {
		$("#list1.sort").find("input#sort").each(function(k,v){
			$(v).val(k+1);
		});
		$("#aaa").find(".jFiler-input-caption").find("span").text($("#list1.sort").find("input#sort").length+" files were chosen");

	};
</script>
