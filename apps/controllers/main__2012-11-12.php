<?php

include_once 'BaseController.php';
include_once 'payment_method/CreateRecurringPaymentsProfile.php';

//El1305445489
class Main extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->helper('creditcard');
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
        'org_state' => "",
        'org_bank_acc_no' => "",
        'org_bank_acc_type' => "",
        'add_date' =>""
       );
        $data['category_name'] = "";
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
        $data['category_name'] = "";
                
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
        'org_state' => $this->input->post("org_state"),
         'org_bank_acc_no' => $this->input->post("org_bank_acc_no"),
        'org_bank_acc_type' =>$this->input->post("org_bank_acc_type"),
        'add_date' =>$to_date
       );
       
       
       if($this->input->post("org_category")!="" && $this->input->post("org_category")!="other"){
            $form_data['org_category'] = $this->input->post("org_category");
      }
      else{$data['category_name'] = $this->input->post("category_name");}
  
       $form_data_one['organization_data'] = $form_data;
       $this->load->vars($form_data_one); 
       $this->load->vars($form_data);     
       $this->load->vars($data);   
       
        $this->load->library('form_validation');   
        
        if($this->input->post("org_category")!="other"){
            $this->form_validation->set_rules('org_category', $this->lang->line('label_org_category'), 'trim|required');
        }
    
         if($this->input->post("org_category")=="other"){
            $this->form_validation->set_rules('category_name', $this->lang->line('label_org_category'), 'trim|required');
       }
    
        $this->form_validation->set_rules('package_name', $this->lang->line('label_package'), 'trim|required');
        $this->form_validation->set_rules('org_number',$this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_no'), 'trim|required|callback_org_no_check');
        $this->form_validation->set_rules('org_name', $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_name'), 'trim|required|callback_org_name_check');
        $this->form_validation->set_rules('org_description', $this->lang->line('label_org')."&nbsp;&nbsp;".$this->lang->line('label_description'), 'trim|required');
        $this->form_validation->set_rules('org_primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', $this->lang->line('label_phone'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_state', $this->lang->line('label_state'), 'trim|required|xss_clean');
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
                    'state' => "",
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
        $data['category_name'] = $this->input->post("data_category");
                
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
                    'state' => $this->input->post("state"),
                    'password_receive_by_email' =>$this->input->post("password_receive_by_email"),
                    'password_receive_by_sms' =>$this->input->post("password_receive_by_sms"),
                    'add_date' =>$to_date
                   );
                   
        //print_r($form_data_step2);
        
        $data_admin_user['admin_user_data'] = $form_data_step2;
        $this->load->vars($form_data_step2);   
        $this->load->vars($data_admin_user);     
        $this->load->vars($data_organization);     
        $this->load->vars($data);     
      
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
        $this->form_validation->set_rules('state', $this->lang->line('label_state'), 'trim|required|xss_clean');
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
                    'bill_state' => $this->input->post("state"),
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
        
        $to_date = date("Y-m-d H:i:s"); 
        $this->load->library('form_validation'); 
        $data_organization['organization_data'] = $this->input->post("organization_data");               
        $data_admin_user['admin_user_data'] = $this->input->post("admin_user_data");    
        $data['category_name'] = $this->input->post("data_category");
        
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
                'bill_phone_no' => $billing_data["phone_no"],
                'bill_email' => $billing_data["email"],
                'bill_primary_address' => $billing_data["primary_address"],
                'bill_optional_address' => $billing_data["optional_address"],
                'bill_zip' => $billing_data["zip"],
                'bill_city' => $billing_data["city"],
                'bill_country' => $billing_data["country"],
                'bill_state' => $billing_data["state"],
                'add_date' =>$to_date
            );    
            
              
        $this->lang->load('customer', $this->session->userdata('lang_file'));
        $this->data['mainTab'] = 'customer';
        $this->data['activeTab'] = 'customer';
        
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
                    'bill_state' => $this->input->post("bill_state"),
                    'billing_terms_condition' => $this->input->post("billing_terms_condition"),
                    'credit_card_no' => $this->input->post("credit_card_no"),
                    'credit_card_type' => $this->input->post("credit_card_type"),
                    'credit_card_verification_code' => $this->input->post("credit_card_verification_code"),
                    'credit_card_expire_month' => $this->input->post("card_expire_date_month"),
                    'credit_card_expire_year' => $this->input->post("card_expire_date_year"),   
                    'name_on_credit_card' => $this->input->post("name_on_credit_card"),   
                    'add_date' =>$to_date
                   );                 
                   
                   
        //Start Validate Credit Card Info      
                $cardErrorNo = -1; //NO card error, card is valid
                $payment_method = $this->input->post("payment_method");
                
                if($payment_method=="creditcard"){
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
               
        $this->form_validation->set_rules('bill_first_name', $this->lang->line('label_first_name'), 'trim|required');
        $this->form_validation->set_rules('bill_last_name',$this->lang->line('label_last_name'), 'trim|required');
        $this->form_validation->set_rules('bill_phone_no', $this->lang->line('label_phone'), 'trim|required');
        $this->form_validation->set_rules('bill_email', $this->lang->line('label_email'), 'trim|required|valid_email|xss_clean|callback_email_check');
        $this->form_validation->set_rules('bill_primary_address', $this->lang->line('label_address_line_one'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_zip', $this->lang->line('label_zip'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_city', $this->lang->line('label_city'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_country', $this->lang->line('label_country'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bill_state', $this->lang->line('label_state'), 'trim|required|xss_clean');
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
            
                $this->data['dynamicView'] = 'pages/member/new_customer/entry_step3';
                $this->_commonPageLayout('frontend_viewer');
        } else {
                ///Organization Registration Final Step
                $first_name = $data_admin_user['admin_user_data']['first_name'];
                $rand_no = mt_rand(1000000000, 2000000000);
                $first_name = substr($first_name, 0, 2);
                $password = $first_name . $rand_no;
                $password2 = $this->encrypt($password,'vaccitvassit');
                $data_admin_user['admin_user_data']['password'] = $password2;
                $data_admin_user['admin_user_data']['admin_user'] = 1;
                 
                //$rand_pass = base64_encode($c);   
                
                $data_global_settings['global_settings_data'] = $this->info_model->get_global_settings();
               // print_r($data['global_settings_data']);
                if($data_global_settings['global_settings_data']){
                    foreach($data_global_settings['global_settings_data'] as $rows){
                        $data_organization['organization_data']['org_allowed_sms_per_month'] = $rows->allowed_sms_per_month;
                        $data_organization['organization_data']['org_allowed_letter_per_month'] = $rows->allowed_letter_per_month;
                    }                    
                }    
                
                if($data['category_name']!=""){
                    $data_val['category_name'] = $data['category_name'];
                    $cat_id = $this->info_model->org_category_insert($data_val);
                    $data_organization['organization_data']['org_category'] = $cat_id;
                }
                $last_insert_ids = $this->info_model->register_organisation($data_organization['organization_data'],$data_admin_user['admin_user_data'],$form_data_step4);
                //$this->load->vars($form_data_step3);
                if(sizeof($last_insert_ids)>0){
                   
                        $package_id = $data_organization['organization_data']['package_name'];
                        
                        $data['package_info'] = $this->info_model->get_package($package_id);
                        if($data['package_info']){
                                foreach($data['package_info'] as $rows)
                                $currency_info = $this->info_model->get_currency($rows->currency_id);
                                $package_name = $rows->package_name;
                                $no_of_member = $rows->no_of_member;
                                $amount = $rows->amount;
                                $duration = $rows->duration;
                                $sms_cost = $rows->sms_cost;
                                $letter_cost = $rows->letter_cost;
                                
                                if($currency_info){
                                        foreach($currency_info as $currency){
                                            $currency_name = $currency->currency_name;
                                    }                                
                                $package_details ="Package: ".$package_name."_".$package_id;      
                            }
                    }
                     ////////////////// Payment Method: Start ////////////                    
                    if($payment_method=="creditcard"){
                        //$token = urlencode("token_from_setExpressCheckout");
                        $bill_start_date_mins = date("i")+10; 
                        $bill_start_date = date("Y-m-d")."T".date("H").":".$bill_start_date_mins.":".date("s");                         
                        $payment_per_cycle = $amount;                        
                        $paymentAmount = urlencode($payment_per_cycle);
                        $currencyID = urlencode($currency_name);						// or other currency code ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')
                        $startDate = str_replace("%3A",":",urlencode($bill_start_date));
                        $billingPeriod = urlencode("Month");				// or "Day", "Week", "SemiMonth", "Year"
                        $billingFreq = urlencode("12");						// combination of this and billingPeriod must be at most a year
                        //$TOTALBILLINGCYCLES = urlencode($duration);						// combination of this and billingPeriod must be at most a year
                        $TOTALBILLINGCYCLES = urlencode("12");						// combination of this and billingPeriod must be at most a year
                        $DESC = urlencode($package_details);
                        $creditCardType = urlencode($card_info['credit_card_type']);
                        $creditCardAccount = urlencode(str_replace (' ', '', $card_info['credit_card_no']));
                        //$creditCardAccount = urlencode("4779297617944965");
                        $cardExpireDate = urlencode($card_info['card_expire_date_month'].$card_info['card_expire_date_year']);
                        $cardCvv2 = urlencode($card_info['credit_card_verification_code']);
                        $PAYERSTATUS = urlencode("verified");
                        $STREET = urlencode($form_data_step4['bill_primary_address']);
                        $CITY = urlencode($form_data_step4['bill_city']);
                        $STATE = urlencode($form_data_step4['bill_state']);
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


                        $nvpStr="&AMT=$paymentAmount&CURRENCYCODE=$currencyID&PROFILESTARTDATE=$startDate";
                        $nvpStr .= "&BILLINGPERIOD=$billingPeriod&BILLINGFREQUENCY=$billingFreq&TOTALBILLINGCYCLES=$TOTALBILLINGCYCLES&DESC=$DESC&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardAccount&EXPDATE=$cardExpireDate&CVV2=$cardCvv2&PAYERSTATUS=$PAYERSTATUS&STREET=$STREET
                        &CITY=$CITY&COUNTRYCODE=$COUNTRYCODE&ZIP=$ZIP&FIRSTNAME=$FIRSTNAME&LASTNAME=$LASTNAME
                        &INITAMT=$INITAMT&FAILEDINITAMTACTION=$FAILEDINITAMTACTION&MAXFAILEDPAYMENTS=$MAXFAILEDPAYMENTS
                        &L_PAYMENTREQUEST_0_ITEMCATEGORY0=$ITEMCATEGORY0&L_PAYMENTREQUEST_0_NAME0=$ITEMNAME0
                        &L_PAYMENTREQUEST_0_AMT0=$ITEMAMT0&L_PAYMENTREQUEST_0_QTY0=$ITEMQTY0&AUTOBILLOUTAMT=$AUTOBILLOUTAMT";

                        $httpParsedResponseAr = PPHttpPost('CreateRecurringPaymentsProfile', $nvpStr);

                        if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                                
                               $data_payment_success['org_id'] = $last_insert_ids['org_id'];
                                $data_payment_success['org_billing_info_id'] = $last_insert_ids['org_billing_info_id'];
                                $data_payment_success['profileid'] = str_replace ('%2d', '-', $httpParsedResponseAr['PROFILEID']);
                                $data_payment_success['profilestatus'] = $httpParsedResponseAr['PROFILESTATUS'];
                                //$data_payment_success['transactionid'] = $httpParsedResponseAr['TRANSACTIONID'];
                                $data_payment_success['timestamp'] = str_replace ('%2d', '-', $httpParsedResponseAr['TIMESTAMP']);
                                $data_payment_success['timestamp'] = str_replace ('%3a', ':', $data_payment_success['timestamp']);
                                $data_payment_success['correlationid'] = $httpParsedResponseAr['CORRELATIONID'];
                                $data_payment_success['ack'] = $httpParsedResponseAr['ACK'];
                                $data_payment_success['add_date'] = $to_date;

                                //Start : Update Organization Info Based on Successful Payment
                                   
                                    $total_days = $duration*30;                                
                                    $expire_date= time() + ($total_days * 24 * 60 * 60);
                                    $data_update = array('approval_status' =>1, 'payment_status' =>1,'activation_date'=>time(),'expire_date'=>$expire_date);     
                                    $success = $this->info_model->update_org_approve($data_update, $data_payment_success['org_id']);           
                                    $success = $this->info_model->org_billing_success_insert($data_payment_success);
                                    
                                    $data['first_name']=$data_admin_user['admin_user_data']['first_name'];
                                    $data['username']=$data_admin_user['admin_user_data']['username'];
                                    $data['email']=$data_admin_user['admin_user_data']['email'];                                    
                                    $data['org_number']=$data_organization['organization_data']['org_number'];
                                    $data['org_name']=$data_organization['organization_data']['org_name'];                                    
                                    $data['org_phone']=$data_organization['organization_data']['org_phone'];;                
                                    $data['password']= $password;    
                                    
                                    if($data_admin_user['admin_user_data']['password_receive_by_email']){                                             
                                        $this->send_password_by_email($data);
                                    }
                                    if($data_admin_user['admin_user_data']['password_receive_by_sms']){
                                        $this->send_password_by_sms($data);
                                    }   
                                //End : Update Organization Info Based on Successful Payment

                        //exit('CreateRecurringPaymentsProfile Completed Successfully: '.print_r($httpParsedResponseAr, true));
                        } else  {
                                $data_payment_failure['org_id'] = $last_insert_ids['org_id'];
                                $data_payment_failure['org_billing_info_id'] = $last_insert_ids['org_billing_info_id'];
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
                    $data_faktura['package_id'] = $package_id;
                    $data_faktura['fak_active_date'] = time();
                    $data_faktura['fak_expire_date'] = time() + (10 * 24 * 60 * 60);
                    $data_faktura['org_name'] = $data_organization['organization_data']['org_name'];
                    $data_faktura['bill_primary_address'] = $form_data_step4['bill_primary_address'];
                    $data_faktura['bill_zip'] = $form_data_step4['bill_zip'];
                    $data_faktura['bill_city'] = $form_data_step4['bill_city'];                    
                    $data_faktura['bill_state'] = $form_data_step4['bill_state'];
                    $data_faktura['bill_phone'] = $form_data_step4['bill_phone_no'];
                    $data_faktura['fak_reference_name'] = $data_admin_user['admin_user_data']['first_name']." ".$data_admin_user['admin_user_data']['last_name'];
                    $data_faktura['fak_description'] = $package_details;
                    $data_faktura['fak_quantity'] = 1;
                    $data_faktura['fak_unit_price'] = $amount;
                    $data_faktura['fak_price_exclusive_vat'] = $data_faktura['fak_quantity']*$data_faktura['fak_unit_price'];
                    $data_faktura['fak_vat_rate'] = 25;
                    $data_faktura['fak_vat_price'] = ($data_faktura['fak_vat_rate']/100)*$data_faktura['fak_price_exclusive_vat'];                    
                    $fak_total_price =$data_faktura['fak_price_exclusive_vat']+$data_faktura['fak_vat_price'];
                    $data_faktura['fak_total_price'] = round($fak_total_price);
                    $data_faktura['fak_rounding_price'] = $data_faktura['fak_total_price'] - $fak_total_price;
                    $data_faktura['fak_currency'] = $currency_name;                    
                    $data_faktura['add_date'] = $to_date;
                    $fak_insert_id = $this->info_model->bill_faktura_insert($data_faktura);
                    
                    if($fak_insert_id){
                        $data['first_name']=$data_admin_user['admin_user_data']['first_name'];
                        $data['username']=$data_admin_user['admin_user_data']['username'];
                        $data['email']=$data_admin_user['admin_user_data']['email'];                                    
                        $data['org_number']=$data_organization['organization_data']['org_number'];
                        $data['org_name']=$data_organization['organization_data']['org_name'];                                    
                        $data['org_phone']=$data_organization['organization_data']['org_phone'];;                
                        $data['password']= $password;   
                        $this->make_invoice_pdf($data_faktura,$fak_insert_id,$data);                        
                    }
                }
                
                //////////////// Payment Method: End /////
                
                    $this->session->set_flashdata('message', '<div id="message1">'.$this->lang->line('org_registration_member_success').'</div>');
                    redirect('main/org_registration_success');
                    //$this->data['dynamicView'] = 'pages/admin/new_customer/org_registration_success';
                }
                else{$this->data['dynamicView'] = 'pages/member/new_customer/entry_step3';}                
                $this->_commonPageLayout('frontend_viewer');
        }
}


function make_invoice_pdf($data_faktura,$fak_insert_id,$data){
   
    include_once 'MPDF/test_me.php';
    $file_name = "invoice_".$data_faktura['org_name'].'_'.$data['org_number'].'_'.$fak_insert_id.'.pdf';
    $this->send_invoice_by_email($data,$content,$file_name);
  
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
 *@return Confirmation or Error Message */
 
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



/**
 * Send invoice by E-mail
 *
 *@access public
 *@return Confirmation or Error Message */
 
function send_invoice_by_email($data,$content,$file_name){
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
	$message .="<p>".$this->lang->line('find_attached_invoice_msg').": </p>\n";
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
    //////////
  
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
}

?>