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

$config['DX_AiWorder_home_uri']		= 'admin/issue_work_order/home/';
$config['DX_AiWorder_entry_uri']	= 'admin/issue_work_order/add/';
$config['DX_AiWorder_edit_uri']		= 'admin/issue_work_order/edit/';
$config['DX_AiWorder_delete_uri']	= 'admin/issue_work_order/delete/';
$config['DX_AiWorder_show_uri']		= 'admin/issue_work_order/show/';

// Table name
$config['DX_iWorder_table']  	    = 'issued_work_order';
$config['DX_iWorderProduct_table']  = 'issued_work_order_product';

// Admin Model URI....
$config['DX_iWorder_model']  	    = 'admin/issue_work_orders';
$config['DX_iWorderProduct_model']  = 'admin/issue_work_order_products';

// Event Manager View
$config['DX_AiWorder_home_view']    = 'pages/admin/issue_work_order/home';
$config['DX_AiWorder_entry_view']	= 'pages/admin/issue_work_order/entry';
$config['DX_AiWorder_edit_view']	= 'pages/admin/issue_work_order/edit';
$config['DX_AiWorder_show_view']	= 'pages/admin/issue_work_order/show';
//-------------------------------
?>