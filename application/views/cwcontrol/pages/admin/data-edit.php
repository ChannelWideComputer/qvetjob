
<style>
#list1 li{
  /*display: inline-block;*/
  float: left;
}
    /*.placeHolder{
        width: 100%;
        height: 100%;
        border: 2px dashed #c2cdda;
        border-radius: 4px;
        }    */
      </style>           
      <form role="form" action="<?php echo base_url('cwcontrol/'.$page.'/update');?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="method" value="update"/>


        <div class="row">
         <div class="col-lg-12" style="margin-top:20px;">
          <div class="panel panel-default">
            <div class="panel-heading">

             <strong>เพิ่มข้อมูล</strong>


           </div>
           <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">  
                &nbsp;
              </div> 
              <div class="col-lg-6 text-right">  
                <button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
              </div>  
              <div class="col-lg-12">

<?php $edit = $this->db->Where('id',$_GET['id'])->get('tb_manage')->row_array(); ?>
<input type="hidden" name="id" value="<?= $edit['id'] ?>">
                <div class="row">
                  <div class="col-lg-4">  
                    <div class="form-group">
                      <label>ชื่อเมนู</label>
                      <input type="text" class="form-control" name="manage_name" value="<?= $edit['manage_name'] ?>" required>

                    </div>  
                  </div>

                  <div class="col-lg-4">  
                    <div class="form-group">
                      <label>ชื่อไฟล์เมนู</label>
                      <input type="text" class="form-control" name="manage_page" value="<?= $edit['manage_page'] ?>" required>

                    </div>  
                  </div>

                  <div class="col-lg-4">  
                    <div class="form-group">
                      <label>ไอคอน</label>
                      <input type="text" class="form-control" name="manage_icon" value="<?= $edit['manage_icon'] ?>" >

                    </div>  
                  </div>
                </div>



              </div>

              <div class="col-lg-12 text-right">  
                <button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
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
<script type="text/javascript">

  $(document).ready(function() {

   $("#youtube_Link").keyup(function(e) {
    var val = $(this).val(),
    sitesgohere = document.getElementById("myIframe");

    sitesgohere.src = "//www.youtube.com/embed/" + val +"?feature=player_detailpage";

  });

 });
</script>
<script>
  $('#File_TH').filer({
   addMore: true,
   maxSize: 10,
   extensions: ['pdf', 'doc', 'docx', 'xls', 'xlsx'],
   changeInput: true,
   showThumbs: true,
   templates: {
    box: '<ul class="jFiler-items-list jFiler-items-default"></ul>',
    item: '<li class="jFiler-item"><div class="jFiler-item-container"><div class="jFiler-item-inner"><div class="jFiler-item-icon pull-left">{{fi-icon}}</div><div class="jFiler-item-info pull-left"><div class="jFiler-item-title" title="{{fi-name}}"><input type="text" class="form-control" name="file_Title_TH[]" placeholder="ชื่อไฟล์ (TH)" style="width:200px;">{{fi-name}}</div><div class="jFiler-item-others"><span>size: {{fi-size2}}</span><span>type: {{fi-extension}}</span><span class="jFiler-item-status">{{fi-progressBar}}</span></div><div class="jFiler-item-assets"><ul class="list-inline"><li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li></ul></div></div></div></div></li>',
    itemAppend: '<li class="jFiler-item"><div class="jFiler-item-container"><div class="jFiler-item-inner"><div class="jFiler-item-icon pull-left">{{fi-icon}}</div><div class="jFiler-item-info pull-left"><div class="jFiler-item-title">{{fi-name | limitTo:35}}</div><div class="jFiler-item-others"><span>type: {{fi-extension}}</span><span class="jFiler-item-status"></span></div><div class="jFiler-item-assets"><ul class="list-inline"><li><a class="icon-jfi-trash jFiler-item-trash-action" ids=""></a></li></ul></div></div></div></div></li>',
    progressBar: '<div class="bar"></div>',
    itemAppendToEnd: true,
    removeConfirmation: true,
    _selectors: {
     list: '.jFiler-items-list',
     item: '.jFiler-item',
     progressBar: '.bar',
     remove: '.jFiler-item-trash-action'
   }
 },
 captions: {
   removeConfirmation: 'ยืนยันการลบข้อมูล',
   errors: {
    filesType: 'เฉพาะไฟล์ pdf doc docx xls xlsx เท่านั้น',
    filesSize: '{{fi-name}} ขนาดใหญ่เกินไป โปรเลือกไฟล์ขนาดไม่เกิน {{fi-maxSize}}MB.',

  }

},

});

  $('#File_EN').filer({
   addMore: true,
   maxSize: 10,
   extensions: ['pdf', 'doc', 'docx', 'xls', 'xlsx'],
   changeInput: true,
   showThumbs: true,
   templates: {
    box: '<ul class="jFiler-items-list jFiler-items-default"></ul>',
    item: '<li class="jFiler-item"><div class="jFiler-item-container"><div class="jFiler-item-inner"><div class="jFiler-item-icon pull-left">{{fi-icon}}</div><div class="jFiler-item-info pull-left"><div class="jFiler-item-title" title="{{fi-name}}"><input type="text" class="form-control" name="file_Title_EN[]" placeholder="ชื่อไฟล์ (EN)" style="width:200px;">{{fi-name}}</div><div class="jFiler-item-others"><span>size: {{fi-size2}}</span><span>type: {{fi-extension}}</span><span class="jFiler-item-status">{{fi-progressBar}}</span></div><div class="jFiler-item-assets"><ul class="list-inline"><li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li></ul></div></div></div></div></li>',
    itemAppend: '<li class="jFiler-item"><div class="jFiler-item-container"><div class="jFiler-item-inner"><div class="jFiler-item-icon pull-left">{{fi-icon}}</div><div class="jFiler-item-info pull-left"><div class="jFiler-item-title">{{fi-name | limitTo:35}}</div><div class="jFiler-item-others"><span>type: {{fi-extension}}</span><span class="jFiler-item-status"></span></div><div class="jFiler-item-assets"><ul class="list-inline"><li><a class="icon-jfi-trash jFiler-item-trash-action" ids=""></a></li></ul></div></div></div></div></li>',
    progressBar: '<div class="bar"></div>',
    itemAppendToEnd: true,
    removeConfirmation: true,
    _selectors: {
     list: '.jFiler-items-list',
     item: '.jFiler-item',
     progressBar: '.bar',
     remove: '.jFiler-item-trash-action'
   }
 },
 captions: {
   removeConfirmation: 'ยืนยันการลบข้อมูล',
   errors: {
    filesType: 'เฉพาะไฟล์ pdf doc docx xls xlsx เท่านั้น',
    filesSize: '{{fi-name}} ขนาดใหญ่เกินไป โปรเลือกไฟล์ขนาดไม่เกิน {{fi-maxSize}}MB.',

  }

},

}); 

  $('.Images').filer({
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
    '<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
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
    '<li><!--<a class="icon-jfi-trash jFiler-item-trash-action" id="{{fi-name}}"></a>--></li>' +
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
  captions: {
   removeConfirmation: 'ยืนยันการลบข้อมูล',

 },
});
  $('#gallery').filer({
   addMore: true,
   showThumbs: true,
   templates: {
    box: '<ul id="list1" class="jFiler-items-list jFiler-items-grid sort"></ul>',
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
    '<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
    '</ul>' +
    '<ul class="list-inline pull-right">' +
    '<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li><input type="hidden" name="sort[]" id="sort" />' +
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
    ' <div class="jFiler-item-assets jFiler-row">' +
    '<ul class="list-inline pull-left">' +
    '<li><span class="jFiler-item-others">{{fi-icon}}</span></li>' +
    '</ul>' +
    '<ul class="list-inline pull-right">' +
    '<li><a class="icon-jfi-trash jFiler-item-trash-action" idg="{{fi-name}}"></a></li><input type="hidden" name="sort-{{fi-name}}" id="sort" /><input type="hidden" name="gallery_ID[]" id="sortid" value="{{fi-name}}">' +
    '</ul>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</li>',
    progressBar: '<div class="bar"></div>',
    itemAppendToEnd: true,
    removeConfirmation: true,
    _selectors: {
      list: '.jFiler-items-list',
      item: '.jFiler-item',
      progressBar: '.bar',
      remove: '.jFiler-item-trash-action'
    }
  },
  files: [{

  }],
  afterShow: function(el){
    saveOrder();
  },
  captions: {
    feedback2: "files were chosen",
    removeConfirmation: 'ยืนยันการลบข้อมูล',

  },
}); 
</script>

<script type="text/javascript">
  $("#list1").dragsort({ dragSelector: "img", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });

  function saveOrder() {
    $("#list1.sort").find("input#sort").each(function(k,v){
      $(v).val(k+1);
    });
    $("#aaa").find(".jFiler-input-caption").find("span").text($("#list1.sort").find("input#sort").length+" files were chosen");

  };
</script>