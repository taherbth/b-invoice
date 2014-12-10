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
 
class V_Warehouse
{	
	function V_Warehouse()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('warehouse_config');	
		$this->v_warehouse_init();
	}

	function v_warehouse_init()
	{	
		$this->AvWarehouse_model_uri	= $this->ci->config->item('DX_vWarehouse_model');
	
		$this->AvWarehouse_entry_uri	= $this->ci->config->item('DX_AvWarehouse_entry_uri');	
		$this->AvWarehouse_edit_uri	= $this->ci->config->item('DX_AvWarehouse_edit_uri');	
		$this->AvWarehouse_delete_uri	= $this->ci->config->item('DX_AvWarehouse_delete_uri');	

		// News-Event Views
		$this->AvWarehouse_entry_view	= $this->ci->config->item('DX_AvWarehouse_entry_view');	
		$this->AvWarehouse_edit_view	= $this->ci->config->item('DX_AvWarehouse_edit_view');	
	}
}
?>