<?php
/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		Model Public Class																	*
 * 		@Author			Kazi Sanchoy Ahmed (B.Sc in CSE)													*
 * 		@Email			sanchoy7@gmail.com		                                    						*
 *		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 *																											*
 ************************************************************************************************************
*/

class Common_Tasks extends Model 
{
	function Common_Tasks()
	{
		parent::Model();
		$this->_prefix 	= $this->config->item('DX_table_prefix');
	}
	
	// General function	
    function listClient(){
	    $user_id = $this->session->userdata('user_id');
		$this->db->from($this->_prefix.'user_type');
		return $this->db->generateList("org_id='$user_id'", 'id', 0, NULL, 'id', 'user_type');		
	}
	
	// General function	
    function listGroup(){
		 $user_id = $this->session->userdata('user_id');
		 $this->db->from($this->_prefix.'org_group');
		 return $this->db->generateList("org_id='$user_id'", 'id', 0, NULL, 'id', 'group_name');	
	}
	
	function workordernos(){
		$this->db->from($this->_prefix.'received_work_order_detail');
		return $this->db->generateList("received_work_order_detail.work_order_status !='successfull'", 'work_order_id', 0, NULL, 'work_order_id', 'work_order_id');		
	}
	
	function product_type_info(){
		$this->db->from($this->_prefix.'product_type');
		return $this->db->generateList(NULL, 'id', 0, NULL, 'id', 'type_name');		
	}
	
	function product_code_info(){
		$this->db->from($this->_prefix.'product');
		return $this->db->generateList(NULL, 'id', 0, NULL, 'id', 'product_code');		
	}
	
	function product_name_info(){
		$this->db->from($this->_prefix.'product');
		return $this->db->generateList("product.status !='inactive'", 'id', 0, NULL, 'id', 'name');		
	}
	
	function RequisitionSubmit_info(){
		$this->db->from($this->_prefix.'employeeinfo');
		return $this->db->generateList(NULL, 'id', 0, NULL, 'id', 'name');		
	}
	
// General function	
    function listEmployeeName(){
		$this->db->from($this->_prefix.'employeeinfo');
		return $this->db->generateList(NULL, 'id', 0, NULL, 'id', 'name');		
	}
	// General function	
    function listProductName(){
		$this->db->from($this->_prefix.'product');
		return $this->db->generateList("product.status !='inactive'", 'product_id', 0, NULL, 'product_id', 'name');		
	}
	// General function	
    function listProductType(){
		$this->db->from($this->_prefix.'product_type');
		return $this->db->generateList(NULL, 'product_type_id', 0, NULL, 'product_type_id', 'type_name');		
	}
	// General function	
    function listEnquiry(){
		$this->db->from($this->_prefix.'sell_enquiry');
		return $this->db->generateList(NULL, 'enquiry_id', 0, NULL, 'enquiry_id', 'enquiry_id');		
	}
	
	// General function	
    function listQuotation(){
		$this->db->from($this->_prefix.'issued_quotation_detail');
		return $this->db->generateList("issued_quotation_detail.status !='successfull'", 'quotation_id', 0, NULL, 'quotation_id', 'quotation_id');		
	}
	// General function	
    function listSupplier(){
		$this->db->from($this->_prefix.'supplier_info');
		return $this->db->generateList(NULL, 'supplier_id', 0, NULL, 'supplier_id', 'name');		
	}
	
	// General function	
    function listWarehouse(){
		$this->db->from($this->_prefix.'warehouse');
		return $this->db->generateList(NULL, 'warehouse_id', 0, NULL, 'warehouse_id', 'name');		
	}
	
	function UnitType_info(){
		$this->db->from($this->_prefix.'unit_type');
		return $this->db->generateList(NULL, 'id', 0, NULL, 'id', 'unit_type');		
	}
}
?>