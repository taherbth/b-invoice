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


$config['DX_AvReceivework_order_entry_uri']		= 'admin/receivework_order/add/';
$config['DX_AvReceivework_order_edit_uri']			= 'admin/receivework_order/edit/';
$config['DX_AvReceivework_order_delete_uri']	    = 'admin/receivework_order/delete/';

// Table name
$config['DX_vReceivework_order_table']  	        = 'received_work_order';
// Admin Model URI....
$config['DX_vReceivework_order_model']  	     	= 'admin/work_order';

// Event Manager View

$config['DX_AvReceivework_orderentry_view']	    = 'pages/admin/receivework_order/entry';
$config['DX_AvReceivework_orderedit_view']		= 'pages/admin/receivework_order/edit';
//-------------------------------
?>