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
 
class Iwork_order
{	
	function Iwork_order()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('issued_work_order');	
		$this->iwork_order_init();
	}

	function iwork_order_init()
	{	
		$this->AiWorder_model_uri	     = $this->ci->config->item('DX_iWorder_model');
		$this->AiWorderProduct_model_uri = $this->ci->config->item('DX_iWorderProduct_model');

		$this->AiWorder_home_uri	  = $this->ci->config->item('DX_AiWorder_home_uri');	
		$this->AiWorder_entry_uri     = $this->ci->config->item('DX_AiWorder_entry_uri');	
		$this->AiWorder_edit_uri	  = $this->ci->config->item('DX_AiWorder_edit_uri');	
		$this->AiWorder_delete_uri    = $this->ci->config->item('DX_AiWorder_delete_uri');	
		$this->AiWorder_show_uri	  = $this->ci->config->item('DX_AiWorder_show_uri');	

		// News-Event Views
		$this->AiWorder_home_view 	= $this->ci->config->item('DX_AiWorder_home_view');
		$this->AiWorder_entry_view	= $this->ci->config->item('DX_AiWorder_entry_view');	
		$this->AiWorder_edit_view	= $this->ci->config->item('DX_AiWorder_edit_view');
		$this->AiWorder_show_view	= $this->ci->config->item('DX_AiWorder_show_view');	
	}
}
?>