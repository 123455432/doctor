	<?php
  $settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
       
?>
<!---- map loader js ---------->

<!--patient-login search-->
<div class="container-fluid srch-patient-log" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 srch-main">
			<!----filter form post---------->
          <form role="form" action="" method="post"  id="form_doctor" class="form_doctor formap" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row row-frm">
                            <div class="col-lg-3">
							<!----onchange function for city by state and state by country ---------->
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfncountry){ echo $lgfncountry; }else { ?>Country<?php } ?></label>
                                    <select   onchange="selectState(this.options[this.selectedIndex].value)" name="country" class="form-control filter-field" id="exampleSelect1" required =" " >
									
									<option selected="selected" value="-1"><?php if($lgfndes5){ echo $lgfndes5; }else { ?> Select country<?php } ?> </option>
                                  <?php
                                
								  foreach($countries as $row_country){ 
								 
									$selected = ($post_data['country'] == $row_country->id ? "selected" : "" ); 
								  ?>
									<option value="<?php echo $row_country->id;?>" <?php echo $selected; ?>><?php echo $row_country->country_name;?></option> 
								<?php }   ?>
						              </select>       
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfnstate){ echo $lgfnstate; }else { ?>State<?php } ?></label>
									
                                   <select   onchange="selectCity(this.options[this.selectedIndex].value)" name="state" class="form-control filter-field" id="state_dropdown" required =" " >
										 <option selected="selected" value="-1"><?php if($lgfndes7){ echo $lgfndes7; }else { ?>Select state<?php } ?></option> 
										 <?php
                                if(!empty($states) and isset($states)) {
								  foreach($states as $row_state){ 
								  
										     $selected = ($post_data['state'] == $row_state->id ? "selected" : "" );  
											  ?>
							<option value="<?php echo $row_state->id;?>" <?php echo $selected; ?>><?php echo $row_state->name;?></option> 
								<?php }}?>
																
						              </select> 
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfncity){ echo $lgfncity; }else { ?>City<?php } ?></label>
                                     <select    name="city" class="form-control filter-field" id="city_dropdown" required =" " >
										<option selected="selected" value="-1"><?php if($lgfndes8){ echo $lgfndes8; }else { ?>Select city<?php } ?></option>  
										<?php
                                if(!empty($cities) and isset($cities)) {			                   			         			                   
								  foreach($cities as $row_city){ 								   
										     $selected = ($post_data['city'] == $row_city->id ? "selected" : "" );  
											  ?>
							<option value="<?php echo $row_city->id;?>" <?php echo $selected; ?>><?php echo $row_city->name;?></option> 
								<?php }}?>                             
						              </select> 
                                </div>
                            </div>
                            <div class="col-lg-3">
							<!----onchange function for reason by specialty ---------->
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfnspecialty){ echo $lgfnspecialty; }else { ?>Specialty<?php } ?></label>
                                     <select   onchange="selectReason(this.options[this.selectedIndex].value)" name="specialty" class="form-control filter-field" id="exampleSelect1"  required =" ">										
										<option selected="selected" value="-1"><?php if($lgfndes6){ echo $lgfndes6; }else { ?>Select specialty<?php } ?></option>                                 
                             <?php
                                if(!empty($specialties) and isset($specialties)) {			                   			         			                   
								  foreach($specialties as $row_specialty){ 								  
										     $selected = ($post_data['specialty'] == $row_specialty->id ? "selected" : "" );  
											  ?>
							<option value="<?php echo $row_specialty->id;?>" <?php echo $selected; ?>><?php echo $row_specialty->specialty_name;?></option> 
								<?php }}?>                             							
								  </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfninsurance){ echo $lgfninsurance; }else { ?>Insurance<?php } ?></label>
                                     <select    name="insurance" class="form-control filter-field" id="exampleSelect1" required =" " >
										<option selected="selected" value=""><?php if($lgfndes9){ echo $lgfndes9; }else { ?>Select Insurance<?php } ?></option>
                                  <?php
                                if(!empty($insurance) and isset($insurance)) {			                   			         			                   
								  foreach($insurance as $row_insurance){ 								  
										     $selected = ($post_data['insurance'] == $row_insurance->id ? "selected" : "" );  
											  ?>
							<option value="<?php echo $row_insurance->id;?>" <?php echo $selected; ?>><?php echo $row_insurance->insurance_name;?></option> 
								<?php }} ?>
                            
						              </select> 
                                </div>
                            </div>
							<div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfnlanguage){ echo $lgfnlanguage; }else { ?>Language<?php } ?></label>
                                     <select    name="language" class="form-control filter-field" id="exampleSelect1" required =" " >
										<option selected="selected" value=""><?php if($lgfndes10){ echo $lgfndes10; }else { ?>Select Language<?php } ?></option>
                                   <?php
                                if(!empty($languages) and isset($languages)) {			                   			         			                    
								  foreach($languages as $row_language){  								  
										     $selected = ($post_data['language'] == $row_language->id ? "selected" : "" );  
											  ?>
							<option value="<?php echo $row_language->id;?>" <?php echo $selected; ?>><?php echo $row_language->language_name;?></option> 
								<?php }} ?>                            
						              </select> 
                                </div>
                            </div>
							<div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfngender){ echo $lgfngender; }else { ?>Gender<?php } ?></label>
                                     <select class="form-control filter-field" id="exampleSelect1" name="gender" required =" ">  
							<option selected="selected" value=""><?php if($lgfndes11){ echo $lgfndes11; }else { ?>Gender<?php } ?></option>
							   <?php                                								 
							$selectedA = ($post_data['gender'] == 'Female' ? "selected" : "" ); 
							$selectedB = ($post_data['gender'] == 'Male' ? "selected" : "" ); 
											  ?>
                      <option value="Female" <?php echo 'selectedA'; ?> > Female </option>
					  <option value="Male" <?php echo 'selectedB'; ?> > Male </option>
								
								
                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfnreason){ echo $lgfnreason; }else { ?>Reason<?php } ?></label>
                                   <select    name="visitation" class="form-control filter-field" id="reason_dropdown" required =" " >
										<option selected="selected" value="-1"><?php if($lgfndes12){ echo $lgfndes12; }else { ?>Select reason<?php } ?></option>
                                  <?php
                                if(!empty($reasons) and isset($reasons)) {			                   			         			                   
								  foreach($reasons as $row_reason){ 								  
										     $selected = ($post_data['visitation'] == $row_reason->id ? "selected" : "" );  
											  ?>
							<option value="<?php echo $row_reason->id;?>" <?php echo $selected; ?>><?php echo $row_reason->name;?></option> 
								<?php }}?>
                             
						              </select> 
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-lg-2">
                       <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-pat"><img src="<?php echo base_url(); ?>assets/images/patient-login/10.png"> </button>
                       </div>
                   </div>
                </div>

            </form>
            </div>
            <div class="col-lg-12">
                <div class="doctor">
                    <h4><span><img src="<?php echo base_url(); ?>assets/images/patient-login/11.png" > </span><?php if($lgfddnby){ echo $lgfddnby; }else { ?>Doctors near by You<?php } ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!--patient-login search-->

<div class="container-fluid mapfordoctor">

    <div class="google-map-doctor">
	<div class="img-responsive " id="canvas1">
<?php echo $map['js']; ?>
	<?php echo $map['html']; ?>
	
		
	</div>
    </div>
    </div>
<!--doctor-->
<div class="container">
    <div class="doctor-sub">
       <h3><img src="<?php echo base_url(); ?>assets/images/patient-login/12.png"  ></h3>
        <h4><?php if($lgfdsasd){ echo $lgfdsasd; }else { ?>Select a Speciality Doctor <?php } ?></h4>
    </div>
    <div class="doctor-pat-srch">
     
        <div class="row">
		<input type="hidden" value='<?php echo $actual_data;?>' id="actual_data">
            <div class="evnt-mn doctor" id="updates">
			<div class="col-lg-6" style="padding-right: 0px;">
			<?php 
			if(!empty($doctors)) {
			if(isset($doctors)) {
			          
			foreach($doctors as $doctor_detail){
				?>
                <div class="evt-br doctor">
				
                    <div class="left-events left-img-ph">
                        <?php if($doctor_detail->display_image != ""){ ?>
                        <img src= "<?php echo $doctor_detail->display_image;?>" >
			<?php }else{ ?>
						<img src="<?php echo base_url(); ?>assets/images/home/man.png">
			<?php  }?>
                    </div>
                    <div class="left-events">
                        <h5>Dr. <?php echo $doctor_detail->doctor_firstname;?> <?php echo $doctor_detail->doctor_lastname;?></h5>
						<div class="gc-ratting" data-rate="<?php echo $doctor_detail->avg_rating; ?>" ></div> 
                        <!--<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>-->
                        <div class="pt-ent">
                            <div class="row">
                                <div class="col-lg-1">
                                    <img src="<?php echo base_url(); ?>assets/images/patient-login/13.png" />
                                </div>
                                <div class="col-lg-4">
                                    <h6> <?php echo $doctor_detail->city_name;?>,<?php echo $doctor_detail->state_name;?>, <?php echo $doctor_detail->country_name;?> <?php echo $doctor_detail->doctor_office_zip;?></h6>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="view-prf">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="<?php echo base_url(); ?>assets/images/patient-login/14.png" />
                                <h6><a href ="<?php echo base_url(); ?>Doctor/Profile/<?php echo $doctor_detail->id; ?>"><?php if($lgfdviewprofile){ echo $lgfdviewprofile; }else { ?>View Profile<?php } ?></a></h6>
                            </div>
                            <div class="col-lg-4">
                                <img src="<?php echo base_url(); ?>assets/images/patient-login/15.png" />
                                <h6><a class ="modalbookapp" href ="javascript:void(0);" id="<?php echo $doctor_detail->id; ?>" ><?php if($lgfdbookonline){ echo $lgfdbookonline; }else { ?>Book Online<?php } ?></a></h6>
                            </div>
                        </div>
                    </div>
                </div>
			<?php } ?>
			</div>
                <div class="col-lg-5 evt-br-1" id="calendar_blk">
				<?php foreach($doctors as $doctor_detail){ 
				get_doccalendar($doctor_detail->id);
				
				?>
				
				 <?php } ?>
                </div>
				<?php  // } 
			}				
			        } else {
						?>
						
			       <div class="error"><h1><?php if($lgfderror){ echo $lgfderror; }else { ?>Sorry, No records found. Please try with different keywords.<?php } ?> </h1></div>
			       	<div class="clearfix"></div>
									
			
			<?php  }
				
?>
            </div>
			</div>
			
			
			
		
			
			
			
		<?php		
         if(!empty($doctors)) {
				   ?>
        <div class="view-more loadmore">
		 <div id="moredoctor<?php echo $doctor_detail->id; ?>" class="moreboxdoctor">
                        
            <a href="#" id="<?php  echo $doctor_detail->id; ?>" class="filterloadmore" ><h3><span><img src="<?php echo base_url(); ?>assets/images/patient-login/vmore.png" /> </span><?php if($lgfdviewmore){ echo $lgfdviewmore; }else { ?>View More<?php } ?></h3></a>
        </div>
    </div>
		 <?php } ?>

</div>
<!--doctor-->
</div>

<!----- for modal ---->
		
<div class="modal bookingdoc fade" id="myModal-calendar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php if($lgfdapdetails){ echo $lgfdapdetails; }else { ?>Appointment Details<?php } ?></h4>
        </div>
        <div class="modal-body" id="bookingdoc" >
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php if($lgfdapclose){ echo $lgfdapclose; }else { ?>Close<?php } ?></button>
        </div>
      </div>
</div>
</div>

       		<!----- for modal ---->	 
		