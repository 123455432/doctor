<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		check_installer();
		$this->load->helper('url','form');
		$this->load->model('Home_Model');	
		$this->load->model('user');
 	}
	
	public function index()
	{		 
		$template['countries'] =$this->Home_Model->get_countries();	
		$template['languages'] =$this->Home_Model->get_languages();
		$template['specialties'] =$this->Home_Model->get_specialties();
		$template['insurance'] =$this->Home_Model->get_insurance();
		$template['page'] = "Homepage";
		$template['page_title'] = "Home Page";
		$template['data'] = "Home page";
		
		// Include the facebook api php libraries
		include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";
		
		// Facebook API Configuration
		$appId = '362415004140320';
		$appSecret = 'a525dba8b26b83a373738819d7f4493a';
		$redirectUrl = base_url();
		$fbPermissions = 'email';
		
		//Call Facebook API
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
        if ($fbuser) {
			$userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'facebook';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
			$userData['gender'] = $userProfile['gender'];
			$userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			// Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
                $sess_array = array(
								'id' => $userProfile['id'],
								'username' => $userData['first_name'].' '.$userData['last_name']
							);
			
			$this->session->set_userdata('frontend_logged_in', $sess_array);
            } else {
               $data['userData'] = array();
            }
        } else {
			$fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
			$template['authUrl'] = $data['authUrl'];
        }
        
        /* gmail login script */
        
        /*include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		
		// Google Project API Credentials
		$clientId = '410894777647-bstj2jko2p3sbfu02vnpir41d8cqmum8.apps.googleusercontent.com';
        $clientSecret = '7VPz50O7rdXyDdvt3qAGMwQk';
        $redirectUrl = base_url();
		
		// Google Client Configuration
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
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
			$userData['gender'] = $userProfile['gender'];
			$userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = $userProfile['link'];
            $userData['picture_url'] = $userProfile['picture'];
			// Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
                $sess_array = array(
								'id' => $userProfile['id'],
								'username' => $userData['first_name'].' '.$userData['last_name']
							);
			
			$this->session->set_userdata('frontend_logged_in', $sess_array);
            } else {
               $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
            $template['authUrlg'] = $data['authUrl'];
        }
        
        /* end gmail login script */
        
		 
		
		$this->load->view('template', $template);
	}
 
}
?>