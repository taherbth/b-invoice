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


$config['DX_AvUnit_entry_uri']		= 'admin/unit/add/';
$config['DX_AvUnit_edit_uri']		= 'admin/unit/edit/';
$config['DX_AvUnit_delete_uri']	    = 'admin/unit/delete/';

// Table name
$config['DX_vUnit_table']  	        = 'unit_type';
// Admin Model URI....
$config['DX_vUnit_model']  	     	= 'admin/unit_info';

// Event Manager View

$config['DX_AvUnitentry_view']	    = 'pages/admin/unit/entry';
$config['DX_AvUnitedit_view']		= 'pages/admin/unit/edit';
//-------------------------------
?>