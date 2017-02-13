	<?php
  $settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
       
?>
<?php echo $map['js']; ?>
<!--patient-login search-->
<div class="container-fluid srch-patient-log">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 srch-main">
          <form role="form" action="" method="post"  id="form_doctor_medical" class="form_doctor_medical formap" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row row-frm">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfncountry){ echo $lgfncountry; }else { ?>Country<?php } ?></label>
                                    <select   onchange="selectStatemedical(this.options[this.selectedIndex].value)" name="country" class="form-control filter-field_medical" id="exampleSelect1" required =" " >
									
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfnstate){ echo $lgfnstate; }else { ?>State<?php } ?></label>
									
                                   <select   onchange="selectCitymedical(this.options[this.selectedIndex].value)" name="state" class="form-control filter-field_medical" id="state_dropdown_medical" required =" " >
										 <option selected="selected" value="-1"><?php if($lgfndes7){ echo $lgfndes7; }else { ?>Select state<?php } ?></option> 
										 <?php
                                if(!empty($states) and isset($states)) {			                   			         
			                    //foreach($doctors as $doctor_detail){
								  foreach($states as $row_state){ 
								  
										     $selected = ($post_data['state'] == $row_state->id ? "selected" : "" );  
											  ?>
							<option value="<?php echo $row_state->id;?>" <?php echo $selected; ?>><?php echo $row_state->name;?></option> 
								<?php }}?>
								
								
						              </select> 
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfncity){ echo $lgfncity; }else { ?>City<?php } ?></label>
                                     <select    name="city" class="form-control filter-field_medical" id="city_dropdown_medical" required =" " >
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfnspecialty){ echo $lgfnspecialty; }else { ?>Specialty<?php } ?></label>
                                     <select   onchange="selectReason(this.options[this.selectedIndex].value)" name="specialty" class="form-control filter-field_medical" id="exampleSelect1"  required =" ">										
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfninsurance){ echo $lgfninsurance; }else { ?>Insurance<?php } ?></label>
                                     <select    name="insurance" class="form-control filter-field_medical" id="exampleSelect1" required =" " >
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleSelect1"><?php if($lgfnreason){ echo $lgfnreason; }else { ?>Reason<?php } ?></label>
                                   <select    name="visitation" class="form-control filter-field_medical" id="reason_dropdown" required =" " >
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
                    <h4><span><img src="<?php echo base_url(); ?>assets/images/home/form-3.png" > </span><?php if($lghostdes2){ echo $lghostdes2; }else { ?>Medical Centers near by You<?php } ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!--patient-login search-->

<div class="container-fluid mapfordoctor">

    <div class="google-map-doctor">
	<div class="img-responsive " id="canvas1">

	<?php echo $map['html']; ?>
	
		
	</div>
    </div>
    </div>
<!--doctor-->
<div class="container">
    <div class="doctor-sub">
       <h3><img src="<?php echo base_url(); ?>assets/images/patient-login/12.png"  ></h3>
        <h4><?php if($lghostdes1){ echo $lghostdes1; }else { ?>Select a Medical<?php } ?></h4>
    </div>
    <div class="doctor-pat-srch doctor-pat-srch-1">
        <div class="row">
            <div class="evnt-mn">
                <div class="col-lg-12">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 medical">
						<?php 
			if(!empty($medical)) {
			if(isset($medical)) {
			          
			foreach($medical as $medical_detail){
				?>
                        <div class="row">
                            <div class="col-lg-8 evt-br">						
                                <div class="left-events left-img-ph left-img-ph-2">
                                  <img src= "<?php echo $medical_detail->display_image;?>" >
                                </div>
                                <div class="left-events">
                                    <h5 class="lft-h5"><?php echo $medical_detail->medical_name;?></h5>
                                   <!-- <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>-->
								   <div class="gc-ratting" data-rate="<?php echo $medical_detail->avg_rating; ?>" ></div> 
                                    <div class="pt-ent">
                                        <div class="row">
                                            <div class="col-lg-1">
                                               <img src="<?php echo base_url(); ?>assets/images/patient-login/13.png"  > 
                                            </div>
                                            <div class="col-lg-4">
                                                <h6><?php echo $medical_detail->city_name;?>,<?php echo $medical_detail->state_name;?>, <?php echo $medical_detail->country_name;?> <?php echo $medical_detail->medical_zip;?></h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="col-lg-3 evt-br-1 view-cln-1">
                            <div class="view-clinic">
                                <a href ="<?php echo base_url(); ?>Medical/Search_doctor/<?php echo $medical_detail->id; ?>"><h4><span><img src="<?php echo base_url(); ?>assets/images/patient-login/eye.png"  /> </span><?php if($lghostdes7){ echo $lghostdes7; }else { ?>View <?php } ?> </h4></a>
                            </div>
                            </div>
                        </div>
						<div class="clearfix"></div>
						<!------------ before row ----->
						<?php   } 
			}				
			        } else {
						?>
						
			       <div class="error"><h1><?php if($lgfderror){ echo $lgfderror; }else { ?>Sorry, No records found. Please try with different keywords.<?php } ?> </h1></div>
			       
									
			
			<?php  }
				
?>
						<!----end--->
                    </div>
                    <div class="col-lg-1"></div>
                </div>

            </div>

        </div>
			<div class="clearfix"></div>
			<div class="clearfix"></div>
        <?php		
         if(!empty($medical)) {
				   ?>
        <div class="view-more loadmore">
		<div id="moremedical<?php echo $medical_detail->id; ?>" class="moreboxmedical">
                        
            <a href="#" id="<?php  echo $medical_detail->id; ?>" class="filterloadmore_medical" ><h3><span><img src="<?php echo base_url(); ?>assets/images/patient-login/vmore.png" /> </span><?php if($lgfdviewmore){ echo $lgfdviewmore; }else { ?>View More<?php } ?></h3></a>
        </div>            
        </div>
		<?php } ?>
    </div>

</div>
<!--doctor-->