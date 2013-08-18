<?php
include "php/server.php";
/*
$dbhost = "localhost";
$dbuser = "syscall";
$dbpass = "syscall123";
$dbname = "syscall";
*/
	//Connect to MySQL Server
//mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
//mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
    $db_found = mysql_select_db($dbname, $db_handle);

if ($db_found) {
$uname = $_GET['uname'];
$pword = $_GET['pword'];
	// Escape User Input to help prevent SQL Injection
$uname = mysql_real_escape_string($uname);
$pword = mysql_real_escape_string($pword);
//$a='a';
	//build query
$query = "SELECT * FROM logins WHERE computer_number = '$uname' AND password ='". md5($pword) ."'";
/*if(is_numeric($age))
	$query .= " AND ae_age <= $age";
if(is_numeric($wpm))
	$query .= " AND ae_wpm <= $wpm";*/
	//Execute query



/*	//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Id</th>";
$display_string .= "<th>Username</th>";
$display_string .= "<th>Password</th>";
$display_string .= "</tr>";

	// Insert a new row in the table for each person returned
while($row = mysql_fetch_array($qry_result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[id]</td>";
	$display_string .= "<td>$row[username]</td>";
	$display_string .= "<td>$row[password]</td>";
	$display_string .= "</tr>";
	
}

echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo $display_string;*/
$qry_result = mysql_query($query) or die(mysql_error());

 //$query1 = "SELECT * FROM administrator WHERE computer_number = '$uname' AND password = '$pword'"; $result1 = mysql_query($query1)or die(mysql_error());
	
while($row = mysql_fetch_array($qry_result)){
	session_start();
    $_SESSION['login'] = "$row[computer_number]";
	
	
	$name= "$row[Full_Name]";
	
	
	/*
	$dbhost = "slpa.knnect.com";
$dbuser = "syscall";
$dbpass = "syscall123";
$dbname = "syscall";
*/
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
    $db_found = mysql_select_db($dbname, $db_handle);
	
	if ($db_found) {
		$query1 = "SELECT * FROM administrator WHERE computer_number = '$uname' AND password = '". md5($pword) ."'"; 
	    $result = mysql_query($query1);
		$num_rows = mysql_num_rows($result);
		$db_field = mysql_fetch_assoc($result);		

            
	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ($result) {
			if ($num_rows > 0) {
				$display_string .="Admin";
				session_start();
				$_SESSION['status'] = "Admin";
	
				//echo $display_string;
			}
		
		else{
			session_start();
				$_SESSION['status'] = "User";
					
	 //}
	//$display_string .= "$row[computer_number]";
	//$display_string .= "$row[password]";
	
	$display_string .="User";}
	                $date=date("F j, Y, g:i:s a");
					$updatefile = "userlogs.txt";
					$fh = fopen($updatefile, 'a') or die("can't open file");
					$stringData = "User: ".$name;
					fwrite($fh, $stringData);
					$stringData = " Logged in: $date".PHP_EOL;;
					fwrite($fh, $stringData);
					fclose($fh);
					}
	else{}
}
	
	}
	}
	else{
		echo "Could not connect to database";
	}
	
echo $display_string;
?>
