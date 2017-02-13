	<?php
  $settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
       
?>
<!DOCTYPE html>
<html lang="en">

<body>


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



<!--banner-section-->
<div class="container-fluid">
    <div class="banner">
        <div class="container">
            <div class="col-lg-12">
                <div class="banner-text animated fadeInLeft">
                    <h3><?php if($lgl1){ echo $lgl1; }else { ?>Keep Your<?php } ?></h3>
                    <h2><?php if($lgl2){ echo $lgl2; }else { ?>Family More Healthy<?php } ?></h2>
                    <p><?php if($lgl3){ echo $lgl3; }else { ?>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<?php } ?></p>
                    <a href=""><?php if($lgl4){ echo $lgl4; }else { ?>Read more<?php } ?><i class="fa fa-angle-double-right"></i> </a>
                    <div class="scroll">
                        <img class="hvr-grow" src="<?php echo base_url(); ?>assets/images/home/scroll.png" alt=""/>
                        <h3 ><?php if($lgscrolldown){ echo $lgscrolldown; }else { ?>Scroll Down<?php } ?></h3>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
<!--banner-section-->

<!--map-section-->
<div class="container-fluid">
    <div class="map">
        <div class="man">
            <img src="<?php echo base_url(); ?>assets/images/home/man.png" class="img-responsive animated fadeInDown" alt=""/>
        </div>
        <div class="container">
            <div class="map-text">
                <h3><?php if($lgl5){ echo $lgl5; }else { ?>HEALTHCARE AT YOUR DEMAND !<?php }?></h3>
                <h4><?php if($lgl6){ echo $lgl6; }else { ?>Find a nearby doctor or dentist and book an appointment instantly. And <?php }?><span><?php if($lgl7){ echo $lgl7; }else { ?>it's free !<?php }?></span></h4>
            </div>
        </div>
    </div>

</div>
<!--map-section-->

<div class="container-fluid features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-text">
                    <h3><?php if($lgfeatures){ echo $lgfeatures; }else { ?>FEATURES<?php } ?></h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-inner hvr-shrink">
                    <img src="<?php echo base_url(); ?>assets/images/home/f1.png"  class="img-responsive" alt=""/>
                    <h4><?php if($lgl8){ echo $lgl8; }else { ?>View a map of doctors in your
                        insurance network.<?php } ?></h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-inner hvr-shrink">
                    <img src="<?php echo base_url(); ?>assets/images/home/f2.png" class="img-responsive" alt=""/>
                    <h4><?php if($lgl9){ echo $lgl9; }else { ?>Read patient reviews to help you choose the right doctor<?php } ?></h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-inner hvr-shrink">
                    <img src="<?php echo base_url(); ?>assets/images/home/f3.png" class="img-responsive" alt=""/>
                    <h4><?php if($lgl10){ echo $lgl10; }else { ?>See any doctor's available times and click to book!<?php } ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!--get the app-->
<div class="container-fluid">
    <div class="app-banner">
        <div class="container ">
            <div class="app">
                <h3><?php if($lgl11){ echo $lgl11; }else { ?>GET THE APP<?php } ?></h3>
                <h4><?php if($lgl12){ echo $lgl12; }else { ?>Make appointments on the go, right from <br>
                    your smartphone, with our top-rated<br>
                    mobile app.<?php } ?></h4>
                <img src="<?php echo base_url(); ?>assets/images/home/line.png"  class="line-img"/>
                <div class="clearfix"></div>
                <h5><?php if($lgl13){ echo $lgl13; }else { ?>Get it on<?php } ?></h5>
                <a href=""><img src="<?php echo base_url(); ?>assets/images/home/ios.png" alt="" class="img-responsive hvr-grow"/> </a>
                <a href=""><img src="<?php echo base_url(); ?>assets/images/home/googleplay.png"  alt="" class="img-responsive hvr-grow"/> </a>
            </div>
        </div>
    </div>
</div>




</body>
</html>





























