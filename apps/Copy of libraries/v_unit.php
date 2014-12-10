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
 
class V_Unit
{	
	function V_Unit()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('unit_type');	
		$this->v_unit_init();
	}

	function v_unit_init()
	{	
		$this->AvUnit_model_uri	= $this->ci->config->item('DX_vUnit_model');
	
		$this->AvUnit_entry_uri	= $this->ci->config->item('DX_AvUnit_entry_uri');	
		$this->AvUnit_edit_uri	= $this->ci->config->item('DX_AvUnit_edit_uri');	
		$this->AvUnit_delete_uri	= $this->ci->config->item('DX_AvUnit_delete_uri');	

		// News-Event Views
		$this->AvUnitentry_view	= $this->ci->config->item('DX_AvUnitentry_view');	
		$this->AvUnitedit_view	= $this->ci->config->item('DX_AvUnitedit_view');	
	}
}
?>