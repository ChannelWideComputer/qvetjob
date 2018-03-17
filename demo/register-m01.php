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
  <link rel="stylesheet" href="css/jquery.datetimepicker.css">


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

           <a href="register-detail-m01.php" class="list-group-item" title="ตำเเหน่งงาน"> 
            <i class="fa fa-circle green" aria-hidden="true"></i> 
            สัตวแพทย์
          </a>
          <a href="register-detail-m02.php" class="list-group-item" title="แพ็คเกจ"> 
            <i class="fa fa-circle green" aria-hidden="true"></i> 
            ผู้ช่วยสัตวแพทย์/พนักงานตัดขน
          </a>


        </div>         
      </div>



      <div class="col-lg-9 col-md-9 col-sm-9">
        <h2 class="sp-text-black page-header" style="text-align:left; margin:20px 0 20px 0; font-size:22px;">
          สัตวแพทย์
        </h2>

        <div class="clearfix"></div>

        <span class="red">*จำเป็น</span>

        <br>
        <form class="wd_contact-from" id="frm_quatation" method="post" action="query_request.php">

          <div class="row">

            <div class="col-lg-5 col-md-5 col-sm-6">
              <div style="text-align:left; margin-bottom:10px;">
               <img src="images/ex.jpg" width="200" height="215" alt=""> 
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
        วัน/เดือน/ปีเกิด <span class="red" style="font-size: 20px;">*</span>
      </label>
      <input class="form-control" type="text" name="testdate5" id="testdate5" value="">
    </div>
  </div>

  <div class="col-md-6">
   <div class="form-group">
    <label for="email">
      อายุ <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="email" class="form-control" id="email">
  </div>
</div>

<div class="col-md-12">
 <div class="form-group">
  <label for="email">
   เลขบัตรประจำตัวประชาชน  <span class="red" style="font-size: 20px;">*</span>
 </label>
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
  
   <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
  
   <input type="file" class="filestyle" data-buttonText="รูปภาพ" id="BSbtnwarning00" style="margin-bottom: 10px;"> 
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
  <label for="email">
   ใบอนุญาตประกอบวิชาชีพ <span class="red" style="font-size: 20px;">*</span>
 </label>
 <div class="form-group">
   <input type="file" class="filestyle" data-buttonText="รูปภาพ" id="BSbtnwarning" style="margin-bottom: 10px;">   
 </div>           
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
  <label for="email">
    หน้าสมุดธนาคารรับเงินค่าจ้าง <span class="red" style="font-size: 20px;">*</span>
  </label>
  <div class="form-group">
    <input type="file" class="filestyle" data-buttonText="" id="BSbtnwarning01" style="margin-bottom: 10px;"> 
  </div>           
</div>
</div>





<div class="col-md-12">
 <div class="form-group">
  <label for="email">
    ที่อยู่ตามบัตรประชาชน <span class="red" style="font-size: 20px;">*</span>
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
    ที่อยู่ปัจจุบัน(ติดต่อกลับได้) <span class="red" style="font-size: 20px;">*</span>
  </label>
  <div class="checkbox">
    <label><input type="checkbox" value=""> ใช้ที่อยู่เดียวกับด้านบน</label>
  </div>
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
    Id line <span class="red" style="font-size: 20px;">*</span>
  </label>
  <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
  <label for="email">
    เฟสบุ๊ค <span class="red" style="font-size: 20px;">*</span>
  </label>
  <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-12">
 <div class="form-group">
  <label for="email">
    การศึกษา(สถาบันการศึกษา/ปีที่จบ/ศึกษาต่อ) <span class="red" style="font-size: 20px;">*</span>
  </label>

</div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12">
  <div class="form-group">
    <label for="email">
      <b>ปริญญาตรี</b>
    </label>
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="สถาบันการศึกษา">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="สาขาวิชา">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="ปีจบ">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="เกรดเฉลี่ย">
  </div>
</div>


<div class="col-lg-12 col-md-12 col-sm-12">
  <div class="form-group">
    <label for="email">
      <b>ศึกษาต่อ</b>
    </label>
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="สถาบันการศึกษา">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="สาขาวิชา">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="ปีจบ">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="checkbox">
    <label><input type="checkbox" value=""> กำลังศึกษา</label>
  </div>
</div>
<div class="clearfix"></div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="เกรดเฉลี่ย">
  </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
  <button type="submit" class="button01 btn btn-info" style="padding:6px 25px; margin-top:0px;">
   <span class="glyphicon glyphicon-plus-sign"></span> เพิ่มการศึกษา</button>
 </div>
 <div class="clearfix"></div>
 <br>
 <div class="col-md-12">
 <div class="form-group">
  <label for="email">
    <h4>ประสบการณ์การทำงานของท่าน *</h4>
    ท่านเคยทำงานอาชีพใด , บริเวณไหนหรือจังหวัดไหน , ระยะเวลาการทำงานของแต่ละที่ โปรดระบุด้านล่าง (ระบุได้หลายที่ ทั้งหมดที่เคยทำมา)
  </label>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="อาชีพ">
  </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
  <div class="form-group">
    <input type="Subject" class="form-control" id="" placeholder="สถานที่">
  </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
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
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
   <label for="email">
    เริ่ม <span class="red" style="font-size: 20px;">*</span>
  </label>
  <input class="form-control" type="text" name="testdate5" id="testdate6" value="">
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <label for="email">
      ถึง <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input class="form-control" type="text" name="testdate5" id="testdate7" value="">
  </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
  <button type="submit" class="button01 btn btn-info" style="padding:6px 25px; margin-top:0px;">
   <span class="glyphicon glyphicon-plus-sign"></span> เพิ่มประสบการณ์การทำงาน</button>
 </div>
 <div class="clearfix"></div>
 <br>


 <div class="col-lg-12">

  <h4>ทักษะที่ท่านสามารถทำได้(เลือกได้หลายข้อ) *</h4>
  <label for="email"> ตอบตามความเป็นจริงค่ะ ใช้พิจราณาในการไปอยู่คลินิกและโรงพยาบาลสัตว์ของแต่ละที่ ตรงอื่นๆสามารถระบุเพิ่มเติมได้ค่ะ</label>
  <br>

  <div class="checkbox">
    <label><input type="checkbox" value="">ตรวจรักษาโรคทั่วไป</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">เย็บแผล</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">CPR</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">สอดท่อEndo, แทงเส้น</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ผ่าตัดทำหมัน หมา แมว ตัวผู้ ตัวเมีย</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ขูดหินปูน</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ผ่าตัดกระเพาะปัสสาวะ นิ่ว</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">Cryptorchid</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">remove mass แบบง่าย</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ผ่าตัดมดลูกอัดเสบ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ศัลกรรมตาแบบง่าย (Third eyelid flap, Conjunctival flap)</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ผ่าคลอด</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">กระบังลมฉีกขาด</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ผ่าตัดช่องอกทะลุ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ผ่าเลาะเต้านม</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ผ่าตัดกระเพาะบิด</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ควักตา</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ตัดขา</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ผ่าตัดกระดูก</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ตัดต่อลำไส้</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">Pancreatic mass</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">Mass ในช่องท้อง หรือ ช่องอก</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">แปลงเพศ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ใช้เครื่อง ventilators เป็น</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">วางยาสลบ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">เคยใช้เครื่องตรวจเลือด Biood chem</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">เคยใช้เครื่องตรวจเลือด CBC</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">เคยใช้เครื่อง X-ray</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">เคยใช้เครื่อง Ultrasound</label>
  </div>
  <div class="checkbox form-inline">
    <label><input type="checkbox" value="">เฉพาะทาง: <input type="email" class="form-control" id="email"></label>
  </div>
  <div class="checkbox form-inline">
    <label><input type="checkbox" value="">ความสามารภเพิ่มเติม: <span class="red">(ยิ่งเยอะยิ่งเพื่มโอกาสสำหรับคุณ)</span></label>
  </div>
  <textarea class="form-control d-margin" id="message" placeholder="" style="height:150px;"></textarea>

</div>


<div class="col-lg-12">
  <h4>ทักษะพิเศษของท่าน (5=มาก , 1=น้อย)</h4>
</div>

<div class="clearfix"></div>
<br>
<div class="col-lg-12">
  <table class="table-res table table-bordered table-striped text_time01" cellpadding="0" cellspacing="1" >
    <thead>
      <tr>

        <th class="back" style="text-align: center;"></th>
        <th class="back" style="text-align: center;">5</th>
        <th class="back" style="text-align: center;">4</th>
        <th class="back" style="text-align: center;">3</th>
        <th class="back" style="text-align: center;">2</th>
        <th class="back" style="text-align: center;">1</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">มนุษยสัมพันธ์ดี</td>
        <td class="table01" data-label="5"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="4"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="3"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="2"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="1"><input type="radio" name="optradio"></td>
      </tr>
      <tr>
        <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">สื่อสารดี , ใช้คำพูดเป็น</td>
        <td class="table01" data-label="5"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="4"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="3"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="2"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="1"><input type="radio" name="optradio"></td>
      </tr>
      <tr>
        <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">การใช้ภาษาอังกฤษ</td>
        <td class="table01" data-label="5"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="4"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="3"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="2"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="1"><input type="radio" name="optradio"></td>
      </tr>
      <tr>
        <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">แก้ปัญหาเฉพาะหน้าได้</td>
        <td class="table01" data-label="5"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="4"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="3"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="2"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="1"><input type="radio" name="optradio"></td>
      </tr>
      <tr>
        <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">ความรู้วิชาการ</td>
        <td class="table01" data-label="5"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="4"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="3"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="2"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="1"><input type="radio" name="optradio"></td>
      </tr>
      <tr>
        <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">ละเอียดรอบคอบ</td>
        <td class="table01" data-label="5"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="4"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="3"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="2"><input type="radio" name="optradio"></td>
        <td class="table01" data-label="1"><input type="radio" name="optradio"></td>
      </tr>

    </tbody>
  </table>
</div>

<div class="col-lg-12">
  <br>
  <h4>ท่านสนใจทำงานบริเวณใด(เลือกได้มากกว่า 1 ข้อ)</h4>

  <div class="checkbox">
    <label><input type="checkbox" value="">ทั่วเขตกรุงเทพ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">กรุงเทพและปริมณฑล</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">ทุกจังหวัดของประเทศไทย</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">กรุงเทพ(เฉพาะเขต) 

      <select class="selectpicker" data-style="btn-default from-lo" multiple data-max-options="77" data-live-search="true" title="เขต">


        <option value="">เขตพระนคร</option>
        <option value="">เขตดุสิต</option>
        <option value="">เขตหนองจอก</option>
        <option value="">เขตบางรัก</option>
        <option value="">เขตบางเขน</option>
        <option value="">เขตบางกะปิ</option>
        <option value="">เขตปทุมวัน</option>
        <option value="">เขตป้อมปราบศัตรูพ่าย</option>
        <option value="">เขตพระโขนง</option>
        <option value="">เขตมีนบุรี</option>
        <option value="">เขตลาดกระบัง</option>
        <option value="">เขตยานนาวา</option>
        <option value="">เขตสัมพันธวงศ์</option>
        <option value="">เขตพญาไท</option>
        <option value="">เขตธนบุรี</option>
        <option value="">เขตบางกอกใหญ่</option>
        <option value="">เขตห้วยขวาง</option>
        <option value="">เขตคลองสาน</option>
        <option value="">เขตตลิ่งชัน</option>
        <option value="">เขตบางกอกน้อย</option>
        <option value="">เขตบางขุนเทียน</option>
        <option value="">เขตภาษีเจริญ</option>
        <option value="">เขตหนองแขม</option>
        <option value="">เขตราษฎร์บูรณะ</option>
        <option value="">เขตบางพลัด</option>
        <option value="">เขตดินแดง</option>
        <option value="">เขตบึงกุ่ม</option>
        <option value="">เขตสาทร</option>
        <option value="">เขตบางซื่อ</option>
        <option value="">เขตจตุจักร</option>
        <option value="">เขตบางคอแหลม</option>
        <option value="">เขตประเวศ</option>
        <option value="">เขตคลองเตย</option>
        <option value="">เขตสวนหลวง</option>
        <option value="">เขตจอมทอง</option>
        <option value="">เขตดอนเมือง</option>
        <option value="">เขตราชเทวี</option>
        <option value="">เขตลาดพร้าว</option>
        <option value="">เขตวัฒนา</option>
        <option value="">เขตบางแค</option>
        <option value="">เขตหลักสี่</option>
        <option value="">เขตสายไหม</option>
        <option value="">เขตคันนายาว</option>
        <option value="">เขตสะพานสูง</option>
        <option value="">เขตวังทองหลาง</option>
        <option value="">เขตคลองสามวา</option>
        <option value="">เขตบางนา</option>
        <option value="">เขตทวีวัฒนา</option>
        <option value="">เขตทุ่งครุ</option>
        <option value="">เขตบางบอน </option>


      </select>

    </label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">จังหวัด(เฉพาะจังหวัด) 

      <style type="text/css">
      .from-lo{
        height:34px;
      }
      .bootstrap-select>.dropdown-toggle {
        width: 100%;
        padding-right: 25px;
        font-size: 14px;
        color: #777777;
      }
    </style>

    <select class="selectpicker" data-style="btn-default from-lo" multiple data-max-options="77" data-live-search="true" title="จังหวัด">


     <option value="49">กระบี่</option>
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
 </label>
</div>

</div>


<div class="col-lg-12">
  <h4>ท่านสนใจทำงานแบบใด</h4>
  <div class="radio">
    <label><input type="radio" name="optradio">Part time</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="optradio">Full time</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="optradio">ทั้ง Part time และ Full time</label>
  </div>
</div>



<div class="col-lg-12">
  <h4>ท่านสนใจทำงานวันไหนมากที่สุด สำหรับท่านที่เลือกแบบ Part time (ตอบได้หลายข้อ)</h4>
  ทางบริษัทจะเก็บเป็นข้อมูลไว้ เพื่อบางครั้งทางบริษัทจะติดต่อไปหาท่านโดยตรงในวันที่ท่านเลือก <br class="visible-lg">
  โอกาสการได้งานของท่านจะเพิ่มขึ้น โดยไม่ต้องแย่งชิงกับคนอื่นๆ

  <br>

  <div class="checkbox">
    <label><input type="checkbox" value="">วันจันทร์</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">วันอังคาร</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">วันพุธ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">วันพฤหัส</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">วันศุกร์</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">วันเสาร์</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" value="">วันอาทิตย์</label>
  </div>

</div>



<div class="col-lg-12">
  <h4>วันหยุดพิเศษ / เทศกาล ท่านสามารถทำงานได้หรือไม่</h4>
  ถ้าท่านทำได้ โอกาสได้งานจากคลินิกและโรงพยาบาลสัตว์จะเพิ่มขึ้น เนื่องจากเป็นช่วงที่ต้องการบุคลากรเยอะ

  <br>

  <div class="radio">
    <label><input type="radio" name="optradio">ได้</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="optradio">ไม่ได้</label>
  </div>
  <div class="radio form-inline">
    <label><input type="radio" name="optradio">อื่นๆ: <input type="email" class="form-control" id="email"></label>
  </div>

</div>

<div class="col-lg-12">


  <h4>สมมติ มีเคสเข้ามารักษาและเกิดเสียชีวิต ท่านจะแจ้งเจ้าของเคสว่าอย่างไร <br>ถ้าเจ้าของเคสเป็นคนค่อนข้างละเอียดและมีอิทธิพลต่อสังคม *</h4>
  สมมติ สาเหตุการเสียชีวิตได้ตามประสบการณ์หรือความถนัดในการรักษาได้เลยค่ะ ตอบได้ตั้งแต่ระยะก่อนรักษา <br>ระหว่างรักษา และหลังจากเสียชีวิตแล้ว ว่าควรแจ้งอย่างไร

  <br>

</div>

<div class="col-md-12">
 <div class="form-group">
  <textarea class="form-control" name="Message" required="" style="height: 100px;"></textarea>
</div>
</div>

<div class="col-lg-12">
  <div class="form-group">
    <label for="email">
      รายละเอียดอื่นๆเพิ่มเติม (ถ้ามี) <span class="red" style="font-size: 20px;">*</span>
    </label>
    <textarea class="form-control" name="Message" required="" style="height: 100px;"></textarea>
  </div>
</div>

<div class="col-lg-12">
  <div class="form-group">
    <label for="email">
      ข้อเสนอแนะเพิ่มเติม <span class="red" style="font-size: 20px;">*</span>
    </label>
    <textarea class="form-control" name="Message" required="" style="height: 100px;"></textarea>
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
  $('#BSbtnwarning01').filestyle({ 
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

<script src="js/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">   
$(function(){
  
  $.datetimepicker.setLocale('th'); // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
  
  // กรณีใช้แบบ inline
    $("#testdate4").datetimepicker({
        timepicker:false,
        format:'d-m-Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000      
        lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
    inline:true  
    });       
  
  
  // กรณีใช้แบบ input
    $("#testdate5").datetimepicker({
        timepicker:false,
        format:'d-m-Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000      
        lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
    onSelectDate:function(dp,$input){
      var yearT=new Date(dp).getFullYear()-0;  
      var yearTH=yearT+543;
      var fulldate=$input.val();
      var fulldateTH=fulldate.replace(yearT,yearTH);
      $input.val(fulldateTH);
    },
    });       
  // กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
  $("#testdate5").on("mouseenter mouseleave",function(e){
    var dateValue=$(this).val();
    if(dateValue!=""){
        var arr_date=dateValue.split("-"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
        // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
        //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0 
        if(e.type=="mouseenter"){
          var yearT=arr_date[2]-543;
        }   
        if(e.type=="mouseleave"){
          var yearT=parseInt(arr_date[2])+543;
        } 
        dateValue=dateValue.replace(arr_date[2],yearT);
        $(this).val(dateValue);                         
    }   
  });

  // กรณีใช้แบบ input
    $("#testdate6").datetimepicker({
        timepicker:false,
        format:'d-m-Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000      
        lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
    onSelectDate:function(dp,$input){
      var yearT=new Date(dp).getFullYear()-0;  
      var yearTH=yearT+543;
      var fulldate=$input.val();
      var fulldateTH=fulldate.replace(yearT,yearTH);
      $input.val(fulldateTH);
    },
    });       
  // กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
  $("#testdate6").on("mouseenter mouseleave",function(e){
    var dateValue=$(this).val();
    if(dateValue!=""){
        var arr_date=dateValue.split("-"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
        // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
        //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0 
        if(e.type=="mouseenter"){
          var yearT=arr_date[2]-543;
        }   
        if(e.type=="mouseleave"){
          var yearT=parseInt(arr_date[2])+543;
        } 
        dateValue=dateValue.replace(arr_date[2],yearT);
        $(this).val(dateValue);                         
    }   
  });

  // กรณีใช้แบบ input
    $("#testdate7").datetimepicker({
        timepicker:false,
        format:'d-m-Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000      
        lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
    onSelectDate:function(dp,$input){
      var yearT=new Date(dp).getFullYear()-0;  
      var yearTH=yearT+543;
      var fulldate=$input.val();
      var fulldateTH=fulldate.replace(yearT,yearTH);
      $input.val(fulldateTH);
    },
    });       
  // กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
  $("#testdate7").on("mouseenter mouseleave",function(e){
    var dateValue=$(this).val();
    if(dateValue!=""){
        var arr_date=dateValue.split("-"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
        // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
        //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0 
        if(e.type=="mouseenter"){
          var yearT=arr_date[2]-543;
        }   
        if(e.type=="mouseleave"){
          var yearT=parseInt(arr_date[2])+543;
        } 
        dateValue=dateValue.replace(arr_date[2],yearT);
        $(this).val(dateValue);                         
    }   
  });
    
    
});
</script>

</body>

</html>

