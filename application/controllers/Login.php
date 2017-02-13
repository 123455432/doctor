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
	
	public function presignup()
	{
			$template['page'] = "Presignup";
			$template['page_title'] = "Select Signup Page";
			$template['data'] = "Select Signup  page";
			$this->load->view('template', $template);			
	}
		  function send_confirmation($email,$password,$fname) 
		  {
      $this->load->library('email');  	//load email library
      $this->email->from('admin@mysite.com', 'Bookmydoc'); //sender's email
      $address = $email;	//receiver's email
      $subject="Welcome to MySite!";	//subject
      $message= /*-----------email body starts-----------*/
        'Thanks for signing up, '.$fname.'!
      
        Your account has been created. 
        Here are your login details.
        -------------------------------------------------
        Email   : ' . $email . '
        Password: ' . $password . '
        -------------------------------------------------
                        
        
            
        ';
		/*-----------email body ends-----------*/		      
      $this->email->to($address);
      $this->email->subject($subject);
      $this->email->message($message);
      $this->email->send();
    }
		
		public function patient()
		{
		
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
			
				if(@$this->session->userdata['loginstatus'] == 1)
		   {
			   /* echo @$this->session->userdata['loginstatus'];
			   die; */
			   
		   }
	       else
		   {
			   if(isset($_GET['fblogin']))
			   {
			   $template['authUrl'] = $this->patientfblogin();
			   
			   }
			   
			   if(isset($_GET['gmaillogin']))
			   {
			   $template['authUrlg'] = $this->patientgmaillogin();
			   }
			   
		   }
			
			$template['page'] = "patientsignup";
			$template['page_title'] = "Patient Signup Page";
			$template['data'] = "Patient Signup  page";
			$this->load->view('template', $template);
		}
						
		public function doctor()
		{
			
			
		   if(@$this->session->userdata['loginstatus2'] == 1)
		   {
			   /* echo @$this->session->userdata['loginstatus'];
			   die; */
			   
		   }
	       else
		   {
			   $template['authurl'] = $this->doctorfblogin();
			   $template['authurlg'] = $this->doctorgmaillogin();
		   }
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
            //$template['authurlg'] = $data['authUrlg'];			
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

		
		
		
		public function patientfblogin()
		{
		include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";
		$appId = '831054440365912';
		$appSecret = 'a6708d36e6673ca09f647882c147da1d';
		$redirectUrl = base_url().'/Login/patient';
		$fbPermissions = 'email';
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
        if (!empty($fbuser)){
			$userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
			$userData['status'] = 1;
			$userData['patient_firstname'] = $userProfile['first_name'];
            $userData['patient_lastname'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
			$userData['patient_sex'] = $userProfile['gender'];
			$password = time().'doc';
			$userData['password'] = md5($password);
			$userData['terms'] = 'agreed';
			//$userData['email'] ="dev@gmail.com";
			$userData['phone'] = time();
		    $statuss = $this->isEmailExistDoctor($userData['email']);
			
			if($statuss == 1)
			{
			$status = $this->Login_Model->Insert_patient($userData);
			$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please check your email for username and password','class' => 'success'));	
			$this->send_confirmation($userData['email'],$password,$userData['patient_firstname']);
			$this->session->set_userdata('loginstatus',1);
			return $data['authUrl'] = '';
				
			}	
		    else
			{
			$this->session->set_flashdata('message',array('message' => 'Email already exist','class' => 'danger'));	
			
			$this->session->set_userdata('loginstatus',2);
			
			$fbuser = '';
           // return $template['authUrl']= $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
		
			}
		}else{
			$fbuser = '';
            $template['authUrl']= $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
			redirect($template['authUrl']);

			}
			
		}
		
		public function patientgmaillogin()
		{
			
			include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
			include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		    $clientId = '958907087082-jl153272ssbdu7cja8hvl4d1nvpo4jmc.apps.googleusercontent.com';
            $clientSecret = 'ub0Jh_BHLGxOuUzive7jw7L_';
            $redirectUrl = base_url() . 'Login/patient';
			$gClient = new Google_Client();
            $gClient->setApplicationName('Login to codexworld.com');
            $gClient->setClientId($clientId);
            $gClient->setClientSecret($clientSecret);
            $gClient->setRedirectUri($redirectUrl);
            $google_oauthV2 = new Google_Oauth2Service($gClient);
			

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
			    //$client->authenticate($_GET['code']);
				$this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
		
		//die("369");
        if (!empty($token)) {
			//die("371");
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
			
			
			$userData['status'] = 1;
			$userData['patient_firstname'] = $userProfile['given_name'];
            $userData['patient_lastname'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
			$userData['patient_sex'] = $userProfile['gender'];
			$password = time().'doc';
			$userData['password'] = md5($password);
			$userData['terms'] = 'agreed';
			$userData['phone'] = time();
			$this->Login_Model->Insert_patient($userData);
			$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please check your email for username and password','class' => 'success'));	
			$this->send_confirmation($userData['email'],$password,$userData['patient_firstname']);
			$this->session->set_userdata('loginstatus',1);
			return $data['authUrlg'] = '';
        } else {
           $data['authUrlg'] = $gClient->createAuthUrl();
		   redirect($data['authUrlg']);
        }

			
		}
		
				public function doctorfblogin()
		{
		include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";
		$appId = '831054440365912';
		$appSecret = 'a6708d36e6673ca09f647882c147da1d';
		$redirectUrl = base_url().'/Login/doctor';
		$fbPermissions = 'email';
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
        if (!empty($fbuser)){
			$userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
			$userData['status'] = 1;
			$userData['doctor_firstname'] = $userProfile['first_name'];
            $userData['doctor_lastname'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
			$userData['doctor_sex'] = $userProfile['gender'];
			//$password = 'admin123';
			$password = time().'doc';
			$userData['password'] = md5($password);
			$userData['terms'] = 'agreed';
			$this->Login_Model->Insert_doctor($userData);
			$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please check your email for username and password','class' => 'success'));	
			$this->send_confirmation($userData['email'],$password,$userData['doctor_firstname']);
			$this->session->set_userdata('loginstatus2',1);
			return $data['authUrl'] = '';
		}else{
			$fbuser = '';
            return $template['authUrl']= $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));

			}
			
		}
		
		public function doctorgmaillogin()
		{
			include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
			include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		    $clientId = '958907087082-jl153272ssbdu7cja8hvl4d1nvpo4jmc.apps.googleusercontent.com';
            $clientSecret = 'ub0Jh_BHLGxOuUzive7jw7L_';
            $redirectUrl = base_url() . 'Login/doctor';
			$gClient = new Google_Client();
            $gClient->setApplicationName('Login to codexworld.com');
            $gClient->setClientId($clientId);
            $gClient->setClientSecret($clientSecret);
            $gClient->setRedirectUri($redirectUrl);
            $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
		
		//die("369");
        if (!empty($token)) {
			//die("371");
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
			
			
			$userData['status'] = 1;
			$userData['doctor_firstname'] = $userProfile['given_name'];
            $userData['doctor_lastname'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
			$userData['doctor_sex'] = $userProfile['gender'];
			//$password = 'admin123';
			 $password = time().'doc';
			$userData['password'] = md5($password);
			$userData['terms'] = 'agreed';
			 $this->Login_Model->Insert_doctor($userData);
			
			$this->session->set_flashdata('message',array('message' => 'Successfully Enrolled.Please check your email for username and password','class' => 'success'));	
			$this->send_confirmation($userData['email'],$password,$userData['doctor_firstname']);
			$this->session->set_userdata('loginstatus2',1);
			return $data['authUrlg'] = '';
        } else {
           return $data['authUrlg'] = $gClient->createAuthUrl();
        }

			
		}
				
		public function Forget_Password()
		{
			$template['page_title'] ="Book Mydoc"; 
			$template['page'] ='Homepage';
			/* $request = file_get_contents("php://input");
			$data = json_decode($request); */
			if (isset($_POST))
			{
				$data = $_POST;				
				$email = $this->input->post('email');		  
				$result=$this->Login_Model->forgetpassword($email);
				
				$this->sendotp($result->phone,$result->tables,$result->email,$result->id);
			}
			else
			{
           $this->load->view('template',$template);
			}		
		}
		
		/* otp functionality start */
		 public function sendotp($phone,$usertype,$email,$id)
		 {
	        $this->load->library('email');
            $this->email->from('bookmydoc', 'My Site'); //sender's email
            $address = $email;	//receiver's email
			$link = base_url();
			$link = $link.'Login/getotp/?id='.$id.'&type='.$usertype;
            $subject="forget password!";	//subject
            $message= /*-----------email body starts-----------*/
                      'Thanks for contact us!
      
                       please click below link to reset password. 
 
                   -------------------------------------------------
                    link   : ' . $link . '
                   
                    -------------------------------------------------';
		/*-----------email body ends-----------*/		      
           $this->email->to($address);
           $this->email->subject($subject);
           $this->email->message($message);
           $this->email->send();
            echo 'loggedIn';		   
			 
		 }
		
		public function getotp()
		{
			$id = $_REQUEST['id'];
			$user = $_REQUEST['type'];
			$this->db->select('phone');
            $this->db->from($user);
            $this->db->where('id',$id);
			$data =  $this->db->get()->row()->phone;
			
			$otp = time();
			$this->sendsms($data);
			$datas['type'] = $user;
			$datas['id'] = $id;
			$datas['otp'] = $otp;
			
			$this->db->insert('otptable', $datas);
			
			$template['page'] = "otp";
			$template['page_title'] = "Enter otp";
			$template['data'] = "Enter otp";
			$template['id'] = $id;
			$template['type'] = $user;
			//$template['practices'] =$this->Login_Model->get_practices();
			$this->load->view('template', $template);
			
		    
			
		}
		public function sendsms($phone)
		{
		  include_once APPPATH."libraries/AfricasTalkingGateway.php";
           //require_once('AfricasTalkingGateway.php');

           // Specify your login credentials
            $username   = "joemunyiri";
            $apikey     = "55f9473abb6fe62b788e7a4adf1a28723728a2b363c77c391dfc4469a8b5f1cf";
			$recipients = "+254722222722";
            $message    = "just for testing of otp functionality";
            $gateway    = new AfricasTalkingGateway($username, $apikey);
			try 
            { 
              $results = $gateway->sendMessage($recipients, $message);
			
              foreach($results as $result) 
			  {
                
               $status = $result->status;
            
           
              }
			  return $status;
             }
          catch ( AfricasTalkingGatewayException $e )
          {
            echo "Encountered an error while sending: ".$e->getMessage();
          }

      // DONE!!! 
		}
		public function checkotp()
		{
			$id = $_POST['id'];
			$usertype = $_POST['type'];
			$ots = $_POST['otp'];
			
			$this->db->select('otp');
            $this->db->from('otptable');
            $this->db->where('id',$id);
			$data =  $this->db->get()->row()->otp;
			if($otp == $data)
			{
			$template['page'] = "changepassword";
			$template['page_title'] = "Reset password";
			$template['data'] = "Reset password";
			$template['id'] = $id;
			$template['type'] = $usertype;
			$this->load->view('template', $template);
				
			}
			else
			{
				$template['page'] = "report";
			    $template['page_title'] = "success page";
			    $template['data'] = "success page";
			    $template['class'] = 'danger';
			    $template['message'] = 'you have enter the wrong otp';
			    $this->load->view('template', $template);
			}
			
			
			
		}
		public function changepassword()
		{
			$id = $_POST['id'];
		    $usertype = $_POST['type'];
			
			$ots = $_POST['password'];
			$data['password'] = $ots;
			$newpassword = md5($ots);
			$this->db->where('id',$id);
            $status = $this->db->update($usertype,$data);
			
			$this->db->where('id',$id);
            $status = $this->db->delete('otptable');
			
			if($status == 1)
			{
			$template['page'] = "report";
			$template['page_title'] = "success page";
			$template['data'] = "success page";
			$template['class'] = 'success';
			$template['message'] = 'you have succeessfully update the password';
			$this->load->view('template', $template);
				
			}
			else
			{
				$template['page'] = "report";
			    $template['page_title'] = "success page";
			    $template['data'] = "success page";
			    $template['class'] = 'danger';
			    $template['message'] = 'you have succeessfully update the password';
			    $this->load->view('template', $template);
				
			}
			
		}
		
		
		
}
?>