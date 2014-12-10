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
 
class Idelivery
{	
	function Idelivery()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('issue_delivery_note');	
		$this->idelivery_init();
	}

	function idelivery_init()
	{	
		$this->AiDelivery_model_uri	= $this->ci->config->item('DX_iDelivery_model');
		$this->AiDeliveryProduct_model_uri = $this->ci->config->item('DX_iDeliveryProduct_model');
		$this->Astock_model_uri     = $this->ci->config->item('DX_stock_model');
		$this->AstockOut_model_uri  = $this->ci->config->item('DX_stockOut_model');

		$this->AiDelivery_home_uri	= $this->ci->config->item('DX_AiDelivery_home_uri');	
		$this->AiDelivery_entry_uri	= $this->ci->config->item('DX_AiDelivery_entry_uri');	
		$this->AiDelivery_edit_uri	= $this->ci->config->item('DX_AiDelivery_edit_uri');	
		$this->AiDelivery_delete_uri= $this->ci->config->item('DX_AiDelivery_delete_uri');	
		$this->AiDelivery_show_uri	= $this->ci->config->item('DX_AiDelivery_show_uri');	

		// News-Event Views
		$this->AiDelivery_home_view = $this->ci->config->item('DX_AiDelivery_home_view');
		$this->AiDelivery_entry_view= $this->ci->config->item('DX_AiDelivery_entry_view');	
		$this->AiDelivery_edit_view	= $this->ci->config->item('DX_AiDelivery_edit_view');
		$this->AiDelivery_show_view	= $this->ci->config->item('DX_AiDelivery_show_view');	
	}
}
?>