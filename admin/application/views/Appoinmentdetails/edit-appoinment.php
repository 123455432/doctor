<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Appoinment Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">Appoinment Details</a></li>
         <li class="active">Edit Appoinment</li>
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
                  <h3 class="box-title">Edit Appoinment Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">	
			   
                  <div class="box-body">                 
                     <div class="col-md-6">
					   <div class="form-group">
                            <label>Patient Name</label>
					        <select class="form-control select2 js-example-basic-multiple" style="width: 100%;" name="patient_id" id="patient_firstname">
							
								   <?php
								      $arry_select = explode(",", $data->patient_id);
									  foreach($patientnamedetails as $patientdetails){									
								   ?>
							<option value="<?php echo $patientdetails->id;?>"<?php if (in_array($patientdetails->id, $arry_select))
					         echo 'selected';  ?> ><?php echo $patientdetails->patient_firstname;?></option>	
								   <?php
								   }
								   ?>
                            </select>
                            </div>
					  	  <div class="form-group">
                            <label>Doctor Name</label>
					        <select class="form-control select2 js-example-basic-multiple" style="width: 100%;" name="doctor_id" id="doctor_firstname">
							
								   <?php
								      $arry_select = explode(",", $data->doctor_id);
									  foreach($doctornamedetails as $docdetails){									
								   ?>
							<option value="<?php echo $docdetails->id;?>"<?php if (in_array($docdetails->id, $arry_select))
					         echo 'selected';  ?> ><?php echo $docdetails->doctor_firstname;?></option>	
								   <?php
								   }
								   ?>
                            </select>
                            </div>

						   <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Dctor Appoinment Time</label>
							  <div class="input-group">
								<input type="text" value="<?php echo $data->appointment_time; ?>" name="appointment_time" class="form-control timepicker">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
						  
						
						  
				          <div class="form-group has-feedback ">
								<label for="exampleInputEmail1">Appointment Date</label>
								<input type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" class="form-control required" value="<?php echo $data->appointment_date; ?>" name="appointment_date" id="dpd1"  required ="">
								<span class="glyphicon  form-control-feedback"></span>
					     </div>			
						
	
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				     <div class="col-md-6">
					 
					     
                          <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Reason </label>
                            <!--<input type="text" class="form-control required" value="<?php echo $data->ill_reason; ?>" required="" name="ill_reason"  placeholder="ill_reason">-->
							 <select class="form-control select2 js-example-basic-multiple" style="width: 100%;" name="ill_reason" id="ill_reason">
							
								   <?php
								      
									  foreach($reason as $res){									
								   ?>
							<option value="<?php echo $res->id;?>"<?php if ($res->id == $data->ill_reason)
					         echo 'selected';  ?> ><?php echo $res->reason;?></option>	
								   <?php
								   }
								   ?>
                            </select>
							
							
                            <span class="glyphicon  form-control-feedback"></span>
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

