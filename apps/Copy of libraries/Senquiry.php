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
 
class Senquiry
{	
	function Senquiry()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('sell_enquiry');	
		$this->senquiry_init();
	}

	function senquiry_init()
	{	
		$this->AsEnquiry_model_uri	= $this->ci->config->item('DX_sEnquiry_model');
		$this->AsEnquiryProduct_model_uri = $this->ci->config->item('DX_sEnquiryProduct_model');

		$this->AsEnquiry_home_uri	= $this->ci->config->item('DX_AsEnquiry_home_uri');	
		$this->AsEnquiry_entry_uri	= $this->ci->config->item('DX_AsEnquiry_entry_uri');	
		$this->AsEnquiry_edit_uri	= $this->ci->config->item('DX_AsEnquiry_edit_uri');	
		$this->AsEnquiry_delete_uri	= $this->ci->config->item('DX_AsEnquiry_delete_uri');	
		$this->AsEnquiry_show_uri	= $this->ci->config->item('DX_AsEnquiry_show_uri');	

		// News-Event Views
		$this->AsEnquiry_home_view 	= $this->ci->config->item('DX_AsEnquiry_home_view');
		$this->AsEnquiry_entry_view	= $this->ci->config->item('DX_AsEnquiry_entry_view');	
		$this->AsEnquiry_edit_view	= $this->ci->config->item('DX_AsEnquiry_edit_view');
		$this->AsEnquiry_show_view	= $this->ci->config->item('DX_AsEnquiry_show_view');	
	}
}
?>