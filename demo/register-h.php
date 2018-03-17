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
    <link rel="stylesheet" href="css/table-responsive.css?v=1001">
    <link rel="stylesheet" href="css/parallax.css?v=1001" type="text/css" />
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

            <!-- <div style="width: 100%;height: 2px; border-bottom: 7px double #9FA3AA;"></div> -->

            <div class="clearfix"> </div>
            <br>

            <div class="col-md-3">
               <h2 class="sp-text-black page-header" style="text-align:left; margin:20px 0 20px 0; font-size:22px;">
                  <span style="color:#ed4a29; font-size:1.2em; padding:3px;" class="glyphicon glyphicon-user"></span>
                  สมัครสมาชิก
              </h2>

              <div class="list-group">

                <a href="register-detail-h.php" class="list-group-item" title="โรงพยาบาลสัตว์"> 
                    <i class="fa fa-circle green" aria-hidden="true"></i> 
                    โรงพยาบาลสัตว์
                </a>

            </div>         
        </div>



        <div class="col-lg-9 col-md-9 col-sm-9">
            <h2 class="sp-text-black page-header" style="text-align:left; margin:20px 0 20px 0; font-size:22px;">
                โรงพยาบาลสัตว์
            </h2>

            <div class="clearfix"></div>

            <span class="red">*จำเป็น</span>


            <form class="wd_contact-from" id="frm_quatation" method="post" action="query_request.php">

                <div class="row">

                    <div class="col-lg-5 col-md-5 col-sm-6">
                      <div style="text-align:left; margin-bottom:10px;">
                       <img src="images/ex01.jpg" width="200" height="215" alt=""> 
                       <input type="file" class="form-control" name="txbFile" value="Browse" style="width:200px;">
                   </div>

               </div>

               <div class="col-lg-7 col-md-7 col-sm-6">

                <div class="form-group">
                  <label for="email">
                    อีเมล์ <span class="red" style="font-size: 20px;">*</span>
                </label>
                <input type="email" class="form-control" id="email">
            </div>

            <div class="form-group">
              <label for="email">
                Password <span class="red" style="font-size: 20px;">*</span>
            </label>
            <input type="email" class="form-control" id="email">
        </div>

        <div class="form-group">
          <label for="email">
            Confirm Password <span class="red" style="font-size: 20px;">*</span>
        </label>
        <input type="email" class="form-control" id="email">
    </div>

</div>

<div class="clearfix"></div>

<br>
<div class="col-md-12">
<div class="form-group">
    <label for="email">
        <h4>ผู้สมัคร</h4>
    </label>

</div>
</div>



<div class="col-md-2">
   <div class="form-group">
    <label for="email">
      คำนำหน้า <span class="red" style="font-size: 20px;">*</span>
  </label>
  <select class="form-control" id="sel1">
      <option value="">นาย</option>
      <option value="1">นาง</option>
      <option value="2">นางสาว</option>
  </select>
</div>
</div>

<div class="col-md-7">
 <div class="form-group">
  <label for="email">
    ชื่อ-นามสกุล <span class="red" style="font-size: 20px;">*</span>
</label>
<input type="email" class="form-control" id="email">
</div>
</div>


<div class="col-md-3">
   <div class="form-group">
    <label for="email">
      ชื่อเล่น <span class="red" style="font-size: 20px;">*</span>
  </label>
  <input type="email" class="form-control" id="email">
</div>
</div>


<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        ชื่อบริษัท/คลินิก/โรงพยาบาลสัตว์ <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        ที่อยู่ <span class="red" style="font-size: 20px;">*</span>
    </label>
</div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <select class="form-control" id="sel1">
        <option value="">จังหวัด</option>
        <option value="49">กระบี่</option>
        <option value="1">กรุงเทพฯ</option>
        <option value="14">กาญจนบุรี</option>
        <option value="66">กาฬสินธ์</option>
        <option value="41">กำแพงเพชร</option>
        <option value="65">ขอนแก่น</option>
        <option value="27">จันทบุรี</option>
        <option value="24">ฉะเชิงเทรา</option>
        <option value="25">ชลบุรี</option>
        <option value="7">ชัยนาท</option>
        <option value="64">ชัยภูมิ</option>
        <option value="44">ชุมพร</option>
        <option value="29">เชียงราย</option>
        <option value="30">เชียงใหม่</option>
        <option value="51">ตรัง</option>
        <option value="28">ตราด</option>
        <option value="39">ตาก</option>
        <option value="21">นครนายก</option>
        <option value="15">นครปฐม</option>
        <option value="63">นครพนม</option>
        <option value="72">นครราชสีมา</option>
        <option value="50">นครศรีธรรมราช</option>
        <option value="5">นครสวรรค์</option>
        <option value="3">นนทบุรี</option>
        <option value="56">นราธิวาส</option>
        <option value="33">น่าน</option>
        <option value="73">บุรีรัมย์</option>
        <option value="2">ปทุมธานี</option>
        <option value="20">ประจวบคีรีขันธ์</option>
        <option value="22">ปราจีนบุรี</option>
        <option value="55">ปัตตานี</option>
        <option value="32">พะเยา</option>
        <option value="47">พังงา</option>
        <option value="52">พัทลุง</option>
        <option value="42">พิจิตร</option>
        <option value="40">พิษณุโลก</option>
        <option value="19">เพชรบุรี</option>
        <option value="43">เพชรบูรณ์</option>
        <option value="36">แพร่</option>
        <option value="48">ภูเก็ต</option>
        <option value="68">มหาสารคาม</option>
        <option value="67">มุกดาหาร</option>
        <option value="31">แม่ฮ่องสอน</option>
        <option value="70">ยโสธร</option>
        <option value="57">ยะลา</option>
        <option value="69">ร้อยเอ็ด</option>
        <option value="45">ระนอง</option>
        <option value="26">ระยอง</option>
        <option value="16">ราชบุรี</option>
        <option value="8">ลพบุรี</option>
        <option value="34">ลำปาง</option>
        <option value="35">ลำพูน</option>
        <option value="59">เลย</option>
        <option value="75">ศรีสะเกษ</option>
        <option value="62">สกลนคร</option>
        <option value="54">สงขลา</option>
        <option value="53">สตูล</option>
        <option value="4">สมุทรปราการ</option>
        <option value="18">สมุทรสงคราม</option>
        <option value="17">สมุทรสาคร</option>
        <option value="23">สระแก้ว</option>
        <option value="11">สระบุรี</option>
        <option value="9">สิงหบุรี</option>
        <option value="38">สุโขทัย</option>
        <option value="13">สุพรรณบุรี</option>
        <option value="46">สุราษฎร์ธานี</option>
        <option value="74">สุรินทร์</option>
        <option value="58">หนองคาย</option>
        <option value="60">หนองบัวลำภู</option>
        <option value="12">อยุธยา</option>
        <option value="10">อ่างทอง</option>
        <option value="71">อำนาจเจริญ</option>
        <option value="61">อุดรธานี</option>
        <option value="37">อุตรดิตถ์</option>
        <option value="6">อุทัยธานี</option>
        <option value="76">อุบลราชธานี</option>
    </select>
</div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <select class="form-control" id="sel1">
        <option value="">เขต/อำเภอ</option>
        <option value="1">เขต/อำเภอ</option>
        <option value="2">เขต/อำเภอ</option>
    </select>
</div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <select class="form-control" id="sel1">
        <option value="">เเขวง/ตำบล</option>
        <option value="1">เเขวง/ตำบล</option>
        <option value="2">เเขวง/ตำบล</option>
    </select>
</div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <input type="Subject" class="form-control" id="" placeholder="ถนน">
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <input type="Subject" class="form-control" id="" placeholder="หมู่บ้าน">
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <input type="Subject" class="form-control" id="" placeholder="รหัสไปรษณีย์">
  </div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        Map Location <span class="red" style="font-size: 20px;">*</span>
    </label>
    <div id="map-wrapper"><div id="map"></div></div>
</div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        Map รูปภาพ <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="file" class="filestyle" data-buttonText="รูปภาพ" id="BSbtnwarning1" style="margin-bottom: 10px;">   

</div>
</div>



<div class="col-md-6">
   <div class="form-group">
    <label for="email">
       ใบประกอบวิชาชีพสัตวแพทย์
    </label>
    <input type="file" class="filestyle" data-buttonText="รูปภาพ" id="BSbtnwarning02-1" style="margin-bottom: 10px;"> 
</div>
</div>



<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        ใบจัดตั้ง <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="file" class="filestyle" data-buttonText="รูปภาพ" id="BSbtnwarning04" style="margin-bottom: 10px;"> 
</div>
</div>



<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        เลขประจำตัวผู้เสียภาษี/เลขที่บัตรประชาชน 
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        บัตรประชาชน <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="file" class="filestyle" data-buttonText="รูปภาพ" id="BSbtnwarning03" style="margin-bottom: 10px;"> 
</div>
</div>

<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        เบอร์โทรติดต่อ <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        Line@ หรือ ID Line
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>


<div class="col-md-12">
<div class="form-group">
    <label for="email">
        <h4>ข้อมูลรายละเอียดคลินิกหรือโรงพยาบาลสัตว์ <span class="red" style="font-size: 20px;">*</span></h4>
    </label>
    <br>
    <label for="email">
        เพื่อการจัดสรรบุคลากรที่เหมาะสมที่สุดกับทางคลินิกหรือโรงพยาบาลสัตว์ของท่าน
    </label>
</div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        <h4>เครื่องมือที่ทางโรงพยาบาลสัตว์ของท่านมี <span class="red" style="font-size: 20px;">*</span></h4>
    </label>
    <div class="checkbox">
        <label><input type="checkbox" name="optcheckbox">เครื่องตรวจ CBC</label>
    </div>
    <div class="checkbox form-inline">
        <label><input type="checkbox" name="optcheckbox">เครื่องตรวจ Blood chem</label>
    </div>
    <div class="checkbox form-inline">
        <label><input type="checkbox" name="optcheckbox">เครื่อง X-ray</label>
    </div>
    <div class="checkbox form-inline">
        <label><input type="checkbox" name="optcheckbox">เครื่อง Ultrasound</label>
    </div>
    <div class="checkbox form-inline">
        <label><input type="checkbox" name="optcheckbox">เครื่องดมยา</label>
    </div>
    <div class="checkbox form-inline">
        <label><input type="checkbox" name="optcheckbox">ไม่มี</label>
    </div>
    <div class="checkbox form-inline">
        <label><input type="checkbox" name="optcheckbox">อื่นๆ <input type="email" class="form-control" id="email"></label>
    </div>
</div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        <h4>จำนวนคุณหมอประจำคลีนิกของท่านในเเต่ละวัน <span class="red" style="font-size: 20px;">*</span></h4>
            ถ้าคลีนิกเเบ่งเป็นหลายๆฝ่าย สามารถบรรยายได้ เพื่อการคัดสรรบุคลากรให้ท่านอย่างตรงตามความต้องการ
    </label>
    <textarea class="form-control" name="Message" required="" style="height: 100px;"></textarea>
</div>
</div>

<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        ราคาคิดเฉลียต่อเคส <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>


<div class="col-md-12">
   <div class="form-group">
    <label for="email">
       เวลาเปิด-ปิด คลีนิกของท่าน <span class="red" style="font-size: 20px;">*</span>
   </label>

</div>
</div>

<div class="col-md-3">
   <div class="form-group">
    <label for="email">
        เปิด 
    </label>
    <input id="time" type="time" class="form-control">
</div>
</div>

<div class="col-md-3">
   <div class="form-group">
    <label for="email">
        ปิด 
    </label>
    <input id="time" type="time" class="form-control">
</div>
</div>




<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        <h4>ชื่อ,ที่อยู่,เบอร์โทรคลินิก/โรงพยาบาลสัตว์ที่ต้องการส่งบุคลากรไปทำงาน</h4>
        ถ้ามีหลายสาขา โปรดระบุสาขาที่ต้องการ <span class="red" style="font-size: 20px;">*</span>
    </label>
    <div class="radio">
        <label><input type="radio" name="optradio">ที่เดียวกับด้านบน</label>
    </div>
    <div class="radio form-inline">
        <label><input type="radio" name="optradio">อื่นๆ:</label>
    </div>
</div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
ชื่อที่อยู่ที่ต้องการส่งบุคลากรไปทำงาน<span class="red" style="font-size: 20px;">*</span>
</label>
</div>
</div>

<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        ชื่อโรงพยาบาลสัตว์/สาขา  <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        ที่อยู่ <span class="red" style="font-size: 20px;">*</span>
    </label>
</div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <select class="form-control" id="sel1">
        <option value="">จังหวัด</option>
        <option value="49">กระบี่</option>
        <option value="1">กรุงเทพฯ</option>
        <option value="14">กาญจนบุรี</option>
        <option value="66">กาฬสินธ์</option>
        <option value="41">กำแพงเพชร</option>
        <option value="65">ขอนแก่น</option>
        <option value="27">จันทบุรี</option>
        <option value="24">ฉะเชิงเทรา</option>
        <option value="25">ชลบุรี</option>
        <option value="7">ชัยนาท</option>
        <option value="64">ชัยภูมิ</option>
        <option value="44">ชุมพร</option>
        <option value="29">เชียงราย</option>
        <option value="30">เชียงใหม่</option>
        <option value="51">ตรัง</option>
        <option value="28">ตราด</option>
        <option value="39">ตาก</option>
        <option value="21">นครนายก</option>
        <option value="15">นครปฐม</option>
        <option value="63">นครพนม</option>
        <option value="72">นครราชสีมา</option>
        <option value="50">นครศรีธรรมราช</option>
        <option value="5">นครสวรรค์</option>
        <option value="3">นนทบุรี</option>
        <option value="56">นราธิวาส</option>
        <option value="33">น่าน</option>
        <option value="73">บุรีรัมย์</option>
        <option value="2">ปทุมธานี</option>
        <option value="20">ประจวบคีรีขันธ์</option>
        <option value="22">ปราจีนบุรี</option>
        <option value="55">ปัตตานี</option>
        <option value="32">พะเยา</option>
        <option value="47">พังงา</option>
        <option value="52">พัทลุง</option>
        <option value="42">พิจิตร</option>
        <option value="40">พิษณุโลก</option>
        <option value="19">เพชรบุรี</option>
        <option value="43">เพชรบูรณ์</option>
        <option value="36">แพร่</option>
        <option value="48">ภูเก็ต</option>
        <option value="68">มหาสารคาม</option>
        <option value="67">มุกดาหาร</option>
        <option value="31">แม่ฮ่องสอน</option>
        <option value="70">ยโสธร</option>
        <option value="57">ยะลา</option>
        <option value="69">ร้อยเอ็ด</option>
        <option value="45">ระนอง</option>
        <option value="26">ระยอง</option>
        <option value="16">ราชบุรี</option>
        <option value="8">ลพบุรี</option>
        <option value="34">ลำปาง</option>
        <option value="35">ลำพูน</option>
        <option value="59">เลย</option>
        <option value="75">ศรีสะเกษ</option>
        <option value="62">สกลนคร</option>
        <option value="54">สงขลา</option>
        <option value="53">สตูล</option>
        <option value="4">สมุทรปราการ</option>
        <option value="18">สมุทรสงคราม</option>
        <option value="17">สมุทรสาคร</option>
        <option value="23">สระแก้ว</option>
        <option value="11">สระบุรี</option>
        <option value="9">สิงหบุรี</option>
        <option value="38">สุโขทัย</option>
        <option value="13">สุพรรณบุรี</option>
        <option value="46">สุราษฎร์ธานี</option>
        <option value="74">สุรินทร์</option>
        <option value="58">หนองคาย</option>
        <option value="60">หนองบัวลำภู</option>
        <option value="12">อยุธยา</option>
        <option value="10">อ่างทอง</option>
        <option value="71">อำนาจเจริญ</option>
        <option value="61">อุดรธานี</option>
        <option value="37">อุตรดิตถ์</option>
        <option value="6">อุทัยธานี</option>
        <option value="76">อุบลราชธานี</option>
    </select>
</div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <select class="form-control" id="sel1">
        <option value="">เขต/อำเภอ</option>
        <option value="1">เขต/อำเภอ</option>
        <option value="2">เขต/อำเภอ</option>
    </select>
</div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <select class="form-control" id="sel1">
        <option value="">เเขวง/ตำบล</option>
        <option value="1">เเขวง/ตำบล</option>
        <option value="2">เเขวง/ตำบล</option>
    </select>
</div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <input type="Subject" class="form-control" id="" placeholder="ถนน">
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <input type="Subject" class="form-control" id="" placeholder="หมู่บ้าน">
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
      <input type="Subject" class="form-control" id="" placeholder="รหัสไปรษณีย์">
  </div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        Map Location <span class="red" style="font-size: 20px;">*</span>
    </label>
    <div id="map-wrapper"><div id="map02"></div></div>
</div>
</div>

<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        Map รูปภาพ <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="file" class="filestyle" data-buttonText="รูปภาพ" id="BSbtnwarning05" style="margin-bottom: 10px;">   

</div>
</div>


<div class="col-md-6">
   <div class="form-group">
    <label for="email">
        เบอร์โทรติดต่อ <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>



<div class="col-md-12">
   <div class="form-group">
    <label for="email">
       เวลาเปิด-ปิด คลีนิกของท่าน <span class="red" style="font-size: 20px;">*</span>
   </label>

</div>
</div>

<div class="col-md-3">
   <div class="form-group">
    <label for="email">
        เปิด 
    </label>
    <input id="time" type="time" class="form-control">
</div>
</div>

<div class="col-md-3">
   <div class="form-group">
    <label for="email">
        ปิด 
    </label>
    <input id="time" type="time" class="form-control">
</div>
</div>
<div class="col-md-12">
   <div class="form-group">
    <button type="submit" class="button01 btn btn-info" style="padding:6px 25px; margin-top:0px;">
     <span class="glyphicon glyphicon-plus-sign"></span> เพิ่มสาขา</button>
 </div>
</div>
<br>
<div class="col-md-12">
   <div class="form-group">
    <label for="email">
        <h4>ชื่อที่อยู่ออกบิล/ใบเสร็จ *</h4>
    </label>
    <div class="radio">
        <label><input type="radio" name="optradio">ที่เดียวกับชื่อที่อยู่ด้านบนสุด</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio">ที่เดียวกับชื่อโรงพยาบาลสัตว์ตามสาขา</label>
    </div>
   
</div>
</div>


</div>
<div class="clearfix"></div>

<img src="images/Captcha-demo.gif" width="280" alt="" style="margin-bottom: 5px;">




<div class="p-l" style="margin-bottom:20px;">   
    <input type="submit" class="btn btn-info" value="สมัครสมาชิก" style="margin-top: 5px;"> <button type="Reset" class="btn btn-info" style="margin-top: 5px;">ล้างข้อมูล</button>
</div>
</form>
<div class="clearfix"></div>
</div> 





<div class="clearfix"> </div>
<br>
<!-- <div style="width: 100%;height: 2px; border-bottom: 7px double #9FA3AA;"></div> -->

<div class="clearfix"> </div>


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


<script src="http://maps.google.com/maps/api/js?key=AIzaSyD0s6nTQGE0Fb0kduJOGAWcTXlVYn-oO_c"></script>

<script type="text/javascript">
 (function($) {
    "use strict";
    var locations = [
    ['<div class="wd_info-contact"><h3 class="text-success">charmer</h3><span style="color: #333;">ที่อยู่ : 89/27 หมู่บ้านศุภาลัย วิลล์ ซ.พหลโยธิน52 แยก27<br> <br>เบอร์โทรศัพท์ :  089-532-0346 <br>ไอดีไลน์ : charmer <br>เฟสบุ๊ค : www.facebook.com/charmer<br>อีเมล์ : charmer@hotmail.com  </span></div></div></div>', 13.7422737,100.6011265]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
       zoom: 10,
       scrollwheel: false,
       navigationControl: true,
       mapTypeControl: false,
       scaleControl: false,
       draggable: true,
       styles:[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"hue":"#ffe500"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station.airport","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#9bdffb"},{"visibility":"on"}]}],
       center: new google.maps.LatLng(13.7422737,100.6011265),
       mapTypeId: google.maps.MapTypeId.ROADMAP
   });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  

       marker = new google.maps.Marker({ 
          position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
          map: map ,
          icon: 'images/pin01.png?v=1001'
      });


       google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
             infowindow.setContent(locations[i][0]);
             infowindow.open(map, marker);
         }
     })(marker, i));
   }
})(jQuery);
</script>
<script type="text/javascript">
 (function($) {
    "use strict";
    var locations = [
    ['<div class="wd_info-contact"><h3 class="text-success">charmer</h3><span style="color: #333;">ที่อยู่ : 89/27 หมู่บ้านศุภาลัย วิลล์ ซ.พหลโยธิน52 แยก27<br> <br>เบอร์โทรศัพท์ :  089-532-0346 <br>ไอดีไลน์ : charmer <br>เฟสบุ๊ค : www.facebook.com/charmer<br>อีเมล์ : charmer@hotmail.com  </span></div></div></div>', 13.7422737,100.6011265]
    ];

    var map = new google.maps.Map(document.getElementById('map02'), {
       zoom: 10,
       scrollwheel: false,
       navigationControl: true,
       mapTypeControl: false,
       scaleControl: false,
       draggable: true,
       styles:[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"hue":"#ffe500"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station.airport","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#9bdffb"},{"visibility":"on"}]}],
       center: new google.maps.LatLng(13.7422737,100.6011265),
       mapTypeId: google.maps.MapTypeId.ROADMAP
   });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  

       marker = new google.maps.Marker({ 
          position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
          map: map ,
          icon: 'images/pin01.png?v=1001'
      });


       google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
             infowindow.setContent(locations[i][0]);
             infowindow.open(map, marker);
         }
     })(marker, i));
   }
})(jQuery);
</script>
<script type="text/javascript">
 (function($) {
    "use strict";
    var locations = [
    ['<div class="wd_info-contact"><h3 class="text-success">charmer</h3><span style="color: #333;">ที่อยู่ : 89/27 หมู่บ้านศุภาลัย วิลล์ ซ.พหลโยธิน52 แยก27<br> <br>เบอร์โทรศัพท์ :  089-532-0346 <br>ไอดีไลน์ : charmer <br>เฟสบุ๊ค : www.facebook.com/charmer<br>อีเมล์ : charmer@hotmail.com  </span></div></div></div>', 13.7422737,100.6011265]
    ];

    var map = new google.maps.Map(document.getElementById('map03'), {
       zoom: 10,
       scrollwheel: false,
       navigationControl: true,
       mapTypeControl: false,
       scaleControl: false,
       draggable: true,
       styles:[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"hue":"#ffe500"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station.airport","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#9bdffb"},{"visibility":"on"}]}],
       center: new google.maps.LatLng(13.7422737,100.6011265),
       mapTypeId: google.maps.MapTypeId.ROADMAP
   });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  

       marker = new google.maps.Marker({ 
          position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
          map: map ,
          icon: 'images/pin01.png?v=1001'
      });


       google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
             infowindow.setContent(locations[i][0]);
             infowindow.open(map, marker);
         }
     })(marker, i));
   }
})(jQuery);
</script>
<script src=js/ekko-lightbox.js></script>
<script type=text/javascript>$(document).on("click",'[data-toggle="lightbox"]',function(a){a.preventDefault();$(this).ekkoLightbox()});</script>
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script> 
<script> 

  $('#BSbtnwarning00').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
});
  $('#BSbtnwarning').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
});
  $('#BSbtnwarning1').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
});
  $('#BSbtnwarning01').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
});
  $('#BSbtnwarning02').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning01-1').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
});
  $('#BSbtnwarning02-1').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning03').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning04').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning05').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning06').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning07').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning08').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning09').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning10').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning11').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning12').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning13').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnwarning14').filestyle({ 
    buttonName : 'btn-warning', 
    buttonText : 'Choose file' 
}); 
  $('#BSbtnsuccess').filestyle({ 
    buttonName : 'btn-success', 
    buttonText : 'รูปภาพประกอบ' 
}); 
  $('#BSbtninfo').filestyle({ 
    buttonName : 'btn-info', 
    buttonText : ' Select a File' 
}); 
  $('#icondemo').filestyle({ 
    buttonText : 'แกลอรี่', 
    buttonName : 'btn-danger' 
}); 
</script>


</body>

</html>

