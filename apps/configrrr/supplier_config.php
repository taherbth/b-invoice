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


$config['DX_AvSupplier_entry_uri']		= 'admin/supplier/add/';
$config['DX_AvSupplier_edit_uri']		= 'admin/supplier/edit/';
$config['DX_AvSupplier_delete_uri']	    = 'admin/supplier/delete/';

// Table name
$config['DX_vSupplier_table']  	        = 'supplier_info';
// Admin Model URI....
$config['DX_vSupplier_model']  	     	= 'admin/supplier_info';

// Event Manager View

$config['DX_AvSupplierentry_view']	    = 'pages/admin/supplier/entry';
$config['DX_AvSupplieredit_view']		= 'pages/admin/supplier/edit';
//-------------------------------
?>