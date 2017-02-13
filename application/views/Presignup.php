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
            <div class="col-lg-6">
                <div class="join">
                    <img src="<?php echo base_url(); ?>assets/images/login/patient.png"  class="img-responsive" alt=""/>
                    <div class="clearfix"></div>
                    <h3><?php if($lgsupat){ echo $lgsupat; }else { ?>I'm a new Patient<?php } ?></h3>
                    <h4><?php if($lgsupatd){ echo $lgsupatd; }else { ?>Find a doctor and book an appointment <?php } ?><br><?php if($lgsuof){ echo $lgsuof; }else { ?>online for free! <?php } ?></h4>
                    <h5><a href = "<?php echo base_url(); ?>Login/patient"><?php if($lgsuj){ echo $lgsuj; }else { ?>Join now<?php } ?></a></h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="join-1">
                    <img src="<?php echo base_url(); ?>assets/images/login/doctor.png"   class="img-responsive" alt=""/>
                    <h3><?php if($lgsuhc){ echo $lgsuhc; }else { ?>I'm a Doctor / health care provider <?php } ?></h3>
                    <h4><?php if($lgsuhcd){ echo $lgsuhcd; }else { ?>Quicker way for your patient to schedule an appointment.<?php } ?> <br><?php if($lgsuof){ echo $lgsuof; }else { ?>online for free! <?php } ?></h4>
                    <h5><a href = "<?php echo base_url(); ?>Login/doctor"><?php if($lgsuj){ echo $lgsuj; }else { ?>Join now<?php } ?></a></h5>
                </div>
            </div>
        </div>

    </div>
</div>
<!--patient-join-->
