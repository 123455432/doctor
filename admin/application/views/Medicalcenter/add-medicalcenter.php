<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Medical Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-heartbeat"></i>Home</a></li>
         <li><a href="#">Medical Details</a></li>
         <li class="active">Add Medical</li>
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
                  <h3 class="box-title">Add Medical Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
			   
                  <div class="box-body">                 
                     <div class="col-md-6">
					 
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Medical Name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="medical_name"  placeholder="Medical Name">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Medical Address</label>
                            <input type="text" class="form-control required"  required="" name="medical_address"  placeholder="Medical Address">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Medical Zip</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="8" data-parsley-pattern="^[0-9\  \/]+$" required="" name="medical_zip"  placeholder="Medical Zip">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control required" required="" name="email"  placeholder="Email">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Medical Awards </label>
                            <input type="text" class="form-control required"  required="" name="medical_awards"  placeholder="Medical Awards">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  
						  
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Medical Memberships </label>
                            <input type="text" class="form-control required"  required="" name="medical_memberships"  placeholder="Medical Memberships">
                            <span class="glyphicon  form-control-feedback"></span>
                           </div>
						  
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control required"  data-parsley-trigger="change"	
                            data-parsley-minlength="6" data-parsley-maxlength="15" required="" name="password"  placeholder="password">
                            <span class="glyphicon  form-control-feedback"></span>
                            </div>
							
						       <div class="form-group has-feedback">
							   <label for="exampleInputEmail1">About Medical</label>
							   <textarea class="textarea1 form-control box_sizes required" name="about_medical" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"></textarea>
							   <span class="glyphicon  form-control-feedback"></span>
							   </div>
						  
						  
				<?php if($medicalcountrydetails > 0){ ?>

							<div class="form-group has-feedback">
                            <label>Doctor Country</label>
					        <select class="form-control" onchange="selectStatedoctor(this.options[this.selectedIndex].value)" style="width: 100%;" name="medical_country" id="country_name">
							 <option value="-1">Select country</option>
								   <?php
									foreach($medicalcountrydetails as $countdetails){									
								   ?>
						<option value="<?php echo $countdetails->id;?>"><?php echo $countdetails->country_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                            </div>
						
				    <div class="form-group">
                        <label>Doctor State</label>
					 <select class="form-control" style="width: 100%;" id="state_dropdown" name="medical_state"  onchange="selectCitydoctor(this.options[this.selectedIndex].value)">
						 <option  value="-1">Select state</option>
								  
                     </select>
                    </div>	
					
					   <div class="form-group">
                        <label>Doctor City</label>
					 <select class="form-control" style="width: 100%;" id="city_dropdown" name="medical_city">
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
				   
				  
						<div class="form-group">
                        <label>Medical Visitation</label>
					    <select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="visitation[]" id="reason" required="">
								   <?php
									  $arry_select = explode(",", $data->visitation);
									  foreach($medicalreasondetails as $medicaldetailsreason){
								   ?>
			            <option value="<?php echo $medicaldetailsreason->id;?>"<?php if (in_array($medicaldetailsreason->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $medicaldetailsreason->reason;?></option>			  
								   <?php
								   }
								   ?>
                        </select>
                        </div>
						
						<div class="form-group">
                        <label>Medical Insurance</label>
					      <select class="form-control js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="insurance[]" id="insurance_name" required="">
								   <?php
									  $arry_select = explode(",", $data->insurance);
									  foreach($medicalvalues as $medicaldetailsval){
								   ?>
			              <option value="<?php echo $medicaldetailsval->id;?>"<?php if (in_array($medicaldetailsval->id, $arry_select))
					      echo 'selected';  ?> ><?php echo $medicaldetailsval->insurance_name;?></option>			  
								   <?php
								   }
								   ?>
                          </select>
                        </div>	
						
						
						<div class="form-group">
                        <label>Medical Specialty</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="specialty[]" id="specialty_name" required="">
								   <?php
									  $arry_select = explode(",", $data->specialty);
									  foreach($medicalspecialtyvales as $detailmedicalval){
								   ?>
			            <option value="<?php echo $detailmedicalval->id;?>"<?php if (in_array($detailmedicalval->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailmedicalval->specialty_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
					 <div class="form-group">
                        <label>Medical Language</label>
							<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="medical_languages[]" id="language_name" required="">
								   <?php
									  $arry_select = explode(",", $data->medical_languages);
									  foreach($medicallanguagedetails as $langdetailsmedical){
								   ?>
			            <option value="<?php echo $langdetailsmedical->id;?>"<?php if (in_array($langdetailsmedical->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $langdetailsmedical->language_name;?></option>			  
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
									  foreach($amenitiesdetailsmedical as $detailsamenities){
								   ?>
			            <option value="<?php echo $detailsamenities->id;?>"<?php if (in_array($detailsamenities->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailsamenities->facility_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
						<div class="form-group">
                        <label>Medical Affilliated</label>
							<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="medical_affilliations[]" id="hospital_name" required="">
								   <?php
									  $arry_select = explode(",", $data->medical_affilliations);
									  foreach($affiliatedsmedicaldetails as $detailsaffiliateds){
								   ?>
			            <option value="<?php echo $detailsaffiliateds->id;?>"<?php if (in_array($detailsaffiliateds->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailsaffiliateds->hospital_name;?></option>			  
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
					
				<!--sub medical-->
				
			<div class="form-group">
					    <label>Medical Type</label></br>
					   <select class="form-control" name="type_selection">
					    <option value="individual"  id="indivi">individual</option>
							<option value="submedical" name="subhosp" class="subhos">Sub Medical</option>
					   </select>
					    </div>
					   
					   
					   
					   
					   <div class="form-group" id="hos">
                          
							<label> Select Parent Medical Center</label></br>
						 <select class="form-control" name="parent_id" onchange="" style="width: 100%;" >
							 
							
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
						   <input type="checkbox"  value="agreed" name="terms"><label for="exampleInputEmail1">Add Medical To Agree List</label></br>
						</div>
						  
				   
						   <div class="form-group col-md-4">
						   <label>Display Picture</label>
						   <input name="display_image" accept="image/*" type="file" required="">
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


	 <div class="modal fade modal-wide" id="myModalmapmedical" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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


