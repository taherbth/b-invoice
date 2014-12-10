<?php

class Info_model extends Model {

    function Info_model() {
        parent::Model();
        $this->load->helper('url');
    }

    function member_profile_update($data) {
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('member', $data);
    }

    function org_group_insert($data) {
        $this->db->insert('org_group', $data);
    }

    function forum_post_insert($data) {
        $this->db->insert('forum', $data);
    }

    function member_post_insert($data) {
        $this->db->insert('member_post', $data);
    }

    function view_post() {
        $query = $this->db->query("select * from member_post where member_id='" . $this->session->userdata('id') . "' order by id desc");
        return $query->result();
    }

    function post_info_insert($data1) {
        $this->db->insert('post_tbl', $data1);
    }

    function comment_insert($data) {
        $this->db->insert('comment', $data);
    }

    function forum_comment_insert($data) {
        $this->db->insert('forum_comment', $data);
    }

    function article_comment_insert($data) {
        $this->db->insert('article_comment', $data);
    }

    function delete_forum_post($id) {
        $this->db->delete('forum_comment', array('id' => $id));
    }

    function archive_forum_comments_insert($data) {
        $this->db->insert('forum_archive', $data);
    }

    function delete_archive_comment($id) {
        $this->db->delete('forum_comment', array('id' => $id));
    }

    function approve_member_post_update($data, $post_id) {
        $this->db->where('id', $post_id);
        $this->db->update('member_post', $data);
    }

    function approve_member_post1_update($data1, $post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->update('post_tbl', $data1);
    }

    function deny_member_post_update($data, $post_id) {
        $this->db->where('id', $post_id);
        $this->db->update('member_post', $data);
    }

    function get_post_detail($id) {
        $query = $this->db->query("select * from member_post where id='" . $id . "'");
        return $query->result();
    }

    function article_update($profile_data) {
        $this->db->where('id', $this->input->post("id"));
        $this->db->update('member_post', $profile_data);
    }

    function article_archive_insert($data1) {
        $this->db->insert('archive_article', $data1);
    }

    function delete_article($article_id) {
        $this->db->delete('member_post', array('id' => $article_id));
    }

    function profile_setting_insert($data) {
        $this->db->insert('member_info_previlize', $data);
    }

    function profile_setting_update($data, $id) {
        $this->db->where('member_id', $id);
        $this->db->update('member_info_previlize', $data);
    }

    function view_member_profile_seeting($id) {
        $query = $this->db->get_where('member_info_previlize_org', array('member_id' => $id));
        return $query->result();
    }

    function view_member_profile_seeting1($id) {
        $query = $this->db->get_where('member_info_previlize', array('member_id' => $id));
        return $query->result();
    }

    function view_member_profile_seeting2($id) {
        $query = $this->db->get_where('member_info_previlize', array('member_id' => $id));
        return $query->result();
    }

    function password_update($data) {
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('member', $data);
    }

    function view_mainboard_article($start=0, $perPage=0) {
        $s = "2";
        $this->_table = 'member_post';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $this->db->where('status', $s);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $this->db->where('status', $s);
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_forum_post($start=0, $perPage=0) {
        $this->_table = 'forum';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function get_group_member($group_id) {
        $query = $this->db->get_where('member', array('member_group' => $group_id));
        return $query->result();
    }

    function get_orginfo($uid) {
        $query = $this->db->get_where('signature', array('org_id' => $uid));
        return $query->result();
    }

    function total_sms_insert($data2) {
        $this->db->insert('total_sms', $data2);
    }

    function view_mainboard_article1($start=0, $perPage=0, $article_category) {
        $s = "2";
        $this->_table = 'member_post';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $this->db->where('status', $s);
            $this->db->where('article_category', $article_category);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('member_org'));
            $this->db->where('status', $s);
            $this->db->where('article_category', $article_category);
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

    function view_all_org_member($start=0, $perPage=0) {       
        $this->_table = 'member';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $this->db->where('org_id', $this->session->userdata('member_org'));           
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $this->db->where('org_id', $this->session->userdata('member_org'));            
            $query = $this->db->get($this->_table);
        }
        return $query;
    }

}

