<?php

include_once 'BaseController.php';

class Home extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('organization/info_model');
        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->siteTitle = 'Account Soft | ';
    }

    public function index() {
        if ($this->session->userdata('user_id') != "") {
            
             if($this->session->userdata('user_type')=="Admin"){
                    redirect('organization/info/dashboard');
                }
                else{
                    redirect('organization/info/home');
            }
            
            //redirect('org_member/back');
        }
        $this->load->view('frontend/login_form_member');
        //$this->data['dynamicView'] = 'frontend/login_form_user';
        //$this->_commonPageLayout('frontend_viewer');
    }

    function process_login() {       
        //echo $expire_date= time() ;exit;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', $this->lang->line('label_user_name'), 'trim|required');
        $this->form_validation->set_rules('password', $this->lang->line('label_user_password'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/login_form_member');
        } else {
            $mem_type ="";
            $username = $this->input->post('username');
            $password = $this->encrypt($this->input->post('password'),'vaccitvassit'); 
            $query1 = $this->info_model->check_user_login($username, $password);
            //$member_group = "";

            if($query1->num_rows() >= 1) {     
                 foreach ($query1->result() as $info):
                    $mem_id = $info->mem_id; 
                    $mem_type = $info->mem_type_id; 
                    ///$group_info = $this->info_model->get_mem_group_info_by_mem_id($mem_id);
                    //if($group_info){foreach($group_info as $rows){ $member_group = $rows->group_id; }}
                    //$user_id = $info->id;                    
                    //$org_id = $info->org_id;                    
                    //$package_name = $info->package_name;
                    //$name = $info->first_name;
                endforeach;
                /*$data = array(
                    'user_name' => $username,
                    'user_id' => $user_id,
                    'mem_id' => $mem_id,
                    'member_org' => $org_id,
                    'member_group' => $member_group,
                    'package_name' => $package_name,
                    'mem_type' => $mem_type,
                    'mname' => $name,
                    'loggedin' => TRUE
                );*/
                $data = array(
                    'user_name' => $username,                   
                    'mem_id' => $mem_id,               
                    'logged_in_as' => "organization",               
                    'loggedin' => TRUE
                );
                $this->session->set_userdata($data);                
                if($mem_type=="Admin" || $mem_type=="Superadmin"){
                    redirect('organization/info/dashboard');
                }
                else{
                    redirect('organization/info/home');
                }
            
                    
            } else {
                $this->session->set_flashdata('message', '<div id="message">'.$this->lang->line('user_name_or_password_incorrect_msg').'</div>');
                redirect('home/index');
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
        redirect('home');
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