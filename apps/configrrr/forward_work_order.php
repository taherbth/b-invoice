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

$config['DX_AfWorder_home_uri']		= 'admin/forward_work_order/home/';
$config['DX_AfWorder_entry_uri']	= 'admin/forward_work_order/add/';
$config['DX_AfWorder_entry2_uri']	= 'admin/forward_work_order/entry/';
$config['DX_AfWorder_edit_uri']		= 'admin/forward_work_order/edit/';
$config['DX_AfWorder_delete_uri']	= 'admin/forward_work_order/delete/';
$config['DX_AfWorder_show_uri']		= 'admin/forward_work_order/show/';

// Table name
$config['DX_fWorder_table']  	    = 'forward_work_order';
$config['DX_rWorderProduct_table']  = 'received_work_order_product';
$config['DX_rWorderDetail_table']   = 'received_work_order_detail';

// Admin Model URI....
$config['DX_fWorder_model']  	    = 'admin/forward_work_orders';
$config['DX_rWorderProduct_model']  = 'admin/receive_work_order_products';
$config['DX_rWorderDetail_model']   = 'admin/receive_work_order_details';

// Event Manager View
$config['DX_AfWorder_home_view']    = 'pages/admin/forward_work_order/home';
$config['DX_AfWorder_entry_view']	= 'pages/admin/forward_work_order/entry';
$config['DX_AfWorder_entry2_view']	= 'pages/admin/forward_work_order/entry2';
$config['DX_AfWorder_edit_view']	= 'pages/admin/forward_work_order/edit';
$config['DX_AfWorder_show_view']	= 'pages/admin/forward_work_order/show';
//-------------------------------
?>