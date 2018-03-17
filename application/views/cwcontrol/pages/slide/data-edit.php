
<form role="form" action="<?php echo base_url('cwcontrol/'.$page.'/update');?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="method" value="update"/>
  <input type="hidden" name="id" value="<?php echo $row_edit["slide_ID"]?>"/>

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
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>หัวข้อภาพสไลด์</label> <br>
                        <input type="text" class="form-control" name="slide_title_TH" value="<?= $row_edit['slide_Title_TH']?>" >
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                       <label>บรรยายสไลด์</label> <br>
                       <textarea class="form-control ckeditor" name="slide_Des_TH"><?= $row_edit['slide_Des_TH']?></textarea>
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
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>หัวข้อภาพสไลด์</label> <br>
                      <input type="text" class="form-control" name="slide_title_EN" value="<?= $row_edit['slide_Title_EN'] ?>" >
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                     <label>บรรยายสไลด์</label> <br>
                     <textarea class="form-control ckeditor" name="slide_Des_EN"><?= $row_edit['slide_Des_EN']?></textarea>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-12">  
          <div class="form-group">
            <label>รูปภาพ ขนาด 1140px x 544px (ใช้สำหรับแสดงบน Desktop Version)</label>
            <input  type="file" name="slide_Images" id="Images" onchange="readURL(this,'preview')">
            <?php
            if($row_edit["slide_Images_TH"]){
              ?>
              <img id="preview" class="img-thumbnail" src="<?php echo asset_url()?>upload/slide/<?php echo $row_edit["slide_Images_TH"]?>" alt="preview" width="400" />		 
              <input name="slide_Images" value="<?php echo $row_edit["slide_Images_TH"]?>" type="hidden">
              <?php
            }else{
              ?>
              <img style="display:none;" id="preview" class="img-thumbnail" src="" alt="preview" width="400" />
              <?php
            }
            ?>


          </div>  
        </div>
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
<script type="text/javascript">
    tinymce.init({
      selector: 'textarea.ckeditor',
      menubar : false,
      force_br_newlines : true,
      force_p_newlines : false,
      forced_root_block : '',
      height: 400, 
  //width : 1100,
  plugins: [
 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
 "save table contextmenu directionality emoticons template paste textcolor moxiemanager colorpicker layer textpattern"
 ],    
 toolbar: 'insertfile undo redo | table | styleselect fontselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print nonbreaking hr emoticons code',


});
</script>