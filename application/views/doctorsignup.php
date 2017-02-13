<?php
  $settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
       
?>
<div class="container">
    <div class="row">
	
        <div class="col-lg-7">

                <div class="join-now-doc">
                    <h3><?php if($lgpsjoinnow){ echo $lgpsjoinnow; }else { ?>JOIN NOW<?php } ?></h3>
                </div>

             <div class="row">
			  <?php
				    if($this->session->flashdata('message')) {
				    $message = $this->session->flashdata('message');
					?>
					<div class="alert alert-<?php echo $message['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $message['message']; 
					?>
					</div>
					<?php
					}
					
		        
               
            ?>
                 <div class="join-now-doc-1">
                     <form role="form"  action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data" >
                         <div class="col-lg-6">
						 <input type="hidden" name="status" id="status" value="1">
                             <div class="form-group">
                                 <label for="exampleInputPassword1"><?php if($lgpsfirstname){ echo $lgpsfirstname; }else { ?>First Name<?php } ?></label>
                                 <input type="text" class="form-control" id="exampleInputPassword1" name="doctor_firstname" data-parsley-pattern="^[a-zA-Z\  \/]+$" placeholder="Enter firstname" data-parsley-minlength="3" data-parsley-maxlength="25">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1"><?php if($lgpslastname){ echo $lgpslastname; }else { ?>Last Name<?php } ?></label>
                                 <input type="text" class="form-control" id="exampleInputPassword1" name="doctor_lastname" data-parsley-pattern="^[a-zA-Z\  \/]+$" placeholder="Enter lastname" data-parsley-minlength="3" data-parsley-maxlength="25">
                             </div>
							 <div class="form-group">
                                 <label for="exampleInputPassword1"><?php if($lgpshc1){ echo $lgpshc1; }else { ?>HealthCare Provider Name(Hospital, Medical Center Or Clinic Name)<?php } ?></label>
                                 <input type="text" class="form-control" id="exampleInputPassword1" name="health_provider"  placeholder="Enter Health Provider Name" data-parsley-minlength="3" >
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1"><?php if($lgpsemail){ echo $lgpsemail; }else { ?>Email<?php } ?></label>
                                 <input type="text" class="form-control" id="exampleInputPassword1" name="email" data-parsley-trigger="change" data-parsley-type="email" required="" >
                             </div>
							     <div class="form-group">
                                 <label for="exampleInputPassword1">phone</label>
                                 <input type="text" class="form-control" id="exampleInputPassword1" name="phone"  required="" >
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1"><?php if($lgpscpassword){ echo $lgpscpassword; }else { ?>Create a Password<?php } ?></label>
                                 <input type="password" class="form-control" id="exampleInputPassword1" name="password" data-parsley-minlength="6" required="">
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="form-group">
                                 <label for="exampleInputPassword1"><?php if($lgpssex){ echo $lgpssex; }else { ?>Sex<?php } ?></label>
                                 <div class="radio">
                                     <label><input type="radio" name="doctor_sex" value="male" required=""><?php if($lgpsmale){ echo $lgpsmale; }else { ?>Male<?php } ?></label>
                                 </div>
                                 <div class="radio">
                                     <label><input type="radio" name="doctor_sex" value="female" required=""><?php if($lgpsfemale){ echo $lgpsfemale; }else { ?>Female<?php } ?></label>
                                 </div>

                             </div>

                             <div class="clearfix"></div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1"><?php if($lgpshc2){ echo $lgpshc2; }else { ?>Practice Or Office Location ZIP Code<?php } ?></label>
                                 <input type="text" class="form-control" id="exampleInputPassword1" name="doctor_office_zip" data-parsley-maxlength="6" data-parsley-type-message="only numbers" required="">
                             </div>
                             <div class="form-group">
                                 <label for="exampleSelect1"><?php if($lgpshc3){ echo $lgpshc3; }else { ?>Type<?php } ?></label>								
                          <select class="form-control" id="exampleSelect1" name="type" >  							 
                              <option value="doctor">Doctor</option>
					          <option value="clinic">Clinic</option>
							   <option value="medical">Medical Center</option>
							    <option value="hospital">Hospital</option>
                              </select>			   								
                                 <div class="checkbox">
                                     <label><input type="checkbox" value="agreed" name="terms" required><?php if($lgpsterms){ echo $lgpsterms; }else { ?>I Agree to the Terms and Conditions<?php } ?></label>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <button type="submit" class="btn btn-default btn-continue"><?php if($lgpscontinue){ echo $lgpscontinue; }else { ?>Continue<?php } ?></button>
								 
								 <?php if(!empty($authurl)) { ?>
								 <a href ="<?php echo $authurl;?>" class="btn btn-default btn-continue">signup with facebook</a>
								 <?php } ?>
								 	 <?php if(!empty($authurlg)) { ?>
								 <a href ="<?php echo $authurlg;?>" class="btn btn-default btn-continue">signup with gmail</a>
								 <?php } ?>
                             </div>

                         </div>
                     </form>
                 </div>

             </div>
        </div>
		
        <div class="col-lg-5">

                <div class="bac-right-login-2">
              <h3><span><?php if($lgpsdes1){ echo $lgpsdes1; }else { ?>You’ll love<?php } ?></span> <?php if($lgpsdes2){ echo $lgpsdes2; }else { ?>being on
                  Bookmydoc<?php } ?></h3>
                    <ul>
                        <li><?php if($lgpsdes4){ echo $lgpsdes4; }else { ?>Access Bookmydoc network of more than 5 million patients.<?php } ?></li>
                        <li><?php if($lgpsdes3){ echo $lgpsdes3; }else { ?>Let patients schedule appointments with you instantly, 24-7, from Bookmydoc and from your practice website. <?php } ?></li>
                    </ul>
                </div>

        </div>
    </div>
</div>

