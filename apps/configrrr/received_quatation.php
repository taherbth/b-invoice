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

$config['DX_ArQuatation_home_uri']		= 'admin/receive_quotation/home/';
$config['DX_ArQuatation_entry_uri']		= 'admin/receive_quotation/add/';
$config['DX_ArQuatation_edit_uri']		= 'admin/receive_quotation/edit/';
$config['DX_ArQuatation_delete_uri']	= 'admin/receive_quotation/delete/';
$config['DX_ArQuatation_show_uri']		= 'admin/receive_quotation/show/';

// Table name
$config['DX_rQuatation_table']  	    = 'received_quotation';
$config['DX_rQuatationProduct_table']   = 'received_quotation_product';
$config['DX_rQuatationDetail_table']    = 'received_quotation_detail';

// Admin Model URI....
$config['DX_rQuatation_model']  	    = 'admin/receive_quatations';
$config['DX_rQuatationProduct_model']   = 'admin/receive_quatation_products';
$config['DX_rQuatationDetail_model']    = 'admin/receive_quatation_details';

// Event Manager View
$config['DX_ArQuatation_home_view']    	= 'pages/admin/receive_quotation/home';
$config['DX_ArQuatation_entry_view']	= 'pages/admin/receive_quotation/entry';
$config['DX_ArQuatation_edit_view']		= 'pages/admin/receive_quotation/edit';
$config['DX_ArQuatation_show_view']		= 'pages/admin/receive_quotation/show';
//-------------------------------
?>