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
 
class Instock
{	
	function Instock()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('stock_in');	
		$this->instock_init();
	}

	function instock_init()
	{	
		$this->AstockIn_model_uri	= $this->ci->config->item('DX_stockIn_model');
		$this->Astock_model_uri     = $this->ci->config->item('DX_stock_model');

		$this->AstockIn_home_uri	= $this->ci->config->item('DX_AstockIn_home_uri');	
		$this->AstockIn_entry_uri	= $this->ci->config->item('DX_AstockIn_entry_uri');	
		$this->AstockIn_edit_uri	= $this->ci->config->item('DX_AstockIn_edit_uri');	
		$this->AstockIn_delete_uri	= $this->ci->config->item('DX_AstockIn_delete_uri');	
		$this->AstockIn_show_uri	= $this->ci->config->item('DX_AstockIn_show_uri');	

		// News-Event Views
		$this->AstockIn_home_view 	= $this->ci->config->item('DX_AstockIn_home_view');
		$this->AstockIn_entry_view	= $this->ci->config->item('DX_AstockIn_entry_view');	
		$this->AstockIn_edit_view	= $this->ci->config->item('DX_AstockIn_edit_view');
		$this->AstockIn_show_view	= $this->ci->config->item('DX_AstockIn_show_view');	
	}
}
?>