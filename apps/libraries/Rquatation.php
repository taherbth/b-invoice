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
 
class Rquatation
{	
	function Rquatation()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('received_quatation');	
		$this->rquatation_init();
	}

	function rquatation_init()
	{	
		$this->ArQuatation_model_uri	    = $this->ci->config->item('DX_rQuatation_model');
		$this->ArQuatationProduct_model_uri = $this->ci->config->item('DX_rQuatationProduct_model');
		$this->ArQuatationDetail_model_uri  = $this->ci->config->item('DX_rQuatationDetail_model');

		$this->ArQuatation_home_uri	  = $this->ci->config->item('DX_ArQuatation_home_uri');	
		$this->ArQuatation_entry_uri  = $this->ci->config->item('DX_ArQuatation_entry_uri');	
		$this->ArQuatation_edit_uri	  = $this->ci->config->item('DX_ArQuatation_edit_uri');	
		$this->ArQuatation_delete_uri = $this->ci->config->item('DX_ArQuatation_delete_uri');	
		$this->ArQuatation_show_uri	  = $this->ci->config->item('DX_ArQuatation_show_uri');	

		// News-Event Views
		$this->ArQuatation_home_view 	= $this->ci->config->item('DX_ArQuatation_home_view');
		$this->ArQuatation_entry_view	= $this->ci->config->item('DX_ArQuatation_entry_view');	
		$this->ArQuatation_edit_view	= $this->ci->config->item('DX_ArQuatation_edit_view');
		$this->ArQuatation_show_view	= $this->ci->config->item('DX_ArQuatation_show_view');	
	}
}
?>