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

$config['DX_AiQuatation_home_uri']		= 'admin/issue_quotation/home/';
$config['DX_AiQuatation_entry_uri']		= 'admin/issue_quotation/add/';
$config['DX_AiQuatation_edit_uri']		= 'admin/issue_quotation/edit/';
$config['DX_AiQuatation_delete_uri']	= 'admin/issue_quotation/delete/';
$config['DX_AiQuatation_show_uri']		= 'admin/issue_quotation/show/';

// Table name
$config['DX_iQuatation_table']  	    = 'issued_quotation';
$config['DX_iQuatationProduct_table']   = 'issued_quotation_product';
$config['DX_iQuatationDetail_table']    = 'issued_quotation_detail';

// Admin Model URI....
$config['DX_iQuatation_model']  	    = 'admin/issue_quatations';
$config['DX_iQuatationProduct_model']   = 'admin/issue_quatation_products';
$config['DX_iQuatationDetail_model']    = 'admin/issue_quatation_details';

// Event Manager View
$config['DX_AiQuatation_home_view']    	= 'pages/admin/issue_quotation/home';
$config['DX_AiQuatation_entry_view']	= 'pages/admin/issue_quotation/entry';
$config['DX_AiQuatation_edit_view']		= 'pages/admin/issue_quotation/edit';
$config['DX_AiQuatation_show_view']		= 'pages/admin/issue_quotation/show';
//-------------------------------
?>