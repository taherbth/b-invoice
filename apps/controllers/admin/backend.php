<?php
include_once 'BaseController.php';
class Backend extends BaseController {
    // Used for registering and changing password form validation
    var $min_username = 3;
    var $max_username = 20;
    var $min_password = 4;
    var $max_password = 20;

    function backend() {	
    
		 parent::__construct();
         $this->load->model('admin/users');
         $this->load->model('admin/info_model');

        if ($this->session->userdata('uid') == "") {
				redirect('admin/home');
        }
       else if($this->session->userdata('user_type_id')!=0){
           $admin_user_previlize_data = $this->users->check_admin_user_previlize($this->session->userdata('user_type_id'));        
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

   
 //------------------------------TAHER 2012-08-01----------------------------------
 /**
 *Load ORDERS_TAB name
 *
 *@access public
 *@return Tab name
 */
   function index() {
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['activeTab'] = 'orders';
		$this->data['mainTab'] = 'orders';
        $this->data['dynamicView'] = 'pages/admin/welcome';
        $this->_commonPageLayout('frontend_viewer');
    }

  /*  function index() {
        $this->data['activeTab'] = 'users';
		$this->data['mainTab'] = 'users';
        $this->data['dynamicView'] = 'pages/admin/welcome';
        $this->_commonPageLayout('frontend_viewer');
    }*/

    /* Callback function */
  
    function username_check($username) {
        $result = $this->dx_auth->is_username_available($username);
        if (!$result) {
            $this->form_validation->set_message('username_check', 'Username already exist. Please choose another username.');
        }
        return $result;
    }

    function email_check($email) {
        $result = $this->dx_auth->is_email_available($email);
        if (!$result) {
            $this->form_validation->set_message('email_check', 'Email is already used by another user. Please choose another email address.');
        }
        return $result;
    }
    function pchange_password() {
         $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'password';
        // Check if user logged in or not
        if ($this->dx_auth->is_logged_in()) {
            $val = $this->form_validation;
            $this->data['windowTitle'] = $this->siteTitle . 'Change User Password';

            // Set form validation
            $val->set_rules('old_password', 'Old Password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']');
            $val->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_new_password]');
            $val->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|xss_clean');

            // Validate rules and change password
            if (isset($_POST['change'])) {
                if ($val->run() AND $this->dx_auth->change_password($val->set_value('old_password'), $val->set_value('new_password'))) {
                    $this->data['admin_message'] = 'Password Changed Successfully !!!';
                    //$this->data['dynamicView'] 	 = $this->dx_auth->admin_notifier;
                } else {
                    $this->data['admin_message'] = 'Fail in Password Change Operation!!!';
                }
            }
            $this->data['dynamicView'] = 'pages/admin/change_password_form';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            // Redirect to login page
            $this->dx_auth->deny_access('login');
        }
    }
	 function change_password() {
       $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'password';
        //echo "<pre>"; print_r($_POST);die();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[6]|max_length[20]|matches[confirm_new_password]');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
           $this->data['dynamicView'] = 'pages/admin/change_password_form';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $old_password = md5($this->input->post('old_password'));
            $query = $this->db->query("select * from users where password='" . $old_password . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">Old Password doesnt match.</div>');
                redirect('admin/backend/change_password');
            } else {
                $data = array(
                    'password' => md5($this->input->post('new_password'))
                );
				 $this->load->model('admin/users');
                $this->users->password_update($data,$old_password);
                $this->session->set_flashdata('message', '<div id="message1"> Password  Changed Successfully.</div>');
                redirect('admin/backend/change_password');
            }
        }
    }

/**
 * View admin users list
 *
 *@access public
 *@return admin users list
 */ 
public function admin_users(){
	    $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'view_user';
        $this->load->model('admin/users', 'UserList');      
        // Get all users
        $this->data['userLists'] = $this->UserList->get_all_admin_users($id="");      
        $this->data['dynamicView'] = 'pages/admin/user/view';
		$this->_commonPageLayout('frontend_viewer');
}

/**
 * Load admin users add form
 *
 *@access public
 *@return admin users add form
 */ 
function create_admin_users() {
	    $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'view_user';
        $this->load->model('admin/users', 'usertypes');    
        $data=array(
		     'name'=>"",
		     'username'=>"",
             'email'=>"",
			 'person_number'=>"",
			 'user_type_id'=>"",
		   );
        $this->load->vars($data);
            
        $data_user_types['user_types_data'] = $this->usertypes->get_all_admin_user_types($id="");
       
        $this->load->vars($data_user_types);   
        // Set form validation rules			
        //$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_password]');
        //$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
        
        $this->form_validation->set_rules('username', 'lang:label_username', 'trim|required|xss_clean|min_length[' . $this->min_username . ']|max_length[' . $this->max_username . ']|callback_admin_username_check|alpha_dash');
        $this->form_validation->set_rules('email', 'lang:label_email', 'trim|required|xss_clean|valid_email|callback_admin_email_check');
        $this->form_validation->set_rules('person_number', $this->lang->line('label_person_no'), 'trim|required|callback_check_admin_person_number1');
        $this->form_validation->set_rules('password', 'lang:label_password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', $this->lang->line('label_retype_password'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'lang:label_name' , 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_type_id', 'lang:label_type_name', 'trim|required|xss_clean');
        
         if ($this->form_validation->run() == FALSE) {
             $data=array(
		     'name'=>$this->input->post("name"),
		     'username'=>$this->input->post("username"),
             'email'=>$this->input->post("email"),
			 'person_number'=>$this->input->post("person_number"),
			 'user_type_id'=>$this->input->post("user_type_id"),
		   );
            $this->load->vars($data);
            $this->data['dynamicView'] = 'pages/admin/user/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
		   $this->load->model('admin/users');
           
            $password = $this->encrypt($this->input->post("password"),'vaccitvassit');            
		    $data=array(
		     'name'=>$this->input->post("name"),
		     'username'=>$this->input->post("username"),
             'email'=>$this->input->post("email"),
			 'person_number'=>$this->input->post("person_number"),
			 'password'=>$password,
			 'user_type_id'=>$this->input->post("user_type_id"),
		   );                         
          $success =  $this->users->admin_user_insert($data);           
          if($success){
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('user_creation_success').'</div>');
        }
        redirect('admin/backend/admin_users');
		
		}
}



/**
 * Load admin users edit form
 *
 *@access public
 *@return admin users edit form
 */ 
function admin_user_edit($id=NULL) {
	    $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'view_user';
        $this->load->model('admin/users', 'users');    
        $this->data['userLists'] = $this->users->get_all_admin_users($id);  
        $data=array(
		     'name'=>"",
		     'username'=>"",
             'email'=>"",
			 'person_number'=>"",
			 'user_type_id'=>"",
        );
           
        if(count($this->data['userLists'])){
            foreach($this->data['userLists'] as $rows){
                $data=array(
                    'id'=>$id,
                     'name'=>$rows->name,
                     'username'=>$rows->username,
                     'email'=>$rows->email,
                     'person_number'=>$rows->person_number,
                     'user_type_id'=>$rows->user_type_id,
                   );
            }
        }           
        $this->load->vars($data);               
        if ($id != NULL) {
            $data_user_types['user_types_data'] = $this->users->get_all_admin_user_types($id="");       
            $this->load->vars($data_user_types);   
            $this->data['dynamicView'] = 'pages/admin/user/edit';
    }
    
        if (count($_POST)) {
            $user_type_id = $this->input->post("user_type_id");                                                                                                                                                                                         
            $this->form_validation->set_rules('username', 'lang:label_username', 'trim|required|xss_clean|min_length[' . $this->min_username . ']|max_length[' . $this->max_username . ']|callback_admin_username_check[' . $this->input->post("admin_user_id") . ']|alpha_dash');
            $this->form_validation->set_rules('email', 'lang:label_email', 'trim|required|xss_clean|valid_email|callback_admin_email_check[' . $this->input->post("admin_user_id") . ']');
            $this->form_validation->set_rules('person_number', $this->lang->line('label_person_no'), 'trim|required|callback_check_admin_person_number1[' . $this->input->post("admin_user_id") . ']');
            $this->form_validation->set_rules('password', 'lang:label_password', 'trim|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', $this->lang->line('label_retype_password'), 'trim|xss_clean');
            $this->form_validation->set_rules('name', 'lang:label_name' , 'trim|required|xss_clean');
            if($user_type_id){
                $this->form_validation->set_rules('user_type_id', 'lang:label_type_name', 'trim|required|xss_clean');
            }
            
             if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/admin/user/edit';
                //$this->_commonPageLayout('frontend_viewer');
            } else {
                $id = $this->input->post("admin_user_id");    
                $password = $this->input->post("password");
                $data=array(
                 'name'=>$this->input->post("name"),
                 'username'=>$this->input->post("username"),
                 'email'=>$this->input->post("email"),
                 'person_number'=>$this->input->post("person_number"),
                 'user_type_id'=>$this->input->post("user_type_id"),
               ); 
                if($password){
                    $password = $this->encrypt($password,'vaccitvassit');
                    $data['password']=$password;    
                }
            
              $success =  $this->users->admin_user_update($data,$id);    
              if($success){
                  $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_user_update_success').'</div>');
                  redirect('admin/backend/admin_users', 'location', 301);
            }
        }
}
$this->_commonPageLayout('frontend_viewer');
      
}

/**
 * View admin_user_type_previlize
 *
 *@param $id which contains admin user type id
 *@access public
 *@return admin_user_type_previlize view
 */ 
function viewed_admin_user_type_previlize($id) {
        //$this->lang->load('configuration', $this->session->userdata('lang_file'));
         $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'user_types';
        $to_date = date("Y-m-d H:i:s"); 
        $query = $this->db->query("select * from admin_user_previlize where user_type_id='" . $id . "'");
            if ($query->num_rows() == 0) {
                //$this->session->set_flashdata('message', '<div id="message">No setting found for this Organization.</div>');
                ///TAHER                    
                $data = array('user_type_id ' => $id, 'add_date' => $to_date);
                $this->users->admin_user_type_previlige_insert($data);
                               
                ///TAHER
                //redirect('admin/info/viewed_org_previlize/'.$org_id);
            }
        $this->data['user_type_id'] =$id;
        $this->data['dynamicView'] = 'pages/admin/user_type/previlige_edit';
        $this->_commonPageLayout('frontend_viewer');            
}

/**
 * Update admin_user_type_previlize
 *
  *@access public
 *@return Success/Error Message
 */ 
  function update_admin_user_type_previlize() {
        $data = array(
            'order_view_letters' => $this->input->post("order_view_letters"),
            'order_deliver_letters' => $this->input->post("order_deliver_letters"),
            'order_archieve_letters' => $this->input->post("order_archieve_letters"),            
            'order_view_new_customer' => $this->input->post("order_view_new_customer"),
            'order_approve_new_customer' => $this->input->post("order_approve_new_customer"),            
            'order_deny_new_customer' => $this->input->post("order_deny_new_customer"),            
            'order_view_package_order' => $this->input->post("order_view_package_order"),
            'order_approve_package_order' => $this->input->post("order_approve_package_order"),            
            'order_deny_package_order' => $this->input->post("order_deny_package_order"),            
            'configuration_access' => $this->input->post("configuration_access"),
            'customer_view_registered_customer' => $this->input->post("customer_view_registered_customer"),
            'customer_create_new_customer' => $this->input->post("customer_create_new_customer"),
            'customer_view_customer_details' => $this->input->post("customer_view_customer_details"),
            'customer_edit_customer_details' => $this->input->post("customer_edit_customer_details"),
            'customer_view_bank_details' => $this->input->post("customer_view_bank_details"),
            'customer_restriction_on_sms_letter' => $this->input->post("customer_restriction_on_sms_letter"),
            'customer_activate_deactivate_customer' => $this->input->post("customer_activate_deactivate_customer"),
            'customer_previlization_settings' => $this->input->post("customer_previlization_settings"),
            'billing_view_billing' => $this->input->post("billing_view_billing"),
            'billing_edit_invoice' => $this->input->post("billing_edit_invoice"),
            'billing_view_invoice_receipt' => $this->input->post("billing_view_invoice_receipt"),
            'billing_send_invoice_receipt' => $this->input->post("billing_send_invoice_receipt"),
            'billing_send_reminder' => $this->input->post("billing_send_reminder"),
            'billing_change_paid_unpaid_status' => $this->input->post("billing_change_paid_unpaid_status"),
            'users_view_users' => $this->input->post("users_view_users"),
            'users_edit_users' => $this->input->post("users_edit_users"),
            'users_delete_users' => $this->input->post("users_delete_users"),
            'users_create_new_users' => $this->input->post("users_create_new_users"),
            'users_block_unblock_user' => $this->input->post("users_block_unblock_user"),            
            'user_types_view_user_types' => $this->input->post("user_types_view_user_types"),
            'user_types_edit_user_types' => $this->input->post("user_types_edit_user_types"),
            'user_types_delete_user_types' => $this->input->post("user_types_delete_user_types"),
            'user_types_previlization_settings' => $this->input->post("user_types_previlization_settings"),
            'user_types_create_new_user_types' => $this->input->post("user_types_create_new_user_types"),
            'communication_email_view_inbox' => $this->input->post("communication_email_view_inbox"),
            'communication_email_compose_new' => $this->input->post("communication_email_compose_new"),
            'communication_email_view_sent' => $this->input->post("communication_email_view_sent"),
            'communication_sms_view_inbox' => $this->input->post("communication_sms_view_inbox"),
            'communication_sms_write_new' => $this->input->post("communication_sms_write_new"),
            'communication_sms_view_sent' => $this->input->post("communication_sms_view_sent"),
            'letter_write_new' => $this->input->post("letter_write_new"),
            'letter_view_sent' => $this->input->post("letter_view_sent"),
            'tracking_access' => $this->input->post("tracking_access")
        );
        //echo "<pre>";print_r($data);die();
        $this->users->admin_user_type_previlige_update($data);
        $this->session->set_flashdata('message', '<div id="message1">Previlize settings updated successfully.</div>');
        //redirect('admin/info/viewed_org_previlize');
        redirect('admin/backend/admin_user_types');
    }
////

/**
 * View admin user types list
 *
 *@access public
 *@return admin user types list
 */ 
    function admin_user_types() {
        $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'user_types';
        $this->load->model('admin/users', 'usertypes');      
        // Get all users
        $this->data['query1'] = $this->usertypes->view_all_admin_user_types();
        $this->data['dynamicView'] = 'pages/admin/user_type/show';
        $this->_commonPageLayout('frontend_viewer');
}

/**
 * Load admin user types add form
 *
 *@access public
 *@return admin user types add form
 */ 
    function add_admin_user_types() {
        $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'user_types';
        $this->data['dynamicView'] = 'pages/admin/user_type/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

 /**
 * insert admin user types into DB:adminscentral, Table: admin_user_types
 *
 *@access public
 *@return Success/Error Message
 */
  function added_admin_user_types() {
        $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'user_types';
        $this->load->model('admin/users', 'usertypes');    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('type_name', 'lang:label_type_name', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/user_type/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $query = $this->db->query("select type_name from admin_user_types where type_name='" . strtolower($this->input->post("type_name"))."'");
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('user_types_exists_msg').'</div>');
                redirect('admin/backend/add_admin_user_types');
            } else {
                $to_date = date("Y-m-d H:i:s"); 
                $data = array('type_name' => ucfirst($this->input->post('type_name')), 'add_date' => $to_date);
                $success = $this->usertypes->admin_user_types_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('user_types_creation_success').'</div>');
                redirect('admin/backend/admin_user_types');
            }
        }
    }

    public function admin_user_delete($contentId = NULL) {
        $this->load->model('admin/users', 'UserList');
        $success = $this->UserList->delete_admin_user($contentId);
        if($success){
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_user_delete_success').'</div>');
        }
        redirect('admin/backend/admin_users');
}


   public function admin_user_type_delete($contentId = NULL) {
        $this->load->model('admin/users', 'UserList');
        $success = $this->UserList->delete_admin_user_type($contentId);
        if($success){
            $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_user_type_delete_success').'</div>');
        }
        redirect('admin/backend/admin_user_types');
}

/**
 * Load admin user types edit form
 *
 *param $id which contains admin user type id
 *@access public
 *@return admin user types edit form
 */ 
function admin_user_type_edit($id=NULL) {
        $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'user_types';
        if ($id !== NULL) {
            $this->data['record'] = $this->users->get_all_admin_user_types($id);
            $this->data['dynamicView'] = 'pages/admin/user_type/edit';
            
        }
        if (count($_POST)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('type_name', 'lang:label_type_name', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->data['dynamicView'] = 'pages/admin/user_type/edit';
                
            } 
            else{
                $query = $this->db->query("select type_name from admin_user_types where type_name='" . strtolower($this->input->post("type_name"))."' AND id!='" . $id."'");
                if ($query->num_rows() > 0) {
                    $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('user_types_exists_msg').'</div>');
                    redirect('admin/backend/admin_user_type_edit/'.$id);
                } 
                else{
                    $data = array('type_name' => ucfirst($this->input->post('type_name')));
                    $success = $this->users->admin_user_types_update($data,$id);
                    if($success){
                        $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_user_types_update_success').'</div>');
                        redirect('admin/backend/admin_user_types', 'location', 301);
                    }
                }
               
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }


/**
 *Unblocked admin user
 *
 *param $id which contains admin user id
 *@access public
 *@return Success/Error Message
 */
function admin_user_unblocked($id=NULL){
  $data=array('blocked'=>'0'); 
  $success =  $this->users->admin_user_update($data,$id);    
  if($success){
      $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_user_unblocked_success').'</div>');
      redirect('admin/backend/admin_users', 'location', 301);
  }

}


/**
 *blocked admin user
 *
 *param $id which contains admin user id
 *@access public
 *@return Success/Error Message
 */
function admin_user_blocked($id=NULL){
  $data=array('blocked'=>'1'); 
  $success =  $this->users->admin_user_update($data,$id);    
  if($success){
      $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('admin_user_blocked_success').'</div>');
      redirect('admin/backend/admin_users', 'location', 301);
  }

}

    public function useredit($contentId = NULL) {
        $this->data['activeTab'] = 'configuration';
        // Load Model
        $this->load->model('admin/users', 'UserList');

        if ($contentId !== NULL) {
            $this->data['userLists'] = $this->UserList->getUserInfo($contentId);
            $this->data['windowTitle'] = $this->siteTitle . 'Modify User Priviliges Information';
            $this->data['dynamicView'] = 'pages/admin/user/edit';
        }

        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('sale_prev', 'Sale Privilege', 'trim|xss_clean');
            $val->set_rules('engineering_prev', 'Engineering Privilege', 'trim|xss_clean');
            $val->set_rules('commercial_prev', 'Commercial Privilege', 'trim|xss_clean');
            $val->set_rules('hr_prev', 'HR Privilege', 'trim|xss_clean');
            $val->set_rules('configuration_prev', 'Configuration Privilege', 'trim|xss_clean');

            if ($val->run()) {
                $uPrevData = array(
                    'id' => $this->input->post('id'),
                    'sale_prev' => $this->input->post('sale_prev'),
                    'engineering_prev' => $this->input->post('engineering_prev'),
                    'commercial_prev' => $this->input->post('commercial_prev'),
                    'hr_prev' => $this->input->post('hr_prev'),
                    'configuration_prev' => $this->input->post('configuration_prev')
                );
                if (!empty($uPrevData['id'])) {
                    if ($this->UserList->set_user($uPrevData['id'], $uPrevData)) {
                        redirect('admin/backend/user');    function username_check($username) {

        $result = $this->dx_auth->is_username_available($username);
        if (!$result) {
            $this->form_validation->set_message('username_check', 'Username already exist. Please choose another username.');
        }

        return $result;
    }
                    } else {
                        return false;
                    }
                }
            }
        }


        // Load view
        $this->_commonPageLayout('frontend_viewer');
}

/*Check duplicate username for admin user
*
*@param $username
*
*return Success/Error Message
*/

function admin_username_check($username,$id) { 
        $result = $this->dx_auth->is_admin_username_available($username,$id);
        if (!$result) {
            $this->form_validation->set_message('admin_username_check',$this->lang->line("username_exists_error_msg"));
        }

        return $result;
    }

/*Check duplicate email for admin user
*
*@param $email
*
*return Success/Error Message
*/
function admin_email_check($email,$id) {
        $result = $this->dx_auth->is_admin_email_available1($email,$id);
        if (!$result) {
            $this->form_validation->set_message('admin_email_check', $this->lang->line('email_exists_error_msg'));
        }

        return $result;
}

/*Check duplicate person number for admin user
*
*@param $person_number
*
*return Success/Error Message
*/
function check_admin_person_number1($person_number,$id) {
        $result = $this->dx_auth->is_admin_person_number_available1($person_number,$id);
        if (!$result) {
            $this->form_validation->set_message('check_admin_person_number1', $this->lang->line('pno_exists_error_msg'));
        }

        return $result;
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

?>