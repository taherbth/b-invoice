<?php

include_once 'BaseController.php';

class Member extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->siteTitle = 'Account Soft | ';
    }

    public function index() {
        if ($this->session->userdata('id') != "") {
            redirect('org_member/back');
        }
        $this->load->view('frontend/login_form_member');
        //$this->data['dynamicView'] = 'frontend/login_form_user';
        //$this->_commonPageLayout('frontend_viewer');
    }

    function process_login() {
        
        echo "Here im";exit;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/login_form_member');
        } else {
            $username = $this->input->post('username');
            $password = base64_encode($this->input->post('password'));

            $query1 = $this->db->query("SELECT * FROM member WHERE (username='" . $username . "' && password='" . $password . "') || (email='" . $username . "' && password='" . $password . "') || (person_number='" . $username . "' && password='" . $password . "')");

            if ($query1->num_rows() == 1) {
                foreach ($query1->result() as $info):
                    $user_id = $info->id;
                    $org_id = $info->org_id;
                    $member_group = $info->member_group;
                    $user_type = $info->user_type;
                    $name = $info->name;
                endforeach;
                $data = array(
                    'username' => $username,
                    'id' => $user_id,
                    'member_org' => $org_id,
                    'member_group' => $member_group,
                    'user_type' => $user_type,
                    'name' => $name,
                    'loggedin' => TRUE
                );

                $this->session->set_userdata($data);
                //echo "hi";die();
                redirect('org_member/back');
            } else {

                $this->session->set_flashdata('message', '<div id="message">Username or Password is Incorrect, Please try again.</div>');
                redirect('member/index');
            }
        }
    }

    function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('member_org');
        $this->session->unset_userdata('member_group');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('name');

      //  $this->session->sess_destroy();
        redirect('member');
    }

    protected function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);

        $replaces = array(
            '{SITE_TOP_LOGO}' => '', //$this->load->view('frontend/site_top_logo', $this->data, TRUE),
            '{SITE_TOP_MENU}' => '', //$this->load->view('frontend/site_top_menu_common', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => '', //$this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}

?>