<?php 

class Patient_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 function get_patientdetails(){
		 
				 $query = $this->db->get('patient');
			     $result = $query->result();
			     return $result;
			    
     }
	 function view_popup_patient($id){
		 
		           $this->db->select('patient.id as id,patient.*,
				                      insurance_categories.insurance_name, 
				                      language_categories.language_name, 
									  GROUP_CONCAT(distinct insurance_categories.insurance_name) as insurance_name,
			                         
			                          GROUP_CONCAT(distinct language_categories.language_name) as language_name');
				 
			$this->db->from('patient as patient' );
			$this->db->join('insurance_categories', 'FIND_IN_SET(insurance_categories.id, patient.insurance) > 0','left');
			$this->db->join('language_categories', 'FIND_IN_SET(language_categories.id, patient.languages) > 0','left');
			$this->db->group_by('patient.id');  
			$this->db->where('patient.id',$id);  
			
			$query = $this->db->get();
			$result = $query->row();
			return $result;
			    
     }
	 
	 public function patient_delete($id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->delete('patient');
		 if($result)
		 {
			return "success"; 
		 }
		 else
		 {
			 return "error";
		 }
	 }
	 
	  function  patientdetails_add($data){
		  
		          $array = $data['languages'];
				  $comma_separated = implode(",", $array);
				  $data['languages']=$comma_separated;
				  
				  $array = $data['insurance'];
				  $comma_separated = implode(",", $array);
				  $data['insurance']=$comma_separated;
				  
		 	   $data['password'] = md5($data['password']);
			   $result = $this->db->insert('patient', $data);
			   return $result;
      }
	 
	  public function get_single_patient($id){
		 
			   $query = $this->db->where('id',$id);
			   $query = $this->db->get('patient');
			   $result = $query->row();
			   return $result;  
	 
	   }
	   
	
	 function patientdetails_edit($data, $id){
		 
		 
		          $array = $data['languages'];
				  $comma_separated = implode(",", $array);
				  $data['languages']=$comma_separated;
				  
				  $array = $data['insurance'];
				  $comma_separated = implode(",", $array);
				  $data['insurance']=$comma_separated;
		 
			   $this->db->where('id', $id);
			   $result = $this->db->update('patient', $data);
			   return $result;
	 }
	 
	 public function get_patientval(){
		 
	  
	     //$lat=$_POST['latitu'];
	     // $long=$_POST['lontud'];
         $places=$_POST['place'];
		 $type='establishment';
		 
		               $key = $this->config->item('encryption_key');
					   $jsonResults = file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query=$places&location=$lat,$long&radius=50000&type=$type&key=$key");
					  
					 // print_r($jsonResults);
						   $json_decode = json_decode($jsonResults);
							// print_r($jsonResults);
							 foreach($json_decode->results as $arrayval)
							  {
								  
								$name= $arrayval->name;
								//$lat =$arrayval->geometry->location->lat;
								// $lon= $arrayval->geometry->location->lng;
								 $id=$arrayval->id;
								 echo '<option data-lat="'.$lat.'" data-lon="'.$lon.'" data-id="'.$id.'" value="'.$name.'">'.$name.'</option>';
							  }
	   }
	   
	  public function get_patientstateval()
	  {
         $places=$_POST['place'];
		 $type='establishment';
		 
		               $key = $this->config->item('encryption_key');
					   $jsonResults = file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query=$places&location=$lat,$long&radius=50000&type=$type&key=$key");
					  
					 // print_r($jsonResults);
						   $json_decode = json_decode($jsonResults);
							// print_r($jsonResults);
							 foreach($json_decode->results as $arrayval)
							  {
								  
								$name= $arrayval->name;
								//$lat =$arrayval->geometry->location->lat;
								// $lon= $arrayval->geometry->location->lng;
								 $id=$arrayval->id;
								 echo '<option data-lat="'.$lat.'" data-lon="'.$lon.'" data-id="'.$id.'" value="'.$name.'">'.$name.'</option>';
							  }
	   }
	   
	  function get_patientcountryval()
	  {
		  $places=$_POST['place'];
		  $type='establishment';
		 
		               $key = $this->config->item('encryption_key');
					   $jsonResults = file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query=$places&location=$lat,$long&radius=50000&type=$type&key=$key");
					  
					 // print_r($jsonResults);
						   $json_decode = json_decode($jsonResults);
							// print_r($jsonResults);
							 foreach($json_decode->results as $arrayval)
							  {
								  
								$name= $arrayval->name;
								//$lat =$arrayval->geometry->location->lat;
								// $lon= $arrayval->geometry->location->lng;
								 $id=$arrayval->id;
								 echo '<option data-lat="'.$lat.'" data-lon="'.$lon.'" data-id="'.$id.'" value="'.$name.'">'.$name.'</option>';
							  }
	  }
	  
	  function gets_language()
	  {
		   $query = $this->db->get('language_categories');
		   $result = $query->result();
		   return $result;
	  }
	  
	   function gets_insuranceval()
	  {
		  $query = $this->db->get('insurance_categories');
		  $result = $query->result();
		  return $result;
	  }

	    
}
?>