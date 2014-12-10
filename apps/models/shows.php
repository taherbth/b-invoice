<?php
/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		Model Public Class																	*
 * 		@Author			Kazi Sanchoy Ahmed (B.Sc in CSE)													*
 * 		@Email			sanchoy7@gmail.com		                                     						*
 *		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 *																											*
 ************************************************************************************************************
*/

class Shows extends Model 
{
	function Shows()
	{
		parent::Model();
		$this->_prefix 	= $this->config->item('DX_table_prefix');
		//$this->_branch_table = $this->_prefix.$this->config->item('DX_branch_table');	
	}
	
	function getThisValue($cond = FALSE, $tableName = '', $limit = '', $order = 'id ASC')
	{
		$tableName = $this->_prefix.$tableName;	
		$this->db->select(" * ", FALSE);
		if($cond)
		{
			$this->db->where($cond);
		}
        $this->db->order_by($order); 
		return $this->db->get($tableName, $limit)->result();
	}
	
	function getReceivedWorkOrderProduct($contentId)
	{
		$this->db->select("*");
        $this->db->from('received_work_order_product');
		$this->db->join('product', 'product.product_id = received_work_order_product.product_name', 'left');
		$this->db->where('received_work_order_product.work_order_id', $contentId);
		return $this->db->get()->result();
	}
}
?>