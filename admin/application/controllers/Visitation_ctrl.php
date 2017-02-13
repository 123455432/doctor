<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitation_ctrl extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Visitation_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}

    }
	
	
/////////////////////////////////////////////////
/////*******ADD VISITATION DETAILS******/////////
	 public function add_visitations(){
			
			  $template['page'] = "Visitationdetails/add-visitation";
			  $template['page_title'] = "Add Visitaion";
		  
		      if($_POST){		  
			  $data = $_POST;
			  
			    //array_walk($data, "remove_html");
				
			    // $data['created_by']=$sessid['created_user'];
			    $result = $this->Visitation_model->add_visitationdetails($data);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Specialty Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
			  $template['data'] = $this->Visitation_model->get_visitationdetails();
			  $this->load->view('template',$template);

	 }
	 

/////////////////////////////////////////////////
/////*******DELETE VISITATION DETAILS******//////
	 
	 public function delete_visitation()
	 {
		      $id = $this->uri->segment(3);
		      $result= $this->Visitation_model->visitation_delete($id);
		      $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	          redirect(base_url().'Visitation_ctrl/add_visitations');
	 }
	 
///////////////////////////////////////////
////*******EDIT VISITATION DETAILS******////
	 public function edit_visitdetailsdval(){
		
		      $template['page'] = "Visitationdetails/edit-visitation";
			  $template['page_title'] = "Edit Visitaion";

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->Visitation_model->get_single_visits($id);
			 
		      if($_POST){
			  $data = $_POST;
				
				//array_walk($data, "remove_html");
				
			  	$result = $this->Visitation_model->visitdetails_edit($data, $id);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Edit Specialty Details Updated successfully','class' => 'success'));
					  redirect(base_url().'Visitation_ctrl/add_visitations');
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error')); 
					 redirect(base_url().'Visitation_ctrl/add_visitations');
				}
				}	
	      $this->load->view('template',$template); 	
	 }
	 	


	
	
}