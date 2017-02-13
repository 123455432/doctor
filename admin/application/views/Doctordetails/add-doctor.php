<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Doctor Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="#">Doctor Details</a></li>
         <li class="active">Add Doctor</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <?php
               if($this->session->flashdata('message')) {
               $message = $this->session->flashdata('message');
               ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
         </div>
         <div class="col-md-12">
            <!-- general form elements -->
			
			 <h1 class="page-header">Doctor    <a class="btn btn-default" href="<?php echo base_url();?>Doctor_ctrl/addworking_time/">Working Time Add</a></h1>
			 
			 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Doctor Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">	
			   
                  <div class="box-body">                 
                     <div class="col-md-6">
					 
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Firstname</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="doctor_firstname"  placeholder="Firstname">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Lastname</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="doctor_lastname"  placeholder="Lastname">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Gender</label></br>
							
							<input type="radio"   value="Male" class=" required" 
                              required="" name="doctor_sex"  > Male
							<input type="radio"  value="Female" class="required" 
                              required="" name="doctor_sex"  >Female<br/>
							
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control required" data-parsley-trigger="change"	
                             required="" name="email"  placeholder="Email">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Age</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="2" data-parsley-pattern="^[0-9\  \/]+$" required="" name="doctor_age"  placeholder="Age">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						
						  
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Office Address</label>
                            <input type="text" class="form-control required"  required="" name="doctor_office_address"  placeholder="Doctor Office Address">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Office Zip</label>
                       <input type="text" class="form-control required"  data-parsley-trigger="change"	
                       data-parsley-minlength="2" data-parsley-maxlength="8" data-parsley-pattern="^[0-9\  \/]+$" required="" name="doctor_office_zip"  placeholder="Doctor Office Zip">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
			
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Awards</label>
                            <input type="text" class="form-control required" required="" name="doctor_awards"  placeholder="Doctor Awards" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Membership</label> 
							<input type="text" class="form-control required"  required=""  name="doctor_memberships"  placeholder="Doctor Membership" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
					<?php if($countrydetails > 0){ ?>

							<div class="form-group has-feedback">
                            <label>Doctor Country</label>
					        <select class="form-control" onchange="selectStatedoctor(this.options[this.selectedIndex].value)" style="width: 100%;" name="doctor_office_country" id="country_name">
							 <option value="-1">Select country</option>
								   <?php
									foreach($countrydetails as $countdetails){									
								   ?>
						<option value="<?php echo $countdetails->id;?>"><?php echo $countdetails->country_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                            </div>
						
				    <div class="form-group">
                        <label>Doctor State</label>
					 <select class="form-control" style="width: 100%;" id="state_dropdown" name="doctor_office_state"  onchange="selectCitydoctor(this.options[this.selectedIndex].value)">
						 <option  value="-1">Select state</option>
								  
                     </select>
                    </div>	
					
					   <div class="form-group">
                        <label>Doctor City</label>
					 <select class="form-control" style="width: 100%;" id="city_dropdown" name="doctor_office_city">
							 <option  value="-1">Select state</option>	  
								  
                     </select>
                     
                    </div>
		<?php } ?>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				   <div class="col-md-6">
				   
				
						   
						     
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Password</label>
                           <input type="text" class="form-control required"  data-parsley-trigger="change"	
                           data-parsley-minlength="6" data-parsley-maxlength="15" required="" name="password"  placeholder="password">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						 
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Experience </label>
                            <input type="text" class="form-control required" required="" name="doctor_experience"  placeholder="Doctor Experience" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">About Doctor </label>
							<textarea class="textarea1 form-control box_sizes required" name="about_doctor" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"></textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  
		
						  
						  <div class="form-group">
                        <label>Doctor Degree</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="doctor_degree[]" id="degree_name" required="">
								   <?php
									  $arry_select = explode(",", $data->doctor_degree);
									  foreach($docdegreedetails as $degreedetails){
								   ?>
			            <option value="<?php echo $degreedetails->id;?>"<?php if (in_array($degreedetails->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $degreedetails->degree_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						  
						  

                             		<div class="form-group">
                        <label>Insurance</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="insurance[]" id="insurance_name" required="">
								   <?php
									  $arry_select = explode(",", $data->insurance);
									  foreach($insurancedetails as $insudetails){
								   ?>
			            <option value="<?php echo $insudetails->id;?>"<?php if (in_array($insudetails->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $insudetails->insurance_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						  
						<div class="form-group">
                        <label>Doctor Affiliations</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="doctor_affiliations[]" id="hospital_name" required="">
								   <?php
									  $arry_select = explode(",", $data->doctor_affiliations);
									  foreach($Affiliationsdetails as $amenitiedetails){
								   ?>
			            <option value="<?php echo $amenitiedetails->id;?>"<?php if (in_array($amenitiedetails->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $amenitiedetails->hospital_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
						<div class="form-group">
                        <label>Doctor Specialty</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="specialty[]" id="specialty_name" required="">
								   <?php
									  $arry_select = explode(",", $data->specialty);
									  foreach($specialtydetails as $detailsspecialty){
								   ?>
			            <option value="<?php echo $detailsspecialty->id;?>"<?php if (in_array($detailsspecialty->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailsspecialty->specialty_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
						<div class="form-group">
                        <label>Doctor Visitation</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="visitation[]" id="reason" required="">
								   <?php
									  $arry_select = explode(",", $data->visitation);
									  foreach($reasondetails as $detailsreason){
								   ?>
			            <option value="<?php echo $detailsreason->id;?>"<?php if (in_array($detailsreason->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailsreason->reason;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
						
										  
						<div class="form-group">
                        <label>Doctor Language</label>
							<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="doctor_languages[]" id="language_name" required="">
								   <?php
									  $arry_select = explode(",", $data->doctor_languages);
									  foreach($languagedetails as $langdetails){
								   ?>
			            <option value="<?php echo $langdetails->id;?>"<?php if (in_array($langdetails->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $langdetails->language_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Latitude</label>
					   <input type="text" class="form-control required" value="" name="latitude"  id="latitude" placeholder="Latitude">
					   <span class="glyphicon  form-control-feedback"></span>
					   <span><a href="#" id='pick-map'>Pick from map</a></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Longitude</label>
					   <input type="text" class="form-control required" value="" name="longitude" id="longitude"  placeholder="Longitude">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
						
						
				 <div class="form-group">
					    <label>Hospital Type</label></br>
				 <select class="form-control" name="type_selection">
					 <option value="individual" class="indivi" >individual</option>
					 <option value="clinic"  	class="cli"    >Clinic</option>	
					 <option value="hospital"   class="hospit" >Hospital</option>	
					 <option value="medical" 	class="medi"   >Medical</option>
				</select>
					    </div>
					   
					   
					     <div class="form-group" id="clinic">
                          
							<label> Select Clinic</label></br>
						 <select class="form-control" name="clinic_id" onchange="" style="width: 100%;" >
						<?php
									foreach($clinic as $cli){									
								   ?>
						<option value="<?php echo $cli->id;?>"><?php echo $cli->clinic_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
							
							
						  </div>		
					   
					   <div class="form-group" id="hospital">
                          
							<label> Select Hospital</label></br>
						 <select class="form-control" name="hospital_id" onchange="" style="width: 100%;" >
						<?php
									foreach($hospital as $hos){									
								   ?>
						<option value="<?php echo $hos->id;?>"><?php echo $hos->hospital_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
							
							
						  </div>		
						  <div class="form-group" id="medical">
                          
							<label> Select medical</label></br>
						 <select class="form-control" name="medical_id" onchange="" style="width: 100%;" >
						<?php
									foreach($medical as $med){									
								   ?>
						<option value="<?php echo $med->id;?>"><?php echo $med->medical_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
							
							
						  </div>		
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="form-group checkbox" style="padding:20px;">   
						   <input type="checkbox"  value="agreed" name="terms"><label for="exampleInputEmail1">Add Doctor To Agree List</label></br>
						</div>
						
						
						   <div class="form-group col-md-4">
						   <label>Display Picture</label>
						   <input name="display_image" accept="image/*" type="file">
						  <!-- <img  width="100px" height="100px" alt="Picture Not Found"/>-->
						   </div>
						   
						   
				
  
						  
				   </div>
				   
				  </div>
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>


	 
		 <div class="modal fade modal-wide" id="myModalmapbmd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
                  <div class="modal-body">
                    <div id='map_canvas'></div>
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

