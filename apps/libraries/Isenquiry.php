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
 
class IsEnquiry
{	
	function IsEnquiry()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('issued_enquiry');	
		$this->isEnquiry_init();
	}

	function isEnquiry_init()
	{	
		$this->AisEnquiry_model_uri	= $this->ci->config->item('DX_isEnquiry_model');
		$this->AisEnquiryProduct_model_uri = $this->ci->config->item('DX_isEnquiryProduct_model');

		$this->AisEnquiry_home_uri	= $this->ci->config->item('DX_AisEnquiry_home_uri');	
		$this->AisEnquiry_entry_uri	= $this->ci->config->item('DX_AisEnquiry_entry_uri');	
		$this->AisEnquiry_edit_uri	= $this->ci->config->item('DX_AisEnquiry_edit_uri');	
		$this->AisEnquiry_delete_uri= $this->ci->config->item('DX_AisEnquiry_delete_uri');	
		$this->AisEnquiry_show_uri	= $this->ci->config->item('DX_AisEnquiry_show_uri');	

		// News-Event Views
		$this->AisEnquiry_home_view = $this->ci->config->item('DX_AisEnquiry_home_view');
		$this->AisEnquiry_entry_view= $this->ci->config->item('DX_AisEnquiry_entry_view');	
		$this->AisEnquiry_edit_view	= $this->ci->config->item('DX_AisEnquiry_edit_view');
		$this->AisEnquiry_show_view	= $this->ci->config->item('DX_AisEnquiry_show_view');	
	}
}
?>