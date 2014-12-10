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
 
class Outstock
{	
	function Outstock()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('stock_out');	
		$this->outstock_init();
	}

	function outstock_init()
	{	
		$this->AstockOut_model_uri	= $this->ci->config->item('DX_stockOut_model');
		$this->Astock_model_uri     = $this->ci->config->item('DX_stock_model');

		$this->AstockOut_home_uri	= $this->ci->config->item('DX_AstockOut_home_uri');	
		$this->AstockOut_entry_uri	= $this->ci->config->item('DX_AstockOut_entry_uri');	
		$this->AstockOut_edit_uri	= $this->ci->config->item('DX_AstockOut_edit_uri');	
		$this->AstockOut_delete_uri	= $this->ci->config->item('DX_AstockOut_delete_uri');	
		$this->AstockOut_show_uri	= $this->ci->config->item('DX_AstockOut_show_uri');	

		// News-Event Views
		$this->AstockOut_home_view 	= $this->ci->config->item('DX_AstockOut_home_view');
		$this->AstockOut_entry_view	= $this->ci->config->item('DX_AstockOut_entry_view');	
		$this->AstockOut_edit_view	= $this->ci->config->item('DX_AstockOut_edit_view');
		$this->AstockOut_show_view	= $this->ci->config->item('DX_AstockOut_show_view');	
	}
}
?>