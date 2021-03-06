<?php 

class HospitalAppoinment_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	function get_appoinmentdetails()
	{
		/*$query = $this->db->get('appointment');
		$result = $query->result();
		return $result;	*/
		
			$this->db->select('appointment.id as id, appointment.*, hospital.hospital_name, doctor.doctor_firstname');
			          
			$this->db->from('appointment' );
			$this->db->join('hospital', 'hospital.id = appointment.hospital_id');
			$this->db->join('doctor', 'doctor.id = appointment.doctor_id');
			$this->db->group_by('appointment.id'); 
			
			$query = $this->db->get();
			$result = $query->result();
			return $result;	
	}
	
	function hospitalappoinmentsinfo_add($data)
	{
		$result = $this->db->insert('appointment', $data);
		return $result;
	}
	
	public function get_hospitalname()
	{
		$query = $this->db->get('hospital');
		$result = $query->result();
		return $result;	
	}
	public function get_patientname()
	{
		$query = $this->db->get('patient');
		$result = $query->result();
		return $result;	
	}
	public function get_doctorname()
	{  
		$query = $this->db->get('doctor');
		$result = $query->result();
		return $result;	
	}
	
	function get_appoinment_hospital($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('appointment');
		$result = $query->row();
		return $result;	
	}
	
	function appoinmentsinfo_edit($data, $id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('appointment', $data);
		return $result;
	}
	
	function appointment_delete($id)
	{
		 $this->db->where('id',$id);
		 $result = $this->db->delete('appointment');
		 if($result)
		 {
			return "success"; 
		 }
		 else
		 {
			 return "error";
		 }
	}
	
	function update_appoinment_status($data , $data1)
	{
		         $this->db->where('id',$data);
				 $result = $this->db->update('appointment',$data1);
				 return $result; 
	}
	function view_appoinmentpopup($id)
	{
		    $this->db->select('appointment.id as id, appointment.*, hospital.hospital_name, doctor.doctor_firstname');
			          
			$this->db->from('appointment' );
			$this->db->join('hospital', 'hospital.id = appointment.hospital_id');
			$this->db->join('doctor', 'doctor.id = appointment.doctor_id');
			$this->db->group_by('appointment.id'); 
			$this->db->where('appointment.id',$id);
			
			$query = $this->db->get();
			$result = $query->row();
			return $result;	
	}
	function view_doctor($id)
	{
		
		$this->db->select('id,doctor_firstname');
		//$this->db->where("FIND_IN_SET('clinic_id', $id)");
		$this->db->where(sprintf("find_in_set('%d', hospital_id) !=",$id), 0);
		 $query = $this->db->get('doctor');
		$result = $query->result();
		
		return $result;	
	}
	function get_doctornameindividual($id)
	{
		
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('appointment');
		$result1 = $query->row();
		if($result1)
		{
		
		$this->db->where('id', $result1->doctor_id);
		$query = $this->db->get('doctor');
		$result = $query->row();
		if($result){

return $result;		
		}else{
		return "Error";	
		}
		
		}
		else
		{
		return "Error";	
		}
		//return $result;	
	}
	function get_doctortotalindividual($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('appointment');
		$result1 = $query->row();
		if($result1)
		{
		
		//$this->db->where('hospital_id', $result1->hospital_id);
		$this->db->where(sprintf("find_in_set('%d', hospital_id) !=",$result1->hospital_id), 0);
		$query = $this->db->get('doctor');
		$result = $query->result();
		if($result){

return $result;		
		}else{
		return "Error";	
		}
		
		}
		else
		{
		return "Error";	
		}
	}
	
}
	