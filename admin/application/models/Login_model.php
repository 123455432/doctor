<?php 

class Login_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	/*function login($username, $password) {
		return true;
	}*/
	
	 function login($username, $password) {
			   
			   
			                 $this->db->where('username',$username);					 
							 $this->db->where('password',$password);							 
							 $query=$this->db->get('admin');
							 $query_value=$query->row();

							        if ($query -> num_rows() == 1) {
									return $query_value;
								    }

					  /* else{
							 
						  $this -> db -> where('status', '1');
			          	  $this->db->where('username',$username);					 
					      $this->db->where('password',$password);				 
						  $query=$this->db->get('agent');
						  $query_value=$query->row();

						 
					   
								   if ($query -> num_rows() == 1) {
								   return $query_value;
								   }
													
					   }*/
		   }
	

}