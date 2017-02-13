<?php

function get_icon(){
	$CI = & get_instance();
	
	$CI->db->select('*');
	$CI->db->where("id", 1);
	$CI->db->from('settings');
	$result = $CI->db->get()->row();
	return $result;
	
	
}



?>
