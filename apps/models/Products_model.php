<?php
class Products_model extends Model {
	
	function get_all()
	 {		
		$results = $this->db->get('product')->result();
		return $results;
	 }
	
	function get($id) {
		
		$results = $this->db->get_where('product', array('product_id' => $id))->result();
		$result = $results[0];
		return $result;
	 }	
}
