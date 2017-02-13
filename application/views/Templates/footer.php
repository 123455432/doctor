<?php
$settings = get_icon();
        $id = $settings->languages;
        $query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
        $kk = $query->row();
        $textFile = $kk->languages;
        $extension = ".php"; 
        require 'admin/includes/'.$textFile.$extension;
//echo $lghome;
?>

<!--footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="menu-footer">
                    <ul>
                        <li class="active"><a href="<?php echo base_url(); ?>"><?php if($lghome){ echo $lghome; }else { ?>Home<?php } ?></a>  </li>
                        <li> <a href = "<?php echo base_url(); ?>General/aboutus"><?php if($lgaboutus){ echo $lgaboutus; }else { ?>About Us<?php } ?></a> </li>
                        <li><a href = "<?php echo base_url(); ?>General/careers"><?php if($lgcareers){ echo $lgcareers; }else { ?>Careers <?php } ?></a></li>
                        <li><a href = "<?php echo base_url(); ?>General/contact"> <?php if($lgcontact){ echo $lgcontact; }else { ?> Contact <?php } ?> </a></li>
                        <li><a href = "<?php echo base_url(); ?>General/terms"><?php if($lgterms){ echo $lgterms; }else { ?>Terms <?php } ?></a></li>
                        <li><a href="javascript:void(0);"><?php if($lgfaq){ echo $lgfaq; }else { ?>  FAQ <?php } ?></a></li>
                        <li><a href="javascript:void(0);"><?php if($lgnlog){ echo $lgnlog; }else { ?> Blog <?php } ?> </a></li>
                        <li><a href="javascript:void(0);"><?php if($lgdoctorblog){ echo $lgdoctorblog; }else { ?>   Doctor Blog <?php } ?> </a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="footer-text">
                    <h3><?php if($lgl14){ echo $lgl14; }else { ?>OUR LOCATION<?php } ?></h3>
                    <p><?php if($lgl17){ echo $lgl17; }else { ?>Make appointments on the go, right from
                        your smartphone, with our top-rated mobile app.<?php } ?></p>
                    <h6><span><i class="fa fa-envelope"></i> </span><?php if($lgl18){ echo $lgl18; }else { ?>By E-mail:<?php } ?> <?php if($lgl19){ echo $lgl19; }else { ?>info@Bookmydoc.com<?php } ?></h6>
                    <h6><span><i class="fa fa-phone"></i> </span><?php if($lgl20){ echo $lgl20; }else { ?>By Phone: <?php } ?><?php if($lgl21){ echo $lgl21; }else { ?>+000 -12601<?php } ?></h6>
                    <h6><span><i class="fa fa-map-marker"></i> </span><?php if($lgl22){ echo $lgl22; }else { ?>Address:<?php } ?> <?php if($lgl23){ echo $lgl23; }else { ?>121, honey Street, Home City, USA<?php } ?></h6>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="footer-text ">
                    <h3><?php if($lgl15){ echo $lgl15; }else { ?>SEARCH BY<?php } ?></h3>
                    <ul>
                        <li><?php if($lgextras1){ echo $lgextras1; }else { ?>Doctor Name<?php } ?></li>
                        <li><?php if($lgextras2){ echo $lgextras2; }else { ?>Practice Name<?php } ?></li>
                        <li><?php if($lgextras3){ echo $lgextras3; }else { ?>Procedure<?php } ?></li>
                        <li><?php if($lgextras4){ echo $lgextras4; }else { ?>Language<?php } ?></li>
                        <li><?php if($lgextras5){ echo $lgextras5; }else { ?>Location<?php } ?></li>
                        <li><?php if($lgextras6){ echo $lgextras6; }else { ?>Hospital<?php } ?></li>
                        <li><?php if($lgextras7){ echo $lgextras7; }else { ?>Insurance<?php } ?></li>

                    </ul>
                </div>
            </div>
            <div class="clearfix hidden-lg hidden-md hidden-sm"></div>
            <div class="col-lg-3 col-xs-6">
                <div class="footer-text">
                    <h3><?php if($lgl16){ echo $lgl16; }else { ?>CITIES<?php } ?></h3>
                    <ul>
                        <li><?php if($lgextras8){ echo $lgextras8; }else { ?>Kochi<?php } ?></li>
                        <li><?php if($lgextras9){ echo $lgextras9; }else { ?>Chennai<?php } ?></li>
                        <li><?php if($lgextras10){ echo $lgextras10; }else { ?>Salem<?php } ?></li>
                        <li><?php if($lgextras11){ echo $lgextras11; }else { ?>Coimbatore<?php } ?></li>
                        <li><?php if($lgextras12){ echo $lgextras12; }else { ?>Bangalore<?php } ?></li>
                    </ul>
                    <a href="" class="show-more"><?php if($lgextras13){ echo $lgextras13; }else { ?>Show more<?php } ?><span><i class="fa fa-angle-double-right"></i> </span></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="footer-text last-footer-text">
                    <h3><?php if($lgl16){ echo $lgl16; }else { ?>CITIES<?php } ?></h3>
                    <ul>
                        <li><?php if($lgextras8){ echo $lgextras8; }else { ?>Kochi<?php } ?></li>
                        <li><?php if($lgextras9){ echo $lgextras9; }else { ?>Chennai<?php } ?></li>
                        <li><?php if($lgextras10){ echo $lgextras10; }else { ?>Salem<?php } ?></li>
                        <li><?php if($lgextras11){ echo $lgextras11; }else { ?>Coimbatore<?php } ?></li>
                        <li><?php if($lgextras12){ echo $lgextras12; }else { ?>Bangalore<?php } ?></li>
                    </ul>
                    <a href="" class="show-more"><?php if($lgextras13){ echo $lgextras13; }else { ?>Show more<?php } ?><span><i class="fa fa-angle-double-right"></i> </span></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="copy-right">
				<h4><?php if($lgl24){ echo $lgl24; }else { ?>Copyright &copy; 2015-2016 <?php } ?><a href="#"><?php if($lgl25){ echo $lgl25; }else { ?>Techware Solution<?php } ?></a>.</h4> All rights reserved.                   
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer-->
<a href="#" id="back-to-top" title="Back to top"><img src="<?php echo base_url(); ?>assets/images/home/btp.png"></a>
