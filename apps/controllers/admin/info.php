<?php

include_once 'BaseController.php';
include_once 'sms.php';
include_once 'payment_method/CreateRecurringPaymentsProfile.php';
include_once 'payment_method/GetRecurringPaymentsProfileDetails.php';

class info extends BaseController {

    function info() {
       parent::__construct();
       $this->load->helper('creditcard');
       $this->load->model('admin/info_model');
       if ($this->session->userdata('uid') == "") {
			redirect('admin');
        }
        else if($this->session->userdata('user_type_id')!=0){
           $admin_user_previlize_data = $this->info_model->check_admin_user_previlize($this->session->userdata('user_type_id'));        
           if(count($admin_user_previlize_data)){
               foreach($admin_user_previlize_data as $rows){
                            $data_previlize = array(
                                'order_view_letters' => $rows->order_view_letters,
                                'order_deliver_letters' => $rows->order_deliver_letters,
                                'order_archieve_letters' => $rows->order_archieve_letters,
                                'order_view_new_customer' => $rows->order_view_new_customer,
                                'order_approve_new_customer' => $rows->order_approve_new_customer,
                                'order_deny_new_customer' => $rows->order_deny_new_customer,
                                'order_view_package_order' => $rows->order_view_package_order,
                                'order_approve_package_order' => $rows->order_approve_package_order,
                                'order_deny_package_order' => $rows->order_deny_package_order,
                                'configuration_access' => $rows->configuration_access,
                                'customer_view_registered_customer' => $rows->customer_view_registered_customer,
                                'customer_create_new_customer' => $rows->customer_create_new_customer,
                                'customer_view_customer_details' => $rows->customer_view_customer_details,
                                'customer_edit_customer_details' => $rows->customer_edit_customer_details,
                                'customer_view_bank_details' => $rows->customer_view_bank_details,
                                'customer_restriction_on_sms_letter' => $rows->customer_restriction_on_sms_letter,
                                'customer_activate_deactivate_customer' => $rows->customer_activate_deactivate_customer,
                                'customer_previlization_settings' => $rows->customer_previlization_settings,
                                'billing_view_billing' => $rows->billing_view_billing,
                                'billing_edit_invoice' => $rows->billing_edit_invoice,
                                'billing_view_invoice_receipt' => $rows->billing_view_invoice_receipt,
                                'billing_send_invoice_receipt' => $rows->billing_send_invoice_receipt,
                                'billing_send_reminder' => $rows->billing_send_reminder,
                                'billing_change_paid_unpaid_status' => $rows->billing_change_paid_unpaid_status,
                                'users_view_users' => $rows->users_view_users,
                                'users_edit_users' => $rows->users_edit_users,
                                'users_delete_users' => $rows->users_delete_users,
                                'users_create_new_users' => $rows->users_create_new_users,
                                'users_block_unblock_user' => $rows->users_block_unblock_user,
                                'user_types_view_user_types' => $rows->user_types_view_user_types,
                                'user_types_edit_user_types' => $rows->user_types_edit_user_types,
                                'user_types_delete_user_types' => $rows->user_types_delete_user_types,
                                'user_types_previlization_settings' => $rows->user_types_previlization_settings,
                                'user_types_create_new_user_types' => $rows->user_types_create_new_user_types,
                                'communication_email_view_inbox' => $rows->communication_email_view_inbox,
                                'communication_email_compose_new' => $rows->communication_email_compose_new,
                                'communication_email_view_sent' => $rows->communication_email_view_sent,
                                'communication_sms_view_inbox' => $rows->communication_sms_view_inbox,
                                'communication_sms_write_new' => $rows->communication_sms_write_new,
                                'communication_sms_view_sent' => $rows->communication_sms_view_sent,
                                'letter_write_new' => $rows->letter_write_new,
                                'letter_view_sent' => $rows->letter_view_sent,
                                'tracking_access' => $rows->tracking_access
                    );
                }
            }
        }
        
        else if($this->session->userdata('user_type_id')==0){
            $data_previlize = array(
                                'order_view_letters' => 1,
                                'order_deliver_letters' => 1,
                                'order_archieve_letters' => 1,
                                'order_view_new_customer' => 1,
                                'order_approve_new_customer' => 1,
                                'order_deny_new_customer' => 1,                                
                                'order_view_package_order' => 1,
                                'order_approve_package_order' => 1,
                                'order_deny_package_order' => 1,                                
                                'configuration_access' => 1,
                                'customer_view_registered_customer' => 1,
                                'customer_create_new_customer' => 1,
                                'customer_view_customer_details' => 1,
                                'customer_edit_customer_details' => 1,
                                'customer_view_bank_details' => 1,
                                'customer_restriction_on_sms_letter' => 1,
                                'customer_activate_deactivate_customer' => 1,
                                'customer_previlization_settings' => 1,
                                'billing_view_billing' => 1,
                                'billing_edit_invoice' => 1,
                                'billing_view_invoice_receipt' => 1,
                                'billing_send_invoice_receipt' => 1,
                                'billing_send_reminder' => 1,
                                'billing_change_paid_unpaid_status' => 1,
                                'users_view_users' => 1,
                                'users_edit_users' => 1,
                                'users_delete_users' => 1,
                                'users_create_new_users' => 1,
                                'users_block_unblock_user' => 1,
                                'user_types_view_user_types' => 1,
                                'user_types_edit_user_types' => 1,
                                'user_types_delete_user_types' => 1,
                                'user_types_previlization_settings' => 1,
                                'user_types_create_new_user_types' => 1,
                                'communication_email_view_inbox' => 1,
                                'communication_email_compose_new' => 1,
                                'communication_email_view_sent' => 1,
                                'communication_sms_view_inbox' => 1,
                                'communication_sms_write_new' => 1,
                                'communication_sms_view_sent' => 1,
                                'letter_write_new' => 1,
                                'letter_view_sent' => 1,
                                'tracking_access' => 1
                    );
        }
        
        $this->load->vars($data_previlize);	   
    }               

/**
 *Load currency  add Form
 *
 *@access public
 *@return currency  add Form
 */
    function add_currency($start=0) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'currency';
        $this->data['dynamicView'] = 'pages/admin/currency/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

 /**
 * insert currency data into DB:adminscentral, Table: currency
 *
 *@access public
 *@return Success/Error Message
 */ 
    function added_currency($start=0) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'currency';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('currency_name', $this->lang->line('label_currency_name'), 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/currency/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $curr_name = ucfirst($this->input->post('currency_name'));
            $this->data['currency_name'] = $this->info_model->get_existing_currency($curr_name);
            if (count($this->data['currency_name'])) {
                $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('currency_exists_msg').'</div>');
                redirect('admin/info/add_currency');
            } else {

                $data = array(
                    'currency_name' => ucfirst($this->input->post('currency_name')),
                );
                $this->info_model->currency_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('currency_add_success').'</div>');
                redirect('admin/info/currency');
            }
        }
    }

    //edit area
    function pzone_edit($id=NULL) {
        if ($id != NULL) {

            $this->load->model('admin/info_model');
            $query = $this->info_model->get_zone($id);
            $this->data['eid']['value'] = $query['id'];
            $this->data['ename']['value'] = $query['zone'];
            $this->data['dynamicView'] = 'pages/admin/zone/edit';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $this->load->model('admin/info_model');
            $profile_data = array(
                'zone' => ucfirst($this->input->post('zone')),
            );
            $this->session->set_flashdata('message1', '<div id="message">Area Updated Successfully.</div>');
            $this->info_model->zone_update($profile_data);
            redirect('admin/info/view_zone', 'location', 301);
        }
    }

    function check_currency($currency, $id1) {   
        
       $result = $this->dx_auth->is_currency_available($currency, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_currency', $this->lang->line('currency_exists_msg'));
        }

        return $result;
    }

    function currency_edit($id=NULL) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'currency';
        if ($id != NULL) {
            $this->data['record'] = $this->info_model->get_currency($id);
            $this->data['dynamicView'] = 'pages/admin/currency/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            
            //$this->form_validation->set_rules('currency_name', $this->lang->line('label_currency_name'), 'trim|required');

            $val->set_rules('currency_name', $this->lang->line('currency_name'), 'trim|required|xss_clean|callback_check_currency[' . $this->input->post("id") . ']');
            //  $val->set_rules('zone', 'Area', 'trim|required|xss_clean|callback_check_zone');
            if ($val->run()) {
                $currency_data = array(
                    'currency_name' => ucfirst($this->input->post('currency_name')),
                );
                $this->info_model->currency_update($currency_data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('currency_update_success').'</div>');
                redirect('admin/info/currency', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function org($org_category, $id1) {
        // echo  $org_type;
        // echo $id;die();
        $result = $this->dx_auth->is_org_category_available($org_category, $id1);
        if (!$result) {
            $this->form_validation->set_message('org', $this->lang->line('organization_category_exists'));
        }

        return $result;
    }

    function org_category_edit($id=NULL) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'org_category';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_org_category($id);
            $this->data['dynamicView'] = 'pages/admin/org_category/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('org_category', $this->lang->line('label_organization_category'), 'trim|required|xss_clean|callback_org[' . $this->input->post("id") . ']');
            if ($val->run()) {
                $data = array(
                    'category_name' => ucfirst($this->input->post('org_category'))
                );
                $this->info_model->org_category_update($data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('organization_category_update_success').'</div>');
                redirect('admin/info/org_category', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

 /**
 * Delete currency data by currency_id From DB:adminscentral, Table: currency
 *
 *@Param id which contains currency_id
 *@access public
 *@return Success/Error Message
 */
    function currency_delete($id = NULL) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $success = FALSE;
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'currency';
        $success = $this->info_model->delete_currency($id);
        if($success){
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('currency_delete_success').'</div>');
			}
        redirect('admin/info/currency', 'location', 301);
    }

    function currency() {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'currency';

        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/currency");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->currency()->num_rows();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['currency_data'] = $this->info_model->currency($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/admin/currency/show';
        $this->_commonPageLayout('frontend_viewer');
    }

//end area creation
//start package Creation
    function add_package($start=0) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'packages';      
        $form_data = array(                    
                    'package_name' => "",
                    'no_of_member' => "",
                    'amount' => "",
                    'duration' => "",
                    'billing_module_cost' => "",
                    'letter_module_cost' => "",
                    'sms_module_cost' => "",
                    'member_fee_module_cost' => "",
                    'full_package_cost' => "",
                    'per_sms_cost' => "",
                    'per_letter_cost' => "",
                    'allowed_sms_per_month' => "",
                    'allowed_letter_per_month' => "",
                    'admin_cost' => "",
                    'per_invoice_cost' => "",
                    'currency_id' => "",                 
                    'active' => ""                    
       );           
        $this->load->vars($form_data);             
        $data['global_settings_data'] = $this->info_model->get_global_settings();
        $data_currency['currency_data'] = $this->info_model->get_currency($id="");
        $this->load->vars($data_currency);        
        $this->load->vars($data);	           
        $this->data['dynamicView'] = 'pages/admin/package/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_package($start=0) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'packages';
        $data['global_settings_data'] = $this->info_model->get_global_settings();
        $data_currency['currency_data'] = $this->info_model->get_currency($id="");                 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('package_name', $this->lang->line('label_package_name'), 'trim|required');
        $this->form_validation->set_rules('no_of_member', $this->lang->line('label_no_of_member'), 'trim|required|is_natural|xss_clean');
        $this->form_validation->set_rules('duration', $this->lang->line('label_duration'), 'trim|required|is_natural|xss_clean');
        //$this->form_validation->set_rules('amount', $this->lang->line('label_subscription_fee'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('billing_module_cost', $this->lang->line('label_billing_module_cost'), 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('letter_module_cost', $this->lang->line('label_letter_module_cost'), 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('sms_module_cost', $this->lang->line('label_sms_module_cost'), 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('member_fee_module_cost', $this->lang->line('label_member_fee_module_cost'), 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('full_package_cost', $this->lang->line('label_full_module_cost'), 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('per_sms_cost', $this->lang->line('sms_cost_err_msg'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('per_letter_cost', $this->lang->line('letter_cost_err_msg'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('allowed_sms_per_month', $this->lang->line('sms_per_month_err_msg'), 'trim|required|is_natural|xss_clean');
        $this->form_validation->set_rules('allowed_letter_per_month', $this->lang->line('letter_per_month_err_msg'), 'trim|required|is_natural|xss_clean');
        $this->form_validation->set_rules('per_invoice_cost', $this->lang->line('invoice_cost'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('admin_cost', $this->lang->line('label_admin_cost'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('currency_id', $this->lang->line('label_currency'), 'trim|required|xss_clean');
        $to_date = date("Y-m-d H:i:s"); 
        $form_data = array(                    
                    'package_name' => ucfirst($this->input->post('package_name')),
                    'no_of_member' => $this->input->post('no_of_member'),
                    'duration' => $this->input->post('duration'),
                    'billing_module_cost' => $this->input->post('billing_module_cost'),
                    'letter_module_cost' => $this->input->post('letter_module_cost'),
                    'sms_module_cost' => $this->input->post('sms_module_cost'),
                    'member_fee_module_cost' => $this->input->post('member_fee_module_cost'),
                    'full_package_cost' => $this->input->post('full_package_cost'),
                    'per_sms_cost' => $this->input->post('per_sms_cost'),
                    'per_letter_cost' => $this->input->post('per_letter_cost'),
                    'allowed_sms_per_month' => $this->input->post('allowed_sms_per_month'),
                    'allowed_letter_per_month' => $this->input->post('allowed_letter_per_month'),
                    'per_invoice_cost' => $this->input->post('per_invoice_cost'),
                    'admin_cost' => $this->input->post('admin_cost'),
                    'currency_id' => $this->input->post('currency_id'),
                    'active' => $this->input->post('active'),
                    'add_date' =>$to_date
       );     
     
        if ($this->form_validation->run() == FALSE) {
            $data['global_settings_data'] = $this->info_model->get_global_settings();
            $data_currency['currency_data'] = $this->info_model->get_currency($id="");
            $this->load->vars($data_currency);        
            $this->load->vars($data);	          
            $this->load->vars($form_data);    
            $this->data['dynamicView'] = 'pages/admin/package/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $p_name = ucfirst($this->input->post('package_name'));
            $this->data['p_info'] = $this->info_model->get_existing_package($p_name,$id="");
            if (count($this->data['p_info'])) {
                $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('package_exists_error_msg').'</div>');
                redirect('admin/info/add_package');
            } else {                
                $this->info_model->package_insert($form_data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('package_creation_success').'</div>');
                redirect('admin/info/packages');
            }
    }
    
    }

    function packages() {
        
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'packages';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/view_package");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_package()->num_rows();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_package($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/admin/package/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function check_package_name($package_name, $id1) {

        $result = $this->dx_auth->is_package_name_available($package_name, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_package_name', 'Package name  exists. Please choose another one.');
        }

        return $result;
    }

    function package_edit($id=NULL) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $data_currency['currency_data'] = $this->info_model->get_currency($cid="");
        $this->load->vars($data_currency);        
        //$this->load->vars($data);	 
        
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'packages';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_package($id);
            $this->data['dynamicView'] = 'pages/admin/package/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $this->form_validation->set_rules('package_name', $this->lang->line('label_package_name'), 'trim|required');
            $this->form_validation->set_rules('no_of_member', $this->lang->line('label_no_of_member'), 'trim|required|is_natural|xss_clean');
            $this->form_validation->set_rules('duration', $this->lang->line('label_duration'), 'trim|required|is_natural|xss_clean');
            //$this->form_validation->set_rules('amount', $this->lang->line('label_subscription_fee'), 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('billing_module_cost', $this->lang->line('label_billing_module_cost'), 'trim|numeric|xss_clean');
            $this->form_validation->set_rules('letter_module_cost', $this->lang->line('label_letter_module_cost'), 'trim|numeric|xss_clean');
            $this->form_validation->set_rules('sms_module_cost', $this->lang->line('label_sms_module_cost'), 'trim|numeric|xss_clean');
            $this->form_validation->set_rules('member_fee_module_cost', $this->lang->line('label_member_fee_module_cost'), 'trim|numeric|xss_clean');
            $this->form_validation->set_rules('full_package_cost', $this->lang->line('label_full_module_cost'), 'trim|numeric|xss_clean');
            $this->form_validation->set_rules('per_sms_cost', $this->lang->line('sms_cost_err_msg'), 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('per_letter_cost', $this->lang->line('letter_cost_err_msg'), 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('allowed_sms_per_month', $this->lang->line('sms_per_month_err_msg'), 'trim|required|is_natural|xss_clean');
            $this->form_validation->set_rules('allowed_letter_per_month', $this->lang->line('letter_per_month_err_msg'), 'trim|required|is_natural|xss_clean');
            $this->form_validation->set_rules('per_invoice_cost', $this->lang->line('invoice_cost'), 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('admin_cost', $this->lang->line('label_admin_cost'), 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('currency_id', $this->lang->line('label_currency'), 'trim|required|xss_clean');
            if ($val->run()) {
                 $form_data = array(                    
                    'package_name' => ucfirst($this->input->post('package_name')),
                    'no_of_member' => $this->input->post('no_of_member'),
                    'duration' => $this->input->post('duration'),
                    'billing_module_cost' => $this->input->post('billing_module_cost'),
                    'letter_module_cost' => $this->input->post('letter_module_cost'),
                    'sms_module_cost' => $this->input->post('sms_module_cost'),
                    'member_fee_module_cost' => $this->input->post('member_fee_module_cost'),
                    'full_package_cost' => $this->input->post('full_package_cost'),
                    'per_sms_cost' => $this->input->post('per_sms_cost'),
                    'per_letter_cost' => $this->input->post('per_letter_cost'),
                    'allowed_sms_per_month' => $this->input->post('allowed_sms_per_month'),
                    'allowed_letter_per_month' => $this->input->post('allowed_letter_per_month'),
                    'per_invoice_cost' => $this->input->post('per_invoice_cost'),
                    'admin_cost' => $this->input->post('admin_cost'),
                    'currency_id' => $this->input->post('currency_id'),
                    'active' => $this->input->post('active'),
                    'add_date' =>$to_date
                );     
                $this->data['p_info'] = $this->info_model->get_existing_package($this->input->post('package_name'),$this->input->post('id'));
                if (count($this->data['p_info'])) {
                    $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('package_exists_error_msg').'</div>');
                    redirect('admin/info/package_edit/'.$id);
                } 
                else{
                    $this->info_model->package_update($form_data, $id);
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('package_update_success').'</div>');
                    redirect('admin/info/packages', 'location', 301);
                }
                
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function package_delete($id = NULL) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'packages';
        $success = FALSE;
        $success = $this->info_model->delete_package($id);           
         if($success){
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('package_delete_success').'</div>');
			}
        redirect('admin/info/packages', 'location', 301);
}

function package_make_inactive($package_id){
    $this->lang->load('configuration', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'configuration';
    $this->data['activeTab'] = 'packages';
    $data_package['active'] = 0;
    $package_update = $this->info_model->package_update($data_package, $package_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('package_update_success').'</div>');
    redirect('admin/info/packages', 'location', 301);
}

function package_make_active($package_id){
    $this->lang->load('configuration', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'configuration';
    $this->data['activeTab'] = 'packages';
    $data_package['active'] = 1;
    $package_update = $this->info_model->package_update($data_package, $package_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('package_update_success').'</div>');
    redirect('admin/info/packages', 'location', 301);
}

//end package creation

//------------------------------TAHER 2012-08-08----------------------------------
 /**
 *Load global_settings Form
 *
 *@access public
 *@return global_settings Form
 */ 

    function global_settings($start=0) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'global_settings';
        $data['global_settings_data'] = $this->info_model->get_global_settings();        
        $this->load->vars($data);	
        $this->data['dynamicView'] = 'pages/admin/global_settings/entry';
        $this->_commonPageLayout('frontend_viewer');
}



 /**
 * insert global_settings data into DB:adminscentral, Table: global_settings
 *
 *@access public
 *@return Success/Error Message
 */
    function save_global_settings($start=0) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'global_settings';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('per_sms_cost', $this->lang->line('sms_cost_err_msg'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('per_letter_cost', $this->lang->line('letter_cost_err_msg'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('per_invoice_cost', $this->lang->line('invoice_cost_err_msg'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('allowed_sms_per_month', $this->lang->line('sms_per_month_err_msg'), 'trim|required|is_natural|xss_clean');
        $this->form_validation->set_rules('allowed_letter_per_month', $this->lang->line('letter_per_month_err_msg'), 'trim|required|is_natural|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $data['global_settings_data'] = $this->info_model->get_global_settings();
            $this->load->vars($data);	
            $this->data['dynamicView'] = 'pages/admin/global_settings/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {          
                $to_date = date("Y-m-d H:i:s"); 
                $data = array(
                    'per_sms_cost' => $this->input->post('per_sms_cost'),
                    'per_letter_cost' => $this->input->post('per_letter_cost'),
                    'per_invoice_cost' => $this->input->post('per_invoice_cost'),
                    'allowed_sms_per_month' => $this->input->post('allowed_sms_per_month'),
                    'allowed_letter_per_month' => $this->input->post('allowed_letter_per_month'),
                    'admin_cost' => $this->input->post('admin_cost'),
                    'add_date' => $to_date);
                    
                $this->info_model->update_global_settings($data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('global_settings_update_success').'</div>');
                redirect('admin/info/global_settings');
            
        }
    }

    function view_cost() {
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'view_cost';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/view_cost");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_cost()->num_rows();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_cost($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/admin/cost/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function cost_edit($id=NULL) {
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'view_cost';
        if ($id != NULL) {
            $this->data['record'] = $this->info_model->get_cost($id);
            $this->data['dynamicView'] = 'pages/admin/cost/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('package_name', 'Package Name', 'trim|required|xss_clean');
            $val->set_rules('sms_cost', 'Sms cost', 'trim|required|xss_clean');
            $val->set_rules('letter_cost', 'Letter Cost', 'trim|required|xss_clean');
            $val->set_rules('currency', 'Currency', 'trim|required|xss_clean');
            if ($val->run()) {
                $data = array(
                    'sms_cost' => $this->input->post('sms_cost'),
                    'letter_cost' => $this->input->post('letter_cost'),
                    'currency' => $this->input->post('currency')
                );
                $this->info_model->cost_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Cost Setting  Updated Successfully.</div>');
                redirect('admin/info/view_cost', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function cost_edit_global($id=NULL) {
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'view_cost';
        if ($id != NULL) {
            $this->data['record'] = $this->info_model->get_cost($id);
            $this->data['dynamicView'] = 'pages/admin/cost/edit_global';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('sms_cost', 'Sms cost', 'trim|required|xss_clean');
            $val->set_rules('letter_cost', 'Letter Cost', 'trim|required|xss_clean');
            $val->set_rules('currency', 'Currency', 'trim|required|xss_clean');
            if ($val->run()) {
                $data = array(
                    'sms_cost' => $this->input->post('sms_cost'),
                    'letter_cost' => $this->input->post('letter_cost'),
                    'currency' => $this->input->post('currency')
                );
                $this->info_model->cost_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Cost Setting  Updated Successfully.</div>');
                redirect('admin/info/view_cost', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function cost_delete($id = NULL) {
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'view_cost';
        $this->info_model->cost_delete($id);
        redirect('admin/info/view_cost', 'location', 301);
    }

//End cost setting

 /**
 * Communication with organization Via E-mail, SMS, Letter: Default: E-mail
 *
 *@access private
 *@return Communication Panel
 */

    function communication_org() {
        
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        $this->data['num_of_inbox_message'] = $this->info_model->get_admin_communicate_org_message($flag="inbox");
        $this->data['num_of_sent_message'] = $this->info_model->get_admin_communicate_org_message($flag="sent");
        
        
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/communication_org");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->info_model->get_admin_communicate_all_message()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_admin_communicate_all_message($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
               
        $this->data['dynamicView'] = 'pages/admin/communication_org/email_inbox';
        $this->_commonPageLayout('frontend_viewer');
    }

 /**
 * Communication with organization : Show Sent E-mail
 *
 *@access private
 *@return Sent E-mail View
 */

    function communication_org_email_sent() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        $this->data['num_of_inbox_message'] = $this->info_model->get_admin_communicate_org_message($flag="inbox");
        $this->data['num_of_sent_message'] = $this->info_model->get_admin_communicate_org_message($flag="sent");
        
        
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/communication_org");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->info_model->get_admin_communicate_sent_message()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_admin_communicate_sent_message($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
               
        $this->data['dynamicView'] = 'pages/admin/communication_org/email_sent';
        $this->_commonPageLayout('frontend_viewer');
    }

 /**
 * Read E-mail message : Communication with organization
 *
 *@Param $id which contains message id
 *@access private
 *@return E-mail message Details
 */

  function read_admin_comm_org_email_message($id) {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        $this->data['num_of_inbox_message'] = $this->info_model->get_admin_communicate_org_message($flag="inbox");
        $this->data['num_of_sent_message'] = $this->info_model->get_admin_communicate_org_message($flag="sent");
        $data = array( 'message_read' => 1);
        $this->info_model->admin_comm_org_email_status_update($data, $id);
        $this->data['message'] = $this->info_model->get_email_message_detail($id);
        $this->data['dynamicView'] = 'pages/admin/communication_org/email_message_view';
        $this->_commonPageLayout('frontend_viewer');
    }


/**
 * Read Contact Site admin messages
 *
 *@Param $id which contains contact id
 *@access private
 *@return Contact Site admin messages
 */

  function read_contact_site_admin_message($id) {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['num_of_inbox_message'] = $this->info_model->get_no_of_site_admin_contact_message();
        $data = array( 'message_read' => 1);
        $this->info_model->site_admin_contact_status_update($data, $id);
        $this->data['message'] = $this->info_model->get_contact_site_admin_message_detail($id);
        $this->data['dynamicView'] = 'pages/admin/contact_site_admin/contact_site_admin_message_view';
        $this->_commonPageLayout('frontend_viewer');
}

 /**
 * Communication with organization: Compose New Email
 *
 *@access private
 *@return Compose New Email Form
 */
function compose_new_email(){
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'email';
    $this->data['email_subject'] = "";
    $this->data['email_message'] = "";
    $this->data['file_upload_failed'] = "";
    $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
    $this->data['num_of_inbox_message'] = $this->info_model->get_admin_communicate_org_message($flag="inbox");
    $this->data['num_of_sent_message'] = $this->info_model->get_admin_communicate_org_message($flag="sent");
    $this->data['dynamicView'] = 'pages/admin/communication_org/email_compose';
    $this->_commonPageLayout('frontend_viewer');
}

 /**
 * Communication with organization: Compose New Email Process
 *
 *@access private
 *@return Success/Failure Message
 */

function compose_new_email_process(){

    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");    
    $this->load->library('form_validation');
    $this->data['file_upload_failed'] = "";
    $this->data['email_sender'] = $this->input->post('email_sender');
    $this->data['email_subject'] = $this->input->post('email_subject');
    $this->data['email_message'] = $this->input->post('email_message');
    $this->data['individual'] =  $this->input->post('individual');
    $this->data['organization'] =  $this->input->post('organization'); 
    $this->data['select_org'] =  $this->input->post('select_org');
    $this->data['all_org'] =  $this->input->post('all_org');    
    $file_uploaded_success = FALSE;
    
    if(empty($this->data['individual']) && empty($this->data['organization'])){
          $this->form_validation->set_rules('individual', $this->lang->line('label_send_to'), 'trim|required');
    }

    if($this->data['individual']){
             $this->form_validation->set_rules('email_addresses', $this->lang->line('email_addresses'), 'trim|required');
             $email_addresses =  $this->input->post('email_addresses');
             $email_addresses = explode(",",$email_addresses);
    }

    if($this->data['organization']){
        if(empty($this->data['select_org']) && empty($this->data['all_org'])){
            $this->form_validation->set_rules('select_org', $this->lang->line('label_email_to_org'), 'trim|required');
        }
        elseif($this->data['select_org']){
            $org_list = $this->input->post('org_list');              
            
           // if(sizeof($org_list)<=0){   
           if(!isset($org_list[0])){   
                  $this->form_validation->set_rules('select_each_org', $this->lang->line('label_select_org'), 'trim|required');
            }
        }
        
    }

    
    //////////////////////////////////////////////////////////////////////////////////////////////
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        
        $this->form_validation->set_rules('email_subject', $this->lang->line('label_subject'), 'trim|required');
        $this->form_validation->set_rules('email_message', $this->lang->line('label_message'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/communication_org/email_compose';
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
                    
                        $uploaded_dir = $comm_id."_".date("s");
                        $mkdirpath = "./uploads/admin_communication/attached_files/".$uploaded_dir."/";
                        mkdir($mkdirpath);
                        chmod($mkdirpath, 02755);                        
                        $email_data['sender_id'] = $this->session->userdata('uid');
                        $email_data['send_from'] = "Adminscentral";
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
                                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_file_type_not_supported').'</div>';
                                            $this->data['dynamicView'] = 'pages/admin/communication_org/email_compose';
                                            $this->_commonPageLayout('frontend_viewer');
                                        }
                            }  
                        }
                    
                    }else{
                                $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_max_file_upload_size').'</div>';
                                $this->data['dynamicView'] = 'pages/admin/communication_org/email_compose';
                                $this->_commonPageLayout('frontend_viewer');
                        }

                        if(!$file_uploaded_success){
                            rmdir($mkdirpath);
                            $email_data['uploaded_dir'] = "";
                        }
                    
                        if($this->data['individual']){
                            foreach($email_addresses as $key=> $value){
                                $email_data['receiver_email'] = $value;                                              
                                $this->info_model->email_insert($email_data);    
                                $this->admin_communicate_org_email_to_individual($email_data,$attachment_name,$attachedfile);
                            }
                        }
                    
                        elseif($this->data['all_org']){
                            foreach($this->data['active_org_list'] as $rows){                                
                                $email_data['receiver_id'] = $rows->org_id;      
                                $email_data['receiver_email'] = $rows->email;     
                                $this->info_model->email_insert($email_data);    
                            }
                        }
                       elseif($org_list){
                            foreach($org_list as $key => $value){     
                                $this->data['active_org_list'] = $this->info_model->get_registered_customer($value);
                                foreach($this->data['active_org_list'] as $rows){                                
                                    $email_data['receiver_id'] = $rows->org_id;      
                                    $email_data['receiver_email'] = $rows->email;     
                                    $this->info_model->email_insert($email_data);    
                                }
                            }
                        }
                        
                                            
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_communicate_org_email_success').'</div>');
                    redirect('admin/info/communication_org');
                }
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];   
   
}


 /**
 * Communication with organization:  Reply for email message
 *
 *@Param  $id Which contains communication_id
 *@access private
 *@return Reply for email message
 */
function reply_email_message($id){
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        $this->data['email_subject'] = "";
        $this->data['email_message'] = "";
        $this->data['file_upload_failed'] = "";
        $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
        $this->data['num_of_inbox_message'] = $this->info_model->get_admin_communicate_org_message($flag="inbox");
        $this->data['email_message_info'] = $this->info_model->get_email_message_detail_by_id($id);
        $this->data['dynamicView'] = 'pages/admin/communication_org/email_reply_view';
        $this->_commonPageLayout('frontend_viewer');
}


 /**
 * Communication with organization: Reply for email message Process
 *
 *@Param  $id Which contains communication_id
 *@access private
 *@return Success/Failure Message
 */
function reply_email_message_process(){

    $this->lang->load('common', $this->session->userdata('lang_file'));
    $communication_id = $this->input->post('communication_id');
    //////////////
    $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
    $this->data['num_of_inbox_message'] = $this->info_model->get_admin_communicate_org_message($flag="inbox");
    $this->data['email_message_info'] = $this->info_model->get_email_message_detail_by_id($communication_id);
    ////////////
    
    $receiver_id = $this->input->post('receiver_id');
    $reply_of = $this->input->post('reply_of');
    
    
    $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
    $this->data['org_info_by_receiver_id'] = $this->info_model->get_registered_customer($receiver_id);
       
    $this->load->library('form_validation');
    $this->data['file_upload_failed'] = "";
    $this->data['email_sender'] = $this->input->post('email_sender');
    $this->data['email_subject'] = $this->input->post('email_subject');
    $this->data['email_message'] = $this->input->post('email_message');
    $this->data['individual'] =  $this->input->post('individual');
    $this->data['organization'] =  $this->input->post('organization'); 
    $this->data['select_org'] =  $this->input->post('select_org');
    $this->data['all_org'] =  $this->input->post('all_org');
    
    $file_uploaded_success = FALSE;
    
    /*if(empty($this->data['individual']) && empty($this->data['organization'])){
          $this->form_validation->set_rules('individual', $this->lang->line('label_send_to'), 'trim|required');
    }*/

    if($this->data['individual']){
             $this->form_validation->set_rules('email_addresses', $this->lang->line('email_addresses'), 'trim|required');
             $email_addresses =  $this->input->post('email_addresses');
             $email_addresses = explode(",",$email_addresses);
    }

    if($this->data['organization']){
        if(empty($this->data['select_org']) && empty($this->data['all_org'])){
            $this->form_validation->set_rules('select_org', $this->lang->line('label_email_to_org'), 'trim|required');
        }
        elseif($this->data['select_org']){
            $org_list = $this->input->post('org_list');              
            
           // if(sizeof($org_list)<=0){   
           if(!isset($org_list[0])){   
                  $this->form_validation->set_rules('select_each_org', $this->lang->line('label_select_org'), 'trim|required');
            }
        }
        
    }

    
    //////////////////////////////////////////////////////////////////////////////////////////////
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        
        $this->form_validation->set_rules('email_subject', $this->lang->line('label_subject'), 'trim|required');
        $this->form_validation->set_rules('email_message', $this->lang->line('label_message'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/communication_org/email_reply_view';
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
                    
                        $uploaded_dir = $comm_id."_".date("s");
                        $mkdirpath = "./uploads/admin_communication/attached_files/".$uploaded_dir."/";
                        mkdir($mkdirpath);
                        chmod($mkdirpath, 02755);                        
                        $email_data['sender_id'] = $this->session->userdata('uid');
                        $email_data['receiver_id'] = $receiver_id;
                        $email_data['send_from'] = "Adminscentral";
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
                                            $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_file_type_not_supported').'</div>';
                                            $this->data['dynamicView'] = 'pages/admin/communication_org/email_compose';
                                            $this->_commonPageLayout('frontend_viewer');
                                        }
                            }  
                        }
                    
                    }else{
                                $this->data['file_upload_failed'] = '<div id="error_message">'.$this->lang->line('admin_communication_max_file_upload_size').'</div>';
                                $this->data['dynamicView'] = 'pages/admin/communication_org/email_compose';
                                $this->_commonPageLayout('frontend_viewer');
                        }

                        if(!$file_uploaded_success){
                            rmdir($mkdirpath);
                            $email_data['uploaded_dir'] = "";
                        }
                    
                        if(count($this->data['org_info_by_receiver_id'] )){
                                $email_data['receiver_email'] = $this->data['org_info_by_receiver_id'][0]->email;          
                        }
                        
                        $this->info_model->email_insert($email_data);    
                        if($this->data['individual']){
                            foreach($email_addresses as $key=> $value){
                                $email_data['receiver_email'] = $value;                                              
                                $this->info_model->email_insert($email_data);    
                                $this->admin_communicate_org_email_to_individual($email_data,$attachment_name,$attachedfile);
                            }
                        }
                    
                        elseif($this->data['all_org']){
                            foreach($this->data['active_org_list'] as $rows){                                
                                $email_data['receiver_id'] = $rows->org_id;      
                                $email_data['receiver_email'] = $rows->email;     
                                $this->info_model->email_insert($email_data);    
                            }
                        }
                       elseif($org_list){
                            foreach($org_list as $key => $value){     
                                $this->data['active_org_list'] = $this->info_model->get_registered_customer($value);
                                foreach($this->data['active_org_list'] as $rows){                                
                                    $email_data['receiver_id'] = $rows->org_id;      
                                    $email_data['receiver_email'] = $rows->email;     
                                    $this->info_model->email_insert($email_data);    
                                }
                            }
                        }
                        
                    
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_communicate_org_email_success').'</div>');
                    redirect('admin/info/communication_org');
                }
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];   
   
}


 /**
 * Communication with organization Via SMS
 *
 *@access private
 *@return SMS Inbox view
 */

    function communication_org_sms() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        $this->data['num_of_inbox_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="inbox");
        $this->data['num_of_sent_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="sent");
        
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/communication_org_sms");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->info_model->get_admin_communicate_all_sms()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_admin_communicate_all_sms($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
               
        $this->data['dynamicView'] = 'pages/admin/communication_org/sms_inbox';
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Communication with organization Via SMS: Show Sent SMS
 *
 *@access private
 *@return SMS Sent view
 */

    function communication_org_sms_sent() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        $this->data['num_of_inbox_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="inbox");
        $this->data['num_of_sent_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="sent");
        
        
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
        $this->p_config['total_rows'] = $this->info_model->get_admin_communicate_sent_sms()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_admin_communicate_sent_sms($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
               
        $this->data['dynamicView'] = 'pages/admin/communication_org/sms_sent';
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * Communication with organization: Compose New SMS
 *
 *@access private
 *@return Compose New SMS Form
 */
function compose_new_sms(){
    //echo $fak_expire_date = time() + (10 * 24 * 60 * 60);exit;
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['num_of_inbox_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="inbox");
    $this->data['num_of_sent_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="sent");
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'sms';
    $this->data['sms_content'] = "";
    $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
    $this->data['num_of_inbox_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="inbox");
    $this->data['dynamicView'] = 'pages/admin/communication_org/sms_compose';
    $this->_commonPageLayout('frontend_viewer');
}

 /**
 * Communication with organization: Compose New SMS Process
 *
 *@access private
 *@return Success/Failure Message
 */
function compose_new_sms_process(){
    $receiver_contact_no ="";
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
    $this->data['num_of_inbox_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="inbox");
    $this->data['logged_admin_user_info'] = $this->info_model->get_logged_admin_user_info($this->session->userdata('uid'));
    $this->data['total_sms_sent'] = $this->info_model->get_total_sms_sent_by_admin_id($this->session->userdata('uid'));
       
    $this->load->library('form_validation');
    
    $this->data['email_sender'] = $this->input->post('email_sender');    
    $this->data['sms_content'] = $this->input->post('sms_content');
    $this->data['individual'] =  $this->input->post('individual');
    $this->data['organization'] =  $this->input->post('organization'); 
    $this->data['select_org'] =  $this->input->post('select_org');
    $this->data['all_org'] =  $this->input->post('all_org');

    
    if(empty($this->data['individual']) && empty($this->data['organization'])){
          $this->form_validation->set_rules('individual', $this->lang->line('label_send_to'), 'trim|required');
    }

    if($this->data['individual']){
             $this->form_validation->set_rules('sms_no', $this->lang->line('label_sms_no'), 'trim|required');
             $sms_no =  $this->input->post('sms_no');
             $receiver_contact_no = $sms_no;
             $sms_no = explode(",",$sms_no);
}

    if($this->data['organization']){
        if(empty($this->data['select_org']) && empty($this->data['all_org'])){
            $this->form_validation->set_rules('select_org', $this->lang->line('label_email_to_org'), 'trim|required');
        }
        elseif($this->data['select_org']){
            $org_list = $this->input->post('org_list');              
            
           // if(sizeof($org_list)<=0){   
           if(!isset($org_list[0])){   
                  $this->form_validation->set_rules('select_each_org', $this->lang->line('label_select_org'), 'trim|required');
            }
        }
        
    }

    
    //////////////////////////////////////////////////////////////////////////////////////////////
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        
      
        $this->form_validation->set_rules('sms_content', $this->lang->line('label_sms'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/communication_org/sms_compose';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                        $count =0;
                        $sms_count =1;
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
                    
                        if(count($this->data['logged_admin_user_info'])){
                            $sms_data['sender_contact_no'] = $this->data['logged_admin_user_info'][0]->phone_no;
                        }
                        
                        
                        $sms_data['sender_id'] = $this->session->userdata('uid');
                        $sms_data['send_from'] = "Adminscentral";
                        $sms_data['sms_content'] = $this->data['sms_content'];    
                        $sms_data['add_date'] = date("Y-m-d H:i:s");   
                    /////////////////////////////////////////////////////////
                    
                        if($this->data['individual']){
                            $total_receipant = sizeof($sms_no);
                            $sms_data['total_sms_sent'] = $sms_data['total_sms_sent']*$total_receipant;
                            if(count($this->data['total_sms_sent'])){
                                $sms_data['total_sms_sent'] += $this->data['total_sms_sent'][0]->total_sms;
                            }
                            foreach($sms_no as $key=> $value){
                                $sms_data['receiver_contact_no'] = $value;                                              
                                $this->info_model->sms_insert($sms_data);    
                                //$this->admin_communicate_org_sms_to_individual($email_data,$attachment_name,$attachedfile);
                            }
                        }
                    
                        elseif($this->data['all_org']){
                            $total_receipant = sizeof($this->data['active_org_list']);
                            $sms_data['total_sms_sent'] = $sms_data['total_sms_sent']*$total_receipant;
                            if(count($this->data['total_sms_sent'])){
                                $sms_data['total_sms_sent'] += $this->data['total_sms_sent'][0]->total_sms;
                            }

                            foreach($this->data['active_org_list'] as $rows){                                
                                $sms_data['receiver_id'] = $rows->org_id;      
                                $sms_data['receiver_contact_no'] = $rows->phone_no;    
                                if($receiver_contact_no){
                                       $receiver_contact_no = $receiver_contact_no.",".$rows->phone_no;
                                }else{$receiver_contact_no = $rows->phone_no;}
                                $this->info_model->sms_insert($sms_data);    
                            }
                        }
                       elseif($org_list){
                            $total_receipant = sizeof($org_list);
                            $sms_data['total_sms_sent'] = $sms_data['total_sms_sent']*$total_receipant;
                            if(count($this->data['total_sms_sent'])){
                                $sms_data['total_sms_sent'] += $this->data['total_sms_sent'][0]->total_sms;
                            }
                            foreach($org_list as $key => $value){     
                                $this->data['active_org_list'] = $this->info_model->get_registered_customer($value);
                                foreach($this->data['active_org_list'] as $rows){                                
                                    $sms_data['receiver_id'] = $rows->org_id;      
                                    $sms_data['receiver_contact_no'] = $rows->phone_no;
                                    if($receiver_contact_no){
                                        $receiver_contact_no = $receiver_contact_no.",".$rows->phone_no;
                                    }else{$receiver_contact_no = $rows->phone_no;}
                                    $this->info_model->sms_insert($sms_data);    
                                }
                            }
                        }
                        
                    $response = admin_communication_org_sms($receiver_contact_no,$sms_data);
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_communicate_org_sms_success').'</div>');
                    redirect('admin/info/communication_org_sms');
                }
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];   
   
}



 /**
 * Read SMS message : Communication with organization
 *
 *@access private
 *@return SMS message Details
 */

  function read_admin_comm_org_sms_message($id) {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        $this->data['num_of_inbox_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="inbox");
        $this->data['num_of_sent_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="sent");
        $data = array( 'sms_read' => 1);
        $this->info_model->admin_comm_org_sms_status_update($data, $id);
        $this->data['message'] = $this->info_model->get_sms_message_detail_by_id($id);
        $this->data['dynamicView'] = 'pages/admin/communication_org/sms_message_view';
        $this->_commonPageLayout('frontend_viewer');
    }

 /**
 * Delete SMS message : From DB: adminscentral Table: admin_communicate_org_sms
 *
 *@access private
 *@return Success/Failure message
 */

function delete_admin_sms(){
    
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->load->library('form_validation');
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'sms';
        $admin_sms_id = $this->input->post('admin_sms');     
        if(!isset($admin_sms_id[0])){
                $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('label_no_sms_selection_delete').'</div>');
    }
    else{
            //$admin_sms_id = implode(",",$admin_sms_id);
            $success = $this->info_model->delete_admin_sms($admin_sms_id);
            if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('label_no_sms_delete_success').'</div>');
            }
        }
     redirect('admin/info/communication_org_sms');
}


/**
 * Delete E-mail message : From DB: adminscentral Table: admin_communicate_org_email
 *
 *@access private
 *@return Success/Failure message
 */

function delete_admin_email(){
    
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->load->library('form_validation');
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'email';
        $admin_email_id = $this->input->post('admin_email');     
        print_r($admin_email_id);
        if(!isset($admin_email_id[0])){
                $this->session->set_flashdata('message', '<div id="error_message">'.$this->lang->line('label_no_email_selection_delete').'</div>');
    }
    else{
            //$admin_sms_id = implode(",",$admin_sms_id);
            $success = $this->info_model->delete_admin_sms($admin_sms_id);
            if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('label_no_sms_delete_success').'</div>');
            }
        }
     redirect('admin/info/communication_org');
}


/**
 * Communication with organization Via Letter
 *
 *@access private
 *@return Letter Communication Panel
 */
    function communication_org_letter() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'letter';
        $this->data['num_of_sent_letter'] = $this->info_model->get_admin_communicate_org_no_of_letter();
        
        
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/communication_org_letter");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->info_model->get_admin_communicate_all_letter()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_admin_communicate_all_letter($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
               
        $this->data['dynamicView'] = 'pages/admin/communication_org/letter_sent';
        $this->_commonPageLayout('frontend_viewer');
}


/**
 * Communication with organization: Write New Letter
 *
 *@access private
 *@return Write New Letter Panel
 */
function write_new_letter(){
    //echo $fak_expire_date = time() + (10 * 24 * 60 * 60);exit;
    $this->lang->load('common', $this->session->userdata('lang_file'));   
    $this->data['mainTab'] = 'communication';
    $this->data['activeTab'] = 'letter';
    $this->data['letter_write'] ="";
    $this->data['letter_title'] = '';
    $this->data['letter_text'] = '';
    $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
    $this->data['dynamicView'] = 'pages/admin/communication_org/write_letter';
    $this->_commonPageLayout('frontend_viewer');
}


/**
 * Communication with organization: Write New Letter Process
 *
 *@access private
 *@return Success/Failure Message
 */
function write_new_letter_process(){

    $receiver_addresses ="";
    $uploaded_letter ="";
    $letter_insert_id ="";
    $letter_data['receiver_org_ids'] ="";
    $this->data['letter_write'] ="";
    $this->data['letter_title'] = '';
    $this->data['letter_text'] = '';
    $this->data['letter_footer'] ="";
    
    $this->lang->load('common', $this->session->userdata('lang_file'));
    $this->data['active_org_list'] = $this->info_model->get_registered_customer($org_id="");
    //$this->data['num_of_inbox_sms'] = $this->info_model->get_admin_communicate_org_sms($flag="inbox");
    $this->data['logged_admin_user_info'] = $this->info_model->get_logged_admin_user_info($this->session->userdata('uid'));
   // $this->data['total_sms_sent'] = $this->info_model->get_total_sms_sent_by_admin_id($this->session->userdata('uid'));
       
    $this->load->library('form_validation');
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

    
    $this->data['individual'] =  $this->input->post('individual');
    $this->data['organization'] =  $this->input->post('organization'); 
    $this->data['select_org'] =  $this->input->post('select_org');
    $this->data['all_org'] =  $this->input->post('all_org');

    
    if(empty($this->data['individual']) && empty($this->data['organization'])){
          $this->form_validation->set_rules('individual', $this->lang->line('label_send_to'), 'trim|required');
    }
    if($this->data['individual']){
             $this->form_validation->set_rules('letter_individual_address', $this->lang->line('label_addresses_error'), 'trim|required');
             $letter_individual_address =  $this->input->post('letter_individual_address');
    }
    if($this->data['organization']){
        if(empty($this->data['select_org']) && empty($this->data['all_org'])){
            $this->form_validation->set_rules('select_org', $this->lang->line('label_email_to_org'), 'trim|required');
        }
        elseif($this->data['select_org']){
            $org_list = $this->input->post('org_list');              
            if(!isset($org_list[0])){   
                  $this->form_validation->set_rules('select_each_org', $this->lang->line('label_select_org'), 'trim|required');
            }
        }
        
    }

    
    //////////////////////////////////////////////////////////////////////////////////////////////
        $this->data['mainTab'] = 'communication';
        $this->data['activeTab'] = 'letter';
        
        $this->form_validation->set_rules('letter_title', $this->lang->line('label_title'), 'trim|required');

        if($this->data['letter_write']=="create_letter"){
            $this->form_validation->set_rules('letter_text', $this->lang->line('label_text'), 'trim|required');
        }
        if((!$uploaded_letter && $this->data['letter_write']=="upload_letter")){
                $this->form_validation->set_rules('letter_file', $this->lang->line('label_upload'), 'trim|required');
        }

        if ($this->form_validation->run() == FALSE) {            
            $this->data['dynamicView'] = 'pages/admin/communication_org/write_letter';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                        $letter_data['sender_id'] = $this->session->userdata('uid');
                        //$letter_data['send_from'] = "Adminscentral";
                        $letter_data['letter_title'] = $this->data['letter_title'];    
                        $letter_data['letter_text'] = $this->data['letter_text'];    
                        $letter_data['letter_footer'] = $this->data['letter_footer'];                            
                        $letter_data['add_date'] = date("Y-m-d H:i:s");   

                    /////////////////////////////////////////////////////////
                          if($this->data['individual']){                              
                               $letter_data['letter_individual_address'] = $letter_individual_address;    
                               $letter_insert_id =  $this->info_model->letter_insert($letter_data);  
                               if($letter_insert_id){
                                    $this->make_admin_commnicate_letter($letter_data,$letter_insert_id,"individual",$this->data['letter_write']);
                                    //$this->make_admin_commnicate_letter_address($letter_data,$letter_insert_id,"individual");
                               }
                                //$this->admin_communicate_org_sms_to_individual($email_data,$attachment_name,$attachedfile);
                            }
                        
                        elseif($this->data['all_org']){                          
                            foreach($this->data['active_org_list'] as $rows){      
                                if($letter_data['receiver_org_ids']==""){
                                    $letter_data['receiver_org_ids'] = $rows->org_id;      
                                }
                                else{
                                    $letter_data['receiver_org_ids'] = $rows->org_id.",".$letter_data['receiver_org_ids'];        
                                }                                     
                            }
                            $letter_insert_id = $this->info_model->letter_insert($letter_data);   
                            if($letter_insert_id){
                                    $this->make_admin_commnicate_letter($letter_data,$letter_insert_id,"organization",$this->data['letter_write']);
                                    //$this->make_admin_commnicate_letter_address($letter_data,$letter_insert_id,"organization");
                               }
                        }
                       elseif($org_list){
                            $letter_data['receiver_org_ids'] = implode(",",$org_list);
                            $letter_insert_id = $this->info_model->letter_insert($letter_data);   
                            if($letter_insert_id){
                                    $this->make_admin_commnicate_letter($letter_data,$letter_insert_id,"organization",$this->data['letter_write']);
                                    //$this->make_admin_commnicate_letter_address($letter_data,$letter_insert_id,"organization");
                               }
                        }
                    
                    ////////////////////////////////////////////////////////
                        
                    //$response = admin_communication_org_sms($receiver_contact_no,$sms_data);
                    if($letter_insert_id){       
                            if($uploaded_letter){
                               
                                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        $mkdirpath = "./admin_letter/";
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
                                        ///////////////////////////////////////////////////////////////////////////////////////////////////////
                                }
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_communicate_org_letter_success').'</div>');
                        redirect('admin/info/communication_org_letter');
                    }
                    
                }
    /////////////////////////////////////////////////////////////////////////////////////////////
    //echo $email_data['attached_files'];   
   
}


/**
 * Make admin_communicate_org : letter pdf
 *
 *@Param $letter_data which contains letter Info , $letter_id which conatins Letter_id AND $flag Which indicates Letter send to individual or Organization AND $letter_write Which indicates Create/Upload letter
 *@access Private
 *@return letter as PDF
 */ 
function make_admin_commnicate_letter($letter_data,$letter_id,$flag, $letter_write){   
        include("MPDF/mpdf.php");
        if($letter_write!="upload_letter"){        
            include_once 'MPDF/make_admin_commnicate_letter.php';
        }
        include_once 'MPDF/make_admin_commnicate_letter_address.php';
}


/**
 * Deliver Invoice Letter from DB: adminscentral , Table: bill_faktura
 *
 *@access public
 *@return Success/Failure
*/
function deliver_admin_commnicate_letter($letter_id){
    
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $data_letter['letter_status'] = 1; 
    $fak_update = $this->info_model->admin_communicate_org_letter_update($data_letter,$letter_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_letter_delivered_success').'</div>');
    redirect('admin/info/communication_org_letter');
}


/**
 * Deliver Organization Member Letter from DB: adminscentral , Table: org_member_letter
 *
 *@access Private
 *@return Success/Failure
*/
function deliver_org_member_letter($letter_id){
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $data_letter['letter_status'] = 1; 
    $fak_update = $this->info_model->org_member_letter_update($data_letter,$letter_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_member_letter_delivered_success').'</div>');
    redirect('admin/info/org_letter_order');
}

/**
 * Make admin_communicate_org : letter_addresss pdf
 *
 *@Param $letter_data which contains letter Info , $letter_id which conatins Letter_id AND $flag Which indicates Letter send to individual or Organization
 *@access Private
 *@return letter_address as PDF
 */
 
function make_admin_commnicate_letter_address($letter_data,$letter_id,$flag){   
        include("MPDF/mpdf.php");
        include_once 'MPDF/make_admin_commnicate_letter_address.php';
}


//Show new customer List
    function view_organisation_message() {
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'message';
        $this->data['query1'] = $this->info_model->get_new_customer_orders($org_id="");
        $this->data['dynamicView'] = 'pages/admin/registered_customer/show';
        $this->_commonPageLayout('frontend_viewer');
}

//Show new customer List
    function view_package_order() {
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'package_order';
        $this->data['query1'] = $this->info_model->get_package_orders($org_id="");
        $this->data['dynamicView'] = 'pages/admin/registered_customer/package_orders';
        $this->_commonPageLayout('frontend_viewer');
    }

    function deny_org($id) {
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'message';        
        $success = $this->info_model->org_deny($id);
        if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('new_customer_deny_success').'</div>');
        }
        redirect('admin/info/view_organisation_message', 'location', 301);
    }

    function papprove_org($id) {
        $data = array(
            'approval_status' => 2,
            'approval_status' => 2
        );
        $this->info_model->update_org_approve($data, $id);
        $this->data['query1'] = $this->info_model->get_userdata($id);
        foreach ($this->data['query1'] as $user_info):
            $payment_amount = $user_info->payment_amount;
            $email = $user_info->email;
            $name = $user_info->name;
        endforeach;
        $this->load->library('email');
        $this->email->from('info@onlineassociation.com', 'Confirmation for payment');
        $this->email->to("$email");
        $this->email->subject('Confirmation');
        $this->email->message("Dear $name Thanks for registration.your registration approved successfully.Please Click the below link for payment");
        $this->email->send();
        redirect('admin/info/view_organisation_message', 'location', 301);
    }

    function approve_org($mem_id) {
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'message';   
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $package_info =  $this->info_model->get_package_assigned_to_org_member_info($mem_id, "ordered");     
        //print_r($package_info); exit;
        //$package_info =  $this->info_model->get_package_info($org_id);        
        if($package_info){
            foreach($package_info as $row){
                $package_assigned_id = $row->package_assigned_id;
                $org_id = $row->org_id;
                $package_duration = $row->duration;
                $total_days = $package_duration*30;
            }
        }
             
       $expire_date= time() + ($total_days * 24 * 60 * 60);
       $activation_date = time(); 
       $data = array('approval_status' =>1, 'payment_status' =>1,'activation_date'=>$activation_date,'expire_date'=>$expire_date);            
       $success = $this->info_model->update_org_approve($data, $org_id);             
        if($success){         
            $update_data['ordered'] = 0;
            $update_data['active'] = 1;
            $update_data['activation_date'] = $activation_date;
            $update_data['expire_date'] = $expire_date;
            $update_package_assigned =  $this->info_model->update_package_assigned_to_org_member($update_data, $package_assigned_id);   
            $org_info = $this->info_model->get_new_customer_orders($org_id);
            foreach($org_info as $rows){
                $data['mem_id']=$rows->mem_id;
                $data['first_name']=$rows->first_name;
                $data['org_number']=$rows->org_number;
                $data['org_name']=$rows->org_name;
                $data['username']=$rows->username;
                $data['email']=$rows->email;
                $data['org_mobile_phone']=$rows->org_mobile_phone;                
                $data['password']= $this->decrypt($rows->password,"vaccitvassit");    
                $data_update_member = array('activation_date'=>$activation_date,'expire_date'=>$expire_date);     
                $success = $this->info_model->update_member($data_update_member, $data['mem_id']);        
                if($rows->password_receive_by_email){                                             
                    $this->send_password_by_email($data);
                }
                if($rows->password_receive_by_sms){
                    $this->send_password_by_sms($data);
                }   
            }
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('new_customer_approve_success').'</div>');
       }
        redirect('admin/info/view_organisation_message', 'location', 301);
    }

    function view_registered_customer() {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $this->data['query1'] = $this->info_model->get_registered_customer($org_id="");
        $this->data['dynamicView'] = 'pages/admin/registered_customer/view';
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * Organization's Letter Order
 *
 *@access private
 *@return Organization's Letter Order
 */
    function org_letter_order() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'org_letter_order';
        $this->data['num_of_letter_order'] = $this->info_model->get_org_member_no_of_letter();
        
        
        ////////////////////////////////////
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '20';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/org_letter_order");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->info_model->get_org_member_all_letter()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_org_member_all_letter($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        ///////////////////////////////////
               
        $this->data['dynamicView'] = 'pages/admin/orders/org_letter_order';
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * View Org_Bank Details
 *
 * @Param $org_id which contains org_id
 *@access public
 *@return Org_Bank Details
 */ 
 
 function view_org_bank_details($org_id) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $this->data['query1'] = $this->info_model->get_registered_customer($org_id);                
        $this->data['dynamicView'] = 'pages/admin/registered_customer/bank_details';
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * Deactivate Organization by updating the field of Table: organization_info , Field: org_blocked, Value=1
 *
 * @Param $org_id which contains org_id
 *@access public
 *@return Confirmation/Error Message
 */ 
 
 function deactivate_org($org_id) {      
        $data = array('org_blocked'=>1);
        $success = $this->info_model->update_org_approve($data,$org_id);  
        if($success){
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_deactivation_success').'</div>');
        }
       else{
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_deactivation_failure').'</div>');
        }
    redirect('admin/info/view_registered_customer', 'location', 301);
}


/**
 * Activate Organization by updating the field of Table: organization_info , Field: org_blocked, Value=0
 *
 * @Param $org_id which contains org_id
 *@access public
 *@return Confirmation/Error Message
 */ 
 
 function activate_org($org_id) {      
        $data = array('org_blocked'=>0);
        $success = $this->info_model->update_org_approve($data,$org_id);  
        if($success){
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_activation_success').'</div>');
        }
       else{
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_activation_failure').'</div>');
        }
    redirect('admin/info/view_registered_customer', 'location', 301);
}

/**
 * View Organization Details
 *
 *@param $org_id which contains organization id
 *@access private
 *@return Organization Details
 */ 
    function view_org_detail($org_id) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $this->data['query1'] = $this->info_model->get_registered_customer($org_id);        
        
        //$this->data['org_id'] = $org_id;
        $this->data['dynamicView'] = 'pages/admin/org_profile';
        $this->_commonPageLayout('frontend_viewer');
}

/**
 *Load Organization Info Edit Form
 *
 *@param $org_id which contains organization id
 *@access public
 *@return Organization Info Edit Form
 */ 
function modify_org($org_id) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $this->data['org_id'] = $org_id;
        $this->data['query1'] = $this->info_model->get_registered_customer($org_id);        
        $this->data['dynamicView'] = 'pages/admin/organization_edit';
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
    $this->data['mainTab'] = 'customer';
    $this->data['activeTab'] = 'customer';
        
    $card_info['credit_card_no']    = $this->input->post("credit_card_no");
    $card_info['credit_card_type'] = $this->input->post("credit_card_type");
    $card_info['credit_card_verification_code'] = $this->input->post("credit_card_verification_code");
    $card_info['card_expire_date_month'] = $this->input->post("card_expire_date_month");
    $card_info['card_expire_date_year'] = $this->input->post("card_expire_date_year");
    
    
    $organization_data = array(
        'org_description' => $this->input->post("org_description"),
        'org_primary_address' => $this->input->post("org_primary_address"),
        'org_optional_address' => $this->input->post("org_optional_address"),
        'org_phone' => $this->input->post("org_phone"),
        'org_zip' => $this->input->post("org_zip"),
        'org_city' => $this->input->post("org_city"),
        'org_country' => $this->input->post("org_country"),
        'org_state' => $this->input->post("org_state"),
         'org_bank_acc_no' => $this->input->post("org_bank_acc_no"),
        'org_bank_acc_type' =>$this->input->post("org_bank_acc_type"),
        );
        
        if($this->input->post("org_category")!="" && $this->input->post("org_category")!="other"){
            $organization_data['org_category'] = $this->input->post("org_category");
        }
        elseif($this->input->post("category_name")!=""){
            $data_val['category_name'] = $this->input->post("category_name");
            $cat_id = $this->info_model->org_category_insert($data_val);
            $organization_data['org_category'] = $cat_id;
        }
        
     $admin_user_data = array(                    
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
                );
                
                
    $form_data_step4 = array(
                    'payment_method' => $this->input->post("payment_method"),
                    'bill_first_name' => $this->input->post("bill_first_name"),
                    'bill_last_name' => $this->input->post("bill_last_name"),
                    'bill_phone_no' => $this->input->post("bill_phone_no"),
                    'bill_email' => $this->input->post("bill_email"),
                    'bill_primary_address' => $this->input->post("bill_primary_address"),
                    'bill_optional_address' => $this->input->post("bill_optional_address"),
                    'bill_zip' => $this->input->post("bill_zip"),
                    'bill_city' => $this->input->post("bill_city"),
                    'bill_country' => $this->input->post("bill_country"),
                    'bill_state' => $this->input->post("bill_state")
                   );     
        $data_billing_address['billing_address_data'] = $form_data_step4;
        $data_organization['organization_data'] = $organization_data;               
        $data_admin_user['admin_user_data'] = $admin_user_data;    
        
        $this->load->vars($form_data_step4);   
        $this->load->vars($data_admin_user);  
        $this->load->vars($data_organization);   
        
        
        $this->load->library('form_validation');   
        
        if($this->input->post("org_category")!="other"){
            $this->form_validation->set_rules('org_category', $this->lang->line('label_org_category'), 'trim|required');
        }
    
         if($this->input->post("org_category")=="other"){
            $this->form_validation->set_rules('category_name', $this->lang->line('label_org_category'), 'trim|required');
       }
        ///Organization_form Validation
        $this->form_validation->set_rules('org_description', $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_description'), 'trim|required');
        $this->form_validation->set_rules('org_primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', $this->lang->line('label_phone'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_state', $this->lang->line('label_state'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_bank_acc_no', $this->lang->line('label_bank_acc_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_bank_acc_type', $this->lang->line('label_bank_acc_type'), 'trim|required|xss_clean');
        ///Admin_user_form Validation
        $this->form_validation->set_rules('first_name', $this->lang->line('label_first_name'), 'trim|required');        
        $this->form_validation->set_rules('last_name',$this->lang->line('label_last_name'), 'trim|required');
        $this->form_validation->set_rules('phone_no', $this->lang->line('label_phone'), 'trim|required');
        $this->form_validation->set_rules('email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_email_check_by_org_id[' . $this->input->post("org_id") . ']');
        $this->form_validation->set_rules('username',$this->lang->line('label_username'), 'trim|required|callback_login_username_check_by_org_id[' . $this->input->post("org_id") . ']');
        $this->form_validation->set_rules('person_number', $this->lang->line('label_person_no'), 'trim|required|callback_check_person_number_by_org_id[' . $this->input->post("org_id") . ']');
        $this->form_validation->set_rules('primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('state', $this->lang->line('label_state'), 'trim|required|xss_clean');
        
        /////////Billing_form Validation
        $this->form_validation->set_rules('bill_first_name', $this->lang->line('label_first_name'), 'trim|required');
        $this->form_validation->set_rules('bill_last_name',$this->lang->line('label_last_name'), 'trim|required');
        $this->form_validation->set_rules('bill_phone_no', $this->lang->line('label_phone'), 'trim|required');
        $this->form_validation->set_rules('bill_email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('bill_primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_state', $this->lang->line('label_state'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['org_id'] = $org_id;
            $this->data['query1'] = $this->info_model->get_registered_customer($org_id); 
            $this->data['dynamicView'] = 'pages/admin/organization_edit';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                $update_success = $this->info_model->update_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4,$org_id);
                if($update_success){
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_update_success').'</div>');
                }
                else{
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_update_failure').'</div>');
                }           
                redirect('admin/info/view_org_detail/'.$org_id);
        }
}
        
/**
 *Load Org.Category Form
 *
 *@access public
 *@return Org.Category Form
 */ 
    function add_org_category($start=0) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'org_category';
        $this->data['dynamicView'] = 'pages/admin/org_category/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function approve_org_category($id) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'org_category';
        $data = array(
            'status' => 2
        );
        $this->info_model->approve_org_category($data, $id);
        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('organization_category_approved').'</div>');
        redirect('admin/info/org_category');
    }
    function deny_org_category($id) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'org_category';
        $this->info_model->deny_org_category($id);
        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('organization_category_denied').'</div>');
        redirect('admin/info/org_category');
    }

    function added_org_category($start=0) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'org_category';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_category', $this->lang->line('label_organization_category'), 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/org_category/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $o_category = ucfirst($this->input->post('org_category'));
            $this->data['o_info'] = $this->info_model->check_org_category_exists($o_category,$cid="");
            if (count($this->data['o_info'])) {
                $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('organization_category_exists').'</div>');
                redirect('admin/info/add_org_category');
            } else {
                $to_date = date("Y-m-d H:i:s"); 
                $data = array(
                    'category_name' => ucfirst($this->input->post('org_category')),
                    'add_date'=>$to_date
                );
                $this->info_model->org_category_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('organization_category_add_success').'</div>');
                redirect('admin/info/org_category');
            }
        }
    }

    function username_check($username) {

        $result = $this->dx_auth->is_username_available($username);
        if (!$result) {
            $this->form_validation->set_message('username_check', 'Username already exist. Please choose another username.');
        }

        return $result;
    }

    function check_login($username) {
        $this->validation->set_message('check_login', 'Your login information is invalid. Please try again.');
        // This function does not work without reapplying md5 to the passwd field
        $mdpassword = md5($this->validation->passwd);
        // Check to see if a user exists
        $this->db->where('userid', $username);
        $this->db->where('password', $mdpassword);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//delete org_category
    function delete_org_category($id = NULL) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $success = FALSE;
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'category';        
        $success = $this->info_model->delete_org_category($id);
        if($success){
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_category_delete_success').'</div>');
			}
        redirect('admin/info/org_category', 'location', 301);
    }

    function org_category() {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'org_category';
        $this->data['query1'] = $this->info_model->view_org_category();
        $this->data['dynamicView'] = 'pages/admin/org_category/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_previlige() {
        $this->data['mainTab'] = 'previlization';
        $this->data['activeTab'] = 'view_previlige';
        $this->data['dynamicView'] = 'pages/admin/previlige/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_org_previlige() {
        $this->data['mainTab'] = 'previlization';
        $this->data['activeTab'] = 'view_previlige';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_id', 'Org Number', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/previlige/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $query = $this->db->query("select * from org_previlige where org_id='" . $this->input->post("org_id") . "'");
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('message', '<div id="message">Previlization Setting Exists</div>');
                redirect('admin/info/view_previlige');
            } else {
                $data = array(
                    'org_id ' => $this->input->post("org_id"),
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
                    // 'configuration_visibility' => $this->input->post("configuration_visibility"),
                    // 'configuration_switching' => $this->input->post("configuration_switching"),
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
                    // 'members_add_usertype' => $this->input->post("members_add_usertype"),
                    'external_mainboard' => $this->input->post("external_mainboard"),
                    'external_presentation' => $this->input->post("external_presentation")
                );
                $this->info_model->org_previlige_insert($data);
                $data1 = array(
                    'previlige_status' => 2
                );
                $this->info_model->org_previlige_update($data1);
                $this->session->set_flashdata('message', '<div id="message1">Previlization Setting saved successfully.</div>');
                redirect('admin/info/view_previlige');
            }
        }
    }

    function view_org_previlize() {
        $this->data['mainTab'] = 'previlization';
        $this->data['activeTab'] = 'previlige_edit';
        $this->data['dynamicView'] = 'pages/admin/previlige/previlize_view';
        $this->_commonPageLayout('frontend_viewer');
    }

/*
    function viewed_org_previlize() {
        $this->data['mainTab'] = 'previlization';
        $this->data['activeTab'] = 'previlige_edit';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_id', 'Org Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/previlige/previlize_view';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $org_id = $this->input->post("org_id");
            $query = $this->db->query("select * from org_previlige where org_id='" . $org_id . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">No setting found for this Organization.</div>');
                redirect('admin/info/viewed_org_previlize');
            } else {
                $this->data['org_id'] = $this->input->post("org_id");
                $this->data['dynamicView'] = 'pages/admin/previlige/edit';
                $this->_commonPageLayout('frontend_viewer');
            }
        }
    }*/
    
    
function viewed_org_previlize($org_id) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'previlization';
        $this->data['activeTab'] = 'previlige_edit';
        $to_date = date("Y-m-d H:i:s"); 
        $query = $this->db->query("select * from org_previlige where org_id='" . $org_id . "'");
            if ($query->num_rows() == 0) {
                //$this->session->set_flashdata('message', '<div id="message">No setting found for this Organization.</div>');
                ///TAHER                    
                $data = array('org_id ' => $org_id, 'add_date' => $to_date);
                $this->info_model->org_previlige_insert($data);
                /*$data1 = array('previlige_status' => 2);
                $this->info_model->org_previlige_update($data1);*/
                
                ///TAHER
                redirect('admin/info/viewed_org_previlize/'.$org_id);
            }
        $this->data['org_id'] =$org_id;
        $this->data['dynamicView'] = 'pages/admin/previlige/edit';
        $this->_commonPageLayout('frontend_viewer');            
}

    function update_previlize() {
        $data = array(
            //mainboard            
            'mainboard_send_notification' => $this->input->post("mainboard_send_notification"),
            'mainboard_sending_out' => $this->input->post("mainboard_sending_out"),
            'mainboard_manually_archive' => $this->input->post("mainboard_manually_archive"),
            //forum
            'forum_delete_any_coments' => $this->input->post("forum_delete_any_coments"),
            'forum_manually_archive_comments' => $this->input->post("forum_manually_archive_comments"),
           
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
            'access_faktura' => $this->input->post("access_faktura")
            
        );
        //echo "<pre>";print_r($data);die();
        $this->info_model->org_previlige_setting_update($data);
        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('previlize_settings_updated_success').'</div>');
        //redirect('admin/info/viewed_org_previlize');
        redirect('admin/info/view_registered_customer');
    }

    function view_letter() {
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'view_letter';
        $this->data['dynamicView'] = 'pages/admin/letter_post/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

/**
 * view invoice which are sent as a Letter
 *
 *@access public
 *@return invoice as letter pdf
*/
    function view_invoice_letter() {
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'view_invoice_letter';
        $this->data['invoice_letter'] = $this->info_model->get_all_active_invoice_letter();        
        $this->data['dynamicView'] = 'pages/admin/letter_post/view_invoice_letter';
        $this->_commonPageLayout('frontend_viewer');
}

    function print_letter($letter_id) {
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'view_letter';
        $this->data['letter_id'] = $letter_id;
        $this->data['dynamicView'] = 'pages/admin/letter_post/print';
        $this->_commonPageLayout('frontend_viewer');
    }

    function print_address($letter_id, $letter_status,$org_id) {
        $this->data['mainTab'] = 'letter';
        $this->data['activeTab'] = 'view_letter';
        $this->data['letter_id'] = $letter_id;
		 $this->data['org_id'] = $org_id;
        $this->data['letter_status'] = $letter_status;
        $this->data['dynamicView'] = 'pages/admin/letter_post/print_address';
        $this->_commonPageLayout('frontend_viewer');
    }

    function deliver_member_letter($letter_id) {
        $this->data['mainTab'] = 'letter';
        $this->data['activeTab'] = 'view_letter';
        $data = array(
            'superadmin_status' => 2
        );
        $this->info_model->update_letter_status($data, $letter_id);
        $q1 = $this->db->query("select * from letter_send_request where letter_id='" . $letter_id . "'");
        foreach ($q1->result() as $p_message):
            $data1 = array(
                'superadmin_status' => 2
            );
            $letter1 = $p_message->letter_id;
            $this->info_model->update_letter_status1($data1, $letter1);
        endforeach;
        redirect('admin/info/view_letter');
}


/**
 * Deliver Invoice Letter from DB: adminscentral , Table: bill_faktura
 *
 *@access public
 *@return Success/Failure
*/
function deliver_invoice_letter($fak_id){
    $this->lang->load('orders', $this->session->userdata('lang_file'));
    $data_faktura['fak_letter_delivered'] = 1; 
    $fak_update = $this->info_model->bill_faktura_update($data_faktura,$fak_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_letter_delivered_success').'</div>');
    redirect('admin/info/view_invoice_letter');
}

    function archive_member_letter($letter_id) {
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'view_letter';
        $q1 = $this->db->query("select * from letter where id='" . $letter_id . "'");
        foreach ($q1->result() as $p_message):
            $data1 = array(
                'letter_id' => $p_message->id,
                'org_id' => $p_message->org_id,
                'member_group' => $p_message->member_group,
                'title' => $p_message->title,
                'text' => $p_message->text,
                'sender_name' => $p_message->sender_name,
                'sending_date' => $p_message->sending_date,
                'admin_status' => $p_message->admin_status,
                'superadmin_status' => $p_message->superadmin_status,
                'letter_status' => $p_message->letter_status
            );
            $this->info_model->letter_archive_insert($data1);
            $this->info_model->delete_letter($letter_id);
        endforeach;
        redirect('admin/info/view_letter');
    }

    function datewise_search() {
        $this->data['mainTab'] = 'letter';
        $this->data['activeTab'] = 'datewise_search';
        $this->data['dynamicView'] = 'pages/admin/letter_post/search_date_form';
        $this->_commonPageLayout('frontend_viewer');
    }
  function titlewise_search() {
        $this->data['mainTab'] = 'letter';
        $this->data['activeTab'] = 'titlewise_search';
        $this->data['dynamicView'] = 'pages/admin/letter_post/search_title_form';
        $this->_commonPageLayout('frontend_viewer');
    }
    function added_search_date() {
        $this->data['mainTab'] = 'letter';
        $this->data['activeTab'] = 'datewise_search';
        $a = $this->input->post("search_title");
        if (empty($a)) {
            $this->data['message'] = "Sorry Your search produces no result.Please try again";
            $this->data['dynamicView'] = 'pages/admin/letter_post/message';
            $this->_commonPageLayout('frontend_viewer');
        } else {

            $this->data['record1'] = $this->info_model->get_search_result($a);
            $this->data['dynamicView'] = 'pages/admin/letter_post/search_date_detail';
            $this->_commonPageLayout('frontend_viewer');
        }
    }

    function added_search() {
         $this->data['mainTab'] = 'letter';
        $this->data['activeTab'] = 'titlewise_search';
        $a = $this->input->post("search_title");
        if (empty($a)) {
            $this->data['message'] = "Sorry Your search produces no result.Please try again";
            $this->data['dynamicView'] = 'pages/admin/letter_post/message';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $this->data['record1'] = $a;
            $this->data['dynamicView'] = 'pages/admin/letter_post/search';
            $this->_commonPageLayout('frontend_viewer');

          
        }
    }

function view_org_bill() {
        $this->data['mainTab'] = 'billing';
        $this->data['activeTab'] = 'bill';
        $this->data['query1'] = $this->info_model->get_billing_info();
        $org_id_invoice= "";
        $org_id_creditcard ="";                
        if(count($this->data['query1'])){
            foreach($this->data['query1'] as $rows){               
                if($rows->payment_method=="invoice"){
                    $org_id_invoice.=$rows->org_id.",";
                }
                if($rows->payment_method=="creditcard"){
                    $org_id_creditcard.=$rows->org_id.",";
                }               
            }            
}
$org_id_invoice = substr_replace($org_id_invoice, '', strrpos($org_id_invoice,","));
$org_id_creditcard = substr_replace($org_id_creditcard, '', strrpos($org_id_creditcard,","));
if(!empty($org_id_invoice)){
    $invoice_info = $this->info_model->get_all_active_invoice($org_id_invoice);    
}
    $this->data['invoice_info'] = $invoice_info;
    $this->data['dynamicView'] = 'pages/admin/billing/billing_view';
    $this->_commonPageLayout('frontend_viewer');
}

function invoice_edit($fak_id){
    $this->data['mainTab'] = 'billing';
    $this->data['activeTab'] = 'bill';
    $this->data['faktura_info'] = $this->info_model->get_faktura_info($fak_id);
    $this->data['dynamicView'] = 'pages/admin/billing/invoice_edit';
    $this->_commonPageLayout('frontend_viewer');
}

function invoice_edit_process(){
    $this->data['mainTab'] = 'billing';
    $this->data['activeTab'] = 'bill';        
    $this->lang->load('customer', $this->session->userdata('lang_file'));    
    
    $data_faktura['fak_invoice_cost'] = $this->input->post("fak_invoice_cost");
    $data_faktura['fak_unit_price'] = $this->input->post("fak_unit_price");
    $data_faktura['sms_unit_price'] = $this->input->post("sms_unit_price");
    $data_faktura['letter_unit_price'] = $this->input->post("letter_unit_price");
    $fak_id = $this->input->post("fak_id");
    $this->data['faktura_info'] = $this->info_model->get_faktura_info($fak_id);
    
    $this->form_validation->set_rules('fak_unit_price', $this->lang->line('label_package_cost'), 'trim|required');
    if ($this->form_validation->run() == FALSE) {
         $this->data['dynamicView'] = 'pages/admin/billing/invoice_edit';
    }
    else{
            if($this->data['faktura_info']){
                foreach($this->data['faktura_info'] as $rows){
                    $data_faktura['total_sms_sent'] = $rows->total_sms_sent;
                    $data_faktura['total_letter_sent'] = $rows->total_letter_sent;
                    $data_faktura['fak_vat_rate'] =$rows->fak_vat_rate;
                    $data_faktura['fak_quantity'] =$rows->fak_quantity;
                    $data_faktura['fak_currency'] = $rows->fak_currency;
                    $data_faktura['fak_invoice_cost_applied'] = $rows->fak_invoice_cost_applied;
                    $data_faktura['org_id'] = $rows->org_id;
                    $data_faktura['package_id'] = $rows->package_id;
                    $data_faktura['fak_active_date'] = $rows->fak_active_date;
                    $data_faktura['fak_expire_date'] = $rows->fak_expire_date;
                    $data_faktura['org_name'] = $rows->org_name;
                    $data_faktura['org_number'] = $rows->org_number;
                    $data_faktura['bill_primary_address'] = $rows->bill_primary_address;
                    $data_faktura['bill_zip'] = $rows->bill_zip;
                    $data_faktura['bill_city'] = $rows->bill_city;                    
                    $data_faktura['bill_state'] = $rows->bill_state;
                    $data_faktura['bill_country'] = $rows->bill_country;
                    $data_faktura['bill_phone'] = $rows->bill_phone;
                    $data_faktura['fak_reference_name'] = $rows->fak_reference_name;
                    $data_faktura['fak_description'] = $rows->fak_description;
                    $data_faktura['no_of_fak_invoice_sent_by_letter'] = $rows->no_of_fak_invoice_sent_by_letter;
                    $data_faktura['invoice_sent_by_letter_cost'] = $rows->invoice_sent_by_letter_cost;
                    $data_faktura['admin_cost'] = $rows->admin_cost;
                
                }
                $data_faktura['fak_sms_cost'] = $data_faktura['total_sms_sent'] *$data_faktura['sms_unit_price'];
                $data_faktura['fak_letter_cost'] = $data_faktura['total_letter_sent'] *$data_faktura['letter_unit_price'];
                $data_faktura['fak_price_exclusive_vat'] = ($data_faktura['fak_quantity']*$data_faktura['fak_unit_price']);   
                //////// Calculating Total Cost of this faktura //////
                $pris_exclusive_vat_one = $data_faktura['fak_price_exclusive_vat'];
                $pris_exclusive_vat_two = $data_faktura['fak_invoice_cost_applied'];
                $pris_exclusive_vat_three = $data_faktura['fak_sms_cost'];
                $pris_exclusive_vat_four = $data_faktura['fak_letter_cost'];
                
                $price_total_exclusive_vat = ($pris_exclusive_vat_one+$pris_exclusive_vat_two+$pris_exclusive_vat_three+$pris_exclusive_vat_four);
                $data_faktura['fak_vat_price'] = ($data_faktura['fak_vat_rate']/100)*$price_total_exclusive_vat; 
                $fak_total_price = $price_total_exclusive_vat+$data_faktura['fak_vat_price'];
                //////// Calculating Total Cost of this faktura //////
                $data_faktura['fak_total_price'] = round($fak_total_price);
                $data_faktura['fak_rounding_price'] = $data_faktura['fak_total_price'] - $fak_total_price;
                $fak_update = $this->info_model->bill_faktura_update($data_faktura,$fak_id);
                
                
                $data_faktura['price_total_exclusive_vat']= $price_total_exclusive_vat;
                $data = array();
                $this->edit_invoice_pdf($data_faktura,$fak_id,$data);      
                
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_sent_success').'</div>');
                redirect('admin/info/view_org_bill');
            }
    }
    
   
    $this->_commonPageLayout('frontend_viewer');
}


function invoice_make_unpaid($fak_id){
    $this->data['mainTab'] = 'billing';
    $this->data['activeTab'] = 'bill';        
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $data_faktura['fak_paid'] = 0;
    $fak_update = $this->info_model->bill_faktura_update($data_faktura,$fak_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_updated_success').'</div>');
    redirect('admin/info/view_org_bill');
}

function invoice_make_paid($fak_id){
    $this->data['mainTab'] = 'billing';
    $this->data['activeTab'] = 'bill';        
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $data_faktura['fak_paid'] = 1;
    $fak_update = $this->info_model->bill_faktura_update($data_faktura,$fak_id);
    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_updated_success').'</div>');
    redirect('admin/info/view_org_bill');
}

 /**
 * Send Invoice by : E-mail and/or SMS OR Letter
 *
 *@access private
 *@return success/failure message
 */ 
function invoice_send(){
    $this->data['mainTab'] = 'billing';
    $this->data['activeTab'] = 'bill';        
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $data_faktura['fak_sent_by'] = "";
    $data['send_invoice_email'] = $this->input->post("email");
    $data['send_invoice_sms'] = $this->input->post("sms");
    $data['send_invoice_letter'] = $this->input->post("letter");
    $fak_id = $this->input->post("fak_id"); 
    
    $admin_user_info = $this->info_model->get_admin_user_info_by_fakid($fak_id);
    
    if(count($admin_user_info)){
        foreach($admin_user_info as $admin_user){
            $data['first_name']= $admin_user->first_name;
            $data['username']=$admin_user->username;
            $data['email']=$admin_user->email;            
        }
    }
 ///////////////////////////////////////////////////////////
   
    $this->data['faktura_info'] = $this->info_model->get_faktura_info($fak_id);
            if($this->data['faktura_info']){
                foreach($this->data['faktura_info'] as $rows){
                    $data_faktura['sms_unit_price'] = $rows->sms_unit_price;
                    $data_faktura['letter_unit_price'] = $rows->letter_unit_price;
                    $data_faktura['fak_invoice_cost'] = $rows->fak_invoice_cost;
                    $data_faktura['fak_unit_price'] = $rows->fak_unit_price;
                    $data_faktura['total_sms_sent'] = $rows->total_sms_sent;
                    $data_faktura['total_letter_sent'] = $rows->total_letter_sent;
                    $data_faktura['fak_vat_rate'] =$rows->fak_vat_rate;
                    $data_faktura['fak_quantity'] =$rows->fak_quantity;
                    $data_faktura['fak_currency'] = $rows->fak_currency;                                        
                    $data_faktura['org_id'] = $rows->org_id;
                    $data_faktura['package_id'] = $rows->package_id;
                    $data_faktura['fak_active_date'] = $rows->fak_active_date;
                    $data_faktura['fak_expire_date'] = $rows->fak_expire_date;
                    $data_faktura['bill_primary_address'] = $rows->bill_primary_address;
                    $data_faktura['bill_zip'] = $rows->bill_zip;
                    $data_faktura['bill_city'] = $rows->bill_city;                    
                    $data_faktura['bill_state'] = $rows->bill_state;
                    $data_faktura['bill_country'] = $rows->bill_state;
                    $data_faktura['bill_phone'] = $rows->bill_phone;
                    $data_faktura['fak_reference_name'] = $rows->fak_reference_name;
                    $data_faktura['fak_description'] = $rows->fak_description;
                    $data['org_name'] = $rows->org_name;
                    $data['org_number'] = $rows->org_number;
                    $data_faktura['org_name'] = $rows->org_name;
                    $data_faktura['org_number'] = $rows->org_number;
                    $data_faktura['no_of_fak_invoice_sent_by_letter'] = $rows->no_of_fak_invoice_sent_by_letter;
                    $data_faktura['invoice_sent_by_letter_cost'] = $rows->invoice_sent_by_letter_cost;
                    $data_faktura['fak_invoice_cost_applied'] = $rows->fak_invoice_cost_applied;
            }
                if($data['send_invoice_letter'] =="letter"){
                        $data_faktura['fak_invoice_cost_applied'] = $data_faktura['fak_invoice_cost'];
                        $data_faktura['fak_sent_by'] = $data['send_invoice_letter'];
                        $data_faktura['no_of_fak_invoice_sent_by_letter'] = $data_faktura['no_of_fak_invoice_sent_by_letter']+1;                        
                        $data_faktura['invoice_sent_by_letter_cost'] = $data_faktura['no_of_fak_invoice_sent_by_letter'] * $data_faktura['fak_invoice_cost_applied'];                        
                }
                else{
                        //$data_faktura['fak_invoice_cost_applied'] = 0.00;
                        if($data['send_invoice_sms'] =="sms"){
                            $data_faktura['fak_sent_by'] = $data['send_invoice_sms'].",";
                        }
                        if($data['send_invoice_email'] =="email"){
                            $data_faktura['fak_sent_by'] .= $data['send_invoice_email'];
                    }
                }
            
                $data_faktura['fak_sms_cost'] = $data_faktura['total_sms_sent'] *$data_faktura['sms_unit_price'];
                $data_faktura['fak_letter_cost'] = $data_faktura['total_letter_sent'] *$data_faktura['letter_unit_price'];
                $data_faktura['fak_price_exclusive_vat'] = ($data_faktura['fak_quantity']*$data_faktura['fak_unit_price']);   
                //////// Calculating Total Cost of this faktura //////                
                $pris_exclusive_vat_one = $data_faktura['fak_price_exclusive_vat'];
                $pris_exclusive_vat_two = $data_faktura['invoice_sent_by_letter_cost'];
                $pris_exclusive_vat_three = $data_faktura['fak_sms_cost'];
                $pris_exclusive_vat_four = $data_faktura['fak_letter_cost'];
                
                $price_total_exclusive_vat = ($pris_exclusive_vat_one+$pris_exclusive_vat_two+$pris_exclusive_vat_three+$pris_exclusive_vat_four);
                $data_faktura['fak_vat_price'] = ($data_faktura['fak_vat_rate']/100)*$price_total_exclusive_vat; 
                $fak_total_price = $price_total_exclusive_vat+$data_faktura['fak_vat_price'];
                //////// Calculating Total Cost of this faktura //////
                $data_faktura['fak_total_price'] = round($fak_total_price);
                $data_faktura['fak_rounding_price'] = $data_faktura['fak_total_price'] - $fak_total_price;
                $fak_update = $this->info_model->bill_faktura_update($data_faktura,$fak_id);
                $data_faktura['price_total_exclusive_vat']= $price_total_exclusive_vat;                
                $this->edit_invoice_pdf($data_faktura,$fak_id,$data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_sent_success').'</div>');
                redirect('admin/info/view_org_bill');
           
    //////////////////////////////////////////////////////////
    }
}



 /**
 * Send Invoice_reminder by : E-mail and/or SMS OR Letter
 *
 *@access private
 *@return success/failure message
 */ 
function invoice_reminder_send(){
    $this->lang->load('customer', $this->session->userdata('lang_file'));
    $this->data['mainTab'] = 'billing';
    $this->data['activeTab'] = 'bill';            
    $data_faktura['fak_sent_by'] = "";
    $data['send_invoice_email'] = $this->input->post("email");
    $data['send_invoice_sms'] = $this->input->post("sms");
    $data['send_invoice_letter'] = $this->input->post("letter");
    $fak_id = $this->input->post("fak_id"); 
    
    $admin_user_info = $this->info_model->get_admin_user_info_by_fakid($fak_id);    
    if(count($admin_user_info)){
        foreach($admin_user_info as $admin_user){
            $data['first_name']= $admin_user->first_name;
            $data['username']=$admin_user->username;
            $data['email']=$admin_user->email;            
        }
    }
    $data_global_settings['global_settings_data'] = $this->info_model->get_global_settings();
    // print_r($data['global_settings_data']);
    if($data_global_settings['global_settings_data']){
        foreach($data_global_settings['global_settings_data'] as $rows){
            $data_faktura['admin_cost'] = $rows->admin_cost;
            //$data_organization['organization_data']['org_allowed_sms_per_month'] = $rows->allowed_sms_per_month;
            //$data_organization['organization_data']['org_allowed_letter_per_month'] = $rows->allowed_letter_per_month;
            //$per_invoice_cost = $rows->per_invoice_cost;
        }                    
    }    
 ///////////////////////////////////////////////////////////
   
    $this->data['faktura_info'] = $this->info_model->get_faktura_info($fak_id);
            if($this->data['faktura_info']){
                foreach($this->data['faktura_info'] as $rows){
                    $data_faktura['sms_unit_price'] = $rows->sms_unit_price;
                    $data_faktura['letter_unit_price'] = $rows->letter_unit_price;
                    $data_faktura['fak_invoice_cost'] = $rows->fak_invoice_cost;
                    $data_faktura['fak_unit_price'] = $rows->fak_unit_price;
                    $data_faktura['total_sms_sent'] = $rows->total_sms_sent;
                    $data_faktura['total_letter_sent'] = $rows->total_letter_sent;
                    $data_faktura['fak_vat_rate'] =$rows->fak_vat_rate;
                    $data_faktura['fak_quantity'] =$rows->fak_quantity;
                    $data_faktura['fak_currency'] = $rows->fak_currency;                                        
                    $data_faktura['org_id'] = $rows->org_id;
                    $data_faktura['package_id'] = $rows->package_id;
                    $data_faktura['fak_active_date'] = $rows->fak_active_date;
                    $data_faktura['fak_expire_date'] = $rows->fak_expire_date;
                    $data_faktura['bill_primary_address'] = $rows->bill_primary_address;
                    $data_faktura['bill_zip'] = $rows->bill_zip;
                    $data_faktura['bill_city'] = $rows->bill_city;                    
                    $data_faktura['bill_state'] = $rows->bill_state;
                    $data_faktura['bill_country'] = $rows->bill_state;
                    $data_faktura['bill_phone'] = $rows->bill_phone;
                    $data_faktura['fak_reference_name'] = $rows->fak_reference_name;
                    $data_faktura['fak_description'] = $rows->fak_description;
                    $data['org_name'] = $rows->org_name;
                    $data['org_number'] = $rows->org_number;
                    $data_faktura['org_name'] = $rows->org_name;
                    $data_faktura['org_number'] = $rows->org_number;
                    $data_faktura['no_of_fak_invoice_sent_by_letter'] = $rows->no_of_fak_invoice_sent_by_letter;
                    $data_faktura['invoice_sent_by_letter_cost'] = $rows->invoice_sent_by_letter_cost;
                    $data_faktura['fak_invoice_cost_applied'] = $rows->fak_invoice_cost_applied;
                    $data_faktura['fak_sent_by'] = $rows->fak_sent_by;
                    //$data_faktura['reminder_sent_by'] = $rows->reminder_sent_by;
            }
                if($data['send_invoice_letter'] =="letter"){
                        $data_faktura['fak_invoice_cost_applied'] = $data_faktura['fak_invoice_cost'] ;
                        $data_faktura['reminder_sent_by'] = $data['send_invoice_letter'];
                        $data_faktura['no_of_fak_invoice_sent_by_letter'] = $data_faktura['no_of_fak_invoice_sent_by_letter']+1;
                        $data_faktura['invoice_sent_by_letter_cost'] = $data_faktura['no_of_fak_invoice_sent_by_letter'] * $data_faktura['fak_invoice_cost_applied'];                        
                        $data_faktura['fak_letter_delivered'] = 0;                        
                }
                else{
                        //$data_faktura['fak_invoice_cost_applied'] = 0.00;
                        if($data['send_invoice_sms'] =="sms"){
                            $data_faktura['reminder_sent_by'] = $data['send_invoice_sms'].",";
                        }
                        if($data['send_invoice_email'] =="email"){
                            $data_faktura['reminder_sent_by'] .= $data['send_invoice_email'];
                    }
                }
            
                $data_faktura['fak_sms_cost'] = $data_faktura['total_sms_sent'] *$data_faktura['sms_unit_price'];
                $data_faktura['fak_letter_cost'] = $data_faktura['total_letter_sent'] *$data_faktura['letter_unit_price'];
                $data_faktura['fak_price_exclusive_vat'] = ($data_faktura['fak_quantity']*$data_faktura['fak_unit_price']);   
                //////// Calculating Total Cost of this faktura //////
                
                $pris_exclusive_vat_one = $data_faktura['fak_price_exclusive_vat'];
                $pris_exclusive_vat_two = $data_faktura['invoice_sent_by_letter_cost'];
                $pris_exclusive_vat_three = $data_faktura['fak_sms_cost'];
                $pris_exclusive_vat_four = $data_faktura['fak_letter_cost'];
                $pris_exclusive_vat_five = $data_faktura['admin_cost'] ;
                
                $price_total_exclusive_vat = ($pris_exclusive_vat_one+$pris_exclusive_vat_two+$pris_exclusive_vat_three+$pris_exclusive_vat_four+$pris_exclusive_vat_five);
                $data_faktura['fak_vat_price'] = ($data_faktura['fak_vat_rate']/100)*$price_total_exclusive_vat; 
                $fak_total_price = $price_total_exclusive_vat+$data_faktura['fak_vat_price'];
                //////// Calculating Total Cost of this faktura //////
                $data_faktura['fak_total_price'] = round($fak_total_price);
                $data_faktura['fak_rounding_price'] = $data_faktura['fak_total_price'] - $fak_total_price;
                $fak_update = $this->info_model->bill_faktura_update($data_faktura,$fak_id);
                $data_faktura['price_total_exclusive_vat']= $price_total_exclusive_vat;                
                $this->edit_invoice_pdf($data_faktura,$fak_id,$data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('faktura_reminder_sent_success').'</div>');
                redirect('admin/info/view_org_bill');
           
    //////////////////////////////////////////////////////////
    }
}


 /**
 * Edit Invoice as a PDF
 *
 *@Param $data_faktura which contains faktura Info AND $fak_id which conatins faktura id
 *@access public
 *@return Invoice as PDF
 */ 
function edit_invoice_pdf($data_faktura,$fak_id,$data){   
    include("MPDF/mpdf.php");
    $file_name ="invoice/invoice_".$data_faktura['org_name'].'_'.$data_faktura['org_number'].'_'.$fak_id.'.pdf';   
    if(file_exists($file_name)){        
        if(unlink($file_name)){
            include_once 'MPDF/edit_faktura.php';
        }
    }else{include_once 'MPDF/edit_faktura.php';}
    if($data['send_invoice_letter']=="letter"){
        include_once 'MPDF/make_letter_address.php';
    }
    if($data['send_invoice_email']=="email"){
        $this->send_invoice_by_email($data,$content,$file_name);
    }
    if($data['send_invoice_sms']=="sms"){
        $data_faktura['pay_invoice_to'] = "Bankgiro SE556829899501";
        $response = send_invoice_sms($data_faktura,$fak_id);
    }
}

  /*  function viewed_org_bill() {
        $this->data['mainTab'] = 'billing';
        $this->data['activeTab'] = 'bill';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('org_name', 'Org Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/billing/billing_form';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $this->data['query1'] = $this->info_model->get_billing_info();
            $this->data['query2'] = $this->info_model->get_sms_billing_info();
            $this->data['dynamicView'] = 'pages/admin/billing/billing_detail';
            $this->_commonPageLayout('frontend_viewer');
        }
}*/

  function view_archive_letter() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_letter';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '1';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("admin/info/view_archive_letter");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_archive_letter()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_archive_letter($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/admin/archive/letter_view';
        $this->_commonPageLayout('frontend_viewer');
    }


/**
 * Load New Customer Registration Form: Show Package Selection
 *
 *@access Private
 *@return New Customer Registration Form: Show Package Selection
 */
    function register_org($start=0) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';              
        $data['package_data'] = $this->info_model->get_active_package($id="");
        //print_r($data['package_info']); exit;
        $this->load->vars($data);      
        $this->data['dynamicView'] = 'pages/admin/new_customer/package_selection';
        $this->_commonPageLayout('frontend_viewer');
}

 /**
 * Load New Customer Registration Form:Step1
 *
 *@access public
 *@return New Customer Registration Form:Step1
 */
    function add_customer($start=0) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $package_name = $this->input->post('package_name');
        $this->data['package_id'] = $this->input->post('package_id');
        $this->load->library('form_validation');    
        $basic_package_selection = array();
        $basic_package_selection['billing_module_cost'] = ""; 
        $basic_package_selection['letter_module_cost'] = ""; 
        $basic_package_selection['sms_module_cost'] = ""; 
        $basic_package_selection['member_fee_module_cost'] = "";          

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
                        $this->data['dynamicView'] = 'pages/admin/new_customer/package_selection';
                        $this->_commonPageLayout('frontend_viewer');
                    }
                }else{
                        $basic_package_selection_one['basic_package_selection'] = $basic_package_selection;        
                        $form_data = array(
                        'org_type' => "",
                        'org_number' => "",
                        'org_name' => "",
                        'org_email' => "",
                        'org_web' => "",
                        'org_mobile_phone' => "",
                        'org_land_phone' => "",
                        'org_description' => "",
                        'org_street_address' => "",                      
                        'org_zip' => "",
                        'org_city' => "",
                        'org_country' => "",
                        'org_bank_acc_no_one' => "",
                        'org_bank_acc_type_one' => "",
                        'add_date' =>""
                        );       
                        $this->load->vars($form_data);  
                        $this->load->vars($basic_package_selection_one);      
                        $this->data['dynamicView'] = 'pages/admin/new_customer/entry';
                        $this->_commonPageLayout('frontend_viewer');
                    }
            }     
         else{
                    $basic_package_selection_one['basic_package_selection'] = $basic_package_selection;        
                    $form_data = array(
                        'org_type' => "",
                        'org_number' => "",
                        'org_name' => "",
                        'org_email' => "",
                        'org_web' => "",
                        'org_mobile_phone' => "",
                        'org_land_phone' => "",
                        'org_description' => "",
                        'org_street_address' => "",                      
                        'org_zip' => "",
                        'org_city' => "",
                        'org_country' => "",
                        'org_bank_acc_no_one' => "",
                        'org_bank_acc_type_one' => "",
                        'add_date' =>""
                        );      
                    $this->load->vars($form_data);  
                    $this->data['org_type'] = "Government";
                    $this->load->vars($basic_package_selection_one);      
                    $this->data['dynamicView'] = 'pages/admin/new_customer/entry';
                    $this->_commonPageLayout('frontend_viewer');
                }       
}

 /**
 * Load New Customer Registration Form:Step2
 *
 *@access public
 *@return New Customer Registration Form:Step2
 */
 function added_customer_step2($start=0) {  
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $this->data['package_id'] = $this->input->post("package_id");
        $basic_package_selection = $this->input->post("basic_package_selection");        
        $basic_package_selection_two['basic_package_selection'] = $basic_package_selection;        
        $data['category_name'] = "";
        $to_date = date("Y-m-d H:i:s"); 
                
        $form_data = array(
            'org_type' => $this->input->post("org_type"),
            'org_number' => $this->input->post("org_number"),
            'org_name' => $this->input->post("org_name"),
            'org_email' => $this->input->post("org_email"),
            'org_web' => $this->input->post("org_web"),
            'org_mobile_phone' => $this->input->post("org_mobile_phone"),
            'org_land_phone' => $this->input->post("org_land_phone"),
            'org_description' => $this->input->post("org_description"),
            'org_street_address' => $this->input->post("org_street_address"),            
            'org_zip' => $this->input->post("org_zip"),
            'org_city' => $this->input->post("org_city"),
            'org_country' => $this->input->post("org_country"),         
            'add_date' =>$to_date
       );
         $form_data_address = array(            
            'street_address' => $this->input->post("org_street_address"),            
            'zip' => $this->input->post("org_zip"),
            'city' => $this->input->post("org_city"),
            'country' => $this->input->post("org_country"),         
       );
        if($this->input->post("org_category")!="" && $this->input->post("org_category")!="other"){
            $form_data['org_category'] = $this->input->post("org_category");
      }
      else{$data['category_name'] = $this->input->post("category_name");}  
  
       $form_data_one['organization_data'] = $form_data;
       $this->load->vars($basic_package_selection_two);
       $this->load->vars($form_data_one); 
       $this->load->vars($form_data);     
       $this->load->vars($data);   
       
        $this->load->library('form_validation');    
        if($this->input->post("org_category")!="other"){
            $this->form_validation->set_rules('org_category', $this->lang->line('label_category'), 'trim|required');
        }
    
         if($this->input->post("org_category")=="other"){
            $this->form_validation->set_rules('category_name', $this->lang->line('label_category'), 'trim|required');
   }

        //$this->form_validation->set_rules('package_name', $this->lang->line('label_package'), 'trim|required');
        $this->form_validation->set_rules('org_type',$this->lang->line('label_customer_type'), 'trim|required');
        $this->form_validation->set_rules('org_number',$this->lang->line('label_no'), 'trim|required|callback_org_no_check');
        $this->form_validation->set_rules('org_name', $this->lang->line('label_name'), 'trim|required|callback_org_name_check');
        $this->form_validation->set_rules('org_email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_org_email_check');
        $this->form_validation->set_rules('org_description', $this->lang->line('label_description'), 'trim|required');
        $this->form_validation->set_rules('org_street_address', $this->lang->line('label_street_address'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('org_mobile_phone', $this->lang->line('label_mobile_phone'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('org_land_phone', $this->lang->line('label_land_phone'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('org_bank_acc_no_one', $this->lang->line('label_bank_payment'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('org_bank_acc_type_one', $this->lang->line('label_bank_acc_type'), 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/new_customer/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                ///load form2
                 $form_data_step2= array(
                    'org_type' => "",
                    'first_name' => "",
                    'last_name' => "",
                    'dept_or_company_or_org_name' => "",
                    'dept_or_org_no' => "",
                    'username' => "",
                    'password' => "",
                    'email' => "",
                    'mobile_phone' => "",
                    'member_sex' => "",
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
                    'expire_date' =>"",
                    'add_date' =>""
                   );
                $this->load->vars($form_data_step2);
                $this->load->vars($form_data_address);
                $this->data['customer_type'] = "Government";
                $this->data['label_password_does_not_matched_error'] = "";
                $this->data['send_password'] = "send_password_now";
                $this->data['dynamicView'] = 'pages/admin/new_customer/entry_step2';
                $this->_commonPageLayout('frontend_viewer');
        }
}


/**
 * Load New Customer Registration Form:Step3
 *
 *@access public
 *@return New Customer Registration Form:Step3
 */
 function added_customer_step3($start=0) {   
        $data_organization['organization_data'] = $this->input->post("organization_data");        
        $data['category_name'] = $this->input->post("data_category");
        $this->data['package_id'] = $this->input->post("package_id");
        $this->data['label_password_does_not_matched_error'] ="";
        $basic_package_selection = $this->input->post("basic_package_selection");        
        //print_r($basic_package_selection); exit;
        $basic_package_selection_two['basic_package_selection'] = $basic_package_selection;                
        if(sizeof($data_organization['organization_data'])<=1){
            redirect("admin/info/add_customer");
        }   
        $this->load->library('form_validation');        
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $to_date = date("Y-m-d H:i:s");         
        $customer_type = $this->input->post("customer_type");        
        $form_data_step2= array(
                    'customer_type' => $customer_type,
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),                  
                    'username' => $this->input->post("username"),
                    'email' => $this->input->post("email"),
                    'mobile_phone' => $this->input->post("mobile_phone"),          
                    'dept_or_company_or_org_name' => "",
                    'dept_or_org_no' => "",
                    'password' => "",
                    'member_sex' => "",
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
                    'password_receive_by_email' =>$this->input->post("password_receive_by_email"),
                    'password_receive_by_sms' =>$this->input->post("password_receive_by_sms"),
                    'activation_date' =>"",
                    'expire_date' =>"",
                    'add_date' =>$to_date     
                   );        
        $send_password  =  $this->input->post("send_password");
        if($send_password=="create_password_now"){ 
            $password  =  $this->input->post("password");
            $retype_password  =  $this->input->post("retype_password");
            $form_data_step2['password'] = $password;
            $this->form_validation->set_rules('password', $this->lang->line('label_password'), 'trim|required');
            $this->form_validation->set_rules('retype_password', $this->lang->line('label_retype_password'), 'trim|required');
            if(!empty($password) && !empty($retype_password)){
                if($password!=$retype_password){ 
                    $this->data['label_password_does_not_matched_error'] = $this->lang->line('label_password_does_not_matched_error');
                }
            }
        }
        if($customer_type=="Private person"){
            $form_data_step2['ssn_or_person_no']  =  $this->input->post("ssn_or_person_no");
            $this->form_validation->set_rules('ssn_or_person_no', $this->lang->line('label_ssn_person_no'), 'trim|required|callback_check_person_number1');

        }else{
            $form_data_step2['dept_or_company_or_org_name'] =  $this->input->post("dept_or_company_or_org_name");
            $form_data_step2['dept_or_org_no']  =  $this->input->post("dept_or_org_no");
            $form_data_step2['member_position']  =  $this->input->post("member_position");
            if($customer_type=="Government"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_department_name'), 'trim|required'); }
            if($customer_type=="Company"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_company_name'), 'trim|required'); }
            if($customer_type=="Organization"){ $this->form_validation->set_rules('dept_or_company_or_org_name', $this->lang->line('label_organization_name'), 'trim|required'); }
        }        
        $form_data_step2['street_address']  =  $this->input->post("street_address");
        $form_data_step2['zip']  =  $this->input->post("zip");
        $form_data_step2['city']  =  $this->input->post("city");
        $form_data_step2['country']  =  $this->input->post("country");
        //$form_data_step2['land_line_phone']  =  $this->input->post("land_line_phone");     
         $form_data_address = array(            
            'street_address' => $data_organization['organization_data']['org_street_address'],            
            'zip' => $data_organization['organization_data']['org_zip'],
            'city' => $data_organization['organization_data']['org_city'],
            'country' => $data_organization['organization_data']['org_country'],         
       );
      
        $data_admin_user['admin_user_data'] = $form_data_step2;
        $this->load->vars($form_data_step2);   
        $this->load->vars($data_admin_user);     
        $this->load->vars($data_organization);   
        $this->load->vars($data_organization['organization_data']);   
        $this->load->vars($basic_package_selection_two);
        $this->load->vars($data);   
        $this->form_validation->set_rules('customer_type', $this->lang->line('label_customer_type'), 'trim|required');
        $this->form_validation->set_rules('first_name', $this->lang->line('label_first_name'), 'trim|required');
        $this->form_validation->set_rules('last_name',$this->lang->line('label_last_name'), 'trim|required');
        $this->form_validation->set_rules('email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_email_check');
        $this->form_validation->set_rules('username',$this->lang->line('label_username'), 'trim|required|callback_login_username_check');
        if(empty($form_data_step2['password_receive_by_email']) && empty($form_data_step2['password_receive_by_sms'])){
           $this->form_validation->set_rules('password_receive_by_sms', $this->lang->line('label_password_receive_by'), 'trim|required|xss_clean');
        }
       
        if ($this->form_validation->run() == FALSE || $this->data['label_password_does_not_matched_error']) {
            $this->data['send_password'] = $send_password;
            $this->load->vars($form_data_address);   
            $this->data['dynamicView'] = 'pages/admin/new_customer/entry_step2';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                ///load form3  'use_account_info_billing' => "use_account_info_billing", 'billing_terms_condition' => "",
                $form_data_step3 = array(
                    'billing_terms_condition' => "",
                    'bill_first_name' => $this->input->post("first_name"),
                    'bill_last_name' => $this->input->post("last_name"),
                    'bill_mobile_phone' => $this->input->post("mobile_phone"),
                    'bill_email' => $this->input->post("email"),
                    'bill_street_address' => $this->input->post("street_address"),
                    'bill_zip' => $this->input->post("zip"),
                    'bill_city' => $this->input->post("city"),
                    'bill_country' => $this->input->post("country"),
                    'add_date' =>""
                );
                $error_credit_card = array();
                $error_credit_card['credit_card_type_unknown_error'] ="";
                $error_credit_card['credit_card_no_error'] ="";
                $error_credit_card['credit_card_cvv2_wrong_error'] = "";
                $error_credit_card['credit_card_expired_error'] = "";
                $payment_method = "invoice";
                $this->load->vars($error_credit_card);   
                $this->data['payment_method'] = $payment_method;
                $this->load->vars($form_data_step3);                   
                $this->data['dynamicView'] = 'pages/admin/new_customer/entry_step3';
                $this->_commonPageLayout('frontend_viewer');
        }
}

/**
 * New Customer Registration Form:Step4 and it's final step
 *
 *@access Private
 *@return Confirmation or Error Message
 */
 function added_customer_step4($start=0) {          
        $to_date = date("Y-m-d H:i:s"); 
        $this->load->library('form_validation'); 
        $assigned_package_data = array();
        $data_organization['organization_data'] = $this->input->post("organization_data");               
        $data_admin_user['admin_user_data'] = $this->input->post("admin_user_data");          
        $data['category_name'] = $this->input->post("data_category");        
        $this->data['package_id'] = $this->input->post("package_id");          
        $basic_package_selection = array();
        $basic_package_selection['billing_module_cost'] = ""; 
        $basic_package_selection['letter_module_cost'] = ""; 
        $basic_package_selection['sms_module_cost'] = ""; 
        $basic_package_selection['member_fee_module_cost'] = "";       
        $basic_package_selection = $this->input->post("basic_package_selection");    
        $basic_package_selection_two['basic_package_selection'] = $basic_package_selection;  
        //print_r($basic_package_selection); $assigned_package_data;
        
        if(sizeof($data_organization['organization_data'])<=1 || sizeof($data_admin_user['admin_user_data'])<=1){
            redirect("main/add_customer");
        }              
        $card_info['credit_card_no']    = $this->input->post("credit_card_no");
        $card_info['credit_card_type'] = $this->input->post("credit_card_type");
        $card_info['credit_card_verification_code'] = $this->input->post("credit_card_verification_code");
        $card_info['card_expire_date_month'] = $this->input->post("card_expire_date_month");
        $card_info['card_expire_date_year'] = $this->input->post("card_expire_date_year");        
        $billing_data = $this->input->post("admin_user_data");
        $form_data_billing = array(
                'billing_terms_condition' => "",
                'bill_first_name' => $billing_data["first_name"],
                'bill_last_name' => $billing_data["last_name"],
                'bill_mobile_phone' => $billing_data["mobile_phone"],
                'bill_email' => $billing_data["email"],
                'bill_street_address' => $billing_data["street_address"],
                'bill_zip' => $billing_data["zip"],
                'bill_city' => $billing_data["city"],
                'bill_country' => $billing_data["country"],
                'add_date' =>$to_date
            );                
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';        
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
        $this->load->vars($data_admin_user);  
        $this->load->vars($data_organization);                               
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
                $this->load->vars($data);  
                $this->load->vars($error_credit_card);  
                $this->load->vars($form_data_billing);  
            
                $this->data['dynamicView'] = 'pages/admin/new_customer/entry_step3';
                $this->_commonPageLayout('frontend_viewer');
        } else {
                ///Organization Registration Final Step
                $password =  $data_admin_user['admin_user_data']['password']; 
                if(empty($password)){
                    $first_name = $data_admin_user['admin_user_data']['first_name'];
                    $rand_no = mt_rand(1000000000, 2000000000);
                    $first_name = substr($first_name, 0, 2);
                    $password = $first_name . $rand_no;
                }
                $password2 = $this->encrypt($password,'vaccitvassit'); 
                $data_admin_user['admin_user_data']['password'] = $password2;
                //$data_admin_user['admin_user_data']['admin_user'] = 1;                 
                //$rand_pass = base64_encode($c);                   
                /*
                $data_global_settings['global_settings_data'] = $this->info_model->get_global_settings();                
                if($data_global_settings['global_settings_data']){
                    foreach($data_global_settings['global_settings_data'] as $rows){
                        $data_organization['organization_data']['org_allowed_sms_per_month'] = $rows->allowed_sms_per_month;
                        $data_organization['organization_data']['org_allowed_letter_per_month'] = $rows->allowed_letter_per_month;
                        $per_invoice_cost = $rows->per_invoice_cost;                        
                    }                    
                } */
                
               // print_r($data_organization['organization_data']); exit;
                if($data['category_name']!=""){
                    $data_val['category_name'] = $data['category_name'];
                    $cat_id = $this->info_model->org_category_insert($data_val);
                    $data_organization['organization_data']['org_category'] = $cat_id;
                }
                $last_insert_ids = $this->info_model->register_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4);
                //$this->load->vars($form_data_step3);
                if(sizeof($last_insert_ids)>0){
                    $org_id = $last_insert_ids['org_id'];
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
                                $assigned_package_data['mem_id'] = $last_insert_ids['mem_id'];
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
                                
                                $data_payment_success['org_id'] = $last_insert_ids['org_id'];
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
                                                $data_update = array('approval_status' =>1, 'payment_status' =>1,'activation_date'=>$activation_date,'expire_date'=>$expire_date);     
                                                $success = $this->info_model->update_org_approve($data_update, $last_insert_ids['org_id']); 
                                                $data_update_member = array('activation_date'=>$activation_date,'expire_date'=>$expire_date);     
                                                $success = $this->info_model->update_member($data_update_member, $last_insert_ids['mem_id']); 
                                                $update_assigned_package = array('activation_date'=>$activation_date,'expire_date'=>$expire_date,'active' => 1);
                                                $success = $this->info_model->update_package_assigned_to_org_member($update_assigned_package, $assigned_package_success_insert_id);   
                                                if($success){
                                                    $data['first_name']=$data_admin_user['admin_user_data']['first_name'];
                                                    $data['username']=$data_admin_user['admin_user_data']['username'];
                                                    $data['email']=$data_admin_user['admin_user_data']['email'];                                    
                                                    $data['org_number']=$data_organization['organization_data']['org_number'];
                                                    $data['org_name']=$data_organization['organization_data']['org_name'];                                    
                                                    $data['bill_mobile_phone']=$data_organization['organization_data']['bill_mobile_phone'];;                
                                                    $data['password']= $password;    
                                    
                                                    if($data_admin_user['admin_user_data']['password_receive_by_email']){                                             
                                                        $this->send_password_by_email($data);
                                                    }
                                                    if($data_admin_user['admin_user_data']['password_receive_by_sms']){
                                                        $this->send_password_by_sms($data);
                                                    } 
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
                                $data_payment_failure['org_id'] = $last_insert_ids['org_id'];
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
                    //$fak_expire_date = time() + ($total_days * 24 * 60 * 60);                    
                    $data_faktura['bill_country'] = $form_data_step4['bill_country'];
                    if($data_faktura['bill_country']=="DEU"){$data_faktura['bill_country'] = "GERMAN";}
                    if($data_faktura['bill_country']=="NOR"){$data_faktura['bill_country'] = "NORWAY";}
                    if($data_faktura['bill_country']=="DNK"){$data_faktura['bill_country'] = "DENMARK";}
                    if($data_faktura['bill_country']=="FIN"){$data_faktura['bill_country'] = "FINLAND";}
                    if($data_faktura['bill_country']=="GBR"){$data_faktura['bill_country'] = "UK";}
                    if($data_faktura['bill_country']=="SWE"){$data_faktura['bill_country'] = "SWEDEN";} 
                    $data_faktura['org_id'] = $last_insert_ids['org_id'];
                    $data_faktura['package_assigned_id'] = $assigned_package_success_insert_id;
                    $data_faktura['fak_active_date'] = time();
                    $data_faktura['fak_expire_date'] = time() + (10 * 24 * 60 * 60);
                    $data_faktura['org_name'] = $data_organization['organization_data']['org_name'];
                    $data_faktura['org_number'] = $data_organization['organization_data']['org_number'];    
                    $data_faktura['bill_street_address'] = $form_data_step4['bill_street_address'];
                    $data_faktura['bill_zip'] = $form_data_step4['bill_zip'];
                    $data_faktura['bill_city'] = $form_data_step4['bill_city'];                    
                    $data_faktura['bill_mobile_phone'] = $form_data_step4['bill_mobile_phone'];
                    $data_faktura['fak_reference_name'] = $data_admin_user['admin_user_data']['first_name']." ".$data_admin_user['admin_user_data']['last_name'];
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
                        $data['first_name']=$data_admin_user['admin_user_data']['first_name'];
                        $data['username']=$data_admin_user['admin_user_data']['username'];
                        $data['email']=$data_admin_user['admin_user_data']['email'];                                    
                        $data['org_number']=$data_organization['organization_data']['org_number'];
                        $data['org_name']=$data_organization['organization_data']['org_name'];                                    
                        $data['org_mobile_phone']=$data_organization['organization_data']['org_mobile_phone'];;                
                        $data['password']= $password;                           
                        $this->make_invoice_pdf($data_faktura,$fak_insert_id,$data);                        
                    }
                }                
                //////////////// Payment Method: End /////               
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_registration_member_success').'</div>');
                    redirect('admin/info/view_registered_customer');
                    //$this->data['dynamicView'] = 'pages/admin/new_customer/org_registration_success';
                }
                else{$this->data['dynamicView'] = 'pages/admin/new_customer/entry_step3';}                     
                $this->_commonPageLayout('frontend_viewer');
        }
}
   function make_invoice_pdf($data_faktura,$fak_insert_id,$data){   
     include_once 'MPDF/create_faktura.php';
    $file_name = "invoice_".$data_faktura['org_name'].'_'.$data_faktura['org_number'].'_'.$fak_insert_id.'.pdf';
    $this->send_invoice_by_email($data,$content,$file_name);
  
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
            $this->load->model('admin/users', 'users');
            $users_email = $this->users->check_email1($email);
            if($users_email->num_rows() > 0){
                echo "<font color='red'>".$this->lang->line('email_exists_error_msg')."</font>";
            }else{ echo "<font color='green'>".$this->lang->line('email_available_msg')."</font>"; }
        }else{ echo "<font color='red'>".$this->lang->line('email_required_msg')."</font>"; }        
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
            $this->load->model('admin/users', 'users');
            $user_name = $this->users->check_uname($username);
            if($user_name->num_rows() > 0){
            echo "<font color='red'>".$this->lang->line('username_exists_error_msg')."</font>";
            }else{ echo "<font color='green'>".$this->lang->line('username_available_msg')."</font>"; }
        }else{ echo "<font color='red'>".$this->lang->line('username_required_msg')."</font>"; }         
       
}

  function org_name_check($org_name) {

        $result = $this->dx_auth->is_org_name_available($org_name);
        if (!$result) {
            $this->form_validation->set_message('org_name_check', $this->lang->line('org_name_exists_msg'));
        }

        return $result;
}

function org_no_check($org_number) {

        $result = $this->dx_auth->is_org_no_available($org_number);
        if (!$result) {
            $this->form_validation->set_message('org_no_check', $this->lang->line('org_no_exists_msg'));
        }

        return $result;
}

function email_check_by_org_id($email,$org_id) {        
        $result = $this->dx_auth->is_email_available_by_org_id($email,$org_id);
        if (!$result) {
            $this->form_validation->set_message('email_check_by_org_id', $this->lang->line('email_exists_error_msg'));
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

function org_email_check($org_email) {        
        $result = $this->dx_auth->is_email_available1($org_email);
        if (!$result) { 
            $this->form_validation->set_message('org_email_check', $this->lang->line('email_exists_error_msg'));
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


  function login_username_check_by_org_id($username,$org_id) {
      
        $result = $this->dx_auth->login_username_check_by_org_id($username,$org_id);
        if (!$result) {
            $this->form_validation->set_message('login_username_check_by_org_id', $this->lang->line('username_exists_error_msg'));
        }

        return $result;
}

function check_person_number1($person_number) {
        $result = $this->dx_auth->is_person_number_available1($person_number);
        if (!$result) {
            $this->form_validation->set_message('check_person_number1', $this->lang->line('pno_exists_error_msg'));
        }

        return $result;
}


function check_person_number_by_org_id($person_number,$org_id) {
        $result = $this->dx_auth->is_person_number_available_by_org_id($person_number,$org_id);
        if (!$result) {
            $this->form_validation->set_message('check_person_number_by_org_id', $this->lang->line('pno_exists_error_msg'));
        }

        return $result;
}

function billing_terms_condition_check($billing_terms_condition) {        
        if ($billing_terms_condition=="") {
            $this->form_validation->set_message('billing_terms_condition_check', $this->lang->line('label_billing_terms_condition'));
            return FALSE;
        }
        else
            return TRUE;
}




/**
 * Admin Communication with organization: E-mail Send to Individual with multiple attached file
 *
 *@Param $email_data[] , $attachment_name[] , $attachedfile[]
 *@access private
 *@return Confirmation or Error Message
 */
 
function admin_communicate_org_email_to_individual($email_data,$attachment_name,$attachedfile){
    $this->lang->load('common', $this->session->userdata('lang_file'));                
    $emailfrom ="admin@adminscentral.com";       
    $subject=$email_data['email_subject']."\n\n";	
    // email fields: to, from, subject, and so on
    $to = $email_data['receiver_email'];
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
    $ok = @mail($to, $subject, $message, $headers); 
    /////////////////////////////////
 
}

/**
 * Send password to org_admin by E-mail
 *
 *@access public
 *@return Confirmation or Error Message
 */
 
function send_password_by_email($data){
    $this->lang->load('common', $this->session->userdata('lang_file'));                
    $emailfrom ="admin@adminscentral.com";       
    $subject=$this->lang->line('email_registration_confirmation_subject')."\n\n";	
	$message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>".$this->lang->line('email_registration_confirmation_subject')."</b></td></tr></table>"."\n";
	$message .="<p>".$this->lang->line('email_registration_confirmation_dear')." ".$data['first_name'].",</p>"."\n";
    $message .="<p>".$this->lang->line('email_registration_confirmation_congratulation_msg')."</p>"."\n";
	
    $message .= "<p>".$this->lang->line('email_registration_confirmation_org_details_msg').": </p>\n";
    $message .="<p><b>".$this->lang->line('label_organization'). " ".$this->lang->line('label_no').":  </b>".$data['org_number']."</p>\n";
	$message .="<p><b>".$this->lang->line('label_organization'). " ".$this->lang->line('label_name').":   </b>".$data['org_name']."</p>\n";
	$message .="<p><b>".$this->lang->line('label_admin_user').": </b>".$data['username']."</p>\n";
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
  
   //echo $message; exit;
    
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



/**
 * Send invoice by E-mail
 *
 *@access public
 *@return Confirmation or Error Message 
*/
 
function send_invoice_by_email($data,$content,$file_name){
    $this->lang->load('common', $this->session->userdata('lang_file'));                
    $emailfrom ="admin@adminscentral.com";       
    $subject=$this->lang->line('email_invoice_sent_subject')."\n\n";	
	$message  = "<html><body>";
    $message .="<table cellpadding='0' cellspacing='0' bgcolor=#319d00 width='100%' style='margin:0 auto'><tr style='font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px; color: rgb(255,255,255); line-height: 140%;'><td width='23'></td><td><span>".$this->lang->line('site_logo')."</span></td></tr></table>"."\n\n";
	$message .= "<table cellpadding='0' cellspacing='0' width='660' style='margin:0 auto'><br/><br/>";
	$message .= "<tr><td font-family: Arial,Helvetica,sans-serif; padding-top:18px; font-size:25px; color:rgb(102,102,102);><b>".$this->lang->line('email_invoice_sent_subject')."</b></td></tr></table>"."\n";
	$message .="<p>".$this->lang->line('email_registration_confirmation_dear')." ".$data['first_name'].",</p>"."\n";
    //$message .="<p>".$this->lang->line('email_registration_confirmation_congratulation_msg')."</p>"."\n";	
    $message .= "<p>".$this->lang->line('email_registration_confirmation_org_details_msg').": </p>\n";
    $message .="<p><b>".$this->lang->line('label_organization'). " ".$this->lang->line('label_no').":  </b>".$data['org_number']."</p>\n";
	$message .="<p><b>".$this->lang->line('label_organization'). " ".$this->lang->line('label_name').":   </b>".$data['org_name']."</p>\n";	
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


 /**
 *Load restriction_on_sms_letter Form
 *
 *@param $org_id which conatins org_id
 *@access public
 *@return restriction_on_sms_letter Form
 */ 
    function restriction_on_sms_letter($org_id) {
        $this->lang->load('configuration', $this->session->userdata('lang_file'));
        $data['mainTab'] = 'customer';
        $data['activeTab'] = 'customer';
        $data['org_id'] = $org_id;
        $data['query1'] = $this->info_model->get_registered_customer($org_id);    
        $this->load->vars($data);	
        $this->data['dynamicView'] = 'pages/admin/registered_customer/restriction_on_sms_letter';
        $this->_commonPageLayout('frontend_viewer');
}

/**
 *Update Organization by Setting the field of Table: organization_info , field1: org_allowed_sms_per_month,field2: org_allowed_letter_per_month
 *
 *@access public
 *@return restriction_on_sms_letter Form
 */ 
    function restriction_on_sms_letter_saved() {        
        $org_id = $this->input->post("org_id");
        $data = array('org_allowed_sms_per_month'=>$this->input->post("org_allowed_sms_per_month"),
                                'org_allowed_letter_per_month'=>$this->input->post("org_allowed_letter_per_month") );
        $success = $this->info_model->update_org_approve($data,$org_id);  
        if($success){
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_sms_letter_restriction_success').'</div>');
        }
       else{
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_sms_letter_restriction_failure').'</div>');
        }
    redirect('admin/info/view_registered_customer', 'location', 301);
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
    $content .="<p>".$this->lang->line('email_registration_confirmation_congratulation_msg')."</p>"."\n";
	$content .="<p><b>".$this->lang->line('label_organization'). " ".$this->lang->line('label_name').":   </b>".$data['org_name']."</p>\n";
	$content .="<p><b>".$this->lang->line('label_admin_user').": </b>".$data['username']."</p>\n";
	$content .="<p><b>".$this->lang->line('label_password').": </b>".$data['password']."</p>\n\n";
	$content .="<p>".$this->lang->line('org_site_link_msg').": </p>\n";
    $content .="<a style='font-weight:bold;font-size:14px;' href='".base_url()."'>".base_url()."</a></p>"."\n";
    $priority = 2;
    $c = $this->multiple_receipient($konto, $pass, $from_phone, $data['org_phone'], $content, $priority);
}


/**
 * Get Contact Site admin messages
 *
 *@access private
 *@return Contact Site admin messages
 */

    function inbox_contact_site_admin() {
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'contact_site_admin';
        $this->data['num_of_inbox_message'] = $this->info_model->get_no_of_site_admin_contact_message();
        $this->data['all_messages'] = $this->info_model->get_site_admin_contact_all_messages();
        $this->data['dynamicView'] = 'pages/admin/contact_site_admin/inbox_contact_site_admin';
        $this->_commonPageLayout('frontend_viewer');
    } 
    
    
function multiple_receipient($konto, $pass, $from, $phone_number, $content, $priority) {
        $proxyhost = "";
        $proxyport = "";
        $proxyusername = "";
        $proxypassword = "";
        require_once(APPPATH . 'libraries/nusoap/nusoap' . EXT);
        $params = array('konto' => $konto, 'passwd' => $pass, 'till' => trim($phone_number), 'from' => $from, 'meddelande' => $content, 'prio' => $priority);
        // echo "<pre>";print_r($params);die();
        $wsdlurl = "http://web.smscom.se/sendSms/sendSms.asmx?WSDL";
        //$client = new nusoap_client($wsdlurl, 'wsdl');
        $client = new nusoap_client($wsdlurl, 'wsdl', $proxyhost, $proxyport, $proxyusername, $proxypassword);
        $client->authtype = 'certificate';
        $client->decode_utf8 = 0;
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call("sms", $params);
        return $result['smsResult'];
    }

 protected function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/site_top_logo', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_menu', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );
        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
	}
}
