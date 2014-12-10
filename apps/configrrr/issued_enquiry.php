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

$config['DX_AisEnquiry_home_uri']		= 'admin/issue_enquiry/home/';
$config['DX_AisEnquiry_entry_uri']		= 'admin/issue_enquiry/add/';
$config['DX_AisEnquiry_edit_uri']		= 'admin/issue_enquiry/edit/';
$config['DX_AisEnquiry_delete_uri']	    = 'admin/issue_enquiry/delete/';
$config['DX_AisEnquiry_show_uri']		= 'admin/issue_enquiry/show/';

// Table name
$config['DX_isEnquiry_table']  	        = 'request_for_requisition';
$config['DX_isEnquiryProduct_table']    = 'request_for_requisition_product';

// Admin Model URI....
$config['DX_isEnquiry_model']  	     	= 'admin/issue_enquiries';
$config['DX_isEnquiryProduct_model']   	= 'admin/issue_enquiry_products';

// Event Manager View
$config['DX_AisEnquiry_home_view']    	= 'pages/admin/issue_enquiry/home';
$config['DX_AisEnquiry_entry_view']	    = 'pages/admin/issue_enquiry/entry';
$config['DX_AisEnquiry_edit_view']		= 'pages/admin/issue_enquiry/edit';
$config['DX_AisEnquiry_show_view']		= 'pages/admin/issue_enquiry/show';
//-------------------------------
?>