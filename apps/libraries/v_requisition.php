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
 
class V_Requisition
{	
	function V_Requisition()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('requisition_config');	
		$this->v_requisition_init();
	}

	function v_requisition_init()
	{	
		$this->AvRequisition_model_uri	      = $this->ci->config->item('DX_vRequisition_model');
		$this->AvRequisitionproduct_model_uri = $this->ci->config->item('DX_vRequisitionproduct_model');

		$this->AvRequisition_entry_uri	= $this->ci->config->item('DX_AvRequisition_entry_uri');	
		$this->AvRequisition_edit_uri	= $this->ci->config->item('DX_AvRequisition_edit_uri');	
		$this->AvRequisition_delete_uri	= $this->ci->config->item('DX_AvRequisition_delete_uri');	
		$this->AvRequisition_show_uri	= $this->ci->config->item('DX_AvRequisition_show_uri');	

		// News-Event Views
		$this->AvRequisition_entry_view	= $this->ci->config->item('DX_AvRequisitionentry_view');	
		$this->AvRequisition_edit_view	= $this->ci->config->item('DX_AvRequisitionedit_view');	
		$this->AvRequisition_show_view	= $this->ci->config->item('DX_AvRequisitionshow_view');	
	}
}
?>