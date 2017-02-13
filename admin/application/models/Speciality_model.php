<?php 

class Speciality_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}

 	/*public function get_specialityval()
 	{
 		         $query = $this->db->get('specialty_categories');
			     $result = $query->result();
				$this->db->order_by("specialty_name", "desc"); 
			     return $result;
 	}*/
public function get_specialityval()
 	{
		          $this->db->select('visit_categories.id as id,reason,specialty_id,specialty_categories.specialty_name');
                 $this->db->from('visit_categories');
 		         //$query = $this->db->get('visit_categories');
				 $this->db->join('specialty_categories', 'specialty_categories.id = specialty_id');
				 $query = $this->db->get();
			     $result = $query->result();
				$this->db->order_by("specialty_id", "desc"); 
			     return $result;
 	}
 	/*public function addval_speciality($data)
 	{
		         
				 
                 $result = $this->db->insert('specialty_categories', $data);
                 return $result;
 	}*/
	
	public function addval_speciality($data)
 	{
		         
				  // $d = array('reason' => $reason, 
					// 'specialty_id' => $specialtyid, 
					
					// );
                 $result = $this->db->insert('visit_categories', $data);
                
 	}
	
	
	function get_single_speciality($id){
		  
		       $this->db->where('id',$id);
			   $query = $this->db->get('visit_categories');
			   $result = $query->row();
			   return $result;  
	}
	
	
	function speclitydetails_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('visit_categories', $data); 
			   return $result;
	 }
	 
     public function speciality_delete($id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->delete('visit_categories');
		 if($result)
		 {
			return "success"; 
		 }
		 else
		 {
			 return "error";
		 }
	 }
	  

}
