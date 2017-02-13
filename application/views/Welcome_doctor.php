<?php $trial_date=$this->session->userdata['frontend_logged_in']['trial_date']; ?>
<?php $end_date=$this->session->userdata['frontend_logged_in']['end_date']; ?>
<?php $current_date = date('Y-m-d'); ?>
	<?php
  $settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
       
?>
<!-----------------slider---------------->



<div class="share animated zoomIn hvr-grow">
    <img src="<?php echo base_url(); ?>assets/images/home/share.png"  alt=""/>
</div>
<div class="find-main col-lg-6 nopadding">
    <div class="find col-lg-1 nopadding">
        <img class="hvr-grow" src="<?php echo base_url(); ?>assets/images/home/find.png"  alt=""/>
    </div>

    <div class="container find-div col-lg-11 nopadding col-lg-offset-1">
        <div class="col-lg-12 nopadding">
            <div class="find-sub col-lg-1 nopadding">
                <img class="hvr-grow" src="<?php echo base_url(); ?>assets/images/home/find.png" alt=""/>
            </div>

            <div class="col-lg-12 tab-find ">
                <ul class="nav nav-tabs nav-tab-find">
                    <li class="active"><a data-toggle="tab" href="#home"><span><img src="<?php echo base_url(); ?>assets/images/home/form-1.png" /> </span><?php if($lgfndoctor){ echo $lgfndoctor; }else { ?> Doctor<?php } ?></a></li>
                    <li><a data-toggle="tab" href="#menu1"><span><img src="<?php echo base_url(); ?>assets/images/home/form-2.png" /> </span><?php if($lgfnclinic){ echo $lgfnclinic; }else { ?> Clinic<?php } ?></a></li>
                    <li><a data-toggle="tab" href="#menu2"><span><img src="<?php echo base_url(); ?>assets/images/home/form-3.png" /> </span><?php if($lgfnmedical){ echo $lgfnmedical; }else { ?> Medical Center<?php } ?></a></li>
                    <li><a data-toggle="tab" href="#menu3"><span><img src="<?php echo base_url(); ?>assets/images/home/form-4.png" /> </span><?php if($lgfnhospital){ echo $lgfnhospital; }else { ?> Hospital<?php } ?></a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                       <form role="form" action="<?php echo base_url();?>Doctor" method="post"   class="animated fadeIn" enctype="multipart/form-data"> 
                            <div class="form-group">
							<?php
			if($countries > 0){
				?>
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
									<select   onchange="selectStateclinichome(this.options[this.selectedIndex].value)" name="country" class="form-control" id="exampleSelect1"  >
									
									<option selected="selected" value="-1"><?php if($lgfndes5){ echo $lgfndes5; }else { ?> Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select>                                                         
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectCityclinichome(this.options[this.selectedIndex].value)" name="state" class="form-control" id="state_dropdown_clinic_home"  >
										<option selected="selected" value="-1"><?php if($lgfndes7){ echo $lgfndes7; }else { ?>Select state<?php } ?></option>                                 
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="city" class="form-control" id="city_dropdown_clinic_home"  >
										<option selected="selected" value="-1"><?php if($lgfndes8){ echo $lgfndes8; }else { ?>Select city<?php } ?></option>                                  
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
							<?php
			}else{
				echo 'No Country Name Found';
			}
			?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectReason(this.options[this.selectedIndex].value)" name="specialty" class="form-control" id="exampleSelect1"  >										
										<option selected="selected" value="-1"><?php if($lgfndes6){ echo $lgfndes6; }else { ?>Select specialty<?php } ?></option>
                                  <?php foreach($specialties as $row_specialty){  ?>
                             <option value="<?php echo $row_specialty->id;?>"><?php echo $row_specialty->specialty_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="insurance" class="form-control" id="exampleSelect1"  >
										<option selected="selected" value=""><?php if($lgfndes9){ echo $lgfndes9; }else { ?>Insurance<?php } ?></option>
                                  <?php foreach($insurance as $row_insurance){  ?>
                             <option value="<?php echo $row_insurance->id;?>"><?php echo $row_insurance->insurance_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="language" class="form-control" id="exampleSelect1"  >
										<option selected="selected" value=""><?php if($lgfndes10){ echo $lgfndes10; }else { ?>Language<?php } ?></option>
                                  <?php foreach($languages as $row_language){  ?>
                             <option value="<?php echo $row_language->id;?>"><?php echo $row_language->language_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
							<!-----new--->
							<div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
							<select class="form-control" id="exampleSelect1" name="gender" >  
							<option selected="selected" value=""><?php if($lgfndes11){ echo $lgfndes11; }else { ?>Gender<?php } ?></option>
                      <option >Female</option>
					  <option>Male</option>
                    </select>
					              </div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </div>
					<!------>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="visitation" class="form-control" id="reason_dropdown"  >
										<option selected="selected" value="-1"><?php if($lgfndes12){ echo $lgfndes12; }else { ?>Select reason<?php } ?></option>
                                 <!-- <?php //foreach($visitation as $row_visit){  ?>
                             <option value="<?php //echo $row_visit->id;?>"><?php// echo $row_visit->reason;?></option>
                                  <?php // }   ?>--->
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8" style="padding:0;">
                                    <button type="submit" class="btn btn-default btn-form"><i class="fa fa-search"></i><?php if($lgfndes1){ echo $lgfndes1; }else { ?>  Find Doctors<?php } ?></button>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </form>

                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <form role="form" action="<?php echo base_url();?>Clinic" method="post"   class="animated fadeIn" enctype="multipart/form-data"> 
                            <div class="form-group">
							<?php
			if($countries > 0){
				?>
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectStateclinichome(this.options[this.selectedIndex].value)"  name="country" class="form-control" id="exampleSelect1"  >
									<option selected="selected" value="-1"><?php if($lgfndes5){ echo $lgfndes5; }else { ?> Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select  onchange="selectCityclinichome(this.options[this.selectedIndex].value)"  name="state" class="form-control" id="state_dropdown_clinic_home" >
										<option selected="selected" value="-1"><?php if($lgfndes7){ echo $lgfndes7; }else { ?>Select state<?php } ?></option>
                                  
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                       <select    name="city" class="form-control" id="city_dropdown_clinic_home"  >
										<option selected="selected" value="-1"><?php if($lgfndes8){ echo $lgfndes8; }else { ?>Select city<?php } ?></option>                                  
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
							<?php
			}else{
				echo 'No Country Name Found';
			}
			?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectReasonClinic(this.options[this.selectedIndex].value)" name="specialty" class="form-control" id="exampleSelect1"  >
										<option selected="selected" value="-1"><?php if($lgfndes6){ echo $lgfndes6; }else { ?>Select specialty<?php } ?></option> 
                                  <?php foreach($specialties as $row_specialty){  ?>
                             <option value="<?php echo $row_specialty->id;?>"><?php echo $row_specialty->specialty_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="insurance" class="form-control" id="exampleSelect1"  >
										<option selected="selected" value=""><?php if($lgfndes9){ echo $lgfndes9; }else { ?>Insurance<?php } ?></option>
                                  <?php foreach($insurance as $row_insurance){  ?>
                             <option value="<?php echo $row_insurance->id;?>"><?php echo $row_insurance->insurance_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="visitation" class="form-control" id="reason_dropdown_clinic" >
										<option selected="selected" value="-1"><?php if($lgfndes12){ echo $lgfndes12; }else { ?>Select reason<?php } ?></option> 
                                 		</select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8" style="padding:0;">
                                    <button type="submit" class="btn btn-default btn-form"><i class="fa fa-search"></i><?php if($lgfndes2){ echo $lgfndes2; }else { ?>  Find Clinics<?php } ?></button>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </form>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                       <form role="form" action="<?php echo base_url();?>Medical" method="post"   class="animated fadeIn" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectStatemedical(this.options[this.selectedIndex].value)" name="country" class="form-control" id="exampleSelect1"  >
									<option  selected="selected" value="-1"><?php if($lgfndes5){ echo $lgfndes5; }else { ?> Select Country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectCitymedical(this.options[this.selectedIndex].value)" name="state" class="form-control" id="state_dropdown_medical"  >
										<option selected="selected" value="-1"><?php if($lgfndes7){ echo $lgfndes7; }else { ?>Select state<?php } ?></option>                                  
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                       <select    name="city" class="form-control" id="city_dropdown_medical"  >
										<option selected="selected" value="-1"><?php if($lgfndes8){ echo $lgfndes8; }else { ?>Select city<?php } ?></option>                                  
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectReasonMedical(this.options[this.selectedIndex].value)" name="specialty" class="form-control" id="exampleSelect1"  >
										<option selected="selected" value="-1"><?php if($lgfndes6){ echo $lgfndes6; }else { ?>Select specialty<?php } ?></option>
                                  <?php foreach($specialties as $row_specialty){  ?>
                             <option value="<?php echo $row_specialty->id;?>"><?php echo $row_specialty->specialty_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="insurance" class="form-control" id="exampleSelect1"  >
										<option selected="selected" value=""><?php if($lgfndes9){ echo $lgfndes9; }else { ?>Insurance<?php } ?></option>
                                  <?php foreach($insurance as $row_insurance){  ?>
                             <option value="<?php echo $row_insurance->id;?>"><?php echo $row_insurance->insurance_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="visitation" class="form-control" id="reason_dropdown_medical" required =" " >
										<option selected="selected" value="-1"><?php if($lgfndes12){ echo $lgfndes12; }else { ?>Select reason<?php } ?></option>                                  
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8" style="padding:0;">
                                    <button type="submit" class="btn btn-default btn-form"><i class="fa fa-search"></i><?php if($lgfndes3){ echo $lgfndes3; }else { ?>  Find Medical Centers<?php } ?></button>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </form>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <form role="form" action="<?php echo base_url();?>Hospital" method="post"   class="animated fadeIn" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectStatehospital(this.options[this.selectedIndex].value)" name="country" class="form-control" id="exampleSelect1"  >
									<option selected="selected" value="-1"><?php if($lgfndes5){ echo $lgfndes5; }else { ?> Select Country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select  onchange="selectCityhospital(this.options[this.selectedIndex].value)"  name="state" class="form-control" id="state_dropdown_hospital"  >
										<option selected="selected" value="-1"><?php if($lgfndes7){ echo $lgfndes7; }else { ?>Select state<?php } ?></option>                                  
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                       <select    name="city" class="form-control" id="city_dropdown_hospital"  >
										<option selected="selected" value="-1"><?php if($lgfndes8){ echo $lgfndes8; }else { ?>Select city<?php } ?></option>                                  
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select   onchange="selectReasonHospital(this.options[this.selectedIndex].value)" name="specialty" class="form-control" id="exampleSelect1"  >
										<option selected="selected" value="-1"><?php if($lgfndes6){ echo $lgfndes6; }else { ?>Select specialty<?php } ?></option>
                                  <?php foreach($specialties as $row_specialty){  ?>
                             <option value="<?php echo $row_specialty->id;?>"><?php echo $row_specialty->specialty_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="insurance" class="form-control" id="exampleSelect1"  >
										<option selected="selected" value=""><?php if($lgfndes9){ echo $lgfndes9; }else { ?>Insurance<?php } ?></option>
                                  <?php foreach($insurance as $row_insurance){  ?>
                             <option value="<?php echo $row_insurance->id;?>"><?php echo $row_insurance->insurance_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <select    name="visitation" class="form-control" id="reason_dropdown_hospital"  >
										<option selected="selected" value="-1"><?php if($lgfndes12){ echo $lgfndes12; }else { ?>Select reason<?php } ?></option>                                 
						              </select> 
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8" style="padding:0;">
                                    <button type="submit" class="btn btn-default btn-form"><i class="fa fa-search"></i> <?php if($lgfndes4){ echo $lgfndes4; }else { ?> Find Hospitals<?php } ?></button>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>











<!--------------------end----------------------->





<!--patient-login-->
<div class="container">
    <div class="col-lg-12">
	<?php if($end_date == '' & $trial_date >= $current_date  ){?>
									
									
									<div class="alert">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<h3><?php if($lgdoctormod74){ echo $lgdoctormod74; }else { ?>Alert Message<?php } ?>:</h3>
                                            <h4> <?php if($lgdoctormod75){ echo $lgdoctormod75; }else { ?>You are using 15 days free trial version.Once the trial period is expired , your details listing will be removed from Search Filter. Select any package to extend your service under Bookmydoc.<?php } ?>
								</h4>
					</div>
								 
                                       
										<?php } elseif($end_date < $current_date) { ?>
									
									<div class="alert">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<h3><?php if($lgdoctormod74){ echo $lgdoctormod74; }else { ?>Alert Message<?php } ?>:</h3>
                                            <h4>  <?php if($lgdoctormod76){ echo $lgdoctormod76; }else { ?>Your Package period is expired . Kindly Select any package to list your details under Bookmydoc.<?php } ?>
								</h4>
					</div>
								 
                                        
									<?php } else{ ?>
									
									
                                        
									
									<?php } ?>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="profile-head">
				<div class="doctor_personal">
                    <img src= "<?php echo $doctor_personal->display_image;?>" />
					
					</div>
					<form method="post" id="doctor_imagefirst" enctype="multipart/form-data">
									   <input type="hidden" name="submitpatient1" value="submitpatient1" id="submitpatient1" >
                                       <label><input type="file" name="display_image" id="doctor_image" style="opacity: 0;"><img class="docimg_img" src="<?php echo base_url(); ?>assets/images/patient-login/edit.png" />  </label>
                                   </form>
                </div>
                <div class="profile-head">
                    <h3><span><?php if($lgpatientmod1){ echo $lgpatientmod1; }else { ?>Welcome<?php } ?>,</span> <?php echo $doctor_personal->doctor_firstname;?> <?php echo $doctor_personal->doctor_lastname;?></h3>
                    <h4><span><?php if($lgdoctormod78){ echo $lgdoctormod78; }else { ?>Age<?php } ?>:</span> <?php echo $doctor_personal->doctor_age;?></h4>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>

        <div class="row">
            <div class="col-lg-offset-1 col-lg-10">
                <div class="col-lg-12">
                    <div class="serch-main">
                        <div class="col-lg-8">
                        <h4><?php if($lgpatientmod2){ echo $lgpatientmod2; }else { ?>More than 5 million patients use bookmydoc to find doctors  every month.
                            Let them book appointments with use instantly<?php } ?></h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="search-lg-mn">
                                <a href = "<?php echo base_url(); ?>Doctor"><img src="<?php echo base_url(); ?>assets/images/patient-login/sr.png"  />
                                <span><?php if($lgpatientmod3){ echo $lgpatientmod3; }else { ?>Search now<?php } ?></span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<div class="container-fluid ">


            <div class="tab-cnt-search">

               <div class="container">
                   <ul class="nav nav-tabs  nav-tb dct-tab">
                       <li class="active"><a data-toggle="tab" href="#homes"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/2.1.png" /> </span><?php if($lgdoctormod1){ echo $lgdoctormod1; }else { ?>Appointment<?php } ?></a></li>
                       <li><a data-toggle="tab" href="#menus1"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/calen.png" /> </span><?php if($lgdoctormod2){ echo $lgdoctormod2; }else { ?>Calender Setting<?php } ?></a></li>
                       <li><a data-toggle="tab" href="#menus2"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/2.3.png" /> </span><?php if($lgdoctormod3){ echo $lgdoctormod3; }else { ?>Settings<?php } ?></a></li>
                   </ul>
               </div>

                 <div class="container-fluid tab-fluid">
                     <div class="container">
                         <div class="tab-content tb-patient">
						 
						 <!----calendar--->
                             <div id="homes" class="tab-pane fade in active">
                       <div class="row">
                           <div class="container">
                               <div class="row">
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                       <div id="my-calendar">
									   <?php //echo getCalender(); ?>
									   
									   </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                             </div>
							 
							 
							<!----model cal---->
<!-- Modal -->
  <div class="modal calendar fade" id="myModal-calendar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php if($lgbookingmod29){ echo $lgbookingmod29; }else { ?>Appointment Details<?php } ?></h4>
        </div>
        <div class="modal-body" id="calendarmodal" >
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php if($lgfdapclose){ echo $lgfdapclose; }else { ?>Close<?php } ?></button>
        </div>
      </div>
</div>
</div>


                             <!----model cal---->							
							 		
							 <!----calendar--->
			
							 
							 
                             <div id="menus1" class="tab-pane fade">
                                 <div class="tab-cnt-search">

                                     <div class="container">
                                         <div class="row">
                                             <div class="col-lg-offset-2 col-lg-8">
                                                 <ul class="nav nav-tabs  nav-tb dct-inner-tab  dct-inner-tab-1">
                                                     <li class="active"><a data-toggle="tab" href="#homess"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/nw-c.png" /> </span><?php if($lgdoctormod4){ echo $lgdoctormod4; }else { ?>Work Plan<?php } ?></a></li>
                                                     <li><a data-toggle="tab" href="#menuss1"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/break.png" /> </span><?php if($lgdoctormod79){ echo $lgdoctormod79; }else { ?>Breaks<?php } ?></a></li>
                                                     <li><a data-toggle="tab" href="#menuss2"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/vacation.png" /> </span><?php if($lgdoctormod80){ echo $lgdoctormod80; }else { ?>Vacations<?php } ?></a></li>
                                                 </ul>
                                                 </div>
                                             </div>

                                     </div>

                                     <div class="container-fluid ">
                                         <div class="container">
                                             <div class="tab-content tb-patient">
                                                 <div id="homess" class="tab-pane fade in active">
												 <?php
				    if($this->session->flashdata('messagework')) {
				    $messagework = $this->session->flashdata('messagework');
					?>
					<div class="alert alert-<?php echo $messagework['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagework['messagework']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                     <div class="col-lg-offset-1 col-lg-10">
													 <form  method="post" action="">
                                                         <div class="table-responsive">
                                                             <table class="table table-custom table-calender checkcalworktable">
                                                                 <thead>
                                                                 <tr>
																    <th><input type="checkbox" class="checkall" value="" /><?php if($lgdoctormod5){ echo $lgdoctormod5; }else { ?>Checkall<?php } ?></th>
                                                                     <th><?php if($lgdoctormod6){ echo $lgdoctormod6; }else { ?>Day<?php } ?></th>
                                                                     <th><?php if($lgdoctormod7){ echo $lgdoctormod7; }else { ?>Start<?php } ?></th>
                                                                     <th><?php if($lgdoctormod8){ echo $lgdoctormod8; }else { ?>End<?php } ?></th>
                                                                     <th><?php if($lgdoctormod9){ echo $lgdoctormod9; }else { ?>Actions<?php } ?></th>
                                                                 </tr>
                                                                 </thead>
                                                                 <tbody>
																 <?php $working_time = (!empty($doctor_schedule['working_time'])) ? json_decode($doctor_schedule['working_time'],true) : array();?>																 
																 	
																	<?php foreach ($Days as $key => $value) { ?>
                                                                 <tr>
																 <td ><input type="checkbox" /></td>
                                                                     <td><ul>
                                                                             <li><span><?php echo $value;?></span></li>
                                                                         </ul></td>
																		 <div class="timecal1">
                                                                     <td><h4><input  style="width: 70px;" type="text" class="timepicker pickwkt" name="work[<?php echo $days[$key];?>][start]" value="<?php echo (!empty($working_time)) ? isset($working_time[ $days[$key]]['start']) ? $working_time[ $days[$key]]['start'] :'' : '';?>" readonly></h4></td>
                                                                     <td><h4><input   style="width: 70px;" type="text"   class="timepicker pickwkt"  name="work[<?php echo $days[$key];?>][end]" value="<?php echo (!empty($working_time)) ? isset($working_time[ $days[$key]]['end']) ? $working_time[ $days[$key]]['end'] :'' : '';?>" readonly></h4></td>
																	 </div>
																	 

                                                                     <td><a href="javascript:void(0);" class="checkcalworkedit">
                                                                             <i class="fa fa-pencil edit-link"></i>
                                                                         </a> </td>

                                                                 </tr>
                                                                 <?php } ?>
                                                                 </tbody>
                                                             </table>
                                                         </div>
														 <button value="doctorsubmitwork" type="submit" name="doctorsubmitwork" id="checkcalworkbutton" class="btn btn-default checkcalworkbutton"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod18){ echo $lgdoctormod18; }else { ?>Update<?php } ?></button>
                                                     </form>
													 </div>
                                                     <div class="col-lg-12">
                                                         <h5 class="pad-center pad-center-1"><img src="<?php echo base_url(); ?>assets/images/patient-login/tick.png" > </h5>
                                                     </div>
                                                 </div>
                                                 <div id="menuss1" class="tab-pane fade">
												 <?php
				    if($this->session->flashdata('messagebreak')) {
				    $messagebreak = $this->session->flashdata('messagebreak');
					?>
					<div class="alert alert-<?php echo $messagebreak['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagebreak['messagebreak']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                     <div class="col-lg-offset-1 col-lg-10">
													 <form  method="post" action="">
                                                         <div class="table-responsive">
                                                             <table class="table table-custom table-calender checkcalbreaktable" >
                                                                 <thead>
                                                                 <tr>
																  <th><input type="checkbox" class="checkallbreak" value="" /><?php if($lgdoctormod9){ echo $lgdoctormod9; }else { ?>Checkall<?php } ?></th>
                                                                     <th><?php if($lgdoctormod6){ echo $lgdoctormod6; }else { ?>Day<?php } ?></th>
                                                                     <th><?php if($lgdoctormod7){ echo $lgdoctormod7; }else { ?>Start<?php } ?></th>
                                                                     <th><?php if($lgdoctormod8){ echo $lgdoctormod8; }else { ?>End<?php } ?></th>
                                                                     <th><?php if($lgdoctormod10){ echo $lgdoctormod10; }else { ?>Actions<?php } ?></th>
                                                                 </tr>
                                                                 </thead>
																 
																 <?php $break_time = (!empty($doctor_schedule['break_time'])) ? json_decode($doctor_schedule['break_time'],true) : array('mon'=>array(array('start'=>'','end'=>'')),'tue'=>array(array('start'=>'','end'=>'')),'wed'=>array(array('start'=>'','end'=>'')),'thu'=>array(array('start'=>'','end'=>'')),'fri'=>array(array('start'=>'','end'=>'')),'sat'=>array(array('start'=>'','end'=>'')),'sun'=>array(array('start'=>'','end'=>'')));?>																
																 <tbody class="parent_class">
																 	<?php foreach ($Days as $key => $value) { ?>
																	<?php if (isset($break_time[$days[$key]])){ ?>
																	<?php  foreach ($break_time[$days[$key]] as $br_key => $breaktime) {?>
                                                                 																 
																 <div target=".<?php echo $value;?>" >
                                                                 <tr class="clone_break">
																 <td ><input type="checkbox" class="daycheckone"name="<?php echo $value;?>"/></td>
                                                                     <td><ul>
                                                                             <li><span><?php echo $value;?></span></li>
                                                                         </ul></td>
                                                                    <td><h4><input  style="width: 70px;" type="text" class="timepicker start" name="break[<?php echo $days[$key];?>][start][]" value="<?php echo (!empty($break_time)) ? isset($breaktime['start']) ? $breaktime['start'] :'' : '';?>" readonly></h4></td>
                                                                    <td><h4><input   style="width: 70px;" type="text" class="timepicker end" name="break[<?php echo $days[$key];?>][end][]" value="<?php echo (!empty($break_time)) ? isset($breaktime['end']) ? $breaktime['end'] :'' : '';?>" readonly></h4></td>
                                                                     <td>
                                                                         <a href="javascript:void(0);" class="checkcalbreakedit"  >
                                                                             <i class="fa fa-pencil edit-link"></i>
                                                                         </a>
																		  <a href="javascript:void(0);" class="add_calbreak" >
                                                                             <i class="fa fa-plus edit-link-1"></i>
                                                                         </a>
                                                                         <a href="javascript:void(0);" class="remove_calbreak">
                                                                             <i class="fa fa-times edit-link-1"></i>
                                                                         </a>
                                                                        
                                                                     </td>

                                                                 </tr></div>
																	
                                                                
																	<?php } } } ?> </tbody>
                                                             </table>
                                                         </div>
														 <button value="doctorsubmitbreak" type="submit" name="doctorsubmitbreak" id="checkcalbreakbutton" class="btn btn-default checkcalbreakbutton"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod18){ echo $lgdoctormod18; }else { ?>Update<?php } ?></button>
														 </form>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <h5 class="pad-center pad-center-1"><img src="<?php echo base_url(); ?>assets/images/patient-login/tick.png" > </h5>
                                                     </div>
                                                 </div>
                                                 <div id="menuss2" class="tab-pane fade">
												 <?php
				    if($this->session->flashdata('messagevacation')) {
				    $messagevacation = $this->session->flashdata('messagevacation');
					?>
					<div class="alert alert-<?php echo $messagevacation['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagevacation['messagevacation']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                     <div class="col-lg-offset-1 col-lg-10">
													  <form  method="post" action="">
                                                         <div class="table-responsive">
                                                             <table class="table table-custom table-calender checkcalvacationtable">
                                                                 <thead>
                                                                 <tr>
																 <th><input type="checkbox" class="checkallvacation" value="" /><?php if($lgdoctormod9){ echo $lgdoctormod9; }else { ?>Checkall<?php } ?></th>
                                                                     <th><?php if($lgdoctormod19){ echo $lgdoctormod19; }else { ?>Start Date<?php } ?></th>
                                                                     <th><?php if($lgdoctormod20){ echo $lgdoctormod20; }else { ?>End Date<?php } ?></th>                                                                     
                                                                     <th><?php if($lgdoctormod10){ echo $lgdoctormod10; }else { ?>Actions<?php } ?></th>
                                                                 </tr>
                                                                 </thead>
																 <?php $vacation_time = (!empty($doctor_schedule['vacation_time'])) ? json_decode($doctor_schedule['vacation_time'],true) : array(array('startdate'=>'','enddate'=>''));?>
																 <tbody class="parent_class2">
													 
		              	                             <?php foreach ($vacation_time as $key => $value) { ?>
                                                                
																  <div target=".<?php echo $value['startdate'];?><?php echo $value['enddate'];?>" >
                                                                 <tr>
																 <td ><input type="checkbox" name="<?php echo $value['startdate'];?><?php echo $value['enddate'];?>"/></td>
                                                                     <td><h6><input  required type="text" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" id="dpd1" class="start_date dpd1" placeholder="yyyy-mm-dd" required  name="startdate[]" value="<?php echo $value['startdate'];?>" readonly></h6></td>
                                                                     <td><h6><input required type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" id="dpd1" class="end_date dpd1" placeholder="yyyy-mm-dd" required name="enddate[]"  value="<?php echo $value['enddate'];?>" readonly></h6></td>                                                                     
                                                                     <td>
                                                                         <a href="javascript:void(0);" class="checkcalvacationedit"  >
                                                                             <i class="fa fa-pencil edit-link"></i>
                                                                         </a>
																		  <a href="javascript:void(0);" class="add_calvacation">
                                                                             <i class="fa fa-plus edit-link-1"></i>
                                                                         </a>
                                                                         <a href="javascript:void(0);" class="remove_calvacation-vacation">
                                                                             <i class="fa fa-times edit-link-1"></i>
                                                                         </a>
                                                                        
                                                                     </td>
                                                                 </tr>                                                                </div>
                                                                 
													 <?php } ?></tbody>
                                                             </table>
                                                         </div>
														 <button value="doctorsubmitvacation" type="submit" name="doctorsubmitvacation" id="checkcalvacationbutton" class="btn btn-default checkcalvacationbutton"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod18){ echo $lgdoctormod18; }else { ?>Update<?php } ?></button>
                                                    
													</div>
													</form>
                                                     <div class="col-lg-12">
                                                         <h5 class="pad-center pad-center-1"><img src="<?php echo base_url(); ?>assets/images/patient-login/tick.png"> </h5>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                     </div>

                                 </div>
                             </div>
<!--                             services-->
                             <div id="menus2" class="tab-pane fade">
                                 <div class="tab-cnt-search my-tab-kj">

                                     <div class="container">
                                         <div class="row">
                                             <div class="col-lg-offset-1 col-lg-10 ">
                                                 <ul class="nav nav-tabs  nav-tb dct-inner-tab-2">
                                                     <li class="active"><a data-toggle="tab" href="#homesss"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/m-1.png" /> </span><?php if($lgdoctormod21){ echo $lgdoctormod21; }else { ?>My Details<?php } ?></a></li>
                                                     <li><a data-toggle="tab" href="#menusss1"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/m-2.png"/> </span><?php if($lgdoctormod22){ echo $lgdoctormod22; }else { ?>Update Profile<?php } ?></a></li>
                                                     <li><a data-toggle="tab" href="#menusss2"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/m-3.png"/> </span><?php if($lgdoctormod23){ echo $lgdoctormod23; }else { ?>Update Password<?php } ?></a></li>
                                                     <li><a data-toggle="tab" href="#menusss3"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/m-4.png"/> </span><?php if($lgdoctormod25){ echo $lgdoctormod25; }else { ?>Upload Image<?php } ?></a></li>
													 <li><a data-toggle="tab" href="#menusss4"><span><img src="<?php echo base_url(); ?>assets/images/patient-login/2.3.png"/> </span><?php if($lgdoctormod26){ echo $lgdoctormod26; }else { ?>Packages<?php } ?></a></li>
                                                 </ul>
                                             </div>
                                         </div>

                                     </div>

                                     <div class="container-fluid ">
                                         <div class="container">
                                             <div class="tab-content tb-patient">
                                                 <div id="homesss" class="tab-pane fade in active">
                                                     <div class="col-lg-offset-1 col-lg-10">
                                                       <div class="my-details">
													    <?php
				    if($this->session->flashdata('message1')) {
				    $message1 = $this->session->flashdata('message1');
					?>
					<div class="alert alert-<?php echo $message1['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $message1['message1']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                           <div class="row">
                                                               <div class="col-lg-4"></div>
                                                               <div class="col-lg-4">
                                                                   <form action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                                                                       <div class="my-det">
                                                                           <div class="form-group">
                                                                               <div class="col-lg-12">
                                                                                   <label for="example"><?php if($lgdoctormod27){ echo $lgdoctormod27; }else { ?>First Name<?php } ?></label>
                                                                                   <input type="text" class="form-control" value="<?php echo $doctor_personal->doctor_firstname;?>" id="doctor_firstname" name="doctor_firstname"  data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" " >
                                                                               </div>

                                                                           </div>
                                                                           <div class="form-group">
                                                                               <div class="col-lg-12">
                                                                                   <label for="example"><?php if($lgdoctormod29){ echo $lgdoctormod29; }else { ?>Last Name<?php } ?></label>
                                                                                  <input type="text" class="form-control" id="doctor_lastname" value="<?php echo $doctor_personal->doctor_lastname;?>" name="doctor_lastname" data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" "  >
                                                                               </div>
                                                                           </div>
                                                                           <div class="form-group">
                                                                               <div class="col-lg-12">
                                                                                   <label for="example"><?php if($lgdoctormod31){ echo $lgdoctormod31; }else { ?>E-mail<?php } ?></label>
                                                                                   <input type="text" class="form-control" id="email" name="email" value="<?php echo $doctor_personal->email;?>" data-parsley-trigger="change" data-parsley-type="email" required="">
                                                                               </div>
                                                                           </div>
                                                                           <div class="form-group">
                                                                               <div class="col-lg-12">
                                                                                   <label for="example"><?php if($lgdoctormod32){ echo $lgdoctormod32; }else { ?>Gender<?php } ?></label>
                                                                                   <select class="form-control" id="exampleSelect1" value="<?php echo $doctor_personal->doctor_sex;?>" name="doctor_sex" required =" ">  							
							   
                      <option  ><?php if($lgdoctormod34){ echo $lgdoctormod34; }else { ?>Female<?php } ?></option>
					  <option ><?php if($lgdoctormod33){ echo $lgdoctormod33; }else { ?>Male<?php } ?></option>
								
								
                    </select>
                                                                               </div>
                                                                           </div>
																		   <div class="form-group">
                                                                               <div class="col-lg-12">
                                                                                   <label for="example"><?php if($lgdoctormod78){ echo $lgdoctormod78; }else { ?>Age<?php } ?></label>
                                                                                   <input type="text" class="form-control" id="doctor_age" name="doctor_age" value="<?php echo $doctor_personal->doctor_age;?>" required="" >
                                                                               </div>
                                                                           </div>
                                                                           <div class="form-group">
                                                                               <div class="col-lg-12">
                                                                                   <button value="doctorsubmit1" type="submit" name="doctorsubmit1" class="btn btn-default"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod24){ echo $lgdoctormod24; }else { ?>Update<?php } ?></button>
                                                                               </div>
                                                                           </div>
                                                                       </div>

                                                                   </form>
                                                               </div>
                                                               <div class="col-lg-4"></div>
                                                           </div>
                                                           </div>
                                                     </div>

                                                 </div>
                                                 <div id="menusss1" class="tab-pane fade">
                                                     <div class="col-lg-offset-1 col-lg-10">
                                                         <div class="my-details">
														 								    <?php
				    if($this->session->flashdata('message2')) {
				    $message2 = $this->session->flashdata('message2');
					?>
					<div class="alert alert-<?php echo $message2['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $message2['message2']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                             <div class="row">
                                                                 <div class="col-lg-1"></div>
                                                                 <div class="col-lg-10">
                                                                     <form action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                                                                         <div class="my-det">
																		 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod35){ echo $lgdoctormod35; }else { ?>Degree<?php } ?></label>
                                                                                     <select  name="doctor_degree[]" class="form-control select2" id="doctor_degree" multiple data-parsley-minSelect="1" required="">  								                              
																						 <?php
																							foreach($degree as $row_degree){ ?>
																								<option value="<?php echo $row_degree->id;?>" ><?php echo $row_degree->degree_name;?></option> 
																							<?php } ?>                             							
																					</select>
																					 

                                                                                        </div>

                                                                             </div>
                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod36){ echo $lgdoctormod36; }else { ?>Specialty<?php } ?></label>
                                                                                     <select   name="specialty[]" class="form-control select2" id="exampleSelect1"  multiple="multiple" data-parsley-minSelect="1" required="">										
										                              
                             <?php
                               		                   			         			                   
								  foreach($specialties as $row_specialty){ 								  
										      
											  ?>
							<option value="<?php echo $row_specialty->id;?>" ><?php echo $row_specialty->specialty_name;?></option> 
								<?php }?>                             							
								  </select>
																					 

                                                                                        </div>

                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod37){ echo $lgdoctormod37; }else { ?>Reasons<?php } ?></label>
                                                                                     <select    name="visitation[]" class="form-control select2" id="reason_dropdown" multiple="multiple" data-parsley-minSelect="1" required="" >
										
                                  <?php
                                		                   			         			                   
								  foreach($visitation as $row_reason){ 								  										     
											  ?>
							<option value="<?php echo $row_reason->id;?>"><?php echo $row_reason->reason;?></option> 
								<?php }?>
                             
						              </select> 
																					 

                                                                                        </div>

                                                                             </div>
                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod38){ echo $lgdoctormod38; }else { ?>Awards<?php } ?></label>
                                                                                     <input type="text" name="doctor_awards" class="form-control" id="example" required="" >
                                                                                 </div>
                                                                             </div>
                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod39){ echo $lgdoctormod39; }else { ?>Professional Memberships<?php } ?></label>
                                                                                     <input type="text" name="doctor_memberships" class="form-control" id="example" required="">
                                                                                 </div>
                                                                             </div>
                                                                             <div class="form-group">
                                                                                 <div class="col-lg-6">
                                                                                     <label for="example"><?php if($lgdoctormod40){ echo $lgdoctormod40; }else { ?>Languages Spoken<?php } ?></label>
                                                                                     <select    name="doctor_languages[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
										
                                   <?php
                                			                   			         			                    
								  foreach($languages as $row_language){  								  										      
											  ?>
							<option value="<?php echo $row_language->id;?>" ><?php echo $row_language->language_name;?></option> 
								<?php }?>                            
						              </select> 

                                                                                 </div>

                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-6">
                                                                                     <label for="example"><?php if($lgdoctormod41){ echo $lgdoctormod41; }else { ?>Insurance<?php } ?></label>
                                                                                    <select    name="insurance[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
										
                                  <?php
                               			                   			         			                   
								  foreach($insurance as $row_insurance){ 								  
										    
											  ?>
							<option value="<?php echo $row_insurance->id;?>" ><?php echo $row_insurance->insurance_name;?></option> 
								<?php } ?>
                            
						              </select> 

                                                                                 </div>

                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-6">
                                                                                     <label for="example"><?php if($lgdoctormod81){ echo $lgdoctormod81; }else { ?>Affiliation<?php } ?></label>
                                                                                    <select    name="doctor_affiliations[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
										
                                  <?php
                               			                   			         			                   
								  foreach($affilliation as $row_affilliation){ 								  
										    
											  ?>
							<option value="<?php echo $row_affilliation->id;?>" ><?php echo $row_affilliation->hospital_name;?></option> 
								<?php } ?>
                            
						              </select> 

                                                                                 </div>

                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod42){ echo $lgdoctormod42; }else { ?>Office Address<?php } ?></label>
                                                                                     <input type="text" name="doctor_office_address" class="form-control" id="example" required="" >
                                                                                 </div>
                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod43){ echo $lgdoctormod43; }else { ?>Office Country<?php } ?></label>
                                                                                    <select   onchange="selectState(this.options[this.selectedIndex].value)" name="doctor_office_country" class="form-control" id="exampleSelect1" required="" >
									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
									  
													<h5><?php if($lgdoctormod46){ echo $lgdoctormod46; }else { ?>If your country not found<?php } ?> <a href="javascript:void(0);" id="exampleSelectcountry"><?php if($lgdoctormod49){ echo $lgdoctormod49; }else { ?>Please Click here to add country <?php } ?></a></h5>								 

                                                                                        </div>
																						
																						

                                                                             </div>
                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lghome){ echo $lghome; }else { ?>Office State<?php } ?></label>
                                                                                     <select   onchange="selectCity(this.options[this.selectedIndex].value)" name="doctor_office_state" class="form-control" id="state_dropdown" required="" >
										<option selected="selected" value="-1"><?php if($lgdoctormod2){ echo $lgdoctormod2; }else { ?>Select state<?php } ?></option>                                 
						              </select> 
											<h5><?php if($lgdoctormod47){ echo $lgdoctormod47; }else { ?>If your state not found <?php } ?><a href="javascript:void(0);" id="exampleSelectstate"><?php if($lgdoctormod50){ echo $lgdoctormod50; }else { ?>Please Click here to add state <?php } ?></a></h5>										 

                                                                                        </div>

                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lghome){ echo $lghome; }else { ?>Office City<?php } ?></label>
                                                                                     <select    name="doctor_office_city" class="form-control" id="city_dropdown" required="" >
										<option selected="selected" value="-1"><?php if($lgdoctormod45){ echo $lgdoctormod45; }else { ?>Select city<?php } ?></option>                                  
						              </select> 
																					 
<h5><?php if($lgdoctormod48){ echo $lgdoctormod48; }else { ?>If your city not found <?php } ?><a href="javascript:void(0);" id="exampleSelectcity"><?php if($lgdoctormod51){ echo $lgdoctormod51; }else { ?>Please Click here to add city <?php } ?></a></h5>
                                                                                        </div>

                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod82){ echo $lgdoctormod82; }else { ?>Office Zip<?php } ?></label>
                                                                                     <input type="text" name="doctor_office_zip" class="form-control" id="example" required="" >
                                                                                 </div>
                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod54){ echo $lgdoctormod54; }else { ?>Latitude<?php } ?></label>
                                                                                     <input type="text" name="latitude" class="form-control" id="latitude" required="" ><br/>
																					 <span><a href="#" id='pick-map'><?php if($lgdoctormod52){ echo $lgdoctormod52; }else { ?>Pick from map<?php } ?></a></span>
                                                                                 </div>
                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod53){ echo $lgdoctormod53; }else { ?>Longitude<?php } ?></label>
                                                                                     <input type="text" name="longitude" class="form-control" id="longitude" required="" >
                                                                                 </div>
                                                                             </div>
                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod55){ echo $lgdoctormod55; }else { ?>Experience<?php } ?></label>
                                                                                     <input type="text" name="doctor_experience" class="form-control" id="example" required="" >
                                                                                 </div>
                                                                             </div>
																			  <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod56){ echo $lgdoctormod56; }else { ?>About Yourself (This will be displayed to patient)<?php } ?></label>                                                                                    
																					 <textarea rows="4"  style="width: 100%;" class="form-control" name="about_doctor" id="about_doctor" required =" " maxlength="1000"><?php if($lgdoctormod57){ echo $lgdoctormod57; }else { ?>About yourself<?php } ?></textarea>
                                                                                 </div>
                                                                             </div>
                                                                             
                                                                            

                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <button type="submit" value="doctorsubmit2" name="doctorsubmit2" class="btn btn-default"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod24){ echo $lgdoctormod24; }else { ?>Update<?php } ?></button>
                                                                                 </div>
                                                                             </div>
                                                                         </div>

                                                                     </form>
                                                                 </div>
                                                                 <div class="col-lg-1"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <h5 class="pad-center pad-center-1"><img src="<?php echo base_url(); ?>assets/images/patient-login/tick.png" > </h5>
                                                     </div>
													 <!----------------------country level start------------------------->
													 
													 
													 
													                           <div class="col-lg-offset-1 col-lg-10">
                                                         <div class="my-details">
														 								    <?php
				    if($this->session->flashdata('messagecountry')) {
				    $messagecountry = $this->session->flashdata('messagecountry');
					?>
					<div class="alert alert-<?php echo $messagecountry['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagecountry['messagecountry']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                             <div class="row">
                                                                 <div class="col-lg-1"></div>
                                                                 <div class="col-lg-10">
                                                                     <form action="" method="post" data-parsley-validate="" class="validate addcountryform" enctype="multipart/form-data">
                                                                         <div class="my-det">
																		 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod87){ echo $lgdoctormod87; }else { ?>Add Your Country<?php } ?></label>
                                                                                      <input type="text" name="country_name" class="form-control" id="exampleSelect1" required="" >
																					 

                                                                                        </div>

                                                                             </div>
                                                             
                                                                            

                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <button type="submit" value="doctorcountrysubmit" name="doctorcountrysubmit" class="btn btn-default"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod85){ echo $lgdoctormod85; }else { ?>Add<?php } ?></button>
                                                                                 </div>
                                                                             </div>
                                                                         </div>

                                                                     </form>
                                                                 </div>
                                                                 <div class="col-lg-1"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <h5 class="pad-center pad-center-1"><img src="<?php echo base_url(); ?>assets/images/patient-login/tick.png" > </h5>
                                                     </div>
													 
													 
													 
													 
													 <!---------------------------end----------------------->
													  <!----------------------state level start------------------------->
													 
													 
													 
													                           <div class="col-lg-offset-1 col-lg-10">
                                                         <div class="my-details">
														 								    <?php
				    if($this->session->flashdata('messagestate')) {
				    $messagestate = $this->session->flashdata('messagestate');
					?>
					<div class="alert alert-<?php echo $messagestate['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagestate['messagestate']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                             <div class="row">
                                                                 <div class="col-lg-1"></div>
                                                                 <div class="col-lg-10">
                                                                     <form action="" method="post" data-parsley-validate="" class="validate addstateform" enctype="multipart/form-data">
                                                                         <div class="my-det">
																		  <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod83){ echo $lgdoctormod83; }else { ?>Select Your office Country<?php } ?></label>
                                                                                    <select  name="country_id" class="form-control" id="exampleSelect1"  >									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
																					 

                                                                                        </div>

                                                                             </div>
																		 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod86){ echo $lgdoctormod86; }else { ?>Add Your state<?php } ?></label>
                                                                                      <input type="text" name="state_name" class="form-control" id="exampleSelect1" required="" >
																					 

                                                                                        </div>

                                                                             </div>
                                                             
                                                                            

                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <button type="submit" value="doctorstatesubmit" name="doctorstatesubmit" class="btn btn-default"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod85){ echo $lgdoctormod85; }else { ?>Add<?php } ?></button>
                                                                                 </div>
                                                                             </div>
                                                                         </div>

                                                                     </form>
                                                                 </div>
                                                                 <div class="col-lg-1"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <h5 class="pad-center pad-center-1"><img src="<?php echo base_url(); ?>assets/images/patient-login/tick.png" > </h5>
                                                     </div>
													 
													 
													 
													 
													 <!---------------------------end----------------------->
													 <!----------------------state level start------------------------->
													 
													 
													 
													                           <div class="col-lg-offset-1 col-lg-10">
                                                         <div class="my-details">
														 								    <?php
				    if($this->session->flashdata('messagecity')) {
				    $messagecity = $this->session->flashdata('messagecity');
					?>
					<div class="alert alert-<?php echo $messagecity['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagecity['messagecity']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                             <div class="row">
                                                                 <div class="col-lg-1"></div>
                                                                 <div class="col-lg-10">
                                                                     <form action="" method="post" data-parsley-validate="" class="validate addcityform" enctype="multipart/form-data">
                                                                         <div class="my-det">
																		  <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod83){ echo $lgdoctormod83; }else { ?>Select Your office Country<?php } ?></label>
                                                                                    <select   name="country_id" class="form-control" id="exampleSelect1" onchange="selectStatedashhos(this.options[this.selectedIndex].value)" >									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
																					 

                                                                                        </div>

                                                                             </div>
																			 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod84){ echo $lgdoctormod84; }else { ?>Select Your office state<?php } ?></label>
                                                                                    <select    name="state_id" class="form-control"   id="state_dropdown_dash">									
									<option selected="selected" value="-1"><?php if($lgdoctormod2){ echo $lgdoctormod2; }else { ?>Select state<?php } ?></option>
                                  
						              </select> 
																					 

                                                                                        </div>

                                                                             </div>
																		 <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <label for="example"><?php if($lgdoctormod88){ echo $lgdoctormod88; }else { ?>Add Your office city<?php } ?></label>
                                                                                      <input type="text" name="city_name" class="form-control" id="exampleSelect1" required="" >
																					 

                                                                                        </div>

                                                                             </div>
                                                             
                                                                            

                                                                             <div class="form-group">
                                                                                 <div class="col-lg-12">
                                                                                     <button type="submit" value="doctorcitysubmit" name="doctorcitysubmit" class="btn btn-default"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod85){ echo $lgdoctormod85; }else { ?>Add<?php } ?></button>
                                                                                 </div>
                                                                             </div>
                                                                         </div>

                                                                     </form>
                                                                 </div>
                                                                 <div class="col-lg-1"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                         <h5 class="pad-center pad-center-1"><img src="<?php echo base_url(); ?>assets/images/patient-login/tick.png" > </h5>
                                                     </div>
													 
													 
													 
													 
													 <!---------------------------end----------------------->
                                                 </div>
                                                 <div id="menusss2" class="tab-pane fade">
                                                     <div class="col-lg-offset-1 col-lg-10">
                                                         <div class="my-details">
														 <?php
				    if($this->session->flashdata('message3')) {
				    $message3 = $this->session->flashdata('message3');
					?>
					<div class="alert alert-<?php echo $message3['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $message3['message3']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                             <div class="row">
                                                                 <div class="col-lg-1"></div>
                                                                 <div class="col-lg-10">
                                                                  <form action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                                                                         <div class="my-det">
                                                                             <div class="row">
                                                                                 <div class="col-lg-6">
                                                                                     <div class="form-group">
                                                                                         <div class="col-lg-12">
                                                                                             <label for="example"><?php if($lgdoctormod59){ echo $lgdoctormod59; }else { ?>Current Pasword<?php } ?></label>
                                                                                             <input type="password" name="old_password" class="form-control" id="example" data-parsley-minlength="6" required="">
                                                                                         </div>
                                                                                     </div>
                                                                                     <div class="form-group">
                                                                                         <div class="col-lg-12">
                                                                                             <label for="example"><?php if($lgdoctormod60){ echo $lgdoctormod60; }else { ?>New Pssword<?php } ?></label>
                                                                                             <input type="password" name="new_password" class="form-control" id="example" data-parsley-minlength="6" required="">
                                                                                         </div>
                                                                                     </div>
                                                                                     <div class="form-group">
                                                                                         <div class="col-lg-12">
                                                                                             <label for="example"><?php if($lgdoctormod61){ echo $lgdoctormod61; }else { ?>Re-type New Password<?php } ?></label>
                                                                                             <input type="password" name="re_password" class="form-control" id="example" data-parsley-minlength="6" required="">
                                                                                         </div>
                                                                                     </div>
                                                                                     <div class="form-group">
                                                                                         <div class="col-lg-12">
                                                                                             <button type="submit" value="doctorsubmit3"  name="doctorsubmit3" class="btn btn-default"><span><i class="fa fa-refresh"></i> </span><?php if($lgdoctormod24){ echo $lgdoctormod24; }else { ?>Update<?php } ?></button>
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                                 <div class="col-lg-6">
                                                                             <div class="pass-advice">
                                                                                 <h6><?php if($lgdoctormod62){ echo $lgdoctormod62; }else { ?>The Password Advice<?php } ?></h6>
                                                                                 <ul>
                                                                                     <li><?php if($lgdoctormod63){ echo $lgdoctormod63; }else { ?>Has 12 Characters, Minimum<?php } ?></li>
                                                                                     <li><?php if($lgdoctormod64){ echo $lgdoctormod64; }else { ?>Includes Numbers and Symbols<?php } ?></li>
                                                                                 </ul>
                                                                             </div>
                                                                                 </div>
                                                                                 </div>

                                                                         </div>

                                                                     </form>
                                                                 </div>
                                                                 <div class="col-lg-1"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div id="menusss3" class="tab-pane fade">
                                                     <div >
                                                         <div class="my-details">
                                                             <div class="row">
                                                                 <div class="col-lg-1"></div>
                                                                 <div class="col-lg-10">
                                                                 <div class="row  ">
                                                                     <?php foreach ($doctor_pictures as $doc_gallery){ ?>
                                                                         <div class="col-lg-3">
                                                                             <div class="form-group">
																			 <button class="close forimageclose"  id="<?php echo $doc_gallery->id; ?>" type="button">×</button>
                                                                                 <img src= "<?php echo $doc_gallery->image;?>" alt="" class="img-responsive round-mn"/>                                                                             
																			 </div>
                                                                         </div>
																	 <?php } ?>
                                                                     <form method="post" id="gallery_imagefirst" enctype="multipart/form-data">
						                                                    <input type="file" name="image" id="gallery_image1" class="custom-file-input">
																			<input type="hidden" name="doctorsubmitgallery1" value="doctorsubmitgallery1" id="doctorsubmitgallery1" class="custom-file-input">
                                                                              </form>

                                                                 </div>
                                                                 <div class="col-lg-1"></div>
                                                             </div>
                                                         </div>
                                                     </div>

                                                 </div>
                                             </div>
											 <!---- menu 4th ----- start ----->
											 
											  <div id="menusss4" class="tab-pane fade">
                                                     <div class="col-lg-offset-1 col-lg-10">
                                                         <div class="my-details">
														 <?php
				    if($this->session->flashdata('message_package')) {
				    $message_package = $this->session->flashdata('message_package');
					?>
					<div class="alert alert-<?php echo $message_package['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $message_package['message_package']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                             <div class="row">
                                                                 <div class="col-lg-1"></div>
                                                                 <div class="col-lg-10">
                                                      <div class="row prepackage">
    <div >
        <div id="menu-holder">

<div class="price_table">
<?php foreach ($all_package as $packs){ ?>
<div class="col-md-4">
<div class="column_1">
<ul>
<li class="header_row_1 align_center">
<div class="pack-title"><?php echo $packs->package_name;?></div>
</li>
<li class="header_row_2 align_center">
<div class="price"><span><?php echo $packs->package_price; ?></span></div>
<div class="time"><?php echo $packs->package_period; ?></div>
</li>
<li class="row_style_1 align_center no-option"><span><?php if($lgdoctormod65){ echo $lgdoctormod65; }else { ?>Business name<?php } ?></span></li>
<li class="row_style_1 align_center no-option"><span><?php if($lgdoctormod66){ echo $lgdoctormod66; }else { ?>Business description<?php } ?></span></li>
<li class="row_style_1 align_center no-option"><span><?php if($lgdoctormod67){ echo $lgdoctormod67; }else { ?>Location<?php } ?></span></li>
<li class="row_style_1 align_center no-option"><span><?php if($lgdoctormod68){ echo $lgdoctormod68; }else { ?>Working hours<?php } ?></span></li>
<li class="row_style_1 align_center no-option"><span><?php if($lgdoctormod69){ echo $lgdoctormod69; }else { ?>Phone Number<?php } ?></span></li>
<li class="row_style_1 align_center no-option"><span><?php if($lgdoctormod70){ echo $lgdoctormod70; }else { ?>Link to all social media accounts<?php } ?></span></li>
<li class="row_style_1 align_center no-option"><span><?php if($lgdoctormod71){ echo $lgdoctormod71; }else { ?>Website link (touch enabled)<?php } ?></span></li>
<li class="row_style_1 align_center no-option"><span><?php if($lgdoctormod72){ echo $lgdoctormod72; }else { ?>Business Email (touch enabled)<?php } ?></span></li>
<form method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="status" value="0" >
<li class="row_style_footer_1"><button name="package_id" value="<?php echo $packs->id;?>" class="buy_now"><?php if($lgdoctormod73){ echo $lgdoctormod73; }else { ?>Select Package<?php } ?></li>
</form></ul></div><!--end column-->
</div>
<?php } ?>
<!--end column-->

</div><!--end price table-->
<div class="column-clear"></div>


</div><!--end menu-holder-->
    </div>
</div>
                                                                 </div>
                                                                 <div class="col-lg-1"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
											 
											 <!------ end ------ menu 4--------->
                                         </div>

                                     </div>

                                 </div>
                             </div>

                         </div>
                         </div>

                     </div>

                </div>



        </div>

</div>
<!--patient-login-->


 <div class="modal fade modal-wide" id="myModalmapbmd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
                  <div class="modal-body" id="canvas1">
                    <div id='map_canvas' ></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lat" />
                    <input type="hidden" id="pick-lng" />
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-custom select-location">Select Location</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			
	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>	


