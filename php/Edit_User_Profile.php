<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: ../index.php");
 }
 include "server.php";
 ?>
 <?php 
   /* $user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";
*/
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

	    if ($db_found) {
			$SQL="select * from logins where computer_number=".$_SESSION[login];
			$result = mysql_query($SQL);
  			$db_field = mysql_fetch_assoc($result);
			
			$user_name=$db_field['Full_Name'];
			$occupation=$db_field['occupation'];
			$division=$db_field['Division'];
<<<<<<< HEAD
			$user_pwd=$db_field['password'];
=======
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
			
		}
		else
		{}
 ?>
 <?php

 

	if (isset($_POST["update"])) {
		 $errorMessage="";
<<<<<<< HEAD
		 
		  
		  
		   if($_POST["user_id"]=="" || $_POST["user_full_name"]=="" || $_POST["occupation"]==""|| $_POST["division"]=="")
		  {
			  $errorMessage = "Some fields are missing.Please enter data ";
		  }
		  
		  
=======
		 $pwd=$pwd=md5($_POST['password']);
		   if($_POST["user_id"]=="" || $_POST["user_full_name"]=="" || $_POST["occupation"]==""|| $_POST["division"]==""||  $_POST["password"]=="" ||  $_POST["confirm_password"]=="")
		  {
			  $errorMessage = "Some fields are missing.Please enter data ";
		  }
		   else if($_POST["password"] != $_POST["confirm_password"])
		  {
			  $errorMessage = "password confirmation doesn't match ";
		  }
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
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


<<<<<<< HEAD
      $sql="UPDATE logins SET  Full_Name='$_POST[user_full_name]', occupation='$_POST[occupation]' , Division='$_POST[division]'  WHERE computer_number='$_SESSION[login]'";
	
	  $result=mysql_query($sql);
	  
	  /*if($_SESSION['status']=="Admin")
=======
      $sql="UPDATE logins SET computer_number='$_POST[user_id]', password='$pwd' , Full_Name='$_POST[user_full_name]', occupation='$_POST[occupation]' , Division='$_POST[division]'  WHERE computer_number='$_SESSION[login]'";
	
	  $result=mysql_query($sql);
	  
	  if($_SESSION['status']=="Admin")
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
	  {
		  $SQL="UPDATE administrator SET computer_number='$_POST[user_id]', password='$pwd' WHERE computer_number='$_SESSION[login]'";
	
	  $result1=mysql_query($SQL);
	  }
<<<<<<< HEAD
	  */
=======
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
	  
 echo "<script>";
 
        echo 'window.alert("This post was successfully updated.");';

       echo' document.location.href = "main.php?pageID=0";';

echo "</script>";
	      mysql_close($db_handle);
			 
	                 }

	    else {
	     	$errorMessage = "can't find the databse ";
	         }
		}
	 }
	
<<<<<<< HEAD
if (isset($_POST["change"])) {
		 $errorMessage="";
		 
		 
		 $pwd=$pwd=md5($_POST['password']);
		 $old_pwd=md5($_POST['old_password']);
		 if($user_pwd== $old_pwd)
		 {
		 
		 if($_POST['password']!="" && $_POST['confirm_password']!=""&& $_POST['old_password']!="" && ($_POST["password"] == $_POST["confirm_password"])){
			 $db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
             $db_found = mysql_select_db($dbname, $db_handle);

			if ($db_found) {
	
	 
			  $sql_set_password="UPDATE logins SET  password='$pwd' WHERE computer_number='$_SESSION[login]'";
			  $result=mysql_query($sql_set_password);
	        
			echo "<script>"; 
			echo 'window.alert("Your Password changed successfully");';
			echo' document.location.href = "main.php?pageID=0";'; 
			echo "</script>";

			}
		  
		 }
		  else if($_POST["password"] != $_POST["confirm_password"])
		  {
		    echo "<script>";	 
			echo 'window.alert("Passwords are doesn\'t match");';
			echo "</script>";
		  }
		 }
		 else{
			 echo "<script>";	 
			echo 'window.alert("Current password is wrong");';
			echo "</script>";
		 }
		  
}
=======

>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<<<<<<< HEAD
 
=======
<SCRIPT language=Javascript>
      
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
    </SCRIPT>
    <style type="text/css">
	

    </style>
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Information System</title>
<meta name="keywords" content="singular theme, free template, web design, clean, simple, professional, CSS, HTML" />
<meta name="description" content="Singular Theme, free CSS template from templatemo.com" />
<link href="../css/menu.css" type="text/css" rel="stylesheet" />

<link href="../css/main_style.css" type="text/css" rel="stylesheet" />

<link href="../css/main_page_style.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="../js/jquery.min.js"></script>

</head> 
<body> 
<div id="slpa_header_wrapper">
  <div id="slpa_header">
   	<div >
         <p><img src="../images/logo.png" width="167" height="115" alt="vehicle image" /></p>
          <p>Port Authority Colombo ,Sri Lanka</p>
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
<<<<<<< HEAD
      
	  include "menu.php";
	?>
  
    <div id="display_drivers">
        <form id="Edit_User_Profile" name="Edit_User_Profile" method="post" action="Edit_User_Profile.php">
         <table width="799" border="0" cellspacing="5">
          <tr>
            <td colspan="6"><label for="heading">
            <font size="+2"   ><center>Update Your Profile</center></label></td>
          </tr>
          <tr>
            <td width="128">Computer Number</td>
            <td colspan="2"><input name="user_id" type="text" id="user_id" size="34"  class="txtbox" value='<?php echo $_SESSION[login]; ?>' readonly="readonly"  /> </td>
            <td  colspan="2" width="289">Extendable</td>
             
=======
  
	?>
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
	<li><a href="">User Management</a>
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

    <div id="display_drivers">
        <form id="Edit_User_Profile" name="Edit_User_Profile" method="post" action="Edit_User_Profile.php">
        <font color="#FFFFFF"><table width="799" border="0" cellspacing="5">
          <tr>
            <td colspan="6"><label for="heading">
            <font size="+2" color="#FFFFFF" ><center>Update Your Profile</center></font></label></td>
          </tr>
          <tr>
            <td width="128">Computer Number</td>
            <td colspan="3"><input name="user_id" type="text" id="user_id" size="34" onkeypress="return isNumberKey(event)" class="txtbox" value='<?php echo $_SESSION[login]; ?>' /> </td>
            <td width="69">Extendable</td>
            <td width="217">Extendable</td>
            
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
            
          </tr>
          <tr>
            <td>Full Name</td>
<<<<<<< HEAD
            <td colspan="2">
            <input name="user_full_name" type="text" id="user_full_name" size="34" class="txtbox" value='<?php echo $name; ?>'/></td>
            <td width="69">Extendable</td>
            <td width="217">Extendable</td>
          </tr>
          <tr>
            <td>Occupation</td>
            <td colspan="2">
            <input name="occupation" type="text" id="occupation" size="34" class="txtbox" value='<?php echo $occupation; ?>' /></td>
          <td>Extendable</td>
          <td>  Extendable</td>
          </tr>
          <tr>
            <td>Division</td>
            <td colspan="2">
            <input name="division" type="text" id="division" size="34" class="txtbox" value='<?php echo $division; ?>' />
            </td>
            
            <td colspan="2"> Your Role</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">
             </td><td></td>
             <td>
             <?php if(isset($_SESSION['status']) AND $_SESSION['status']=="Admin") {
               echo '<input type="radio" name="status"id="admin" value="admin" checked disabled="disabled"/>Administrator</td>';
=======
            <td colspan="3">
            <input name="user_full_name" type="text" id="user_full_name" size="34" class="txtbox" value='<?php echo $name; ?>'/></td>
            <td width="69">Password</td>
            <td width="217"><input name="password" type="text" id="password" size="34" class="txtbox" /></td>
          </tr>
          <tr>
            <td>Occupation</td>
            <td colspan="3">
            <input name="occupation" type="text" id="occupation" size="34" class="txtbox" value='<?php echo $occupation; ?>' /></td>
          <td>Confirm password</td>
          <td>  <input name="confirm_password" type="text" id="confirm_password" size="34" class="txtbox" /></td>
          </tr>
          <tr>
            <td>Division</td>
            <td colspan="3">
            <input name="division" type="text" id="division" size="34" class="txtbox" value='<?php echo $division; ?>' />
            </td>
            
            <td colspan="2">Select Your Role</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">
             </td><td></td>
             <td>
             <?php if(isset($_SESSION['status']) AND $_SESSION['status']=="Admin") {
               echo '<input type="radio" name="status"id="admin" value="admin" checked />Administrator</td>';
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
			  }
			  else
			  {
				  echo '<input type="radio" name="status"id="admin" value="admin" disabled="disabled"/>Administrator</td>';
			  }
			 ?>
             </tr>
          <tr>
            <td></td>
<<<<<<< HEAD
            <td colspan="2">
=======
            <td colspan="3">
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
           
              </td>
              <td></td>
             <td>
              <?php if(isset($_SESSION['status']) AND $_SESSION['status']=="Admin") {
<<<<<<< HEAD
             echo '<input type="radio"  name="status" id="user" value="user" disabled="disabled" />User</td>';
=======
             echo '<input type="radio"  name="status" id="user" value="user"  />User</td>';
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
			  }
			  else{
				echo '<input type="radio"  name="status" id="user" value="user" checked disabled="disabled"/>User</td>';
			   }
			   ?>
          </tr>
          <tr>
            <td></td>
            <td colspan="3">
            
              </td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="61"><input type="button" name="cancel" id="cancel" value="Cancel" onClick="javascript:window.location.href='main.php?pageID=0'" class="btnAddLocation" /></td>
            <td width="127"><input type="submit" name="update" id="update" value="Update Profile" class="btnAddLocation"/></td>
          </tr>
<<<<<<< HEAD
         
            <tr>
            <td colspan="3"><br />To change your current password</td>
            </tr>
            <tr>
                <td colspan="2">Current Password</td>
                <td ><input name="old_password" type="password" id="old_password" size="34" class="txtbox" placeholder="old pasword"/></td>
            </tr>
            <tr>
                <td colspan="2">New Password</td>
                <td ><input name="password" type="password" id="password" size="34" class="txtbox" placeholder="new password"/></td>
            </tr>
            <tr>
               <td colspan="2">Confirm password</td>
               <td><input name="confirm_password" type="password" id="confirm_password" size="34" class="txtbox" placeholder="confirm password"/></td>
            </tr>
            
             <tr>
            <td>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="61"><input type="button" name="cancel_pwd" id="cancel_pwd" value="Cancel" class="btnAddLocation"  onClick="document.location.reload(true)" /></td>
            <td width="127"><input type="submit" name="change" id="change" value="Update Password" width="30px" class="btnAddLocation"/></td>
          </tr>
            
        </table> 
=======
        </table></font>
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
        &nbsp; <label><font color="red"><?php echo $errorMessage; ?></font></label>
      </form>
    </div>
</div>
</div>

<div id="slpa_footer_wrapper">
	<div id="slpa_footer">
   	  <p>Copyright © 2013 Faculty Of Information Technology|University Of Moratuwa| SysCall</a></p>
    </div>
</div>
</body> 
</html>