
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
             <!-- <img src="<?php //echo base_url(); ?>assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">-->
			  <img src="<?php echo  $this->session->userdata('profile_pic'); ?>" class="user-image" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('logged_in')['username']?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
         <!-- <form method="post" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
			
			        <li class="treeview"><a href="#"><i class="fa fa-male"></i> <span>Patient Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Patient_details/view_patientdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>	<li><a href="<?php echo base_url();?>Patient_details/add_patient"><i class="fa fa-circle-o text-aqua"></i>Add Details</a></li> 
					  </ul>
                    </li>
				   
				    <li class="treeview"><a href="#"><i class="fa fa-user-md"></i> <span>Doctor Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Doctor_ctrl/view_doctordetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>	
						<li><a href="<?php echo base_url();?>Doctor_ctrl/add_doctorformation"><i class="fa fa-circle-o text-aqua"></i>Add Details</a></li>
						<li><a href="<?php echo base_url();?>Doctor_ctrl/add_gallery"><i class="fa fa-circle-o text-aqua"></i>Add Gallery</a></li>
					  </ul>
                    </li>
					
					 <li class="treeview"><a href="#"><i class="fa fa-h-square"></i> <span>Clinic Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Clinic_ctrl/view_clinicdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>	
						<li><a href="<?php echo base_url();?>Clinic_ctrl/add_clinicdetails"><i class="fa fa-circle-o text-aqua"></i>Add Details</a></li>
						<li><a href="<?php echo base_url();?>Clinic_ctrl/add_clinicgallery"><i class="fa fa-circle-o text-aqua"></i>Add Gallery</a></li>
					  </ul>
                    </li>

					 <li class="treeview"><a href="#"><i class="fa fa-heartbeat"></i> <span>Medical Center Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Medical_ctrl/view_medicaldetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>	
						<li><a href="<?php echo base_url();?>Medical_ctrl/add_medicaldetails"><i class="fa fa-circle-o text-aqua"></i>Add Details</a></li>
						<li><a href="<?php echo base_url();?>Medical_ctrl/add_medicalgallery"><i class="fa fa-circle-o text-aqua"></i>Add Gallery</a></li>
					  </ul>
                    </li>
					
					
					<li class="treeview"><a href="#"><i class="fa fa-hospital-o"></i> <span>Hospital Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Hospital_ctrl/view_hospitals"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>	
						<li><a href="<?php echo base_url();?>Hospital_ctrl/add_hospitaldetails"><i class="fa fa-circle-o text-aqua"></i>Add Details</a></li>
						<li><a href="<?php echo base_url();?>Hospital_ctrl/add_hospitalgallery"><i class="fa fa-circle-o text-aqua"></i>Add Gallery</a></li>
					  </ul>
                    </li>
					
					
				  <li class="treeview"><a href="#"><i class="fa fa-globe" aria-hidden="true"></i> <span>Manage Location</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Country_ctrl/add_countryname"><i class="fa fa-circle-o text-aqua"></i>Add Country Details</a></li>	
						<li><a href="<?php echo base_url();?>Country_ctrl/add_statename"><i class="fa fa-circle-o text-aqua"></i>Add State Details</a></li>
						<li><a href="<?php echo base_url();?>Country_ctrl/add_cityname"><i class="fa fa-circle-o text-aqua"></i>Add City Details</a></li>
					  </ul>
                    </li>
					
		 <li class="treeview"><a href="#"><i class="fa fa-globe" aria-hidden="true"></i> <span>Manage Additional Details</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
			
					<li class="treeview"><a href="#"><i class="fa fa-language" aria-hidden="true"></i> <span>Language Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Language_ctrl/add_languages"><i class="fa fa-circle-o text-aqua"></i>Add Language Details</a></li>	
					  </ul>
                    </li>
					
					
				   <li class="treeview"><a href="#"><i class="fa fa-houzz" aria-hidden="true"></i> <span>Affiliated  Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Affiliate_ctrl/add_affiliatedetails"><i class="fa fa-circle-o text-aqua"></i>Add Affiliated Details</a></li>	
					  </ul>
                    </li>
					
					
					 <li class="treeview"><a href="#"><i class="fa fa-futbol-o" aria-hidden="true"></i> <span>Amenities Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Amenities_ctrl/add_amenitiesdetails"><i class="fa fa-circle-o text-aqua"></i>Add Amenities Details</a></li>	
					  </ul>
                    </li>
					
					
					<li class="treeview"><a href="#"><i class="fa fa-crosshairs"></i> <span>Manage Visitation</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Speciality_ctrl/add_specialityvalues"><i class="fa fa-circle-o text-aqua"></i>Add Reason</a></li>	
					  </ul>
                    </li>
					
					
					<li class="treeview"><a href="#"><i class="fa fa-deviantart"></i> <span>Doctor Degree Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Doctordegree_ctrl/add_degreedetail"><i class="fa fa-circle-o text-aqua"></i>Add Doctor Degree</a></li>	
					  </ul>
                    </li>
					
					
					<li class="treeview"><a href="#"><i class="fa fa-indent" aria-hidden="true"></i> <span>Insurance Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Insurance_ctrl/add_insurancedetail"><i class="fa fa-circle-o text-aqua"></i>Add Insurance Details</a></li>	
					  </ul>
                    </li>
					
					<li class="treeview"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <span>Manage Specialty</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Visitation_ctrl/add_visitations"><i class="fa fa-circle-o text-aqua"></i>Add Specialty Details</a></li>	
					  </ul>
                    </li>
			</ul>		
		</li>			
				 
				 
				  
				   <li class="treeview"><a href="#"><i class="fa fa-globe" aria-hidden="true"></i> <span>Rating Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Rating_ctrl/view_ratingdetails"><i class="fa fa-circle-o text-aqua"></i>Clinic Rating Details</a></li>	
						<li><a href="<?php echo base_url();?>Rating_ctrl/view_doctorpopup"><i class="fa fa-circle-o text-aqua"></i>Doctor Rating Details</a></li>
						<li><a href="<?php echo base_url();?>Rating_ctrl/view_hospitalpopup"><i class="fa fa-circle-o text-aqua"></i>Hospital Rating Details</a></li>
						
						<li><a href="<?php echo base_url();?>Rating_ctrl/view_medicalpopup"><i class="fa fa-circle-o text-aqua"></i>Medical Rating Details</a></li>
					  </ul>
                    </li>
					
					
					<li class="treeview"><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i> <span>Doctor Appoinment Details</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Appoinment_ctrl/view_appoinmentdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li><li><a href="<?php echo base_url();?>Appoinment_ctrl/add_appoinmentdetails"><i class="fa fa-circle-o text-aqua"></i>Add Details</a></li> 
					  </ul>
                    </li>
					<li class="treeview"><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i> <span>Language Translation</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Language_translation/add_language"><i class="fa fa-circle-o text-aqua"></i>Add Language Translation</a></li>
						<li><a href="<?php echo base_url();?>Language_translation/view_language"><i class="fa fa-circle-o text-aqua"></i>View Language Translation</a></li>
						
					  </ul>
                    </li>
					<!----package ----->
            <li class="treeview"><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i> <span>Packages</span><i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">						
						<li><a href="<?php echo base_url();?>Package_ctrl/add_package"><i class="fa fa-circle-o text-aqua"></i>Add Doctor Packages</a></li> 						
						<li><a href="<?php echo base_url();?>Package_ctrl/hospital_package"><i class="fa fa-circle-o text-aqua"></i>Add Hospital Packages</a></li> 						
					  </ul>
                    </li>
					 <li>
                     <a href="<?php echo base_url(); ?>Settings_ctrl/view_settings"><i class="fa fa-wrench" aria-hidden="true"></i><span>Settings</span></a>
                  </li>
					
					
			
			
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
