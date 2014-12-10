<?php

include_once 'BaseController.php';

class siteadmin extends BaseController {

    public function index() {
        if ($this->session->userdata('uid') != "") {
            redirect('admin/backend');
        }
        $this->load->view('frontend/login_form');
    }
	
    function process_login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/login_form');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $query1 = $this->db->query("SELECT * FROM users WHERE username='".$username."' and password='".$password."'");

            if ($query1->num_rows() == 1) {
                foreach ($query1->result() as $info):
                    $user_id = $info->id;
                    $role_id = $info->role_id;

                endforeach;
                $data = array(
                    'username' => $username,
                    'uid' => $user_id,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($data);
                redirect('admin/backend');
            } else {
				$this->session->set_flashdata('message', '<div id="message">Username or Password is Incorrect, Please try again.</div>');
				redirect('siteadmin/index');
                
            }
        }
    }
    function logout() {
        //$this->session->sess_destroy();
        $this->session->unset_userdata('uid');
        redirect('siteadmin');
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