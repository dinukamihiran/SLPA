<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: ../index.php");
}
else if( $_SESSION['status'] == "User")
 {
	 header ("Location: main.php?pageID=0");
 }
include "server.php";

?>
<?php
//$pageID = $_GET['pageID'];
//echo $pageID;
 $search = $_POST['search'];
	
 if(isset($_POST['searchSubmit']))
 { 
 if($search!="")
 {
	/* $user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";*/
	


	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

	if ($db_found) {

		
		$SQL = "SELECT * FROM logins WHERE computer_number = $search ";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);
		$db_field = mysql_fetch_assoc($result);
		$id=$db_field['computer_number'];
	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ($result) {
			if ($num_rows > 0) {
				 
				header ("Location: Edit_or_remove_users.php?user=".$id);
				
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
<style type="text/css">

</style>
<script type="text/javascript" src="../js/jquery.min.js"></script>


</head> 
<body> 
<div id="slpa_header_wrapper">
  <div id="slpa_header">
   	<div >
          <p><img src="../images/logo.png" width="167" height="115" alt="vehicle image" /></p><p>Port Authority Colombo ,Sri Lanka</p>
    </div>
   	<p>This software is responsible for keeping records about the drivers , who went outside of port.And also this will keep the track on job given time and the destination that vehicle went.</p>
    </div>
   
</div>
<div id="slpa_main_wrapper">
  <div id="slpa_main">
  

  <?php 
 /*   
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "job_information";*/
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
  
  include "menu.php";
	?>
  

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
    <div id="searchboxuser">      
    <form id="searchSubmit" name="searchsubmit" method="post" >
    
    <p><font   size="+1"><B>Enter User Computer Number</B></font>
        <input type="text" name="search" id="search" onkeypress="return isNumberKey(event)"  class="txtboxSearchuser"/>
          <input type="submit"  name="searchSubmit" id="searchSubmit2" value="Search" class="btnSearch" />
        <label><font color="#FF0000" size="+1"><br />
          <?php echo $message; ?></font></label>
      </p>
    </form>
    
    </div>
    
    <div class="data">
    <div class="data_show_users">
    <?php
$pageID = $_GET['pageID'];
//echo $pageID;

       /* $user_name = "root";
		$password = "";
		$database = "job_information";
		$server = "127.0.0.1";*/
		$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

	if ($db_found) { 
	
	    $pid=$pageID +12;
		$sql = "SELECT * FROM logins LIMIT " . $pageID . ",11";
		$result1 = mysql_query($sql);
    
     // while ($db_field = mysql_fetch_assoc($result1))
	  //{
               
echo "<table border='0' cellspacing='4' cellpadding='5' class='curvedEdges'>";
echo "<tr><th>Computer Number</th><th>Full_Name</th><th>Position</th><th>Division</th><th>User Added by</th></tr>";
 
//now read and display the entire row of a table one by one looping through it.
//to loop we are using While condition here
 
while( $db_field = mysql_fetch_assoc($result1) )
{
echo "<tr><td><a href='Edit_or_remove_users.php?user=$db_field[computer_number]'>$db_field[computer_number]<a></td>";
echo "<td>$db_field[Full_Name]</td>";
echo "<td>$db_field[occupation]</td>";
echo "<td>$db_field[Division]</td>";
echo "<td>$db_field[user_added_by]</td></tr>";
}
 
echo " </table>";
               
    //  }

	
$SQL = "select * from logins";
$result = mysql_query($SQL);
$totalRows = mysql_num_rows($result);
			$linkNum = ceil($totalRows / 10);
             
			print "<p ALIGN = CENTER>";
		    $linkCount = 0;
		    $pageCount = 1;
			
			if( $pageID != 0){
			$linkPages = "<A HREF = Show_Users.php?pageID=" . $linkCount;
			$linkPages = $linkPages . ">First </A>";
			print $linkPages . " ";
			}
			
			 if( $pageID != ($linkCount)) {
			$pre = $pageID - 12 ;
			$linkPages = "<A HREF = Show_Users.php?pageID=" . $pre;
			$linkPages = $linkPages . "> Previous </A>";
			print $linkPages . " ";}
			
		for ($i = 0; $i < $linkNum; ++$i) {
			$linkPages = "<A HREF = Show_Users.php?pageID=" . $linkCount;
			$linkPages = $linkPages . ">  Page " . $pageCount . "</A>";
			
			if(((($linkCount+12)- $pageID )== 12) || ((($linkCount+12)- $pageID )== 24) || ((($linkCount+12)- $pageID )== 0)){
			print $linkPages . " ";}
			
			$linkCount = $linkCount + 12;
			$pageCount++;
		}
		    if( $pageID != ($linkCount-12)) {
		    $nxt = $pageID + 12 ;
			$linkPages = "<A HREF = Show_Users.php?pageID=" . $nxt;
			$linkPages = $linkPages . ">  Next</A>";
			print $linkPages . " ";}
			
			if( $pageID != ($linkCount-12)){
		    $linkCount = $linkCount-12;
		    $linkPages = "<A HREF = Show_Users.php?pageID=" . $linkCount;
			$linkPages = $linkPages . ">  Last </A>";
			print $linkPages . " ";
			}
			
		print "</p>";
	}
		 

?>
     </div></div>
    
</div>
</div>

<div id="slpa_footer_wrapper">
	<div id="slpa_footer">
   	  <p>Copyright © 2013 Faculty Of Information Technology|University Of Moratuwa| SysCall</a></p>
    </div>
</div>
</body> 
</html>