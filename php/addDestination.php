<?php 
$latitude=$_GET["lat"];
$longitude=$_GET["lon"];
$town=$_GET['town'];

/*
$username="root";
$password="";
$database="job_information";
$server="localhost";
*/
include "server.php";

$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

if($db_found)
{
	$sql="INSERT INTO destination_coordinates(townname,latitude,longitude)VALUES('$town',' $latitude','$longitude')";
	$result=mysql_query($sql);
	echo '<script type="text/javascript"> alert("Location added sucessfully");';
	echo 'window.location = "Add_Cordinates.php"</script>';
	mysql_close($db_handle);
	
}
else
{
	echo '<script type="text/javascript"> alert("Database Not Found");';
	echo 'window.location = "setDestination.php"</script>';
	mysql_close($db_handle);
	
}


?>