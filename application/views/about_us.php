	<?php
  $settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
       
?>
<!--about-main-->
<div class="container">
    <div class="about-main">
      <h1><?php if($lgaboutus){ echo $lgaboutus; }else { ?>About Us<?php } ?></h1>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h2 class="animated zoomIn"><?php if($lgautmodel1){ echo $lgautmodel1; }else { ?>Founded in 2007 with the mission & oacute; n to improve access to
                    healthcare, Book My Doc is a free service that allows patients to
                    find the best Doctors near by You.<?php } ?></h2>
            </div>
            <div class="col-lg-3"></div>
        </div>

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <p><?php if($lgautmodel2){ echo $lgautmodel2; }else { ?>see their availability in real time, and instantly you book an appointment to trav & eacute; s book My Doc .com shareware or freeware book My Doc for iPhone or Android. By revealing the hidden supply quotations, book My Doc helping senior RIVER patients to have access to the care & oacute; n in s & oacute; the 24 - to 72 hours. Product m & aacute; recent s of CO-& iacute; a, book My Doc Check-In, allows patients to fill their tr & aacute; limits on L & iacute; nea before his appointment, and a version & oacute; n espa TODDLER language; ol called my book Doc in Spain TODDLER ol also & eacute; n est & aacute; available. <?php } ?></p>
        <h5><a href=""><?php if($lgautmodel3){ echo $lgautmodel3; }else { ?>Read more<?php } ?><i class="fa fa-angle-double-right"></i> </a></h5>
    </div>
    <div class="col-lg-1"></div>
</div>

    </div>
</div>

<div class="container-fluid about-bac">
<div class="col-lg-12">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="col-lg-12 inner-abt-main">
            <div class="col-lg-4">
                <div class="inner-about">
                    <img src="<?php echo base_url(); ?>assets/images/about/1.png"  class="img-responsive hvr-grow" alt="" />
                    <h3><?php if($lgfndes5){ echo $lgfndes5; }else { ?>Easy to Find<?php } ?></h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="inner-about">
                    <img src="<?php echo base_url(); ?>assets/images/about/2.png" class="img-responsive hvr-grow" alt="" />
                    <h3><?php if($lgfndes5){ echo $lgfndes5; }else { ?>Instant Booking<?php } ?></h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="inner-about">
                    <img src="<?php echo base_url(); ?>assets/images/about/3.png" class="img-responsive hvr-grow" alt="" />
                    <h3><?php if($lgfndes5){ echo $lgfndes5; }else { ?>24 Hours Service<?php } ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
</div>
<div class="clearfix"></div>
<!--about-main-->