<?php
function check_installer(){
  
  $file = "INSTALLER_TRUE.php";
    if(file_exists($file)){
        redirect(base_url().'Installer/installer.php');
    } 
}
function remove_html(&$item, $key)
{
    $item = strip_tags($item);
}
function is_logged() {
	$CI = & get_instance();
	$user_session = $CI->session->userdata('bms_userdata');
	/*var_dump($user_session);
	exit;*/
	if(!$user_session or !$user_session['token']) {
		$user_cookie = get_cookie('bms_usercookie');
		/*var_dump($user_cookie);
		exit;*/
		if($user_cookie) {

			$user_session = get_user($user_cookie);
			$CI->session->set_userdata('bms_userdata', $user_session);
		}
	}
	return $user_session;
}

function get_security_key() {
	$CI = & get_instance();
	$security_key = $CI->config->item('security_key');
	return $security_key;
}

function get_user($token) {
	$CI = & get_instance();
	$post_data['token'] = $token;
	$url = $CI->config->item('webservice_url')."getuser";
	$security_key = $CI->config->item('security_key');
	$curl_handle = curl_init();
	curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('X-API-KEY: '.$security_key));
	curl_setopt($curl_handle, CURLOPT_URL, $url);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_POST, 1);
	curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_data);
	 
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);
	 
	$result = json_decode($buffer);
	$user_session = (array)$result->profile;
	$user_session['token'] = $result->token;
	return $user_session;
}


/* Get Settings */
function get_settings() {
	$CI = & get_instance();
	$url = $CI->config->item('webservice_url')."getsettings";
	$security_key = $CI->config->item('security_key');
	$post_data['test'] = 'test';
	$curl_handle = curl_init();
	curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('X-API-KEY: '.$security_key));
	curl_setopt($curl_handle, CURLOPT_URL, $url);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_POST, 1);
	curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_data);
	 
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);
	 
	$result = json_decode($buffer);
	//$CI->session->set_userdata('edmlead_settings',$settings);
	return $result->settings;
}
function get_icon(){
	$CI = & get_instance();
	
	$CI->db->select('*');
	$CI->db->where("id", 1);
	$CI->db->from('settings');
	$result = $CI->db->get()->row();
	return $result;
	//$CI->load->model("settings_model");
	//$settings = $CI->settings_model->get_settings();
	//$CI->session->set_userdata('edmlead_settings',$settings);*/
	//return $settings;
	
	
}
function get_doccalendaranother($id){
	$CI = & get_instance();
	$data['result'] = $CI->Doctor_Model->get_freshcal($id);
	$data['id'] = $id;
    //print_r($result);
	return $data['id'];
}
function get_doccalendar($id){
	$CI = & get_instance();
	$data['result'] = $CI->Doctor_Model->get_freshcal($id);
	$data['id'] = $id;	
	return $CI->load->view("dummy",$data);
}

function calendar_html($value,$columns,$Day,$date,$s,$key){
	// echo '<pre>';
	// var_dump($value,$columns,$Day,$date,$s,$key);
	// exit;
	
		error_reporting(0);
		$id = $key;
		
		 if($columns==3){$cal_cls='date-inner-mn-list';}else{$cal_cls='date-inner-mn-list';}
		$calendar_html = '';
					if($value['working_time']=='none'){
						$calendar_html .= '<div class="error1" 
						">
						<p style="margin:0 auto;padding:20px">No availability these days</p></div>';
					}
					else{
						//echo 'arun';die;
		for($i=0;$i<$columns;$i++){
            $day_C = strtolower(date('D', strtotime($Day. ' + '.$i.' days')));
            $date_C = date('Y-m-d', strtotime($date. ' + '.$i.' days'));
			$day[]= $day_C;
			$datec[] = $date_C ;
            $list_work_array[] = $value[$day_C]['working_time_auto'];
            $list_brk_array[] = $value[$day_C]['break_time_auto'];
			
            if(array_key_exists($date_C,$value['apnttime'])){
				 $r=$value['apnttime'][$date_C];
                $list_apnt_array[] = $r;
				
            }
			
			
			
			
			if(is_array($value['vacation_date_auto'])){
             if (in_array($date_C, $value['vacation_date_auto'])){

                $list_vecation_array[] = $value['vacation_date_auto'];
            }
			}//$list_vecation_array="";

        }
   
        $date_array = array();

		
        foreach ($list_work_array as $key => $value) {

        	$date_val = date('Y-m-d', strtotime($date. ' + '.$key.' days'));


							
            foreach ($value as $key1 => $value1) {
				
				
	               
                if(array_key_exists($key,$list_work_array)){
                    if(in_array($value1,$list_work_array[$key])){
                        $final_array[$key][$key1] = $value1;
						}
                }
                if(array_key_exists($key,$list_brk_array)){
					if(is_array($list_brk_array[$key])){
                    if(in_array($value1,$list_brk_array[$key])){
                        $final_array[$key][$key1] = 'Break';
						}
					}
                }
				
                if(array_key_exists($key,$list_apnt_array)){
                    if(in_array($value1,$list_apnt_array[$key])){
                        $final_array[$key][$key1] = 'Booked';
						}
                }


                if(isset($list_vecation_array) && !empty($list_vecation_array)){
                	foreach ($list_vecation_array as $keyvlenfinal => $valuevlenfinal) {
                		if(in_array($date_val,$valuevlenfinal)){
                        	$final_array[$key][$key1] = 'In vacation';
						}
                	}
                }


				
												
				
					//
					
					
				//for($i=0;$i<$columns;$i++){ 
/*foreach($list_vecation_array as $keyvlenfinal => $valuevlenfinal){				
            $date_Ck = date('Y-m-d', strtotime($date. ' + '.$i.' days'));
			
			
					if(is_array($valuevlenfinal)){
					   if(in_array($date_Ck, $valuevlenfinal)){
						   
                        $final_array[$key][$key1] = 'In vacation';
						//echo $date_C.'-'.$key."-".$key1.'<br/>';
                    }
					}
					
					
				//} 
				//die;
			}*/


            }
        }	
					}
					
					
					
					

					if(!empty($final_array)){
						
						$calendar_html .='<div class="date-inner-mn">';
						foreach($final_array as $keys =>$values){
							$calendar_html .='<div class="'.$cal_cls.'"><ul>';
							foreach($values as $key =>$value){
								if($value != "Booked" && $value != "In vacation" && $value != "Break"){
									$path ='id="'.$id.'_'.$day[$keys].' '.$datec[$keys].'_'.$value.'" ';
								}else{
									$path ="";
								}
								
							if($key>3){
						$cls_hi='';
					}else{
						$cls_hi='gettimecal';
					}if($key==4){
						// $calendar_html .= '<li class="more sss" data-value="'.$id.'"  > 
							// <img  src="'.$s.'assets/images/more_arw.png">
							 // </li>';
					}	
					/*
					 if($this->session->userdata('super_person') == 0){
						$calendar_html .= '<li onclick="gettimecalendar(this)" class="'.$cls_hi.'" '.$path.'> '.$value.'</li>';
						  }else{
							$calendar_html .= '<li onclick="mysigninFunction()" class="'.$cls_hi.'" '.$path.'> '.$value.'</li>';  
						  }
						  */
						  
						$calendar_html .= '<li onclick="gettimecalendar(this)" class="'.$cls_hi.'" '.$path.'> '.$value.'</li>';
						
						if($value==end($final_array[$keys])){
						
					}
							}$calendar_html .= '</ul></div>';
					}
					$calendar_html .='</div>';
					}				
				return $calendar_html;     
	}


function pdffunc(){
	include('pdf/fpdf_helper.php');
}




?>
