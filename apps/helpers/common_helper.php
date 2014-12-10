<?php
/*
	+-------------------------------------------------------------------------------------------------------+
	|																			  	  						|
    * 		@Author			Kazi Sanchoy Ahmed	(B.Sc in CSE)				                               		*
    * 		@Email			sanchoy7@gmail.com		                                                         	*
	|																			      						|
	+-------------------------------------------------------------------------------------------------------+
*/


function get_org_member_type() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listOrgMemberType();
}

function getOptionsClient() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listClient();
}

function getOptionGroup() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listGroup();
}

function getOptionEmployeeName() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listEmployeeName();
}
function getWorkorderNo() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->workordernos();
}

function getProducttypeInfo() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->product_type_info();
}

function getProductName() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->product_name_info();
}

function getProductCode() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->product_code_info();
}

function getRequisitionSubmit() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->RequisitionSubmit_info();
}

function getOptionProductName() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listProductName();
}

function getOptionProductType() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listProductType();
}

function getOptionEmployee() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listEmployee();
}

function getOptionEnquiry() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listEnquiry();
}

function getOptionQuotation() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listQuotation();
}

function getOptionSupplier() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listSupplier();
}

function getOptionWarehouse() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->listWarehouse();
}

function getOptionInventoryType()
{	
	$ci = &get_instance();
	$array = array (
		''             =>   'Select Inventory Type',
		'inventory'    =>   'Inventory Product',
		'noninventory' =>   'Noninventory Product'
	);
	return $array;
}

function getOptionsStatus()
{	
	$ci = &get_instance();
	$array = array (
		''            =>   '----- Select Status -----',
		'pending'     =>   'Pending',
		'forwarding'  =>   'Forwarding',
		'successfull' =>   'Successfull',
		'suspended'   =>   'Suspended'
	);
	return $array;
}

function getOptionItemStatus()
{	
	$ci = &get_instance();
	$array = array (
		''     		=>   '----- Select Item Status -----',
		'active'    =>   'Active',
		'inactive' 	=>   'Inactive'		
	);
	return $array;
}

function getOptionUnitType() {
	$ci = &get_instance();
	$ci->load->model('Common_Tasks');
	return $ci->Common_Tasks->UnitType_info();
}
