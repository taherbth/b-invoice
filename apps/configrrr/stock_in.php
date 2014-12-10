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

$config['DX_AstockIn_home_uri']		    = 'admin/stock_in/home/';
$config['DX_AstockIn_entry_uri']		= 'admin/stock_in/add/';
$config['DX_AstockIn_edit_uri']		    = 'admin/stock_in/edit/';
$config['DX_AstockIn_delete_uri']	    = 'admin/stock_in/delete/';
$config['DX_AstockIn_show_uri']		    = 'admin/stock_in/show/';

// Table name
$config['DX_stockIn_table']  	        = 'stock_in';
$config['DX_stock_table']               = 'stock';

// Admin Model URI....
$config['DX_stockIn_model']  	     	= 'admin/stock_ins';
$config['DX_stock_model']           	= 'admin/stocks';

// Event Manager View
$config['DX_AstockIn_home_view']    	= 'pages/admin/stock_in/home';
$config['DX_AstockIn_entry_view']	    = 'pages/admin/stock_in/entry';
$config['DX_AstockIn_edit_view']		= 'pages/admin/stock_in/edit';
$config['DX_AstockIn_show_view']		= 'pages/admin/stock_in/show';
//-------------------------------
?>