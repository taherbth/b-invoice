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


$config['DX_AvRequisition_entry_uri']		= 'admin/requisition/add/';
$config['DX_AvRequisition_edit_uri']		= 'admin/requisition/edit/';
$config['DX_AvRequisition_delete_uri']	    = 'admin/requisition/delete/';
$config['DX_AvRequisition_show_uri']	    = 'admin/requisition/show/';

// Table name
$config['DX_vRequisition_table']  	        = 'requisition';
$config['DX_vRequisitionproduct_table']     = 'requisition_product';
// Admin Model URI....
$config['DX_vRequisition_model']  	     	= 'admin/requisitions';
$config['DX_vRequisitionproduct_model']   	= 'admin/requisition_products';
// Event Manager View

$config['DX_AvRequisitionentry_view']	    = 'pages/admin/requisition/entry';
$config['DX_AvRequisitionedit_view']		= 'pages/admin/requisition/edit';
$config['DX_AvRequisitionshow_view']		= 'pages/admin/requisition/show';
//-------------------------------
?>