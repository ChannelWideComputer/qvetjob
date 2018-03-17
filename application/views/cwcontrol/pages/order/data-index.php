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

     <strong>รายการสั่งซื้อ</strong>


   </div>
   <div class="panel-body">
    <div class="row">


      <div class="col-sm-3 col-md-3 col-lg-3">  
       <form class="form-inline" action="<?= $page_url;?>" method="post">
        <div class="form-group">                            
          <input type="text" class="form-control" name="Keyword" placeholder="ค้นหา" value="<?php if(isset($word)){echo $word;}?>">
        </div>
        <button type="submit" class="btn btn-warning">ค้นหา</button>
      </form>                       

    </div>
    <?php if ($_GET['status'] == "confirm") { ?>
    <div class="col-sm-2 col-md-2 col-lg-2 text-right">

     <form method="post" action="<?php echo base_url('cwcontrol/excel_export/action'); ?>">
      <input type="submit" name="รายชื้อที่ชำระเงินแล้ว" class="btn btn-success" value="รายชื้อที่ชำระเงินแล้ว" />
      <!-- <input type="text" name="date" value="<?=date('') ?>"> -->
    </form>

  </div> 
  <div class="col-sm-3 col-md-3 col-lg-3 text-right">
    <form method="post" action="<?php echo base_url('cwcontrol/excel_export/action2'); ?>">
      <?php $m = date('m'); ?>
      <input type="hidden" name="M" class="btn btn-success" value="<?= $m ?>" />
      <input type="submit" name="รายเดือน" class="btn btn-success" value="รายการสั่งซื้อรายเดือน" />
    </form>

  </div> 
  <div class="col-sm-3 col-md-3 col-lg-3 text-right">

    <form method="post" action="<?php echo base_url('cwcontrol/excel_export/action3'); ?>">
      <?php $y = date('Y'); ?>
      <input type="hidden" name="Y" class="btn btn-success" value="<?= $y ?>" />
      <input type="submit" name="รายปี" class="btn btn-success" value="รายการสั่งซื้อรายปี" />
    </form>

  </div>
  <div class="col-sm-1 col-md-1 col-lg-1 text-right">

    <a data-toggle="modal" href="#Modal_deleteAll" class="btn btn-danger">ลบข้อมูล</a> 

  </div> 
  <?php }else{ ?>
  <div class="col-sm-9 col-md-9 col-lg-9 text-right">

    <a data-toggle="modal" href="#Modal_deleteAll" class="btn btn-danger">ลบข้อมูล</a> 

  </div> 
  <?php } ?>

  


  <div class="col-sm-12 col-md-12 col-lg-12">

    <div class="table-responsive">


      <table class="table table-striped table-bordered table-hover" style="margin-top:10px;" width="100%">
       <thead>
        <tr>
          <td width="4%" align="center">ลำดับ</td>
          <td width="1%" align="center"><input type="checkbox" name="CheckAll" id="selectAll" ></td>
          <td width="30%" align="center">รายละเอียด</td>
          <td width="15%" align="center">วันที่</td>
          <td width="5%" align="center">แจ้งชำระเงิน</td>
          <td width="5%" align="center">สถานะ</td>
          <td width="5%" align="center">รายละเอียดเต็ม</td>
          <?= ($_GET['status'] == "confirm")? " " : "<td width='5%' align='center'>ลบ</td>"; ?>
        </tr>
      </thead>
      <tbody>
        <?php
        if(!isset($order)){
          ?>
          <tr>
           <td colspan="11" align="center">ไม่พบข้อมูล</td>
         </tr>
         <?php 
       }else{
        $i=$pagination["start_row"];								   
        foreach ($order as $row)
        {
          $i++;	
          ?>    
          <tr> 
           <td align="center"><?= $i;?></td> 
           <td align="center"><input class="ChkBox" type="checkbox" name="checkboxlist"  value="<?= $row["sales_id"];?>"></td> 
           <td align="left">

            INV No.: <strong><?= $row["sales_inv"]?></strong><br>
            total Amount : <strong style="color: <?= ($row["sales_amount_lang"] == 'USD')? "#f00" : "#00f"; ?>"><?= $row["sales_amount_lang"] . " : " . number_format($row["sales_total_amount"]+$row['sales_ship'],2);?></strong> | total Qty : <strong><?= $row["sales_total_qty"]?></strong><br>
            Customers : <strong><?= $row["sachk_name"]?></strong> </strong>
          </td>



          <td align="center"><?= DateThai_timestame($row["sales_date"]);?></td> 

          <td align="center">
            <?php if ($row["sales_payment"] == 1) { ?>
            <a style="text-decoration:none;" data-toggle="modal" id="<?=$row["sales_id"]?>" class="aaaa" title="Detail" href="#myModal">
              <i class="fa fa-bell">

              </i>
            </a>
            <?php }else{ ?>
            <i class="fa fa-bell-slash-o">
              <?php } ?>

            </td>

            <td align="center">
              <select class="form-control status" name="sales_pay_status"
              id="<?php echo $row['sales_id'];?>">
              <?php

              $query2 = $this->db->order_by('sast_sort','ASC')->get('tb_sales_status');
              foreach ($query2->result_array() as $row2) {

               ?>
               <option value="<?=$row2['sast_id']?>"
                <?php if($row["sales_pay_status"]==$row2['sast_id']){ echo "selected";  }?> ><?=$row2["sast_name"]?></option>
                <?php } ?>
              </select> 

            </td>


            <td align="center"><a href="<?= $page_url;?>&type=edit&id=<?= $row["sales_id"];?>"><i class="fa fa-cog" style="color:#333;font-size:1.4em"></i></a></td>
            <?= ($_GET['status'] == "confirm")? " " : "<td align='center'><a href='#Modal_delete' class='delete' id='".$row["sales_id"]."'><i class='fa fa-trash-o' style='color:#333;font-size:1.4em'></i></a></td>"; ?>
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
    <strong>ทั้งหมด <?= $pagination["Num_Rows"]?> รายการ  หน้า : <?= $pagination["current_page"]?> / <?= $pagination["total_pages"]?></strong>
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

<script type="text/javascript">
  $(document).ready(function(){ 

    $("#selectAll").click(function(){
     var checkAll = $(this).prop("checked");
     $("input.ChkBox").each(function(){
      $(this).prop({"checked":checkAll});
    });
   });

    $('.delete').click(function(){
		//alert();
		$('#Modal_delete').modal('show');
		
		var ID = $(this).attr("id");
		var dataString='id='+ID;
    //alert(ID);
    $('#btn_delete').click(function(){
     jQuery.ajax({
       type: "POST",
       url: "<?= base_url('cwcontrol/'.$page.'/delete');?>",
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

    $('#btn_deleteAll').click(function(){
			//if($("#checkkBoxId").attr("checked")==true)
      var checkValues = $('input[name=checkboxlist]:checked').map(function()
      {
        return $(this).val();
      }).get();

      $.ajax({
        url: '<?= base_url('cwcontrol/'.$page.'/delete_All');?>',
        type: 'post',
        data: { id: checkValues},
        success:function(data){
					//alert(data);
					location.reload();
					$('#btn_deleteAll').modal('hide')
        }
      });

    });

    $('.status').change(function(){

      var ID = $(this).attr("id");
      var no = $(this).val();
      $.ajax({
        url: '<?php echo base_url('cwcontrol/'.$page.'/status');?>',
        type: 'post',
        data: {id:ID, value:no,},
        success:function(data){
            //alert(data);
            location.reload();
            
          }
        });
      
    });

    $('.aaaa').click(function(){

      var ID = $(this).attr("id");
        //alert(ID);      
        $.ajax({
          url: '<?php echo base_url('cwcontrol/'.$page.'/payslip');?>',
          type: 'post',
          data: {id:ID},
          //dataType:'json',
          success:function(data){

            console.log(JSON.stringify(data));
            //alert(data);              
              //location.reload();
              $('#show2').html(data);
              //$('#show2').load(<?php //echo base_url('cwcontrol/pages/register/member_detail');?>,{ID:register_ID});
              
            }
          });

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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="panel panel-success" style="margin-bottom: :0px;">
        <div class="panel-heading">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Detail

        </div>
        <div class="panel-body" align="center">
          <div class="modal-body " id="show2"> 

            <!-- payslip -->
          </div>
        </div>

      </div>
    </div>
  </div>
</div>