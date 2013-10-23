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

 

	if (isset($_POST["add"])) {
		 $pwd=md5($_POST['password']);
		 $errorMessage="";
		  if($_POST["user_id"]=="" || $_POST["user_full_name"]=="" || $_POST["occupation"]==""|| $_POST["division"]==""|| $_POST["user_full_name"]==""|| $_POST["password"]=="" || $_POST["password"]=="" || $_POST["confirm_password"]=="")
		  {
			  $errorMessage = "Enter data ";
		  }
		  else if($_POST["password"] != $_POST["confirm_password"])
		  {
			  $errorMessage = "password confirmation doesn't match ";
		  }
		  else{
 
	/*$user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";
*/
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

	    if ($db_found) {


		
    $sql="INSERT INTO logins(computer_number,password,Full_Name,occupation,Division,user_added_by) VALUES('$_POST[user_id]','$pwd','$_POST[user_full_name]','$_POST[occupation]','$_POST[division]','$_SESSION[login]')";
	  $result=mysql_query($sql);
	  
	  if($_POST['status']=="admin")
	  {
		   $sql_query="INSERT INTO administrator(computer_number) VALUES('$_POST[user_id]')";
	       $result1=mysql_query($sql_query);
		  
	  }
	  else{}
	  
	  
	  
	  
 echo "<script>";
 
        echo 'window.alert("This user was successfully added.");';

       echo' document.location.href = "Show_Users.php?pageID=0";';

echo "</script>";
	      mysql_close($db_handle);
			 
	                 }

	    else {
	     	$errorMessage = "can't find the databse ";
	         }
	    
		
		}
	 }
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

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
         <p><img src="../images/logo.png" width="167" height="115" alt="vehicle image" /></p> <p>Port Authority Colombo ,Sri Lanka</p>
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
      <form id="Add_New_User" name="Add_New_User" method="post" action="Add_New_User.php">
        <table width="799" border="0" cellspacing="5">
          <tr>
            <td colspan="6"><label for="heading_title">
            <font size="+2"  ><center>Add New User</center></font></label></td>
          </tr>
          <tr>
            <td width="128">Computer Number</td>
            <td colspan="3"><input name="user_id" type="text" id="user_id" size="34" onkeypress="return isNumberKey(event)" class="txtboxSearchuser" placeholder="Computer number" /> </td>
            <td width="69">Extendable</td>
            <td width="217">Extendable</td>
            
            
          </tr>
          <tr>
            <td>Full Name</td>
            <td colspan="3">
            <input name="user_full_name" type="text" id="user_full_name" size="34" class="txtboxSearchuser" placeholder="Full name"/></td>
            <td width="69">Password</td>
            <td width="217"><input name="password" type="password" id="password" size="34" class="txtboxSearchuser" placeholder="Password"/></td>
          </tr>
          <tr>
            <td>Occupation</td>
            <td colspan="3">
            <input name="occupation" type="text" id="occupation" size="34" class="txtboxSearchuser" placeholder="occupation"/></td>
            <td>Confirm password</td>
          <td>  <input name="confirm_password" type="password" id="confirm_password" size="34" class="txtbox" placeholder="confirm password"/></td>
          </tr>
          <tr>
            <td>Division</td>
            <td colspan="3">
            <input name="division" type="text" id="division" size="34" class="txtboxSearchuser"placeholder="division" />
            </td>
            
            <td colspan="2">Select Your Role</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">
             </td><td></td>
             <td>
              <input type="radio"  name="status" id="admin" value="admin" />Administrator</td>
          </tr>
          <tr>
            <td></td>
            <td colspan="3">
           
              </td>
              <td></td>
             <td><input type="radio"  name="status" id="user" value="user" />User</td>
          </tr>
          <tr>
            <td></td>
            <td colspan="3">
            
              </td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="61"><input type="button" name="cancel" id="cancel" value="Cancel" onClick="javascript:window.location.href='main.php?pageID=0'"  class="btnAddLocation"/></td>
            <td width="127"><input type="submit" name="add" id="add" value="Add User"class="btnAddLocation" /></td>
          </tr>
        </table> 
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