<?php

include_once 'BaseController.php';

class siteadmin extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->siteTitle = 'Account Soft | ';
    }

    public function index() {
        $this->login();
    }

    function recaptcha_check() {
        $result = $this->dx_auth->is_recaptcha_match();
        if (!$result) {
            $this->form_validation->set_message('recaptcha_check', 'Your confirmation code does not match the one in the image. Try again.');
        }

        return $result;
    }

    function login() {
        $this->data['activeTab'] = 'login';
        if (!$this->dx_auth->is_logged_in()) {
            $val = $this->form_validation;

            // Set form validation rules
            $val->set_rules('username', 'Username', 'trim|required|xss_clean');
            $val->set_rules('password', 'Password', 'trim|required|xss_clean');
            $val->set_rules('remember', 'Remember me', 'integer');

            // Set captcha rules if login attempts exceed max attempts in config
            if ($this->dx_auth->is_max_login_attempts_exceeded()) {
                $val->set_rules('captcha', 'Confirmation Code', 'trim|required|xss_clean|callback_captcha_check');
            }

            if ($val->run() AND $this->dx_auth->login($val->set_value('username'), $val->set_value('password'), $val->set_value('remember'))) {
                //$role_name = $this->dx_auth->get_role_name();
                if ($this->dx_auth->is_user()) {
                    // Redirect to User homepage
                    $redir_loc = $this->dx_auth->user_home_uri;
                } elseif ($this->dx_auth->is_admin()) {
                    // Redirect to Admin homepage
                    $redir_loc = $this->dx_auth->admin_home_uri;
                } elseif ($this->dx_auth->is_super_admin()) {
                    // Redirect to Super Admin homepage
                    $redir_loc = $this->dx_auth->admin_home_uri;
                }
                redirect($redir_loc);
            } else {
                // Check if the user is failed logged in because user is banned user or not
                if ($this->dx_auth->is_banned()) {
                    // Redirect to banned uri
                    $this->dx_auth->deny_access('banned');
                } else {
                    // Default is we don't show captcha until max login attempts eceeded
                    $this->data['show_captcha'] = FALSE;

                    // Show captcha if login attempts exceed max attempts in config
                    if ($this->dx_auth->is_max_login_attempts_exceeded()) {
                        // Create catpcha						
                        $this->dx_auth->captcha();

                        // Set view data to show captcha on view file
                        $this->data['show_captcha'] = TRUE;
                    }

                    // Load login page view
                    $this->data['windowTitle'] = $this->siteTitle . 'Login Panel';
                    $this->data['activeTab'] = 'login';
                    // $this->data['dynamicView'] = 'frontend/login_form';
                    $this->load->view("frontend/login_form");
                }
            }
        } else {
            if ($this->dx_auth->is_user()):
                $this->data['auth_message'] = "You Are Already Logged In." . nbs(5) . anchor($this->dx_auth->user_home_uri, 'Go to Your User Home');
            else:
                $this->data['auth_message'] = "You Are Already Logged In." . nbs(5) . anchor($this->dx_auth->admin_home_uri, 'Go to Your Admin Home');
            endif;
            $this->data['windowTitle'] = $this->siteTitle . 'User Login Confirmation';
            $this->data['dynamicView'] = 'frontend/general_message';
            $this->_commonPageLayout('frontend_viewer');
            //$this->load->view('frontend/general_message');
        }

        // $this->_commonPageLayout('frontend_viewer');
    }
	
	function login(){
	  
	
	}

    protected function _commonPageLayout($viewName, $cacheIt = FALSE) {

        $view = $this->layout->view($viewName, $this->data, TRUE);

        $replaces = array(
            '{SITE_TOP_LOGO}' => '', // $this->load->view('frontend/site_top_logo', $this->data, TRUE),
            '{SITE_TOP_MENU}' => '', // $this->load->view('frontend/site_top_menu_common', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}

?>