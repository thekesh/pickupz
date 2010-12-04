

Sport: <?php echo $_POST["sport"]; ?><br />
Event Name: <?php echo $_POST["name"]; ?><br />
Address: <?php echo $_POST["address"]; ?><br />
Coords: <?php echo $_POST["coords"]; ?><br />
Date: <?php echo $_POST["date"]; ?><br />
Time: <?php echo $_POST["time"]; ?><br />
Skill Level: <?php echo $_POST["level"]; ?><br />
Gender: <?php echo $_POST["gender"]; ?>



<?php  

require 'database.php'; 

$sport = $_POST["sport"]; 
$name = $_POST["name"];
$address = $_POST["address"];
$coords = $_POST["coords"];
$date = $_POST["date"]; 
$time = $_POST["time"];
$level = $_POST["level"];
$gender = $_POST["gender"];
$datetime = $date." ".$time;


mysqli_query($mysqli,"INSERT INTO events (id, sport, name, address, coords, datetime, gender, level) VALUES(NULL,'$sport','$name','$address',GeomFromText('POINT($coords)'),'$datetime','$gender','$level')");

?>


