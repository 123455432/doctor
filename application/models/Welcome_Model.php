
<?php
class Welcome_Model extends CI_Model

	{
	public

	function _construct()
		{
		parent::_construct();
		}
		
		function getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 10)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

/*
 * Get years options list.
 */
function getYearList($selected = ''){
	$options = '';
	for($i=2015;$i<=2025;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}

		public function getevents($date = ''){
			$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
	//Get events based on the current date
	$this->db->select("title");
	$this->db->from('events');
	$this->db->where('date', $date);
	$this->db->where("status" ,"1");
	$query = $this -> db -> get();	
	$result = $query->result();		
        
	// $result = $db->query("SELECT title FROM events WHERE date = '".$date."' AND status = 1");
	if($result->num_rows > 0){
		$eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>';
		$eventListHTML .= '<ul>';
		while($row = $result->fetch_assoc()){ 
            $eventListHTML .= '<li>'.$row['title'].'</li>';
        }
		$eventListHTML .= '</ul>';
	}
	echo $eventListHTML;
		}
		
		public function update_docgallery_profile($data){			
		
		if ($this->db->insert("doctor_gallery", $data))
			{
			return true;
			}
		}
		public function get_singledoctorpictures($id){
			$this->db->select("*");
			$this->db->from('doctor_gallery');		
		$this->db->where('doctor_id', $id);
		$this->db->limit(8);
		$query = $this -> db -> get();		
		$doctor_pictures = $query->result();		
        return $doctor_pictures;  
		}
		public function get_galleryclinic($id){
			$this->db->select("*");
			$this->db->from('clinic_gallery');		
		$this->db->where('clinic_id', $id);
		$this->db->limit(8);
		$query = $this -> db -> get();		
		$clinic_gallery = $query->result();		
        return $clinic_gallery;  
		}
		public function get_singleclinic($id){
			$this->db->select('do.id as id,do.doctor_experience,do.doctor_awards,do.doctor_firstname,do.doctor_experience,do.doctor_lastname,do.doctor_sex,do.email,do.doctor_age,do.doctor_degree,do.doctor_affiliations,do.doctor_languages,do.doctor_awards,do.about_doctor,do.doctor_memberships,do.doctor_office_country,do.password,do.doctor_office_address,do.doctor_office_state,do.doctor_office_city,do.doctor_office_zip,do.specialty,do.terms,do.status,do.display_image,
		rate.review,rate.date,rate.doctor_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,degree_categories.degree_name,specialty_categories.specialty_name,GROUP_CONCAT(DISTINCT affilliated_hospitals.hospital_name ORDER BY affilliated_hospitals.id) as hospital_name,country_categories.country_name,state_categories.state_name,city_categories.city_name
		               ');
					$this->db->from('doctor as do');
		$this->db->join('clinic','FIND_IN_SET(clinic.id, do.clinic_id) > 0', 'left');			
		$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, do.doctor_degree) > 0', 'left');
		$this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, do.specialty) > 0', 'left ');
		$this->db->join('affilliated_hospitals', 'FIND_IN_SET(affilliated_hospitals.id, do.doctor_affiliations) > 0', 'left ');
		$this->db->join('rating_doctor as rate', 'FIND_IN_SET(rate.doctor_id, do.id) > 0', 'left ');
		$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, do.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, do.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, do.doctor_office_city) > 0', 'left ');
		$this->db->group_by('do.id');
		$this->db->where('clinic.id', $id);
		$query = $this -> db -> get();		
		$clinic_doctors = $query->result();		
        return $clinic_doctors;   
			
			
		}
		public function get_an_check_patient_history($id,$date){
			$this->db->select('doctor.id as id,doctor.*,appointment.id as app_id,appointment.appointment_date,appointment.patient_id,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name,visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');
$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');		 
				$this->db->group_by('appointment.id');				
				$this->db->where("appointment.patient_id",$id);	
             $this->db->where("appointment.appointment_date ",$date);					
				$this->db->order_by("appointment.appointment_time","asc");
				$query = $this->db->get();
				return $result = $query->result();	
		}
		public function get_an_patient_history($id){
			$cdate = date('Y-m-d');
		$this->db->select('doctor.id as id,doctor.*,appointment.id as app_id,appointment.appointment_date,appointment.patient_id,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name,visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');
$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');		 
				$this->db->group_by('appointment.id');				
				$this->db->where("appointment.patient_id",$id);	
                 $this->db->where("appointment.appointment_date <=",$cdate);					
				$this->db->order_by("appointment.appointment_date ","desc");
				$this->db->order_by("appointment.appointment_time","desc");
				$query = $this->db->get();
				return $result = $query->result();	
		}
		public function get_patient_history_final($id){
		$this->db->select('doctor.id as id,doctor.*,appointment.appointment_date,appointment.patient_id,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name,visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');
$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');		 
				$this->db->group_by('doctor.id');				
				$this->db->where("appointment.patient_id",$id);
               $this->db->where("appointment.status","1");				
				$this->db->order_by("doctor.id","desc");
				$query = $this->db->get();
				return $result = $query->result();
				
		/*$this->db->select('appointment.id as id,appointment.*,doctor.id as doc_id,doctor.doctor_firstname,doctor.doctor_lastname,doctor.display_image,doctor.doctor_office_address,doctor.doctor_office_country,doctor.doctor_office_state,doctor.doctor_office_city,doctor.doctor_office_zip,doctor.email,doctor.doctor_degree,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating,
		visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name');
			$this->db->from('doctor');
			
			//$this->db->join('doctor','doctor.id == appointment.doctor_id');
			$this->db->join('appointment', 'doctor.id = appointment.doctor_id','left ');
			$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');
			$this->db->group_by('rate.doctor_id');
			$this->db->where('appointment.patient_id', $id);
			$this->db->order_by('appointment.doctor_id','asc');
		$query = $this -> db -> get();		
		$patient_history = $query->result();
		// echo $this->db->last_query();
		// exit;
		
        return $patient_history;*/
		
		}
		public function get_patient_history($id){
		$this->db->select('doctor.id as id,doctor.*,appointment.appointment_date,appointment.patient_id,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name,visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');
$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');		 
				$this->db->group_by('doctor.id');				
				$this->db->where("appointment.patient_id",$id);				
				$this->db->order_by("doctor.id","desc");
				$query = $this->db->get();
				return $result = $query->result();
				
		/*$this->db->select('appointment.id as id,appointment.*,doctor.id as doc_id,doctor.doctor_firstname,doctor.doctor_lastname,doctor.display_image,doctor.doctor_office_address,doctor.doctor_office_country,doctor.doctor_office_state,doctor.doctor_office_city,doctor.doctor_office_zip,doctor.email,doctor.doctor_degree,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating,
		visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name');
			$this->db->from('doctor');
			
			//$this->db->join('doctor','doctor.id == appointment.doctor_id');
			$this->db->join('appointment', 'doctor.id = appointment.doctor_id','left ');
			$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');
			$this->db->group_by('rate.doctor_id');
			$this->db->where('appointment.patient_id', $id);
			$this->db->order_by('appointment.doctor_id','asc');
		$query = $this -> db -> get();		
		$patient_history = $query->result();
		// echo $this->db->last_query();
		// exit;
		
        return $patient_history;*/
		
		}
		public function get_checkpdfsingleappointment($id){
			$this->db->select("appointment.id as id,appointment.*,patient.patient_firstname,patient.patient_lastname,patient.insurance,patient.visitation,patient.address,patient.country,patient.city,patient.state,patient.zip,doctor.doctor_firstname,doctor.doctor_lastname,doctor.doctor_office_address,doctor.doctor_office_city,doctor.doctor_office_state,doctor.doctor_office_zip,doctor.email as doc_email,doctor.specialty,visit_categories.reason,city_categories.city_name,country_categories.country_name,state_categories.state_name,insurance_categories.insurance_name,
			GROUP_CONCAT(DISTINCT specialty_categories.specialty_name ORDER BY specialty_categories.id) as specialty_name,");
			$this->db->from("appointment");
			$this->db->join("doctor","doctor.id = appointment.doctor_id");
			$this->db->join("patient","patient.id = appointment.patient_id");
			$this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('insurance_categories', 'FIND_IN_SET(insurance_categories.id, appointment.insurance) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');
		$this->db->where('appointment.id', $id);
		$query = $this->db->get();
		$result =$query->row();
	
		return $result; 
			
		}
		public function update_workingtime($id,$data){			
			$this->db->where('id', $id);
			//$result = $this->db->update('doctor',$data, array('id'=>$id));
		$result = $this->db->update('doctor', $data);
		//echo $this->db->last_query();
		return "Success";
		}
		public function get_singledoctorschedule($id){
			$this->db->select('working_time,vacation_time,break_time');
		$result = $this->db->get_where('doctor',array('id'=>$id))->row_array();
		return $result;	
		}
		public function get_singledoctor($id){
			$this->db->select('do.id as id,do.doctor_firstname,do.doctor_experience,do.doctor_lastname,do.doctor_sex,do.email,do.doctor_age,do.doctor_degree,do.doctor_affiliations,do.doctor_languages,do.doctor_awards,do.about_doctor,do.doctor_memberships,do.doctor_office_country,do.password,do.doctor_office_address,do.doctor_office_state,do.doctor_office_city,do.doctor_office_zip,do.specialty,do.terms,do.status,do.display_image,
		rate.review,rate.date,rate.doctor_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,degree_categories.degree_name,specialty_categories.specialty_name,GROUP_CONCAT(DISTINCT affilliated_hospitals.hospital_name ORDER BY affilliated_hospitals.id) as hospital_name,country_categories.country_name,state_categories.state_name,city_categories.city_name
		               ');
		$this->db->from('doctor as do');
		$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, do.doctor_degree) > 0', 'left');
		$this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, do.specialty) > 0', 'left ');
		$this->db->join('affilliated_hospitals', 'FIND_IN_SET(affilliated_hospitals.id, do.doctor_affiliations) > 0', 'left ');
		$this->db->join('rating_doctor as rate', 'FIND_IN_SET(rate.doctor_id, do.id) > 0', 'left ');
		$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, do.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, do.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, do.doctor_office_city) > 0', 'left ');
		$this->db->group_by('do.id');
		$this->db->where('do.id', $id);
		$query = $this -> db -> get();		
		$doctor_personal = $query->row();		
        return $doctor_personal;
			
			
		}
		public function get_clinic_personal($id){
			$this->db->select('cli.id as id,cli.clinic_name,cli.amenities,cli.about_clinic,cli.clinic_affilliations,cli.email,cli.clinic_languages,cli.visitation,cli.insurance,cli.clinic_awards,cli.clinic_memberships,cli.clinic_country,cli.password,cli.clinic_address,cli.clinic_state,cli.clinic_city,cli.clinic_zip,cli.specialty,cli.terms,cli.status,cli.display_image,
		rate.review,rate.date,rate.clinic_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,cou.country_name,stat.state_name,cit.city_name,GROUP_CONCAT(DISTINCT specialty_categories.specialty_name ORDER BY specialty_categories.id) as specialty_name,GROUP_CONCAT(DISTINCT affilliated_hospitals.hospital_name ORDER BY affilliated_hospitals.id) as affhospital_name,GROUP_CONCAT(DISTINCT insurance_categories.insurance_name ORDER BY insurance_categories.id) as insurance_name,
		GROUP_CONCAT(DISTINCT amenities_categories.facility_name ORDER BY amenities_categories.id) as facility_name
		               ');
		$this->db->from('clinic as cli');	
		 $this->db->join('amenities_categories', 'FIND_IN_SET(amenities_categories.id, cli.amenities) > 0', 'left ');	
        $this->db->join('insurance_categories', 'FIND_IN_SET(insurance_categories.id, cli.insurance) > 0', 'left ');		
		$this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, cli.specialty) > 0', 'left ');
		$this->db->join('affilliated_hospitals', 'FIND_IN_SET(affilliated_hospitals.id, cli.clinic_affilliations) > 0', 'left ');		
		$this->db->join('rating_clinic as rate', 'FIND_IN_SET(rate.clinic_id, cli.id) > 0', 'left ');
		$this->db->join('country_categories as cou','FIND_IN_SET(cou.id, cli.clinic_country) > 0', 'left');
		$this->db->join('state_categories as stat','FIND_IN_SET(stat.id, cli.clinic_state) > 0', 'left');
		$this->db->join('city_categories as cit','FIND_IN_SET(cit.id, cli.clinic_city) > 0', 'left');	
		$this->db->group_by('cli.id');
		$this->db->where('cli.id', $id);
		$query = $this -> db -> get();		
		$clinic_personal = $query->row();		
        return $clinic_personal;	
			
		}
		public function update_clinic($id,$data){
			$this->db->where('id', $id);
		$result = $this->db->update('clinic', $data);
		return "Success";
		}
		public function update_patient($id,$data){
			$this->db->where('id', $id);
		$result = $this->db->update('patient', $data);
		return "Success";
		}
		/*public function update_doctor_single($id,$data){
			$this->db->where('id', $id);
		$result = $this->db->update('doctor', $data);
		return "Success";
		}*/
		public function get_singlepatient($id){
		$this->db->select('pat.id as id,pat.age,pat.insurance,pat.languages,pat.address,pat.phone,pat.state,pat.country,pat.city,pat.zip,pat.dob,pat.marital_status,pat.username,pat.patient_display_image,pat.terms,pat.patient_sex,pat.password,pat.email,pat.patient_firstname,pat.patient_lastname
		
		               ');
		$this->db->from('patient as pat');		
		//$this->db->join('insurance_categories', 'FIND_IN_SET(insurance_categories.id, pat.insurance) > 0', 'left ');
		//$this->db->join('language_categories', 'FIND_IN_SET(language_categories.id, pat.languages) > 0', 'left ');
		$this->db->group_by('pat.id');
		$this->db->where('pat.id', $id);
		$query = $this -> db -> get();		
		$patient_personal = $query->row();		
        return $patient_personal;	
		}
		public function get_states()
		{
		$this->db->select('*');
		$this->db->from('state_categories ');
		$this->db->group_by("state_name");       
				
		$query = $this->db->get();
	
		return $states = $query->result();
		}
		public function get_cities()
		{
		$this->db->select('*');
		$this->db->from('city_categories ');
		$this->db->group_by("city_name");       
				
		$query = $this->db->get();
	
		return $cities = $query->result();
		}
	public function get_countries()
		{
		$this->db->select('*');
		$this->db->from('country_categories ');
		$this->db->group_by("country_name");       
				
		$query = $this->db->get();
	
		return $countries = $query->result();
		}
		public function get_amenities()
		{
		$this->db->select('*');
		$this->db->from('amenities_categories ');
		$this->db->group_by("facility_name");       
				
		$query = $this->db->get();
	
		return $amenities = $query->result();
		}
		
		public function get_specialties()
		{
		$this->db->select('*');
		$this->db->from('specialty_categories ');
		$this->db->group_by("specialty_name");       
				
		$query = $this->db->get();
	
		return $specialties = $query->result();
		}
		public function get_languages()
		{
		$this->db->select('*');
		$this->db->from('language_categories ');
		$this->db->group_by("language_name");       
				
		$query = $this->db->get();
	
		return $languages = $query->result();
		}
		public function get_insurance()
		{
		$this->db->select('*');
		$this->db->from('insurance_categories ');
		$this->db->group_by("insurance_name");       
				
		$query = $this->db->get();
	
		return $insurance = $query->result();
		}
		public function get_visitation()
		{
		$this->db->select('*');
		$this->db->from('visit_categories ');
		$this->db->group_by("reason");       
				
		$query = $this->db->get();
	
		return $visitation = $query->result();
		}
		public function get_affilliation()
		{
		$this->db->select('*');
		$this->db->from('affilliated_hospitals ');
		$this->db->group_by("hospital_name");       
				
		$query = $this->db->get();
	
		return $affilliation = $query->result();
		}
		public function get_degree()
		{
		$this->db->select('*');
		$this->db->from('degree_categories ');
		$this->db->group_by("degree_name");       
				
		$query = $this->db->get();
	
		return $degree = $query->result();
		}
		public function update_doctor_image($data, $id){
			$this->db->where('id', $id);
			$query = $this->db->get('doctor');
			$result = $query->result();
			if($result){
				if($this->db->update('doctor', $data)){
					return "Success";
				}
			}else{
				if($this->db->insert('doctor', $data)){
					return "Success";
				}
			}
		
		}			
		public function update_doctor($data, $id){
			if(isset($data['doctor_degree']) and !empty($data['doctor_degree'])) {
				$array = $data['doctor_degree'];
		$comma_separated = implode(",", $array);
		$data['doctor_degree'] = $comma_separated;
			}
			if(isset($data['specialty']) and !empty($data['specialty'])) {
				$array = $data['specialty'];
		$comma_separated = implode(",", $array);
		$data['specialty'] = $comma_separated;
			}
			if(isset($data['visitation']) and !empty($data['visitation'])) {
				$array = $data['visitation'];
		$comma_separated = implode(",", $array);
		$data['visitation'] = $comma_separated;
			}
			if(isset($data['doctor_languages']) and !empty($data['doctor_languages'])) {
				$array = $data['doctor_languages'];
		$comma_separated = implode(",", $array);
		$data['doctor_languages'] = $comma_separated;
			}
			if(isset($data['insurance']) and !empty($data['insurance'])) {
				$array = $data['insurance'];
		$comma_separated = implode(",", $array);
		$data['insurance'] = $comma_separated;
			}
			if(isset($data['doctor_affiliations']) and !empty($data['doctor_affiliations'])) {
				$array = $data['doctor_affiliations'];
		$comma_separated = implode(",", $array);
		$data['doctor_affiliations'] = $comma_separated;
			}
			
		$this->db->where('id', $id);
		$result = $this->db->update('doctor', $data);
		return "Success";
	}
	public function update_patient_password($data,$id){
		$this->db->select("count(*) as count");
		$this->db->where("password", md5($data['old_password']));
		$this->db->where("id", $id);
		$this->db->from("patient");
		$count = $this->db->get()->row();

		// var_dump($count);

		if ($count->count == 0)
			{
			return "notexist";
			}
		  else
			{
			$update_data['password'] = md5($data['new_password']);
			$this->db->where('id', $id);
			$result = $this->db->update('patient', $update_data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
			}
	}
	public function	update_doctor_password($data,$id) {
		$this->db->select("count(*) as count");
		$this->db->where("password", md5($data['old_password']));
		$this->db->where("id", $id);
		$this->db->from("doctor");
		$count = $this->db->get()->row();

		// var_dump($count);

		if ($count->count == 0)
			{
			return "notexist";
			}
		  else
			{
			$update_data['password'] = md5($data['new_password']);
			$this->db->where('id', $id);
			$result = $this->db->update('doctor', $update_data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
			}
	}
		public function add_country($data){		
		if ($this->db->insert("country_categories", $data))
			{
			return true;
			}
	}
	public function add_state($data){
			//$array = $data['doctor_office_country'];
		//$comma_separated = implode(",", $array);
		//$data['doctor_office_country'] = $comma_separated;
		//$data['country_id'] = $data['doctor_office_country'];
		//unset($data['doctor_office_country']);
		if ($this->db->insert("state_categories", $data))
			{
			return true;
			}
	}
	public function add_city($data){
		
			//$array = $data['doctor_office_country'];
		//$comma_separated = implode(",", $array);
		//$data['doctor_office_country'] = $comma_separated;
		
		//$array = $data['doctor_office_state'];
		//$comma_separated = implode(",", $array);
		//$data['doctor_office_state'] = $comma_separated;
		// $data['country_id'] = $data['doctor_office_country'];
		// unset($data['doctor_office_country']);
		// $data['state_id'] = $data['doctor_office_state'];
		// unset($data['doctor_office_state']);
		if ($this->db->insert("city_categories", $data))
			{
			return true;
			}
	}
	public function isCountryExist($country_name){
		
		$this->db->select('*');		
		$this->db->where('country_name', $country_name);
		$query = $this->db->get('country_categories');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else {
			 return false; 
		  }
			  
	}
	public function isStateExist($state_name){
		$this->db->select('*');		
		$this->db->where('state_name', $state_name);
		$query = $this->db->get('state_categories');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else {
			 return false; 
		  }
			  
	}
	public function isCityExist($city_name){
		$this->db->select('*');		
		$this->db->where('city_name', $city_name);
		$query = $this->db->get('city_categories');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else {
			 return false; 
		  }
			  
	}
		public function isEmailExist($email){
			
				
		$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('patient');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else 
			{
			$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('doctor');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else 
			{
				$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('clinic');
		if ($query->num_rows() > 0)
		{
				return true;
			}
			else 
			{
			$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('hospital');
		if ($query->num_rows() > 0)
			{
			return true;
			}
			else 
			{
			$this->db->select('*');		
		$this->db->where('email', $email);
		$query = $this->db->get('medical_center');
		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else
			{
				return false;
			     }
		     }
	      }
      }
   }		
			
			
		}
		
		public function getappdate($id){
			
			$this->db->select('appointment.id as id,appointment.*,patient.*,visit_categories.reason as reason,
			insurance_categories.insurance_name as insurance
		
		               ');
		$this->db->from('appointment');	
			$this->db->where("appointment.doctor_id",$id);
			$this->db->where("appointment.status",'1');
			$this->db->join('patient', 'FIND_IN_SET(patient.id, appointment.patient_id) > 0', 'left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, patient.visitation) > 0', 'left ');
			$this->db->join('insurance_categories', 'FIND_IN_SET(insurance_categories.id, patient.insurance) > 0', 'left ');
				//$this->db->group_by('appointment.id');
			$query = $this->db->get();
			$result = $query->result();
			return $result;
			
		}
		public function getanotherappdate($date,$id){
			$this->db->select('appointment.id as id,appointment.*,patient.*,visit_categories.reason as reason,
			insurance_categories.insurance_name as insurance
		
		               ');
		$this->db->from('appointment');	
			$this->db->where("appointment.doctor_id",$id);
			$this->db->where("appointment_date",$date);
			$this->db->where("appointment.status",'1');
			$this->db->join('patient', 'FIND_IN_SET(patient.id, appointment.patient_id) > 0', 'left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, patient.visitation) > 0', 'left ');
			$this->db->join('insurance_categories', 'FIND_IN_SET(insurance_categories.id, patient.insurance) > 0', 'left ');
				//$this->db->group_by('appointment.id');
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
		public function remove_apdoctor($id){
			
			$this->db->where("id",$id);
				if($this->db->delete("appointment"))
				{
				return "success";
			}									
		}
		public function update_rating_doctor($data){
			if($this->db->insert('rating_doctor',$data)){
				return true;
			}
		}
		public function remove_apdoctor_another($id){
			$data['status'] = "0";
			$this->db->where("doctor_id",$id);
				if($this->db->update("appointment",$data))
				{
				return "success";
			}	
		}
		public function deletesinglesubhosp($id){
			$this->db->where("id",$id);
				if($this->db->delete("hospital"))
				{
				return "success";
			}		
		}
		public function get_doc_hospitals($id){
			$this->db->select('do.id as id,do.doctor_firstname,do.doctor_experience,do.doctor_lastname,do.doctor_sex,do.email,do.doctor_age,do.doctor_degree,do.doctor_affiliations,do.doctor_languages,do.doctor_awards,do.about_doctor,do.doctor_memberships,do.doctor_office_country,do.password,do.doctor_office_address,do.doctor_office_state,do.doctor_office_city,do.doctor_office_zip,do.specialty,do.terms,do.status,do.display_image,rate.review,rate.date,rate.doctor_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,degree_categories.degree_name,specialty_categories.specialty_name,country_categories.country_name,state_categories.state_name,city_categories.city_name
		               ');
		$this->db->from('doctor as do');
		$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, do.doctor_degree) > 0', 'left');
		$this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, do.specialty) > 0', 'left ');		
		$this->db->join('rating_doctor as rate', 'rate.doctor_id = do.id','left ');
		$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, do.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, do.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, do.doctor_office_city) > 0', 'left ');
		$this->db->group_by('do.id');
		$this->db->where('do.hospital_id', $id);
		$query = $this -> db -> get();		
		$result = $query->result();		
        return $result;
			
			
			}
			public function get_sub_hospital($id){
				$this->db->select('hos.id as id,hos.*,
		rate.review,rate.date,rate.hospital_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,cou.country_name,stat.state_name,cit.city_name
		               ');
		$this->db->from('hospital as hos');
		
		$this->db->join('rating_hospital as rate', 'FIND_IN_SET(rate.hospital_id, hos.id) > 0', 'left ');
		$this->db->join('country_categories as cou','FIND_IN_SET(cou.id, hos.hospital_country) > 0', 'left');
		$this->db->join('state_categories as stat','FIND_IN_SET(stat.id, hos.hospital_state) > 0', 'left');
		$this->db->join('city_categories as cit','FIND_IN_SET(cit.id, hos.hospital_city) > 0', 'left');
		$this->db->group_by('hos.id');
				$this->db->where("hos.parent_id",$id);
				$this->db->order_by("hos.id","desc");
			$query = $this -> db -> get();
				$result = $query->result();
				return $result;
			}
			public function add_hospital($data){
				if ($this->db->insert("hospital", $data))
			{
			return true;
			}
			}
			public function getsinglesubhosp($id){
				$this->db->select('hos.id as id,hos.*,
		rate.review,rate.date,rate.hospital_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,cou.country_name,stat.state_name,cit.city_name
		               ');
		$this->db->from('hospital as hos');
		
		$this->db->join('rating_hospital as rate', 'FIND_IN_SET(rate.hospital_id, hos.id) > 0', 'left ');
		$this->db->join('country_categories as cou','FIND_IN_SET(cou.id, hos.hospital_country) > 0', 'left');
		$this->db->join('state_categories as stat','FIND_IN_SET(stat.id, hos.hospital_state) > 0', 'left');
		$this->db->join('city_categories as cit','FIND_IN_SET(cit.id, hos.hospital_city) > 0', 'left');
		$this->db->group_by('hos.id');
				$this->db->where("hos.id",$id);
				$this->db->order_by("hos.id","desc");
			$query = $this -> db -> get();
				$result = $query->row();
				return $result;
			}
			public function update_hospitals($data,$id){
				$this->db->where("id",$id);
				if ($this->db->update("hospital", $data))
			{
			return true;
			}
			}
			public function add_hospital_doc($data){
				if ($this->db->insert("doctor", $data))
			{
			return true;
			}
			}
			public function getsinglesubhospdoc($id){
				$this->db->select('doc.id as id,doc.*,
		rate.review,rate.date,rate.doctor_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,cou.country_name,stat.state_name,cit.city_name
		               ');
		$this->db->from('doctor as doc');
		
		$this->db->join('rating_doctor as rate', 'FIND_IN_SET(rate.doctor_id, doc.id) > 0', 'left ');
		$this->db->join('country_categories as cou','FIND_IN_SET(cou.id, doc.doctor_office_country) > 0', 'left');
		$this->db->join('state_categories as stat','FIND_IN_SET(stat.id, doc.doctor_office_state) > 0', 'left');
		$this->db->join('city_categories as cit','FIND_IN_SET(cit.id, doc.doctor_office_city) > 0', 'left');
		$this->db->group_by('doc.id');
				$this->db->where("doc.id",$id);
				$this->db->order_by("doc.id","desc");
			$query = $this -> db -> get();
				$result = $query->row();
				return $result;
			}
			public function update_hospitals_doc($data,$id){
				$this->db->where("id",$id);
				if ($this->db->update("doctor", $data))
			{
			return true;
			}
			}
			public function get_app_doctor($id){
				//$current_date = date('Y-m-d');
				$this->db->select('doctor.id as id,doctor.*,appointment.appointment_date,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');	
				$this->db->group_by('doctor.id');				
				$this->db->where("doctor.hospital_id",$id);
				
				//$this->db->where("appointment.appointment_date >=",$current_date);
				$this->db->order_by("doctor.id","desc");
				$query = $this->db->get();
				return $result = $query->result();
			}
		public function get_hospapp_doctor($id){
			$this->db->select('appointment.id as app_id');
				$this->db->from('appointment');
				//$this->db->join('doctor','appointment.doctor_id = doctor.id','left');
				//$this->db->join('patient','patient.id = appointment.patient_id', 'left');		
				//$this->db->group_by('appointment.doctor_id');				
				$this->db->where("appointment.doctor_id",$id);
				//$this->db->order_by("appointment.doctor_id","desc");
				
				$num_results = $this->db->count_all_results();
				return $num_results;
				
		}
		public function get_hospapppat_doctor($id,$patient_id){
		$this->db->select('appointment.id as app_id');
				$this->db->from('appointment');
				
				$this->db->where("appointment.doctor_id",$id);
				$this->db->where("appointment.patient_id",$patient_id);
				
				
				$num_results = $this->db->count_all_results();
				return $num_results;	
		}
		public function get_an_patientagain_history($id){
			$now = date('H:i A');
			$current_date = date('Y-m-d');
		$this->db->select('doctor.id as id,doctor.*,appointment.id as app_id,appointment.appointment_date,appointment.patient_id,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name,visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');
$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');		 
				$this->db->group_by('appointment.id');
                $this->db->where("doctor.hospital_id",$id);	
				$this->db->where("appointment.appointment_date <=",$current_date);
              //$this->db->where("appointment.appointment_time <=",$now);					
				//$this->db->where("appointment.doctor_id","doctor.id");				
				$this->db->order_by("appointment.id","desc");
				  
				$query = $this->db->get();
				return $result = $query->result();	
		}
		public function get_hospapp_doctorall($id){
			$current_date = date('Y-m-d');
			$this->db->select('patient.patient_firstname,patient.patient_lastname');
				$this->db->from('appointment');
				$this->db->join('doctor','appointment.doctor_id = doctor.id','left');
				$this->db->join('patient','patient.id = appointment.patient_id', 'left');		
				//$this->db->group_by('appointment.doctor_id');				
				$this->db->where("appointment.doctor_id",$id);
				$this->db->where("appointment.appointment_date <=",$current_date);
				
				$this->db->order_by("appointment.doctor_id","desc");
				$this->db->order_by("appointment.appointment_date","desc");
				$this->db->order_by("appointment.appointment_time","desc");
				
				$query = $this->db->get();
				return $result = $query->row_array();
				
		}
		/*public function get_hospapp_doctorall_new($id){
			$this->db->select('patient.patient_firstname,patient.patient_lastname');
				$this->db->from('appointment');
				$this->db->join('doctor','appointment.doctor_id = doctor.id','left');
				$this->db->join('patient','patient.id = appointment.patient_id', 'left');		
				//$this->db->group_by('appointment.doctor_id');				
				$this->db->where("appointment.doctor_id",$id);
				
				$this->db->order_by("appointment.doctor_id","desc");
				
				$query = $this->db->get();
				return $result = $query->row_array();
				
		}*/
		public function get_single_hospital($id){
			$this->db->where("id",$id);
			$query = $this->db->get("hospital");
			return $result =$query->row();
		}
		public function update_hospital_single($id,$data){
		$this->db->where("id",$id);
				if ($this->db->update("hospital", $data))
			{
			return true;
			}	
		}
		public function	update_hospital_password($data,$id,$email) {
		$this->db->select("count(*) as count");
		$this->db->where("password", md5($data['old_password']));
		$this->db->where("id", $id);
		$this->db->from("hospital");
		$count = $this->db->get()->row();

		// var_dump($count);

		if ($count->count == 0)
			{
			return "notexist";
			}
		  else
			{
			$update_data['password'] = md5($data['new_password']);
			$update_data['email'] = $email;
			$this->db->where('id', $id);
			$result = $this->db->update('hospital', $update_data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
			}
	}
	public function update_additional_feat($data,$id){
		if(isset($data['hospital_affilliations']) and !empty($data['hospital_affilliations'])) {
				$array = $data['hospital_affilliations'];
		$comma_separated = implode(",", $array);
		$data['hospital_affilliations'] = $comma_separated;
			}
			if(isset($data['hospital_languages']) and !empty($data['hospital_languages'])) {
				$array = $data['hospital_languages'];
		$comma_separated = implode(",", $array);
		$data['hospital_languages'] = $comma_separated;
			}
			if(isset($data['amenities']) and !empty($data['amenities'])) {
				$array = $data['amenities'];
		$comma_separated = implode(",", $array);
		$data['amenities'] = $comma_separated;
			}
			if(isset($data['specialty']) and !empty($data['specialty'])) {
				$array = $data['specialty'];
		$comma_separated = implode(",", $array);
		$data['specialty'] = $comma_separated;
			}
			if(isset($data['insurance']) and !empty($data['insurance'])) {
				$array = $data['insurance'];
		$comma_separated = implode(",", $array);
		$data['insurance'] = $comma_separated;
			}
			if(isset($data['visitation']) and !empty($data['visitation'])) {
				$array = $data['visitation'];
		$comma_separated = implode(",", $array);
		$data['visitation'] = $comma_separated;
			}
			$this->db->where("id",$id);
			$result = $this->db->update('hospital', $data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
	}
	
	/******** for medical center *********/
	public function get_sub_medical($id){
				$this->db->select('med.id as id,med.*,
		rate.review,rate.date,rate.medical_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,cou.country_name,stat.state_name,cit.city_name
		               ');
		$this->db->from('medical_center as med');
		
		$this->db->join('rating_medical as rate', 'FIND_IN_SET(rate.medical_id, med.id) > 0', 'left ');
		$this->db->join('country_categories as cou','FIND_IN_SET(cou.id, med.medical_country) > 0', 'left');
		$this->db->join('state_categories as stat','FIND_IN_SET(stat.id, med.medical_state) > 0', 'left');
		$this->db->join('city_categories as cit','FIND_IN_SET(cit.id, med.medical_city) > 0', 'left');
		$this->db->group_by('med.id');
				$this->db->where("med.parent_id",$id);
				$this->db->order_by("med.id","desc");
			$query = $this -> db -> get();
				$result = $query->result();
				return $result;
			}
	public function get_appmedical_doctor($id){
				//$current_date = date('Y-m-d');
				$this->db->select('doctor.id as id,doctor.*,appointment.appointment_date,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');	
				$this->db->group_by('doctor.id');				
				$this->db->where("doctor.medical_id",$id);
				
				//$this->db->where("appointment.appointment_date >=",$current_date);
				$this->db->order_by("doctor.id","desc");
				$query = $this->db->get();
				return $result = $query->result();
			}
	public function get_singlemedical_hospital($id){
			$this->db->where("id",$id);
			$query = $this->db->get("medical_center");
			return $result =$query->row();
		}
		public function get_hospappclinic_doctor($id){
			$this->db->select('appointment.id as app_id');
				$this->db->from('appointment');
				//$this->db->join('doctor','appointment.doctor_id = doctor.id','left');
				//$this->db->join('patient','patient.id = appointment.patient_id', 'left');		
				//$this->db->group_by('appointment.doctor_id');				
				$this->db->where("appointment.doctor_id",$id);
				//$this->db->order_by("appointment.doctor_id","desc");
				
				$num_results = $this->db->count_all_results();
				return $num_results;
				
		}
		public function get_hospappclinic_doctorall($id){
			$current_date = date('Y-m-d');
			$this->db->select('patient.patient_firstname,patient.patient_lastname');
				$this->db->from('appointment');
				$this->db->join('doctor','appointment.doctor_id = doctor.id','left');
				$this->db->join('patient','patient.id = appointment.patient_id', 'left');		
				//$this->db->group_by('appointment.doctor_id');				
				$this->db->where("appointment.doctor_id",$id);
				$this->db->where("appointment.appointment_date <=",$current_date);
				
				$this->db->order_by("appointment.doctor_id","desc");
				$this->db->order_by("appointment.appointment_date","desc");
				$this->db->order_by("appointment.appointment_time","desc");
				
				$query = $this->db->get();
				return $result = $query->row_array();
				
		}
		public function get_an_patientagainclinic_history($id){
			$now = date('H:i A');
			$current_date = date('Y-m-d');
		$this->db->select('doctor.id as id,doctor.*,appointment.id as app_id,appointment.appointment_date,appointment.patient_id,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name,visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');
$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');		 
				$this->db->group_by('appointment.id');
                $this->db->where("doctor.clinic_id",$id);	
				$this->db->where("appointment.appointment_date <=",$current_date);
              //$this->db->where("appointment.appointment_time <=",$now);					
				//$this->db->where("appointment.doctor_id","doctor.id");				
				$this->db->order_by("appointment.id","desc");
				  
				$query = $this->db->get();
				return $result = $query->result();	
		}
		public function add_clinic($data){
				if ($this->db->insert("clinic", $data))
			{
			return true;
			}
			}
			public function update_clinics($data,$id){
				$this->db->where("id",$id);
				if ($this->db->update("clinic", $data))
			{
			return true;
			}
			}
			public function add_clinic_doc($data){
				if ($this->db->insert("doctor", $data))
			{
			return true;
			}
			}
			public function update_clinics_doc($data,$id){
				$this->db->where("id",$id);
				if ($this->db->update("doctor", $data))
			{
			return true;
			}
			}
			public function update_clinic_single($id,$data){
		$this->db->where("id",$id);
				if ($this->db->update("clinic", $data))
			{
			return true;
			}	
		}
		public function insert_hospital_gallery($data){
			if($this->db->insert('hospital_gallery',$data)){
				return true;
			}
			
		}
		public function get_gallery_hospitals($id){
			$this->db->where("hospital_id",$id);
			$this->db->limit("6");
			$query = $this->db->get("hospital_gallery");
			return $query->result();
		}
		public function get_gallery_medicals($id){
			$this->db->where("medical_id",$id);
			$this->db->limit("6");
			$query = $this->db->get("medical_gallery");
			return $query->result();
		}
		public function get_gallery_clinic($id){
			$this->db->where("clinic_id",$id);
			$this->db->limit("6");
			$query = $this->db->get("clinic_gallery");
			return $query->result();
		}
		public function	update_clinic_password($data,$id,$email) {
		$this->db->select("count(*) as count");
		$this->db->where("password", md5($data['old_password']));
		$this->db->where("id", $id);
		$this->db->from("clinic");
		$count = $this->db->get()->row();

		// var_dump($count);

		if ($count->count == 0)
			{
			return "notexist";
			}
		  else
			{
			$update_data['password'] = md5($data['new_password']);
			$update_data['email'] = $email;
			$this->db->where('id', $id);
			$result = $this->db->update('clinic', $update_data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
			}
	}
	public function update_additionalclinic_feat($data,$id){
		if(isset($data['clinic_affilliations']) and !empty($data['clinic_affilliations'])) {
				$array = $data['clinic_affilliations'];
		$comma_separated = implode(",", $array);
		$data['clinic_affilliations'] = $comma_separated;
			}
			if(isset($data['clinic_languages']) and !empty($data['clinic_languages'])) {
				$array = $data['clinic_languages'];
		$comma_separated = implode(",", $array);
		$data['clinic_languages'] = $comma_separated;
			}
			if(isset($data['amenities']) and !empty($data['amenities'])) {
				$array = $data['amenities'];
		$comma_separated = implode(",", $array);
		$data['amenities'] = $comma_separated;
			}
			if(isset($data['specialty']) and !empty($data['specialty'])) {
				$array = $data['specialty'];
		$comma_separated = implode(",", $array);
		$data['specialty'] = $comma_separated;
			}
			if(isset($data['insurance']) and !empty($data['insurance'])) {
				$array = $data['insurance'];
		$comma_separated = implode(",", $array);
		$data['insurance'] = $comma_separated;
			}
			if(isset($data['visitation']) and !empty($data['visitation'])) {
				$array = $data['visitation'];
		$comma_separated = implode(",", $array);
		$data['visitation'] = $comma_separated;
			}
			$this->db->where("id",$id);
			$result = $this->db->update('clinic', $data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
	}
	public function get_doc_clinics($id){
			$this->db->select('do.id as id,do.doctor_firstname,do.doctor_experience,do.doctor_lastname,do.doctor_sex,do.email,do.doctor_age,do.doctor_degree,do.doctor_affiliations,do.doctor_languages,do.doctor_awards,do.about_doctor,do.doctor_memberships,do.doctor_office_country,do.password,do.doctor_office_address,do.doctor_office_state,do.doctor_office_city,do.doctor_office_zip,do.specialty,do.terms,do.status,do.display_image,rate.review,rate.date,rate.doctor_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,degree_categories.degree_name,specialty_categories.specialty_name,country_categories.country_name,state_categories.state_name,city_categories.city_name
		               ');
		$this->db->from('doctor as do');
		$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, do.doctor_degree) > 0', 'left');
		$this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, do.specialty) > 0', 'left ');		
		$this->db->join('rating_doctor as rate', 'rate.doctor_id = do.id','left ');
		$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, do.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, do.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, do.doctor_office_city) > 0', 'left ');
		$this->db->group_by('do.id');
		$this->db->where('do.clinic_id', $id);
		$query = $this -> db -> get();		
		$result = $query->result();		
        return $result;
			
			
			}
			public function getsinglesubhospclinic($id){
				$this->db->select('cli.id as id,cli.*,
		rate.review,rate.date,rate.clinic_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,cou.country_name,stat.state_name,cit.city_name
		               ');
		$this->db->from('clinic as cli');
		
		$this->db->join('rating_clinic as rate', 'FIND_IN_SET(rate.clinic_id, cli.id) > 0', 'left ');
		$this->db->join('country_categories as cou','FIND_IN_SET(cou.id, cli.clinic_country) > 0', 'left');
		$this->db->join('state_categories as stat','FIND_IN_SET(stat.id, cli.clinic_state) > 0', 'left');
		$this->db->join('city_categories as cit','FIND_IN_SET(cit.id, cli.clinic_city) > 0', 'left');
		$this->db->group_by('cli.id');
				$this->db->where("cli.id",$id);
				$this->db->order_by("cli.id","desc");
			$query = $this -> db -> get();
				$result = $query->row();
				return $result;
			}
			public function deletesinglesubhospclinic($id){
			$this->db->where("id",$id);
				if($this->db->delete("clinic"))
				{
				return "success";
			}		
		}
	/********* for clinic exit********/
	/******** for clinic *********/
	public function get_sub_clinic($id){
				$this->db->select('cli.id as id,cli.*,
		rate.review,rate.date,rate.clinic_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,cou.country_name,stat.state_name,cit.city_name
		               ');
		$this->db->from('clinic as cli');
		
		$this->db->join('rating_clinic as rate', 'FIND_IN_SET(rate.clinic_id, cli.id) > 0', 'left ');
		$this->db->join('country_categories as cou','FIND_IN_SET(cou.id, cli.clinic_country) > 0', 'left');
		$this->db->join('state_categories as stat','FIND_IN_SET(stat.id, cli.clinic_state) > 0', 'left');
		$this->db->join('city_categories as cit','FIND_IN_SET(cit.id, cli.clinic_city) > 0', 'left');
		$this->db->group_by('cli.id');
				$this->db->where("cli.parent_id",$id);
				$this->db->order_by("cli.id","desc");
			$query = $this -> db -> get();
				$result = $query->result();
				return $result;
			}
	public function get_appclinic_doctor($id){
				//$current_date = date('Y-m-d');
				$this->db->select('doctor.id as id,doctor.*,appointment.appointment_date,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');	
				$this->db->group_by('doctor.id');				
				$this->db->where("doctor.clinic_id",$id);
				
				//$this->db->where("appointment.appointment_date >=",$current_date);
				$this->db->order_by("doctor.id","desc");
				$query = $this->db->get();
				return $result = $query->result();
			}
	public function get_singleclinic_hospital($id){
			$this->db->where("id",$id);
			$query = $this->db->get("clinic");
			return $result =$query->row();
		}
		public function get_hospappmedical_doctor($id){
			$this->db->select('appointment.id as app_id');
				$this->db->from('appointment');
				//$this->db->join('doctor','appointment.doctor_id = doctor.id','left');
				//$this->db->join('patient','patient.id = appointment.patient_id', 'left');		
				//$this->db->group_by('appointment.doctor_id');				
				$this->db->where("appointment.doctor_id",$id);
				//$this->db->order_by("appointment.doctor_id","desc");
				
				$num_results = $this->db->count_all_results();
				return $num_results;
				
		}
		public function get_hospappmedical_doctorall($id){
			$current_date = date('Y-m-d');
			$this->db->select('patient.patient_firstname,patient.patient_lastname');
				$this->db->from('appointment');
				$this->db->join('doctor','appointment.doctor_id = doctor.id','left');
				$this->db->join('patient','patient.id = appointment.patient_id', 'left');		
				//$this->db->group_by('appointment.doctor_id');				
				$this->db->where("appointment.doctor_id",$id);
				$this->db->where("appointment.appointment_date <=",$current_date);
				
				$this->db->order_by("appointment.doctor_id","desc");
				$this->db->order_by("appointment.appointment_date","desc");
				$this->db->order_by("appointment.appointment_time","desc");
				
				$query = $this->db->get();
				return $result = $query->row_array();
				
		}
		public function get_an_patientagainmedical_history($id){
			$now = date('H:i A');
			$current_date = date('Y-m-d');
		$this->db->select('doctor.id as id,doctor.*,appointment.id as app_id,appointment.appointment_date,appointment.patient_id,appointment.appointment_time,degree_categories.degree_name,specialty_categories.specialty_name,visit_categories.reason,country_categories.country_name,state_categories.state_name,city_categories.city_name,rate.review,rate.date,rate.doctor_id as rate_doctor_id,rate.patient_id as rate_patient_id,rate.rating,AVG(rate.rating) as avg_rating');
				$this->db->from('doctor');
				$this->db->join('appointment','appointment.doctor_id = doctor.id','left');
				$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, doctor.doctor_degree) > 0', 'left');
		 $this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, doctor.specialty) > 0', 'left ');
$this->db->join('rating_doctor as rate', 'rate.doctor_id = appointment.doctor_id','left ');
			$this->db->join('visit_categories', 'FIND_IN_SET(visit_categories.id, appointment.ill_reason) > 0', 'left ');
			$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, doctor.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, doctor.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, doctor.doctor_office_city) > 0', 'left ');		 
				$this->db->group_by('appointment.id');
                $this->db->where("doctor.medical_id",$id);	
				$this->db->where("appointment.appointment_date <=",$current_date);
              //$this->db->where("appointment.appointment_time <=",$now);					
				//$this->db->where("appointment.doctor_id","doctor.id");				
				$this->db->order_by("appointment.id","desc");
				  
				$query = $this->db->get();
				return $result = $query->result();	
		}
		public function add_medical($data){
				if ($this->db->insert("medical_center", $data))
			{
			return true;
			}
			}
			public function update_medical($data,$id){
				$this->db->where("id",$id);
				if ($this->db->update("medical_center", $data))
			{
			return true;
			}
			}
			public function add_medical_doc($data){
				if ($this->db->insert("doctor", $data))
			{
			return true;
			}
			}
			public function update_medical_doc($data,$id){
				$this->db->where("id",$id);
				if ($this->db->update("doctor", $data))
			{
			return true;
			}
			}
			public function update_medical_single($id,$data){
		$this->db->where("id",$id);
				if ($this->db->update("medical_center", $data))
			{
			return true;
			}	
		}
		public function	update_medical_password($data,$id,$email) {
		$this->db->select("count(*) as count");
		$this->db->where("password", md5($data['old_password']));
		$this->db->where("id", $id);
		$this->db->from("medical_center");
		$count = $this->db->get()->row();

		// var_dump($count);

		if ($count->count == 0)
			{
			return "notexist";
			}
		  else
			{
			$update_data['password'] = md5($data['new_password']);
			$update_data['email'] = $email;
			$this->db->where('id', $id);
			$result = $this->db->update('medical_center', $update_data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
			}
	}
	public function update_additionalmedical_feat($data,$id){
		if(isset($data['medical_affilliations']) and !empty($data['medical_affilliations'])) {
				$array = $data['medical_affilliations'];
		$comma_separated = implode(",", $array);
		$data['medical_affilliations'] = $comma_separated;
			}
			if(isset($data['medical_languages']) and !empty($data['medical_languages'])) {
				$array = $data['medical_languages'];
		$comma_separated = implode(",", $array);
		$data['medical_languages'] = $comma_separated;
			}
			if(isset($data['amenities']) and !empty($data['amenities'])) {
				$array = $data['amenities'];
		$comma_separated = implode(",", $array);
		$data['amenities'] = $comma_separated;
			}
			if(isset($data['specialty']) and !empty($data['specialty'])) {
				$array = $data['specialty'];
		$comma_separated = implode(",", $array);
		$data['specialty'] = $comma_separated;
			}
			if(isset($data['insurance']) and !empty($data['insurance'])) {
				$array = $data['insurance'];
		$comma_separated = implode(",", $array);
		$data['insurance'] = $comma_separated;
			}
			if(isset($data['visitation']) and !empty($data['visitation'])) {
				$array = $data['visitation'];
		$comma_separated = implode(",", $array);
		$data['visitation'] = $comma_separated;
			}
			$this->db->where("id",$id);
			$result = $this->db->update('medical_center', $data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
	}
	public function get_doc_medicals($id){
			$this->db->select('do.id as id,do.doctor_firstname,do.doctor_experience,do.doctor_lastname,do.doctor_sex,do.email,do.doctor_age,do.doctor_degree,do.doctor_affiliations,do.doctor_languages,do.doctor_awards,do.about_doctor,do.doctor_memberships,do.doctor_office_country,do.password,do.doctor_office_address,do.doctor_office_state,do.doctor_office_city,do.doctor_office_zip,do.specialty,do.terms,do.status,do.display_image,rate.review,rate.date,rate.doctor_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,degree_categories.degree_name,specialty_categories.specialty_name,country_categories.country_name,state_categories.state_name,city_categories.city_name
		               ');
		$this->db->from('doctor as do');
		$this->db->join('degree_categories','FIND_IN_SET(degree_categories.id, do.doctor_degree) > 0', 'left');
		$this->db->join('specialty_categories', 'FIND_IN_SET(specialty_categories.id, do.specialty) > 0', 'left ');		
		$this->db->join('rating_doctor as rate', 'rate.doctor_id = do.id','left ');
		$this->db->join('country_categories', 'FIND_IN_SET(country_categories.id, do.doctor_office_country) > 0', 'left ');
		$this->db->join('state_categories', 'FIND_IN_SET(state_categories.id, do.doctor_office_state) > 0', 'left ');
		$this->db->join('city_categories', 'FIND_IN_SET(city_categories.id, do.doctor_office_city) > 0', 'left ');
		$this->db->group_by('do.id');
		$this->db->where('do.medical_id', $id);
		$query = $this -> db -> get();		
		$result = $query->result();		
        return $result;
			
			
			}
			public function getsinglesubhospmedical($id){
				$this->db->select('med.id as id,med.*,
		rate.review,rate.date,rate.medical_id,rate.patient_id,rate.rating,AVG(rate.rating) as avg_rating,cou.country_name,stat.state_name,cit.city_name
		               ');
		$this->db->from('medical_center as med');
		
		$this->db->join('rating_medical as rate', 'FIND_IN_SET(rate.medical_id, med.id) > 0', 'left ');
		$this->db->join('country_categories as cou','FIND_IN_SET(cou.id, med.medical_country) > 0', 'left');
		$this->db->join('state_categories as stat','FIND_IN_SET(stat.id, med.medical_state) > 0', 'left');
		$this->db->join('city_categories as cit','FIND_IN_SET(cit.id, med.medical_city) > 0', 'left');
		$this->db->group_by('med.id');
				$this->db->where("med.id",$id);
				$this->db->order_by("med.id","desc");
			$query = $this -> db -> get();
				$result = $query->row();
				return $result;
			}
			public function deletesinglesubhospmedical($id){
			$this->db->where("id",$id);
				if($this->db->delete("medical_center"))
				{
				return "success";
			}		
		}
	/********* for medical exit********/
	public function doctor_gallery_remove($id){
		$this->db->where("id",$id);
		if($this->db->delete("doctor_gallery")){
			return true;
		}
	}
	public function hospital_gallery_remove($id){
	$this->db->where("id",$id);
		if($this->db->delete("hospital_gallery")){
			return true;
		}	
	}
	public function clinic_gallery_remove($id){
	$this->db->where("id",$id);
		if($this->db->delete("clinic_gallery")){
			return true;
		}	
	}
	public function medical_gallery_remove($id){
	$this->db->where("id",$id);
		if($this->db->delete("medical_gallery")){
			return true;
		}	
	}
	public function get_packages(){
		$query = $this->db->get("packages");
		return $query->result();
	}
	public function get_center_packages(){
		$query = $this->db->get("center_packages");
		return $query->result();
	}
	public function insert_package($data){
		$this->db->insert('doctor_package', $data);	
	$insert_id = $this->db->insert_id();
      return  $insert_id;
	}
	public function insert_center_package($data){
		$this->db->insert('hospital_package', $data);	
	$insert_id = $this->db->insert_id();
      return  $insert_id;
	}
		//get and return product rows
	public function getRowsemail($id = ''){
		$this->db->select('doctor_package.id as id,packages.package_price,packages.package_period,doctor_package.doctor_id,doctor.doctor_firstname,doctor.doctor_lastname');
		$this->db->from('doctor_package');
		$this->db->join('doctor','FIND_IN_SET(doctor.id, doctor_package.doctor_id) > 0', 'left');
		$this->db->join('packages','FIND_IN_SET(packages.id, doctor_package.package_id) > 0', 'left');
		if($id){
			$this->db->where('doctor_package.id',$id);
			$query = $this->db->get();
			$result = $query->row_array();
		}
		return !empty($result)?$result:false;
	}
	public function getRowsemailclinic($id = ' '){
	$this->db->select('hospital_package.id as id,center_packages.package_price,hospital_package.hospital_id,clinic.clinic_name');
		$this->db->from('hospital_package');
		$this->db->join('clinic','FIND_IN_SET(clinic.id, hospital_package.hospital_id) > 0', 'left');
		$this->db->join('center_packages','FIND_IN_SET(center_packages.id, hospital_package.package_id) > 0', 'left');
		if($id){
			$this->db->where('hospital_package.id',$id);
			$this->db->where('hospital_package.hospital_type','clinic');
			$query = $this->db->get();
			$result = $query->row_array();
		}
		return !empty($result)?$result:false;	
	}
	public function getRowsemailmedical($id = ' '){
	$this->db->select('hospital_package.id as id,center_packages.package_price,hospital_package.hospital_id,medical_center.medical_name');
		$this->db->from('hospital_package');
		$this->db->join('medical_center','FIND_IN_SET(medical_center.id, hospital_package.hospital_id) > 0', 'left');
		$this->db->join('center_packages','FIND_IN_SET(center_packages.id, hospital_package.package_id) > 0', 'left');
		if($id){
			$this->db->where('hospital_package.id',$id);
			$this->db->where('hospital_package.hospital_type','medical');
			$query = $this->db->get();
			$result = $query->row_array();
		}
		return !empty($result)?$result:false;	
	}
	public function getRowsemailhospital($id = ' '){
	$this->db->select('hospital_package.id as id,center_packages.package_price,hospital_package.hospital_id,hospital.hospital_name');
		$this->db->from('hospital_package');
		$this->db->join('hospital','FIND_IN_SET(hospital.id, hospital_package.hospital_id) > 0', 'left');
		$this->db->join('center_packages','FIND_IN_SET(center_packages.id, hospital_package.package_id) > 0', 'left');
		if($id){
			$this->db->where('hospital_package.id',$id);
			$this->db->where('hospital_package.hospital_type','hospital');
			$query = $this->db->get();
			$result = $query->row_array();
		}
		return !empty($result)?$result:false;	
	}
	//insert transaction data
	public function insertTransaction($data = array()){
		$this->db->select('packages.package_period,doctor_package.doctor_id');
		$this->db->from('doctor_package');
		$this->db->join('packages','FIND_IN_SET(packages.id, doctor_package.package_id) > 0', 'left');
		$this->db->where('doctor_package.id',$data['id']);
		$query = $this->db->get();
		$result = $query->row_array();
		if($result){					  
		$data['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));	
		$data['confirmed_date'] =date('Y-m-d');
		$data['status'] ="1";
		$this->db->where('id',$data['id']);
		$insert = $this->db->update('doctor_package', $data);
			if($insert){
				$data1['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
				$this->db->where('id',$result['doctor_id']);
				$insertfinal = $this->db->update('doctor', $data1);
				return $insert?true:false;
			}
		
		}
	}
	public function insertTransactionclinic($data = array()){
		$this->db->select('center_packages.package_period,hospital_package.hospital_id,hospital_package.hospital_type');
		$this->db->from('hospital_package');
		$this->db->join('center_packages','FIND_IN_SET(center_packages.id, hospital_package.package_id) > 0', 'left');
		$this->db->where('hospital_package.id',$data['id']);
		$query = $this->db->get();
		$result = $query->row_array();
		if($result){				  
		$data['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
		$data['confirmed_date'] =date('Y-m-d');
		$data['status'] ="1";
		$this->db->where('id',$data['id']);
		$this->db->where('hospital_type','hospital');
		$insert = $this->db->update('hospital_package', $data);
		if($insert){
			$data1['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
				$this->db->where('id',$result['hospital_id']);
				$insertfinal = $this->db->update('clinic', $data1);
		return $insert?true:false;
		}
		}
	}
	public function insertTransactionhospital($data = array()){
			$this->db->select('center_packages.package_period,hospital_package.hospital_id,hospital_package.hospital_type');
		$this->db->from('hospital_package');
		$this->db->join('center_packages','FIND_IN_SET(center_packages.id, hospital_package.package_id) > 0', 'left');
		$this->db->where('hospital_package.id',$data['id']);
		$query = $this->db->get();
		$result = $query->row_array();
		if($result){
		$data['end_date'] = date("Y-m-d", strtotime("+ ".$result['package_period']));		
		$data['confirmed_date'] =date('Y-m-d');
		$data['status'] ="1";
		$this->db->where('id',$data['id']);
		$this->db->where('hospital_type','hospital');
		$insert = $this->db->update('hospital_package', $data);
		if($insert){
				$data1['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
				$this->db->where('id',$result['hospital_id']);
				$insertfinal = $this->db->update('hospital', $data1);
		return $insert?true:false;
		}
		}
	}
	public function insertTransactionmedical($data = array()){
		$this->db->select('center_packages.package_period,hospital_package.hospital_id,hospital_package.hospital_type');
		$this->db->from('hospital_package');
		$this->db->join('center_packages','FIND_IN_SET(center_packages.id, hospital_package.package_id) > 0', 'left');
		$this->db->where('hospital_package.id',$data['id']);
		$query = $this->db->get();
		$result = $query->row_array();
		if($result){
		$data['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
		$data['confirmed_date'] =date('Y-m-d');
		$data['status'] ="1";
		$this->db->where('id',$data['id']);
		$this->db->where('hospital_type','hospital');
		$insert = $this->db->update('hospital_package', $data);
		if($insert){
		$data1['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
				$this->db->where('id',$result['hospital_id']);
				$insertfinal = $this->db->update('medical_center', $data1);
		return $insert?true:false;	
	}
		}
	}
	/*public function insertTransactioncenter($data = array()){
		$this->db->select('center_packages.package_period,hospital_package.hospital_id,hospital_package.hospital_type');
		$this->db->from('hospital_package');
		$this->db->join('center_packages','FIND_IN_SET(center_packages.id, hospital_package.package_id) > 0', 'left');
		$this->db->where('center_packages.id',$data['id']);
		$query = $this->db->get();
		$result = $query->row_array();
		if($result['hospital_type'] == "clinic"){				  
		$data['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
		$data['confirmed_date'] =date('Y-m-d');
		$data['status'] ="1";
		$this->db->where('id',$data['id']);
		$insert = $this->db->update('hospital_package', $data);
		if($insert){
			$data1['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
				$this->db->where('id',$result['hospital_id']);
				$insertfinal = $this->db->update('clinic', $data1);
		return $insert?true:false;
		}
		}elseif($result['hospital_type'] == "medical"){
			$data['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
		$data['confirmed_date'] =date('Y-m-d');
		$data['status'] ="1";
		$this->db->where('id',$data['id']);
		$insert = $this->db->update('hospital_package', $data);
		if($insert){
		$data1['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
				$this->db->where('id',$result['hospital_id']);
				$insertfinal = $this->db->update('medical_center', $data1);
		return $insert?true:false;	
		}
		}elseif($result['hospital_type'] == "hospital"){
			$data['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
		$data['confirmed_date'] =date('Y-m-d');
		$data['status'] ="1";
		$this->db->where('id',$data['id']);
		$insert = $this->db->update('hospital_package', $data);
		if($insert){
				$data1['end_date'] = date("Y-m-d", strtotime("+".$result['package_period']));
				$this->db->where('id',$result['hospital_id']);
				$insertfinal = $this->db->update('hospital', $data1);
		return $insert?true:false;
		}
	}
			
	
	}*/
	
	}
	?>