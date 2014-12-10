<?php

include_once 'BaseController.php';

class info extends BaseController {

    function info() {
        parent::__construct();
        // if ($this->session->userdata('loggedin') != TRUE) {
        if ($this->session->userdata('mem_id') == "") {
            redirect('member/index');
        }
        $this->load->model('org_member/info_model');
    }

    function add_post($start=0) {
        $this->data['mainTab'] = 'article';
        $this->data['activeTab'] = 'post_article';
        $this->data['dynamicView'] = 'pages/member/post/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_post($start=0) {        
        $this->data['mainTab'] = 'article';
        $this->data['activeTab'] = 'post_article';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('text', 'Text', 'trim|required');
        $this->form_validation->set_rules('date_of_creation', 'Date Of Creation', 'trim|required');
        $this->form_validation->set_rules('importance', 'Importance', 'trim|required');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required');
        $this->form_validation->set_rules('heading', 'Heading', 'trim|required');
        $this->form_validation->set_rules('article_type', 'Article Type', 'trim|required');
        $this->form_validation->set_rules('article_category', 'Article Category', 'trim|required');
        $this->form_validation->set_rules('send_by', 'Sending way', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/post/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $system_date = date("Y-m-d");
            $ex_date = $this->input->post('expire_date');
            if ($ex_date >= $system_date) {
                date_default_timezone_set("Asia/Dhaka");
                $creation_date = date('H:i A');
                $query = $this->db->query("select * from member_previlige where user_type='" . $this->session->userdata("user_type") . "'");
                foreach ($query->result() as $info):
                endforeach;
                if ($info->mainboard_change_article == '1'):
                    $data = array(
                        'title' => $this->input->post('title'),
                        'heading' => $this->input->post('heading'),
                        'article_type' => $this->input->post('article_type'),
                        'article_category' => $this->input->post('article_category'),
                        'text' => $this->input->post('text'),
                        'date_of_creation' => $this->input->post('date_of_creation'),
                        'created_by' => $this->session->userdata('id'),
                        'importance' => $this->input->post('importance'),
                        'expire_date' => $this->input->post('expire_date'),
                        'member_id' => $this->session->userdata('id'),
                        'org_id' => $this->session->userdata('member_org'),
                        'member_group' => $this->session->userdata('member_group'),
                        'status' => 2,
                        'creation_time' => $creation_date
                    );
                else:
                    $data = array(
                        'title' => $this->input->post('title'),
                        'heading' => $this->input->post('heading'),
                        'article_type' => $this->input->post('article_type'),
                        'article_category' => $this->input->post('article_category'),
                        'text' => $this->input->post('text'),
                        'date_of_creation' => $this->input->post('date_of_creation'),
                        'created_by' => $this->session->userdata('id'),
                        'importance' => $this->input->post('importance'),
                        'expire_date' => $this->input->post('expire_date'),
                        'member_id' => $this->session->userdata('id'),
                        'org_id' => $this->session->userdata('member_org'),
                        'member_group' => $this->session->userdata('member_group'),
                        'status' => 1,
                        'creation_time' => $creation_date
                    );
                endif;
                $this->info_model->member_post_insert($data);
                //$a_id = $this->db->insert_id();
                $article_title = $this->input->post('title');
                $article_text = $this->input->post('text');
                $post_member = $this->input->post("checkbox");
                $post_group = $this->input->post("checkbox1");
                $r3 = $this->db->query("select name,email from member where id='" . $this->session->userdata("id") . "'");
                foreach ($r3->result() as $r13):
                    $sender_email = $r13->email;
                    $sender_name = $r13->name;
                endforeach;
                $send_by = $this->input->post("send_by");
                //emial
                if ($send_by == '1') {
                    if ($this->input->post("a_email") == '3') {

                        if (!empty($post_member) || !empty($post_group)) {
                            if (!empty($post_member)) {
                                for ($i = 0; $i < sizeof($post_member); $i++):
                                    if ($post_member[$i] != $this->session->userdata("id")):
                                        $r = $this->db->query("select name,email from member where id='" . $post_member[$i] . "'");
                                        foreach ($r->result() as $r1):
                                            $email = $r1->email;
                                            $name = $r1->name;
                                        endforeach;

                                        $to = $email;
                                        $subject = "Notification";
                                        $txt = "Dear $name , $sender_name posted a new article. Title:$article_title  $article_text ";
                                        $headers = "From: $sender_email" . "\r\n";
                                        mail($to, $subject, $txt, $headers);
                                    endif;
                                endfor;
                            }

                            if (!empty($post_group)) {
                                for ($i = 0; $i < sizeof($post_group); $i++):
                                    $group_id = $post_group[$i];
                                    $this->data['group_member'] = $this->info_model->get_group_member($group_id);
                                    foreach ($this->data['group_member'] as $g_member_info):
                                        if ($g_member_info->id != $this->session->userdata("id")):
                                            $email1 = $g_member_info->email;
                                            $name1 = $g_member_info->name;
                                            $to = $email1;
                                            $subject = "Notification";
                                            $txt = "Dear $name1, $sender_name posted a new article. Title:$article_title $article_text ";
                                            $headers = "From: $sender_email" . "\r\n";
                                            mail($to, $subject, $txt, $headers);
                                        endif;
                                    endforeach;
                                endfor;
                            }
                        }
                    }
                    //letter
                    if ($this->input->post("a_letter") == '4') {
                        if (!empty($post_member) || !empty($post_group)) {
                            $data = array(
                                'title' => $this->input->post('title'),
                                'text' => $this->input->post('text'),
                                'sender_name' => $this->session->userdata('id'),
                                'org_id' => $this->session->userdata('member_org'),
                                'member_group' => $this->session->userdata('member_group'),
                                'sending_date' => $this->input->post('date_of_creation'),
                                'admin_status' => 1,
                                'superadmin_status' => 1,
                            );
                            $this->load->model('org_member/letter_model');
                            $this->letter_model->letter_insert($data);
                            $letter_id = $this->db->insert_id();
                            if (!empty($post_member)) {
                                for ($i = 0; $i < sizeof($post_member); $i++):
                                    if ($post_member[$i] != $this->session->userdata("id")):
                                        $data1 = array(
                                            'sender_id' => $this->session->userdata('id'),
                                            'member_id' => $post_member[$i],
                                            'letter_id' => $letter_id,
                                            'org_id' => $this->session->userdata('member_org'),
                                            'admin_status' => 1,
                                            'superadmin_status' => 1
                                        );
                                        $this->letter_model->letter_request_insert($data1);
                                    endif;
                                endfor;
                            }
                            $j = 0;
                            if (!empty($post_group)) {
                                for ($i = 0; $i < sizeof($post_group); $i++):
                                    $group_id = $post_group[$i];
                                    $this->data['group_member'] = $this->letter_model->get_group_member($group_id);
                                    foreach ($this->data['group_member'] as $g_member_info):
                                        if ($g_member_info->id != $this->session->userdata("id")):
                                            $data1 = array(
                                                'sender_id' => $this->session->userdata('id'),
                                                'member_id' => $g_member_info->id,
                                                'letter_id' => $letter_id,
                                                'org_id' => $this->session->userdata('member_org'),
                                                'admin_status' => 1,
                                                'superadmin_status' => 1
                                            );
                                            $this->letter_model->letter_request_insert($data1);
                                            $j = $j + 1;
                                        endif;
                                    endforeach;
                                endfor;
                            }

                            $total_no_of_letter = sizeof($post_member) + $j;
                            $sender_name = $this->session->userdata('id');
                            $data2 = array(
                                'sending_date' => date('Y-m-d'),
                                'sender_name' => $this->session->userdata('id'),
                                'no_of_letter' => $total_no_of_letter,
                                'org_id' => $this->session->userdata('member_org'),
                                'letter_id' => $letter_id,
                                'status' => 1
                            );
                            $this->letter_model->total_letter_insert($data2);
                        }
                    }
                }
                //sms
                elseif ($send_by == '2') {

                    if ($this->input->post("n_sms") == '6') {
                        $konto = "ip1-1868";  //username
                        $pass = "y5lhyp0q";
                        $from_phone = "";
                        $uid = $this->session->userdata('member_org');
                        $this->data['org_phone'] = $this->info_model->get_orginfo($uid);
                        foreach ($this->data['org_phone'] as $o_info):
                            $from_phone = $o_info->content;
                        endforeach;
                        if (!empty($post_member) || !empty($post_group)) {
                            $j = 0;
                            if (!empty($post_group)) {
                                for ($i = 0; $i < sizeof($post_group); $i++):
                                    $group_id = $post_group[$i];
                                    $this->data['group_member'] = $this->info_model->get_group_member($group_id);
                                    foreach ($this->data['group_member'] as $g_member_info):
                                        if ($g_member_info->id != $this->session->userdata("id")):
                                            $member_id = $g_member_info->id;
                                            $email1 = $g_member_info->email;
                                            $name1 = $g_member_info->name;
                                            $phone_number = $g_member_info->phone;
                                            $content = "Dear $name1 a new article is posted";
                                            $priority = 2;
                                            $c = $this->multiple_receipient($konto, $pass, $from_phone, $phone_number, $content, $priority);
                                            $j = $j + 1;
                                        endif;
                                    endforeach;
                                endfor;
                            }
                            if (!empty($post_member)) {
                                for ($i = 0; $i < sizeof($post_member); $i++):
                                    if ($post_member[$i] != $this->session->userdata("id")):
                                        $id = $post_member[$i];
                                        $r81 = $this->db->query("select name,email,phone from member where id='" . $id . "'");
                                        foreach ($r81->result() as $r18):
                                            $e = $r18->email;
                                            $n = $r18->name;
                                            $p = $r18->phone;
                                        endforeach;
                                        $phone_number1 = $p;
                                        $phone_number = $phone_number1;
                                        $content = "Dear $n a new article is posted";
                                        $priority = 2;
                                        $c = $this->multiple_receipient($konto, $pass, $from_phone, $phone_number, $content, $priority);
                                    endif;
                                endfor;
                            }
                            $total_no_of_sms = sizeof($post_member) + $j;

                            $data2 = array(
                                'sending_date' => date('Y-m-d'),
                                'sender_name' => $this->session->userdata('id'),
                                'no_of_sms' => $total_no_of_sms,
                                'org_id' => $this->session->userdata('member_org'),
                                'status' => 1
                            );
                            $this->info_model->total_sms_insert($data2);
                        }
                    }
                    elseif ($this->input->post("n_email") == '5') {
                        if (!empty($post_member) || !empty($post_group)) {
                            if (!empty($post_member)) {
                                for ($i = 0; $i < sizeof($post_member); $i++):
                                    if ($post_member[$i] != $this->session->userdata("id")):
                                        $r = $this->db->query("select name,email from member where id='" . $post_member[$i] . "'");
                                        foreach ($r->result() as $r1):
                                            $email = $r1->email;
                                            $name = $r1->name;
                                        endforeach;

                                        $to = $email;
                                        $subject = "Notification";
                                        $txt = "Dear $name , $sender_name posted a new article. Title:$article_title ";
                                        $headers = "From: $sender_email" . "\r\n";
                                        mail($to, $subject, $txt, $headers);
                                    endif;
                                endfor;
                            }

                            if (!empty($post_group)) {
                                for ($i = 0; $i < sizeof($post_group); $i++):
                                    $group_id = $post_group[$i];
                                    $this->data['group_member'] = $this->info_model->get_group_member($group_id);
                                    foreach ($this->data['group_member'] as $g_member_info):
                                        if ($g_member_info->id != $this->session->userdata("id")):
                                            $email1 = $g_member_info->email;
                                            $name1 = $g_member_info->name;
                                            $to = $email1;
                                            $subject = "Notification";
                                            $txt = "Dear $name1 , $sender_name posted a new article. Title:$article_title ";
                                            $headers = "From: $sender_email" . "\r\n";
                                            mail($to, $subject, $txt, $headers);
                                        endif;
                                    endforeach;
                                endfor;
                            }
                        }
                    } else {
                        
                    }
                } else {
                    
                }
                $this->session->set_flashdata('message', '<div id="message1">Post submitted successfully.</div>');
                redirect('org_member/info/add_post');
            } else {
                $this->session->set_flashdata('message', '<div id="message">Expire date must be greater then posting date.</div>');
                redirect('org_member/info/add_post');
            }
        }
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

    function view_post() {
        $this->data['mainTab'] = 'article';
        $this->data['activeTab'] = 'view_article';
        $this->data['query1'] = $this->info_model->view_post();
        $this->data['dynamicView'] = 'pages/member/post/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function post_send($post_id) {
        $this->data['mainTab'] = 'article';
        $this->data['activeTab'] = 'view_article';
        $this->data['post_id'] = $post_id;
        $this->data['dynamicView'] = 'pages/member/post/sender_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_sending_post() {
        $a = $this->input->post("checkbox");
        for ($i = 0; $i < sizeof($a); $i++):
            $data1 = array(
                'send_from' => $this->session->userdata('id'),
                'send_to' => $a[$i],
                'post_id' => $this->input->post("post_id"),
                'send_by_email' => $this->input->post("send_by_email"),
                'status' => 1
            );
            $this->info_model->post_info_insert($data1);
        endfor;
        $data1 = array(
            'send_from' => $this->session->userdata('id'),
            'send_to' => $this->session->userdata('id'),
            'post_id' => $this->input->post("post_id"),
            'send_by_email' => $this->input->post("send_by_email"),
            'status' => 1
        );
        $this->info_model->post_info_insert($data1);

        $this->session->set_flashdata('message', '<div id="message1">Post send successfully .Please wait for admin apporval</div>');
        redirect('org_member/info/view_post');
    }

    function view_sending_post() {
        $this->data['dynamicView'] = 'pages/member/post/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_comment() {
        $post_id = $this->input->post("post_id");
        $comment = $this->input->post("post_comment");
        $posted_by = $this->session->userdata('id');
        $data = array(
            'post_id' => $post_id,
            'comment' => $comment,
            'posted_by' => $posted_by
        );
        $this->info_model->comment_insert($data);
        redirect('org_member/info/view_sending_post');
    }

//11709
    function view_previlige() {
        $this->data['dynamicView'] = 'pages/member/previlige/previlige';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_forum_post() {
        $this->data['mainTab'] = 'forum_member';
        $this->data['activeTab'] = 'forum';
        $this->data['dynamicView'] = 'pages/member/forum/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_forum_post($start=0) {
        $this->data['mainTab'] = 'forum_member';
        $this->data['activeTab'] = 'forum';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('text', 'Text', 'trim|required');
        $this->form_validation->set_rules('date_of_creation', 'Date Of Creation', 'trim|required');
        $this->form_validation->set_rules('expire_date', 'Expire Dte', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/forum/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $system_date = date("Y-m-d");
            $ex_date = $this->input->post('expire_date');
            if ($ex_date >= $system_date) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'text' => $this->input->post('text'),
                    'date_of_creation' => $this->input->post('date_of_creation'),
                    'created_by' => $this->session->userdata('id'),
                    'expire_date' => $this->input->post('expire_date'),
                    'member_id' => $this->session->userdata('id'),
                    'org_id' => $this->session->userdata('member_org'),
                    'member_group' => $this->session->userdata('member_group'),
                    'status' => 1,
                );
                $this->info_model->forum_post_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Post submitted successfully.</div>');
                redirect('org_member/info/add_forum_post');
            } else {
                $this->session->set_flashdata('message', '<div id="message">Expire date must be greater then posting date.</div>');
                redirect('org_member/info/add_forum_post');
            }
        }
    }

    function view_forum_post() {
        $this->data['mainTab'] = 'forum_member';
        $this->data['activeTab'] = 'forum';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/info/view_forum_post");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_forum_post()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_forum_post($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/member/forum/view_post';
        $this->_commonPageLayout('frontend_viewer');


        /* $this->data['mainTab'] = 'forum_member';
          $this->data['activeTab'] = 'forum';
          $this->data['dynamicView'] = 'pages/member/forum/view_post';
          $this->_commonPageLayout('frontend_viewer'); */
    }

    function view_forum_post_detail($id) {
        $this->data['mainTab'] = 'forum_member';
        $this->data['activeTab'] = 'forum';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/member/forum/view_post1';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_forum_comment() {
        $this->data['mainTab'] = 'forum_member';
        $this->data['activeTab'] = 'forum';
        $forum_post_id = $this->input->post("forum_post_id");
        $comment = $this->input->post("forum_comment");
        $posted_by = $this->session->userdata('id');
        $data = array(
            'post_id' => $forum_post_id,
            'comment' => $comment,
            'comment_date' => date("Y-m-d"),
            'posted_by' => $posted_by
        );
        $this->info_model->forum_comment_insert($data);
        redirect('org_member/info/view_forum_post_detail/' . $forum_post_id);
    }

    function delete_forum_post($id = NULL, $pid) {
        $this->data['mainTab'] = 'forum_member';
        $this->data['activeTab'] = 'forum';
        $this->info_model->delete_forum_post($id);
        redirect('org_member/info/view_forum_post_detail/' . $pid);
    }

    function view_mainboard() {
        $this->data['mainTab'] = 'mainboard_member';
        $this->data['activeTab'] = 'mainboard';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/info/view_mainboard");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_mainboard_article()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_mainboard_article($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/member/mainboard/mainboard_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function viewed_mainboard() {
        $this->data['mainTab'] = 'mainboard_member';
        $this->data['activeTab'] = 'mainboard';
        @$art_cat = $this->uri->segment(4);
        @$start = $this->uri->segment(5);
        //print_r($start);
        // Number of record showing per page
        $article_category = $this->input->post("article_category");
        if ($article_category == "") {
            $article_category = $art_cat;
        } else {
            $article_category = $article_category;
        }
        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/info/viewed_mainboard/" . $article_category . "/");
        $this->p_config['uri_segment'] = 5;
        $this->p_config['num_links'] = 4;
        $this->p_config['total_rows'] = $this->info_model->view_mainboard_article1(0, 0, $article_category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_mainboard_article1($start, $perPage, $article_category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/member/mainboard/mainboard_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function mainboard_viewed($id=NULL) {
        $this->data['mainTab'] = 'mainboard_member';
        $this->data['activeTab'] = 'mainboard';
        @$art_cat = $this->uri->segment(4);
        @$start = $this->uri->segment(5);
        //print_r($start);
        // Number of record showing per page
        $article_category = $id;
        if ($article_category == "") {
            $article_category = $art_cat;
        } else {
            $article_category = $article_category;
        }
        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/info/mainboard_viewed/" . $article_category . "/");
        $this->p_config['uri_segment'] = 5;
        $this->p_config['num_links'] = 4;
        $this->p_config['total_rows'] = $this->info_model->view_mainboard_article1(0, 0, $article_category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_mainboard_article1($start, $perPage, $article_category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/member/mainboard/mainboard_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard_post_detail($id) {
        $this->data['mainTab'] = 'mainboard_member';
        $this->data['activeTab'] = 'mainboard';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/member/mainboard/post_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard_post_detail1($id) {
        $this->data['mainTab'] = 'history_member';
        $this->data['activeTab'] = 'view_archive_article';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/member/archive/post_view_archive';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard_post_detail12($id) {
        $this->data['mainTab'] = 'history_member';
        $this->data['activeTab'] = 'private_archive_article';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/member/archive/post_view_archive';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_article_comment() {
        //date_default_timezone_set("asia/Dhaka");
        $this->data['mainTab'] = 'mainboard_member';
        $this->data['activeTab'] = 'mainboard';
        $article_post_id = $this->input->post("article_post_id");
        $comment = $this->input->post("article_comment");
        $posted_by = $this->session->userdata('id');
        $data = array(
            'post_id' => $article_post_id,
            'comment' => $comment,
            'comment_date' => date("Y-m-d"),
            'posted_by' => $posted_by
        );
        $this->info_model->article_comment_insert($data);
        redirect('org_member/info/view_mainboard_post_detail/' . $article_post_id);
    }

    function view_member_profile($id) {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/profile_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function archive_forum_comments($id, $pid) {
        $this->data['mainTab'] = 'forum_member';
        $this->data['activeTab'] = 'forum';
        $query = $this->db->query("select * from forum_comment where id='" . $id . "'");
        foreach ($query->result() as $info):
            $comment_id = $info->id;
            $post_id = $info->post_id;
            $comment = $info->comment;
            $posted_by = $info->posted_by;
        endforeach;
        $data = array(
            'comment_id' => $comment_id,
            'post_id' => $post_id,
            'comment' => $comment,
            'posted_by' => $posted_by,
            'archive_by' => $this->session->userdata('id'),
            'org_id' => $this->session->userdata('member_org')
        );
        $this->info_model->archive_forum_comments_insert($data);
        $this->info_model->delete_archive_comment($id);
        redirect('org_member/info/view_forum_post_detail/' . $pid);
    }

    function view_all_member_post() {
        $this->data['mainTab'] = 'post_request';
        $this->data['activeTab'] = 'post_request';
        $this->data['dynamicView'] = 'pages/member/member_post/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

    function approve_member_post($post_id) {
        $data = array(
            'status' => 2
        );
        $this->info_model->approve_member_post_update($data, $post_id);
        $query = $this->db->query("select * from post_tbl where post_id='" . $post_id . "'");
        foreach ($query->result() as $info):
            $data1 = array(
                'status' => 2
            );
            $this->info_model->approve_member_post1_update($data1, $post_id);
            if ($info->send_by_email == '2'):
                $q = $this->db->query("select email from member where id='" . $info->send_to . "'");
                foreach ($q->result() as $s_mail):
                    $email = $s_mail->email;
                endforeach;
                $q1 = $this->db->query("select * from member_post where id='" . $info->post_id . "'");
                foreach ($q1->result() as $p_message):
                    $message = $p_message->text;
                    $title = $p_message->title;
                    $posted_by = $p_message->created_by;
                    $q3 = $this->db->query("select email from member where id='" . $posted_by . "'");
                    foreach ($q3->result() as $a):
                        $email_from = $a->email;
                    endforeach;
                endforeach;
                /* $this->load->library('email');
                  $this->email->from($email_from, $title);
                  $this->email->to("$email");
                  $this->email->subject("$title");
                  $this->email->message("$message");
                  $this->email->send(); */
                $to = $email;
                $subject = $title;
                $txt = $message;
                $headers = "From: $email_from" . "\r\n";
                mail($to, $subject, $txt, $headers);
            endif;
        endforeach;

        redirect('org_member/info/view_all_member_post');
    }

    function deny_member_post($post_id) {

        $data = array(
            'status' => 3
        );
        $this->info_model->deny_member_post_update($data, $post_id);

        redirect('org_member/info/view_all_member_post');
    }

    function post_edit($id=NULL) {
        $this->data['mainTab'] = 'article';
        $this->data['activeTab'] = 'view_article';
        if ($id != NULL) {
            $this->data['record'] = $this->info_model->get_post_detail($id);
            $this->data['dynamicView'] = 'pages/member/post/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('title', 'Title', 'trim|required|xss_clean');
            $val->set_rules('text', 'Text', 'trim|required|xss_clean');
            if ($val->run()) {
                $profile_data = array(
                    'title' => $this->input->post('title'),
                    'text' => $this->input->post('text')
                );
                $this->info_model->article_update($profile_data);
                redirect('org_member/info/view_post', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function archive_article($article_id) {
        $q1 = $this->db->query("select * from member_post where id='" . $article_id . "'");
        foreach ($q1->result() as $p_message):
            $data1 = array(
                'title' => $p_message->title,
                'text' => $p_message->text,
                'heading' => $p_message->heading,
                'article_type' => $p_message->article_type,
                'article_category' => $p_message->article_category,
                'validity' => $p_message->validity,
                'date_of_creation' => $p_message->date_of_creation,
                'created_by' => $p_message->created_by,
                'expire_date' => $p_message->expire_date,
                'member_id' => $p_message->member_id,
                'org_id' => $p_message->org_id,
                'member_group' => $p_message->member_group,
                'status' => $p_message->status,
                'post_id' => $p_message->id,
            );

            //echo "<pre>";print_r($data1);die();
            $this->info_model->article_archive_insert($data1);
            $this->info_model->delete_article($article_id);
        endforeach;
        redirect('org_member/info/view_mainboard');
    }

    function profile_setting($id) {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/member/profile/previlize';
        $this->_commonPageLayout('frontend_viewer');
    }

    function profile_setting_update() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('member_title', 'Member Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('profile_message', 'Profile Message', 'trim|required|xss_clean');
        $this->form_validation->set_rules('household_size', 'HouseHold size', 'trim|xss_clean|required');
        $this->form_validation->set_rules('member_group', 'Group', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['id'] = $this->input->post("id");
            $this->data['dynamicView'] = 'pages/member/profile/previlize';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $id = $this->input->post("id");
            $this->data['record'] = $this->info_model->view_member_profile_seeting1($id);
            if (count($this->data['record'])) {
                $data = array(
                    'member_id' => $this->input->post('id'),
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'expire_date' => $this->input->post('expire_date'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'household_size' => $this->input->post('household_size'),
                    'member_group' => $this->input->post('member_group'),
                    'username' => $this->input->post('username'),
                    'org_id' => $this->session->userdata('member_org')
                );
                $this->info_model->profile_setting_update($data, $id);
                $this->session->set_flashdata('message', '<div id="message1">Profile Seeting Updated Successfully.</div>');
                redirect('org_member/info/profile_setting/' . $id, 'location', 301);
            } else {
                $id = $this->input->post("id");
                $data = array(
                    'member_id' => $this->input->post('id'),
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'expire_date' => $this->input->post('expire_date'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'household_size' => $this->input->post('household_size'),
                    'member_group' => $this->input->post('member_group'),
                    'username' => $this->input->post('username'),
                    'org_id' => $this->session->userdata('member_org')
                );
                $this->info_model->profile_setting_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Profile Seeting Saved Successfully.</div>');
                redirect('org_member/info/profile_setting/' . $id, 'location', 301);
            }
        }
    }

    function change_password() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'change_password';
        $this->data['dynamicView'] = 'pages/member/password';
        $this->_commonPageLayout('frontend_viewer');
    }

    function changed_password() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'change_password';
        //echo "<pre>"; print_r($_POST);die();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required|xss_clean|min_length[10]|max_length[20]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/password';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $old_password = base64_encode($this->input->post('old_password'));
            $query = $this->db->query("select * from member where  id='" . $this->session->userdata('id') . "'and password='" . $old_password . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">Old Password doesnt match.</div>');
                redirect('org_member/info/change_password');
            } else {
                $data = array(
                    'password' => base64_encode($this->input->post('password'))
                );
                $this->info_model->password_update($data);
                $this->session->set_flashdata('message', '<div id="message1"> Password  Changed Successfully.</div>');
                redirect('org_member/info/change_password');
            }
        }
    }

    function modify_member_profile() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'modify_profile';
        $this->data['dynamicView'] = 'pages/member/profile_edit';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_profile() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'modify_profile';
        $p = $this->db->query("select * from member_common_profile where org_id='" . $this->session->userdata("member_org") . "'");
        if ($p->num_rows() > 0) {
            foreach ($p->result() as $info):
                $member_title = $info->member_title;
                $name = $info->name;
                $address = $info->address;
                $phone = $info->phone;
                $profile_message = $info->profile_message;
                $email = $info->email;
                $household_size = $info->household_size;
                $bank_info = $info->bank_info;
            endforeach;
            $this->load->library('form_validation');
            if ($member_title == '1'):
                $this->form_validation->set_rules('member_title', 'Member Title', 'trim|required|xss_clean');
            endif;
            if ($name == '1'):
                $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
            endif;
            if ($address == '1'):
                $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
            endif;
            if ($phone == '1'):
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
            endif;
            if ($profile_message == '1'):
                $this->form_validation->set_rules('profile_message', 'profile Message', 'trim|required|xss_clean');
            endif;
            if ($email == '1'):
                $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            endif;
            if ($household_size == '1'):
                $this->form_validation->set_rules('household_size', 'Household Size', 'trim|required|xss_clean');
            endif;
            if ($bank_info == '1'):
                $this->form_validation->set_rules('bank_info', 'Bank Info', 'trim|required|xss_clean');
            endif;
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('member_title', 'Member Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
            $this->form_validation->set_rules('profile_message', 'profile Message', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('household_size', 'Household Size', 'trim|required|xss_clean');
            $this->form_validation->set_rules('bank_info', 'Bank Info', 'trim|required|xss_clean');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/member/profile_edit';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'name' => $this->input->post("name"),
                'phone' => $this->input->post("phone"),
                'address' => $this->input->post("address"),
                'member_title' => $this->input->post("member_title"),
                'profile_message' => $this->input->post("profile_message"),
                'bank_info' => $this->input->post("bank_info"),
            );
            $this->info_model->member_profile_update($data);
            $this->session->set_flashdata('message', '<div id="message1"> Profile Updated Successfully.</div>');
            redirect('org_member/info/modify_member_profile');
        }
    }

    function view_all_org_member() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'view_all_org_member';
        @$start = $this->uri->segment(4);
        $this->data['loop_start'] = $start;
        //print_r($start);
        // Number of record showing per page
        @$perPage = '10';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("org_member/info/view_all_org_member");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_all_org_member()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_all_org_member($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/member/view_all';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_presentation() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['dynamicView'] = 'pages/member/org_presentation';
        $this->_commonPageLayout('frontend_viewer');
    }

    protected

    function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/site_top_logo_member', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_menu_member', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}