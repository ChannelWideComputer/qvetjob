<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title></title>

    <?php $this->load->view('cwcontrol/script');?> 
    
</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0px;">
            
            <?php $this->load->view('cwcontrol/header');?>   
            <!-- /.navbar-top-links -->

			
            <?php $this->load->view('cwcontrol/left_menu');?>   
            
            <!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper">

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
			<div class="row">
				<div class="col-lg-12" style="margin-top: 20px;">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('cwcontrol/'.$page);?>">สินค้าขายดี</a></li>
						<li class="active">เพิ่มสินค้าขายดี</li>
					</ol>
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong>สินค้าขายดี</strong>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6">
									<form class="form-inline" action="<?php echo $page_url;?>"
										method="post">
										<div class="form-group">
											<input type="text" class="form-control" name="Keyword"
												placeholder="ค้นหา"
												value="<?php if(isset($word)){echo $word;}?>">
										</div>
										<button type="submit" class="btn btn-warning">ค้นหา</button>
									</form>
								</div>

								<div class="col-lg-6 text-right">
									<a data-toggle="modal" href="#Modal_add" class="btn btn-success " id="<?php echo $id;?>">บันทึก สินค้าขายดี</a>
								</div>

							</div>


							<div class="col-lg-12">

								<div class="table-responsive">


									<table class="table table-striped table-bordered table-hover"
										style="margin-top: 10px;" width="100%">
										<thead>
											<tr>
												<td width="4%" align="center">ลำดับ</td>
												<td width="1%" align="center"><input type="checkbox"
													name="CheckAll" id="selectAll"></td>
												<td width="25%" align="center">ชื่อ</td>
												<td width="15%" align="center">หมวดหมู่</td>
											</tr>
										</thead>
										<tbody>
<?php
if (! isset($row)) {
    ?>
<tr>
												<td colspan="11" align="center">ไม่พบข้อมูล</td>
											</tr>
<?php
} else {
    $i = $pagination["start_row"];
    foreach ($row as $row) {
        
        $i ++;
        ?>    
 <tr>
												<td align="center"><?php echo $i;?></td>
												<td align="center"><input class="ChkBox" type="checkbox"
													name="checkboxlist" value="<?php echo $row["id"];?>"></td>
												<td align="center"><?php echo $row["product_name_TH"]?></td>
												<td align="center">
										<?php
        $query_cat = $this->db->query('SELECT * FROM `tb_category` WHERE `id` = ' . $row["category_id_head"]);
        $row_cat = $query_cat->row_array();
        if (isset($row_cat["category_name_TH"])) {
            echo $row_cat["category_name_TH"];
        } else {
            echo "หมวดหมู่ถูกลบออก กรุณาแก้ไขหมวดหมู่";
        }
        
        ?>
										</td>
											</tr>
 
 <?php }}?>
 
 </tbody>
									</table>
								</div>


							</div>




						</div>
						<!-- /.row (nested) -->

						<!-- Pagination -->

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

						<!-- /.Pagination -->

					</div>
					<!-- /.panel-body -->
				</div>


				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>

		<script type="text/javascript">
$(document).ready(function(){ 

$("#selectAll").click(function(){
     var checkAll = $(this).prop("checked");
     $("input.ChkBox").each(function(){
          $(this).prop({"checked":checkAll});
     });
});

	$('.delete').click(function(){
		
		$('#Modal_delete').modal('show');
		
		var ID = $(this).attr("id");
		var dataString='id='+ID;
		
		$('#btn_delete').click(function(){
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url('cwcontrol/'.$page.'/delete');?>",
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
	
	$('#btn_add').click(function(){
			//if($("#checkkBoxId").attr("checked")==true)
			
            var checkValues = $('input[name=checkboxlist]:checked').map(function()
            {
                return $(this).val();
            }).get();
			
			
            $.ajax({
                url: '<?php echo base_url('cwcontrol/'.$page.'/save_best');?>',
                type: 'post',
                data: { id: checkValues},
                success:function(data){
                    
                	$('#btn_add').modal('hide')
                	location.reload();
                	//alert(data);
                	if (data=='1') {
						alert('ทำการเพิ่มสินค้าที่เกี่ยวข้องสำเร็จค่ะ');
					} else {
						alert('ทำการเพิ่มสินค้าที่เกี่ยวข้องไม่สำเร็จค่ะ กรุณาเพิ่มใหม่อีกครั้ง');
					}
					
					

                }
            });
			
	});
		
			
			
	});

</script>



		<div class="modal fade" id="Modal_add" tabindex="-1"
			role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="panel panel-success" style="margin-bottom: 0px;">
						<div class="panel-heading">
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							สินค้าขายดี

						</div>
						<div class="panel-body" align="center">
							<p>เพิ่มข้อมูลสินค้าขายดี</p>
						</div>
						<div class="modal-footer">
							<button type="button" id="btn_add" class="btn btn-success">เพิ่มข้อมูล</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
<?php $this->load->view('cwcontrol/footer');?>
    </div>
	<!-- /#wrapper -->





</body>
</html>