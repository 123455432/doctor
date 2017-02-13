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
<div class="container-fluid srch-patient-log srch-patient-log-clinic">
    <div class="container">
        <div class="sel-clinic-main">
            <div class="col-lg-12">
                 <div class="col-lg-1"></div>
                <div class="col-lg-11 pad-zero">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sel-clinic-group">							
                                <img src= "<?php echo $view_clinic->display_image;?>" alt="" class="img-responsive sel-log-img"/>
                                <p><?php echo $view_clinic->clinic_address; ?>, <?php echo $view_clinic->city_name;?>
                                   <?php echo $view_clinic->state_name;?>,<?php echo $view_clinic->country_name;?> <?php echo $view_clinic->clinic_zip;?>
                                </p>
                                <h4>Rate Us</h4>
                      <div class="gc-ratting" data-rate="<?php echo $view_clinic->avg_rating; ?>" ></div>

                            </div>
                        </div>
                        <div class="col-lg-8 pad-zero">
                            <div class="row">
                                <div class="col-lg-3 pad-zero sel-cl-mn">
                                 <div class="sel-clinic-tab">
                                     <ul>
                                         <li data-tab="tab-manage-1" class="li-man">
                                             <h5><?php if($lghostdes8){ echo $lghostdes8; }else { ?>Gallery<?php } ?></h5>
                                         </li>
                                         <li data-tab="tab-manage-2" class="li-man">
                                             <h5><?php if($lghostdes9){ echo $lghostdes9; }else { ?>About<?php } ?></h5>
                                         </li>
                                         <li data-tab="tab-manage-3" class="li-man">
                                             <h5><?php if($lghostdes10){ echo $lghostdes10; }else { ?>Specialities<?php } ?></h5>
                                         </li>
                                         <li data-tab="tab-manage-4" class="li-man">
                                             <h5><?php if($lghostdes11){ echo $lghostdes11; }else { ?>Amenities<?php } ?></h5>
                                         </li>
                                         <li data-tab="tab-manage-5" class="li-man">
                                             <h5><?php if($lghostdes12){ echo $lghostdes12; }else { ?>Insurance Partner<?php } ?></h5>
                                         </li>
                                         <li data-tab="tab-manage-6" class="li-man">
                                             <h5><?php if($lghostdes13){ echo $lghostdes13; }else { ?>Affiliations<?php } ?></h5>
                                         </li>
                                         <li data-tab="tab-manage-7" class="li-man">
                                             <h5><?php if($lghostdes14){ echo $lghostdes14; }else { ?>Memberships<?php } ?></h5>
                                         </li>
                                         <li data-tab="tab-manage-8" class="li-man">
                                             <h5><?php if($lghostdes15){ echo $lghostdes15; }else { ?>Awards<?php } ?></h5>
                                         </li>
                                     </ul>
                                 </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="manage-ad-inner-main tab-manage-1">
                                     <div class="image-large-gallery">
                                      <div class="view-img-large">
									  <?php if(! empty ($view_clinicgallery[0])){ ?>
                                          <img src= "<?php echo $view_clinicgallery[0]->image;?>" id="DataDisplay" class="img-responsive" />
									  <?php }else{ ?>
									  <img src="<?php echo base_url(); ?>assets/images/sel-clinic/1.jpg"  id="DataDisplay" class="img-responsive" />
									  <?php } ?>
                                      </div>

                                         <div class="thumnail-slider-large">
                                                <br>
                                             <div id="myCarousel" class="carousel fdi-Carousel slide">
                                                 <!-- Carousel items -->
                                                 <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
                                                     <div class="carousel-inner onebyone-carosel">
                                                         <div class="item active">
                                                             <div class="col-md-4 small-thumbnail">
															 <?php if(! empty ($view_clinicgallery[1] )){ ?>
                                                              <img src= "<?php echo $view_clinicgallery[1]->image;?>" />
															   <?php }else{ ?>
															  <img src="<?php echo base_url(); ?>assets/images/sel-clinic/1.jpg" />
															  <?php } ?>
                                                             </div>
                                                         </div>
                                                         <div class="item ">
                                                             <div class="col-md-4 small-thumbnail">
															 <?php if(! empty ($view_clinicgallery[2] )){ ?>
                                                                 <img src= "<?php echo $view_clinicgallery[2]->image;?>" />
																  <?php }else{ ?>
																  <img src="<?php echo base_url(); ?>assets/images/sel-clinic/1.jpg" />
															  <?php } ?>
                                                             </div>
                                                         </div>
                                                         <div class="item">
                                                             <div class="col-md-4 small-thumbnail">
															 <?php if(! empty ($view_clinicgallery[3] )){ ?>
                                                                 <img src= "<?php echo $view_clinicgallery[3]->image;?>" />
																 <?php }else{ ?>
																 <img src="<?php echo base_url(); ?>assets/images/sel-clinic/1.jpg" />
															  <?php } ?>
                                                             </div>
                                                         </div>
                                                         <div class="item">
                                                             <div class="col-md-4 small-thumbnail">
															  <?php if(! empty ($view_clinicgallery[4] )){ ?>
                                                                 <img src= "<?php echo $view_clinicgallery[4]->image;?>" />
																 <?php }else{ ?>
																 <img src="<?php echo base_url(); ?>assets/images/sel-clinic/1.jpg" />
															  <?php } ?>
                                                             </div>
                                                         </div>
                                                         <div class="item">
                                                             <div class="col-md-4 small-thumbnail">
															 <?php if(! empty ($view_clinicgallery[5] )){ ?>
                                                                 <img src= "<?php echo $view_clinicgallery[5]->image;?>" />
																 <?php }else{ ?>
																 <img src="<?php echo base_url(); ?>assets/images/sel-clinic/1.jpg" />
															  <?php } ?>
                                                             </div>
                                                         </div>
                                                         <div class="item">
                                                             <div class="col-md-4 small-thumbnail">
															 <?php if(! empty ($view_clinicgallery[6] )){ ?>
                                                                 <img src= "<?php echo $view_clinicgallery[6]->image;?>" />
																 <?php }else{ ?>
																 <img src="<?php echo base_url(); ?>assets/images/sel-clinic/1.jpg" />
															  <?php } ?>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <a class="left left-sr-clinic" href="#eventCarousel" data-slide="prev">
													 <img src="<?php echo base_url(); ?>assets/images/sel-clinic/1.png" />
                                                      
                                                     </a>
                                                     <a class="right right-sr-clinic" href="#eventCarousel" data-slide="next">
													 <img src="<?php echo base_url(); ?>assets/images/sel-clinic/2.png" />
                                                       
                                                     </a>
                                                 </div>
                                                 <!--/carousel-inner-->
                                             </div><!--/myCarousel-->

                                         </div>
                                     </div>
                                    </div>
                                    <div class="manage-ad-inner-main tab-manage-2">
                                        <div class="sel-inner-sec-tab">
                                            <h3><?php echo strtoupper ($view_clinic->clinic_name); ?></h3>
                                            <p><?php echo $view_clinic->about_clinic;?></p>
                                        </div>
                                    </div>
                                    <div class="manage-ad-inner-main tab-manage-3">
                                        <div class="sel-inner-sec-tab">
                                            <h3><?php echo strtoupper($view_clinic->clinic_name); ?></h3>
                                            <p><?php echo $view_clinic->specialty_name; ?></p>
                                        </div>
                                    </div>
                                    <div class="manage-ad-inner-main tab-manage-4">
                                        <div class="sel-inner-sec-tab">
                                            <h3><?php echo strtoupper($view_clinic->clinic_name); ?></h3>
                                            <p><?php echo $view_clinic->facility_name; ?></p>
                                        </div>
                                    </div>
                                    <div class="manage-ad-inner-main tab-manage-5">
                                        <div class="sel-inner-sec-tab">
                                            <h3><?php echo strtoupper($view_clinic->clinic_name); ?></h3>
                                            <p><?php echo $view_clinic->insurance_name; ?></p>
                                        </div>
                                    </div>
                                    <div class="manage-ad-inner-main tab-manage-6">
                                        <div class="sel-inner-sec-tab">
                                            <h3><?php echo strtoupper($view_clinic->clinic_name); ?></h3>
                                            <p><?php echo $view_clinic->affhospital_name; ?></p>
                                        </div>
                                    </div>
                                    <div class="manage-ad-inner-main tab-manage-7">
                                        <div class="sel-inner-sec-tab">
                                            <h3><?php echo strtoupper($view_clinic->clinic_name); ?></h3>
                                            <p><?php echo $view_clinic->clinic_memberships; ?></p>
                                        </div>
                                    </div>
                                    <div class="manage-ad-inner-main tab-manage-8">
                                        <div class="sel-inner-sec-tab">
                                            <h3><?php echo strtoupper($view_clinic->clinic_name); ?></h3>
                                            <p><?php echo $view_clinic->clinic_awards; ?></p>
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
        <h4><?php if($lgfdsasd){ echo $lgfdsasd; }else { ?>Select a Speciality Doctor <?php } ?> </h4>
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
						
			       <div class="error"><h1><?php if($lgfderror){ echo $lgfderror; }else { ?>Sorry, No records found. Please try with different keywords. <?php } ?> </h1></div>
			       	<div class="clearfix"></div>
									
			
			<?php  }
				
?>
            </div>
			</div>
			
			
			
		<!----- for modal ---->	
<div class="container">
    <!-- Modal -->
    <div class="modal fade bac-modal" id="myModalbook-app" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content login-modal">
                <button type="button" class="btn btn-default close-mdl" data-dismiss="modal"><img src="<?php echo base_url(); ?>assets/images/login/2.png" /> </button>
             <!----- dummy---->
			 <div class="container">
			 <div class="doctor-pat-srch">
     
        <div class="row">
            <div class="evnt-mn doctor" id="updates">
			  <div class="col-lg-5 evt-br-1" id="calendar_blk">
				
                    <div class="date-head">
					<div class="previouscalapp" id="<?php echo $doctor_detail->id; ?>" data-date="<?php echo $date;?>" data-selected="true">
				<img id="previouscalapp" src="<?php echo base_url(); ?>assets/images/career/cal-left.png" />
				</div>
				<div class="dttime">
                        <ul>
						<div class="dttime-list">
                            <li> <h5><?php echo $date= date('D Y-m-d');?></h5>
                                
                            </li>
							</div>
						<div class="dttime-list">
                            <li> <h5><?php echo date('D Y-m-d', strtotime($date. ' + 1 days')) ?></h5>
                                
                            </li>
							</div>
						<div class="dttime-list">	
                            <li> <h5><?php echo date('D Y-m-d', strtotime($date. ' + 2 days')) ?></h5>
                                
                            </li>
							</div>
                        </ul>
						</div>
						<div class="nextcalapp " id="<?php echo $doctor_detail->id; ?>" data-date="<?php echo $date;?>" data-selected="true">
					<img id="nextcalapp" src="<?php echo base_url(); ?>assets/images/career/cal-right.png" />
				</div>
                        <div class="clearfix"></div>
                    </div>
					
                    <div class="date-inner-mn">
					<div class="date-inner-mn-list">
                        <ul>
						 
                            <li class="active">9 : 00 am</li>
                            <li>9 : 00 am</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                        </ul>
						</div>
						<div class="date-inner-mn-list">
                        <ul>
                            <li>9 : 00 am</li>
                            <li>9 : 00 am</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                        </ul>
						</div>
						<div class="date-inner-mn-list">
                        <ul>
                            <li>9 : 00 am</li>
                            <li>9 : 00 am</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>
                            <li>Break</li>

                        </ul>
							</div>
                    </div>
                </div></div></div></div></div>
				<!----dummy--->
            </div>

        </div>
    </div>

</div>
       		<!----- for modal ---->	 
			
			
			
		<?php		
         if(!empty($doctors)) {
				   ?>
        <div class="view-more loadmore">
		 <div id="moreclinicdoctor<?php echo $doctor_detail->id; ?>" class="moreboxclinicdoctor">
                        
            <a href="#" id="<?php  echo $doctor_detail->id; ?>" class="filterloadmoreclinicdoctor" ><h3><span><img src="<?php echo base_url(); ?>assets/images/patient-login/vmore.png" /> </span><?php if($lgfncountry){ echo $lgfncountry; }else { ?>View More<?php } ?></h3></a>
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

       		<!----- for modal ---->	 </div>