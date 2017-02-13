<?php 

class Visitation_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	function get_visitationdetails()
	{
		$query = $this->db->get('specialty_categories');
		$result = $query->result();
		return $result;
	}
	
	function add_visitationdetails($data)
	{
		$result = $this->db->insert('specialty_categories', $data);
		return $result;
	}
	
	function visitation_delete($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('specialty_categories');
		if($result)
		{
			return "Success";
		}
		else
		{
			return "Error";
		}
	}
	
	function get_single_visits($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('specialty_categories');
		$result = $query->row();
		return $result;
	}
	
	function visitdetails_edit($data, $id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('specialty_categories', $data);
		return $result;
	}
	
}