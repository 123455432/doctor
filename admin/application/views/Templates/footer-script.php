	<script>
	
	base_url = "<?php echo base_url(); ?>";
	config_url = "<?php echo base_url(); ?>";
	
	</script>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pace.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
    
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    
    <!-- FastClick 
    <script src="../../plugins/fastclick/fastclick.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/custom-script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.colorbox-min.js"></script>
    	
	<script src="<?php echo base_url(); ?>assets/js/backend-script.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/charisma.js"></script>
    <!-- CK Editor -->
	 <script src="<?php echo base_url(); ?>assets/js/config.js"></script>
	 <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	 
	 
	<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.extensions.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>
	
	<!--<script src="http://192.168.138.31/arun/thiago/assets/js/config.js"></script>-->
	<!--<script src="http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/js/config.js"></script>-->
	
		
	<!--[validation js]-->
		
		<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
	<!--time picker-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/js/parsley.min.js"></script>
    <!--[validation js]-->
	
    <script>
	 $(function () {
	   $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	
	<script>
 $('#datepicker').datepicker({
		autoclose: true
				
    });
	
   

</script>
<script>
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
})/*.on('changeDate', function() {
  if (date.valueOf() > checkout.date.valueOf()) {
  /*  var newDate = new Date(date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  //checkin.hide();
  //$('#dpd2')[0].focus();
}).data('datepicker');*/




///datepicker for doctor working time/////////

 
var checkin = $('.dpd1').datepicker({
  onRender: function(date) {
    //return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
})





</script>

    <script>
      $(function () {
        //Initialize Select2 Elements
       // $(".select2").select2();
		
		$('.datatable').DataTable({
			"ordering" : $(this).data("ordering"),
			"order": [[ 0, "desc" ]]
        });
		
	  });
	</script>
	<script>
	     $(function () {
      	$(".timepicker").timepicker({
      		'minTime': '9:00am',
    		'maxTime': '10:00pm',
	      showInputs: false
	    });
        //Initialize Select2 Elements
       // $(".select2").select2();
		
		
		//Datemask dd/mm/yyyy
		$(".datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
		//Money Euro
		$("[data-mask]").inputmask();
	  });
	  

	  
	  
	  
	  </script>
	
		 <script>
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
     if(job!=true)
    {
        return false;
    }
}
</script>
