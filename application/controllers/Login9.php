<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*---------Naviagation Menu-----------*/

class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		check_installer();
		$this->load->helper('url','form');
		$this->load->model('Login_Model');		
 	}
	
	public function presignup(){
			$template['page'] = "Presignup";
			$template['page_title'] = "Select Signup Page";
			$template['data'] = "Select Signup  page";
			$this->load->view('template', $template);			
		}
		
		public function patient(){
			if (isset($_POST))
			{
				$data = $_POST;			
				$this->load->library('form_validation');
				$data['password'] = md5($this->input->post('password'));
				$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExistDoctor'); 
			if ($this->form_validation->run() == TRUE)
					{		
				$this->Login_Model->Insert_patient($data);				  
				$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please Signin to view your account','class' => 'success'));						
					}
					else{
					$this->session->set_flashdata('You have Entered Wrong Information',array('message' => 'Error','class' => 'danger'));	
					}
			}
			$template['page'] = "patientsignup";
			$template['page_title'] = "Patient Signup Page";
			$template['data'] = "Patient Signup  page";
			$this->load->view('template', $template);
		}
						
		public function doctor(){
			if (isset($_POST) & !empty($_POST))
			{
				$data = $_POST;			
			if($data['type'] == 'doctor'){			
				$this->load->library('form_validation');
				$data['password'] = md5($this->input->post('password'));	
				$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExistDoctor'); 
		if ($this->form_validation->run() == FALSE)
				{	
				//$this->session->set_flashdata('message',array('message' => 'You have Entered Wrong Information','class' => 'danger'));	
				}else{
					unset ($data['type']);
					unset ($data['health_provider']);
					$data['trial_date'] = date("Y-m-d", strtotime("+15 days"));
					$this->Login_Model->Insert_doctor($data);				  
					$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please Signin to view your account','class' => 'success'));								
				}				
			}elseif($data['type'] == 'clinic'){				
			$this->load->library('form_validation');
			$data['password'] = md5($this->input->post('password'));	
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExistDoctor'); 
		if ($this->form_validation->run() == FALSE)
				{	
				//$this->session->set_flashdata('message',array('message' => 'You have Entered Wrong Information','class' => 'danger'));	
				}else{
					unset ($data['type']);
					unset ($data['doctor_firstname']);
					unset ($data['doctor_lastname']);
					unset ($data['doctor_sex']);
					$data['clinic_name'] = $data['health_provider'];
					$data['clinic_zip'] = $data['doctor_office_zip'];
					unset ($data['health_provider']);
					unset ($data['doctor_office_zip']);
					$data['trial_date'] = date("Y-m-d", strtotime("+15 days"));
					$this->Login_Model->Insert_clinic($data);				  
					$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please Signin to view your account','class' => 'success'));								
				}				
			}elseif($data['type'] == 'hospital'){				
					$this->load->library('form_validation');
					$data['password'] = md5($this->input->post('password'));	
					$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExistDoctor'); 
				if ($this->form_validation->run() == FALSE)
				{	
				//$this->session->set_flashdata('message',array('message' => 'You have Entered Wrong Information','class' => 'danger'));	
				}else{
					unset ($data['type']);
					unset ($data['doctor_firstname']);
					unset ($data['doctor_lastname']);
					unset ($data['doctor_sex']);
					$data['hospital_name'] = $data['health_provider'];
					$data['hospital_zip'] = $data['doctor_office_zip'];
					unset ($data['health_provider']);
					unset ($data['doctor_office_zip']);
					$data['trial_date'] = date("Y-m-d", strtotime("+15 days"));
					$this->Login_Model->Insert_hospital($data);				  
					$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please Signin to view your account','class' => 'success'));								
				}				
			}elseif($data['type'] == 'medical'){				
					$this->load->library('form_validation');
					$data['password'] = md5($this->input->post('password'));	
					$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExistDoctor'); 
			if ($this->form_validation->run() == FALSE)
				{	
				//$this->session->set_flashdata('message',array('message' => 'You have Entered Wrong Information','class' => 'danger'));	
				}else{
					unset ($data['type']);
					unset ($data['doctor_firstname']);
					unset ($data['doctor_lastname']);
					unset ($data['doctor_sex']);
					$data['medical_name'] = $data['health_provider'];
					$data['medical_zip'] = $data['doctor_office_zip'];
					unset ($data['health_provider']);
					unset ($data['doctor_office_zip']);
					$data['trial_date'] = date("Y-m-d", strtotime("+15 days"));
					$this->Login_Model->Insert_medical($data);				  
					$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please Signin to view your account','class' => 'success'));								
				}				
			}else{
				redirect(base_url()+"Login\doctor");
				$this->session->set_flashdata('message',array('message' => 'You have Entered Wrong Information','class' => 'danger'));								
			}								   				
			}			
			$template['page'] = "doctorsignup";
			$template['page_title'] = "Doctor Signup Page";
			$template['data'] = "Doctor Signup  page";
			$template['practices'] =$this->Login_Model->get_practices();
			$this->load->view('template', $template);
		}
		
	public function isEmailExistDoctor($email) {
		$this->load->library('form_validation');
		$this->load->model('Login_Model');
		$doctor_exist = $this->Login_Model->isEmailExistDoctor($email);	
    if ($doctor_exist) {
		$this->session->set_flashdata('message',array('message' => 'Email  is already exist ','class' => 'danger'));          
        return false;
		}else {
			return true;
		}	
	}

    public function signin()
		{		
		if (isset($_POST))
			{
			$this->load->library('form_validation');		
			$this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');
			if ($this->form_validation->run() == TRUE)
				{					
				echo "loggedIn";
				}else{
					echo "No";								
				}
			}      		
		}

	public function check_database($password)
		{
			$email = $this->input->post('email');
			$result = $this->Login_Model->Role_login($email, md5($password));
			if ($result)
				{
			$sess_array = array();
			$sess_array = array(
								'id' => $result->id,
								'username' => $result->username,
								'profile_status' => $result->profile_status,
								'features_status' => $result->features_status,
								'gallery_status' => $result->gallery_status,
								'trial_date' => $result->trial_date,
								'end_date' => $result->end_date
							);
			$this->session->set_userdata('super_person', $result->super_person);
			$this->session->set_userdata('frontend_logged_in', $sess_array);
			return TRUE;
				}
				else
				{
				$this->form_validation->set_message('check_database', 'You cannot access.contact administrator');
				return false;
				}
		}
		
		public function Forget_Password()
		{
			$template['page_title'] ="Book Mydoc"; 
			$template['page'] ='Homepage';
			$request = file_get_contents("php://input");
			$data = json_decode($request);
			if (isset($_POST))
			{
				$data = $_POST;				
				$email = $this->input->post('email');		  
				$result=$this->Login_Model->forgetpassword($email);                      
				if($result=="EmailSend")
				{
					echo "loggedIn";			   
				}
				else if($result=="EmailNotExist")
				{               
					echo "No";
				} 
			}
			else
			{
           $this->load->view('template',$template);
			}		
		}
		
		
		
}
?>