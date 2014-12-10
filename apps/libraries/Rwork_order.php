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
 
class Rwork_order
{	
	function Rwork_order()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('receive_work_order');	
		$this->rwork_order_init();
	}

	function rwork_order_init()
	{	
		$this->ArWorder_model_uri	     = $this->ci->config->item('DX_rWorder_model');
		$this->ArWorderProduct_model_uri = $this->ci->config->item('DX_rWorderProduct_model');
		$this->ArWorderDetail_model_uri  = $this->ci->config->item('DX_rWorderDetail_model');
		$this->AfWorder_model_uri        = $this->ci->config->item('DX_fWorder_model');
		$this->AiQuatationDetail_model_uri  = $this->ci->config->item('DX_iQuatationDetail_model');

		$this->ArWorder_home_uri	  = $this->ci->config->item('DX_ArWorder_home_uri');	
		$this->ArWorder_entry_uri     = $this->ci->config->item('DX_ArWorder_entry_uri');	
		$this->ArWorder_edit_uri	  = $this->ci->config->item('DX_ArWorder_edit_uri');	
		$this->ArWorder_delete_uri    = $this->ci->config->item('DX_ArWorder_delete_uri');	
		$this->ArWorder_show_uri	  = $this->ci->config->item('DX_ArWorder_show_uri');	

		// News-Event Views
		$this->ArWorder_home_view 	= $this->ci->config->item('DX_ArWorder_home_view');
		$this->ArWorder_entry_view	= $this->ci->config->item('DX_ArWorder_entry_view');	
		$this->ArWorder_edit_view	= $this->ci->config->item('DX_ArWorder_edit_view');
		$this->ArWorder_show_view	= $this->ci->config->item('DX_ArWorder_show_view');	
	}
}
?>