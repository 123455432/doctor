  <?php
  $settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
       
?>
  <div class="form-hospital-dash">
 <form method="post" data-parsley-validate="" enctype="multipart/form-data">
 <input type="hidden" name="subid" value="<?php echo $singlesubdoc_result->id;?>">
                                                            <div class="upload-hospital">
                                                                <img src="<?php echo $singlesubdoc_result->display_image; ?>"  />

                                                                <div class="upload-section-tag">
																<input type="file" id="uploadhospdocanot" name="display_image" style="visibility: hidden; width: 1px; height: 1px"  />
                                                                    <h5><a href=""  Onclick="document.getElementById('uploadhospdocanot').click(); return false" id="upload_link_doc_another"><?php if($lghosmod19){ echo $lghosmod19; }else { ?>Browse Photo<?php } ?></a></h5>

                                                                   <!-- <h5><a  class="hosp-photodune" href="">Upload Photo</a></h5>-->
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>

                                                            <div class="form-group hos-frm-grp">
                                                                <div class="col-lg-10">
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod40){ echo $lghosmod40; }else { ?>Doctor Firstname<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" placeholder="<?php if($lghosmod42){ echo $lghosmod42; }else { echo "doctor firstname"; } ?>" name="doctor_firstname"  value="<?php echo $singlesubdoc_result->doctor_firstname;?>" data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" ">
                                                                        </div>
                                                                    </div>
																	<div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod41){ echo $lghosmod41; }else { ?>Doctor Lastname<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="<?php if($lghosmod43){ echo $lghosmod43; }else { echo "doctor lastname"; } ?>" name="doctor_lastname" data-parsley-pattern="^[a-zA-Z\  \/]+$" data-parsley-minlength="3" data-parsley-maxlength="25"required =" "  value="<?php echo $singlesubdoc_result->doctor_lastname;?>">
                                                                        </div>
                                                                    </div>
															
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod24){ echo $lghosmod24; }else { ?>Zip Code<?php } ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control"  placeholder="<?php if($lghosmod40){ echo $lghosmod40; }else { echo "1234"; } ?>" name="doctor_office_zip" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="7" required =" " value="<?php echo $singlesubdoc_result->doctor_office_zip;?>">
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod26){ echo $lghosmod26; }else { ?>Phone <?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="example" placeholder="Name" name="phone"  data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-maxlength="16" required =" " value="<?php echo $singlesubdoc_result->phone;?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod27){ echo $lghosmod27; }else { ?>Country<?php } ?> </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <select name="doctor_office_country" class="form-control" id="exampleSelect1" onchange="selectStatedocsub(this.options[this.selectedIndex].value)" required="" value="<?php echo $singlesubdoc_result->doctor_office_country;?>">
									
									<option selected="selected" value="-1"><?php if($lgdoctormod44){ echo $lgdoctormod44; }else { ?>Select country<?php } ?></option>
                                  <?php foreach($countries as $row_country){  ?>
                             <option value="<?php echo $row_country->id;?>" <?php if($row_country->id == $singlesubdoc_result->doctor_office_country ){ ?>
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
                                                                            <select  name="doctor_office_state" onchange="selectCitydocsub(this.options[this.selectedIndex].value)" class="form-control" id="state_dropdown_docsub" required="" value="<?php echo $singlesubdoc_result->doctor_office_state;?>" >
										<option selected="selected" value="-1"><?php if($lgdoctormodalso){ echo $lgdoctormodalso; }else { ?>Select state<?php } ?></option> <?php foreach($states as $row_state){  ?>
                             <option value="<?php echo $row_state->id;?>" <?php if($row_state->id == $singlesubdoc_result->doctor_office_state){ ?>
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
                                                                                <h6><?php if($lghosmod29){ echo $lghosmod29; }else { ?>city <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                           <select    name="doctor_office_city" class="form-control" id="city_dropdown_docsub" value="<?php echo $singlesubdoc_result->doctor_office_city;?>" required="">
										<option selected="selected" value="-1"><?php if($lgdoctormod45){ echo $lgdoctormod45; }else { ?>Select city<?php } ?></option><?php foreach($cities as $row_city){  ?>
                             <option value="<?php echo $row_city->id;?>" <?php if($row_city->id == $singlesubdoc_result->doctor_office_city ){ ?>
								selected ="selected" 
							<?php } ?>><?php echo $row_city->city_name;?></option>
                                  <?php  }   ?>                                   
						              </select> 
																					 
<h5><?php if($lghosmod36){ echo $lghosmod36; }else { ?>If your city not found . Use location settings to add your city<?php } ?></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                            <div class="text-left-hsp">
                                                                                <h6><?php if($lghosmod31){ echo $lghosmod31; }else { ?>Address <?php } ?>  </h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" value="<?php echo $singlesubdoc_result->doctor_office_address;?>"class="form-control" placeholder="Address here" name="doctor_office_address" required="">
																			
                                                                        </div>
                                                                    </div>
																	

                                                                    
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>
                                                             <div class="row">
                                                        <div class="col-lg-10">
                                                            <h4 class="h4-sub-mn"><button type="submit" name="hospital-doc_updation" value="hospital-doc_updation" class="btn btn-default bfn-sve"><?php if($lghosmod79){ echo $lghosmod79; }else { ?>Update<?php } ?><span><img src="<?php echo base_url(); ?>assets/images/dashboard/15.png" /></span></button></h4>
                                                        </div>
                                                    </div>
													</form>
                                                        </div>