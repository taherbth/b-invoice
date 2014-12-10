<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		DX Auth Config																		*
 * 		@Author			Kazi Sanchoy Ahmed (B.Sc in CSE)                                					*
 * 		@Email			sanchoy7@gmail.com		                                                         	*
 *		@Profession		Web Application Developer & Programmer												*
 *																											*
 ************************************************************************************************************
*/


$config['DX_AvProject_submission_entry_uri']		= 'admin/project_submission/add/';
$config['DX_AvProject_submission_edit_uri']			= 'admin/project_submission/edit/';
$config['DX_AvProject_submission_delete_uri']	    = 'admin/project_submission/delete/';

// Table name
$config['DX_vProject_submission_table']  	        = 'project';
// Admin Model URI....
$config['DX_vProject_submission_model']  	     	= 'admin/project_info';

// Event Manager View

$config['DX_AvProject_submission_entry_view']	    = 'pages/admin/project_submission/entry';
$config['DX_AvProject_submission_edit_view']		= 'pages/admin/project_submission/edit';
//-------------------------------
?>