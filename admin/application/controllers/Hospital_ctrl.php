<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_ctrl extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Hospital_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}

    }
	
	
	public function view_hospitals()
	{
		$template['page'] = "Hospitaldetails/view-hospitaldetails";
		$template['page_title'] = "View Hospital";
		$template['data'] = $this->Hospital_model->get_hospitaldetails();
	    $this->load->view('template',$template);
	}
	
	
	
	   public function add_hospitaldetails()
	  {
		  
		  $template['page'] = "Hospitaldetails/add-hospital";
		  
		  $template['page_title'] = "Add Hospital";
		  $sessid=$this->session->userdata('logged_in');

		  
		  if(isset($_POST) & !empty($_POST))
		{	
			 
			  $data = $_POST;
			
				 if($data['type_selection'] == "individual")
			  {
				//unset($data['parent_id']);
				$data['parent_id']=0;
				
			  }
			 		
			$config = set_hospital_image('assets/uploads/hospital');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["display_image"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('display_image')) {
				//$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred while uploading files. Please try again', 'title' => 'Error !', 'class' => 'danger'));
				$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
				
			}
			else 
			{
				
			$upload_data = $this->upload->data();
			$data['display_image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];	

			
				
					
				$result = $this->Hospital_model->hospitaldetails_add($data);
				
			if($result) {
				
				 $this->session->set_flashdata('message',array('message' => 'Add Hospital Information Details successfully','class' => 'success'));
				 redirect(base_url().'Hospital_ctrl/view_hospitals');
			}
			else {
				/* Set error message */
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
				 redirect(base_url().'Hospital_ctrl/view_hospitals');
			}
			}
			  
		
		    
			 
				  
				 
		}
				$template['hospitaldetails'] = $this->Hospital_model->get_hosvisitaion();	
				  $template['hospitalinsurancevalues'] = $this->Hospital_model->get_insurancehosp();	
				  $template['specialtyvaleshospital'] = $this->Hospital_model->get_specialtyhosp();	
				  $template['hospitallanguagedetails'] = $this->Hospital_model->get_languagehosp();

			  
				  $template['hospitalcountrydetails'] = $this->Hospital_model->get_countryhosp();	
				 // $template['hospitalstatedetails'] = $this->Hospital_model->get_satehosp();	
				  //$template['hospitalcitydetailsval'] = $this->Hospital_model->get_cityhosp();

                  $template['hosamenitiesdetails'] = $this->Hospital_model->gethospital_amenities();
		          $template['affiliatehospitals'] = $this->Hospital_model->gethospital_affiliateds();			  
				  $template['hospital'] = $this->Hospital_model->get_hospital();
				  $this->load->view('template',$template); 
		  
		}
		
		public function get_hospitaldetailsstate()
		{
			  if($_POST){		  
			  $data = $_POST;
			  
			  //array_walk($data, "remove_html");
			  
			  $id=$_POST['value'];
			  $result = $this->Hospital_model->get_hospitalstatdetails($id);
			  $template['hospitalstatedetails'] = '';
			  
			  foreach($result as $am)
			         {  //echo $am['foodname'];
				        $template['hospitalstatedetails'] .= '<option value="'.$am->id.'">'. $am->state_name.' </option>';
			         }							
					 echo $template['hospitalstatedetails'];
	          }
		}
		
		public function add_mhospitalcitydetails() { 
	  
	  
	          if($_POST){		  
			  $data = $_POST;
			  
			  //array_walk($data, "remove_html");
			  
			  $id=$_POST['value'];
			  $result = $this->Hospital_model->get_hospitalcitydetails($id);
			  $template['hospitalcitydetailsval'] = '';
			  
			  foreach($result as $ams)
			         {  //echo $am['foodname'];
				        $template['hospitalcitydetailsval'] .= '<option value="'.$ams->id.'">'. $ams->city_name.' </option>';
			         }							
					 echo $template['hospitalcitydetailsval'];
	          }
	  }
	  
	  
	  
	    public function edit_hospitalvalues(){
		
		  $template['page'] = "Hospitaldetails/edit-hospital";
		  $template['page_title'] = "Edit Hospital";
		  $sessid=$this->session->userdata('logged_in');
		  
		  $id = $this->uri->segment(3); 
		  $template['data'] = $this->Hospital_model->get_single_hospital($id);
		  if(!empty($template['data'])) {			
			  
		     if($_POST){
				  $data = $_POST;
			if($data['type_selection'] == "individual")
			  {
				 // unset($data['parent_id']);
				
				$data['parent_id']=0;
				
			  }
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
			    //$data = $_POST;
				
				
				  if(!isset($data['terms']))	
				 {
					$data['terms']=disagree; 
				 }
				
		
			unset($data['submit']);

			if(isset($_FILES['display_image'])) {  
			$config = edit_hospital_image('assets/uploads/hospital');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["display_image"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('display_image')) {
					unset($data['display_image']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['display_image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
			
			  
			  $result = $this->Hospital_model->hospitaldetails_edit($data, $id);
			  $this->session->set_flashdata('message',array('message' => 'Edit Hospital Details Updated successfully','class' => 'success'));
			  redirect(base_url().'Hospital_ctrl/view_hospitals');
			 
		  }
			  else
			  {
				      $template['hospitaldetails'] = $this->Hospital_model->get_hosvisitaion();	
					  $template['hospitalinsurancevalues'] = $this->Hospital_model->get_insurancehosp();	
					  $template['specialtyvaleshospital'] = $this->Hospital_model->get_specialtyhosp();	
					  $template['hospitallanguagedetails'] = $this->Hospital_model->get_languagehosp();

					  
					  $template['hospitalcountrydetails'] = $this->Hospital_model->get_countryhosp();	
					  $template['hospitalstatedetails'] = $this->Hospital_model->get_satehosp($id);	
					  $template['hospitalcitydetailsval'] = $this->Hospital_model->get_cityhosp($id);	
				      $template['hosamenitiesdetails'] = $this->Hospital_model->gethospital_amenities();
		              $template['affiliatehospitals'] = $this->Hospital_model->gethospital_affiliateds();
					  $template['hospital'] = $this->Hospital_model->get_hospital();					  
				      $this->load->view('template',$template); 
			  }	 
		      }
		  else{
			 		 		 
			  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));		
              redirect(base_url().'Hospital_ctrl/view_hospitals');	  
	}
 }
 
        public function delete_hospital(){
			      
		  $id = $this->uri->segment(3);
		  $result= $this->Hospital_model->hospital_delete($id);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	      redirect(base_url().'Hospital_ctrl/view_hospitals');
		  
	    }
		
		public function hospital_status(){
		 
				  $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Hospital_model->update_hospital_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Hospital Disable','class' => 'warning'));
				  redirect(base_url().'Hospital_ctrl/view_hospitals');
	    }

		public function hospital_active(){
		 
				  $data1 = array(
				  "status" => '1'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Hospital_model->update_hospital_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Hospital Enable Successfully','class' => 'success'));
				  redirect(base_url().'Hospital_ctrl/view_hospitals');
	    }
		
		public function hospital_viewpopup()
		{
			$id=$_POST['hospitaldetailsval'];
			
			$template['res']= $this->Hospital_model->get_parenthos($id);
			
			$template['data'] = $this->Hospital_model->view_popup_hospital($id);
		
			$this->load->view('Hospitaldetails/hospital-popup-view',$template);
		}

	    public function add_hospitalgallery()
		{  
			       $template['page'] = "Hospitaldetails/hospital-gallery";
			       $template['page_title'] = "Hospital Gallery";
					 
                   $userdetails=$this->session->userdata('logged_in');
				   $userid=$userdetails['id'];				   
				   
		   
				  if($_POST) {				  
				  $data = $_POST;
				  
                  $data['user_id']=$userid;	
                       //$data['user_id'] = $this->session->userdata('logged_in_admin')['id'];

                                        $files = $_FILES;
										$cpt = count($_FILES['image']['name']);
										
										for($i=0; $i<$cpt; $i++) {           
											
											$_FILES['image']['name']= $data['user_id']."-".$files['image']['name'][$i];
											$_FILES['image']['type']= $files['image']['type'][$i];
											$_FILES['image']['tmp_name']= $files['image']['tmp_name'][$i];
											$_FILES['image']['error']= $files['image']['error'][$i];
											$_FILES['image']['size']= $files['image']['size'][$i];				  
				  
				  $config = set_hospital_gallery('assets/uploads/img');
			      $this->load->library('upload');
			
			      $new_name = time()."_".$_FILES["image"]['name'];
			      $config['file_name'] = $new_name;

				  $this->upload->initialize($config);

				  if ( ! $this->upload->do_upload('image')) {
					//$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred while uploading files. Please try again', 'title' => 'Error !', 'class' => 'danger'));
					$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
					
				  }
				  else {
					
				  $upload_data = $this->upload->data();
				  $data['image'] = base_url().$config['upload_path']."/".$upload_data['file_name']; 
			
			
				   $result = $this->Hospital_model->hospitalgallery_add($data);
				  
		          if($result) {
				/* Set success message */
				  $this->session->set_flashdata('message',array('message' => 'Add Gallery Details successfully','class' => 'success'));
			      }
			      else 
				  {
				/* Set error message */
				  $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
                  }
				  }	
				  }
				  }				  
				  $template['hospitalresult'] = $this->Hospital_model->gethospital_gallerydetails();
				  
				  $template['data'] = $this->Hospital_model->gethospital_gallery();
		          $this->load->view('template',$template);
		}
		
		
		    public function view_hospitalgallery() {
		
					$id = $this->uri->segment(3);
					$template['page'] = "Hospitaldetails/view-hospital-gallery";
					$template['page_title'] = "View Gallery";
					$template['data'] = $this->Hospital_model->get_hospitals_gallery($id);
					//var_dump($template['data']);
		            //exit();
					if(!empty($template['data'])) {
					$this->load->view('template',$template);
					}
						
					else {
						$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
							redirect(base_url().'Hospital_ctrl/add_hospitalgallery');
        	  }
	     	}
			
			function delete_hospitalgallery()
			{
				
					$id = $_POST['id'];
					$result = $this->Hospital_model->hospitalgallery_delete($id);
					return  $result;
			}
}