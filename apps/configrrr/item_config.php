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

$config['DX_AvItem_show_uri']		= 'admin/item/show/';
$config['DX_AvItem_entry_uri']		= 'admin/item/add/';
$config['DX_AvItem_edit_uri']		= 'admin/item/edit/';
$config['DX_AvItem_delete_uri']	    = 'admin/item/delete/';

// Table name
$config['DX_vItem_table']  	        = 'product';
$config['DX_vCustom_duty_table']    = 'custom_duty';
// Admin Model URI....
$config['DX_vItem_model']  	     	= 'admin/item_info';
$config['DX_vCustom_duty_model']  	= 'admin/custom_duty_info';

// Event Manager View

$config['DX_AvItementry_view']	    = 'pages/admin/item/entry';
$config['DX_AvItemedit_view']		= 'pages/admin/item/edit';
$config['DX_AvItemshow_view']		= 'pages/admin/item/show';
//-------------------------------
?>