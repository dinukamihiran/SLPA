<?php
ob_start("ob_gzhandler");



session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: ../index.php");
 }
 include "server.php";
 $search = $_POST['search'];
	 echo $_SESSION[login];
	 echo $_SESSION[status];
	 $st=$_SESSION[status];
	 echo $st;
	 
 if(isset($_POST['searchSubmit']))
 { 
 if($search!="")
 {
	/* $user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";
*/
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

	if ($db_found) {

		$SQL = "SELECT * FROM job WHERE Driver_id = $search ";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);
		$db_field = mysql_fetch_assoc($result);
		$id=$db_field['Driver_id'];
		
		
	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ($result) {
			if ($num_rows > 0) {
				//$_SESSION['driver'] =$id;
				header ("Location: Edit_Driver_Details.php?driver=".$id);
				
			}
			else {
				$message="Cannot find Driver id";
				
			}	
		}
		else {
			$errorMessage = "Error logging on";
		}

	mysql_close($db_handle);
     
	}
	else{$errorMessage = "Cannot find Driver id ";}
 }
	
 else
 {
	 $message="Enter Driver id";
 }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Information System</title>
<meta name="keywords" content="singular theme, free template, web design, clean, simple, professional, CSS, HTML" />
<meta name="description" content="Singular Theme, free CSS template from templatemo.com" />
<link href="../css/menu.css" type="text/css" rel="stylesheet" />


<link href="../css/main_style.css" type="text/css" rel="stylesheet" />

<link href="../css/main_page_style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
	$(function() {
	  if ($.browser.msie && $.browser.version.substr(0,1)<7)
	  {
		$('li').has('ul').mouseover(function(){
			$(this).children('ul').show();
			}).mouseout(function(){
			$(this).children('ul').hide();
			})
	  }
	});   
	function DislplayAlert(){
 alert("Please Enter the driver id in the search box ,to update drive infomation")
 //document.getElementById("search").focus();
}     
</script>
<SCRIPT language=Javascript>
      
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //a0410d
    </SCRIPT>
<script type="text/javascript" src="../js/jquery.min.js"></script>


</head> 
<body> 
<div id="slpa_header_wrapper">
  <div id="slpa_header">
   	<div >
          <p><img src="../images/logo.png" width="167" height="115" alt="vehicle image" /></p><font color="#FFFFFF"><p>Port Authority Colombo ,Sri Lanka</p></font>
    </div>
   	<p><font color="#FFFFFF">This software is responsible for keeping records about the drivers , who went outside of port.And also this will keep the track on job given time and the destination that vehicle went.</font></p>
    </div>
   
</div>
<div id="slpa_main_wrapper">
  <div id="slpa_main">
  <div id="log">
    <?php 
  /*  
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "job_information";
*/
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
//$cm = $_GET['cm'];

$query = "SELECT * FROM logins WHERE computer_number = '$_SESSION[login]'";
		$qry_result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($qry_result)){
	 $name= "$row[Full_Name]";
	
}
		echo '<div id="log">You are login as '.$name.'</div>';
  
	?>
</div>
  <ul id="tab_menu">
	<li><a href="main.php?pageID=0">Home</a></li>
	<li>
		<a href="">Driver Management</a>
		<ul>
        <?php if(isset($_SESSION['status']) AND $_SESSION['status']=="Admin") {
        echo '<li ><a href="Add_New_Driver.php">Add New Driver</a></li>';
        }?>   
        
			<li><a href="main.php?pageID=0" onClick="DislplayAlert()">Edit Driver Details</a></li>
            
            <?php if(isset($_SESSION['status']) AND $_SESSION['status']=="Admin") {
        echo '<li><a href="main.php?pageID=0">Remove Driver</a></li>';
        }?>
			
		</ul>
	</li>
	<li><a href="#">User Management</a>
       <ul>
       
        <?php if(isset($_SESSION['status']) AND $_SESSION['status']=="Admin") {
        echo '<li><a href="Add_New_User.php">Add New User</a></li>';
        }?>
			
			<li><a href="Edit_User_Profile.php?">Edit User Profile</a></li>
            
            <?php if(isset($_SESSION['status']) AND $_SESSION['status']=="Admin") {
        echo '<li><a href="Show_Users.php?pageID=0">Remove User</a></li>';
        }?>
			
		</ul>
     </li>
    <li><a href="Add_Cordinates.php">Add Coordinates</a></li>
	<li><a href="About.php">About</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>
    <!--<div id="special">

      <table width="200" border="0">
        <tr>
          <td><font color="#FF0000" size="+2"> NOTES</font></td>
        </tr>
        <tr>
          <td><font color="#000000">Please Enter the driver id in the search box ,to update drive infomation or to remove drivers</font></td>
        </tr>
      </table>
    </div>-->
    <div id="searchbox">      
    <form id="searchSubmit" name="searchsubmit" method="post" >
    
      <p><font color="yellow" size="+1"><B>Enter Driver id</B></font>
        <input type="text" name="search" id="search" onkeypress="return isNumberKey(event)" class="txtbox"/>
        <input type="submit" name="searchSubmit" id="searchSubmit2" value="Search" class="btnSearch" />
        <label><font color="#FF0000" size="+1"><br />
          <?php echo $message; ?></font></label>
      </p>
    </form>
    
    </div>
    
    <div class="data">
    <div class="data_show_drivers">
    <?php
$pageID = $_GET['pageID'];

//echo $pageID;

      /*  $user_name = "root";
		$password = "";
		$database = "job_information";
		$server = "127.0.0.1";
		*/
		$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);
	if ($db_found) { 
	
	    $pid=$pageID +9;
		$sql = "SELECT * FROM job LIMIT " . $pageID . ",".$pid. "";
		$result1 = mysql_query($sql);
    
     // while ($db_field = mysql_fetch_assoc($result1))
	  //{
               
echo "<table border='0' cellspacing='4' cellpadding='5' class='curvedEdges' >";
echo "<tr><th>Driver_id</th><th>Driver_Name</th><th>Vehicle_No</th><th>vehicle Type</th><th>Division</th><th>Department</th><th>Destination</th></tr><font color='#FFFFFF'>";
 
//now read and display the entire row of a table one by one looping through it.
//to loop we are using While condition here
 
while( $db_field = mysql_fetch_assoc($result1) )
{
echo "<tr><td><a href='Edit_Driver_Details.php?driver=$db_field[Driver_id]'>$db_field[Driver_id]<a></td>";
echo "<td>$db_field[Driver_Name]</td>";
echo "<td>$db_field[Vehicle_No]</td>";
echo "<td>$db_field[vehicle_type]</td>";
echo "<td>$db_field[division]</td>";
echo "<td>$db_field[department]</td>";
echo "<td>$db_field[Destination]</td></tr>";
}
 
echo "</font></table>";
               
    //  }

	
$SQL = "select * from job";
$result = mysql_query($SQL);
$totalRows = mysql_num_rows($result);
			$linkNum = ceil($totalRows / 10);
             
			print "<p ALIGN = CENTER>";
		    $linkCount = 0;
		    $pageCount = 1;
		for ($i = 0; $i < $linkNum; ++$i) {
			$linkPages = "<A HREF = main.php?pageID=" . $linkCount;
			$linkPages = $linkPages . ">Page " . $pageCount . "</A>";
			print $linkPages . " ";
			$linkCount = $linkCount + 12;
			$pageCount++;
		}
		
		print "</p>";
		
	}
		 

?>
     </div></div>
    
</div>
</div>

<div id="slpa_footer_wrapper">
	<div id="slpa_footer">
   	  <font color="#FFFFFF"><p>Copyright © 2013 Faculty Of Information Technology|University Of Moratuwa| SysCall</a></p></font>
    </div>
</div>
</body> 
</html>