<?php

include_once 'BaseController.php';
//El1305445489
class Main extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->siteTitle = 'Account Soft | ';
        $this->load->model('main_model');
        $this->load->model('info_model');
    }

    public function index() {

        $this->data['dynamicView'] = 'frontend/home';
        $this->_commonPageLayout('frontend_viewer');
    }

    function org_name_check($org_name) {

        $result = $this->dx_auth->is_org_name_available($org_name);
        if (!$result) {
            $this->form_validation->set_message('org_name_check', 'Org Name  exists. Please choose another one.');
        }

        return $result;
    }

    function email_check($email) {
        $result = $this->dx_auth->is_email_available1($email);
        if (!$result) {
            $this->form_validation->set_message('email_check', 'Email is already Exists. Please chose another one');
        }

        return $result;
    }
  function login_username_check($username) {
        $result = $this->dx_auth->login_username($username);
        if (!$result) {
            $this->form_validation->set_message('login_username_check', 'Username  Exists. Please chose another one');
        }

        return $result;
    }
    function add_org($start=0) {
        $this->data['dynamicView'] = 'pages/admin/org/entry';
        $this->_commonPageLayout('frontend_viewer');
    }
     function check_person_number1($person_number) {
        $result = $this->dx_auth->is_person_number_available1($person_number);
        if (!$result) {
            $this->form_validation->set_message('check_person_number1', 'Person No is exists.Please choose another one');
        }

        return $result;
    }
    function added_org($start=0) {       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_login_username_check');
        $this->form_validation->set_rules('person_number', 'Person Number', 'trim|required|callback_check_person_number1');
        $this->form_validation->set_rules('org_number', 'Org No', 'trim|required');
        $this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|callback_org_name_check');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_email_check');
        $this->form_validation->set_rules('org_primary_address', 'Primary Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', 'Org Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('package_name', 'Package Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password_receive', 'password_receive', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description of org', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/org/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $org_no = $this->input->post('org_number');
            $this->data['z_info'] = $this->main_model->get_existing_org_no($org_no);
            if (count($this->data['z_info'])) {
                $this->session->set_flashdata('message', '<div id="message">Org No Exists.Please Choose another one.</div>');
                redirect('main/add_org');
            } else {
                $password_receive = $this->input->post("password_receive");
                $package = $this->input->post("package_name");
                $this->data['record'] = $this->main_model->get_package_amount($package);
                foreach ($this->data['record'] as $package_info):
                    $p_amount = $package_info->amount;
                endforeach;
                $n = $this->input->post("first_name");
                $a = mt_rand(1000000000, 2000000000);
                $b = substr($n, 0, 2);
                echo $c = $b . $a;
                $rand_pass = base64_encode($c);
                $data = array(
                    'org_number' => $this->input->post("org_number"),
					'person_number' => $this->input->post("person_number"),
                    'org_name' => $this->input->post("org_name"),
					'username' => $this->input->post("username"),
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
					'description' => $this->input->post("description"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'package_name' => $this->input->post("package_name"),
                    'area_name' => $this->input->post("area_name"),
                    'payment_amount' => $p_amount,
                    'role_id' => 7,
                    'password' => $rand_pass,
                    'password_receive_by' => $password_receive,
                    'payment_status' => 1,
                    'approval_status' => 1,
                    'login_status' => 0
                );
                $this->main_model->register_organisation($data);
                $this->session->set_flashdata('message', '<div id="message1">Thanks for Registration .You will get a confirmation mail after admin Approve. Check your mail inbox and spam also</div>');
                redirect('main/add_org', 'location', 301);
            }
        }
    }

    function view_payment_package($id) {
        $this->data['query1'] = $this->main_model->get_userdata($id);
        $this->data['dynamicView'] = 'pages/admin/org/show_paypal_form';
        $this->_commonPageLayout('frontend_viewer');
    }

    function cancel() {
        $this->data['dynamicView'] = 'pages/admin/paypal_test/cancel';
        $this->_commonPageLayout('frontend_viewer');
    }

    function success($id) {
        /*  if(isset($_POST)):
          // echo "<pre>"; print_r($_POST);die();
          foreach ($_POST as $key => $value):
          echo "<strong>".$key."</strong>:". $value ."<br/>";
          endforeach;
          endif; die(); */
        // This is where you would probably want to thank the user for their order
        // or what have you.  The order information at this point is in POST 
        // variables.  However, you don't want to "process" the order until you
        // get validation from the IPN.  That's where you would have the code to
        // email an admin, update the database with payment status, activate a
        // membership, etc.
        // You could also simply re-direct them to another page, or your own 
        // order status page which presents the user with the status of their
        // order based on a database (which can be modified with the IPN code 
        // below).
        $user_id = $id;
        $this->data['query1'] = $this->main_model->get_org_message($user_id);
        foreach ($this->data['query1'] as $info):
            $fname = $info->first_name;
            $lname = $info->last_name;
            $email = $info->email;
            $pass = $info->password;
        endforeach;
        $decode_password = base64_decode($pass);
        $data = array(
            'payment_status' => 2,
            'login_status' => 2
        );
        $this->main_model->update_user($data, $user_id);
        $this->load->library('email');
        $this->email->from('info@onlineassociation.com', 'Confirmation');
        $this->email->to("$email");
        $this->email->subject('Confirmation');
        $this->email->message("Dear $fname $lname Thanks for registration.your Payment received successfully.Your Username=$email and Password=$decode_password");
        $this->email->send();
        $this->data['dynamicView'] = 'pages/admin/paypal_test/success';
        $this->_commonPageLayout('frontend_viewer');
    }

    function ipn() {
        // Payment has been received and IPN is verified.  This is where you
        // update your database to activate or process the order, or setup
        // the database with the user's order details, email an administrator,
        // etc. You can access a slew of information via the ipn_data() array.
        // Check the paypal documentation for specifics on what information
        // is available in the IPN POST variables.  Basically, all the POST vars
        // which paypal sends, which we send back for validation, are now stored
        // in the ipn_data() array.
        // For this example, we'll just email ourselves ALL the data.
        $to = 'sales@spiceuk.com';    //  your email

        if ($this->paypal_lib->validate_ipn()) {
            $body = 'An instant payment notification was successfully received from ';
            $body .= $this->paypal_lib->ipn_data['payer_email'] . ' on ' . date('m/d/Y') . ' at ' . date('g:i A') . "\n\n";
            $body .= " Details:\n";

            foreach ($this->paypal_lib->ipn_data as $key => $value)
                $body .= "\n$key: $value";

            // load email lib and email results
            $this->load->library('email');
            $this->email->to($to);
            $this->email->from($this->paypal_lib->ipn_data['payer_email'], $this->paypal_lib->ipn_data['payer_name']);
            $this->email->subject('CI paypal_lib IPN (Received Payment)');
            $this->email->message($body);
            $this->email->send();
        }
    }

    protected function _commonPageLayout($viewName, $cacheIt = FALSE) {

        $view = $this->layout->view($viewName, $this->data, TRUE);

       $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/org_presentation_message', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_logo_org_registration_message', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
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
        $this->data['dynamicView'] = 'pages/member/new_customer/entry';
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
            $this->data['dynamicView'] = 'pages/member/new_customer/entry';
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
                $this->data['dynamicView'] = 'pages/member/new_customer/entry_step2';
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
            $this->data['dynamicView'] = 'pages/member/new_customer/entry_step2';
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
                $this->data['dynamicView'] = 'pages/member/new_customer/entry_step3';
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
            
            $this->data['dynamicView'] = 'pages/member/new_customer/entry_step3';
            $this->_commonPageLayout('frontend_viewer');
        } else {
                ///Organization Registration Final Step
                $first_name = $data_admin_user['admin_user_data']['first_name'];
                $rand_no = mt_rand(1000000000, 2000000000);
                $first_name = substr($first_name, 0, 2);
                echo $password = $first_name . $rand_no;
                $password = $this->encrypt($password,'vaccitvassit');
                $data_admin_user['admin_user_data']['password'] = $password;
                $data_admin_user['admin_user_data']['admin_user'] = 1;
                 
                //$rand_pass = base64_encode($c);                 
                $success = $this->info_model->register_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4);
                //$this->load->vars($form_data_step3);
                if($success){
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_registration_member_success').'</div>');
                    redirect('main/org_registration_success');
                    //$this->data['dynamicView'] = 'pages/admin/new_customer/org_registration_success';
                }
                else{$this->data['dynamicView'] = 'pages/member/new_customer/entry_step3';}                
                $this->_commonPageLayout('frontend_viewer');
        }
}

/**
 * Show Org_Registration Success
 *
 *@access public
 *@return Org_Registration Success
 */
    function org_registration_success($start=0) {
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';        
        $this->data['dynamicView'] = 'pages/member/new_customer/org_registration_success';
        $this->_commonPageLayout('frontend_viewer');
}


}

?>