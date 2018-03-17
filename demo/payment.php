<!DOCTYPE html>
<html lang="en">

<head>

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
						เเจ้งชำระเงิน
					</h2>


<form class="wd_contact-from" id="frm_quatation" method="post" action="query_request.php">
   <input type="text" class="form-control sp-form" name="inv_No" id="inv_No" placeholder="เลขที่ใบสั่งซื้อ">
    
    
   <script>
      $(document).ready(function(){
        $('#inv_No').on('input',function(e){
          var inputV=$(this).val();
          


          $.post("inv_Chk.php",{inv:inputV,method:"inv_num"},function(chkInv){
           if(chkInv!=""){
            var strChk = chkInv.split("|");
            $("#inv_Price").val(strChk[0].trim())
            $("#inv_Name").val(strChk[1].trim())
          }else{
            $("#inv_Price").val("");
          }
          });


                  });
      });
    </script> 
    
    
   <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6">
   <input type="Number" class="form-control sp-form" name="inv_Price" id="inv_Price" readonly="" placeholder="ยอดเงินที่ต้องชำระ">
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
   <input class="form-control sp-form" type="text" name="payments_Money" id="payments_Money" placeholder="ยอดเงินที่โอน">
   </div>
   </div> 
    
    
    <input type="Name" class="form-control sp-form" id="inv_Name" name="member_Name" readonly="" placeholder="Name - Surname">
    
    
   
   <div class="row">
   <div class="col-lg-2 col-md-2 col-sm-2">
   <select name="Date" class="form-control sp-form">
    <option value="" selected="">Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
                                  </select>
   
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3">
   <select name="Month" class="form-control sp-form" size="1"> 
    <option value="" selected="">Month TH</option> 
    <option value="1">มกราคม</option><option value="2">กุมภาพันธ์</option><option value="3">มีนาคม</option><option value="4">เมษายน</option><option value="5">พฤษภาคม</option><option value="6">มิถุนายน</option><option value="7">กรกฎาคม</option><option value="8">สิงหาคม</option><option value="9">กันยายน</option><option value="10">ตุลาคม</option><option value="11">พฤศจิกายน</option><option value="12">ธันวาคม</option>  </select>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3">
   <select name="Year" class="form-control sp-form" size="1"> 
                      <option value="2559">2016 / 2559</option>
                    <option value="2558">2015 / 2558</option>
                    <option value="2557">2014 / 2557</option>
             
                                 
                                </select>
   </div>
   <div class="col-lg-2 col-md-3 col-sm-2">
   <select name="HourSel" class="form-control sp-form">
    <option value="" selected="">Hour</option> 
        
        <option value="0"> 0</option>
        
        <option value="1"> 1</option>
        
        <option value="2"> 2</option>
        
        <option value="3"> 3</option>
        
        <option value="4"> 4</option>
        
        <option value="5"> 5</option>
        
        <option value="6"> 6</option>
        
        <option value="7"> 7</option>
        
        <option value="8"> 8</option>
        
        <option value="9"> 9</option>
        
        <option value="10"> 10</option>
        
        <option value="11" selected=""> 11</option>
        
        <option value="12"> 12</option>
        
        <option value="13"> 13</option>
        
        <option value="14"> 14</option>
        
        <option value="15"> 15</option>
        
        <option value="16"> 16</option>
        
        <option value="17"> 17</option>
        
        <option value="18"> 18</option>
        
        <option value="19"> 19</option>
        
        <option value="20"> 20</option>
        
        <option value="21"> 21</option>
        
        <option value="22"> 22</option>
        
        <option value="23"> 23</option>
                              

    </select> 
                                  
   </div>
   
   <div class="col-lg-2 col-md-2 col-sm-2">
   <select name="minuSel" class="form-control sp-form">
    <option value="" selected="">minute</option> 
             
        <option value="0"> 0</option>
        
        <option value="1"> 1</option>
        
        <option value="2"> 2</option>
        
        <option value="3"> 3</option>
        
        <option value="4"> 4</option>
        
        <option value="5"> 5</option>
        
        <option value="6"> 6</option>
        
        <option value="7"> 7</option>
        
        <option value="8"> 8</option>
        
        <option value="9"> 9</option>
        
        <option value="10"> 10</option>
        
        <option value="11"> 11</option>
        
        <option value="12"> 12</option>
        
        <option value="13"> 13</option>
        
        <option value="14"> 14</option>
        
        <option value="15"> 15</option>
        
        <option value="16"> 16</option>
        
        <option value="17"> 17</option>
        
        <option value="18"> 18</option>
        
        <option value="19"> 19</option>
        
        <option value="20"> 20</option>
        
        <option value="21"> 21</option>
        
        <option value="22"> 22</option>
        
        <option value="23"> 23</option>
        
        <option value="24"> 24</option>
        
        <option value="25"> 25</option>
        
        <option value="26"> 26</option>
        
        <option value="27"> 27</option>
        
        <option value="28"> 28</option>
        
        <option value="29"> 29</option>
        
        <option value="30"> 30</option>
        
        <option value="31"> 31</option>
        
        <option value="32"> 32</option>
        
        <option value="33"> 33</option>
        
        <option value="34"> 34</option>
        
        <option value="35"> 35</option>
        
        <option value="36" selected=""> 36</option>
        
        <option value="37"> 37</option>
        
        <option value="38"> 38</option>
        
        <option value="39"> 39</option>
        
        <option value="40"> 40</option>
        
        <option value="41"> 41</option>
        
        <option value="42"> 42</option>
        
        <option value="43"> 43</option>
        
        <option value="44"> 44</option>
        
        <option value="45"> 45</option>
        
        <option value="46"> 46</option>
        
        <option value="47"> 47</option>
        
        <option value="48"> 48</option>
        
        <option value="49"> 49</option>
        
        <option value="50"> 50</option>
        
        <option value="51"> 51</option>
        
        <option value="52"> 52</option>
        
        <option value="53"> 53</option>
        
        <option value="54"> 54</option>
        
        <option value="55"> 55</option>
        
        <option value="56"> 56</option>
        
        <option value="57"> 57</option>
        
        <option value="58"> 58</option>
        
        <option value="59"> 59</option>
       
    </select> 

                                  
   </div>
   
   </div>  
        
   <div style="padding:2px; margin-bottom:10px;"> 
   <input type="radio" name="account_ID" id="account_ID7" value="7">
   <label for="account_ID7"><img src="images/bank9.png" width="18" height="18" alt=""> <span class="sp-text-body">ธนาคารไทยพาณิชย์</span></label>
   </div>

       
   <div style="padding:2px; margin-bottom:10px;"> 
   <input type="radio" name="account_ID" id="account_ID10" value="10">
   <label for="account_ID10"><img src="images/bank6.png" width="18" height="18" alt=""> <span class="sp-text-body">ธนาคารกสิกรไทย</span></label>
   </div>

       
   <div style="padding:2px; margin-bottom:10px;"> 
   <input type="radio" name="account_ID" id="account_ID18" value="18">
   <label for="account_ID18"><img src="images/bank10.png" width="18" height="18" alt=""> <span class="sp-text-body">ธนาคารกรุงเทพ</span></label>
   </div>

      



<input type="file" class="form-control sp-form sp-form d-margin" name="txbFile" value="Browse">
    
    
    
    
    
  <img src="images/Captcha-demo.gif" width="280" alt="" style="margin-bottom: 5px;">
    
   

    
     <div class="p-l" style="margin-bottom:20px;">   
    <input type="submit" class="btn btn-primary" value="ยืนยันส่งข้อมูล" style="margin-top: 5px;"> <button type="Reset" class="btn btn-primary" style="margin-top: 5px;">ล้างข้อมูลใหม่</button>
    </div>
    </form>

				
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

