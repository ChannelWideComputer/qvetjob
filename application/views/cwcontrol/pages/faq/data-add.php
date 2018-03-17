
            
<form role="form" action="<?php echo base_url('cwcontrol/'.$page.'/insert');?>" method="post" enctype="multipart/form-data">

				
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
                                    
                                      
                                    
                                      
                                      <div class="row">
                            			<div class="col-lg-6">  
                                          <div class="form-group">
                                                <label>ถาม (TH)</label>
                                               <textarea class="form-control" name="faq_Ask_TH" rows="3"></textarea>
                                                
                                            </div>  
                                        </div>
                                        <!-- <div class="col-lg-6">  
                                          <div class="form-group">
                                                <label>ถาม (EN)</label>
                                               <textarea class="form-control" name="faq_Ask_EN" rows="3"></textarea>
                                                
                                            </div>  
                                        </div> -->
                                        
                           			 </div>
                                     
                                      
                                     
                                     <div class="row">
                            			<div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>ตอบ (TH)</label>
                                            <textarea class="form-control ckeditor" name="faq_Reply_TH"></textarea> 
                                            </div>  
                                        </div>
                                        <!-- <div class="col-lg-6">  
                                          <div class="form-group">
                                            <label>ตอบ (EN)</label>
                                            <textarea class="form-control ckeditor" name="faq_Reply_EN"></textarea> 
                                            </div>  
                                        </div> -->
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


