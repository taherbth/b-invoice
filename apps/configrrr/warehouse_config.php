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


$config['DX_AvWarehouse_entry_uri']		= 'admin/warehouse/add/';
$config['DX_AvWarehouse_edit_uri']			= 'admin/warehouse/edit/';
$config['DX_AvWarehouse_delete_uri']	    = 'admin/warehouse/delete/';

// Table name
$config['DX_vWarehouse_table']  	        = 'warehouse';
// Admin Model URI....
$config['DX_vWarehouse_model']  	     	= 'admin/warehouse_info';

// Event Manager View

$config['DX_AvWarehouse_entry_view']	    = 'pages/admin/warehouse/entry';
$config['DX_AvWarehouse_edit_view']		= 'pages/admin/warehouse/edit';
//-------------------------------
?>