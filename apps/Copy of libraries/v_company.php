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
 
class V_Company
{	
	function V_Company()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('honey_config');	
		$this->v_company_init();
	}

	function v_company_init()
	{	
		$this->AvCompany_model_uri	= $this->ci->config->item('DX_vCompany_model');
		
		$this->AvCompany_home_uri	= $this->ci->config->item('DX_AvCompany_home_uri');	
		$this->AvCompany_entry_uri	= $this->ci->config->item('DX_AvCompany_entry_uri');	
		$this->AvCompany_edit_uri	= $this->ci->config->item('DX_AvCompany_edit_uri');	
		$this->AvCompany_delete_uri	= $this->ci->config->item('DX_AvCompany_delete_uri');	

		// News-Event Views
		$this->AvCompany_home_view 	= $this->ci->config->item('DX_AvCompany_home_view');
		$this->AvCompany_entry_view	= $this->ci->config->item('DX_AvCompany_entry_view');	
		$this->AvCompany_edit_view	= $this->ci->config->item('DX_AvCompany_edit_view');	
	}
}
?>