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

		<form role="form"
		action="<?php echo base_url('cwcontrol/'.$page.'/update');?>"
		method="post" enctype="multipart/form-data">

		<!-- /.row -->
		<input type="hidden" name="id" value="<?php echo $about_ID ;?>" />
		<div class="row">
			<div class="col-lg-12" style="margin-top: 20px;">
				<div class="panel panel-default">
					<div class="panel-heading">

						<strong><?php echo $title ?></strong>


					</div>
					<br>
					<div class="col-lg-6">  
						Update : <?php echo $about_Date ;?>
					</div>
					<div class="col-lg-6 text-right">
						<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
					</div>
					<div class="panel-body">

						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#menu">TH</a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#menu2">EN</a>
							</li>
						</ul>
						<br>
						<div class="tab-content">

							<div id="menu" class="tab-pane fade in active">
								<div class="row">
									
									
									<div class="col-lg-12">
										<br>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label>รายละเอียดเกียวกับเรา (TH) </label>
													<div class="container">
														<textarea name="about_Detail_TH"
														class="form-control ckeditor" rows="3"><?php echo $about_Detail_TH ; ?></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="menu2" class="tab-pane fade">
								<div class="row">
									
									
									<div class="col-lg-12">
										<br>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label>รายละเอียดเกียวกับเรา (EN) </label>
													<div class="container">
														<textarea name="about_Detail_EN"
														class="form-control ckeditor" rows="3"><?php echo $about_Detail_EN ; ?></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">  
								<div class="form-group" id="aaa">
									<label>แกลอรี่ ขนาด 384px x 513px</label>
									<input  type="file" name="gallery[]" id="gallery" multiple>


									<script>   
										$('#gallery').filer({
											addMore: true,
											showThumbs: true,
											templates: {
												box: '<ul id="list1" class="jFiler-items-list jFiler-items-grid sort"></ul>',
												item: '<li class="jFiler-item">' +
												'<div class="jFiler-item-container">' +
												'<div class="jFiler-item-inner">' +
												'<div class="jFiler-item-thumb">' +
												'<div class="jFiler-item-status"></div>' +
												'<div class="jFiler-item-info">' +
												'<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>' +
												'<span class="jFiler-item-others">{{fi-size2}}</span>' +
												'</div>' +
												'{{fi-image}}' +
												'</div>' +
												'<div class="jFiler-item-assets jFiler-row">' +
												'<ul class="list-inline pull-left">' +
												'<li>{{fi-progressBar}}</li>' +
												'<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
												'</ul>' +
												'<ul class="list-inline pull-right">' +
												'<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li><input type="hidden" name="sort[]" id="sort" />' +
												'</ul>' +
												'</div>' +
												'</div>' +
												'</div>' +
												'</li>',
												itemAppend: '<li class="jFiler-item">' +
												'<div class="jFiler-item-container">' +
												'<div class="jFiler-item-inner">' +
												'<div class="jFiler-item-thumb">' +
												'<div class="jFiler-item-status"></div>' +
												'<div class="jFiler-item-info">' +
												'<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>' +
												'<span class="jFiler-item-others">{{fi-size2}}</span>' +
												'</div>' +
												'{{fi-image}}' +
												'</div>' +
												' <div class="jFiler-item-assets jFiler-row">' +
												'<ul class="list-inline pull-left">' +
												'<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
												'</ul>' +
												'<ul class="list-inline pull-right">' +
												'<li><a class="icon-jfi-trash jFiler-item-trash-action" idg="{{fi-name}}"></a></li><input type="hidden" name="sort-{{fi-name}}" id="sort" /><input type="hidden" name="gallery_ID[]" id="sortid" value="{{fi-name}}">' +
												'</ul>' +
												'</div>' +
												'</div>' +
												'</div>' +
												'</li>',
												progressBar: '<div class="bar"></div>',
												itemAppendToEnd: true,
												removeConfirmation: true,
												_selectors: {
													list: '.jFiler-items-list',
													item: '.jFiler-item',
													progressBar: '.bar',
													remove: '.jFiler-item-trash-action'
												}
											},
											files: [

											<?php

											if(isset($gallery)){
												foreach ($gallery as $row_gallery)					

												{

													?>

													{
														name: "<?php echo $row_gallery["gallery_ID"]?>",
														type: "image",
														file: "<?php echo asset_url()?>upload/gallery/full_<?php echo $row_gallery["gallery_Images"]?>",


													},
													<?php }}else{?>{}<?php }?>
													],
													onRemove: function(el){			
														var ids = el.find(".icon-jfi-trash").attr("idg");
														$.post('<?php echo base_url('cwcontrol/'.$page.'/delete_gallery');?>', {id: ids});
													},
													afterShow: function(el){

														saveOrder();
													},
													captions: {
														removeConfirmation: 'ยืนยันการลบข้อมูล',

													},

												});
											</script>
										</div>
									</div>
								</div>

								<div class="col-lg-12 text-right">
									<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
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
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
		<?php $this->load->view('cwcontrol/footer');?>   
	</div>
	<!-- /#wrapper -->

	<script type="text/javascript">

		tinymce.init({
			selector: 'textarea.ckeditor',
			menubar : false,
			force_br_newlines : true,
			force_p_newlines : false,
			forced_root_block : '',
			height: 600, 
			/*width : 860,*/
			plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor moxiemanager colorpicker layer textpattern"
			],    
			toolbar: 'insertfile undo redo | table | styleselect fontselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print nonbreaking hr emoticons code',


		});

	</script>



	<script>
		$('#Images').filer({
			limit: 1,

		});
/*
$('#Images2').filer({
	limit: 1,
   
});*/	

function readURL(input,id) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {

			$("#"+id).css("display", "block").prop("src", e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

</script>

</body>

</html>

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
