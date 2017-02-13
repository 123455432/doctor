


<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Doctor Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="#">Doctor Details</a></li>
         <li class="active">Edit Doctor</li>
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
		 
		     
			 
			  <h1 class="page-header">Doctor    <a class="btn btn-default" href="<?php echo base_url();?>Doctor_ctrl/edit_doctorworking/<?php echo $id; ?>">Working Time Edit</a></h1>
            <!-- general form elements -->
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Doctor Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">	
                  <div class="box-body">                 
                     <div class="col-md-6">
					 
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Firstname</label>
                            <input type="text" class="form-control required" value="<?php echo $data->doctor_firstname; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="doctor_firstname"  placeholder="Firstname">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Lastname</label>
                            <input type="text" class="form-control required" value="<?php echo $data->doctor_lastname; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="doctor_lastname"  placeholder="Lastname">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Gender</label></br>
							
							<input type="radio"   value="Male"  <?php if($data->doctor_sex=="Male"){ echo "checked";}?> class=" required" 
                              required="" name="doctor_sex"  > Male
							<input type="radio"  value="Female"  <?php if($data->doctor_sex=="Female"){ echo "checked";}?> class="required" 
                              required="" name="doctor_sex"  >Female<br/>
							
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control required" value="<?php echo $data->email; ?>" 	
                             required="" name="email"  placeholder="Email">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Age</label>
                            <input type="text" class="form-control required" value="<?php echo $data->doctor_age; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="2" data-parsley-pattern="^[0-9\  \/]+$" required="" name="doctor_age"  placeholder="Age">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Awards</label>
                            <input type="text" class="form-control required" value="<?php echo $data->doctor_awards; ?>" required="" name="doctor_awards"  placeholder="Doctor Awards">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Membership</label>
                            <input type="text" class="form-control required" value="<?php echo $data->doctor_memberships; ?>" required="" 
							name="doctor_memberships"  placeholder="Doctor Membership">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 


                           <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Office Address</label>
                            <input type="text" class="form-control required" value="<?php echo $data->doctor_office_address; ?>" required="" name="doctor_office_address"  placeholder="Doctor Office Address">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Office Zip</label>
                            <input type="text" class="form-control required" value="<?php echo $data->doctor_office_zip; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="8" data-parsley-pattern="^[0-9\  \/]+$" required="" name="doctor_office_zip"  placeholder="Doctor Office Zip">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Doctor Experience </label>
                            <input type="text" class="form-control required" value="<?php echo $data->doctor_experience; ?>"  required="" name="doctor_experience"  placeholder="Doctor Experience">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 							  
					   
                       
                       

<!----edit 01/12/2016  ----->
				<div class="form-group">
                            <label>Doctor Country</label>
					        <select class="form-control " style="width: 100%;" name="doctor_office_country" id="country_id" onchange="selectStatedoctor(this.options[this.selectedIndex].value)" required="">
							<option  value="-1" >Select country</option>
								   <?php
									  foreach($countrydetails as $countdetails){									
								   ?>
						<option value="<?php echo $countdetails->id;?>" <?php if ($countdetails->id == $data->doctor_office_country){ ?>
						selected = "selected" <?php } ?>><?php echo $countdetails->country_name;?></option>
								   <?php
								   }
								   ?>
                            </select>
                            </div>		
				<div class="form-group">
                        <label>Doctor State</label>
					 <select class="form-control " style="width: 100%;" id="state_dropdown" name="doctor_office_state"  onchange="selectCitydoctor(this.options[this.selectedIndex].value)" required="">
						
						<option value="-1">Select state</option>
						<?php foreach($statedetails as $countstatedetails){ ?>
						<option value="<?php echo $countstatedetails->state_id;?>" <?php if ($countstatedetails->state_id == $data->doctor_office_state){ ?>
						selected = "selected" <?php } ?> > <?php echo $countstatedetails->state_name; ?> </option>
								   <?php }  ?>	 
								  
                     </select>
                    </div>
					<div class="form-group">
                        <label>Doctor City</label>
					 <select class="form-control" style="width: 100%;" id="city_dropdown" name="doctor_office_city">
							
							<option value="-1">Select city</option>
							<?php foreach($citydetails as $countcitydetails){ ?>
							<option value="<?php echo $countcitydetails->city_id;?>" <?php if ($countcitydetails->city_id == $data->doctor_office_city){ ?>
							selected = "selected" <?php } ?> > <?php echo $countcitydetails->city_name; ?> </option>
								   <?php }  ?>		  
                     </select>
                    </div>



<!--------exit------>





							
						  
				
					
                        
					
                        
										
					
											                 			   
					    
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				   <div class="col-md-6">

				   
				   
						 
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">About Doctor </label>                           
							<textarea class="textarea1 form-control box_sizes required" name="about_doctor" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"><?php echo $data->about_doctor; ?></textarea>
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
					   <input type="text" class="form-control required" value="<?php echo $data->latitude; ?>" name="latitude"  id="latitudes" placeholder="Latitude">
					   <span class="glyphicon  form-control-feedback"></span>
					   <span><a href="#" id='pick-maps'>Pick from map</a></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Longitude</label>
					   <input type="text" class="form-control required" value="<?php echo $data->longitude; ?>" name="longitude" id="longitudes"  placeholder="Longitude">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
						
						
						
				<div class="form-group">
					    <label>Hospital Type</label></br>
				 <select class="form-control" name="type_selection">
				 <option  <?php if ($data->type_selection == 'individual' ) echo 'selected' ; ?> 	value="individual" 	class="indiv">Individual</option>
				 <option  <?php if ($data->type_selection == 'clinic' ) echo 'selected' ; ?> 		value="clinic" 		class="cli">Sub Clinic</option>
				<option  <?php if ($data->type_selection == 'hospital' ) echo 'selected' ; ?>		value="hospital" 	class="hospit">Hospital</option>
				<option  <?php if ($data->type_selection == 'medical' ) echo 'selected' ; ?> 		value="medical" 	class="medi">Medical center</option>
				 
					
					
					 
				</select>
					    </div>
					  
					   <?php if ($data->type_selection == 'clinic'){?>
					     <div class="form-group" id="clinicedit">
                          
							<label> Select Clinic</label></br>
						 <select class="form-control" name="clinic_id" onchange="" style="width: 100%;" >
						 <?php
									foreach($clinic as $cli){									
								   ?>
						<option value="<?php echo $cli->id;?>"<?php if ($cli->id == $data->clinic_id){ ?>
							selected = "selected" <?php } ?>><?php echo $cli->clinic_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
							
							
						  </div>

					   <?php } ?>

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
						  
						  
						  
						  
						  
						  
					    <?php if ($data->type_selection == 'hospital'){?>
					   <div class="form-group" id="hospitaledit">
                          
							<label> Select Hospital</label></br>
						 <select class="form-control" name="hospital_id" onchange="" style="width: 100%;" >
						<?php
									foreach($hospital as $hos){									
								   ?>
						<option value="<?php echo $hos->id;?>"<?php if ($hos->id == $data->hospital_id){ ?>
							selected = "selected" <?php } ?>><?php echo $hos->hospital_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
							 
						  </div>
						<?php } ?>

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
						  
						  
						  
						  <?php if ($data->type_selection == 'medical'){?>
						  <div class="form-group" id="medicaledit">
                          
							<label> Select medical</label></br>
						 <select class="form-control" name="medical_id" onchange="" style="width: 100%;" >
						<?php
									foreach($medical as $med){									
								   ?>
						<option value="<?php echo $med->id;?>"<?php if ($med->id == $data->medical_id){ ?>
							selected = "selected" <?php } ?>><?php echo $med->medical_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
							
							
						  </div>				
						<?php } ?>
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
						
						
						   <?php if($data->terms == 'agreed') 
			{
			$c = "checked";
			}
			else
			{ 
			$c = "";
			}
			?>
			
					  
						
						
						   <div class="form-group col-md-4">
						   <label>Display Picture</label>
						   <input name="display_image" accept="image/*" type="file" >
						   <img src="<?php echo $data->display_image; ?>" width="100px" height="100px" alt="Picture Not Found"/>
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

            <div class="modal fade modal-wide" id="myModalmaping" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
               <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
                  <div class="modal-body">
                    <div id='map_canvasing'></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lats" />
                    <input type="hidden" id="pick-lngs" />
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-custom select-location">Select Location</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>	
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>	
