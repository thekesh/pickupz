<?php  
  
require 'src/database.php';  
  
$query = "SELECT id, name, address, gender, level FROM events";  
  
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
}  
?>  