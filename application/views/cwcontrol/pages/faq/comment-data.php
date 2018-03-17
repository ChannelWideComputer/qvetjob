
<div class="row">
   <div class="col-lg-12" style="margin-top:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
            
                <div class="row">
                    <div class="col-lg-12">    
                       <strong><?php echo $faq["faq_Ask_TH"]?></strong> 
                    </div>
                    
                   
                    
                    
                </div>
               
             
            
            </div>
            <div class="panel-body">
                <div class="row">            
                  
                    <div class="col-lg-12">
                        

                       <div class="row">
                            <div class="col-lg-12">  
                              <div class="form-group">
                                 <label>ตอบ</label><br>  
                                   
                                 <?php echo $faq["faq_Reply_TH"]?>   
                                
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






<style>
select{
	width: auto !important;
	height: auto !important;
    padding: 1px !important;	
}
.pagination {
	margin: 0px 0 !important; 
	float:right;
}
</style>   
<div class="row">
               <div class="col-lg-12" style="margin-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       
                           <strong>ความคิดเห็น</strong>
                         
                        
                        </div>
                        <div class="panel-body">
                            <div class="row">            
                              
                                <div class="col-lg-12">
                                    
<div class="table-responsive">


  <table class="table table-striped table-bordered table-hover" style="margin-top:10px;" width="100%">
   <thead>
    <tr>
      <td  align="center">รายละเอียด</td>
      <td width="10%" align="center">สถานะ</td>
      <td width="5%" align="center">แก้ไข</td>
      <td width="5%" align="center">ลบ</td>
    </tr>
 </thead>
 <tbody>
<?php
if(!isset($faq["comment"])){
?>
<tr>
	<td colspan="11" align="center">ไม่พบข้อมูล</td>
</tr>
<?php 
}else{
$i=$pagination["start_row"];								   
foreach ($faq["comment"] as $row)
{
$i++;	
?>     
 <tr> 
 <td align="left"><?php echo $row["ans_Detail"]?><br><br><strong>ตอบโดย</strong>  <?php echo $row["ans_Name"]?> &nbsp;&nbsp;&nbsp;&nbsp;<strong>วันที่โพส</strong> <?php echo DateThai_timestame($row["ans_Date"]);?> <?php if($row["ans_UpDate"] != "0000-00-00 00:00:00"){?> &nbsp;&nbsp;&nbsp;&nbsp;<strong>แก้ไขล่าสุด</strong> <?php echo DateThai_timestame($row["ans_UpDate"]);}?></td>
 <td align="center">
   
   <input type="checkbox" class="status" data-size="mini" data-on-color="success" id="<?php echo $row["ans_ID"];?>" <?php if($row["ans_Status"] == 1){ echo "checked";}?>>
   
   
 </td>
 <td align="center"><a href="<?php echo $page_url;?>?type=comment_edit&id=<?php echo $row["ans_ID"]?>"><i class="fa fa-cog" style="color:#333;font-size:1.4em"></i></a></td>
 <td align="center"><a href="#" class="delete" id="<?php echo $row['ans_ID'];?>"><i class="fa fa-trash-o" style="color:#333;font-size:1.4em"></i></a></td>
 </tr>
 
 <?php }}?>
 
 </tbody>
  </table>
</div>                
                                    
                                </div>
                                
                                
                                
                              
                            </div>
                            <!-- /.row (nested) -->
                            
                            
                           <div class="row">
                              <div class="col-lg-6">
                                    <strong>ทั้งหมด <?php echo $pagination["Num_Rows"]?> รายการ  หน้า : <?php echo $pagination["current_page"]?> / <?php echo $pagination["total_pages"]?></strong>
                              </div>
                          	  <div class="col-lg-6">
                                 <nav>
                                  <ul class="pagination">
                                    
                					<?php if(isset($page_str)){echo $page_str;} ?>
                                    
                                  </ul>
                       		  </nav>
                           </div>
                       </div>  
                                
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->          
            </div>


<div class="row">
   <div class="col-lg-12" style="margin-top:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
            
                <div class="row">
                    <div class="col-lg-12">    
                       <strong>แสดงความคิดเห็น</strong> 
                    </div>
                    
                    
                </div>
               
             
            
            </div>
            <div class="panel-body">
                <div class="row">            
                  
                    <div class="col-lg-12">
                        

                       <div class="row">
                            <div class="col-lg-12">  
                              <div class="form-group">
                              
                              
<form name="frm_add_reply" id="frm_add_reply" action="<?php echo base_url('cwcontrol/'.$page.'/add_ans');?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="method" id="method" value="add_ans"/>
<input type="hidden" name="faq_ID" value="<?php echo $faq['faq_ID'];?>"/>


<div class="col-lg-12">  
  <div class="form-group">       
     <textarea name="ans_Detail" class="form-control ckeditor"/></textarea><br>

<button type="submit" class="btn btn-success ">บันทึกข้อมูล</button>
   </div>  
</div>

</form>
                              
                              
                                
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


	$('.delete').click(function(){
		//alert();
		$('#Modal_delete').modal('show');
		
		var ID = $(this).attr("id");
		var dataString='id='+ID;
		$('#btn_delete').click(function(){
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url('cwcontrol/'.$page.'/delete_ans');?>",
			data: {id:ID},
			cache: false,
			success: function(html)
				{
					location.reload();
					
				}
		});//จบการส่งข้อมูล
		});
 		return false;
	});
	
			
	$(".status").bootstrapSwitch({
	  onSwitchChange: function(event, state) {
		var ID = $(this).attr("id");
		//alert(ID);
		$.ajax({
				url: '<?php echo base_url('cwcontrol/'.$page.'/status_ans');?>',
				type: 'post',
				data: {id:ID},
				success:function(data){
					//alert(data);
					//location.reload();

				}
		});
	  }
	});
			
			
			
			
			
			
	});

</script>



<div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-danger" style="margin-bottom:0px;">
    <div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    ลบข้อมูล
       
    </div>
    <div class="panel-body" align="center">
        <p> ยืนยันการลบข้อมูล</p>
    </div>
    <div class="modal-footer">        
        <button type="button" id="btn_delete" class="btn btn-danger">ลบข้อมูล</button>              
     </div>
	</div>
    </div>
  </div>
</div>


<div class="modal fade" id="Modal_deleteAll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-danger" style="margin-bottom:0px;">
    <div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    ลบข้อมูล
       
    </div>
    <div class="panel-body" align="center">
        <p> ยืนยันการลบข้อมูลทั้งหมดที่เลือก</p>
    </div>
    <div class="modal-footer">        
        <button type="button" id="btn_deleteAll" class="btn btn-danger">ลบข้อมูล</button>              
     </div>
	</div>
    </div>
  </div>
</div>