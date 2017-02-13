<?php
class Login_Model extends CI_Model

	{
	public

	function _construct()
		{
		parent::_construct();
		}
		
		public function Insert_hospital($data){
			
			if ($this->db->insert("hospital", $data))
			{
			return true;
			}
		}
		public function Insert_medical($data){
			
			if ($this->db->insert("medical_center", $data))
			{
			return true;
			}
		}
		 public function Insert_clinic($data){
			
			if ($this->db->insert("clinic", $data))
			{
			return true;
			}
		}
        public function Insert_doctor($data){
			
			if ($this->db->insert("doctor", $data))
			{
			return true;
			}
		}
		public function Insert_patient($data){
			
			if ($this->db->insert("patient", $data))
			{
			return true;
			}
		}
		
		public function isEmailExistDoctor($email){
			
		$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('patient');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else 
			{
			$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('doctor');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else 
			{
				$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('clinic');
		if ($query->num_rows() > 0)
		{
				return true;
			}
			else 
			{
			$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('hospital');
		if ($query->num_rows() > 0)
			{
			return true;
			}
			else 
			{
			$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('medical_center');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else
			{
				return false;
			     }
		     }
	      }
      }
   }		
}
		/*public function isEmailExistPatient($email){
			
		$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('patient');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else
			{
			$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('doctor');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else
			{
				return false;
			}
			}
		
			
		}*/
		/*public function isEmailExistDoctor($email){
			
		$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('doctor');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else
			{
				$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('patient');
			if ($query->num_rows() > 0)
			{
			return true;
			}
		  else
			{
			return false;
			}
			}
		
			
		}*/
		
		public function get_practices()
		{
		$this->db->select('*');
		$this->db->from('specialty_categories');
		$query = $this->db->get();
		return $practices = $query->result();
		}
		public function Role_login($email, $password)
		{
		$this->db->select('*,doctor_firstname as username');
		$this->db->from('doctor');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('status', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1)
			{
			$result = $query->row();
			$result->super_person = 1;
			return $result;
			}
		  else
			{
				$this->db->select('*,clinic_name as username');
		$this->db->from('clinic');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('status', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1)
			{
			$result = $query->row();
			$result->super_person = 2;
			return $result;
			}
		  else
			{
				$this->db->select('*,medical_name as username');
		$this->db->from('medical_center');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('status', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1)
			{
			$result = $query->row();
			$result->super_person = 3;
			return $result;
			}
		  else
			{
				$this->db->select('*,hospital_name as username');
		$this->db->from('hospital');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('status', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1)
			{
			$result = $query->row();
			$result->super_person = 4;
			return $result;
			}
		  else
			{
			$this->db->select('*,patient_firstname as username');
			$this->db->from('patient');
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$this->db->where('status', 1);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1)
				{
				$result = $query->row();
				$result->super_person = 0;
				return $result;
				}
			  else
				{
				return false;
				}
			}
			}
			}
			}
		}
		
		
		
		public function forgetpassword($email)		{      
          //$email=$data->email;               
         $this->db->where('email',$email);
         $query=$this->db->get('doctor');		
         $query=$query->row();		 		 if($query)		 {			 $query->tables = 'doctor';			return $query; 
		 }		 		 $this->db->where('email',$email);		 $query=$this->db->get('patient');		 $query=$query->row();		 if($query)		 {     			$query->tables = 'patient';	       return $query;		 }		 
       	   		 $this->db->where('email',$email);
         $query=$this->db->get('hospital');         		 
         $query=$query->row();		 if($query)		 {			 $query->tables = 'hospital';			 return $query;
         }
         $this->db->where('email',$email);
         $query=$this->db->get('medical_center');		
         $query=$query->row();
         if($query)
         {                     $query->tables = 'medical_center';
                return $query;
          }
      
         $this->db->where('email',$email);
         $query=$this->db->get('clinic');		
         $query=$query->row();
         if($query)
         {                  $query->tables = 'clinic';
         return $query;
			
         }
         return "EmailNotExist";		 } 	
	
		
	}
	?>