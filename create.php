
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<?php  require_once 'src/css_js.php'; ?>  
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/googlemaps.js"></script>
<script type="text/javascript" src="js/jquery.validate.pack.js" ></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#eventForm").validate();
	});
</script>


</head>


<body onload="initialize()">
<div id="event-wrapper">
<form id="#eventForm" action="src/submitEvent.php" method="post">
<div>
<label><strong>Sport:</strong></label>
<select name="sport">
	<option>Soccer</option>
	<option>Football</option>
	<option>Basketball</option>
	<option>Baseball</option>
</select>
</div>

<div>
<label><strong>Name:</strong></label>
<input type="text" id="name" name="name">
</div>

<div>
<label><strong>Address:</strong></label>
<input type="text" id="address" name="address"><input type="button" value="Search" onclick="codeAddress()">
<input type="text" id="coords" name="coords">
</div>

<div id="map_canvas" style="width:600px; height:300px"></div>

<div>
<label><strong>Date:</strong></label>
<input type="text" id="datepicker" name="showdate">
<input type="text" id="hiddenDate" name="date">
</div>

<div>
<label><strong>Time:</strong></label>
<select name="time" id="time">
	<option value="00:00:00">12:00 am</option>
	<option value="00:30:00">12:30 am</option>
	<option value="01:00:00">1:00 am</option>
	<option value="01:30:00">1:30 am</option>
	<option value="02:00:00">2:00 am</option>
	<option value="02:30:00">2:30 am</option>
	<option value="03:00:00">3:00 am</option>
	<option value="03:30:00">3:30 am</option>
	<option value="04:00:00">4:00 am</option>
	<option value="04:30:00">4:30 am</option>
	<option value="05:00:00">5:00 am</option>
	<option value="05:30:00">5:30 am</option>
	<option value="06:00:00">6:00 am</option>
	<option value="06:30:00">6:30 am</option>
	<option value="07:00:00">7:00 am</option>
	<option value="07:30:00">7:30 am</option>
	<option value="08:00:00">8:00 am</option>
	<option value="08:30:00">8:30 am</option>
	<option value="09:00:00">9:00 am</option>
	<option value="09:30:00">9:30 am</option>
	<option value="10:00:00">10:00 am</option>
	<option value="10:30:00">10:30 am</option>
	<option value="11:00:00">11:00 am</option>
	<option value="11:30:00">11:30 am</option>
	<option value="12:00:00">12:00 pm</option>
	<option value="12:30:00" selected="selected">12:30 pm</option>
	<option value="13:00:00">1:00 pm</option>
	<option value="13:30:00">1:30 pm</option>
	<option value="14:00:00">2:00 pm</option>
	<option value="14:30:00">2:30 pm</option>
	<option value="15:00:00">3:00 pm</option>
	<option value="15:30:00">3:30 pm</option>
	<option value="16:00:00">4:00 pm</option>
	<option value="16:30:00">4:30 pm</option>
	<option value="17:00:00">5:00 pm</option>
	<option value="17:30:00">5:30 pm</option>
	<option value="18:00:00">6:00 pm</option>
	<option value="18:30:00">6:30 pm</option>
	<option value="19:00:00">7:00 pm</option>
	<option value="19:30:00">7:30 pm</option>
	<option value="20:00:00">8:00 pm</option>
	<option value="20:30:00">8:30 pm</option>
	<option value="21:00:00">9:00 pm</option>
	<option value="21:30:00">9:30 pm</option>
	<option value="22:00:00">10:00 pm</option>
	<option value="22:30:00">10:30 pm</option>
	<option value="23:00:00">11:00 pm</option>
	<option value="23:30:00">11:30 pm</option>
</select>
</div>

<div>
<label><strong>Skill Level:</strong></label>
<select name="level">
	<option value="All">All</option>
	<option value="Beginer">Beginer</option>
	<option value="Intermediate">Intermediate</option>
	<option value="Advanced">Advanced</option>
</select>

</div>
<div>
<label><strong>Gender:</strong></label>
<select name="gender">
	<option value="Coed">Coed</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select>
<div>

<input type="submit" />
</form>
</div>
