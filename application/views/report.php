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

      <h1>Message:</h1>

        <div class="row">

            <div class="col-lg-3"></div>

            <div class="col-lg-6">

              
				<div class="alert alert-<?php echo $class; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $message; 
					?>
				</div>

            </div>

            <div class="col-lg-3"></div>

        </div>





</div>

</div>









<!--about-main-->