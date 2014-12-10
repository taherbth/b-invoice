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

$config['DX_AiDelivery_home_uri']		= 'admin/issue_delivery_note/home/';
$config['DX_AiDelivery_entry_uri']		= 'admin/issue_delivery_note/add/';
$config['DX_AiDelivery_edit_uri']		= 'admin/issue_delivery_note/edit/';
$config['DX_AiDelivery_delete_uri']	    = 'admin/issue_delivery_note/delete/';
$config['DX_AiDelivery_show_uri']		= 'admin/issue_delivery_note/show/';

// Table name
$config['DX_iDelivery_table']  	        = 'issed_delivery_order';
$config['DX_iDeliveryProduct_table']  	= 'issued_delivery_order_product';
$config['DX_stockOut_table']  	        = 'stock_out';
$config['DX_stock_table']               = 'stock';

// Admin Model URI....
$config['DX_iDelivery_model']  	     	= 'admin/issue_delivery_notes';
$config['DX_iDeliveryProduct_model']  	= 'admin/issue_delivery_note_products';
$config['DX_stock_model']           	= 'admin/stocks';
$config['DX_stockOut_model']           	= 'admin/stock_outs';

// Event Manager View
$config['DX_AiDelivery_home_view']    	= 'pages/admin/issue_delivery_note/home';
$config['DX_AiDelivery_entry_view']	    = 'pages/admin/issue_delivery_note/entry';
$config['DX_AiDelivery_edit_view']		= 'pages/admin/issue_delivery_note/edit';
$config['DX_AiDelivery_show_view']		= 'pages/admin/issue_delivery_note/show';
//-------------------------------
?>