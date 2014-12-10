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

$config['DX_AvCompany_home_uri']		= 'admin/company/home/';
$config['DX_AvCompany_entry_uri']		= 'admin/company/add/';
$config['DX_AvCompany_edit_uri']		= 'admin/company/edit/';
$config['DX_AvCompany_delete_uri']	    = 'admin/company/delete/';

// Table name
$config['DX_vCompany_table']  	        = 'company';
// Admin Model URI....
$config['DX_vCompany_model']  	     	= 'admin/Company_Info';

// Event Manager View
$config['DX_AvCompany_home_view']    	= 'pages/admin/company/home';
$config['DX_AvCompany_entry_view']	    = 'pages/admin/company/entry';
$config['DX_AvCompany_edit_view']		= 'pages/admin/company/edit';
//-------------------------------
?>