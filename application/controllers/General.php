<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

	public function __construct() {
		parent::__construct();
		check_installer();
		$this->load->model('Home_Model');
 	}
	
	public function aboutus()
	{
			$template['page'] = "about_us";
			$template['page_title'] = "Aboutus Page";
			$template['data'] = "Aboutus page";
				//for serach slider
				$template['countriesslider'] =$this->Home_Model->get_countries();	
				$template['languagesslider'] =$this->Home_Model->get_languages();
				$template['specialtiesslider'] =$this->Home_Model->get_specialties();
				$template['insuranceslider'] =$this->Home_Model->get_insurance();
		$this->load->view('template', $template);
	}
	public function careers()
	{
			$template['page'] = "career";
			$template['page_title'] = "Career Page";
			$template['data'] = "Career page";
				//for serach slider
				$template['countriesslider'] =$this->Home_Model->get_countries();	
				$template['languagesslider'] =$this->Home_Model->get_languages();
				$template['specialtiesslider'] =$this->Home_Model->get_specialties();
				$template['insuranceslider'] =$this->Home_Model->get_insurance();
		$this->load->view('template', $template);
	}
	public function contact()
	{
			$template['page'] = "contact";
			$template['page_title'] = "Contact Page";
			$template['data'] = "Contact page";
				//for serach slider
				$template['countriesslider'] =$this->Home_Model->get_countries();	
				$template['languagesslider'] =$this->Home_Model->get_languages();
				$template['specialtiesslider'] =$this->Home_Model->get_specialties();
				$template['insuranceslider'] =$this->Home_Model->get_insurance();
		$this->load->view('template', $template);
	}
	public function terms()
	{
			$template['page'] = "terms";
			$template['page_title'] = "Terms Page";
			$template['data'] = "Terms page";
				//for serach slider
				$template['countriesslider'] =$this->Home_Model->get_countries();	
				$template['languagesslider'] =$this->Home_Model->get_languages();
				$template['specialtiesslider'] =$this->Home_Model->get_specialties();
				$template['insuranceslider'] =$this->Home_Model->get_insurance();
		$this->load->view('template', $template);
	}
	
	

}