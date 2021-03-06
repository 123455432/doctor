<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance_ctrl extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Insurance_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}

    }
	
/////////////////////////////////////////
/////*******ADD INSURANCE DETAILS******/////////
	 public function add_insurancedetail(){
			
			  $template['page'] = "Insurancecategory/add-insurance";
			  $template['page_title'] = "Add Insurance";
		  
		      if($_POST){		  
			  $data = $_POST;
			  
			    //array_walk($data, "remove_html");
				
			    // $data['created_by']=$sessid['created_user'];
			    $result = $this->Insurance_model->add_insurdetails($data);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Insurance Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
			  $template['data'] = $this->Insurance_model->get_insurdetails();
			  $this->load->view('template',$template);

	 }

////////////////////////////////////////////////
/////*******DELETE INSURANCE DETAILS******//////
	 
	 public function delete_insurance()
	 {
		      $id = $this->uri->segment(3);
		      $result= $this->Insurance_model->insurance_delete($id);
		      $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	          redirect(base_url().'Insurance_ctrl/add_insurancedetail');
	 }
	 
	 
///////////////////////////////////////////
////*******EDIT INSURANCE DETAILS******////
	 public function edit_insuranceval(){
		
		      $template['page'] = "Insurancecategory/edit-insurance";
			  $template['page_title'] = "Edit Insurance";

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->Insurance_model->get_single_insurance($id);
			 
		      if($_POST){
			  $data = $_POST;
				
				//array_walk($data, "remove_html");
				
			  	$result = $this->Insurance_model->insurancedetails_edit($data, $id);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Edit Insurance Details Updated successfully','class' => 'success'));
					  redirect(base_url().'Insurance_ctrl/add_insurancedetail');
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error')); 
					 redirect(base_url().'Insurance_ctrl/add_insurancedetail');
				}
				}	
	      $this->load->view('template',$template); 	
	 }
	 	
	
	
}