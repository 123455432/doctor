


$( "form.validate" ).submit(function( event ) {

	var access = true;
	$(this).find('.required').each(function() {
		var v = $(this).val();
		if((v.replace(/\s+/g, '')) == '') {
			access = false;
			$(this).parents(".form-group").addClass("has-error");
		}
		else {
			$(this).parents(".form-group").removeClass("has-error");
		}
	});
	if(access) {
		return;
	}
	else {
		$("body").animate({ scrollTop: $('.has-error').offset().top - 50 }, "slow");
	}
	event.preventDefault();
	
});

// View Shop Details
$(function() {
	
$('.view-shop').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'shop/view_single_shop';
	var result = post_ajax(url, data);
	if(result != 'error') {
	$('#myModal .modal-body').html(result);
	remove_shop_service();
	}
});

$('.view-review').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'review/view_shop_review';
	var result = post_ajax(url, data);
	if(result != 'error') {
	$('#myModal .modal-body').html(result);
	rating();
	
	}
});

$('.thumbnails').on('click', '.gallery-delete', function (e) {
    e.preventDefault();
    //get image id
    var id = $(this).parents('.thumbnail').data("id");
	var data = {id:id};
	var url = config_url+'Doctor_ctrl/delete_gallery_image';
	var result = post_ajax(url, data);
	if(result != 'error') {
		$(this).parents('.thumbnail').fadeOut();
	}
   });
   
   
  $('.thumbnails').on('click', '.gallery-delete', function (e) {
    e.preventDefault();
    //get image id
    var id = $(this).parents('.thumbnail').data("id");
	var data = {id:id};
	var url = config_url+'Clinic_ctrl/delete_clinicgallery';
	var result = post_ajax(url, data);
	if(result != 'error') {
		$(this).parents('.thumbnail').fadeOut();
	}
   });
   
   
    $('.thumbnails').on('click', '.gallery-delete', function (e) {
    e.preventDefault();
    //get image id
    var id = $(this).parents('.thumbnail').data("id");
	var data = {id:id};
	var url = config_url+'Medical_ctrl/delete_medicalgallery';
	var result = post_ajax(url, data);
	if(result != 'error') {
		$(this).parents('.thumbnail').fadeOut();
	}
   });
   
   
   
    $('.thumbnails').on('click', '.gallery-delete', function (e) {
    e.preventDefault();
    //get image id
    var id = $(this).parents('.thumbnail').data("id");
	var data = {id:id};
	var url = config_url+'Hospital_ctrl/delete_hospitalgallery';
	var result = post_ajax(url, data);
	if(result != 'error') {
		$(this).parents('.thumbnail').fadeOut();
	}
   });

	
    
 $('.view-customer').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'customer/view_single_customer';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	
	reload_gallery();
	
});

$('.view-bookings').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'booking/view_booking_details';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	
	
});



 $('.view-user').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'user/view_single_user';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
	
});

 $('.view-trend').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'trend/view_single_trend';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-slider').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'settings/view_single_slider';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-whats-new').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'settings/view_whats_new';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-ad').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'ad/view_single_ad';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-offers').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'offers/view_single_offers';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-testimonials').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'testimonials/view_single_testimonials';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});
	
//popup view for Hospital Appoinment Details page by Reshma	
$('.show-hospitalappoinmentdetails').on("click", function() {
	
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#popup-appoinmentModal .modal-appoinmentbody').html(loader);
	$('#popup-appoinmentModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'HospitalAppoinment_ctrl/appoinment_viewpopup';
	var result = post_ajax(url, data);
	$('#popup-appoinmentModal .modal-appoinmentbody').html(result);
	
	
});		
	//Popup view for Clinic Appoinment Details page by Reshma
$('.show-clinicappoinment').on("click", function() {
	
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#popup-appoinmentModal .modal-appoinmentbody').html(loader);
	$('#popup-appoinmentModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'ClinicAppoinment_ctrl/appoinment_viewpopup';
	var result = post_ajax(url, data);
	$('#popup-appoinmentModal .modal-appoinmentbody').html(result);
	
	
});	
//		Popup view for Medical Center Appoinment Details page by Reshma
$('.show-medicalappoinment').on("click", function() {
	
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#popup-appoinmentModal .modal-appoinmentbody').html(loader);
	$('#popup-appoinmentModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'MedicalAppoinment_ctrl/appoinment_viewpopup';
	var result = post_ajax(url, data);
	$('#popup-appoinmentModal .modal-appoinmentbody').html(result);
	
	
});				
	
	
});


function post_ajax(url, data) {
	var result = '';
	$.ajax({
        type: "POST",
        url: url,
		data: data,
		success: function(response) {
			result = response;
		},
		error: function(response) {
			result = 'error';
		},
		async: false
		});
		
		return result;
}

function reload_gallery() {
	
	$('.thumbnail a').colorbox({
        rel: 'thumbnail a',
        transition: "elastic",
        maxWidth: "95%",
        maxHeight: "95%",
        slideshow: true
    });
	
}

function remove_shop_service() {
	$('.remove_services').on("click", function() {
		var id = $(this).data("id");
		var data = {id:id};
		var url = config_url+'shop/remove_shop_service';
		var result = post_ajax(url, data);
		if(result != 'Error') {
			$(this).parents('.row').first().remove();
		}
	});
	
}

//////ADMIN IMG UPLOADING/////

/*$('#profile_pic').on("change", function() {
	readURL(this);
});


$('#profileimg-form').change(function() {
	$('form#profilepic-form-img').submit();
});*/


$('#profile_pic').on("change", function() {
	readURL(this);
});


$('#profileimg-form').change(function() {
	$('form#profilepic-form-img').submit();
});


/*$('.thumbnails').on('click', '.gallery-delete', function (e) {
    e.preventDefault();
    //get image id
    var id = $(this).parents('.thumbnail').data("id");
	var data = {id:id};
	var url = config_url+'Doctor_ctrl/delete_gallery_image';
	var result = post_ajax(url, data);
	if(result != 'error') {
		$(this).parents('.thumbnail').fadeOut();
	}
   });*/


//Board Point Add and Edit Select box values get

 /*$("#bus_details").change(function()
  {  
	var id=$(this).val();
    var dataString =id;
	$.ajax({
			 type: "POST",
			 url:base_url+'Borderpoint_details/add_boardpointdetailsget',
			 data: {value:dataString},
			 cache: false,
		 	 success: function(data){

             $(".subcat").html(data);
			  $(".subcat").select2();
			 
	   }
	 });
   });
   */
   
////************ADD Doctor Details***********////  
 /*$("#country_name ").change(function()
  {  
	var id=$(this).val();
    var dataString =id;
	$.ajax({
			 type: "POST",
			 url:base_url+'Doctor_ctrl/add_droppointdetailsget',
			 data: {value:dataString},
			 cache: false,
		 	 success: function(data){

             $(".subcat").html(data);
			  $(".subcat").select2();
			 
	   }
	 });
   });

   
   
    
   $("#state_name ").change(function()
  {  
	var id=$(this).val();
    var dataString =id;
	$.ajax({
			 type: "POST",
			 url:base_url+'Doctor_ctrl/add_citydetailsget',
			 data: {value:dataString},
			 cache: false,
		 	 success: function(data){

             $(".subcat2").html(data);
			  $(".subcat2").select2();
			 
	   }
	 });
   });*/
   
    
   function selectStatedoctor(country_id){
	if(country_id!="-1"){
		loadDatadoctor('state',country_id);
		$("#city_dropdown").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown").html("<option value='-1'>Select state</option>");
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}

function selectCitydoctor(state_id){
	if(state_id!="-1"){
		loadDatadoctor('city',state_id);
	}else{
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}

function loadDatadoctor(loadType,loadId){
	
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Doctor_Ctrl/loadData",
		data: dataString,
		cache: false,
		success: function(result){
		
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}
   //select sub hospital
   $(document).ready(function(){
	   
	  $("#hos1edit").show();
	   $("#hos").hide();
		$( ".subhos" ).click(function() {
		//alert("hi");
		 $("#hos").show();
		       })
  
   
		
	  
		$( "#indivi" ).click(function() {
		//alert("hi");
		
		 $("#hos").hide();
	   })

  
	  $("#hos1").hide();
	  
		$( "#indiv" ).click(function() {
		//alert("hi");
		 $("#hos1").hide();
		  $("#hos1edit").hide();
	   })

 
	  
		$( "#hosp" ).click(function() {
		//alert("hi");
		 $("#hos1").show();
	   })
});



//sub doctor

$(document).ready(function(){
	
	
		  $("#clinic").hide();
		  $("#hospital").hide();
		  $("#medical").hide();
		  
		$( ".indiv" ).click(function() {
		//alert("hi");
		  $("#clinic").hide();
		  $("#hospital").hide();
		  $("#medical").hide();
		   $("#clinicedit").hide();
		    $("#hospitaledit").hide();
			 $("#medicaledit").hide();
		 
	   })
	   //clinic
	   $( ".cli" ).click(function() {
		//alert("clinic");
		$("#clinic").show();
		 $("#medical").hide();
		  $("#hospital").hide();
		 $("#clinicedit").hide();
		    $("#hospitaledit").hide();
			 $("#medicaledit").hide();
	   })
	   //hospital
	    $( ".hospit" ).click(function() {
		//alert("hospital");
		$("#hospital").show();
		 $("#clinic").hide();
		  $("#medical").hide();
		  $("#clinicedit").hide();
		    $("#hospitaledit").hide();
			 $("#medicaledit").hide();
	   })
	   //medical center
	    $( ".medi" ).click(function() {
		//alert("medical");
		$("#medical").show();
		 $("#clinic").hide();
		  $("#hospital").hide();
		  $("#clinicedit").hide();
		    $("#hospitaledit").hide();
			 $("#medicaledit").hide();
		 
	   })
	   
	 
});

///////Package/////

 
	
	
	
// ////******Edit Doctors********//////
  // $("#country_namessin").change(function()
    // {   
	    // var id=$(this).val();
        // var dataString =id;
	    // $.ajax({
			 // type: "POST",
			 // url:base_url+'Doctor_ctrl/Edit_countrydetailsget',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcats").html(data);
			 
	   // }
	 // });
   // });
   
     // $("#cityies_vals").change(function()
    // {   
	    // var id=$(this).val();
        // var dataString =id;
	    // $.ajax({
			 // type: "POST",
			 // url:base_url+'/Doctor_ctrl/Edit_citiesdetailsget',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcats4").html(data);
			 
	   // }
	 // });
   // });
   
// ////************ADD CLINIC DETAILS***********////  
 // $("#cliniccountry_name ").change(function()
  // {  
	// var id=$(this).val();
    // var dataString =id;
	// $.ajax({
			 // type: "POST",
			 // url:base_url+'Clinic_ctrl/add_clinicdetailsget',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcates").html(data);
			  // $(".subcates").select2();
			 
	   // }
	 // });
   // });
    
   // $("#clinicstate_name ").change(function()
  // {  
	// var id=$(this).val();
    // var dataString =id;
	// $.ajax({
			 // type: "POST",
			 // url:base_url+'Clinic_ctrl/add_cliniccitydetailsget',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcatesval").html(data);
			  // $(".subcatesval").select2();
			 
	   // }
	 // });
   // });
   
   
   
   // ////************ADD MEDICAL  DETAILS***********////  
 // $("#medicalcountry_name ").change(function()
  // {  
	// var id=$(this).val();
    // var dataString =id;
	// $.ajax({
			 // type: "POST",
			 // url:base_url+'Medical_ctrl/get_medicaldetailsstate',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcatesmedical").html(data);
			  // $(".subcatesmedical").select2();
			 
	   // }
	 // });
   // });
    
   // $("#medicalstate_name").change(function()
  // {  
	// var id=$(this).val();
    // var dataString =id;
	// $.ajax({
			 // type: "POST",
			 // url:base_url+'Medical_ctrl/add_medicalcitydetails',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcatesvalmed").html(data);
			  // $(".subcatesvalmed").select2();
			 
	   // }
	 // });
   // });
   
   
   
 // ////************ADD HOSPITAL DETAILS***********////  
 // $("#hospitalcountry_name").change(function()
  // {  
	// var id=$(this).val();
    // var dataString =id;
	// $.ajax({
			 // type: "POST",
			 // url:base_url+'Hospital_ctrl/get_hospitaldetailsstate',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcateshospital").html(data);
			  // $(".subcateshospital").select2();
			 
	   // }
	 // });
   // });
    
   // $("#hospitalstate_name").change(function()
  // {  
	// var id=$(this).val();
    // var dataString =id;
	// $.ajax({
			 // type: "POST",
			 // url:base_url+'Hospital_ctrl/add_mhospitalcitydetails',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcatesvalhospital").html(data);
			  // $(".subcatesvalhospital").select2();
			 
	   // }
	 // });
   // });

//////////////////////////////////////////////////
/////*****ADD COUNTY STATE CITY DETAILS******/////
////************ADD Doctor Details***********////  
 // $("#country_id ").change(function()
  // {  
	// var id=$(this).val();
    // var dataString =id;
	// $.ajax({
			 // type: "POST",
			 // url:base_url+'Country_ctrl/add_countrygetval',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcatcountry").html(data);
			  // $(".subcatcountry").select2();
			 
	   // }
	 // });
   // });
    
  // $("#country_namecity ").change(function()
  // {  
	// var id=$(this).val();
    // var dataString =id;
	// $.ajax({
			 // type: "POST",
			 // url:base_url+'Country_ctrl/edit_citydetailsval',
			 // data: {value:dataString},
			 // cache: false,
		 	 // success: function(data){

             // $(".subcatsedit").html(data);
			  // $(".subcatsedit").select2();
			 
	   // }
	 // });
   // });
 //////////////////////////////////////////////////////////
 ///////******CHECK BOX ENABLE AND DISABLE******///////////
 
 
 
 
 //alert("hi");
		
		$('.abc').attr('disabled','disabled');
		
		
		
 $('.check_work_day').click(function(){
	var target = $(this).parent().parent();
	
	
	
	if($(this).prop("checked")==true){
		$(this).parent().parent().find('input[type=text]').removeAttr('disabled');
		$(this).parent().parent().find('input[type=text]').attr('required','required');
	}else{
		$(this).parent().parent().find('input[type=text]').attr('disabled','disabled');
		$(this).parent().parent().find('input[type=text]').removeAttr('required');
	}
});  
   


$('.check_break_day').click(function(){
	
	var target = $(this).parent().parent();
	
	if($(this).prop("checked")==true){
		$(this).parent().parent().find('input[type=text]').removeAttr('disabled');
		$(this).parent().parent().find('input[type=text]').attr('required','required');
	}else{
		$(this).parent().parent().find('input[type=text]').attr('disabled','disabled');
		$(this).parent().parent().find('input[type=text]').removeAttr('required');
	}
});


$(document).on('click','.clone_break',function(){
	var target = $(this).parent().parent().parent();
	var start_date = $(target).find('.start').val();
	var end_date = $(target).find('.end').val();
	if(start_date=='' || end_date=="" ){
		alert('Sorry you can\'t append new row.Because empty field exist');
	}else{
		var html = $(target).clone();
		$(target).after(html);
		var target_class = $(this).attr('target');
		$(target_class).last().find('input[type=text]').val('');
	}
});

$(document).on('click','.remove_break',function(){
	var primary_target = $(this).parent().parent().parent().parent();
	var target_filed = $(this).attr('target');
	var target_length = primary_target.find(target_filed).length;
	var target = $(this).parent().parent().parent();
	if(target_length > 1){
		$(target).remove();
	}else{
		alert('Sorry You Can\'t Remove This Row. ');
	}
});


/*$(document).on('click','.remove_vacation',function(){
	var primary_target = $(this).parent().parent().parent().parent();
	var target_filed = $(this).attr('target');
	var target_length = primary_target.find(target_filed).length;
	var target = $(this).parent().parent().parent();
	if(target_length > 1){
		$(target).remove();
	}else{
		alert('Sorry You Can\'t Remove This Row. ');
	}
});*/

$(document).on('click','.remove_vacation',function(){
	 
	 var target = $(this).parent().parent().parent().parent();
	 $(target).remove();
	  
});



$(document).on('click','.save_vacation',function(){
	$('#save_vacation').click();
});

$(document).on('click','.clone_vacation',function(){
	var target = $(this).parent().parent().parent().parent();
	var start_date = $(target).find('.start_date').val();
	var end_date = $(target).find('.end_date').val();
	var start_time = $(target).find('.start_time').val();
	var end_time = $(target).find('.end_time').val();
	if(start_date=='' || end_date=="" || start_time=='' || end_time==''){
		alert('Sorry you can\'t append new row.Because empty field exist');
	}else{
		var html = $(target).clone();
		$(target).parent().append(html);
		
		$('.dpd1').datepicker();
		
		$('.vacation_group').last().find('input[type=text]').val('');
		
	
	}
});

   
   
function initBreakLeveldoctor(id){
	//alert(id);
	$.ajax({
		url : 'Doctor_Ctrl/get_doctors/'+id,
		method : 'get',
		success : function(res){
			var res = JSON.parse(res);
			if(typeof res.mon!='undefined'){
				$('.mon_break').timepicker({
				    'minTime': res.mon.start,
				    'maxTime': res.mon.end,
				    'showDuration': true
				});
			}
			if(typeof res.tue!='undefined'){
				$('.tue_break').timepicker({
				    'minTime': res.tue.start,
				    'maxTime': res.tue.end,
				    'showDuration': true
				});
			}
			if(typeof res.wed!='undefined'){
				$('.wed_break').timepicker({
				    'minTime': res.wed.start,
				    'maxTime': res.wed.end,
				    'showDuration': true
				});
			}
			if(typeof res.thu!='undefined'){
				$('.thu_break').timepicker({
				    'minTime': res.thu.start,
				    'maxTime': res.thu.end,
				    'showDuration': true
				});
			}
			if(typeof res.fri!='undefined'){
				$('.fri_break').timepicker({
				    'minTime': res.fri.start,
				    'maxTime': res.fri.end,
				    'showDuration': true
				});
			}
			if(typeof res.sat!='undefined'){
				$('.sat_break').timepicker({
				    'minTime': res.sat.start,
				    'maxTime': res.sat.end,
				    'showDuration': true
				});
			}
			if(typeof res.sun!='undefined'){
				$('.sun_break').timepicker({
				    'minTime': res.sun.start,
				    'maxTime': res.sun.end,
				    'showDuration': true
				});
			}
			//console.log(res);
		}
	});
}



