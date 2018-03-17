<style>
select {
  width: auto !important;
  height: auto !important;
  padding: 1px !important;
}

.pagination {
  margin: 0px 0 !important;
  float: right;
}
</style>
<form role="form" action="<?php echo base_url('cwcontrol/'.$page.'/update');?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $about_ID?>"/>

  <div class="row">
    <div class="col-lg-12" style="margin-top:20px;">
     <div class="panel panel-default">
      <div class="panel-heading">

        <strong>แก้ไขข้อความหน้าเอกสาร</strong>

     </div>
     <div class="panel-body">
       <div class="row">
        <div class="col-lg-6">  
         &nbsp;
       </div> 
       <div class="col-lg-6 text-right">  
         <button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
       </div>  
     </div>

     <ul class="nav nav-tabs">
      <li class="item active"><a data-toggle="tab" href="#menu">TH</a></li>
      <li class="item"><a data-toggle="tab" href="#menu2">EN</a></li>
    </ul>

    <div class="col-lg-12">
      <div class="tab-content">
        <div id="menu" class="tab-pane fade in active"><br>
         <div class="col-lg-12">
          <label for="">รายละเอียด</label>
          <textarea type="text" name="about_Detail_TH" class="form-control ckeditor"><?= $about_Detail_TH ?></textarea> 
        </div>
      </div>

      <div id="menu2" class="tab-pane fade in"><br>
       <div class="col-lg-12">
        <label for="">รายละเอียด</label>
        <textarea type="text" name="about_Detail_EN" class="form-control ckeditor"><?= $about_Detail_EN ?></textarea> 
      </div>
    </div> 
  </div> 
</div>
<div class="clearfix"></div><br>
<div class="col-lg-6">&nbsp;</div> 
<div class="row"><div class="col-lg-6 text-right"><button type="submit" class="btn btn-success ">บันทึกข้อมูล</button></div></div>

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