<?php

include_once 'BaseController.php';

class Main extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->siteTitle = 'Account Soft | ';
        $this->load->model('main_model');
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
        $this->form_validation->set_rules('area_name', 'Area', 'trim|required|xss_clean');
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
                $c = $b . $a;
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
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_logo_presentation_message1', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}

?>