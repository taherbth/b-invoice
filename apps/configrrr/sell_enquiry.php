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

$config['DX_AsEnquiry_home_uri']		= 'admin/sell_enquiry/home/';
$config['DX_AsEnquiry_entry_uri']		= 'admin/sell_enquiry/add/';
$config['DX_AsEnquiry_edit_uri']		= 'admin/sell_enquiry/edit/';
$config['DX_AsEnquiry_delete_uri']	    = 'admin/sell_enquiry/delete/';
$config['DX_AsEnquiry_show_uri']		= 'admin/sell_enquiry/show/';

// Table name
$config['DX_sEnquiry_table']  	        = 'sell_enquiry';
$config['DX_sEnquiryProduct_table']     = 'sell_enquery_product';

// Admin Model URI....
$config['DX_sEnquiry_model']  	     	= 'admin/sell_enquiries';
$config['DX_sEnquiryProduct_model']   	= 'admin/sell_enquiry_products';

// Event Manager View
$config['DX_AsEnquiry_home_view']    	= 'pages/admin/sell_enquiry/home';
$config['DX_AsEnquiry_entry_view']	    = 'pages/admin/sell_enquiry/entry';
$config['DX_AsEnquiry_edit_view']		= 'pages/admin/sell_enquiry/edit';
$config['DX_AsEnquiry_show_view']		= 'pages/admin/sell_enquiry/show';
//-------------------------------
?>