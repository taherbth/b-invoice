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
 
class Iquatation
{	
	function Iquatation()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('issue_quatation');	
		$this->iquatation_init();
	}

	function iquatation_init()
	{	
		$this->AiQuatation_model_uri	    = $this->ci->config->item('DX_iQuatation_model');
		$this->AiQuatationProduct_model_uri = $this->ci->config->item('DX_iQuatationProduct_model');
		$this->AiQuatationDetail_model_uri  = $this->ci->config->item('DX_iQuatationDetail_model');

		$this->AiQuatation_home_uri	  = $this->ci->config->item('DX_AiQuatation_home_uri');	
		$this->AiQuatation_entry_uri  = $this->ci->config->item('DX_AiQuatation_entry_uri');	
		$this->AiQuatation_edit_uri	  = $this->ci->config->item('DX_AiQuatation_edit_uri');	
		$this->AiQuatation_delete_uri = $this->ci->config->item('DX_AiQuatation_delete_uri');	
		$this->AiQuatation_show_uri	  = $this->ci->config->item('DX_AiQuatation_show_uri');	

		// News-Event Views
		$this->AiQuatation_home_view 	= $this->ci->config->item('DX_AiQuatation_home_view');
		$this->AiQuatation_entry_view	= $this->ci->config->item('DX_AiQuatation_entry_view');	
		$this->AiQuatation_edit_view	= $this->ci->config->item('DX_AiQuatation_edit_view');
		$this->AiQuatation_show_view	= $this->ci->config->item('DX_AiQuatation_show_view');	
	}
}
?>