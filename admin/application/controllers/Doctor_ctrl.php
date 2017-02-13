<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_ctrl extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Doctor_model');
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}

    }
	
	   public function view_doctordetails(){
		 
	  
			  $template['page'] = "Doctordetails/view-doctor-details";
			  $template['page_title'] = "Doctor Details";
			  $template['data'] = $this->Doctor_model->get_doctordetails();
			  $this->load->view('template',$template);
	  }
 
         //Add Doctor Information
     public function add_doctorformation()
	  {
		  $template['page'] = 'Doctordetails/add-doctor';
		  $template['page_title'] = 'Add Doctor';
		  $sessid=$this->session->userdata('logged_in');

		  
		  if($_POST)
		  {
			  
			   $data = $_POST;
					 if($data['type_selection'] == "individual")
			  {
				//unset($data['clinic_id']);
				//unset($data['hospital_id']);
				//unset($data['medical_id']);
				$data['clinic_id']=0;
				$data['hospital_id']=0;
				$data['medical_id']=0;
			  }
			 elseif ($data['type_selection'] == "clinic")
			  {
				//unset($data['hospital_id']);
				//unset($data['medical_id']);
				$data['hospital_id']=0;
				$data['medical_id']=0;
			  }
			   elseif ($this->input->post('type_selection') == "hospital")
			  {
				
				//unset($data['clinic_id']);
				//unset($data['medical_id']);
				$data['clinic_id']=0;
				$data['medical_id']=0;
			  }
			  elseif ($this->input->post('type_selection') == "medical"){
				//unset($data['clinic_id']);
				//unset($data['hospital_id']);
				$data['clinic_id']=0;
				$data['hospital_id']=0;
			  }
			  
			  
			 
			  
	
							
			$config = set_upload_options('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["display_image"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('display_image')) {
				$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
				
			}
			else 
			{
				
			$upload_data = $this->upload->data();
			$data['display_image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];	

			/* Save category details */
			$result = $this->Doctor_model->doctorinfo_add($data);
			if($result) {
				 //array_walk($data, "remove_html");
				/* Set success message */
				 $this->session->set_flashdata('message',array('message' => 'Add Doctor Information Details successfully','class' => 'success'));
				 redirect(base_url().'Doctor_Ctrl/view_doctordetails');
			}
			else {
				/* Set error message */
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
				 redirect(base_url().'Doctor_Ctrl/view_doctordetails');
				}
			}
				
		  }
			  //redirect(base_url().'Business_information/add_Businessinformation');
			  //$template['result'] = $this->Doctor_model->get_category();
			  
			     $template['Affiliationsdetails'] = $this->Doctor_model->get_affiliation();			  
				 $template['languagedetails'] = $this->Doctor_model->get_languag();			  
				 $template['countrydetails'] = $this->Doctor_model->get_country();			  			  
					//$template['statedetails'] = $this->Doctor_model->get_states();			  			  
					//$template['citydetails'] = $this->Doctor_model->get_cityval();	
                 $template['insurancedetails'] = $this->Doctor_model->get_insurance();							 
                 $template['docdegreedetails'] = $this->Doctor_model->get_docdegrees();							 
                 $template['specialtydetails'] = $this->Doctor_model->get_specialty();							 
                 $template['reasondetails'] = $this->Doctor_model->get_visiters();		

				  $template['clinic'] = $this->Doctor_model->get_clinic();	
				  $template['hospital'] = $this->Doctor_model->get_hospital();	
				  $template['medical'] = $this->Doctor_model->get_medical();	
					
				 $this->load->view('template',$template); 
				 
				 
			 // $template['countrydetails'] = $this->Borderpoint_model->get_busnamedetails();
			 // $template['results'] = $this->Borderpoint_model->get_busroutedetails($template['resulting'][0]->id);
			  //$this->load->view('template',$template);
		}
		
	  public function add_droppointdetailsget() { 
	  
	  
	          if($_POST){		  
			  $data = $_POST;
			  $id=$_POST['value'];
			  $template['data'] = $this->Doctor_model->get_statdetails($id);
			  $template['statedetails'] = '';
			  foreach( $template['data'] as $am)
			         {  
				        $template['statedetails'] .= '<option value="'.$am->id.'">'. $am->state_name.' </option>';
			         }							
					 echo $template['statedetails'];
					  //var_dump($template['statedetails']);
						//	die;
	          }
	  }
	  
	  
	   public function add_citydetailsget() { 
	  
	  
	          if($_POST){		  
			  $data = $_POST;
			  $id=$_POST['value'];
			  $template['data'] = $this->Doctor_model->get_citydetails($id);
			  $template['citydetails'] = '';
			  // var_dump($template['data']);
			//die;
			  foreach($template['data'] as $ams)
			         { 
				        $template['citydetails'] .= '<option value="'.$ams->id.'">'. $ams->city_name.' </option>';
						  //var_dump($template['citydetails']);
							//die;
			         }							
					 echo $template['citydetails'];
	          }
	  }
	  
	   public function Edit_countrydetailsget()
	  {
		  if($_POST){		  
			  $data = $_POST;
			  
			 // array_walk($data, "remove_html");
			  
			  $template['resultsget'] = $this->Doctor_model->get_countrypoint();
	  }
	  }
	 
	  
	  public function Edit_citiesdetailsget()
	  {
		   if($_POST){		  
			  $data = $_POST;
			  
			//  array_walk($data, "remove_html");
			  
			  $template['resultsget'] = $this->Doctor_model->get_citypoint();
	  }
	  }
	 
	public function edit_doctorformation(){
	  	  //edit Business Information	
		
		  $template['page'] = 'Doctordetails/edit-doctors';
		  $template['page_title'] = 'Edit Doctor';
		  
		  $id = $this->uri->segment(3); 
		  $template['id'] = $id;
		  $template['data'] = $this->Doctor_model->get_single_doctor($id);
		
		  if(!empty($template['data'])) {			
			  
		     if($_POST)
			 {
				 $data = $_POST;
				 
					 if($data['type_selection'] == "individual")
			  {
				  
				//unset($data['clinic_id']);
				//unset($data['hospital_id']);
				//unset($data['medical_id']);
				
				$data['clinic_id']=0;
				$data['hospital_id']=0;
				$data['medical_id']=0;
			  }
			 elseif ($data['type_selection'] == "clinic")
			  {
				//unset($data['hospital_id']);
				//unset($data['medical_id']);
				$data['hospital_id']=0;
				$data['medical_id']=0;
				
			  }
			   elseif ($this->input->post('type_selection') == "hospital")
			  {
				//unset($data['clinic_id']);
				//unset($data['medical_id']);
				$data['clinic_id']=0;
				$data['medical_id']=0;
			  }
			  elseif ($this->input->post('type_selection') == "medical"){
				//unset($data['clinic_id']);
				//unset($data['hospital_id']);
				$data['clinic_id']=0;
				$data['hospital_id'] =0; 
			  }
					
				
				
				if(!isset($data['terms']))	
				 {
					$data['terms']=disagree; 
				 }
				
		
			unset($data['submit']);

			if(isset($_FILES['display_image'])) 
			{  
			$config = set_doctor_image('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["display_image"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('display_image')) 
				{
					unset($data['display_image']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['display_image'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
					}
			}
			
				 //var_dump($data);
				 //die;
			  $result = $this->Doctor_model->doctorsinfo_edit($data, $id);
			  $this->session->set_flashdata('message',array('message' => 'Edit Doctor Information Updated successfully','class' => 'success'));
			  redirect(base_url('Doctor_Ctrl/view_doctordetails'));
			 
		  }
			  else
			  {
				  $template['Affiliationsdetails'] = $this->Doctor_model->get_affiliation();			  
				  $template['languagedetails'] = $this->Doctor_model->get_languag();			  
                  $template['countrydetails'] = $this->Doctor_model->get_country();			  			  
				  $template['statedetails'] = $this->Doctor_model->get_states($id);	
         
				  $template['citydetails'] = $this->Doctor_model->get_cityval($id);
				 
				  
				  $template['insurancedetails'] = $this->Doctor_model->get_insurance();
				  $template['docdegreedetails'] = $this->Doctor_model->get_docdegrees();	
                  $template['specialtydetails'] = $this->Doctor_model->get_specialty();
                  $template['reasondetails'] = $this->Doctor_model->get_visiters();	

				  $template['clinic'] = $this->Doctor_model->get_clinic();	
				  $template['hospital'] = $this->Doctor_model->get_hospital();	
				  $template['medical'] = $this->Doctor_model->get_medical();
				  
				  $this->load->view('template',$template); 
			  }	 
			  //$this->load->view('template',$template);
		      }
		  else{
			 		 		 
			  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));		
              redirect(base_url().'Doctor_Ctrl/view_doctordetails');			  
	}
 }

         public function delete_doctor(){
			      
		  $id = $this->uri->segment(3);
		  $result= $this->Doctor_model->doctors_delete($id);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	      redirect(base_url().'Doctor_Ctrl/view_doctordetails');
	    }
		
		
		public function doctor_status(){
		 
				  $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Doctor_model->update_doctor_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Doctor Successfully Disabled','class' => 'warning'));
				  redirect(base_url().'Doctor_Ctrl/view_doctordetails');
	    }

		public function doctor_active(){
		 
				  $data1 = array(
				  "status" => '1'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Doctor_model->update_doctor_status($id, $data1);
				  $this->session->set_flashdata('message', array('message' => 'Doctor Successfully Enabled','class' => 'success'));
				  redirect(base_url().'Doctor_Ctrl/view_doctordetails');
	    }


	    public function doctor_viewpopup()
	    {
	    	$id=$_POST['doctordetailsval'];
			
			$template['res'] = $this->Doctor_model->get_parent($id);
			//var_dump($template['res']);
			//die;
		    $template['data'] = $this->Doctor_model->view_popup_doctor($id);
			//var_dump($template['data']);
			//die;
		    $this->load->view('Doctordetails/doctor-popup-view',$template);
	    }
		
		
		
		 //pop up map
      public function map_view(){
		 
		 $id=$_POST['mapdetails'];

		 $map = $this->Doctor_model->get_map($id);

		 if($map=='Novalue')
		 {
			$template['map']="";
			$this->load->view('Doctordetails/popup-mapdetails',$template);
		 }
		 else
		 {
			$template['map']=$map;
			$this->load->view('Doctordetails/popup-mapdetails',$template); 
		 }
		 
	}
	
	
		 public function add_gallery() {
				   
				   $template['page'] = "Doctordetails/doctor-gallery";
			       $template['page_title'] = "Doctor Gallery";
					 
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
				  
				  $config = set_doctor_gallery('assets/uploads/img');
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
			
			
				   $result = $this->Doctor_model->Gallery_add($data);
				  
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
				  $template['doctorresult'] = $this->Doctor_model->get_gallerydetails();
				  
				  $template['data'] = $this->Doctor_model->getdoctor_gallery();
		          $this->load->view('template',$template);
	 }
	 
	 
	     	public function view_doctorgallery() {
		
					$id = $this->uri->segment(3);
					$template['page'] = "Doctordetails/view-doctor-gallery";
					$template['page_title'] = "View Gallery";
					$template['data'] = $this->Doctor_model->get_doctors_gallery($id);
					//var_dump($template['data']);
		            //exit();
					if(!empty($template['data'])) {
					$this->load->view('template',$template);
					}
						
					else {
						$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
							redirect(base_url().'Doctor_ctrl/add_gallery');
        	  }
	     	}
			
			
		 public function delete_gallery_image() {
			 
					$id = $_POST['id'];
					$result = $this->Doctor_model->delete_gallery_images($id);
					return  $result;
	     }
		 
		      public function addworking_time(){
			  /*$template['page'] = "Doctordetails/doctor-timeadd";
			  $template['page_title'] = "Doctor Working Time";
			  $template['data'] = $this->Doctor_model->get_doctortiming();
			  $template['days'] = array('mon','tue','wed','thu','fri','sat','sun');
		      $template['Days'] = array('Monday','Thuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
			  $this->load->view('template',$template);*/
			  $template['page'] = "Doctordetails/doctor-timeadd";
			  $template['page_title'] = "Doctor Working Time";	

              $template['days'] = array('mon','tue','wed','thu','fri','sat','sun');
		      $template['Days'] = array('Monday','Thuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
			  //$this->load->view('template',$template);			  
			  
		         if($_POST){
			     $data = $_POST;
				
				$result = $this->Doctor_model->update_worktime($data);
			    if($result)
				 {
					  $this->session->set_flashdata('message',array('message' => 'Add Doctor WorkingTime Details successfully','class' => 'success'));
				 }
				 else
				 {
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
				 }	
			 
			
	             }
		         $this->load->view('template',$template);  
                 }
				 
	     public function addbreak_time()
		 {
			  $template['page'] = "Doctordetails/doctor-timeadd";
			  $template['page_title'] = "Doctor Working Time";	

              $template['days'] = array('mon','tue','wed','thu','fri','sat','sun');
		      $template['Days'] = array('Monday','Thuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
			  $this->load->view('template',$template);			  
			  
		         if($_POST){
			     $data = $_POST;
				
				$result = $this->Doctor_model->doctorsbreaktime_add($data);
			    if($result)
				 {
					  $this->session->set_flashdata('message',array('message' => 'Add Doctor BreakTime Details successfully','class' => 'success'));
				 }
				 else
				 {
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
				 }	
			 
			
	             }
		         $this->load->view('template',$template);  
                 
		 }
	
		/* public function add_worktime($id){
			 
			  $template['page'] = "Doctordetails/doctor-timeadd";
			  $template['page_title'] = "Doctor Working Time"; 
			  
			 	 if(!isset($id)){
			     $this->session->set_flashdata('msg',false);
			     redirect(base_url().'Doctor_Ctrl/addworking_time');
		    }else{
			     $work_time['working_time'] = json_encode($_POST['work']);
			     if($this->doctor_model->update_worktime(base64_decode($id),$work_time)){
				 $this->session->set_flashdata('msg',true);
				 redirect(base_url().'Doctor_Ctrl/addworking_time');
			}else{
				$this->session->set_flashdata('msg',false);
				redirect(base_url().'Doctor_Ctrl/addworking_time');
			    }
		     }
	
		 }*/
		 
		 public function update_worktime(){
			 
			  $template['page'] = "Doctordetails/working-timeadd";
			  $template['page_title'] = "Doctor Working Time"; 
			  
			 	 if(!isset($id)){
			     $this->session->set_flashdata('msg',false);
			     redirect(base_url().'Doctor_Ctrl/addworking_time');
		    }else{
			     $work_time['working_time'] = json_encode($_POST['work']);
			     if($this->Doctor_model->update_worktime(base64_decode($id),$work_time)){
				 $this->session->set_flashdata('msg',true);
				 redirect(base_url().'Doctor_Ctrl/addworking_time');
			}else{
				$this->session->set_flashdata('msg',false);
				redirect(base_url().'Doctor_Ctrl/addworking_time');
			    }
		     }
	
		 }

		 public function edit_doctorworking($id){
	
	  
		          $template['page'] = 'Doctordetails/working-timeadd';
				  $template['page_title'] = 'Edit Doctor';
				  
				  $id = $this->uri->segment(3); 
				  $template['id'] = $id;
				  $template['data'] = $this->Doctor_model->get_singleid($id);
				  $template['days'] = array('mon','tue','wed','thu','fri','sat','sun');
		          $template['Days'] = array('Monday','Thuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
				  if(!empty($template['data'])) {			
			  
			  	  
			  
			  
		        if($_POST){
					//print_r($_POST);
	                  //die;
			   // $work_time = $_POST;
				$work_time['working_time'] = json_encode($_POST['work']);
					
					  $result = $this->Doctor_model->doctorsinfo_edits($work_time, $id);
					  $this->session->set_flashdata('message',array('message' => 'Edit Doctor WorkingTime Updated successfully','class' => 'success'));
					  redirect(base_url('Doctor_Ctrl/view_doctordetails'));
					  }
	
					  {				  
					  $this->load->view('template',$template); 
					  }	 
					  //$this->load->view('template',$template);
					  }
				  else{	 		 
						  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));		
						  redirect(base_url().'Doctor_Ctrl/view_doctordetails');			  
					  }

	
		 }
		 
		 public function edit_doctorbreaketime($id)
		 {
			     //print_r($_POST);
				 //die;
				 $template['page'] = 'Doctordetails/working-timeadd';
				  $template['page_title'] = 'Edit Doctor';
				  
				  $id = $this->uri->segment(3); 
				  $template['id'] = $id;
				  $template['data'] = $this->Doctor_model->get_singlebreakid($id);
				  //var_dump($template['data']);
				  //die;
			      $break_time=array();
			      $days = array('mon','tue','wed','thu','fri','sat','sun');
				 
			     	
		        if($_POST)
			{
				
					 foreach ($days as $key => $value) 
				{
				  
				  if(isset($_POST['break'][$value]))
				  {
				  foreach ($_POST['break'][$value]['start'] as $key => $br_value)
					{
					$break_time[$value][] = array('start'=>$br_value,'end'=>$_POST['break'][$value]['end'][$key]);
					}
				  } 
				  else
				  {
					  $break_time[$value][] = array('start'=>'','end'=>'');
				  }
				}
				$breake_timeing['break_time'] = json_encode($break_time);
					
					  $result = $this->Doctor_model->doctorbreaktime_edits($breake_timeing, $id);
					  $this->session->set_flashdata('message',array('message' => 'Edit Doctor Break Updated successfully','class' => 'success'));
					  redirect(base_url('Doctor_Ctrl/view_doctordetails'));
			}
				  else
				     {	 
                          $this->load->view('template',$template); 			  
						  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));		
						  redirect(base_url().'Doctor_Ctrl/view_doctordetails');			  
					  }
					  
					  

	
		 }
		 
		 public function add_vacationtime($id)
		 {
			      $template['page'] = 'Doctordetails/working-timeadd';
				  $template['page_title'] = 'Edit Doctor';
				  
				  $id = $this->uri->segment(3); 
				  $template['id'] = $id;
				  $template['data'] = $this->Doctor_model->get_singleid($id);
				  $work_time['vacation_time'] =array();
			      foreach ($_POST['startdate'] as $key => $value) {			 
				  $work_time['vacation_time'][] = array('startdate'=>$value,'enddate'=>$_POST['enddate'][$key]);
		    	}
				
			//	$work_time['vacation_time'] = json_encode($work_time['vacation_time']);
			//if($this->doctor_model->update_vacationtime(base64_decode($id),$work_time)){
				
		        if($_POST){
				$work_time['vacation_time'] = json_encode($work_time['vacation_time']);
					
					  $result = $this->Doctor_model->doctorsinfo_edits($work_time, $id);
					  $this->session->set_flashdata('message',array('message' => 'Edit Doctor VactionTime Updated successfully','class' => 'success'));
					  redirect(base_url('Doctor_Ctrl/view_doctordetails'));
					  }
				  else{	 	
                          $this->load->view('template',$template); 				  
						  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));		
						  redirect(base_url().'Doctor_Ctrl/view_doctordetails');			  
					  }
		 }
		 
		 
		public function loadData($loadId = '', $loadType = '')
		{
		
		$loadType=$_POST['loadType'];
		$loadId=$_POST['loadId'];

		$result=$this->Doctor_model->getData($loadType,$loadId);
		
		$HTML="";
		
		if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->id."'>".$list->name."</option>";
			}
		}
		echo $HTML;
	}
		 
			
			
				 
			 
	          
		 
		 
     
}
?>