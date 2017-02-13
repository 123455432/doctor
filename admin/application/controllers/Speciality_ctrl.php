<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speciality_ctrl extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Speciality_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}

    }
	
/////////////////////////////////////////
/////*******ADD SPECIALITY******/////////
	 public function add_specialityvalues(){
			
			  $template['page'] = "Specialitydetails/add-speciality";
			  $template['page_title'] = "View Speciality Details";
		  
		      if($_POST){	
			  //if($isset[$_POST] && !$empty[$_POST]){
			  $data = $_POST;
			  
			    //array_walk($data, "remove_html");
				
			   // $data['created_by']=$sessid['created_user'];
			   // $result = $this->Speciality_model->addval_speciality($data);
					//$specialtyid = $this->input->post('Specialty_name');
                    //$reason = $this->input->post('reason');
				 $result['abc'] = $this->Speciality_model->addval_speciality($data);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Visitation Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
			  //}
				}
			  $template['data'] = $this->Speciality_model->get_specialityval();
			  $this->load->view('template',$template);

	 }
	 
///////////////////////////////////////////
/////*******EDIT SPECIALITY******/////////
	 public function edit_speialityval(){
		
		      $template['page'] = "Specialitydetails/edit-speciality";
			  $template['page_title'] = "Edit Speciality";
              $template['dataspecialty'] = $this->Speciality_model->get_specialityval();
		   //var_dump($template['dataspecialty']);
		  // die;
		      $id = $this->uri->segment(3); 
		
		    $template['data'] = $this->Speciality_model->get_single_speciality($id);
			 
		      if($_POST){
			  $data = $_POST;
				
				//array_walk($data, "remove_html");
				
			  	$result = $this->Speciality_model->speclitydetails_edit($data, $id);
			
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Edit Visitation Details Updated successfully','class' => 'success'));
					 redirect(base_url().'Speciality_ctrl/add_specialityvalues');
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error')); 
					 redirect(base_url().'Speciality_ctrl/add_specialityvalues');
				}
				}	
	      $this->load->view('template',$template); 	
	 }
	 
////////////////////////////////////////////
/////*******DELETE SPECIALITY******/////////	 
	 
	 public function delete_speciality()
	 {
		      $id = $this->uri->segment(3);
		      $result= $this->Speciality_model->speciality_delete($id);
		      $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	          redirect(base_url().'Speciality_ctrl/add_specialityvalues');
	 }


 }