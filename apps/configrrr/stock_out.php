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

$config['DX_AstockOut_home_uri']		= 'admin/stock_out/home/';
$config['DX_AstockOut_entry_uri']		= 'admin/stock_out/add/';
$config['DX_AstockOut_edit_uri']		= 'admin/stock_out/edit/';
$config['DX_AstockOut_delete_uri']	    = 'admin/stock_out/delete/';
$config['DX_AstockOut_show_uri']		= 'admin/stock_out/show/';

// Table name
$config['DX_stockOut_table']  	        = 'stock_out';
$config['DX_stock_table']               = 'stock';

// Admin Model URI....
$config['DX_stockOut_model']  	     	= 'admin/stock_outs';
$config['DX_stock_model']           	= 'admin/stocks';

// Event Manager View
$config['DX_AstockOut_home_view']    	= 'pages/admin/stock_out/home';
$config['DX_AstockOut_entry_view']	    = 'pages/admin/stock_out/entry';
$config['DX_AstockOut_edit_view']		= 'pages/admin/stock_out/edit';
$config['DX_AstockOut_show_view']		= 'pages/admin/stock_out/show';
//-------------------------------
?>