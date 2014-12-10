<?php

class letter_model extends Model {

    function letter_model() {
        parent::Model();
        $this->load->helper('url');
    }

    //area insert,delete,update start
    function letter_insert($data) {
        $this->db->insert('letter', $data);
    }

    function header_insert($data) {
        $this->db->insert('letter_header', $data);
    }

    function footer_insert($data) {
        $this->db->insert('letter_footer', $data);
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

    function get_billing_info() {
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $member_name = $this->input->post("member_name");
        $org_id = $this->session->userdata('user_id');
        $query = $this->db->query("select * from total_letter where sending_date>='" . $start_date . "'and sending_date<='" . $end_date . "'and org_id='" . $org_id . "'and sender_name='" . $member_name . "'and ((status=1) || (status=2))");

        return $query->result();
    }
    function get_sms_billing_info() {
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $member_name = $this->input->post("member_name");
        $org_id = $this->session->userdata('user_id');
        $query = $this->db->query("select * from total_sms where sending_date>='" . $start_date . "'and sending_date<='" . $end_date . "'and org_id='" . $org_id . "'and sender_name='" . $member_name . "'");

        return $query->result();
    }

    //start header edit and delete
    function header_delete($id) {
        $this->db->delete('letter_header', array('id' => $id));
    }

    function get_header_info($id) {
        $query = $this->db->get_where('letter_header', array('id' => $id));
        return $query->result();
    }

    function header_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('letter_header', $data);
    }

    //end header edit and delete
    //start footer edit and delete
    function footer_delete($id) {
        $this->db->delete('letter_footer', array('id' => $id));
    }

    function get_footer_info($id) {
        $query = $this->db->get_where('letter_footer', array('id' => $id));
        return $query->result();
    }

    function footer_update($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('letter_footer', $data);
    }

    //end header edit and delete
}

