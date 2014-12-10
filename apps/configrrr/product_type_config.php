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


$config['DX_AvProduct_type_entry_uri']		= 'admin/product_type/add/';
$config['DX_AvProduct_type_edit_uri']		= 'admin/product_type/edit/';
$config['DX_AvProduct_type_delete_uri']	    = 'admin/product_type/delete/';

// Table name
$config['DX_vProduct_type_table']  	        = 'product_type';
// Admin Model URI....
$config['DX_vProduct_type_model']  	     	= 'admin/product_type_info';

// Event Manager View

$config['DX_AvProduct_type_entry_view']	    = 'pages/admin/product_type/entry';
$config['DX_AvProduct_type_edit_view']		= 'pages/admin/product_type/edit';
//-------------------------------
?>