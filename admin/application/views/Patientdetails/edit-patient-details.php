<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Patient Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="#">Patient Details</a></li>
         <li class="active">Edit Patient</li>
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
                  <h3 class="box-title">Edit Patient Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			   <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-6">
					 <input type="hidden" name="status" value="1" >
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Firstname</label>
                            <input type="text" class="form-control required" value="<?php echo $data->patient_firstname; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="patient_firstname"  placeholder="Firstname">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Lastname</label>
                            <input type="text" class="form-control required" value="<?php echo $data->patient_lastname; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="patient_lastname"  placeholder="Lastname">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control required" value="<?php echo $data->email; ?>" data-parsley-trigger="change" required="" name="email"  placeholder="Email">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Marital Status</label> 
						    <select class="form-control required" value="<?php echo $data->marital_status; ?>" name="marital_status">
							  <option value="Single">Single</option>
							  <option value="Married">Married</option>
							</select>
						  </div>		
						  
						  <div class="form-group has-feedback">
								<label for="exampleInputEmail1">DOB</label>
								<input type="text" class="form-control required" name="dob" value="<?php echo $data->dob; ?>" id="datepicker" placeholder="dob"  required ="">
								<span class="glyphicon  form-control-feedback"></span>
					      </div>	
						  
						  
						<div class="form-group has-feedback">
					    <label for="exampleInputEmail1">PhoneNumber</label>
					    <input type="text" class="form-control required" name="phone" value="<?php echo $data->phone; ?>" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" placeholder="phone">
					    <span class="glyphicon  form-control-feedback"></span>
					    </div>
						
						<div class="form-group has-feedback">
                        <label for="exampleInputEmail1">Zip Code</label>
                        <input type="text" class="form-control required" value="<?php echo $data->zip; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="8" data-parsley-pattern="^[0-9\  \/]+$" required="" name="zip"  placeholder="Zip">
                        <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						   
						   <div class="form-group has-feedback">
						   <label for="exampleInputEmail1">Country</label>
						   <input type="text" id="Inputcountry" class="form-control required" value="<?php echo $data->country; ?>" name="country"  placeholder="country" autocomplete="on" onClick="initializecountry(this.id);">
						   <span class="glyphicon  form-control-feedback"></span>
						   </div>	
						 
						   <div class="form-group has-feedback">
						   <label for="exampleInputEmail1">State</label>
						   <input type="text" id="Inputstate" class="form-control required" value="<?php echo $data->state; ?>" name="state"  placeholder="state" autocomplete="on" onClick="initializestate(this.id);">
						   <span class="glyphicon  form-control-feedback"></span>
						   </div>	
						
						   <div class="form-group has-feedback">
						   <label for="exampleInputEmail1">City</label>
						   <input type="text" id="Inputcity" class="form-control required" value="<?php echo $data->city; ?>"name="city"  placeholder="City" autocomplete="on" onClick="initialize(this.id);">
						   <span class="glyphicon  form-control-feedback"></span>
						   </div>	
						
						
											                 			   
					    
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				   <div class="col-md-6">
				   
				       	  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Gender</label>
                            <input type="text" class="form-control required" value="<?php echo $data->patient_sex; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="patient_sex"  placeholder="Gender">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Patient Address</label>
                            <input type="text" class="form-control required"  value="<?php echo $data->address; ?>" required="" name="address"  placeholder="Address">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  

					    <div class="form-group">
                        <label>Language</label>
					   <select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="languages[]" id="language_name" required="">
								   <?php
									  $arry_select = explode(",", $data->languages);
									  foreach($languagedet as $langdetailss){
								   ?>
			            <option value="<?php echo $langdetailss->id;?>"<?php if (in_array($langdetailss->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $langdetailss->language_name;?></option>			  
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
									  foreach($insurancedetailsval as $insudetailsval){
								   ?>
			            <option value="<?php echo $insudetailsval->id;?>"<?php if (in_array($insudetailsval->id, $arry_select))
					    echo 'selected';  ?> ><?php echo $insudetailsval->insurance_name;?></option>			  
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
						   <input name="patient_display_image" accept="image/*" type="file">
						   <img src="<?php echo $data->patient_display_image; ?>" width="100px" height="100px" alt="Picture Not Found"/>
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


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>	
<script type="text/javascript"> 

function initialize(id) {
	
var options = {
    componentRestrictions: {country: 'IN'}
 };

 var input = document.getElementById(id);
 var autocomplete = new google.maps.places.Autocomplete(input, options);

                       google.maps.event.addListener(autocomplete, 'place_changed', function () {
                       var placeA = autocomplete.getPlace();

                       var address = autocomplete.getPlace().formatted_address;
                       var latLong = autocomplete.getPlace().geometry.location;
                       var boundsByViewport = autocomplete.getPlace().geometry.viewport;
					   var res = address.split(",",1); 
					     var js=JSON.stringify(latLong);
						 var par=JSON.parse(js);
						 var viewport=JSON.stringify(boundsByViewport);
						 document.getElementById(id).value=address;
						    //document.getElementById('latitude').value=par.lat;
							// document.getElementById('longitude').value=par.lng;
							 
						     //document.getElementById('viewport').value=viewport;
							  	

                                  $.ajax({
								  type: "POST",
								  url:base_url+'Patient_details/get_patientdetails',
								  data: {place:res[0]},
								  cache: false,
								  success: function(data){
									 // // alert(data);
					              $(".business").html(data);
								  // alert(res);
								  $("#Inputcity").val(res);
								 
								  }
		                       });							 

				   });
  
}
google.maps.event.addDomListener(window, 'load', initialize);  
</script>


<script type="text/javascript"> 

function initializestate(id) {
	
var options = {
    componentRestrictions: {country: 'IN'}
 };

 var input = document.getElementById(id);
 var autocomplete = new google.maps.places.Autocomplete(input, options);

                       google.maps.event.addListener(autocomplete, 'place_changed', function () {
                       var placeA = autocomplete.getPlace();

                       var address = autocomplete.getPlace().formatted_address;
                       var latLong = autocomplete.getPlace().geometry.location;
                       var boundsByViewport = autocomplete.getPlace().geometry.viewport;
					   var res = address.split(",",1); 
					     var js=JSON.stringify(latLong);
						 var par=JSON.parse(js);
						 var viewport=JSON.stringify(boundsByViewport);
						 document.getElementById(id).value=address;
						    //document.getElementById('latitude').value=par.lat;
							// document.getElementById('longitude').value=par.lng;
							 
						     //document.getElementById('viewport').value=viewport;
							  	

                                  $.ajax({
								  type: "POST",
								  url:base_url+'Patient_details/get_patientstates',
								  data: {place:res[0]},
								  cache: false,
								  success: function(data){
									 // // alert(data);
					              $(".business").html(data);
								  // alert(res);
								  $("#Inputstate").val(res);
								 
								  }
		                       });							 

				   });
  
}
google.maps.event.addDomListener(window, 'load', initializestate);  
</script>


<script type="text/javascript"> 

function initializecountry(id) {
	
var options = {
    componentRestrictions: {country: 'IN'}
 };

 var input = document.getElementById(id);
 var autocomplete = new google.maps.places.Autocomplete(input, options);

                       google.maps.event.addListener(autocomplete, 'place_changed', function () {
                       var placeA = autocomplete.getPlace();

                       var address = autocomplete.getPlace().formatted_address;
                       var latLong = autocomplete.getPlace().geometry.location;
                       var boundsByViewport = autocomplete.getPlace().geometry.viewport;
					   var res = address.split(",",1); 
					     var js=JSON.stringify(latLong);
						 var par=JSON.parse(js);
						 var viewport=JSON.stringify(boundsByViewport);
						 document.getElementById(id).value=address;
						    //document.getElementById('latitude').value=par.lat;
							// document.getElementById('longitude').value=par.lng;
							 
						     //document.getElementById('viewport').value=viewport;
							  	

                                  $.ajax({
								  type: "POST",
								  url:base_url+'Patient_details/get_patientcountry',
								  data: {place:res[0]},
								  cache: false,
								  success: function(data){
									 // // alert(data);
					              $(".business").html(data);
								  // alert(res);
								  $("#Inputcountry").val(res);
								 
								  }
		                       });							 

				   });
  
}
google.maps.event.addDomListener(window, 'load', initializecountry);  
</script>
		


