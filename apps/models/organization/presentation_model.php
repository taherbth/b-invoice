<?php

class presentation_model extends Model {

    function presentation_model() {
        parent::Model();
        $this->load->helper('url');
    }

    //area insert,delete,update start
    function letter_insert($data) {
        $this->db->insert('letter', $data);
    }

    function letter_request_insert($data1) {
        $this->db->insert('letter_send_request', $data1);
    }

    function view_comment($start=0, $perPage=0) {
        $this->_table = 'forum_archive';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table);
        }

        return $query;
    }

    function zone_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('zone', $data);
    }

    function delete_zone($id) {
        $this->db->delete('zone', array('id' => $id));
    }

    function get_zone($id) {
        $query = $this->db->get_where('zone', array('id' => $id));
        return $query->result();
    }

    //end insert,delete,update start
    //package insert,delete,update start

    function view_package($start=0, $perPage=0) {
        $this->_table = 'package';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'ASC');
            $query = $this->db->get($this->_table);
        }

        return $query;
    }
 function message_insert($data){
        $this->db->insert('contact_info', $data);
   }
   
    function view_article($start=0, $perPage=0) {
        $this->_table = 'archive_article';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('orgid'));
			$this->db->where('article_type', 1);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata('orgid'));
			$this->db->where('article_type', 1);
            $query = $this->db->get($this->_table);
        }
        return $query;
    }
    function view_mainboard_article($start=0, $perPage=0) {
        $s = "2";
		$article_type=1;
        $this->_table = 'member_post';
        if ($start >= 0 AND $perPage > 0) {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata("orgid"));
            $this->db->where('status', $s);
			$this->db->where('article_type',$article_type);
            $query = $this->db->get($this->_table, $perPage, $start);
        } else {
            $this->db->order_by($this->_table . '.id', 'DESC');
            $this->db->where('org_id', $this->session->userdata("orgid"));
            $this->db->where('status', $s);
			$this->db->where('article_type',$article_type);
            $query = $this->db->get($this->_table);
        }
        return $query;
    }
   }

