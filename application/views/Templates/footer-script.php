	<script>
	
	base_url = "<?php echo base_url(); ?>";
	
	</script>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
	<!--<script src="<?php //echo base_url(); ?>assets/js/appointment/bootstrap.js"></script>-->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
	<!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/parsley.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/common.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.raty.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/filter.js"></script>
	<!---- calendar appointment---->	
	<script src="<?php echo base_url(); ?>assets/js/appointment/cors.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/appointment/bootstrap-calendar.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/appointment/calendar.js"></script>
	<!--- time picker ---->
	<script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	 
	
	<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
		
		$('.datatable').DataTable({
			"ordering" : $(this).data("ordering"),
			"order": [[ 0, "desc" ]]
        });
		
	  });
	  
	  
	</script>
	<script>
	 $(function () {
      	$(".timepicker").timepicker({
      		'minTime': '00:00am',
    		'maxTime': '24:00pm',
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
 $('#dpd1').datepicker({
	 format: 'yyyy-mm-dd'
	 });
var checkin = $('#dpd1').datepicker({
	
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
});

 $('.dpd1').datepicker({
	 format: 'yyyy-mm-dd'
	 });
var checkin = $('.dpd1').datepicker({
  onRender: function(date) {

  }
});





</script>
	<script>
	window.ParsleyValidator
    window.Parsley.addValidator('minSelect', function(value, requirement) {
        return value.split(',').length >= parseInt(requirement, 10);
    }, 32)
    .addMessage('en', 'minSelect', 'You must select at least %s.');
	
	</script>
	<script type="text/javascript">

 $(window).load(function(){ 
 rating();
	  });
	  function rating() {
		  var rating = $('.gc-ratting');
	$('.gc-ratting').each(function() {
		
	var rate = $(this).data("rate");
	console.log(rate);
	//var read = $(this).data("read");
    $(this).raty({
		readOnly : true,				
        score  : rate, //default stars
    });
		
     });
	  }
	  
	  
  </script>
  <script>
 $('#gc-ratting1').raty(
  {
  start:     5
  }
  );
	  </script>
  <!-- LOAD MORE BUTTON SETUP FROM DOCTOR FILTER RESULTS------------>
    <script type="text/javascript">
     $(function(){ 
       $('.filterloadmore').on("click",function() {		   
		   var value = $('.form_doctor').serialize();
            var ID = $(this).attr("id");
             if(ID){
               $("#moredoctor"+ID).html();
               $.ajax({
                       type: "POST",
                       url: base_url+"Doctor/loadmore_doctor", 
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID +"&"+value, 
                       cache: false,
                       success: function(html){
                    $(".evnt-mn.doctor").append(html);
              //$("#more"+ID).remove(); // removing old more button
			  $("#moredoctor"+ID).hide();
			  rating();
                     }
                 });
              } else {
				   
	           $(".moreboxdoctor").html('The End');// no results
                }
             return false;
              });
         });
		 </script>
		 <script type="text/javascript">
	function call_filtermore(ID){
		//alert(ID);
	//var ID = $('.filterloadmore').attr("id");
	var value = $('.form_home').serialize();
      if(ID){
     $("#moredoctor"+ID).html();
      $.ajax({
        type: "POST",
         url: base_url+"Doctor/loadmore_doctor",  
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID +"&"+value,  
        cache: false,
        success: function(html){
      $(".evnt-mn.doctor").append(html);
       $("#moredoctor"+ID).remove();// removing old more button
	   rating();
	   //$("#more"+ID).hide();
	    
            }
         });
       } else {
	   $(".moreboxdoctor").html('The End');// no results
       }
     return false;
        }
		</script>
		<!-- LOAD MORE BUTTON SETUP FROM CLINIC FILTER RESULTS------------>
    <script type="text/javascript">
     $(function(){ 
       $('.filterloadmore_clinic').on("click",function() {		   
		   var value = $('.form_doctor_clinic').serialize();
            var ID = $(this).attr("id");
             if(ID){
               $("#moreclinic"+ID).html();
               $.ajax({
                       type: "POST",
                       url: base_url+"Clinic/loadmore_clinic", 
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID +"&"+value, 
                       cache: false,
                       success: function(html){
                    $(".col-lg-10.clinic").append(html);
              //$("#more"+ID).remove(); // removing old more button
			  $("#moreclinic"+ID).hide();
			  rating();
                     }
                 });
              } else {
				   
	           $(".moreboxclinic").html('The End');// no results
                }
             return false;
              });
         });
		 </script>
		 <script type="text/javascript">
	function call_filtermoreclinic(ID){
		//alert(ID);
	//var ID = $('.filterloadmore').attr("id");
	var value = $('.form_home').serialize();
      if(ID){
     $("#moredoctor"+ID).html();
      $.ajax({
        type: "POST",
         url: base_url+"Clinic/loadmore_clinic",  
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID +"&"+value,  
        cache: false,
        success: function(html){
      $(".col-lg-10.clinic").append(html);
       $("#moreclinic"+ID).remove();// removing old more button
	   //$("#more"+ID).hide();
	   rating();
	    
            }
         });
       } else {
	   $(".moreboxclinic").html('The End');// no results
       }
     return false;
        }
		</script>
		<!-- LOAD MORE BUTTON SETUP FROM MEDICAL CENTER FILTER RESULTS------------>
    <script type="text/javascript">
     $(function(){ 
       $('.filterloadmore_medical').on("click",function() {		   
		   var value = $('.form_doctor_medical').serialize();
            var ID = $(this).attr("id");
             if(ID){
               $("#moremedical"+ID).html();
               $.ajax({
                       type: "POST",
                       url: base_url+"Medical/loadmore_medical", 
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID +"&"+value, 
                       cache: false,
                       success: function(html){
                    $(".col-lg-10.medical").append(html);
              //$("#more"+ID).remove(); // removing old more button
			  $("#moremedical"+ID).hide();
			  rating();
                     }
                 });
              } else {
				   
	           $(".moreboxmedical").html('The End');// no results
                }
             return false;
              });
         });
		 </script>
		 <script type="text/javascript">
	function call_filtermoremedical(ID){
		//alert(ID);
	//var ID = $('.filterloadmore').attr("id");
	var value = $('.form_home').serialize();
      if(ID){
     $("#moremedical"+ID).html();
      $.ajax({
        type: "POST",
         url: base_url+"Medical/loadmore_medical",  
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID +"&"+value,  
        cache: false,
        success: function(html){
      $(".col-lg-10.medical").append(html);
       $("#moremedical"+ID).remove();// removing old more button
	   //$("#more"+ID).hide();
	   rating();
	    
            }
         });
       } else {
	   $(".moreboxmedical").html('The End');// no results
       }
     return false;
        }
		</script>
		<!-- LOAD MORE BUTTON SETUP FROM HOSPITAL FILTER RESULTS------------>
    <script type="text/javascript">
     $(function(){ 
       $('.filterloadmore_hospital').on("click",function() {		   
		   var value = $('.form_doctor_hospital').serialize();
            var ID = $(this).attr("id");
             if(ID){
               $("#morehospital"+ID).html();
               $.ajax({
                       type: "POST",
                       url: base_url+"Hospital/loadmore_hospital", 
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID +"&"+value, 
                       cache: false,
                       success: function(html){
                    $(".col-lg-10.hospital").append(html);
              //$("#more"+ID).remove(); // removing old more button
			  $("#morehospital"+ID).hide();
			  rating();
                     }
                 });
              } else {
				   
	           $(".moreboxhospital").html('The End');// no results
                }
             return false;
              });
         });
		 </script>
		 <script type="text/javascript">
	function call_filtermorehospital(ID){
		//alert(ID);
	//var ID = $('.filterloadmore').attr("id");
	var value = $('.form_home').serialize();
      if(ID){
     $("#morehospital"+ID).html();
      $.ajax({
        type: "POST",
         url: base_url+"Hospital/loadmore_hospital",  
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID +"&"+value,  
        cache: false,
        success: function(html){
      $(".col-lg-10.hospital").append(html);
       $("#morehospital"+ID).remove();// removing old more button
	   //$("#more"+ID).hide();
	   rating();
	    
            }
         });
       } else {
	   $(".moreboxhospital").html('The End');// no results
       }
     return false;
        }
		</script>
		<!-- LOAD MORE BUTTON SETUP FROM CLINIC DOCTORS FILTER RESULTS------------>
    <script type="text/javascript">
     $(function(){ 
       $('.filterloadmoreclinicdoctor').on("click",function() {		   		   
            var ID = $(this).attr("id");
             if(ID){
               $("#moreclinicdoctor"+ID).html();
               $.ajax({
                       type: "POST",
                       url: base_url+"Clinic/loadmore_clinicdoctor", 
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID , 
                       cache: false,
                       success: function(html){
                    $(".evnt-mn.doctor").append(html);
              //$("#more"+ID).remove(); // removing old more button
			  $("#moreclinicdoctor"+ID).hide();
			  rating();
                     }
                 });
              } else {
				   
	           $(".moreboxclinicdoctor").html('The End');// no results
                }
             return false;
              });
         });
		 </script>
		 <script type="text/javascript">
	function call_filtermoreclinicdoctor(ID){
		//alert(ID);
	var ID = $('.filterloadmoreclinicdoctor').attr("id");
	//var value = $('.form_home').serialize();
      if(ID){
     $("#moreclinicdoctor"+ID).html();
      $.ajax({
        type: "POST",
         url: base_url+"Clinic/loadmore_clinicdoctor",  
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID,  
        cache: false,
        success: function(html){
      $(".evnt-mn.doctor").append(html);
       $("#moreclinicdoctor"+ID).remove();// removing old more button
	   //$("#more"+ID).hide();
	   rating();
	    
            }
         });
       } else {
	   $(".moreboxclinicdoctor").html('The End');// no results
       }
     return false;
        }
		</script>
		<!-- LOAD MORE BUTTON SETUP FROM MEDICAL DOCTORS FILTER RESULTS------------>
    <script type="text/javascript">
     $(function(){ 
       $('.filterloadmoremedicaldoctor').on("click",function() {		   		   
            var ID = $(this).attr("id");
             if(ID){
               $("#moremedicaldoctor"+ID).html();
               $.ajax({
                       type: "POST",
                       url: base_url+"Medical/loadmore_medicaldoctor", 
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID , 
                       cache: false,
                       success: function(html){
                    $(".evnt-mn.doctor").append(html);
              //$("#more"+ID).remove(); // removing old more button
			  $("#moremedicaldoctor"+ID).hide();
			  rating();
                     }
                 });
              } else {
				   
	           $(".moreboxmedicaldoctor").html('The End');// no results
                }
             return false;
              });
         });
		 </script>
		 <script type="text/javascript">
	function call_filtermoremedicaldoctor(ID){
		//alert(ID);
	var ID = $('.filterloadmoremedicaldoctor').attr("id");
	//var value = $('.form_home').serialize();
      if(ID){
     $("#moremedicaldoctor"+ID).html();
      $.ajax({
        type: "POST",
         url: base_url+"Medical/loadmore_medicaldoctor",  
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID,  
        cache: false,
        success: function(html){
      $(".evnt-mn.doctor").append(html);
       $("#moremedicaldoctor"+ID).remove();// removing old more button
	   //$("#more"+ID).hide();
	   rating();
	    
            }
         });
       } else {
	   $(".moreboxmedicaldoctor").html('The End');// no results
       }
     return false;
        }
		</script>
		<!-- LOAD MORE BUTTON SETUP FROM HOSPITAL DOCTORS FILTER RESULTS------------>
    <script type="text/javascript">
     $(function(){ 
       $('.filterloadmorehospitaldoctor').on("click",function() {		   		   
            var ID = $(this).attr("id");
             if(ID){
               $("#morehospitaldoctor"+ID).html();
               $.ajax({
                       type: "POST",
                       url: base_url+"Hospital/loadmore_hospitaldoctor", 
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID , 
                       cache: false,
                       success: function(html){
                    $(".evnt-mn.doctor").append(html);
              //$("#more"+ID).remove(); // removing old more button
			  $("#morehospitaldoctor"+ID).hide();
			  rating();
                     }
                 });
              } else {
				   
	           $(".moreboxhospitaldoctor").html('The End');// no results
                }
             return false;
              });
         });
		 </script>
		 <script type="text/javascript">
	function call_filtermorehospitaldoctor(ID){
		//alert(ID);
	var ID = $('.filterloadmorehospitaldoctor').attr("id");
	//var value = $('.form_home').serialize();
      if(ID){
     $("#morehospitaldoctor"+ID).html();
      $.ajax({
        type: "POST",
         url: base_url+"Hospital/loadmore_hospitaldoctor",  
					   //'branch='+branch+'&status='+status,  
                       data: "lastmsg="+ ID,  
        cache: false,
        success: function(html){
      $(".evnt-mn.doctor").append(html);
       $("#morehospitaldoctor"+ID).remove();// removing old more button
	   //$("#more"+ID).hide();
	   rating();
	    
            }
         });
       } else {
	   $(".moreboxhospitaldoctor").html('The End');// no results
       }
     return false;
        }
		</script>
		<script>
		
function mysigninFunction() {
    document.getElementById("form_login").reset();	
	document.getElementById("form_forgot").reset();
	
	
	
};
function mysigninclickFunction() {
    $(".main-lg-new").show();
        $(".main-lg-reset").hide();	
};
		</script>
		<!--- common dashboard enter--->
		<script>
		jQuery(document).ready(function ($) {
			//*****common dahboard map configuration start****//
			//$(".interrupt-trick2-own").attr('id', 'map_canvas');
			$("#triggermap").click(function() { 		
			$(".interrupt-trick1").attr('id', 'map_canvas');
			$(".interrupt-trick2").attr('id', 'map_canvas');
			
			 });
			 
			$("#avoidinterrupthome1").click(function() { 
            $(".interrupt-trick2").removeAttr('id', 'map_canvas');	
			$(".interrupt-trick2-own").removeAttr('id', 'map_canvas');
			$(".interrupt-trick1").attr('id', 'map_canvas');
			 });
			 
			 $("#avoidinterrupthome2").click(function() {
               $(".interrupt-trick1").removeAttr('id', 'map_canvas');	
			   $(".interrupt-trick2-own").removeAttr('id', 'map_canvas');
				$(".interrupt-trick2").attr('id', 'map_canvas');
             });	
			 $("#avoidinterrupthome3").click(function() {
				  $(".interrupt-trick2").removeAttr('id', 'map_canvas');
                 $(".interrupt-trick1").removeAttr('id', 'map_canvas');	
               $(".interrupt-trick2-own").attr('id', 'map_canvas');				 
				  });
			/* $("#pick-map-hosp").click(function() { 						
			$( "#interrupt-trick2-sub" ).remove();
			  });
			  
			  $("#pick-map-doc").click(function() { 			 
			 $( "#interrupt-trick1-sub" ).remove();
			   });
			   */
			   //*****common dahboard map configuration end****//
			   
			   
			    //*****hospital dahboard ajax setup start****//
			   $(".hospitaljunchospdoctor").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospdocdetails", 
					   //'branch='+branch+'&status='+status,  
                       data: {id:id} , 
                       cache: false,
                       success: function(html){
						  
						  
						   $(".hospital-checkin-doc").hide();
						   
                    $(".manage-ad-inner-mains.tab-man-2.dochosp").append(html);
              
                     }
                 });                        
              });
		$(".hospitaljuncdoctor").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospdetails", 
					   //'branch='+branch+'&status='+status,  
                       data: {id:id} , 
                       cache: false,
                       success: function(html){
						  
						  
						   $(".hospital-checkin").hide();
						   
                    $(".manage-ad-inner-mains-hosp.tab-man-2-hosp ").append(html);
              
                     }
                 });                        
              });
			  
			  
			  $(".hospitaljuncdoctoranother").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospdetails", 					 
                       data: {id:id} , 
                       cache: false,
                       success: function(html){						  						  
						   $(".checkin-homesubhosp").hide();						   
                           $(".manage-ad-inner-main.tab-manage-1.forhomesubhosp ").append(html);
						   
              
                     }
                 });                        
              });
			  
			   $(".hospitaljuncdoctoranotherdelete").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/deletehospdetails", 					 
                       data: {id:id} , 
                       cache: false,
                       success: function(html){						  						  						   						  
                           document.location.reload();
						   
              
                     }
                 });                        
              });
			   //*****hospital dahboard ajax setup end****//
			  //for clinic dashborad start
			   $(".hospitaljunchospclinicdoctor").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospdocclinicdetails", 
					   //'branch='+branch+'&status='+status,  
                       data: {id:id} , 
                       cache: false,
                       success: function(html){
						  
						  
						   $(".hospital-checkin-doc").hide();
						   
                    $(".manage-ad-inner-mains.tab-man-2.dochosp").append(html);
              
                     }
                 });                        
              });
		$(".hospitaljuncdoctorclinic").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospclinicdetails", 
					   //'branch='+branch+'&status='+status,  
                       data: {id:id} , 
                       cache: false,
                       success: function(html){
						  
						  
						   $(".hospital-checkin").hide();
						   
                    $(".manage-ad-inner-mains-hosp.tab-man-2-hosp ").append(html);
              
                     }
                 });                        
              });
			  
			  
			  $(".hospitaljuncdoctoranotherclinic").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospclinicdetails", 					 
                       data: {id:id} , 
                       cache: false,
                       success: function(html){						  						  
						   $(".checkin-homesubhosp").hide();						   
                           $(".manage-ad-inner-main.tab-manage-1.forhomesubhosp ").append(html);
						   
              
                     }
                 });                        
              });
			  
			   $(".hospitaljuncdoctoranotherclinicdelete").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/deletehospclinicdetails", 					 
                       data: {id:id} , 
                       cache: false,
                       success: function(html){						  						  						   						  
                           document.location.reload();
						   
              
                     }
                 });                        
              });
			  //for medical center dashboard ajax setup start
			   $(".hospitaljunchospmedicaldoctor").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospdocmedicaldetails", 
					   //'branch='+branch+'&status='+status,  
                       data: {id:id} , 
                       cache: false,
                       success: function(html){
						  
						  
						   $(".hospital-checkin-doc").hide();
						   
                    $(".manage-ad-inner-mains.tab-man-2.dochosp").append(html);
              
                     }
                 });                        
              });
		$(".hospitaljuncdoctormedical").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospmedicaldetails", 
					   //'branch='+branch+'&status='+status,  
                       data: {id:id} , 
                       cache: false,
                       success: function(html){
						  
						  
						   $(".hospital-checkin").hide();
						   
                    $(".manage-ad-inner-mains-hosp.tab-man-2-hosp ").append(html);
              
                     }
                 });                        
              });
			  
			  
			  $(".hospitaljuncdoctoranothermedical").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/getedithospmedicaldetails", 					 
                       data: {id:id} , 
                       cache: false,
                       success: function(html){						  						  
						   $(".checkin-homesubhosp").hide();						   
                           $(".manage-ad-inner-main.tab-manage-1.forhomesubhosp ").append(html);
						   
              
                     }
                 });                        
              });
			  
			   $(".hospitaljuncdoctoranothermedicaldelete").click(function() { 
		 var id= this.id;
		 $.ajax({
                       type: "POST",
                       url: base_url+"Welcome/deletehospmedicaldetails", 					 
                       data: {id:id} , 
                       cache: false,
                       success: function(html){						  						  						   						  
                           document.location.reload();
						   
              
                     }
                 });                        
              });
			  
			  
			  //medical center end
			  }); 
			 
		</script>
		<!--- common  dashboard exit--->
		
		<script>
		
		$("#menuspat1").addClass("disabledbutton");
		$("#menuspat2").addClass("disabledbutton");
		$("#menuspat3").addClass("disabledbutton");
		
jQuery(document).ready(function ($) {
	
	 //$("#menus3").hide();
	 $(".checkinsecond").hide();
        $(".col-lg-6.br-pad.checkinone").hide();
        $(".checkinsecond").hide();
        $(".newdoccheckin").hide();
        $(".newdoccheckout").hide();
        $(".newdocchecker1").click(function() {        
        $(".newdoccheckin").show();
		$(".newdoccheckout").hide();
         });
	
	    $(".newdocchecker2").click(function() {
		$(".newdoccheckin").hide();
        $(".newdoccheckout").show();
         });
 
		  $(".pat-continue").click(function() { 
		  if($("#insuranceapp").val()!='' || $("#visitationapp").val()!=''){
		   $.ajax({
             type: "POST",
             url: base_url+"Doctor/updateinitialbooking",			 
            data: {	
					id : $("#log-id").val(),
				   insurance: $("#insuranceapp").val(),
				   visitation:$("#visitationapp").val()
                   }, 
           success:function(data){			  
                  // console.log(data);
                var visitationapp = $("#visitationapp option:selected").text();	
				var insuranceapp = $("#insuranceapp option:selected").text();					
				  if(data == 'loggedIn'){
					 $('#checkinsurancetext').html(insuranceapp);
					 $('#checkvisittext').html(visitationapp);
					 $("#uinsurance-n option[value='"+$("#insuranceapp").val()+"']").attr("selected","selected");
					  $("#uvisitation-n option[value='"+$("#visitationapp").val()+"']").attr("selected","selected");
				    $("#homes").hide();					   	
					    $("#menuspatinitial").addClass("disabledbutton");						
						$("#menuspat1").click();
					    $("#menuspat1").removeClass("disabledbutton");							 
				      }else if(data == 'No'){				   					
				   }else {				 								  
				   }				                          									
						}						
                            });
		  $("#homes").hide();					   	
					     $("#menuspatinitial").addClass("disabledbutton");						
						 $("#menuspat1").click();
					    $("#menuspat1").removeClass("disabledbutton");	
		  } else {
			  $("#homes").hide();					   	
					     $("#menuspatinitial").addClass("disabledbutton");						
						 $("#menuspat1").click();
					    $("#menuspat1").removeClass("disabledbutton");	
		  }
	  });
		  $(".pat-continue-reg1").click(function() {   
		  $("#menus1").hide();
		  $("#menuspat1").addClass("disabledbutton");					   						
						$("#menuspat2").click();
					    $("#menuspat2").removeClass("disabledbutton");
	  });
		 $(".checkonline-box1").click(function() { 
		 
		  
		   $(".checkinfirst").hide();
		    $(".checkinsecond").show();
			$(".col-lg-6.br-pad.checkinone").show();
		 });
		 $(".btn-continue-patreg-pat").click(function() { 
		 
		 $.ajax({
             type: "POST",
             url: base_url+"Doctor/updatepatreg",			 
            data: {
				
				 id: $("#pat_id").val(),
				patient_firstname:$("#ufname-n").val(),
				patient_lastname:$("#ulname-n").val(),
                   patient_sex: $("#usex-n").val(),
				   insurance: $("#uinsurance-n").val(),
				   visitation: $("#uvisitation-n").val()
                   }, 
           success:function(data){			  
                   console.log(data);				   
				  if(data == 'loggedIn'){	
				     $(".checkinfirst").show();
		    $(".checkinsecond").hide();
			$(".col-lg-6.br-pad.checkinone").hide();
				//  $("#menus2").hide();					   	
					    //$("#menuspat2").addClass("disabledbutton");	
             //var error = '<div class="messagebookfinish">Your appointment booked successfully! </div>';
					//    $('.errormsgpat').html(error);					  
				   					
						//$("#menuspat3").click();
					   // $("#menuspat3").removeClass("disabledbutton");					 
				      }else if(data == 'No'){
				   //var error = '<div class="messagebookfinish">Sorry you have entered wrong information </div>';
					  //  $('.errormsgpat').html(error);					
				   }else {
				  // var error = '<div class="messagebookfinish">Sorry you have entered wrong information </div>';
					//    $('.errormsgpat').html(error);									   
				   }				                          									
						}						
                            });
		
		 });
		 
		 $(".checkonline-box2").click(function() { 
		
		 $.ajax({
             type: "POST",
             url: base_url+"Doctor/appointment",			 
            data: {
				end_time:$("#end_time").val(),
				status:$("#status").val(),
				ill_reason:$("#uvisitation-n").val(),
				insurance:$("#uinsurance-n").val(),
                   checker: $("#checker").val(),
				   appointment_date: $("#cal_date").val(),
				   appointment_time: $("#cal_time").val(),
				   doctor_id: $("#doctor_id").val()
                   }, 
           success:function(data){			  
                   console.log(data);				   
				  if(data == 'loggedIn'){	
				  $("#menus2").hide();					   	
					    $("#menuspat2").addClass("disabledbutton");	
             var error = '<div class="messagebookfinish">Your appointment booked successfully! </div>';
					    $('.errormsgpat').html(error);					  
				   					
						$("#menuspat3").click();
					    $("#menuspat3").removeClass("disabledbutton");					 
				      }else if(data == 'No'){
				   var error = '<div class="messagebookfinish">Sorry you have entered wrong information </div>';
					    $('.errormsgpat').html(error);					
				   }else {
				   var error = '<div class="messagebookfinish">Sorry you have entered wrong information </div>';
					    $('.errormsgpat').html(error);									   
				   }				                          									
						}						
                            });
		  	
		 });
		 
	  });	 	 
	 $(document).ready(function(){
    $("#formpatreg").submit(function(event){
	  event.preventDefault();	 
        $.ajax({
             type: "POST",
             url: base_url+"Doctor/Storepatient1",			 
            data: {
				id:$("#log-id").val(),
                   insurance: $("#insuranceapp").val(),
				   visitation: $("#visitationapp").val()
                   }, 
           success:function(data){			  
                   console.log(data);				   
				  if(data == 'loggedIn'){					  
				   var error = '<div class="errormsgpat"><h3>Successfully Submitted .Click below link to continue</h3></div>';
				        $('.errormsgpat').html(error);
                       document.location.reload();						
					    // $("#homes").hide();					   	
					    // $("#menuspatinitial").addClass("disabledbutton");						
						// $("#menuspat1").click();
					    // $("#menuspat1").removeClass("disabledbutton");					 
				      }else if(data == 'No'){
				   var error = '<div class="errormsgpat">Sorry you have entered wrong information </div>';
					    $('.errormsgpat').html(error);					
				   }else {
				   var error = '<div class="errormsgpat">Sorry you have entered wrong information </div>';
					    $('.errormsgpat').html(error);									   
				   }				                          									
						}						
                            });
                 });
				 
				 
    });
	
	
</script>
	<!---<script async defer src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCLdljWPkulKg6zxLWPJhUb1zb6c81lzC0"
type="text/javascript"></script>-->	