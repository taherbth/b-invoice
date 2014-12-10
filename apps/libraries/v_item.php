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
 
class V_Item 
{	
	function V_Item()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('item_config');	
		$this->v_item_init();
	}

	function v_item_init()
	{	
		$this->AvItem_model_uri	= $this->ci->config->item('DX_vItem_model');
		$this->AvCustom_duty_model_uri	= $this->ci->config->item('DX_vCustom_duty_model');
	
		$this->AvItem_entry_uri	= $this->ci->config->item('DX_AvItem_entry_uri');	
		$this->AvItem_show_uri	= $this->ci->config->item('DX_AvItem_show_uri');	
		$this->AvItem_edit_uri	= $this->ci->config->item('DX_AvItem_edit_uri');	
		$this->AvItem_delete_uri= $this->ci->config->item('DX_AvItem_delete_uri');	

		// News-Event Views
		$this->AvItementry_view	= $this->ci->config->item('DX_AvItementry_view');	
		$this->AvItemedit_view	= $this->ci->config->item('DX_AvItemedit_view');
		$this->AvItemshow_view	= $this->ci->config->item('DX_AvItemshow_view');	
	
	}
}
?>