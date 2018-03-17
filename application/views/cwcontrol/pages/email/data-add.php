
            
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
                            			<div class="col-lg-4">  
                                          <div class="form-group">
                                                <label>ชื่อ-นามสกุล</label>
                                                <input type="text" class="form-control" name="member_Name" required>
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                     
                                     <div class="row">
                            			<div class="col-lg-4">  
                                          <div class="form-group">
                                            <label>ที่อยู่</label>
                                            <textarea name="member_Add" class="form-control" rows="3"></textarea>
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                     
                                     <div class="row">
                            			<div class="col-lg-4">  
                                          <div class="form-group">
                                                <label>โทรศัพท์</label>
                                                <input type="text" class="form-control" name="member_Phone">
                                                
                                            </div>  
                                        </div>
                           			 </div>
                                     
                                     <div class="row">
                            			<div class="col-lg-4">  
                                          <div id="Email" class="form-group has-feedback">
                                                <label>E-mail</label>
                                                <input type="text" class="form-control" name="member_Email" id="member_Email">
                                                <span id="Emailicon" class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                            <span id="EmailBlock1" class="help-block"></span>   
                                            </div>  
                                        </div>
                           			 </div>
                                     
                                   
                                    
                                     <div class="row">
                            			<div class="col-lg-4">  
                                          <div id="Pass" class="form-group has-feedback">
                                                <label>รหัสผ่าน</label>
                                                <input type="text" class="form-control" name="member_Pass" id="member_Pass">
                                                
                                              <span id="Passicon" class="glyphicon  form-control-feedback" aria-hidden="true"></span>
                                            <span id="PassBlock1" class="help-block"></span>  
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
$(document).ready(function(){
	
	
			$("#member_Email").change(function(){
				var member_Mail1 = $("#member_Email").val();
				//alert(member_Mail1);
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
					if (filter.test(member_Mail1) == false) {
						
						//$('#myModalLabel').html('ตรวจสอบอีเมล์')						
						$('#EmailBlock1').html('รูปแบบอีเมล์ไม่ถูกต้อง')
						$('#Email').removeClass("has-success");
						$('#Emailicon').removeClass("glyphicon-ok");
						
						$('#Email').addClass("has-error");
						$('#Emailicon').addClass("glyphicon-remove");
						
						$("#member_Email").focus();
						$("#member_Email").val("");
						exit();
						
					}
			});
			
			$("#member_Email").change(function(){
				var member_Email1 = $("#member_Email").val();
				
				$.post("<?php echo base_url('cwcontrol/'.$page.'/chk_mail');?>", { 
					member_Email: member_Email1, }, 
					function(result){
						//alert(result);
						if(result){
							$('#EmailBlock1').html('อีเมล์นี้ใช้ได้ค่ะ')
							$('#Email').removeClass("has-error");
							$('#Emailicon').removeClass("glyphicon-remove");
							
							$('#Email').addClass("has-success");
							$('#Emailicon').addClass("glyphicon-ok");
						
							
							
						}else{
							
							$('#EmailBlock1').html('อีเมล์นี้มีในระบบแล้วค่ะ')
							$('#Email').removeClass("has-success");
							$('#Emailicon').removeClass("glyphicon-ok");
						
							$('#Email').addClass("has-error");
							$('#Emailicon').addClass("glyphicon-remove");
							
							$("#member_Email").focus();
							$("#member_Email").val("");
							
							
						}
				});
			});
	
	
	
			
			
	
			
// Password //
$("#member_Pass").change(function(){
	var member_Pass = $("#member_Pass").val();
	//pattern="[a-zA-Z0-9]{6,}$"
	
	var pattern_pass = /[a-zA-Z0-9]{4,}$/;
	if (pattern_pass.test(member_Pass) == false) {
		
		
				
		$('#PassBlock1').html('รหัสผ่านจะต้องเป็นตัวอักษร a-z, A-Z, 0-9 และไม่ต่ำกว่า 4 ตัวอักษร')
		$('#Pass').removeClass("has-success");
		$('#Passicon').removeClass("glyphicon-ok");
		
		$('#Pass').addClass("has-error");
		$('#Passicon').addClass("glyphicon-remove");
						
		$("#member_Pass").focus();
		$("#member_Pass").val("");
		
	
	}else{
		
		$('#PassBlock1').html('')
		$('#Pass').removeClass("has-error");
		$('#Passicon').removeClass("glyphicon-remove");
		
		$('#Pass').addClass("has-success");
		$('#Passicon').addClass("glyphicon-ok");
		
	}
});


	
	
});
</script>
