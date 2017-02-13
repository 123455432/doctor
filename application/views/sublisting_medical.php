<?php
  $settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
       
?>


<div class="form-hospital-dash inhospitaladd" >
													 <form method="post" data-parsley-validate="" enctype="multipart/form-data">
                                                            <div class="upload-hospital">
                                                                <input type="hidden" name="subid" value="<?php echo $singlesub_result->id;?>">
																<img src= "<?php echo $singlesub_result->display_image; ?>" />

                                                                <div class="upload-section-tag">
																<input type="file" id="display_image" value="" name="display_image" style="visibility: hidden; width: 1px; height: 1px"  />
                                                                    <h5><a href=""  Onclick="document.getElementById('display_image').click(); return false" id="upload_link-hosp">Browse Photo</a></h5>

                                                                   <!-- <h5><a  class="hosp-photodune" href="">Upload Photo</a></h5>-->
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>

                                                            <div class="form-group hos-frm-grp">
                                                                <div class="col-lg-10">
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod106){ echo $lghosmod106; }else { ?>Medical Name<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
         <input type="text" class="form-control"  placeholder="Hospital Name" value="<?php echo $singlesub_result->medical_name; ?>" name="medical_name" id="medical_name" data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" " >
                                                                        </div>
                                                                    </div>
																	
																	

                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod23){ echo $lghosmod23; }else { ?>Established in<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="Date" name="medical_established_date" id="medical_established_date" value="<?php echo $singlesub_result->medical_established_date;?>"  required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod24){ echo $lghosmod24; }else { ?>Zip Code<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="1234" value="<?php echo $singlesub_result->medical_zip;?>" name="medical_zip" id="medical_zip" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="7" required =" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod25){ echo $lghosmod25; }else { ?>Website<?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="www.example.com" name="medical_website"  id="medical_website" value="<?php echo $singlesub_result->medical_website;?>" required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod26){ echo $lghosmod26; }else { ?>Phone <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="example" value="<?php echo $singlesub_result->phone;?>" placeholder="Name" name="phone" id="phone"  data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="16" required =" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod27){ echo $lghosmod27; }else { ?>Country <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select name="medical_country" id="medical_country" value="<?php echo $singlesub_result->medical_country;?>"  class="form-control"  onchange="selectState(this.options[this.selectedIndex].value)" required="" >
									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>" <?php if($row_country->id == $singlesub_result->medical_country ){ ?>
								selected ="selected" 
							<?php } ?>><?php echo $row_country->country_name;?></option>
                                  <?php  }   ?>
						              </select> 
									  <h5><?php if($lghosmod35){ echo $lghosmod35; }else { ?>If your country not found .Use location settings to add your country<?php } ?></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod28){ echo $lghosmod28; }else { ?>state <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select   name="medical_state" value="<?php echo $singlesub_result->medical_state;?>" onchange="selectCity(this.options[this.selectedIndex].value)" class="form-control" id="state_dropdown" required="" >
										<option selected="selected" value="-1"><?php if($lgdoctormodalso){ echo $lgdoctormodalso; }else { ?>Select state<?php } ?></option>  <?php foreach($states as $row_state){  ?>
                             <option value="<?php echo $row_state->id;?>" <?php if($row_state->id == $singlesub_result->medical_state){ ?>
								selected ="selected" 
							<?php } ?>><?php echo $row_state->state_name;?></option>
                                  <?php  }   ?>                               
						              </select> 
											<h5><?php if($lghosmod34){ echo $lghosmod34; }else { ?>If your state not found Use location settings to add your state <?php } ?> </h5>						
                                                                        </div>
                                                                    </div>
																	 <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod29){ echo $lghosmod29; }else { ?>city  <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                           <select    name="medical_city" value="<?php echo $singlesub_result->medical_city;?>" class="form-control" id="city_dropdown"  required="">
										<option selected="selected" value="-1"><?php if($lgdoctormod45){ echo $lgdoctormod45; }else { ?>Select city<?php } ?></option><?php foreach($cities as $row_city){  ?>
                             <option value="<?php echo $row_city->id;?>" <?php if($row_city->id == $singlesub_result->medical_city ){ ?>
								selected ="selected" 
							<?php } ?>><?php echo $row_city->city_name;?></option>
                                  <?php  }   ?>                                                                 
						              </select> 
																					 
<h5><?php if($lghosmod36){ echo $lghosmod36; }else { ?>If your city not found . Use location settings to add your city<?php } ?> </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod31){ echo $lghosmod31; }else { ?>Address <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" value="<?php echo $singlesub_result->medical_address;?>" placeholder="Address here" id="medical_address" name="medical_address" required="">
                                                                        </div>
                                                                    </div>
																	

                                                                    
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>
                                                            <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" name="hospital_updation" value="hospital_updation" class="btn btn-default bfn-sve update_subhosp"><?php if($lghosmod79){ echo $lghosmod79; }else { ?>Update<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
</form>
													
													</div>
													
													
												

