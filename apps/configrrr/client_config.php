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


$config['DX_AvClient_entry_uri']		= 'admin/client/add/';
$config['DX_AvClient_edit_uri']		= 'admin/client/edit/';
$config['DX_AvClient_delete_uri']	    = 'admin/client/delete/';

// Table name
$config['DX_vClient_table']  	        = 'client';
// Admin Model URI....
$config['DX_vClient_model']  	     	= 'admin/client_info';

// Event Manager View

$config['DX_AvCliententry_view']	    = 'pages/admin/client/entry';
$config['DX_AvClientedit_view']		= 'pages/admin/client/edit';
//-------------------------------
?>