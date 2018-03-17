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

		<div id="page-wrapper"> 
			<br>
			<form role="form" action="<?php echo base_url('cwcontrol/'.$page.'/update');?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="insert" />
				<input type="hidden" name="id" value="<?php echo $row["contact_ID"]?>" />
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>ติดต่อเรา</strong>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">&nbsp;</div>
							<div class="col-lg-6 text-right">
								<button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
							</div>
							<div class="col-lg-12">


								<div class="row">
									<div class="form-group">
										<div class="col-lg-6">  
											<div class="form-group">
												<label>Emailสำหรับรับข้อความ</label>
												<input class="form-control" name="contact_Mail" type="text" value="<?php echo $row["contact_Mail"]?>">
											</div>  
										</div>

										<div class="col-lg-6">  
											<div class="form-group">
												<label>เบอร์ติดต่อหน้าเว็ป</label>
												<input class="form-control" name="contact_Phone" type="text" value="<?php echo $row["contact_Phone"]?>">
											</div>  
										</div>

									</div>
								</div> 

								<ul class="nav nav-tabs">
									<li class="item active">
										<a data-toggle="tab" href="#menu">สถานที่ติดต่อ 1</a>
									</li>
									<li class="item">
										<a data-toggle="tab" href="#menu2">สถานที่ติดต่อ 2</a>
									</li>
								</ul>
								<br>





								<div class="tab-content">




									<div id="menu" class="tab-pane fade in active">

										<ul class="nav nav-tabs">
											<li class="item active">
												<a data-toggle="tab" href="#menu1_1">TH</a>
											</li>
											<li class="item">
												<a data-toggle="tab" href="#menu1_2">EN</a>
											</li>
										</ul>
										<div class="clearfix"></div><br>
										<div class="tab-content">

											<div id="menu1_1" class="tab-pane fade in active">
												<div class="row">
													<div class="form-group">
														<div class="col-lg-12">  
															<div class="form-group">
																<label>ที่ตั้ง </label>
																<input class="form-control" name="contact_Add_TH" type="text" value="<?php echo $row["contact_Add_TH"]?>">
															</div>  
														</div>
													</div>
												</div>
											</div>

											<div id="menu1_2" class="tab-pane fade in">
												<div class="row">
													<div class="form-group">

														<div class="col-lg-12">  
															<div class="form-group">
																<label>ที่ตั้ง </label>
																<input class="form-control" name="contact_Add_EN" type="text" value="<?php echo $row["contact_Add_EN"]?>">
															</div>  
														</div>
													</div>
												</div>
											</div> 
											

											<div class="clearfix"></div><br>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<div class="col-lg-6">  
															<div class="form-group">
																<label>เบอร์ติดต่อ </label>
																<input class="form-control" name="contact_Tel" type="text" value="<?php echo $row["contact_Tel"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>เบอร์FAX</label>
																<input class="form-control" name="contact_Fax" type="text" value="<?php echo $row["contact_Fax"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>อีเมล์</label>
																<input class="form-control" name="cus_mail_TH" type="text" value="<?php echo $row["cus_mail_TH"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>แผนที่</label>
																<input class="form-control" name="contact_Detail1_TH" type="text" value="<?php echo $row["contact_Detail1_TH"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>ละติจูด</label>
																<input class="form-control" name="contact_lat" type="text" value="<?php echo $row["contact_lat"]?>">
															</div>  
														</div>
														<div class="col-lg-6">  
															<div class="form-group">
																<label>ลองจิจูด</label>
																<input class="form-control" name="contact_lng" type="text" value="<?php echo $row["contact_lng"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>รูปภาพแผนที่ </label>
																<input  type="file" name="contact_Images_TH" id="Images">
																<?php if($row["contact_Images_TH"]){?>

																<input name="contact_Images_TH" value="<?php echo $row["contact_Images_TH"]?>" type="hidden">
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
																		<?php if($row["contact_Images_TH"]){?>
																			files: [
																			{
																				name: "<?php echo $row["contact_ID"]?>",
																				type: "image",
																				file: "<?php echo asset_url()?>upload/contact/<?php echo $row["contact_Images_TH"]?>"


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

														</div>
													</div>
												</div>
											</div>
										</div>








										<div id="menu2" class="tab-pane fade in ">

											<ul class="nav nav-tabs">
												<li class="item active">
													<a data-toggle="tab" href="#menu2_1">TH</a>
												</li>
												<li class="item">
													<a data-toggle="tab" href="#menu2_2">EN</a>
												</li>
											</ul>
											<div class="clearfix"></div><br>
											<div class="tab-content">
												<div id="menu2_1" class="tab-pane fade in active">
													<div class="row">
														<div class="form-group">
															<div class="col-lg-12">  
																<div class="form-group">
																	<label>ที่ตั้ง </label>
																	<input class="form-control" name="contact_Add2_TH" type="text" value="<?php echo $row["contact_Add2_TH"]?>">
																</div>  
															</div>
														</div>
													</div>
												</div>

												<div id="menu2_2" class="tab-pane fade in">
													<div class="row">
														<div class="form-group">
															<div class="col-lg-12">  
																<div class="form-group">
																	<label>ที่ตั้ง </label>
																	<input class="form-control" name="contact_Add2_EN" type="text" value="<?php echo $row["contact_Add2_EN"]?>">
																</div>  
															</div>
														</div>
													</div>
												</div> 
											</div>

											<div class="clearfix"></div><br>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<div class="col-lg-6">  
															<div class="form-group">
																<label>เบอร์ติดต่อ </label>
																<input class="form-control" name="contact_Tel2" type="text" value="<?php echo $row["contact_Tel2"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>เบอร์FAX</label>
																<input class="form-control" name="contact_Fax2" type="text" value="<?php echo $row["contact_Fax2"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>อีเมล์</label>
																<input class="form-control" name="cus_mail_EN" type="text" value="<?php echo $row["cus_mail_EN"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>แผนที่</label>
																<input class="form-control" name="contact_Detail2_TH" type="text" value="<?php echo $row["contact_Detail2_TH"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>ละติจูด</label>
																<input class="form-control" name="contact_lat2" type="text" value="<?php echo $row["contact_lat2"]?>">
															</div>  
														</div>
														<div class="col-lg-6">  
															<div class="form-group">
																<label>ลองจิจูด</label>
																<input class="form-control" name="contact_lng2" type="text" value="<?php echo $row["contact_lng2"]?>">
															</div>  
														</div>

														<div class="col-lg-6">  
															<div class="form-group">
																<label>รูปภาพแผนที่ </label>
																<input  type="file" name="contact_Images_EN" id="Images2">
																<?php if($row["contact_Images_EN"]){?>

																<input name="contact_Images_EN" value="<?php echo $row["contact_Images_EN"]?>" type="hidden">
																<?php }?>

																<script>
																	$('#Images2').filer({
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
																		<?php if($row["contact_Images_EN"]){?>
																			files: [
																			{
																				name: "<?php echo $row["contact_ID"]?>",
																				type: "image",
																				file: "<?php echo asset_url()?>upload/contact/<?php echo $row["contact_Images_EN"]?>"


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

														</div>
													</div>
												</div>

											</div>


										</div>
									</div>
								</div>
								<div class="clearfix"></div><br>
								<div class="row">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">  
												<div class="form-group">
													<label>facebook </label>
													<input class="form-control" name="facebook" type="text" value="<?php echo $row["facebook"]?>">
												</div>  
											</div>
											<div class="col-lg-6">  
												<div class="form-group">
													<label>line</label>
													<input class="form-control" name="line" type="text" value="<?php echo $row["line_ID"]?>">
												</div>  
											</div>
											<div class="col-lg-12">  
												<div class="form-group">
													<label>youtube</label>
													<input class="form-control" name="youtube" type="text" value="<?php echo $row["youtube"]?>">
												</div>  
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">&nbsp;</div>
									<div class="col-lg-6 text-right">
										<button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
									</div>
								</div>
							</div>
						</div>
					</form>

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



<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo apikey("api_key");?>&callback=initialize"
	async defer></script>  
	<!--<script src="http://maps.google.com/maps/api/js?v=3.exp&language=th&callback=initialize"> </script>-->
	<?php
	if($row['contact_lat']!="" || $row['contact_lng']!="" || $row['contact_zm']!=""){

		$lat=$row['contact_lat'];
		$lng=$row['contact_lng'];
		$zoom=$row['contact_zm'];

	}else{

		$lat="13.761728449950002";
		$lng="100.6527900695800";
		$zoom="6";

	}
	?>   
	<script>
		var lat='<?php echo $lat?>';
		var lng='<?php echo $lng?>';
		var zm='<?php echo $zoom?>';	




var geocoder; // กำหนดตัวแปรสำหรับ เก็บ Geocoder Object ใช้แปลงชื่อสถานที่เป็นพิกัด
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
function initialize() { // ฟังก์ชันแสดงแผนที่

	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	geocoder = new GGM.Geocoder(); // เก็บตัวแปร google.maps.Geocoder Object
	// กำหนดจุดเริ่มต้นของแผนที่
	var my_Latlng  = new GGM.LatLng(lat,lng);
	var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
	var my_DivObj=$("#map-canvas")[0];
	// กำหนด Option ของแผนที่
	var myOptions = {
		zoom: parseInt(zm), // กำหนดขนาดการ zoom
		center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
		mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
		
		


	};
	map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
	
	my_Marker = new GGM.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
		position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
		map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
		icon:"<?php echo asset_url()?>images/pin.png",
		
		draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
		title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
	});
	
	
	
	
	// กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร	
	GGM.event.addListener(my_Marker, 'dragend', function() {
		var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
        map.panTo(my_Point); // ให้แผนที่แสดงไปที่ตัว marker		
        $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
        $("#lon_value").val(my_Point.lng());  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
        $("#zoom_value").val(map.getZoom());  // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu			
    });		

	// กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
	GGM.event.addListener(map, 'zoom_changed', function() {
		$("#zoom_value").val(map.getZoom());   // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value 	
	});
	

}

$(function(){
	// ส่วนของฟังก์ชันค้นหาชื่อสถานที่ในแผนที่
	var searchPlace1=function(){ // ฟังก์ชัน สำหรับคันหาสถานที่ ชื่อ searchPlace
		
		var PROVINCE=$("#PROVINCE_ID option:selected").text();
		
		var AddressSearch =PROVINCE;
		
		if(geocoder){ // ตรวจสอบว่าถ้ามี Geocoder Object 
			geocoder.geocode({
				 address:  AddressSearch// ให้ส่งชื่อสถานที่ไปค้นหา
			},function(results, status){ // ส่งกลับการค้นหาเป็นผลลัพธ์ และสถานะ
      			if(status == GGM.GeocoderStatus.OK) { // ตรวจสอบสถานะ ถ้าหากเจอ
					var my_Point=results[0].geometry.location; // เอาผลลัพธ์ของพิกัด มาเก็บไว้ที่ตัวแปร
					
					map.setCenter(my_Point); // กำหนดจุดกลางของแผนที่ไปที่ พิกัดผลลัพธ์
					my_Marker.setMap(map); // กำหนดตัว marker ให้ใช้กับแผนที่ชื่อ map					
					my_Marker.setPosition(my_Point); // กำหนดตำแหน่งของตัว marker เท่ากับ พิกัดผลลัพธ์
					map.setZoom(10);
					
					$("#namePlace").val(results[0].formatted_address);
					$("#lat_value").val(my_Point.lat());  // เอาค่า latitude พิกัดผลลัพธ์ แสดงใน textbox id=lat_value
					$("#lon_value").val(my_Point.lng());  // เอาค่า longitude พิกัดผลลัพธ์ แสดงใน textbox id=lon_value 
					$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu	 							
				}else{
					// ค้นหาไม่พบแสดงข้อความแจ้ง
					alert("Geocode was not successful for the following reason: " + status);
					//$("#namePlace").val("");// กำหนดค่า textbox id=namePlace ให้ว่างสำหรับค้นหาใหม่
				}
			});
		}		
	}
	
	var searchPlace2=function(){ // ฟังก์ชัน สำหรับคันหาสถานที่ ชื่อ searchPlace
		
		var PROVINCE=$("#PROVINCE_ID option:selected").text();
		
		if(PROVINCE=="กรุงเทพมหานคร"){
			var AMPHUR=$("#AMPHUR_ID option:selected").text();
				//PROVINCE=PROVINCE+AMPHUR;
			}else{
				var AMPHUR=$("#AMPHUR_ID option:selected").text();
				//PROVINCE=PROVINCE+AMPHUR;
			}

			var AddressSearch =AMPHUR+" "+PROVINCE;
		//alert(AddressSearch);
		
		if(geocoder){ // ตรวจสอบว่าถ้ามี Geocoder Object 
			geocoder.geocode({
				 address:  AddressSearch// ให้ส่งชื่อสถานที่ไปค้นหา
			},function(results, status){ // ส่งกลับการค้นหาเป็นผลลัพธ์ และสถานะ
      			if(status == GGM.GeocoderStatus.OK) { // ตรวจสอบสถานะ ถ้าหากเจอ
					var my_Point=results[0].geometry.location; // เอาผลลัพธ์ของพิกัด มาเก็บไว้ที่ตัวแปร
					map.setCenter(my_Point); // กำหนดจุดกลางของแผนที่ไปที่ พิกัดผลลัพธ์
					my_Marker.setMap(map); // กำหนดตัว marker ให้ใช้กับแผนที่ชื่อ map					
					my_Marker.setPosition(my_Point);
					map.setZoom(15); // กำหนดตำแหน่งของตัว marker เท่ากับ พิกัดผลลัพธ์
					$("#namePlace").val(results[0].formatted_address);
					$("#lat_value").val(my_Point.lat());  // เอาค่า latitude พิกัดผลลัพธ์ แสดงใน textbox id=lat_value
					$("#lon_value").val(my_Point.lng());  // เอาค่า longitude พิกัดผลลัพธ์ แสดงใน textbox id=lon_value 
					$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu	 							
				}else{
					// ค้นหาไม่พบแสดงข้อความแจ้ง
					alert("Geocode was not successful for the following reason: " + status);
					//$("#namePlace").val("");// กำหนดค่า textbox id=namePlace ให้ว่างสำหรับค้นหาใหม่
				}
			});
		}		
	}
	
	
	$("#PROVINCE_ID").change(function(){ // เมื่อคลิกที่ปุ่ม id=SearchPlace ให้ทำงานฟังก์ฃันค้นหาสถานที่
			searchPlace1();	// ฟังก์ฃันค้นหาสถานที่
		});
	
	$("#AMPHUR_ID").change(function(){ // เมื่อคลิกที่ปุ่ม id=SearchPlace ให้ทำงานฟังก์ฃันค้นหาสถานที่
			searchPlace2();	// ฟังก์ฃันค้นหาสถานที่
		});
	
	
	/*$("#namePlace").keyup(function(event){ // เมื่อพิมพ์คำค้นหาในกล่องค้นหา
		if(event.keyCode==13){	// 	ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter ให้เรียกฟังก์ชันค้นหาสถานที่
			searchPlace();		// ฟังก์ฃันค้นหาสถานที่
		}		
	});*/

});

google.maps.event.addDomListener(window, 'load', initialize());

</script> 




</body>
</html>
