<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Patient_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}

    }

///////////////////////////////////
//////****PATIENT DETAILS***///////
     public function view_patientdetails(){
		 
	  
			  $template['page'] = "Patientdetails/view-patient-details";
			  $template['page_title'] = "Patient Details";
			  $template['data'] = $this->Patient_model->get_patientdetails();
			  $this->load->view('template',$template);
	 }
	
//////////////////////////////////////////
//////****DELETE PATIENT DETAILS***///////	
     public function delete_Patient(){
			      
		  $id = $this->uri->segment(3);
		  $result= $this->Patient_model->patient_delete($id);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	      redirect(base_url().'Patient_details/view_patientdetails');
	 }
//////////////////////////////////////////
//////*****ADD PATIENT DETAILS****///////		 
	  public function add_patient() { 
	 
			  $template['page'] = 'Patientdetails/add-patient';
			  $template['page_title'] = 'Add Patient';			  
		      $sessid=$this->session->userdata('logged_in');		  
			  
		      if($_POST){		  
			  $data = $_POST;
			  //print_r($_POST);
			  //exit;
			    //array_walk($data, "remove_html");
				
				
		   $config = set_upload_patient('assets/uploads/patient');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["patient_display_image"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('patient_display_image')) {
				//$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred while uploading files. Please try again', 'title' => 'Error !', 'class' => 'danger'));
				$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
				
			}
			else 
			{
				
		    $upload_data = $this->upload->data();
			$data['patient_display_image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];	
				
			    //$data['created_by']=$sessid['created_user'];
			    $result = $this->Patient_model->patientdetails_add($data);
			
				if($result) {
					 //array_walk($data, "remove_html");
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Patient Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
			  }	 
              $template['languagedet'] = $this->Patient_model->gets_language();				  
              $template['insurancedetailsval'] = $this->Patient_model->gets_insuranceval();				  
			  $this->load->view('template',$template);
     } 
	 
//////////////////////////////////////////
//////*****EDIT PATIENT DETAILS****///////		 
	 public function edit_patient(){
		
		      $template['page'] = 'Patientdetails/edit-patient-details';
		      $template['page_title'] = 'Edit Patient';

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->Patient_model->get_single_patient($id);
			  if(!empty($template['data'])) {
				  
				  
		      if($_POST){
			  $data = $_POST;
			 
			    //array_walk($data, "remove_html");
					  if(!isset($data['terms']))	
				 {
					$data['terms']=disagree; 
				 }
 
			if(isset($_FILES['patient_display_image'])) {  
			$config = set_patient_image('assets/uploads/patient');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["patient_display_image"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('patient_display_image')) {
					unset($data['patient_display_image']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['patient_display_image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}

			  	$result = $this->Patient_model->patientdetails_edit($data, $id);
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Edit Patient Details Updated successfully','class' => 'success'));
					 redirect(base_url().'Patient_details/view_patientdetails');
				}
			  }
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
					 redirect(base_url().'Patient_details/view_patientdetails');
				}
				
					  $template['languagedet'] = $this->Patient_model->gets_language();				  
					  $template['insurancedetailsval'] = $this->Patient_model->gets_insuranceval();	
					  $this->load->view('template',$template); 	
	 }
	 
//////////////////////////////////////////
//////******PATIENT VIEWPOPUP*****///////		 	 
	 public function patient_viewpopup()
	 {  
		  $id=$_POST['patientdetailsval'];
		  $template['data'] = $this->Patient_model->view_popup_patient($id);
		  $this->load->view('Patientdetails/patient-view-popup',$template);   
	 }
	 
	 
	  public function get_patientdetails(){
					 
			 $template['data'] = $this->Patient_model->get_patientval();	
			 
	  }
	  
	    public function get_patientstates(){
					 
			 $template['data'] = $this->Patient_model->get_patientstateval();	
			 
	   }
	   
	 
	   public function get_patientcountry(){
		   
		     $template['data'] = $this->Patient_model->get_patientcountryval();	
	   }
	 
	
	 
  
    

}