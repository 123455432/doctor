<?php
class Home_Model extends CI_Model

	{
	public

	function _construct()
		{
		parent::_construct();
		}

	public function get_countries()
		{
		$this->db->select('*');
		$this->db->from('country_categories ');
		$this->db->group_by("country_name");       
				
		$query = $this->db->get();
	
		return $countries = $query->result();
		}
		public function get_states()
		{
		$this->db->select('*');
		$this->db->from('state_categories ');
		$this->db->group_by("state_name");       
				
		$query = $this->db->get();
	
		return $states = $query->result();
		}
		public function get_cities()
		{
		$this->db->select('*');
		$this->db->from('city_categories ');
		$this->db->group_by("city_name");       
				
		$query = $this->db->get();
	
		return $cities = $query->result();
		}
		public function get_specialties()
		{
		$this->db->select('*');
		$this->db->from('specialty_categories ');
		$this->db->group_by("specialty_name");       
				
		$query = $this->db->get();
	
		return $specialties = $query->result();
		}
		public function get_languages()
		{
		$this->db->select('*');
		$this->db->from('language_categories ');
		$this->db->group_by("language_name");       
				
		$query = $this->db->get();
	
		return $languages = $query->result();
		}
		public function get_insurance()
		{
		$this->db->select('*');
		$this->db->from('insurance_categories ');
		$this->db->group_by("insurance_name");       
				
		$query = $this->db->get();
	
		return $insurance = $query->result();
		}
		public function get_visitation()
		{
		$this->db->select('*');
		$this->db->from('visit_categories ');
		$this->db->group_by("reason");       
				
		$query = $this->db->get();
	
		return $visitation = $query->result();
		}
		
	}
	?>