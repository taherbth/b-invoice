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
 
class V_Supplier
{	
	function V_Supplier()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('supplier_config');	
		$this->v_supplier_init();
	}

	function v_supplier_init()
	{	
		$this->AvSupplier_model_uri	= $this->ci->config->item('DX_vSupplier_model');
	
		$this->AvSupplier_entry_uri	= $this->ci->config->item('DX_AvSupplier_entry_uri');	
		$this->AvSupplier_edit_uri	= $this->ci->config->item('DX_AvSupplier_edit_uri');	
		$this->AvSupplier_delete_uri	= $this->ci->config->item('DX_AvSupplier_delete_uri');	

		// News-Event Views
		$this->AvSupplierentry_view	= $this->ci->config->item('DX_AvSupplierentry_view');	
		$this->AvSupplieredit_view	= $this->ci->config->item('DX_AvSupplieredit_view');	
	}
}
?>