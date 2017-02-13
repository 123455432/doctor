<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appoinment_ctrl extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Appoinment_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}

    }
	
	   public function view_appoinmentdetails(){
		 	  
			  $template['page'] = "Appoinmentdetails/view-appoinment";
			  $template['page_title'] = "View Appoinmentdetails";
			  $template['data'] = $this->Appoinment_model->get_appoinmentdetails();
			  $this->load->view('template',$template);
	  }
	  
	   public function add_appoinmentdetails(){
			  
			   $template['page'] = "Appoinmentdetails/add-appoinment";
			   $template['page_title'] = "View Appoinmentdetails";
		       $sessid=$this->session->userdata('logged_in');

		  
		    if($_POST){
			$data = $_POST;	
			
			$result = $this->Appoinment_model->appoinmentsinfo_add($data);
			if($result) {
				 $this->session->set_flashdata('message',array('message' => 'Add Appoinment Details successfully','class' => 'success'));
				 redirect(base_url().'Appoinment_ctrl/view_appoinmentdetails');
			}
			else {
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
				 redirect(base_url().'Appoinment_ctrl/view_appoinmentdetails');
			}
		  }
                 $template['doctornamedetails'] = $this->Appoinment_model->get_doctorname();				 
                 $template['patientnamedetails'] = $this->Appoinment_model->get_patientname();	
				 $template['reason'] = $this->Appoinment_model->get_reason();	
				   //var_dump($template['reason']);
				  // die;
				 $this->load->view('template',$template); 
	  }
	  
	  public function edit_appoinmentdetails(){
			  
			   $template['page'] = "Appoinmentdetails/edit-appoinment";
			   $template['page_title'] = "View Appoinmentdetails";
	
		  
		  $id = $this->uri->segment(3); 
		  $template['data'] = $this->Appoinment_model->get_appoinment_doctor($id);
		  if(!empty($template['data']))
			  {			
			  
		     if($_POST)
			 {
			    $data = $_POST;
				
			  $result = $this->Appoinment_model->appoinmentsinfo_edit($data, $id);
			  $this->session->set_flashdata('message',array('message' => 'Edit Appoinment Information Updated successfully','class' => 'success'));
			  redirect(base_url().'Appoinment_ctrl/view_appoinmentdetails');
			 
				}
			  else
			  {
				  $template['doctornamedetails'] = $this->Appoinment_model->get_doctorname();				 
                  $template['patientnamedetails'] = $this->Appoinment_model->get_patientname();	
				  $template['reason'] = $this->Appoinment_model->get_reason();					  
				  $this->load->view('template',$template); 
			  }	 
			  //$this->load->view('template',$template);
		      }
		  else{
			 		 		 
			  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));		
              redirect(base_url().'Appoinment_ctrl/view_appoinmentdetails');		  
	    }
 }
 
        public function delete_appoinment(){
			      
		  $id = $this->uri->segment(3);
		  $result= $this->Appoinment_model->appoinment_delete($id);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	      redirect(base_url().'Appoinment_ctrl/view_appoinmentdetails');	
	    }
		
		
		public function appoinment_status(){
		 
				  $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Appoinment_model->update_appoinment_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Appoinment Disable','class' => 'warning'));
				  redirect(base_url().'Appoinment_ctrl/view_appoinmentdetails');	
	    }

		public function appoinment_active(){
		 
				  $data1 = array(
				  "status" => '1'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Appoinment_model->update_appoinment_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Appoinment Enable Successfully','class' => 'success'));
				  redirect(base_url().'Appoinment_ctrl/view_appoinmentdetails');	
	    }
		
		
		
	    public function appoinment_viewpopup()
	    {
	    	$id=$_POST['appoinmentdetailsval'];
		    $template['data'] = $this->Appoinment_model->view_appoinmentpopup($id);
		    $this->load->view('Appoinmentdetails/appoinment-popup-view',$template);
	    }

	  
}