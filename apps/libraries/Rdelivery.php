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
 
class Rdelivery
{	
	function Rdelivery()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('received_delivery');	
		$this->rdelivery_init();
	}

	function rdelivery_init()
	{	
		$this->ArDelivery_model_uri	= $this->ci->config->item('DX_rDelivery_model');
		$this->ArDeliveryProduct_model_uri = $this->ci->config->item('DX_rDeliveryProduct_model');
		$this->Astock_model_uri     = $this->ci->config->item('DX_stock_model');
		$this->AstockIn_model_uri   = $this->ci->config->item('DX_stockIn_model');

		$this->ArDelivery_home_uri	= $this->ci->config->item('DX_ArDelivery_home_uri');	
		$this->ArDelivery_entry_uri	= $this->ci->config->item('DX_ArDelivery_entry_uri');	
		$this->ArDelivery_edit_uri	= $this->ci->config->item('DX_ArDelivery_edit_uri');	
		$this->ArDelivery_delete_uri= $this->ci->config->item('DX_ArDelivery_delete_uri');	
		$this->ArDelivery_show_uri	= $this->ci->config->item('DX_ArDelivery_show_uri');	

		// News-Event Views
		$this->ArDelivery_home_view = $this->ci->config->item('DX_ArDelivery_home_view');
		$this->ArDelivery_entry_view= $this->ci->config->item('DX_ArDelivery_entry_view');	
		$this->ArDelivery_edit_view	= $this->ci->config->item('DX_ArDelivery_edit_view');
		$this->ArDelivery_show_view	= $this->ci->config->item('DX_ArDelivery_show_view');	
	}
}
?>