var geocoder;
var map;
var marker;

function initialize() {
	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(-34.397, 150.644);
	var myOptions = {
	  zoom: 8,
	  center: latlng,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
}

function codeAddress() {

	clearOverlays();

	var address = document.getElementById("address").value;
	geocoder.geocode( { 'address': address}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
		map.setCenter(results[0].geometry.location);
		map.setZoom(16);
		addMarker(results[0]);
		
		var addressBox = document.getElementById("address");
		var locationBox = document.getElementById("coords");
		var addressTtxt = results[0].formatted_address;
		var lat = results[0].geometry.location.lat();
		var lng = results[0].geometry.location.lng();
		if(addressBox) {
			addressBox.value = addressTtxt;
		}
		if(locationBox) {
			locationBox.value = lat +" "+ lng;
		}
		
	  } else {
		alert("Geocode was not successful for the following reason: " + status);
	  }
	});

}
  
  
function addMarker(results) {
	marker = new google.maps.Marker({
		position: results.geometry.location,
		title: results.formatted_address,
		map: map
	});
	
	
	var contentString = '<div id="content">'+
	'<div id="siteNotice">'+
    '</div>'+
    '<h3 id="firstHeading" class="firstHeading">'+results.formatted_address+'</h3>'+
    '<div id="bodyContent">'+
    '<p><a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">Get Directions</a></p></div></div>';
	
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
  
	google.maps.event.addListener(marker, 'click', function() {
	  infowindow.open(map,marker);
	});
	
	marker.setMap(map);
}

// Removes the overlays from the map, but keeps them in the array
function clearOverlays() {
	if (marker) {
		marker.setMap(null);
	}
}
  

$(function() {

	$( "#datepicker" ).datepicker({
		altField: "#hiddenDate",
		altFormat: "yy-mm-dd"
	});

	
	//hover states on the static widgets
	$('#dialog_link, ul#icons li').hover(
		function() { $(this).addClass('ui-state-hover'); }, 
		function() { $(this).removeClass('ui-state-hover'); }
	);
	
});

