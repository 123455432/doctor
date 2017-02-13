
		//*----------------waiting list-----------
		
		//Forget Form   
		
$(document).ready(function(){
 $("#form_forgot").submit(function(event){
	 event.preventDefault();	 
     $.ajax({
             type: "POST",
             url: base_url+"Login/Forget_Password",
			 
            data: {
                   email: $("#femail").val()
                   }, 
           success:function(data){
                   console.log(data);
				   //if (data[0].status=='emailsend') { 
				  if(data == 'loggedIn'){
					   
					   var error = '<div class="errormsg"><h4>Please Check Your Email</h4></div>';
					$('.errormsg').html(error);
					//$('html, body').animate({scrollTop:$('.modal-dialog.gc-sign-modal-dialog').offset().top}, 'slow');
					  // document.location.reload();
				}else if(data == 'No'){
					 var error = '<div class="errormsg">Sorry you have entered wrong information </div>';
					$('.errormsg').html(error);
					//$('html, body').animate({scrollTop:$('.modal-dialog.gc-sign-modal-dialog').offset().top}, 'slow');
				   }else {
					 var error = '<div class="errormsg">Sorry you have entered wrong information </div>';
					$('.errormsg').html(error);
					//$('html, body').animate({scrollTop:$('.modal-dialog.gc-sign-modal-dialog').offset().top}, 'slow');				   
				   }
				   
                       									
						}						
                            });
                 });
    });
	
//   General doctor and patient login  
//  Signin    
		
$(document).ready(function(){
 $("#form_login").submit(function(event){
	 event.preventDefault();
 
     $.ajax({
             type: "POST",
             url: base_url+"Login/signin",
			 
            data: {
                   email: $("#email").val(),
                   password: $("#password").val()}, 
           success:function(data){
                   console.log(data);
				   if(data == 'loggedIn'){
					   	
					 window.location.href = base_url+ "Welcome";
					  // document.location.reload();
				
				   }else if(data == 'No'){
					 var error = '<div class="errormsg">Sorry!!You cannot access.You may entered wrong information.Contact administrator</div>';
					$('.errormsg').html(error);
				   }else{
					   var error = '<div class="errormsg">Sorry!!You cannot access.You may entered wrong information.Contact administrator </div>';
					$('.errormsg').html(error);
				   }
                       									
						}						
                            });
                 });
    });
		
		
		//***********************************for doctor***************************************************************//
		
		function selectState(country_id){
	if(country_id!="-1"){
		loadData('state',country_id);
		$("#city_dropdown").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown").html("<option value='-1'>Select state</option>");
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}

function selectCity(state_id){
	if(state_id!="-1"){
		loadData('city',state_id);
	}else{
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}

function loadData(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadData",
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
		
			//***********************************for clinic***************************************************************//	
			function selectStateclinichome(country_id){
	if(country_id!="-1"){
		loadDataclinichome('state',country_id);
		$("#city_dropdown_clinic_home").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown_clinic_home").html("<option value='-1'>Select state</option>");
		$("#city_dropdown_clinic_home").html("<option value='-1'>Select city</option>");		
	}
}

function selectCityclinichome(state_id){
	if(state_id!="-1"){
		loadDataclinichome('city',state_id);
	}else{
		$("#city_dropdown_clinic_home").html("<option value='-1'>Select city</option>");		
	}
}

function loadDataclinichome(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadData",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_clinic_home").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_clinic_home").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}
//********************for medical***************************//
function selectStatemedical(country_id){

	if(country_id!="-1"){
		loadDatamedical('state',country_id);
		$("#city_dropdown_medical").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown_medical").html("<option value='-1'>Select state</option>");
		$("#city_dropdown_medical").html("<option value='-1'>Select city</option>");		
	}
}

function selectCitymedical(state_id){
	if(state_id!="-1"){
		loadDatamedical('city',state_id);
	}else{
		$("#city_dropdown_medical").html("<option value='-1'>Select city</option>");		
	}
}

function loadDatamedical(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadData",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_medical").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_medical").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}
//********************for hospital***************************//
function selectStatehospital(country_id){
	if(country_id!="-1"){
		loadDatahospital('state',country_id);
		$("#city_dropdown_hospital").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown_hospital").html("<option value='-1'>Select state</option>");
		$("#city_dropdown_hospital").html("<option value='-1'>Select city</option>");		
	}
}

function selectCityhospital(state_id){
	if(state_id!="-1"){
		loadDatahospital('city',state_id);
	}else{
		$("#city_dropdown_hospital").html("<option value='-1'>Select city</option>");		
	}
}

function loadDatahospital(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadData",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_hospital").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_hospital").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}
//***********************************for doctor specialty and reason***************************************************************//
	
		function selectReason(specialty_id){
	if(specialty_id!="-1"){
		loadDataSpecialty('reason',specialty_id);
		$("#reason_dropdown").html("<option value='-1'>Select reason</option>");	
	}else{
		//$("#state_dropdown").html("<option value='-1'>Select state</option>");
		$("#reason_dropdown").html("<option value='-1'>Select reason</option>");		
	}
}



function loadDataSpecialty(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadDataReason",
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
//***********************************for clinic specialty and reason***************************************************************//
	
		function selectReasonClinic(specialty_id){
	if(specialty_id!="-1"){
		loadDataSpecialtyClinic('reason',specialty_id);
		$("#reason_dropdown_clinic").html("<option value='-1'>Select reason</option>");	
	}else{
		//$("#state_dropdown").html("<option value='-1'>Select state</option>");
		$("#reason_dropdown_clinic").html("<option value='-1'>Select reason</option>");		
	}
}



function loadDataSpecialtyClinic(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadDataReason",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_clinic").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_clinic").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}
//***********************************for medical specialty and reason***************************************************************//
	
		function selectReasonMedical(specialty_id){
	if(specialty_id!="-1"){
		loadDataSpecialtyMedical('reason',specialty_id);
		$("#reason_dropdown_medical").html("<option value='-1'>Select reason</option>");	
	}else{
		//$("#state_dropdown").html("<option value='-1'>Select state</option>");
		$("#reason_dropdown_medical").html("<option value='-1'>Select reason</option>");		
	}
}



function loadDataSpecialtyMedical(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadDataReason",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_medical").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_medical").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}
//***********************************for hospital specialty and reason***************************************************************//
	
		function selectReasonHospital(specialty_id){
	if(specialty_id!="-1"){
		loadDataSpecialtyHospital('reason',specialty_id);
		$("#reason_dropdown_hospital").html("<option value='-1'>Select reason</option>");	
	}else{
		//$("#state_dropdown").html("<option value='-1'>Select state</option>");
		$("#reason_dropdown_hospital").html("<option value='-1'>Select reason</option>");		
	}
}



function loadDataSpecialtyHospital(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadDataReason",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_hospital").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_hospital").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}





//for doctor profile gallery picture submit


$('#gallery_image1').change(function() {
	$('form#gallery_imagefirst').submit();
});
//for hospital  gallery picture submit


$('#gallery_image1_hospital').change(function() {
	$('form#gallery_imagefirst_hospital').submit();
});
//for medical gallery picture submit


$('#gallery_image1_medical').change(function() {
	$('form#gallery_imagefirst_medical').submit();
});
//for clinic gallery picture submit


$('#gallery_image1_clinic').change(function() {
	$('form#gallery_imagefirst_clinic').submit();
});
//for patient profile gallery picture submit


$('#patient_image').change(function() {	 
	$('form#patient_imagefirst').submit();
});
//for doctor
$('#doctor_image').change(function() {	 
	$('form#doctor_imagefirst').submit();
});
//for clinic personal picture submit


$('#clinic_display_image').change(function() {	 
	$('form#clinic_personal').submit();
});
//<<<<<<<<<edit> click working time
$(function(){
	//$('.pickwkt').unbind("keypress");
// $('.pickwkt').keydown(function({
	 // var key = e.charCode || e.keyCode;
  // if (key == 13) { 
    // // enter key do nothing
  // } else {
    // e.preventDefault();
  // }	
// });	
    $('.checkall').on('click', function(){
        $(this).closest('.checkcalworktable').find(':checkbox').prop('checked',this.checked);
    })

    $(".checkcalworktable tr td:nth-child(4) a:last-child").on("click", function() {
        $(this).closest(".checkcalworktable tr").remove();
    });
    
    $('body').on('click','.checkcalworkedit', function(){
         $(this).parents('tr').find('input').attr('readonly',false); 
		  
        //$(this).parents('tr').find('input').attr('readonly',true); 		 
    });	 

   
});
//<<<<<<<<<edit> click break time
$(function(){
    $('.checkallbreak').on('click', function(){
        $(this).closest('.checkcalbreaktable').find(':checkbox').prop('checked',this.checked);
    })

    $(".checkcalbreaktable tr td:nth-child(4) a:last-child").on("click", function() {
        $(this).closest(".checkcalbreaktable tr").remove();
    });
    
    $('body').on('click','.checkcalbreakedit', function(){
         $(this).parents('tr').find('input').attr('readonly',false);   
    });	 

   
});
//<<<<<<<<<<<<additional>>>> break time
$(document).on('click','.add_calbreak ',function(){
	var target_length = $(this).parents("tr").first();
	var target = $(this).parent().parent().parent();
	var start_date = $(target).find('.start').val();
	var end_date = $(target).find('.end').val();
	if(start_date=='' || end_date=="" ){
		alert('Sorry you can\'t append new row.Because empty field exist');
	}else{
		var html = $(target_length).clone();
		$(target_length).after(html);
		var target_class = $(this).attr('target_length');
		$(target_class).last().find('input[type=text]').val('');
		$(".timepicker").timepicker({
      		'minTime': '00:00am',
    		'maxTime': '24:00pm',
	      showInputs: false
	    });
		
	}
});
//<<<<<<<<<<<<remove>>>> break time
$(document).on('click','.remove_calbreak',function(){
	/*var primary_target = $(this).parent().parent().parent().parent();
	var target_filed = $(this).attr('target');
	var target_length = primary_target.find(target_filed).length;
	var target = $(this).parent().parent().parent();*/
	var target_length = $(this).parents(".parent_class").first().find("tr").length;
	//var monday = $(this).parents(".parent_class").first().find("tr").length;
	
	//alert(target_length);
	if(target_length > 1){
		$(this).parents("tr").first().remove();
		
	}else{
			//$(target).remove();
		alert('Sorry You Can\'t Remove This Row. ');
	}
});

//<<<<<<<<<edit> click vacation date
$(function(){
    $('.checkallvacation').on('click', function(){
        $(this).closest('.checkcalvacationtable').find(':checkbox').prop('checked',this.checked);
    })

    $(".checkcalvacationtable tr td:nth-child(4) a:last-child").on("click", function() {
        //$(this).closest(".checkcalvacationtable tr").remove();
    });
    
    $('body').on('click','.checkcalvacationedit', function(){
         $(this).parents('tr').find('input').attr('readonly',false);   
    });	 

   
});
//<<<<<<<<<<<<additional>>>> break time
$(document).on('click','.add_calvacation ',function(){
	var target_length = $(this).parents("tr").first();
	var target = $(this).parent().parent().parent();
	var start_date = $(target).find('.start_date').val();
	var end_date = $(target).find('.end_date').val();
	if(start_date=='' || end_date=="" ){
		alert('Sorry you can\'t append new row.Because empty field exist');
	}else{
		var html = $(target_length).clone();
		$(target_length).after(html);
		var target_class = $(this).attr('target_length');
		$(target_class).last().find('input[type=text]').val('');
		var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 $('#dpd1').datepicker({
	 format: 'yyyy-mm-dd'
	 });
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
})

  $('.dpd1').datepicker({
	 format: 'yyyy-mm-dd'
	 });
var checkin = $('.dpd1').datepicker({
  onRender: function(date) {

  }
})
		
	}
});
//<<<<<<<<<<<<remove>>>> break time
$(document).on('click','.remove_calvacation-vacation',function(){
	/*var primary_target = $(this).parent().parent().parent().parent();
	var target_filed = $(this).attr('target');
	var target_length = primary_target.find(target_filed).length;
	var target = $(this).parent().parent().parent();*/
	var target_length = $(this).parents("tbody").first().find("tr").length;
	//alert(target_length);
	if(target_length > 1){
		$(this).parents("tr").first().remove();
		
	}else{
			//$(target).remove();
		alert('Sorry You Can\'t Remove This Row. ');
	}
});
//<<<<<<<<calnextbutton>>>>>>>>>>>>>>>
 $(document).ready(function() {
	 
	
	// $( ".nextcalapp" ).each(function(index) {
    $(document).on("click",".nextcalapp", function(){
		//var value = $('.form_doctor').serialize();
		 var id= this.id;
		 var div_id= $(this).attr("data-div");
		 var currentdate= $(this).attr("data-date");
		var boolKey = $(this).data('selected');	
         //var firstDate = $('.dttime').find('.dttime-list').first().find('h5').text();		
         miniCalendar(boolKey,id,'next',div_id,currentdate);
     });
	 //});    
		  
	//$( ".previouscalapp" ).each(function(index) {
    $(document).on("click",".previouscalapp", function(){
		//var value = $('.form_doctor').serialize();
		var id= this.id;
		 var div_id= $(this).attr("data-div");
		  var currentdate= $(this).attr("data-date");
		var boolKey = $(this).data('selected');        
       //var firstDate = $('.dttime').find('.dttime-list').first().find('h5').text();	
         miniCalendar(boolKey,id,'prev',div_id,currentdate);
     });
	//});
     function miniCalendar(boolKey,id,status,div_id,dateCnt) {
		// var url = window.location.href;
	//var url_string = url.split('/');
	//if(url_string[url_string.length - 1]=='Doctor'){
		console.log($('#actual_data').val());
		 var boolkey ='boolKey';
		 var dataString = 'id='+ id + '&dateCnt='+ dateCnt +'&status='+ status;
         $.ajax({
             type: 'POST',
              url: base_url+"Doctor/calendernavi",
		     data: dataString,
             dataType:'json',
			 cache: false,
             success: function(result) { 
			 console.log(result.html);
                $('#evt-br-doc_'+id).html(result.html);              
             }
         });
	//}
     } 
	 
	 
	 
	 
	  });
	  
	  
	  
	  //***********************************for clinic personal profile***************************************************************//	
			function selectStateClinicPersonal(country_id){
	if(country_id!="-1"){
		loadDataclinic('state',country_id);
		$("#city_dropdown_personal_clinic").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown_personal_clinic").html("<option value='-1'>Select state</option>");
		$("#city_dropdown_personal_clinic").html("<option value='-1'>Select city</option>");		
	}
}

function selectCityClinicPersonal(state_id){
	if(state_id!="-1"){
		loadDataclinic('city',state_id);
	}else{
		$("#city_dropdown_personal_clinic").html("<option value='-1'>Select city</option>");		
	}
}

function loadDataclinic(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadData",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_personal_clinic").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_personal_clinic").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}

 //***********************************for sub hospital doctors***************************************************************//	
			function selectStatedocsub(country_id){
	if(country_id!="-1"){
		loadDatadocsub('state',country_id);
		$("#city_dropdown_docsub").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown_docsub").html("<option value='-1'>Select state</option>");
		$("#city_dropdown_docsub").html("<option value='-1'>Select city</option>");		
	}
}

function selectCitydocsub(state_id){
	if(state_id!="-1"){
		loadDatadocsub('city',state_id);
	}else{
		$("#city_dropdown_docsub").html("<option value='-1'>Select city</option>");		
	}
}

function loadDatadocsub(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadData",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_docsub").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_docsub").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}

//***********************************for sub hospital doctors***************************************************************//	
			function selectStatedocsubcenter(country_id){
	if(country_id!="-1"){
		loadDatadocsubcenter('state',country_id);
		$("#city_dropdown_docsubcenter").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown_docsubcenter").html("<option value='-1'>Select state</option>");
		$("#city_dropdown_docsubcenter").html("<option value='-1'>Select city</option>");		
	}
}

function selectCitydocsubcenter(state_id){
	if(state_id!="-1"){
		loadDatadocsubcenter('city',state_id);
	}else{
		$("#city_dropdown_docsubcenter").html("<option value='-1'>Select city</option>");		
	}
}

function loadDatadocsubcenter(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadData",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_docsubcenter").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_docsubcenter").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}

 //***********************************for dashboard clinic&hospital&medical***************************************************************//	
			function selectStatedashhos(country_id){
	if(country_id!="-1"){
		loadDatadashhos('state',country_id);
		$("#city_dropdown_dash").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown_dash").html("<option value='-1'>Select state</option>");
		$("#city_dropdown_dash").html("<option value='-1'>Select city</option>");		
	}
}

function selectCitydashhos(state_id){
	if(state_id!="-1"){
		loadDatadashhos('city',state_id);
	}else{
		$("#city_dropdown_dash").html("<option value='-1'>Select city</option>");		
	}
}

function loadDatadashhos(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	//$("#"+loadType+"_loader").show();
   // $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		  url: base_url+"Store/loadData",
		data: dataString,
		cache: false,
		success: function(result){
			//$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown_dash").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown_dash").append(result);  
		},
		error: function() {
			alert("error");
		}
	});
}





//for country animation scroll down
  $(document).ready(function(){	 
		   $("#exampleSelectcountry").on("click",function( event ) {
                event.preventDefault();           					   					 
			$('html, body').animate({scrollTop:$('.validate.addcountryform').offset().top}, 'slow');					  		
              });
			  return false;
		});
//for state animation scroll down
 $(document).ready(function(){	 
		   $("#exampleSelectstate").on("click",function( event ) {
                event.preventDefault();           					   					 
			$('html, body').animate({scrollTop:$('.validate.addstateform').offset().top}, 'slow');					  		
              });
			  return false;
		});
//for city animation scroll down
 $(document).ready(function(){	 
		   $("#exampleSelectcity").on("click",function( event ) {
                event.preventDefault();           					   					 
			$('html, body').animate({scrollTop:$('.validate.addcityform').offset().top}, 'slow');					  		
              });
			  return false;
		});
//calendar booking

	function gettimecalendar(el) {
		 //alert($(el).attr('id'));
		 
   var ArrayId = $(el).attr('id');
   var valNew=ArrayId.split('_');
   var id = valNew[0];
    var date = valNew[1];
	 var time = valNew[2];
   var dataString = 'id='+ id +'&date='+ date +'&time='+ time;
	window.location.href = base_url+ "Doctor/Booking/"+id+"/"+date+"/"+time;
	
 
}
	

//for calendar events
	  $(document).on("click",".event", function(){
		  var origninalid= this.id;
		   var valNew=origninalid.split('_');
   var date = valNew[3]; 
    

		   $.ajax({
             type: 'POST',
              url: base_url+"Welcome/getmultiple",
		     data: {date : date},           
			 cache: false,
             success: function(result) { 			 
			 console.log(result);
			 $('#calendarmodal').html(result);
			 $('.modal.calendar').modal('show');
                           
             }
         });
		}); 
		
		
		
		
		
		//book online calendar
		 $(document).on("click",".modalbookapp", function(){
		 var id= this.id;
		 $.ajax({
             type: 'POST',
              url: base_url+"Doctor/booking_calendar",
		     data: {id:id},
             dataType:'json',
			 cache: false,
             success: function(result) { 
			//console.log(result.html);
              //  $('#evt-br-doc_'+id).html(result.html); 
             $('#bookingdoc').html(result.html);
			 $('.modal.bookingdoc').modal('show');			  
             }
         });
		   });
		   
		   
		   
		   //<<<<<<<<calnextbutton>>>>>>>>>>>>>>>
 $(document).ready(function() {
	 
	
	// $( ".nextcalapp" ).each(function(index) {
    $(document).on("click",".nextcalappbook", function(){
		//var value = $('.form_doctor').serialize();
		 var id= this.id;
		 var div_id= $(this).attr("data-div");
		 var currentdate= $(this).attr("data-date");
		var boolKey = $(this).data('selected');	
         //var firstDate = $('.dttime').find('.dttime-list').first().find('h5').text();		
         miniCalendar(boolKey,id,'next',div_id,currentdate);
     });
	 //});    
		  
	//$( ".previouscalapp" ).each(function(index) {
    $(document).on("click",".previouscalappbook", function(){
		//var value = $('.form_doctor').serialize();
		var id= this.id;
		 var div_id= $(this).attr("data-div");
		  var currentdate= $(this).attr("data-date");
		var boolKey = $(this).data('selected');        
       //var firstDate = $('.dttime').find('.dttime-list').first().find('h5').text();	
         miniCalendar(boolKey,id,'prev',div_id,currentdate);
     });
	//});
     function miniCalendar(boolKey,id,status,div_id,dateCnt) {
		// var url = window.location.href;
	//var url_string = url.split('/');
	//if(url_string[url_string.length - 1]=='Doctor'){
		console.log($('#actual_data').val());
		 var boolkey ='boolKey';
		 var dataString = 'id='+ id + '&dateCnt='+ dateCnt +'&status='+ status;
         $.ajax({
             type: 'POST',
              url: base_url+"Doctor/calendernavisecond",
		     data: dataString,
             dataType:'json',
			 cache: false,
             success: function(result) { 
			 console.log(result.html);
                $('#evt-br-doc-book_'+id).html(result.html);              
             }
         });
	//}
     } 
	 
	 
	 
	 
	  });
	  
	  
	  
	  //  booking Signin    
		
$(document).ready(function(){
 $("#formdocsignin").submit(function(event){
	 event.preventDefault();
 
     $.ajax({
             type: "POST",
             url: base_url+"Login/signin",
			 
            data: {
                   email: $("#email-booking").val(),
                   password: $("#password-booking").val()}, 
           success:function(data){
                   console.log(data);
				   if(data == 'loggedIn'){
					   	
					  // window.location.href = base_url+ "Welcome";
					   document.location.reload();
				
				   }else if(data == 'No'){
					 var error = '<div class="errormsg2p"><h4>Sorry you have entered wrong information <h4></div>';
					$('.errormsg2p').html(error);
				   }else{
					   var error = '<div class="errormsg2p"><h4>Sorry you have entered wrong information <h4></div>';
					$('.errormsg2p').html(error);
				   }
                       									
						}						
                            });
                 });
    });
	
	
	//remove doctor app
	 $(document).ready(function() {
	$(document).on("click",".removedochistory", function(){
	var id= this.id;
	 $.ajax({
             type: 'POST',
              url: base_url+"Welcome/doctorap_remove_another",
		     data: {id:id},
             //dataType:'json',
			 cache: false,
             success: function(result) { 
					   	   window.location.href = base_url+ "Welcome";
             }
         });
	        });
    });
	//for remove gallery image
	 $(document).ready(function() {
	$(document).on("click",".forimageclose", function(){
	var id= this.id;
	 $.ajax({
             type: 'POST',
              url: base_url+"Welcome/doctor_gallery_remove",
		     data: {id:id},
             //dataType:'json',
			 cache: false,
             success: function(result) { 
					   	   window.location.href = base_url+ "Welcome";
             }
         });
	        });
    });
	//for remove medical gallery image
	 $(document).ready(function() {
	$(document).on("click",".forimagecloseformedical", function(){
	var id= this.id;
	 $.ajax({
             type: 'POST',
              url: base_url+"Welcome/medical_gallery_remove",
		     data: {id:id},
             //dataType:'json',
			 cache: false,
             success: function(result) { 
					   	   window.location.href = base_url+ "Welcome";
             }
         });
	        });
    });
	//for remove clinic gallery image
	 $(document).ready(function() {
	$(document).on("click",".forimagecloseforclinic", function(){
	var id= this.id;
	 $.ajax({
             type: 'POST',
              url: base_url+"Welcome/clinic_gallery_remove",
		     data: {id:id},
             //dataType:'json',
			 cache: false,
             success: function(result) { 
					   	   window.location.href = base_url+ "Welcome";
             }
         });
	        });
    });
	//for remove hospital gallery image
	 $(document).ready(function() {
	$(document).on("click",".forimagecloseforhospital", function(){
	var id= this.id;
	 $.ajax({
             type: 'POST',
              url: base_url+"Welcome/hospital_gallery_remove",
		     data: {id:id},
             //dataType:'json',
			 cache: false,
             success: function(result) { 
					   	   window.location.href = base_url+ "Welcome";
             }
         });
	        });
    });
	//for remove doctor app
	
	 $(document).ready(function() {
	$(document).on("click",".removedochistoryanother", function(){
	var id= this.id;
	 $.ajax({
             type: 'POST',
              url: base_url+"Welcome/doctorap_remove",
		     data: {id:id},
             //dataType:'json',
			 cache: false,
             success: function(result) { 
					   	   window.location.href = base_url+ "Welcome";
             }
         });
	        });
    });
	//for doctor map latitude and longitude
	
	$(function() {
		
		//map for doctor wlecome page
$('#pick-map').click(function (e) {
        e.preventDefault();
        $('#myModalmapbmd').modal('show');
    });	
$('#myModalmapbmd').on('shown.bs.modal', function () {
	load_map();
	//google.maps.event.trigger(map, 'resize')
});


$('.select-location').click(function (e) {
	$('#latitude').val($('#pick-lat').val());
	$('#longitude').val($('#pick-lng').val());
	$('#myModalmapbmd').modal('hide');
});
function load_map() {
	
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
						zoom: 7,
						center: new google.maps.LatLng(35.137879, -82.836914),
						mapTypeId: google.maps.MapTypeId.HYBRID
					});
					
	var myMarker = new google.maps.Marker({
		position: new google.maps.LatLng(9.369, 76.803),
		draggable: true
	});
	
    var latitude = document.getElementById('pick-lat');
	var longitude = document.getElementById('pick-lng');
	
	google.maps.event.addListener(myMarker, 'dragend', function (evt) {
		document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
		latitude.value = evt.latLng.lat().toFixed(3);
		longitude.value = evt.latLng.lng().toFixed(3);
	});
	
	google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
		document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
	});
	
	map.setCenter(myMarker.position);
	myMarker.setMap(map);
}

//for hospital dashboard
//for hospital dashboard map
$('#pick-map-hosp').click(function (e) {
        e.preventDefault();
        $('#myModalmapbmd-hosp').modal('show');
    });	
$('#myModalmapbmd-hosp').on('shown.bs.modal', function () {
	load_map_hosp();
	//google.maps.event.trigger(map, 'resize')
});
$('.select-location-hosp').click(function (e) {
	$('#latitude-hosp').val($('#pick-lat-hosp').val());
	$('#longitude-hosp').val($('#pick-lng-hosp').val());
	$('#myModalmapbmd-hosp').modal('hide');
});


function load_map_hosp() {
	
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
						zoom: 7,
						center: new google.maps.LatLng(35.137879, -82.836914),
						mapTypeId: google.maps.MapTypeId.HYBRID
					});
					
	var myMarker = new google.maps.Marker({
		position: new google.maps.LatLng(9.369, 76.803),
		draggable: true
	});
	
    var latitude = document.getElementById('pick-lat-hosp');
	var longitude = document.getElementById('pick-lng-hosp');
	
	google.maps.event.addListener(myMarker, 'dragend', function (evt) {
		document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
		latitude.value = evt.latLng.lat().toFixed(3);
		longitude.value = evt.latLng.lng().toFixed(3);
	});
	
	google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
		document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
	});
	
	map.setCenter(myMarker.position);
	myMarker.setMap(map);
}
  });	
	$(function() {
//for sub hospital doctors dashboard map
$('#pick-map-doc').click(function (e) {
	
	 
        e.preventDefault();
        $('#myModalmapbmd-doc').modal('show');
    });	
$('#myModalmapbmd-doc').on('shown.bs.modal', function () {
	load_map_doc();
	//google.maps.event.trigger(map, 'resize')
});
$('.select-location-doc').click(function (e) {
	$('#latitude-doc').val($('#pick-lat-doc').val());
	$('#longitude-doc').val($('#pick-lng-doc').val());
	$('#myModalmapbmd-doc').modal('hide');
});


function load_map_doc() {
	
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
						zoom: 7,
						center: new google.maps.LatLng(35.137879, -82.836914),
						mapTypeId: google.maps.MapTypeId.HYBRID
					});
					
	var myMarker = new google.maps.Marker({
		position: new google.maps.LatLng(9.369, 76.803),
		draggable: true
	});
	
    var latitude = document.getElementById('pick-lat-doc');
	var longitude = document.getElementById('pick-lng-doc');
	
	google.maps.event.addListener(myMarker, 'dragend', function (evt) {
		document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
		latitude.value = evt.latLng.lat().toFixed(3);
		longitude.value = evt.latLng.lng().toFixed(3);
	});
	
	google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
		document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
	});
	
	map.setCenter(myMarker.position);
	myMarker.setMap(map);
}


});
//for own hospital dashboard settings

	$(function() {
$('#pick-map-doc-own').click(function (e) {
	
	 
        e.preventDefault();
        $('#myModalmapbmd-doc-own').modal('show');
    });	
$('#myModalmapbmd-doc-own').on('shown.bs.modal', function () {
	load_map_doc();
	//google.maps.event.trigger(map, 'resize')
});
$('.select-location-doc-own').click(function (e) {
	$('#latitude-doc-own').val($('#pick-lat-doc-own').val());
	$('#longitude-doc-own').val($('#pick-lng-doc-own').val());
	$('#myModalmapbmd-doc-own').modal('hide');
});


function load_map_doc() {
	//$(element).attr('id', 'canvas1');
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
						zoom: 7,
						center: new google.maps.LatLng(35.137879, -82.836914),
						mapTypeId: google.maps.MapTypeId.HYBRID
					});
					
	var myMarker = new google.maps.Marker({
		position: new google.maps.LatLng(9.369, 76.803),
		draggable: true
	});
	
    var latitude = document.getElementById('pick-lat-doc-own');
	var longitude = document.getElementById('pick-lng-doc-own');
	
	google.maps.event.addListener(myMarker, 'dragend', function (evt) {
		document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
		latitude.value = evt.latLng.lat().toFixed(3);
		longitude.value = evt.latLng.lng().toFixed(3);
	});
	
	google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
		document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
	});
	
	map.setCenter(myMarker.position);
	myMarker.setMap(map);
}


});
//for hospital dashboard
$(function(){
$("#upload_link_doc").on('click', function(e){
    e.preventDefault();
    $("#uploadhospdoc:hidden").trigger('click');
});
$("#upload_link").on('click', function(e){
    e.preventDefault();
    $("#uploadhosp:hidden").trigger('click');
});
$("#upload_link_hosp").on('click', function(e){
    e.preventDefault();
    $("#display_image:hidden").trigger('click');
});

$("#upload_link_doc_another").on('click', function(e){
    e.preventDefault();
    $("#uploadhospdocanot:hidden").trigger('click');
});
$("#upload_link_hosphosp").on('click', function(e){
    e.preventDefault();
    $("#uploadhosphosp:hidden").trigger('click');
});
});

//for rating

$(function(){
	 $('.show-ratingreview').on("click", function(){   
	var docmainid = $(this).attr("data-id");
	//alert (lawyermainid);
	$("#rateit").modal({show:true});	
	$("#finder-for-doctor").val(docmainid);
	//$("p").append(" <b>Appended text</b>.");
	
	
	//alert var lawyermainid ;
});	
});	 


	