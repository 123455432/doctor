<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_ctrl extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Language_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}

    }
	
/////////////////////////////////////////////////
/////*******ADD LANGUAGES DETAILS******/////////
	 public function add_languages(){
			
			  $template['page'] = "Languagesdetails/add-language";
			  $template['page_title'] = "Add Languages";
		  
		      if($_POST){		  
			  $data = $_POST;
			  
			    //array_walk($data, "remove_html");
				
			    // $data['created_by']=$sessid['created_user'];
			    $result = $this->Language_model->add_languagedetails($data);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Languages Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
			  $template['data'] = $this->Language_model->get_languagedetails();
			  $this->load->view('template',$template);

	 }
	 

/////////////////////////////////////////////////
/////*******DELETE LANGUAGES DETAILS******//////
	 
	 public function delete_languages()
	 {
		      $id = $this->uri->segment(3);
		      $result= $this->Language_model->languages_delete($id);
		      $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	          redirect(base_url().'Language_ctrl/add_languages');
	 }
	 
///////////////////////////////////////////
////*******EDIT LANGUAGES DETAILS******////
	 public function edit_languagedetailsdval(){
		
		      $template['page'] = "Languagesdetails/edit-language";
			  $template['page_title'] = "Edit Languages";

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->Language_model->get_single_language($id);
			 
		      if($_POST){
			  $data = $_POST;
				
				//array_walk($data, "remove_html");
				
			  	$result = $this->Language_model->languagedetails_edit($data, $id);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Edit Languages Details Updated successfully','class' => 'success'));
					  redirect(base_url().'Language_ctrl/add_languages');
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error')); 
					 redirect(base_url().'Language_ctrl/add_languages');
				}
				}	
	      $this->load->view('template',$template); 	
	 }
	 	
	
}