<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Clinic Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-h-square"></i>Home</a></li>
         <li><a href="#">Clinic Details</a></li>
         <li class="active">Edit Clinic</li>
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
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Clinic Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
			   
                  <div class="box-body">                 
                     <div class="col-md-6">
					 
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Clinic Name</label>
                            <input type="text" class="form-control required" 
                            value="<?php echo $data->clinic_name; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="clinic_name"  placeholder="Clinic Name">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Clinic Address</label>
                            <input type="text" class="form-control required" 
                            value="<?php echo $data->clinic_address; ?>" required="" name="clinic_address"  placeholder="Clinic Address">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 


                             <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Clinic Zip</label>
                            <input type="text" class="form-control required" 
                            value="<?php echo $data->clinic_zip; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="8" data-parsley-pattern="^[0-9\  \/]+$" required="" name="clinic_zip"  placeholder="Clinic Zip">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>


                           
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control required" 
                            value="<?php echo $data->email; ?>"  required="" name="email"  placeholder="Email">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 


                           <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Clinic Awards </label>
                            <input type="text" class="form-control required" 
                            value="<?php echo $data->clinic_awards; ?>" required="" name="clinic_awards"  placeholder="Clinic Awards">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
                         
                      
						
				   <div class="form-group">
                            <label>Doctor Country</label>
					        <select class="form-control" style="width: 100%;" name="clinic_country" id="country_id" onchange="selectStatedoctor(this.options[this.selectedIndex].value)">
							<option value="-1">Select country</option>
								   <?php
									  foreach($cliniccountrydetails as $countdetails){									
								   ?>
						<option value="<?php echo $countdetails->id;?>" <?php if ($countdetails->id == $data->clinic_country){ ?>
						selected = "selected" <?php } ?>><?php echo $countdetails->country_name;?></option>
								   <?php
								   }
								   ?>
                            </select>
                            </div>		
				<div class="form-group">
                        <label>Doctor State</label>
					 <select class="form-control " style="width: 100%;" id="state_dropdown" name="clinic_state"  onchange="selectCitydoctor(this.options[this.selectedIndex].value)">
						
						<option value="-1">Select state</option>
						<?php foreach($clinicstatedetails as $countstatedetails){ ?>
						<option value="<?php echo $countstatedetails->state_id;?>" <?php if ($countstatedetails->state_id == $data->clinic_state){ ?>
						selected = "selected" <?php } ?> > <?php echo $countstatedetails->state_name; ?> </option>
								   <?php }  ?>	 
								  
                     </select>
                    </div>
					<div class="form-group">
                        <label>Doctor City</label>
					 <select class="form-control" style="width: 100%;" id="city_dropdown" name="clinic_city">
							
							<option value="-1">Select city</option>
							<?php foreach($cliniccitydetailsval as $countcitydetails){ ?>
							<option value="<?php echo $countcitydetails->city_id;?>" <?php if ($countcitydetails->city_id == $data->clinic_city){ ?>
							selected = "selected" <?php } ?> > <?php echo $countcitydetails->city_name; ?> </option>
								   <?php }  ?>		  
                     </select>
                    </div>

						
					

                      			
				
						
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				   <div class="col-md-6">
				   <div class="form-group">
                        <label>Clinic Language</label>
							<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="clinic_languages[]" id="language_name" required="">
								   <?php
									  $arry_select = explode(",", $data->clinic_languages);
									  foreach($cliniclanguagedetails as $langdetailsclinic){
								   ?>
			            <option value="<?php echo $langdetailsclinic->id;?>"<?php if (in_array($langdetailsclinic->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $langdetailsclinic->language_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
				   
                        <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Clinic Memberships </label>
                            <input type="text" class="form-control required" 
                            value="<?php echo $data->clinic_memberships; ?>" required="" name="clinic_memberships"  placeholder="Clinic Memberships">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  				

                        <div class="form-group">
                        <label>Clinic Insurance</label>
					      <select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="insurance[]" id="insurance_name" required="">
								   <?php
									  $arry_select = explode(",", $data->insurance);
									  foreach($insurancevalues as $insudetailsval){
								   ?>
			              <option value="<?php echo $insudetailsval->id;?>"<?php if (in_array($insudetailsval->id, $arry_select))
					      echo 'selected';  ?> ><?php echo $insudetailsval->insurance_name;?></option>			  
								   <?php
								   }
								   ?>
                          </select>
                        </div>	
					
						
						<div class="form-group">
                        <label>Clinic Specialty</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="specialty[]" id="specialty_name" required="">
								   <?php
									  $arry_select = explode(",", $data->specialty);
									  foreach($specialtyvales as $detailsspecialtyval){
								   ?>
			            <option value="<?php echo $detailsspecialtyval->id;?>"<?php if (in_array($detailsspecialtyval->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailsspecialtyval->specialty_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
						<div class="form-group">
                        <label>Clinic Visitation</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="visitation[]" id="reason" required="">
								   <?php
									  $arry_select = explode(",", $data->visitation);
									  foreach($clinicreasondetails as $clinicdetailsreason){
								   ?>
			            <option value="<?php echo $clinicdetailsreason->id;?>"<?php if (in_array($clinicdetailsreason->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $clinicdetailsreason->reason;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>



                         <div class="form-group">
                        <label>Amenities</label>
							<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="amenities[]" id="facility_name" required="">
								   <?php
									  $arry_select = explode(",", $data->amenities);
									  foreach($amenitiesdetails as $detailsamenities){
								   ?>
			            <option value="<?php echo $detailsamenities->id;?>"<?php if (in_array($detailsamenities->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailsamenities->facility_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	


                        <div class="form-group">
                        <label>Clinic Affilliated</label>
							<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="clinic_affilliations[]" id="hospital_name" required="">
								   <?php
									  $arry_select = explode(",", $data->clinic_affilliations);
									  foreach($affiliatedsdetails as $detailsaffiliateds){
								   ?>
			            <option value="<?php echo $detailsaffiliateds->id;?>"<?php if (in_array($detailsaffiliateds->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailsaffiliateds->hospital_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	

                       <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">About Clinic </label>
					   <textarea class="textarea1 form-control box_sizes required" name="about_clinic" required="" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"><?php echo $data->about_clinic; ?></textarea>
					   <span class="glyphicon  form-control-feedback"></span>
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
					    <label>Clinic Type</label></br>
					   <select class="form-control" name="type_selection">
					    <option  <?php if ($data->type_selection == 'individual' ) echo 'selected' ; ?> value="individual" id="indiv">Individual</option>
						 <option  <?php if ($data->type_selection == 'clinic' ) echo 'selected' ; ?> value="clinic" id="hosp">Sub Clinic</option>	
					   </select>
					    </div>
					   
					   
					   
					    <?php if ($data->type_selection == 'clinic'){?>
					   <div class="form-group" id="hos1edit">
                          
							<label> Select Clinic</label></br>
						 <select class="form-control" name="parent_id"  style="width: 100%;" >
							 
							
								   <?php
									foreach($clinic as $cli){									
								   ?>
						<option value="<?php echo $cli->id;?>"<?php if ($cli->id == $data->parent_id){ ?>
							selected = "selected" <?php } ?>><?php echo $cli->clinic_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
							
							
						  </div>			
						<?php } ?>
			
			 <div class="form-group" id="hos1">
                          
							<label> Select Clinic</label></br>
						 <select class="form-control" name="parent_id"  style="width: 100%;" >
							 
							
								   <?php
									foreach($clinic as $cli){									
								   ?>
						<option value="<?php echo $cli->id;?>"<?php if ($cli->id == $data->parent_id){ ?>
							selected = "selected" <?php } ?>><?php echo $cli->clinic_name;?></option>
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
						   <input name="display_image" accept="image/*" type="file">
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




            <div class="modal fade modal-wide" id="myModalmapingedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

