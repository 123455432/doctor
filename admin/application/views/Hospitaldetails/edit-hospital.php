<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Hospital Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-hospital-o"></i>Home</a></li>
         <li><a href="#">Hospital Details</a></li>
         <li class="active">Edit Hospital</li>
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
                  <h3 class="box-title">Edit Hospital Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
			   
                  <div class="box-body">                 
                     <div class="col-md-6">
					 
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Hospital Name</label>
                            <input type="text" class="form-control required" value="<?php echo $data->hospital_name; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="50" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="hospital_name"  placeholder="Hospital Name">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Hospital Address</label>
                            <input type="text" class="form-control required" value="<?php echo $data->hospital_address; ?>" required="" name="hospital_address"  placeholder="Hospital Address">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Hospital Zip</label>
                            <input type="text" class="form-control required" value="<?php echo $data->hospital_zip; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="8" data-parsley-pattern="^[0-9\  \/]+$" required="" name="hospital_zip"  placeholder="Hospital Zip">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Hospital Award</label>
                            <input type="text" class="form-control required" value="<?php echo $data->hospital_awards; ?>" required="" name="hospital_awards"  placeholder="Hospital Award">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Hospital Membership</label>
                            <input type="text" class="form-control required" value="<?php echo $data->hospital_memberships; ?>" required="" name="hospital_memberships"  placeholder="Hospital Membership">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control required" value="<?php echo $data->email; ?>" required="" name="email" placeholder="Email">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						 
						
			<div class="form-group">
                            <label>Doctor Country</label>
					        <select class="form-control" style="width: 100%;" name="hospital_country" id="country_id" onchange="selectStatedoctor(this.options[this.selectedIndex].value)">
							<option value="-1">Select country</option>
								   <?php
									  foreach($hospitalcountrydetails as $countdetails){									
								   ?>
						<option value="<?php echo $countdetails->id;?>" <?php if ($countdetails->id == $data->hospital_country){ ?>
						selected = "selected" <?php } ?>><?php echo $countdetails->country_name;?></option>
								   <?php
								   }
								   ?>
                            </select>
                            </div>		
				<div class="form-group">
                        <label>Doctor State</label>
					 <select class="form-control " style="width: 100%;" id="state_dropdown" name="hospital_state"  onchange="selectCitydoctor(this.options[this.selectedIndex].value)">
						
						<option value="-1">Select state</option>
						<?php foreach($hospitalstatedetails as $countstatedetails){ ?>
						<option value="<?php echo $countstatedetails->state_id;?>" <?php if ($countstatedetails->state_id == $data->hospital_state){ ?>
						selected = "selected" <?php } ?> > <?php echo $countstatedetails->state_name; ?> </option>
								   <?php }  ?>	 
								  
                     </select>
                    </div>
					<div class="form-group">
                        <label>Doctor City</label>
					 <select class="form-control" style="width: 100%;" id="city_dropdown" name="hospital_city">
							
							<option value="-1">Select city</option>
							<?php foreach($hospitalcitydetailsval as $countcitydetails){ ?>
							<option value="<?php echo $countcitydetails->city_id;?>" <?php if ($countcitydetails->city_id == $data->hospital_city){ ?>
							selected = "selected" <?php } ?> > <?php echo $countcitydetails->city_name; ?> </option>
								   <?php }  ?>		  
                     </select>
                    </div>	   
					
					
					
					
					           <div class="form-group has-feedback">
							   <label for="exampleInputEmail1">About Hospital</label>
							   <textarea class="textarea1 form-control box_sizes required" name="about_hospital" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"><?php echo $data->about_hospital; ?></textarea>
							   <span class="glyphicon  form-control-feedback"></span>
							   </div>
						  
										
					  <!-- /.box-body -->
					  <div class="box-footer">
						 <button type="submit" class="btn btn-primary">Submit</button>
					  </div>
				   </div>
				   <div class="col-md-6">

					<div class="form-group">
                     <label>Hospital Visitation</label>
					 <select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="visitation[]" id="reason" required="">
								   <?php
									  $arry_select = explode(",", $data->visitation);
									  foreach($hospitaldetails as $gethospitalvalues){
								   ?>
			            <option value="<?php echo $gethospitalvalues->id;?>"<?php if (in_array($gethospitalvalues->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $gethospitalvalues->reason;?></option>			  
								   <?php
								   }
								   ?>
                     </select>
                </div>	
				
				
				<div class="form-group">
                        <label>Hospital Insurance</label>
					      <select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="insurance[]" id="insurance_name" required="">
								   <?php
									  $arry_select = explode(",", $data->insurance);
									  foreach($hospitalinsurancevalues as $insudetailshospital){
								   ?>
			              <option value="<?php echo $insudetailshospital->id;?>"<?php if (in_array($insudetailshospital->id, $arry_select))
					      echo 'selected';  ?> ><?php echo $insudetailshospital->insurance_name;?></option>			  
								   <?php
								   }
								   ?>
                          </select>
                </div>	
				
				
				<div class="form-group">
                        <label>Hospital Specialty</label>
					<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="specialty[]" id="specialty_name" required="">
								   <?php
									  $arry_select = explode(",", $data->specialty);
									  foreach($specialtyvaleshospital as $details_specialtyval){
								   ?>
			            <option value="<?php echo $details_specialtyval->id;?>"<?php if (in_array($details_specialtyval->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $details_specialtyval->specialty_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
						
					<div class="form-group">
                        <label>Hospital Language</label>
							<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="hospital_languages[]" id="language_name" required="">
								   <?php
									  $arry_select = explode(",", $data->hospital_languages);
									  foreach($hospitallanguagedetails as $langdetailshospital){
								   ?>
			            <option value="<?php echo $langdetailshospital->id;?>"<?php if (in_array($langdetailshospital->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $langdetailshospital->language_name;?></option>			  
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
									  foreach($hosamenitiesdetails as $detailsamenitiesval){
								   ?>
			            <option value="<?php echo $detailsamenitiesval->id;?>"<?php if (in_array($detailsamenitiesval->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $detailsamenitiesval->facility_name;?></option>			  
								   <?php
								   }
								   ?>
                            </select>
                        </div>	
						
						
						<div class="form-group">
                        <label>Hospital Affilliated</label>
                        <select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="hospital_affilliations[]" id="hospital_name" required="">
								   <?php
									  $arry_select = explode(",", $data->hospital_affilliations);
									  foreach($affiliatehospitals as $hosdetailsaffiliateds){
								   ?>
			            <option value="<?php echo $hosdetailsaffiliateds->id;?>"<?php if (in_array($hosdetailsaffiliateds->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $hosdetailsaffiliateds->hospital_name;?></option>			  
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
					   <option  <?php if ($data->type_selection == 'individual' ) echo 'selected' ; ?> value="individual" id="indiv">Individual</option>
						 <option  <?php if ($data->type_selection == 'hospital' ) echo 'selected' ; ?> value="hospital" id="hosp">Sub Hospital</option>	
					   </select>
					    </div>
					   
					   
					 <?php if ($data->type_selection == 'hospital'){?>	   
					   
					   <div class="form-group" id="hos1edit">
                          
							<label> Select Hospital</label></br>
						 <select class="form-control" name="parent_id"  style="width: 100%;" >
							 
							
								   <?php
									foreach($hospital as $hos){									
								   ?>
						<option value="<?php echo $hos->id;?>"<?php if ($hos->id == $data->parent_id){ ?>
							selected = "selected" <?php } ?>><?php echo $hos->hospital_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
						  </div>
					
					 <?php } ?>
					
					  <div class="form-group" id="hos1">
                          
							<label> Select Hospital</label></br>
						 <select class="form-control" name="parent_id"  style="width: 100%;" >
							 
							
								   <?php
									foreach($hospital as $hos){									
								   ?>
						<option value="<?php echo $hos->id;?>"<?php if ($hos->id == $data->parent_id){ ?>
							selected = "selected" <?php } ?>><?php echo $hos->hospital_name;?></option>
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

   <div class="modal fade modal-wide" id="myModalmapinghospitaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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


