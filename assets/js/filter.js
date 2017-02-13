/*-------------------------- Homepage filter function start-----------------------------*/
jQuery(document).ready(function ($) {   
/*-------------------Load predefined functions-----------------*/	



/*------------------- Filter Function for doctor--------------------*/
$('.form_doctor').submit(function(event) {
	event.preventDefault();
});
$('.form_doctor .form-control.filter-field').on("change", function(event) {
	event.preventDefault();
	
	//$('#current_page').val(1);
	filter_results();
	//filter_results_map();
	
});

$('.form_doctor .btn.btn-primary.btn-pat').on("click", function(event) {	
	document.getElementById("form_doctor").reset();
	//$('#current_page').val(1);
	filter_results();
	//filter_results_map();
	
	event.preventDefault();
});

/*------------------- Filter Function for clinic--------------------*/
$('.form_doctor_clinic').submit(function(event) {
	event.preventDefault();
});
$('.form_doctor_clinic .form-control.filter-field_clinic').on("change", function(event) {
	event.preventDefault();
	
	//$('#current_page').val(1);
	filter_results_clinic();
	//filter_results_map();
	
});

$('.form_doctor_clinic .btn.btn-primary.btn-pat').on("click", function(event) {	
	document.getElementById("form_doctor_clinic").reset();
	//$('#current_page').val(1);
	filter_results_clinic();
	//filter_results_map();
	
	event.preventDefault();
});
/*------------------- Filter Function for medical center--------------------*/
$('.form_doctor_medical').submit(function(event) {
	event.preventDefault();
});
$('.form_doctor_medical .form-control.filter-field_medical').on("change", function(event) {
	event.preventDefault();
	
	//$('#current_page').val(1);
	filter_results_medical();
	//filter_results_map();
	
});

$('.form_doctor_medical .btn.btn-primary.btn-pat').on("click", function(event) {	
	document.getElementById("form_doctor_medical").reset();
	//$('#current_page').val(1);
	filter_results_medical();
	//filter_results_map();
	
	event.preventDefault();
});
/*------------------- Filter Function for hospital--------------------*/
$('.form_doctor_hospital').submit(function(event) {
	event.preventDefault();
});
$('.form_doctor_hospital .form-control.filter-field_hospital').on("change", function(event) {
	event.preventDefault();
	
	//$('#current_page').val(1);
	filter_results_hospital();
	//filter_results_map();
	
});

$('.form_doctor_hospital .btn.btn-primary.btn-pat').on("click", function(event) {	
	document.getElementById("form_doctor_hospital").reset();
	//$('#current_page').val(1);
	filter_results_hospital();
	//filter_results_map();
	
	event.preventDefault();
});
/*-----------predefined end----------------------------------------------*/
});



/*-------------------------- Filter Results -----------------------------*/
function filter_results() {
	var value = $('.form_doctor').serialize();

	$.ajax({
				type: "POST",
				url: base_url+"Doctor/filterdoctor",
				data: value,				
			  success: function(data) {
					data = JSON.parse(data);
					console.log(data.map_data);
					ViewCustInGoogleMap(data.map_data, true);
					console.log(data.map_data);
					//alert(data['total']);
					if(data['total'] == 0) {						
						$(".view-more.loadmore").hide();
						$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');
					}
					else{															
					$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');					
					//load_more();
                   //alert(data['last_id']);					
					if(data['total'] >= 4) {	
					
						$(".view-more.loadmore").show();
						$('.moreboxdoctor').show();
						$('.moreboxdoctor').attr('id','moredoctor'+data['last_id']);
						$('.filterloadmore').attr('id',data['last_id']);
					} else {
						$(".view-more.loadmore").hide();
						
					}					
					}
					$('.evnt-mn.doctor').html(data['temp']);
					},
					/*success: function(data) {
					
									 $('.gc-filter-list ul').html(data);
					$('html, body').animate({scrollTop:$('.gc-hw-it.align-left').offset().top}, 'slow');					
					//load_more();														
							},*/
				error: function(data) {				                 
					var error = '<div class="message"><div class="error"><h1>Sorry, No records found.  </h1></div></div>';
					$('.col-lg-6.evt-br.doctor').html(error);
					$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');
					
				}
			});
}

/*-------------------------- Filter Results for clinic -----------------------------*/
function filter_results_clinic() {
	var value = $('.form_doctor_clinic').serialize();

	$.ajax({
				type: "POST",
				url: base_url+"Clinic/filterclinic",
				data: value,				
			  success: function(data) {
					data = JSON.parse(data);
					console.log(data);
					console.log(data.map_data);
					ViewCustInGoogleMap(data.map_data, true);
					console.log(data.map_data);
					//alert(data['total']);
					if(data['total'] == 0) {						
						$(".view-more.loadmore").hide();
						$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');
					}
					else{															
					$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');					
					//load_more();
                   //alert(data['last_id']);					
					if(data['total'] >= 4) {	
					
						$(".view-more.loadmore").show();
						$('.moreboxclinic').show();
						$('.moreboxclinic').attr('id','moreboxclinic'+data['last_id']);
						$('.filterloadmore_clinic').attr('id',data['last_id']);
					} else {
						$(".view-more.loadmore").hide();
						
					}					
					}
					$('.col-lg-10.clinic').html(data['temp']);
					},
					/*success: function(data) {
					
									 $('.gc-filter-list ul').html(data);
					$('html, body').animate({scrollTop:$('.gc-hw-it.align-left').offset().top}, 'slow');					
					//load_more();														
							},*/
				error: function(data) {				                 
					var error = '<div class="message"><div class="error"><h1>Sorry, No records found.  </h1></div></div>';
					$('.col-lg-6.evt-br.doctor').html(error);
					$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');
					
				}
			});
}

/*-------------------------- Filter Results for Medical center -----------------------------*/
function filter_results_medical() {
	var value = $('.form_doctor_medical').serialize();

	$.ajax({
				type: "POST",
				url: base_url+"Medical/filtermedical",
				data: value,				
			  success: function(data) {
					data = JSON.parse(data);
					console.log(data);
					console.log(data.map_data);
					ViewCustInGoogleMap(data.map_data, true);
					console.log(data.map_data);
					//alert(data['total']);
					if(data['total'] == 0) {						
						$(".view-more.loadmore").hide();
						$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');
					}
					else{															
					$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');					
					//load_more();
                   //alert(data['last_id']);					
					if(data['total'] >= 4) {	
					
						$(".view-more.loadmore").show();
						$('.moreboxmedical').show();
						$('.moreboxmedical').attr('id','moremedical'+data['last_id']);
						$('.filterloadmore_medical').attr('id',data['last_id']);
					} else {
						$(".view-more.loadmore").hide();
						
					}					
					}
					$('.col-lg-10.medical').html(data['temp']);
					},
					/*success: function(data) {
					
									 $('.gc-filter-list ul').html(data);
					$('html, body').animate({scrollTop:$('.gc-hw-it.align-left').offset().top}, 'slow');					
					//load_more();														
							},*/
				error: function(data) {				                 
					var error = '<div class="message"><div class="error"><h1>Sorry, No records found.  </h1></div></div>';
					$('.col-lg-6.evt-br.doctor').html(error);
					$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');
					
				}
			});
}







/*-------------------------- Filter Results for hospital -----------------------------*/
function filter_results_hospital() {
	var value = $('.form_doctor_hospital').serialize();

	$.ajax({
				type: "POST",
				url: base_url+"Hospital/filterhospital",
				data: value,				
			  success: function(data) {
					data = JSON.parse(data);
					console.log(data);
					console.log(data.map_data);
					ViewCustInGoogleMap(data.map_data, true);
					console.log(data.map_data);
					//alert(data['total']);
					if(data['total'] == 0) {						
						$(".view-more.loadmore").hide();
						$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');
					}
					else{															
					$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');					
					//load_more();
                   //alert(data['last_id']);					
					if(data['total'] >= 4) {	
					
						$(".view-more.loadmore").show();
						$('.moreboxhospital').show();
						$('.moreboxhospital').attr('id','morehospital'+data['last_id']);
						$('.filterloadmore_hospital').attr('id',data['last_id']);
					} else {
						$(".view-more.loadmore").hide();
						
					}					
					}
					$('.col-lg-10.hospital').html(data['temp']);
					},
					/*success: function(data) {
					
									 $('.gc-filter-list ul').html(data);
					$('html, body').animate({scrollTop:$('.gc-hw-it.align-left').offset().top}, 'slow');					
					//load_more();														
							},*/
				error: function(data) {				                 
					var error = '<div class="message"><div class="error"><h1>Sorry, No records found.  </h1></div></div>';
					$('.col-lg-6.evt-br.doctor').html(error);
					$('html, body').animate({scrollTop:$('.doctor-sub').offset().top}, 'slow');
					
				}
			});
}

/*-------------------------- Homepage filter function end -----------------------------*/







function ViewCustInGoogleMap(data) {
//console.log(data);
var mapOptions = {
center: new google.maps.LatLng(9.9710364, 76.2382522), // Coimbatore = (11.0168445, 76.9558321)
zoom: 7,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
people = JSON.parse(data);

for (var i = 0; i < people.length; i++) {
setMarker(people[i]);
}

}

function setMarker(people) {
geocoder = new google.maps.Geocoder();
infowindow = new google.maps.InfoWindow();
if ((people.LatitudeLongitude == null) || (people.LatitudeLongitude == 'null') || (people.LatitudeLongitude == '')) {
geocoder.geocode({ 'address': people["Location"] }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
marker = new google.maps.Marker({
position: latlng,
map: map,
draggable: false,
html: "<b>"+people.DisplayText+"</b><div>"+people.Location+"</div>"
});
//marker.setPosition(latlng);
//map.setCenter(latlng);
google.maps.event.addListener(marker, 'click', function(event) {
infowindow.setContent(this.html);
infowindow.setPosition(event.latLng);
infowindow.open(map, this);
});
}
else {
alert(people.DisplayText + " -- " + people.Location + ". This address couldn't be found");
}
});
}
else {
var latlngStr = people.LatitudeLongitude.split(",");
var lat = parseFloat(latlngStr[0]);
var lng = parseFloat(latlngStr[1]);
latlng = new google.maps.LatLng(lat, lng);
marker = new google.maps.Marker({
position: latlng,
map: map,
draggable: false, // cant drag it
html: "<b>"+people.DisplayText+"</b><div>"+people.Location+"</div>" // Content display on marker click
//icon: "images/marker.png" // Give ur own image
});
//marker.setPosition(latlng);
//map.setCenter(latlng);
google.maps.event.addListener(marker, 'click', function(event) {
infowindow.setContent(this.html);
infowindow.setPosition(event.latLng);
infowindow.open(map, this);
});
}
}