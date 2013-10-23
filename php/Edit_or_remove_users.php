<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: ../index.php");
 }
 include "server.php";
 ?>
 <?php 
    $user= $_GET['user'];
    $user_level="";
	
   /* $user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";
	*/
//echo $user;
	
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

	    if ($db_found) {
			$SQL="select * from logins where computer_number='$user'";
			$result = mysql_query($SQL);
  			$db_field = mysql_fetch_assoc($result);
			
			$user_name=$db_field['Full_Name'];
			$occupation=$db_field['occupation'];
			$division=$db_field['Division'];
			
			$sql="select * from administrator where computer_number='$user'";
			$result1 = mysql_query($sql);
			$num_rows = mysql_num_rows($result1);
			if($result1)
			{
				if($num_rows > 0)
				{
				  $user_level="Admin";
				}
				else{
					$user_level="User";
					}
			}
			else
			{
				
			}
			
		}
		else
		{}
  mysql_close($db_handle);
 ?>
 <?php 
	if (isset($_POST["update"])) {
		 $errorMessage="";
		// $pwd=hash('sha256', $_POST['password']);
		   if( $_POST["user_full_name"]=="" || $_POST["occupation"]=="" || $_POST["division"]=="")
		  {
			  $errorMessage = "Some fields are missing.Please enter data ";
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

//echo $_POST[user_id];
//echo  $_POST[user_full_name];
//echo $_POST[occupation];
//echo  $_POST[division];


      $sql="UPDATE logins SET Full_Name='$_POST[user_full_name]', occupation='$_POST[occupation]' , Division='$_POST[division]'  WHERE computer_number='$_POST[user_id]'";
	
	  $result_update=mysql_query($sql);
	  
	   
	  
 echo "<script>";
 
        echo 'window.alert("This post was successfully updated.");';

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
<?php
	if (isset($_POST["remove"])) {
		 $errorMessage="";
		 
	/*$user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";
*/
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
    $db_found = mysql_select_db($dbname, $db_handle);

	    if ($db_found) {
			
      $sql1="DELETE FROM logins WHERE computer_number='$_POST[user_id]'";
	  $result1=mysql_query($sql1);
	  
	  if($user_level=="Admin")
	  {
		  $sql2="DELETE FROM administrator WHERE computer_number='$_POST[user_id]'";
	      $result2=mysql_query($sql2);
	  
	  }
	  else{}
	  
 echo "<script>";
 
        echo 'window.alert("This post was successfully deleted.");';

       echo' document.location.href = "Show_Users.php?pageID=0";';

echo "</script>";
	      mysql_close($db_handle);
			 
	                 }
	    else {
	     	$errorMessage = "can't find the databse ";
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
  
   include "menu.php";
	?>
   

    <div id="display_drivers">
             <form id="Edit_or_remove_users" name="Edit_or_remove_users" method="post" action="Edit_or_remove_users.php">
        <table width="799" border="0" cellspacing="5">
          <tr>
            <td colspan="6"><label for="heading">
            <font size="+2"   ><center>Remove User</center></font></label></td>
          </tr>
          <tr>
            <td width="130">Computer Number</td>
            <td colspan="3"><input name="user_id" type="text" id="user_id" size="34" onkeypress="return isNumberKey(event)" class="txtbox" value='<?php echo $user; ?>'/> </td>
            <td width="129">Extendable</td>
            <td width="223">Extendable</td>
            
            
          </tr>
          <tr>
            <td>Full Name</td>
            <td colspan="3">
            <input name="user_full_name" type="text" id="user_full_name" size="34" class="txtbox" value='<?php echo $user_name; ?>'/></td>
            <td width="129">Extendable</td>
            <td width="223">Extendable</td>
          </tr>
          <tr>
            <td>Occupation</td>
            <td colspan="3">
            <input name="occupation" type="text" id="occupation" size="34" class="txtbox" value='<?php echo $occupation; ?>'/></td>
            
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
             
             <?php
			  
			   if($user_level=="Admin"){
                 echo '<input type="radio" name="status"id="admin" value="admin" checked />Administrator</td>';
			   }
			   else
			   {
				 echo '<input type="radio" name="status"id="admin" value="admin" />Administrator</td>';
			   }
			 ?>
             </tr>
          <tr>
            <td></td>
            <td colspan="3">
           
              </td>
              <td></td>
             <td> <?php
			   if($user_level=="Admin"){
                 echo '<input type="radio" name="status"id="user" value="user"  />User</td>';
			   }
			   else
			   {
				 echo '<input type="radio" name="status"id="user" value="user" checked/>User</td>';
			   }
			 ?>   </tr>
          <tr>
            <td></td>
            <td colspan="3">
            
              </td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td width="26">&nbsp;</td>
            <td width="112"><input type="button" name="cancel" id="cancel" value="Cancel" onClick="javascript:window.location.href='Show_Users.php?pageID=0'" class="btnAddLocation" /></td>
           <td width="118"><input type="submit" name="update" id="update" value="Update Profile" class="btnAddLocation"/></td>
             <td width="129"><input type="submit" name="remove" id="remove" value="Remove" class="btnAddLocation"/></td>
            
          </tr>
        </table> 
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