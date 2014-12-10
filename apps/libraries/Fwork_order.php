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
 
class Fwork_order
{	
	function Fwork_order()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('forward_work_order');	
		$this->fwork_order_init();
	}

	function fwork_order_init()
	{	
		$this->AfWorder_model_uri	     = $this->ci->config->item('DX_fWorder_model');
		$this->ArWorderProduct_model_uri = $this->ci->config->item('DX_rWorderProduct_model');
		$this->ArWorderDetail_model_uri  = $this->ci->config->item('DX_rWorderDetail_model');

		$this->AfWorder_home_uri	  = $this->ci->config->item('DX_AfWorder_home_uri');	
		$this->AfWorder_entry_uri     = $this->ci->config->item('DX_AfWorder_entry_uri');
		$this->AfWorder_entry2_uri    = $this->ci->config->item('DX_AfWorder_entry2_uri');	
		$this->AfWorder_edit_uri	  = $this->ci->config->item('DX_AfWorder_edit_uri');	
		$this->AfWorder_delete_uri    = $this->ci->config->item('DX_AfWorder_delete_uri');	
		$this->AfWorder_show_uri	  = $this->ci->config->item('DX_AfWorder_show_uri');	

		// News-Event Views
		$this->AfWorder_home_view 	  = $this->ci->config->item('DX_AfWorder_home_view');
		$this->AfWorder_entry_view	  = $this->ci->config->item('DX_AfWorder_entry_view');	
		$this->AfWorder_entry2_view	  = $this->ci->config->item('DX_AfWorder_entry2_view');	
		$this->AfWorder_edit_view	  = $this->ci->config->item('DX_AfWorder_edit_view');
		$this->AfWorder_show_view	  = $this->ci->config->item('DX_AfWorder_show_view');	
	}
}
?>