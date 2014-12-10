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
 
class V_Project_Status
{	
	function V_Project_Status()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('project_status_config');	
		$this->v_project_status_init();
	}

	function v_project_status_init()
	{	
		$this->AvProject_submission_model_uri	= $this->ci->config->item('DX_vProject_submission_model');
	
		$this->AvProject_submission_entry_uri	= $this->ci->config->item('DX_AvProject_submission_entry_uri');	
		$this->AvProject_submission_edit_uri	= $this->ci->config->item('DX_AvProject_submission_edit_uri');	
		$this->AvProject_submission_delete_uri	= $this->ci->config->item('DX_AvProject_submission_delete_uri');	

		// News-Event Views
		$this->AvProject_submission_entry_view	= $this->ci->config->item('DX_AvProject_submission_entry_view');	
		$this->AvProject_submission_edit_view	= $this->ci->config->item('DX_AvProject_submission_edit_view');	
	}
}
?>