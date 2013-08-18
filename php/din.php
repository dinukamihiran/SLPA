
<?php
 //db connection detils  
 /* $host = "localhost";  
  $user = "root";  
  $password = "";  
  $database = "job_information";  
 */
  
 include "server.php";     
  //make connection  
  
mysql_pconnect($dbhost, $dbuser, $dbpass) or die("Could not connect");
mysql_select_db($dbname) or die("Could not select database");
 // $server = mysql_connect($host, $user, $password);  
 // $connection = mysql_select_db($database, $server);  
      
	 // $q = $_GET["q"];
  //query the database  
 $query = sprintf("SELECT id,townname FROM destination_coordinates  WHERE townname LIKE '%%%s%%' LIMIT 10", mysql_real_escape_string($_GET["q"]));
$qry_result = mysql_query($query) or die(mysql_error());
     
    //loop through and return results  
  for ($x = 0, $numrows = mysql_num_rows($qry_result); $x < $numrows; $x++) {  
    $row = mysql_fetch_assoc($qry_result);  
      
    $comments[$x] = array("id"=> $row["id"],"name" => $row["townname"]);        
  }  
      
 $json_response = json_encode($comments);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
//if($_GET["callback"]) {
//    $json_response = $_GET["callback"] . "(" . $json_response . ")";
//}

# Return the response
echo $json_response;  
 
?> 