<?php

class Info_model extends Model {

    function Info_model() {
        parent::Model();
        $this->load->helper('url');
    }

    function org_group_insert($data) {
        $this->db->insert('org_group', $data);
    }

   function org_member_group_insert($data) {
        $this->db->insert('org_member_groups', $data);
    }

    function user_type_insert($data) {
        $this->db->insert('user_type', $data);
    }

    function get_existing_permission($g_name) {
        $query = $this->db->query("select * from group_permission where group_id='" . $g_name . "'");
        return $query->result();
    }

    function group_permission_insert($data) {
        $this->db->insert('group_permission', $data);
    }

    function get_org_profile() {
        $query = $this->db->query("select * from user_info where id='" . $this->session->userdata('user_id') . "'");
        return $query->result();
    }

    function profile_update($data) {
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('user_info', $data);
    }

    function get_all_cost($org_id) {
        $query = $this->db->query("select * from org_cost where org_id='" . $org_id . "'");
        return $query->result();
    }

    function view_org_group1($org_id) {
        $query = $this->db->query("select * from org_group where org_id='" . $org_id . "'");
        return $query->result();
}

    function get_org_member_group($mem_id, $org_id) {
        $query = $this->db->query("select * from org_member_groups where org_id='" . $org_id. "' AND mem_id='" . $mem_id. "' ORDER BY group_id DESC");
        return $query->result();
    }

    function view_user_type($org_id) {
        $query = $this->db->query("select * from user_type where org_id='" . $org_id . "'");
        return $query->result();
    }

    function cost_insert($data) {
        $this->db->insert('org_cost', $data);
    }

    function get_org_group($id) {
        $query = $this->db->get_where('org_member_groups', array('group_id' => $id));
        return $query->result();
    }

    function get_user_info($id) {
        $query = $this->db->get_where('member', array('id' => $id));
        return $query->result();
    }

    function view_cost($org_id) {
        $query = $this->db->query("select * from org_cost where org_id='" . $org_id . "'");
        return $query->result();
    }

    function cost_delete($id) {
        $this->db->delete('org_cost', array('id' => $id));
    }

    function cost_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('org_cost', $data);
    }

    function get_cost($id) {
        $query = $this->db->get_where('org_cost', array('id' => $id));
        return $query->result();
    }

    function view_member_profile_seeting_admin($id) {
        $query = $this->db->get_where('member_profile_settings_by_admin', array('member_id' => $id));
        return $query->result();
    }
    function view_member_profile_seeting_member($id) {
        $query = $this->db->get_where('member_profile_settings_by_member', array('member_id' => $id));
        return $query->result();
    }
    function view_member_profile_seeting1($id) {
        $query = $this->db->get_where('member_info_previlize', array('member_id' => $id));
        return $query->result();
    }

    function view_group_permission($org_id) {

        $query = $this->db->query("select * from group_permission where org_id='" . $org_id . "'");
        return $query->result();
    }

    function profile_seeting_insert_by_admin($data) {
        $this->db->insert('member_profile_settings_by_admin', $data);
        $this->db->insert('member_profile_settings_by_member', $data);
        return $this->db->insert_id();
    }

    function profile_seeting_insert_by_member($data) {
        $this->db->insert('member_profile_settings_by_member', $data);
        return $this->db->insert_id();
    }
    function profile_seeting_update_by_admin($data, $id) { 
        $this->db->where('member_id', $id);
        $this->db->update('member_profile_settings_by_admin', $data);
        $this->db->update('member_profile_settings_by_member', $data);        
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function profile_seeting_update_by_member($data, $id) { 
        $this->db->where('member_id', $id);
        $this->db->update('member_profile_settings_by_member', $data);        
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function profile_seeting_update1($profile_data, $id) {
        $this->db->where('member_id', $id);
        $this->db->update('member_info_previlize', $profile_data);
    }

    function get_group_info($id) {
        $query = $this->db->query("select * from group_permission where group_id='" . $id . "'");
        return $query->result();
    }

    function group_permission_update($data) {
        $this->db->where('group_id', $this->input->post('group_name'));
        $this->db->update('group_permission', $data);
    }

    function get_existing_username($u_name) {
        $query = $this->db->query("select username from member where username='" . $u_name . "'");
        return $query->result();
    }

    function member_registration($data) {
        $this->db->insert('member', $data);
    }

    function previlige_insert($data) {
        $this->db->insert('member_previlige', $data);
    }

    function previlige_update($data1) {
        $this->db->where('id', $this->input->post('member_id'));
        $this->db->update('member', $data1);
    }

    function pget_reg_member() {
        $org_id = $this->session->userdata('user_id');
        $query = $this->db->query("select * from member where org_id='" . $org_id . "'");
        return $query->result();
    }

    function get_reg_member($start=0, $perPage=0) {
        $this->_table = 'member';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id ', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $this->db->where('org_id ', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }

        return $query;
    }

    function org_group_update($data) {
        $this->db->where('group_id', $this->input->post('id'));
        $this->db->update('org_member_groups', $data);
    }

    function org_group_delete($id) {
         $this->db->delete('org_member_groups', array('group_id' => $id));
         if($this->db->affected_rows() > 0){
                      $this->db->delete('member_assigned_to_groups', array('group_id' => $id));
         }
         return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

/**
 * Delete faktura product
 *
 *@param $faktura_product_id 
 *@access Private
 *@return Success/Error Message
*/
function faktura_product_delete($faktura_product_id) {
         $this->db->delete('custom_faktura_products', array('faktura_product_id' => $faktura_product_id));         
         return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}


/**
 * Delete faktura product
 *
 *@param $faktura_customer_id
 *@access Private
 *@return Success/Error Message
*/
function faktura_customer_delete($faktura_customer_id) {
         $this->db->delete('custom_faktura_customer', array('faktura_customer_id' => $faktura_customer_id));         
         return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}


    function org_profile_update($data) {
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('user_info', $data);
    }

    function org_type_insert($data1) {
        $this->db->insert('org_type', $data1);
    }

    function approve_member_post_update($data, $post_id) {
        $this->db->where('id', $post_id);
        $this->db->update('member_post', $data);
    }

    function approve_member_letter_update($data, $letter_id) {
        $this->db->where('id', $letter_id);
        $this->db->update('letter', $data);
    }

    function approve_member_post1_update($data1, $post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->update('post_tbl', $data1);
    }

    function approve_member_letter1_update($data1, $letter_id) {
        $this->db->where('letter_id', $letter_id);
        $this->db->update('letter_send_request', $data1);
    }

    function approve_total_letter_update($data5, $letter_id) {
        $this->db->where('letter_id', $letter_id);
        $this->db->update('total_letter', $data5);
    }

    function deny_total_letter_update($data5, $post_id) {
        $this->db->where('letter_id', $post_id);
        $this->db->update('total_letter', $data5);
    }

    function deny_member_post_update($data, $post_id) {
        $this->db->where('id', $post_id);
        $this->db->update('member_post', $data);
    }

    function deny_member_letter_update($data, $post_id) {
        $this->db->where('id', $post_id);
        $this->db->update('letter', $data);
    }

    function get_user_type($id) {
        $query = $this->db->get_where('user_type', array('id' => $id));
        return $query->result();
    }

    function get_all_address($id) {
        $query = $this->db->get_where('address_list', array('id' => $id));
        return $query->result();
    }

    function user_type_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_type', $data);
    }

    function address_list_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('address_list', $data);
    }

    function user_type_delete($id) {
        $this->db->delete('user_type', array('id' => $id));
    }

    function delete_forum_post($id) {
        $this->db->delete('forum_comment', array('id' => $id));
    }

    function address_delete($id) {
        $this->db->delete('address_list', array('id' => $id));
    }

    function archive_forum_comments_insert($data) {
        $this->db->insert('forum_archive', $data);
    }

    function delete_archive_comment($id) {
        $this->db->delete('forum_comment', array('id' => $id));
    }

    function previlige_usertype_update($data) {
        $this->db->where('user_type', $this->input->post('user_type'));
        $this->db->update('member_previlige', $data);
    }

   
    function letter_request_insert($data1) {
        $this->db->insert('letter_send_request', $data1);
    }

    function article_archive_insert($article_id) {
        //$this->db->insert('archive_article', $data1);       
        $archieve_date = date('Y-m-d H:i:s');
            $this->db->query("INSERT INTO main_board_article_archieve SELECT NULL , article_id , org_id ,member_id,article_title, uploaded_article, 	article_text, article_color_code,article_category,article_type,importance,publish_date,expire_date,send_article_by,send_notification_by,send_to_group,send_to_member,article_reminder_email_time, article_status ,article_proposal, add_date, update_date, '$archieve_date' FROM `main_board_article` WHERE article_id=$article_id
            ");
        $archieve_id = $this->db->insert_id();
        
        if($archieve_id){
             $this->db->query("INSERT INTO comment_on_main_board_article_archieve SELECT NULL , comment_id , organization_id ,article_id, comment_on_member_id, comment_member_id, 	comment, comment_date,add_date,update_date, '$archieve_date' FROM `comment_on_main_board_article_tbl` WHERE article_id=$article_id
        ");
        }
        //$archieve_id = $this->db->insert_id();
        return $archieve_id;
        
        
        /////INSERT INTO main_board_article_archieve SELECT NULL , * , '2013-03-17 15:05:04' FROM `main_board_article` WHERE 1
    }

function forum_topic_archive_insert($topic_id) {
        //$this->db->insert('archive_article', $data1);       
        $archieve_date = date('Y-m-d H:i:s');
            $this->db->query("INSERT INTO forum_archieve SELECT NULL , topic_id , org_id ,member_id,topic_title, topic_text,publish_date,expire_date, topic_status , add_date, update_date, '$archieve_date' FROM `forum` WHERE topic_id=$topic_id
            ");
        $archieve_id = $this->db->insert_id();
        
        if($archieve_id){
             $this->db->query("INSERT INTO comment_on_forum_topic_archieve SELECT NULL , comment_id , organization_id ,topic_id, comment_on_member_id, comment_member_id, 	comment, comment_date,add_date,update_date, '$archieve_date' FROM `comment_on_forum_topic` WHERE topic_id=$topic_id
        ");
        }
        //$archieve_id = $this->db->insert_id();
        return $archieve_id;
        
        
        /////INSERT INTO main_board_article_archieve SELECT NULL , * , '2013-03-17 15:05:04' FROM `main_board_article` WHERE 1
    }
function delete_article($article_id) {
        $success = FALSE;
        $this->db->delete('main_board_article', array('article_id' => $article_id));
        if($this->db->affected_rows() > 0){
                $this->db->delete('comment_on_main_board_article_tbl', array('article_id' => $article_id));
                $success = TRUE;
        }
        return $success ; //($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

function delete_archived_article($article_id) {
        $success = FALSE;
        $this->db->delete('main_board_article_archieve', array('article_id' => $article_id));
        if($this->db->affected_rows() > 0){
                $this->db->delete('comment_on_main_board_article_archieve', array('article_id' => $article_id));
                $success = TRUE;
        }
        return $success ; //($this->db->affected_rows() > 0) ? TRUE : FALSE;
}


function delete_article_comment($article_id) {
        $this->db->delete('comment_on_main_board_article_tbl', array('article_id' => $article_id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

function delete_article_comment_by_comment_id($comment_id) {
        $this->db->delete('comment_on_main_board_article_tbl', array('comment_id' => $comment_id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function update_mainboard_article($data , $article_id){
        $this->db->where('article_id', $article_id);
        $this->db->update('main_board_article', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}


   function update_forum_topic($data , $topic_id){
        $this->db->where('topic_id', $topic_id);
        $this->db->update('forum', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}
/**
 * Approve proposed article To DB:adminscentral, Table:  main_board_article
 *
 *@Param $article_id
 *@access Private
 *@return TRUE/FALSE
*/
function approved_proposed_article($article_id){
    $data = array("article_status" => 1, "article_proposal" =>0, "proposal_approved" =>1);
    $this->db->where('article_id', $article_id);
    $this->db->update('main_board_article', $data);
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

    function password_update($data) {
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('user_info', $data);
    }

    function view_comment($start=0, $perPage=0) {
        $this->_table = 'forum_archive';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_article($start=0, $perPage=0) {
        $this->_table = 'archive_article';
        $a_type = 1;
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('article_type', $a_type);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }
    function view_article1($start=0, $perPage=0) {
        $this->_table = 'archive_article';
        $a_type = 2;
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('article_type', $a_type);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_article_sort($start=0, $perPage=0, $id, $category) {
        $this->_table = 'archive_article';
        $a_type = 1;
        if ($start >= 0 AND $perPage > 0) {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }
    function view_article_sort1($start=0, $perPage=0, $id, $category) {
        $this->_table = 'archive_article';
        $a_type = 2;
        if ($start >= 0 AND $perPage > 0) {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            if ($id == '1') {
                $this->db->order_by($this->_table . '.article_category', 'ASC');
            } elseif ($id == '2') {
                $this->db->order_by($this->_table . '.importance', 'ASC');
            } elseif ($id == '3') {
                $this->db->order_by($this->_table . '.date_of_creation', 'ASC');
            } else {
                $this->db->order_by($this->_table . '.id', 'DESC');
            }
            $this->db->where('article_category', $category);
            $this->db->where('article_type', $a_type);
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function previlige_external_insert($data) {
        $this->db->insert('org_external_previlige', $data);
    }

    function previlige_external_update($data) {
        $this->db->where('org_id', $this->session->userdata('user_id'));
        $this->db->update('org_external_previlige', $data);
    }

    function user_profile_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function org_group_permission_delete($id) {
        $this->db->delete('group_permission', array('group_id' => $id));
    }

    function address_list_insert($data) {
        $this->db->insert('address_list', $data);
    }

    function view_address_list() {
        $org_id = $this->session->userdata('user_id');
        $query = $this->db->query("select * from address_list where org_id='" . $org_id . "'");
        return $query->result();
    }

    function total_letter_insert($data2) {
        $this->db->insert('total_letter', $data2);
    }

    function get_member_info($id) {
        $query = $this->db->get_where('member', array('id' => $id));
        return $query->result();
    }

    function get_member_admin_previlize($id) {

        $query = $this->db->get_where('org_member', array('member_id' => $id));
        return $query->result();
    }

    function delete_member_admin_previlize($id) {
        $this->db->delete('org_member', array('member_id' => $id));
    }

    function admin_previlize_insert($data) {
        $this->db->insert('org_member', $data);
    }

    function get_group_member($group_id) {
        $query = $this->db->get_where('member', array('member_group' => $group_id));
        return $query->result();
    }

    function view_mainboard_article($start=0, $perPage=0) {
        $s = "2";
        $this->_table = 'member_post_back';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('status', $s);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('status', $s);
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_forum_post($start=0, $perPage=0) {
        $this->_table = 'forum';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function profile_setting_update_public($public_data, $id) {
        $this->db->where('member_id', $id);
        $this->db->update('member_info_previlize', $public_data);
    }

    function view_org_profile_seeting($org_id) {
        $query = $this->db->get_where('org_profile_previlize', array('org_id' => $org_id));
        return $query->result();
    }

    function org_profile_setting_update($data, $org_id) {
        $this->db->where('org_id', $org_id);
        $this->db->update('org_profile_previlize', $data);
    }

    function org_profile_setting_insert($data) {
        $this->db->insert('org_profile_previlize', $data);
    }

    function view_message($start=0, $perPage=0) {
        $this->_table = 'contact_info';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('flag', 1);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('flag', 1);

            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function delete_message($id) {
        $this->db->delete('contact_info', array('id' => $id));
    }

    function get_message_detail($id) {
        $query = $this->db->get_where('contact_info', array('id' => $id));
        return $query->result();
    }

    function read_status_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('contact_info', $data);
    }

    function get_expire_article() {
        $current_date = date("Y-m-d");
        $org_id = $this->session->userdata('user_id');
        $query = $this->db->query("select * from member_post_back where org_id='" . $org_id . "'and expire_date<'" . $current_date . "'");
        return $query->result();
}

/**
 * Get organization main board active article by logged user's org_id
 *
 *@Param $org_id which contains logged user's org_id
 *@Param Optional $article_title, $search_option which needed for article search 
 *@access Private
 *@return organization main board active article by logged user's org_id
*/
function get_active_article_by_org_id($org_id, $article_title , $search_option){
    //echo $search_option; exit;
        $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
       // $where_publish_date = "publish_date <= ".$todate;
       // $where_expire_date = "expire_date > ".$todate;
       
       if($search_option==""){
           $sql_string = "SELECT * FROM main_board_article 
                                    WHERE article_id IN(SELECT article_id FROM main_board_article 
                                    WHERE org_id='" . $org_id . "' AND article_status=1 AND article_proposal=0
                                    AND expire_date > '" . $todate . "' AND publish_date <= '" . $todate . "' ORDER BY publish_date DESC) 
                                    ORDER BY importance ASC";
        }
                                           
       if($search_option){
            if($search_option=="active"){
                $sql_string = "SELECT * FROM main_board_article 
                WHERE article_id IN(SELECT article_id FROM main_board_article 
                WHERE org_id='" . $org_id . "' AND article_proposal=0
                AND expire_date > '" . $todate . "' AND publish_date <= '" . $todate . "' 
                AND article_title LIKE '%$article_title%'   AND article_status=1 ORDER BY publish_date DESC) 
                ORDER BY importance ASC";
            }
            if($search_option=="archieve"){
                $sql_string = "SELECT * FROM main_board_article_archieve 
                WHERE article_id IN(SELECT article_id FROM main_board_article_archieve 
                WHERE org_id='" . $org_id . "' AND article_title LIKE '%$article_title%' ORDER BY publish_date DESC) 
                ORDER BY importance ASC";
            } 
            if($search_option=="all"){
                $sql_string = "SELECT * FROM main_board_article 
                WHERE article_id IN(SELECT article_id FROM main_board_article 
                WHERE org_id='" . $org_id . "' AND article_title LIKE '%$article_title%' AND article_proposal=0 ORDER BY publish_date DESC) 
                ORDER BY importance ASC";
            }
            
        }
        //echo $sql_string; exit;
        $query = $this->db->query($sql_string);
        return $query->result();
         // $this->db->select('* ');
        //$this->db->from('main_board_article');
        //$this->db->from('main_board_article');
        //$this->db->where('org_id',$org_id);
       // $this->db->where('article_status',1);
        //$this->db->where('article_proposal',0);
        //$this->db->where($where_publish_date);
        //$this->db->where($where_expire_date);
        //$this->db->order_by("publish_date", "DESC");
        //$this->db->order_by("importance", "ASC");
       // $query= $this->db->get();
        //return $query->result();
}


/**
 * Get organization forum's active topic by logged user's org_id
 *
 *@Param $org_id which contains logged user's org_id
 *@Param Optional $topic_title, $search_option which needed for forum's topic search 
 *@access Private
 *@return organization main board active article by logged user's org_id
*/
function get_active_forum_topic_by_org_id($org_id, $topic_title , $search_option){
        $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
       // $where_publish_date = "publish_date <= ".$todate;
       // $where_expire_date = "expire_date > ".$todate;
       
       if($search_option==""){
           $sql_string = "SELECT * FROM  forum 
                                    WHERE topic_id IN(SELECT topic_id FROM forum
                                    WHERE org_id='" . $org_id . "' AND topic_status=1 
                                    AND expire_date > '" . $todate . "' AND publish_date <= '" . $todate . "') 
                                    ORDER BY publish_date DESC";
        }
                                           
       if($search_option){
            if($search_option=="active"){
                echo $sql_string = "SELECT * FROM forum 
                WHERE topic_id IN(SELECT topic_id FROM forum 
                WHERE org_id='" . $org_id . "'  AND expire_date > '" . $todate . "' AND publish_date <= '" . $todate . "' 
                AND topic_title LIKE '%$topic_title%'   AND topic_status=1) 
                ORDER BY publish_date DESC";
            }
            if($search_option=="archieve"){
                $sql_string = "SELECT * FROM forum_archieve 
                WHERE topic_id IN(SELECT topic_id FROM forum_archieve 
                WHERE org_id='" . $org_id . "' AND topic_title LIKE '%$topic_title%') 
                ORDER BY publish_date DESC";
            } 
            if($search_option=="all"){
                $sql_string = "SELECT * FROM forum 
                WHERE topic_id IN(SELECT topic_id FROM forum 
                WHERE org_id='" . $org_id . "' AND topic_title LIKE '%$topic_title%' ) 
                ORDER BY publish_date DESC";
            }
            
        }        
        $query = $this->db->query("$sql_string");
        return $query->result();
}



/**
 * Get organization proposed article by logged user's org_id
 *
 *@Param $org_id which contains logged user's org_id
 *@Param Optional $article_title, $search_option which needed for article search 
 *@access Private
 *@return organization proposed article by logged user's org_id
*/
function get_proposed_article_by_org_id($org_id, $article_title){
        $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
       // $where_publish_date = "publish_date <= ".$todate;
       // $where_expire_date = "expire_date > ".$todate;
       
       if(empty($article_title)){
           $sql_string = "SELECT * FROM main_board_article 
                                    WHERE article_id IN(SELECT article_id FROM main_board_article 
                                    WHERE org_id='" . $org_id . "' AND article_status=0 AND article_proposal=1
                                    AND expire_date > '" . $todate . "' ORDER BY publish_date DESC) 
                                    ORDER BY importance ASC";
        }
     
       elseif(!empty($article_title)){
                $sql_string = "SELECT * FROM main_board_article 
                WHERE article_id IN(SELECT article_id FROM main_board_article 
                WHERE org_id='" . $org_id . "' AND article_title LIKE '%$article_title%' AND article_status=0 AND article_proposal=1
                AND expire_date > '" . $todate . "'  ORDER BY publish_date DESC) 
                ORDER BY importance ASC";
            }
        
        $query = $this->db->query("$sql_string");
        return $query->result();
        
}

/**
 * Get Article Details By article_id
 *
 *@Param $article_id which contains article_id AND $org_id which contains org_id
 *@access private
 *@return Article Details By article_id
 */
function get_article_details_by_article_id($article_id,$org_id){
        $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
        $sql_string = "SELECT * FROM main_board_article 
                                    WHERE org_id='" . $org_id . "' AND article_id='" . $article_id . "' AND article_status=1 AND article_proposal=0
                                    AND expire_date > '" . $todate . "' AND publish_date <= '" . $todate . "' ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}

/**
 * Get Article Details By article_id
 *
 *@Param $article_id which contains article_id AND $org_id which contains org_id
 *@access private
 *@return Article Details By article_id
 */
function get_archived_article_details_by_article_id($article_id,$org_id){
        $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
        $sql_string = "SELECT * FROM main_board_article_archieve 
                                    WHERE org_id='" . $org_id . "' AND article_id='" . $article_id . "' " ;
        $query = $this->db->query("$sql_string");
        return $query->result();
}


/**
 * Get Forum Topic Details By topic_id
 *
 *@Param $topic_id which contains topic_id AND $org_id which contains org_id
 *@access private
 *@return Forum Topic Details By topic_id
 */
function get_forum_topic_details_by_topic_id($topic_id,$org_id){
        $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
        $sql_string = "SELECT * FROM forum 
                                    WHERE org_id='" . $org_id . "' AND topic_id='" . $topic_id . "' AND topic_status=1 
                                    AND expire_date > '" . $todate . "' AND publish_date <= '" . $todate . "' ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}

/**
 * Get Archived Forum Topic Details By topic_id
 *
 *@Param $topic_id which contains topic_id AND $org_id which contains org_id
 *@access private
 *@return Forum Topic Details By topic_id
 */
function get_archived_forum_topic_details_by_topic_id($topic_id,$org_id){
        $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
        $sql_string = "SELECT * FROM forum_archieve 
                                    WHERE org_id='" . $org_id . "' AND topic_id='" . $topic_id . "' ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}

/**
 * Delete Forum Topic By topic_id
 *
 *@Param $topic_id which contains topic_id 
 *@access private
 *@return Success/Failure
 */
function delete_forum_topic($topic_id) {
        $success = FALSE;
        $this->db->delete('forum', array('topic_id' => $topic_id));
        if($this->db->affected_rows() > 0){
                $this->db->delete('comment_on_forum_topic', array('topic_id' => $topic_id));
                $success = TRUE;
        }
        return $success ; //($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

/**
 * Delete Archived Forum Topic By topic_id
 *
 *@Param $topic_id which contains topic_id 
 *@access private
 *@return Success/Failure
 */
function delete_archived_forum_topic($topic_id) {
        $success = FALSE;
        $this->db->delete('forum_archieve', array('topic_id' => $topic_id));
        if($this->db->affected_rows() > 0){
                $this->db->delete('comment_on_forum_topic_archieve', array('topic_id' => $topic_id));
                $success = TRUE;
        }
        return $success ; //($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

/**
 * Get Proposed Article Details By article_id
 *
 *@Param $article_id which contains article_id AND $org_id which contains org_id
 *@access private
 *@return Proposed Article Details By article_id
 */
function get_proposed_article_details_by_article_id($article_id,$org_id){
        $todate = mktime(0, 0, 0, date("m"), date("d") , date("Y"));
        $sql_string = "SELECT * FROM main_board_article 
                                    WHERE org_id='" . $org_id . "' AND article_id='" . $article_id . "' AND article_status=0 AND article_proposal=1
                                    AND expire_date > '" . $todate . "' ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}


/**
 * Deny Proposed article Who has permission to post article directly to mainboard
 *
 *@Param $article_id which contains article_id AND $org_id which contains org_id
 *@access public
 *@return Success/Error Message
*/
function deny_proposed_article_by_article_id($article_id,$org_id){
        $update_data = array("article_proposal" =>0, "proposal_denied" =>1);
        $this->db->where('article_id', $article_id);
        $this->db->where('org_id', $org_id);
        $this->db->update("main_board_article", $update_data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

/**
 * Delete Proposed article Who has permission to post article directly to mainboard
 *
 *@Param $article_id which contains article_id AND $org_id which contains org_id
 *@access public
 *@return Success/Error Message
*/
function delete_proposed_article_by_article_id($article_id,$org_id){
        $this->db->where('article_id', $article_id);
        $this->db->where('org_id', $org_id);
        $this->db->delete("main_board_article");
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}


/**
 * Get Article Comments By article_id
 *
 *@Param $article_id which contains article_id AND $org_id which contains org_id
 *@access private
 *@return Article Comments By article_id
 */
function get_article_comments_by_article_id($article_id,$org_id){
        $sql_string = "SELECT * FROM comment_on_main_board_article_tbl 
                                    WHERE organization_id='" . $org_id . "' AND article_id='" . $article_id . "' ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}


/**
 * Get Archieved Article Comments By article_id
 *
 *@Param $article_id which contains article_id AND $org_id which contains org_id
 *@access private
 *@return Article Comments By article_id
 */
function get_archived_article_comments_by_article_id($article_id,$org_id){
        $sql_string = "SELECT * FROM comment_on_main_board_article_archieve 
                                    WHERE organization_id='" . $org_id . "' AND article_id='" . $article_id . "' ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}


/**
 * Get Forum Topic Comments By topic_id
 *
 *@Param $topic_id which contains topic_id AND $org_id which contains org_id
 *@access private
 *@return Forum Topic Comments By topic_id
 */
function get_forum_topic_comments_by_topic_id($topic_id,$org_id){
        $sql_string = "SELECT * FROM comment_on_forum_topic 
                                    WHERE organization_id='" . $org_id . "' AND topic_id='" . $topic_id . "' ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}

/**
 * Get Archived Forum Topic Comments By topic_id
 *
 *@Param $topic_id which contains topic_id AND $org_id which contains org_id
 *@access private
 *@return Forum Topic Comments By topic_id
 */
function get_archived_forum_topic_comments_by_topic_id($topic_id,$org_id){
        $sql_string = "SELECT * FROM comment_on_forum_topic_archieve 
                                    WHERE organization_id='" . $org_id . "' AND topic_id='" . $topic_id . "' ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}


/**
 * Get Article Comment's  Details By comment_id
 *
 *@Param $comment_id which contains comment_id
 *@access private
 *@return Article Comment's Details
 */
function get_article_comments_details_by_comment_id($comment_id){
        $sql_string = "SELECT * FROM comment_on_main_board_article_tbl 
                                    WHERE comment_id='" . $comment_id . "'  ";
        $query = $this->db->query("$sql_string");
        return $query->result();
}

/**
 * Insert Article Comments in DB:adminscentral Table: comment_on_main_board_article_tbl
 *
 *@Param $data which contains article's comment data
 *@access private
 *@return Success/Failure Message
 */
function main_board_article_comment_insert($data){
    $this->db->insert('comment_on_main_board_article_tbl', $data);
    $comment_id = $this->db->insert_id();
    return $comment_id;
}


/**
 * Insert External Contact in DB:adminscentral Table: org_mem_external_contact
 *
 *@Param $data which contains article's comment data
 *@access private
 *@return Success/Failure Message
 */
function org_mem_external_contact_insert($data){
    $this->db->insert('org_mem_external_contact', $data);
    $contact_id = $this->db->insert_id();
    return $contact_id;
}

/**
 * Insert Forum Comments in DB:adminscentral Table: comment_on_forum_topic
 *
 *@Param $data which contains article's comment data
 *@access private
 *@return Success/Failure Message
 */
function forum_comment_insert($data){
    $this->db->insert('comment_on_forum_topic', $data);
    $comment_id = $this->db->insert_id();
    return $comment_id;
}


    function message_insert($data) {
        $this->db->insert('contact_info', $data);
    }

    function article_category_insert($data) {
        $this->db->insert('article_category', $data);
    }

    function view_article_category($org_id) {
        $query = $this->db->query("select * from article_category where org_id='" . $org_id. "'");
        return $query->result();
    }

    function get_category($id) {
        $query = $this->db->get_where('article_category', array('art_cat_id' => $id));
        return $query->result();
    }

    function article_category_update($profile_data) {
        $this->db->where('art_cat_id', $this->input->post("id"));
        $this->db->update('article_category', $profile_data);
}

   function check_category($article_category, $id,$org_id){
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(category_name)=', strtolower($article_category));       
        $this->db->where('art_cat_id !=', $id);
		$this->db->where('org_id =', $org_id);
        return $this->db->get('article_category');  
   }


    function view_mainboard($start=0, $perPage=0, $article_category) {
        $s = "2";
        $this->_table = 'member_post';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('status', $s);
            $this->db->where('article_category', $article_category);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('user_id'));
            $this->db->where('status', $s);
            $this->db->where('article_category', $article_category);
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_setting($id) {
        $query = $this->db->query("select * from member_common_profile where org_id='" . $id . "'");
        return $query->result();
    }

    function setting_update($data) {
        $this->db->where('org_id', $this->session->userdata("user_id"));
        $this->db->update('member_common_profile', $profile_data);
    }

    function setting_insert($data) {
        $this->db->insert('member_common_profile', $data);
}

/**
 * Get global_settings data From DB:adminscentral, Table: global_settings
 *
 *@access Private
 *@return global_settings data
*/
    function get_global_settings() {
            $where = array('id' => 1);
			$query = $this->db->get_where('global_settings', $where);            
		if($query->num_rows()>0){
		   	return $query->result();
		}
        
}

/**
 * Check user login From DB: adminscentral Table: member
 *
 *@Param $username and $password
 *@access private
 *@return Success/Failure message
 *IF SuperAdmin >> member.activation_date = organization_info.activation_date, member.expire_date = organization_info.expire_date
 *IF Subscription User >> member.expire_date = Updated by Subscription Expire Date
 *IF Normal User >> Nothing Will Update in-terms of Expire or Loggin.
 */

function check_user_login($username, $password){
        $success=0;
        //$login_sql = "SELECT * FROM member WHERE ((username='" . $username . "' || email='" . $username . "' || person_number='" . $username . "') && password='" . $password . "')";
		//$query= $this->db->query($login_sql);	
        $where_member_credentials = "((member.username='" . $username . "' || member.email='" . $username . "' || member.ssn_or_person_no='" . $username . "') && member.password='" . $password . "' && member.blocked= 0)";
		$where_activation_date = "member.activation_date <= ".time();        
		$where_expire_date = "member.expire_date >= ".time();        
        
        $where_activation_date_not_empty = "member.activation_date != ' ' ";        
		$where_expire_date_not_empty = "member.expire_date != ' ' ";        
		//$where_activation_date = "organization_info.activation_date <= ".time();        
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        //$this->db->where('user_type','Admin');      
        $this->db->where('organization_info.approval_status',1);  
        $this->db->where('organization_info.org_blocked',0);
        //$this->db->where('member.expired',0);
        $this->db->where('member.blocked',0);
        //$this->db->where('organization_info.expired',0);
        $this->db->where($where_activation_date);
        $this->db->where($where_expire_date);
        $this->db->where($where_activation_date_not_empty);
        $this->db->where($where_expire_date_not_empty);
        $this->db->where($where_member_credentials);
        $query= $this->db->get();
        return $query;   		
        
}


/**
 * Get organization member previlize for logged user
 *
 *@Param $mem_type which contains logged user's member type id AND $member_org which contains logged user's org_id
 *@access public
 *@return organization member previlize
*/
function check_org_member_previlize($mem_type, $member_org){
        $query = $this->db->get_where('org_member_previlige', array('mem_type_id' => $mem_type , 'org_id' => $member_org));
        return $query->result();    
}


/**
 * Get External Contact List By Organization's Member
 *
 *@Param $mem_id which contains logged user's id AND $member_org which contains logged user's org_id
 *@access public
 *@return External Contact List By Organization's Member
*/
function get_all_external_contact_by_org_member($member_org, $mem_id){
        $query = $this->db->get_where('org_mem_external_contact', array('member_id' => $mem_id , 'org_id' => $member_org));
        return $query->result();    
}

/**
 * Get External Contact List info  By Organization's Member AND BY  ext_contact_ids
 *
 *@Param $mem_id which contains logged user's id , $member_org which contains logged user's org_id AND ext_contact_ids
 *@access public
 *@return External Contact List By Organization's Member AND BY  ext_contact_ids
*/
function get_org_mem_external_contact_info_by_ids($member_org, $mem_id, $ext_contact_ids){
        $where_ext_contact_ids = "ext_contact_id IN($ext_contact_ids)";
        $this->db->where($where_ext_contact_ids);
        $query = $this->db->get_where('org_mem_external_contact', array('member_id' => $mem_id , 'org_id' => $member_org));
        return $query->result();    
}

/**
 * Get External Contact By ext_contact_id
 *
 *@Param $ext_contact_id
 *@access Private
 *@return External Contact By ext_contact_id
*/
function get_external_contact_by_id($ext_contact_id){
        $query = $this->db->get_where('org_mem_external_contact', array('ext_contact_id' => $ext_contact_id));
        return $query->result();    
}


/**
 * Update External Contact By ext_contact_id
 *
 *@Param $data which contains External contact data, $ext_contact_id
 *@access Private
 *@return TRUE/FALSE
*/
function org_mem_external_contact_update($data, $ext_contact_id){
    $this->db->where('ext_contact_id', $ext_contact_id);
    $this->db->update('org_mem_external_contact', $data);    
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;

}


/**
 * Delete external contact
 *
 *@param $ext_contact_id 
 *@access Private
 *@return Success/Error Message
*/
function delete_external_contact($ext_contact_id) {
        $this->db->where('ext_contact_id', $ext_contact_id);
        $this->db->delete("org_mem_external_contact");
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

/**
 * Insert email_message info in DB: adminscentral Table: member_communicate_member_email
 *
 *@Param $data which contains email_message information
 *@access private
 *@return inserted $communication_id
 */

function email_insert($data) {
        $this->db->insert('member_communicate_member_email', $data);
        $communication_id = $this->db->insert_id();
        return $communication_id;
}

/**
 * Get member_communicate_member_message From DB: adminscentral Table:  member_communicate_member_email
 *
 *@Param $flag which indicates all messages/inbox messages/unread messages, $mem_id which is logged user id, $member_group, $mem_type
 *@access private
 *@return  member_communicate_member_email
*/
  function get_member_communicate_member_message($flag, $mem_id, $member_group, $mem_type) {     
        if($flag=="inbox"){                       
            $sql_query = "SELECT * FROM member_communicate_member_email WHERE message_read=0 AND (send_to_member LIKE '%,$mem_id,%' OR send_to_group LIKE '%,$member_group,%')"; 
            /*if($mem_type=="Admin" || $mem_type=="Superadmin"){
                $sql_query = "SELECT * FROM member_communicate_member_email WHERE message_read=0 AND (send_to_admin_member LIKE '%,$mem_id,%' OR send_to_admin_group='Admins')"; 
            }*/
            $query= $this->db->query($sql_query);          
            return $query->num_rows();    
        }
        if($flag=="sent"){
            $this->db->select('*');
            $this->db->from('member_communicate_member_email');
            $this->db->where('sender_id',$mem_id);
            $query= $this->db->get();
            return $query->num_rows();                
        }
         
}


/**
 * Get get_member_communicate_inbox_sms From DB: adminscentral Table: member_communicate_member_sms
 *
 *@Param $mem_id, $member_group , $mem_type , $start=0, $perPage=0
 *@access private
 *@return get_member_communicate_inbox_sms
*/
    function get_member_communicate_inbox_sms($mem_id , $member_group , $mem_type , $start=0, $perPage=0) {
            $this->_table = 'member_communicate_member_sms';   
            if($mem_type=="Admin" || $mem_type=="Superadmin"){
                $where_condition = "send_to_admin_member LIKE '%,$mem_id,%' OR send_to_admin_group='Admins'";
            }else{
                $where_condition = "send_to_member LIKE '%,$mem_id,%' OR send_to_group LIKE '%,$member_group,%'";
            }            
            //echo $where_condition;exit;
            $this->db->where($where_condition); 
            $this->db->order_by($this->_table . '.sms_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
}


/**
 * Get get_member_communicate_sent_message From DB: adminscentral Table: member_communicate_member_email
 *
 *@Param $flag which indicates all messages/sent 
 *@access private
 *@return get_member_communicate_all_message
*/
    function get_member_communicate_sent_message($start=0, $perPage=0, $sender_id) {
            $this->_table = 'member_communicate_member_email';        
            $this->db->where('sender_id', $sender_id ); 
            //$this->db->where('send_from !=',"Adminscentral"); 
            $this->db->order_by($this->_table . '.communication_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
}

/**
 * Get get_member_communicate_sent_sms From DB: adminscentral Table: member_communicate_member_sms
 *
 *@Param $flag which indicates all messages/sent 
 *@access private
 *@return get_member_communicate_all_sms
*/
    function get_member_communicate_sent_sms($start=0, $perPage=0, $sender_id) {
            $this->_table = 'member_communicate_member_sms';        
            $this->db->where('sender_id', $sender_id ); 
            //$this->db->where('send_from !=',"Adminscentral"); 
            $this->db->order_by($this->_table . '.sms_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
}

/**
 * Delete SMS message : From DB: adminscentral Table: member_communicate_member_sms
 *
 *@Param $admin_sms_id Whcih contains SMS id
 *@access private
 *@return Success/Failure message
 */

    function delete_member_sms($member_sms_id) {
        /*$query_str = $this->db->query("DELETE FROM  admin_communicate_org_sms WHERE sms_id IN($admin_sms_id)");
        $query = $this->db->query($query_str);*/
        $this->db->where_in('sms_id', $member_sms_id);
        $this->db->delete('member_communicate_member_sms');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
    }
/**
 * Get email_message_read status update To DB: adminscentral Table: member_communicate_member_email
 *
 *@Param $data which contains read status value(1) AND $id contains E-mail message id
 *@access private
 *@return Success/Error Message
*/
    function member_comm_member_email_status_update($data, $id) {
        $this->db->where('communication_id', $id);
        $this->db->update('member_communicate_member_email', $data);
    }

/**
 * Get E-mail message details From DB:adminscentral Table: member_communicate_member_email
 *
 *@Param $id which contains E-mail message id
 *@access private
 *@return E-mail message details
*/

    function get_email_message_detail($id) {
        $query = $this->db->get_where('member_communicate_member_email', array('communication_id' => $id));
        return $query->result();
}


/**
 * Get reply_email_message_detail From DB:adminscentral Table: member_communicate_member_email
 *
 *@Param $communication_id which contains E-mail message id AND $reply_id which contains reply for which message
 *@access private
 *@return E-mail message details
*/
    function get_reply_email_message_detail($communication_id, $reply_id) {
        $this->db->select('*');
        $this->db->from('member_communicate_member_email');
        //$where = "communication_id=$reply_id";OR (reply_of=$reply_id AND communication_id!=$communication_id)
        //$where = "reply_of=$reply_id AND communication_id!=$communication_id";
        if($communication_id){        
            $this->db->where('communication_id',$reply_id); 
        }
        $this->db->or_where('reply_of',$reply_id);
        $this->db->where('communication_id !=',$communication_id);
        $this->db->order_by('communication_id', 'DESC');
        $query= $this->db->get();
        return $query->result();
    }

/**
 * Get get_member_communicate_inbox_message From DB: adminscentral Table: member_communicate_member_email
 *
 *@Param $mem_id, $member_group , $mem_type , $start=0, $perPage=0
 *@access private
 *@return get_member_communicate_inbox_message
*/
    function get_member_communicate_inbox_message($mem_id , $member_group , $mem_type , $start=0, $perPage=0) {
            $this->_table = 'member_communicate_member_email';   
            $where_condition = "send_to_member LIKE '%,$mem_id,%' OR send_to_group LIKE '%,$member_group,%'";
           /* if($mem_type=="Admin" || $mem_type=="Superadmin"){
                $where_condition = "send_to_admin_member LIKE '%,$mem_id,%' OR send_to_admin_group='Admins'";
            }else{
                $where_condition = "send_to_member LIKE '%,$mem_id,%' OR send_to_group LIKE '%,$member_group,%'";
            } */       
            //echo $where_condition;exit;
            $this->db->where($where_condition); 
            $this->db->order_by($this->_table . '.communication_id', 'DESC');
            $query = $this->db->get($this->_table, $perPage, $start);        
            return $query;
}

/**
 * Get member_communicate_member_sms From DB: adminscentral Table:  member_communicate_member_sms
 *
 *@Param $flag which indicates all sms/inbox sms/unread sms, $mem_id which is logged user id, $member_group, $mem_type
 *@access private
 *@return  member_communicate_member_sms
*/
  function get_member_communicate_member_sms($flag, $mem_id, $member_group, $mem_type) {        
        
        if($flag=="inbox"){                       
            $sql_query = "SELECT * FROM member_communicate_member_sms WHERE sms_read=0 AND (send_to_member LIKE '%,$mem_id,%' OR send_to_group LIKE '%,$member_group,%')"; 
            if($mem_type=="Admin" || $mem_type=="Superadmin"){
                $sql_query = "SELECT * FROM member_communicate_member_sms WHERE sms_read=0 AND (send_to_admin_member LIKE '%,$mem_id,%' OR send_to_admin_group='Admins')"; 
        }
            $query= $this->db->query($sql_query);      
            return $query->num_rows();    
        }
        if($flag=="sent"){
            $this->db->select('*');
            $this->db->from('member_communicate_member_sms');
            $this->db->where('sender_id',$mem_id);
            $query= $this->db->get();
            return $query->num_rows();                
        }
         
}


/**
 * Get sms_message_read status update To DB: adminscentral Table: member_communicate_member_sms
 *
 *@Param $data which contains read status value(1) AND $id contains SMS message id
 *@access private
 *@return Success/Error Message
*/
    function member_comm_member_sms_status_update($data, $id) {
        $this->db->where('sms_id', $id);
        $this->db->update('member_communicate_member_sms', $data);
    }


/**
 * Get member_communicate_member_sms by communication_id  From DB: adminscentral Table: member_communicate_member_sms
 *
 *@Param $id which contains  sms_id
 *@access private
 *@return member_communicate_member_sms by  sms_id
*/
  function get_sms_message_detail_by_id($id) {        
        $this->db->select('*');
        $this->db->from('member_communicate_member_sms');
        $this->db->where('sms_id',$id);
        $query= $this->db->get();
        return $query->result();
}

/**
 * Get total_sms_sent by logged user from DB: adminscentral Table:  member_communicate_member_sms
 *
 *@Param $id which contains logged user id
 *@access private
 *@return total_sms_sent by logged user
 */
function get_total_sms_sent_by_member_id($id){
        $this->db->select('max(total_sms_sent) as total_sms');
        $this->db->from('member_communicate_member_sms');
        $this->db->where('sender_id',$id);
        $query= $this->db->get();
        return $query->result();
}
/**
 * Get last communication id from DB: adminscentral Table: member_communicate_member_email
 *
 *@access private
 *@return last $communication_id
 */

function get_last_communication_id() {
        $this->db->select('max(communication_id) as communication_id');
        $this->db->from('member_communicate_member_email');
        $query= $this->db->get();
        return $query->result();
}

/**
 * Get Organization member external Contact From DB: adminscentral Table:  org_mem_external_contact
 *
 *@Param $org_id which contains loged user org_id, $mem_id which contains logged user id
 *@access private
 *@return  Organization member external Contact
*/
function get_org_mem_external_contact_by_org_id($org_id, $mem_id){
            $this->db->select('*');
            $this->db->from('org_mem_external_contact');
            $this->db->where('org_id',$org_id);
            $this->db->where('member_id',$mem_id);
            $query= $this->db->get();
            return $query->result();
}

/**
 * Get organization member type for which previlizes are set
 *
 *@Param $member_org which contains logged user's org_id
 *@access public
 *@return organization member type for which previlizes are set
*/
function get_previlize_assigned_org_mem_type($member_org){
        $type_name = array(' '=>"Select Type:");
        $this->db->select('*');
        $this->db->from('org_member_previlige');
        $this->db->join('org_member_type', 'org_member_previlige.mem_type_id = org_member_type.mem_type_id','left');  
        $this->db->where('org_member_previlige.org_id', $member_org);
        $this->db->order_by("org_member_type.mem_type_id", "DESC");
        $query= $this->db->get();
        if($query->num_rows()>0){
            foreach($query->result() as $rows){
                if($rows->type_name){$type_name[$rows->mem_type_id]=$rows->type_name;}                 
            }
            return $type_name;
        }
        else {
            return $query->result();
        }
}


/**
 * Get Registered Organization's Bank Payment Info
 *
 *@Param $org_id which contains org_id
 *@access Private
 *@return Registered Organization's Bank Payment Info
*/
  function get_org_bank_payment_info($org_id) {
        $bank_acc_type = array(' '=>"Select Type:");
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        $this->db->where('mem_type_id','Superadmin');      
        $this->db->where('organization_info.approval_status',1);
        if($org_id){
            $this->db->where('organization_info.id',$org_id);
        }
        $this->db->order_by("organization_info.id", "DESC");
        $query= $this->db->get();
        //print_r($query->result() ); exit;
        
        if($query->num_rows()>0){
            foreach($query->result() as $rows){
                if($rows->org_bank_acc_type_one){$bank_acc_type[$rows->org_bank_acc_type_one." ".$rows->org_bank_acc_no_one]=$rows->org_bank_acc_type_one." ".$rows->org_bank_acc_no_one;}                 
                if($rows->org_bank_acc_type_two){$bank_acc_type[$rows->org_bank_acc_type_two." ".$rows->org_bank_acc_no_two]=$rows->org_bank_acc_type_two." ".$rows->org_bank_acc_no_two;}                 
                if($rows->org_bank_acc_type_three){$bank_acc_type[$rows->org_bank_acc_type_three." ".$rows->org_bank_acc_no_three]=$rows->org_bank_acc_type_three." ".$rows->org_bank_acc_no_three;}                 
                if($rows->org_bank_acc_type_four){$bank_acc_type[$rows->org_bank_acc_type_four." ".$rows->org_bank_acc_no_four]=$rows->org_bank_acc_type_four." ".$rows->org_bank_acc_no_four;}                 
                if($rows->org_bank_acc_type_five){$bank_acc_type[$rows->org_bank_acc_type_five." ".$rows->org_bank_acc_no_five]=$rows->org_bank_acc_type_five." ".$rows->org_bank_acc_no_five;}                 
            }
            return $bank_acc_type;
        }
        else {
            return $query->result();
        }
}
/**
 * Update Organization Info Data To DB:adminscentral, Table:  organization_info,org_billing_info
 *
 *@Param $data_organization, $data_billing,$org_id
 *@access Private
 *@return TRUE/FALSE
*/
function update_organisation($data_organization,$data_billing,$org_id){
    $update_id = array();    
    $this->db->where('id', $org_id);
    $this->db->update('organization_info', $data_organization);    
    $this->db->where('org_id', $org_id);
    //$this->db->update('member', $data_admin_user);          
    $this->db->update('org_billing_info', $data_billing);      
    return TRUE;   
}


/**
 * Update Member Profile Info Data To DB:adminscentral, Table:  member
 *
 *@Param $data_admin_user,$mem_id
 *@access Private
 *@return TRUE/FALSE
*/
function update_member_profile($data_admin_user,$mem_id){
    $update_id = array();    
    $this->db->where('mem_id', $mem_id);
    $this->db->update('member', $data_admin_user);    
    return TRUE;   
}
/**
 * Get Package assigned to organization member  Info
 *
 *@Param $mem_id which contains member_id, $flag contains different flag, $mem_type_id contains member_type
 *@access Private
 *@return Package assigned to organization member  Info
*/
function get_package_assigned_to_org_member_info($mem_id, $flag, $mem_type_id){ 
    $this->db->select('*');
    $this->db->from('package_assigned_to_org_member');
    $this->db->join('member', 'package_assigned_to_org_member.mem_id = member.mem_id','left');  
    if($mem_id){
        $this->db->where('member.mem_id',$mem_id);
    }
    if($flag=="ordered"){
        $this->db->where('package_assigned_to_org_member.ordered',1);
    }
    if($flag=="active"){
        $where_activation_date = "package_assigned_to_org_member.activation_date <= ".time();        
		$where_expire_date = "package_assigned_to_org_member.expire_date >= ".time();      
        $this->db->where('package_assigned_to_org_member.active',1);
        $this->db->where($where_activation_date);
        $this->db->where($where_expire_date);
    }
    if($mem_type_id=="Superadmin"){
        $this->db->where('member.mem_type_id', 'Superadmin');
    }
    $this->db->order_by("member.mem_id", "DESC");
    $query= $this->db->get();
    return $query->result();
}
/**
 * Change Member Admin Status Data To DB:adminscentral, Table:  member
 *
 *@Param $mem_id
 *@access Private
 *@return TRUE/FALSE
*/
function change_member_admin_status($mem_id){
    $query = $this->db->get_where('member', array('mem_id' => $mem_id));
    $result = $query->result();  
    $this->db->where('mem_id', $mem_id);
    if($result){
        foreach($result as $rows){
             if($rows->mem_type_id=="Admin"){          
                    $update_admin_status = array('mem_type_id'=>'');
                    $this->db->update('member', $update_admin_status);    
             }else{
                    $update_admin_status = array('mem_type_id'=>'Admin');
                    //print_r($update_admin_status);exit;
                    $this->db->update('member', $update_admin_status);  
            }
        }
    }
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}
/**
 * Get Organization Info By org_id
 *
 *@Param $org_id which contains org_id
 *@access private
 *@return logged user's organization info
 */
function get_organization_info_by_id($org_id){
        $query = $this->db->get_where('organization_info', array('id' => $org_id));
        return $query->result();  
}
/**
 * Get Organization's System Configuration By Logged Organization's Id
 *
 *@Param $org_id which contains org_id
 *@access private
 *@return Organization's System Configuration
 */
function get_org_system_config($org_id){
        $query = $this->db->get_where('org_system_configuration', array('org_id' => $org_id));
        return $query->result();  
}

/**
 * Insert Organization's System Configuration By Logged Organization's Id
 *
 *@Param $org_system_config_data which contains Organization's System Configuration
 *@access private
 *@return Success/Failure Message
 */
function insert_org_system_config($org_system_config_data){
        $query = $this->db->insert('org_system_configuration', $org_system_config_data);
        $success_id = $this->db->insert_id();
        return $success_id;
}
/**
 * Update Organization's System Configuration By Logged Organization's Id
 *
 *@Param $org_system_config_data which contains Organization's System Configuration
 *@access private
 *@return Success/Failure Message
 */
function update_org_system_config($org_system_config_data, $custom_label_name, $org_id){
    $custom_label = "custom_label";
    if( sizeof($custom_label_name) >0 ){
        $index=1;
        foreach($custom_label_name as $key=>$value){
            $custom_label_index = $custom_label.$index;
            $org_system_config_data[$custom_label_index] = $value;
            $index++;
        }        
    }
    $this->db->where('org_id', $org_id);
    $this->db->update('org_system_configuration', $org_system_config_data);
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}
/**
 * Get SuperAdmin Info from DB: adminscentral Table: member
 *
 *@Param $org_id which contains org_id
 *@access private
 *@return logged user's organization info
 */
function get_superAdminInfo_by_org_id($org_id){
        $query = $this->db->get_where('member', array('org_id' => $org_id, 'mem_type_id' => 'SuperAdmin'));
        return $query->result();  
}

/**
 * Get Total SMS sent by memebr
 *
 *@Param $org_id which contains org_id AND $mem_id Which conatins logeed user's id
 *@access private
 *@return Total SMS sent by memebr
 */
function get_total_sms_sent_by_member($org_id , $mem_id){
        $this->db->select('max(total_mem_sms) as total_mem_sms');
        $this->db->from('org_member_sms');
        $this->db->where('sender_id',$mem_id);
        $this->db->where('org_id',$org_id);
        $query= $this->db->get();
        return $query->result();
}


/**
 * Get Total SMS sent by organization
 *
 *@Param $org_id which contains org_id 
 *@access private
 *@return Total SMS sent by organization
 */
function get_total_sms_sent_by_organization($org_id){
        $this->db->select('max(total_org_sms) as total_org_sms');
        $this->db->from('org_member_sms');
        $this->db->where('org_id',$org_id);
        $query= $this->db->get();
        return $query->result();
}
/**
 * Get Total LETTER sent by memebr
 *
 *@Param $org_id which contains org_id AND $mem_id Which conatins logeed user's id
 *@access private
 *@return Total LETTER sent by memebr
 */
function get_total_letter_sent_by_member($org_id , $mem_id){
        $this->db->select('max(total_mem_letter) as total_mem_letter');
        $this->db->from('org_member_letter');
        $this->db->where('sender_id',$mem_id);
        $this->db->where('org_id',$org_id);
        $query= $this->db->get();
        return $query->result();
}


/**
 * Get Total LETTER sent by organization
 *
 *@Param $org_id which contains org_id 
 *@access private
 *@return Total LETTER sent by organization
 */
function get_total_letter_sent_by_organization($org_id){
        $this->db->select('max(total_org_letter) as total_org_letter');
        $this->db->from('org_member_letter');
        $this->db->where('org_id',$org_id);
        $query= $this->db->get();
        return $query->result();
}

/**
 * Get Registered Customer Data By org_id
 *
 *@Param $org_id which contains org_id
 *@access Private
 *@return Registered Customer Data
*/
  function get_registered_customer($org_id) {
        $where_activation_date = "member.activation_date <= ".time();        
        $where_expire_date = "member.expire_date >= ".time();        
		//$where_activation_date = "organization_info.activation_date <= ".time();        
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        //$this->db->where('user_type','Admin');      
        $this->db->where('organization_info.approval_status',1);  
        $this->db->where('organization_info.org_blocked',0);
        //$this->db->where('member.expired',0);
        $this->db->where('member.blocked',0);
        //$this->db->where('organization_info.expired',0);
        $this->db->where($where_activation_date);
        $this->db->where($where_expire_date);        
        $this->db->where('mem_type_id','Superadmin');      
          if($org_id){
            $this->db->where('organization_info.id',$org_id);
        }
        $this->db->order_by("organization_info.id", "DESC");
        $query= $this->db->get();
        return $query->result();
        
        ////////////////
            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
        
}

/**
 * Get Organization Package Info By Logged Org_id
 *
 *@Param $org_id which contains org_id
 *@access Private
 *@return Registered Customer Data
*/
  function get_org_package_info_by_org_id($org_id) {
        $this->db->select('*');
        $this->db->from('organization_info');
        $this->db->join('package', 'organization_info.package_name = package.id','left');  
        $this->db->where('organization_info.id',$org_id);      
        $query= $this->db->get();
        return $query->result();         
}


/**
 * Get Customer billing info
 *
 *@Param $org_id which contains org_id
 *@access public
 *@return Customer billing info
*/
    function get_customer_billing_info($org_id) {  
        $this->db->select('*');
        $this->db->from('org_billing_info');
        $this->db->join('organization_info', 'org_billing_info.org_id = organization_info.id','left');  
        if($org_id){
            $this->db->where('org_billing_info.org_id',$org_id);
        }
        //$this->db->order_by("organization_info.id", "DESC");
        $query= $this->db->get();
        return $query->result();
            
       // $query = $this->db->query("select * from user_info where login_status=0 || login_status=1  order by id DESC");
        
}

/**
 * Get Maximum Article Id from DB: adminscentral TABLE: main_board_article
 *
 *@access Private
 *@return Maximum Article Id
*/
function get_max_article_id(){
        $query = $this->db->query("select max(article_id) as max_art_id from main_board_article");
        return $query->result();
}

/**
 * Insert Main Board Article To DB: adminscentral TABLE: main_board_article
 *
 *@Param $article_data Which contains Article Data
 *@access Private
 *@return Success/Failure
*/
function insert_mainboard_article($article_data){
    $this->db->insert('main_board_article', $article_data);
    $article_id = $this->db->insert_id();
    return $article_id;
}


/**
 * Insert Forum Topic To DB: adminscentral TABLE: forum
 *
 *@Param $topic_data Which contains forum topic Data
 *@access Private
 *@return Success/Failure
*/
function insert_forum_topic($topic_data){
    $this->db->insert('forum', $topic_data);
    $topic_id = $this->db->insert_id();
    return $topic_id;
}
/**
 * Insert org_member_sms DB: adminscentral TABLE: org_member_sms
 *
 *@Param $sms_data Which contains SMS Data
 *@access Private
 *@return Success/Failure
*/
function insert_org_member_sms($sms_data){
    $this->db->insert('org_member_sms', $sms_data);
    $sms_id = $this->db->insert_id();
    return $sms_id;
}


/**
 * Insert org_member_letter DB: adminscentral TABLE: org_member_letter
 *
 *@Param $letter_data Which contains LETTER Data
 *@access Private
 *@return Success/Failure
*/
function insert_org_member_letter($letter_data){
    $this->db->insert('org_member_letter', $letter_data);
    $letter_id = $this->db->insert_id();
    return $letter_id;
}

/**
 * Get currency data From DB:adminscentral, Table: currency
 *
 *@access public
 *@return currency data
*/
   function get_currency($id) {
        if(empty($id)){
            $currency_name['']="Select Currency:";
            $query = $this->db->get('currency');
            if($query->num_rows()>0){
                foreach($query->result() as $rows){
                    $currency_name[$rows->id]=$rows->currency_name;
                }
            }
            return $currency_name;
        }
        else{
            $query = $this->db->get_where('currency', array('id' => $id));
            return $query->result();
        }             
}

/**
 * Get Article Proposal By Logged user's org_id
 *
 *@Param $org_id which contains org_id
 *@access private
 *@return Article Proposal Data
*/
function get_article_proposal($org_id){
        $this->db->select('*');
        $this->db->from('main_board_article');
        $this->db->where('org_id',$org_id);
        $this->db->where('article_status',0);
        $this->db->where('article_proposal',1);
        $query= $this->db->get();
        return $query->result();
}
/**
 * Get Logged member data
 *
 *@Param $mem_id which contains member id
 *@access private
 *@return Logged member data
*/
  function get_logged_member_profile($mem_id) {        
        $where_activation_date = "member.activation_date <= ".time();        
        $where_expire_date = "member.expire_date >= ".time();        
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        $this->db->where('organization_info.approval_status',1);  
        $this->db->where('organization_info.org_blocked',0);
        $this->db->where('member.blocked',0);
        $this->db->where($where_activation_date);
        $this->db->where($where_expire_date);
        $this->db->where('member.mem_id', $mem_id);
        $this->db->order_by('member.mem_id', 'DESC');
        $query= $this->db->get();
        return $query->result();     
}

/**
 * Get last contact id from DB: adminscentral Table:  contact_with_site_admin
 *
 *@access private
 *@return last $contact_id
 */

function get_last_contact_site_admin_id() {
        $this->db->select('max(contact_id) as contact_id');
        $this->db->from('contact_with_site_admin');
        $query= $this->db->get();
        return $query->result();
}

/**
 * Insert contact site admin data info in DB: adminscentral Table: contact_with_site_admin
 *
 *@Param $data which contains contact site admin data info
 *@access private
 *@return inserted $contact_id
 */

function contact_site_admin_insert($data) {
        $this->db->insert('contact_with_site_admin', $data);
        $contact_id = $this->db->insert_id();
        return $contact_id;
}

/**
 * Organization's member types insert
 *
 *@param $data which contains admin user types data
 *@access public
 *@return Success/Error Message
*/
function org_member_types_insert($data){
    $this->db->insert('org_member_type', $data);     
    return ($this->db->insert_id() > 0) ? TRUE : FALSE;	     
}


function org_member_registration($data) {
        $this->db->insert('member', $data);
        $last_insert_id = $this->db->insert_id();
        return ( $last_insert_id > 0) ? $last_insert_id: FALSE;	
}

function package_assigned_to_org_member_insert($assigned_package_data){
    $this->db->insert('package_assigned_to_org_member', $assigned_package_data);
    $insert_id = $this->db->insert_id();
    return ($insert_id > 0) ? $insert_id : 0;	
}

function upgrade_billing_info($data) {
        $this->db->insert('org_billing_info', $data);
        return ($this->db->insert_id() > 0) ? TRUE : FALSE;	
}

function update_org_billing_info($data ,$payment_method, $org_bill_id) {
        if($payment_method=="creditcard"){
            $this->db->where('org_bill_id', $org_bill_id);
            $this->db->update('org_billing_info', $data);
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
        }
}

function org_billing_success_insert($data){
            $this->db->insert('org_billing_success', $data);
            $insert_id = $this->db->insert_id();
            return ($insert_id > 0) ? $insert_id : 0;	
}

function update_org_billing_success($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('org_billing_success', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
}


/**
 * Insert faktura info in DB: adminscentral Table: bill_faktura
 *
 *@Param $data which contains faktura information
 *@access private
 *@return inserted $fak_id
 */
function bill_faktura_insert($data) {
        $this->db->insert('bill_faktura', $data);
        $fak_id = $this->db->insert_id();
        return $fak_id;
}
/**
 * Get All Active Packages From DB:adminscentral Table: package
 *
 *@Param $id which contains package_id
 *@access Private
 *@return All Active Packages
*/
function get_active_package($id){
    $this->db->select('*');
    $this->db->from('package');
    if($id){
            $this->db->where('id',$id);
    }
    $this->db->where('active', 1);
    $query= $this->db->get();
    return $query->result();
}

/**
 * Check E-mail is available or not for member
 *
 *@access Private
 *@return Available/Not Available
 */ 
function check_email1($email) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));        
        $result1 = $this->db->get('member');
        if($result1->num_rows()==0){
            $this->db->select('1', FALSE);
            $this->db->where('LOWER(email)=', strtolower($email));
            $result2 = $this->db->get('admin_users');
            if($result2->num_rows()==0){
                $this->db->select('1', FALSE);
                $this->db->where('LOWER(org_email)=', strtolower($email));
                return $this->db->get('organization_info');
            }else{return $result2;}
        }
        else{return $result1;}              
}

/**
 * Check Username is available or not for member
 *
 *@access Private
 *@return Available/Not Available
 */ 
    function check_uname($username) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        $result = $this->db->get('member');
        if($result->num_rows()==0){
            $this->db->select('1', FALSE);
            $this->db->where('LOWER(username)=', strtolower($username));
            return $this->db->get('admin_users');
        }
        else{return $result;}       
    }

/**
 * Get Package Info From DB:adminscentral Table: package
 *
 *@Param $package_id which contains package_id
 *@access Private
 *@return Package Details
*/
   function get_package($package_id){       
     if(empty($package_id)){
            $package_name= array();
            $query = $this->db->get('package');
            if($query->num_rows()>0){
                foreach($query->result() as $rows){
                    $currency_data = $this->get_currency($rows->currency_id);
                    $package_name[$rows->id]="Package: ".$rows->package_name.", For ".$rows->duration."year(s)".", Amount: ".$rows->amount.", sms_cost: ".$rows->sms_cost." , letter_cost: ".$rows->letter_cost." , currency:".$currency_data[0]->currency_name;
                }
            }
            return $package_name;
    }
    
    else{ $query = $this->db->get_where('package', array('id' => $package_id));}
    return $query->result();
}

/**
 * Get Total number of registered member under organization
 *
 *@Param $org_id which contains org_id
 *@access Private
 *@return number of organization member
*/
function get_total_org_registered_memebr($org_id){    
    $sql = "SELECT COUNT(*) as num_of_memebr
                FROM member
                WHERE org_id = '" . $org_id . "'"; 
        $query = $this->db->query($sql);
        return $query->result();     
}
/**
 * Get all organization member types DB:adminscentral Table:  org_member_type
 *
 *@Param $org_id which contains $org_id
 *@access public
 *@return all organization member types
*/
function view_all_org_member_types($org_id){
        $this->db->where('org_id', $org_id);
        $this->db->order_by('mem_type_id', 'DESC');
        $query = $this->db->get('org_member_type');
        return $query->result();             
}

/**
 * Get all organization member types DB:adminscentral Table:  org_member_type
 *
 *@Param $id which contains mem_type_id
 *@access public
 *@return all organization member types
*/
function get_all_org_member_types($id){    
    if(!$id){
            $type_name['']="Select User Type:";
            $query = $this->db->get('org_member_type');
            if($query->num_rows()>0){
                foreach($query->result() as $rows){
                    $type_name[$rows->contact_id]=$rows->type_name;
                }
            }
            return $type_name;
        }
        else{
            $query = $this->db->get_where('org_member_type', array('mem_type_id' => $id));
            return $query->result();
        }     
}

/**
 * Organization member types update
 *
 *@param $data which contains organization member types data, $id which contains admin member types id 
 *@access public
 *@return Success/Error Message
*/
function org_member_types_update($data,$id){
    $this->db->where('mem_type_id', $id);
    $this->db->update('org_member_type', $data);
    return TRUE;
}



/**
 * Get all faktura customers DB:adminscentral Table:  custom_faktura_customer
 *
 *@Param $org_id which contains $org_id
 *@access Private
 *@return all faktura customers 
*/
function view_all_faktura_customers($org_id){
        $this->db->where('org_id', $org_id);
        //$this->db->where('mem_id', $mem_id);
        $this->db->order_by('faktura_customer_id', 'DESC');
        $query = $this->db->get('custom_faktura_customer');
        return $query->result();             
}


/**
 * Get all faktura products DB:adminscentral Table:  custom_faktura_products
 *
 *@Param $org_id which contains $org_id
 *@access Private
 *@return all faktura customers 
*/
function view_all_faktura_products($org_id){
        $this->db->where('org_id', $org_id);
        //$this->db->where('mem_id', $mem_id);
        $this->db->order_by('faktura_product_id', 'DESC');
        $query = $this->db->get('custom_faktura_products');
        return $query->result();             
}

/**
 * Update faktura customer DB:adminscentral Table:  custom_faktura_customer
 *
 *@Param $data which contains faktura customer details, $faktura_customer_id which contains $faktura_customer_id
 *@access Private
 *@return all faktura customers 
*/
function update_faktura_new_customer($data,$faktura_customer_id){
    $this->db->where('faktura_customer_id', $faktura_customer_id);
    $this->db->update('custom_faktura_customer', $data);
   return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

/**
 * Get  faktura customer details by faktura_customer_id from   DB:adminscentral Table:  custom_faktura_customer
 *
 *@Param $faktura_customer_id 
 *@access Private
 *@return all faktura customers 
*/
function get_faktura_customer_details_by_faktura_customer_id($faktura_customer_id){
        $this->db->where('faktura_customer_id', $faktura_customer_id);
        $query = $this->db->get('custom_faktura_customer');
        return $query->result();  
}

/**
 * Get  faktura settings by $org_id  from   DB:adminscentral Table:  custom_faktura_settings
 *
 *@Param $org_id
 *@access Private
 *@return faktura settings
*/
function get_faktura_settings($org_id){
        $this->db->where('org_id', $org_id);
        //$this->db->where('mem_id', $mem_id);
        $query = $this->db->get('custom_faktura_settings');
        return $query->result();  
}

/**
 * Insert  default faktura settings With $org_id AND $mem_id Into   DB:adminscentral Table:  custom_faktura_settings
 *
 *@Param $data_fak_settings which contains default faktura setting's data
 *@access Private
 *@return faktura settings
*/
function insert_faktura_settings_default($data_fak_settings){        
        $this->db->insert('custom_faktura_settings', $data_fak_settings);
        return ($this->db->insert_id() > 0) ? TRUE : FALSE;	
}


/**
 * Update faktura settings With $org_id AND $fak_settings_id Into   DB:adminscentral Table:  custom_faktura_settings
 *
 *@Param $data_fak_settings which contains faktura setting's data, $fak_settings_id, $org_id
 *@access Private
 *@return success/failure message
*/
function update_faktura_settings($data_fak_settings, $fak_settings_id, $org_id){
    $this->db->where('fak_settings_id', $fak_settings_id);
    $this->db->where('org_id', $org_id);
    $this->db->update('custom_faktura_settings', $data_fak_settings);
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;    
}

/**
 * Insert  faktura product With $org_id AND $mem_id Into   DB:adminscentral Table:  custom_faktura_products
 *
 *@Param $data_create_fak_product which contains faktura product's data
 *@access Private
 *@return success/failure message
*/
function insert_faktura_new_product($data_create_fak_product){
      $this->db->insert('custom_faktura_products', $data_create_fak_product);
      return ($this->db->insert_id() > 0) ? TRUE : FALSE;	
}


/**
 * Get  faktura product details by faktura_product_id from   DB:adminscentral Table:  custom_faktura_customer
 *
 *@Param $faktura_product_id
 *@access Private
 *@return faktura product 
*/
function get_faktura_product_details_by_product_id($faktura_product_id){
        $this->db->where('faktura_product_id', $faktura_product_id);
        $query = $this->db->get('custom_faktura_products');
        return $query->result();  
}

/**
 * Update faktura product With $org_id AND $mem_id Into   DB:adminscentral Table:  custom_faktura_products
 *
 *@Param $data_create_fak_product which contains faktura product's data, $faktura_product_id, $org_id
 *@access Private
 *@return success/failure message
*/
function update_faktura_product($data_create_fak_product, $faktura_product_id, $org_id){
    $this->db->where('faktura_product_id', $faktura_product_id);
    $this->db->where('org_id', $org_id);
    $this->db->update('custom_faktura_products', $data_create_fak_product);
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;    
}

/**
 * Insert  custom faktura  With $org_id AND $mem_id Into   DB:adminscentral Table:  custom_faktura
 *
 *@Param $data_create_faktura which contains faktura data
 *@access Private
 *@return success/failure message
*/
function insert_custom_faktura($data_create_faktura){
      $this->db->insert('custom_faktura', $data_create_faktura);
      return $this->db->insert_id();	
}

/**
 * Update  custom faktura  With $custom_faktura_id  Into   DB:adminscentral Table:  custom_faktura
 *
 *@Param $data_create_faktura which contains faktura data AND $custom_faktura_id
 *@access Private
 *@return success/failure message
*/
function update_custom_faktura($data_create_faktura, $custom_faktura_id){
      $this->db->where('custom_faktura_id', $custom_faktura_id);
      $this->db->update('custom_faktura', $data_create_faktura);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

/**
 * Delete  custom faktura assigned Product With $custom_faktura_id  From   DB:adminscentral Table:  custom_faktura_assigned_product
 *
 *@Param  $custom_faktura_id
 *@access Private
 *@return success/failure message
*/
function delete_custom_faktura_assigned_product( $custom_faktura_id ){
      $this->db->where('custom_faktura_id', $custom_faktura_id);
      $this->db->delete('custom_faktura_assigned_product');
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

/**
 * Copy  custom faktura and its assigned Product With $custom_faktura_id  
 *
 *@Param  $custom_faktura_id, $fak_invoice_no, $per_invoice_cost, $total_price
 *@access Private
 *@return success/failure message
*/
 function copy_custom_faktura($custom_faktura_id, $fak_invoice_no, $per_invoice_cost, $total_price) {
            $add_date = date('Y-m-d H:i:s');
            $fak_invoice_date ="";
            $fak_expire_date ="";
            $fak_status =0;
            $fak_sent_by ="";
            $fak_reminder_by ="";
            $no_of_custom_invoice_sent_by_letter =0;
            $custom_invoice_sent_by_letter_cost =0.00;
            $fak_letter_delivered = 0;
            $admin_cost = 0.00;
            $no_of_admin_cost = 0;
            $total_admin_cost = 0.00;
            $fak_draft =1;             
            $fak_invoice_cost = $per_invoice_cost;
            $fak_invoice_cost_applied = 0.00;
            
            $this->db->query("INSERT INTO custom_faktura SELECT NULL , org_id , mem_id ,$fak_invoice_no , '$fak_invoice_date', '$fak_expire_date', $fak_invoice_cost, $fak_invoice_cost_applied, $total_price, fak_send_to_external_customer, fak_send_to_org_customer, fak_terms_of_payment,
            fak_notes,fak_customer_notification,$fak_status, '$fak_sent_by', '$fak_reminder_by', $no_of_custom_invoice_sent_by_letter, $custom_invoice_sent_by_letter_cost, $fak_letter_delivered, $admin_cost, $no_of_admin_cost, $total_admin_cost, $fak_draft, '$add_date' , update_date FROM `custom_faktura` WHERE custom_faktura_id=$custom_faktura_id
            "); 
            $copy_fak_id = $this->db->insert_id();
        
            if($copy_fak_id){
             $this->db->query("INSERT INTO custom_faktura_assigned_product SELECT NULL , $copy_fak_id , product_name ,no_of_products, price_ex_vat, vat_rate,  '$add_date' , update_date FROM `custom_faktura_assigned_product` WHERE custom_faktura_id IN ($custom_faktura_id)
            ");
        }
        //$archieve_id = $this->db->insert_id();
        return $copy_fak_id;
        
}

/**
 * Get Last fak entry by org_id  from  DB:adminscentral Table:  custom_faktura
 *
 *@Param $org_id
 *@access Private
 *@return Last Fak Entry By org_id
*/
function get_last_fak_entry_by_org_id($org_id){
      $query = $this->db->query("SELECT * FROM custom_faktura WHERE custom_faktura_id=(SELECT MAX(custom_faktura_id) FROM custom_faktura WHERE org_id='".$org_id."' ) ");
      return $query->result();      
}
/**Update custom faktura  With $custom_faktura_id   DB:adminscentral Table:  custom_faktura
 *
 *@Param $update_data which contains faktura info and $custom_faktura_id which contains fak id
 *@access Private
 *@return Success/Error Message
 */ 
function bill_custom_faktura_update($update_data,$custom_faktura_id){
        $this->db->where('custom_faktura_id', $custom_faktura_id);
        $this->db->update('custom_faktura', $update_data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

function insert_custom_faktura_assigned_product($custom_faktura_id, $product_name, $no_of_products, $price_ex_vat, $vat_rate){
     $product_line_size = sizeof($product_name); 
     $total_price = 0;
     $index =0;
     while($product_line_size > 0 ){
         $data = array('custom_faktura_id' => $custom_faktura_id,
                                'product_name' => $product_name[$index],
                                'no_of_products' => $no_of_products[$index],
                                'price_ex_vat' => $price_ex_vat[$index],
                                'vat_rate' => $vat_rate[$index],
                                'add_date' => date("Y-m-d H:i:s")
         );
         $this->db->insert('custom_faktura_assigned_product', $data);
         ///////////////////////////////// Calculating Total Price ////////////////////////////////
         $all_product_price_excl_vat = $price_ex_vat[$index] * $no_of_products[$index];
         $vat_price = ($vat_rate[$index]/100) * $all_product_price_excl_vat;
         $all_product_price_incl_vat = $all_product_price_excl_vat + $vat_price;
         $total_price += $all_product_price_incl_vat;
         
         ///////////////////////////////// Calculating Total Price ////////////////////////////////
         $product_line_size = $product_line_size-1;
         $index++;  
}
 //$product_insert_id = $this->db->insert_id();
 $data = array('fak_total_price' => round($total_price));
 $this->db->where('custom_faktura_id', $custom_faktura_id);
 $this->db->update('custom_faktura', $data);
 return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}

function get_custom_faktura_assigned_product($custom_faktura_id){
    $this->db->select('*');
    $this->db->from('custom_faktura_assigned_product');
    $this->db->where('custom_faktura_id',$custom_faktura_id);
    $query= $this->db->get();
    return $query->result();
}

/**
 * Get All  Custom Invoice  from DB:adminscentral Table:  custom_faktura AND custom_faktura_customer AND member
 *
 *@Param $org_id
 *@access Private
 *@return All  Custom Invoice 
*/
function get_all_custom_invoice($org_id){
    $to_date = time();
    $query = $this->db->query("SELECT * FROM custom_faktura  WHERE org_id= '".$org_id."' ");
    return $query->result();       
}


/**
 * Get All Active Custom Invoice  from DB:adminscentral Table:  custom_faktura AND custom_faktura_customer AND member
 *
 *@Param $org_id
 *@access Private
 *@return All Active Custom Invoice 
*/
function get_all_custom_active_invoice($org_id){
    $to_date = time();
    $query = $this->db->query("SELECT * FROM custom_faktura  WHERE org_id= '".$org_id."' AND $to_date<=fak_expire_date");
    return $query->result();       
}


/**
 * Get Custom Faktura Info  By $custom_faktura_id from DB:adminscentral Table: custom_faktura 
 *
 *@Param $custom_faktura_id
 *@access Private
 *@return Custom Faktura Info
*/
function get_custom_faktura_info($custom_faktura_id){
    $this->db->select('*');
    $this->db->from('custom_faktura');
    $this->db->where('custom_faktura_id',$custom_faktura_id);
    $query= $this->db->get();
    return $query->result();
}



/**
 * Insert member to a group for logged user's group within a organization  
 *
 *@param $data which contains organization member ids, Group id and to_date
 *@access Private
 *@return Success/Error Message
*/
function insert_org_member_assigned_group($data){
    $this->db->insert('member_assigned_to_groups', $data);
    return TRUE;
}

/**
 * Update member to a group for logged user's group within a organization  
 *
 *@param $data which contains organization member ids, $group_id which contains logged user's group id
 *@access Private
 *@return Success/Error Message
*/
function update_org_member_assigned_group($group_id,$data){
    $this->db->where('group_id', $group_id);
    $this->db->update('member_assigned_to_groups', $data);
    return TRUE;
}

/**
 * Organization member types delete
 *
 *@param $member_type_id which contains organization member types id 
 *@access public
 *@return Success/Error Message
*/
function delete_org_member_type($member_type_id) {
        $this->db->where('mem_type_id', $member_type_id);
        $this->db->delete("org_member_type");
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}


/**
 * Organization article category delete
 *
 *@param $art_cat_id which contains organization art_cat_id
 *@access Private
 *@return Success/Error Message
*/
function delete_article_category($art_cat_id) {
        $this->db->where('art_cat_id', $art_cat_id);
        $this->db->delete("article_category");
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}


/**
 * Get Organization's registered member 
 *
 *@param $org_id which contains logged user's organization id
 *@access private
 *@return Organization's registered member 
*/
function get_org_registered_member($org_id){
        $this->db->where('non_ac_member', 0);
        $this->db->where('org_id', $org_id);
        $this->db->order_by('mem_id', 'DESC');
        $query = $this->db->get('member');
        return $query->result();  
}

/**
 * Get Organization's Non-Ac member 
 *
 *@param $org_id which contains logged user's organization id
 *@access private
 *@return Organization's Non-Ac member 
*/
function get_org_non_ac_member($org_id){
        $this->db->where('non_ac_member', 1);
        $this->db->where('org_id', $org_id);
        $this->db->order_by('mem_id', 'DESC');
        $query = $this->db->get('member');
        return $query->result();  
}


/**
 * Get Organization's active member 
 *
 *@param $org_id which contains logged user's organization id
 *@access private
 *@return Organization's active member 
*/
function get_org_active_member($org_id){     
///////////////////////////////////////
        $where_activation_date = "member.activation_date <= ".time();        
        $where_expire_date = "member.expire_date >= ".time();        
        $where_mem_type_not_admin= "mem_type_id !='Admin'";
        $where_mem_type_not_super_admin= "mem_type_id !='Superadmin'";
		//$where_activation_date = "organization_info.activation_date <= ".time();        
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        //$this->db->where('user_type','Admin');      
        $this->db->where('organization_info.approval_status',1);  
        $this->db->where('organization_info.org_blocked',0);
        //$this->db->where('member.expired',0);
        $this->db->where('member.blocked',0);
        $this->db->where('member.non_ac_member',0);
        //$this->db->where('organization_info.expired',0);
        $this->db->where($where_activation_date);
        $this->db->where($where_expire_date);
        $this->db->where($where_mem_type_not_admin);
        $this->db->where($where_mem_type_not_super_admin);        
        $this->db->where('organization_info.id', $org_id);
        $this->db->order_by('member.mem_id', 'DESC');
        $query= $this->db->get();
        return $query->result();  
///////////////////////////////////////
        /*$where_expire_date = "expire_date > ".time();
        $this->db->where('org_id', $org_id);
        $this->db->where('blocked', 0);
        $this->db->where($where_expire_date);
        $this->db->order_by('mem_id', 'DESC');
        $query = $this->db->get('member');
        return $query->result();  */
}

/**
 * Get Organization's active Admin
 *
 *@param $org_id which contains logged user's organization id
 *@access private
 *@return Organization's active Admin
*/
function get_org_active_admin($org_id){        
        $where_activation_date = "member.activation_date <= ".time();        
        $where_expire_date = "member.expire_date >= ".time();        
        $where_mem_type_admin = "mem_type_id ='Admin' || mem_type_id ='Superadmin' ";
		//$where_activation_date = "organization_info.activation_date <= ".time();        
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        //$this->db->where('user_type','Admin');      
        $this->db->where('organization_info.approval_status',1);  
        $this->db->where('organization_info.org_blocked',0);
        //$this->db->where('member.expired',0);
        $this->db->where('member.blocked',0);
        //$this->db->where('organization_info.expired',0);
        $this->db->where($where_activation_date);
        $this->db->where($where_expire_date);
        $this->db->where($where_mem_type_admin);
        $this->db->where('organization_info.id', $org_id);
        $this->db->order_by('member.mem_id', 'DESC');
        $query= $this->db->get();
        return $query->result();          
        /*$where_expire_date = "expire_date > ".time();
        $where_mem_type_id= "mem_type_id ='Admin'";
        $this->db->where('org_id', $org_id);
        $this->db->where('blocked', 0);
        $this->db->where($where_mem_type_id);
        $this->db->where($where_expire_date);
        $this->db->order_by('mem_id', 'DESC');
        $query = $this->db->get('member');
        return $query->result();  */
}


/**
 * Get Member assigned to logged user's group
 *
 *@param $group_id which contains logged user's Group id
 *@access private
 *@return Member assigned to logged user's group
*/
function get_members_assigned_to_group($group_id){    
        $where_member_id_in = "member_assigned_to_groups.group_id IN($group_id)";
        $this->db->select('*');
        $this->db->from('org_member_groups');
        $this->db->join('member_assigned_to_groups', 'member_assigned_to_groups.group_id = org_member_groups.group_id','left');  
        //$this->db->where('member_assigned_to_groups.group_id', $group_id);          
        $this->db->where($where_member_id_in);          
        $this->db->order_by('member_assigned_to_groups.matg_id', 'DESC');
        $query= $this->db->get();
        return $query->result();
}

/**
 * Get Member Group Info 
 *
 *@param $group_id which contains logged user's Group id
 *@access private
 *@return Member Group Info 
*/
function get_org_mem_group_info($group_id){        
        $this->db->select('*');
        $this->db->from('org_member_groups');
        $this->db->where('group_id', $group_id);          
        $query= $this->db->get();
        return $query->result();
}

/**
 * Get Group Info by member_id
 *
 *@param $mem_id which contains member_id
 *@access private
 *@return Group Info by member_id
*/
function get_mem_group_info_by_mem_id($mem_id){    
        $where_member_id_in = "member_assigned_to_groups.assigned_mem_id LIKE '%,$mem_id,%'";
        $this->db->select('*');
        $this->db->from('org_member_groups');
        $this->db->join('member_assigned_to_groups', 'org_member_groups.group_id =  member_assigned_to_groups.group_id','left');  
        $this->db->where($where_member_id_in);
        $query= $this->db->get();
        return $query->result();  				
}

/**
 * Get Member Info by assigned_mem_id in Table: member_assigned_to_groups
 *
 *@param $assigned_mem_id which mem_id assigne to Group
 *@access private
 *@return Member Info
*/
function get_member_info_assigned_to_group($assigned_mem_id){
    $assigned_mem_id = ltrim ($assigned_mem_id,',');
    $assigned_mem_id = rtrim ($assigned_mem_id,',');
    if(!empty($assigned_mem_id)){
        $query = $this->db->query("SELECT * FROM  member WHERE mem_id IN($assigned_mem_id)");
        return $query->result();  
    }
    return 0;
}

/**
 * Get Member Info by member_id AND org_id
 *
 *@param $mem_id which contains mem_id OR "Admins" which indicates all Admin Members, $member_org
 *@access private
 *@return Member Info
*/
function get_member_info_by_id($mem_id, $member_org){    
    if($mem_id=="Admins"){
            $query = $this->db->query("SELECT * FROM  member WHERE mem_type_id='Admin' AND org_id=$member_org");
            return $query->result();  
    }else{
          //echo $mem_id;exit;
          //$mem_id = implode(",",$mem_id);         
          $query = $this->db->query("SELECT * FROM  member WHERE mem_id IN($mem_id) AND org_id=$member_org");
          return $query->result();  
    }    
   
}


/**
 * Get Member Info by member_id For Communication
 *
 *@param $mem_id which contains mem_id 
 *@access private
 *@return Member Info
*/
function get_member_info_by_id_for_communication($mem_id){    
      $query = $this->db->query("SELECT * FROM  member WHERE mem_id IN($mem_id) ");
      return $query->result();     
}
/**
 * Get Member Info and Member's Organization Info by member_id 
 *
 *@param $mem_id which contains mem_id 
 *@access private
 *@return Member Info and Member's Organization Info
*/
function get_member_and_org_info_by_mem_id($mem_id){    
        $where_activation_date = "member.activation_date <= ".time();        
        $where_expire_date = "member.expire_date >= ".time();        
		//$where_activation_date = "organization_info.activation_date <= ".time();        
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('organization_info', 'member.org_id = organization_info.id','left');  
        //$this->db->where('user_type','Admin');      
        $this->db->where('organization_info.approval_status',1);  
        $this->db->where('organization_info.org_blocked',0);
        //$this->db->where('member.expired',0);
        $this->db->where('member.blocked',0);
        //$this->db->where('organization_info.expired',0);
        $this->db->where($where_activation_date);
        $this->db->where($where_expire_date);
        $this->db->where('member.mem_id', $mem_id);
        $query= $this->db->get();
        return $query->result();  
}

/**
 * Get Member Info by assigned_mem_id in Table: member_assigned_to_groups Where member is not Admin
 *
 *@param $assigned_mem_id which contains mem_id assign to Group
 *@access private
 *@return Member Info
*/
function get_member_info_assigned_to_group_not_admin($assigned_mem_id){
    $assigned_mem_id = ltrim ($assigned_mem_id,',');
    $assigned_mem_id = rtrim ($assigned_mem_id,','); 
    $expire_date = "expire_date > ".time();
    $query = $this->db->query("SELECT * FROM  member WHERE mem_id IN($assigned_mem_id) AND mem_type_id!='Admin' AND $expire_date AND blocked=0 AND non_ac_member=0");
    return $query->result();  
}

/**
 * Get Non-Ac Member Info by assigned_mem_id in Table: member_assigned_to_groups Where members are Non-Ac member
 *
 *@param $assigned_mem_id which contains mem_id assign to Group
 *@access private
 *@return Non-Ac Member Info
*/
function get_non_ac_member_info_assigned_to_group($assigned_mem_id){
    $assigned_mem_id = ltrim ($assigned_mem_id,',');
    $assigned_mem_id = rtrim ($assigned_mem_id,','); 
    $query = $this->db->query("SELECT * FROM  member WHERE mem_id IN($assigned_mem_id) AND non_ac_member=1");
    return $query->result();  
}

/**
 * Insert sms_message info in DB: adminscentral Table: member_communicate_member_sms
 *
 *@Param $data which contains sms_message information
 *@access private
 *@return inserted $sms_id
 */
function sms_insert($data) {
        $this->db->insert('member_communicate_member_sms', $data);
        $sms_id = $this->db->insert_id();
        return $sms_id;
}

/**
 * Insert Letter info in DB: adminscentral Table: member_communicate_member_letter
 *
 *@Param $data which contains Letter information
 *@access private
 *@return inserted $letter_id
 */

function letter_insert($data) {
        $this->db->insert('member_communicate_member_letter', $data);
        $letter_id = $this->db->insert_id();
        return $letter_id;
}


/**
 * Insert Letter info in DB: adminscentral Table: custom_faktura_customer
 *
 *@Param $data which contains faktura customer info
 *@access private
 *@return inserted $letter_id
 */
function insert_faktura_new_customer($data ){
    //print_r($data);exit;
    $this->db->insert('custom_faktura_customer', $data);
    $custom_fak_id = $this->db->insert_id();
    return $custom_fak_id;
}

/**
 * get custom faktura client info from DB:adminscentral Table: custom_faktura_customer OR member
 *
 *@Param $fak_send_to_external_customer , $fak_send_to_org_customer
 *@access private
 *@return custom faktura client info
 */
function get_custom_faktura_client_info($fak_send_to_external_customer, $fak_send_to_org_customer){
        $this->db->select('*');
        if(!empty($fak_send_to_external_customer)){
            $this->db->from('custom_faktura_customer');
            $this->db->where('faktura_customer_id',$fak_send_to_external_customer);
            $query= $this->db->get();
            return $query->result();
        }
        if(!empty($fak_send_to_org_customer)){           
            $this->db->from('member');
            $this->db->where('mem_id',$fak_send_to_org_customer);
            $query= $this->db->get();
            return $query->result();
        }
}
/**
 * Get member_assigned_to_groups Info by logged user's id AND org_id
 *
 *@param $mem_id which contains member_id AND $org_id Which contains org_id
 *@access private
 *@return member_assigned_to_groups Info
*/
function get_mem_group_member_info($mem_id, $org_id){    
    $query = $this->db->query("SELECT * FROM  member_assigned_to_groups WHERE group_id IN(SELECT group_id FROM   org_member_groups mg WHERE (mg.mem_id=$mem_id AND mg.org_id=$org_id))
    ORDER BY member_assigned_to_groups.group_id DESC");
    return $query->result();  				
}


/**
 * Default  settings for org_member_previlige To DB:adminscentral, Table: org_member_previlige
 *
 *@Param $data which contains org_member_previlige data
 *@access public
 *@return TRUE/FALSE
*/
function org_member_type_previlige_insert($data) {
        $this->db->insert('org_member_previlige', $data);
}

/**
 * Selection based settings for org_member_previlige To DB:adminscentral, Table: org_member_previlige
 *
 *@Param $data which contains org_member_previlige data
 *@access public
 *@return TRUE/FALSE
*/
    function org_member_previlige_setting_update($data, $mem_type_id, $org_id) {
        $this->db->where('org_id ', $org_id);
        $this->db->where('mem_type_id ', $mem_type_id);
        $this->db->update('org_member_previlige', $data);
}


/**
 * Check Organization member_type Assigned To DB:adminscentral, Table: member
 *
 *@Param $mem_type_id which contains mem_type_id
 *@access Private
 *@return TRUE/FALSE
*/
function check_admin_user_type_assigned($mem_type_id){
    $query = $this->db->get_where('member', array('mem_type_id' => $mem_type_id));    
    return ($query->num_rows() > 0) ? TRUE : FALSE;	     
}

   function check_org_group($group_name, $org_id, $mem_id) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(group_name)=', strtolower($group_name));
        $this->db->where('org_id =', $org_id);
        $this->db->where('mem_id =', $mem_id);
        return $this->db->get('org_member_groups');
}



    function check_org_group1($group_name, $org_id, $mem_id, $id1) {
        $this->db->select('1', FALSE);
        $this->db->where('LOWER(group_name)=', strtolower($group_name));
        $this->db->where('org_id =', $org_id);
        $this->db->where('mem_id =', $mem_id);
        $this->db->where('group_id !=', $id1);
        return $this->db->get('org_member_groups');
    }


/**
 * Get organization's article category 
 *
 *@Param $member_org which contains logged user's org_id
 *@access public
 *@return organization's article category 
*/
function get_org_article_category($member_org){
        $category_name['Default']=$this->lang->line('label_select_category');
        $this->db->select('*');
        $this->db->from('article_category');        
        $this->db->where('org_id', $member_org);
        $this->db->order_by("art_cat_id", "DESC");
        $query= $this->db->get();
        if($query->num_rows()>0){
            foreach($query->result() as $rows){
                $category_name[$rows->art_cat_id]=$rows->category_name;
            }
            return $category_name;
        }
        else {
            return $query->result();
        }
}


/**
 * Check duplicate faktura invoice number by org_id To DB:adminscentral, Table: custom_faktura
 *
 *@Param $fak_invoice_no, $org_id
 *@access Private
 *@return result
*/
function check_fak_invoice_no_by_org_id($fak_invoice_no,$org_id){
        $this->db->select('1', FALSE);
        $this->db->where('fak_invoice_no', $fak_invoice_no);        
        $this->db->where('org_id', $org_id);        
        $result = $this->db->get('custom_faktura');        
        return $result;        
}


/**
 * Check duplicate Non-Ac member's Customer number by org_id To DB:adminscentral, Table: member
 *
 *@Param $customer_no, $org_id
 *@access Private
 *@return result
*/
function check_customer_no($customer_no,$org_id){
        $this->db->select('1', FALSE);
        $where_customer_no = "customer_no ='$customer_no'";      
        $this->db->where($where_customer_no);     
        $this->db->where('org_id', $org_id);        
        $result = $this->db->get('member');       
        return $result;        
}

/**
 * Check duplicate Non-Ac member's VAT number by org_id To DB:adminscentral, Table: member
 *
 *@Param $vat_no, $org_id
 *@access Private
 *@return result
*/
function check_vat_no($vat_no,$org_id){
        $this->db->select('1', FALSE);
        $where_vat_no = "vat_no ='$vat_no'";      
        $this->db->where($where_vat_no);     
        $this->db->where('org_id', $org_id);        
        $result = $this->db->get('member');       
        return $result;        
}

/**
 * Check duplicate Non-Ac member's EAN number by org_id To DB:adminscentral, Table: member
 *
 *@Param $ean_no, $org_id
 *@access Private
 *@return result
*/
function check_ean_no($ean_no,$org_id){
        $this->db->select('1', FALSE);
        $where_ean_no = "ean_no ='$ean_no'";      
        $this->db->where($where_ean_no);     
        $this->db->where('org_id', $org_id);        
        $result = $this->db->get('member');       
        return $result;        
}

/**
 * Check duplicate Mobile number To DB:adminscentral, Table: member
 *
 *@Param $mobile_no
 *@access Private
 *@return result
*/
function check_mobile_no($mobile_no){
        $this->db->select('1', FALSE);
        $where_mobile_phone = "mobile_phone ='$mobile_no'";      
        $this->db->where($where_mobile_phone);     
        $result = $this->db->get('member');       
        return $result;        
}
}

