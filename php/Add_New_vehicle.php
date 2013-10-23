<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: ../index.php");
 }
 else if( $_SESSION['status'] == "User")
 {
	 header ("Location: main.php?pageID=0");
 }
   //$cm=$_SESSION['login'];
   echo $_SESSION[login];
   include "server.php";
   
 ?>
 <?php

 

	if (isset($_POST["add"])) {
		 $errorMessage="";
		  if($_POST["driver_id"]=="" || $_POST["driver_name"]=="" || $_POST["vehicle_no"]==""|| $_POST["occupation"]==""|| $_POST["department"]==""|| $_POST["owner_of_vehicle"]=="")
		  {
			  $errorMessage = "Enter data ";
		  }
		  else{
 /*
	$user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";
*/
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
	$db_found = mysql_select_db($dbname, $db_handle);
	
	    if ($db_found) {

$current_time = date('H:i:s');
		
    $sql="INSERT INTO job (vehicle_number,Driver_Name,driver_id, vehicle_type,division, time_of_departure, department, date , vehicle_owner,Destination,owner_occupation,reason_for_departure,driver_added_by) VALUES
    ('$_POST[vehicle_no]','$_POST[driver_name]','$_POST[driver_id]','$_POST[vehicle_type]','$_POST[occupation]','$_POST[time_of_departure]','$current_time','$_POST[datepicker]','$_POST[owner_of_vehicle]','$_POST[demo_input]','$_POST[owner_occupation]','$_POST[reason_for_departure]','$_SESSION[login]')";
	  $result=mysql_query($sql);
 echo "<script>";
        //echo "window.alert($_POST[datepicker]);";
        echo 'window.alert("This post was successfully added.");';

       echo' document.location.href = "main.php?pageID=0";';

echo "</script>";
	      mysql_close($db_handle);
			 // header("Location: https://www.google.lk/");
			 //exit;
	                 }

	    else {
	     	$errorMessage = "can't find the databse ";
	         }
	    
		
		}
	 }
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


  
    <script type="text/javascript" src="../js/src/jquery.min.js"></script>
    <script type="text/javascript" src="../js/src/jquery.tokeninput.js"></script>
    
    
     <script type="text/javascript">
        $(document).ready(function() {
            $("#demo_input").tokenInput("get_suggestions.php", { 
			    preventDuplicates: true,
                tokenLimit: 1
            });
        });
        </script>
        

    <link rel="stylesheet" href="../css/styles/token-input.css" type="text/css" />
    
  
 
 <link rel="stylesheet" href="../css/css_dt/jquery-ui-1.10.3.custom.css" />
 <link rel="stylesheet" href="../css/css_dt/jquery-ui-1.10.3.custom.min.css" />
 <script src="../js/js_dt/jquery-ui.js"></script>
  

 <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' ,
	 showOn: "button",
     buttonImage: "../css/css_dt/images/calendar.gif",
     buttonImageOnly: true});
  });
</script> 
 

   

<script language="javascript" type="text/javascript">
      
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
	   
	   
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Information System</title>
<meta name="keywords" content="singular theme, free template, web design, clean, simple, professional, CSS, HTML" />
<meta name="description" content="Singular Theme, free CSS template from templatemo.com" />
<link href="../css/menu.css" type="text/css" rel="stylesheet" />


<link href="../css/main_style.css" type="text/css" rel="stylesheet" />

<link href="../css/main_page_style.css" type="text/css" rel="stylesheet" />
 

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
  
	


 
include "menu.php";
?>
    <div id="display_drivers">
      <form id="Add_New_vehicle" name="Add_New_vehicle" method="post" action="Add_New_vehicle.php">
        <table width="799" border="0" cellspacing="5">
          <tr>
            <td colspan="6"><label for="driver_id">
            <font size="+2"  ><center>Add New Vehicle</center></font></label></td>
          </tr>
          <tr>
            <td width="105"> Driver Id </td>
            <td width="269" colspan="3"><input name="driver_id" type="text" id="driver_id" size="34" onkeypress="return isNumberKey(event)" class="txtbox" placeholder="Computer number" /> </td>
            <td width="147"> Vehicle Number </td>
            <td width="225"><input name="vehicle_no" type="text" id="vehicle_no" size="34" class="txtbox" placeholder="vehicle number" /></td>
            
            
          </tr>
          <tr>
            <td>Driver Name</td>
            <td colspan="3">
            <input name="driver_name" type="text" id="driver_name" size="34" class="txtbox"placeholder="Full name" /></td>
            <td width="147"> Vehicle Type </td>
            <td width="225"><input name="vehicle_type" type="text" id="vehicle_type" size="34" class="txtbox"placeholder="vehicle type" /></td>
          </tr>
           <tr><td> </td></tr>
          <tr>
            <td> Division </td>
            <td colspan="3">
            <input name="occupation" type="text" id="occupation" size="34" class="txtbox" placeholder="position"/></td>
            
                        <td >Time of departure</td>
            <td><input name="time_of_departure" type="text" id="time_of_departure" size="34" class="txtbox" placeholder="time" readonly="readonly" value="<?php echo date('H:i:s').'(current time)';   ?>" /></td>

            
          </tr>
         
          <tr>
            <td> Department </td>
            <td colspan="3">
            <input name="department" type="text" id="department" size="34" class="txtbox"placeholder="department" /></td>
            <td>Date</td>
              <td><input name="datepicker" type="text" id="datepicker" size="30" class="txtbox" placeholder="date" /></td>
          </tr>
           <tr><td> </td></tr>
          <tr>
            
             
          </tr>
          <tr>
            <td> Vehicle's owner </td>
            <td colspan="3"><input name="owner_of_vehicle" type="text" id="owner_of_vehicle" size="34" class="txtbox" placeholder="owner"/></td>
              
             <td>Destination</td>
             <td><input type="text" id="demo_input" name="demo_input"  placeholder="destination" />
              </td>
          </tr>
          <tr >
            <td>Owner's occupation </td>
            <td colspan="3"><textarea style="resize:none" name="owner_occupation" cols="26" rows="3" class="txtbox" id="owner_occupation" placeholder="vehicle owner's occupation"></textarea></td>
            <td >Reason for departure</td>
             <td><textarea name="reason_for_departure" style="resize:none" cols="26" rows="3" class="txtbox" id="reason_for_departure" placeholder="reason for the daparture"></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" name="cancel" id="cancel" value="Cancel" onclick="javascript:window.location.href='main.php?pageID=0'"  class="btnAddLocation"/></td>
            <td><input type="submit" name="add" id="add" value="Add Driver"class="btnAddLocation" /></td>
          </tr>
          </table>
        </font>
        &nbsp; <label><font color="red"><?php echo $errorMessage; ?></font></label>
      </form>
    </div>
    
</div>
</div>

<div id="slpa_footer_wrapper">
	<div id="slpa_footer">
   	  <p >Copyright © 2013 Faculty Of Information Technology|University Of Moratuwa| SysCall</a></p>
    </div>
</div>
</body> 
</html>