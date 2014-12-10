<?php
/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		Model Public Class																	*
 * 		@Author			Aninda Barua (B.Sc in CSE)															*
 * 		@Email			heart_of_the_ocean25@yahoo.com, aninda.cse@gmail.com								*
 *		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 *																											*
 ************************************************************************************************************
*/

class Roles extends Model 
{
	function Roles()
	{
		parent::Model();
		
		// Other stuff
		$this->_prefix 	= $this->config->item('DX_table_prefix');
		$this->_table 	= $this->_prefix.$this->config->item('DX_roles_table');
	}
	
	function get_all()
	{
		$this->db->order_by('id', 'ASC');
		return $this->db->get($this->_table);
	}
	
	function get_role_by_id($role_id)
	{
		$this->db->where('id', $role_id);
		return $this->db->get($this->_table);
	}
	
	function create_role($name, $parent_id = 0)
	{
		$data = array(
			'name' 		=> $name,
			'parent_id' => $parent_id
		);
            
		$this->db->insert($this->_table, $data);
	}
	
	function delete_role($role_id)
	{
		$this->db->where('id', $role_id);
		$this->db->delete($this->_table);		
	}
}
?>