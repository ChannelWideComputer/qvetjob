
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
      <?php 
      //echo "<pre>";
      //print_r($news); 
      //echo "</pre>";
      ?>    
      <form role="form" action="<?php echo base_url('cwcontrol/'.$page.'/update');?>" method="post" enctype="multipart/form-data">
       <input type="hidden" name="id" value="<?php echo $news["news_ID"]?>"/>

       <div class="row">
        <div class="col-lg-12" style="margin-top:20px;">
         <div class="panel panel-default">
          <div class="panel-heading">

           <strong>แก้ไขข้อมูล</strong>


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
         <div class="col-lg-12">

          <div class="col-lg-6">  
           <div class="form-group">
            <label>ชื่อ (TH)</label>
            <input type="text" class="form-control" name="news_Name_TH" required value="<?php echo $news["news_Name_TH"]?>">
          </div> 
        </div> 
        

        <div class="col-lg-6">  
          <div class="form-group">
            <label>รูปภาพปก ขนาด 263px x 371px</label>
            <input  type="file" name="news_Images" class="Images">
            <?php
            if($news["news_Images"]){
              ?>

              <input name="news_Images" value="<?php echo $news["news_Images"]?>" type="hidden">
              <?php
            }
            ?>

            <script>
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
             <?php if($news["news_Images"]){?>
              files: [
              {
               name: "<?php echo $news["news_ID"]?>",
               type: "image",
               file: "<?php echo asset_url()?>upload/news/<?php echo $news["news_Images"]?>"


             }

             ],
             <?php } ?>

           });
         </script>
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
	saveOrder();	
	$("#list1").dragsort({ dragSelector: "img", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });

	function saveOrder() {
		$("#list1.sort").find("input#sort").each(function(k,v){
			$(v).val(k+1);
		});
		$("#aaa").find(".jFiler-input-caption").find("span").text($("#list1.sort").find("input#sort").length+" files were chosen");
		
	};
</script>
