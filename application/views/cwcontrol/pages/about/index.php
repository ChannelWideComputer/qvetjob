<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title></title>

	<?php $this->load->view('cwcontrol/script');?> 
</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px;">

			<?php $this->load->view('cwcontrol/header');?>   
			<!-- /.navbar-top-links -->

			
			<?php $this->load->view('cwcontrol/left_menu');?>   
			<!-- /.navbar-static-side -->
		</nav>

		<<div id="page-wrapper">

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
						<div class="panel-body">

							<div class="row">
								<div class="col-lg-6">  
									Update : <?php echo $about_Date ;?>
								</div>
								<div class="col-lg-6 text-right">
									<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
								</div>
								<div class="col-lg-12">
									<br>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label>รายละเอียด TH</label>
												<div class="container">
													<textarea name="about_Detail_TH"
													class="form-control ckeditor" rows="3"><?php echo $about_Detail_TH ; ?></textarea>
												</div>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-lg-6">  
											<div class="form-group">
												<label>รูปปก </label>
												<input  type="file" name="about_Images" id="Images">
												<?php if($about_Images){?>

												<input name="about_Images" value="<?php echo $about_Images ?>" type="hidden">
												<?php }?>

												<script>
													$('#Images').filer({
														limit: 1,
														showThumbs: true,
														templates: {
															box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
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
															'</ul>' +
															'<ul class="list-inline pull-right">' +
															'<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>' +
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
															'<div class="jFiler-item-assets jFiler-row">' +
															'<ul class="list-inline pull-left">' +
															'<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
															'</ul>' +
															'<ul class="list-inline pull-right">' +
															'<li><a class="icon-jfi-trash jFiler-item-trash-action" id="{{fi-name}}"></a></li>' +
															'</ul>' +
															'</div>' +
															'</div>' +
															'</div>' +
															'</li>',
															progressBar: '<div class="bar"></div>',
															itemAppendToEnd: false,
															removeConfirmation: true,
															_selectors: {
																list: '.jFiler-items-list',
																item: '.jFiler-item',
																progressBar: '.bar',
																remove: '.jFiler-item-trash-action'
															}
														},
														<?php if($about_Images){?>
															files: [
															{
																name: "<?php echo $about_ID ?>",
																type: "image",
																file: "<?php echo asset_url()?>upload/about/<?php echo $about_Images ?>"


															}

															],
															<?php } ?>
															onRemove: function(el){			
																var ids = el.find(".icon-jfi-trash").attr("id");
																$.post('<?php echo base_url('cwcontrol/'.$page.'/delete_img');?>', {id: ids,type: "TH"});
															},
															captions: {
																removeConfirmation: 'ยืนยันการลบข้อมูล',

															},
														});
													</script>												   

												</div>

											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>YouTube</label>
													<input type="text" class="form-control" name="about_Youtube" id="youtube_Link" value="<?= $about_Youtube ?>" >
													<p class="help-block">
														*การใส่ VDO YouTube ให้นำ VIDEO_ID ของ YouTube มาใส่
														ตัวอย่างเช่น http://www.youtube.com/watch?v=<span style="color:#F00;">8FIz_qs66sc</span>
														ตัวหนังสือ สีแดงคือ VIDEO_ID ของ YouTube <br><br>


														<iframe width="350" height="250" id="myIframe" name="myIframe" src="https://www.youtube.com/embed/<?= $about_Youtube ?>"  frameborder="0" allowfullscreen="allowfullscreen"></iframe>


													</p> 
												</div>  
											</div>
										</div>

									</div>

									<div class="col-lg-12 text-right">  
										<button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
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
			</form>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
		<?php $this->load->view('cwcontrol/footer');?>
	</div>
	<!-- /#wrapper -->





	<!-- place in header of your html document -->
	<script type="text/javascript">

		tinymce.init({
			selector: 'textarea.ckeditor',
			menubar : false,
			force_br_newlines : true,
			force_p_newlines : false,
			forced_root_block : '',
			height: 400, 
	//width : 100%,
	plugins: [
	"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	"save table contextmenu directionality emoticons template paste textcolor moxiemanager colorpicker layer textpattern"
	],    
	toolbar: 'insertfile undo redo | table | styleselect fontselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print nonbreaking hr emoticons code',
	
	
});

</script>

<script>
	$('#facebook_Image').filer({
		limit: 1,
	});

	$('#line_QRCode').filer({
		limit: 1,
	});

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

<style>
#map-canvas {
	height:350px;
	width:750px;
	/* margin: 0 auto;*/
	padding: 0px;
	border:1px solid #ccc;
	-webkit-border-radius: 5px 5px 5px 5px;
	-moz-border-radius: 5px 5px 5px 5px;
	-khtml-border-radius: 5px 5px 5px 5px;
	border-radius: 5px 5px 5px 5px;
}
</style>






</body>
</html>
