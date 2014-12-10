<?php
include_once 'BaseController.php';
class Orgadmin extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('organization/info_model');
        $this->siteTitle = 'Account Soft | ';
    }

    public function index() {
        if ($this->session->userdata('user_id') != "") {
            redirect('organization/back');
        }
        $this->load->view('frontend/login_form_user');
    }

    function send_reminder() {
        $current_date = date("Y-m-d");
        $query = $this->db->query("select * from member where org_id='" . $this->session->userdata('user_id') . "'");
        foreach ($query->result() as $member_info):
            if ($current_date > $member_info->expire_date):
                $name = $member_info->name;
                $ex_date = $member_info->expire_date;
                $member_email = $member_info->email;
                $this->load->library('email');
                $this->email->from('', 'Reminder');
                $this->email->to("$member_email");
                $this->email->subject("Reminder");
                $this->email->message("Dear $name your membership has expired at $ex_date Please contact with admin to extend your membership");
                $this->email->send();
            endif;
        endforeach;
        $query1 = $this->db->query("select * from user_info where id='" . $this->session->userdata('user_id') . "'");
        foreach ($query1->result() as $user_info1):

            $optional_address = $user_info1->org_optional_address;
            $card_no = $user_info1->card_no;
            $expire_date = $user_info1->expire_date;
            $cvv2_no = $user_info1->cvv2_no;
            $name_on_card = $user_info1->name_on_card;
            $bank_info = $user_info1->bank_info;
            $photo1 = $user_info1->photo1;
            $org_type = $user_info1->org_type;
            $flag = $user_info1->flag;
        endforeach;
        if ($flag == '1') {
            redirect('organization/back/profile');
        } else {
            redirect('organization/back');
        }
    }

    function process_login() {        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/login_form_user');
        } else {   
            $username = $this->input->post('username');
            //$password = base64_encode($this->input->post('password'));
            //$query1 = $this->db->query("SELECT * FROM user_info WHERE (email='" . $username . "' && password='" . $password . "'and login_status=2) || (username='" . $username . "' and password='" . $password . "'and login_status=2) || (person_number='" . $username . "' and password='" . $password . "'and login_status=2)");
           
            $password = $this->encrypt($this->input->post('password'),'vaccitvassit'); 
            $query1 = $this->info_model->check_user_login($username, $password);
            
            
            if ($query1->num_rows() == 1) {
                foreach ($query1->result() as $info):
                    $user_id = $info->id;
                    //$role_id = $info->role_id;

                endforeach;
                $data = array(
                    'username' => $username,
                    'user_id' => $user_id,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($data);
                //$this->send_reminder();
                redirect('organization/back');
            } 
            else {

                $this->session->set_flashdata('message', '<div id="message">Username or Password is Incorrect, Please try again.</div>');
                redirect('orgadmin/index');
            }
        }
}

    function logout() {
        //$this->session->sess_destroy();
        $this->session->unset_userdata('user_id');
        redirect('orgadmin');
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