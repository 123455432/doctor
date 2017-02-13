<?php

  $settings = get_icon();

        $id = $settings->languages;

        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");

        $kk = $query->row();

        $textFile = $kk->languages;

        $extension = ".php"; 

        require 'admin/includes/'.$textFile.$extension;

       

?>

<!--patient-join-->

<div class="container">

    <div class="row">

        <div class="join-main">

            <div class="col-lg-12">

                <div class="join">
				  <form role="form"  action="<?php echo base_url().'login/changepassword'?>" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data" >
                         <div class="col-lg-12">
                             
                             <input type = "hidden" name = "type" value = "<?php echo $type;?>">
                             <input type = "hidden" name = "id" value = "<?php echo $id;?>">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Enter new password</label>
                                 <input type="password" name="password" class="" id="exampleInputPassword1" required="" data-parsley-minlength="6">
                             </div>
							 <div class="form-group">
							   <button type="submit" class="btn btn-default btn-continue" name ="changep">change password</button>
							   </div>
                         </div>
                       
                        

                             
                             
                          </form>
                      

                         </div>
                    

                </div>

            </div>

          
        </div>



    </div>



<!--patient-join-->

