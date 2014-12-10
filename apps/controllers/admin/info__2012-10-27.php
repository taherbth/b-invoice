<?php

include_once 'BaseController.php';

class info extends BaseController {

    function info() {
       parent::__construct();
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
                    'sms_cost' => "",
                    'letter_cost' => "",
                    'currency_id' => ""                    
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
        $this->form_validation->set_rules('no_of_member', $this->lang->line('label_no_of_member'), 'trim|required|integer|xss_clean');
        $this->form_validation->set_rules('duration', $this->lang->line('label_duration'), 'trim|required|integer|xss_clean');
        $this->form_validation->set_rules('amount', $this->lang->line('label_subscription_fee'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('sms_cost', $this->lang->line('sms_cost_err_msg'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('letter_cost', $this->lang->line('letter_cost_err_msg'), 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('currency_id', $this->lang->line('label_currency'), 'trim|required|xss_clean');
        $to_date = date("Y-m-d H:i:s"); 
        $form_data = array(                    
                    'package_name' => ucfirst($this->input->post('package_name')),
                    'no_of_member' => $this->input->post('no_of_member'),
                    'amount' => $this->input->post('amount'),
                    'duration' => $this->input->post('duration'),
                    'sms_cost' => $this->input->post('sms_cost'),
                    'letter_cost' => $this->input->post('letter_cost'),
                    'currency_id' => $this->input->post('currency_id'),
                    'add_date' =>$to_date
       );     
     
        if ($this->form_validation->run() == FALSE) {
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
            // $val->set_rules('package_name', 'Package Name', 'trim|required|callback_check_package_name');
            $this->form_validation->set_rules('package_name', $this->lang->line('label_package_name'), 'trim|required');
            $this->form_validation->set_rules('no_of_member', $this->lang->line('label_no_of_member'), 'trim|required|integer|xss_clean');
            $this->form_validation->set_rules('duration', $this->lang->line('label_duration'), 'trim|required|integer|xss_clean');
            $this->form_validation->set_rules('amount', $this->lang->line('label_subscription_fee'), 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('sms_cost', $this->lang->line('sms_cost_err_msg'), 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('letter_cost', $this->lang->line('letter_cost_err_msg'), 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('currency_id', $this->lang->line('label_currency'), 'trim|required|xss_clean');
            
            if ($val->run()) {
                $form_data = array(                    
                    'package_name' => ucfirst($this->input->post('package_name')),
                    'no_of_member' => $this->input->post('no_of_member'),
                    'amount' => $this->input->post('amount'),
                    'duration' => $this->input->post('duration'),
                    'sms_cost' => $this->input->post('sms_cost'),
                    'letter_cost' => $this->input->post('letter_cost'),
                    'currency_id' => $this->input->post('currency_id')                    
                );
                $this->data['p_info'] = $this->info_model->get_existing_package($this->input->post('package_name'),$this->input->post('id'));
                if (count($this->data['p_info'])) {
                    $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('package_exists_error_msg').'</div>');
                    redirect('admin/info/package_edit/'.$id);
                } 
                else{
                    $this->info_model->package_update($form_data);
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

//Show new customer List
    function view_organisation_message() {
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'message';
        $this->data['query1'] = $this->info_model->get_new_customer_orders($org_id="");
        $this->data['dynamicView'] = 'pages/admin/registered_customer/show';
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

    function approve_org($org_id) {
        $this->data['mainTab'] = 'orders';
        $this->data['activeTab'] = 'message';   
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $package_info =  $this->info_model->get_package_info($org_id);        
        if($package_info){
            foreach($package_info as $row){
                $package_duration = $row->duration;
                $total_days = $package_duration*30;
            }
        }
             
       $expire_date= time() + ($total_days * 24 * 60 * 60);
       $data = array('approval_status' =>1, 'payment_status' =>1,'activation_date'=>time(),'expire_date'=>$expire_date);     
       $success = $this->info_model->update_org_approve($data, $org_id);
        if($success){         
            $org_info = $this->info_model->get_new_customer_orders($org_id);
            foreach($org_info as $rows){
                $data['first_name']=$rows->first_name;
                $data['org_number']=$rows->org_number;
                $data['org_name']=$rows->org_name;
                $data['username']=$rows->username;
                $data['email']=$rows->email;
                $data['org_phone']=$rows->org_phone;                
                $data['password']= $this->decrypt($rows->password,"vaccitvassit");    
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
                $data1 = array('previlige_status' => 2);
                $this->info_model->org_previlige_update($data1);
                
                ///TAHER
                //redirect('admin/info/viewed_org_previlize/'.$org_id);
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
            'forum_manual_comments' => $this->input->post("forum_manual_comments"),
           
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
            'external_mainboard' => $this->input->post("external_mainboard")
            
        );
        //echo "<pre>";print_r($data);die();
        $this->info_model->org_previlige_setting_update($data);
        $this->session->set_flashdata('message', '<div id="message1">Previlize settings updated successfully.</div>');
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
        $this->data['dynamicView'] = 'pages/admin/billing/billing_form';
        $this->_commonPageLayout('frontend_viewer');
    }

    function viewed_org_bill() {
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
    }
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
 * Load New Customer Registration Form:Step1
 *
 *@access public
 *@return New Customer Registration Form:Step1
 */
    function add_customer($start=0) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        
        $form_data = array(
        'package_name' => "",
        'org_number' => "",
        'org_name' => "",
        'org_description' => "",
        'org_primary_address' => "",
        'org_optional_address' => "",
        'org_phone' => "",
        'org_zip' => "",
        'org_city' => "",
        'org_country' => "",
        'org_bank_acc_no' => "",
        'org_bank_acc_type' => "",
        'add_date' =>""
       );
       
        $data['package_info'] = $this->info_model->get_package($id="");
        $this->load->vars($form_data);  
        $this->load->vars($data);      
        $this->data['dynamicView'] = 'pages/admin/new_customer/entry';
        $this->_commonPageLayout('frontend_viewer');
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
        $data['package_info'] = $this->info_model->get_package($id="");
        $to_date = date("Y-m-d H:i:s"); 
                
        $form_data = array(
        'package_name' => $this->input->post("package_name"),
        'org_number' => $this->input->post("org_number"),
        'org_name' => $this->input->post("org_name"),
        'org_description' => $this->input->post("org_description"),
        'org_primary_address' => $this->input->post("org_primary_address"),
        'org_optional_address' => $this->input->post("org_optional_address"),
        'org_phone' => $this->input->post("org_phone"),
        'org_zip' => $this->input->post("org_zip"),
        'org_city' => $this->input->post("org_city"),
        'org_country' => $this->input->post("org_country"),
         'org_bank_acc_no' => $this->input->post("org_bank_acc_no"),
        'org_bank_acc_type' =>$this->input->post("org_bank_acc_type"),
        'add_date' =>$to_date
       );
    
       $form_data_one['organization_data'] = $form_data;
       $this->load->vars($form_data_one); 
       $this->load->vars($form_data);     
       $this->load->vars($data);   
       
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('package_name', $this->lang->line('label_package'), 'trim|required');
        $this->form_validation->set_rules('org_number',$this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_no'), 'trim|required|callback_org_no_check');
        $this->form_validation->set_rules('org_name', $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_name'), 'trim|required|callback_org_name_check');
        $this->form_validation->set_rules('org_description', $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_description'), 'trim|required');
        $this->form_validation->set_rules('org_primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', $this->lang->line('label_phone'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_bank_acc_no', $this->lang->line('label_bank_acc_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_bank_acc_type', $this->lang->line('label_bank_acc_type'), 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/new_customer/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                ///load form2
                 $form_data_step2= array(
                    'first_name' => "",
                    'last_name' => "",
                    'phone_no' => "",
                    'email' => "",
                    'username' => "",
                    'person_number' => "",
                    'primary_address' => "",
                    'optional_address' => "",
                    'zip' => "",
                    'city' => "",
                    'country' => "",
                    'password_receive_by' =>"",
                    'add_date' =>""
                   );
                $this->load->vars($form_data_step2);
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
                
        if(sizeof($data_organization['organization_data'])<=1){
            redirect("admin/info/add_customer");
        }   
        
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $to_date = date("Y-m-d H:i:s"); 
        $form_data_step2 = array(
                    
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
                    'password_receive_by_email' =>$this->input->post("password_receive_by_email"),
                    'password_receive_by_sms' =>$this->input->post("password_receive_by_sms"),
                    'add_date' =>$to_date
                   );
                   
        //print_r($form_data_step2);
        
        $data_admin_user['admin_user_data'] = $form_data_step2;
        $this->load->vars($form_data_step2);   
        $this->load->vars($data_admin_user);     
        $this->load->vars($data_organization);     
      
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('first_name', $this->lang->line('label_first_name'), 'trim|required');
        $this->form_validation->set_rules('last_name',$this->lang->line('label_last_name'), 'trim|required');
        $this->form_validation->set_rules('phone_no', $this->lang->line('label_phone'), 'trim|required');
        $this->form_validation->set_rules('email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_email_check');
        $this->form_validation->set_rules('username',$this->lang->line('label_username'), 'trim|required|callback_login_username_check');
        $this->form_validation->set_rules('person_number', $this->lang->line('label_person_no'), 'trim|required|callback_check_person_number1');
        $this->form_validation->set_rules('primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        if(empty($form_data_step2['password_receive_by_email']) && empty($form_data_step2['password_receive_by_sms'])){
           $this->form_validation->set_rules('password_receive_by_sms', $this->lang->line('label_password_receive_by'), 'trim|required|xss_clean');
        }
       
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/new_customer/entry_step2';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                ///load form3  'use_account_info_billing' => "use_account_info_billing", 'billing_terms_condition' => "",
                $form_data_step3 = array(
                    'billing_terms_condition' => "",
                    'bill_first_name' => $this->input->post("first_name"),
                    'bill_last_name' => $this->input->post("last_name"),
                    'bill_phone_no' => $this->input->post("phone_no"),
                    'bill_email' => $this->input->post("email"),
                    'bill_primary_address' => $this->input->post("primary_address"),
                    'bill_optional_address' => $this->input->post("optional_address"),
                    'bill_zip' => $this->input->post("zip"),
                    'bill_city' => $this->input->post("city"),
                    'bill_country' => $this->input->post("country"),
                    'add_date' =>""
                );
                
                $this->load->vars($form_data_step3);   
                $this->data['dynamicView'] = 'pages/admin/new_customer/entry_step3';
                $this->_commonPageLayout('frontend_viewer');
        }
}

/**
 * New Customer Registration Form:Step4 and it's final step
 *
 *@access public
 *@return Confirmation or Error Message
 */
 function added_customer_step4($start=0) {  
 
        $data_organization['organization_data'] = $this->input->post("organization_data");       
        $data_admin_user['admin_user_data'] = $this->input->post("admin_user_data");
       
        if(sizeof($data_organization['organization_data'])<=1 || sizeof($data_admin_user['admin_user_data'])<=1){
            redirect("admin/info/add_customer");
        }   
        
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        $to_date = date("Y-m-d H:i:s"); 
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
                    'billing_terms_condition' => $this->input->post("billing_terms_condition"),
                    'add_date' =>$to_date
                   );                   
        
        $data_billing_address['billing_address_data'] = $form_data_step4;
        $this->load->vars($form_data_step4);   
        $this->load->vars($data_admin_user);  
        $this->load->vars($data_organization);     
             
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('bill_first_name', $this->lang->line('label_first_name'), 'trim|required');
        $this->form_validation->set_rules('bill_last_name',$this->lang->line('label_last_name'), 'trim|required');
        $this->form_validation->set_rules('bill_phone_no', $this->lang->line('label_phone'), 'trim|required');
        $this->form_validation->set_rules('bill_email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_email_check');
        $this->form_validation->set_rules('bill_primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        //$this->form_validation->set_message('required', $this->lang->line('label_billing_terms_condition'));
        $this->form_validation->set_rules('billing_terms_condition', $this->lang->line('label_billing_terms_condition'), 'trim|xss_clean|callback_billing_terms_condition_check');
                     
        if ($this->form_validation->run() == FALSE) {
                $billing_data = $this->input->post("admin_user_data");
                $form_data_billing = array(
                        'billing_terms_condition' => "",
                        'bill_first_name' => $billing_data["first_name"],
                        'bill_last_name' => $billing_data["last_name"],
                        'bill_phone_no' => $billing_data["phone_no"],
                        'bill_email' => $billing_data["email"],
                        'bill_primary_address' => $billing_data["primary_address"],
                        'bill_optional_address' => $billing_data["optional_address"],
                        'bill_zip' => $billing_data["zip"],
                        'bill_city' => $billing_data["city"],
                        'bill_country' => $billing_data["country"],
                        'add_date' =>$to_date
                    );                
                $this->load->vars($form_data_billing);  
            
            $this->data['dynamicView'] = 'pages/admin/new_customer/entry_step3';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                ///Organization Registration Final Step
                $data_global_settings['global_settings_data'] = $this->info_model->get_global_settings();
               // print_r($data['global_settings_data']);
                if($data_global_settings['global_settings_data']){
                    foreach($data_global_settings['global_settings_data'] as $rows){
                        $data_organization['organization_data']['org_allowed_sms_per_month'] = $rows->allowed_sms_per_month;
                        $data_organization['organization_data']['org_allowed_letter_per_month'] = $rows->allowed_letter_per_month;
                    }                    
                }             
                $first_name = $data_admin_user['admin_user_data']['first_name'];
                $rand_no = mt_rand(1000000000, 2000000000);
                $first_name = substr($first_name, 0, 2);
                $password = $first_name . $rand_no;
                $password = $this->encrypt($password,'vaccitvassit');
                $data_admin_user['admin_user_data']['password'] = $password;
                $data_admin_user['admin_user_data']['admin_user'] = 1;
                
                 
                //$rand_pass = base64_encode($c);                 
                $success = $this->info_model->register_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4);
                //$this->load->vars($form_data_step3);
                if($success){
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_registration_success').'</div>');
                    redirect('admin/info/view_registered_customer');
                    //$this->data['dynamicView'] = 'pages/admin/new_customer/org_registration_success';
                }
                else{$this->data['dynamicView'] = 'pages/admin/new_customer/entry_step3';}                
                $this->_commonPageLayout('frontend_viewer');
        }
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

function email_check($email) {
        $result = $this->dx_auth->is_email_available1($email);
        if (!$result) {
            $this->form_validation->set_message('email_check', $this->lang->line('email_exists_error_msg'));
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

function check_person_number1($person_number) {
        $result = $this->dx_auth->is_person_number_available1($person_number);
        if (!$result) {
            $this->form_validation->set_message('check_person_number1', $this->lang->line('pno_exists_error_msg'));
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
  
    //echo $message;
    
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