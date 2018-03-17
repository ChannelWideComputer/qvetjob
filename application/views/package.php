<!DOCTYPE html>
<html lang="en">

<head>
	<base href="<?php echo asset_url()?>"/>
	<meta charset=utf-8>
	<meta http-equiv=X-UA-Compatible content="IE=edge">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name=description content="ผู้นำด้านบุคลากร ที่เชี่ยวชาญสัตวแพทย์">
	<meta name="keyword" content="ผู้นำด้านบุคลากร ที่เชี่ยวชาญสัตวแพทย์">
	<meta name=author content>

	<title>ผู้นำด้านบุคลากร ที่เชี่ยวชาญสัตวแพทย์</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Icons -->
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/shop-homepage.css" rel="stylesheet">

	<!-- Animate -->
	<link href="css/animate.css" rel="stylesheet">

	<!-- Bootsnav -->
	<link href="css/bootsnav.css" rel="stylesheet">

	<!-- Custom style -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bg.css" rel="stylesheet">
	<link href="css/d-text.css" rel="stylesheet">
	<link href="css/d-box.css" rel="stylesheet">
	<link href="css/dos-nav.css" rel="stylesheet">
	<link href="css/bootstrap-touch-slider.css" rel="stylesheet" media="all">
	<link href="css/dos-bt.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="css/bootstrap-select.min.css">
	<link rel="stylesheet" href="css/particles.css">
	<link rel="stylesheet" href="css/parallax.css?v=1001" type="text/css" />
	<link rel="stylesheet" href="css/table-responsive.css?v=1001">
	<link href='css/immersive-slider.css' rel='stylesheet' type='text/css'>
	<!-- pricing -->
	<link rel="stylesheet" href="css/jquery.flipster.css">
	<link rel="stylesheet" href="css/dos-socialbar.css">

	<!-- <link href="css/dos-checkbox.css" rel="stylesheet" media="all"> -->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<?php include("header.php");?>
	<?php include("navigator.php");?>






	<section class="d-padding">
		<div class="container">
			<div class="row">

				<div class="col-md-3">
					<?php include("h-menu.php");?>
				</div>
				<div class="col-md-9">

					<h2 class="sp-text-black page-header" style="text-align:left; margin:20px 0 20px 0; font-size:22px;">
						แพ็คเกจ
					</h2>

					<div class="wthree-special-grid">
						<div class="flipster">
							<ul>
								<?php for($i=1;$i<=9;$i++){ ?>
								<li>
									<div class="pricing">
										<div class="pricing-top green-top">
											<h3>Package A</h3>
											<p>แพคเกจเริ่มต้น</p>
										</div>
										<div class="pricing-bottom">
											<div class="pricing-bottom-top">
												<h3 class="red">30 วัน</h3>

											</div>
											<div class="pricing-bottom-bottom">

												<p><span>ลงตำแหน่งาน</span> ไม่จำกัด</p>  
												<p><span>สืบค้นใบสมัคร</span> ไม่จำกัด</p>  
												<p><span>ราคา</span> 500 บาท</p>  
												<p><span>Vat 7%</span> 35</p>  
												<p><span>ชำระสุทธิ</span> 535 บาท</p>  

											</div>
											<div class="buy-button">
												<a href=""><span class="glyphicon glyphicon-ok"></span> สั่งซื้</a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="pricing">
										<div class="pricing-top blue-top">
											<h3>Package B</h3>
											<p>แพคเกจเริ่มต้น</p>
										</div>
										<div class="pricing-bottom">
											<div class="pricing-bottom-top">
												<h3 class="red">30 วัน</h3>

											</div>
											<div class="pricing-bottom-bottom">

												<p><span>ลงตำแหน่งาน</span> ไม่จำกัด</p>  
												<p><span>สืบค้นใบสมัคร</span> ไม่จำกัด</p>  
												<p><span>ราคา</span> 500 บาท</p>  
												<p><span>Vat 7%</span> 35</p>  
												<p><span>ชำระสุทธิ</span> 535 บาท</p>  

											</div>
											<div class="buy-button">
												<a href=""><span class="glyphicon glyphicon-ok"></span> สั่งซื้</a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="pricing">
										<div class="pricing-top">
											<h3>Package C</h3>
											<p>แพคเกจเริ่มต้น</p>
										</div>
										<div class="pricing-bottom">
											<div class="pricing-bottom-top">
												<h3 class="red">30 วัน</h3>

											</div>
											<div class="pricing-bottom-bottom">

												<p><span>ลงตำแหน่งาน</span> ไม่จำกัด</p>  
												<p><span>สืบค้นใบสมัคร</span> ไม่จำกัด</p>  
												<p><span>ราคา</span> 500 บาท</p>  
												<p><span>Vat 7%</span> 35</p>  
												<p><span>ชำระสุทธิ</span> 535 บาท</p>  

											</div>
											<div class="buy-button">
												<a href=""><span class="glyphicon glyphicon-ok"></span> สั่งซื้</a>
											</div>
										</div>
									</div>
								</li>
								<?php } ?>


							</ul>
						</div>
					</div>
					<div class="clearfix"></div>

<br>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<?php include("footer.php");?>



		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Bootsnavs -->
		<script src="js/bootsnav.js"></script>

		<script src="js/jquery.touchSwipe.min.js"></script>


		<!-- Bootstrap bootstrap-touch-slider Slider Main JS File -->
		<script src="js/bootstrap-touch-slider.js"></script>

		<script type="text/javascript">
			$('#bootstrap-touch-slider').bsTouchSlider();
		</script>

		<script src="js/dos-bt.js"></script>
		<script src="js/SmoothScroll.min.js"></script>

		<script src="js/bootstrap-select.min.js"></script>


		<script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
		<script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#zav').localScroll(800);

  //.parallax(xPosition, speedFactor, outerHeight) options:
  //xPosition - Horizontal position of the element
  //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
  //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
  $('#bg_top').parallax("50%", 0.4);
  $('#bg_top01').parallax("50%", 0.4);
  $('#bg_recommended').parallax("50%", 0.4);

})
</script>

<script src="js/jarallax.js"></script>
<script type="text/javascript">
	/* init Jarallax */
	$('.jarallax').jarallax({
		speed: 0.5,
		imgWidth: 1366,
		imgHeight: 768
	})
</script>


<!-- pricing -->
<script src="js/jquery.flipster.js"></script>
<script>
	<!--

	$(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });

	-->
</script>
<!-- //pricing -->

</body>

</html>

