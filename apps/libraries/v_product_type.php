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
 
class V_Product_type
{	
	function V_Product_type()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('product_type_config');	
		$this->v_product_type_init();
	}

	function v_product_type_init()
	{	
		$this->AvProduct_type_model_uri		= $this->ci->config->item('DX_vProduct_type_model');
	
		$this->AvProduct_type_entry_uri		= $this->ci->config->item('DX_AvProduct_type_entry_uri');	
		$this->AvProduct_type_edit_uri		= $this->ci->config->item('DX_AvProduct_type_edit_uri');	
		$this->AvProduct_type_delete_uri	= $this->ci->config->item('DX_AvProduct_type_delete_uri');	

		// News-Event Views
		$this->AvProduct_type_entry_view	= $this->ci->config->item('DX_AvProduct_type_entry_view');	
		$this->AvProduct_type_edit_view		= $this->ci->config->item('DX_AvProduct_type_edit_view');	
	}
}
?>