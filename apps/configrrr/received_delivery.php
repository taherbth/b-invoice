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

$config['DX_ArDelivery_home_uri']		= 'admin/receive_delivery/home/';
$config['DX_ArDelivery_entry_uri']		= 'admin/receive_delivery/add/';
$config['DX_ArDelivery_edit_uri']		= 'admin/receive_delivery/edit/';
$config['DX_ArDelivery_delete_uri']	    = 'admin/receive_delivery/delete/';
$config['DX_ArDelivery_show_uri']		= 'admin/receive_delivery/show/';

// Table name
$config['DX_rDelivery_table']  	        = 'received_delivery';
$config['DX_rDeliveryProduct_table']  	= 'received_delivery_product';
$config['DX_stockIn_table']  	        = 'stock_in';
$config['DX_stock_table']               = 'stock';

// Admin Model URI....
$config['DX_rDelivery_model']  	     	= 'admin/receive_deliverys';
$config['DX_rDeliveryProduct_model']  	= 'admin/receive_delivery_products';
$config['DX_stock_model']           	= 'admin/stocks';
$config['DX_stockIn_model']           	= 'admin/stock_ins';

// Event Manager View
$config['DX_ArDelivery_home_view']    	= 'pages/admin/receive_delivery/home';
$config['DX_ArDelivery_entry_view']	    = 'pages/admin/receive_delivery/entry';
$config['DX_ArDelivery_edit_view']		= 'pages/admin/receive_delivery/edit';
$config['DX_ArDelivery_show_view']		= 'pages/admin/receive_delivery/show';
//-------------------------------
?>