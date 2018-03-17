
<form role="form" action="<?php echo base_url('cwcontrol/'.$page.'/update');?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="method" value="update"/>
  <input type="hidden" name="id" value="<?php echo $row_edit["news_ID"]?>"/>

  <div class="row">
   <div class="col-lg-12" style="margin-top:20px;">
     <ol class="breadcrumb">
      <li><a href="<?php echo base_url('cwcontrol/'.$page);?>">จัดการสไลด์</a></li>
      <li class="active">แก้ไขสไลด์</li>
    </ol>
    <div class="panel panel-default">
      <div class="panel-heading">

       <strong>แก้ไขข้อมูล</strong>


     </div>
     <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">  
          &nbsp;
        </div> 
        <div class="col-lg-12 text-right">  
          <button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
        </div>  
        <div class="col-lg-12">

          <div class="row">
           <div class="col-lg-12">  
            <div class="form-group">
              <label>รูปภาพ ขนาด 1920px x 855px (ใช้สำหรับแสดงบน Desktop Version)</label>
              <input  type="file" name="news_Images" id="Images" onchange="readURL(this,'preview')">
              <?php
              if($row_edit["news_Images"]){
                ?>
                <img id="preview" class="img-thumbnail" src="<?php echo asset_url()?>upload/news/<?php echo $row_edit["news_Images"]?>" alt="preview" width="400" />     
                <input name="news_Images" value="<?php echo $row_edit["news_Images"]?>" type="hidden">
                <?php
              }else{
                ?>
                <img style="display:none;" id="preview" class="img-thumbnail" src="" alt="preview" width="400" />
                <?php
              }
              ?>


            </div>  
          </div>

         <!-- <div class="col-lg-6">  
          <div class="form-group">
            <label>รูปภาพ ขนาด 474px x 647px (ใช้สำหรับแสดงบน Mobile Version)</label>
            <input  type="file" name="news_Images_min" id="Images2" onchange="readURL(this,'preview2')">
            <?php
            if($row_edit["news_Images_min"]){
              ?>
              <img id="preview2" class="img-thumbnail" src="<?php echo asset_url()?>upload/news/<?php echo $row_edit["news_Images_min"]?>" alt="preview" width="400" />    
              <input name="news_Images_min" value="<?php echo $row_edit["news_Images_min"]?>" type="hidden">
              <?php
            }else{
              ?>
              <img style="display:none;" id="preview2" class="img-thumbnail" src="" alt="preview2" width="400" />
              <?php
            }
            ?>


          </div>  
        </div> -->
      </div>
    </div>






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

<script>
  $('#Images').filer({
   limit: 1,
 });
  $('#Images2').filer({
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