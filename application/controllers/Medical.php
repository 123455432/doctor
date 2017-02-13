<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical extends CI_Controller {
	
	public function __construct() {
		parent::__construct();	
		check_installer();
		$this->load->helper('url','form');	
		$this->load->model('Doctor_Model');
		$this->load->model('Medical_Model');		
 	}
	
	public function index(){						
		$data = array();
		if(isset($_POST) and !empty($_POST)){
              $data = $_POST;			 
			  $result=$this->Medical_Model->getall_medicalfiltermap($data);			
			  $this->load->library('googlemaps');	
		foreach($result as $row){
			if($row->latitude != ""){		
				if($row->longitude != ""){       
				   $this->googlemaps->center = $row->latitude.",". $row->longitude;
					$config['zoom'] = 'auto';		
					$this->googlemaps->initialize();		
					$marker = array();		
					$marker['position'] = $row->latitude.",". $row->longitude;
					$marker['infowindow_content']= '<img  class="img-mp-section" src= '.$row->display_image.' >'."".'<h2>'.$row->medical_name.'</h2>';				
					$this->googlemaps->add_marker($marker);
				}
			}
		}
	$template['map'] = $this->googlemaps->create_map();			 
	     }
		 else{			
		$result = $this->Medical_Model->get_latlang();		 
		$this->load->library('googlemaps');	
		foreach($result as $row){
			if($row->latitude != ""){		
				if($row->longitude != ""){       
				   $this->googlemaps->center = $row->latitude.",". $row->longitude;
					$config['zoom'] = 'auto';		
					$this->googlemaps->initialize();		
					$marker = array();		
					$marker['position'] = $row->latitude.",". $row->longitude;
					$marker['infowindow_content']= '<img  class="img-mp-section" src= '.$row->display_image.' >'."".'<h2>'.$row->medical_name.'</h2>';				
					$this->googlemaps->add_marker($marker);
				}
			}
		}
	$template['map'] = $this->googlemaps->create_map();	
		 }
		 $template['post_data'] = $data;
		 if(isset($data['country'])) {
			 $template['states'] =$this->loadData($data['country'], 'state');
		 }
		 if(isset($data['state'])) {
			 $template['cities'] =$this->loadData($data['state'], 'city');
		 }
		 if(isset($data['specialty'])) {
			 $template['reasons'] =$this->loadDataReason($data['specialty'], 'reason');
		 }
			$template['medical'] =$this->Medical_Model->getall_medicalconven($data);						
			$template['countries'] =$this->Medical_Model->get_countries();		
			$template['specialties'] =$this->Medical_Model->get_specialties();
			$template['insurance'] =$this->Medical_Model->get_insurance();
				
			$template['page'] = "filter_medical";			
			$template['page_title'] = "medical Page";
			$template['data'] = "medical page";
			$this->load->view('template', $template);
	}
	
	public function loadData($loadId = '', $loadType = ''){		
		if(empty($loadId) and empty($loadType)) {
			$loadType=$_POST['loadType'];
			$loadId=$_POST['loadId'];
		}
		$result=$this->Medical_Model->getData($loadType,$loadId);		
		return $result->result();
	}
	public function loadDataReason($loadId = '', $loadType = ''){
		if(empty($loadId) and empty($loadType)) {
		$loadType=$_POST['loadType'];
		$loadId=$_POST['loadId'];
        }
		$result=$this->Medical_Model->getDataReason($loadType,$loadId);
		return $result->result();		
	}
	public function filtermedical(){
		if(isset($_POST)){
				$data = $_POST;			  
				$template['medical']=$this->Medical_Model->getall_medicalfilter($data);
				$result=$this->Medical_Model->getall_medicalfiltermap($data);			  
				$map_data = array();
				$this->load->library('googlemaps');		
			foreach($result as $row){
				if($row->latitude != ""){		
					if($row->longitude != ""){  	   
						$map_data[] = '{ "DisplayText": "'.$row->medical_name.'", "Location": "'.$row->medical_address.'", "LatitudeLongitude": "'.$row->latitude.','.$row->longitude.'"}';
						}
					}
				}
						$maps = '['.implode(",", $map_data).']';		 
						$temp = $this->load->view('filterresults_medical',$template,true);
				}		 		 
			foreach($template['medical'] as $rs){
						$last_id = $rs->id;
			}
			if(count($template['medical'])==0){
						$last_id =0;
			}		 
		 print json_encode(array('total'=>count($template['medical']),'temp'=>$temp,'last_id'=>$last_id,'map_data'=>$maps));
	}
	
	public function loadmore_medical()
	{		
		    if(isset($_POST))
               {				  
				$data = $_POST;			 
				$template['medical']=$this->Medical_Model->getall_medicalload($data);			
				$this->load->view('loadmore_medical',$template);	
			   }		
	}
	
	public function Search_doctor(){
		$id = $this->uri->segment(3);
        $template['view_medicalgallery'] =$this->Medical_Model->get_singlemedicalgallery($id);		
		$template['view_medical'] =$this->Medical_Model->get_singlemedical($id);
		if(isset($template['view_medical'])&!empty($template['view_medical'])){		
			$template['doctors'] =$this->Medical_Model->get_medicaldoctors($id);	
			$result = $this->Medical_Model->get_latlang_medical($id);		
			$this->load->library('googlemaps');			
			if($result->latitude != ""){		
				if($result->longitude != ""){       
				   $this->googlemaps->center = $result->latitude.",". $result->longitude;
					$config['zoom'] = 'auto';		
					$this->googlemaps->initialize();		
					$marker = array();		
					$marker['position'] = $result->latitude.",". $result->longitude;
					$marker['infowindow_content']= '<img  class="img-mp-section" src= '.$result->display_image.' >'."".'<h2>'.'Dr.'.$result->medical_name.'</h2>';				
					$this->googlemaps->add_marker($marker);
					}
				 }
	$template['map'] = $this->googlemaps->create_map();	
	$template['page'] = "medical_doctor";
	$template['page_title'] = "medical doctor Page";
	$template['data'] = "medical doctor page";
	$this->load->view('template', $template);			
	}	
}
public function loadmore_medicaldoctor(){
		$id = $this->uri->segment(3);
			if(isset($_POST))
				{				  
				$data = $_POST;			 
				$template['doctors']=$this->Medical_Model->getall_medicaldoctorload($data,$id);			
				$this->load->view('loadmore_medicaldoctor',$template);	
			   }		
	}
	
}
?>