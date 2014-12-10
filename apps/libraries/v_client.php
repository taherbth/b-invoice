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
 
class V_Client
{	
	function V_Client()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('client_config');	
		$this->v_client_init();
	}

	function v_client_init()
	{	
		$this->AvClient_model_uri	= $this->ci->config->item('DX_vClient_model');
	
		$this->AvClient_entry_uri	= $this->ci->config->item('DX_AvClient_entry_uri');	
		$this->AvClient_edit_uri	= $this->ci->config->item('DX_AvClient_edit_uri');	
		$this->AvClient_delete_uri	= $this->ci->config->item('DX_AvClient_delete_uri');	

		// News-Event Views
		$this->AvCliententry_view	= $this->ci->config->item('DX_AvCliententry_view');	
		$this->AvClientedit_view	= $this->ci->config->item('DX_AvClientedit_view');	
	}
}
?>