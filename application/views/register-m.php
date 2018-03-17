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

              <a href="job-h.php" class="list-group-item" title="ตำเเหน่งงาน"> 
                <i class="fa fa-circle green" aria-hidden="true"></i> 
                สัตวแพทย์
            </a>
            <a href="package.php" class="list-group-item" title="แพ็คเกจ"> 
                <i class="fa fa-circle green" aria-hidden="true"></i> 
                ผู้ช่วยสัตวแพทย์
            </a>
            <a href="package.php" class="list-group-item" title="แพ็คเกจ"> 
                <i class="fa fa-circle green" aria-hidden="true"></i> 
                พนักงานตัดขน
            </a>


        </div>         
    </div>



    <div class="col-lg-9 col-md-9 col-sm-9">
        <h2 class="sp-text-black page-header" style="text-align:left; margin:20px 0 20px 0; font-size:22px;">
            สัตวแพทย์
        </h2>

        <div class="clearfix"></div>

        <span class="red">*จำเป็น</span>


        <form class="wd_contact-from" id="frm_quatation" method="post" action="query_request.php">

            <div class="row">

                <div class="col-md-6">
                 <div class="form-group">
                    <label for="email">
                        ชื่อ-นามสกุล <span class="red" style="font-size: 20px;">*</span>
                    </label>
                    <input type="email" class="form-control" id="email">
                </div>
            </div>


            <div class="col-md-6">
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
            <input type="email" class="form-control" id="email">
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
        ที่อยู่ปัจจุบัน(ติดต่อกลับได้) <span class="red" style="font-size: 20px;">*</span>
    </label>
    <textarea class="form-control" name="Message" required="" style="height: 100px;"></textarea>
</div>
</div>

<div class="col-md-12">
 <div class="form-group">
    <label for="email">
        ที่อยู่ตามบัตรประชาชน <span class="red" style="font-size: 20px;">*</span>
    </label>
    <textarea class="form-control" name="Message" required="" style="height: 100px;"></textarea>
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
        อีเมลล์/เฟสบุ๊ค(E-mail,Facebook) <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-12">
 <div class="form-group">
    <label for="email">
        การศึกษา(สถาบันการศึกษา/ปีที่จบ/ศึกษาต่อ) <span class="red" style="font-size: 20px;">*</span>
    </label>
    <textarea class="form-control" name="Message" required="" style="height: 100px;"></textarea>
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
    <label for="email">
        เกรดเฉลี่ย <span class="red" style="font-size: 20px;">*</span>
    </label>
    <input type="email" class="form-control" id="email">
</div>
</div>

<div class="col-md-12">
 <div class="form-group">
    <label for="email">
        ประสบการณ์การทำงาน(สถานที่/ระยะเวลา) <span class="red" style="font-size: 20px;">*</span>
    </label>
    <textarea class="form-control" name="Message" required="" style="height: 100px;"></textarea>
</div>
</div>

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
        <label><input type="checkbox" value="">อื่นๆ: <input type="email" class="form-control" id="email"></label>
    </div>

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
    <br>

    <div class="checkbox">
        <label><input type="checkbox" value="">ทั่วเขตกรุงเทพ</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" value="">กรุงเทพและปริมณฑล</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" value="">ทุกภาคของประเทศไทย</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" value="">กรุงเทพบางเขต โปรดระบุด้านล่างตรง อื่นๆ</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" value="">บางภาคของประเทศไทย โปรดระบุด้านล่างตรง อื่นๆ</label>
    </div>
    <div class="checkbox form-inline">
        <label><input type="checkbox" value="">อื่นๆ: <input type="email" class="form-control" id="email"></label>
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
<h4>ท่านสนใจทำงานกี่วันต่อสัปดาห์</h4>

</div>
<div class="clearfix"></div>
<br>
<div class="col-lg-6">
 <select class="form-control" id="sel1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
      </select>
</div>

<div class="clearfix"></div>
<br>

<div class="col-lg-12">
<h4>ท่านสนใจทำงานวันไหนมากที่สุด สำหรับท่านที่เลือกแบบPart time (ตอบได้หลายข้อ)</h4>
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
    <div class="checkbox form-inline">
        <label><input type="checkbox" value="">อื่นๆ: <input type="email" class="form-control" id="email"></label>
    </div>

</div>



<div class="col-lg-12">
<h4>วันเสาร์-อาทิตย์ หรือ วันหยุดพิเศษ ท่านสามารถทำงานได้หรือไม่</h4>
ถ้าท่านทำได้ โอกาสได้งานจากคลินิกและโรงพยาบาลสัตว์จะเพิ่มขึ้น เนื่องจากเป็นช่วงที่ต้องการบุคลากรเยอะ

<br>

    <div class="radio">
        <label><input type="radio" name="optradio">ได้</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio">อาจจะได้</label>
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



</body>

</html>

