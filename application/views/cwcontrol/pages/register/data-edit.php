
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
<input type="hidden" name="id" value="<?php echo $product["product_ID"]?>"/>
			
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
                                <div class="col-lg-12">
                                	
                                	
                                	<div class="row">
                            			<div class="col-lg-4">
                                          <div class="form-group">
                                             <label>หมวดหมู่</label>
                                             <select class="form-control selectpicker" data-actions-box="true" name="category_ID" required>
                                                <option value="">เลือกหมวดหมู่</option>
                                                <?php
												$query = $this->db->where('type', 'product')->get('tb_category');
												foreach ($query->result_array() as $row)
												{
												?>
                                                <option value="<?php echo $row["category_ID"]?>" <?php if($product["category_ID"] == $row["category_ID"]){echo "selected";}?>><?php echo $row["category_Name_TH"]?></option>
                                                <?php }?>
                                            </select>
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                
                                                                	
                                	<div class="row">
                            			<div class="col-lg-6">  
                                          <div class="form-group">
                                                <label>ชื่อ (TH)</label>
                                                <input type="text" class="form-control" name="product_Name_TH" required value="<?php echo $product["product_Name_TH"]?>">
                                                
                                            </div>  
                                        </div>
                                        <div class="col-lg-6">  
                                          <div class="form-group">
                                                <label>ชื่อ (EN)</label>
                                                <input type="text" class="form-control" name="product_Name_EN" required value="<?php echo $product["product_Name_EN"]?>">
                                                
                                            </div>  
                                        </div>
                           			 </div>
                           			 
                           			 <div class="row">
                                     
                            			<div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>Description (TH)</label>
                                            <textarea name="product_Detail_TH" class="form-control ckeditor" rows="3"><?php echo $product["product_Detail_TH"]?></textarea>
                                                
                                            </div>  
                                        </div>
                                        <div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>Description (EN)</label>
                                            <textarea name="product_Detail_EN" class="form-control ckeditor" rows="3"><?php echo $product["product_Detail_EN"]?></textarea>
                                                
                                            </div>  
                                        </div>
                                        
                           			 </div>
                                
                                
                                	<div class="row">
                                   
                            			<div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>Special Feature (TH)</label>
                                            <textarea name="product_Special_TH" class="form-control ckeditor" rows="3"><?php echo $product["product_Special_TH"]?></textarea>
                                                
                                            </div>  
                                        </div>
                                        <div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>Special Feature (EN)</label>
                                            <textarea name="product_Special_EN" class="form-control ckeditor" rows="3"><?php echo $product["product_Special_EN"]?></textarea>
                                                
                                            </div>  
                                        </div>
                                        
                           			 </div>
                                    
                                    <div class="row">
                            			<div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>YouTube</label>
                                            <input type="text" class="form-control" name="product_Clip" id="youtube_Link" value="<?php echo $product["product_Clip"]?>">
                                            <p class="help-block">
                                            *การใส่ VDO YouTube ให้นำ VIDEO_ID ของ YouTube มาใส่
                           ตัวอย่างเช่น http://www.youtube.com/watch?v=<span style="color:#F00;">8FIz_qs66sc</span>
                           ตัวหนังสือ สีแดงคือ VIDEO_ID ของ YouTube <br><br>
                                            
                                            
                                            <iframe width="350" height="250" id="myIframe" name="myIframe" src="//www.youtube.com/embed/<?php echo $product["product_Clip"]?>?feature=player_detailpage"  frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                            
                                            
                                            </p> 
                                            </div>  
                                        </div>
                           			 </div>
                                     
                                    
                                                                                                                     
                                     
                                     <div class="row">
                            			<div class="col-lg-5">  
                                          <div class="form-group">
                                                <label>รูปภาพปก ขนาด 384px * 328px </label>
                                                <input  type="file" name="product_Images" class="Images">
                                                 <?php
												  if($product["product_Images"]){
												?>
														 
												<input name="product_Images" value="<?php echo $product["product_Images"]?>" type="hidden">
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
														<?php if($product["product_Images"]){?>
														files: [
															{
																name: "<?php echo $product["product_ID"]?>",
																type: "image",
																file: "<?php echo asset_url()?>upload/<?php echo $product["product_Images"]?>"


															}

														],
													<?php } ?>
														
												});
											  </script>
                                            </div>  
                                        </div>
                           			 </div>
                                 
                                 
                                 	<div class="row">
                            			<div class="col-lg-12">  
                                          <div class="form-group" id="aaa">
                                                <label>แกลอรี่ ขนาด 800px * 682px</label>
                                                <input  type="file" name="product_gallery[]" id="gallery" multiple>
                                               
                                                
                                               <script>   
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
													files: [

											<?php
											
											if(isset($product["product_gallery"])){
											foreach ($product["product_gallery"] as $row_gallery)					

											{

											?>

														{
															name: "<?php echo $row_gallery["gallery_ID"]?>",
															type: "image",
															file: "<?php echo asset_url()?>upload/gallery/full_<?php echo $row_gallery["gallery_Images"]?>",


														},
											<?php }}else{?>{}<?php }?>
													],
													onRemove: function(el){			
														var ids = el.find(".icon-jfi-trash").attr("idg");
														$.post('<?php echo base_url('cwcontrol/'.$page.'/delete_gallery');?>', {id: ids});
													},
													afterShow: function(el){

													   saveOrder();
													},
													captions: {
													removeConfirmation: 'ยืนยันการลบข้อมูล',

													},

											});


											</script>
                                                
                                            </div>  
                                        </div>
                           			 </div>
                           			 
                           			 
                           			 <div class="row">
									<div class="col-lg-5">  
									  <div class="form-group">
											<label>อัพโหลดไฟล์ (TH) ขนาดไม่เกิน 10 MB (pdf | doc | docx | xls | xlsx)</label>
											<input  type="file" name="product_file_TH[]" id="File_TH" multiple>
											
											
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
													itemAppend: '<li class="jFiler-item"><div class="jFiler-item-container"><div class="jFiler-item-inner"><div class="jFiler-item-icon pull-left">{{fi-icon}}</div><div class="jFiler-item-info pull-left"><div class="jFiler-item-title"><input type="hidden" name="update_file_ID_TH[]" value="{{fi-name}}"/><input type="text" class="form-control" name="update_file_Title_TH[]" id="update_file_Title_TH_{{fi-name}}" placeholder="ชื่อไฟล์ (TH)" style="width:200px;"></div><div class="jFiler-item-others"><span>size: {{fi-size2}}</span><span>type: {{fi-type}}</span><span class="jFiler-item-status"></span></div><div class="jFiler-item-assets"><ul class="list-inline"><li><a class="icon-jfi-trash jFiler-item-trash-action" ids="{{fi-name}}"></a></li></ul></div></div></div></div></li>',
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
												<?php if(isset($product["product_file_TH"])){?>

												files: [

												<?php foreach ($product["product_file_TH"] as $row_file)	{?>

												{
													name: "<?php echo $row_file["file_ID"]?>",
													type: "<?php echo $row_file["file_Type"]?>",
													size: "<?php echo $row_file["file_Size"]?>",
													
													


												},
											<?php }?>
													],
												<?php }?>
												onRemove: function(el){			
														var ids = el.find(".icon-jfi-trash").attr("ids");
														$.post('<?php echo base_url('cwcontrol/'.$page.'/delete_file');?>', {id: ids});
													},
												captions: {
														removeConfirmation: 'ยืนยันการลบข้อมูล',
														errors: {
															filesType: 'เฉพาะไฟล์ pdf doc docx xls xlsx เท่านั้น',
															filesSize: '{{fi-name}} ขนาดใหญ่เกินไป โปรเลือกไฟล์ขนาดไม่เกิน {{fi-maxSize}}MB.',

														}

														},

											});
											</script>
											
											<script>
												$(document).ready(function(){

												<?php
												if(isset($product["product_file_TH"])){
													foreach ($product["product_file_TH"] as $row_file)	{
												?>	
												$("#update_file_Title_TH_<?php echo $row_file["file_ID"]?>").val("<?php echo $row_file["file_Title_TH"]?>");
												

												<?php }}?>

												});
											</script>





										</div>  
									</div>
                           		 </div>
                               
                               
                               	<div class="row">
									<div class="col-lg-5">  
									  <div class="form-group">
											<label>อัพโหลดไฟล์ (EN) ขนาดไม่เกิน 10 MB (pdf | doc | docx | xls | xlsx)</label>
											<input  type="file" name="product_file_EN[]" id="File_EN" multiple>
											
											<script>
											$('#File_EN').filer({
												addMore: true,
												maxSize: 10,
												extensions: ['pdf', 'doc', 'docx', 'xls', 'xlsx'],
												changeInput: true,
												showThumbs: true,
												templates: {
													box: '<ul class="jFiler-items-list jFiler-items-default"></ul>',
													item: '<li class="jFiler-item"><div class="jFiler-item-container"><div class="jFiler-item-inner"><div class="jFiler-item-icon pull-left">{{fi-icon}}</div><div class="jFiler-item-info pull-left"><div class="jFiler-item-title" title="{{fi-name}}"><input type="text" class="form-control" name="file_Title_EN[]" placeholder="ชื่อไฟล์ (EN)" style="width:200px;">{{fi-name}}</div><div class="jFiler-item-others"><span>size: {{fi-size2}}</span><span>type: {{fi-extension}}</span><span class="jFiler-item-status">{{fi-progressBar}}</span></div><div class="jFiler-item-assets"><ul class="list-inline"><li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li></ul></div></div></div></div></li>',
													itemAppend: '<li class="jFiler-item"><div class="jFiler-item-container"><div class="jFiler-item-inner"><div class="jFiler-item-icon pull-left">{{fi-icon}}</div><div class="jFiler-item-info pull-left"><div class="jFiler-item-title"><input type="hidden" name="update_file_ID_EN[]" value="{{fi-name}}"/><input type="text" class="form-control" name="update_file_Title_EN[]" id="update_file_Title_EN_{{fi-name}}" placeholder="ชื่อไฟล์ (EN)" style="width:200px;"></div><div class="jFiler-item-others"><span>size: {{fi-size2}}</span><span>type: {{fi-type}}</span><span class="jFiler-item-status"></span></div><div class="jFiler-item-assets"><ul class="list-inline"><li><a class="icon-jfi-trash jFiler-item-trash-action" ids="{{fi-name}}"></a></li></ul></div></div></div></div></li>',
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
												<?php if(isset($product["product_file_EN"])){?>

												files: [

												<?php foreach ($product["product_file_EN"] as $row_file)	{?>

												{
													name: "<?php echo $row_file["file_ID"]?>",
													type: "<?php echo $row_file["file_Type"]?>",
													size: "<?php echo $row_file["file_Size"]?>",
													
													


												},
											<?php }?>
													],
												<?php }?>
												onRemove: function(el){			
														var ids = el.find(".icon-jfi-trash").attr("ids");
														$.post('<?php echo base_url('cwcontrol/'.$page.'/delete_file');?>', {id: ids});
													},
												captions: {
														removeConfirmation: 'ยืนยันการลบข้อมูล',
														errors: {
															filesType: 'เฉพาะไฟล์ pdf doc docx xls xlsx เท่านั้น',
															filesSize: '{{fi-name}} ขนาดใหญ่เกินไป โปรเลือกไฟล์ขนาดไม่เกิน {{fi-maxSize}}MB.',

														}

														},

											});
											</script>
											
											<script>
												$(document).ready(function(){

												<?php
												if(isset($product["product_file_EN"])){
													foreach ($product["product_file_EN"] as $row_file)	{
												?>
												$("#update_file_Title_EN_<?php echo $row_file["file_ID"]?>").val("<?php echo $row_file["file_Title_EN"]?>");

												<?php }}?>

												});
											</script>

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
saveOrder();	
  $("#list1").dragsort({ dragSelector: "img", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });

  function saveOrder() {
        $("#list1.sort").find("input#sort").each(function(k,v){
            $(v).val(k+1);
        });
	  $("#aaa").find(".jFiler-input-caption").find("span").text($("#list1.sort").find("input#sort").length+" files were chosen");
	  
};
</script>
