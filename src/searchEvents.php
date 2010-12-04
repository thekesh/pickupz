<?php  
 
require 'database.php';  


error_reporting( E_ERROR );
function handleError($errno, $errstr,$error_file,$error_line) {
 echo "<p>ERROR: Invalid search results.<p>";
 die();
}
//set error handler
set_error_handler("handleError");


$search = $_POST["search"];
$array = getLatLong($search);
$lat = $array["Latitude"];
$long = $array["Longitude"];
 
$query = "CALL searchEvents($lat, $long, 10)";
$result = $mysqli->query($query) or die(mysqli_error($mysqli));  

if ($result) {  
  echo "<div id='events'> \n";  
 
  while ($row = $result->fetch_object()) {  

	$id = $row->id;
    $name = $row->name;  
    $address = $row->address;
	$gender = $row->gender;  
	$level = $row->level; 
    
	echo "<div class='event-box'> \n";
	echo "<a href='#'>close</a> \n";
    echo "<p class='event-name'>$name</p> \n";
	echo "<p class='event-text'>$address</p> \n";
	echo "<p class='event-text'>Gender: $gender</p> \n";  
	echo "<p class='event-text'>Skill Level: $level</p></div> \n"; 
  
    }  
  echo "\n</div>";  
} else {
	echo "NO RESULTS!";
}

function getLatLong($code){
	
	$query = "http://maps.google.com/maps/geo?q=".urlencode($code)."&output=json";
	$data = file_get_contents($query);
	// if data returned
	
	if($data){
		// convert into readable format
		$data = json_decode($data);
		$long = $data->Placemark[0]->Point->coordinates[0];
		$lat = $data->Placemark[0]->Point->coordinates[1];
		return array('Latitude'=>$lat,'Longitude'=>$long);
	}else{
		return false;
	}
}

?>  

