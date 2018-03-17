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
  <script src='https://www.google.com/recaptcha/api.js'></script>
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
  <link rel="stylesheet" href="css/dos-socialbar.css">
  <link rel="stylesheet" href="css/jquery.datetimepicker.css">
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

           <div class="col-md-3">
             <?php include("m-menu.php");?>
           </div>
           <div class="col-md-9">

             <h2 class="sp-text-black page-header" style="text-align:left; margin:20px 0 20px 0; font-size:22px;">
              เเก้ไข Profile
            </h2>

            <form class="wd_contact-from" id="frm_quatation" method="post" action="<?= base_url('profile/edit') ?>" enctype="multipart/form-data" >

              <div class="row">

                <div class="col-lg-5 col-md-5 col-sm-6">
                  <div style="text-align:left; margin-bottom:10px;">


                   <?php if (isset($member['member_Images'])) { ?>
                   <img src="upload/member/member_pic/<?= $member['member_Images']?>" width="200" height="215" alt=""> 
                   <input type="file"  class="form-control" name="txbFile" value="Browse" style="width:200px;">
                   <?php }else{ ?>
                   <img src="images/ex.jpg" width="200" height="215" alt=""> 
                   <input type="file" class="form-control" name="txbFile" value="Browse" style="width:200px;">
                   <?php } ?>

                 </div>

               </div>


               <div class="col-lg-7 col-md-7 col-sm-6">

                <div class="form-group">
                  <label for="email">
                    อีเมล์ <span class="red" style="font-size: 20px;">*</span>
                  </label>
                  <input type="text" name="member_Email" class="form-control" id="email" value="<?= $member["member_Email"] ?>" >
                  <input type="hidden" name="id" value="<?= $_SESSION["user_id"] ?>" >
                   <input type="hidden" name="member_Type" value="<?= $member["member_Type"] ?>" >
                </div>

                <div class="form-group">
                  <label for="email">
                    Password <span class="red" style="font-size: 20px;">*</span>
                  </label>
                  <input type="Password" name="member_Pass" class="form-control" value="<?= $member["member_Pass"] ?>" id="email">
                </div>

                <div class="form-group">
                  <label for="email">
                    Confirm Password <span class="red" style="font-size: 20px;">*</span>
                  </label>
                  <input type="Password" class="form-control" value="<?= $member["member_Pass"] ?>" id="email">
                </div>

              </div>


              <div class="clearfix"></div>

              <div class="col-md-2">
               <div class="form-group">
                <label for="email">
                  คำนำหน้า <span class="red" style="font-size: 20px;">*</span>
                </label>
                <select name="member_title" class="form-control" id="sel1">
                  <option value="<?= $member["member_title"] ?>"> <?= $member["member_title"] ?></option>
                  <option value="1">นาย</option>
                  <option value="2">นาง</option>
                  <option value="3">นางสาว</option >
                </select>
              </div>
            </div>

            <div class="col-md-7">
             <div class="form-group">
              <label for="email">
                ชื่อ-นามสกุล <span class="red" style="font-size: 20px;">*</span>
              </label>
              <input type="text" name="member_Name" value="<?= $member["member_Name"] ?>" class="form-control" id="email">
            </div>
          </div>


          <div class="col-md-3">
           <div class="form-group">
            <label for="email">
              ชื่อเล่น <span class="red" style="font-size: 20px;">*</span>
            </label>
            <input type="text" name="member_Nickname" value="<?= $member["member_Nickname"] ?>" class="form-control" id="email">
          </div>
        </div>

        <div class="col-md-6">
         <div class="form-group">
          <label for="email">
            วัน/เดือน/ปีเกิด <span class="red" style="font-size: 20px;">*</span>
          </label>
          <input name="member_birthday" class="form-control" type="text" name="testdate5" id="testdate5" value="<?= $member["member_birthday"] ?>">
        </div>
      </div>

      <div class="col-md-6">
       <div class="form-group">
        <label for="email">
          อายุ <span class="red" style="font-size: 20px;">*</span>
        </label>
        <input type="text" value="<?= $member["member_old"] ?>" name="member_old" class="form-control" id="email">
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
     <input type="text" name="idcard" value="<?= $member["idcard"] ?>" class="form-control" id="email">
   </div>
 </div>

 <div class="col-md-6">
   <div class="form-group">
     <input type="file" class="filestyle" name="pic_idcard" data-buttonText="รูปภาพ" id="BSbtnwarning00" style="margin-bottom: 10px;"> 
   </div>
 </div>

 <div class="col-md-6">
   <div class="form-group">
    <label for="email">
      หน้าสมุดธนาคารรับเงินค่าจ้าง <span class="red" style="font-size: 20px;">*</span>
    </label>
    <div class="form-group">
      <input type="file" class="filestyle" name="bookbank" data-buttonText="" id="BSbtnwarning01" style="margin-bottom: 10px;"> 
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
    <select class="form-control" name="member_Province" id="sel1">
      <option value="<?= $member['member_Province'] ?>"><?= $member['member_Province'] ?></option>
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
    <select class="form-control" name="member_District" id="sel1">
     <option value="<?= $member['member_District'] ?>"><?= $member['member_District'] ?></option>
     <option value="1">เขต/อำเภอ</option>
     <option value="2">เขต/อำเภอ</option>
   </select>
 </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
    <select class="form-control" name="member_zone" id="sel1">
      <option value="<?= $member['member_zone'] ?>"><?= $member['member_zone'] ?></option>
      <option value="1">เเขวง/ตำบล</option>
      <option value="2">เเขวง/ตำบล</option>
    </select>
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
    <input type="Subject" name="member_State" value="<?= $member['member_State'] ?>" class="form-control" id="" placeholder="ถนน">
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
    <input type="Subject" name="member_Village" value="<?= $member['member_Village'] ?>" class="form-control" id="" placeholder="หมู่บ้าน">
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
    <input type="Subject" name="member_Zip" value="<?= $member['member_Zip'] ?>" class="form-control" id="" placeholder="รหัสไปรษณีย์">
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
    <select class="form-control" name="member_Province2" id="sel1">
      <option value="<?= $member['member_Province2'] ?>"><?= $member['member_Province2'] ?></option>
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
    <select class="form-control" name="member_District2" id="sel1">
      <option value="<?= $member['member_District2'] ?>"><?= $member['member_District2'] ?></option>
      <option value="1">เขต/อำเภอ</option>
      <option value="2">เขต/อำเภอ</option>
    </select>
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
    <select class="form-control" name="member_zone2" id="sel1">
      <option value="<?= $member['member_zone2'] ?>"><?= $member['member_zone2'] ?></option>
      <option value="1">เเขวง/ตำบล</option>
      <option value="2">เเขวง/ตำบล</option>
    </select>
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
    <input type="text" name="member_State2" value="<?= $member['member_State2'] ?>" class="form-control" id="" placeholder="ถนน">
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
    <input type="text" name="member_Village2" value="<?= $member['member_Village2'] ?>" class="form-control" id="" placeholder="หมู่บ้าน">
  </div>
</div>

<div class="col-sm-4">
  <div class="form-group">
    <input type="text" name="member_Zip2" value="<?= $member['member_Zip2'] ?>" class="form-control" id="" placeholder="รหัสไปรษณีย์">
  </div>
</div>

<div class="col-md-6">
 <div class="form-group">
  <label for="email">
   เบอร์โทรติดต่อ <span class="red" style="font-size: 20px;">*</span>
 </label>
 <input type="text" name="member_Phone" value="<?= $member['member_Phone'] ?>"  class="form-control" id="email">
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
  <label for="email">
    Id line <span class="red" style="font-size: 20px;">*</span>
  </label>
  <input type="text" name="line_ID" value="<?= $member['line_ID'] ?>" class="form-control" id="email">
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
  <label for="email">
    เฟสบุ๊ค <span class="red" style="font-size: 20px;">*</span>
  </label>
  <input type="text" name="facebook" value="<?= $member['facebook'] ?>" class="form-control" id="email">
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
    <input type="text" name="study_univer" value="<?= $member['study']['0']['study_univer'] ?>" class="form-control" id="" placeholder="สถาบันการศึกษา">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="text" name="study_branch" value="<?= $member['study']['0']['study_branch'] ?>" class="form-control" id="" placeholder="สาขาวิชา">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="text" name="study_end" value="<?= $member['study']['0']['study_end'] ?>"  id="" placeholder="ปีจบ">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="text" name="study_grade" value="<?= $member['study']['0']['study_grade'] ?>" class="form-control" id="" placeholder="เกรดเฉลี่ย">
  </div>
</div>

<?php foreach ($member['study'] as $study) { ?>
<div class="col-lg-12 col-md-12 col-sm-12">
  <div class="form-group">
    <label for="email">
      <b>ศึกษาต่อ</b>
    </label>
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="text" name="study_univer2" value="<?= $study['study_univer2'] ?>" class="form-control" id="" placeholder="สถาบันการศึกษา">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="text" name="study_branch2" value="<?= $study['study_branch2'] ?>"  class="form-control" id="" placeholder="สาขาวิชา">
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="text" name="study_end2" value="<?= $study['study_end2'] ?>" class="form-control" id="" placeholder="ปีจบ">
  </div>
</div>


<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="checkbox">
    <label><input name="ecducation" type="checkbox" value="1" <?php if ($study['ecducation'] == '1') echo ' checked'; ?> > กำลังศึกษา</label>
  </div>
</div>
<div class="clearfix"></div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <input type="text" name="study_grade2" value="<?= $study['study_grade2'] ?>"  class="form-control" id="" placeholder="เกรดเฉลี่ย">
  </div>
</div>
<?php } ?>
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
<?php foreach ($member['work'] as $work) { ?>
<div class="col-lg-4 col-md-4 col-sm-12">
  <div class="form-group">
    <input type ="text" name="work_work" value="<?= $work['work_work'] ?>" class="form-control" id="" placeholder="อาชีพ">
  </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
  <div class="form-group">
    <input type ="text" name="work_location" value="<?= $work['work_location'] ?>" class="form-control" id="" placeholder="สถานที่">
  </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
  <div class="form-group">
    <select class="form-control" name="work_province" id="sel1">
      <option value="<?= $work['work_province'] ?>"><?= $work['work_province'] ?></option>
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
  <input class="form-control" type="text" name="work_start" id="testdate6" value="<?= $work['work_start'] ?>">
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
    <label for="email">
      ถึง <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input class="form-control" type="text" name="work_end" id="testdate7" value="<?= $work['work_end'] ?>">
  </div>
</div>
<?php } ?>
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
    <label><input type="checkbox" name="gt" value="1" <?php if ($member['gt'] == '1') echo ' checked'; ?>>ตรวจรักษาโรคทั่วไป</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="st" value="1"<?php if ($member['st'] == '1') echo ' checked'; ?>>เย็บแผล</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="cpr" value="1"<?php if ($member['cpr'] == '1') echo ' checked'; ?>>CPR</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="endo" value="1"<?php if ($member['endo'] == '1') echo ' checked'; ?>>สอดท่อEndo, แทงเส้น</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="slt" value="1"<?php if ($member['slt'] == '1') echo ' checked'; ?>>ผ่าตัดทำหมัน หมา แมว ตัวผู้ ตัวเมีย</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="sllt" value="1"<?php if ($member['sllt'] == '1') echo ' checked'; ?>>ขูดหินปูน</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="gbs" value="1"<?php if ($member['gbs'] == '1') echo ' checked'; ?> >ผ่าตัดกระเพาะปัสสาวะ นิ่ว</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="cpc" value="1"<?php if ($member['cpc'] == '1') echo ' checked'; ?> >Cryptorchid</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="remove" value="1"<?php if ($member['remove'] == '1') echo ' checked'; ?> >remove mass แบบง่าย</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="ht" value="1"<?php if ($member['ht'] == '1') echo ' checked'; ?> >ผ่าตัดมดลูกอัดเสบ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="eye" value="1"<?php if ($member['eye'] == '1') echo ' checked'; ?> >ศัลกรรมตาแบบง่าย (Third eyelid flap, Conjunctival flap)</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="caesar" value="1"<?php if ($member['caesar'] == '1') echo ' checked'; ?> >ผ่าคลอด</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="dh" value="1"<?php if ($member['dh'] == '1') echo ' checked'; ?> >กระบังลมฉีกขาด</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="chest" value="1"<?php if ($member['chest'] == '1') echo ' checked'; ?> >ผ่าตัดช่องอกทะลุ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="mrm" value="1"<?php if ($member['mrm'] == '1') echo ' checked'; ?> >ผ่าเลาะเต้านม</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="gtw" value="1"<?php if ($member['gtw'] == '1') echo ' checked'; ?> >ผ่าตัดกระเพาะบิด</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="eyeball" value="1"<?php if ($member['eyeball'] == '1') echo ' checked'; ?> >ควักตา</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="cl" value="1"<?php if ($member['cl'] == '1') echo ' checked'; ?> >ตัดขา</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="bs" value="1"<?php if ($member['bs'] == '1') echo ' checked'; ?> >ผ่าตัดกระดูก</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="itc" value="1"<?php if ($member['itc'] == '1') echo ' checked'; ?> >ตัดต่อลำไส้</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="pm" value="1"<?php if ($member['pm'] == '1') echo ' checked'; ?> >Pancreatic mass</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="mam" value="1"<?php if ($member['mam'] == '1') echo ' checked'; ?> >Mass ในช่องท้อง หรือ ช่องอก</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="transgender" value="1"<?php if ($member['transgender'] == '1') echo ' checked'; ?> >แปลงเพศ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="ventilators" value="1"<?php if ($member['ventilators'] == '1') echo ' checked'; ?> >ใช้เครื่อง ventilators เป็น</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="at" value="1"<?php if ($member['at'] == '1') echo ' checked'; ?> >วางยาสลบ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="bc" value="1"<?php if ($member['bc'] == '1') echo ' checked'; ?> >เคยใช้เครื่องตรวจเลือด Biood chem</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="cbc" value="1"<?php if ($member['cbc'] == '1') echo ' checked'; ?> >เคยใช้เครื่องตรวจเลือด CBC</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="x_ray" value="1"<?php if ($member['x_ray'] == '1') echo ' checked'; ?> >เคยใช้เครื่อง X-ray</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="ultra" value="1"<?php if ($member['ultra'] == '1') echo ' checked'; ?> >เคยใช้เครื่อง Ultrasound</label>
  </div>
  <div class="checkbox form-inline">
    <label><input type="checkbox" name="ss" value="1"<?php if ($member['ss'] == '1') echo ' checked'; ?> >เฉพาะทาง: 
      <input type="text" class="form-control" name="ssdetail" value="<?= $member['ss'] ?>" id="email"></label>
    </div>
    <div class="checkbox form-inline">
     <label><input type="checkbox" name="other" value="1" <?php if ($member['other'] == '1') echo ' checked'; ?> >ความสามารภเพิ่มเติม: 
      <span class="red">(ยิ่งเยอะยิ่งเพื่มโอกาสสำหรับคุณ)</span></label>
    </div>
    <textarea class="form-control d-margin" id="message" name="otherdetail" placeholder="" style="height:150px;"><?= $member['other'] ?></textarea>

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
          <td class="table01" data-label="5"><input type="radio" value="5" <?php if ($member['g1'] == '5') echo ' checked'; ?> name="g1"></td>
          <td class="table01" data-label="4"><input type="radio" value="4" <?php if ($member['g1'] == '4') echo ' checked'; ?> name="g1"></td>
          <td class="table01" data-label="3"><input type="radio" value="3" <?php if ($member['g1'] == '3') echo ' checked'; ?> name="g1"></td>
          <td class="table01" data-label="2"><input type="radio" value="2" <?php if ($member['g1'] == '2') echo ' checked'; ?> name="g1"></td>
          <td class="table01" data-label="1"><input type="radio" value="1" <?php if ($member['g1'] == '1') echo ' checked'; ?> name="g1"></td>
        </tr>
        <tr>
          <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">สื่อสารดี , ใช้คำพูดเป็น</td>
          <td class="table01" data-label="5"><input type="radio" value="5" <?php if ($member['g2'] == '5') echo ' checked'; ?> name="g2"></td>
          <td class="table01" data-label="4"><input type="radio" value="4" <?php if ($member['g2'] == '4') echo ' checked'; ?> name="g2"></td>
          <td class="table01" data-label="3"><input type="radio" value="3" <?php if ($member['g2'] == '3') echo ' checked'; ?> name="g2"></td>
          <td class="table01" data-label="2"><input type="radio" value="2" <?php if ($member['g2'] == '2') echo ' checked'; ?> name="g2"></td>
          <td class="table01" data-label="1"><input type="radio" value="1" <?php if ($member['g2'] == '1') echo ' checked'; ?> name="g2"></td>
        </tr>
        <tr>
          <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">การใช้ภาษาอังกฤษ</td>
          <td class="table01" data-label="5"><input type="radio" value="5" <?php if ($member['g3'] == '5') echo ' checked'; ?> name="g3"></td>
          <td class="table01" data-label="4"><input type="radio" value="4" <?php if ($member['g3'] == '4') echo ' checked'; ?> name="g3"></td>
          <td class="table01" data-label="3"><input type="radio" value="3" <?php if ($member['g3'] == '3') echo ' checked'; ?> name="g3"></td>
          <td class="table01" data-label="2"><input type="radio" value="2" <?php if ($member['g3'] == '2') echo ' checked'; ?> name="g3"></td>
          <td class="table01" data-label="1"><input type="radio" value="1" <?php if ($member['g3'] == '1') echo ' checked'; ?> name="g3"></td>
        </tr>
        <tr>
          <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">แก้ปัญหาเฉพาะหน้าได้</td>
          <td class="table01" data-label="5"><input type="radio" value="5" <?php if ($member['g4'] == '5') echo ' checked'; ?> name="g4"></td>
          <td class="table01" data-label="4"><input type="radio" value="4" <?php if ($member['g4'] == '4') echo ' checked'; ?> name="g4"></td>
          <td class="table01" data-label="3"><input type="radio" value="3" <?php if ($member['g4'] == '3') echo ' checked'; ?> name="g4"></td>
          <td class="table01" data-label="2"><input type="radio" value="2" <?php if ($member['g4'] == '2') echo ' checked'; ?> name="g4"></td>
          <td class="table01" data-label="1"><input type="radio" value="1" <?php if ($member['g4'] == '1') echo ' checked'; ?> name="g4"></td>
        </tr>
        <tr>
          <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">ความรู้วิชาการ</td>
          <td class="table01" data-label="5"><input type="radio" value="5" <?php if ($member['g5'] == '5') echo ' checked'; ?> name="g5"></td>
          <td class="table01" data-label="4"><input type="radio" value="4" <?php if ($member['g5'] == '4') echo ' checked'; ?> name="g5"></td>
          <td class="table01" data-label="3"><input type="radio" value="3" <?php if ($member['g5'] == '3') echo ' checked'; ?> name="g5"></td>
          <td class="table01" data-label="2"><input type="radio" value="2" <?php if ($member['g5'] == '2') echo ' checked'; ?> name="g5"></td>
          <td class="table01" data-label="1"><input type="radio" value="1" <?php if ($member['g5'] == '1') echo ' checked'; ?> name="g5"></td>
        </tr>
        <tr>
          <td class="table01" style="text-align: left!important;background: #e6e6e6;color: #333;">ละเอียดรอบคอบ</td>
          <td class="table01" data-label="5"><input type="radio" value="5" <?php if ($member['g6'] == '5') echo ' checked'; ?> name="g6"></td>
          <td class="table01" data-label="4"><input type="radio" value="4" <?php if ($member['g6'] == '4') echo ' checked'; ?> name="g6"></td>
          <td class="table01" data-label="3"><input type="radio" value="3" <?php if ($member['g6'] == '3') echo ' checked'; ?> name="g6"></td>
          <td class="table01" data-label="2"><input type="radio" value="2" <?php if ($member['g6'] == '2') echo ' checked'; ?> name="g6"></td>
          <td class="table01" data-label="1"><input type="radio" value="1" <?php if ($member['g6'] == '1') echo ' checked'; ?> name="g6"></td>
        </tr>

      </tbody>
    </table>
  </div>

  <div class="col-lg-12">
    <br>
    <h4>ท่านสนใจทำงานบริเวณใด(เลือกได้มากกว่า 1 ข้อ)</h4>

    <div class="checkbox">
      <label><input type="checkbox" name="wlocation1" <?php if ($member['wlocation1'] == '1') echo ' checked'; ?> value="1">ทั่วเขตกรุงเทพ</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="wlocation2" <?php if ($member['wlocation2'] == '1') echo ' checked'; ?> value="1">กรุงเทพและปริมณฑล</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="wlocation3" <?php if ($member['wlocation3'] == '1') echo ' checked'; ?> value="1">ทุกจังหวัดของประเทศไทย</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="wlocation4"  value="1">กรุงเทพ(เฉพาะเขต) 

       <select class="selectpicker" data-style="btn-default from-lo" multiple data-max-options="77" name="locationdetail1" data-live-search="true" title="เขต">

        <option value="<?= $member['locationdetail1'] ?>"><?= $member['locationdetail1'] ?></option>
        <option value="1">เขตพระนคร</option>
        <option value="2">เขตดุสิต</option>
        <option value="3">เขตหนองจอก</option>
        <option value="4">เขตบางรัก</option>
        <option value="5">เขตบางเขน</option>
        <option value="6">เขตบางกะปิ</option>
        <option value="7">เขตปทุมวัน</option>
        <option value="8">เขตป้อมปราบศัตรูพ่าย</option>
        <option value="9">เขตพระโขนง</option>
        <option value="10">เขตมีนบุรี</option>
        <option value="11">เขตลาดกระบัง</option>
        <option value="12">เขตยานนาวา</option>
        <option value="13">เขตสัมพันธวงศ์</option>
        <option value="14">เขตพญาไท</option>
        <option value="15">เขตธนบุรี</option>
        <option value="16">เขตบางกอกใหญ่</option>
        <option value="17">เขตห้วยขวาง</option>
        <option value="18">เขตคลองสาน</option>
        <option value="19">เขตตลิ่งชัน</option>
        <option value="20">เขตบางกอกน้อย</option>
        <option value="21">เขตบางขุนเทียน</option>
        <option value="22">เขตภาษีเจริญ</option>
        <option value="23">เขตหนองแขม</option>
        <option value="24">เขตราษฎร์บูรณะ</option>
        <option value="25">เขตบางพลัด</option>
        <option value="26">เขตดินแดง</option>
        <option value="27">เขตบึงกุ่ม</option>
        <option value="28">เขตสาทร</option>
        <option value="29">เขตบางซื่อ</option>
        <option value="30">เขตจตุจักร</option>
        <option value="31">เขตบางคอแหลม</option>
        <option value="32">เขตประเวศ</option>
        <option value="33">เขตคลองเตย</option>
        <option value="34">เขตสวนหลวง</option>
        <option value="35">เขตจอมทอง</option>
        <option value="36">เขตดอนเมือง</option>
        <option value="37">เขตราชเทวี</option>
        <option value="38">เขตลาดพร้าว</option>
        <option value="39">เขตวัฒนา</option>
        <option value="40">เขตบางแค</option>
        <option value="41">เขตหลักสี่</option>
        <option value="42">เขตสายไหม</option>
        <option value="43">เขตคันนายาว</option>
        <option value="44">เขตสะพานสูง</option>
        <option value="45">เขตวังทองหลาง</option>
        <option value="46">เขตคลองสามวา</option>
        <option value="47">เขตบางนา</option>
        <option value="48">เขตทวีวัฒนา</option>
        <option value="49">เขตทุ่งครุ</option>
        <option value="50">เขตบางบอน</option>


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

    <select class="selectpicker" data-style="btn-default from-lo" multiple data-max-options="77" data-live-search="true" name="locationdetail2" title="จังหวัด">
     <option value="<?= $member['locationdetail2'] ?>"><?= $member['locationdetail2'] ?></option>
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
    <label><input type="radio" value="1" name="optradio" <?php if ($member['optradio'] == '1') echo 'checked'; ?> >Part time</label>
  </div>
  <div class="radio">
    <label><input type="radio" value="2" name="optradio" <?php if ($member['optradio'] == '2') echo 'checked'; ?> >Full time</label>
  </div>
  <div class="radio">
    <label><input type="radio" value="3" name="optradio" <?php if ($member['optradio'] == '3') echo 'checked'; ?> >ทั้ง Part time และ Full time</label>
  </div>
</div>



<div class="col-lg-12">
  <h4>ท่านสนใจทำงานวันไหนมากที่สุด สำหรับท่านที่เลือกแบบ Part time (ตอบได้หลายข้อ)</h4>
  ทางบริษัทจะเก็บเป็นข้อมูลไว้ เพื่อบางครั้งทางบริษัทจะติดต่อไปหาท่านโดยตรงในวันที่ท่านเลือก <br class="visible-lg">
  โอกาสการได้งานของท่านจะเพิ่มขึ้น โดยไม่ต้องแย่งชิงกับคนอื่นๆ

  <br>

  <div class="checkbox">
    <label><input type="checkbox" name="daywork1" value="1" <?php if ($member['daywork1'] == '1') echo ' checked'; ?> >วันจันทร์</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="daywork2" value="1" <?php if ($member['daywork2'] == '1') echo ' checked'; ?> >วันอังคาร</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="daywork3" value="1" <?php if ($member['daywork3'] == '1') echo ' checked'; ?> >วันพุธ</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="daywork4" value="1" <?php if ($member['daywork4'] == '1') echo ' checked'; ?> >วันพฤหัส</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="daywork5" value="1" <?php if ($member['daywork5'] == '1') echo ' checked'; ?> >วันศุกร์</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="daywork6" value="1" <?php if ($member['daywork6'] == '1') echo ' checked'; ?> >วันเสาร์</label>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="daywork7" value="1" <?php if ($member['daywork7'] == '1') echo ' checked'; ?> >วันอาทิตย์</label>
  </div>

</div>



<div class="col-lg-12">
  <h4>วันหยุดพิเศษ / เทศกาล ท่านสามารถทำงานได้หรือไม่</h4>
  ถ้าท่านทำได้ โอกาสได้งานจากคลินิกและโรงพยาบาลสัตว์จะเพิ่มขึ้น เนื่องจากเป็นช่วงที่ต้องการบุคลากรเยอะ

  <br>

  <div class="radio">
    <label><input type="radio" value="1" <?php if ($member['sday'] == '1') echo ' checked'; ?> name="sday">ได้</label>
  </div>
  <div class="radio">
    <label><input type="radio" value="2" <?php if ($member['sday'] == '2') echo ' checked'; ?> name="sday">ไม่ได้</label>
  </div>
  <div class="radio form-inline">
    <label><input type="radio" value="3" name="sday"> อื่นๆ: 
      <input type="txet" name="sdaydetail" value="
      <?php 
      if($member['sday']== "1"){ 
      }elseif($member['sday'] == "2"){
      }else{
        echo $member['sday'];
      }
      ?>" class="form-control" id="email"></label>
    </div>

  </div>

  <div class="col-lg-12">


    <h4>สมมติ มีเคสเข้ามารักษาและเกิดเสียชีวิต ท่านจะแจ้งเจ้าของเคสว่าอย่างไร <br>ถ้าเจ้าของเคสเป็นคนค่อนข้างละเอียดและมีอิทธิพลต่อสังคม *</h4>
    สมมติ สาเหตุการเสียชีวิตได้ตามประสบการณ์หรือความถนัดในการรักษาได้เลยค่ะ ตอบได้ตั้งแต่ระยะก่อนรักษา <br>ระหว่างรักษา และหลังจากเสียชีวิตแล้ว ว่าควรแจ้งอย่างไร

    <br>

  </div>

  <div class="col-md-12">
   <div class="form-group">
    <textarea class="form-control" name="Message1" required="" style="height: 100px;"><?= $member['Message1'] ?></textarea>
  </div>
</div>

<div class="col-lg-12">
  <div class="form-group">
    <label for="email">
      รายละเอียดอื่นๆเพิ่มเติม (ถ้ามี) <span class="red" style="font-size: 20px;">*</span>
    </label>
    <textarea class="form-control" name="Message2" required="" style="height: 100px;"><?= $member['Message2'] ?></textarea>
  </div>
</div>

<div class="col-lg-12">
  <div class="form-group">
    <label for="email">
      ข้อเสนอแนะเพิ่มเติม <span class="red" style="font-size: 20px;">*</span>
    </label>
    <textarea class="form-control" name="Message3" required="" style="height: 100px;"><?= $member['Message3'] ?></textarea>
  </div>
</div>

</div>
<div class="clearfix"></div>

<!-- <div class="g-recaptcha" data-sitekey="6LcSEDoUAAAAAHyi5AK_zlZxpvvOX_E1_M81EO2h"></div> -->
<div class="g-recaptcha" data-sitekey="6LdElT4UAAAAAM6Rn3H58vK6gvPcR4zHFaH76z7E"></div>


<div class="p-l" style="margin-bottom:20px;">   
  <input type="submit" class="btn btn-info" value="สมัครสมาชิก" style="margin-top: 5px;"> <button type="Reset" class="btn btn-info" style="margin-top: 5px;">ล้างข้อมูล</button>
</div>
</form>


<div class="clearfix"></div>
</div> 


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

<!-- Js-Files --> 
<script src="js/particles.js"></script>
<script src="js/app.js"></script>
<!-- //Js-Files --> 

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

