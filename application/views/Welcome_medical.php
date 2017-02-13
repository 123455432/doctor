<?php $username=$this->session->userdata['frontend_logged_in']['username']; ?>
<?php $current_date = date('Y-m-d'); ?>
<?php $med_id=$this->session->userdata['frontend_logged_in']['id']; ?>
<?php $profile_status=$this->session->userdata['frontend_logged_in']['profile_status']; ?>
<?php $features_status=$this->session->userdata['frontend_logged_in']['features_status']; ?>
<?php $trial_date=$this->session->userdata['frontend_logged_in']['trial_date']; ?>
<?php $end_date=$this->session->userdata['frontend_logged_in']['end_date']; ?>
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
									<select   onchange="selectState(this.options[this.selectedIndex].value)" name="country" class="form-control" id="exampleSelect1"  >
									
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
                                        <select   onchange="selectCity(this.options[this.selectedIndex].value)" name="state" class="form-control" id="state_dropdown"  >
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
                                        <select    name="city" class="form-control" id="city_dropdown"  >
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








<!--patient-login search-->
<div class="container-fluid srch-patient-log srch-patient-log-clinic">
    <div class="container">
        <div class="sel-clinic-main">

                <div class="col-lg-12 ">
                    <div class="col-lg-12">

                        <div class="col-lg-12 pad-zero">
                            <div class="row">
                                <div class="col-lg-3 pad-zero sel-cl-mn sel-dashboard">
                                 <div class="sel-clinic-tab dashboard-link">
                                     <h4><?php if($lghosmod1){ echo $lghosmod1; }else { ?>Dashboard Menu<?php } ?></h4>
                                     <ul>
                                         <li data-tab="tab-manage-1" class="li-man">
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/1.png" /> </span><?php if($lghosmod2){ echo $lghosmod2; }else { ?>My Listings (manage)<?php } ?>)</h6>
                                         </li>
                                         <li data-tab="tab-manage-2" class="li-man" id="triggermap">
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/2.png" /> </span><?php if($lghosmod3){ echo $lghosmod3; }else { ?>Add Listing<?php } ?></h6>
                                         </li>
										   
                                         <li data-tab="tab-manage-3" class="li-man">
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/3.png" /> </span><?php if($lghosmod4){ echo $lghosmod4; }else { ?>Appointment<?php } ?></h6>
                                         </li>
                                         <li data-tab="tab-manage-4" class="li-man">
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/4.png" /> </span><?php if($lghosmod5){ echo $lghosmod5; }else { ?>Past Appointments<?php } ?></h6>
                                         </li>
										 <li data-tab="tab-manage-7" class="li-man">
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/5.png" /> </span><?php if($lghosmod6){ echo $lghosmod6; }else { ?>Location Settings<?php } ?></h6>
                                         </li>
										 <li data-tab="tab-manage-8" class="li-man"  >
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/2.png" /> </span><?php if($lghosmod7){ echo $lghosmod7; }else { ?>Update Features<?php } ?></h6>
                                         </li>
										 <li data-tab="tab-manage-9" class="li-man"  >
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/2.png" /> </span><?php if($lghosmod8){ echo $lghosmod8; }else { ?>Add Gallery<?php } ?></h6>
                                         </li>
                                         <li data-tab="tab-manage-5" class="li-man" id="avoidinterrupthome3">
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/5.png" /> </span><?php if($lghosmod9){ echo $lghosmod9; }else { ?>Settings<?php } ?></h6>
                                         </li>
										 <li data-tab="tab-manage-10" class="li-man" id="avoidinterrupthome3">
                                             <h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/5.png" /> </span><?php if($lghosmod10){ echo $lghosmod10; }else { ?>Packages<?php } ?></h6>
                                         </li>
                                         <li data-tab="tab-manage-6" class="li-man">
                                             <a href = "<?php echo base_url(); ?>Logout"><h6><span><img src="<?php echo base_url(); ?>assets/images/dashboard/6.png" /> </span><?php if($lghome){ echo $lghome; }else { ?>Sign out <?php } ?></h6></a>
                                         </li>

                                     </ul>
                                 </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="manage-ad-inner-main tab-manage-1 forhomesubhosp ">
									<div class="checkin-homesubhosp">
									<?php if($end_date == '' & $trial_date >= $current_date  ){?>
									
									<div class="head-my-listing">
									<div class="alert">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<h1><?php if($lghosmod101){ echo $lghosmod101; }else { ?>Alert Message<?php } ?>:</h1>
                                            <h2> <?php if($lghosmod102){ echo $lghosmod102; }else { ?> You are using 15 days free trial version.Once the trial period is expired , your medical listing will be removed from Search Filter. Select any package to extend your service under Bookmydoc.<?php } ?>
								</h2>
					</div>
								 
                                        </div>
										<?php } elseif($end_date < $current_date) { ?>
										<div class="head-my-listing">
									<div class="alert">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<h1><?php if($lghosmod101){ echo $lghosmod101; }else { ?>Alert Message<?php } ?>:</h1>
                                            <h2>  <?php if($lghosmod103){ echo $lghosmod103; }else { ?>Your Package period is expired . Kindly Select any package to list your medical under Bookmydoc.<?php } ?>
								</h2>
					</div>
								 
                                        </div>
									<?php } else{ ?>
									
									
									<?php } ?>
									<?php if ($profile_status != "1" AND $features_status  != "1" ){ ?>
								 <div class="head-my-listing">
								 <h1><?php if($lghosmod101){ echo $lghosmod101; }else { ?>Alert Message<?php } ?>:</h1>
                                            <h2> <?php if($lghosmod105){ echo $lghosmod105; }else { ?>Your medical will found once if you complete the required details for profile settings and features.So please add it & list your medical under BOOKMYDOC.<?php } ?>
								</h2>
                                        </div>
								<?php } ?>
                                        <div class="head-my-listing">
                                            <h3><?php if($lghosmod13){ echo $lghosmod13; }else { ?>Medicals under <?php } ?><?php echo $username; ?></h3>
                                        </div>
                                        <div class="mn-dash-scroll">
										
										 <?php foreach ($sub_hospitals as $mysubhosp ){ ?>  
                                            <div class="col-lg-12">

                                                <div class="col-lg-8 evt-br">
                                                    <div class="left-events left-img-ph left-img-ph-2">
													<img src="<?php echo $mysubhosp->display_image; ?>" />
                                                    </div>
                                                    <div class="left-events">
                                                        <h5 class="lft-h5"><?php echo $mysubhosp->medical_name;?></h5>
														<div class="gc-ratting" data-rate="<?php echo $mysubhosp->avg_rating; ?>" ></div>
                                                       <!---<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>-->
                                                        <div class="pt-ent">
                                                            <div class="row">
                                                                <div class="col-lg-1">
                                                                    <img src="<?php echo base_url(); ?>assets/images/patient-login/13.png" />
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <h6><?php echo $mysubhosp->medical_address; ?> <?php echo $mysubhosp->city_name;?>,<?php echo $mysubhosp->state_name;?>,<?php echo $mysubhosp->country_name;?>.<?php echo $mysubhosp->medical_zip;?></h6>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>
                                                <div class="col-lg-2 evt-br-1 view-cln-1">
                                                    <div class="view-clinic view-dash-mn">
                                                        <a href="javascript:void(0);" id="<?php echo $mysubhosp->id;?>" class="hospitaljuncdoctoranothermedical" ><h5><span><i class="fa fa-pencil"></i> </span><?php if($lghosmod14){ echo $lghosmod14; }else { ?>Edit<?php } ?></h5></a>
                                                        <h5><?php if($lghosmod15){ echo $lghosmod15; }else { ?>Published<?php } ?></h5>
                                                        <h5><?php if($lghosmod16){ echo $lghosmod16; }else { ?>Hits - 0<?php } ?></h5>
                                                        <h6><a href="javascript:void(0);" id="<?php echo $mysubhosp->id;?>" class="hospitaljuncdoctoranothermedicaldelete" > <?php if($lghosmod17){ echo $lghosmod17; }else { ?> Remove<?php } ?></a></h6>
                                                    </div>
                                                </div>
                                            </div>
                                         <?php } ?>  
                                           
                                        </div>
</div>
                                    </div>
									<!---- tab 7---->
									 <div class="manage-ad-inner-main tab-manage-7">
									
                                                <div id="location" class="tab-pane fade in active">
                                                    <div class="form-hospital-dash">
<?php
				    if($this->session->flashdata('messagedashloc')) {
				    $messagedashloc = $this->session->flashdata('messagedashloc');
					?>
					<div class="alert alert-<?php echo $messagedashloc['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedashloc['messagedashloc']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                        
                                                        <div class="clearfix"></div>

                                                        <div class="form-group hos-frm-grp">
														
                                                                <div class="col-lg-10">
																<!---for city--->
																<form action="" method="post" data-parsley-validate="" class="validate addcountryform" enctype="multipart/form-data">
													<div class="head-my-listing">
                                            <h3><?php if($lghosmod56){ echo $lghosmod56; }else { ?>Add Office City<?php } ?></h3>
                                        </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select Country<?php } ?>   </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                             <select   name="country_id" class="form-control"  onchange="selectStatedashhos(this.options[this.selectedIndex].value)" id="exampleSelect1"  >									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lgdoctormod2){ echo $lgdoctormod2; }else { ?>Select state <?php } ?>   </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select    name="state_id" class="form-control" id="state_dropdown_dash"  id="exampleSelect1"  >									
									<option selected="selected" value="-1"><?php if($lgdoctormod2){ echo $lgdoctormod2; }else { ?>Select state<?php } ?></option>
                                  
						              </select> 
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod61){ echo $lghosmod61; }else { ?>Add City<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="Name" name="city_name" required="">
                                                                        </div>
                                                                    </div>
																	 <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" value="doctorcitysubmit" name="doctorcitysubmit" class="btn btn-default bfn-sve"><?php if($lghome){ echo $lghome; }else { ?>Save<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
													</form>
													<!--- for state ----->
													<form action="" method="post" data-parsley-validate="" class="validate addcountryform" enctype="multipart/form-data">
													<div class="head-my-listing">
                                            <h3><?php if($lghosmod57){ echo $lghosmod57; }else { ?>Add Office State<?php } ?></h3>
                                        </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select Country  <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select  name="country_id" class="form-control" id="exampleSelect1"  >									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod60){ echo $lghosmod60; }else { ?>Add State<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="Name" name="state_name" required="">
                                                                        </div>
                                                                    </div>
																	 <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit"  value="doctorstatesubmit" name="doctorstatesubmit" class="btn btn-default bfn-sve"><?php if($lghome){ echo $lghome; }else { ?>Save<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
													</form>
													<!---- for country--->
													<form action="" method="post" data-parsley-validate="" class="validate addcountryform" enctype="multipart/form-data">
																<div class="head-my-listing">
                                            <h3><?php if($lghosmod58){ echo $lghosmod58; }else { ?>Add Office Country<?php } ?></h3>
                                        </div>
																
                                                                     <div class="row">
                                                                         <div class="col-lg-3">
                                                                             <div class="text-left-hsp">
                                                                                 <h6><?php if($lghosmod59){ echo $lghosmod59; }else { ?>Add Country<?php } ?></h6>
                                                                             </div>
                                                                             </div>
                                                                             <div class="col-lg-8">
                                                                                 <input type="text" class="form-control"  placeholder="Name" name="country_name" required="" >
                                                                             </div>
                                                                         </div>

                                                                    
                                                                    
                                                                     <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" value="doctorcountrysubmit" name="doctorcountrysubmit"class="btn btn-default bfn-sve"><?php if($lghosmod94){ echo $lghosmod94; }else { ?>Save<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
													</form>
													
                                                                    
                                                                     </div>
                                                                </div>

                                                           

                                                        </div>
                                                    </div>
									 </div>
									<!-----exit tab 7---->
									
                                    <div class="manage-ad-inner-main tab-manage-2">


                                            <ul class="nav nav-tabs nav-hospital">
                                                
												 <li class="active"><a data-toggle="tab" href="#hospital_doc" id="avoidinterrupthome1"><?php if($lghosmod109){ echo $lghosmod109; }else { ?>Add Medical Center<?php } ?></a></li>
                                                <li><a data-toggle="tab" href="#doctor" id="avoidinterrupthome2"><?php if($lghosmod95){ echo $lghosmod95; }else { ?>Add Doctor<?php } ?></a></li>
												
                                            </ul>

                                            <div class="tab-content hospital-tab-content">
                                                
												<!--- new start ----->
												   <div id="hospital_doc" class="tab-pane fade in active">

                                                    <div class="row">

                                                        <div class="col-lg-8">
                                                           <div class="row add-mnb" >
                                                               <ul>
                                                                   <li data-tab="tab-man-1-hosp" class="li-m-hosp">
                                                                       <div class="col-lg-6 checkinsidehospital">
                                                                           <div class="add-new-doc">
                                                                               <h5><a href="javascript:void(0);"><?php if($lghosmod112){ echo $lghosmod112; }else { ?>Add New Medical <?php } ?></a></h5>
                                                                           </div>
                                                                       </div>
                                                                   </li>
                                                                   <li data-tab="tab-man-2-hosp" class="li-m-hosp">
                                                                       <div class="col-lg-6">
                                                                           <div class="view-new-doc">
                                                                               <h5><a href="javascript:void(0);"><?php if($lghosmod113){ echo $lghosmod113; }else { ?>View Medicals<?php } ?></a></h5>
                                                                           </div>
                                                                       </div>
                                                                   </li>
                                                               </ul>

                                                           </div>
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    </div>


                                                    <div class="manage-ad-inner-mains-hosp tab-man-1-hosp subhosp-listing">
													<?php
				    if($this->session->flashdata('messagedash1')) {
				    $messagedash1 = $this->session->flashdata('messagedash1');
					?>
					<div class="alert alert-<?php echo $messagedash1['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedash1['messagedash1']; 
					?>
					</div>
					<?php
					}							                       
            ?>
													
													
													
													
                                                        <div class="form-hospital-dash outhospitaladd">
														
                                                      <form method="post" data-parsley-validate="" enctype="multipart/form-data">
                                                            <div class="upload-hospital">
                                                                <!--<img src="<?php// echo base_url(); ?>assets/images/dashboard/8.png"  />-->

                                                                <div class="upload-section-tag">
																<input type="file" id="uploadhosp" name="display_image" style="visibility: hidden; width: 1px; height: 1px" required="" />
                                                                    <h5><a href=""  Onclick="document.getElementById('uploadhosp').click(); return false" id="upload_link"><?php if($lghosmod19){ echo $lghosmod19; }else { ?>Browse Photo<?php } ?></a></h5>

                                                                   <!-- <h5><a  class="hosp-photodune" href="">Upload Photo</a></h5>-->
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>

                                                            <div class="form-group hos-frm-grp">
                                                                <div class="col-lg-10">
                                                                    <div class="row">
																	<input type="hidden" name="status" value="1">
																	<input type="hidden" name="trial_date" value="<?php echo  date("Y-m-d", strtotime("+15 days")); ?>" >
																	<input type="hidden" name="terms" value="agreed" >
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod106){ echo $lghosmod106; }else { ?>Medical Name<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="Medical Name" name="medical_name" data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" " >
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod21){ echo $lghosmod21; }else { ?>Email<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="email" name="email" data-parsley-trigger="change" data-parsley-type="email" required="" >
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod22){ echo $lghosmod22; }else { ?>Password<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="password" class="form-control"   name="password" data-parsley-minlength="6" required="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod23){ echo $lghosmod23; }else { ?>Established in<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="YYYY/MM/DD" name="medical_established_date" required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod24){ echo $lghosmod24; }else { ?>Zip Code<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="1234" name="medical_zip" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="7" required =" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod25){ echo $lghosmod25; }else { ?>Website<?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="www.example.com" name="medical_website" required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod26){ echo $lghosmod26; }else { ?>Phone <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="example" placeholder="123456789" name="phone" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="16" required =" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod27){ echo $lghosmod27; }else { ?>Country <?php } ?>   </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select name="medical_country" class="form-control" id="exampleSelect1" onchange="selectStatedocsubcenter(this.options[this.selectedIndex].value)" required="" >
									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
									  <h5><?php if($lghosmod35){ echo $lghosmod35; }else { ?>If your country not found .Use location settings to add your country<?php } ?></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod28){ echo $lghosmod28; }else { ?>state <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select  name="medical_state" onchange="selectCitydocsubcenter(this.options[this.selectedIndex].value)" class="form-control" id="state_dropdown_docsubcenter" required="" >
										<option selected="selected" value="-1"><?php if($lgdoctormodalso){ echo $lgdoctormodalso; }else { ?>Select state<?php } ?></option>                                 
						              </select> 
											<h5><?php if($lghosmod34){ echo $lghosmod34; }else { ?>If your state not found Use location settings to add your state <?php } ?> </h5>						
                                                                        </div>
                                                                    </div>
																	 <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod29){ echo $lghosmod29; }else { ?>city  <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                           <select    name="medical_city" class="form-control" id="city_dropdown_docsubcenter"  required="">
										<option selected="selected" value="-1"><?php if($lgdoctormod45){ echo $lgdoctormod45; }else { ?>Select city<?php } ?></option>                                  
						              </select> 
																					 
<h5><?php if($lghosmod36){ echo $lghosmod36; }else { ?>If your city not found . Use location settings to add your city<?php } ?> </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod31){ echo $lghosmod31; }else { ?>Address <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <textarea class="form-control" placeholder="Address here" name="medical_address" required=""></textarea>
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod32){ echo $lghosmod32; }else { ?>Latitude <?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="latitude-hosp"  name="latitude" required=""><br/>
																					 <span><a href="#" id='pick-map-hosp'><?php if($lghosmod37){ echo $lghosmod37; }else { ?>Pick from map<?php } ?></a></span>
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod33){ echo $lghosmod33; }else { ?>Longitude <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="longitude-hosp"  name="longitude" required="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod98){ echo $lghosmod98; }else { ?>About <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <textarea class="form-control" name="about_medical"  required=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>
                                                            <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" name="hospital_addition" value="hospital_addition" class="btn btn-default bfn-sve"><?php if($lghosmod38){ echo $lghosmod38; }else { ?>Add<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
</form>
                                                        </div>
													
														
														
                                                    </div>

                                                    <div class="manage-ad-inner-mains-hosp tab-man-2-hosp ">
													<?php
				    if($this->session->flashdata('messagedash2')) {
				    $messagedash2 = $this->session->flashdata('messagedash2');
					?>
					<div class="alert alert-<?php echo $messagedash2['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedash2['messagedash2']; 
					?>
					</div>
					<?php
					}							                       
            ?>
													<div class="hospital-checkin" >
                                                    <div class="tbn-r">
                                                        <div class="col-lg-1"></div>
                                                        <div class="col-lg-11 tbn-r-1">
														<?php foreach ($sub_hospitals as $subhosp){ ?>
                                                            <div class="row">
                                                                <div class="col-lg-7">
                                                                    <div class="prf-add-dct">
                                                                        <img src="<?php echo $subhosp->display_image; ?>" />
                                                                        <div class="prf-add-dct-1">
                                                                            <h3><?php echo $subhosp->medical_name; ?></h3>
                                                                            <h4><?php echo $subhosp->medical_address; ?></h4>
                                                                            <p><?php echo $subhosp->medical_name; ?>,<?php echo $subhosp->state_name; ?>,<?php echo $subhosp->country_name; ?>  <?php echo $subhosp->medical_zip; ?>
                                                                            </p>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="prf-rght-dash">
                                                                       <a href="javascript:void(0);"  class="hospitaljuncdoctormedical" id="<?php echo $subhosp->id; ?>">  <i class="fa fa-pencil"></i>
                                                                        <div class="clearfix"></div>
                                                                        <h4><?php if($lghosmod39){ echo $lghosmod39; }else { ?>Edit<?php } ?></h4></a>
                                                                    </div>
                                                                </div>
                                                            </div>
														<?php }?>
                                                            
                                                        </div>
                                                    </div>
</div>
                                                    </div>

                                                </div>
												<!----new exit---->
                                                <div id="doctor" class="tab-pane fade">

                                                    <div class="row">

                                                        <div class="col-lg-8">
                                                           <div class="row add-mnb" >
                                                               <ul>
                                                                   <li data-tab="tab-man-1" class="li-m">
                                                                       <div class="col-lg-6">
                                                                           <div class="add-new-doc">
                                                                               <h5><a href="javascript:void(0);"><?php if($lghosmod99){ echo $lghosmod99; }else { ?>Add New Doctor<?php } ?></a></h5>
                                                                           </div>
                                                                       </div>
                                                                   </li>
                                                                   <li data-tab="tab-man-2" class="li-m">
                                                                       <div class="col-lg-6">
                                                                           <div class="view-new-doc">
                                                                               <h5><a href="javascript:void(0);"><?php if($lghosmod100){ echo $lghosmod100; }else { ?>View Doctors<?php } ?></a></h5>
                                                                           </div>
                                                                       </div>
                                                                   </li>
                                                               </ul>

                                                           </div>
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    </div>


                                                    <div class="manage-ad-inner-mains tab-man-1 dochosp">
													<?php
				    if($this->session->flashdata('messagedash3')) {
				    $messagedash3 = $this->session->flashdata('messagedash3');
					?>
					<div class="alert alert-<?php echo $messagedash3['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedash3['messagedash3']; 
					?>
					</div>
					<?php
					}							                       
            ?>
                                                        <div class="form-hospital-dash">
 <form method="post" data-parsley-validate="" enctype="multipart/form-data">
                                                            <div class="upload-hospital">
                                                                <!--<img src="<?php //echo base_url(); ?>assets/images/dashboard/8.png"  />-->

                                                                <div class="upload-section-tag">
																<input type="file" id="uploadhospdoc" name="display_image" style="visibility: hidden; width: 1px; height: 1px" required="" />
                                                                    <h5><a href=""  Onclick="document.getElementById('uploadhospdoc').click(); return false" id="upload_link_doc"><?php if($lghosmod19){ echo $lghosmod19; }else { ?>Browse Photo<?php } ?></a></h5>

                                                                   <!-- <h5><a  class="hosp-photodune" href="">Upload Photo</a></h5>-->
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>

                                                            <div class="form-group hos-frm-grp">
                                                                <div class="col-lg-10">
                                                                    <div class="row">
																	<input type="hidden" name="status" value="1">
                                                                        <input type="hidden" name="trial_date" value="<?php echo  date("Y-m-d", strtotime("+15 days")); ?>" >
																	<input type="hidden" name="terms" value="agreed" >
																		<div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod40){ echo $lghosmod40; }else { ?>Doctor Firstname<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="<?php if($lghosmod42){ echo $lghosmod42; }else { echo "doctor firstname"; } ?>" name="doctor_firstname" data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" " >
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod41){ echo $lghosmod41; }else { ?>Doctor Lastname<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="<?php if($lghosmod43){ echo $lghosmod43; }else { echo "doctor lastname"; } ?>" name="doctor_lastname" data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" " >
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod49){ echo $lghosmod49; }else { ?>Email<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="<?php if($lghosmod46){ echo $lghosmod46; }else { echo "email"; } ?>" name="email" data-parsley-trigger="change" data-parsley-type="email" required="" >
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod22){ echo $lghosmod22; }else { ?>Password<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="password" class="form-control"   name="password" data-parsley-minlength="6" required="">
                                                                        </div>
                                                                    </div>

                                                                    
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod24){ echo $lghosmod24; }else { ?>Zip Code<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="<?php if($lghosmod40){ echo $lghosmod40; }else { echo "1234"; } ?>" name="doctor_office_zip" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="7" required =" ">
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod26){ echo $lghosmod26; }else { ?>Phone <?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="example" placeholder="123456789" name="phone" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="16" required =" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod27){ echo $lghosmod27; }else { ?>Country<?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select name="doctor_office_country" class="form-control" id="exampleSelect1" onchange="selectStatedocsub(this.options[this.selectedIndex].value)" required="" >
									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>"><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
									  <h5><?php if($lghosmod35){ echo $lghosmod35; }else { ?>If your country not found .Use location settings to add your country<?php } ?></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod28){ echo $lghosmod28; }else { ?>state <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select  name="doctor_office_state" onchange="selectCitydocsub(this.options[this.selectedIndex].value)" class="form-control" id="state_dropdown_docsub" required="" >
										<option selected="selected" value="-1"><?php if($lgdoctormodalso){ echo $lgdoctormodalso; }else { ?>Select state<?php } ?></option>                                 
						              </select> 
											<h5><?php if($lghosmod34){ echo $lghosmod34; }else { ?>If your state not found Use location settings to add your state <?php } ?> </h5>						
                                                                        </div>
                                                                    </div>
																	 <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod29){ echo $lghosmod29; }else { ?>city <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                           <select    name="doctor_office_city" class="form-control" id="city_dropdown_docsub"  required="">
										<option selected="selected" value="-1"><?php if($lgdoctormod45){ echo $lgdoctormod45; }else { ?>Select city<?php } ?></option>                                  
						              </select> 
																					 
<h5><?php if($lghosmod36){ echo $lghosmod36; }else { ?>If your city not found . Use location settings to add your city<?php } ?> </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod31){ echo $lghosmod31; }else { ?>Address <?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <textarea class="form-control" placeholder="Address here" name="doctor_office_address" required=""></textarea>
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod32){ echo $lghosmod32; }else { ?>Latitude <?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="latitude-doc"  name="latitude" required=""><br/>
																					 <span><a href="#" id='pick-map-doc'><?php if($lghosmod37){ echo $lghosmod37; }else { ?>Pick from map<?php } ?></a></span>
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod33){ echo $lghosmod33; }else { ?>Longitude<?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="longitude-doc"  name="longitude" required="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod98){ echo $lghosmod98; }else { ?>About <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <textarea class="form-control" name="about_doctor"  required=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>
                                                             <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" name="hospital-doc_addition" value="hospital-doc_addition" class="btn btn-default bfn-sve"><?php if($lghosmod38){ echo $lghosmod38; }else { ?>Add<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
													</form>
                                                        </div>
                                                    </div>

                                                    <div class="manage-ad-inner-mains tab-man-2 dochosp">
													<?php
				    if($this->session->flashdata('messagedash4')) {
				    $messagedash4 = $this->session->flashdata('messagedash4');
					?>
					<div class="alert alert-<?php echo $messagedash4['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedash4['messagedash4']; 
					?>
					</div>
					<?php
					}							                       
            ?>
			<div class="hospital-checkin-doc" >
                                                    <div class="tbn-r">
                                                        <div class="col-lg-1"></div>
                                                        <div class="col-lg-11 tbn-r-1">
														
														<?php foreach ($mydoc_hospital as $mydoc_hospital_detail){ ?>
                                                            <div class="row">
                                                                <div class="col-lg-7">
                                                                    <div class="prf-add-dct">
                                                                        <img src="<?php echo $mydoc_hospital_detail->display_image; ?>" />
                                                                        <div class="prf-add-dct-1">
                                                                            <h3>Dr. <?php echo $mydoc_hospital_detail->doctor_firstname;?> <?php echo $mydoc_hospital_detail->doctor_lastname;?></h3>
                                                                            <h4><?php echo $mydoc_hospital_detail->degree_name;?> <?php echo $mydoc_hospital_detail->specialty_name;?></h4>
                                                                            <p><?php echo $mydoc_hospital_detail->doctor_office_address;?> <?php echo $mydoc_hospital_detail->city_name;?>,
																			<?php echo $mydoc_hospital_detail->state_name;?> <?php echo $mydoc_hospital_detail->country_name;?>. 
																			<?php echo $mydoc_hospital_detail->doctor_office_zip;?>
                                                                            </p>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
																 
                                                                    <div class="prf-rght-dash">
                                                                        <a href="javascript:void(0);"  class="hospitaljunchospmedicaldoctor" id="<?php echo $mydoc_hospital_detail->id; ?>"><i class="fa fa-pencil"></i>
                                                                        <div class="clearfix"></div>
                                                                        <h4><?php if($lghosmod39){ echo $lghosmod39; }else { ?>Edit<?php } ?></h4></a>
                                                                    </div>
                                                                </div>
                                                            </div>
														<?php } ?>
															
															
                                                            
                                                        </div>
                                                    </div>
</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <div class="manage-ad-inner-main tab-manage-3">
                                        <div class="main-2-prof">
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-11">
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <h4><?php if($lghosmod52){ echo $lghosmod52; }else { ?>Doctor Name<?php } ?></h4>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <h4><?php if($lghosmod53){ echo $lghosmod53; }else { ?>Total Appointments<?php } ?></h4>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="main-3-prof">
										
										<?php foreach($app_doc as $app_doc_detail){ ?>
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-11">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="prf-add-dct prf-add-dct-mn">
                                                               <img src="<?php echo $app_doc_detail->display_image; ?>" />
                                                                <div class="prf-add-dct-1 prf-add-dct-2">
                                                                    <h3>Dr. <?php echo $app_doc_detail->doctor_firstname; ?>  <?php echo $app_doc_detail->doctor_lastname; ?></h3>
                                                                    <h4><?php echo $app_doc_detail->degree_name; ?>, <?php echo $app_doc_detail->specialty_name; ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="no-prf">
                                                                <h5><?php echo $app_doc_detail->total; ?></h5>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>

                                                </div>

                                            </div>
										<?php } ?>
                                            
                                        </div>
                                        </div>

                                    <div class="manage-ad-inner-main tab-manage-4">
                                        <div class="main-2-prof">
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-11">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <h4 class="ap-date"><span><?php if($lghosmod54){ echo $lghosmod54; }else { ?>Appointment Upto<?php } ?></span><?php echo $current_date; ?></h4>
                                                        </div>

                                                        <div class="col-lg-6">
                                                           <h4 class="ap-date-1"> <a href="<?php echo base_url(); ?>Welcome/pdf_medical/<?php echo $current_date;?>" class="dwd"><?php if($lghosmod55){ echo $lghosmod55; }else { ?>Download<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/13.png"/> </span></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="main-3-prof">
										<?php foreach($an_patient_history as $appc_doc_detail){ ?>
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-11">
												
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <div class="prf-add-dct prf-add-dct-mn">
                                                                <img src="<?php echo $appc_doc_detail->display_image; ?>" />
                                                                <div class="prf-add-dct-1 prf-add-dct-2">
                                                                    <h3>Dr. <?php echo $appc_doc_detail->doctor_firstname; ?>  <?php echo $appc_doc_detail->doctor_lastname; ?></h3>
                                                                    <h4><?php echo $appc_doc_detail->degree_name; ?>, <?php echo $appc_doc_detail->specialty_name; ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="no-prf-1">
                                                                <h6><?php if($lghosmod90){ echo $lghosmod90; }else { ?>Patient Name<?php } ?></h6>
                                                                <h4><?php echo $appc_doc_detail->totalanother['patient_firstname']; ?>, <?php echo $appc_doc_detail->totalanother['patient_lastname']; ?></h4>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="lst-no-prf">
                                                                   <h2><?php if($lghosmod91){ echo $lghosmod91; }else { ?>Appt Date<?php } ?> <span><?php echo $appc_doc_detail->appointment_date; ?></span></h2>
                                                                <h3><?php if($lghosmod92){ echo $lghosmod92; }else { ?>Appt Time <?php } ?> <span><?php echo $appc_doc_detail->appointment_time; ?></span></h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
										<?php } ?>
                                        </div>
                                    </div>
									<!----additional features start -------------->
 <div class="manage-ad-inner-main tab-manage-8">


                                      
                                          

                                                   
													<?php
				    if($this->session->flashdata('messagedashfeat')) {
				    $messagedashfeat = $this->session->flashdata('messagedashfeat');
					?>
					<div class="alert alert-<?php echo $messagedashfeat['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedashfeat['messagedashfeat']; 
					?>
					</div>
					<?php
					}							                       
            ?>
													
													
													
													
                                                        <div class="form-hospital-dash outhospitaladd">
														
                                                      <form method="post" data-parsley-validate="" enctype="multipart/form-data">
                                                           <input type="hidden" name="features_status" value="1">
                                                            <div class="clearfix"></div>

                                                            <div class="form-group hos-frm-grp">
                                                                <div class="col-lg-10">
                                                                   
																	 <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="text-left-hsp">
                                                                            <h6><?php if($lghosmod61){ echo $lghosmod61; }else { ?>Affiliations<?php } ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                                    <select    name="medical_affilliations[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
                                    <?php
                               			                   			         			                   
								  foreach($affilliation as $row_affilliation){ 								  
										    
											  ?>
							<option value="<?php echo $row_affilliation->id;?>" ><?php echo $row_affilliation->hospital_name;?></option> 
								<?php } ?>
                            
						              </select> 

                                                                             
                                                                    </div>
                                                                </div>
																<div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="text-left-hsp">
                                                                            <h6><?php if($lghosmod62){ echo $lghosmod62; }else { ?>Amenities<?php } ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                                    <select    name="amenities[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
                                    <?php
                               			                   			         			                   
								  foreach($amenities as $row_amenities){ 								  
										    
											  ?>
							<option value="<?php echo $row_amenities->id;?>" ><?php echo $row_amenities->facility_name;?></option> 
								<?php } ?>
                            
						              </select> 

                                                                             
                                                                    </div>
                                                                </div>
																
																<div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="text-left-hsp">
                                                                            <h6><?php if($lghosmod63){ echo $lghosmod63; }else { ?>Languages<?php } ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                                    <select    name="medical_languages[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
                                    <?php
                               			                   			         			                   
								  foreach($languages as $row_languages){ 								  
										    
											  ?>
							<option value="<?php echo $row_languages->id;?>" ><?php echo $row_languages->language_name;?></option> 
								<?php } ?>
                            
						              </select> 

                                                                             
                                                                    </div>
                                                                </div>
																<div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="text-left-hsp">
                                                                            <h6><?php if($lghosmod64){ echo $lghosmod64; }else { ?>Specialty<?php } ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                                    <select    name="specialty[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
                                    <?php
                               			                   			         			                   
								  foreach($specialties as $row_specialty){ 								  
										    
											  ?>
							<option value="<?php echo $row_specialty->id;?>" ><?php echo $row_specialty->specialty_name;?></option> 
								<?php } ?>
                            
						              </select> 

                                                                             
                                                                    </div>
                                                                </div>
																<div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="text-left-hsp">
                                                                            <h6><?php if($lghosmod65){ echo $lghosmod65; }else { ?>Insurance<?php } ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                                    <select    name="insurance[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
                                    <?php
                               			                   			         			                   
								  foreach($insurance as $row_insurance){ 								  
										    
											  ?>
							<option value="<?php echo $row_insurance->id;?>" ><?php echo $row_insurance->insurance_name;?></option> 
								<?php } ?>
                            
						              </select> 

                                                                             
                                                                    </div>
                                                                </div>
																<div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="text-left-hsp">
                                                                            <h6><?php if($lghosmod66){ echo $lghosmod66; }else { ?>Visitation<?php } ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                                    <select    name="visitation[]" class="form-control select2" id="exampleSelect1" multiple="multiple" data-parsley-minSelect="1" required="" >
                                    <?php
                               			                   			         			                   
								  foreach($visitation as $row_visitation){ 								  
										    
											  ?>
							<option value="<?php echo $row_visitation->id;?>" ><?php echo $row_visitation->reason;?></option> 
								<?php } ?>
                            
						              </select> 

                                                                             
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>
                                                            <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" name="hospital_additional-feat" value="hospital_additional-feat" class="btn btn-default bfn-sve"><?php if($lghosmod38){ echo $lghosmod38; }else { ?>Add<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
</form>
                                                        </div>
													
														
														
                                                    </div>

                                                    

                                       








<!-----additional features end --------------->
<!----additional gallery start -------------->
 <div class="manage-ad-inner-main tab-manage-9">


                                      
                                          

                                                   
													<?php
				    if($this->session->flashdata('messagedashgallery')) {
				    $messagedashgallery = $this->session->flashdata('messagedashgallery');
					?>
					<div class="alert alert-<?php echo $messagedashgallery['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedashgallery['messagedashgallery']; 
					?>
					</div>
					<?php
					}							                       
            ?>
														
                                                        <div class="form-hospital-dash outhospitaladd">
<div class="row  "> <div class="head-my-listing">
								
                                            <h3> <?php if($lghosmod67){ echo $lghosmod67; }else { ?> Add Gallery Images<?php } ?>
								</h3>
                                        </div>
                                                                     <?php foreach ($gallery_medical_pictures as $doc_gallery){ ?>
                                                                         <div class="col-lg-3">
                                                                             <div class="form-group">
																			 <button class="close forimagecloseformedical"  id="<?php echo $doc_gallery->id; ?>" type="button">×</button>
                                                                                 <img src= "<?php echo $doc_gallery->image;?>" alt="" class="img-responsive round-mn"/>                                                                             
																			 </div>
                                                                         </div>
																	 <?php } ?>
                                                                     <form method="post" id="gallery_imagefirst_medical" enctype="multipart/form-data">
						                                                    <input type="file" name="image" id="gallery_image1_medical" class="custom-file-input">
																			<input type="hidden" name="hospital_id" value="<?php echo $med_id;?>">
																			<input type="hidden" name="doctorsubmitgallery1_medical" value="doctorsubmitgallery1_medical" id="doctorsubmitgallery1" class="custom-file-input">
                                                                              </form>														
                                                        </div>												
                                                    </div>             
<!-----additional gallery end ---------------></div> 
                                    <div class="manage-ad-inner-main tab-manage-5">

                                        <div class="row">

                                            <div class="col-lg-8">
                                                <div class="row add-mnb" >
                                                    <ul>
                                                        <li data-tab="tab-man-11" class="li-m1">
                                                            <div class="col-lg-6">
                                                                <div class="add-new-doc add-new-doc-1">
                                                                    <h5><a href="javascript:void(0);"><?php if($lghosmod68){ echo $lghosmod68; }else { ?>Profile Settings<?php } ?></a></h5>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-tab="tab-man-21" class="li-m1">
                                                            <div class="col-lg-6">
                                                                <div class="view-new-doc">
                                                                    <h5><a href="javascript:void(0);"><?php if($lghosmod69){ echo $lghosmod69; }else { ?>Change Security<?php } ?></a></h5>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="col-lg-2"></div>
                                        </div>


                                        <div class="manage-ad-inner-mains1 tab-man-11 ">
                                            <div class="form-group hos-frm-grp hos-frm-grp-1">
											<?php
				    if($this->session->flashdata('messagedashhogg')) {
				    $messagedashhogg = $this->session->flashdata('messagedashhogg');
					?>
					<div class="alert alert-<?php echo $messagedashhogg['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedashhogg['messagedashhogg']; 
					?>
					</div>
					<?php
					}							                       
            ?>
											<form method="post" data-parsley-validate="" enctype="multipart/form-data">
											<input type="hidden" name="profile_status" value="1" >
                                                <div class="col-lg-10">
												<div class="row">
												 <div class="upload-hospital">
												 
                                                                <img src="<?php echo $hospital_data->display_image; ?>" />

                                                                <div class="upload-section-tag">
                                                                   <input type="file" id="uploadhosphosp" name="display_image" style="visibility: hidden; width: 1px; height: 1px"  />
                                                                    <h5><a href=""  Onclick="document.getElementById('uploadhosphosp').click(); return false" id="upload_link_hosphosp"><?php if($lghome){ echo $lghome; }else { ?>Browse Photo<?php } ?></a></h5>
                                                                </div>
                                                            </div></div>
                                                            
															    <div class="clearfix"></div></br>
															
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod107){ echo $lghosmod107; }else { ?>Medical Center<?php } ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control" value="<?php echo $hospital_data->medical_name; ?>" name="medical_name" data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" "  placeholder="Name">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod23){ echo $lghosmod23; }else { ?>Established in<?php } ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control" value="<?php echo $hospital_data->medical_established_date; ?>" name="medical_established_date" placeholder="YYYY/MM/DD" required =" ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod75){ echo $lghosmod75; }else { ?>PO Box<?php } ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" value="<?php echo $hospital_data->medical_zip; ?>" name="medical_zip" class="form-control" placeholder="1234" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="7" required =" ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod71){ echo $lghosmod71; }else { ?>Website <?php } ?> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" value="<?php echo $hospital_data->medical_website; ?>" name="medical_website" class="form-control" placeholder="www.example.com" required =" ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod73){ echo $lghosmod73; }else { ?>Phone <?php } ?> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control" value="<?php echo $hospital_data->phone; ?>" name="phone" id="example" placeholder="123456789" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="16" required =" ">
                                                        </div>
                                                    </div>
                                                   <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod27){ echo $lghosmod27; }else { ?>Country <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select name="medical_country" class="form-control" id="exampleSelect1" onchange="selectStatedocsub(this.options[this.selectedIndex].value)" required="" value="<?php echo $hospital_data->medical_country;?>">
									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>" <?php if($row_country->id == $hospital_data->medical_country ){ ?>
								selected ="selected" 
							<?php } ?>><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
									  <h5><?php if($lghosmod35){ echo $lghosmod35; }else { ?>If your country not found .Use location settings to add your country<?php } ?></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod28){ echo $lghosmod28; }else { ?>state <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select  name="medical_state" onchange="selectCitydocsub(this.options[this.selectedIndex].value)" class="form-control" id="state_dropdown_docsub" required="" value="<?php echo $hospital_data->medical_state;?>" >
										<option selected="selected" value="-1"><?php if($lgdoctormodalso){ echo $lgdoctormodalso; }else { ?>Select state<?php } ?></option> <?php foreach($states as $row_state){  ?>
                             <option value="<?php echo $row_state->id;?>" <?php if($row_state->id == $hospital_data->medical_state){ ?>
								selected ="selected" 
							<?php } ?>><?php echo $row_state->state_name;?></option>
                                  <?php  }   ?>                                                               
						              </select> 
											<h5><?php if($lghosmod34){ echo $lghosmod34; }else { ?>If your state not found Use location settings to add your state <?php } ?></h5>						
                                                                        </div>
                                                                    </div>
																	 <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod29){ echo $lghosmod29; }else { ?>city <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                           <select    name="medical_city" class="form-control" id="city_dropdown_docsub" value="<?php echo $hospital_data->medical_city;?>" required="">
										<option selected="selected" value="-1"><?php if($lgdoctormod45){ echo $lgdoctormod45; }else { ?>Select city<?php } ?></option><?php foreach($cities as $row_city){  ?>
                             <option value="<?php echo $row_city->id;?>" <?php if($row_city->id == $hospital_data->medical_city ){ ?>
								selected ="selected" 
							<?php } ?>><?php echo $row_city->city_name;?></option>
                                  <?php  }   ?>                                   
						              </select> 
																					 
<h5><?php if($lghosmod36){ echo $lghosmod36; }else { ?>If your city not found . Use location settings to add your city <?php } ?> </h5>
                                                                        </div>
                                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod31){ echo $lghosmod31; }else { ?>Address <?php } ?>  </h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" value="<?php echo $hospital_data->medical_address; ?>" name="medical_address" class="form-control" placeholder="Address here" required =" ">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod76){ echo $lghosmod76; }else { ?>About <?php } ?> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="text" value="<?php echo $hospital_data->about_medical; ?>" name="about_medical" class="form-control"  required =" ">
                                                        </div>
                                                    </div>
													 
                                                               
                                                                <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod32){ echo $lghosmod32; }else { ?>Latitude <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="latitude-doc-own"  value="<?php echo $hospital_data->latitude; ?>" name="latitude" required=""><br/>
																					 <span><a href="#" id='pick-map-doc-own'><?php if($lghosmod37){ echo $lghosmod37; }else { ?>Pick from map<?php } ?></a></span>
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod33){ echo $lghosmod33; }else { ?>Longitude<?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="longitude-doc-own" value="<?php echo $hospital_data->longitude; ?>"  name="longitude" required="">
                                                                        </div>
                                                                    </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="text-left-hsp">
                                                                            <h6><?php if($lgdoctormod38){ echo $lgdoctormod38; }else { ?>Awards <?php } ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" value="<?php echo $hospital_data->medical_awards; ?>" name="medical_awards" class="form-control" placeholder="enter awards" required =" ">
                                                                    </div>
                                                                </div>
																<div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="text-left-hsp">
                                                                            <h6><?php if($lghosmod77){ echo $lghosmod77; }else { ?>Memberships <?php } ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" value="<?php echo $hospital_data->medical_memberships; ?>" name="medical_memberships" class="form-control" placeholder="enter memberships" required =" ">
                                                                    </div>
                                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
												 <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" name="hospital-self" value="hospital-self" class="btn btn-default bfn-sve"><?php if($lghosmod79){ echo $lghosmod79; }else { ?>Update<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
													</form>
                                            </div>
                                        </div>

                                        <div class="manage-ad-inner-mains1 tab-man-21 ">
                                            <div class="form-group hos-frm-grp hos-frm-grp-1">
											
											<?php
				    if($this->session->flashdata('messagedashhogg2')) {
				    $messagedashhogg2 = $this->session->flashdata('messagedashhogg2');
					?>
					<div class="alert alert-<?php echo $messagedashhogg2['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedashhogg2['messagedashhogg2']; 
					?>
					</div>
					<?php
					}							                       
            ?>
			<form method="post" data-parsley-validate="" enctype="multipart/form-data">
                                                <div class="col-lg-10">
												<form method="post" data-parsley-validate="" enctype="multipart/form-data">
												<div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod80){ echo $lghosmod80; }else { ?>Email<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="email" value="<?php echo $hospital_data->email;?>" name="email"  data-parsley-trigger="change" data-parsley-type="email" required="">
                                                                        </div>
                                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod81){ echo $lghosmod81; }else { ?>Current Password<?php } ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="password" name="old_password" class="form-control" placeholder="Current" data-parsley-minlength="6" required="">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod82){ echo $lghosmod82; }else { ?>New Password<?php } ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="password" name="new_password" class="form-control" placeholder="New" data-parsley-minlength="6" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="text-left-hsp">
                                                                <h6><?php if($lghosmod83){ echo $lghosmod83; }else { ?>Confirm New Pasword<?php } ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input type="password" name="re_password" class="form-control" placeholder="Confirm" data-parsley-minlength="6" required="">
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" name="hospital-self-check" value="hospital-self-check"class="btn btn-default bfn-sve"><?php if($lghosmod94){ echo $lghosmod94; }else { ?>Save<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
</form>
                                                </div>
                                                <div class="clearfix"></div>
												</form>
                                            </div>

                                        </div>
                                    </div>
<!----additional gallery start -------------->
			<div class="manage-ad-inner-main tab-manage-10">

													<?php
				    if($this->session->flashdata('messagedashpackage')) {
				    $messagedashpackage = $this->session->flashdata('messagedashpackage');
					?>
					<div class="alert alert-<?php echo $messagedashpackage['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $messagedashpackage['messagedashpackage']; 
					?>
					</div>
					<?php
					}							                       
            ?>
														
           <div class="form-hospital-dash outhospitaladd">
				<div class="row  "> <div class="head-my-listing">								
                                            <h3> <?php if($lghosmod88){ echo $lghosmod88; }else { ?>Choose Package<?php } ?></h3>
                                        </div>     
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
<input type="hidden" name="hospital_type" value="medical" >
<li class="row_style_footer_1"><button name="package_id" value="<?php echo $packs->id;?>" class="buy_now"><?php if($lghosmod89){ echo $lghosmod89; }else { ?>Select Package<?php } ?></li>
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
<!-----additional gallery end --------------->

                                </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


        </div>

    </div>
</div>
<!--patient-login search-->
<div class="modal fade modal-wide" id="myModalmapbmd-hosp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
				  
                  <div class="modal-body" id="canvas1">
				  <div id="interrupt-trick1" class="interrupt-trick1">
				  <!--<div id="interrupt-trick1-sub" >
                    <div id='map_canvas' class="avoidinterrupt1"></div></div>--></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lat-hosp" />
                    <input type="hidden" id="pick-lng-hosp" />
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-custom select-location-hosp">Select Location</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			
			
			
										

			
			<div class="modal fade modal-wide" id="myModalmapbmd-doc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
				  
                  <div class="modal-body" id="canvas1">
				  <div id="interrupt-trick2" class="interrupt-trick2">
				  <!--<div id="interrupt-trick2-sub" >
                    <div id='map_canvas' class="avoidinterrupt2"></div></div>--></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lat-doc" />
                    <input type="hidden" id="pick-lng-doc" />
                    
                  </div> 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-custom select-location-doc">Select Location</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>	

<div class="modal fade modal-wide" id="myModalmapbmd-doc-own" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
				    <div class="modal-body" id="canvas1" >
				  <div id="interrupt-trick2-own" class="interrupt-trick2-own">
				  <!--<div id="interrupt-trick2-sub" >
                    <div id='map_canvas' class="avoidinterrupt2"></div></div>--></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lat-doc-own" />
                    <input type="hidden" id="pick-lng-doc-own" />
                    
                  </div> 
                  <!--<div class="modal-body" >
				  
                    <div id='map_canvas' ></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lat-doc-own" />
                    <input type="hidden" id="pick-lng-doc-own" />
                    
                  </div>--> 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-custom select-location-doc-own">Select Location</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>	





