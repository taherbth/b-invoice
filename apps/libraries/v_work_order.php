<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		DX Auth Config																		*
 * 		@Author			Kazi Sanchoy Ahmed	(B.Sc in CSE)				                             		*
 * 		@Email			sanchoy7@gmail.com			                                                        *
 *		@Profession		Web Application Developer & Programmer												*
 *																											*
 ************************************************************************************************************
*/
 
class V_Work_order
{	
	function V_Work_order()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('work_order_config');	
		$this->v_work_order_init();
	}

	function v_work_order_init()
	{	
		$this->AvReceivework_order_model_uri	= $this->ci->config->item('DX_vReceivework_order_model');
	
		$this->AvReceivework_order_entry_uri	= $this->ci->config->item('DX_AvReceivework_order_entry_uri');	
		$this->AvReceivework_order_edit_uri	= $this->ci->config->item('DX_AvReceivework_order_edit_uri');	
		$this->AvReceivework_order_delete_uri	= $this->ci->config->item('DX_AvRequisition_delete_uri');	

		// News-Event Views
		$this->AvReceivework_orderentry_view	= $this->ci->config->item('DX_AvReceivework_orderentry_view');	
		$this->AvReceivework_orderedit_view	= $this->ci->config->item('DX_AvReceivework_orderedit_view');	
	}
}
?>