<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'BaseController.php';
include_once 'sms.php';
include_once 'payment_method/CreateRecurringPaymentsProfile.php';
include_once 'payment_method/GetRecurringPaymentsProfileDetails.php';

class info extends BaseController {
    function info() {
        parent::__construct();
        //if ($this->session->userdata('logged_in') != TRUE) {
        $this->load->helper('creditcard');
        $this->load->model('organization/info_model');        
        $this->lang->load('common', $this->session->userdata('lang_file'));        
        //$mem_type = $this->session->userdata('mem_type');
        //$member_org = $this->session->userdata('member_org');
        $data_previlize = array();
        $data_previlize['mem_type'] ="";
        if($this->session->userdata('mem_id') == "") {
            redirect('home/index');
        }           
        else{
                 $data_previlize = $this->check_member_type_previlize();
                 $check_pacakge_access =  $this->check_pacakge_access($this->session->userdata('mem_id'), "active", $data_previlize['mem_type']);
        }
    
        //$data_mem_type['mem_type'] = $data_previlize['mem_type'];
        $this->load->vars($data_previlize);	   
        $this->load->vars($check_pacakge_access);	   
        //$this->load->vars($data_mem_type);	   
    
        //$this->data['dynamicView'] = 'pages/organization/edit_org';
        //$this->_commonPageLayout('frontend_viewer');        
        //$this->load->model('organization/info_model');
        //$this->load->helper('common_helper');
}
/**
 * Check logged user's Package Access
 * 
 *@Param $mem_id which contains member_id, $flag contains different flag, $mem_type_id contains member_type
 *@access private
 *@return logged user's Package Access
 */ 
function check_pacakge_access($mem_id, $flag, $mem_type){
    $check_pacakge_access = array();
    $check_pacakge_access['package_assigned_id'] = "";
    $check_pacakge_access['org_id'] = "";
    $check_pacakge_access['mem_id'] = "";
    $check_pacakge_access['package_id'] = "";
    $check_pacakge_access['used_module'] = "";
    $check_pacakge_access['no_of_member'] = "";
    $check_pacakge_access['duration'] = "";
    $check_pacakge_access['billing_module_cost'] = "";
    $check_pacakge_access['letter_module_cost'] = "";
    $check_pacakge_access['sms_module_cost'] = "";
    $check_pacakge_access['member_fee_module_cost'] = "";
    $check_pacakge_access['full_package_cost'] = "";
    $check_pacakge_access['per_sms_cost'] = "";
    $check_pacakge_access['per_letter_cost'] = "";
    $check_pacakge_access['allowed_sms_per_month'] = "";
    $check_pacakge_access['allowed_letter_per_month'] = "";
    $check_pacakge_access['per_invoice_cost'] = "";
    $check_pacakge_access['admin_cost'] = "";
    $check_pacakge_access['currency_name'] = "";
    $check_pacakge_access['active'] = "";
    $check_pacakge_access['billing_module_access'] = 0;
    $check_pacakge_access['letter_module_access'] = 0;
    $check_pacakge_access['sms_module_access'] = 0;
    $check_pacakge_access['member_fee_module_access'] = 0;
        
    $member_package = $this->info_model->get_package_assigned_to_org_member_info($mem_id, $flag, $mem_type);  
    if($member_package){
        $check_pacakge_access['package_assigned_id'] = $member_package[0]->package_assigned_id;
        $check_pacakge_access['org_id'] = $member_package[0]->org_id;
        $check_pacakge_access['mem_id'] = $member_package[0]->mem_id;
        $check_pacakge_access['package_id'] = $member_package[0]->package_id;
        $check_pacakge_access['used_module'] = $member_package[0]->used_module;
        $check_pacakge_access['no_of_member'] = $member_package[0]->no_of_member;
        $check_pacakge_access['duration'] = $member_package[0]->duration;
        $check_pacakge_access['billing_module_cost'] = $member_package[0]->billing_module_cost;
        $check_pacakge_access['letter_module_cost'] = $member_package[0]->letter_module_cost;
        $check_pacakge_access['sms_module_cost'] = $member_package[0]->sms_module_cost;
        $check_pacakge_access['member_fee_module_cost'] = $member_package[0]->member_fee_module_cost;
        $check_pacakge_access['full_package_cost'] = $member_package[0]->full_package_cost;
        $check_pacakge_access['per_sms_cost'] = $member_package[0]->per_sms_cost;
        $check_pacakge_access['per_letter_cost'] = $member_package[0]->per_letter_cost;
        $check_pacakge_access['allowed_sms_per_month'] = $member_package[0]->allowed_sms_per_month;
        $check_pacakge_access['allowed_letter_per_month'] = $member_package[0]->allowed_letter_per_month;
        $check_pacakge_access['per_invoice_cost'] = $member_package[0]->per_invoice_cost;
        $check_pacakge_access['admin_cost'] = $member_package[0]->admin_cost;
        $check_pacakge_access['currency_name'] = $member_package[0]->currency_name;
        $check_pacakge_access['active'] = $member_package[0]->active;
        if($check_pacakge_access['used_module']=="Premium"){
            $check_pacakge_access['billing_module_access'] = 1; 
            $check_pacakge_access['letter_module_access'] = 1;
            $check_pacakge_access['sms_module_access'] = 1;
            $check_pacakge_access['member_fee_module_access'] = 1;
        }
        elseif($check_pacakge_access['used_module']=="Free Tier"){
            $check_pacakge_access['billing_module_access'] = 0;
            $check_pacakge_access['letter_module_access'] = 1;
            $check_pacakge_access['sms_module_access'] = 1;
            $check_pacakge_access['member_fee_module_access'] = 1;
        }else{
                    $module_used = explode("|", $check_pacakge_access['used_module']);
                    foreach($module_used as $key => $value ){
                        if($value=="billing_module_cost"){
                            $check_pacakge_access['billing_module_access'] = 1;
                        }
                        if($value=="letter_module_cost"){
                            $check_pacakge_access['letter_module_access'] = 1;
                        }
                        if($value=="sms_module_cost"){
                            $check_pacakge_access['sms_module_access'] = 1;
                        }
                        if($value=="member_fee_module_cost"){
                            $check_pacakge_access['member_fee_module_access'] = 1;
                        }
                    }
            }
    }
    return $check_pacakge_access;    
}

/**
 * Check logged user's type previlige where he/she can access which features
 *
 *@access private
 *@return previlige List
 */ 
function check_member_type_previlize(){
        $mem_id = $this->session->userdata('mem_id');
        $data_previlize = array();
        $data_previlize['mem_type'] = "";
        if($this->session->userdata('mem_id') == "") {
            redirect('home/index');
        }else{ 
            $member_info = $this->info_model->get_member_and_org_info_by_mem_id($mem_id);           
            if($member_info){
                $mem_type =  $member_info[0]->mem_type_id; 
                $member_org =  $member_info[0]->org_id;
            }
        }
        
           if($mem_type!="Admin" && $mem_type!="Superadmin"){
               $org_member_previlize_data = $this->info_model->check_org_member_previlize($mem_type, $member_org);      
               //print_r($org_member_previlize_data); exit;
               if(count($org_member_previlize_data)){
                   foreach($org_member_previlize_data as $rows){
                                $data_previlize = array(
                                    'mem_type' => $mem_type,
                                    'member_org' => $member_org,
                                    'mainboard_access_main' => $rows->mainboard_access_main,
                                    'mainboard_send_proposal' => $rows->mainboard_send_proposal,
                                    'mainboard_change_article' => $rows->mainboard_change_article,
                                    'mainboard_send_notification' => $rows->mainboard_send_notification,                                
                                    'mainboard_sending_out' => $rows->mainboard_sending_out,
                                    'mainboard_manually_archive' => $rows->mainboard_manually_archive,
                                    'forum_access' => $rows->forum_access,
                                    'forum_comments' => $rows->forum_comments,
                                    'forum_delete_won_comments' => $rows->forum_delete_won_comments,
                                    'forum_delete_any_coments' => $rows->forum_delete_any_coments,
                                    'forum_manually_archive_comments' => $rows->forum_manually_archive_comments,
                                    'customer_view_bank_details' => $rows->member_login_logout,
                                    'member_change_profile' => $rows->member_change_profile,
                                    'member_change_password' => $rows->member_change_password,
                                    'configuration_view_org' => $rows->configuration_view_org,
                                    'configuration_change_org' => $rows->configuration_change_org,
                                    'configuration_create_address' => $rows->configuration_create_address,
                                    'communication_send_email' => $rows->communication_send_email,
                                    'communication_send_sms' => $rows->communication_send_sms,
                                    'communication_send_letters' => $rows->communication_send_letters,
                                    'economics_register' => $rows->economics_register,
                                    'economics_send_payment' => $rows->economics_send_payment,
                                    'economics_check_complete' => $rows->economics_check_complete,
                                    'economics_watch_total_income' => $rows->economics_watch_total_income,
                                    'economics_watch_total_cost' => $rows->economics_watch_total_cost,
                                    'economics_watch_statistics' => $rows->economics_watch_statistics,
                                    'history_access_articles' => $rows->history_access_articles,
                                    'history_access_comments' => $rows->history_access_comments,
                                    'history_user_actions' => $rows->history_user_actions,
                                    'history_old_letters' => $rows->history_old_letters,
                                    'history_old_sms' => $rows->history_old_sms,
                                    'history_old_emails' => $rows->history_old_emails,                                
                                    'members_add_change' => $rows->members_add_change,
                                    'members_c_group' => $rows->members_c_group,
                                    'members_add_group' => $rows->members_add_group,
                                    'members_user_types' => $rows->members_user_types,
                                    'members_add_usertype' => $rows->members_add_usertype,
                                    'external_mainboard' => $rows->external_mainboard,
                                    'external_presentation' => $rows->external_presentation,
                                    'access_faktura' => $rows->access_faktura,
                                    'access_dashboard' => 0,
                                    'access_article_category' => 0,
                                    'access_org_members' => 0,
                                    'create_new_member' => 0,
                                    'access_member_types' => 0,
                                    'access_org_member_type_previlize' => 0,
                                    'access_profile_setting_by_admin' => 0,
                                    'make_admin' => 0,
                                    'view_mainboard' => 1,
                                    'edit_article' => 0,
                                    'view_member_profile' => 0,
                                    'delete_article' => 0,
                                    'system_configuration' => 0,
                        );
                    }
                }
        }elseif($mem_type=="Admin"){
               $data_previlize = array(
                                'mem_type' => $mem_type,
                                'member_org' => $member_org,
                                'mainboard_access_main' => 1,
                                'mainboard_send_proposal' => 1,
                                'mainboard_change_article' => 1,
                                'mainboard_send_notification' => 1,                                
                                'mainboard_sending_out' => 1,
                                'mainboard_manually_archive' => 1,
                                'forum_access' => 1,
                                'forum_comments' => 1,
                                'forum_delete_won_comments' => 1,
                                'forum_delete_any_coments' => 1,
                                'forum_manually_archive_comments' => 1,
                                'customer_view_bank_details' => 1,
                                'member_change_profile' => 1,
                                'member_change_password' => 1,
                                'configuration_view_org' => 1,
                                'configuration_change_org' => 0,
                                'configuration_create_address' => 1,
                                'communication_send_email' => 1,
                                'communication_send_sms' => 1,
                                'communication_send_letters' => 1,
                                'economics_register' => 1,
                                'economics_send_payment' => 1,
                                'economics_check_complete' => 1,
                                'economics_watch_total_income' => 1,
                                'economics_watch_total_cost' => 1,
                                'economics_watch_statistics' => 1,
                                'history_access_articles' => 1,
                                'history_access_comments' => 1,
                                'history_user_actions' => 1,
                                'history_old_letters' => 1,
                                'history_old_sms' => 1,
                                'history_old_emails' => 1,                                
                                'members_add_change' => 1,
                                'members_c_group' => 1,
                                'members_add_group' => 1,
                                'members_user_types' => 1,
                                'members_add_usertype' => 1,
                                'external_mainboard' => 1,
                                'external_presentation' => 1,
                                'access_faktura' => 1,
                                'access_dashboard' => 1,
                                'access_article_category' => 1,
                                'access_org_members' => 1,
                                'create_new_member' => 1,
                                'access_member_types' => 1,
                                'access_org_member_type_previlize' => 1,
                                'access_profile_setting_by_admin' => 1,
                                'make_admin' => 0,
                                'view_mainboard' => 1,
                                'edit_article' => 1,
                                'view_member_profile' => 1,
                                'delete_article' => 1,
                                'system_configuration' => 1
                    );
    }elseif($mem_type=="Superadmin"){
               $data_previlize = array(
                                'mem_type' => $mem_type,
                                'member_org' => $member_org,
                                'mainboard_access_main' => 1,
                                'mainboard_send_proposal' => 1,
                                'mainboard_change_article' => 1,
                                'mainboard_send_notification' => 1,                                
                                'mainboard_sending_out' => 1,
                                'mainboard_manually_archive' => 1,
                                'forum_access' => 1,
                                'forum_comments' => 1,
                                'forum_delete_won_comments' => 1,
                                'forum_delete_any_coments' => 1,
                                'forum_manually_archive_comments' => 1,
                                'customer_view_bank_details' => 1,
                                'member_change_profile' => 1,
                                'member_change_password' => 1,
                                'configuration_view_org' => 1,
                                'configuration_change_org' => 1,
                                'configuration_create_address' => 1,
                                'communication_send_email' => 1,
                                'communication_send_sms' => 1,
                                'communication_send_letters' => 1,
                                'economics_register' => 1,
                                'economics_send_payment' => 1,
                                'economics_check_complete' => 1,
                                'economics_watch_total_income' => 1,
                                'economics_watch_total_cost' => 1,
                                'economics_watch_statistics' => 1,
                                'history_access_articles' => 1,
                                'history_access_comments' => 1,
                                'history_user_actions' => 1,
                                'history_old_letters' => 1,
                                'history_old_sms' => 1,
                                'history_old_emails' => 1,                                
                                'members_add_change' => 1,
                                'members_c_group' => 1,
                                'members_add_group' => 1,
                                'members_user_types' => 1,
                                'members_add_usertype' => 1,
                                'external_mainboard' => 1,
                                'external_presentation' => 1,
                                'access_faktura' => 1,
                                'access_dashboard' => 1,
                                'access_article_category' => 1,
                                'access_org_members' => 1,
                                'create_new_member' => 1,
                                'access_member_types' => 1,
                                'access_org_member_type_previlize' => 1,
                                'access_profile_setting_by_admin' => 1,
                                'make_admin' => 1,
                                'view_mainboard' => 1,
                                'edit_article' => 1,
                                'view_member_profile' => 1,
                                'delete_article' => 1,
                                'system_configuration' => 1
                    );
    }
    return $data_previlize;
}

/**
 * Show DashBoard After Successfull LoggedIn
 *
 *@access private
 *@return DashBoard View
 */ 
function dashboard(){    
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'dashboard';
        $this->data['activeTab'] = 'dashboard';
        $data_previlize = array();
        $data_previlize['mem_type'] = "";
        $data_previlize['member_org'] = "";
        $data_previlize['access_dashboard'] = 0;
        if($this->session->userdata('loggedin') != TRUE) {
            redirect('home/index');
        }else{
            $data_previlize = $this->check_member_type_previlize();                        
        }
        if($data_previlize['mem_type']=="Admin" || $data_previlize['mem_type']=="Superadmin" ){
            $data_previlize['access_dashboard'] = 1;
            $this->data['dynamicView'] = 'pages/organization/dashboard';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/dashboard_no_access';                
        }        
        $this->load->vars($data_previlize);	   
        $this->_commonPageLayout('frontend_viewer');
}
/**
 * View My Organization Details
 *
 *@param $org_id which contains organization id
 *@access private
 *@return Organization Details
 */ 
function my_organization($org_id) {
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'my_org';
    if ($this->session->userdata('loggedin') != TRUE) {
        redirect('home/index');
    }
    $data_previlize = $this->check_member_type_previlize();
    if($data_previlize['configuration_change_org']) {
        $this->data['query1'] = $this->info_model->get_registered_customer($org_id);    
        $this->data['dynamicView'] = 'pages/organization/home/my_organization';        
    }
    else{
        $this->data['dynamicView'] = 'pages/organization/home/my_organization_no_access';
    }
    
    $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
    $this->load->vars($data_previlize);	   
    $this->load->vars($data_mem_type);	   
    $this->_commonPageLayout('frontend_viewer');
}

/**
 *Load My Organization Info Edit Form
 *
 *@param $org_id which contains organization id
 *@access public
 *@return My Organization Info Edit Form
 */ 
function modify_org($org_id) {
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'my_org';
    if ($this->session->userdata('loggedin') != TRUE) {
        redirect('home/index');
    }

    $data_previlize = $this->check_member_type_previlize();
    if($data_previlize['configuration_change_org']) {
        $this->data['org_id'] = $org_id;
        $this->data['query1'] = $this->info_model->get_registered_customer($org_id);
        $this->data['dynamicView'] = 'pages/organization/home/my_organization_edit';
    }
    else{
        $this->data['dynamicView'] = 'pages/organization/home/my_organization_edit_no_access';
    }
    $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
    $this->load->vars($data_previlize);	   
    $this->load->vars($data_mem_type);	
    $this->_commonPageLayout('frontend_viewer');
}


/**
 *Organization update process
 *
 *@access Private
 *@return Success/Failure
 */  
function modify_org_process() {
    $org_id = $this->input->post("org_id");
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'my_org';

    if ($this->session->userdata('loggedin') != TRUE) {
        redirect('home/index');
    }
    $data_previlize = $this->check_member_type_previlize();
    if( $data_previlize['configuration_change_org']) {
            $card_info['credit_card_no']    = $this->input->post("credit_card_no");
            $card_info['credit_card_type'] = $this->input->post("credit_card_type");
            $card_info['credit_card_verification_code'] = $this->input->post("credit_card_verification_code");
            $card_info['card_expire_date_month'] = $this->input->post("card_expire_date_month");
            $card_info['card_expire_date_year'] = $this->input->post("card_expire_date_year");

            $organization_data = array(
                'org_email' => $this->input->post("org_email"),
                'org_web' => $this->input->post("org_web"),
                'org_description' => $this->input->post("org_description"),
                'org_street_address' => $this->input->post("org_street_address"),
                'org_mobile_phone' => $this->input->post("org_mobile_phone"),
                'org_zip' => $this->input->post("org_zip"),
                'org_city' => $this->input->post("org_city"),
                'org_country' => $this->input->post("org_country"),
                'org_bank_acc_no_one' => $this->input->post("org_bank_acc_no_one"),
                'org_bank_acc_type_one' =>$this->input->post("org_bank_acc_type_one"),
                'org_bank_acc_no_two' => $this->input->post("org_bank_acc_no_two"),
                'org_bank_acc_type_two' =>$this->input->post("org_bank_acc_type_two"),
                'org_bank_acc_no_three' => $this->input->post("org_bank_acc_no_three"),
                'org_bank_acc_type_three' =>$this->input->post("org_bank_acc_type_three")
            );

            if($this->input->post("org_category")!="" && $this->input->post("org_category")!="other"){
                $organization_data['org_category'] = $this->input->post("org_category");
            }
            elseif($this->input->post("category_name")!=""){
                $data_val['category_name'] = $this->input->post("category_name");
                $cat_id = $this->info_model->org_category_insert($data_val);
                $organization_data['org_category'] = $cat_id;
            }

            /*$admin_user_data = array(                    
            'first_name' => $this->input->post("first_name"),
            'last_name' => $this->input->post("last_name"),
            'phone_no' => $this->input->post("phone_no"),
            'email' => $this->input->post("email"),
            'username' => $this->input->post("username"),
            'person_number' => $this->input->post("person_number"),
            'primary_address' => $this->input->post("primary_address"),
            'optional_address' => $this->input->post("optional_address"),
            'zip' => $this->input->post("zip"),
            'city' => $this->input->post("city"),
            'country' => $this->input->post("country"),
            'state' => $this->input->post("state"),
            );*/

            $form_data_step4 = array(
                'payment_method' => $this->input->post("payment_method"),
                'bill_first_name' => $this->input->post("bill_first_name"),
                'bill_last_name' => $this->input->post("bill_last_name"),
                'bill_mobile_phone' => $this->input->post("bill_mobile_phone"),
                'bill_email' => $this->input->post("bill_email"),
                'bill_street_address' => $this->input->post("bill_street_address"),
                'bill_zip' => $this->input->post("bill_zip"),
                'bill_city' => $this->input->post("bill_city"),
                'bill_country' => $this->input->post("bill_country"),
            );     

            $data_billing_address['billing_address_data'] = $form_data_step4;
            $data_organization['organization_data'] = $organization_data;               
            //$data_admin_user['admin_user_data'] = $admin_user_data;    
            $this->load->vars($form_data_step4);   
            //$this->load->vars($data_admin_user);  
            $this->load->vars($data_organization);   

            $this->load->library('form_validation');   
            if($this->input->post("org_category")!="other"){
                $this->form_validation->set_rules('org_category', $this->lang->line('label_org_category'), 'trim|required');
            }
            if($this->input->post("org_category")=="other"){
                $this->form_validation->set_rules('category_name', $this->lang->line('label_org_category'), 'trim|required');
            }
            ///Organization_form Validation
            $this->form_validation->set_rules('org_email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_org_email_check_by_org_id[' . $this->input->post("org_id") . ']');
            $this->form_validation->set_rules('org_description', $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_description'), 'trim|required');
            $this->form_validation->set_rules('org_street_address', $this->lang->line('label_street_address'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('org_mobile_phone', $this->lang->line('label_mobile_phone'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('org_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('org_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('org_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('org_bank_acc_no_one', $this->lang->line('label_bank_payment'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('org_bank_acc_type_one', $this->lang->line('label_bank_acc_type'), 'trim|required|xss_clean');
            ///Admin_user_form Validation
            /* $this->form_validation->set_rules('first_name', $this->lang->line('label_first_name'), 'trim|required');        
            $this->form_validation->set_rules('last_name',$this->lang->line('label_last_name'), 'trim|required');
            $this->form_validation->set_rules('phone_no', $this->lang->line('label_phone'), 'trim|required');
            $this->form_validation->set_rules('email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_email_check_by_org_id[' . $this->input->post("org_id") . ']');
            $this->form_validation->set_rules('username',$this->lang->line('label_username'), 'trim|required|callback_login_username_check_by_org_id[' . $this->input->post("org_id") . ']');
            $this->form_validation->set_rules('person_number', $this->lang->line('label_person_no'), 'trim|required|callback_check_person_number_by_org_id[' . $this->input->post("org_id") . ']');
            $this->form_validation->set_rules('primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('city', $this->lang->line('label_city'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('country', $this->lang->line('label_country'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('state', $this->lang->line('label_state'), 'trim|required|xss_clean');*/

            /////////Billing_form Validation
            $this->form_validation->set_rules('bill_first_name', $this->lang->line('label_first_name'), 'trim|required');
            $this->form_validation->set_rules('bill_last_name',$this->lang->line('label_last_name'), 'trim|required');
            $this->form_validation->set_rules('bill_mobile_phone', $this->lang->line('label_mobile_phone'), 'trim|required');
            $this->form_validation->set_rules('bill_email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('bill_street_address', $this->lang->line('street_address'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('bill_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('bill_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('bill_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                //echo validation_errors();exit;
                $this->data['org_id'] = $org_id;
                $this->data['query1'] = $this->info_model->get_registered_customer($org_id); 
                $this->data['dynamicView'] = 'pages/organization/home/my_organization_edit';
            } else {
            //$update_success = $this->info_model->update_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4,$org_id);
            $update_success = $this->info_model->update_organisation($data_organization['organization_data'],$form_data_step4,$org_id);
            if($update_success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_update_success').'</div>');
            }
            else{
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_update_failure').'</div>');
            }           
                redirect('organization/info/my_organization/'.$org_id);
            }
       }
    else{
        $this->data['dynamicView'] = 'pages/organization/home/my_organization_edit_no_access';
    }
    $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
    $this->load->vars($data_previlize);	   
    $this->load->vars($data_mem_type);	
    $this->_commonPageLayout('frontend_viewer');
}

function org_email_check_by_org_id($org_email,$org_id) {        
        $result = $this->dx_auth->is_email_available_by_org_id($org_email,$org_id);
        if (!$result) {
            $this->form_validation->set_message('org_email_check_by_org_id', $this->lang->line('email_exists_error_msg'));
        }
        return $result;
}
/**
 * View My Profile Details
 *
 *@param $user_id which contains member id
 *@access private
 *@return My Profile Details
 */ 
function my_profile($mem_id){
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'my_profile';
    $data_previlize = $this->check_member_type_previlize();

    if ($this->session->userdata('loggedin') != TRUE) {
        redirect('home/index');
    }
    elseif($mem_id==$this->session->userdata('mem_id')){
            $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id);             
            $this->data['dynamicView'] = 'pages/organization/home/my_profile';            
    }else{                    
            $this->data['dynamicView'] = 'pages/organization/home/my_profile_no_access';            
}

$this->load->vars($data_previlize);
$this->_commonPageLayout('frontend_viewer');
}


/**
 *Load My profile Info Edit Form
 *
 *@param $mem_id which contains member id
 *@access private
 *@return My profile Info Edit Form
 */ 
function modify_my_profile($mem_id) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'my_profile';
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('loggedin') != TRUE) {
            redirect('home/index');
        }
        elseif($this->session->userdata('mem_id') == $mem_id){            
            $this->data['mem_id'] = $mem_id;
            $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id);
            $this->data['dynamicView'] = 'pages/organization/home/my_profile_edit';
        }else{$this->data['dynamicView'] = 'pages/organization/home/member_profile_edit_no_access';}       
        $this->_commonPageLayout('frontend_viewer');
}



/**
 *My Profile Update Process
 *
 *@access Private
 *@return Success/Failure
 */ 
 
function modify_my_profile_process() {        
    $mem_id = $this->input->post("mem_id");    
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'my_profile';
    $data_previlize = $this->check_member_type_previlize();
    if($this->session->userdata('loggedin') != TRUE) {
        redirect('home/index');
    }
     if($this->session->userdata('mem_id') == $mem_id){
            $admin_user_data = array(               
                    'profile_message' => $this->input->post("profile_message"),
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'member_sex' => $this->input->post("member_sex"),
                    'ssn_or_person_no' => $this->input->post("ssn_or_person_no"),
                    'username' => $this->input->post("username"),
                    'email' => $this->input->post("email"),                    
                    'mobile_phone' => $this->input->post("mobile_phone"),
                    'street_address' => $this->input->post("street_address"),
                    'zip' => $this->input->post("zip"),
                    'city' => $this->input->post("city"),
                    'country' => $this->input->post("country"),
                    'bank_acc_no_one' => $this->input->post("bank_acc_no_one"),
                    'bank_acc_type_one' => $this->input->post("bank_acc_type_one")                    
                );
                                  
         $data_admin_user['admin_user_data'] = $admin_user_data;    
         $this->load->vars($data_admin_user);  
         $this->load->library('form_validation');   
         ///Organization_form Validation
 
        ///Admin_user_form Validation
        $this->form_validation->set_rules('profile_message', $this->lang->line('label_about_me'), 'trim|required');        
        $this->form_validation->set_rules('first_name', $this->lang->line('label_first_name'), 'trim|required');        
        $this->form_validation->set_rules('last_name',$this->lang->line('label_last_name'), 'trim|required');
        $this->form_validation->set_rules('member_sex',$this->lang->line('label_sex'), 'trim|required');
        //$this->form_validation->set_rules('ssn_or_person_no', $this->lang->line('label_ssn_or_person_no'), 'trim|required|callback_check_person_number_by_member_id[' . $this->input->post("mem_id") . ']');
        $this->form_validation->set_rules('username',$this->lang->line('label_username'), 'trim|required|callback_login_username_check_by_member_id[' . $this->input->post("mem_id") . ']');
        $this->form_validation->set_rules('email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_email_check_by_member_id[' . $this->input->post("mem_id") . ']');
        $this->form_validation->set_rules('mobile_phone', $this->lang->line('label_mobile_phone'), 'trim|required');
        $this->form_validation->set_rules('street_address', $this->lang->line('street_address'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_acc_no_one', $this->lang->line('label_bank_payment'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_acc_type_one', $this->lang->line('label_bank_acc_type'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['mem_id'] = $mem_id;
            $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
            $this->data['dynamicView'] = 'pages/organization/home/my_profile_edit';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                //$update_success = $this->info_model->update_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4,$org_id);
                $update_success = $this->info_model->update_member_profile($data_admin_user['admin_user_data'],$mem_id);
                if($update_success){
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_profile_update_success').'</div>');
                }
                else{
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_profile_update_failure').'</div>');
                }           
                redirect('organization/info/my_profile/'.$mem_id);
        }
    }else{$this->data['dynamicView'] = 'pages/organization/home/member_profile_edit_no_access';$this->_commonPageLayout('frontend_viewer');}       
        
}



/**
 *Load Member profile Info Edit Form By Admin
 *
 *@param $mem_id which contains member id
 *@access private
 *@return Member profile Info Edit Form By Admin
 */ 
function modify_member_profile_by_admin($mem_id) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';
        $this->data['expire_date_error'] = "";
        $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['create_new_member']){        
            $this->data['expire_date_error'] = '';
            $this->data['expire_date_intake'] ="";
            $this->data['mem_id'] = $mem_id;
            $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id);
            $this->data['previlized_mem_type'] = $this->info_model->get_previlize_assigned_org_mem_type($data_previlize['member_org']); 
            $this->data['dynamicView'] = 'pages/organization/members/member_profile_edit_admin';
        }else{$this->data['dynamicView'] = 'pages/organization/members/member_profile_edit_no_access';}       
        $this->_commonPageLayout('frontend_viewer');
}

/**
 *Member Profile Update Process By Admin
 *
 *@access Private
 *@return Success/Failure
 */  
function modify_member_profile_by_admin_process() {        
    $mem_id = $this->input->post("mem_id");    
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'members';
    $this->data['activeTab'] = 'members';
    $this->data['expire_date_error'] = '';
     $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['create_new_member']){      
            $admin_user_data = array(               
                    'profile_message' => $this->input->post("profile_message"),
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'member_sex' => $this->input->post("member_sex"),
                    'mobile_phone' => $this->input->post("mobile_phone"),
                    'street_address' => $this->input->post("street_address"),
                    'zip' => $this->input->post("zip"),
                    'city' => $this->input->post("city"),
                    'country' => $this->input->post("country"),
                    'bank_acc_no_one' => $this->input->post("bank_acc_no_one"),
                    'bank_acc_type_one' => $this->input->post("bank_acc_type_one"),
                    'mem_type_id' => $this->input->post("mem_type_id")
                );
                                  
         
         $this->load->library('form_validation');   
         ///Organization_form Validation
 
        ///Admin_user_form Validation
        $this->form_validation->set_rules('profile_message', $this->lang->line('label_member_profile_message'), 'trim|required');        
        $this->form_validation->set_rules('first_name', $this->lang->line('label_first_name'), 'trim|required');        
        $this->form_validation->set_rules('last_name',$this->lang->line('label_last_name'), 'trim|required');
        $this->form_validation->set_rules('member_sex',$this->lang->line('label_sex'), 'trim|required');
        $this->form_validation->set_rules('mobile_phone', $this->lang->line('label_mobile_phone'), 'trim|required');
        $this->form_validation->set_rules('street_address', $this->lang->line('label_street_address'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_acc_no_one', $this->lang->line('label_bank_payment_info'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_acc_type_one', $this->lang->line('label_bank_acc_type'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('mem_type_id', $this->lang->line('label_member_type'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('expire_date', $this->lang->line('label_membership_expiredate'), 'trim|required|xss_clean');
        
         if($this->input->post('expire_date')){
                $this->data['expire_date_intake'] = $this->input->post('expire_date'); 
                $this->data['expire_date'] = $this->data['expire_date_intake'];
                $this->data['expire_date'] = explode("-",$this->input->post('expire_date'));
                $this->data['expire_date'] = mktime(0, 0, 0, ($this->data['expire_date'][1]), $this->data['expire_date'][2], $this->data['expire_date'][0]);
                $admin_user_data['expire_date'] =  $this->data['expire_date'];
                $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($this->data['expire_date'] <= $todate ){
                        $this->data['expire_date_error'] = $this->lang->line('membership_expiredate_error');
                }   
            }    
         $data_admin_user['admin_user_data'] = $admin_user_data;    
         $this->load->vars($data_admin_user);  
        if($this->form_validation->run() == FALSE || !empty($this->data['expire_date_error'] ) ) {
            $this->data['mem_id'] = $mem_id;
            $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
            $this->data['previlized_mem_type'] = $this->info_model->get_previlize_assigned_org_mem_type($this->session->userdata('member_org')); 
            $this->data['dynamicView'] = 'pages/organization/members/member_profile_edit_admin';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                //$update_success = $this->info_model->update_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4,$org_id);
                $update_success = $this->info_model->update_member_profile($data_admin_user['admin_user_data'],$mem_id);
                if($update_success){
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_profile_update_admin_success').'</div>');
                }
                else{
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_profile_update_admin_failure').'</div>');
                }           
                redirect('organization/info/org_members');
        }
     }else{
                $this->data['dynamicView'] = 'pages/organization/members/member_profile_edit_no_access';
                $this->_commonPageLayout('frontend_viewer');
        }               
}

/**
 * Show Home After Successfull LoggedIn AND if looged user don't have access in dashboard
 *
 *@access private
 *@return Home View
 */ 
function home(){
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'my_org';
    if ($this->session->userdata('loggedin') != TRUE) {
        redirect('home/index');
    }else{
           $data_previlize = $this->check_member_type_previlize();            
    }
    $this->load->vars($data_previlize);
    $this->data['dynamicView'] = 'pages/organization/home';
    $this->_commonPageLayout('frontend_viewer');
}

/**
 * Organization System Configuration
 *
 *@access Private
 *@return Organization System Configuration View
 */ 
function system_configuration(){
    $this->lang->load('common', $this->session->userdata('lang_file')); 
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'system_configuration';   
    $mem_id = $this->session->userdata('mem_id');
    $data_previlize = $this->check_member_type_previlize();
    $mem_type = $data_previlize['mem_type']; 
    if($data_previlize['system_configuration']){
        $this->data['org_system_config'] = $this->info_model->get_org_system_config($data_previlize['member_org']);    
        if(empty($this->data['org_system_config']) ) {
            $org_system_config_data = array("org_id" => $data_previlize['member_org'], "default_preffered_lang" => 'sv', "name_for_customer_or_members" => 'members', 'add_date' => date("Y-m-d H:i:s")) ; 
            $success = $this->info_model->insert_org_system_config($org_system_config_data);    
            if($success){
                    $this->data['org_system_config'] = $this->info_model->get_org_system_config($data_previlize['member_org']);    
            }
        }
        
        $this->data['dynamicView'] = 'pages/organization/home/system_configuration';
    } else{ $this->data['dynamicView'] = 'pages/organization/home/system_configuration_no_access'; }        
    $this->load->vars($data_previlize);
    $this->_commonPageLayout('frontend_viewer');
}



/**
 * Update Organization System Configuration
 *
 *@access Private
 *@return Organization System Configuration View
 */ 
function update_system_configuration(){
    $this->lang->load('common', $this->session->userdata('lang_file')); 
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'system_configuration';       
    $mem_id = $this->session->userdata('mem_id');
    $data_previlize = $this->check_member_type_previlize();        
    $custom_label_name = $this->input->post('custom_label_name');     
    $update_data = array('default_preffered_lang' => $this->input->post('default_preffered_lang'), 
    'name_for_customer_or_members'=>$this->input->post('name_for_customer_or_members') );                                         
    $mem_type = $data_previlize['mem_type']; 
    $this->load->vars($data_previlize);

    if($data_previlize['system_configuration']){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name_for_customer_or_members', $this->lang->line('label_member_or_customer_name'), 'trim|required');
        $this->form_validation->set_rules('default_preffered_lang', $this->lang->line('label_default_preffered_lang'), 'trim|required');
        if($this->form_validation->run() == FALSE) {  
            $this->data['org_system_config'] = $this->info_model->get_org_system_config($data_previlize['member_org']);             
            if(empty($this->data['org_system_config']) ) {
                $org_system_config_data = array("org_id" => $data_previlize['member_org'], "default_preffered_lang" => 'sv', "name_for_customer_or_members" => 'members', 'add_date' => date("Y-m-d H:i:s")) ; 
                $success = $this->info_model->insert_org_system_config($org_system_config_data);    
                if($success){
                    $this->data['org_system_config'] = $this->info_model->get_org_system_config($data_previlize['member_org']);    
                }
            }
            $this->data['dynamicView'] = 'pages/organization/home/system_configuration';
            $this->_commonPageLayout('frontend_viewer');
        }else{
            $success = $this->info_model->update_org_system_config($update_data, $custom_label_name, $data_previlize['member_org']);    
            if($success){    
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_system_config_success').'</div>');
            }else{
                $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('org_system_config_failed').'</div>');
            }
            redirect('organization/info/system_configuration');
        }
    } else{ 
        $this->data['dynamicView'] = 'pages/organization/home/system_configuration_no_access'; 
        $this->_commonPageLayout('frontend_viewer');
    }            
}

    function profile() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('home/index');
        }
        $this->data['dynamicView'] = 'pages/organization/welcome';
            $this->_commonPageLayout('frontend_viewer');
    }

    function show_profile() {
        $org_id = $this->session->userdata('user_id');
        $this->data['record'] = $this->info_model->get_all($acc_no);
        $this->data['record1'] = $this->info_model->get_account1($acc_no);
        $this->data['dynamicView'] = 'pages/users/profile/report_detail';
        $this->_commonPageLayout('frontend_viewer');
    }



    function org_group($group_name, $org_id) {
        $mem_id = $this->session->userdata('mem_id');
        $result = $this->dx_auth->is_org_group_available($group_name, $org_id, $mem_id);
        if (!$result) {
            $this->form_validation->set_message('org_group', 'Group name exists.Please choose another one.');
        }

        return $result;
    }


    function org_group12($group_name, $id1) {
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $result = $this->dx_auth->is_org_group1_available($group_name, $org_id, $mem_id, $id1);
        if (!$result) {
            $this->form_validation->set_message('org_group12', $this->lang->line('group_name_exists'));
        }

        return $result;
    }





    function org_group_permission_delete($id = NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group_permission';
        $this->info_model->org_group_permission_delete($id);
        redirect('organization/info/view_group_permission', 'location', 301);
    }

    function add_group_permission() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'group_permission';
        $this->data['dynamicView'] = 'pages/organization/permission/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_group_permission() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'group_permission';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
        $this->form_validation->set_rules('sending_email', 'Sending Email', 'trim|required');
        $this->form_validation->set_rules('sending_sms', 'Sending Sms', 'trim|required');
        $this->form_validation->set_rules('sending_post', 'Sending Post', 'trim|required');
        $this->form_validation->set_rules('profile', 'Profile', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/permission/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $g_name = $this->input->post("group_name");
            $this->data['record'] = $this->info_model->get_existing_permission($g_name);
            if (count($this->data['record'])) {
                $this->session->set_flashdata('message', '<div id="message">Group Permission Setting exists.</div>');
                redirect('organization/info/add_group_permission');
            } else {
                $org_id = $this->session->userdata('user_id');
                $data = array(
                    'sending_email' => $this->input->post("sending_email"),
                    'sending_sms' => $this->input->post("sending_sms"),
                    'sending_post' => $this->input->post("sending_post"),
                    'profile' => $this->input->post("profile"),
                    'message' => $this->input->post("message"),
                    'group_id' => $this->input->post("group_name"),
                    'org_id' => $org_id
                );
                $this->info_model->group_permission_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Group Permission Setting Saved Successfully.</div>');
                redirect('organization/info/add_group_permission');
            }
        }
    }

    function view_group_permission() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group_permission';
        $org_id = $this->session->userdata('user_id');
        $this->data['query1'] = $this->info_model->view_group_permission($org_id);
        $this->data['dynamicView'] = 'pages/organization/permission/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    protected function now_upload($photo) {
        $setConfig['upload_path'] = './uploads/';
        $setConfig['allowed_types'] = 'BMP|GIF|JPG|PNG|JPEG|gif|jpg|png|jpeg|bmp';
        $setConfig['encrypt_name'] = TRUE;
        $setConfig['max_size'] = '';
        $setConfig['max_width'] = '';
        $setConfig['max_height'] = '';
        $this->load->library('upload');
        $this->upload->initialize($setConfig);
        if (!$this->upload->do_upload($photo)) {
            $this->data['admin_message'] = $this->upload->display_errors("<p style='color:#FF0000; font-weight:bold;'>", "</p>");
            return FALSE;
        } else {
            $this->upload_data = $this->upload->data();
            return TRUE;
        }
    }

    function edit_profile() {
        $this->data['record'] = $this->info_model->get_org_profile();
        $this->data['dynamicView'] = 'pages/organization//edit';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_profile() {
        $data = array(
            'org_primary_address' => $this->input->post('org_primary_address'),
            'org_optional_address' => $this->input->post('org_optional_address'),
            'org_phone' => $this->input->post('org_phone'),
            'org_type' => $this->input->post('org_type')
        );
        for ($i = 1; $i <= count($_FILES); $i++) {
            if ($_FILES['photo' . $i]['size'] > 0) {
                if ($this->now_upload('photo' . $i)) {
                    $fileData = array(
                        'photo' . $i => $this->upload_data['file_name'],
                    );
                    $data = array_merge($data, $fileData);
                }
            }
        }

        $this->info_model->profile_update($data);
        $this->session->set_flashdata('message', '<div id="message1">Profile Updated Successfully.</div>');
        redirect('organization/back/index', 'location', 301);
    }

    function group_edit($id) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group_permission';
        $this->data['record'] = $this->info_model->get_group_info($id);
        $this->data['dynamicView'] = 'pages/organization/permission/edit';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_group() {
        $data = array(
            'sending_email' => $this->input->post("sending_email"),
            'sending_sms' => $this->input->post("sending_sms"),
            'sending_post' => $this->input->post("sending_post"),
            'profile' => $this->input->post("profile"),
            'message' => $this->input->post("message")
        );
        $this->info_model->group_permission_update($data);
        // $this->session->set_flashdata('message', '<div id="message">Profile Updated Successfully.</div>');
        redirect('organization/info/view_group_permission', 'location', 301);
    }

    function add_cost($start=0) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'cost_setting';
        $this->data['dynamicView'] = 'pages/organization/cost/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_cost($start=0) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'cost_setting';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sms_cost', 'Sms Cost', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('letter_cost', 'Letter Cost', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('currency', 'currency', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/cost/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $org_id = $this->session->userdata('user_id');
            $this->data['record'] = $this->info_model->get_all_cost($org_id);
            if (count($this->data['record'])) {
                $this->session->set_flashdata('message', '<div id="message">Sorry Cost settings Exists .</div>');
                redirect('organization/info/add_cost');
            } else {
                $data = array(
                    'sms_cost' => $this->input->post('sms_cost'),
                    'letter_cost' => $this->input->post('letter_cost'),
                    'currency' => $this->input->post('currency'),
                    'org_id' => $org_id
                );
                $this->info_model->cost_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Cost inserted Successfully.</div>');
                redirect('organization/info/add_cost');
            }
        }
    }

    function view_cost() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_cost';
        $org_id = $this->session->userdata('user_id');
        $this->data['query1'] = $this->info_model->view_cost($org_id);
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/cost/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function cost_edit($id=NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_cost';
        if ($id != NULL) {
            $this->data['record'] = $this->info_model->get_cost($id);
            $this->data['dynamicView'] = 'pages/organization/cost/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('sms_cost', 'Sms cost', 'trim|required||numeric|xss_clean');
            $val->set_rules('letter_cost', 'Letter Cost', 'trim|required|numeric|xss_clean');
            $val->set_rules('currency', 'Currency', 'trim|required|xss_clean');
            if ($val->run()) {
                $data = array(
                    'sms_cost' => $this->input->post('sms_cost'),
                    'letter_cost' => $this->input->post('letter_cost'),
                    'currency' => $this->input->post('currency')
                );
                $this->info_model->cost_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Cost Setting  Updated Successfully.</div>');
                redirect('organization/info/view_cost', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function cost_delete($id = NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_cost';
        $this->info_model->cost_delete($id);
        redirect('organization/info/view_cost', 'location', 301);
    }

    function check_member_username($username) {

        $result = $this->dx_auth->is_member_username_available($username);
        if (!$result) {
            $this->form_validation->set_message('check_member_username', 'Username Exists.Please choose another one.');
        }

        return $result;
    }

    function check_member_email($email) {
        $result = $this->dx_auth->is_member_email_available($email);
        if (!$result) {
            $this->form_validation->set_message('check_member_email', 'Email is already Exists.');
        }

        return $result;
    }

    function check_person_number($person_number) {
        $result = $this->dx_auth->is_person_number_available($person_number);
        if (!$result) {
            $this->form_validation->set_message('check_person_number', 'Person No is exists.Please choose another one');
        }

        return $result;
    }


/**
 * View organizatio's member list
 *
 *@access Private
 *@return organizatio's member list
 */ 
    function org_members(){
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';
        $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['access_org_members']) {
            $this->data['query1'] = $this->info_model->get_org_registered_member($data_previlize['member_org']);
            $this->data['dynamicView'] = 'pages/organization/members/org_members';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/org_members_no_access';
        }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * View organizatio's Non-Ac member list
 *
 *@access Private
 *@return organizatio's Non-Ac member list
 */ 
    function non_ac_org_members(){
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'non_ac_members';
        $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['access_org_members']) {
            $this->data['query1'] = $this->info_model->get_org_non_ac_member($data_previlize['member_org']);
            $this->data['dynamicView'] = 'pages/organization/members/org_non_ac_members';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/org_members_no_access';
        }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}


/**
 * Load New non-ac member Registration Form
 *
 *@access Private
 *@return New non-ac member Registration Form
 */ 
    function create_new_non_ac_member() {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'non_ac_members';        
        $this->data['label_all_address_empty_err_msg'] = "";
        $data['category_name'] = "";
        $registered_member ="";
        $this->data['expire_date_error'] = "";        
        $to_date = date("Y-m-d H:i:s"); 
        $organization_data = array();
        $organization_data['expire_date_intake'] ="";
        $mem_id = $this->session->userdata('mem_id');        
        $data_previlize = $this->check_member_type_previlize();  
        $org_id = $data_previlize['member_org'];
        if($data_previlize['create_new_member']) {    
            $org_info = $this->info_model->get_registered_customer($org_id);    
            if($org_info){
                $organization_data['org_type'] = $org_info[0]->org_type;
                $organization_data['org_number'] = $org_info[0]->org_number;
                $organization_data['org_name'] = $org_info[0]->org_name;
                //$organization_data['street_address'] = $org_info[0]->org_street_address;
                //$organization_data['zip'] = $org_info[0]->org_zip;
                //$organization_data['city'] = $org_info[0]->org_city;
                $organization_data['country'] = $org_info[0]->org_country;
                $organization_data['expire_date_intake'] =  $org_info[0]->expire_date;
            }
            
            $data_registration = array(
                    'mem_type_id' => "",
                    'customer_type' => "",
                    'first_name' => "",
                    'last_name' => "",
                    'dept_or_company_or_org_name' => "",
                    'dept_or_org_no' => "",
                    'username' => "",
                    'password' => "",
                    'email' => "",
                    'mobile_phone' => "",
                    'land_line_phone' => "",
                    'street_address' => "",
                    'zip' => "",
                    'city' => "",
                    'country' => "",
                    'customer_no' => "",
                    'vat_no' => "",
                    'web' => "",
                    'attention' => "",
                    'your_reference' => "",
                    'our_reference' => "",
                    'ean_no' => "",
                    'credit_limit' => "",
                    'discount' => "",
                    'ssn_or_person_no' => "",
                    'gender' => "",
                    'profile_message' => "",
                    'profile_picture' => "",
                    'bank_acc_no_one' => "",
                    'bank_acc_type_one' => "",
                    'bank_acc_no_two' => "",
                    'bank_acc_type_two' => "",
                    'bank_acc_no_three' => "",
                    'bank_acc_type_three' => "",                    
                    'bank_name' => "",    
                    'password_receive_by' =>"",
                    'activation_date' =>"",
                    'member_group' =>"",
                    'expire_date' =>date("Y-m-d",$organization_data['expire_date_intake']),
                    'add_date' =>""
                   );
            //$org_package_info = $this->info_model->get_package($this->session->userdata('package_name'));
            /*$org_package_info = $this->info_model->get_package_assigned_to_org_member_info("", 'active', 'Superadmin');
            if($org_package_info){
                $no_of_member_limit =  $org_package_info[0]->no_of_member; 
                $total_registered_member = $this->info_model->get_total_org_registered_memebr($data_previlize['member_org']);
              
               if($total_registered_member){
                    $registered_member = $total_registered_member[0]->num_of_memebr;
                }
            }*/
            // echo "total_registered_member: ".$registered_member;  exit;            
          
                    $this->data['dynamicView'] = 'pages/organization/members/non_ac_member_registration';    
               
            }else{
                $this->data['dynamicView'] = 'pages/organization/members/registration_no_access';
            }
                $this->load->vars($data_registration);
                $this->load->vars($organization_data);
                $this->load->vars($data_previlize);	
                $this->data['customer_type'] = "Government";
                $this->data['label_password_does_not_matched_error'] = "";
                $this->data['send_password'] = "send_password_now";
                $this->_commonPageLayout('frontend_viewer');
       
    }


/**
 * New Non-Ac member Registration Process
 *
 *@access Private
 *@return Success/Failure Message
 */  
function create_new_non_ac_member_process() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'non_ac_members';
        $this->data['label_all_address_empty_err_msg'] = "";
        if(isset($_POST['cancel'])){
            redirect('organization/info/non_ac_org_members');
        }elseif(isset($_POST['confirm']) || isset($_POST['confirm_and_create']) ){ 
                $this->load->library('form_validation');        
                $mem_id = $this->session->userdata('mem_id');
                $data_previlize = $this->check_member_type_previlize();    
                $org_id = $data_previlize['member_org'];
                $customer_type = $this->input->post("customer_type");     
                $mem_organization_info = $this->info_model->get_registered_customer($data_previlize['member_org']);
                $to_date = date("Y-m-d H:i:s"); 
                $data_registration = array(
                    'org_id' => $org_id,
                    'mem_type_id' => "",
                    'customer_type' => $this->input->post('customer_type'),
                    'customer_no' => $this->input->post('customer_no'),
                    'email' => $this->input->post('email'),
                    'dept_or_company_or_org_name' => "",
                    'dept_or_org_no' => "",
                    'mobile_phone' =>$this->input->post('mobile_phone'),
                    'land_line_phone' => $this->input->post('land_line_phone'),
                    'street_address' => $this->input->post('street_address'),
                    'zip' => $this->input->post('zip'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'vat_no' => $this->input->post('vat_no'),
                    'web' => $this->input->post('web'),
                    'attention' => $this->input->post('attention'),
                    'your_reference' => $this->input->post('your_reference'),
                    'our_reference' => $this->input->post('our_reference'),
                    'ean_no' => $this->input->post('ean_no'),
                    'credit_limit' => $this->input->post('credit_limit'),
                    'discount' => $this->input->post('discount'),
                    'ssn_or_person_no' => "",
                    'add_date' =>""
                );           
                if($data_previlize['create_new_member']) {      
                    $org_info = $this->info_model->get_registered_customer($org_id);    
                    if($org_info){
                        $organization_data['org_type'] = $org_info[0]->org_type;
                        $organization_data['org_number'] = $org_info[0]->org_number;
                        $organization_data['org_name'] = $org_info[0]->org_name;
                        //$organization_data['street_address'] = $org_info[0]->org_street_address;
                        //$organization_data['zip'] = $org_info[0]->org_zip;
                        //$organization_data['city'] = $org_info[0]->org_city;
                        $organization_data['country'] = $org_info[0]->org_country;
                        $organization_data['expire_date_intake'] =  $org_info[0]->expire_date;
                    }
                    /////////////////////////  2014-04-15 //////////////////////////////
                   
                    if($customer_type=="Private person"){
                        $data_registration['ssn_or_person_no']  =  $this->input->post("ssn_or_person_no");
                        // $this->form_validation->set_rules('ssn_or_person_no', $this->lang->line('label_ssn_person_no'), 'trim|required|callback_check_person_number1');
                    }else{
                        $data_registration['dept_or_company_or_org_name'] =  $this->input->post("dept_or_company_or_org_name");
                        $data_registration['dept_or_org_no']  =  $this->input->post("dept_or_org_no");
                        if($customer_type=="Government"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_department_name'), 'trim|required'); }
                        if($customer_type=="Company"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_company_name'), 'trim|required'); }
                        if($customer_type=="Organization"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_organization_name'), 'trim|required'); }
                    }                             
                    ////////////////////////  2014-04-15 //////////////////////////////
                    $previlize_assigned['previlized_mem_type'] = $this->info_model->get_previlize_assigned_org_mem_type($data_previlize['member_org']); 
                    $this->form_validation->set_rules('customer_no', $this->lang->line('label_customer_no'), 'trim|required|xss_clean|callback_customer_no[' . $data_previlize['member_org']. ']');
                    $this->form_validation->set_rules('vat_no', $this->lang->line('label_vat_no'), 'trim|xss_clean|callback_vat_no[' . $data_previlize['member_org']. ']');
                    $this->form_validation->set_rules('ean_no', $this->lang->line('label_ean_no'), 'trim|xss_clean|callback_ean_no[' . $data_previlize['member_org']. ']');
                    $this->form_validation->set_rules('mobile_phone', $this->lang->line('label_billing_mobile'), 'trim|xss_clean|callback_billing_mobile');
                    $this->form_validation->set_rules('email', $this->lang->line('label_email'), 'trim|valid_email|xss_clean|callback_email_check');
                    $this->form_validation->set_rules('credit_limit', $this->lang->line('label_credit_limit'), 'trim|xss_clean|numeric');
                    $this->form_validation->set_rules('discount', $this->lang->line('label_discount'), 'trim|xss_clean|numeric');
                    
                    if((!empty($data_registration['street_address']) && !empty($data_registration['zip']) && !empty($data_registration['city']) && !empty($data_registration['country']))  || !empty($data_registration['mobile_phone']) || !empty($data_registration['email'])){
                        
                    }else{
                            $this->data['label_all_address_empty_err_msg'] = $this->lang->line('all_address_empty_err_msg');
                    }
                                 
                    if ($this->form_validation->run() == FALSE || $this->data['label_all_address_empty_err_msg']) {     
                        $this->data['dynamicView'] = 'pages/organization/members/non_ac_member_registration';    
                    }
                    else{                             
               
                       if(isset($_POST['confirm']) || isset($_POST['confirm_and_create'])  ){
                            //////////////////////// 2014-04-15 //////////////////////
                            $data_registration['blocked'] = 1;
                            $data_registration['non_ac_member'] = 1;
                            $success = $this->info_model->org_member_registration($data_registration);
                            if($success){                       
                                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('non_ac_member_create_success').'</div>');
                            }
                            else{
                                $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('non_ac_member_create_failure').'</div>');
                            }
                            if( isset($_POST['confirm']) ){
                                redirect('organization/info/non_ac_org_members');
                            }elseif( isset($_POST['confirm_and_create'])  ){
                                redirect('organization/info/create_new_non_ac_member');
                            }
                        }
                    }
                }
                else{
                    $this->data['dynamicView'] = 'pages/organization/members/registration_no_access';
                }
                $this->load->vars($data_previlize);
                $this->load->vars($previlize_assigned);	
                $this->load->vars($data_registration);	  
                $this->load->vars($organization_data);                
                $this->_commonPageLayout('frontend_viewer'); 
    }
}


function billing_mobile($mobile_phone) {        
        $result = $this->dx_auth->is_mobile_no_available($mobile_phone);
        if (!$result) {
            $this->form_validation->set_message('billing_mobile', $this->lang->line('mobile_no_exists_error_msg'));
        }
        return $result;    
}
function customer_no($customer_no, $org_id) {      
    $result = $this->dx_auth->is_customer_no_available($customer_no, $org_id);
    if (!$result) {
        $this->form_validation->set_message('customer_no', $this->lang->line('customer_no_exists_error_msg'));
    }
    return $result;
}

function vat_no($vat_no, $org_id) {      
    $result = $this->dx_auth->is_vat_no_available($vat_no, $org_id);
    if (!$result) {
        $this->form_validation->set_message('vat_no', $this->lang->line('vat_no_exists_error_msg'));
    }
    return $result;
}

function ean_no($ean_no, $org_id) {      
    $result = $this->dx_auth->is_ean_no_available($ean_no, $org_id);
    if (!$result) {
        $this->form_validation->set_message('ean_no', $this->lang->line('ean_no_exists_error_msg'));
    }
    return $result;
}
/**
 * View organization's member types list
 *
 *@access public
 *@return organization's member types list
 */ 
    function member_types() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_types';
        $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['access_member_types']) {
            $this->data['query1'] = $this->info_model->view_all_org_member_types($data_previlize['member_org']);
            $this->data['dynamicView'] = 'pages/organization/members/member_types';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_types_no_access';
        }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}



/**
 * Load organization's member types add form
 *
 *@access public
 *@return organization's member types add form
 */ 
    function add_org_member_types() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_types';        
        $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['access_member_types']) {
            $this->data['dynamicView'] = 'pages/organization/members/member_types_add';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_types_add_no_access';
        }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * insert organization's member types into DB:adminscentral, Table: org_member_types
 *
 *@access public
 *@return Success/Error Message
 */

function add_org_member_types_process(){
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_types';

        $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['access_member_types']) {
            $org_id = $data_previlize['member_org'];
            $this->load->library('form_validation');
            $this->form_validation->set_rules('type_name', 'lang:label_type_name', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/organization/members/member_types_add';
            } else {
                    $query = $this->db->query("select type_name from  org_member_type where type_name='" . strtolower($this->input->post("type_name"))."' AND org_id ='".$org_id."' ");
                    if ($query->num_rows() > 0) {
                        $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('member_types_exists_msg').'</div>');
                        redirect('organization/info/add_org_member_types');
                    } else {
                            $to_date = date("Y-m-d H:i:s"); 
                            $data = array('type_name' => ucfirst($this->input->post('type_name')), 'org_id' => $org_id, 'add_date' => $to_date);
                            $success = $this->info_model->org_member_types_insert($data);
                            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_types_creation_success').'</div>');
                            redirect('organization/info/member_types');
                        }
              }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_types_add_no_access';
        }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');          

}


/**
 * Load organization's member types edit form
 *
 *@access public
 *@return organization's member types edit form
 */ 
function edit_org_member_types($id=NULL) {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_types';
        $data_previlize = $this->check_member_type_previlize();
        $org_id = $data_previlize['member_org'];

        if($data_previlize['access_member_types']) {
                if ($id !== NULL) {
                    $this->data['record'] = $this->info_model->get_all_org_member_types($id);
                    $this->data['dynamicView'] = 'pages/organization/members/edit_member_types';            
                }
                if (count($_POST)) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('type_name', 'lang:label_type_name', 'trim|required|xss_clean');
                    if ($this->form_validation->run() == FALSE) {
                        $this->data['dynamicView'] = 'pages/organization/members/edit_member_types';      
                    } 
                    else{
                        $query = $this->db->query("select type_name from org_member_type where ( type_name='" . strtolower($this->input->post("type_name"))."' AND mem_type_id!='" . $id."' ) AND org_id ='".$org_id."'  ");
                        if ($query->num_rows() > 0) {
                            $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('member_types_exists_msg').'</div>');
                            redirect('organization/info/edit_org_member_types/'.$id);
                        } 
                        else{
                            $data = array('type_name' => ucfirst($this->input->post('type_name')));
                            $success = $this->info_model->org_member_types_update($data,$id);
                            if($success){
                                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_types_update_success').'</div>');
                                redirect('organization/info/member_types', 'location', 301);
                            }
                        }
                    }
                }
        }
        else{
                $this->data['dynamicView'] = 'pages/organization/members/edit_member_types_no_access';      
        }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');   
    }


/**
 * Delete organization member type
 *
 *@access public
 *@return Success/Failure Message
 */ 
   public function org_member_type_delete($contentId = NULL) {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_types';
        $data_previlize = $this->check_member_type_previlize();
        $org_id = $data_previlize['member_org'];

        if($data_previlize['access_member_types']) {
            $success = $this->info_model->delete_org_member_type($contentId);
            if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_member_type_delete_success').'</div>');
            }
            redirect('organization/info/member_types', 'location', 301);
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/delete_member_types_no_access';      
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');   
}

/**
 * View organization's member groups list
 *
 *@access public
 *@return organization's member groups list
 */      
function member_groups() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_groups';
        $mem_id = $this->session->userdata('mem_id');
        $data_previlize = $this->check_member_type_previlize();        
        if($data_previlize['members_c_group']) {
            $org_id = $data_previlize['member_org'];
            $this->data['query1'] = $this->info_model->get_org_member_group($mem_id, $org_id);
            //print_r($this->data['query1']); exit;
            $this->data['dynamicView'] = 'pages/organization/members/member_groups';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');   
    }

 
 /**
 * Load organization's member groups add form
 *
 *@access public
 *@return organization's member groups add form
 */ 
    function add_member_groups() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_groups';
        $data_previlize = $this->check_member_type_previlize();        
        if($data_previlize['members_c_group']) {        
            $this->data['dynamicView'] = 'pages/organization/members/add_member_groups';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');   
}

 /**
 * organization's member groups add process
 *
 *@access public
 *@return Success/Failure message
 */ 
    function add_member_groups_process() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_groups';
        $to_date = date("Y-m-d H:i:s"); 
        $this->load->library('form_validation');
        $data_previlize = $this->check_member_type_previlize();     
        if($data_previlize['members_c_group']) {        
            $this->form_validation->set_rules('group_name', $this->lang->line('label_group_name'), 'trim|required|callback_org_group[' . $data_previlize['member_org'] . ']');
            if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/organization/members/add_member_groups';
                $this->_commonPageLayout('frontend_viewer');
            } else {
                    $data = array(
                        'group_name' => ucfirst($this->input->post("group_name")),
                        'org_id' => $data_previlize['member_org'],
                        'mem_id' => $this->session->userdata('mem_id'),
                        'add_date' => $to_date
                    );
                    // echo "<pre>";print_r($data);die();
                    $this->info_model->org_member_group_insert($data);
                    $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('org_member_group_create_success').'</div>');
                    redirect('organization/info/member_groups');
            }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer'); 
    }


/**
 * Load organization's member group edit form
 *
 *@access public
 *@return organization's member group edit form
 */ 
 
    function org_group_edit($id=NULL) {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_groups';
        $data_previlize = $this->check_member_type_previlize();     
        if($data_previlize['members_c_group']) {  
            if ($id !== NULL) {
                $this->data['record'] = $this->info_model->get_org_group($id);
                $this->data['dynamicView'] = 'pages/organization/members/edit_org_group';
            }
            if (count($_POST)) {
                //echo "hi";die();
                $val = $this->form_validation;
                $val->set_rules('org_group', $this->lang->line('label_group_name'), 'trim|required|callback_org_group12[' . $this->input->post('id') . ']');
                if ($val->run()) {
                    $data = array(
                    'group_name' => ucfirst($this->input->post("org_group"))
                    );
                    $this->info_model->org_group_update($data);
                    $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('org_member_group_edit_success').'</div>');
                    redirect('organization/info/member_groups', 'location', 301);
                }
            }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer'); 
}

/**
 * Delete organization group 
 *
 *@access public
 *@return Success/Failure Message
 */ 
    function org_group_delete($id = NULL) {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_groups';
        $data_previlize = $this->check_member_type_previlize();  
        if( $data_previlize['members_c_group']) {  
            $success = $this->info_model->org_group_delete($id);
            if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_group_delete_success').'</div>');
            }
            redirect('organization/info/member_groups', 'location', 301);
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer'); 
    }

    function org_group1($group_name, $id1, $org_id) {

        $result = $this->dx_auth->is_org_group_available($group_name, $id1, $org_id);
        if (!$result) {
            $this->form_validation->set_message('org_group', 'Group name exists.Please choose another one.');
        }

        return $result;
}



/**
 * Add member to a group for logged user's group within a organization  
 *
 *@Param $group_id which contains Group Id
 *@access Private
 *@return Success/Failure Message
 */ 
    function add_member_to_group($group_id = NULL) {        
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_groups';
        $this->data['group_id'] = $group_id;
        $data_previlize = $this->check_member_type_previlize();  
        if( $data_previlize['members_add_group']) {  
            $org_members['all_members'] = $this->info_model->get_org_active_member($data_previlize['member_org']);
            $members_assigned_to_group['assigned_member'] = $this->info_model->get_members_assigned_to_group($group_id);
            $this->data['dynamicView'] = 'pages/organization/members/add_member_to_groups';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($members_assigned_to_group);	   
        $this->load->vars($org_members);	
        $this->_commonPageLayout('frontend_viewer'); 
    }


/**
 * Update member to a group for logged user's group within a organization  
 *
 *@access Private
 *@return Success/Failure Message
 */ 
    function update_member_to_group() {
        
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_groups';
        $success = FALSE;
        $group_id = $this->input->post('group_id');
        $data_previlize = $this->check_member_type_previlize();  
        if( $data_previlize['members_add_group']) {  
            $members_assigned_to_group['assigned_member'] = $this->info_model->get_members_assigned_to_group($group_id);
            $member_ids =",". implode(",",$this->input->post('member_id')).",";
            
            if(sizeof($members_assigned_to_group['assigned_member'])> 0){
                $data['assigned_mem_id'] = $member_ids;
                $success = $this->info_model->update_org_member_assigned_group($group_id,$data);
            }else{
                $to_date = date("Y-m-d H:i:s"); 
                $data['assigned_mem_id'] = $member_ids;
                $data['group_id'] = $group_id;
                $data['add_date'] = $to_date;
                $success = $this->info_model->insert_org_member_assigned_group($data);
            }
            if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_member_added_to_group_success').'</div>');
            }
            redirect('organization/info/add_member_to_group/'.$group_id, 'location', 301);
           
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($members_assigned_to_group);	   
        $this->load->vars($org_members);	
        $this->_commonPageLayout('frontend_viewer'); 
    }
/*
    function org_group1($group_name, $id1, $org_id) {

        $result = $this->dx_auth->is_org_group_available($group_name, $id1, $org_id);
        if (!$result) {
            $this->form_validation->set_message('org_group', 'Group name exists.Please choose another one.');
        }

        return $result;
}*/


/**
 * Check mobile_no is available or not for member
 *
 *@access Private
 *@return Available/Not Available
 */ 
function mobile_no_availability(){
        $mem_id = $this->session->userdata('mem_id');
        $data_previlize = $this->check_member_type_previlize();        
        $mobile_no = $this->uri->segment(4);  
        if(!empty($mobile_no)){
            $mobile_no_info = $this->info_model->check_mobile_no($mobile_no);
            if($mobile_no_info->num_rows() > 0){
                echo "<font color='red'>".$this->lang->line('mobile_no_exists_error_msg')."</font>";
            }else{ echo "<font color='green'>".$this->lang->line('mobile_no_available_msg')."</font>"; }
        } else{ echo " "; 
        }        
        
}

/**
 * Check customer_no is available or not for member
 *
 *@access Private
 *@return Available/Not Available
 */ 
function customer_no_availability(){
        $mem_id = $this->session->userdata('mem_id');
        $data_previlize = $this->check_member_type_previlize();        
        $customer_no = $this->uri->segment(4);  
        if(!empty($customer_no)){
            $customer_no_info = $this->info_model->check_customer_no($customer_no, $data_previlize['member_org']);
            if($customer_no_info->num_rows() > 0){
                echo "<font color='red'>".$this->lang->line('customer_no_exists_error_msg')."</font>";
            }else{ echo "<font color='green'>".$this->lang->line('customer_no_available_msg')."</font>"; }
        } else{ echo "<font color='red'>".$this->lang->line('customer_no_required_msg')."</font>"; }        
        
}

/**
 * Check vat_no is available or not for member
 *
 *@access Private
 *@return Available/Not Available
 */ 
function vat_no_availability(){
        $mem_id = $this->session->userdata('mem_id');
        $data_previlize = $this->check_member_type_previlize();        
        $vat_no = $this->uri->segment(4);  
        if(!empty($vat_no)){
            $vat_no_info = $this->info_model->check_vat_no($vat_no, $data_previlize['member_org']);
            if($vat_no_info->num_rows() > 0){
                echo "<font color='red'>".$this->lang->line('vat_no_exists_error_msg')."</font>";
            }else{ echo "<font color='green'>".$this->lang->line('vat_no_available_msg')."</font>"; }
        } else{ echo " "; }        
        
}

/**
 * Check ean_no is available or not for member
 *
 *@access Private
 *@return Available/Not Available
 */ 
function ean_no_availability(){
        $mem_id = $this->session->userdata('mem_id');
        $data_previlize = $this->check_member_type_previlize();        
        $ean_no = $this->uri->segment(4);  
        if(!empty($ean_no)){
            $ean_no_info = $this->info_model->check_ean_no($ean_no, $data_previlize['member_org']);
            if($ean_no_info->num_rows() > 0){
                echo "<font color='red'>".$this->lang->line('ean_no_exists_error_msg')."</font>";
            }else{ echo "<font color='green'>".$this->lang->line('ean_no_available_msg')."</font>"; }
        } else{ echo " "; }        
        
}

/**
 * Check E-mail is available or not for member
 *
 *@access Private
 *@return Available/Not Available
 */ 
function email_availability(){
        $email = $this->uri->segment(4);   
        if(!empty($email)){
            $users_email = $this->info_model->check_email1($email);
            if($users_email->num_rows() > 0){
                echo "<font color='red'>".$this->lang->line('email_exists_error_msg')."</font>";
            }else{ echo "<font color='green'>".$this->lang->line('email_available_msg')."</font>"; }
        }else{ echo " ";
        }        
}

/**
 * Check Username is available or not for member
 *
 *@access Private
 *@return Available/Not Available
 */ 
function username_availability(){
        $username = $this->uri->segment(4);   
        if(!empty($username)) {
            $user_name = $this->info_model->check_uname($username);
            if($user_name->num_rows() > 0){
            echo "<font color='red'>".$this->lang->line('username_exists_error_msg')."</font>";
            }else{ echo "<font color='green'>".$this->lang->line('username_available_msg')."</font>"; }
        }else{ echo "<font color='red'>".$this->lang->line('username_required_msg')."</font>"; }         
       
}

/**
 * Load New member Registration Form
 *
 *@access Private
 *@return New member Registration Form
 */ 
    function create_new_member() {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';             
        $data['category_name'] = "";
        $registered_member ="";
        $this->data['expire_date_error'] = "";        
        $to_date = date("Y-m-d H:i:s"); 
        $organization_data = array();
        $organization_data['expire_date_intake'] ="";

        $mem_id = $this->session->userdata('mem_id');        
        $data_previlize = $this->check_member_type_previlize();  
        $org_id = $data_previlize['member_org'];
        if($data_previlize['create_new_member']) {    
            $org_info = $this->info_model->get_registered_customer($org_id);    
            if($org_info){
                $organization_data['org_type'] = $org_info[0]->org_type;
                $organization_data['org_number'] = $org_info[0]->org_number;
                $organization_data['org_name'] = $org_info[0]->org_name;
                //$organization_data['street_address'] = $org_info[0]->org_street_address;
                //$organization_data['zip'] = $org_info[0]->org_zip;
                //$organization_data['city'] = $org_info[0]->org_city;
                $organization_data['country'] = $org_info[0]->org_country;
                $organization_data['expire_date_intake'] =  $org_info[0]->expire_date;
            }
            
            $data_registration = array(
                    'mem_type_id' => "",
                    'customer_type' => "",
                    'first_name' => "",
                    'last_name' => "",
                    'dept_or_company_or_org_name' => "",
                    'dept_or_org_no' => "",
                    'username' => "",
                    'password' => "",
                    'email' => "",
                    'mobile_phone' => "",
                    'land_line_phone' => "",
                    'street_address' => "",
                    'zip' => "",
                    'city' => "",
                    'country' => "",
                    'member_position' => "",
                    'ssn_or_person_no' => "",
                    'gender' => "",
                    'profile_message' => "",
                    'profile_picture' => "",
                    'bank_acc_no_one' => "",
                    'bank_acc_type_one' => "",
                    'bank_acc_no_two' => "",
                    'bank_acc_type_two' => "",
                    'bank_acc_no_three' => "",
                    'bank_acc_type_three' => "",                    
                    'bank_name' => "",    
                    'password_receive_by' =>"",
                    'activation_date' =>"",
                    'member_group' =>"",
                    'expire_date' =>date("Y-m-d",$organization_data['expire_date_intake']),
                    'add_date' =>""
                   );
            $org_package_info = $this->info_model->get_package_assigned_to_org_member_info("", 'active', 'Superadmin');
            //$org_package_info = $this->info_model->get_package($this->session->userdata('package_name'));
            if($org_package_info){
                $no_of_member_limit =  $org_package_info[0]->no_of_member; 
                $total_registered_member = $this->info_model->get_total_org_registered_memebr($data_previlize['member_org']);
              
               if($total_registered_member){
                    $registered_member = $total_registered_member[0]->num_of_memebr;
                }
            }/////////////////
            // echo "total_registered_member: ".$registered_member;  exit;
            if($no_of_member_limit > $registered_member){
                $previlize_assigned['previlized_mem_type'] = $this->info_model->get_previlize_assigned_org_mem_type($data_previlize['member_org']); 
                if(sizeof($previlize_assigned['previlized_mem_type']) <= 0){
                    $this->data['dynamicView'] = 'pages/organization/members/registration_no_previlization_settings'; 
                }
                else{
                    $this->data['dynamicView'] = 'pages/organization/members/registration';    
                }
            }else{
                    $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('member_registration_limit_exceeds').'</div>');
                    redirect('organization/info/org_members');
                }
           
            }else{
                $this->data['dynamicView'] = 'pages/organization/members/registration_no_access';
            }
                $this->load->vars($data_registration);
                $this->load->vars($organization_data);
                $this->load->vars($previlize_assigned);	
                $this->load->vars($data_previlize);	
                $this->data['customer_type'] = "Government";
                $this->data['label_password_does_not_matched_error'] = "";
                $this->data['send_password'] = "send_password_now";
                $this->_commonPageLayout('frontend_viewer');
       
    }


/**
 * New member Registration Process
 *
 *@access Private
 *@return Success/Failure Message
 */  
function create_new_member_process() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';
        $expire_date = "";
        if(isset($_POST['cancel'])){
            redirect('organization/info/org_members');
        }elseif(isset($_POST['confirm']) || isset($_POST['confirm_and_create']) || isset($_POST['buy_package']) ){ 
                $this->load->library('form_validation');        
                $this->data['label_password_does_not_matched_error'] ="";
                $this->data['expire_date_error'] = "";
                $mem_id = $this->session->userdata('mem_id');
                $data_previlize = $this->check_member_type_previlize();    
                $org_id = $data_previlize['member_org'];
                $customer_type = $this->input->post("customer_type");     
                $mem_organization_info = $this->info_model->get_registered_customer($data_previlize['member_org']);
                $to_date = date("Y-m-d H:i:s"); 
                $data_registration = array(
                    'org_id' => $org_id,
                    'mem_type_id' => $this->input->post('mem_type_id'),
                    'customer_type' => $this->input->post('customer_type'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'dept_or_company_or_org_name' => "",
                    'dept_or_org_no' => "",
                    'password' => "",
                    'mobile_phone' =>$this->input->post('mobile_phone'),
                    'land_line_phone' => $this->input->post('land_line_phone'),
                    'street_address' => $this->input->post('street_address'),
                    'zip' => $this->input->post('zip'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'member_position' => "",
                    'ssn_or_person_no' => "",
                    'gender' => "",
                    'profile_message' => "",
                    'profile_picture' => "",
                    'bank_acc_no_one' => "",
                    'bank_acc_type_one' => "",
                    'bank_acc_no_two' => "",
                    'bank_acc_type_two' => "",
                    'bank_acc_no_three' => "",
                    'bank_acc_type_three' => "",                    
                    'bank_name' => "",    
                    'password_receive_by_email' =>$this->input->post("password_receive_by_email"),
                    'password_receive_by_sms' =>$this->input->post("password_receive_by_sms"),
                    'activation_date' => time(),
                    'member_group' =>"",
                    'expire_date' =>$this->input->post('expire_date'),
                    'add_date' =>""
                );           
                if($data_previlize['create_new_member']) {      
                    $org_info = $this->info_model->get_registered_customer($org_id);    
                    if($org_info){
                        $organization_data['org_type'] = $org_info[0]->org_type;
                        $organization_data['org_number'] = $org_info[0]->org_number;
                        $organization_data['org_name'] = $org_info[0]->org_name;
                        //$organization_data['street_address'] = $org_info[0]->org_street_address;
                        //$organization_data['zip'] = $org_info[0]->org_zip;
                        //$organization_data['city'] = $org_info[0]->org_city;
                        $organization_data['country'] = $org_info[0]->org_country;
                        $organization_data['expire_date_intake'] =  $org_info[0]->expire_date;
                    }
                    /////////////////////////  2014-04-15 //////////////////////////////
                    $send_password  =  $this->input->post("send_password");
                    if($send_password=="create_password_now"){ 
                        $password  =  $this->input->post("password");
                        $retype_password  =  $this->input->post("retype_password");
                        $data_registration['password'] = $password;
                        $this->form_validation->set_rules('password', $this->lang->line('label_password'), 'trim|required');
                        $this->form_validation->set_rules('retype_password', $this->lang->line('label_retype_password'), 'trim|required');
                        if(!empty($password) && !empty($retype_password)){
                            if($password!=$retype_password){ 
                                $this->data['label_password_does_not_matched_error'] = $this->lang->line('label_password_does_not_matched_error');
                            }
                        }
                    }
                    if($customer_type=="Private person"){
                        $data_registration['ssn_or_person_no']  =  $this->input->post("ssn_or_person_no");
                        // $this->form_validation->set_rules('ssn_or_person_no', $this->lang->line('label_ssn_person_no'), 'trim|required|callback_check_person_number1');
                    }else{
                        $data_registration['dept_or_company_or_org_name'] =  $this->input->post("dept_or_company_or_org_name");
                        $data_registration['dept_or_org_no']  =  $this->input->post("dept_or_org_no");
                        $data_registration['member_position']  =  $this->input->post("member_position");
                        // if($customer_type=="Government"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_department_name'), 'trim|required'); }
                        // if($customer_type=="Company"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_company_name'), 'trim|required'); }
                        // if($customer_type=="Organization"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_organization_name'), 'trim|required'); }
                    }        
                     
                    ////////////////////////  2014-04-15 //////////////////////////////
                    $previlize_assigned['previlized_mem_type'] = $this->info_model->get_previlize_assigned_org_mem_type($data_previlize['member_org']); 
                    $this->form_validation->set_rules('first_name', $this->lang->line('label_first_name'), 'trim|required|xss_clean');
                    $this->form_validation->set_rules('last_name', $this->lang->line('label_last_name'), 'trim|required|xss_clean');
                    $this->form_validation->set_rules('email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_email_check');
                    $this->form_validation->set_rules('username',$this->lang->line('label_username'), 'trim|required|xss_clean|callback_login_username_check');
                    // $this->form_validation->set_rules('person_number', $this->lang->line('label_ssn_person_no'), 'trim|required|xss_clean|callback_check_person_number1');
                    $this->form_validation->set_rules('mem_type_id', $this->lang->line('label_member_type'), 'trim|required|xss_clean');
                    $this->form_validation->set_rules('expire_date', $this->lang->line('label_membership_ends'), 'trim|required|xss_clean');
                    if(empty($data_registration['password_receive_by_email']) && empty($data_registration['password_receive_by_sms'])){
                       $this->form_validation->set_rules('password_receive_by_sms', $this->lang->line('label_password_receive_by'), 'trim|required|xss_clean');
                    }
                    //$this->form_validation->set_rules('password', $this->lang->line('label_password'), 'trim|required|xss_clean|min_length[10]|');  
                    if($this->input->post('expire_date')){
                        $expire_date = explode("-",$this->input->post('expire_date'));
                        $expire_date = mktime(0, 0, 0, ($expire_date[1]), $expire_date[2], $expire_date[0]);                       
                        if($organization_data['expire_date_intake'] < $expire_date ){
                            $this->data['expire_date_error'] = $this->lang->line('membership_ends_date_error');
                            $this->data['expire_date'] =date("Y-m-d", $organization_data['expire_date_intake']);
                        }   
                    }                  
                    if ($this->form_validation->run() == FALSE || $this->data['label_password_does_not_matched_error'] || $this->data['expire_date_error']) {     
                        $this->data['send_password'] = $send_password;
                        $this->data['dynamicView'] = 'pages/organization/members/registration';    
                    }
                    else{                             
                        //////////////////////// 2014-04-15 //////////////////////
                        $password =  $data_registration['password']; 
                        if(empty($password)){
                            $first_name = $data_registration['first_name'];
                            $rand_no = mt_rand(1000000000, 2000000000);
                            $first_name = substr($first_name, 0, 2);
                            $password = $first_name . $rand_no;
                        }
                        $password2 = $this->encrypt($password,'vaccitvassit');
                        $data_registration['password'] = $password2;
                        /////////////////////// 2014-04-15 //////////////////////
                        //$total_days = $this->input->post('membership_duration') * 30;
                        //$expire_date= time() + ($total_days * 24 * 60 * 60);
                        $data_registration['expire_date'] = $expire_date;
                        
                        ///////////////////////// 2014-04-15 //////////////////////
                       if(isset($_POST['buy_package'])){
                            $data['package_data'] = $this->info_model->get_active_package($id="");
                            $this->data['password'] = $password;
                            $member_data['data_registration'] = $data_registration;
                            //print_r($member_data['data_registration']); exit;
                            $this->load->vars($data);      
                            $this->load->vars($member_data);      
                            $this->data['dynamicView'] = 'pages/organization/members/package_selection';  
                       }
                       elseif(isset($_POST['confirm']) || isset($_POST['confirm_and_create'])  ){
                            //////////////////////// 2014-04-15 //////////////////////
                            //$data_registration['activation_date'] = time();
                            //$data_registration['blocked'] = 0;
                            $success = $this->info_model->org_member_registration($data_registration);
                            if($success){          
                                if($mem_organization_info){
                                    $data_registration['org_number'] = $mem_organization_info[0]->org_number;
                                    $data_registration['org_name'] = $mem_organization_info[0]->org_name;
                                    $data_registration['admin_email'] = $mem_organization_info[0]->email;
                                    $data_registration['password'] = $password;
                                }
                               // $this->send_password_by_email($data_registration);
                                if($data_registration['password_receive_by_email']){                                             
                                    $this->send_password_by_email($data_registration);
                                }
                                if($data_registration['password_receive_by_sms']){
                                    $this->send_password_by_sms($data_registration);
                                }                                                     
                                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_registration_success').'</div>');
                            }
                            else{
                                $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('member_registration_failure').'</div>');
                            }
                            if( isset($_POST['confirm']) ){
                                redirect('organization/info/org_members');
                            }elseif( isset($_POST['confirm_and_create'])  ){
                                redirect('organization/info/create_new_member');
                            }
                        }
                    }
                }
                else{
                    $this->data['dynamicView'] = 'pages/organization/members/registration_no_access';
                }
                $this->load->vars($data_previlize);
                $this->load->vars($previlize_assigned);	
                $this->load->vars($data_registration);	  
                $this->load->vars($organization_data);                
                $this->_commonPageLayout('frontend_viewer'); 
    }
}

/**
 * Buy Package for member
 *
 *@access Private
 *@return Success/Failure Message
 */
function buy_package_for_member(){
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';
        $mem_id = $this->session->userdata('mem_id');
        $data_previlize = $this->check_member_type_previlize();    
        $org_id = $data_previlize['member_org'];
        $customer_type = $this->input->post("customer_type");     
        if($data_previlize['create_new_member']) {      
        $package_name = $this->input->post('package_name');
        $this->data['package_id'] = $this->input->post('package_id');
        $this->data['password'] = $this->input->post('password');
        $member_data['data_registration'] = $this->input->post('data_registration');
       
        $billing_address['billing_terms_condition'] = "";
        $billing_address['bill_first_name'] = $member_data['data_registration']['first_name'];
        $billing_address['bill_last_name'] = $member_data['data_registration']['last_name'];
        $billing_address['bill_mobile_phone'] = $member_data['data_registration']['mobile_phone'];
        $billing_address['bill_email'] = $member_data['data_registration']['email'];
        $billing_address['bill_street_address'] = $member_data['data_registration']['street_address'];
        $billing_address['bill_zip'] = $member_data['data_registration']['zip'];
        $billing_address['bill_city'] = $member_data['data_registration']['city'];
        $billing_address['bill_country'] = $member_data['data_registration']['country'];
       // print_r($billing_address); exit;
        /*$billing_address_one['billing_address'] = $billing_address;
        $this->load->vars($billing_address_one);*/
        
        $this->load->library('form_validation');    
        $basic_package_selection = array();
        $basic_package_selection['billing_module_cost'] = ""; 
        $basic_package_selection['letter_module_cost'] = ""; 
        $basic_package_selection['sms_module_cost'] = ""; 
        $basic_package_selection['member_fee_module_cost'] = "";          
        $this->data['package_data'] = $this->info_model->get_active_package($this->data['package_id']);
            if($package_name=="Basic"){    
                $basic_package_selection['billing_module_cost'] = $this->input->post("billing_module_cost"); 
                $basic_package_selection['letter_module_cost'] = $this->input->post("letter_module_cost"); 
                $basic_package_selection['sms_module_cost'] = $this->input->post("sms_module_cost"); 
                $basic_package_selection['member_fee_module_cost'] = $this->input->post("member_fee_module_cost");           
                if(empty($basic_package_selection['billing_module_cost']) && empty($basic_package_selection['letter_module_cost']) && empty($basic_package_selection['sms_module_cost']) && empty($basic_package_selection['member_fee_module_cost'])){
                    $this->form_validation->set_rules('billing_module_cost', $this->lang->line('label_module_can_not_empty'), 'trim|required|xss_clean');
                    if($this->form_validation->run() == FALSE) { 
                        $data['package_data'] = $this->info_model->get_active_package($id="");
                        $this->load->vars($data);  
                        $this->load->vars($member_data);      
                        $this->data['dynamicView'] = 'pages/organization/members/package_selection';  
                        $this->_commonPageLayout('frontend_viewer');
                    }
                }else{
                        $basic_package_selection_one['basic_package_selection'] = $basic_package_selection;        
                        $this->load->vars($member_data); 
                        $this->load->vars($basic_package_selection_one);      
                        $this->data['dynamicView'] = 'pages/organization/members/package_summary';  
                    }
            }     
         else{
                    $basic_package_selection_one['basic_package_selection'] = $basic_package_selection;        
                    $this->load->vars($member_data);  
                    $this->load->vars($basic_package_selection_one);      
                    $this->data['dynamicView'] = 'pages/organization/members/package_summary';  
                }   
            }    else{
                    $this->data['dynamicView'] = 'pages/organization/members/registration_no_access';
            }
            
             $error_credit_card = array();             
            $error_credit_card['credit_card_type_unknown_error'] ="";
            $error_credit_card['credit_card_no_error'] ="";
            $error_credit_card['credit_card_cvv2_wrong_error'] = "";
            $error_credit_card['credit_card_expired_error'] = "";
            $payment_method = "invoice";
            $this->load->vars($error_credit_card);   
            $this->data['payment_method'] = $payment_method;
            
                
                $this->load->vars($billing_address);
                $this->load->vars($data_previlize);
                $this->_commonPageLayout('frontend_viewer'); 
}
/**
 * Buy Package for member
 *
 *@access Private
 *@return Success/Failure Message
 */
function confirm_package_for_member(){
    $this->data['mainTab'] = 'members';
    $this->data['activeTab'] = 'members';
    
     if(isset($_POST['cancel'])){
            redirect('organization/info/org_members');
    }elseif(isset($_POST['confirm']) || isset($_POST['confirm_and_create'])  ){   
        $mem_id = $this->session->userdata('mem_id');
        $data_previlize = $this->check_member_type_previlize();    
        $org_id = $data_previlize['member_org'];
        $customer_type = $this->input->post("customer_type");     
        if($data_previlize['create_new_member']) {   
            $to_date = date("Y-m-d H:i:s"); 
            $this->data['package_id'] = $this->input->post('package_id');
            $this->data['password'] = $this->input->post('password');
            $mem_organization_info = $this->info_model->get_registered_customer($org_id);
            $this->data['package_data'] = $this->info_model->get_active_package($this->data['package_id']);
            $data_registration = $this->input->post('data_registration');      
            //print_r($data_registration); exit;
            $member_data['data_registration'] = $data_registration;
            

            $assigned_package_data = array();            
            $basic_package_selection = array();
            $basic_package_selection['billing_module_cost'] = ""; 
            $basic_package_selection['letter_module_cost'] = ""; 
            $basic_package_selection['sms_module_cost'] = ""; 
            $basic_package_selection['member_fee_module_cost'] = "";       
            $basic_package_selection = $this->input->post("basic_package_selection");    
            $basic_package_selection_two['basic_package_selection'] = $basic_package_selection;  
            $card_info['credit_card_no']    = $this->input->post("credit_card_no");
            $card_info['credit_card_type'] = $this->input->post("credit_card_type");
            $card_info['credit_card_verification_code'] = $this->input->post("credit_card_verification_code");
            $card_info['card_expire_date_month'] = $this->input->post("card_expire_date_month");
            $card_info['card_expire_date_year'] = $this->input->post("card_expire_date_year");        
          
            $form_data_step4 = array(
                    'org_id' => $org_id,
                    'payment_method' => $this->input->post("payment_method"),
                    'bill_first_name' => $this->input->post("bill_first_name"),
                    'bill_last_name' => $this->input->post("bill_last_name"),
                    'bill_mobile_phone' => $this->input->post("bill_mobile_phone"),
                    'bill_email' => $this->input->post("bill_email"),
                    'bill_street_address' => $this->input->post("bill_street_address"),
                    'bill_zip' => $this->input->post("bill_zip"),
                    'bill_city' => $this->input->post("bill_city"),
                    'bill_country' => $this->input->post("bill_country"),
                    'billing_terms_condition' => $this->input->post("billing_terms_condition"),
                    'credit_card_no' => '',
                    'credit_card_type' => '',
                    'credit_card_verification_code' => '',
                    'credit_card_expire_month' => '',
                    'credit_card_expire_year' => '',   
                    'name_on_credit_card' => '',       
                    'add_date' =>$to_date
                   );                 
                           //Start Validate Credit Card Info      
                $cardErrorNo = -1; //NO card error, card is valid
                $payment_method = $this->input->post("payment_method");
                
                if($payment_method=="creditcard"){                    
                    $form_data_step4['credit_card_no'] =  $this->input->post("credit_card_no");
                    $form_data_step4['credit_card_type'] =  $this->input->post("credit_card_type");
                    $form_data_step4['credit_card_verification_code'] =  $this->input->post("credit_card_verification_code");
                    $form_data_step4['credit_card_expire_month'] =  $this->input->post("credit_card_expire_month");
                    $form_data_step4['credit_card_expire_year'] =  $this->input->post("credit_card_expire_year");
                    $form_data_step4['name_on_credit_card'] =  $this->input->post("name_on_credit_card");
                    $this->form_validation->set_rules('name_on_credit_card',$this->lang->line('label_name_on_card'), 'trim|required');
                    if(checkCreditCard($card_info, $errornumber, $errortext))
                    {
                        //$errortext = 'This card has a valid format';
                        //echo 'card OK';
                    }
                    else
                    {
                        $cardErrorNo  = $errornumber;  
                    }
                }
        //End Validate Credit Card Info
                $data_billing_address['billing_address_data'] = $form_data_step4;
                $this->load->vars($form_data_step4);
                //print_r($form_data_step4); exit;
                $this->load->vars($basic_package_selection_two);     
                $this->form_validation->set_rules('bill_first_name', $this->lang->line('label_first_name'), 'trim|required');
                $this->form_validation->set_rules('bill_last_name',$this->lang->line('label_last_name'), 'trim|required');
                $this->form_validation->set_rules('bill_mobile_phone', $this->lang->line('label_mobile_phone'), 'trim|required');
                $this->form_validation->set_rules('bill_email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean');
                $this->form_validation->set_rules('bill_street_address', $this->lang->line('label_street_address'), 'trim|required|xss_clean');
                $this->form_validation->set_rules('bill_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
                $this->form_validation->set_rules('bill_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
                $this->form_validation->set_rules('bill_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
                //$this->form_validation->set_message('required', $this->lang->line('label_billing_terms_condition'));
                $this->form_validation->set_rules('billing_terms_condition', $this->lang->line('label_billing_terms_condition'), 'trim|xss_clean|callback_billing_terms_condition_check');
                if ($this->form_validation->run() == FALSE || $cardErrorNo!=-1) {
                $error_credit_card = array();
                $error_credit_card['credit_card_type_unknown_error'] ="";
                $error_credit_card['credit_card_no_error'] ="";
                $error_credit_card['credit_card_cvv2_wrong_error'] = "";
                $error_credit_card['credit_card_expired_error'] = "";
            
                switch($cardErrorNo){
                    case 0:
                        $error_credit_card['credit_card_type_unknown_error'] = $this->lang->line('credit_card_type_unknown_error');
                        break;
                    case 1:
                        $error_credit_card['credit_card_no_error'] = $this->lang->line('credit_card_empty_error');
                        break;
                    case 2:
                        $error_credit_card['credit_card_no_error'] = $this->lang->line('credit_card_no_format_invalid_error');
                        break;
                    case 3:
                        $error_credit_card['credit_card_no_error'] = $this->lang->line('credit_card_no_invalid_error');
                        break;
                    case 4:
                        $error_credit_card['credit_card_no_error'] = $this->lang->line('credit_card_no_length_wrong_error');
                        break;
                    case 5:
                        $error_credit_card['credit_card_cvv2_wrong_error'] = $this->lang->line('credit_card_cvv2_wrong_error');
                        break;
                    case 6:
                        $error_credit_card['credit_card_expired_error'] = $this->lang->line('credit_card_expired_error');
                        break;
                }
               
                $this->data['payment_method'] = $payment_method;
                $this->load->vars($error_credit_card);  
                //$this->load->vars($form_data_billing);  
                $this->load->vars($member_data); 
                $this->load->vars($basic_package_selection_two);      
                $this->data['dynamicView'] = 'pages/organization/members/package_summary';  
                $this->_commonPageLayout('frontend_viewer');
            } else {
                ///Organization Registration Final Step
                $last_insert_ids = $this->info_model->org_member_registration($data_registration);
                //$last_insert_ids = $this->info_model->register_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4);
                //$this->load->vars($form_data_step3);
                if($last_insert_ids){
                    $mem_id = $last_insert_ids;
                    $form_data_step4['mem_id'] = $mem_id;
                    $upgrade_org_billing = $this->info_model->upgrade_billing_info($form_data_step4);

                    ////////////////// Payment Method: Start ////////////
                        //$token = urlencode("token_from_setExpressCheckout");
                        //$package_id = $data_organization['organization_data']['package_name'];        
                        //print_r($basic_package_selection); //$assigned_package_data;                     
                        $data['package_info'] = $this->info_model->get_package($this->data['package_id'] );
                        if($data['package_info']){
                            $used_module = array();
                            $used_module_price = array();
                            $amount = 0.00;
                            $index = 0; 
                            foreach($data['package_info'] as $rows){
                                $currency_info = $this->info_model->get_currency($rows->currency_id);
                                $assigned_package_data['package_name'] = $rows->package_name;                               
                                $assigned_package_data['org_id'] = $org_id;
                                $assigned_package_data['mem_id'] = $mem_id;
                                $assigned_package_data['package_id'] = $this->data['package_id'];
                                $assigned_package_data['no_of_member'] = $rows->no_of_member;
                                $assigned_package_data['duration'] = $rows->duration;
                                $assigned_package_data['billing_module_cost'] = $rows->billing_module_cost;
                                $assigned_package_data['letter_module_cost'] = $rows->letter_module_cost;
                                $assigned_package_data['sms_module_cost'] = $rows->sms_module_cost;
                                $assigned_package_data['member_fee_module_cost'] = $rows->member_fee_module_cost;
                                $assigned_package_data['full_package_cost'] = $rows->full_package_cost;
                                $assigned_package_data['per_sms_cost'] = $rows->per_sms_cost;  
                                $assigned_package_data['per_letter_cost'] = $rows->per_letter_cost;
                                $assigned_package_data['allowed_sms_per_month'] = $rows->allowed_sms_per_month;
                                $assigned_package_data['allowed_letter_per_month'] = $rows->allowed_letter_per_month;
                                $assigned_package_data['per_invoice_cost'] = $rows->per_invoice_cost;
                                $assigned_package_data['admin_cost'] = $rows->admin_cost;          
                                
                                 if($assigned_package_data['package_name']=="Basic" && sizeof($basic_package_selection) > 0 ){
                                    if($basic_package_selection['billing_module_cost']){
                                        $amount = $amount + $assigned_package_data['billing_module_cost'];
                                        $used_module[$index] = 'billing_module_cost';             
                                        $used_module_price[$this->lang->line('label_billing_module_cost')] = $assigned_package_data['billing_module_cost'];
                                        $index++;
                                    }
                                    if($basic_package_selection['letter_module_cost']){
                                        $amount = $amount + $assigned_package_data['letter_module_cost'];
                                        $used_module[$index] = 'letter_module_cost';          
                                        $used_module_price[$this->lang->line('label_letter_module_cost')] = $assigned_package_data['letter_module_cost'];
                                        $index++;
                                    }
                                    if($basic_package_selection['sms_module_cost']){
                                        $amount = $amount + $assigned_package_data['sms_module_cost'];
                                        $used_module[$index] = 'sms_module_cost';      
                                        $used_module_price[$this->lang->line('label_sms_module_cost')] = $assigned_package_data['sms_module_cost'];
                                        $index++;
                                    }
                                    if($basic_package_selection['member_fee_module_cost']){
                                        $amount = $amount + $assigned_package_data['member_fee_module_cost'];
                                        $used_module[$index] = 'member_fee_module_cost';   
                                        $used_module_price[$this->lang->line('label_member_fee_module_cost')] = $assigned_package_data['member_fee_module_cost'];
                                        $index++;
                                    }
                                    $assigned_package_data['used_module'] = implode("|", $used_module);
                                }else{ 
                                    if($assigned_package_data['package_name']=="Premium"){
                                        $amount = $amount + $assigned_package_data['full_package_cost'];
                                        $assigned_package_data['used_module'] = $assigned_package_data['package_name']; 
                                        $used_module_price[$assigned_package_data['package_name']] = $assigned_package_data['full_package_cost'];
                                    }elseif($assigned_package_data['package_name']=="Free Tier"){
                                        $amount = $amount + $assigned_package_data['full_package_cost'];
                                        $assigned_package_data['used_module'] = $assigned_package_data['package_name']; 
                                        $used_module_price[$assigned_package_data['package_name']] = $assigned_package_data['full_package_cost'];
                                    }
                                }                  
                                if($currency_info){
                                    foreach($currency_info as $currency){
                                        $assigned_package_data['currency_name']  = $currency->currency_name;
                                        ///$assigned_package_data['currency_name'] = $rows->currency_id;               
                                    }                                
                                    $package_details ="Package: ".$assigned_package_data['package_name']."_".$this->data['package_id'];      
                                }
                            }
                }                
                //echo $package_details; exit;
                    $assigned_package_success_insert_id = $this->info_model->package_assigned_to_org_member_insert($assigned_package_data);
                    ////////////////// Payment Method: Start ////////////                    
                    if($payment_method=="creditcard"){
                        //$token = urlencode("token_from_setExpressCheckout");
                        $TOTALBILLINGCYCLES = urlencode($assigned_package_data['duration']);
                        if($assigned_package_data['duration'] >12){$TOTALBILLINGCYCLES = urlencode("12");} // combination of this and billingPeriod must be at most a year
                        $bill_start_date_mins = date("i"); 
                        $bill_start_date = date("Y-m-d")."T".date("H").":".$bill_start_date_mins.":".date("s");                         
                        $payment_per_cycle = $amount;                        
                        $paymentAmount = urlencode($payment_per_cycle);
                        $currencyID = urlencode($assigned_package_data['currency_name']);	// or other currency code ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')
                        $startDate = str_replace("%3A",":",urlencode($bill_start_date));
                        $billingPeriod = urlencode("Month");				// or "Day", "Week", "SemiMonth", "Year"
                        $billingFreq = urlencode("1");						// combination of this and billingPeriod must be at most a year
                        //$TOTALBILLINGCYCLES = urlencode($duration);						// combination of this and billingPeriod must be at most a year
                        
                        //$TOTALBILLINGCYCLES = urlencode("12");						// combination of this and billingPeriod must be at most a year
                        $DESC = urlencode($package_details);
                        $creditCardType = urlencode($card_info['credit_card_type']);
                        $creditCardAccount = urlencode(str_replace (' ', '', $card_info['credit_card_no']));
                        //$creditCardAccount = urlencode("4779297617944965");
                        $cardExpireDate = urlencode($card_info['card_expire_date_month'].$card_info['card_expire_date_year']);
                        $cardCvv2 = urlencode($card_info['credit_card_verification_code']);
                        $PAYERSTATUS = urlencode("verified");
                        $STREET = urlencode($form_data_step4['bill_street_address']);
                        $CITY = urlencode($form_data_step4['bill_city']);
                        $STATE = "";
                        $COUNTRYCODE = urlencode($form_data_step4['bill_country']);
                        $ZIP = urlencode($form_data_step4['bill_zip']);
                        $FIRSTNAME = urlencode($form_data_step4['bill_first_name']);
                        $LASTNAME = urlencode($form_data_step4['bill_last_name']);
                        $EMAIL= urlencode($form_data_step4['bill_email']);
                        $INITAMT = urlencode("0.00");
                        $FAILEDINITAMTACTION = urlencode("ContinueOnFailure");
                        $MAXFAILEDPAYMENTS = urlencode("10");
                        $ITEMCATEGORY0 = urlencode("Digital");
                        $ITEMNAME0 = urlencode($package_details);
                        $ITEMAMT0 = urlencode($amount);
                        $ITEMQTY0 = urlencode("1");
                        $AUTOBILLOUTAMT = urlencode("AddToNextBilling");
                        $TAXAMT = $amount*(25/100); /// Tax_rate = 25%
                        $EMAIL  = $form_data_step4['bill_email'];
                        
                        $nvpStr="&AMT=$paymentAmount&CURRENCYCODE=$currencyID&PROFILESTARTDATE=$startDate";
                        $nvpStr .= "&BILLINGPERIOD=$billingPeriod&BILLINGFREQUENCY=$billingFreq&TOTALBILLINGCYCLES=$TOTALBILLINGCYCLES&DESC=$DESC&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardAccount&EXPDATE=$cardExpireDate&CVV2=$cardCvv2&PAYERSTATUS=$PAYERSTATUS&STREET=$STREET
                        &CITY=$CITY&COUNTRYCODE=$COUNTRYCODE&ZIP=$ZIP&FIRSTNAME=$FIRSTNAME&LASTNAME=$LASTNAME&EMAIL=$EMAIL
                        &INITAMT=$INITAMT&TAXAMT=$TAXAMT&FAILEDINITAMTACTION=$FAILEDINITAMTACTION&MAXFAILEDPAYMENTS=$MAXFAILEDPAYMENTS
                        &L_PAYMENTREQUEST_0_ITEMCATEGORY0=$ITEMCATEGORY0&L_PAYMENTREQUEST_0_NAME0=$ITEMNAME0
                        &L_PAYMENTREQUEST_0_AMT0=$ITEMAMT0&L_PAYMENTREQUEST_0_QTY0=$ITEMQTY0&AUTOBILLOUTAMT=$AUTOBILLOUTAMT";

                        $httpParsedResponseAr = PPHttpPost('CreateRecurringPaymentsProfile', $nvpStr);

                        if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                                
                                $data_payment_success['org_id'] = $org_id;
                                $data_payment_success['mem_id'] = $mem_id;
                                //$data_payment_success['org_billing_info_id'] = $last_insert_ids['org_billing_info_id'];
                                $data_payment_success['profileid'] = str_replace ('%2d', '-', $httpParsedResponseAr['PROFILEID']);
                                $data_payment_success['profilestatus'] = $httpParsedResponseAr['PROFILESTATUS'];
                                //$data_payment_success['transactionid'] = $httpParsedResponseAr['TRANSACTIONID'];
                                $data_payment_success['timestamp'] = str_replace ('%2d', '-', $httpParsedResponseAr['TIMESTAMP']);
                                $data_payment_success['timestamp'] = str_replace ('%3a', ':', $data_payment_success['timestamp']);
                                $data_payment_success['correlationid'] = $httpParsedResponseAr['CORRELATIONID'];
                                $data_payment_success['ack'] = $httpParsedResponseAr['ACK'];
                                $data_payment_success['total_billing_cycle'] = $TOTALBILLINGCYCLES;
                                $data_payment_success['add_date'] = $to_date;

                                //Start : Update Organization Info Based on Successful Payment
                                    $nvpStr="&PROFILEID=".$data_payment_success['profileid'];
                                    $recurringPaymentProfileDetails = getRecurringPaymentProfileDetails('GetRecurringPaymentsProfileDetails', $nvpStr);
                                    //print_r($recurringPaymentProfileDetails); exit;

                                    if("SUCCESS" == strtoupper($recurringPaymentProfileDetails["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($recurringPaymentProfileDetails["ACK"])) {
                                        $org_billing_success_insert_id = $this->info_model->org_billing_success_insert($data_payment_success);
                                        if($org_billing_success_insert_id){
                                            $data_org_billing_info['bill_profileid'] = $data_payment_success['profileid'];                                        
                                            $data_org_billing_info['active'] = 1;                                        
                                            $payment_method = "creditcard";
                                            $org_billing_info_id = $last_insert_ids['org_billing_info_id'];
                                            $success = $this->info_model->update_org_billing_info($data_org_billing_info,$payment_method,$org_billing_info_id);                                        
                                        }                                
                                       if($recurringPaymentProfileDetails['NUMCYCLESCOMPLETED']>0){                                                                                        
                                                $data_org_billing_success['next_scheduled_billing_date'] = str_replace ('%2d', '-', $recurringPaymentProfileDetails['NEXTBILLINGDATE']);
                                                $data_org_billing_success['next_scheduled_billing_date'] = str_replace ('%3a', ':', $data_org_billing_success['next_scheduled_billing_date']);
                                                $data_org_billing_success['no_of_billing_cycle_completed'] = 1;
                                                $data_org_billing_success['no_of_billing_cycle_remaining'] = $TOTALBILLINGCYCLES-1;
                                                $data_org_billing_success['current_outstanding_balance'] = str_replace ('%2e', '.',$recurringPaymentProfileDetails['OUTSTANDINGBALANCE']);
                                                $data_org_billing_success['amount_of_last_successful_payment'] = str_replace ('%2e', '.',$recurringPaymentProfileDetails['LASTPAYMENTAMT']);
                                                $data_org_billing_success['total_paid_amount'] = "total_paid_amount+".$data_org_billing_success['amount_of_last_successful_payment'];
                                                $data_org_billing_success['date_of_last_successful_payment'] = str_replace ('%2d', '-', $recurringPaymentProfileDetails['LASTPAYMENTDATE']);
                                                $data_org_billing_success['date_of_last_successful_payment'] = str_replace ('%3a', ':',  $data_org_billing_success['date_of_last_successful_payment']);
                                                $success = $this->info_model->update_org_billing_success($data_org_billing_success,$org_billing_success_insert_id);
                                                
                                                $total_days = $assigned_package_data['duration']*30;                                
                                                $expire_date= time() + ($total_days * 24 * 60 * 60);
                                                $activation_date =  time(); 
                                                //$data_update = array('approval_status' =>1, 'payment_status' =>1,'activation_date'=>$activation_date,'expire_date'=>$expire_date);     
                                                //$success = $this->info_model->update_org_approve($data_update, $last_insert_ids['org_id']);  
                                                if($expire_date > $data_registration['expire_date'] ){
                                                    $data_update_member = array('expire_date'=>$expire_date);     
                                                    $success = $this->info_model->update_member($data_update_member, $mem_id); 
                                                }                                  
                                                $update_assigned_package = array('activation_date'=>$activation_date,'expire_date'=>$expire_date,'active' => 1);
                                                $success = $this->info_model->update_package_assigned_to_org_member($update_assigned_package, $assigned_package_success_insert_id);   
                                                if($success){                                                    
                                                    /*if($mem_organization_info){
                                                        $data_registration['org_number'] = $mem_organization_info[0]->org_number;
                                                        $data_registration['org_name'] = $mem_organization_info[0]->org_name;
                                                        $data_registration['admin_email'] = $mem_organization_info[0]->email;
                                                        $data_registration['password'] = $this->data['password'];
                                                    }*/
                                                    // $this->send_password_by_email($data_registration);
                                                    /*if($data_registration['password_receive_by_email']){                                             
                                                        $this->send_password_by_email($data_registration);
                                                    }
                                                    if($data_registration['password_receive_by_sms']){
                                                        $this->send_password_by_sms($data_registration);
                                                    } */ 
                                                }                                             
                                                ///////
                                        }else{ $data_org_billing_success['no_of_billing_cycle_remaining'] = $TOTALBILLINGCYCLES;
                                                    $success = $this->info_model->update_org_billing_success($data_org_billing_success,$org_billing_success_insert_id);
                                                }
                                        //exit('GetTransactionDetails Completed Successfully: '.print_r($recurringPaymentProfileDetails, true));
                                    } else  {
                                                       //exit('GetTransactionDetails failed: ' . print_r($recurringPaymentProfileDetails, true));
                                    }
                                     
                                //End : Update Organization Info Based on Successful Payment

                        //exit('CreateRecurringPaymentsProfile Completed Successfully: '.print_r($httpParsedResponseAr, true));
                        }  else  {
                                $data_payment_failure['org_id'] = $org_id;
                                $data_payment_failure['mem_id'] = $mem_id;
                                $data_payment_failure['org_bill_id'] = $last_insert_ids['org_billing_info_id'];
                                $data_payment_failure['l_errodcode0'] = $httpParsedResponseAr['L_ERRORCODE0'];
                                $data_payment_failure['l_shortmessage0'] = str_replace ('%20', ' ', $httpParsedResponseAr['L_SHORTMESSAGE0']);
                                $data_payment_failure['l_longmessage0'] = str_replace ('%20', ' ', $httpParsedResponseAr['L_LONGMESSAGE0']);
                                $data_payment_failure['l_severitycode0'] = $httpParsedResponseAr['L_SEVERITYCODE0'];
                                $data_payment_failure['timestamp'] = str_replace ('%2d', '-', $httpParsedResponseAr['TIMESTAMP']);
                                $data_payment_failure['timestamp'] = str_replace ('%3a', ':', $data_payment_failure['timestamp']);
                                $data_payment_failure['correlationid'] = $httpParsedResponseAr['CORRELATIONID'];
                                $data_payment_failure['ack'] = $httpParsedResponseAr['ACK'];
                                $data_payment_failure['add_date'] = $to_date;
                                $success = $this->info_model->org_billing_failure_insert($data_payment_failure);
                        //exit('CreateRecurringPaymentsProfile failed: ' . print_r($httpParsedResponseAr, true));                        
                        }
                    }                        
                    elseif($payment_method=="invoice"){      
                    if($mem_organization_info){
                        $organization_data['org_number'] = $mem_organization_info[0]->org_number;
                        $organization_data['org_name'] = $mem_organization_info[0]->org_name;
                        $organization_data['admin_email'] = $mem_organization_info[0]->email;
                        $organization_data['first_name'] = $mem_organization_info[0]->first_name;
                        $organization_data['last_name'] = $mem_organization_info[0]->last_name;
                        $organization_data['org_mobile_phone'] = $mem_organization_info[0]->org_mobile_phone;
                    }
                    //$fak_expire_date = time() + ($total_days * 24 * 60 * 60);                    
                    $data_faktura['bill_country'] = $form_data_step4['bill_country'];
                    if($data_faktura['bill_country']=="DEU"){$data_faktura['bill_country'] = "GERMAN";}
                    if($data_faktura['bill_country']=="NOR"){$data_faktura['bill_country'] = "NORWAY";}
                    if($data_faktura['bill_country']=="DNK"){$data_faktura['bill_country'] = "DENMARK";}
                    if($data_faktura['bill_country']=="FIN"){$data_faktura['bill_country'] = "FINLAND";}
                    if($data_faktura['bill_country']=="GBR"){$data_faktura['bill_country'] = "UK";}
                    if($data_faktura['bill_country']=="SWE"){$data_faktura['bill_country'] = "SWEDEN";} 
                    $data_faktura['org_id'] = $org_id;
                    $data_faktura['mem_id'] = $mem_id;
                    $data_faktura['package_assigned_id'] = $assigned_package_success_insert_id;
                    $data_faktura['fak_active_date'] = time();
                    $data_faktura['fak_expire_date'] = time() + (10 * 24 * 60 * 60);
                    $data_faktura['org_name'] = $organization_data['org_name'];
                    $data_faktura['org_number'] = $organization_data['org_number'];    
                    $data_faktura['bill_street_address'] = $form_data_step4['bill_street_address'];
                    $data_faktura['bill_zip'] = $form_data_step4['bill_zip'];
                    $data_faktura['bill_city'] = $form_data_step4['bill_city'];                    
                    $data_faktura['bill_mobile_phone'] = $form_data_step4['bill_mobile_phone'];
                    $data_faktura['fak_reference_name'] = $organization_data['first_name']." ".$organization_data['last_name'];
                    $data_faktura['fak_description'] = $package_details;
                    $data_faktura['fak_quantity'] = 1;
                    $data_faktura['fak_unit_price'] = $amount;
                    $data_faktura['fak_invoice_cost'] = 0.00;
                    //$data_faktura['fak_invoice_cost'] = $assigned_package_data['per_invoice_cost'];
                    //$data_faktura['fak_invoice_cost_applied'] =0.00;
                    $data_faktura['fak_price_exclusive_vat'] = $data_faktura['fak_quantity']*$data_faktura['fak_unit_price'];
                    //$data_faktura['sms_unit_price'] = $sms_cost;
                    //$data_faktura['letter_unit_price'] = $letter_cost;      
                    $data_faktura['fak_vat_rate'] = 25;
                    
                    //$data_faktura['fak_vat_price'] = ($data_faktura['fak_vat_rate']/100)*$data_faktura['fak_price_exclusive_vat'];                    
                    //$fak_total_price =$data_faktura['fak_price_exclusive_vat']+$data_faktura['fak_vat_price'];
                     //////// Calculating Total Cost of this faktura //////
                    $pris_exclusive_vat_one = $data_faktura['fak_price_exclusive_vat'];
                    $pris_exclusive_vat_two = $data_faktura['fak_invoice_cost'];
                    $price_total_exclusive_vat = ($pris_exclusive_vat_one+$pris_exclusive_vat_two);
                    $data_faktura['fak_vat_price'] = ($data_faktura['fak_vat_rate']/100)*$price_total_exclusive_vat;                     
                    $fak_total_price = $price_total_exclusive_vat+$data_faktura['fak_vat_price'];                    
                   //////// Calculating Total Cost of this faktura //////                    
                    $data_faktura['fak_total_price'] = round($fak_total_price);
                    $data_faktura['fak_rounding_price'] = $data_faktura['fak_total_price'] - $fak_total_price;
                    $data_faktura['fak_currency'] = $assigned_package_data['currency_name'];                    
                    $data_faktura['add_date'] = $to_date;
                    $fak_insert_id = $this->info_model->bill_faktura_insert($data_faktura);
                    $data_faktura['price_total_exclusive_vat']= $price_total_exclusive_vat;
                    $data_faktura['used_module_price'] = $used_module_price;
                    //print_r($data_faktura['used_module_price'] ) ; exit;
                    if($fak_insert_id){
                        $data['first_name']=$data_registration['first_name'];
                        $data['username']=$data_registration['username'];
                        $data['user_email']=$data_registration['email'];
                        $data['admin_email']=$organization_data['admin_email'];                                    
                        $data['org_number']=$organization_data['org_number'];
                        $data['org_name']=$organization_data['org_name'];                                    
                        $data['org_mobile_phone']=$organization_data['org_mobile_phone'];                
                        $data['password']= $this->data['password'];                           
                        $this->make_invoice_pdf($data_faktura,$fak_insert_id,$data);                        
                    }
                }                
                //////////////// Payment Method: End /////    
                    if($mem_id){
                        if($mem_organization_info){
                            $data_registration['org_number'] = $mem_organization_info[0]->org_number;
                            $data_registration['org_name'] = $mem_organization_info[0]->org_name;
                            $data_registration['admin_email'] = $mem_organization_info[0]->email;
                            $data_registration['password'] = $this->data['password'];
                        }
                        if($data_registration['password_receive_by_email']){                                             
                            $this->send_password_by_email($data_registration);
                        }
                        if($data_registration['password_receive_by_sms']){
                            $this->send_password_by_sms($data_registration);
                        }
                       $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_registration_success').'</div>');
                    } else{
                                $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('member_registration_failure').'</div>');
                    }
                    if( isset($_POST['confirm']) ){
                        redirect('organization/info/org_members');
                    }elseif( isset($_POST['confirm_and_create'])  ){
                        redirect('organization/info/create_new_member');
                    }
                    //$this->data['dynamicView'] = 'pages/admin/new_customer/org_registration_success';
                }
        }
           
        } else{
                    $this->data['dynamicView'] = 'pages/organization/members/registration_no_access';
                                    $this->_commonPageLayout('frontend_viewer');

        }
    }
}

function billing_terms_condition_check($billing_terms_condition) {        
        if ($billing_terms_condition=="") {
            $this->form_validation->set_message('billing_terms_condition_check', $this->lang->line('label_billing_terms_condition'));
            return FALSE;
        }
        else
            return TRUE;
}

function make_invoice_pdf($data_faktura,$fak_insert_id,$data){   
     include_once 'MPDF/create_faktura.php';
     $file_name = "invoice_".$data_faktura['org_name'].'_'.$data_faktura['org_number'].'_'.$fak_insert_id.'.pdf';
     $this->send_invoice_by_email($data,$content,$file_name);
}


/**
 * Send invoice by E-mail
 *
 *@access public
 *@return Confirmation or Error Message */
 
function send_invoice_by_email($data, $content,$file_name){
    $this->lang->load('common', $this->session->userdata('lang_file'));                
    $emailfrom = $data['admin_email'];       
    $subject=$this->lang->line('email_invoice_sent_subject')."\n\n";	
	$message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>".$this->lang->line('email_invoice_sent_subject')."</b></td></tr></table>"."\n";
	$message .="<p>".$this->lang->line('email_registration_confirmation_dear')." ".$data['first_name'].",</p>"."\n";
    $message .="<p>".$this->lang->line('email_member_registration_confirmation_congratulation_msg')."(".$data['org_name'] .")</p>"."\n";
    /*$message .= "<p>".$this->lang->line('email_registration_confirmation_member_details_msg').": </p>\n";
    $message .="<p><b>".$this->lang->line('label_username').": </b>".$data['username']."</p>\n";
	$message .="<p><b>".$this->lang->line('label_password').": </b>".$data['password']."</p>\n\n";*/
	//$message .="<p>".$this->lang->line('org_site_link_msg').": </p>\n";
    $message .="<a style='font-weight:bold;font-size:14px;' href='".base_url()."'>".base_url()."</a></p>"."\n";
    
    $message .="<p>".$this->lang->line('sent_invoice_msg')." </p>\n";
	$message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "</body></html>\n";	
	
    $header  = "From: ". $this->lang->line('site_logo')."<".$emailfrom.">\r\n";
    $header .= "Reply-To:".$emailfrom."\r\n";    
    $uid = md5(uniqid(time()));  
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/pdf; name=\"".$file_name."\"\r\n";
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";

//echo $header; exit;
    
	if(mail($data['user_email'], $subject,"",$header))
	 {   
          $data=array();
     	  $data['msg2']="Your registration successful !! A confirmation email sent to your email with your login information.";
          
	 }
	else
	{
		 $data['msg2']="";
         
	}
    
    return $data;    
}



/**
 * Send password to org_admin by SMS
 *
 *@access public
 *@return Confirmation or Error Message
 */
function send_password_by_sms($data){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $konto = "ip1-1868";  //username
    $pass = "y5lhyp0q";
    $from_phone = "";
    $content ="<p>".$this->lang->line('email_registration_confirmation_dear')." ".$data['first_name'].",</p>"."\n";
    $content .="<p>".$this->lang->line('email_member_registration_confirmation_congratulation_msg')."</p>"."\n";
	$content .="<p><b>".$this->lang->line('label_organization'). " ".$this->lang->line('label_name').":   </b>".$data['org_name']."</p>\n";
	$content .="<p><b>".$this->lang->line('label_username').": </b>".$data['username']."</p>\n";
	$content .="<p><b>".$this->lang->line('label_password').": </b>".$data['password']."</p>\n\n";
	$content .="<p>".$this->lang->line('org_site_link_msg').": </p>\n";
    $content .="<a style='font-weight:bold;font-size:14px;' href='".base_url()."'>".base_url()."</a></p>"."\n";
    $priority = 2;
    $c = multiple_receipient($konto, $pass, $from_phone, $data['org_phone'], $content, $priority);
}

/**
 * Send password to org_admin by E-mail
 *
 *@access public
 *@return Confirmation or Error Message
 */
 
function send_password_by_email($data){
    $this->lang->load('common', $this->session->userdata('lang_file'));                
    $emailfrom = $data['admin_email'];       
    $subject=$this->lang->line('email_registration_confirmation_subject')."\n\n";	
	$message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>".$this->lang->line('email_registration_confirmation_subject')."</b></td></tr></table>"."\n";
	$message .="<p>".$this->lang->line('email_registration_confirmation_dear')." ".$data['first_name'].",</p>"."\n";

    $message .="<p>".$this->lang->line('email_member_registration_confirmation_congratulation_msg')."(".$data['org_name'] .")</p>"."\n";
	    
    $message .= "<p>".$this->lang->line('email_registration_confirmation_member_details_msg').": </p>\n";
    $message .="<p><b>".$this->lang->line('label_username').": </b>".$data['username']."</p>\n";
	$message .="<p><b>".$this->lang->line('label_password').": </b>".$data['password']."</p>\n\n";
	$message .="<p>".$this->lang->line('org_site_link_msg').": </p>\n";
    $message .="<a style='font-weight:bold;font-size:14px;' href='".base_url()."'>".base_url()."</a></p>"."\n";
    
	$message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "</body></html>\n";
	
	
    $header  = "From: ". $this->lang->line('site_logo')."<".$emailfrom.">\r\n";
    $header .= "Reply-To:".$emailfrom."\r\n";
    
    $uid = md5(uniqid(time()));
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Transfer-Encoding: base64\r\n";
  
    //echo $message;
   
    //exit;
    
    //echo $data['member_email'];
    
	if(mail($data['email'], $subject,"",$header))
	 {   
          $data=array();
     	  $data['msg2']="Your registration successful !! A confirmation email sent to your email with your login information.";
	 }
	else
	{
		 $data['msg2']="";
	}
    
    return $data;    
}


function check_person_number1($person_number) {
        $result = $this->dx_auth->is_person_number_available1($person_number);
        if (!$result) {
            $this->form_validation->set_message('check_person_number1', $this->lang->line('pno_exists_error_msg'));
        }

        return $result;
}


  function login_username_check($username) {
        $result = $this->dx_auth->login_username($username);
        if (!$result) {
            $this->form_validation->set_message('login_username_check', $this->lang->line('username_exists_error_msg'));
        }

        return $result;
}


function email_check($email) {        
        $result = $this->dx_auth->is_email_available1($email);
        if (!$result) {
            $this->form_validation->set_message('email_check', $this->lang->line('email_exists_error_msg'));
        }

        return $result;
}

    function added_member() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'register_member';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_info', 'Bank Info', 'trim|xss_clean');
        $this->form_validation->set_rules('household_size', 'House Host size', 'trim|xss_clean');
        $this->form_validation->set_rules('member_title', 'Member Title', 'trim|xss_clean');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('person_number', 'Person Number', 'trim|required|xss_clean|callback_check_person_number');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_check_member_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_member_username');
        $this->form_validation->set_rules('member_group', 'Group', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[10]|');
        if ($this->form_validation->run() == FALSE) {
            $this->data['OptionsClient'] = getOptionsClient();
            $this->data['OptionsGroup'] = getOptionGroup();
            $this->data['dynamicView'] = 'pages/member/register/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $query = $this->db->query("select * from member_previlige where user_type='" . $this->input->post('user_type') . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">Sorry registration failed.User type previlization not exists.Please set previlization.</div>');
                redirect('organization/info/add_member');
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'member_title' => $this->input->post('member_title'),
                    'person_number' => $this->input->post('person_number'),
                    'expire_date' => $this->input->post('expire_date'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'bank_info' => $this->input->post('bank_info'),
                    'household_size' => $this->input->post('household_size'),
                    'member_group' => $this->input->post('member_group'),
                    'username' => $this->input->post('username'),
                    'password' => base64_encode($this->input->post('password')),
                    'user_type' => $this->input->post('user_type'),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->member_registration($data);
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $this->load->library('email');
                $this->email->from('info@onlineassociation.com', 'Confirmation ');
                $this->email->to("$email");
                $this->email->subject('Confirmation');
                $this->email->message("Dear $name Thanks for registration.your registration approved successfully.Your Username is $username and Password is $password");
                $this->email->send();
                $this->session->set_flashdata('message', '<div id="message1">Member Registered Successfully.</div>');
                redirect('organization/info/add_member');
            }
        }
    }

    function change_org_name() {
        $this->data['dynamicView'] = 'pages/organization/edit_orgname';
        $this->_commonPageLayout('frontend_viewer');
    }

    function check_org_email1($email, $id1) {

        $result = $this->dx_auth->org_email1_available($email, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_org_email1', 'Email id  exists. Please choose another one.');
        }

        return $result;
    }

    function check_org_name1($org_name, $id1) {

        $result = $this->dx_auth->org_name1_available($org_name, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_org_name1', 'Org Name  exists. Please choose another one.');
        }

        return $result;
    }

    function check_org_username($username, $id1) {

        $result = $this->dx_auth->org_u1_available($username, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_org_username', 'UserName  exists. Please choose another one.');
        }

        return $result;
    }

    function check_org_username_person($person_number, $id1) {

        $result = $this->dx_auth->org_u1_available_person($person_number, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_org_username_person', 'Person No  exists. Please choose another one.');
        }

        return $result;
    }

    //callback_check_package_name[' . $this->input->post("id") . ']'
    function edit_org() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|xss_clean|callback_check_org_name1[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_org_username[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('person_number', 'Person Number', 'trim|required|xss_clean|callback_check_org_username_person[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_check_org_email1[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('org_primary_address', 'Primary Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', 'Org Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description of org', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/edit_org';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            if ($this->input->post("category_name")) {
                $data1 = array(
                    'org_type' => ucfirst($this->input->post('category_name')),
                    'status' => 1
                );
                $this->info_model->org_type_insert($data1);
                $org_id = $this->db->insert_id();

                $data = array(
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
                    'username' => $this->input->post("username"),
                    'description' => $this->input->post("description"),
                    'org_name' => $this->input->post("org_name"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'org_type' => $org_id,
                    'bank_info' => $this->input->post("bank_info"),
                    'flag' => 1
                );
                for ($i = 1; $i <= count($_FILES); $i++) {
                    if ($_FILES['photo' . $i]['size'] > 0) {
                        if ($this->now_upload('photo' . $i)) {
                            $fileData = array(
                                'photo' . $i => $this->upload_data['file_name'],
                            );
                            $data = array_merge($data, $fileData);
                        }
                    }
                }
            } else {
                $data = array(
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
                    'username' => $this->input->post("username"),
                    'description' => $this->input->post("description"),
                    'org_name' => $this->input->post("org_name"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'org_type' => $this->input->post("org_type"),
                    'bank_info' => $this->input->post("bank_info"),
                    'flag' => 1
                );
                for ($i = 1; $i <= count($_FILES); $i++) {
                    if ($_FILES['photo' . $i]['size'] > 0) {
                        if ($this->now_upload('photo' . $i)) {
                            $fileData = array(
                                'photo' . $i => $this->upload_data['file_name'],
                            );
                            $data = array_merge($data, $fileData);
                        }
                    }
                }
            }

            $this->info_model->org_profile_update($data);

            $this->session->set_flashdata('message', '<div id="message1">Org Profile Updated Successfully.</div>');
            redirect('organization/info/edit_org');
        }
    }

    function update_organization() {
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|xss_clean|callback_check_org_name1[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_org_username[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('person_number', 'Person Number', 'trim|required|xss_clean|callback_check_org_username_person[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_check_org_email1[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('org_primary_address', 'Primary Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', 'Org Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description of org', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/organization_edit';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            if ($this->input->post("category_name")) {
                $data1 = array(
                    'org_type' => ucfirst($this->input->post('category_name')),
                    'status' => 1
                );
                $this->info_model->org_type_insert($data1);
                $org_id = $this->db->insert_id();

                $data = array(
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
                    'username' => $this->input->post("username"),
                    'description' => $this->input->post("description"),
                    'org_name' => $this->input->post("org_name"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'org_type' => $org_id,
                    'bank_info' => $this->input->post("bank_info"),
                    'flag' => 1
                );
                for ($i = 1; $i <= count($_FILES); $i++) {
                    if ($_FILES['photo' . $i]['size'] > 0) {
                        if ($this->now_upload('photo' . $i)) {
                            $fileData = array(
                                'photo' . $i => $this->upload_data['file_name'],
                            );
                            $data = array_merge($data, $fileData);
                        }
                    }
                }
            } else {
                $data = array(
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
                    'username' => $this->input->post("username"),
                    'description' => $this->input->post("description"),
                    'org_name' => $this->input->post("org_name"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'org_type' => $this->input->post("org_type"),
                    'bank_info' => $this->input->post("bank_info"),
                    'flag' => 1
                );
                for ($i = 1; $i <= count($_FILES); $i++) {
                    if ($_FILES['photo' . $i]['size'] > 0) {
                        if ($this->now_upload('photo' . $i)) {
                            $fileData = array(
                                'photo' . $i => $this->upload_data['file_name'],
                            );
                            $data = array_merge($data, $fileData);
                        }
                    }
                }
            }

            $this->info_model->org_profile_update($data);

            $this->session->set_flashdata('message', '<div id="message1">Org Profile Updated Successfully.</div>');
            redirect('organization/info/modify_org');
        }
    }

    function org_name_check($org_name) {

        $result = $this->dx_auth->is_org_name_available($org_name);
        if (!$result) {
            $this->form_validation->set_message('org_name_check', 'Org Name  exist. Please choose another one.');
        }

        return $result;
    }

    function edit_org_name() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|xss_clean|callback_org_name_check');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/edit_orgname';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'org_name' => $this->input->post("org_name"),
            );

            $this->info_model->org_profile_update($data);
            redirect('organization/info/edit_org');
        }
    }


    function edit_email() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|callback_email_check');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/edit_email';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'email' => $this->input->post("email"),
            );

            $this->info_model->org_profile_update($data);
            redirect('organization/info/edit_org');
        }
    }

    function change_email() {
        $this->data['dynamicView'] = 'pages/organization/edit_email';
        $this->_commonPageLayout('frontend_viewer');
    }

    function change_password() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'change_password';
        $this->data['dynamicView'] = 'pages/organization/password';
        $this->_commonPageLayout('frontend_viewer');
    }

    function changed_password() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'change_password';
        //echo "<pre>"; print_r($_POST);die();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required|xss_clean|min_length[10]|max_length[20]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/password';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $old_password = base64_encode($this->input->post('old_password'));
            $query = $this->db->query("select * from user_info where  id='" . $this->session->userdata('user_id') . "'and password='" . $old_password . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">Old Password doesnt match.</div>');
                redirect('organization/info/change_password');
            } else {
                $data = array(
                    'password' => base64_encode($this->input->post('password'))
                );
                $this->info_model->password_update($data);
                $this->session->set_flashdata('message', '<div id="message1"> Password  Changed Successfully.</div>');
                redirect('organization/info/change_password');
            }
        }
    }


    function view_register_member() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_register_member';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '10';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_register_member");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->get_reg_member()->num_rows();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_reg_member($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        //$this->data['query1'] = $this->info_model->get_reg_member();
        $this->data['dynamicView'] = 'pages/organization/member/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_org_type() {
        $data = array(
            'org_type' => ucfirst($this->input->post('category_name')),
        );
        $this->info_model->org_type_insert($data);
        redirect('organization/back/index');
    }

    function add_user_type() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'usertype';
        $this->data['dynamicView'] = 'pages/organization/user_type/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_user_type() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'usertype';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/user_type/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $query = $this->db->query("select user_type from user_type where user_type='" . strtolower($this->input->post("user_type")) . "'and org_id='" . $this->session->userdata('user_id') . "'");
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('message', '<div id="message">Usertype exists Please chose another one.</div>');
                redirect('organization/info/add_user_type');
            } else {
                $data = array(
                    'user_type' => ucfirst($this->input->post('user_type')),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->user_type_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Usertype Created successfully.</div>');
                redirect('organization/info/add_user_type');
            }
        }
    }

    function view_user_type() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_usertype';
        $org_id = $this->session->userdata('user_id');
        $this->data['query1'] = $this->info_model->view_user_type($org_id);

        $this->data['dynamicView'] = 'pages/organization/user_type/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function u_type($user_type, $id1) {
        $org_id = $this->session->userdata("user_id");
        $result = $this->dx_auth->u_type_available($user_type, $id1, $org_id);
        if (!$result) {
            $this->form_validation->set_message('u_type', 'User Type  exists. Please choose another one.');
        }

        return $result;
    }

    function user_type_edit($id=NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_usertype';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_user_type($id);
            $this->data['dynamicView'] = 'pages/organization/user_type/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('user_type', 'user Type', 'trim|required|xss_clean|callback_u_type[' . $this->input->post("id") . ']');
            if ($val->run()) {
                $data = array(
                    'user_type' => ucfirst($this->input->post('user_type'))
                );
                $this->info_model->user_type_update($data);
                redirect('organization/info/view_user_type', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function user_type_delete($id = NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_usertype';
        $this->info_model->user_type_delete($id);
        redirect('organization/info/view_user_type', 'location', 301);
    }



/**
 * View org_member_type_previlize 
 *
 *@param $id which contains organization member type id
 *@access private
 *@return org_member_type_previlize view
 */ 
function viewed_org_member_type_previlize($id) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'member_types';
        $data_previlize = $this->check_member_type_previlize();
        $org_id = $data_previlize['member_org'];         
        $to_date = date("Y-m-d H:i:s"); 
        $this->data['mem_type_id'] =$id;
        $this->data['org_id'] =$org_id;
        
        if($data_previlize['access_org_member_type_previlize']) { 
            $query_organization_prevelize  = $this->db->query("select * from org_previlige where org_id='" . $org_id . "' ");
            if($query_organization_prevelize->num_rows() == 0) {
                $this->data['dynamicView'] = 'pages/organization/members/org_previlige_not_exists';
            }else{
                $query = $this->db->query("select * from org_member_previlige where mem_type_id='" . $id . "'  AND org_id='" . $org_id . "' ");
                if ($query->num_rows() == 0) {                       
                    $data = array('mem_type_id' => $id, 'org_id' => $org_id,  'add_date' => $to_date);                
                    $this->info_model->org_member_type_previlige_insert($data);
                }
                $this->data['dynamicView'] = 'pages/organization/members/previlige_edit';
              }
        }else{$this->data['dynamicView'] = 'pages/organization/members/previlige_no_access';}

        $this->_commonPageLayout('frontend_viewer');            
}



function update_org_member_type_previlize() {
    
        $org_id  = $this->input->post("org_id");
        $mem_type_id  = $this->input->post("mem_type_id");
        
        $data = array(
            //mainboard        
            'mainboard_access_main' => $this->input->post("mainboard_access_main"),
            'mainboard_send_proposal' => $this->input->post("mainboard_send_proposal"),
            'mainboard_change_article' => $this->input->post("mainboard_change_article"),
            'mainboard_send_notification' => $this->input->post("mainboard_send_notification"),            
            'mainboard_sending_out' => $this->input->post("mainboard_sending_out"),            
            'mainboard_manually_archive' => $this->input->post("mainboard_manually_archive"),
            
            'forum_access' => $this->input->post("forum_access"),
            'forum_comments' => $this->input->post("forum_comments"),            //forum
            'forum_delete_any_coments' => $this->input->post("forum_delete_any_coments"),            
            'forum_manually_archive_comments' => $this->input->post("forum_manually_archive_comments"),           
            
            'configuration_change_org' => $this->input->post("configuration_change_org"),
           
            //'configuration_visibility' => $this->input->post("configuration_visibility"),
            //'configuration_switching' => $this->input->post("configuration_switching"),
            'configuration_create_address' => $this->input->post("configuration_create_address"),
            //Communication
            'communication_send_email' => $this->input->post("communication_send_email"),
            'communication_send_sms' => $this->input->post("communication_send_sms"),
            'communication_send_letters' => $this->input->post("communication_send_letters"),
            //Economics
            'economics_register' => $this->input->post("economics_register"),
            'economics_send_payment' => $this->input->post("economics_send_payment"),
            'economics_check_complete' => $this->input->post("economics_check_complete"),
            'economics_watch_total_income' => $this->input->post("economics_watch_total_income"),
            'economics_watch_total_cost' => $this->input->post("economics_watch_total_cost"),
            'economics_watch_statistics' => $this->input->post("economics_watch_statistics"),
            //History
            'history_access_articles' => $this->input->post("history_access_articles"),
            'history_access_comments' => $this->input->post("history_access_comments"),
            'history_user_actions' => $this->input->post("history_user_actions"),
            'history_old_letters' => $this->input->post("history_old_letters"),
            'history_old_sms' => $this->input->post("history_old_sms"),
            'history_old_emails' => $this->input->post("history_old_emails"),
            //Members
            //'members_decide' => $this->input->post("members_decide"),
            //'members_add_change' => $this->input->post("members_add_change"),
           
            //'members_user_types' => $this->input->post("members_user_types"),
            //'members_add_usertype' => $this->input->post("members_add_usertype"),
            'external_mainboard' => $this->input->post("external_mainboard"),
            'external_presentation' => $this->input->post("external_presentation"),
            'members_c_group' => $this->input->post("members_c_group"),
            //'members_view_group' => $this->input->post("members_view_group"),
            //'members_change_or_delete_group' => $this->input->post("members_change_or_delete_group"),
            'members_add_group' => $this->input->post("members_add_group") ,
            'access_faktura' => $this->input->post("access_faktura")
            
        );
        //echo "<pre>";print_r($data);die();
        $this->info_model->org_member_previlige_setting_update($data, $mem_type_id, $org_id);
        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('previlize_settings_updated_success').'</div>');

        //redirect('admin/info/viewed_org_previlize');
        redirect('organization/info/viewed_org_member_type_previlize/'.$mem_type_id);
    }

    function view_previlige() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'view_previlige';
        $this->data['dynamicView'] = 'pages/organization/previlige/entry1';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_previlige() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'view_previlige';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/previlige/entry1';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $query = $this->db->query("select * from member_previlige where user_type='" . $this->input->post("user_type") . "'");
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('message', '<div id="message">Previlization Setting Exists</div>');
                redirect('organization/info/view_previlige');
            } else {
                $data = array(
                    'user_type' => $this->input->post("user_type"),
                    'org_id ' => $this->session->userdata('user_id'),
                    //mainboard
                    'mainboard_access_main' => $this->input->post("mainboard_access_main"),
                    'mainboard_send_proposal' => $this->input->post("mainboard_send_proposal"),
                    'mainboard_change_article' => $this->input->post("mainboard_change_article"),
                    'mainboard_send_notification' => $this->input->post("mainboard_send_notification"),
                    'mainboard_sending_out' => $this->input->post("mainboard_sending_out"),
                    'mainboard_manually_archive' => $this->input->post("mainboard_manually_archive"),
                    //forum
                    'forum_access' => $this->input->post("forum_access"),
                    'forum_comments' => $this->input->post("forum_comments"),
                    'forum_delete_won_comments' => $this->input->post("forum_delete_won_comments"),
                    'forum_delete_any_coments' => $this->input->post("forum_delete_any_coments"),
                    'forum_manual_comments' => $this->input->post("forum_manual_comments"),
                    //Members
                    'member_login_logout' => $this->input->post("member_login_logout"),
                    'member_change_profile' => $this->input->post("member_change_profile"),
                    'member_change_password' => $this->input->post("member_change_password"),
                    //Configuration org
                    'configuration_view_org' => $this->input->post("configuration_view_org"),
                    'configuration_change_org' => $this->input->post("configuration_change_org"),
                    //'configuration_visibility' => $this->input->post("configuration_visibility"),
                    //'configuration_switching' => $this->input->post("configuration_switching"),
                    'configuration_create_address' => $this->input->post("configuration_create_address"),
                    //Communication
                    'communication_send_email' => $this->input->post("communication_send_email"),
                    'communication_send_sms' => $this->input->post("communication_send_sms"),
                    'communication_send_letters' => $this->input->post("communication_send_letters"),
                    //Economics
                    'economics_register' => $this->input->post("economics_register"),
                    'economics_send_payment' => $this->input->post("economics_send_payment"),
                    'economics_check_complete' => $this->input->post("economics_check_complete"),
                    'economics_watch_total_income' => $this->input->post("economics_watch_total_income"),
                    'economics_watch_total_cost' => $this->input->post("economics_watch_total_cost"),
                    'economics_watch_statistics' => $this->input->post("economics_watch_statistics"),
                    //History
                    'history_access_articles' => $this->input->post("history_access_articles"),
                    'history_access_comments' => $this->input->post("history_access_comments"),
                    'history_user_actions' => $this->input->post("history_user_actions"),
                    'history_old_letters' => $this->input->post("history_old_letters"),
                    'history_old_sms' => $this->input->post("history_old_sms"),
                    'history_old_emails' => $this->input->post("history_old_emails"),
                    //Members
                    //'members_decide' => $this->input->post("members_decide"),
                    //'members_add_change' => $this->input->post("members_add_change"),
                    'members_c_group' => $this->input->post("members_c_group"),
                    'members_add_user' => $this->input->post("members_add_user"),
                        //'members_user_types' => $this->input->post("members_user_types"),
                        //'members_add_usertype' => $this->input->post("members_add_usertype"),
                );
                $this->info_model->previlige_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Previlization Setting saved successfully.</div>');
                redirect('organization/info/view_previlige');
            }
        }
    }

    function view_previlige_external() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'view_external_previlige';
        $this->data['dynamicView'] = 'pages/organization/previlige/external_entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_external_previlige() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'view_external_previlige';
        $query = $this->db->query("select * from org_external_previlige where org_id='" . $this->session->userdata('user_id') . "'");
        if ($query->num_rows() > 0) {
            $data = array(
                'external_mainboard' => $this->input->post("external_mainboard"),
                'external_presentation' => $this->input->post("external_presentation"),
                'external_contact' => $this->input->post("external_contact"),
                'external_archive_article' => $this->input->post("external_archive_article")
            );
            $this->info_model->previlige_external_update($data);
            $this->session->set_flashdata('message', '<div id="message1">Previlization Setting Updated successfully.</div>');
            redirect('organization/info/view_previlige_external');
        } else {
            $data = array(
                'external_mainboard' => $this->input->post("external_mainboard"),
                'external_presentation' => $this->input->post("external_presentation"),
                'external_contact' => $this->input->post("external_contact"),
                'external_archive_article' => $this->input->post("external_archive_article"),
                'org_id ' => $this->session->userdata('user_id'),
            );
            $this->info_model->previlige_external_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Previlization Setting saved successfully.</div>');
            redirect('organization/info/view_previlige_external');
        }
    }

    function view_all_member_post() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'article';
        $this->data['dynamicView'] = 'pages/organization/member_post/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_letter() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'letter_request';
        $this->data['dynamicView'] = 'pages/organization/letter_post/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

    function approve_member_post($post_id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'article';
        $data = array(
            'status' => 2
        );
        $this->info_model->approve_member_post_update($data, $post_id);
        $query = $this->db->query("select * from post_tbl where post_id='" . $post_id . "'");
        foreach ($query->result() as $info):
            $data1 = array(
                'status' => 2
            );
            $this->info_model->approve_member_post1_update($data1, $post_id);
            if ($info->send_by_email == '2'):
                $q = $this->db->query("select email from member where id='" . $info->send_to . "'");
                foreach ($q->result() as $s_mail):
                    $email = $s_mail->email;
                endforeach;
                $q1 = $this->db->query("select * from member_post where id='" . $info->post_id . "'");
                foreach ($q1->result() as $p_message):
                    $message = $p_message->text;
                    $title = $p_message->title;
                    $posted_by = $p_message->created_by;
                    $q3 = $this->db->query("select email from member where id='" . $posted_by . "'");
                    foreach ($q3->result() as $a):
                        $email_from = $a->email;
                    endforeach;
                endforeach;

                $this->load->library('email');
                $this->email->from($email_from, $title);
                // $this->email->from("$email_from", "$title");
                $this->email->to("$email");
                $this->email->subject("$title");
                $this->email->message("$message");
                $this->email->send();
            endif;
        endforeach;

        redirect('organization/info/view_all_member_post');
    }

    function deny_member_post($post_id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'article';
        $data = array(
            'status' => 3
        );
        $this->info_model->deny_member_post_update($data, $post_id);

        redirect('organization/info/view_letter');
    }

    function approve_member_letter($letter_id) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'letter_request';
        $data = array(
            'admin_status' => 2
        );
        $this->info_model->approve_member_letter_update($data, $letter_id);
        $query = $this->db->query("select * from letter_send_request where letter_id='" . $letter_id . "'");
        foreach ($query->result() as $info):
            $data1 = array(
                'admin_status' => 2
            );
            $this->info_model->approve_member_letter1_update($data1, $letter_id);

        endforeach;
        $data5 = array(
            'status' => 2
        );
        $this->info_model->approve_total_letter_update($data5, $letter_id);
        redirect('organization/info/view_letter');
    }

    function deny_member_letter($post_id) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'letter_request';
        $data = array(
            'admin_status' => 3
        );
        $this->info_model->deny_member_letter_update($data, $post_id);
        $data5 = array(
            'status' => 3
        );
        $this->info_model->deny_total_letter_update($data5, $post_id);
        redirect('organization/info/view_letter');
    }

    function view_archive() {
        $this->data['dynamicView'] = 'pages/organization/archive/view';
        $this->_commonPageLayout('frontend_viewer');
    }


/**
 * View Main Board for logged user's organization
 *
 *@access Private
 *@return Main Board for logged user's organization
 */ 
function view_mainboard() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $this->data['article_title']  = "";
        $this->data['search_option'] = "";  
        $this->data['all_archieve_article_also'] ="";
        $data_previlize = $this->check_member_type_previlize();     
        if($data_previlize['view_mainboard']){
            $this->data['all_active_article'] = $this->info_model->get_active_article_by_org_id($data_previlize['member_org'],"","");
            $this->data['dynamicView'] = 'pages/organization/mainboard/view';
        }else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/main_board_no_access';
        }
         $this->load->vars($data_previlize);
         $this->_commonPageLayout('frontend_viewer');
}


/**
 * Search Main Board Article for logged user's organization by Search Parameter
 *
 *@access Private
 *@return Main Board Article for logged user's organization by Search Parameter
 */ 
function search_main_board_article(){
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $this->data['article_title']  = $this->input->post("article_title");
        $this->data['search_option'] = $this->input->post("search_option");          
        $this->data['all_archieve_article_also'] ="";
        $data_previlize = $this->check_member_type_previlize();     
        if($data_previlize['view_mainboard']){
            $this->data['all_active_article'] = $this->info_model->get_active_article_by_org_id($data_previlize['member_org'], $this->data['article_title'], $this->data['search_option']);
            if($this->data['search_option']=="all"){
                $this->data['all_archieve_article_also'] = $this->info_model->get_active_article_by_org_id($data_previlize['member_org'], $this->data['article_title'], "archieve");
            }
            $this->data['dynamicView'] = 'pages/organization/mainboard/view';
        }else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/main_board_no_access';
    }
    
         $this->load->vars($data_previlize);
         $this->_commonPageLayout('frontend_viewer');
}

/**
 * Search Proposed Article for logged user's organization by Search Parameter
 *
 *@access Private
 *@return Proposed Article for logged user's organization by Search Parameter
 */ 
function search_proposed_article(){
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'article_proposal';
        $data_previlize = $this->check_member_type_previlize();     
        if($data_previlize['mainboard_change_article']){
            $this->data['article_title']  = $this->input->post("article_title");
            $this->data['all_archieve_article_also'] ="";
            $this->data['article_proposals'] = $this->info_model->get_proposed_article_by_org_id($data_previlize['member_org'], $this->data['article_title']);
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_proposal';
        }else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/main_board_no_access';
        }
        $this->load->vars($data_previlize);
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * View Main Board Article Details By article_id
 *
 *@Param article_id which contains article id
 *@access Private
 *@return Main Board Article Details By article_id
 */ 
function article_details($article_id){
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $data_previlize = $this->check_member_type_previlize();     
        if($data_previlize['mainboard_access_main']){
            $this->data['article_details'] = $this->info_model->get_article_details_by_article_id($article_id,$data_previlize['member_org']);
            $this->data['article_comments'] = $this->info_model->get_article_comments_by_article_id($article_id,$data_previlize['member_org']);
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_details';
        }else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/main_board_no_access';
        }
        $this->load->vars($data_previlize);
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * View Main Board Article Details By article_id
 *
 *@Param article_id which contains article id
 *@access Private
 *@return Main Board Article Details By article_id
 */ 
function archived_article_details($article_id){
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $data_previlize = $this->check_member_type_previlize();     
        if($data_previlize['mainboard_change_article']){
            $this->data['article_details'] = $this->info_model->get_archived_article_details_by_article_id($article_id,$data_previlize['member_org']);
            $this->data['article_comments'] = $this->info_model->get_archived_article_comments_by_article_id($article_id,$data_previlize['member_org']);
            $this->data['dynamicView'] = 'pages/organization/mainboard/archived_article_details';
        }else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/main_board_no_access';
        }
        $this->load->vars($data_previlize);
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Comment On Main Board Article 
 *
 *@Param article_id which contains article id
 *@access Private
 *@return Success/Failure Message
 */ 
function comment_on_article(){
    $this->lang->load('configuration', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'mainboard';
    $this->load->library('form_validation');
    $data_previlize = $this->check_member_type_previlize();     
    $to_date = time(); 
    $article_id = $this->input->post("article_id");

    if($data_previlize['view_mainboard']){
        $this->data['article_details'] = $this->info_model->get_article_details_by_article_id($article_id,$data_previlize['member_org']);
        $this->data['article_comments'] = $this->info_model->get_article_comments_by_article_id($article_id,$data_previlize['member_org']);

        $this->form_validation->set_rules('comment_art', $this->lang->line('comments_text'), 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_details';
        } 
        else {    
            $data = array(
            'comment' => $this->input->post("comment_art"),
            'organization_id' => $data_previlize['member_org'],
            'article_id' =>  $article_id,
            'comment_on_member_id' => $this->input->post("comment_on_member_id"),
            'comment_member_id' => $this->session->userdata('mem_id'),
            'comment_date' => $to_date,
            'add_date' => $to_date
            );
            //echo "<pre>";print_r($data);die();
            $comment_id = $this->info_model->main_board_article_comment_insert($data);
            if($comment_id){
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('article_comment_post_successful').'</div>');
            }else{
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('article_comment_post_failed').'</div>');
            }
            redirect('organization/info/article_details/'.$article_id);
        }
    }else{ $this->data['dynamicView'] = 'pages/organization/mainboard/main_board_no_access'; }
    $this->_commonPageLayout('frontend_viewer'); 
}




/**
 * Remove article comment
 *
 *@Param $comment_id which contains article comment_id
 *@access Private
 *@return Success/Failure Message
 */ 
 
 function remove_article_comments($article_id, $comment_id){
    
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';     
        $article_comments_details = $this->info_model->get_article_comments_details_by_comment_id($comment_id);
       if($article_comments_details){
            if($this->session->userdata('mem_type')=="Admin" || $this->session->userdata('mem_id')==$article_comments_details[0]->comment_on_member_id || $this->session->userdata('mem_id')==$article_comments_details[0]->comment_member_id) { 
                $delete_success = $this->info_model->delete_article_comment_by_comment_id($comment_id);
                if($delete_success){
                    $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('article_comment_deleted_successful').'</div>');
                }else{
                    $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('article_comment_deleted_failed').'</div>');
                }
                redirect("organization/info/article_details/".$article_id);
            }
            else{
                $this->data['dynamicView'] = 'pages/organization/mainboard/delete_article_comment_no_access';
                $this->_commonPageLayout('frontend_viewer'); 
            }   
        }
}

/**
 * Archieve main board article process 
 *
 *@Param $article_id which contains article id
 *@access Private
 *@return Success/Failure Message
 */ 
 function archive_article($article_id) {        
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';     
        $data_previlize = $this->check_member_type_previlize();              
        if($data_previlize['mainboard_manually_archive']) { 
            $archieve_id = $this->info_model->article_archive_insert($article_id);
            if($archieve_id){
                $delete_success = $this->info_model->delete_article($article_id);
                //$delete_success = $this->info_model->delete_article_comment($article_id);
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('article_archieved_successful').'</div>');
            }else{
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('article_archieved_failed').'</div>');
            }
            redirect("organization/info/view_mainboard");
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/archieve_article_no_access';
            $this->_commonPageLayout('frontend_viewer'); 
        }   
}


/**
 * Archieve forum topic process 
 *
 *@Param $topic_id which contains topic id
 *@access Private
 *@return Success/Failure Message
 */ 
 function archive_forum_topic($topic_id) {        
        $this->data['mainTab'] = 'view_forum';
        $this->data['activeTab'] = 'view_forum';     
        $data_previlize = $this->check_member_type_previlize();              
        if( $data_previlize['forum_manually_archive_comments']) { 
            $archieve_id = $this->info_model->forum_topic_archive_insert($topic_id);
            if($archieve_id){
                $delete_success = $this->info_model->delete_forum_topic($topic_id);
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('forum_topic_archieved_successful').'</div>');
            }else{
                $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('forum_topic_archieved_failed').'</div>');
            }
            redirect("organization/info/view_forum");
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/forum_no_access';
            $this->_commonPageLayout('frontend_viewer'); 
        }   
}

/**
 * Delete main board article process 
 *
 *@Param $article_id which contains article id
 *@access Private
 *@return Success/Failure Message
 */ 
function delete_article($article_id){
    $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';     
        $data_previlize = $this->check_member_type_previlize();    
        $article_details = $this->info_model->get_article_details_by_article_id($article_id,$this->session->userdata('member_org'));
       
        if($data_previlize['delete_article'] || $article_details[0]->member_id == $this->session->userdata('mem_id')) { 
            $delete_success = $this->info_model->delete_article($article_id);
            if($delete_success){
                if($article_details[0]->uploaded_article){
                    $filePath = "./main_board_article/".$article_details[0]->uploaded_article;
                    if(file_exists($filePath)){
                        unlink($filePath);
                    }
                } 
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('article_deleted_successful').'</div>');
            }else{
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('article_deleted_failed').'</div>');
            }
            redirect("organization/info/view_mainboard");
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/delete_article_no_access';
            $this->_commonPageLayout('frontend_viewer'); 
        }   
}



/**
 * Delete Archieved article process 
 *
 *@Param $article_id which contains article id
 *@access Private
 *@return Success/Failure Message
 */ 
function delete_archived_article($article_id){
    $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';     
        $data_previlize = $this->check_member_type_previlize();    
        $article_details = $this->info_model->get_article_details_by_article_id($article_id,$data_previlize['member_org']);
       
        if($data_previlize['delete_article'] || $article_details[0]->member_id == $this->session->userdata('mem_id')) { 
            $delete_success = $this->info_model->delete_archived_article($article_id);
            if($delete_success){
                if($article_details[0]->uploaded_article){
                    $filePath = "./main_board_article/".$article_details[0]->uploaded_article;
                    if(file_exists($filePath)){
                        unlink($filePath);
                    }
                } 
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('archived_article_deleted_successful').'</div>');
            }else{
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('archived_article_deleted_failed').'</div>');
            }
            redirect("organization/info/view_mainboard");
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/delete_article_no_access';
            $this->_commonPageLayout('frontend_viewer'); 
        }   
}
/**
 * Load main board article Edit Form 
 *
 *@Param $article_id which contains article id
 *@access Private
 *@return main board article Edit Form 
 */ 
function edit_article($article_id){
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';     
        //$this->data['post_article'] = '';
        $this->data['expire_date_error'] = '';
        $this->data['publish_date_error'] = '';
        $this->data['file_upload_failed'] ="";
        $data_previlize = $this->check_member_type_previlize();            
         if($data_previlize['edit_article'] || $this->data['article_details'][0]->member_id == $this->session->userdata('mem_id')) { 
             $this->data['article_details'] = $this->info_model->get_article_details_by_article_id($article_id, $data_previlize['member_org']);
             $this->data['org_article_category'] = $this->info_model->get_org_article_category($data_previlize['member_org']);
             $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($this->session->userdata('mem_id'), $data_previlize['member_org']);    
             $this->data['dynamicView'] = 'pages/organization/mainboard/edit_article';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/edit_article_no_access';
        }   
        $this->data['article_id'] = $article_id;
        $this->_commonPageLayout('frontend_viewer'); 

}



/**
 * Process Article Edit 
 *
 *@access private
 *@return Success/Failure Message
 */
function edit_article_process(){    
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'mainboard';
    $this->data['post_article'] = '';     
    $this->data['publish_date'] ="";
    $this->data['publish_date_intake'] ="";
    $this->data['expire_date'] ="";
    $this->data['expire_date_intake'] ="";
    $this->data['article_color_code'] ="";
    $this->data['file_upload_failed'] ="";
            
    $error_data['expire_date_error'] = "";
    $error_data['publish_date_error'] = "";
    $uploaded_article ="";
    $article_insert_id ="";
    $group_mem_id="";
    //$article_data['send_to_group'] ="";
    //$article_data['send_to_member'] ="";
    $this->data['article_text'] ="";
    $file_uploaded_success = FALSE;
    $temp ="";
    $attachment_name = "";
    $attachedfile = "";    
    $uploaded_article_removed = FALSE;    
    $data_previlize = $this->check_member_type_previlize();   
    $article_id =  $this->input->post("article_id"); 
    $mem_id = $this->session->userdata('mem_id');
    $org_id = $data_previlize['member_org'];             
         if($data_previlize['edit_article'] || $this->data['article_details'][0]->member_id == $this->session->userdata('mem_id')) { 
            $this->data['article_details'] = $this->info_model->get_article_details_by_article_id($article_id, $org_id);            
            $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $org_id);                    
            $article_category['org_article_category'] = $this->info_model->get_org_article_category($org_id); 
            
            /////////////////////////////////////////////////////////////////////////////////////////////            
            $this->load->library('form_validation');
            $this->data['post_article'] = $this->input->post('post_article');
            $this->data['article_title'] = $this->input->post('article_title');   
            $this->data['importance'] = $this->input->post('importance');
            $this->data['article_category'] = $this->input->post('article_category');
            $this->data['article_type'] = $this->input->post('article_type');
            
            if($this->input->post('publish_date')){
                $this->data['publish_date_intake'] = $this->input->post('publish_date');
                $this->data['publish_date'] = explode("-",$this->input->post('publish_date'));
                $this->data['publish_date'] = mktime(0, 0, 0, ($this->data['publish_date'][1]), $this->data['publish_date'][2], $this->data['publish_date'][0]);
                $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($this->data['publish_date'] < $todate ){
                        $error_data['publish_date_error'] = $this->lang->line('article_publish_date_error');
                }   
            }        
            
            if($this->input->post('expire_date')){
                $this->data['expire_date_intake'] = $this->input->post('expire_date');
                $this->data['expire_date'] = explode("-",$this->input->post('expire_date'));
                $this->data['expire_date'] = mktime(0, 0, 0, ($this->data['expire_date'][1]), $this->data['expire_date'][2], $this->data['expire_date'][0]);
                if(empty($error_data['publish_date_error']) && $this->data['publish_date'] >= $this->data['expire_date']){
                        $error_data['expire_date_error'] = $this->lang->line('article_expire_date_error');
                }
            }
       
            if($this->data['post_article']=="create_article"){
                $this->data['article_text'] = $this->input->post('article_text');
                $this->data['article_color_code'] = $this->input->post('rgb2');
                if($this->data['article_details'][0]->uploaded_article){
                    $filePath = "./main_board_article/".$this->data['article_details'][0]->uploaded_article;
                    if(file_exists($filePath)){
                        unlink($filePath);
                        $uploaded_article_removed = TRUE;
                    }
            }
            if(strstr($this->data['article_details'][0]->send_article_by, "Letter")=="Letter"){      
                    $letter_article = substr_replace($this->data['article_details'][0]->uploaded_article, "letter", 0, 7); 
                    $filePath = "./org_member_letter/".$letter_article;
                    if(file_exists($filePath)){
                        unlink($filePath);
                        $uploaded_article_letter_removed = TRUE;
                    }
                }
            }
            elseif($this->data['post_article']=="upload_article"){
                $uploaded_article = $_FILES['uploaded_article']['name']; 
        }      
            $this->data['uploaded_article'] = $uploaded_article;
            //$this->data['send_by'] = $this->input->post('send_by');
            //$this->data['send_article_by'] = $this->input->post('send_article_by');
            //$this->data['send_notification_by'] = $this->input->post('send_notification_by');
            $this->data['article_reminder_email_time'] = $this->input->post('article_reminder_email_time');
            $this->data['article_reminder_email_time_unit'] = $this->input->post('article_reminder_email_time_unit');
            //$this->data['select_member'] = $this->input->post('select_member');
            //$this->data['send_to_group'] = $this->input->post('send_to_group');
            //$this->data['send_to_member'] = $this->input->post('send_to_member');

            /*if($this->data['send_by']){
                if(empty($this->data['send_article_by']) && empty($this->data['send_notification_by'])){
                    $this->form_validation->set_rules('send_article_by', $this->lang->line('label_article_sending_way'), 'trim|required');
                }
                elseif($this->data['send_by'] && ($this->data['send_article_by']  || $this->data['send_notification_by']) ){
                    if(empty($this->data['send_to_group']) && empty($this->data['select_member'])){
                        $this->form_validation->set_rules('send_to_group', $this->lang->line('label_send_to'), 'trim|required');
                    }       
                    elseif($this->data['select_member']){
                        $send_to_member_list = $this->data['send_to_member'];                                             
                        if(!isset($send_to_member_list[0])){   
                            $this->form_validation->set_rules('send_to_member', $this->lang->line('label_select_memebr'), 'trim|required');
                       }
                       if(sizeof($this->data['send_to_member'])==1){
                           $this->data['send_to_member'] = $this->data['send_to_member'][0];
                       }elseif(sizeof($this->data['send_to_member'])>1){
                           $this->data['send_to_member'] = implode(",",$this->data['send_to_member']);
                       }                            
                       $article_data['send_to_member'] =  $this->data['send_to_member'];
                }
                
                        if(sizeof($this->data['send_to_group'])==1){
                            $this->data['send_to_group'] = $this->data['send_to_group'][0];
                            $article_data['send_to_group'] =  $this->data['send_to_group'];
                        }elseif(sizeof($this->data['send_to_group'])>1){
                            $this->data['send_to_group'] = implode(",",$this->data['send_to_group']);
                            $article_data['send_to_group'] =  $this->data['send_to_group'];
                        }  
                       
                }
            }*/

            $this->form_validation->set_rules('article_title', $this->lang->line('label_title'), 'trim|required');
            $this->form_validation->set_rules('publish_date', $this->lang->line('label_publish_date'), 'trim|required');
            $this->form_validation->set_rules('importance', $this->lang->line('label_importance'), 'trim|required');
            $this->form_validation->set_rules('article_type', $this->lang->line('label_article_type'), 'trim|required');
            $this->form_validation->set_rules('expire_date', $this->lang->line('label_expire_date'), 'trim|required');
            
            if($this->data['post_article']=="create_article"){
                $this->form_validation->set_rules('article_text', $this->lang->line('label_text'), 'trim|required');
        }
        
            if(!$this->data['article_details'][0]->uploaded_article){
                if((!$uploaded_article && $this->data['post_article']=="upload_article")){
                    $this->form_validation->set_rules('uploaded_article', $this->lang->line('label_upload_file'), 'trim|required');
                }
            }

            if ($this->form_validation->run() == FALSE || !empty($error_data['publish_date_error']) || !empty($error_data['expire_date_error'])) {     
                //$this->data['article_details'] = $this->info_model->get_article_details_by_article_id($article_id,$this->session->userdata('member_org'));
                $this->load->vars($error_data);  
                $this->data['dynamicView'] = 'pages/organization/mainboard/edit_article'; 
                //$this->_commonPageLayout('frontend_viewer');
            } 
            else{              
                $max_article_id = $this->info_model->get_max_article_id();
                $max_article_id = $max_article_id[0]->max_art_id+1;                
                $article_data['org_id'] = $org_id;
                $article_data['member_id'] = $mem_id;
                $article_data['article_title'] = $this->data['article_title'];
                $article_data['article_text'] = $this->data['article_text'];
                $article_data['article_color_code'] = $this->data['article_color_code'];
                $article_data['publish_date'] = $this->data['publish_date'];
                $article_data['importance'] = $this->data['importance'];
                $article_data['article_category'] = $this->data['article_category'];
                $article_data['article_type'] = $this->data['article_type'];
                $article_data['expire_date'] = $this->data['expire_date'];                
                //$article_data['send_article_by'] = $this->data['send_article_by'];
               // $article_data['send_notification_by'] = $this->data['send_notification_by'];                
                $article_data['add_date'] = date("Y-m-d H:i:s");   
                if($this->data['article_reminder_email_time']){
                         $article_data['article_reminder_email_time'] = $this->data['article_reminder_email_time']."-".$this->data['article_reminder_email_time_unit'];
                }
               
                if(sizeof($article_data['send_article_by'])==1){                   
                    $article_data['send_article_by'] = $article_data['send_article_by'][0];
                }elseif(sizeof($article_data['send_article_by'])==2){
                    $article_data['send_article_by'] = implode(",",$article_data['send_article_by']);
                }
            
             if(sizeof($article_data['send_notification_by'])==1){
                    $article_data['send_notification_by'] = $article_data['send_notification_by'][0];
                }elseif(sizeof($article_data['send_notification_by'])==2){
                    $article_data['send_notification_by'] = implode(",",$article_data['send_notification_by']);
        }
        
        if(isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH']<=2097152){  
            if(!empty($uploaded_article)){
                        
                        $mkdirpath = "./main_board_article/";
                        $file_type1 = explode(".",$uploaded_article);
                        $extension = strtolower($file_type1[count($file_type1)-1]);
                        if($extension=='doc' || $extension=='docx' || $extension=='pdf'){
                            $filePath = "./main_board_article/".$this->data['article_details'][0]->uploaded_article;
                            if(file_exists($filePath)){
                                unlink($filePath);
                            }
                         if(strstr($this->data['article_details'][0]->send_article_by, "Letter")=="Letter"){     
                                $letter_article = substr_replace($this->data['article_details'][0]->uploaded_article, "letter", 0, 7); 
                                $filePath = "./org_member_letter/".$letter_article;
                                if(file_exists($filePath)){
                                    unlink($filePath);
                                    $uploaded_article_letter_removed = TRUE;
                                }
                            }
                            $temp=$mkdirpath;
                            $filename=$_FILES['uploaded_article']['name']; 
                            $tmp=$_FILES['uploaded_article']['tmp_name']; 
                            $uploaded_article = "article_".$article_data['article_title']."_".$article_id.".".$extension;
                            //////////////////////////////
                               if($tmp){
                                        $attachment_name = $uploaded_article; 
                                        $fp = fopen($tmp, "rb"); //Open it
                                        $attachedfile_tmp = fread($fp, filesize($tmp)); //Read it
                                        $attachedfile = chunk_split(base64_encode($attachedfile_tmp)); //Chunk it up and encode it as base64 so it can emailed
                                        fclose($fp); 
                                    }
                            /////////////////////////////
                            $temp=$temp.basename($uploaded_article);
                            move_uploaded_file($tmp,$temp);
                            $file_uploaded_success = TRUE;
                            $article_letter_path = "./org_member_letter/";
                            $uploaded_article_letter = $article_letter_path."letter_".$article_data['article_title']."_".$article_id.".".$extension;
                            //$article_data['uploaded_letter'] = "letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                            copy($temp, $uploaded_article_letter);
                        }else{                            
                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('file_type_not_supported_error').'</div>';
                            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                            $this->_commonPageLayout('frontend_viewer');                            
                        }
                }
            }else{          
                        $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_max_file_upload_size').'</div>';
                        $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                        $this->_commonPageLayout('frontend_viewer');
                    }
        
                if($file_uploaded_success){
                    $article_data['uploaded_article'] = $uploaded_article;
                }
                if($uploaded_article_removed){$article_data['uploaded_article'] = "";}
                $update_article_success = $this->info_model->update_mainboard_article($article_data, $article_id);
                
                /*if($inserted_article_id && ($this->data['publish_date'] == $todate ) ){
                       $article_data['art_inserted_article_id'] = $inserted_article_id;                    
                       $org_info = $this->info_model->get_organization_info_by_id($org_id);
                       $article_category_info = $this->info_model->get_category($article_data['article_category']);
                       if($article_data['send_to_group']){
                            $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($article_data['send_to_group']);
                            if($mem_assigned_to_group){                                
                                foreach($mem_assigned_to_group as $group_mem){
                                    $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                                }
                            }
                       }
                      
                      if($group_mem_id){
                              $group_mem_id = rtrim ($group_mem_id,',');
                      }
                   
                       $article_data['receiver_members_id'] = $group_mem_id.",".$article_data['send_to_member'];
                       
                       if($org_info){$article_data['org_name'] = $org_info[0]->org_name;}
                       if($article_category_info){$article_data['art_category_name'] = $article_category_info[0]->category_name;}
                       else{$article_data['art_category_name'] ="Default";}
                   
                  
                        if($this->data['send_article_by']){
                            
                            foreach($this->data['send_article_by'] as $key=>$value){
                                if($value=="Email"){
                                    $this->send_article_by_email($article_data, "send_article", $attachment_name, $attachedfile);
                                }elseif($value=="Letter"){echo "here";exit;
                                    if(!empty($uploaded_article) && $file_uploaded_success){           
                                    
                                            $article_letter_path = "./org_member_letter/";
                                            $uploaded_article_letter = $article_letter_path."letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                                            $article_data['uploaded_letter'] = "letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                                            copy($temp, $uploaded_article_letter);
                                    }
                                    $this->send_article_by_letter($article_data, $inserted_article_id);
                                }
                            }
                        }
                        if($this->data['send_notification_by']){
                            foreach($this->data['send_notification_by'] as $key=>$value){
                                if($value=="Email"){
                                   $this->send_article_by_email($article_data , "send_notification", $attachedfile);
                                }elseif($value=="SMS"){
                                    $this->send_article_by_sms($article_data);
                                }
                            }
                        }                                    
            }*/
            if($update_article_success){                
                        $this->session->set_flashdata('message2', '<div id="message1">'.$this->lang->line('main_board_article_update_success').'</div>');
                }
            elseif(!$inserted_article_id){                
                        $this->session->set_flashdata('message2', '<div id="message1">'.$this->lang->line('main_board_article_update_failure').'</div>');
            }
            
                redirect('organization/info/article_details/'.$article_id);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////
            
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post_no_access'; 
    }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_form);	   
        //$this->load->vars($data_previlize);	   
        $this->load->vars($article_category);	   
        //$this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * Load main board Proposed article Edit Form 
 *
 *@Param $article_id which contains article id
 *@access Private
 *@return main board Proposed article Edit Form 
 */ 
function edit_proposed_article($article_id){
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'article_proposal';     
        //$this->data['post_article'] = '';
        $this->data['expire_date_error'] = '';
        $this->data['publish_date_error'] = '';
        $this->data['file_upload_failed'] ="";
        $data_previlize = $this->check_member_type_previlize();     
         if($data_previlize['mainboard_change_article'] ) { 
             $this->data['article_details'] = $this->info_model->get_proposed_article_details_by_article_id($article_id,$data_previlize['member_org']);
             $this->data['mainboard_change_article'] = $data_previlize['mainboard_change_article'] ;
             $this->data['org_article_category'] = $this->info_model->get_org_article_category($data_previlize['member_org']); 
             $this->data['dynamicView'] = 'pages/organization/mainboard/edit_proposed_article';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/mainboard/edit_article_no_access';
        }   
        
        $this->_commonPageLayout('frontend_viewer'); 

}


/**
 * Process Proposed Article Edit 
 *
 *@access private
 *@return Success/Failure Message
 */
function edit_proposed_article_process(){    
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'article_proposal';
    $this->data['post_article'] = '';     
    $this->data['publish_date'] ="";
    $this->data['publish_date_intake'] ="";
    $this->data['expire_date'] ="";
    $this->data['expire_date_intake'] ="";
    $this->data['article_color_code'] ="";
    $this->data['file_upload_failed'] ="";
            
    $error_data['expire_date_error'] = "";
    $error_data['publish_date_error'] = "";
    $uploaded_article ="";
    $article_insert_id ="";
    $group_mem_id="";
    //$article_data['send_to_group'] ="";
    //$article_data['send_to_member'] ="";
    $this->data['article_text'] ="";
    $file_uploaded_success = FALSE;
    $temp ="";
    $attachment_name = "";
    $attachedfile = "";    
    $uploaded_article_removed = FALSE;
         $data_previlize = $this->check_member_type_previlize();     
         $mem_id = $this->session->userdata('mem_id');
         $org_id = $data_previlize['member_org'];
         $article_id =  $this->input->post("article_id"); 
         if( $data_previlize['mainboard_change_article'] ) { 
            $this->data['article_details'] = $this->info_model->get_proposed_article_details_by_article_id($article_id, $org_id);
           
            $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $org_id);                    
            $article_category['org_article_category'] = $this->info_model->get_org_article_category( $org_id ); 
            
            /////////////////////////////////////////////////////////////////////////////////////////////
            
            $this->load->library('form_validation');
            $this->data['post_article'] = $this->input->post('post_article');
            $this->data['article_title'] = $this->input->post('article_title');   
            $this->data['importance'] = $this->input->post('importance');
            $this->data['article_category'] = $this->input->post('article_category');
            $this->data['article_type'] = $this->input->post('article_type');
            
            if($this->input->post('publish_date')){
                $this->data['publish_date_intake'] = $this->input->post('publish_date');
                $this->data['publish_date'] = explode("-",$this->input->post('publish_date'));
                $this->data['publish_date'] = mktime(0, 0, 0, ($this->data['publish_date'][1]), $this->data['publish_date'][2], $this->data['publish_date'][0]);
                $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($this->data['publish_date'] < $todate ){
                        $error_data['publish_date_error'] = $this->lang->line('article_publish_date_error');
                }   
            }        
            
            if($this->input->post('expire_date')){
                $this->data['expire_date_intake'] = $this->input->post('expire_date');
                $this->data['expire_date'] = explode("-",$this->input->post('expire_date'));
                $this->data['expire_date'] = mktime(0, 0, 0, ($this->data['expire_date'][1]), $this->data['expire_date'][2], $this->data['expire_date'][0]);
                if(empty($error_data['publish_date_error']) && $this->data['publish_date'] >= $this->data['expire_date']){
                        $error_data['expire_date_error'] = $this->lang->line('article_expire_date_error');
                }
            }
            
            

            if($this->data['post_article']=="create_article"){
              
               //echo $send_article_by = strstr($this->data['article_details'][0]->send_article_by, "Letter"); exit;
                $uploaded_article ="";
                $this->data['article_text'] = $this->input->post('article_text');
                $this->data['article_color_code'] = $this->input->post('rgb2');
                if($this->data['article_details'][0]->uploaded_article){                    
                    $filePath = "./main_board_article/".$this->data['article_details'][0]->uploaded_article;
                    if(file_exists($filePath)){
                        unlink($filePath);
                        $uploaded_article_removed = TRUE;
                    }
                }
                if(strstr($this->data['article_details'][0]->send_article_by, "Letter")=="Letter"){      
                    $letter_article = substr_replace($this->data['article_details'][0]->uploaded_article, "letter", 0, 7); 
                    $filePath = "./org_member_letter/".$letter_article;
                    if(file_exists($filePath)){
                        unlink($filePath);
                        $uploaded_article_letter_removed = TRUE;
                    }
                }
            }
            elseif($this->data['post_article']=="upload_article"){
                $uploaded_article = $_FILES['uploaded_article']['name']; 
        }      
        
            $this->data['uploaded_article'] = $uploaded_article;
            $this->data['send_by'] = "";
            //$this->data['send_by'] = $this->input->post('send_by');
            //$this->data['send_article_by'] = $this->input->post('send_article_by');
            //$this->data['send_notification_by'] = $this->input->post('send_notification_by');
            $this->data['article_reminder_email_time'] = $this->input->post('article_reminder_email_time');
            $this->data['article_reminder_email_time_unit'] = $this->input->post('article_reminder_email_time_unit');
            //$this->data['select_member'] = $this->input->post('select_member');
            //$this->data['send_to_group'] = $this->input->post('send_to_group');
            //$this->data['send_to_member'] = $this->input->post('send_to_member');

            /*if($this->data['send_by']){
                if(empty($this->data['send_article_by']) && empty($this->data['send_notification_by'])){
                    $this->form_validation->set_rules('send_article_by', $this->lang->line('label_article_sending_way'), 'trim|required');
                }
                elseif($this->data['send_by'] && ($this->data['send_article_by']  || $this->data['send_notification_by']) ){
                    if(empty($this->data['send_to_group']) && empty($this->data['select_member'])){
                        $this->form_validation->set_rules('send_to_group', $this->lang->line('label_send_to'), 'trim|required');
                    }       
                    elseif($this->data['select_member']){
                        $send_to_member_list = $this->data['send_to_member'];                                             
                        if(!isset($send_to_member_list[0])){   
                            $this->form_validation->set_rules('send_to_member', $this->lang->line('label_select_memebr'), 'trim|required');
                       }
                       if(sizeof($this->data['send_to_member'])==1){
                           $this->data['send_to_member'] = $this->data['send_to_member'][0];
                       }elseif(sizeof($this->data['send_to_member'])>1){
                           $this->data['send_to_member'] = implode(",",$this->data['send_to_member']);
                       }                            
                       $article_data['send_to_member'] =  $this->data['send_to_member'];
                }
                
                        if(sizeof($this->data['send_to_group'])==1){
                            $this->data['send_to_group'] = $this->data['send_to_group'][0];
                            $article_data['send_to_group'] =  $this->data['send_to_group'];
                        }elseif(sizeof($this->data['send_to_group'])>1){
                            $this->data['send_to_group'] = implode(",",$this->data['send_to_group']);
                            $article_data['send_to_group'] =  $this->data['send_to_group'];
                        }  
                       
                }
            }*/

            $this->form_validation->set_rules('article_title', $this->lang->line('label_title'), 'trim|required');
            $this->form_validation->set_rules('publish_date', $this->lang->line('label_publish_date'), 'trim|required');
            $this->form_validation->set_rules('importance', $this->lang->line('label_importance'), 'trim|required');
            $this->form_validation->set_rules('article_type', $this->lang->line('label_article_type'), 'trim|required');
            $this->form_validation->set_rules('expire_date', $this->lang->line('label_expire_date'), 'trim|required');
            
            if($this->data['post_article']=="create_article"){
                $this->form_validation->set_rules('article_text', $this->lang->line('label_text'), 'trim|required');
        }
        
            if(!$this->data['article_details'][0]->uploaded_article){
                if((!$uploaded_article && $this->data['post_article']=="upload_article")){
                    $this->form_validation->set_rules('uploaded_article', $this->lang->line('label_upload_file'), 'trim|required');
                }
            }

            if ($this->form_validation->run() == FALSE || !empty($error_data['publish_date_error']) || !empty($error_data['expire_date_error'])) {     
                $this->load->vars($error_data);  
                $this->data['dynamicView'] = 'pages/organization/mainboard/edit_proposed_article'; 
                //$this->_commonPageLayout('frontend_viewer');
            } 
            else{              
                $max_article_id = $this->info_model->get_max_article_id();
                $max_article_id = $max_article_id[0]->max_art_id+1;                
                $article_data['org_id'] = $org_id;
                $article_data['member_id'] = $mem_id;
                $article_data['article_title'] = $this->data['article_title'];
                $article_data['article_text'] = $this->data['article_text'];
                $article_data['article_color_code'] = $this->data['article_color_code'];
                $article_data['publish_date'] = $this->data['publish_date'];
                $article_data['importance'] = $this->data['importance'];
                $article_data['article_category'] = $this->data['article_category'];
                $article_data['article_type'] = $this->data['article_type'];
                $article_data['expire_date'] = $this->data['expire_date'];                
                //$article_data['send_article_by'] = $this->data['send_article_by'];
                //$article_data['send_notification_by'] = $this->data['send_notification_by'];                
                $article_data['add_date'] = date("Y-m-d H:i:s");   
                if($this->data['article_reminder_email_time']){
                         $article_data['article_reminder_email_time'] = $this->data['article_reminder_email_time']."-".$this->data['article_reminder_email_time_unit'];
                }
               
                /*if(sizeof($article_data['send_article_by'])==1){                   
                    $article_data['send_article_by'] = $article_data['send_article_by'][0];
                }elseif(sizeof($article_data['send_article_by'])==2){
                    $article_data['send_article_by'] = implode(",",$article_data['send_article_by']);
                }
            
             if(sizeof($article_data['send_notification_by'])==1){
                    $article_data['send_notification_by'] = $article_data['send_notification_by'][0];
                }elseif(sizeof($article_data['send_notification_by'])==2){
                    $article_data['send_notification_by'] = implode(",",$article_data['send_notification_by']);
             }*/
        
        if(isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH']<=2097152){  
            if(!empty($uploaded_article)){
                        
                        $mkdirpath = "./main_board_article/";
                        $file_type1 = explode(".",$uploaded_article);
                        $extension = strtolower($file_type1[count($file_type1)-1]);
                        if($extension=='doc' || $extension=='docx' || $extension=='pdf'){
                            $filePath = "./main_board_article/".$this->data['article_details'][0]->uploaded_article;
                            if(file_exists($filePath)){
                                unlink($filePath);
                            }
                            if(strstr($this->data['article_details'][0]->send_article_by, "Letter")=="Letter"){     
                                $letter_article = substr_replace($this->data['article_details'][0]->uploaded_article, "letter", 0, 7); 
                                $filePath = "./org_member_letter/".$letter_article;
                                if(file_exists($filePath)){
                                    unlink($filePath);
                                    $uploaded_article_letter_removed = TRUE;
                                }
                            }
                        
                            $temp=$mkdirpath;
                            $filename=$_FILES['uploaded_article']['name']; 
                            $tmp=$_FILES['uploaded_article']['tmp_name']; 
                            $uploaded_article = "article_".$article_data['article_title']."_".$article_id.".".$extension;
                            //////////////////////////////
                               if($tmp){
                                        $attachment_name = $uploaded_article; 
                                        $fp = fopen($tmp, "rb"); //Open it
                                        $attachedfile_tmp = fread($fp, filesize($tmp)); //Read it
                                        $attachedfile = chunk_split(base64_encode($attachedfile_tmp)); //Chunk it up and encode it as base64 so it can emailed
                                        fclose($fp); 
                                    }
                            /////////////////////////////
                            $temp=$temp.basename($uploaded_article);
                            move_uploaded_file($tmp,$temp);
                            $file_uploaded_success = TRUE;
                            $article_letter_path = "./org_member_letter/";
                            $uploaded_article_letter = $article_letter_path."letter_".$article_data['article_title']."_".$article_id.".".$extension;
                            //$article_data['uploaded_letter'] = "letter_".$article_data['article_title']."_".$article_id.".".$extension;
                            copy($temp, $uploaded_article_letter);
                        }else{                            
                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('file_type_not_supported_error').'</div>';
                            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                            $this->_commonPageLayout('frontend_viewer');                            
                        }
                }
            }else{          
                        $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_max_file_upload_size').'</div>';
                        $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                        $this->_commonPageLayout('frontend_viewer');
                    }
        
                if($file_uploaded_success){
                    $article_data['uploaded_article'] = $uploaded_article;
                }
                if($uploaded_article_removed){$article_data['uploaded_article'] = "";}
                $update_article_success = $this->info_model->update_mainboard_article($article_data, $article_id);
                
                /*if($inserted_article_id && ($this->data['publish_date'] == $todate ) ){
                       $article_data['art_inserted_article_id'] = $inserted_article_id;                    
                       $org_info = $this->info_model->get_organization_info_by_id($org_id);
                       $article_category_info = $this->info_model->get_category($article_data['article_category']);
                       if($article_data['send_to_group']){
                            $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($article_data['send_to_group']);
                            if($mem_assigned_to_group){                                
                                foreach($mem_assigned_to_group as $group_mem){
                                    $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                                }
                            }
                       }
                      
                      if($group_mem_id){
                              $group_mem_id = rtrim ($group_mem_id,',');
                      }
                   
                       $article_data['receiver_members_id'] = $group_mem_id.",".$article_data['send_to_member'];
                       
                       if($org_info){$article_data['org_name'] = $org_info[0]->org_name;}
                       if($article_category_info){$article_data['art_category_name'] = $article_category_info[0]->category_name;}
                       else{$article_data['art_category_name'] ="Default";}
                   
                  
                        if($this->data['send_article_by']){
                            
                            foreach($this->data['send_article_by'] as $key=>$value){
                                if($value=="Email"){
                                    $this->send_article_by_email($article_data, "send_article", $attachment_name, $attachedfile);
                                }elseif($value=="Letter"){echo "here";exit;
                                    if(!empty($uploaded_article) && $file_uploaded_success){                                              
                                            $article_letter_path = "./org_member_letter/";
                                            $uploaded_article_letter = $article_letter_path."letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                                            $article_data['uploaded_letter'] = "letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                                            copy($temp, $uploaded_article_letter);
                                    }
                                    $this->send_article_by_letter($article_data, $inserted_article_id);
                                }
                            }
                        }
                        if($this->data['send_notification_by']){
                            foreach($this->data['send_notification_by'] as $key=>$value){
                                if($value=="Email"){
                                   $this->send_article_by_email($article_data , "send_notification", $attachedfile);
                                }elseif($value=="SMS"){
                                    $this->send_article_by_sms($article_data);
                                }
                            }
                        }                                    
            }*/
            if($update_article_success){                
                        $this->session->set_flashdata('message2', '<div id="message1">'.$this->lang->line('main_board_article_update_success').'</div>');
                }
            elseif(!$inserted_article_id){                
                        $this->session->set_flashdata('message2', '<div id="message1">'.$this->lang->line('main_board_article_update_failure').'</div>');
                }
                redirect('organization/info/proposed_article_details/'.$article_id);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////
            
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post_no_access'; 
    }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_form);	   
        //$this->load->vars($data_previlize);	   
        $this->load->vars($article_category);	   
        $this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * Proposed article approval process
 *
 *@Param $article_id which contains article id
 *@access Private
 *@return Success/Failure Message
 */ 
function approve_proposed_article($article_id){
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'article_proposal';     
    //$this->data['post_article'] = '';
    $this->data['expire_date_error'] = '';
    $this->data['publish_date_error'] = '';
    $this->data['file_upload_failed'] ="";
    $group_mem_id ="";
    $attachment_name = "";
    $attachedfile = "";
    $article_data['uploaded_letter'] = "";
    $article_data['created_letter']  = "";
    $data_previlize = $this->check_member_type_previlize();     
    $org_id = $data_previlize['member_org'];
    if($data_previlize['mainboard_change_article'] ) { 
        $success = $this->info_model->approved_proposed_article($article_id); 
        /////////////////////////// start success ///////////////////////////////
        if($success){
            $data_article = $this->info_model->get_article_details_by_article_id($article_id, $org_id);
            /////////////////////////// start data_article ///////////////////////////////
            if($data_article){                
                /////////////////////////// Start foreach /////////////////////////
                foreach($data_article as $rows){
                    /////////////////////////// start rows ///////////////////////////////
                       if($rows){
                            $article_data['art_inserted_article_id'] = $article_id;                    
                            $article_data['article_title'] = $rows->article_title;                    
                            $article_data['uploaded_article'] = $rows->uploaded_article;                    
                            $article_data['article_text'] = $rows->article_text;                    
                            $article_data['expire_date'] = $rows->expire_date;                   
                                             
                            $org_info = $this->info_model->get_organization_info_by_id($org_id);
                            $article_category_info = $this->info_model->get_category($article_id);
                            if($rows->send_to_group){
                                $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($rows->send_to_group);
                                if($mem_assigned_to_group){                                
                                    foreach($mem_assigned_to_group as $group_mem){
                                        $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                                    }
                                }
                            }
                            if($group_mem_id){
                                $group_mem_id = rtrim ($group_mem_id,',');
                            }
                            $article_data['receiver_members_id'] = $group_mem_id.",".$rows->send_to_member;
                            if($org_info){$article_data['org_name'] = $org_info[0]->org_name;}
                            if($article_category_info){$article_data['art_category_name'] = $article_category_info[0]->category_name;}
                            else{$article_data['art_category_name'] ="Default";}
                            
                            if(strpos($rows->send_article_by, ',') !== FALSE){
                              $send_article_by = explode(",",$rows->send_article_by);
                            }else{$send_article_by = array($rows->send_article_by);}  
                            
                            if(sizeof($send_article_by)>0){
                                foreach($send_article_by as $key=>$value){
                                    if($value=="Email"){
                                        if($rows->uploaded_article){
                                            $article_path = "./main_board_article/".$rows->uploaded_article;
                                            $attachment_name = $rows->uploaded_article; 
                                            $fp = fopen($article_path, "rb"); //Open it
                                            $attachedfile_tmp = fread($fp, filesize($article_path)); //Read it
                                            $attachedfile = chunk_split(base64_encode($attachedfile_tmp)); //Chunk it up and encode it as base64 so it can emailed
                                            fclose($fp); 
                                        }
                                        $this->send_article_by_email($article_data, "send_article", $attachment_name, $attachedfile);
                                    }elseif($value=="Letter"){//echo "here";exit;
                                        if($rows->uploaded_article){
                                            $article_data['uploaded_letter'] = substr_replace($article_data['uploaded_article'], "letter", 0, 7); 
                                        }else{ $article_data['created_letter'] = "letter_".$article_data['article_title']."_".$article_id.".pdf";   }
                                        $this->send_article_by_letter($article_data, $article_id);
                                    }
                                }
                            }                            
                             if(strpos($rows->send_notification_by, ',') !== FALSE){
                              $send_notification_by = explode(",",$rows->send_notification_by);
                            }else{$send_notification_by = array($rows->send_notification_by);}  
                            
                            if(sizeof($send_notification_by)>0){
                                foreach($send_notification_by as $key=>$value){
                                    if($value=="Email"){
                                        $this->send_article_by_email($article_data , "send_notification", "","");
                                    }elseif($value=="SMS"){
                                        $this->send_article_by_sms($article_data);
                                    }
                                }
                            }                                    
                        }///////////////////////////// End Rows ////////////////////////////
                }/////////////////////////// End foreach /////////////////////////

            }/////////////////////////// End data_article ///////////////////////////////

            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('proposed_article_approved_success').'</div>');
       }else{
                 $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('main_board_article_post_failure').'</div>');
           }
        redirect('organization/info/article_proposal');
    }
    else{
        $this->data['dynamicView'] = 'pages/organization/mainboard/article_proposal_no_access';
    }   
        //$this->_commonPageLayout('frontend_viewer'); 
}

    function viewed_mainboard() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        @$art_cat = $this->uri->segment(4);
        @$start = $this->uri->segment(5);
        $article_category = $this->input->post("article_category");
        if ($article_category == ""):
            $article_category = $art_cat;
        else:
            $article_category = $article_category;
        endif;
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/viewed_mainboard/" . $article_category . "/");
        $this->p_config['uri_segment'] = 5;
        $this->p_config['num_links'] = 4;
        $this->p_config['total_rows'] = $this->info_model->view_mainboard(0, 0, $article_category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_mainboard($start, $perPage, $article_category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/mainboard/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function mainboard_viewed($id=NULL) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        @$art_cat = $this->uri->segment(4);
        @$start = $this->uri->segment(5);
        $article_category = $id;
        if ($article_category == ""):
            $article_category = $art_cat;
        else:
            $article_category = $article_category;
        endif;
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/mainboard_viewed/" . $article_category . "/");
        $this->p_config['uri_segment'] = 5;
        $this->p_config['num_links'] = 4;
        $this->p_config['total_rows'] = $this->info_model->view_mainboard(0, 0, $article_category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_mainboard($start, $perPage, $article_category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/mainboard/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard_post_detail($id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/mainboard/post_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function mainboard_post_detail($id) {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_article';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/mainboard/post_view_archive';
        $this->_commonPageLayout('frontend_viewer');
    }
    function mainboard_post_detail12($id) {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'article_archive';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/mainboard/post_view_archive';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_expired_membership() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_expired_member';
        $this->data['dynamicView'] = 'pages/organization/expired_member/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_forum_post1() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $this->data['dynamicView'] = 'pages/organization/forum/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_forum_post() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_forum_post");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_forum_post()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_forum_post($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/forum/view_post';
        $this->_commonPageLayout('frontend_viewer');


        /* $this->data['mainTab'] = 'forum_member';
          $this->data['activeTab'] = 'forum';
          $this->data['dynamicView'] = 'pages/member/forum/view_post';
          $this->_commonPageLayout('frontend_viewer'); */
    }

    function view_forum_post_detail($id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/forum/post_detail';
        $this->_commonPageLayout('frontend_viewer');
    }

    function delete_forum_post($id = NULL, $pid=NULL) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $this->info_model->delete_forum_post($id);
        redirect('organization/info/view_forum_post_detail/' . $pid);
    }

    function archive_forum_comments($id, $pid) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $query = $this->db->query("select * from forum_comment where id='" . $id . "'");
        foreach ($query->result() as $info):
            $comment_id = $info->id;
            $post_id = $info->post_id;
            $comment = $info->comment;
            $posted_by = $info->posted_by;
        endforeach;
        $data = array(
            'comment_id' => $comment_id,
            'post_id' => $post_id,
            'comment' => $comment,
            'posted_by' => $posted_by,
            'archive_by' => $this->session->userdata('user_id')
        );
        $this->info_model->archive_forum_comments_insert($data);
        $this->info_model->delete_archive_comment($id);
        redirect('organization/info/view_forum_post_detail/' . $pid);
    }

function view_member_profile($mem_id) {
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'my_profile';
    $data_previlize = $this->check_member_type_previlize();
    if($data_previlize['view_member_profile'] || $mem_id == $this->session->userdata('mem_id') ){
        $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id);             
        $this->data['dynamicView'] = 'pages/organization/members/profile_view';
    }else{                    
        $this->data['dynamicView'] = 'pages/organization/home/my_profile_no_access';            
    }
    $this->load->vars($data_previlize);
    $this->_commonPageLayout('frontend_viewer');
}

    function member_profile($id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/profile_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_org_previlize() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'previlige_edit';
        $this->data['dynamicView'] = 'pages/organization/previlige/previlize_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function viewed_org_previlize() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'previlige_edit';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/previlige/previlize_view';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $user_type = $this->input->post("user_type");
            $query = $this->db->query("select * from member_previlige where user_type='" . $user_type . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">No setting found for this userType.</div>');
                redirect('organization/info/viewed_org_previlize');
            } else {
                $this->data['usertype'] = $this->input->post("user_type");
                $this->data['dynamicView'] = 'pages/organization/previlige/edit';
                $this->_commonPageLayout('frontend_viewer');
            }
        }
    }

    function update_previlize() {
        $data = array(
            //mainboard
            'mainboard_access_main' => $this->input->post("mainboard_access_main"),
            'mainboard_send_proposal' => $this->input->post("mainboard_send_proposal"),
            'mainboard_change_article' => $this->input->post("mainboard_change_article"),
            'mainboard_send_notification' => $this->input->post("mainboard_send_notification"),
            'mainboard_sending_out' => $this->input->post("mainboard_sending_out"),
            'mainboard_manually_archive' => $this->input->post("mainboard_manually_archive"),
            //forum
            'forum_access' => $this->input->post("forum_access"),
            'forum_comments' => $this->input->post("forum_comments"),
            'forum_delete_won_comments' => $this->input->post("forum_delete_won_comments"),
            'forum_delete_any_coments' => $this->input->post("forum_delete_any_coments"),
            'forum_manual_comments' => $this->input->post("forum_manual_comments"),
            //Members
            'member_login_logout' => $this->input->post("member_login_logout"),
            'member_change_profile' => $this->input->post("member_change_profile"),
            'member_change_password' => $this->input->post("member_change_password"),
            //Configuration org
            'configuration_view_org' => $this->input->post("configuration_view_org"),
            'configuration_change_org' => $this->input->post("configuration_change_org"),
            'configuration_visibility' => $this->input->post("configuration_visibility"),
            'configuration_switching' => $this->input->post("configuration_switching"),
            'configuration_create_address' => $this->input->post("configuration_create_address"),
            //Communication
            'communication_send_email' => $this->input->post("communication_send_email"),
            'communication_send_sms' => $this->input->post("communication_send_sms"),
            'communication_send_letters' => $this->input->post("communication_send_letters"),
            //Economics
            'economics_register' => $this->input->post("economics_register"),
            'economics_send_payment' => $this->input->post("economics_send_payment"),
            'economics_check_complete' => $this->input->post("economics_check_complete"),
            'economics_watch_total_income' => $this->input->post("economics_watch_total_income"),
            'economics_watch_total_cost' => $this->input->post("economics_watch_total_cost"),
            'economics_watch_statistics' => $this->input->post("economics_watch_statistics"),
            //History
            'history_access_articles' => $this->input->post("history_access_articles"),
            'history_access_comments' => $this->input->post("history_access_comments"),
            'history_user_actions' => $this->input->post("history_user_actions"),
            'history_old_letters' => $this->input->post("history_old_letters"),
            'history_old_sms' => $this->input->post("history_old_sms"),
            'history_old_emails' => $this->input->post("history_old_emails"),
            //Members
            'members_decide' => $this->input->post("members_decide"),
            'members_add_change' => $this->input->post("members_add_change"),
            'members_c_group' => $this->input->post("members_c_group"),
            'members_add_user' => $this->input->post("members_add_user"),
            'members_user_types' => $this->input->post("members_user_types"),
            'members_add_usertype' => $this->input->post("members_add_usertype"),
        );
        $this->info_model->previlige_usertype_update($data);
        $this->session->set_flashdata('message', '<div id="message1">Previlize settings updated successfully.</div>');
        redirect('organization/info/viewed_org_previlize');
    }

    function view_org_external_previlize() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'external_previlige_edit';
        $this->data['dynamicView'] = 'pages/organization/previlige/previlize_view_external';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_external_previlize() {
        $data = array(
            'external_mainboard' => $this->input->post("external_mainboard"),
            'external_presentation' => $this->input->post("external_presentation"),
        );
        $this->info_model->previlige_external_update($data);
        $this->session->set_flashdata('message', '<div id="message1">Previlize settings updated successfully.</div>');
        redirect('organization/info/view_org_external_previlize');
    }

    function add_external_letter($start=0) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_external_letter';
        $this->data['dynamicView'] = 'pages/organization/letter/external_entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_external_letter($start=0) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_external_letter';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('letter_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('letter_text', 'Text', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/letter/external_entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $b = $this->input->post("checkbox");
            if (empty($b)) {
                $this->session->set_flashdata('message', '<div id="message">Please check the sender name.</div>');
                redirect('organization/info/add_external_letter');
            } else {
                $data = array(
                    'title' => $this->input->post('letter_title'),
                    'text' => $this->input->post('letter_text'),
                    'org_id' => $this->session->userdata('user_id'),
                    'letter_header' => $this->input->post('letter_header'),
                    'letter_footer' => $this->input->post('letter_footer'),
                    'sending_date' => date("Y-m-d"),
                    'admin_status' => 2,
                    'superadmin_status' => 1,
                    'letter_status' => 2,
                );
                $this->info_model->letter_insert($data);
                $letter_id = $this->db->insert_id();
                $a = $this->input->post("checkbox");
                for ($i = 0; $i < sizeof($a); $i++):
                    $data1 = array(
                        'member_id' => $a[$i],
                        'letter_id' => $letter_id,
                        'org_id' => $this->session->userdata('user_id'),
                        'admin_status' => 2,
                        'superadmin_status' => 1,
                        'letter_status' => 2
                    );
                    $this->info_model->letter_request_insert($data1);
                endfor;
                $total_no_of_letter = sizeof($a);
                $data2 = array(
                    'sending_date' => date('Y-m-d'),
                    'sender_name' => 0,
                    'no_of_letter' => $total_no_of_letter,
                    'org_id' => $this->session->userdata('user_id'),
                    'letter_id' => $letter_id,
                    'status' => 2
                );
                $this->info_model->total_letter_insert($data2);
                $this->session->set_flashdata('message', '<div id="message1">Leter request send successfully.</div>');
                redirect('organization/info/add_external_letter');
            }
        }
    }

    function header_view($id=NULL) {
        if ($id != ""):
            $query = $this->db->query("select * from letter_header where id='" . $id . "'");
            foreach ($query->result() as $info):
                echo $text = $info->text;
            endforeach;
        endif;
    }

    function footer_view($id=NULL) {
        if ($id != ""):
            $query = $this->db->query("select * from letter_footer where id='" . $id . "'");
            foreach ($query->result() as $info):
                echo $text = $info->text;
            endforeach;
        endif;
    }

    function add_letter($start=0) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_letter';
        $this->data['dynamicView'] = 'pages/organization/letter/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_letter($start=0) {
        
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_letter';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('letter_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('letter_text', 'Text', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/letter/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $post_member = $this->input->post("checkbox");
            $post_group = $this->input->post("checkbox1");
            if (!empty($post_member) || !empty($post_group)) {
                $data = array(
                    'title' => $this->input->post('letter_title'),
                    'text' => $this->input->post('letter_text'),
                    'org_id' => $this->session->userdata('user_id'),
                    'letter_header' => $this->input->post('letter_header'),
                    'letter_footer' => $this->input->post('letter_footer'),
                    'sending_date' => date("Y-m-d"),
                    'admin_status' => 2,
                    'superadmin_status' => 1,
                );
                $this->info_model->letter_insert($data);
                $letter_id = $this->db->insert_id();
                
                if (!empty($post_member)) {
                    for ($i = 0; $i < sizeof($post_member); $i++):
                        $data1 = array(
                            'member_id' => $post_member[$i],
                            'letter_id' => $letter_id,
                            'org_id' => $this->session->userdata('user_id'),
                            'admin_status' => 2,
                            'superadmin_status' => 1
                        );
                        $this->info_model->letter_request_insert($data1);
                    endfor;
            }
            
            
                $j = 0;
                if (!empty($post_group)) {
                    for ($i = 0; $i < sizeof($post_group); $i++):
                        $group_id = $post_group[$i];
                        $this->data['group_member'] = $this->info_model->get_group_member($group_id);
                        foreach ($this->data['group_member'] as $g_member_info):
                            $data1 = array(
                                'member_id' => $g_member_info->id,
                                'letter_id' => $letter_id,
                                'org_id' => $this->session->userdata('user_id'),
                                'admin_status' => 2,
                                'superadmin_status' => 1
                            );
                            $this->info_model->letter_request_insert($data1);
                            $j = $j + 1;
                        endforeach;

                    endfor;
                }
               
                $total_no_of_letter = sizeof($post_member) + $j;

                $data2 = array(
                    'sending_date' => date('Y-m-d'),
                    'sender_name' => 0,
                    'no_of_letter' => $total_no_of_letter,
                    'org_id' => $this->session->userdata('user_id'),
                    'letter_id' => $letter_id,
                    'status' => 2
                );
                $this->info_model->total_letter_insert($data2);
                $this->session->set_flashdata('message', '<div id="message1">Leter request send successfully.</div>');
                
                redirect('organization/info/add_letter');
            }
            else {
                $this->session->set_flashdata('message', '<div id="message">Please Select Sender Name.</div>');
                redirect('organization/info/add_letter');
            }
        }
    }


    function pview_archive_article() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_article';
        $this->data['dynamicView'] = 'pages/organization/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_article() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_article';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_archive_article");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_article()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_article($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }
     function article_archive() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'article_archive';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/article_archive");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_article1()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_article1($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/article_view1';
        $this->_commonPageLayout('frontend_viewer');
    }
    
    

    function view_archive_article_sort() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_article';
        @$ar_sort = $this->uri->segment(4);
        @$ar_sort1 = $this->uri->segment(5);
        @$start = $this->uri->segment(6);

        $category = $this->input->post("article_category");
        if ($category == "") {
            $category = $ar_sort1;
        } else {
            $category = $category;
        }
        $id = $this->input->post("article_type");
        if ($id == "") {
            $id = $ar_sort;
        } else {
            $id = $id;
        }
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_archive_article_sort/" . $id . "/" . $category . "/");
        $this->p_config['uri_segment'] = 6;
        $this->p_config['num_links'] = 5;
        $this->p_config['total_rows'] = $this->info_model->view_article_sort(0, 0, $id, $category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_article_sort($start, $perPage, $id, $category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }
    function view_archive_article_sort1() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'article_archive';
        @$ar_sort = $this->uri->segment(4);
        @$ar_sort1 = $this->uri->segment(5);
        @$start = $this->uri->segment(6);

        $category = $this->input->post("article_category");
        if ($category == "") {
            $category = $ar_sort1;
        } else {
            $category = $category;
        }
        $id = $this->input->post("article_type");
        if ($id == "") {
            $id = $ar_sort;
        } else {
            $id = $id;
        }
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_archive_article_sort1/" . $id . "/" . $category . "/");
        $this->p_config['uri_segment'] = 6;
        $this->p_config['num_links'] = 5;
        $this->p_config['total_rows'] = $this->info_model->view_article_sort1(0, 0, $id, $category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_article_sort1($start, $perPage, $id, $category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/article_view1';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_letter() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_letter';
        $this->data['dynamicView'] = 'pages/organization/archive/letter_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_comments() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_comments';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_archive_comments");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_comment()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_comment($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/comment_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_address() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'add_address';
        $this->data['dynamicView'] = 'pages/organization/address/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_address() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'add_address';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('address_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/address/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'org_id' => $this->session->userdata('user_id'),
                'address_title' => $this->input->post('address_title'),
                'address' => $this->input->post('address')
            );
            $this->info_model->address_list_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Address list Inserted Successfully.</div>');
            redirect('organization/info/add_address');
        }
    }

    function view_address_list() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_list';
        $this->data['query1'] = $this->info_model->view_address_list();
        $this->data['dynamicView'] = 'pages/organization/address/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function address_edit($id=NULL) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_list';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_all_address($id);
            $this->data['dynamicView'] = 'pages/organization/address/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('address_title', 'Title', 'trim|required');
            $val->set_rules('address', 'Address', 'trim|required');

            if ($val->run()) {
                $data = array(
                    'address_title' => $this->input->post('address_title'),
                    'address' => $this->input->post('address')
                );
                $this->session->set_flashdata('message', '<div id="message1">Address list Updated Successfully.</div>');
                $this->info_model->address_list_update($data);
                redirect('organization/info/view_address_list', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function address_delete($id = NULL) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_list';
        $this->info_model->address_delete($id);
        redirect('organization/info/view_address_list', 'location', 301);
    }

    function org_profile_setting() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->data['dynamicView'] = 'pages/organization/profile/org_profile_ previlize';
        $this->_commonPageLayout('frontend_viewer');
    }

    function org_profile_update() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_number', 'Org Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_primary_address', 'Org Primary Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_optional_address', 'Org Oprional Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area_name', 'Area Name', 'trim|required');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|xss_clean|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|xss_clean|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('card_no', 'Card No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cvv2_no', 'Cvv2 No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name_on_card', 'Name On card', 'trim|required|xss_clean');
        $this->form_validation->set_rules('package_name', 'Package name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_of_member', 'No of member', 'trim|required|xss_clean');
        $this->form_validation->set_rules('duration', 'Duration', 'trim|required|xss_clean');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description of org', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/profile/org_profile_ previlize';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $org_id = $this->session->userdata('user_id');
            $this->data['record'] = $this->info_model->view_org_profile_seeting($org_id);
            if (count($this->data['record'])) {
                $data = array(
                    'org_number' => $this->input->post('org_number'),
                    'org_name' => $this->input->post('org_name'),
                    'org_primary_address' => $this->input->post('org_primary_address'),
                    'org_optional_address' => $this->input->post('org_optional_address'),
                    'org_phone' => $this->input->post('org_phone'),
                    'area_name' => $this->input->post('area_name'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone_no' => $this->input->post('phone_no'),
                    'address' => $this->input->post('address'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'description' => $this->input->post('description'),
                    'card_no' => $this->input->post('card_no'),
                    'expire_date' => $this->input->post('expire_date'),
                    'cvv2_no' => $this->input->post('cvv2_no'),
                    'name_on_card' => $this->input->post('name_on_card'),
                    'package_name' => $this->input->post('package_name'),
                    'no_of_member' => $this->input->post('no_of_member'),
                    'duration' => $this->input->post('duration'),
                    'amount' => $this->input->post('amount')
                );
                $this->info_model->org_profile_setting_update($data, $org_id);
                $this->session->set_flashdata('message', '<div id="message1">Profile Setting updated successfully.</div>');
                redirect('organization/info/org_profile_setting');
            } else {
                $data = array(
                    'org_number' => $this->input->post('org_number'),
                    'org_name' => $this->input->post('org_name'),
                    'org_primary_address' => $this->input->post('org_primary_address'),
                    'org_optional_address' => $this->input->post('org_optional_address'),
                    'org_phone' => $this->input->post('org_phone'),
                    'area_name' => $this->input->post('area_name'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone_no' => $this->input->post('phone_no'),
                    'address' => $this->input->post('address'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'description' => $this->input->post('description'),
                    'card_no' => $this->input->post('card_no'),
                    'expire_date' => $this->input->post('expire_date'),
                    'cvv2_no' => $this->input->post('cvv2_no'),
                    'name_on_card' => $this->input->post('name_on_card'),
                    'package_name' => $this->input->post('package_name'),
                    'no_of_member' => $this->input->post('no_of_member'),
                    'duration' => $this->input->post('duration'),
                    'amount' => $this->input->post('amount'),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->org_profile_setting_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Profile Setting save successfully.</div>');
                redirect('organization/info/org_profile_setting');
            }
        }
    }

/**
 * Member profile settings by Admin
 *
 *@Param $mem_id
 *@access Private
 *@return Success/Failure Message
 */ 
    function profile_setting_by_admin($mem_id) {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';
        $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['access_profile_setting_by_admin']) {        
            $this->data['member_profile'] = $this->info_model->get_logged_member_profile($mem_id);              
            $this->data['member_profile_settings'] = $this->info_model->view_member_profile_seeting_admin($mem_id);
            $this->data['dynamicView'] = 'pages/organization/members/profile_setting';
        }else{
            $this->data['dynamicView'] = 'pages/organization/members/profile_setting_no_access';
        }
        $this->_commonPageLayout('frontend_viewer');
    }

/**
 * Member profile settings Process by Admin
 *
 *@access Private
 *@return Success/Failure Message
 */ 
function profile_setting_by_admin_process() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';
        $data_previlize = $this->check_member_type_previlize();
         if($data_previlize['access_profile_setting_by_admin']) {         
                $mem_id = $this->input->post("mem_id");
                $this->load->library('form_validation');        
                $this->form_validation->set_rules('member_title', 'Member Title', 'trim|required|xss_clean');
                $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|xss_clean');
                $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
                $this->form_validation->set_rules('email', 'Email', 'trim|required');
                $this->form_validation->set_rules('profile_message', 'Profile Message', 'trim|required|xss_clean');
                $this->form_validation->set_rules('household_size', 'HouseHold size', 'trim|xss_clean|required');
                $this->form_validation->set_rules('member_group', 'Group', 'trim|required|xss_clean');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
                if ($this->form_validation->run() == FALSE) {
                    $this->data['member_profile'] = $this->info_model->get_logged_member_profile($mem_id);              
                    $this->data['member_profile_settings'] = $this->info_model->view_member_profile_seeting($mem_id);
                    $this->data['dynamicView'] = 'pages/organization/members/profile_setting';
                    $this->_commonPageLayout('frontend_viewer');
                }else {           
                            $this->data['record'] = $this->info_model->view_member_profile_seeting_admin($mem_id);
                            if(count($this->data['record'])){
                                    $data = array(
                                        'member_id' => $mem_id,
                                        'member_title' => $this->input->post('member_title'),
                                        'name' => $this->input->post('name'),
                                        'expire_date' => $this->input->post('expire_date'),
                                        'address' => $this->input->post('address'),
                                        'phone' => $this->input->post('phone'),
                                        'email' => $this->input->post('email'),
                                        'profile_message' => $this->input->post('profile_message'),
                                        'household_size' => $this->input->post('household_size'),
                                        'member_group' => $this->input->post('member_group'),
                                        'username' => $this->input->post('username'),
                                        'org_id' => $this->session->userdata('member_org')
                                    );
                                    $success = $this->info_model->profile_seeting_update_by_admin($data, $mem_id);
                                    if($success){
                                        $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('profile_settings_update_successful').'</div>');
                                    }else{
                                        $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('profile_settings_update_failed').'</div>');
                                    }
                            }                                           
                            else {
                                        $data = array(
                                            'member_id' => $mem_id,
                                            'member_title' => $this->input->post('member_title'),
                                            'name' => $this->input->post('name'),
                                            'expire_date' => $this->input->post('expire_date'),
                                            'address' => $this->input->post('address'),
                                            'phone' => $this->input->post('phone'),
                                            'email' => $this->input->post('email'),
                                            'profile_message' => $this->input->post('profile_message'),
                                            'household_size' => $this->input->post('household_size'),
                                            'member_group' => $this->input->post('member_group'),
                                            'username' => $this->input->post('username'),
                                            'org_id' => $this->session->userdata('member_org'),
                                            'add_date' => date("Y-m-d H:i:s")
                                        );
                                        $success = $this->info_model->profile_seeting_insert_by_admin($data);
                                        if($success){
                                            $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('profile_settings_update_successful').'</div>');
                                        }else{
                                            $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('profile_settings_update_failed').'</div>');
                                        }
                                    }
                        redirect('organization/info/org_members', 'location', 301);
                    }
        }else{
            $this->data['dynamicView'] = 'pages/organization/members/profile_setting_no_access';
        }
}

/**
 * Member profile settings by Member
 *
 *@Param $mem_id
 *@access Private
 *@return Success/Failure Message
 */ 
    function profile_setting_by_member($mem_id) {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'my_profile';
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_id')==$mem_id) {        
            $this->data['member_profile'] = $this->info_model->get_logged_member_profile($mem_id);              
            $this->data['member_profile_settings_admin'] = $this->info_model->view_member_profile_seeting_admin($mem_id);
            $this->data['member_profile_settings_member'] = $this->info_model->view_member_profile_seeting_member($mem_id);
            $this->data['dynamicView'] = 'pages/organization/members/profile_setting_member';
        }else{
            $this->data['dynamicView'] = 'pages/organization/members/profile_setting_no_access';
        }
        $this->_commonPageLayout('frontend_viewer');
    }

/**
 * Member profile settings Process by Admin
 *
 *@access Private
 *@return Success/Failure Message
 */ 
function profile_setting_by_member_process() {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';
        $mem_id = $this->input->post("mem_id");
        if($this->session->userdata('mem_id')==$mem_id) {             
                $mem_id = $this->input->post("mem_id");
                $this->load->library('form_validation');        
                
                /*$this->form_validation->set_rules('member_title', 'Member Title', 'trim|required|xss_clean');
                $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|xss_clean');
                $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
                $this->form_validation->set_rules('email', 'Email', 'trim|required');
                $this->form_validation->set_rules('profile_message', 'Profile Message', 'trim|required|xss_clean');
                $this->form_validation->set_rules('household_size', 'HouseHold size', 'trim|xss_clean|required');
                $this->form_validation->set_rules('member_group', 'Group', 'trim|required|xss_clean');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');*/
                
                /*if ($this->form_validation->run() == FALSE) {
                    $this->data['member_profile'] = $this->info_model->get_logged_member_profile($mem_id);              
                    $this->data['member_profile_settings'] = $this->info_model->view_member_profile_seeting($mem_id);
                    $this->data['dynamicView'] = 'pages/organization/members/profile_setting';
                    $this->_commonPageLayout('frontend_viewer');
                }else {   */ 
                            $this->data['record'] = $this->info_model->view_member_profile_seeting_member($mem_id);
                            if(count($this->data['record'])){
                                    $data = array(
                                        'member_id' => $mem_id,
                                        'member_title' => $this->input->post('member_title'),
                                        'name' => $this->input->post('name'),
                                        'expire_date' => $this->input->post('expire_date'),
                                        'address' => $this->input->post('address'),
                                        'phone' => $this->input->post('phone'),
                                        'email' => $this->input->post('email'),
                                        'profile_message' => $this->input->post('profile_message'),
                                        'household_size' => $this->input->post('household_size'),
                                        'member_group' => $this->input->post('member_group'),
                                        'username' => $this->input->post('username'),
                                        'org_id' => $this->session->userdata('member_org')
                                    );
                                    $success = $this->info_model->profile_seeting_update_by_member($data, $mem_id);
                                    if($success){
                                        $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('profile_settings_update_successful').'</div>');
                                    }else{
                                        $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('profile_settings_update_failed').'</div>');
                                    }
                            }                                           
                            else {
                                        $data = array(
                                            'member_id' => $mem_id,
                                            'member_title' => $this->input->post('member_title'),
                                            'name' => $this->input->post('name'),
                                            'expire_date' => $this->input->post('expire_date'),
                                            'address' => $this->input->post('address'),
                                            'phone' => $this->input->post('phone'),
                                            'email' => $this->input->post('email'),
                                            'profile_message' => $this->input->post('profile_message'),
                                            'household_size' => $this->input->post('household_size'),
                                            'member_group' => $this->input->post('member_group'),
                                            'username' => $this->input->post('username'),
                                            'org_id' => $this->session->userdata('member_org'),
                                            'add_date' => date("Y-m-d H:i:s")
                                        );
                                        $success = $this->info_model->profile_seeting_insert_by_member($data);
                                        if($success){
                                            $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('profile_settings_update_successful').'</div>');
                                        }else{
                                            $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('profile_settings_update_failed').'</div>');
                                        }
                                    }
                        redirect('organization/info/my_profile/'.$mem_id, 'location', 301);
                    //}
        }else{
            $this->data['dynamicView'] = 'pages/organization/members/profile_setting_no_access';
        }
}
    function set_member_profile() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'common_setting';
        $this->data['dynamicView'] = 'pages/organization/profile/previlize_common';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_setting() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'common_setting';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('member_title', 'Member Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('profile_message', 'Profile Message', 'trim|required|xss_clean');
        $this->form_validation->set_rules('household_size', 'HouseHold size', 'trim|xss_clean|required');
        $this->form_validation->set_rules('bank_info', 'Bank Info', 'trim|xss_clean|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/profile/previlize_common';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $this->data['record'] = $this->info_model->view_member_profile_seeting($id);
            if (count($this->data['record'])) {
                $data = array(
                    'bank_info' => $this->input->post('bank_info'),
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'household_size' => $this->input->post('household_size'),
                );
                $this->info_model->setting_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Profile Seeting updated Successfully.</div>');
                redirect('organization/info/set_member_profile');
            } else {
                $data = array(
                    'bank_info' => $this->input->post('bank_info'),
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'household_size' => $this->input->post('household_size'),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->setting_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Profile Seeting saved Successfully.</div>');
                redirect('organization/info/set_member_profile');
            }
        }
    }

/**
 * Make a member Admin
 *
 *@Param $mem_id which contains member id
 *@access Private
 *@return Success/Failure Message
 */ 
    function admin_previlize($mem_id) {
        $this->data['mainTab'] = 'members';
        $this->data['activeTab'] = 'members';
        $data_previlize = $this->check_member_type_previlize();
        if($data_previlize['make_admin']) {
            $success = $this->info_model->change_member_admin_status($mem_id);
            if($success){
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('admin_status_successful').'</div>');
            }else{
                $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('admin_status_failed').'</div>');
            }
            redirect('organization/info/org_members');
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/members/org_members_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
    }

    function added_admin_previlize() {
        $id = $this->input->post("member_id");
        $admin_status = $this->input->post("admin_status");
        if ($admin_status == '2') {
            $this->data['record1'] = $this->info_model->get_member_admin_previlize($id);
            if (count($this->data['record1'])) {
                $this->info_model->delete_member_admin_previlize($id);
                $this->data['record'] = $this->info_model->get_member_info($id);
                foreach ($this->data['record'] as $info):
                    $email = $info->email;
                    $username = $info->username;
                    $person_number = $info->person_number;
                    $password = $info->password;
                endforeach;
                $data = array(
                    'org_id' => $this->session->userdata('user_id'),
                    'member_id' => $id,
                    'email' => $email,
                    'person_number' => $person_number,
                    'username' => $username,
                    'password' => $password
                );
                $this->info_model->admin_previlize_insert($data);
                redirect('organization/info/view_register_member');
            }
            else {
                $this->data['record'] = $this->info_model->get_member_info($id);
                foreach ($this->data['record'] as $info):
                    $email = $info->email;
                    $username = $info->username;
                    $person_number = $info->person_number;
                    $password = $info->password;
                endforeach;
                $data = array(
                    'org_id' => $this->session->userdata('user_id'),
                    'member_id' => $id,
                    'email' => $email,
                    'person_number' => $person_number,
                    'username' => $username,
                    'password' => $password
                );
                $this->info_model->admin_previlize_insert($data);
                redirect('organization/info/view_register_member');
            }
        } elseif ($admin_status == '1') {
            $this->data['record1'] = $this->info_model->get_member_admin_previlize($id);
            if (count($this->data['record1'])) {
                $this->info_model->delete_member_admin_previlize($id);
                redirect('organization/info/view_register_member');
            } else {
                redirect('organization/info/view_register_member');
            }
        } else {
            redirect('organization/info/view_register_member');
        }
    }

    function edit_member_profile($id=NULL) {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_register_member';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_user_info($id);
            $this->data['dynamicView'] = 'pages/organization/member/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('member_title', 'Member Title', 'trim|xss_clean');
            $val->set_rules('expire_date', 'Membership Expire Date', 'trim|required|xss_clean');
            $val->set_rules('name', 'Name', 'trim|required|xss_clean');
            $val->set_rules('address', 'Address', 'trim|required|xss_clean');
            $val->set_rules('phone', 'Phone', 'trim|required|xss_clean');
            $val->set_rules('profile_message', 'Profile Message', 'trim|xss_clean');
            if ($val->run()) {
                $data = array(
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'profile_message' => $this->input->post('profile_message'),
                    'expire_date' => $this->input->post('expire_date'),
                    'user_type' => $this->input->post('user_type'),
                    'member_group' => $this->input->post('member_group')
                );
                $this->info_model->user_profile_update($data, $id);
                $this->session->set_flashdata('message', '<div id="message1">Profile Updated Successfully.</div>');
                redirect('organization/info/view_register_member', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }


function view_inbox() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '15';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_inbox");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_message()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_message($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/message/inbox';
        $this->_commonPageLayout('frontend_viewer');
    }

    function delete_message() {
        $a = $this->input->post("checkbox");
        for ($i = 0; $i < sizeof($a); $i++):
            $id = $a[$i];
            $this->info_model->delete_message($id);
        endfor;
        redirect('organization/info/view_inbox');
    }

    function view_message($id) {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $data = array(
            'message_status' => 1
        );
        $this->info_model->read_status_update($data, $id);
        $this->data['message'] = $this->info_model->get_message_detail($id);
        $this->data['dynamicView'] = 'pages/organization/message/message_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function reply_message($id) {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['message_info'] = $this->info_model->get_message_detail($id);
        $this->data['dynamicView'] = 'pages/organization/message/reply_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function replied_message() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post("id");
            $this->data['message_info'] = $this->info_model->get_message_detail($id);
            $this->data['dynamicView'] = 'pages/organization/message/reply_view';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $photo1 = "";
            if ($_FILES['photo']['size'] > 0) {
                if ($this->now_upload()) {
                    $photo1 = $this->upload_data['file_name'];
                }
            }
            $data = array(
                'org_id' => $this->session->userdata("user_id"),
                'name' => 'OrgAdmin',
                'receiver_id' => $this->input->post("sender_id"),
                'subject' => $this->input->post("subject"),
                'message' => $this->input->post("message"),
                'message_date' => date("Y-m-d"),
                'photo1' => $photo1,
                'message_status' => 2,
                'flag' => 2,
                'sender_status' => 1
            );
            $this->info_model->message_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Message send Successfully.</div>');
            redirect('organization/info/view_inbox');
        }
    }


    function view_article_category() {
            $this->lang->load('common', $this->session->userdata('lang_file'));
            $this->data['mainTab'] = 'mainboard';
            $this->data['activeTab'] = 'view_category';
            $data_previlize = $this->check_member_type_previlize();
            if($data_previlize['mainboard_change_article']) {
                $this->data['query1'] = $this->info_model->view_article_category($data_previlize['member_org']);
                $this->data['dynamicView'] = 'pages/organization/mainboard/view_article';
            }else{  $this->data['dynamicView'] = 'pages/organization/mainboard/view_article_no_access';}
            $this->_commonPageLayout('frontend_viewer');
    }

    function add_article_category($start=0) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'view_category';
        $data_previlize = $this->check_member_type_previlize();
         if($data_previlize['mainboard_change_article']) {
                $this->data['dynamicView'] = 'pages/organization/mainboard/entry_article';
        }else{  $this->data['dynamicView'] = 'pages/organization/mainboard/view_article_no_access';}
        $this->_commonPageLayout('frontend_viewer');
    }


    function added_article_category($start=0) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'view_category';
        $data_previlize = $this->check_member_type_previlize();
         if($data_previlize['mainboard_change_article']) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('article_category', $this->lang->line('label_article_category_name'), 'trim|required|callback_check_article_category[' . $data_previlize['member_org'] . ']');
            if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/organization/mainboard/entry_article';
                $this->_commonPageLayout('frontend_viewer');
            } else {
                $data = array(
                'category_name' => ucfirst($this->input->post('article_category')),
                'org_id' => $data_previlize['member_org'],
                'add_date' => $to_date = date("Y-m-d H:i:s")
                );
                $this->info_model->article_category_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('article_category_creation_success').'</div>');
                redirect('organization/info/view_article_category');
            }
        }else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/view_article_no_access'; 
            $this->_commonPageLayout('frontend_viewer');
        }

    }

    function article_category_edit($id=NULL) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'view_category';
        $data_previlize = $this->check_member_type_previlize();
         if($data_previlize['mainboard_change_article']) {
            if ($id != NULL) {
                $this->data['record'] = $this->info_model->get_category($id);
                $this->data['dynamicView'] = 'pages/organization/mainboard/edit_article_category';
            }
            if (count($_POST)) {
                $val = $this->form_validation;
                //$this->form_validation->set_rules('article_category', $this->lang->line('label_article_category_name'), 'trim|required|callback_check_article_category[' . $this->session->userdata("member_org") . ']');
                $val->set_rules('article_category', $this->lang->line('label_article_category_name'), 'trim|required|xss_clean|callback_check_category[' . $this->input->post("id") . ']');
                if ($val->run()) {
                    $profile_data = array(
                    'category_name' => ucfirst($this->input->post('article_category')),
                );
                $this->info_model->article_category_update($profile_data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('article_category_update_success').'</div>');
                redirect('organization/info/view_article_category', 'location', 301);
                }
            }
            $this->_commonPageLayout('frontend_viewer');
        }else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/view_article_no_access'; 
            $this->_commonPageLayout('frontend_viewer');
        }
    }


    function article_category_delete($id = NULL) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'view_category';
        $data_previlize = $this->check_member_type_previlize();
         if($data_previlize['mainboard_change_article']) {
            $success = $this->info_model->delete_article_category($id);
            if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('article_category_delete_success').'</div>');
            }
            redirect('organization/info/view_article_category', 'location', 301);
            }
            else{  
                $this->data['dynamicView'] = 'pages/organization/mainboard/view_article_no_access'; 
                $this->_commonPageLayout('frontend_viewer');
         }
    }

        function check_article_category($article_category, $id1) {
        $result = $this->dx_auth->is_article_category_available($article_category, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_article_category', $this->lang->line('label_article_category_exists'));
        }

        return $result;
}

    function check_category($article_category, $id) {
        $org_id = $this->session->userdata("member_org");
        $result = $this->dx_auth->check_category($article_category, $id, $org_id);
        if (!$result) {
            $this->form_validation->set_message('check_category', $this->lang->line('label_article_category_exists'));
        }
        return $result;
    }



/**
 * Check duplicate E-mail by member id
 *
 *@Param $email, $mem_id
 *@access private
 *@return Success/Failure
 */
function email_check_by_member_id($email,$mem_id) {        
        $result = $this->dx_auth->is_email_available_by_member_id($email,$mem_id);
        if (!$result) {
            $this->form_validation->set_message('email_check_by_member_id', $this->lang->line('email_exists_error_msg'));
        }
        return $result;
}

/**
 * Check duplicate username by member id
 *
 *@Param $username, $mem_id
 *@access private
 *@return Success/Failure
 */
  function login_username_check_by_member_id($username,$mem_id) {
      
        $result = $this->dx_auth->login_username_check_by_member_id($username,$mem_id);
        if (!$result) {
            $this->form_validation->set_message('login_username_check_by_member_id', $this->lang->line('username_exists_error_msg'));
        }

        return $result;
}

/**
 * Check duplicate Person no by member id
 *
 *@Param $person_number, $mem_id
 *@access private
 *@return Success/Failure
 */
function check_person_number_by_member_id($person_number,$mem_id) {
        $result = $this->dx_auth->is_person_number_available_by_member_id($person_number,$mem_id);
        if (!$result) {
            $this->form_validation->set_message('check_person_number_by_member_id', $this->lang->line('pno_exists_error_msg'));
        }

        return $result;
}


/**
 * Contact with Siteadmin
 *
 *@access private
 *@return Siteadmin Contact Form
 */
function contact_site_admin(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'home';
    $this->data['activeTab'] = 'contact_site_admin';
    $this->data['sender_name'] = "";
    $this->data['sender_email'] = "";
    $this->data['contact_subject'] = "";
    $this->data['contact_message'] = "";
    $this->data['file_upload_failed'] = "";
    $this->data['dynamicView'] = 'pages/organization/home/contact_site_admin';
    $this->_commonPageLayout('frontend_viewer');
}


/**
 * Contact with Siteadmin Process
 *
 *@access private
 *@return Success/Failure Message
 */
function contact_site_admin_process(){

    $this->lang->load('common', $this->session->userdata('lang_file'));
   
    $this->load->library('form_validation');
    $this->data['file_upload_failed'] = "";
    $this->data['sender_name'] = $this->input->post('sender_name');
    $this->data['sender_email'] = $this->input->post('sender_email');
    $this->data['contact_subject'] = $this->input->post('contact_subject');
    $this->data['contact_message'] =  $this->input->post('contact_message');
       
    $file_uploaded_success = FALSE;
    
    //////////////////////////////////////////////////////////////////////////////////////////////
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'contact_site_admin';
        
        $this->form_validation->set_rules('sender_name', $this->lang->line('label_name'), 'trim|required');
        $this->form_validation->set_rules('sender_email', $this->lang->line('label_email'), 'trim|required|valid_email');
        $this->form_validation->set_rules('contact_subject', $this->lang->line('label_subject'), 'trim|required');
        $this->form_validation->set_rules('contact_message', $this->lang->line('label_message'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/organization/home/contact_site_admin';
                $this->_commonPageLayout('frontend_viewer');
        } else {
                    
                    if(isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH']<=2097152){  
                    /////////////////////////////////////////////////////////
                    
                       $last_contact_id= $this->info_model->get_last_contact_site_admin_id();
                       $contact_id = $last_contact_id[0]->contact_id+1;
                       // print_r($last_communication_id);
                        /*if(!$comm_id){
                            $comm_id = 1;
                        }*/
                    
                        $uploaded_dir = $contact_id."_".date("s");
                        $mkdirpath = "./uploads/contact_site_admin/attached_files/".$uploaded_dir."/";
                        mkdir($mkdirpath);
                        chmod($mkdirpath, 02755);           
                         
                        $contact_data['sender_name'] = $this->data['sender_name'];
                        $contact_data['sender_email'] =  $this->data['sender_email'];
                        $contact_data['contact_subject'] = $this->data['contact_subject'] ;
                        $contact_data['contact_message'] = $this->data['contact_message'] ;
                        $contact_data['attached_files'] = "";
                        $contact_data['uploaded_dir'] = $uploaded_dir;
                        $contact_data['add_date'] = date("Y-m-d H:i:s");   
                        
                        /////////////////////////////////////////////////////////
                    
                     
                            $filename = $_FILES['contact_files']['name'];
                            if($filename){
                                $file_type1 = explode(".",$filename);
                                $extension = strtolower($file_type1[count($file_type1)-1]);
                                if($extension=='png' || $extension=='jpg' || $extension=='txt' || $extension=='doc' || $extension=='docx' || $extension=='pdf'){
                                                                    
                                    $contact_data['attached_files'] .= $filename;                                
                                    $temp=$mkdirpath;
                                    $tmp=$_FILES['contact_files']['tmp_name'];
                                    
                                    if($tmp){
                                        $attachment_name= $filename; 
                                        $fp = fopen($tmp, "rb"); //Open it
                                        $attachedfile_tmp = fread($fp, filesize($tmp)); //Read it
                                        $attachedfile= chunk_split(base64_encode($attachedfile_tmp)); //Chunk it up and encode it as base64 so it can emailed
                                        fclose($fp); 
                                    }

                                    $temp=$temp.basename($filename);
                                    move_uploaded_file($tmp,$temp);
                                    $temp='';
                                    $tmp='';
                                    $file_uploaded_success = TRUE;
                                }else{
                                            rmdir($mkdirpath);
                                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_file_type_not_supported').'</div>';
                                            $this->data['dynamicView'] = 'pages/organization/home/contact_site_admin';
                                            $this->_commonPageLayout('frontend_viewer');
                                        }
                            }  
                        
                    
                    }else{
                                $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_max_file_upload_size').'</div>';
                                $this->data['dynamicView'] = 'pages/organization/home/contact_site_admin';
                                $this->_commonPageLayout('frontend_viewer');
                        }

                        if(!$file_uploaded_success){
                            rmdir($mkdirpath);
                            $contact_data['uploaded_dir'] = "";
                        }
                                                                  
                    
                    $this->info_model->contact_site_admin_insert($contact_data);    
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('site_admin_contact_success').'</div>');
                    redirect('organization/info/contact_site_admin');
                }
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];   
   
}


/**
 * Load Article Post Form
 *
 *@access private
 *@return Article Post Form
 */
function post_article(){
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'post_article';
    $this->data['post_article'] = '';
    $this->data['expire_date_error'] = '';
    $this->data['publish_date_error'] = '';
    $this->data['file_upload_failed'] ="";
       
    $data_form = array("article_title" => "",
            "uploaded_article" => "",
            "article_text" => "",
            "article_color_code" => "",
            "article_category" => "",
            "article_type" => "",
            "importance" => "",
            "publish_date" => "",
            "publish_date_intake" => "",
            "expire_date" => "",
            "expire_date_intake" => "",
            "send_article_by" => "",
            "send_notification_by" => "",
            "send_to_group" => "",
            "send_to_member" => "",
            "article_reminder_email_time" => ""                                    
     );
    $data_previlize = $this->check_member_type_previlize();  
    if($data_previlize['mainboard_change_article']) {
            $mem_id = $this->session->userdata('mem_id');
            $org_id = $data_previlize['member_org'];
            $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $org_id);                    
            $article_category['org_article_category'] = $this->info_model->get_org_article_category($org_id); 
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post_no_access'; 
    }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_form);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($article_category);	   
        $this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
        
}


/**
 * Process Article Post 
 *
 *@access private
 *@return Success/Failure Message
 */
function post_article_process(){
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'post_article';
    $this->data['post_article'] = '';     
    $this->data['publish_date'] ="";
    $this->data['publish_date_intake'] ="";
    $this->data['expire_date'] ="";
    $this->data['expire_date_intake'] ="";
    $this->data['article_color_code'] ="";
    $this->data['file_upload_failed'] ="";
            
    $error_data['expire_date_error'] = "";
    $error_data['publish_date_error'] = "";
    $uploaded_article ="";
    $article_insert_id ="";
    $group_mem_id="";
    $article_data['send_to_group'] ="";
    $article_data['send_to_member'] ="";
    $this->data['article_text'] ="";
    $file_uploaded_success = FALSE;
    $temp ="";
    $attachment_name = "";
    $attachedfile = "";
    
    $data_previlize = $this->check_member_type_previlize();  
    
    if($data_previlize['mainboard_change_article']) {
            $mem_id = $this->session->userdata('mem_id');
            $org_id = $data_previlize['member_org'];
            $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $org_id);                    
            $article_category['org_article_category'] = $this->info_model->get_org_article_category($org_id); 
            
            /////////////////////////////////////////////////////////////////////////////////////////////
            
            $this->load->library('form_validation');
            $this->data['post_article'] = $this->input->post('post_article');
            $this->data['article_title'] = $this->input->post('article_title');   
            $this->data['importance'] = $this->input->post('importance');
            $this->data['article_category'] = $this->input->post('article_category');
            $this->data['article_type'] = $this->input->post('article_type');
            
            if($this->input->post('publish_date')){
                $this->data['publish_date_intake'] = $this->input->post('publish_date');
                $this->data['publish_date'] = explode("-",$this->input->post('publish_date'));
                $this->data['publish_date'] = mktime(0, 0, 0, ($this->data['publish_date'][1]), $this->data['publish_date'][2], $this->data['publish_date'][0]);
                $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($this->data['publish_date'] < $todate ){
                        $error_data['publish_date_error'] = $this->lang->line('article_publish_date_error');
                }   
            }        
            
            if($this->input->post('expire_date')){
                $this->data['expire_date_intake'] = $this->input->post('expire_date');
                $this->data['expire_date'] = explode("-",$this->input->post('expire_date'));
                $this->data['expire_date'] = mktime(0, 0, 0, ($this->data['expire_date'][1]), $this->data['expire_date'][2], $this->data['expire_date'][0]);
                if(empty($error_data['publish_date_error']) && $this->data['publish_date'] >= $this->data['expire_date']){
                        $error_data['expire_date_error'] = $this->lang->line('article_expire_date_error');
                }
            }
       
            if($this->data['post_article']=="create_article"){
                $this->data['article_text'] = $this->input->post('article_text');
                $this->data['article_color_code'] = $this->input->post('rgb2');
            }
            elseif($this->data['post_article']=="upload_article"){
                $uploaded_article = $_FILES['uploaded_article']['name']; 
        }      
            $this->data['uploaded_article'] = $uploaded_article;
            $this->data['send_by'] = $this->input->post('send_by');
            $this->data['send_article_by'] = $this->input->post('send_article_by');
            $this->data['send_notification_by'] = $this->input->post('send_notification_by');
            $this->data['article_reminder_email_time'] = $this->input->post('article_reminder_email_time');
            $this->data['article_reminder_email_time_unit'] = $this->input->post('article_reminder_email_time_unit');
            $this->data['select_member'] = $this->input->post('select_member');
            $this->data['send_to_group'] = $this->input->post('send_to_group');
            $this->data['send_to_member'] = $this->input->post('send_to_member');

            if($this->data['send_by']){
                if(empty($this->data['send_article_by']) && empty($this->data['send_notification_by'])){
                    $this->form_validation->set_rules('send_article_by', $this->lang->line('label_article_sending_way'), 'trim|required');
                }
                elseif($this->data['send_by'] && ($this->data['send_article_by']  || $this->data['send_notification_by']) ){
                    if(empty($this->data['send_to_group']) && empty($this->data['select_member'])){
                        $this->form_validation->set_rules('send_to_group', $this->lang->line('label_send_to'), 'trim|required');
                    }       
                    elseif($this->data['select_member']){
                        $send_to_member_list = $this->data['send_to_member'];                                             
                        if(!isset($send_to_member_list[0])){   
                            $this->form_validation->set_rules('send_to_member', $this->lang->line('label_select_memebr'), 'trim|required');
                       }
                       if(sizeof($this->data['send_to_member'])==1){
                           $this->data['send_to_member'] = $this->data['send_to_member'][0];
                       }elseif(sizeof($this->data['send_to_member'])>1){
                           $this->data['send_to_member'] = implode(",",$this->data['send_to_member']);
                       }                            
                       $article_data['send_to_member'] =  $this->data['send_to_member'];
                }                
                        if(sizeof($this->data['send_to_group'])==1){
                            $this->data['send_to_group'] = $this->data['send_to_group'][0];
                            $article_data['send_to_group'] =  $this->data['send_to_group'];
                        }elseif(sizeof($this->data['send_to_group'])>1){
                            $this->data['send_to_group'] = implode(",",$this->data['send_to_group']);
                            $article_data['send_to_group'] =  $this->data['send_to_group'];
                        }  
                       
                }
            }

            $this->form_validation->set_rules('article_title', $this->lang->line('label_title'), 'trim|required');
            $this->form_validation->set_rules('publish_date', $this->lang->line('label_publish_date'), 'trim|required');
            $this->form_validation->set_rules('importance', $this->lang->line('label_importance'), 'trim|required');
            $this->form_validation->set_rules('article_type', $this->lang->line('label_article_type'), 'trim|required');
            $this->form_validation->set_rules('expire_date', $this->lang->line('label_expire_date'), 'trim|required');
            
            if($this->data['post_article']=="create_article"){
                $this->form_validation->set_rules('article_text', $this->lang->line('label_text'), 'trim|required');
            }
            if((!$uploaded_article && $this->data['post_article']=="upload_article")){
                $this->form_validation->set_rules('uploaded_article', $this->lang->line('label_upload_file'), 'trim|required');
            }
            
            if ($this->form_validation->run() == FALSE || !empty($error_data['publish_date_error']) || !empty($error_data['expire_date_error'])) {     
                $this->load->vars($error_data);  
                $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                //$this->_commonPageLayout('frontend_viewer');
            } 
            else{              
                $max_article_id = $this->info_model->get_max_article_id();
                $max_article_id = $max_article_id[0]->max_art_id+1;                
                $article_data['org_id'] = $org_id;
                $article_data['member_id'] = $mem_id;
                $article_data['article_title'] = $this->data['article_title'];
                $article_data['article_text'] = $this->data['article_text'];
                $article_data['article_color_code'] = $this->data['article_color_code'];
                $article_data['publish_date'] = $this->data['publish_date'];
                $article_data['importance'] = $this->data['importance'];
                $article_data['article_category'] = $this->data['article_category'];
                $article_data['article_type'] = $this->data['article_type'];
                $article_data['expire_date'] = $this->data['expire_date'];                
                $article_data['send_article_by'] = $this->data['send_article_by'];
                $article_data['send_notification_by'] = $this->data['send_notification_by'];
                $article_data['add_date'] = date("Y-m-d H:i:s");   
                if($this->data['article_reminder_email_time']){
                         $article_data['article_reminder_email_time'] = $this->data['article_reminder_email_time']."-".$this->data['article_reminder_email_time_unit'];
                }               
                if(sizeof($article_data['send_article_by'])==1){                   
                    $article_data['send_article_by'] = $article_data['send_article_by'][0];
                }elseif(sizeof($article_data['send_article_by'])==2){
                    $article_data['send_article_by'] = implode(",",$article_data['send_article_by']);
                }            
              if(sizeof($article_data['send_notification_by'])==1){
                    $article_data['send_notification_by'] = $article_data['send_notification_by'][0];
                }elseif(sizeof($article_data['send_notification_by'])==2){
                    $article_data['send_notification_by'] = implode(",",$article_data['send_notification_by']);
                }
        
        if(isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH']<=2097152){  
            if(!empty($uploaded_article)){
                        
                        $mkdirpath = "./main_board_article/";
                        $file_type1 = explode(".",$uploaded_article);
                        $extension = strtolower($file_type1[count($file_type1)-1]);
                        if($extension=='doc' || $extension=='docx' || $extension=='pdf'){
                            $temp=$mkdirpath;
                            $filename=$_FILES['uploaded_article']['name']; 
                            $tmp=$_FILES['uploaded_article']['tmp_name']; 
                            $uploaded_article = "article_".$article_data['article_title']."_".$max_article_id.".".$extension;
                            //////////////////////////////
                               if($tmp){
                                        $attachment_name = $uploaded_article; 
                                        $fp = fopen($tmp, "rb"); //Open it
                                        $attachedfile_tmp = fread($fp, filesize($tmp)); //Read it
                                        $attachedfile = chunk_split(base64_encode($attachedfile_tmp)); //Chunk it up and encode it as base64 so it can emailed
                                        fclose($fp); 
                                    }
                            /////////////////////////////
                            $temp=$temp.basename($uploaded_article);
                            move_uploaded_file($tmp,$temp);
                            $file_uploaded_success = TRUE;
                        }else{                            
                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('file_type_not_supported_error').'</div>';
                            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                            $this->_commonPageLayout('frontend_viewer');                            
                        }
                }
            }else{          
                        $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_max_file_upload_size').'</div>';
                        $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                        $this->_commonPageLayout('frontend_viewer');
                    }
        
                
                $article_data['uploaded_article'] = $uploaded_article;
                $inserted_article_id = $this->info_model->insert_mainboard_article($article_data);
                if($inserted_article_id && ($this->data['publish_date'] == $todate ) ){
                       $article_data['art_inserted_article_id'] = $inserted_article_id;                    
                       $org_info = $this->info_model->get_organization_info_by_id($org_id);
                       $article_category_info = $this->info_model->get_category($article_data['article_category']);
                       if($article_data['send_to_group']){
                            $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($article_data['send_to_group']);
                            if($mem_assigned_to_group){                                
                                foreach($mem_assigned_to_group as $group_mem){
                                    $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                                }
                            }
                       }
                      
                      if($group_mem_id){
                              $group_mem_id = rtrim ($group_mem_id,',');
                      }
                   
                       $article_data['receiver_members_id'] = $group_mem_id.",".$article_data['send_to_member'];
                       
                       if($org_info){$article_data['org_name'] = $org_info[0]->org_name;}
                       if($article_category_info){$article_data['art_category_name'] = $article_category_info[0]->category_name;}
                       else{$article_data['art_category_name'] ="Default";}
                   
                  
                        if($this->data['send_article_by']){
                            
                            foreach($this->data['send_article_by'] as $key=>$value){
                                if($value=="Email"){
                                    $this->send_article_by_email($article_data, "send_article", $attachment_name, $attachedfile);
                                }elseif($value=="Letter"){//echo "here";exit;
                                    if($this->data['post_article']=="create_article"){
                                        $article_data['created_letter'] = "letter_".$article_data['article_title']."_".$max_article_id.".pdf";
                                    }
                                    if(!empty($uploaded_article) && $file_uploaded_success){        
                                            $article_letter_path = "./org_member_letter/";
                                            $uploaded_article_letter = $article_letter_path."letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                                            $article_data['uploaded_letter'] = "letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                                            copy($temp, $uploaded_article_letter);
                                    }
                                
                                    $this->send_article_by_letter($article_data, $inserted_article_id);
                                }
                            }
                        }
                        if($this->data['send_notification_by']){
                            foreach($this->data['send_notification_by'] as $key=>$value){
                                if($value=="Email"){
                                   $this->send_article_by_email($article_data , "send_notification", $attachedfile);
                                }elseif($value=="SMS"){
                                    $this->send_article_by_sms($article_data);
                                }
                            }
                        }                                    
            }
            if($inserted_article_id){                
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('main_board_article_post_success').'</div>');
                }
            elseif(!$inserted_article_id){                
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('main_board_article_post_failure').'</div>');
                }
                redirect('organization/info/post_article');
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////
            
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post_no_access'; 
    }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_form);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($article_category);	   
        $this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Load Article Proposal Form
 *
 *@access private
 *@return Article Proposal Form
 */
function proposal_article(){
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'proposal_article';
    $this->data['post_article'] = '';
    $this->data['expire_date_error'] = '';
    $this->data['publish_date_error'] = '';
    $this->data['file_upload_failed'] ="";

       
    $data_form = array("article_title" => "",
                                    "uploaded_article" => "",
                                    "article_text" => "",
                                    "article_color_code" => "",
                                    "article_category" => "",
                                    "article_type" => "",
                                    "importance" => "",
                                    "publish_date" => "",
                                    "publish_date_intake" => "",
                                    "expire_date" => "",
                                    "expire_date_intake" => "",
                                    "send_article_by" => "",
                                    "send_notification_by" => "",
                                    "send_to_group" => "",
                                    "send_to_member" => "",
                                    "article_reminder_email_time" => ""                                    
                            );
    
    $data_previlize = $this->check_member_type_previlize();  
    if($data_previlize['mainboard_send_proposal']) {
            $mem_id = $this->session->userdata('mem_id');
            $org_id = $data_previlize['member_org'];
            $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $org_id);                    
            $article_category['org_article_category'] = $this->info_model->get_org_article_category($org_id); 
            $this->data['dynamicView'] = 'pages/organization/mainboard/proposal_article'; 
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post_no_access'; 
    }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_form);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($article_category);	   
        //$this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}



/**
 * Process Article Proposal 
 *
 *@access private
 *@return Success/Failure Message
 */
function proposal_article_process(){    
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'proposal_article';
    $this->data['post_article'] = '';     
    $this->data['publish_date'] ="";
    $this->data['publish_date_intake'] ="";
    $this->data['expire_date'] ="";
    $this->data['expire_date_intake'] ="";
    $this->data['article_color_code'] ="";
    $this->data['file_upload_failed'] ="";
            
    $error_data['expire_date_error'] = "";
    $error_data['publish_date_error'] = "";
    $uploaded_article ="";
    $article_insert_id ="";
    $group_mem_id="";
    $article_data['send_to_group'] ="";
    $article_data['send_to_member'] ="";
    $this->data['article_text'] ="";
    $file_uploaded_success = FALSE;
    $temp ="";
    $attachment_name = "";
    $attachedfile = "";
    
    $data_previlize = $this->check_member_type_previlize(); 
    
    if($data_previlize['mainboard_send_proposal']) {
            $mem_id = $this->session->userdata('mem_id');
            $org_id = $data_previlize['member_org'];
            $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $org_id);                    
            
            /////////////////////////////////////////////////////////////////////////////////////////////
            
            $this->load->library('form_validation');
            $this->data['post_article'] = $this->input->post('post_article');
            $this->data['article_title'] = $this->input->post('article_title');   
            $this->data['importance'] = $this->input->post('importance');
            $this->data['article_category'] = $this->input->post('article_category'); 
           
            $this->data['article_type'] = $this->input->post('article_type');
            
            if($this->input->post('publish_date')){
                $this->data['publish_date_intake'] = $this->input->post('publish_date');
                $this->data['publish_date'] = explode("-",$this->input->post('publish_date'));
                $this->data['publish_date'] = mktime(0, 0, 0, ($this->data['publish_date'][1]), $this->data['publish_date'][2], $this->data['publish_date'][0]);
                $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($this->data['publish_date'] < $todate ){
                        $error_data['publish_date_error'] = $this->lang->line('article_publish_date_error');
                }   
            }        
            
            if($this->input->post('expire_date')){
                $this->data['expire_date_intake'] = $this->input->post('expire_date');
                $this->data['expire_date'] = explode("-",$this->input->post('expire_date'));
                $this->data['expire_date'] = mktime(0, 0, 0, ($this->data['expire_date'][1]), $this->data['expire_date'][2], $this->data['expire_date'][0]);
                if(empty($error_data['publish_date_error']) && $this->data['publish_date'] >= $this->data['expire_date']){
                        $error_data['expire_date_error'] = $this->lang->line('article_expire_date_error');
                }
            }
       
            if($this->data['post_article']=="create_article"){
                $this->data['article_text'] = $this->input->post('article_text');
                $this->data['article_color_code'] = $this->input->post('rgb2');
            }
            elseif($this->data['post_article']=="upload_article"){
                $uploaded_article = $_FILES['uploaded_article']['name']; 
            }      
            $this->data['uploaded_article'] = $uploaded_article;
            $this->data['send_by'] = $this->input->post('send_by');
            $this->data['send_article_by'] = $this->input->post('send_article_by');
            $this->data['send_notification_by'] = $this->input->post('send_notification_by');
            $this->data['article_reminder_email_time'] = $this->input->post('article_reminder_email_time');
            $this->data['article_reminder_email_time_unit'] = $this->input->post('article_reminder_email_time_unit');
            $this->data['select_member'] = $this->input->post('select_member');
            $this->data['send_to_group'] = $this->input->post('send_to_group');
            $this->data['send_to_member'] = $this->input->post('send_to_member');            
            

            if($this->data['send_by']){
                if(empty($this->data['send_article_by']) && empty($this->data['send_notification_by'])){
                    $this->form_validation->set_rules('send_article_by', $this->lang->line('label_article_sending_way'), 'trim|required');
                }
                elseif($this->data['send_by'] && ($this->data['send_article_by']  || $this->data['send_notification_by']) ){
                    if(empty($this->data['send_to_group']) && empty($this->data['select_member'])){
                        $this->form_validation->set_rules('send_to_group', $this->lang->line('label_send_to'), 'trim|required');
                    }       
                    elseif($this->data['select_member']){
                        $send_to_member_list = $this->data['send_to_member'];                                             
                        if(!isset($send_to_member_list[0])){   
                            $this->form_validation->set_rules('send_to_member', $this->lang->line('label_select_memebr'), 'trim|required');
                       }
                       if(sizeof($this->data['send_to_member'])==1){
                           $this->data['send_to_member'] = $this->data['send_to_member'][0];
                       }elseif(sizeof($this->data['send_to_member'])>1){
                           $this->data['send_to_member'] = implode(",",$this->data['send_to_member']);
                       }                            
                       $article_data['send_to_member'] =  $this->data['send_to_member'];
                }
                
                        if(sizeof($this->data['send_to_group'])==1){
                            $this->data['send_to_group'] = $this->data['send_to_group'][0];
                            $article_data['send_to_group'] =  $this->data['send_to_group'];
                        }elseif(sizeof($this->data['send_to_group'])>1){
                            $this->data['send_to_group'] = implode(",",$this->data['send_to_group']);
                            $article_data['send_to_group'] =  $this->data['send_to_group'];
                        }  
                       
                }
            }

            $this->form_validation->set_rules('article_title', $this->lang->line('label_title'), 'trim|required');
            $this->form_validation->set_rules('publish_date', $this->lang->line('label_publish_date'), 'trim|required');
            $this->form_validation->set_rules('importance', $this->lang->line('label_importance'), 'trim|required');
            $this->form_validation->set_rules('article_type', $this->lang->line('label_article_type'), 'trim|required');
            $this->form_validation->set_rules('expire_date', $this->lang->line('label_expire_date'), 'trim|required');
            
            if($this->data['post_article']=="create_article"){
                $this->form_validation->set_rules('article_text', $this->lang->line('label_text'), 'trim|required');
            }
            if((!$uploaded_article && $this->data['post_article']=="upload_article")){
                $this->form_validation->set_rules('uploaded_article', $this->lang->line('label_upload_file'), 'trim|required');
            }
            
            if ($this->form_validation->run() == FALSE || !empty($error_data['publish_date_error']) || !empty($error_data['expire_date_error'])) {     
                $article_category['org_article_category'] = $this->info_model->get_org_article_category($org_id); 
                $this->load->vars($article_category);	   
                $this->load->vars($error_data);  
                $this->data['dynamicView'] = 'pages/organization/mainboard/proposal_article'; 
               // print_r($article_category);exit;
                //$this->_commonPageLayout('frontend_viewer');
            } 
            else{              
                $max_article_id = $this->info_model->get_max_article_id();
                $max_article_id = $max_article_id[0]->max_art_id+1;                
                $article_data['org_id'] = $org_id;
                $article_data['member_id'] = $mem_id;
                $article_data['article_title'] = $this->data['article_title'];
                $article_data['article_text'] = $this->data['article_text'];
                $article_data['article_color_code'] = $this->data['article_color_code'];
                $article_data['publish_date'] = $this->data['publish_date'];
                $article_data['importance'] = $this->data['importance'];
                $article_data['article_category'] = $this->data['article_category'];
                $article_data['article_type'] = $this->data['article_type'];
                $article_data['expire_date'] = $this->data['expire_date'];                
                $article_data['send_article_by'] = $this->data['send_article_by'];
                $article_data['send_notification_by'] = $this->data['send_notification_by'];
                $article_data['article_proposal'] = 1;
                $article_data['article_status'] = 0;
                $article_data['add_date'] = date("Y-m-d H:i:s");   
                if($this->data['article_reminder_email_time']){
                         $article_data['article_reminder_email_time'] = $this->data['article_reminder_email_time']."-".$this->data['article_reminder_email_time_unit'];
                }
               
                if(sizeof($article_data['send_article_by'])==1){                   
                    $article_data['send_article_by'] = $article_data['send_article_by'][0];
                }elseif(sizeof($article_data['send_article_by'])==2){
                    $article_data['send_article_by'] = implode(",",$article_data['send_article_by']);
                }
            
             if(sizeof($article_data['send_notification_by'])==1){
                    $article_data['send_notification_by'] = $article_data['send_notification_by'][0];
                }elseif(sizeof($article_data['send_notification_by'])==2){
                    $article_data['send_notification_by'] = implode(",",$article_data['send_notification_by']);
        }
        
        if(isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH']<=2097152){  
            if(!empty($uploaded_article)){
                        
                        $mkdirpath = "./main_board_article/";
                        $file_type1 = explode(".",$uploaded_article);
                        $extension = strtolower($file_type1[count($file_type1)-1]);
                        if($extension=='doc' || $extension=='docx' || $extension=='pdf'){
                            $temp=$mkdirpath;
                            $filename=$_FILES['uploaded_article']['name']; 
                            $tmp=$_FILES['uploaded_article']['tmp_name']; 
                            $uploaded_article = "article_".$article_data['article_title']."_".$max_article_id.".".$extension;
                            //////////////////////////////
                               if($tmp){
                                        $attachment_name = $uploaded_article; 
                                        $fp = fopen($tmp, "rb"); //Open it
                                        $attachedfile_tmp = fread($fp, filesize($tmp)); //Read it
                                        $attachedfile = chunk_split(base64_encode($attachedfile_tmp)); //Chunk it up and encode it as base64 so it can emailed
                                        fclose($fp); 
                                    }
                            /////////////////////////////
                            $temp=$temp.basename($uploaded_article);
                            move_uploaded_file($tmp,$temp);
                            $file_uploaded_success = TRUE;
                        }else{                            
                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('file_type_not_supported_error').'</div>';
                            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                            $this->_commonPageLayout('frontend_viewer');                            
                        }
                }
            }else{          
                        $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_max_file_upload_size').'</div>';
                        $this->data['dynamicView'] = 'pages/organization/mainboard/article_post'; 
                        $this->_commonPageLayout('frontend_viewer');
                    }
        
        
                $article_data['uploaded_article'] = $uploaded_article;
                $inserted_article_id = $this->info_model->insert_mainboard_article($article_data);
                if($inserted_article_id && ($this->data['publish_date'] == $todate ) ){
                       $article_data['art_inserted_article_id'] = $inserted_article_id;                    
                       $org_info = $this->info_model->get_organization_info_by_id($org_id);
                       $article_category_info = $this->info_model->get_category($article_data['article_category']);
                       if($article_data['send_to_group']){
                            $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($article_data['send_to_group']);
                            if($mem_assigned_to_group){                                
                                foreach($mem_assigned_to_group as $group_mem){
                                    $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                                }
                            }
                       }
                      
                      if($group_mem_id){
                              $group_mem_id = rtrim ($group_mem_id,',');
                      }
                   
                       $article_data['receiver_members_id'] = $group_mem_id.",".$article_data['send_to_member'];
                       
                       if($org_info){$article_data['org_name'] = $org_info[0]->org_name;}
                       if($article_category_info){$article_data['art_category_name'] = $article_category_info[0]->category_name;}
                       else{$article_data['art_category_name'] ="Default";}
                   
                   
                        if($this->data['send_article_by']){
                            foreach($this->data['send_article_by'] as $key=>$value){
                                if($value=="Email"){
                                    //$this->send_article_by_email($article_data, "send_article", $attachment_name, $attachedfile);
                                }elseif($value=="Letter"){                                   
                                     if(!empty($uploaded_article) && $file_uploaded_success){                                          
                                            $article_letter_path = "./org_member_letter/";
                                            $uploaded_article_letter = $article_letter_path."letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                                            $article_data['uploaded_letter'] = "letter_".$article_data['article_title']."_".$max_article_id.".".$extension;
                                            copy($temp, $uploaded_article_letter);
                                    }
                                    //$this->send_article_by_letter($article_data, $inserted_article_id);
                                }
                            }
                        }
                        if($this->data['send_notification_by']){
                            foreach($this->data['send_notification_by'] as $key=>$value){
                                if($value=="Email"){
                                    //$this->send_article_by_email($article_data , "send_notification", $attachedfile);
                                }elseif($value=="SMS"){
                                    //$this->send_article_by_sms($article_data);
                                }
                            }
                        }                                    
            }
            if($inserted_article_id){                
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('main_board_article_proposal_success').'</div>');
                }
            elseif(!$inserted_article_id){                
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('main_board_article_proposal_failure').'</div>');
                }
                redirect('organization/info/proposal_article');
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////
            
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_post_no_access'; 
    }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_form);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * View Article Proposal Request Who has permission to post article directly to mainboard
 *
 *@access private
 *@return Article Proposal Request
 */
function article_proposal(){
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'article_proposal';
    $this->data['article_title']  = "";
    $this->data['search_option'] = "";  
    $this->data['all_archieve_article_also'] ="";
    $data_previlize = $this->check_member_type_previlize();  
    $org_id = $data_previlize['member_org'];
    if($data_previlize['mainboard_change_article']) {
            $article_proposal['article_proposals'] = $this->info_model->get_proposed_article_by_org_id($org_id,"");
            $this->load->vars($article_proposal);
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_proposal'; 
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_proposal_no_access'; 
    }       
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * View Proposed article details Who has permission to post article directly to mainboard
 *
 *@Param $article_id which contains article_id
 *@access private
 *@return Proposed article details 
 */ 
function proposed_article_details($article_id){
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'article_proposal';    
    $data_previlize = $this->check_member_type_previlize();  
    if($data_previlize['mainboard_change_article']) {
            $this->data['article_details'] = $this->info_model->get_proposed_article_details_by_article_id($article_id,$data_previlize['member_org']);
            $this->data['mainboard_change_article'] = $data_previlize['mainboard_change_article'];            
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_proposal_details'; 
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_proposal_no_access'; 
    }       
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Deny Proposed article Who has permission to post article directly to mainboard
 *
 *@Param $article_id which contains article_id
 *@access private
 *@return Success/Failure Message
 */ 
function deny_proposed_article($article_id){
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'article_proposal';    
    $data_previlize = $this->check_member_type_previlize();  
    if( $data_previlize['mainboard_change_article']) {
            $success = $this->info_model->deny_proposed_article_by_article_id($article_id,$data_previlize['member_org']);
            if($success){                
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('proposed_article_deny_success').'</div>');
            }
            else{                
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('proposed_article_deny_failure').'</div>');
            }
            redirect('organization/info/article_proposal');
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_proposal_no_access'; 
    }       
        $this->_commonPageLayout('frontend_viewer');
}



/**
 * Delete Proposed article Who has permission to post article directly to mainboard
 *
 *@Param $article_id which contains article_id
 *@access private
 *@return Success/Failure Message
 */ 
function delete_proposed_article($article_id){
    $this->data['mainTab'] = 'mainboard';
    $this->data['activeTab'] = 'article_proposal';    
    $org_id = $this->session->userdata('member_org');
    $data_previlize = $this->check_member_type_previlize();  
    if($this->session->userdata('mem_type')=="Admin" || $data_previlize['mainboard_change_article']) {
            $data_article = $this->info_model->get_proposed_article_details_by_article_id($article_id, $org_id);
            $success = $this->info_model->delete_proposed_article_by_article_id($article_id, $org_id);
            //$success = TRUE;
            if($success){           
                if($data_article){                                  
                    foreach($data_article as $rows){                        
                        $uploaded_article = $rows->uploaded_article;    
                        if($uploaded_article){
                            $filePath = "./main_board_article/".$uploaded_article;
                            if(file_exists($filePath)){
                                unlink($filePath);
                            }
                        } 
                        if(strpos($rows->send_article_by, ',') !== FALSE){
                            $send_article_by = explode(",",$rows->send_article_by);
                        }else{$send_article_by = array($rows->send_article_by);}                   
                    }    
                    if(sizeof($send_article_by)>0){
                        foreach($send_article_by as $key=>$value){
                            if($value=="Letter" && $uploaded_article){
                                 $uploaded_letter = substr_replace($uploaded_article, "letter", 0, 7); 
                                 $letter_Path = "./org_member_letter/".$uploaded_letter;
                                if(file_exists($letter_Path)){
                                    unlink($letter_Path);
                                }
                            }
                        }
                    }
                }
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('proposed_article_delete_success').'</div>');
            }
            else{                
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('proposed_article_delete_failure').'</div>');
            }
            redirect('organization/info/article_proposal');
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/mainboard/article_proposal_no_access'; 
    }       
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * View Forum for logged user's organization
 *
 *@access Private
 *@return Forum for logged user's organization
 */ 
function view_forum(){ 
$this->data['mainTab'] = 'view_forum';
$this->data['activeTab'] = 'view_forum';
    $data_previlize = $this->check_member_type_previlize();     
    if(  $data_previlize['forum_access'] ) { 
        $this->data['mainTab'] = 'view_forum';
        $this->data['activeTab'] = 'view_forum';
        $this->data['topic_title']  = "";
        $this->data['search_option'] = "";  
        $this->data['all_archieve_topic_also'] ="";
        $this->data['all_active_topic'] = $this->info_model->get_active_forum_topic_by_org_id($data_previlize['member_org'],"","");
        $this->data['dynamicView'] = 'pages/organization/forum/view_post';
    }
    else{
        $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
    }
    $this->_commonPageLayout('frontend_viewer');
}


/**
 * Search Forum Topic for logged user's organization by Search Parameter
 *
 *@access Private
 *@return Forum Topic for logged user's organization by Search Parameter
 */ 
function search_forum_topic(){
        $this->data['mainTab'] = 'view_forum';
        $this->data['activeTab'] = 'view_forum';
        $data_previlize = $this->check_member_type_previlize();     
        if( $data_previlize['forum_access'] ) { 
            $this->data['topic_title']  = $this->input->post("topic_title");
            $this->data['search_option'] = $this->input->post("search_option");  
            $this->data['all_archieve_topic_also'] ="";
            $this->data['all_active_topic'] = $this->info_model->get_active_forum_topic_by_org_id($data_previlize['member_org'], $this->data['topic_title'], $this->data['search_option']);
            if($this->data['search_option']=="all"){
                $this->data['all_archieve_topic_also'] = $this->info_model->get_active_forum_topic_by_org_id($data_previlize['member_org'], $this->data['topic_title'], "archieve");
            }
            $this->data['dynamicView'] = 'pages/organization/forum/view_post';
        }
        else{
                $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
        }
         $this->_commonPageLayout('frontend_viewer');
}


/**
 * View Forum Topic Details By topic_id
 *
 *@Param topic_id which contains topic id
 *@access Private
 *@return Forum Topic Details By topic_id
 */ 
function forum_topic_details($topic_id){
        $this->data['mainTab'] = 'view_forum';
        $this->data['activeTab'] = 'view_forum';
        
        $data_previlize = $this->check_member_type_previlize();     
        if( $data_previlize['forum_access'] ) { 
            $this->data['topic_details'] = $this->info_model->get_forum_topic_details_by_topic_id($topic_id, $data_previlize['member_org']);
            $this->data['topic_comments'] = $this->info_model->get_forum_topic_comments_by_topic_id($topic_id, $data_previlize['member_org']);
            $this->data['dynamicView'] = 'pages/organization/forum/forum_topic_details';
        }else{
                $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
        }
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * View Forum Topic Details By topic_id
 *
 *@Param topic_id which contains topic id
 *@access Private
 *@return Forum Topic Details By topic_id
 */ 
function archived_forum_topic_details($topic_id){
        $this->data['mainTab'] = 'view_forum';
        $this->data['activeTab'] = 'view_forum';        
        $data_previlize = $this->check_member_type_previlize();     
        if( $data_previlize['forum_access'] ) { 
            $this->data['topic_details'] = $this->info_model->get_archived_forum_topic_details_by_topic_id($topic_id, $data_previlize['member_org']);
            $this->data['topic_comments'] = $this->info_model->get_archived_forum_topic_comments_by_topic_id($topic_id, $data_previlize['member_org']);
            $this->data['dynamicView'] = 'pages/organization/forum/archived_forum_topic_details';
        }else{
                $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
        }
        $this->_commonPageLayout('frontend_viewer');
}



/**
 * Comment On Forum Topic
 *
 *@Param topic_id which contains topic id
 *@access Private
 *@return Success/Failure Message
 */ 
function comment_on_forum_topic(){
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'view_forum';
        $this->data['activeTab'] = 'view_forum';
        $data_previlize = $this->check_member_type_previlize();     
        if( $data_previlize['forum_access'] ) { 
        $this->load->library('form_validation');
        $to_date = time(); 
        $topic_id = $this->input->post("topic_id");
        $this->data['topic_details'] = $this->info_model->get_forum_topic_details_by_topic_id($topic_id, $data_previlize['member_org']);
        $this->data['topic_comments'] = $this->info_model->get_forum_topic_comments_by_topic_id($topic_id, $data_previlize['member_org']);
            
        $this->form_validation->set_rules('comment_topic', $this->lang->line('comments_text'), 'trim|required');
        if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/organization/forum/forum_topic_details';
        } 
       else {    $data = array(
                    'comment' => $this->input->post("comment_topic"),
                    'organization_id' => $data_previlize['member_org'],
                    'topic_id' =>  $topic_id,
                    'comment_on_member_id' => $this->input->post("comment_on_member_id"),
                    'comment_member_id' => $this->session->userdata('mem_id'),
                    'comment_date' => $to_date,
                    'add_date' => $to_date
                    );
                    //echo "<pre>";print_r($data);die();
                    $comment_id = $this->info_model->forum_comment_insert($data);
                    if($comment_id){
                            $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('forum_topic_comment_post_successful').'</div>');
                    }else{
                            $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('forum_topic_comment_post_failed').'</div>');
                    }
                    redirect('organization/info/forum_topic_details/'.$topic_id);
            }
        }else{
                $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
        }
           $this->_commonPageLayout('frontend_viewer'); 
}

/**
 * Load Forum Topic Post Form
 *
 *@access private
 *@return Forum Topic Post Form
 */
function add_forum_topic(){
    $this->data['mainTab'] = 'view_forum';
    $this->data['activeTab'] = 'view_forum';
    $this->data['expire_date_error'] = '';
    $this->data['publish_date_error'] = '';
    
    $data_form = array("topic_title" => "",
                                    "topic_text" => "",
                                    "publish_date" => "",
                                    "publish_date_intake" => "",
                                    "expire_date" => "",
                                    "expire_date_intake" => "",
                            );
    
    $data_previlize = $this->check_member_type_previlize();  
    if( $data_previlize['forum_access']) {
            $mem_id = $this->session->userdata('mem_id');
            $org_id = $data_previlize['member_org'];
            $this->data['dynamicView'] = 'pages/organization/forum/forum_topic_post'; 
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
    }
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_form);	   
        $this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Process Forum Topic Post 
 *
 *@access private
 *@return Success/Failure Message
 */
function add_forum_topic_process(){
    $this->data['mainTab'] = 'view_forum';
    $this->data['activeTab'] = 'view_forum';
    $this->data['publish_date'] ="";
    $this->data['publish_date_intake'] ="";
    $this->data['expire_date'] ="";
    $this->data['expire_date_intake'] ="";
            
    $error_data['expire_date_error'] = "";
    $error_data['publish_date_error'] = "";
      
    $data_previlize = $this->check_member_type_previlize();  
    
    if( $data_previlize['forum_access']) {
            $mem_id = $this->session->userdata('mem_id');
            $org_id = $data_previlize['member_org'];
          
            /////////////////////////////////////////////////////////////////////////////////////////////
            
            $this->load->library('form_validation');
            $this->data['topic_title'] = $this->input->post('topic_title');   
            $this->data['topic_text'] = $this->input->post('topic_text');
           
            if($this->input->post('publish_date')){
                $this->data['publish_date_intake'] = $this->input->post('publish_date');
                $this->data['publish_date'] = explode("-",$this->input->post('publish_date'));
                $this->data['publish_date'] = mktime(0, 0, 0, ($this->data['publish_date'][1]), $this->data['publish_date'][2], $this->data['publish_date'][0]);
                $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($this->data['publish_date'] < $todate ){
                        $error_data['publish_date_error'] = $this->lang->line('forum_topic_publish_date_error');
                }   
            }        
            
            if($this->input->post('expire_date')){
                $this->data['expire_date_intake'] = $this->input->post('expire_date');
                $this->data['expire_date'] = explode("-",$this->input->post('expire_date'));
                $this->data['expire_date'] = mktime(0, 0, 0, ($this->data['expire_date'][1]), $this->data['expire_date'][2], $this->data['expire_date'][0]);
                if(empty($error_data['publish_date_error']) && $this->data['publish_date'] >= $this->data['expire_date']){
                        $error_data['expire_date_error'] = $this->lang->line('forum_topic_expire_date_error');
                }
            }
            $this->form_validation->set_rules('topic_title', $this->lang->line('label_title'), 'trim|required');
            $this->form_validation->set_rules('topic_text', $this->lang->line('label_text'), 'trim|required');
            $this->form_validation->set_rules('publish_date', $this->lang->line('label_publish_date'), 'trim|required');
            $this->form_validation->set_rules('expire_date', $this->lang->line('label_expire_date'), 'trim|required');
           
            if ($this->form_validation->run() == FALSE || !empty($error_data['publish_date_error']) || !empty($error_data['expire_date_error'])) {     
                $this->load->vars($error_data);  
                $this->data['dynamicView'] = 'pages/organization/forum/forum_topic_post'; 
                //$this->_commonPageLayout('frontend_viewer');
            } 
            else{                            
                $topic_data['org_id'] = $org_id;
                $topic_data['member_id'] = $mem_id;
                $topic_data['topic_title'] = $this->data['topic_title'];
                $topic_data['topic_text'] = $this->data['topic_text'];
                $topic_data['publish_date'] = $this->data['publish_date'];
                $topic_data['expire_date'] = $this->data['expire_date'];                
                $topic_data['add_date'] = date("Y-m-d H:i:s");                   
                $inserted_topic_id = $this->info_model->insert_forum_topic($topic_data);
                if($inserted_topic_id){                
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('forum_topic_post_success').'</div>');
                }
                elseif(!$inserted_topic_id){                
                        $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('forum_topic_post_failure').'</div>');
                }
                redirect('organization/info/view_forum');
            }
            
        /////////////////////////////////////////////////////////////////////////////////////////////////            
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
    }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Load Forum Topic Edit Form
 *
 *@Param $topic_id
 *@access private
 *@return Forum Topic Edit Form
 */
function edit_forum_topic($topic_id){
    $this->data['mainTab'] = 'view_forum';
    $this->data['activeTab'] = 'view_forum';
    $this->data['expire_date_error'] = '';
    $this->data['publish_date_error'] = '';
    $data_previlize = $this->check_member_type_previlize();  
    $this->data['topic_details'] = $this->info_model->get_forum_topic_details_by_topic_id($topic_id, $data_previlize['member_org']);  
    
    if($this->data['topic_details'][0]->member_id == $this->session->userdata('mem_id')) { 
            $this->data['dynamicView'] = 'pages/organization/forum/forum_topic_edit'; 
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
    }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($this->data['topic_details']);	 
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Process Forum Topic Edit 
 *
 *@access private
 *@return Success/Failure Message
 */
function edit_forum_topic_process(){
    $this->data['mainTab'] = 'view_forum';
    $this->data['activeTab'] = 'view_forum';
    $this->data['publish_date'] ="";
    $this->data['publish_date_intake'] ="";
    $this->data['expire_date'] ="";
    $this->data['expire_date_intake'] ="";
            
    $error_data['expire_date_error'] = "";
    $error_data['publish_date_error'] = "";
    
    $topic_id = $this->input->post('topic_id');   
    $data_previlize = $this->check_member_type_previlize();  
    $this->data['topic_details'] = $this->info_model->get_forum_topic_details_by_topic_id($topic_id, $data_previlize['member_org']);  
    //print_r($this->data['topic_details']);exit;
    
    if( $this->data['topic_details'][0]->member_id == $this->session->userdata('mem_id')) { 
           /////////////////////////////////////////////////////////////////////////////////////////////
            
            $this->load->library('form_validation');
            
            $this->data['topic_title'] = $this->input->post('topic_title');   
            $this->data['topic_text'] = $this->input->post('topic_text');
           
            if($this->input->post('publish_date')){
                $this->data['publish_date_intake'] = $this->input->post('publish_date');
                $this->data['publish_date'] = explode("-",$this->input->post('publish_date'));
                $this->data['publish_date'] = mktime(0, 0, 0, ($this->data['publish_date'][1]), $this->data['publish_date'][2], $this->data['publish_date'][0]);
                $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($this->data['publish_date'] < $todate ){
                        $error_data['publish_date_error'] = $this->lang->line('forum_topic_publish_date_error');
                }   
            }        
            
            if($this->input->post('expire_date')){
                $this->data['expire_date_intake'] = $this->input->post('expire_date');
                $this->data['expire_date'] = explode("-",$this->input->post('expire_date'));
                $this->data['expire_date'] = mktime(0, 0, 0, ($this->data['expire_date'][1]), $this->data['expire_date'][2], $this->data['expire_date'][0]);
                if(empty($error_data['publish_date_error']) && $this->data['publish_date'] >= $this->data['expire_date']){
                        $error_data['expire_date_error'] = $this->lang->line('forum_topic_expire_date_error');
                }
            }
            $this->form_validation->set_rules('topic_title', $this->lang->line('label_title'), 'trim|required');
            $this->form_validation->set_rules('topic_text', $this->lang->line('label_text'), 'trim|required');
            $this->form_validation->set_rules('publish_date', $this->lang->line('label_publish_date'), 'trim|required');
            $this->form_validation->set_rules('expire_date', $this->lang->line('label_expire_date'), 'trim|required');
           
            if ($this->form_validation->run() == FALSE || !empty($error_data['publish_date_error']) || !empty($error_data['expire_date_error'])) {     
                $this->load->vars($this->data['topic_details']);	 
                $this->load->vars($error_data);  
                $this->data['dynamicView'] = 'pages/organization/forum/forum_topic_edit'; 
                //$this->_commonPageLayout('frontend_viewer');
            } 
            else{                            
                $topic_data['topic_title'] = $this->data['topic_title'];
                $topic_data['topic_text'] = $this->data['topic_text'];
                $topic_data['publish_date'] = $this->data['publish_date'];
                $topic_data['expire_date'] = $this->data['expire_date'];                
                $update_success = $this->info_model->update_forum_topic($topic_data, $topic_id);
                if($update_success){                
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('forum_topic_update_success').'</div>');
                }
                elseif(!$update_success){                
                        $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('forum_topic_update_failure').'</div>');
                }
                redirect('organization/info/view_forum');
            }
            
        /////////////////////////////////////////////////////////////////////////////////////////////////            
    }
    else{  
            $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access'; 
    }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);
        $this->_commonPageLayout('frontend_viewer');
}
/**
 * Delete forum topic process 
 *
 *@Param $topic_id which contains topic id
 *@access Private
 *@return Success/Failure Message
 */ 
function delete_forum_topic($topic_id){
        $this->data['mainTab'] = 'view_forum';
        $this->data['activeTab'] = 'view_forum';     
        $data_previlize = $this->check_member_type_previlize();  

        $topic_details = $this->info_model->get_forum_topic_details_by_topic_id($topic_id, $data_previlize['member_org']);       
        if(  $topic_details[0]->member_id == $this->session->userdata('mem_id')) { 
            $delete_success = $this->info_model->delete_forum_topic($topic_id);
            if($delete_success){
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('forum_topic_deleted_successful').'</div>');
            }else{
                $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('forum_topic_deleted_failed').'</div>');
            }
            redirect("organization/info/view_forum");
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access';
            $this->_commonPageLayout('frontend_viewer'); 
        }   
}

/**
 * Delete Archived forum topic process 
 *
 *@Param $topic_id which contains topic id
 *@access Private
 *@return Success/Failure Message
 */ 
function archived_delete_forum_topic($topic_id){
        $this->data['mainTab'] = 'view_forum';
        $this->data['activeTab'] = 'view_forum';     
        $data_previlize = $this->check_member_type_previlize();  

        $topic_details = $this->info_model->get_archived_forum_topic_details_by_topic_id($topic_id, $data_previlize['member_org']);       
        if(  $topic_details[0]->member_id == $this->session->userdata('mem_id')) { 
            $delete_success = $this->info_model->delete_archived_forum_topic($topic_id);
            if($delete_success){
                $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('forum_topic_deleted_successful').'</div>');
            }else{
                $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('forum_topic_deleted_failed').'</div>');
            }
            redirect("organization/info/view_forum");
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/forum/forum_no_access';
            $this->_commonPageLayout('frontend_viewer'); 
        }   
}

/**
 * View faktura over view
 *
 *@access private
 *@return faktura over view
 */ 
    function faktura(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_overview';
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            //$this->data['query1'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_overview';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * Load faktura create new customer form
 *
 *@access private
 *@return fatura create new customer form
 */ 
    function create_faktura_new_customer(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_customers';
        $data_create_fak_customer = array(                    
            'fak_customer_type' => "",
            'fak_customer_or_company_name' => "",
            'fak_customer_care_of' => "",
            'fak_customer_billing_address' => "",
            'fak_customer_zip' => "",
            'fak_customer_city' => "",
            'fak_customer_state' => "",
            'fak_customer_country' => "",
            'fak_customer_email' => "",  
            'fak_customer_no' => "",              
            'fak_customer_reg_no' => "",
            'fak_customer_to' => "",
            'fak_customer_contact_no' => "",
            'admin_notes' => ""          
        );
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            //$this->data['query1'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_create_new_customer';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_create_fak_customer);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * faktura create new customer Process
 *
 *@access private
 *@return Success/Failure message
 */ 
    function create_faktura_new_customer_process(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_customers';
        $data_previlize = $this->check_member_type_previlize();
        $mem_id = $this->session->userdata('mem_id');
        $mem_type = $data_previlize['mem_type']; 
        $member_org = $data_previlize['member_org'];
        $data_create_fak_customer = array(     
            'org_id' =>$member_org,
            'mem_id' =>$mem_id,
            'fak_customer_type' =>$this->input->post('fak_customer_type'),
            'fak_customer_or_company_name' => $this->input->post('fak_customer_or_company_name'),
            'fak_customer_care_of' => $this->input->post('fak_customer_care_of'),
            'fak_customer_billing_address' => $this->input->post('fak_customer_billing_address'),
            'fak_customer_zip' => $this->input->post('fak_customer_zip'),
            'fak_customer_city' => $this->input->post('fak_customer_city'),
            'fak_customer_state' => "",
            'fak_customer_country' => $this->input->post('fak_customer_country'),
            'fak_customer_email' => $this->input->post('fak_customer_email'),  
            'fak_customer_no' => $this->input->post('fak_customer_no'),              
            'fak_customer_reg_no' =>$this->input->post('fak_customer_reg_no'),
            'fak_customer_to' => $this->input->post('fak_customer_to'),
            'fak_customer_contact_no' => $this->input->post('fak_customer_contact_no'),
            'admin_notes' => $this->input->post('admin_notes'),
            'add_date' => date("Y-m-d H:i:s")
        );
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fak_customer_type', $this->lang->line('label_fak_customer_type'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_or_company_name', $this->lang->line('label_fak_customer_or_company_name'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_care_of', $this->lang->line('label_fak_care_of'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_billing_address', $this->lang->line('label_fak_billing_address'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_zip', $this->lang->line('label_fak_zip'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_city', $this->lang->line('label_fak_city'), 'trim|required|xss_clean');
            //$this->form_validation->set_rules('fak_customer_state', $this->lang->line('label_fak_state'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_country', $this->lang->line('label_fak_country'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_email', $this->lang->line('label_fak_email'), 'trim|required|valid_email|xss_clean|callback_email_check');
            //$this->data['query1'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            if ($this->form_validation->run() == FALSE) {       
                $this->data['dynamicView'] = 'pages/organization/faktura/faktura_create_new_customer';
            }
            else{
                    //print_r($data_create_fak_customer);exit;
                    $success = $this->info_model->insert_faktura_new_customer($data_create_fak_customer);
                    if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_create_new_customer_success').'</div>');
                    }
                else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_create_new_customer_failure').'</div>'); }
                redirect('organization/info/faktura_customers');
            }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_create_fak_customer);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * Load faktura create new customer form
 *
 *@access private
 *@return fatura create new customer form
 */ 
    function edit_faktura_customer($faktura_customer_id=NULL){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_customers';
        
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['faktura_customer_details'] = $this->info_model->get_faktura_customer_details_by_faktura_customer_id($faktura_customer_id);
            //$this->data['query1'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_edit_customer';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}



/**
 * Edit faktura customer Process
 *
 *@access private
 *@return Success/Failure message
 */ 
    function edit_faktura_customer_process(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_customers';
        $member_org = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $faktura_customer_id = $this->input->post('faktura_customer_id');
        $data_create_fak_customer = array(     
            'fak_customer_type' =>$this->input->post('fak_customer_type'),
            'fak_customer_or_company_name' => $this->input->post('fak_customer_or_company_name'),
            'fak_customer_care_of' => $this->input->post('fak_customer_care_of'),
            'fak_customer_billing_address' => $this->input->post('fak_customer_billing_address'),
            'fak_customer_zip' => $this->input->post('fak_customer_zip'),
            'fak_customer_city' => $this->input->post('fak_customer_city'),
            'fak_customer_state' => "",
            'fak_customer_country' => $this->input->post('fak_customer_country'),
            'fak_customer_email' => $this->input->post('fak_customer_email'),  
            'fak_customer_no' => $this->input->post('fak_customer_no'),              
            'fak_customer_reg_no' =>$this->input->post('fak_customer_reg_no'),
            'fak_customer_to' => $this->input->post('fak_customer_to'),
            'fak_customer_contact_no' => $this->input->post('fak_customer_contact_no'),
            'admin_notes' => $this->input->post('admin_notes')
            );
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fak_customer_type', $this->lang->line('label_fak_customer_type'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_or_company_name', $this->lang->line('label_fak_customer_or_company_name'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_care_of', $this->lang->line('label_fak_care_of'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_billing_address', $this->lang->line('label_fak_billing_address'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_zip', $this->lang->line('label_fak_zip'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_city', $this->lang->line('label_fak_city'), 'trim|required|xss_clean');
           // $this->form_validation->set_rules('fak_customer_state', $this->lang->line('label_fak_state'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_customer_email', $this->lang->line('label_fak_email'), 'trim|required|valid_email|xss_clean|callback_email_check');
            //$this->data['query1'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            if ($this->form_validation->run() == FALSE) {      
                 $this->data['faktura_customer_details'] = $this->info_model->get_faktura_customer_details_by_faktura_customer_id($faktura_customer_id);
                 $this->data['dynamicView'] = 'pages/organization/faktura/faktura_edit_customer';
            }
            else{
                    $success = $this->info_model->update_faktura_new_customer($data_create_fak_customer, $faktura_customer_id);
                    if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_customer_edit_success').'</div>');
                    }
                else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_customer_edit_failure').'</div>'); }
                redirect('organization/info/faktura_customers');
            }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * View Faktura customer list
 *
 *@access Private
 *@return  Faktura customer list
 */ 
    function faktura_customers() {
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_customers';
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $this->data['query1'] = $this->info_model->view_all_faktura_customers($org_id);
     
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_all_customers';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}


/**
 * Load faktura settings form
 *
 *@access private
 *@return faktura settings form
 */ 
    function faktura_settings(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_settings';
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $data_fak_settings = array(                    
            'org_id' => $org_id,
            'mem_id' => $mem_id,
            'fak_no_of_records_per_page' => 10,
            'fak_payment_days' => 30,
            'fak_tax_rate' => 25,
            'fak_invoice_no' => 'No',
            'fak_org_bank_payment_type' => '',
            'fak_logo_include' => "No",  
            'fak_email_cc' => "No",  
            'fak_payment_details' => ""       
        );
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);
            $this->data['data_org_bank_payment_type_info'] = $this->info_model->get_org_bank_payment_info($org_id);
            if(!$this->data['data_fak_settings_details']){
                $insert_default = $this->info_model->insert_faktura_settings_default($data_fak_settings);
                $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);                
            }
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_settings';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_fak_settings);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}


/**
 * Faktura settings update process
 *
 *@access private
 *@return success/failure message
 */ 
    function faktura_settings_update_process(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_settings';
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $fak_settings_id = $this->input->post('fak_settings_id');
       // echo $this->input->post('fak_org_bank_payment_type');exit;
        $data_fak_settings = array(                    
            'fak_no_of_records_per_page' => $this->input->post('fak_no_of_records_per_page'),
            'mem_id' => $mem_id,
            'fak_payment_days' =>$this->input->post('fak_payment_days'),
            'fak_tax_rate' => $this->input->post('fak_tax_rate'),
            'fak_invoice_no' => $this->input->post('fak_invoice_no'),
            'fak_org_bank_payment_type' => $this->input->post('fak_org_bank_payment_type'),
            'fak_logo_include' => $this->input->post('fak_logo_include'),  
            'fak_email_cc' => $this->input->post('fak_email_cc'),  
            'fak_payment_details' => $this->input->post('fak_payment_details') 
        );
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fak_no_of_records_per_page', $this->lang->line('label_fak_no_of_records_per_page'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_payment_days', $this->lang->line('label_fak_payment_days'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_tax_rate', $this->lang->line('label_fak_tax_rate'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_invoice_no', $this->lang->line('label_fak_invoice_no'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_org_bank_payment_type', $this->lang->line('label_fak_payment_account'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_logo_include', $this->lang->line('label_fak_logo_include'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_email_cc', $this->lang->line('label_fak_email_cc'), 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {       
                 $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);
                 $this->data['data_org_bank_payment_type_info'] = $this->info_model->get_org_bank_payment_info($org_id);
                 $this->data['dynamicView'] = 'pages/organization/faktura/faktura_settings';
            }
            else{
                    $success = $this->info_model->update_faktura_settings($data_fak_settings, $fak_settings_id, $org_id);
                    if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_settings_update_success').'</div>');
                    }
                else{ //$this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_settings_update_failure').'</div>'); 
                }
                redirect('organization/info/faktura_settings');
            }
           
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_fak_settings);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * View Faktura products list
 *
 *@access Private
 *@return  Faktura products list
 */ 
    function faktura_products() {
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_settings';
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $this->data['query1'] = $this->info_model->view_all_faktura_products($org_id);     
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_all_products';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * Load faktura create new products form
 *
 *@access private
 *@return faktura create new products form
 */ 
    function create_faktura_new_products(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_settings';
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');        
        $data_create_fak_products = array(                    
            'fak_product_name' => "",
            'fak_product_price' => "",
            'fak_product_vat_rate' => "",
            'fak_contact_no' => "",
            'fak_listing' => ""          
        );
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);
            //$this->data['query1'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_create_new_product';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_create_fak_products);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}



/**
 * faktura create new product Process
 *
 *@access private
 *@return Success/Failure message
 */ 
    function create_faktura_new_products_process(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_settings';
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $data_create_fak_product = array(     
            'org_id' =>$org_id,
            'mem_id' =>$mem_id,
            'fak_product_name' =>$this->input->post('fak_product_name'),
            'fak_product_price' => $this->input->post('fak_product_price'),
            'fak_product_vat_rate' => $this->input->post('fak_product_vat_rate'),             
            'add_date' => date("Y-m-d H:i:s")
        );
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fak_product_name', $this->lang->line('label_product_name'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_product_price', $this->lang->line('label_price_ex_vat'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_product_vat_rate', $this->lang->line('label_vat_rate'), 'trim|required|xss_clean');           
            //$this->data['query1'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            if ($this->form_validation->run() == FALSE) {       
                $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);
                $this->data['dynamicView'] = 'pages/organization/faktura/faktura_create_new_product';
            }
            else{
                    $success = $this->info_model->insert_faktura_new_product($data_create_fak_product);
                    if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_create_new_product_success').'</div>');
                    }
                else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_create_new_product_failure').'</div>'); }
                redirect('organization/info/faktura_products');
            }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_create_fak_product);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * Load faktura customer update form
 *
 *@access private
 *@return faktura customer update form
 */ 
    function edit_faktura_product($faktura_product_id=NULL){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_settings';        
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['faktura_product_details'] = $this->info_model->get_faktura_product_details_by_product_id($faktura_product_id);
            //$this->data['query1'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_edit_product';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}



/**
 * Edit faktura customer Process
 *
 *@access private
 *@return Success/Failure message
 */ 
    function edit_faktura_product_process(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_settings';
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $faktura_product_id = $this->input->post('faktura_product_id');
        $data_create_fak_product = array(     
            'fak_product_name' =>$this->input->post('fak_product_name'),
            'fak_product_price' => $this->input->post('fak_product_price'),
            'fak_product_vat_rate' => $this->input->post('fak_product_vat_rate')            
            );
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fak_product_name', $this->lang->line('label_product_name'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_product_price', $this->lang->line('label_price_ex_vat'), 'trim|required|xss_clean');
            $this->form_validation->set_rules('fak_product_vat_rate', $this->lang->line('label_vat_rate'), 'trim|required|xss_clean');    
            if ($this->form_validation->run() == FALSE) {       
                 $this->data['faktura_product_details'] = $this->info_model->get_faktura_product_details_by_product_id($faktura_product_id);
                 $this->data['dynamicView'] = 'pages/organization/faktura/faktura_edit_product';
            }
            else{
                    $success = $this->info_model->update_faktura_product($data_create_fak_product, $faktura_product_id, $org_id);
                    if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_product_edit_success').'</div>');
                    }
                else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_product_edit_failure').'</div>'); }
                redirect('organization/info/faktura_products');
            }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}


/**
 * Delete faktura product
 *
 *@access Private
 *@return Success/Failure Message
 */ 
    function delete_faktura_product($faktura_product_id=NULL) {
         $this->data['mainTab'] = 'faktura';
         $this->data['activeTab'] = 'faktura_settings';
         $org_id = $this->session->userdata('member_org');
         $mem_id = $this->session->userdata('mem_id');
        
        $data_previlize = $this->check_member_type_previlize();  
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {  
            $success = $this->info_model->faktura_product_delete($faktura_product_id);
            if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_product_delete_success').'</div>');
            }else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_product_delete_failure').'</div>'); }
            redirect('organization/info/faktura_products', 'location', 301);
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer'); 
}


/**
 * Delete faktura customer
 *
 *@access Private
 *@return Success/Failure Message
 */ 
    function delete_faktura_customer($faktura_customer_id=NULL) {
         $this->data['mainTab'] = 'faktura';
         $this->data['activeTab'] = 'faktura_customers';
         $org_id = $this->session->userdata('member_org');
         $mem_id = $this->session->userdata('mem_id');
        
        $data_previlize = $this->check_member_type_previlize();  
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {  
            $success = $this->info_model->faktura_customer_delete($faktura_customer_id);
            if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_customer_delete_success').'</div>');
            }else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_customer_delete_failure').'</div>'); }
            redirect('organization/info/faktura_customers', 'location', 301);
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer'); 
}


/**
 * List All Faktura Invoices By Organization
 *
 *@access private
 *@return Faktura List By Organization
 */ 
    function faktura_invoices(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_invoices';
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['org_all_custom_invoice'] = $this->info_model->get_all_custom_invoice($this->session->userdata('member_org'));
            //print_r($this->data['org_all_custom_invoice'] ); exit;
            $this->data['dynamicView'] = 'pages/organization/faktura/custom_faktura_list';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($error_data);  
        //$this->load->vars($data_create_faktura);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * Load faktura create form
 *
 *@access private
 *@return faktura create form
 */ 
    function create_faktura(){
        $this->data['external_or_org_customer'] = ""; 
        $this->data['fak_send_to_org_or_ext_customer_id'] = "";
            
        if($this->uri->segment(4) && $this->uri->segment(5)){
            $this->data['external_or_org_customer'] = $this->uri->segment(4); 
            $this->data['fak_send_to_org_or_ext_customer_id'] = $this->uri->segment(5); 
        }    
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_invoices';
        $error_data['invoice_date_error'] = "";
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $data_create_faktura = array(                    
            'fak_invoice_date' => "",          
            'fak_invoice_date_intake' => "",          
            'fak_send_to_external_customer' => "",          
            'fak_send_to_org_customer' => "",          
            'fak_terms_of_payment' => "",          
            'fak_notes' => "",          
            'fak_customer_notification' => "",          
            'product_name' => "",          
            'no_of_products' => "",          
            'price_ex_vat' => "" ,    
            'vat_rate' => ""      
        );
        
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="Superadmin" || $data_previlize['access_faktura']) {
            $this->data['org_registered_member'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            $this->data['faktura_customers'] = $this->info_model->view_all_faktura_customers($this->session->userdata('member_org'));
            $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);            
            $this->data['data_fak_products'] = $this->info_model->view_all_faktura_products($org_id);            
            $this->data['last_fak_entry_by_org_id'] = $this->info_model->get_last_fak_entry_by_org_id($org_id);      
            if(empty($this->data['last_fak_entry_by_org_id'])){
                $this->data['fak_invoice_no'] = 1;
            }else{
                $this->data['fak_invoice_no'] = $this->data['last_fak_entry_by_org_id'][0]->fak_invoice_no+1;
            }
            $this->data['dynamicView'] = 'pages/organization/faktura/create_faktura';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($error_data);  
        $this->load->vars($data_create_faktura);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 *  create new faktura Process
 *
 *@access private
 *@return Success/Failure message
 */ 
    function create_faktura_process(){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_invoices';
        $this->load->library('form_validation');
        $data_faktura = array();
        $error_data['invoice_date_error'] = "";
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');        
        $this->data['org_registered_member'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
        $this->data['faktura_customers'] = $this->info_model->view_all_faktura_customers($this->session->userdata('member_org'));
        $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);            
        $this->data['data_fak_products'] = $this->info_model->view_all_faktura_products($org_id);     
        $fak_invoice_no = $this->input->post('fak_invoice_no');
        $new_invoice_seq = $this->input->post('new_invoice_seq');
        $fak_invoice_no_check = "";
        $fak_invoice_date="";
        $fak_invoice_no_rand = "";        
        $per_invoice_cost ="";
        if($this->data['data_fak_settings_details'] ){
            $fak_invoice_no_check = $this->data['data_fak_settings_details'][0]->fak_invoice_no;
        }
        $fak_invoice_date_val = $this->input->post('fak_invoice_date');   
        $this->data['fak_invoice_date_intake'] = $fak_invoice_date_val;
        if($fak_invoice_date_val){
            $fak_invoice_date_val = explode("-",$fak_invoice_date_val);
            $fak_invoice_date = mktime(0, 0, 0, ($fak_invoice_date_val[1]), $fak_invoice_date_val[2], $fak_invoice_date_val[0]);
            $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($fak_invoice_date < $todate ){
                        $error_data['invoice_date_error'] = $this->lang->line('label_fak_invoice_date_error');
                }   
        }               
        $data_create_faktura = array(     
            'org_id' =>$org_id,
            'mem_id' =>$mem_id,
            'fak_invoice_no' => "",
            'fak_invoice_date' => $fak_invoice_date,
            'fak_send_to_external_customer' => $this->input->post('fak_send_to_external_customer'),             
            'fak_send_to_org_customer' => $this->input->post('fak_send_to_org_customer'),             
            'fak_terms_of_payment' => $this->input->post('fak_terms_of_payment'),             
            'fak_notes' => $this->input->post('fak_notes'),             
            'fak_customer_notification' => $this->input->post('fak_customer_notification'),             
            'add_date' => date("Y-m-d H:i:s")
        );                     
        $this->data['product_name'] = $this->input->post('product_name');
        $this->data['no_of_products'] = $this->input->post('no_of_products');
        $this->data['price_ex_vat'] = $this->input->post('price_ex_vat');
        $this->data['vat_rate'] = $this->input->post('vat_rate');
        $product_line_size = sizeof($this->data['product_name']);
        
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="SuperAdmin" || $this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['last_fak_entry_by_org_id'] = $this->info_model->get_last_fak_entry_by_org_id($org_id);      
            if(empty($this->data['last_fak_entry_by_org_id'])){
                $this->data['fak_invoice_no'] = 1;
            }else{
                $this->data['fak_invoice_no'] = $this->data['last_fak_entry_by_org_id'][0]->fak_invoice_no+1;
            }
            $data_global_settings['global_settings_data'] = $this->info_model->get_global_settings();
               // print_r($data['global_settings_data']);
                if($data_global_settings['global_settings_data']){
                    foreach($data_global_settings['global_settings_data'] as $rows){
                        //$data_organization['organization_data']['org_allowed_sms_per_month'] = $rows->allowed_sms_per_month;
                        //$data_organization['organization_data']['org_allowed_letter_per_month'] = $rows->allowed_letter_per_month;
                        $per_invoice_cost = $rows->per_invoice_cost;                        
                    }                    
                }    
            $index = 0;
            while($product_line_size > 0 ){
                if(empty($this->data['product_name'][$index])){
                    $this->form_validation->set_rules('product_name', $this->lang->line('label_fak_specification'), 'trim|required|xss_clean');
                }
                if(empty($this->data['no_of_products'][$index])){
                    $this->form_validation->set_rules('no_of_products', $this->lang->line('label_fak_number'), 'trim|required|xss_clean');
                }elseif($this->data['no_of_products'][$index]){ //$this->form_validation->set_rules('no_of_products', $this->lang->line('label_fak_number'), 'trim|xss_clean|numeric'); 
                }
                if(empty($this->data['price_ex_vat'][$index])){
                    $this->form_validation->set_rules('price_ex_vat', $this->lang->line('label_price_ex_vat'), 'trim|required|xss_clean');
                }elseif($this->data['price_ex_vat'][$index]){ //$this->form_validation->set_rules('price_ex_vat', $this->lang->line('label_price_ex_vat'), 'trim|xss_clean|numeric');
                }
                if(empty($this->data['vat_rate'][$index])){
                    $this->form_validation->set_rules('vat_rate', $this->lang->line('label_vat_rate'), 'trim|required|xss_clean');
                }
                $product_line_size--;
                $index++;               
            }                  
            if($fak_invoice_no_check == "Yes"){ 
                    $this->form_validation->set_rules('fak_invoice_no', $this->lang->line('label_fak_invoice_no'), 'trim|required|numeric|xss_clean');                     
            }       
           if($fak_invoice_no){
                $this->form_validation->set_rules('fak_invoice_no', $this->lang->line('label_fak_invoice_no'), 'trim|xss_clean|numeric|callback_check_fak_invoice_no_by_org_id[' . $org_id. ']');
            }       
           /* if($fak_invoice_no_check == "No" && !$fak_invoice_no){
                while(1){
                    $fak_invoice_no_rand = rand(100, 99999999);
                    $check_invoice_exists = $this->info_model->check_fak_invoice_no($fak_invoice_no_rand);
                    if($check_invoice_exists->num_rows()>0){
                       continue;
                    }else{break;}
                }                
            }            
          if($fak_invoice_no_rand){
              $fak_invoice_no = $fak_invoice_no_rand;
          }*/
          if(!$new_invoice_seq){               
                    $data_create_faktura['fak_invoice_no'] = $this->data['fak_invoice_no'];               
          }elseif($new_invoice_seq){
                $data_create_faktura['fak_invoice_no'] = $fak_invoice_no;
                $this->form_validation->set_rules('fak_invoice_no', $this->lang->line('label_fak_invoice_no'), 'trim|required|xss_clean|callback_check_fak_invoice_no_by_org_id[' . $org_id. ']');
          }
          if(empty($data_create_faktura['fak_send_to_external_customer']) && empty($data_create_faktura['fak_send_to_org_customer'])){
                $this->form_validation->set_rules('fak_send_to_org_customer', $this->lang->line('fak_send_to_customer_error'), 'trim|required|xss_clean');
          }
           $this->form_validation->set_rules('fak_invoice_date', $this->lang->line('label_fak_invoice_date'), 'trim|required|xss_clean');
           $this->form_validation->set_rules('fak_terms_of_payment', $this->lang->line('label_fak_terms_of_payment'), 'trim|required|xss_clean');           

            if ($this->form_validation->run() == FALSE || !empty($error_data['invoice_date_error'])) {      
                $this->load->vars($error_data);  
                $this->data['dynamicView'] = 'pages/organization/faktura/create_faktura';
            }
            else{                
                    //////////////////////////////////////////////////////////// Faktura Creation Data /////////////////////////////////////////////////////
                    $data_faktura['fak_invoice_no'] = $data_create_faktura['fak_invoice_no'];
                    $data_faktura['fak_active_date'] = $fak_invoice_date;
                    $data_faktura['fak_expire_date'] = $fak_invoice_date + ($data_create_faktura['fak_terms_of_payment'] * 24 * 60 * 60);
                    $data_faktura['fak_terms_of_payment'] = $data_create_faktura['fak_terms_of_payment'];
                    $data_create_faktura['fak_expire_date'] = $data_faktura['fak_expire_date'];
                    $data_faktura['fak_currency'] = "SEK";
                    $data_faktura['fak_invoice_cost'] = $per_invoice_cost;
                    $data_create_faktura['fak_invoice_cost'] = $per_invoice_cost;
                    $data_faktura['fak_invoice_cost_applied'] = 0.00;
                    
                    $this->data['org_details'] =  $this->info_model->get_organization_info_by_id($org_id);
                    //print_r($this->data['org_details']); exit;
                    if($this->data['org_details']){
                         $data_faktura['org_name'] =  str_replace(" ","",$this->data['org_details'][0]->org_name); 
                         $data_faktura['org_number'] =  $this->data['org_details'][0]->org_number; 
                    }
                    if($data_create_faktura['fak_send_to_external_customer']){
                        $this->data['faktura_external_customer_details'] = $this->info_model->get_faktura_customer_details_by_faktura_customer_id($data_create_faktura['fak_send_to_external_customer']);
                        if($this->data['faktura_external_customer_details'] ) {
                            $data_faktura['fak_reference_name'] = $this->data['faktura_external_customer_details'][0]->fak_customer_or_company_name;
                            $data_faktura['bill_primary_address'] = $this->data['faktura_external_customer_details'][0]->fak_customer_billing_address;
                            $data_faktura['bill_city'] = $this->data['faktura_external_customer_details'][0]->fak_customer_city;
                            $data_faktura['bill_phone'] = $this->data['faktura_external_customer_details'][0]->fak_customer_no;
                            $data_faktura['bill_zip'] = $this->data['faktura_external_customer_details'][0]->fak_customer_zip;
                            $data_faktura['bill_state'] = $this->data['faktura_external_customer_details'][0]->fak_customer_state;
                            $data_faktura['bill_country'] = $this->data['faktura_external_customer_details'][0]->fak_customer_country;
                        }
                    }
                    if($data_create_faktura['fak_send_to_org_customer']){
                        $this->data['faktura_org_customer_details'] = $this->info_model->get_member_info_by_id($data_create_faktura['fak_send_to_org_customer'], $org_id);
                         if($this->data['faktura_org_customer_details'] ) {
                            $data_faktura['fak_reference_name'] = $this->data['faktura_org_customer_details'][0]->first_name."&nbsp;".$this->data['faktura_org_customer_details'][0]->last_name;
                            $data_faktura['bill_primary_address'] = $this->data['faktura_org_customer_details'][0]->primary_address;
                            $data_faktura['bill_city'] = $this->data['faktura_org_customer_details'][0]->city;
                            $data_faktura['bill_phone'] = $this->data['faktura_org_customer_details'][0]->phone_no;
                            $data_faktura['bill_zip'] = $this->data['faktura_org_customer_details'][0]->zip;
                            $data_faktura['bill_state'] = $this->data['faktura_org_customer_details'][0]->state;
                            $data_faktura['bill_country'] = $this->data['faktura_org_customer_details'][0]->country;
                        }
                    }
                    if($data_faktura['bill_country']=="DEU"){$data_faktura['bill_country'] = "GERMAN";}
                    if($data_faktura['bill_country']=="NOR"){$data_faktura['bill_country'] = "NORWAY";}
                    if($data_faktura['bill_country']=="DNK"){$data_faktura['bill_country'] = "DENMARK";}
                    if($data_faktura['bill_country']=="FIN"){$data_faktura['bill_country'] = "FINLAND";}
                    if($data_faktura['bill_country']=="GBR"){$data_faktura['bill_country'] = "UK";}
                    if($data_faktura['bill_country']=="SWE"){$data_faktura['bill_country'] = "SWEDEN";}
                    /////////////////////////////////////////////////////////// Faktura Creation Data //////////////////////////////////////////////////////
                    $custom_faktura_id = $this->info_model->insert_custom_faktura($data_create_faktura);                    
                    if($custom_faktura_id){
                        $success = $this->info_model->insert_custom_faktura_assigned_product( $custom_faktura_id, $this->data['product_name'], $this->data['no_of_products'], $this->data['price_ex_vat'], $this->data['vat_rate']);
                        //////////////////////////////////////////////////////////////////////////////////////////////////////////                           
                        $this->make_custom_invoice_pdf($data_faktura,$custom_faktura_id,$this->data['product_name'], $this->data['no_of_products'], $this->data['price_ex_vat'], $this->data['vat_rate'], $this->data['org_details']);      
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_create_success').'</div>');
                    }
                else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_create_failure').'</div>'); }
                redirect('organization/info/faktura_invoices');
            }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_create_faktura);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

function check_fak_invoice_no_by_org_id($fak_invoice_no,$org_id) {        
        $result = $this->dx_auth->is_fak_invoice_no_available_by_org_id($fak_invoice_no,$org_id);
        if (!$result) {
            $this->form_validation->set_message('check_fak_invoice_no_by_org_id', $this->lang->line('fak_invoice_no_exists_error_msg'));
        }
        return $result;
}

/**
 * Load faktura Edit form
 *
 *@access private
 *@return faktura edit form
 */ 
    function edit_faktura($custom_faktura_id){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_invoices';
        $error_data['invoice_date_error'] = "";
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $data_create_faktura = array(                    
            'fak_invoice_no' => "",          
            'fak_invoice_date' => "",          
            'fak_invoice_date_intake' => "",          
            'fak_send_to_external_customer' => "",          
            'fak_send_to_org_customer' => "",          
            'fak_terms_of_payment' => "",          
            'fak_listing' => "",          
            'fak_customer_notification' => "",          
            'product_name' => "",          
            'no_of_products' => "",          
            'price_ex_vat' => "" ,    
            'vat_rate' => ""      
        );
       
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="SuperAdmin" || $this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['org_registered_member'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
            $this->data['faktura_customers'] = $this->info_model->view_all_faktura_customers($this->session->userdata('member_org'));
            $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);            
            $this->data['data_fak_products'] = $this->info_model->view_all_faktura_products($org_id);         
            $this->data['faktura_info'] = $this->info_model->get_custom_faktura_info($custom_faktura_id);      
            $this->data['custom_faktura_assigned_product_info']  = $this->info_model->get_custom_faktura_assigned_product($custom_faktura_id);
            //print_r($this->data['custom_faktura_assigned_product_info']); exit;
            $this->data['dynamicView'] = 'pages/organization/faktura/edit_faktura';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($error_data);  
        $this->load->vars($data_create_faktura);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 *  Edit  faktura Process
 *
 *@access private
 *@return Success/Failure message
 */ 
    function edit_faktura_process(){
         $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_invoices';
        $this->load->library('form_validation');
        $data_faktura = array();
        $error_data['invoice_date_error'] = "";
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');        
        $this->data['org_registered_member'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
        $this->data['faktura_customers'] = $this->info_model->view_all_faktura_customers($this->session->userdata('member_org'));
        $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);            
        $this->data['data_fak_products'] = $this->info_model->view_all_faktura_products($org_id);     
        $custom_faktura_id = $this->input->post('custom_faktura_id');
        $fak_invoice_no = $this->input->post('fak_invoice_no');
        $this_fak_invoice_no = $this->input->post('this_fak_invoice_no');
        $new_invoice_seq = $this->input->post('new_invoice_seq'); 
        $fak_invoice_no_check = "";
        $fak_invoice_date="";
        $fak_invoice_no_rand = "";        
        $per_invoice_cost ="";
        if($this->data['data_fak_settings_details'] ){
            $fak_invoice_no_check = $this->data['data_fak_settings_details'][0]->fak_invoice_no;
        }
        $fak_invoice_date_val = $this->input->post('fak_invoice_date');   
        $this->data['fak_invoice_date_intake'] = $fak_invoice_date_val;
        if($fak_invoice_date_val){
            $fak_invoice_date_val = explode("-",$fak_invoice_date_val);
            $fak_invoice_date = mktime(0, 0, 0, ($fak_invoice_date_val[1]), $fak_invoice_date_val[2], $fak_invoice_date_val[0]);
            $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
                if($fak_invoice_date < $todate ){
                        $error_data['invoice_date_error'] = $this->lang->line('label_fak_invoice_date_error');
                }   
        }               
        $data_create_faktura = array(     
            'org_id' =>$org_id,
            'mem_id' =>$mem_id,
            'fak_invoice_no' => $fak_invoice_no,
            'fak_invoice_date' => $fak_invoice_date,
            'fak_send_to_external_customer' => $this->input->post('fak_send_to_external_customer'),             
            'fak_send_to_org_customer' => $this->input->post('fak_send_to_org_customer'),             
            'fak_terms_of_payment' => $this->input->post('fak_terms_of_payment'),             
            'fak_notes' => $this->input->post('fak_notes'),             
            'fak_customer_notification' => $this->input->post('fak_customer_notification'),             
            'add_date' => date("Y-m-d H:i:s")
        );                     
        $this->data['product_name'] = $this->input->post('product_name');
        $this->data['no_of_products'] = $this->input->post('no_of_products');
        $this->data['price_ex_vat'] = $this->input->post('price_ex_vat');
        $this->data['vat_rate'] = $this->input->post('vat_rate');
        $product_line_size = sizeof($this->data['product_name']);
        
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="SuperAdmin" || $this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            /*$this->data['last_fak_entry_by_org_id'] = $this->info_model->get_last_fak_entry_by_org_id($org_id);      
            if(empty($this->data['last_fak_entry_by_org_id'])){
                $this->data['fak_invoice_no'] = 1;
            }else{
                $this->data['fak_invoice_no'] = $this->data['last_fak_entry_by_org_id'][0]->fak_invoice_no+1;
            }*/
            $data_global_settings['global_settings_data'] = $this->info_model->get_global_settings();
               // print_r($data['global_settings_data']);
                if($data_global_settings['global_settings_data']){
                    foreach($data_global_settings['global_settings_data'] as $rows){
                        //$data_organization['organization_data']['org_allowed_sms_per_month'] = $rows->allowed_sms_per_month;
                        //$data_organization['organization_data']['org_allowed_letter_per_month'] = $rows->allowed_letter_per_month;
                        $per_invoice_cost = $rows->per_invoice_cost;                        
                    }                    
                }    
            $index = 0;
            while($product_line_size > 0 ){
                if(empty($this->data['product_name'][$index])){
                    $this->form_validation->set_rules('product_name', $this->lang->line('label_fak_specification'), 'trim|required|xss_clean');
                }
                if(empty($this->data['no_of_products'][$index])){
                    $this->form_validation->set_rules('no_of_products', $this->lang->line('label_fak_number'), 'trim|required|xss_clean');
                }elseif($this->data['no_of_products'][$index]){ //$this->form_validation->set_rules('no_of_products', $this->lang->line('label_fak_number'), 'trim|xss_clean|numeric'); 
                }
                if(empty($this->data['price_ex_vat'][$index])){
                    $this->form_validation->set_rules('price_ex_vat', $this->lang->line('label_price_ex_vat'), 'trim|required|xss_clean');
                }elseif($this->data['price_ex_vat'][$index]){ //$this->form_validation->set_rules('price_ex_vat', $this->lang->line('label_price_ex_vat'), 'trim|xss_clean|numeric');
                }
                if(empty($this->data['vat_rate'][$index])){
                    $this->form_validation->set_rules('vat_rate', $this->lang->line('label_vat_rate'), 'trim|required|xss_clean');
                }
                $product_line_size--;
                $index++;               
            }                  
            if($fak_invoice_no_check == "Yes"){ 
                    $this->form_validation->set_rules('fak_invoice_no', $this->lang->line('label_fak_invoice_no'), 'trim|required|numeric|xss_clean');                     
            }       
           if($fak_invoice_no && ($fak_invoice_no!=$this_fak_invoice_no) ){ 
                $this->form_validation->set_rules('fak_invoice_no', $this->lang->line('label_fak_invoice_no'), 'trim|xss_clean|numeric|callback_check_fak_invoice_no_by_org_id[' . $org_id. ']');
            }       
           /* if($fak_invoice_no_check == "No" && !$fak_invoice_no){
                while(1){
                    $fak_invoice_no_rand = rand(100, 99999999);
                    $check_invoice_exists = $this->info_model->check_fak_invoice_no($fak_invoice_no_rand);
                    if($check_invoice_exists->num_rows()>0){
                       continue;
                    }else{break;}
                }                
            }            
          if($fak_invoice_no_rand){
              $fak_invoice_no = $fak_invoice_no_rand;
          }*/
          /*if(!$new_invoice_seq){               
                    $data_create_faktura['fak_invoice_no'] = $this->data['fak_invoice_no'];               
          }elseif($new_invoice_seq){
                $data_create_faktura['fak_invoice_no'] = $fak_invoice_no;
                $this->form_validation->set_rules('fak_invoice_no', $this->lang->line('label_fak_invoice_no'), 'trim|required|xss_clean|callback_check_fak_invoice_no_by_org_id[' . $org_id. ']');
          }*/
          if(empty($data_create_faktura['fak_send_to_external_customer']) && empty($data_create_faktura['fak_send_to_org_customer'])){
                $this->form_validation->set_rules('fak_send_to_org_customer', $this->lang->line('fak_send_to_customer_error'), 'trim|required|xss_clean');
          }
           $this->form_validation->set_rules('fak_invoice_date', $this->lang->line('label_fak_invoice_date'), 'trim|required|xss_clean');
           $this->form_validation->set_rules('fak_terms_of_payment', $this->lang->line('label_fak_terms_of_payment'), 'trim|required|xss_clean');           

            if ($this->form_validation->run() == FALSE || !empty($error_data['invoice_date_error'])) {      
                $this->data['org_registered_member'] = $this->info_model->get_org_registered_member($this->session->userdata('member_org'));
                $this->data['faktura_customers'] = $this->info_model->view_all_faktura_customers($this->session->userdata('member_org'));
                $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);            
                $this->data['data_fak_products'] = $this->info_model->view_all_faktura_products($org_id);         
                $this->data['faktura_info'] = $this->info_model->get_custom_faktura_info($custom_faktura_id);      
                $this->data['custom_faktura_assigned_product_info']  = $this->info_model->get_custom_faktura_assigned_product($custom_faktura_id);
                $this->load->vars($error_data);  
                $this->data['dynamicView'] = 'pages/organization/faktura/edit_faktura';
            }
            else{                
                    //////////////////////////////////////////////////////////// Faktura Creation Data /////////////////////////////////////////////////////
                    $data_faktura['fak_invoice_no'] = $data_create_faktura['fak_invoice_no'];
                    $data_faktura['fak_active_date'] = $fak_invoice_date;
                    $data_faktura['fak_expire_date'] = $fak_invoice_date + ($data_create_faktura['fak_terms_of_payment'] * 24 * 60 * 60);
                    $data_faktura['fak_terms_of_payment'] = $data_create_faktura['fak_terms_of_payment'];
                    $data_create_faktura['fak_expire_date'] = $data_faktura['fak_expire_date'];
                    $data_faktura['fak_currency'] = "SEK";
                    $data_faktura['fak_invoice_cost'] = $per_invoice_cost;
                    $data_create_faktura['fak_invoice_cost'] = $per_invoice_cost;
                    $data_faktura['fak_invoice_cost_applied'] = 0.00;
                    
                    $this->data['org_details'] =  $this->info_model->get_organization_info_by_id($org_id);
                    //print_r($this->data['org_details']); exit;
                    if($this->data['org_details']){
                         $data_faktura['org_name'] =  str_replace(" ","",$this->data['org_details'][0]->org_name); 
                         $data_faktura['org_number'] =  $this->data['org_details'][0]->org_number; 
                    }
                    if($data_create_faktura['fak_send_to_external_customer']){
                        $this->data['faktura_external_customer_details'] = $this->info_model->get_faktura_customer_details_by_faktura_customer_id($data_create_faktura['fak_send_to_external_customer']);
                        if($this->data['faktura_external_customer_details'] ) {
                            $data_faktura['fak_reference_name'] = $this->data['faktura_external_customer_details'][0]->fak_customer_or_company_name;
                            $data_faktura['bill_primary_address'] = $this->data['faktura_external_customer_details'][0]->fak_customer_billing_address;
                            $data_faktura['bill_city'] = $this->data['faktura_external_customer_details'][0]->fak_customer_city;
                            $data_faktura['bill_phone'] = $this->data['faktura_external_customer_details'][0]->fak_customer_no;
                            $data_faktura['bill_zip'] = $this->data['faktura_external_customer_details'][0]->fak_customer_zip;
                            $data_faktura['bill_state'] = $this->data['faktura_external_customer_details'][0]->fak_customer_state;
                            $data_faktura['bill_country'] = $this->data['faktura_external_customer_details'][0]->fak_customer_country;
                        }
                    }
                    if($data_create_faktura['fak_send_to_org_customer']){
                        $this->data['faktura_org_customer_details'] = $this->info_model->get_member_info_by_id($data_create_faktura['fak_send_to_org_customer'], $org_id);
                         if($this->data['faktura_org_customer_details'] ) {
                            $data_faktura['fak_reference_name'] = $this->data['faktura_org_customer_details'][0]->first_name."&nbsp;".$this->data['faktura_org_customer_details'][0]->last_name;
                            $data_faktura['bill_primary_address'] = $this->data['faktura_org_customer_details'][0]->primary_address;
                            $data_faktura['bill_city'] = $this->data['faktura_org_customer_details'][0]->city;
                            $data_faktura['bill_phone'] = $this->data['faktura_org_customer_details'][0]->phone_no;
                            $data_faktura['bill_zip'] = $this->data['faktura_org_customer_details'][0]->zip;
                            $data_faktura['bill_state'] = $this->data['faktura_org_customer_details'][0]->state;
                            $data_faktura['bill_country'] = $this->data['faktura_org_customer_details'][0]->country;
                        }
                    }
                    if($data_faktura['bill_country']=="DEU"){$data_faktura['bill_country'] = "GERMAN";}
                    if($data_faktura['bill_country']=="NOR"){$data_faktura['bill_country'] = "NORWAY";}
                    if($data_faktura['bill_country']=="DNK"){$data_faktura['bill_country'] = "DENMARK";}
                    if($data_faktura['bill_country']=="FIN"){$data_faktura['bill_country'] = "FINLAND";}
                    if($data_faktura['bill_country']=="GBR"){$data_faktura['bill_country'] = "UK";}
                    if($data_faktura['bill_country']=="SWE"){$data_faktura['bill_country'] = "SWEDEN";}
                    /////////////////////////////////////////////////////////// Faktura Creation Data //////////////////////////////////////////////////////
                    $success = $this->info_model->update_custom_faktura($data_create_faktura, $custom_faktura_id);  
                    if($success){
                        $delete_success = $this->info_model->delete_custom_faktura_assigned_product( $custom_faktura_id);
                        if($delete_success){
                                $success = $this->info_model->insert_custom_faktura_assigned_product( $custom_faktura_id, $this->data['product_name'], $this->data['no_of_products'], $this->data['price_ex_vat'], $this->data['vat_rate']);
                        }
                        //////////////////////////////////////////////////////////////////////////////////////////////////////////                           
                        $this->make_custom_invoice_pdf($data_faktura,$custom_faktura_id,$this->data['product_name'], $this->data['no_of_products'], $this->data['price_ex_vat'], $this->data['vat_rate'], $this->data['org_details']);      
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_update_success').'</div>');
                    }
                else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_update_failure').'</div>'); }
                redirect('organization/info/faktura_invoices');
            }
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_create_faktura);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}
function fak_invoice_no_check($fak_invoice_no) {
    $result = $this->dx_auth->is_fak_invoice_no_available($fak_invoice_no);
    if (!$result) {
        $this->form_validation->set_message('fak_invoice_no_check', $this->lang->line('invoice_no_exists_error_msg'));
    }
    return $result;
}

function make_custom_invoice_pdf($data_faktura, $fak_insert_id, $product_name, $no_of_products, $price_ex_vat, $vat_rate, $org_details){   
    include_once 'MPDF/create_custom_faktura.php';
    //$file_name = "custom_invoice_".$data_faktura['org_name'].'_'.$data_faktura['fak_reference_name'].'_'.$data_faktura['fak_invoice_no'].'.pdf';
    //$this->send_invoice_by_email($data,$content,$file_name);
  
}



/**
 * Load faktura Preview
 *
 *@access private
 *@return faktura Preview
 */ 
    function preview_faktura($custom_faktura_id){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_invoices';
        $this->data['custom_faktura_id'] = $custom_faktura_id;
        $error_data['invoice_date_error'] = "";
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="SuperAdmin" || $this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['data_fak_settings_details'] = $this->info_model->get_faktura_settings($org_id);            
            $this->data['faktura_info'] = $this->info_model->get_custom_faktura_info($custom_faktura_id);      
            $this->data['custom_faktura_assigned_product_info']  = $this->info_model->get_custom_faktura_assigned_product($custom_faktura_id);
            $this->data['org_details'] =  $this->info_model->get_organization_info_by_id($this->session->userdata('member_org'));
            //print_r($this->data['custom_faktura_assigned_product_info']); exit;
            $this->data['dynamicView'] = 'pages/organization/faktura/preview_faktura';
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($error_data);  
        //$this->load->vars($data_create_faktura);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

/**
 * Copy faktura 
 *
 *@access private
 *@return Success/Failure Message
 */ 
    function copy_faktura($custom_faktura_id){
        $this->data['mainTab'] = 'faktura';
        $this->data['activeTab'] = 'faktura_invoices';
        $this->data['custom_faktura_id'] = $custom_faktura_id;
        $error_data['invoice_date_error'] = "";
        $data_faktura = array();
        $product_name = array();
        $no_of_products = array();
        $price_ex_vat = array();
        $vat_rate = array();
        $org_id = $this->session->userdata('member_org');
        $mem_id = $this->session->userdata('mem_id');
        $total_price =0.00;
        $data_previlize = $this->check_member_type_previlize();
        if($this->session->userdata('mem_type')=="SuperAdmin" || $this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {
            $this->data['last_fak_entry_by_org_id'] = $this->info_model->get_last_fak_entry_by_org_id($org_id);      
            if(empty($this->data['last_fak_entry_by_org_id'])){
                $fak_invoice_no = 1;
            }else{
                $fak_invoice_no = $this->data['last_fak_entry_by_org_id'][0]->fak_invoice_no+1;
            }
          $data_global_settings['global_settings_data'] = $this->info_model->get_global_settings();
                  if($data_global_settings['global_settings_data']){
                    foreach($data_global_settings['global_settings_data'] as $rows){
                       $per_invoice_cost = $rows->per_invoice_cost;                        
                    }                    
                }    
            $custom_faktura_assigned_product_info = $this->info_model->get_custom_faktura_assigned_product($custom_faktura_id);
            $index=0;
            if($custom_faktura_assigned_product_info){
                foreach($custom_faktura_assigned_product_info as $rows){
                     $all_product_price_excl_vat = $rows->price_ex_vat * $rows->no_of_products;
                     $vat_price = ($rows->vat_rate/100) * $all_product_price_excl_vat;
                     $all_product_price_incl_vat = $all_product_price_excl_vat + $vat_price;
                     $total_price += $all_product_price_incl_vat;       
                     
                     $product_name[$index] = $rows->product_name;
                     $no_of_products[$index] = $rows->no_of_products;
                     $price_ex_vat[$index] = $rows->price_ex_vat;
                     $vat_rate[$index] = $rows->vat_rate;
                     $index++;
        
                }
            }
            $copy_fak_id  = $this->info_model->copy_custom_faktura($custom_faktura_id, $fak_invoice_no, $per_invoice_cost, $total_price);
            if($copy_fak_id){
                $this->data['org_details'] =  $this->info_model->get_organization_info_by_id($org_id);
                    //print_r($this->data['org_details']); exit;
                    if($this->data['org_details']){
                         $data_faktura['org_name'] =  str_replace(" ","",$this->data['org_details'][0]->org_name); 
                         $data_faktura['org_number'] =  $this->data['org_details'][0]->org_number; 
                    }
                /////////////////////////////////////////////// Faktura Creation Data //////////////////////////////////////////////                   
                    $faktura_info = $this->info_model->get_custom_faktura_info($copy_fak_id);      
                    $data_faktura['fak_invoice_no'] =$faktura_info[0]->fak_invoice_no;
                    $data_faktura['fak_active_date'] = "";
                    $data_faktura['fak_expire_date'] = "";
                    $data_faktura['fak_terms_of_payment'] = $faktura_info[0]->fak_terms_of_payment;
                    $data_faktura['fak_currency'] = "SEK";
                    $data_faktura['fak_invoice_cost'] = $faktura_info[0]->fak_invoice_cost;
                    $data_faktura['fak_invoice_cost_applied'] = 0.00;
                    if($faktura_info[0]->fak_send_to_external_customer){
                        $this->data['faktura_external_customer_details'] = $this->info_model->get_faktura_customer_details_by_faktura_customer_id($faktura_info[0]->fak_send_to_external_customer);
                        if($this->data['faktura_external_customer_details'] ) {
                            $data_faktura['fak_reference_name'] = $this->data['faktura_external_customer_details'][0]->fak_customer_or_company_name;
                            $data_faktura['bill_primary_address'] = $this->data['faktura_external_customer_details'][0]->fak_customer_billing_address;
                            $data_faktura['bill_city'] = $this->data['faktura_external_customer_details'][0]->fak_customer_city;
                            $data_faktura['bill_phone'] = $this->data['faktura_external_customer_details'][0]->fak_customer_no;
                            $data_faktura['bill_zip'] = $this->data['faktura_external_customer_details'][0]->fak_customer_zip;
                            $data_faktura['bill_state'] = $this->data['faktura_external_customer_details'][0]->fak_customer_state;
                            $data_faktura['bill_country'] = $this->data['faktura_external_customer_details'][0]->fak_customer_country;
                        }
                    }
                    if($faktura_info[0]->fak_send_to_org_customer){
                        $this->data['faktura_org_customer_details'] = $this->info_model->get_member_info_by_id($faktura_info[0]->fak_send_to_org_customer, $org_id);
                         if($this->data['faktura_org_customer_details'] ) {
                            $data_faktura['fak_reference_name'] = $this->data['faktura_org_customer_details'][0]->first_name."&nbsp;".$this->data['faktura_org_customer_details'][0]->last_name;
                            $data_faktura['bill_primary_address'] = $this->data['faktura_org_customer_details'][0]->primary_address;
                            $data_faktura['bill_city'] = $this->data['faktura_org_customer_details'][0]->city;
                            $data_faktura['bill_phone'] = $this->data['faktura_org_customer_details'][0]->phone_no;
                            $data_faktura['bill_zip'] = $this->data['faktura_org_customer_details'][0]->zip;
                            $data_faktura['bill_state'] = $this->data['faktura_org_customer_details'][0]->state;
                            $data_faktura['bill_country'] = $this->data['faktura_org_customer_details'][0]->country;
                        }
                    }
                    if($data_faktura['bill_country']=="DEU"){$data_faktura['bill_country'] = "GERMAN";}
                    if($data_faktura['bill_country']=="NOR"){$data_faktura['bill_country'] = "NORWAY";}
                    if($data_faktura['bill_country']=="DNK"){$data_faktura['bill_country'] = "DENMARK";}
                    if($data_faktura['bill_country']=="FIN"){$data_faktura['bill_country'] = "FINLAND";}
                    if($data_faktura['bill_country']=="GBR"){$data_faktura['bill_country'] = "UK";}
                    if($data_faktura['bill_country']=="SWE"){$data_faktura['bill_country'] = "SWEDEN";}
                /////////////////////////////////////////////// Faktura Creation Data //////////////////////////////////////////////
                $this->make_custom_invoice_pdf($data_faktura,$copy_fak_id,$product_name, $no_of_products, $price_ex_vat, $vat_rate, $this->data['org_details']);      

                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_copy_success').'</div>');
            }
            else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('faktura_copy_failure').'</div>'); }
            redirect('organization/info/faktura_invoices');        
        }
        else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($error_data);  
        //$this->load->vars($data_create_faktura);	   
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');    
}

 /**
 * Send Custom Invoice by : E-mail and/or SMS OR Letter
 *
 *@access private
 *@return success/failure message
 */
 function custom_invoice_send(){
    $this->data['mainTab'] = 'faktura';
    $this->data['activeTab'] = 'faktura_invoices';       
    $data_faktura['fak_sent_by'] = "";
    $data['send_invoice_email'] = $this->input->post("email");
    $data['send_invoice_sms'] = $this->input->post("sms");
    $data['send_invoice_letter'] = $this->input->post("letter");
    
    $custom_faktura_id = $this->input->post("custom_faktura_id"); 
    $org_id = $this->session->userdata('member_org');
    $mem_id = $this->session->userdata('mem_id');       
    $fak_total_price = 0.00;
    $superAdminInfo = $this->info_model->get_superAdminInfo_by_org_id($org_id);
    
   ///////////////////////////////////////////////////////////
   $data_previlize = $this->check_member_type_previlize();
   if($this->session->userdata('mem_type')=="SuperAdmin" || $this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {            
            $package_info = $this->info_model->get_org_package_info_by_org_id($org_id);
            
            $this->data['faktura_info'] = $this->info_model->get_custom_faktura_info($custom_faktura_id);
            if($this->data['faktura_info']){
                foreach($this->data['faktura_info'] as $rows){
                    $data_faktura['org_id'] = $rows->org_id;
                    $data_faktura['mem_id'] = $rows->mem_id;
                    $data_faktura['fak_invoice_no'] = $rows->fak_invoice_no;
                    $data_faktura['fak_invoice_date'] = $rows->fak_invoice_date;                    
                    $data_faktura['fak_active_date'] = $rows->fak_invoice_date;                    
                    $data_faktura['fak_expire_date'] = $rows->fak_expire_date;
                    $data_faktura['fak_invoice_cost'] = $rows->fak_invoice_cost;
                    $data_faktura['fak_total_price'] = $rows->fak_total_price;                    
                    $data_faktura['fak_send_to_external_customer'] =$rows->fak_send_to_external_customer;
                    $data_faktura['fak_send_to_org_customer'] =$rows->fak_send_to_org_customer;
                    $data_faktura['fak_terms_of_payment'] = $rows->fak_terms_of_payment;                                        
                    $data_faktura['fak_notes'] = $rows->fak_notes;
                    $data_faktura['fak_customer_notification'] = $rows->fak_customer_notification;
                    $data_faktura['fak_status'] = $rows->fak_status;
                    //$data_faktura['fak_sent_by'] = $rows->fak_sent_by;        
                    $data_faktura['no_of_custom_invoice_sent_by_letter'] = $rows->no_of_custom_invoice_sent_by_letter;
                    $data_faktura['custom_invoice_sent_by_letter_cost'] = $rows->custom_invoice_sent_by_letter_cost;
                    $data_faktura['fak_invoice_cost_applied'] = $rows->fak_invoice_cost_applied;
                    ///////////////////////////////////////////////////////////////////
             }
            $org_info = $this->info_model->get_organization_info_by_id($data_faktura['org_id']);
            if($org_info){
                $data['org_name'] = $org_info[0]->org_name;
                $data['org_email'] = $org_info[0]->org_email;
                $data['org_web'] = $org_info[0]->org_web;
                $data['org_number'] = $org_info[0]->org_number;
                $data['org_primary_address'] = $org_info[0]->org_primary_address;
                $data['org_phone'] = $org_info[0]->org_phone;
                $data['org_email'] = $org_info[0]->org_email;
                $data['org_zip'] = $org_info[0]->org_zip;
                $data['org_city'] = $org_info[0]->org_city;
                $data['org_country'] = $org_info[0]->org_country;
                $data['org_state'] = $org_info[0]->org_state;
                $data['org_bank_acc_no_one'] = $org_info[0]->org_bank_acc_no_one;
                $data['org_bank_acc_type_one'] = $org_info[0]->org_bank_acc_type_one;
                $data['org_bank_acc_no_two'] = $org_info[0]->org_bank_acc_no_two;
                $data['org_bank_acc_type_two'] = $org_info[0]->org_bank_acc_type_two;
                $data['org_bank_acc_no_three'] = $org_info[0]->org_bank_acc_no_three;
                $data['org_bank_acc_type_three'] = $org_info[0]->org_bank_acc_type_three;              
                $data_faktura['org_name'] = $org_info[0]->org_name;
                $data_faktura['org_number'] = $org_info[0]->org_number;
            }
            $get_client_info = $this->info_model->get_custom_faktura_client_info($data_faktura['fak_send_to_external_customer'],$data_faktura['fak_send_to_org_customer']);
            if($get_client_info && !empty($data_faktura['fak_send_to_external_customer'])){                    
                $data_faktura['fak_customer_type'] = $get_client_info[0]->fak_customer_type;
                $data_faktura['fak_customer_care_of'] = $get_client_info[0]->fak_customer_care_of;
                $data_faktura['primary_address'] = $get_client_info[0]->fak_customer_billing_address;                    
                $data_faktura['zip'] = $get_client_info[0]->fak_customer_zip;
                $data_faktura['city'] = $get_client_info[0]->fak_customer_city;
                $data_faktura['state'] = $get_client_info[0]->fak_customer_state;
                $data_faktura['country'] = $get_client_info[0]->fak_customer_country;
                $data['email'] = $get_client_info[0]->fak_customer_email;
                $data_faktura['fak_customer_no'] = $get_client_info[0]->fak_customer_no;
                $data_faktura['fak_reference_name'] = $get_client_info[0]->fak_customer_or_company_name;
                $data_faktura['fak_customer_reg_no'] = $get_client_info[0]->fak_customer_reg_no;
                $data_faktura['fak_customer_to'] = $get_client_info[0]->fak_customer_to;
                $data_faktura['fak_customer_contact_no'] = $get_client_info[0]->fak_customer_contact_no;
                $data_faktura['fak_customer_listing'] = $get_client_info[0]->fak_customer_listing;
            }
            if($get_client_info && !empty($data_faktura['fak_send_to_org_customer'])){                    
                $data_faktura['fak_customer_type'] = "";
                $data_faktura['fak_customer_care_of'] = "";
                $data_faktura['primary_address'] = $get_client_info[0]->primary_address;                    
                $data_faktura['zip'] = $get_client_info[0]->zip;
                $data_faktura['city'] = $get_client_info[0]->city;
                $data_faktura['state'] = $get_client_info[0]->state;
                $data_faktura['country'] = $get_client_info[0]->country;
                $data['email'] = $get_client_info[0]->email;
                $data_faktura['fak_customer_no'] = "";
                $data['first_name']= $get_client_info[0]->first_name;
                $data['last_name']= $get_client_info[0]->last_name;
                $data['username']=$get_client_info[0]->username;            
                $data_faktura['fak_reference_name'] = $data['first_name']."&nbsp;".$data['last_name'];
                $data_faktura['fak_customer_reg_no'] = "";
                $data_faktura['fak_customer_to'] = "";
                $data_faktura['fak_customer_contact_no'] = $get_client_info[0]->phone_no;
                $data_faktura['fak_customer_listing'] = "";
                //$data_faktura['fak_description'] = $rows->fak_description;
            }
            if($data['send_invoice_letter'] =="letter"){
                $data_faktura['fak_invoice_cost_applied'] = $data_faktura['fak_invoice_cost'];               
                $data_faktura['fak_sent_by'] = $data['send_invoice_letter'];
                $data_faktura['no_of_custom_invoice_sent_by_letter'] = $data_faktura['no_of_custom_invoice_sent_by_letter']+1;                        
                $data_faktura['custom_invoice_sent_by_letter_cost'] = $data_faktura['no_of_custom_invoice_sent_by_letter'] * $data_faktura['fak_invoice_cost_applied'];  
                $custom_invoice_sent_by_letter_cost_vat = (25/100)*$data_faktura['custom_invoice_sent_by_letter_cost']; 
                $custom_invoice_sent_by_letter_cost_incl_vat = $data_faktura['custom_invoice_sent_by_letter_cost'] +$custom_invoice_sent_by_letter_cost_vat;
                $data_faktura['fak_total_price'] = $data_faktura['fak_total_price']+$custom_invoice_sent_by_letter_cost_incl_vat;
            }
            else{
                ///$data_faktura['fak_invoice_cost_applied'] = 0.00;
                if($data['send_invoice_sms'] =="sms"){
                    $data_faktura['fak_sent_by'] = $data['send_invoice_sms'].",";
                    if($package_info){
                        $sms_cost = $package_info[0]->sms_cost;
                    }
                }
                if($data['send_invoice_email'] =="email"){
                    $data_faktura['fak_sent_by'] .= $data['send_invoice_email'];
                }
        }
                $update_data = array('fak_sent_by' => $data_faktura['fak_sent_by'], 'fak_invoice_cost_applied' => $data_faktura['fak_invoice_cost_applied'], 'fak_total_price' => $data_faktura['fak_total_price'], 'no_of_custom_invoice_sent_by_letter' => $data_faktura['no_of_custom_invoice_sent_by_letter'], 'custom_invoice_sent_by_letter_cost' => $data_faktura['custom_invoice_sent_by_letter_cost']);
                //print_r($update_data); exit;
                $fak_update = $this->info_model->bill_custom_faktura_update($update_data,$custom_faktura_id);
                //$data_faktura['price_total_exclusive_vat']= $price_total_exclusive_vat;   
                $this->edit_custom_invoice($data_faktura,$custom_faktura_id,$data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_sent_success').'</div>');
                redirect('organization/info/faktura_invoices');
           
    //////////////////////////////////////////////////////////
        }
    }
    else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');  
}

 /**
 * Send Custom Invoice Reminder by : E-mail and/or SMS OR Letter
 *
 *@access private
 *@return success/failure message
 */
 function custom_invoice_reminder_send(){
    $this->data['mainTab'] = 'faktura';
    $this->data['activeTab'] = 'faktura_invoices';       
    $data_faktura['fak_sent_by'] = "";
    $data_faktura['fak_reminder_by']= "";
    $data['send_invoice_email'] = $this->input->post("email");
    $data['send_invoice_sms'] = $this->input->post("sms");
    $data['send_invoice_letter'] = $this->input->post("letter");
    $custom_faktura_id = $this->input->post("custom_faktura_id"); 
    $org_id = $this->session->userdata('member_org');
    $mem_id = $this->session->userdata('mem_id');       
    $fak_total_price = 0.00;
    $superAdminInfo = $this->info_model->get_superAdminInfo_by_org_id($org_id);
    
      $data_global_settings['global_settings_data'] = $this->info_model->get_global_settings();
      if($data_global_settings['global_settings_data']){
        foreach($data_global_settings['global_settings_data'] as $rows){
            $data_faktura['admin_cost'] = $rows->admin_cost;
            //$data_organization['organization_data']['org_allowed_sms_per_month'] = $rows->allowed_sms_per_month;
            //$data_organization['organization_data']['org_allowed_letter_per_month'] = $rows->allowed_letter_per_month;
            //$per_invoice_cost = $rows->per_invoice_cost;
        }                    
    }    
   ///////////////////////////////////////////////////////////
   $data_previlize = $this->check_member_type_previlize();
   if($this->session->userdata('mem_type')=="SuperAdmin" || $this->session->userdata('mem_type')=="Admin" || $data_previlize['access_faktura']) {            
            $package_info = $this->info_model->get_org_package_info_by_org_id($org_id);            
            $this->data['faktura_info'] = $this->info_model->get_custom_faktura_info($custom_faktura_id);
            if($this->data['faktura_info']){
                foreach($this->data['faktura_info'] as $rows){
                    $data_faktura['org_id'] = $rows->org_id;
                    $data_faktura['mem_id'] = $rows->mem_id;
                    $data_faktura['fak_invoice_no'] = $rows->fak_invoice_no;
                    $data_faktura['fak_invoice_date'] = $rows->fak_invoice_date;                    
                    $data_faktura['fak_active_date'] = $rows->fak_invoice_date;                    
                    $data_faktura['fak_expire_date'] = $rows->fak_expire_date;
                    $data_faktura['fak_invoice_cost'] = $rows->fak_invoice_cost;
                    $data_faktura['fak_total_price'] = $rows->fak_total_price;                    
                    $data_faktura['fak_send_to_external_customer'] =$rows->fak_send_to_external_customer;
                    $data_faktura['fak_send_to_org_customer'] =$rows->fak_send_to_org_customer;
                    $data_faktura['fak_terms_of_payment'] = $rows->fak_terms_of_payment;                                        
                    $data_faktura['fak_listing'] = $rows->fak_listing;
                    $data_faktura['fak_customer_notification'] = $rows->fak_customer_notification;
                    $data_faktura['fak_status'] = $rows->fak_status;
                    $data_faktura['no_of_custom_invoice_sent_by_letter'] = $rows->no_of_custom_invoice_sent_by_letter;
                    $data_faktura['custom_invoice_sent_by_letter_cost'] = $rows->custom_invoice_sent_by_letter_cost;
                    $data_faktura['fak_invoice_cost_applied'] = $rows->fak_invoice_cost_applied;
                    $data_faktura['fak_sent_by'] = $rows->fak_sent_by;
                    ///////////////////////////////////////////////////////////////////
             }
            $org_info = $this->info_model->get_organization_info_by_id($data_faktura['org_id']);
            if($org_info){
                $data['org_name'] = $org_info[0]->org_name;
                $data['org_email'] = $org_info[0]->org_email;
                $data['org_web'] = $org_info[0]->org_web;
                $data['org_number'] = $org_info[0]->org_number;
                $data['org_primary_address'] = $org_info[0]->org_primary_address;
                $data['org_phone'] = $org_info[0]->org_phone;
                $data['org_email'] = $org_info[0]->org_email;
                $data['org_zip'] = $org_info[0]->org_zip;
                $data['org_city'] = $org_info[0]->org_city;
                $data['org_country'] = $org_info[0]->org_country;
                $data['org_state'] = $org_info[0]->org_state;
                $data['org_bank_acc_no_one'] = $org_info[0]->org_bank_acc_no_one;
                $data['org_bank_acc_type_one'] = $org_info[0]->org_bank_acc_type_one;
                $data['org_bank_acc_no_two'] = $org_info[0]->org_bank_acc_no_two;
                $data['org_bank_acc_type_two'] = $org_info[0]->org_bank_acc_type_two;
                $data['org_bank_acc_no_three'] = $org_info[0]->org_bank_acc_no_three;
                $data['org_bank_acc_type_three'] = $org_info[0]->org_bank_acc_type_three;              
                $data_faktura['org_name'] = $org_info[0]->org_name;
                $data_faktura['org_number'] = $org_info[0]->org_number;
            }
            $get_client_info = $this->info_model->get_custom_faktura_client_info($data_faktura['fak_send_to_external_customer'],$data_faktura['fak_send_to_org_customer']);
            if($get_client_info && !empty($data_faktura['fak_send_to_external_customer'])){                    
                $data_faktura['fak_customer_type'] = $get_client_info[0]->fak_customer_type;
                $data_faktura['fak_customer_care_of'] = $get_client_info[0]->fak_customer_care_of;
                $data_faktura['primary_address'] = $get_client_info[0]->fak_customer_billing_address;                    
                $data_faktura['zip'] = $get_client_info[0]->fak_customer_zip;
                $data_faktura['city'] = $get_client_info[0]->fak_customer_city;
                $data_faktura['state'] = $get_client_info[0]->fak_customer_state;
                $data_faktura['country'] = $get_client_info[0]->fak_customer_country;
                $data['email'] = $get_client_info[0]->fak_customer_email;
                $data_faktura['fak_customer_no'] = $get_client_info[0]->fak_customer_no;
                $data_faktura['fak_reference_name'] = $get_client_info[0]->fak_customer_or_company_name;
                $data_faktura['fak_customer_reg_no'] = $get_client_info[0]->fak_customer_reg_no;
                $data_faktura['fak_customer_to'] = $get_client_info[0]->fak_customer_to;
                $data_faktura['fak_customer_contact_no'] = $get_client_info[0]->fak_customer_contact_no;
                $data_faktura['fak_customer_listing'] = $get_client_info[0]->fak_customer_listing;
            }
            if($get_client_info && !empty($data_faktura['fak_send_to_org_customer'])){                    
                $data_faktura['fak_customer_type'] = "";
                $data_faktura['fak_customer_care_of'] = "";
                $data_faktura['primary_address'] = $get_client_info[0]->primary_address;                    
                $data_faktura['zip'] = $get_client_info[0]->zip;
                $data_faktura['city'] = $get_client_info[0]->city;
                $data_faktura['state'] = $get_client_info[0]->state;
                $data_faktura['country'] = $get_client_info[0]->country;
                $data['email'] = $get_client_info[0]->email;
                $data_faktura['fak_customer_no'] = "";
                $data['first_name']= $get_client_info[0]->first_name;
                $data['last_name']= $get_client_info[0]->last_name;
                $data['username']=$get_client_info[0]->username;            
                $data_faktura['fak_reference_name'] = $data['first_name']."&nbsp;".$data['last_name'];
                $data_faktura['fak_customer_reg_no'] = "";
                $data_faktura['fak_customer_to'] = "";
                $data_faktura['fak_customer_contact_no'] = $get_client_info[0]->phone_no;
                $data_faktura['fak_customer_listing'] = "";
                //$data_faktura['fak_description'] = $rows->fak_description;
            }
            if($data['send_invoice_letter'] =="letter"){
                $data_faktura['fak_invoice_cost_applied'] = $data_faktura['fak_invoice_cost'];                
                $data_faktura['fak_reminder_by'] = $data['send_invoice_letter'];                
                $data_faktura['no_of_custom_invoice_sent_by_letter'] = $data_faktura['no_of_custom_invoice_sent_by_letter']+1;
                $data_faktura['custom_invoice_sent_by_letter_cost'] = $data_faktura['no_of_custom_invoice_sent_by_letter'] * $data_faktura['fak_invoice_cost_applied'];                        
                $custom_invoice_sent_by_letter_cost_vat = (25/100)*$data_faktura['custom_invoice_sent_by_letter_cost']; 
                $custom_invoice_sent_by_letter_cost_incl_vat = $data_faktura['custom_invoice_sent_by_letter_cost'] +$custom_invoice_sent_by_letter_cost_vat;
                $data_faktura['fak_total_price'] = $data_faktura['fak_total_price']+$custom_invoice_sent_by_letter_cost_incl_vat; 
                $data_faktura['fak_letter_delivered'] = 0;        
            }
            else{
                //$data_faktura['fak_invoice_cost_applied'] = 0.00;
                if($data['send_invoice_sms'] =="sms"){
                    $data_faktura['fak_reminder_by'] = $data['send_invoice_sms'].",";
                    if($package_info){
                        $sms_cost = $package_info[0]->sms_cost;
                    }
                }
                if($data['send_invoice_email'] =="email"){
                    $data_faktura['fak_reminder_by'] .= $data['send_invoice_email'];
                }
            }
        
                $admin_cost_vat = (25/100) * $data_faktura['admin_cost'];
                $admin_cost_inclu_vat =  $data_faktura['admin_cost'] + $admin_cost_vat;                
                $data_faktura['fak_total_price'] = $data_faktura['fak_total_price']+$admin_cost_inclu_vat;
                $update_data = array('fak_sent_by' => $data_faktura['fak_sent_by'], 'fak_invoice_cost_applied' => $data_faktura['fak_invoice_cost_applied'], 'fak_total_price' => $data_faktura['fak_total_price'], 'no_of_custom_invoice_sent_by_letter' => $data_faktura['no_of_custom_invoice_sent_by_letter'], 'custom_invoice_sent_by_letter_cost' => $data_faktura['custom_invoice_sent_by_letter_cost'], 'admin_cost' => $data_faktura['admin_cost']);
                $fak_update = $this->info_model->bill_custom_faktura_update($update_data,$custom_faktura_id); 
                $this->edit_custom_invoice($data_faktura,$custom_faktura_id,$data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_sent_success').'</div>');
                redirect('organization/info/faktura_invoices');
           
    //////////////////////////////////////////////////////////
        }
    }
    else{
            $this->data['dynamicView'] = 'pages/organization/faktura/faktura_no_access';
        }
        $data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        $this->load->vars($data_previlize);	   
        $this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');  
}

/**
 * Edit Custom Invoice as a PDF
 *
 *@Param $data_faktura which contains faktura Info AND $custom_faktura_id which conatins faktura id
 *@access Private
 *@return Invoice as PDF
 */
 
function edit_custom_invoice($data_faktura,$custom_faktura_id,$data){   
    include("MPDF/mpdf.php");
    $product_name = array();
    $no_of_products = array();
    $price_ex_vat = array();
    $vat_rate = array();    
    $data_fak_settings_details = $this->info_model->get_faktura_settings($this->session->userdata('member_org'));
    if($data_fak_settings_details) {
        $fak_payment_days = $data_fak_settings_details[0]->fak_payment_days;
        $fak_tax_rate = $data_fak_settings_details[0]->fak_tax_rate;
        $fak_org_bank_payment_type = $data_fak_settings_details[0]->fak_org_bank_payment_type; //Preferred Payment account for SMS Faktura 
    }
    $data_faktura['org_name'] = str_replace(" ","",$data_faktura['org_name']); 
    //$file_name ="custom_invoice/custom_invoice_".$data_faktura['org_name'].'_'.$data_faktura['org_number'].'_'.$custom_faktura_id.'.pdf';   
    $file_name ="custom_invoice_".$data_faktura['org_name'].'_'.$data_faktura['org_number'].'_'.$custom_faktura_id.'.pdf';   
    /****************************** Edit  Faktura Here ***************************************/
        $index = 0;
        $file_location ="custom_invoice/custom_invoice_".$data_faktura['org_name'].'_'.$data_faktura['org_number'].'_'.$custom_faktura_id.'.pdf';   
        $org_details =  $this->info_model->get_organization_info_by_id($this->session->userdata('member_org'));
        $custom_faktura_assigned_product_info = $this->info_model->get_custom_faktura_assigned_product($custom_faktura_id);
        if($custom_faktura_assigned_product_info){
            foreach($custom_faktura_assigned_product_info as $rows){
                $product_name[$index] = $rows->product_name;
                $no_of_products[$index] = $rows->no_of_products;
                $price_ex_vat[$index] = $rows->price_ex_vat;
                $vat_rate[$index] = $rows->vat_rate;
                $index++;                
            }
        }
        if(file_exists($file_location)){       
            if(unlink($file_location)){ 
                include_once 'MPDF/edit_custom_faktura.php';
            }
        }else{include_once 'MPDF/edit_custom_faktura.php';}
    /****************************** Edit  Faktura Here ***************************************/
    
    if($data['send_invoice_letter']=="letter"){        
        include_once 'MPDF/make_custom_faktura_letter_address.php';
    }
    if($data['send_invoice_email']=="email"){
        $file_att ="custom_invoice/custom_invoice_".$data_faktura['org_name'].'_'.$data_faktura['org_number'].'_'.$custom_faktura_id.'.pdf';   
        $file = fopen($file_att, 'rb');
        $file_data = fread($file, filesize($file_att));
        fclose($file);
        $content = chunk_split(base64_encode($file_data));
        $this->send_custom_invoice_by_email($data,$content,$file_name, $data_faktura);
    }
    if($data['send_invoice_sms']=="sms"){
        $org_total_sms = $this->info_model->get_total_sms_sent_by_organization($this->session->userdata('member_org'));
        if($org_total_sms){
            $sms_data['total_org_sms'] = $org_total_sms[0]->total_org_sms+1;
        }else{$sms_data['total_org_sms'] = 1;}
        $sms_data['sms_content'] = "Invoice no: ".$data_faktura['fak_invoice_no']." , Total Price: ".$data_faktura['fak_total_price']." ".'SEK'." , Payable to: ".$fak_org_bank_payment_type;
        $sms_data['org_id'] = $this->session->userdata('member_org');
        $sms_data['sender_id'] = $this->session->userdata('mem_id');
        if($data_faktura['fak_send_to_external_customer'] ){
            $sms_data['external_receiver_ids'] = $data_faktura['fak_send_to_external_customer'];
        }
        if($data_faktura['fak_send_to_org_customer'] ){
            $sms_data['receiver_ids'] = $data_faktura['fak_send_to_org_customer'];
        }
        $sms_data['receiver_contact_nos'] = $data_faktura['fak_customer_contact_no']; 
        $sms_data['add_date'] = date("Y-m-d H:i:s"); 
        $success = $this->info_model->insert_org_member_sms($sms_data);      
        $response = send_custom_invoice_sms($sms_data,$custom_faktura_id,$data);
    }
    return TRUE;
}

function custom_invoice_make_unpaid($cus_fak_id){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'faktura';
    $this->data['activeTab'] = 'faktura_invoices';       
    $data_faktura['fak_status'] = 0;
    $fak_update = $this->info_model->bill_custom_faktura_update($data_faktura,$cus_fak_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_updated_success').'</div>');
    redirect('organization/info/faktura_invoices');        
}

function custom_invoice_make_paid($cus_fak_id){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'faktura';
    $this->data['activeTab'] = 'faktura_invoices';   
    $data_faktura['fak_status'] = 1;
    $fak_update = $this->info_model->bill_custom_faktura_update($data_faktura,$cus_fak_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_updated_success').'</div>');
    redirect('organization/info/faktura_invoices');        
}

/**
 * Send Custom invoice by E-mail
 *
 *@access Private
 *@return Confirmation or Error Message 
*/
 
function send_custom_invoice_by_email($data,$content,$file_name, $data_faktura){
    $this->lang->load('common', $this->session->userdata('lang_file'));                
    $emailfrom = $data['org_email'];       
    $subject=$this->lang->line('email_custom_invoice_sent_subject').$data['org_name']."\n\n";	
	$message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>".$this->lang->line('email_custom_invoice_sent_subject').$data['org_name']."</b></td></tr></table>"."\n";
	$message .="<p>".$this->lang->line('email_registration_confirmation_dear')." ".$data_faktura['fak_reference_name'].",</p>"."\n";
    //$message .="<p>".$this->lang->line('email_registration_confirmation_congratulation_msg')."</p>"."\n";	
                    
    $message .= "<p>".$this->lang->line('email_custom_invoice_confirmation_msg').": </p>\n";
    $message .="<p><b>".$this->lang->line('label_fak_customer_no').":  </b>".$data_faktura['fak_customer_no']."</p>\n";
	$message .="<p><b>".$this->lang->line('label_fak_reg_no'). ":   </b>".$data_faktura['fak_customer_reg_no'] ."</p>\n";	
	$message .="<p><b>".$this->lang->line('label_fak_to'). ":   </b>".$data_faktura['fak_customer_to'] ."</p>\n";	
    $message .="<p>".$this->lang->line('sent_invoice_msg')." </p>\n";
	$message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "</body></html>\n";	
	
    $header  = "From: ". $this->lang->line('site_logo')."<".$emailfrom.">\r\n";
    $header .= "Reply-To:".$emailfrom."\r\n";    
    $uid = md5(uniqid(time()));  
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/pdf; name=\"".$file_name."\"\r\n";
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";

//echo $data['member_email'];
    //echo $header; exit;
	if(mail($data['email'], $subject,"",$header))
	 {   
          $data=array();
     	  //$data['msg2']="Your registration successful !! A confirmation email sent to your email with your login information.";          
	 }
	else
	{
		 $data['msg2']="";
         
	}
    
    return $data;    
}

  /**
 * Send Whole Article/Notification only Via E-mail
 *
 *@Param $article_data Which contains all article related data AND $email_type Which contains it's notification/whole article
 *@access Private
 *@return Confirmation or Error Message
 */
function send_article_by_email($data, $email_type, $attachment_name, $attached_file){
           
    $this->lang->load('common', $this->session->userdata('lang_file'));                
    ///////////////////////////////////////////
    $emailfrom ="admin@adminscentral.com";       
    $subject=$this->lang->line('article_posted_main_board_msg'). " | ".$this->lang->line('site_logo'). "\n\n";	
    // email fields: to, from, subject, and so on
    $from = $emailfrom;
    $message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
    $message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>".$this->lang->line('article_posted_main_board_msg')."</b></td></tr></table>"."\n";
    $message .="<p>".$this->lang->line('email_registration_confirmation_dear')." ".$this->lang->line('email_label_member').",</p>"."\n";
    $message .="<p>".$this->lang->line('new_article_posted_text')." (".$data['org_name'] .")'s ".$this->lang->line('new_article_posted_main_board_with_text')." : </p>"."\n";
    $message .="<p><b>".$this->lang->line('org_menu_tab_article_category'). ":  </b>".$data['art_category_name']."</p>\n";
    $message .="<p style='font-weight:bold;font-size:14px;'>".$this->lang->line('label_title').": <a style='font-weight:bold;font-size:14px;' href='".base_url()."organization/info/view_mainboard/".$data['art_inserted_article_id']."'>".$data['article_title'] ."</a></p>"."\n";
	 if($email_type=="send_article" && !$data['uploaded_article']){
               $message .="<p><b>".$this->lang->line('label_text').": </b>".$data['article_text']."</p>\n";
    }
    
   $message .="<p><b>".$this->lang->line('label_expire_date').": </b>".date("Y-m-d",$data['expire_date'])."</p>\n";
	$message .="<p>".$this->lang->line('article_can_see_message_text')." </p>\n";
    
	$message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "</body></html>\n";
     $headers = "From: ". $this->lang->line('site_logo')."<".$emailfrom.">";
    
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    // multipart boundary 
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
    $message .= "--{$mime_boundary}\n";
    // preparing attachments    
    if($email_type=="send_article" && $data['uploaded_article']){
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$attachment_name\"\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"$attachment_name\"\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $attached_file . "\n\n";
        $message .= "--{$mime_boundary}\n";
    }
    
  // echo $message;exit;
    // send
    //$ok = @mail($to, $subject, $message, $headers); 
    /////////////////////////////////
       $data_receiver_info = $this->info_model->get_member_info_assigned_to_group($data['receiver_members_id']);

   if($data_receiver_info){
        foreach($data_receiver_info as $rows){ 
             if(mail($rows->email, $subject,$message,$headers)){
                    $success=TRUE;
                   
                }            
            }    
    }
    
	
    return TRUE;              
    

}

function send_article_by_letter($data, $inserted_article_id){
    $receiver_ids ="";
    $data_receiver_info = $this->info_model->get_member_info_assigned_to_group($data['receiver_members_id']);
    $org_mem_total_letter = $this->info_model->get_total_letter_sent_by_member($this->session->userdata('member_org'), $this->session->userdata('mem_id'));
    $org_total_letter = $this->info_model->get_total_letter_sent_by_organization($this->session->userdata('member_org'));
    
    if($data_receiver_info){            
            foreach($data_receiver_info as $rows){                
                    if($receiver_ids){
                        $receiver_ids .= ",". $rows->mem_id;
                    }else{$receiver_ids = $rows->mem_id;}                  
            }                          
                        
            $total_receipant = sizeof($data_receiver_info);
            $letter_data['total_mem_letter'] = $total_receipant;
            
             if(count($org_total_letter)){
                $letter_data['total_org_letter'] = $org_total_letter[0]->total_org_letter+$letter_data['total_mem_letter'];
             }else{$letter_data['total_org_letter'] = $letter_data['total_mem_letter'];}
    
            if(count($org_mem_total_letter)){
                $letter_data['total_mem_letter'] += $org_mem_total_letter[0]->total_mem_letter;
            }     
        }    
    
        $letter_data['org_id'] = $this->session->userdata('member_org');
        $letter_data['sender_id'] = $this->session->userdata('mem_id');
        $letter_data['receiver_ids'] = $receiver_ids;
        $letter_data['letter_title'] = $data['article_title'];    
        $letter_data['letter_text'] = $data['article_text'];    
        if(empty($data['uploaded_letter']) && !empty($data['created_letter'])){
            $data['uploaded_letter'] =  $data['created_letter'];
        }
        $letter_data['uploaded_letter'] = $data['uploaded_letter'];   
        $letter_data['letter_footer'] =1;
        $letter_data['add_date'] = date("Y-m-d H:i:s");   
        $letter_id = $this->info_model->insert_org_member_letter($letter_data);
        $this->make_org_mem_article_letter($letter_data,$inserted_article_id,$letter_id,$data['created_letter']);

        //$response = org_member_sms($receiver_contact_nos,$sms_data);
       
}


/**
 * Make make_org_mem_article_letter : Article's Letter pdf
 *
 *@Param $letter_data which contains Article's letter Info , $article_id which conatins article_id, $letter_id AND $created_letter
 *@access Private
 *@return Article's Letter as PDF
 */ 
function make_org_mem_article_letter($letter_data, $article_id, $letter_id, $created_letter){   
        include("MPDF/mpdf.php");    
        //if(empty($letter_data['uploaded_letter'])){        
        if($created_letter){        
            include_once 'MPDF/make_org_mem_article_letter.php';
        }
        include_once 'MPDF/make_org_mem_article_letter_address.php';
}

function send_article_by_sms($data){
        $sms_count =1;
        $receiver_ids = "";
        $receiver_contact_nos ="";
        
        //$message_content =$this->lang->line('email_registration_confirmation_dear')." ".$this->lang->line('email_label_member').",<br/>";
        //$message_content .= $this->lang->line('new_article_posted_text')." (".$data['org_name'] .")'s ".$this->lang->line('new_article_posted_main_board_with_text')." : "."\n";
        //$message_content .="<p style='font-weight:bold;font-size:14px;'>".$this->lang->line('label_title').": <a style='font-weight:bold;font-size:14px;' href='".base_url()."organization/info/view_mainboard/".$data['art_inserted_article_id']."'>".$data['article_title'] ."</a></p>"."\n";
        //$message_content .="<p><b>".$this->lang->line('label_expire_date').": </b>".date("Y-m-d",$data['expire_date'])."</p>\n";
        $message_intake =  $this->lang->line('email_registration_confirmation_dear')." ".$this->lang->line('email_label_member').",\n";
        $message_intake .= $this->lang->line('new_article_posted_text')." (".$data['org_name'] .")'s ".$this->lang->line('new_article_posted_main_board_with_text')." : "."\n";
        $message_intake .= $this->lang->line('label_title').": ". $data['article_title'] ."\n";
        $message_intake .= $this->lang->line('label_expire_date').": ".date("Y-m-d",$data['expire_date'])."\n";
       
        if($message_intake && strlen($message_intake)>160){
            $sms_count =0;
            $sms_temp_count = strlen($message_intake);
            $sms_count += intval($sms_temp_count/160);
            $sms_temp_count = ($sms_temp_count%160);
            if($sms_temp_count){
                $sms_count += 1;
            }
        }

        $sms_data['total_mem_sms'] = $sms_count;        
        $data_receiver_info = $this->info_model->get_member_info_assigned_to_group($data['receiver_members_id']);
        $org_mem_total_sms = $this->info_model->get_total_sms_sent_by_member($this->session->userdata('member_org'), $this->session->userdata('mem_id'));
        $org_total_sms = $this->info_model->get_total_sms_sent_by_organization($this->session->userdata('member_org'));
       
        if($data_receiver_info){            
            foreach($data_receiver_info as $rows){
                if($rows->phone_no){
                    if($receiver_ids){
                        $receiver_ids .= ",". $rows->mem_id;
                    }else{$receiver_ids = $rows->mem_id;}

                    if($receiver_contact_nos){
                        $receiver_contact_nos .= ",". $rows->phone_no;
                    }else{$receiver_contact_nos = $rows->phone_no;}
                }               
            }      
            
            $sms_no = explode(",",$receiver_contact_nos);
            $total_receipant = sizeof($sms_no);
            $sms_data['total_mem_sms'] = $sms_data['total_mem_sms']*$total_receipant;
            
             if(count($org_total_sms)){
                $sms_data['total_org_sms'] = $org_total_sms[0]->total_org_sms+$sms_data['total_mem_sms'];
             }else{$sms_data['total_org_sms'] = $sms_data['total_mem_sms'];}
    
            if(count($org_mem_total_sms)){
                $sms_data['total_mem_sms'] += $org_mem_total_sms[0]->total_mem_sms;
            }     
        }                
        $sms_data['org_id'] = $this->session->userdata('member_org');
        $sms_data['sender_id'] = $this->session->userdata('mem_id');
        $sms_data['receiver_ids'] = $receiver_ids;
        $sms_data['receiver_contact_nos'] = $receiver_contact_nos;
        $sms_data['sms_content'] = $message_intake;    
        $sms_data['add_date'] = date("Y-m-d H:i:s");   
        $success = $this->info_model->insert_org_member_sms($sms_data);
        $response = org_member_sms($receiver_contact_nos,$sms_data);
}

/**
 * Communication with members within the Organization Via E-mail, SMS, Letter: Default: E-mail
 *
 *@access private Based on Package Subscription but E-mail is Free
 *@return Communication Panel
 */
    function communication_member() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        $this->data['num_of_inbox_message'] = "";
        $this->data['num_of_sent_message'] = "";    
        $member_group_id = "";
        $data_previlize = $this->check_member_type_previlize();
        $mem_id = $this->session->userdata('mem_id');
        $mem_type = $data_previlize['mem_type']; 
        $member_group = $this->info_model->get_mem_group_info_by_mem_id($mem_id); 
        if($member_group){
            $member_group_id = $member_group[0]->group_id;
        }                
        $check_pacakge_access = $this->check_pacakge_access($mem_id, "active", $mem_type);    
        //print_r($check_pacakge_access); exit;
        $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_message($flag="inbox", $mem_id, $member_group_id, $mem_type);
        $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_message($flag="sent", $mem_id, "", "");
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/communication_member");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->info_model->get_member_communicate_inbox_message($mem_id , $member_group_id, $mem_type, "", "")->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_member_communicate_inbox_message($mem_id , $member_group_id, $mem_type, "", "")->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
        $this->load->vars($check_pacakge_access);
        $this->data['dynamicView'] = 'pages/organization/communication_member/email_inbox';
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * Communication with Members: Compose New Email
 *
 *@access private
 *@return Compose New Email Form
 */
function compose_new_email(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'email';
    $this->data['send_option'] = 'send_now';
    $this->data['email_subject'] = "";
    $this->data['email_message'] = "";
    $this->data['file_upload_failed'] = "";
    $this->data['individual_email_addresses'] = "";
    $member_group_id = "";
    $data_previlize = $this->check_member_type_previlize();
    $member_org = $data_previlize['member_org'];
    $mem_id = $this->session->userdata('mem_id');
    $mem_type = $data_previlize['mem_type']; 
    $member_group = $this->info_model->get_mem_group_info_by_mem_id($mem_id); 
    if($member_group){
        $member_group_id = $member_group[0]->group_id;
    }                    
    $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
    //$this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
    $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_message($flag="inbox", $mem_id, $member_group_id, $mem_type);
    $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_message($flag="sent", $mem_id, "", "");
    $this->data['org_mem_external_contact'] = $this->info_model->get_org_mem_external_contact_by_org_id($member_org , $mem_id);
    $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $member_org);    
    $this->data['all_active_admin'] = $this->info_model->get_org_active_admin($member_org);    
    //print_r($this->data['org_mem_external_contact']); 
    //print_r($this->data['all_active_admin']); exit;    
    $this->data['dynamicView'] = 'pages/organization/communication_member/email_compose';
    $this->_commonPageLayout('frontend_viewer');
}


/**
 * Communication with Members: Compose New Email Process
 *
 *@access private
 *@return Success/Failure Message
 */

function compose_new_email_process(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'email';
    $this->data['file_upload_failed'] = "";   
    $this->data['send_option'] = 'send_now';
    $group_mem_id  = "";
    $send_to_member = ""; 
    $send_to_admin_member = "";
    $attachment_name = array(); 
    $attachedfile = array();
    $email_addresses = array();
    $email_data = array();
    $send_to_admin_member_info = array();
    $external_members_name = array();
    $members_name = array();
    $groups_name = array();
    $admins_name = array();
    $form_error = FALSE;
    $stop_form_validation = FALSE;
    $file_uploaded_success = FALSE;
    
    $member_group_id = "";
    $data_previlize = $this->check_member_type_previlize();
    $member_org = $data_previlize['member_org'];
    $mem_id = $this->session->userdata('mem_id');
    $mem_type = $data_previlize['mem_type']; 
    $member_group = $this->info_model->get_mem_group_info_by_mem_id($mem_id); 
    if($member_group){
        $member_group_id = $member_group[0]->group_id;
    }          
    $this->load->library('form_validation');
    $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
    $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_message($flag="inbox", $mem_id, $member_group_id, $mem_type);
    $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_message($flag="sent", $mem_id, "", "");
    $this->data['org_mem_external_contact'] = $this->info_model->get_org_mem_external_contact_by_org_id($member_org, $mem_id);
    $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $member_org);    
    $this->data['all_active_admin'] = $this->info_model->get_org_active_admin($member_org);  
     if($this->data['query1']) {
        $sender_name = $this->data['query1'][0]->first_name." ".$this->data['query1'][0]->last_name;
    }
    /////////////////////////////////////////////////////////////
    
    $this->data['email_sender'] = $mem_id;
    $this->data['sender_name'] = $sender_name;
    $this->data['email_subject'] = $this->input->post('email_subject');
    $this->data['email_message'] = $this->input->post('email_message');
    $this->data['individual_email_addresses'] = $this->input->post('individual_email_addresses'); 
    $this->data['select_external_recipants'] = $this->input->post('select_external_recipants');
    $this->data['send_to_external_list'] = $this->input->post('send_to_external_list');
    $this->data['select_member'] = $this->input->post('select_member');
    $this->data['send_to_group'] = $this->input->post('send_to_group');
    $this->data['send_to_member'] = $this->input->post('send_to_member');
    $this->data['select_admins'] =  $this->input->post('select_admins');
    $this->data['send_to_admin_member'] = $this->input->post('send_to_admins');         
    $this->data['admins_all'] =  $this->input->post('admins_all');
    $this->data['send_option'] = $this->input->post('send_option');
    $this->data['send_option'] = $this->input->post('send_option');
    $this->data['sending_date'] = $this->input->post('sending_date');
    $this->data['sending_hour_option'] = $this->input->post('sending_hour_option');
    $this->data['sending_minutes'] = $this->input->post('sending_minutes');
   
    $this->form_validation->set_rules('email_subject', $this->lang->line('label_subject'), 'trim|required');
    $this->form_validation->set_rules('email_message', $this->lang->line('label_message'), 'trim|required');
    if(empty($this->data['individual_email_addresses'][0]) && empty($this->data['select_external_recipants']) && (empty($this->data['send_to_group']) && empty($this->data['select_member'])) && (empty($this->data['select_admins']) && empty($this->data['admins_all']))){
        $this->form_validation->set_rules('individual_email_addresses', $this->lang->line('label_send_to'), 'trim|required');
     }
    elseif(empty($this->data['individual_email_addresses'])){
        if($this->data['select_external_recipants'] =="external_recipants_check"){
            if(!isset($this->data['send_to_external_list'][0])){   
                $form_error = TRUE;
                $this->form_validation->set_rules('send_to_external_list', $this->lang->line('label_external_list'), 'trim|required');
            }else{
                $stop_form_validation = TRUE;
            }
        }
    }
        ////////////////////////////////////////////////////////////
        if(!$form_error && !$stop_form_validation && empty($this->data['send_to_group']) && empty($this->data['select_member']) && empty($this->data['select_admins']) && empty($this->data['admins_all'])){
            $form_error = TRUE;
            $this->form_validation->set_rules('send_to_group', $this->lang->line('label_group'), 'trim|required');
        }else{
                //$stop_form_validation = TRUE;
            }      
        if(!$form_error && !$stop_form_validation  && $this->data['select_member']){
            $send_to_member_list = $this->data['send_to_member'];                                             
            if(!isset($send_to_member_list[0])){   
                $form_error = TRUE;
                $this->form_validation->set_rules('send_to_member', $this->lang->line('label_select_memebr'), 'trim|required');
            }else{
                $stop_form_validation = TRUE;
            } 
            if(sizeof($this->data['send_to_member'])==1){
                $send_to_member = $this->data['send_to_member'][0];
            }elseif(sizeof($this->data['send_to_member'])>1){
                $send_to_member = implode(",",array_unique($this->data['send_to_member']));                
            }                                        
            if($send_to_member){$email_data['send_to_member'] =  ",".$send_to_member.",";}            
        }
        if(!empty($this->data['send_to_group'])){
            $stop_form_validation = TRUE;
        }
        if(sizeof($this->data['send_to_group'])==1){            
            $send_to_group = $this->data['send_to_group'][0];
        }elseif(sizeof($this->data['send_to_group'])>1){
            $send_to_group = implode(",",$this->data['send_to_group']);
        }
        if($send_to_group){ $email_data['send_to_group'] =  ",".$send_to_group.",";}
        //////////////////////////////////////////////////////////
        if(!$form_error && !$stop_form_validation && empty($this->data['select_admins']) && empty($this->data['admins_all'])){
            $form_error = TRUE;
            $this->form_validation->set_rules('select_admins', $this->lang->line('label_admins'), 'trim|required');            
        }else{
                //$stop_form_validation = TRUE;
            }        
        if(!$form_error && !$stop_form_validation && $this->data['select_admins']){
            $send_to_admin_list =  $this->data['send_to_admin_member'] ;                                   
            if(!isset($send_to_admin_list[0])){  
                $form_error = TRUE;
                $this->form_validation->set_rules('send_to_admins', $this->lang->line('label_select_admin'), 'trim|required');
            }            
        }
       if(sizeof($this->data['send_to_admin_member'])==1){
                $send_to_admin_member = $this->data['send_to_admin_member'][0];
        }elseif(sizeof($this->data['send_to_admin_member'])>1){
                $send_to_admin_member = implode(",",$this->data['send_to_admin_member']);
        }                                    
        if($send_to_admin_member){$email_data['send_to_admin_member'] =  ",".$send_to_admin_member.",";}
        if(!empty($this->data['admins_all'])){
            $email_data['send_to_admin_group'] = "Admins";
        }
        
    if($this->data['send_option']=="send_later"){
        $this->form_validation->set_rules('sending_date', $this->lang->line('label_select_date'), 'trim|required');
        $this->form_validation->set_rules('sending_hour_option', $this->lang->line('label_time'), 'trim|required');
    }
        
   /////////////////////////////////////////////////////////
         if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/communication_member/email_compose';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                    $count =0;
                    //$target = "./uploads/admin_communication/attached_files/";
                    if(isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH']<=2097152){  
                    /////////////////////////////////////////////////////////
                    
                       $last_communication_id= $this->info_model->get_last_communication_id();
                       $comm_id = $last_communication_id[0]->communication_id+1;
                       // print_r($last_communication_id);
                        /*if(!$comm_id){
                            $comm_id = 1;
                        }*/
                        if($this->data['sending_date']) {
                            $sending_date = explode("-", $this->data['sending_date']);
                            $email_data['sending_time'] = mktime($this->data['sending_hour_option'],$this->data['sending_minutes'],0, $sending_date[1],  $sending_date[2], $sending_date[0]);
                        }   
                        $uploaded_dir = $comm_id."_".date("s");
                        $mkdirpath = "./uploads/member_communication/attached_files/".$uploaded_dir."/";
                        mkdir($mkdirpath);
                        chmod($mkdirpath, 02755);                        
                        $email_data['sender_id'] = $mem_id;
                        $email_data['org_id'] = $member_org;
                        $email_data['sender_name'] = $this->data['sender_name'];
                        $email_data['email_subject'] = $this->data['email_subject'] ;
                        $email_data['email_message'] = $this->data['email_message'] ;
                        $email_data['attached_files'] = "";
                        $email_data['uploaded_dir'] = $uploaded_dir;                        
                        $email_data['add_date'] = date("Y-m-d H:i:s");   
                                     
                    /////////////////////////////////////////////////////////
                    
                        foreach ($_FILES['email_files']['name'] as $filename) {   
                            if($filename){
                                $file_type1 = explode(".",$filename);
                                $extension = strtolower($file_type1[count($file_type1)-1]);
                                if($extension=='png' || $extension=='jpg' || $extension=='txt' || $extension=='doc' || $extension=='docx' || $extension=='pdf'){
                                                                    
                                    $email_data['attached_files'] .= $filename."|";                                
                                    $temp=$mkdirpath;
                                    $tmp=$_FILES['email_files']['tmp_name'][$count];
                                    
                                    if($tmp){
                                        $attachment_name[$count] = $filename; 
                                        $fp = fopen($tmp, "rb"); //Open it
                                        $attachedfile_tmp = fread($fp, filesize($tmp)); //Read it
                                        $attachedfile[$count] = chunk_split(base64_encode($attachedfile_tmp)); //Chunk it up and encode it as base64 so it can emailed
                                        fclose($fp); 
                                    }

                                    $temp=$temp.basename($filename);
                                    move_uploaded_file($tmp,$temp);
                                    $count=$count + 1;     
                                    $temp='';
                                    $tmp='';
                                    $file_uploaded_success = TRUE;
                                }else{
                                            rmdir($mkdirpath);
                                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('member_communication_file_type_not_supported').'</div>';
                                            $this->data['dynamicView'] = 'pages/organization/communication_member/email_compose';
                                            $this->_commonPageLayout('frontend_viewer');
                                        }
                            }  
                        }
                    
                    }else{
                                $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('member_communication_max_file_upload_size').'</div>';
                                $this->data['dynamicView'] = 'pages/organization/communication_member/email_compose';
                                $this->_commonPageLayout('frontend_viewer');
                        }

                        if(!$file_uploaded_success){
                            rmdir($mkdirpath);
                            $email_data['uploaded_dir'] = "";
                        }                    
                        if($this->data['individual_email_addresses']){
                            $email_data['send_to_individual_email'] = $this->data['individual_email_addresses'];
                            $email_addresses = explode(",",$email_data['send_to_individual_email']);
                    }
                      if($this->data['send_to_external_list']){
                                $send_to_external_list = implode(",",$this->data['send_to_external_list']); 
                                $external_list_info = $this->info_model->get_org_mem_external_contact_info_by_ids($member_org, $mem_id, $send_to_external_list);
                                if($external_list_info){
                                    foreach($external_list_info as $rows){
                                        array_push($email_addresses, $rows->ext_contact_email);
                                        array_push($external_members_name, $rows->ext_contact_name);
                                    }
                            }
                            $email_data['send_to_external_list'] = ",".$send_to_external_list.",";                           
                }
                
                    if($send_to_member){
                        $send_to_member = ",".$send_to_member.",";
                        $send_member_info = $this->info_model->get_member_info_assigned_to_group_not_admin($send_to_member);
                        if($send_member_info){
                            foreach($send_member_info as $rows){
                                array_push($email_addresses, $rows->email);
                                array_push($members_name, $rows->first_name." ".$rows->last_name);
                            }
                        }
                    } 
                    if($send_to_group){
                            $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($send_to_group);
                            if($mem_assigned_to_group){                                
                                foreach($mem_assigned_to_group as $group_mem){
                                    $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                                    array_push($groups_name, $group_mem->group_name);

                                }
                            }
                       }                    
                      if($group_mem_id){
                              $group_mem_id = ",".$group_mem_id . $send_to_member;
                              $send_group_member_info = $this->info_model->get_member_info_assigned_to_group_not_admin($group_mem_id);
                               if($send_group_member_info){
                                    foreach($send_group_member_info as $rows){
                                        array_push($email_addresses, $rows->email);
                                    }
                                }
                      }                          
                    
                    
                    if($send_to_admin_member){      
                        $send_to_admin_member_info = $this->info_model->get_member_info_by_id($send_to_admin_member , $member_org);
                   }
                    elseif(!empty($this->data['admins_all'])){
                        $send_to_admin_member_info = $this->info_model->get_member_info_by_id("Admins", $member_org);
                    }
                    if($send_to_admin_member_info){
                        foreach($send_to_admin_member_info as $rows){
                            array_push($email_addresses, $rows->email);
                            array_push($admins_name, $rows->first_name." ".$rows->last_name);

                        }
                    }            
                   /* $this->data['email_data'] = $email_data;
                    $this->data['attachment_name'] = $attachment_name;
                    $this->data['attachedfile'] = $attachedfile;
                    $this->data['email_addresses'] = $email_addresses;
                    
                    $this->data['external_members_name'] = $external_members_name;
                    $this->data['members_name'] = $members_name;
                    $this->data['groups_name'] = $groups_name;
                    $this->data['admins_name'] = $admins_name; 
                                        
                    $this->data['dynamicView'] = 'pages/organization/communication_member/email_summary';
                    $this->_commonPageLayout('frontend_viewer');*/
                    
                    $success = $this->info_model->email_insert($email_data);    
                   if($success){
                         if($this->data['query1']){
                                foreach($this->data['query1'] as $rows){
                                    $email_data['email_from'] = $rows->email;                                   
                                }
                         }
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_communicate_member_email_success').'</div>');
                        if($this->data['send_option']=="send_now"){
                            $this->member_communicate_member_email($email_data,$attachment_name,$attachedfile, $email_addresses);
                        }
                   }else{
                        $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('member_communicate_member_email_failed').'</div>');
                   }
                    redirect('organization/info/communication_member');
                }
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];   
   
}

/**
 * Member Communication with member: E-mail Send to members with multiple attached file
 *
 *@Param $email_data[] , $attachment_name[] , $attachedfile[], $email_addresses[]
 *@access private
 *@return Confirmation or Error Message
 */
 
function member_communicate_member_email($email_data,$attachment_name,$attachedfile, $email_addresses){
    $this->lang->load('common', $this->session->userdata('lang_file'));                
    $emailfrom = $email_data['email_from'];       
    $subject=$email_data['email_subject']."\n\n";	
    // email fields: to, from, subject, and so on
    //$to = $email_data['receiver_email'];
    $from = $emailfrom;

    ///////////////////////////////////////////
    $message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
    $message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
    $message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>".$email_data['email_subject']."</b></td></tr></table>"."\n";
    $message .="<p>".$this->lang->line('email_from_adminscentral_admin_hi').",</p>"."\n";            
    $message .= "<p>".$email_data['email_message'].": </p>\n";
    $message .="<p>".$this->lang->line('org_site_link_visit_msg').": </p>\n";
    $message .="<a style='font-weight:bold;font-size:14px;' href='".base_url()."'>".base_url()."</a></p>"."\n";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
    $message .= "</body></html>\n";
    $headers = "From: ". $this->lang->line('site_logo')."<".$emailfrom.">";
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    // multipart boundary 
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
    $message .= "--{$mime_boundary}\n";
    // preparing attachments
    for($x=0;$x<count($attachment_name);$x++){
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$attachment_name[$x]\"\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"$attachment_name[$x]\"\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $attachedfile[$x] . "\n\n";
        $message .= "--{$mime_boundary}\n";
    }

    // send
    for($index=0; $index<sizeof($email_addresses); $index++){
        ///echo $message;exit;
           $ok = @mail($email_addresses[$index], $subject, $message, $headers); 
    }
    
    /////////////////////////////////
 
}

/**
 * Communication with organization : Show Sent E-mail
 *
 *@access private
 *@return Sent E-mail View
 */
    function communication_member_email_sent() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';    
        $this->data['activeSubTab'] = 'sent';    
        $member_group_id = "";
        $data_previlize = $this->check_member_type_previlize();
        $mem_id = $this->session->userdata('mem_id');
        $mem_type = $data_previlize['mem_type']; 
        $member_group = $this->info_model->get_mem_group_info_by_mem_id($mem_id); 
        if($member_group){
            $member_group_id = $member_group[0]->group_id;
        }        
        
        $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_message($flag="inbox", $mem_id, $member_group_id, $mem_type);
        $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_message($flag="sent", $mem_id, "", "");
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/communication_member_email_sent");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->info_model->get_member_communicate_sent_message("","", $mem_id)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_member_communicate_sent_message($start, $perPage, $mem_id)->result();
        //print_r($this->data['query1']);exit;
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
         
        $this->data['dynamicView'] = 'pages/organization/communication_member/email_sent';
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Read E-mail message : Communication with member
 *
 *@Param $id which contains message id
 *@access private
 *@return E-mail message Details
 */
function read_member_comm_member_email_message($id) {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        $mem_id = $this->session->userdata('mem_id');
        $member_org = $this->session->userdata('member_org');
        $member_group = $this->session->userdata('member_group'); 
        $mem_type = $this->session->userdata('mem_type'); 
        $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_message($flag="inbox", $mem_id, $member_group, $mem_type);
        $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_message($flag="sent", $mem_id, "", "");
        $data = array( 'message_read' => 1);
        $this->info_model->member_comm_member_email_status_update($data, $id);
        $this->data['message'] = $this->info_model->get_email_message_detail($id);
        $this->data['dynamicView'] = 'pages/organization/communication_member/email_message_view';
        $this->_commonPageLayout('frontend_viewer');
    }


/**
 * Communication with member:  Reply for email message
 *
 *@Param  $id Which contains communication_id
 *@access private
 *@return Reply for email message
 */
function reply_email_message($id){
       ///////////////////////////////////////////////////
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        $this->data['send_option'] = 'send_now';
        $this->data['email_subject'] = "";
        $this->data['email_message'] = "";
        $this->data['file_upload_failed'] = "";
        $this->data['individual_email_addresses'] = "";
        $mem_id = $this->session->userdata('mem_id');
        $member_org = $this->session->userdata('member_org');
        $member_group = $this->session->userdata('member_group'); 
        $mem_type = $this->session->userdata('mem_type'); 
        $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
        //$this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
        $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_message($flag="inbox", $mem_id, $member_group, $mem_type);
        $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_message($flag="sent", $mem_id, "", "");
        $this->data['org_mem_external_contact'] = $this->info_model->get_org_mem_external_contact_by_org_id($member_org, $mem_id);
        $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $member_org);    
        $this->data['all_active_admin'] = $this->info_model->get_org_active_admin($member_org);    
       /////////////////////////////////////////////////
        $this->data['email_message_info'] = $this->info_model->get_email_message_detail($id);
        $this->data['dynamicView'] = 'pages/organization/communication_member/email_reply_view';
        $this->_commonPageLayout('frontend_viewer');
}

 /**
 * Communication with member: Reply for email message Process
 *
 *@Param  $id Which contains communication_id
 *@access private
 *@return Success/Failure Message
 */
function reply_email_message_process(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'email';
    $this->data['file_upload_failed'] = "";   
    $this->data['send_option'] = 'send_now';
    $group_mem_id  = "";
    $send_to_member = ""; 
    $send_to_admin_member = "";
    $attachment_name = array(); 
    $attachedfile = array();
    $email_addresses = array();
    $email_data = array();
    $send_to_admin_member_info = array();
    $form_error = FALSE;
    $stop_form_validation = FALSE;
    $file_uploaded_success = FALSE;
    $mem_id = $this->session->userdata('mem_id');
    $member_org = $this->session->userdata('member_org');
    $member_group = $this->session->userdata('member_group'); 
    $mem_type = $this->session->userdata('mem_type'); 
    $communication_id = $this->input->post('communication_id');
    $receiver_id = $this->input->post('receiver_id'); 
    $reply_of = $this->input->post('reply_of');

    $this->load->library('form_validation');
    $this->data['email_message_info'] = $this->info_model->get_email_message_detail($communication_id);   
    $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
    $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_message($flag="inbox", $mem_id, $member_group, $mem_type);
    $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_message($flag="sent", $mem_id, "", "");
    $this->data['org_mem_external_contact'] = $this->info_model->get_org_mem_external_contact_by_org_id($member_org, $mem_id);
    $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $member_org);    
    $this->data['all_active_admin'] = $this->info_model->get_org_active_admin($member_org);  
   
    /////////////////////////////////////////////////////////////
    
    $this->data['email_sender'] = $mem_id;
    $this->data['sender_name'] = $this->input->post('sender_name');
    $this->data['email_subject'] = $this->input->post('email_subject');
    $this->data['email_message'] = $this->input->post('email_message');
    $this->data['individual_email_addresses'] = $this->input->post('individual_email_addresses'); 
    $this->data['select_external_recipants'] = $this->input->post('select_external_recipants');
    $this->data['send_to_external_list'] = $this->input->post('send_to_external_list');
    $this->data['select_member'] = $this->input->post('select_member');
    $this->data['send_to_group'] = $this->input->post('send_to_group');
    $this->data['send_to_member'] = $this->input->post('send_to_member');
    $this->data['select_admins'] =  $this->input->post('select_admins');
    $this->data['send_to_admin_member'] = $this->input->post('send_to_admins');         
    $this->data['admins_all'] =  $this->input->post('admins_all');
    $this->data['send_option'] = $this->input->post('send_option');
    $this->data['send_option'] = $this->input->post('send_option');
    $this->data['sending_date'] = $this->input->post('sending_date');
    $this->data['sending_hour_option'] = $this->input->post('sending_hour_option');
    $this->data['sending_minutes'] = $this->input->post('sending_minutes');
    
    $this->form_validation->set_rules('email_subject', $this->lang->line('label_subject'), 'trim|required');
    $this->form_validation->set_rules('email_message', $this->lang->line('label_message'), 'trim|required');
   
        if($this->data['select_external_recipants'] =="external_recipants_check"){
            if(!isset($this->data['send_to_external_list'][0])){   
                $form_error = TRUE;
                $this->form_validation->set_rules('send_to_external_list', $this->lang->line('label_external_list'), 'trim|required');
            }
        }
        $email_data['send_to_member'] =  ",".$receiver_id.",";
        if($this->data['select_member']){
            $send_to_member_list = $this->data['send_to_member'];                                             
            if(!isset($send_to_member_list[0])){   
                $form_error = TRUE;
                $this->form_validation->set_rules('send_to_member', $this->lang->line('label_select_memebr'), 'trim|required');
            }
            if(sizeof($this->data['send_to_member'])==1){
                $send_to_member = $this->data['send_to_member'][0];
            }elseif(sizeof($this->data['send_to_member'])>1){
                $send_to_member = implode(",",array_unique($this->data['send_to_member']));                
            }                                        
            if($send_to_member){$email_data['send_to_member'] =  ",".$send_to_member.",".$receiver_id.",";}            
        }
       
        if(sizeof($this->data['send_to_group'])==1){            
            $send_to_group = $this->data['send_to_group'][0];
        }elseif(sizeof($this->data['send_to_group'])>1){
            $send_to_group = implode(",",$this->data['send_to_group']);
        }
        if($send_to_group){ $email_data['send_to_group'] =  ",".$send_to_group.",";}
        //////////////////////////////////////////////////////////
           
        if($this->data['select_admins']){
            $send_to_admin_list =  $this->data['send_to_admin_member'] ;                                   
            if(!isset($send_to_admin_list[0])){  
                $form_error = TRUE;
                $this->form_validation->set_rules('send_to_admins', $this->lang->line('label_select_admin'), 'trim|required');
            }            
        }
       if(sizeof($this->data['send_to_admin_member'])==1){
                $send_to_admin_member = $this->data['send_to_admin_member'][0];
        }elseif(sizeof($this->data['send_to_admin_member'])>1){
                $send_to_admin_member = implode(",",$this->data['send_to_admin_member']);
        }                                    
        if($send_to_admin_member){$email_data['send_to_admin_member'] =  ",".$send_to_admin_member.",";}
        if(!empty($this->data['admins_all'])){
            $email_data['send_to_admin_group'] = "Admins";
        }
        
    if($this->data['send_option']=="send_later"){
        $this->form_validation->set_rules('sending_date', $this->lang->line('label_select_date'), 'trim|required');
        $this->form_validation->set_rules('sending_hour_option', $this->lang->line('label_time'), 'trim|required');
    }
        
   /////////////////////////////////////////////////////////
         if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/communication_member/email_reply_view';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                    
                    $count =0;
                    //$target = "./uploads/admin_communication/attached_files/";
                    if(isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH']<=2097152){  
                    /////////////////////////////////////////////////////////
                    
                       $last_communication_id= $this->info_model->get_last_communication_id();
                       $comm_id = $last_communication_id[0]->communication_id+1;
                       // print_r($last_communication_id);
                        /*if(!$comm_id){
                            $comm_id = 1;
                        }*/
                        if($this->data['sending_date']) {
                            $sending_date = explode("-", $this->data['sending_date']);
                            $email_data['sending_time'] = mktime($this->data['sending_hour_option'],$this->data['sending_minutes'],0, $sending_date[1],  $sending_date[2], $sending_date[0]);
                        }   
                        $uploaded_dir = $comm_id."_".date("s");
                        $mkdirpath = "./uploads/member_communication/attached_files/".$uploaded_dir."/";
                        mkdir($mkdirpath);
                        chmod($mkdirpath, 02755);                        
                        $email_data['sender_id'] = $mem_id;
                        $email_data['org_id'] = $member_org;
                        $email_data['sender_name'] = $this->data['sender_name'];
                        $email_data['email_subject'] = $this->data['email_subject'] ;
                        $email_data['email_message'] = $this->data['email_message'] ;
                        $email_data['attached_files'] = "";
                        $email_data['uploaded_dir'] = $uploaded_dir;                        
                        $email_data['add_date'] = date("Y-m-d H:i:s");   
                                     
                        if(empty($reply_of)){
                            $email_data['reply_of'] = $communication_id;
                        }
                    /////////////////////////////////////////////////////////
                    
                        foreach ($_FILES['email_files']['name'] as $filename) {   
                            if($filename){
                                $file_type1 = explode(".",$filename);
                                $extension = strtolower($file_type1[count($file_type1)-1]);
                                if($extension=='png' || $extension=='jpg' || $extension=='txt' || $extension=='doc' || $extension=='docx' || $extension=='pdf'){
                                                                    
                                    $email_data['attached_files'] .= $filename."|";                                
                                    $temp=$mkdirpath;
                                    $tmp=$_FILES['email_files']['tmp_name'][$count];
                                    
                                    if($tmp){
                                        $attachment_name[$count] = $filename; 
                                        $fp = fopen($tmp, "rb"); //Open it
                                        $attachedfile_tmp = fread($fp, filesize($tmp)); //Read it
                                        $attachedfile[$count] = chunk_split(base64_encode($attachedfile_tmp)); //Chunk it up and encode it as base64 so it can emailed
                                        fclose($fp); 
                                    }

                                    $temp=$temp.basename($filename);
                                    move_uploaded_file($tmp,$temp);
                                    $count=$count + 1;     
                                    $temp='';
                                    $tmp='';
                                    $file_uploaded_success = TRUE;
                                }else{
                                            rmdir($mkdirpath);
                                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('member_communication_file_type_not_supported').'</div>';
                                            $this->data['dynamicView'] = 'pages/organization/communication_member/email_compose';
                                            $this->_commonPageLayout('frontend_viewer');
                                        }
                            }  
                        }
                    
                    }else{
                                $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('member_communication_max_file_upload_size').'</div>';
                                $this->data['dynamicView'] = 'pages/organization/communication_member/email_compose';
                                $this->_commonPageLayout('frontend_viewer');
                        }

                        if(!$file_uploaded_success){
                            rmdir($mkdirpath);
                            $email_data['uploaded_dir'] = "";
                        }                    
                        if($this->data['individual_email_addresses']){
                            $email_data['send_to_individual_email'] = $this->data['individual_email_addresses'];
                            $email_addresses = explode(",",$email_data['send_to_individual_email']);
                        }
                        if($this->data['send_to_external_list']){
                                $send_to_external_list = implode(",",$this->data['send_to_external_list']); 
                                $external_list_info = $this->info_model->get_org_mem_external_contact_info_by_ids($member_org, $mem_id, $send_to_external_list);
                                if($external_list_info){
                                    foreach($external_list_info as $rows){
                                        array_push($email_addresses, $rows->ext_contact_email);
                                    }
                            }
                            $email_data['send_to_external_list'] = ",".$send_to_external_list.",";                           
                }
                
                    if($send_to_group){
                            $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($send_to_group);
                            if($mem_assigned_to_group){                                
                                foreach($mem_assigned_to_group as $group_mem){
                                    $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                                }
                            }
                       }                    
                      if($group_mem_id){
                              $group_mem_id = ",".$group_mem_id . $send_to_member;
                              $send_group_member_info = $this->info_model->get_member_info_assigned_to_group_not_admin($group_mem_id);
                               if($send_group_member_info){
                                    foreach($send_group_member_info as $rows){
                                        array_push($email_addresses, $rows->email);
                                    }
                                }
                      }                          
                    
                    
                    if($send_to_admin_member){      
                        $send_to_admin_member_info = $this->info_model->get_member_info_by_id($send_to_admin_member , $member_org);
                   }
                    elseif(!empty($this->data['admins_all'])){
                        $send_to_admin_member_info = $this->info_model->get_member_info_by_id("Admins", $member_org);
                    }
                    if($send_to_admin_member_info){
                        foreach($send_to_admin_member_info as $rows){
                            array_push($email_addresses, $rows->email);
                        }
                    }            
                    
                    //print_r($email_data); exit;
                    $success = $this->info_model->email_insert($email_data);    
                   if($success){
                         if($this->data['query1']){
                                foreach($this->data['query1'] as $rows){
                                    $email_data['email_from'] = $rows->email;                                   
                                }
                         }
                         $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_communicate_member_email_success').'</div>');
                         $this->member_communicate_member_email($email_data,$attachment_name,$attachedfile, $email_addresses);
                   }else{
                        $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('member_communicate_member_email_failed').'</div>');
                   }
                    redirect('organization/info/communication_member');
                }
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];   
   
}
 /**
 * Communication with members within organization Via SMS
 *
 *@access private
 *@return SMS Inbox view
 */
    function communication_member_sms() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        $this->data['num_of_inbox_sms'] = "";
        $member_group_id = "";
        $data_previlize = $this->check_member_type_previlize();
        $mem_id = $this->session->userdata('mem_id');
        $mem_type = $data_previlize['mem_type']; 
        $member_group = $this->info_model->get_mem_group_info_by_mem_id($mem_id); 
        if($member_group){
            $member_group_id = $member_group[0]->group_id;
        }                       
        $check_pacakge_access = $this->check_pacakge_access($mem_id, "active", $mem_type);    
        if($check_pacakge_access['sms_module_access']){
            $this->data['num_of_inbox_sms'] = $this->info_model->get_member_communicate_member_sms($flag="inbox", $mem_id, $member_group_id, $mem_type);
            $this->data['num_of_sent_sms'] = "";
            $this->data['num_of_sent_sms'] = $this->info_model->get_member_communicate_member_sms($flag="sent" , $mem_id, $member_group_id, $mem_type);
            ////////////////////////////////////
            @$start = $this->uri->segment(4);
            //print_r($start);
            // Number of record showing per page
            @$perPage = '20';
            // Get all users
            // Pagination config
            $this->p_config['base_url'] = site_url("organization/info/communication_member_sms");
            $this->p_config['uri_segment'] = 4;
            $this->p_config['num_links'] = 2;
            $this->p_config['total_rows'] = $this->info_model->get_member_communicate_inbox_sms($mem_id , $member_group_id, $mem_type, "", "")->num_rows();
            //print_r($this->p_config['total_rows']);die();
            $this->p_config['per_page'] = $perPage;
            // Init pagination
            $this->data['query1'] = "";
            $this->data['query1'] = $this->info_model->get_member_communicate_inbox_sms($mem_id , $member_group_id, $mem_type, "", "")->result();
            $this->load->library('pagination');
            $this->pagination->initialize($this->p_config);
            ///////////////////////////////////
            $this->data['dynamicView'] = 'pages/organization/communication_member/sms_inbox';
        }else{ $this->data['dynamicView'] = 'pages/organization/communication_member/sms_no_access'; }        
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * Communication with Members: Compose New SMS
 *
 *@access private
 *@return Compose New Email Form
 */
function compose_new_sms(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'sms';
    $this->data['send_option'] = 'send_now';
    $this->data['sms_content'] = "";
    $this->data['individual_contact_nos'] = "";    
    $member_group_id = "";
    $data_previlize = $this->check_member_type_previlize();
    $mem_id = $this->session->userdata('mem_id');
    $mem_type = $data_previlize['mem_type']; 
    $member_group = $this->info_model->get_mem_group_info_by_mem_id($mem_id); 
    if($member_group){
        $member_group_id = $member_group[0]->group_id;
    }                       
    $check_pacakge_access = $this->check_pacakge_access($mem_id, "active", $mem_type);    
    if($check_pacakge_access['sms_module_access']){
        $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
        //$this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
        $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_sms($flag="inbox", $mem_id, $member_group_id, $mem_type);
        $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_sms($flag="sent", $mem_id, "", "");
        $this->data['org_mem_external_contact'] = $this->info_model->get_org_mem_external_contact_by_org_id($data_previlize['member_org'], $mem_id);
        $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $data_previlize['member_org']);    
        $this->data['all_active_admin'] = $this->info_model->get_org_active_admin($data_previlize['member_org']);    
        $this->data['dynamicView'] = 'pages/organization/communication_member/sms_compose';
    } else{ $this->data['dynamicView'] = 'pages/organization/communication_member/sms_no_access'; }        
    $this->_commonPageLayout('frontend_viewer');
}
/**
 * Communication with Members: Compose New SMS Process
 *
 *@access private
 *@return Success/Failure Message
 */
function compose_new_sms_process(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'sms';
    $this->data['send_option'] = 'send_now';
    $group_mem_id  = "";
    $send_to_member = ""; 
    $send_to_admin_member = "";
    $mobile_nos = array();
    $sms_data = array();
    $send_to_admin_member_info = array();
    $external_members_name = array();
    $members_name = array();
    $groups_name = array();
    $admins_name = array();
    
    $form_error = FALSE;
    $stop_form_validation = FALSE;    
    $member_group_id = "";
    $data_previlize = $this->check_member_type_previlize();
    $mem_id = $this->session->userdata('mem_id');
    $mem_type = $data_previlize['mem_type']; 
    $member_group = $this->info_model->get_mem_group_info_by_mem_id($mem_id); 
    if($member_group){
        $member_group_id = $member_group[0]->group_id;
    }                       
    $check_pacakge_access = $this->check_pacakge_access($mem_id, "active", $mem_type);    
    if($check_pacakge_access['sms_module_access']){   
        $this->load->library('form_validation');
        $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
        $this->data['num_of_inbox_message'] = $this->info_model->get_member_communicate_member_sms($flag="inbox", $mem_id, $member_group_id, $mem_type);
        $this->data['num_of_sent_message'] = $this->info_model->get_member_communicate_member_sms($flag="sent", $mem_id, "", "");
        $this->data['org_mem_external_contact'] = $this->info_model->get_org_mem_external_contact_by_org_id($data_previlize['member_org'], $mem_id);
        $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $data_previlize['member_org']);    
        $this->data['all_active_admin'] = $this->info_model->get_org_active_admin($data_previlize['member_org']);  
        $this->data['total_sms_sent'] = $this->info_model->get_total_sms_sent_by_member_id($mem_id);
        if($this->data['query1']) {
            $sender_name = $this->data['query1'][0]->first_name." ".$this->data['query1'][0]->last_name;
        }
        /////////////////////////////////////////////////////////////        
        $this->data['sms_sender'] = $mem_id;
        $this->data['sender_name'] = $sender_name;
        $this->data['sms_content'] = $this->input->post('sms_content');
        $this->data['individual_contact_nos'] = $this->input->post('individual_contact_nos'); 
        $this->data['select_external_recipants'] = $this->input->post('select_external_recipants');
        $this->data['send_to_external_list'] = $this->input->post('send_to_external_list');
        $this->data['select_member'] = $this->input->post('select_member');
        $this->data['send_to_group'] = $this->input->post('send_to_group');
        $this->data['send_to_member'] = $this->input->post('send_to_member');
        $this->data['select_admins'] =  $this->input->post('select_admins');
        $this->data['send_to_admin_member'] = $this->input->post('send_to_admins');         
        $this->data['admins_all'] =  $this->input->post('admins_all');
        $this->data['send_option'] = $this->input->post('send_option');
        $this->data['send_option'] = $this->input->post('send_option');
        $this->data['sending_date'] = $this->input->post('sending_date');
        $this->data['sending_hour_option'] = $this->input->post('sending_hour_option');
        $this->data['sending_minutes'] = $this->input->post('sending_minutes');
       
        $this->form_validation->set_rules('sms_content', $this->lang->line('label_message'), 'trim|required');
        if(empty($this->data['individual_contact_nos'][0]) && empty($this->data['select_external_recipants']) && (empty($this->data['send_to_group']) && empty($this->data['select_member'])) && (empty($this->data['select_admins']) && empty($this->data['admins_all']))){
            $this->form_validation->set_rules('individual_contact_nos', $this->lang->line('label_send_to'), 'trim|required');
         }
        elseif(empty($this->data['individual_contact_nos'])){
            if($this->data['select_external_recipants'] =="external_recipants_check"){
                if(!isset($this->data['send_to_external_list'][0])){   
                    $form_error = TRUE;
                    $this->form_validation->set_rules('send_to_external_list', $this->lang->line('label_external_list'), 'trim|required');
                }else{
                    $stop_form_validation = TRUE;
                }
            }
        }
            ////////////////////////////////////////////////////////////
            if(!$form_error && !$stop_form_validation && empty($this->data['send_to_group']) && empty($this->data['select_member']) && empty($this->data['select_admins']) && empty($this->data['admins_all'])){
                $form_error = TRUE;
                $this->form_validation->set_rules('send_to_group', $this->lang->line('label_group'), 'trim|required');
            }else{
                    //$stop_form_validation = TRUE;
                }      
            if(!$form_error && !$stop_form_validation  && $this->data['select_member']){
                $send_to_member_list = $this->data['send_to_member'];                                             
                if(!isset($send_to_member_list[0])){   
                    $form_error = TRUE;
                    $this->form_validation->set_rules('send_to_member', $this->lang->line('label_select_memebr'), 'trim|required');
                }else{
                    $stop_form_validation = TRUE;
                } 
                if(sizeof($this->data['send_to_member'])==1){
                    $send_to_member = $this->data['send_to_member'][0];
                }elseif(sizeof($this->data['send_to_member'])>1){
                    $send_to_member = implode(",",array_unique($this->data['send_to_member']));                
                }                                        
                if($send_to_member){$email_data['send_to_member'] =  ",".$send_to_member.",";}            
            }
            if(!empty($this->data['send_to_group'])){
                $stop_form_validation = TRUE;
            }
            if(sizeof($this->data['send_to_group'])==1){            
                $send_to_group = $this->data['send_to_group'][0];
            }elseif(sizeof($this->data['send_to_group'])>1){
                $send_to_group = implode(",",$this->data['send_to_group']);
            }
            if($send_to_group){ $email_data['send_to_group'] =  ",".$send_to_group.",";}
            //////////////////////////////////////////////////////////
            if(!$form_error && !$stop_form_validation && empty($this->data['select_admins']) && empty($this->data['admins_all'])){
                $form_error = TRUE;
                $this->form_validation->set_rules('select_admins', $this->lang->line('label_admins'), 'trim|required');            
            }else{
                    //$stop_form_validation = TRUE;
                }        
            if(!$form_error && !$stop_form_validation && $this->data['select_admins']){
                $send_to_admin_list =  $this->data['send_to_admin_member'] ;                                   
                if(!isset($send_to_admin_list[0])){  
                    $form_error = TRUE;
                    $this->form_validation->set_rules('send_to_admins', $this->lang->line('label_select_admin'), 'trim|required');
                }            
            }
           if(sizeof($this->data['send_to_admin_member'])==1){
                    $send_to_admin_member = $this->data['send_to_admin_member'][0];
            }elseif(sizeof($this->data['send_to_admin_member'])>1){
                    $send_to_admin_member = implode(",",$this->data['send_to_admin_member']);
            }                                    
            if($send_to_admin_member){$email_data['send_to_admin_member'] =  ",".$send_to_admin_member.",";}
            if(!empty($this->data['admins_all'])){
                $sms_data['send_to_admin_group'] = "Admins";
            }
            
        if($this->data['send_option']=="send_later"){
            $this->form_validation->set_rules('sending_date', $this->lang->line('label_select_date'), 'trim|required');
            $this->form_validation->set_rules('sending_hour_option', $this->lang->line('label_time'), 'trim|required');
        }
            
       /////////////////////////////////////////////////////////
             if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/organization/communication_member/sms_compose';
                $this->_commonPageLayout('frontend_viewer');
            } else {
                            $count =0;
                            $sms_count =1;                                               
                            if(count($this->data['query1'])){
                                $sms_data['sender_contact_no'] = $this->data['query1'][0]->mobile_phone;
                            }
                            $sms_data['sender_name'] = $this->data['sender_name'];
                            $this->data['sms_content'] = $this->data['sms_content']."\n\n";
                            $this->data['sms_content'] = $this->data['sms_content']."/".$sms_data['sender_name'];                 
                            $sms_data['sender_id'] = $mem_id;
                            $sms_data['org_id'] = $data_previlize['member_org'];                        
                            $sms_data['sms_content'] = $this->data['sms_content'];  
                            $sms_data['add_date'] = date("Y-m-d H:i:s");                          
                            if($this->data['sending_date']) {
                                $sending_date = explode("-", $this->data['sending_date']);
                                $sms_data['sending_time'] = mktime($this->data['sending_hour_option'],$this->data['sending_minutes'],0, $sending_date[1],  $sending_date[2], $sending_date[0]);
                            }   
                            if($this->data['sms_content'] && strlen($this->data['sms_content'])>160){
                                $sms_count =0;
                                $sms_temp_count = strlen($this->data['sms_content']);
                                $sms_count += intval($sms_temp_count/160);
                                $sms_temp_count = ($sms_temp_count%160);
                                if($sms_temp_count){
                                    $sms_count += 1;
                                }                            
                            }
                            $sms_data['total_sms_sent'] = $sms_count;                           
                            if($this->data['individual_contact_nos']){
                                $sms_data['send_to_individual_cell_no'] = $this->data['individual_contact_nos'];
                                $mobile_nos = explode(",",$sms_data['send_to_individual_cell_no']);
                            }
                            if($this->data['send_to_external_list']){
                                $send_to_external_list = implode(",",$this->data['send_to_external_list']); 
                                $external_list_info = $this->info_model->get_org_mem_external_contact_info_by_ids($data_previlize['member_org'], $mem_id, $send_to_external_list);
                                if($external_list_info){
                                    foreach($external_list_info as $rows){
                                        if($rows->ext_contact_cell){ array_push($mobile_nos, $rows->ext_contact_cell); }
                                        array_push($external_members_name, $rows->ext_contact_name);                                    
                                    }
                                }
                                $sms_data['send_to_external_list'] = ",".$send_to_external_list.",";                           
                            }                    
                            if($send_to_member){
                                $send_to_member = ",".$send_to_member.",";
                                $send_member_info = $this->info_model->get_member_info_assigned_to_group_not_admin($send_to_member);
                                if($send_member_info){
                                    foreach($send_member_info as $rows){
                                        if($rows->mobile_phone){  array_push($mobile_nos, $rows->mobile_phone);}
                                        array_push($members_name, $rows->first_name." ".$rows->last_name);
                                    }
                                }
                            }                    
                            if($send_to_group){
                                $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($send_to_group);
                                if($mem_assigned_to_group){                                
                                    foreach($mem_assigned_to_group as $group_mem){
                                        $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                                        array_push($groups_name, $group_mem->group_name);
                                    }
                                }
                            }                    
                            if($group_mem_id){
                                $group_mem_id = ",".$group_mem_id;
                                $send_group_member_info = $this->info_model->get_member_info_assigned_to_group_not_admin($group_mem_id);
                                if($send_group_member_info){
                                    foreach($send_group_member_info as $rows){
                                        if($rows->mobile_phone){ array_push($mobile_nos, $rows->mobile_phone); }
                                    }
                                }
                            }    
                            if($send_to_admin_member){      
                                $send_to_admin_member_info = $this->info_model->get_member_info_by_id($send_to_admin_member , $data_previlize['member_org']);
                            }
                            elseif(!empty($this->data['admins_all'])){
                                $send_to_admin_member_info = $this->info_model->get_member_info_by_id("Admins", $data_previlize['member_org']);
                            }
                            if($send_to_admin_member_info){
                                foreach($send_to_admin_member_info as $rows){
                                    if($rows->mobile_phone){ array_push($mobile_nos, $rows->mobile_phone); }
                                    array_push($admins_name, $rows->first_name." ".$rows->last_name);
                                }
                            }         
                            $total_receipant = sizeof($mobile_nos);
                            $sms_data['total_sms_sent'] = $sms_data['total_sms_sent']*$total_receipant;
                            if(count($this->data['total_sms_sent'])){
                                $sms_data['total_sms_sent'] += $this->data['total_sms_sent'][0]->total_sms;
                            }                    
                            $this->data['sms_data'] = $sms_data;
                            $this->data['mobile_nos'] = $mobile_nos;
                            $this->data['external_members_name'] = $external_members_name;
                            $this->data['members_name'] = $members_name;
                            $this->data['groups_name'] = $groups_name;
                            $this->data['admins_name'] = $admins_name; 
                            $this->data['dynamicView'] = 'pages/organization/communication_member/sms_summary';
                            $this->_commonPageLayout('frontend_viewer');
                            /*$success = $this->info_model->sms_insert($sms_data);   
                            if($success){
                                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_communicate_member_sms_success').'</div>');
                                if($this->data['send_option']=="send_now"){
                                    $response = member_communication_member_sms($mobile_nos , $sms_data);
                                }
                            }else{
                                $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('member_communicate_member_sms_failed').'</div>');  }
                        redirect('organization/info/communication_member_sms');*/
            }
        }else{ 
                $this->data['dynamicView'] = 'pages/organization/communication_member/sms_no_access'; 
                $this->_commonPageLayout('frontend_viewer');
        }        
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];      
}

 /**
 * Read SMS message : Communication with Member
 *
 *@access private
 *@return SMS message Details
 */
  function read_member_comm_member_sms_message($id) {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $mem_id = $this->session->userdata('mem_id');
        $member_org = $this->session->userdata('member_org');
        $member_group = $this->session->userdata('member_group'); 
        $mem_type = $this->session->userdata('mem_type'); 
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        $this->data['num_of_inbox_sms'] = $this->info_model->get_member_communicate_member_sms($flag="inbox", $mem_id, $member_group, $mem_type);
        $this->data['num_of_sent_sms'] = $this->info_model->get_member_communicate_member_sms($flag="sent", $mem_id, $member_group, $mem_type);
        $data = array( 'sms_read' => 1);
        $this->info_model->member_comm_member_sms_status_update($data, $id);
        $this->data['message'] = $this->info_model->get_sms_message_detail_by_id($id);
        $this->data['dynamicView'] = 'pages/organization/communication_member/sms_message_view';
        $this->_commonPageLayout('frontend_viewer');
}



/**
 * Communication with Member Via SMS: Show Sent SMS
 *
 *@access private
 *@return SMS Sent view
 */
    function communication_member_sms_sent() {
        $this->lang->load('common', $this->session->userdata('lang_file'));        
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        $this->data['activeSubTab'] = 'sent';  
        $member_group_id = "";
        $data_previlize = $this->check_member_type_previlize();
        $mem_id = $this->session->userdata('mem_id');
        $mem_type = $data_previlize['mem_type']; 
        $member_group = $this->info_model->get_mem_group_info_by_mem_id($mem_id); 
        if($member_group){
            $member_group_id = $member_group[0]->group_id;
        }               
        $this->data['num_of_inbox_sms'] = $this->info_model->get_member_communicate_member_sms($flag="inbox", $mem_id, $member_group_id, $mem_type);
        $this->data['num_of_sent_sms'] = $this->info_model->get_member_communicate_member_sms($flag="sent", $mem_id, $member_group_id, $mem_type);
               
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/communication_org_sms_sent");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->info_model->get_member_communicate_sent_sms("","", $mem_id)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_member_communicate_sent_sms($start, $perPage, $mem_id)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
        $this->data['dynamicView'] = 'pages/organization/communication_member/sms_sent';
        $this->_commonPageLayout('frontend_viewer');

}


/**
 * Delete SMS message : From DB: adminscentral Table: member_communicate_member_sms
 *
 *@access private
 *@return Success/Failure message
 */

function delete_member_sms(){    
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->load->library('form_validation');
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        $member_sms_id = $this->input->post('member_sms');     
        if(!isset($member_sms_id[0])){
                $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('label_no_sms_selection_delete').'</div>');
    }
    else{
            //$admin_sms_id = implode(",",$admin_sms_id);
            $success = $this->info_model->delete_member_sms($member_sms_id);
            if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('label_no_sms_delete_success').'</div>');
            }
        }
     redirect('organization/info/communication_member_sms');
}

/**
 * Communication with members within organization Via Letter
 *
 *@access private
 *@return Letter Communication Panel
 */
    function communication_member_letter() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'letter';
        $this->data['num_of_sent_letter'] = "";
        //$this->data['num_of_sent_letter'] = $this->info_model->get_admin_communicate_org_no_of_letter();
        
        
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/communication_member_letter");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = "";
        //$this->p_config['total_rows'] = $this->info_model->get_admin_communicate_all_letter()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = "";
        //$this->data['query1'] = $this->info_model->get_admin_communicate_all_letter($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
        $this->data['dynamicView'] = 'pages/organization/communication_member/letter_sent';
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Communication with members within organization Via Letter
 *
 *@access private
 *@return Create New Letter Form
 */
function write_new_letter(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'letter';
    $this->data['send_option'] = 'standard';
    $this->data['letter_write'] ="";
    $this->data['letter_title'] = '';
    $this->data['letter_text'] = '';
   
    $mem_id = $this->session->userdata('mem_id');
    $member_org = $this->session->userdata('member_org');
    $member_group = $this->session->userdata('member_group'); 
    $mem_type = $this->session->userdata('mem_type'); 
    $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
    $this->data['org_mem_external_contact'] = $this->info_model->get_org_mem_external_contact_by_org_id($member_org , $mem_id);
    $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $member_org);    
    $this->data['dynamicView'] = 'pages/organization/communication_member/write_letter';
    $this->_commonPageLayout('frontend_viewer');
}

/**
 * Communication with members within organization Via Letter
 *
 *@access private
 *@return Success/Failure Message
 */
function write_new_letter_process(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'letter';
    $receiver_addresses ="";
    $uploaded_letter ="";
    $letter_insert_id ="";    
    $this->data['letter_write'] ="";
    $this->data['letter_title'] = '';
    $this->data['letter_text'] = '';
    $this->data['letter_footer'] ="";
    $group_mem_id  = "";
    $send_to_member = "";       
    $send_to_group = "";
    $letter_send_to_member_group = "";
    $member_assigned_to_group = array();
    $mem_id = $this->session->userdata('mem_id');
    $member_org = $this->session->userdata('member_org');
    $member_group = $this->session->userdata('member_group'); 
    $mem_type = $this->session->userdata('mem_type'); 
    $this->data['query1'] = $this->info_model->get_logged_member_profile($mem_id); 
    $this->data['org_mem_external_contact'] = $this->info_model->get_org_mem_external_contact_by_org_id($member_org , $mem_id);
    $this->data['mem_assigned_group_info'] = $this->info_model->get_mem_group_member_info($mem_id, $member_org);    
    
    
    $this->load->library('form_validation');
    $this->data['send_option'] = $this->input->post('send_option');   
    $this->data['letter_sender'] = $this->input->post('letter_sender');   
    $this->data['letter_write'] = $this->input->post('letter_write');
    $this->data['letter_title'] = $this->input->post('letter_title');
    
    if($this->data['letter_write']=="create_letter"){
        $this->data['letter_text'] = $this->input->post('letter_text');
        $this->data['letter_footer'] = $this->input->post('letter_footer');
        
    }
    elseif($this->data['letter_write']=="upload_letter"){
         $uploaded_letter = $_FILES['letter_file']['name']; 
    }
    
    $this->data['select_external_recipants'] =  $this->input->post('select_external_recipants');
    $this->data['send_to_external_list'] = $this->input->post('send_to_external_list');   
    $this->data['send_to_group'] =  $this->input->post('send_to_group');
    $this->data['select_member'] =  $this->input->post('select_member');
    $this->data['send_to_member'] = $this->input->post('send_to_member');      
    $this->data['sending_date'] = $this->input->post('sending_date');
    $this->data['sending_hour_option'] = $this->input->post('sending_hour_option');
    $this->data['sending_minutes'] = $this->input->post('sending_minutes');
    $this->data['letter_type'] = $this->input->post('letter_type');
    
     if(empty($this->data['select_external_recipants']) && empty($this->data['send_to_group']) && empty($this->data['select_member']) ){
        $this->form_validation->set_rules('select_external_recipants', $this->lang->line('label_send_to'), 'trim|required');
     }
     if($this->data['select_external_recipants'] =="external_recipants_check"){                    
         if(!isset($this->data['send_to_external_list'][0])){   
                 $this->form_validation->set_rules('send_to_external_list', $this->lang->line('label_external_list'), 'trim|required');
        }
    }
    if($this->data['select_member']){             
        if(!isset($this->data['send_to_member'][0])){   
            $this->form_validation->set_rules('send_to_member', $this->lang->line('label_select_memebr'), 'trim|required');
        }
    }

    if($this->data['send_option']=="send_later"){
        $this->form_validation->set_rules('sending_date', $this->lang->line('label_select_date'), 'trim|required');
        $this->form_validation->set_rules('sending_hour_option', $this->lang->line('label_time'), 'trim|required');
    }else{$letter_data['sending_time'] = $this->data['send_option']; }
    
    //////////////////////////////////////////////////////////////////////////////////////////////
        
        $this->form_validation->set_rules('letter_title', $this->lang->line('label_title'), 'trim|required');

        if($this->data['letter_write']=="create_letter"){
            $this->form_validation->set_rules('letter_text', $this->lang->line('label_text'), 'trim|required');
        }
        if((!$uploaded_letter && $this->data['letter_write']=="upload_letter")){
                $this->form_validation->set_rules('letter_file', $this->lang->line('label_upload'), 'trim|required');
        }

        if ($this->form_validation->run() == FALSE) {            
            $this->data['dynamicView'] = 'pages/organization/communication_member/write_letter';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                        $letter_data['sender_id'] = $mem_id;
                        $letter_data['org_id'] = $member_org;
                        $letter_data['sender_name'] = $this->data['letter_sender'];
                        $letter_data['letter_title'] = $this->data['letter_title'];    
                        $letter_data['letter_text'] = $this->data['letter_text'];    
                        $letter_data['letter_footer'] = $this->data['letter_footer'];                            
                        $letter_data['letter_type'] = $this->data['letter_type'];                            
                        $letter_data['add_date'] = date("Y-m-d H:i:s");   
                        if($this->data['sending_date']) {
                            $sending_date = explode("-", $this->data['sending_date']);
                            $letter_data['sending_time'] = mktime($this->data['sending_hour_option'],$this->data['sending_minutes'],0, $sending_date[1],  $sending_date[2], $sending_date[0]);
                        }   

                    /////////////////////////////////////////////////////////
                    if($this->data['send_to_external_list']){
                        $send_to_external_list = implode(",",$this->data['send_to_external_list']); 
                        $letter_data['send_to_external_list'] = ",".$send_to_external_list.",";                           
                    }
                    if(sizeof($this->data['send_to_member'])==1){
                        $send_to_member = $this->data['send_to_member'][0];
                    }elseif(sizeof($this->data['send_to_member'])>1){
                        $send_to_member = implode(",",array_unique($this->data['send_to_member']));                
                    }                                        
                    if($send_to_member){
                        $letter_send_to_member_group = $send_to_member;
                        $letter_data['send_to_member'] =  ",".$send_to_member.",";
                    }       
            
                    if(sizeof($this->data['send_to_group'])==1){    
                        $send_to_group = $this->data['send_to_group'][0];
                    }elseif(sizeof($this->data['send_to_group'])>1){      
                        $send_to_group = implode(",",$this->data['send_to_group']);
                    }
                    if($send_to_group){ 
                        $letter_data['send_to_group'] =  ",".$send_to_group.",";
                        $mem_assigned_to_group = $this->info_model->get_members_assigned_to_group($send_to_group);
                        if($mem_assigned_to_group){                                
                            foreach($mem_assigned_to_group as $group_mem){
                                $group_mem_id .= ltrim ($group_mem->assigned_mem_id,',');
                            }
                        }
                    }
                    if($group_mem_id ){
                        $group_mem_id = ltrim ($group_mem_id,',');
                        $group_mem_id = rtrim ($group_mem_id,',');
                        //$member_assigned_to_group = array_unique(explode(",",$group_mem_id));
                        $letter_send_to_member_group = $group_mem_id;
                    }
                    if($send_to_member && $send_to_group){
                        $letter_send_to_member_group = $send_to_member.",".$letter_send_to_member_group;                        
                    }
                    if($letter_send_to_member_group){$letter_send_to_member_group = implode(",",array_unique(explode(",",$letter_send_to_member_group)));}
                   
                    $letter_insert_id = $this->info_model->letter_insert($letter_data);       
                    if($letter_insert_id){     
                        $this->make_member_commnicate_member_letter($letter_data,$letter_insert_id,$letter_send_to_member_group,$this->data['letter_write']);                           
                    }                                     
                    if($letter_insert_id && $uploaded_letter){       
                        $mkdirpath = "./member_letter/";
                        $file_type1 = explode(".",$uploaded_letter);
                        $extension = strtolower($file_type1[count($file_type1)-1]);
                        if($extension=='doc' || $extension=='docx' || $extension=='pdf'){
                            $temp=$mkdirpath;
                            $tmp=$_FILES['letter_file']['tmp_name'];
                            $uploaded_letter = "letter_".$letter_data['letter_title']."_".$letter_insert_id.".".$extension;
                            $temp=$temp.basename($uploaded_letter);
                            move_uploaded_file($tmp,$temp);
                            $file_uploaded_success = TRUE;
                        }
                    }
                    if($letter_insert_id){    
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('member_communicate_member_letter_success').'</div>');
                    }else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('member_communicate_member_letter_failed').'</div>');
                        }
                    redirect('organization/info/communication_member_letter');
                }
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];   
   
}

/**
 * Make member_communicate_member : letter pdf
 *
 *@Param $letter_data which contains letter Info , $letter_id which conatins Letter_id AND $letter_send_to_member_group Which indicates all member_id including group member AND $letter_write Which indicates Create/Upload letter
 *@access Private
 *@return letter as PDF
 */ 
function make_member_commnicate_member_letter($letter_data,$letter_id,$letter_send_to_member_group, $letter_write){   
        include("MPDF/mpdf.php");
        if($letter_write!="upload_letter"){        
            include_once 'MPDF/make_member_commnicate_member_letter.php';
        }
        include_once 'MPDF/make_member_commnicate_member_letter_address.php';
}
/**
 * View External Contact list
 *
 *@access Private
 *@return External Contact list
 */ 
public function communication_external_contact(){
	    $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'external_contact';
        $data_previlize = $this->check_member_type_previlize();
        $this->data['external_contact_list'] = $this->info_model->get_all_external_contact_by_org_member($data_previlize['member_org'], $this->session->userdata('mem_id'));   
        $this->data['dynamicView'] = 'pages/organization/communication_member/external_contact_list';
		$this->_commonPageLayout('frontend_viewer');
}


/**
 * Load External Contact Create Form
 *
 *@access Private
 *@return External Contact Create Form
 */ 
public function create_external_contact(){
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'external_contact';
        $data_previlize = $this->check_member_type_previlize();
        //$data_previlize = $this->check_member_type_previlize();        
        //if($this->session->userdata('mem_type')=="Admin" || $data_previlize['members_c_group']) {        
        $this->data['dynamicView'] = 'pages/organization/communication_member/external_contact_add';
        /*}
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }*/
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');   
}


/**
 * External Contact Create Process
 *
 *@access Private
 *@return Success/Failure Message
 */ 
public function create_external_contact_process(){
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'external_contact';
        $ext_contact_name = $this->input->post('ext_contact_name');
        $ext_contact_cell = $this->input->post('ext_contact_cell');
        $ext_contact_email = $this->input->post('ext_contact_email');
        $ext_contact_address = $this->input->post('ext_contact_address'); 
        $data_previlize = $this->check_member_type_previlize();        
        //if($this->session->userdata('mem_type')=="Admin" || $data_previlize['members_c_group']) {        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ext_contact_name', $this->lang->line('label_external_contact_name'), 'trim|required|xss_clean');
              
        if($ext_contact_cell=="" && $ext_contact_email=="" && strlen($ext_contact_address)<=1){
            $this->form_validation->set_rules('ext_contact_cell', $this->lang->line('label_external_contact_cell_no') , 'trim|required|xss_clean');
            $this->form_validation->set_rules('ext_contact_email', $this->lang->line('label_external_contact_email') , 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('ext_contact_address', $this->lang->line('label_external_contact_address') , 'trim|required|xss_clean');
        }
        if($ext_contact_email){
            $this->form_validation->set_rules('ext_contact_email', $this->lang->line('label_external_contact_email') , 'trim|required|valid_email|xss_clean');
       }

        
         if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/organization/communication_member/external_contact_add';
        } 
       else {    
                    $data = array(
                    'ext_contact_name' => $ext_contact_name,
                    'ext_contact_cell' => $ext_contact_cell,
                    'ext_contact_email' =>  $ext_contact_email,
                    'ext_contact_address' => $ext_contact_address,
                    'org_id' => $data_previlize['member_org'],
                    'member_id' => $this->session->userdata('mem_id'),
                    'add_date' => date("Y-m-d H:i:s")
                    );
                    //echo "<pre>";print_r($data);die();
                    $contact_id = $this->info_model->org_mem_external_contact_insert($data);
                    if($contact_id){
                            $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('external_contact_created_successful').'</div>');
                    }else{
                            $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('external_contact_created_failed').'</div>');
                    }
                    redirect('organization/info/communication_external_contact');
            }
        /*}
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }*/
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');   
}


/**
 * Load External Contact Edit Form
 *
 *@Param ext_contact_id
 *@access Private
 *@return External Contact Edit Form
 */ 
public function edit_external_contact($ext_contact_id){
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'external_contact';
        //$data_previlize = $this->check_member_type_previlize();        
        //if($this->session->userdata('mem_type')=="Admin" || $data_previlize['members_c_group']) {        
         $this->data['external_contact_by_id'] = $this->info_model->get_external_contact_by_id($ext_contact_id);   
         $this->data['dynamicView'] = 'pages/organization/communication_member/external_contact_edit';
        /*}
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }*/
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');   
}



/**
 * External Contact Edit Process
 *
 *@access Private
 *@return Success/Failure Message
 */ 
public function edit_external_contact_process(){
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'external_contact';
        $ext_contact_id = $this->input->post('ext_contact_id');
        $ext_contact_name = $this->input->post('ext_contact_name');
        $ext_contact_cell = $this->input->post('ext_contact_cell');
        $ext_contact_email = $this->input->post('ext_contact_email');
        $ext_contact_address = $this->input->post('ext_contact_address'); 
        //$data_previlize = $this->check_member_type_previlize();        
        //if($this->session->userdata('mem_type')=="Admin" || $data_previlize['members_c_group']) {        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ext_contact_name', $this->lang->line('label_external_contact_name'), 'trim|required|xss_clean');
              
        if($ext_contact_cell=="" && $ext_contact_email=="" && strlen($ext_contact_address)<=1){
            $this->form_validation->set_rules('ext_contact_cell', $this->lang->line('label_external_contact_cell_no') , 'trim|required|xss_clean');
            $this->form_validation->set_rules('ext_contact_email', $this->lang->line('label_external_contact_email') , 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('ext_contact_address', $this->lang->line('label_external_contact_address') , 'trim|required|xss_clean');
        }
        if($ext_contact_email){
            $this->form_validation->set_rules('ext_contact_email', $this->lang->line('label_external_contact_email') , 'trim|required|valid_email|xss_clean');
       }

        
         if ($this->form_validation->run() == FALSE) {
                $this->data['external_contact_by_id'] = $this->info_model->get_external_contact_by_id($ext_contact_id);  
                $this->data['dynamicView'] = 'pages/organization/communication_member/external_contact_edit';
        } 
       else {    
                    $data = array(
                    'ext_contact_name' => $ext_contact_name,
                    'ext_contact_cell' => $ext_contact_cell,
                    'ext_contact_email' =>  $ext_contact_email,
                    'ext_contact_address' => $ext_contact_address                   
                    );
                    //echo "<pre>";print_r($data);die();
                    $update_success = $this->info_model->org_mem_external_contact_update($data, $ext_contact_id);
                    if($update_success){
                            $this->session->set_flashdata('message','<div id="message1">'.$this->lang->line('external_contact_updated_successful').'</div>');
                    }else{
                            $this->session->set_flashdata('message','<div id="error_message">'.$this->lang->line('external_contact_update_failed').'</div>');
                    }
                    redirect('organization/info/communication_external_contact');
            }
        /*}
        else{
            $this->data['dynamicView'] = 'pages/organization/members/member_groups_no_access';
        }*/
        //$data_mem_type['mem_type'] = $this->session->userdata('mem_type');
        //$this->load->vars($data_previlize);	   
        //$this->load->vars($data_mem_type);	
        $this->_commonPageLayout('frontend_viewer');   
}


/**
 * Delete External contact by $ext_contact_id
 *
 *@access Private
 *@return Success/Failure Message
 */ 
   public function delete_external_contact($ext_contact_id=NULL) {
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'external_contact';
        //$ext_contact_id = $this->input->post('ext_contact_id');
        $success = $this->info_model->delete_external_contact($ext_contact_id);
        if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('external_contact_deleted_successful').'</div>');
        }else{ $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('external_contact_delete_failed').'</div>');}
        
        redirect('organization/info/communication_external_contact');
      
}
/**
 * Log Out from System By clicking on logout link
 *
 *@access private
 *@return Success/Failure
 */
  function logout() {
        $this->session->sess_destroy();
        //$this->session->unset_userdata('uid');
        redirect('');
    }
    protected   function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/site_top_logo_org', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_menu_org', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}