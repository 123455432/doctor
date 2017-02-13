	<?php

				$settings = get_icon();
				$id = $settings->languages;
				$query = $this->db->query("SELECT * FROM  language_set WHERE  id ='$id'");
				$kk = $query->row();
				$textFile = $kk->languages;
				$extension = ".php";       
				//include base_url().'admin/includes/'.$textFile.$extension;
					//echo '<pre>';print_r(base_url().'admin/includes/'.$textFile.$extension);die;
				include 'admin/includes/'.$textFile.$extension;
?>
<?php 
//echo $lghome;
 //$this->load->view(base_url().'admin/includes/'.$textFile.$extension);
 
 ?>
<!DOCTYPE html>
<html>
  <?php
  $this->load->view('Templates/header-script');
  ?>
  <body class="hold-transition <?php echo $this->config->item("theme_color"); ?> sidebar-mini">
  	<div class="wrapper">
	  <?php
	  $this->load->view('Templates/header-menu');
	  //$this->load->view('Templates/left-menu');
	 
	  $this->load->view($page);

	  $this->load->view('Templates/footer');
      ?>    
    </div>
  <?php
  $this->load->view('Templates/footer-script');
  ?>
  </body>
</html>
