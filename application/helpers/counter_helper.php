<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
//error_reporting(E_ALL ^ E_NOTICE);


if ( ! function_exists('get_counter'))
{
	
	function get_counter()
	{
		$CI =& get_instance();
		$CI->load->database();
		
		
		$strSQLs = " SELECT DATE FROM counter LIMIT 0,1";
		$objResults = $CI->db->query($strSQLs)->row_array();

			if($objResults["DATE"] != date("Y-m-d"))
			{

				$strSQL_c = " SELECT '".date('Y-m-d',strtotime("-1 day"))."',COUNT(*) AS intYesterday FROM  counter WHERE 1 AND DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";
				$objResult_c = $CI->db->query($strSQL_c)->row_array();

				$data = array(
						'DATE' => date('Y-m-d',strtotime("-1 day")),
						'NUM' => $objResult_c["intYesterday"],
				);
				$CI->db->insert('daily',$data);


				$CI->db->where('DATE !=', date("Y-m-d"));  
				$CI->db->delete('counter');
				

			}
		//$sql = $CI->db->last_query();


		
		
		$rs = $CI->db->query(" select DATE  from counter  where IP='".$CI->input->ip_address()."' ");
		if( $rs->num_rows() <= 0 )
		{
			$data = array(
					'DATE' => date("Y-m-d"),
					'IP' => $CI->input->ip_address(),//$_SERVER["REMOTE_ADDR"]
			);
			$CI->db->insert('counter',$data);
			
		}
		
		
		// Today //
		$strSQL = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '".date("Y-m-d")."'  ";
		$objResult = $CI->db->query($strSQL)->row_array();
		$strToday = $objResult["CounterToday"];
		$data_count["strToday"] = $strToday;
		
		// Yesterday //
		$strSQL2 = " SELECT NUM FROM daily WHERE DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";
		$objResult2 = $CI->db->query($strSQL2)->row_array();
		$strYesterday = $objResult2["NUM"];
		$data_count["strYesterday"] = $strYesterday;

		// This Month //
		$strSQL3 = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";
		$objResult3 = $CI->db->query($strSQL3)->row_array();
		$strThisMonth = $objResult3["CountMonth"]+$strToday;
		$data_count["strThisMonth"] = $strThisMonth;

		// Last Month //
		$strSQL4 = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m',strtotime("-1 month"))."' ";
		$objResult4 = $CI->db->query($strSQL4)->row_array();
		$strLastMonth = $objResult4["CountMonth"];
		$data_count["strLastMonth"] = $strLastMonth;
		
		// This Year //
		$strSQL5 = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y')."' ";
		$objResult5 = $CI->db->query($strSQL5)->row_array();
		$strThisYear = $objResult5["CountYear"];
		$data_count["strThisYear"] = $strThisYear;

		// Last Year //
		$strSQL6 = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y',strtotime("-1 year"))."' ";
		$objResult6 = $CI->db->query($strSQL6)->row_array();
		$strLastYear = $objResult6["CountYear"];
		$data_count["strLastYear"] = $strLastYear;

		// This Total //
		$strSQL7 = " SELECT SUM(NUM) AS CountTotal FROM daily ";
		$objResult7 = $CI->db->query($strSQL7)->row_array();
		$strThisTotal = $objResult7["CountTotal"]+$strToday;
		$data_count["strThisTotal"] = $strThisTotal;
		
		
        return $data_count;
		
		
		
	}
	
	///ไม่ใช้แล้ว
	/*function counter_yesterday()
	{
		$CI =& get_instance();
		$CI->load->database();
		
		$strSQL2 = " SELECT NUM FROM daily WHERE DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";
		$objResult2 = $CI->db->query($strSQL2)->row_array();
		
		return $objResult2["NUM"];
	}
	
	
	function counter_thismonth()
	{
		$CI =& get_instance();
		$CI->load->database();
		$strSQL3 = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";
		$objResult3 = $CI->db->query($strSQL3)->row_array();
		$strThisMonth = $objResult3["CountMonth"];
		
		
		return $strThisMonth;
		
	}
	
	
	
	
	
	function counter_thisyear()
	{
		$CI =& get_instance();
		$CI->load->database();
		$strSQL4 = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y',strtotime("-1 year"))."' ";
		$objResult4 = $CI->db->query($strSQL4)->row_array();
		$strLastYear = $objResult4["CountYear"];
		return $strLastYear;
		
	}
	
	function counter_total()
	{
		$CI =& get_instance();
		$CI->load->database();
		$strSQL5 = " SELECT SUM(NUM) AS CountTotal FROM daily ";
		$objResult5 = $CI->db->query($strSQL5)->row_array();
		$strThisTotal = $objResult5["CountTotal"]+$strToday;
		return $strThisTotal;
		
	}*/
	
	
	

}



?>