<?php
/*$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "job_information";*/
include "server.php";
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
$q=$_GET["q"];
	// Escape User Input to help prevent SQL Injection
$uname = mysql_real_escape_string($q);
	//build query
$query = "SELECT * FROM destination_coordinates  WHERE townname LIKE '".$q."%' LIMIT 0,10";
$qry_result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($qry_result)){
	$a[]="$row[townname]";
}

//lookup all hints from array if length of q>0
if (strlen($q) > 0)
  {
  $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {
        $hint=$a[$i];
        }
      else
        {
        $hint=$hint." , ".$a[$i];
        }
      }
    }
  }

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="";
  }
else
  {
  $response=$hint;
  }

//output the response
$response=explode(",", $response);
/*
$display_string = "<table>";
$display_string .= "<tr><td>$response[0]</td></tr>";
$display_string .= "<tr><td>$response[1]</td></tr>";
$display_string .= "<tr><td>$response[2]</td></tr>";
$display_string .= "<tr><td>$response[3]</td></tr>";
$display_string .= "<tr><td>$response[4]</td></tr>";
$display_string .= "<tr><td>$response[5]</td></tr>";
$display_string .= "<tr><td>$response[6]</td></tr>";
$display_string .= "<tr><td>$response[7]</td></tr>";
$display_string .= "<tr><td>$response[8]</td></tr>";
$display_string .= "<tr><td>$response[9]</td></tr>";
$display_string .= "</table>";*/
 
$display_string = "$response[0]<br/>";
$display_string .= "$response[1]<br/>";
$display_string .= "$response[2]<br/>";
$display_string .= "$response[3]<br/>";
$display_string .= "$response[4]<br/>";
$display_string .= "$response[5]<br/>";
$display_string .= "$response[6]<br/>";
$display_string .= "$response[7]<br/>";
$display_string .= "$response[8]<br/>";
$display_string .= "$response[9]"; 
echo $display_string;
?>