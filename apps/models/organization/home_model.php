<?php
class Home_model extends Model {

function Home_model()
	{
		parent::Model();    
		$this->load->helper('url');           
	}
	
 function get_all($accno) {
        $this->load->database();
        $query = $this->db->get_where('account', array('acc_no' => $accno));
        return $query->result_array();
    }
}	