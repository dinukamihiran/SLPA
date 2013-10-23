<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: ../index.php");
 }
 include "server.php";
 ?>
 <?php 
 	if(!isset($_POST['update']) ) {
	 if(!isset($_POST['delete']) ){
  //$driver_id=$_SESSION['driver'];// get driver id from main page
  $vehicle_id=$_GET['vehicle'];
   /*$user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";
	*/
echo $driver_id;


	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

	    if ($db_found) {
			$SQL="select * from job where vehicle_number= '$vehicle_id'";
			$result = mysql_query($SQL);
  			$db_field = mysql_fetch_assoc($result);
			
			$driver_name=$db_field['Driver_Name'];
			$driver_id=$db_field['driver_id'];
			$vehicle_type=$db_field['vehicle_type'];
			$division=$db_field['division'];
			$time_of_departure=$db_field['time_of_departure'];
			$department=$db_field['department'];
			$date=$db_field['date'];
			$vehicle_owner=$db_field['vehicle_owner'];
			//$destination=$db_field['Destination'];
			$owner_occupation=$db_field['owner_occupation'];
			$reason_for_departure=$db_field['reason_for_departure'];
			
			 $query = "SELECT townname FROM destination_coordinates WHERE id =".$db_field['Destination'] ;
	          $result2 = mysql_query($query);
	           while( $db_field1 = mysql_fetch_assoc($result2) )
			{
			  $destination = $db_field1[townname];	
			} 
		}
		else
		{}
		 //mysql_close($db_handle);
	 }
	 }
 ?>
 <?php



	if (isset($_POST["update"])) {
		 $errorMessage="";
		  if($_POST["driver_id"]=="" || $_POST["driver_name"]=="" || $_POST["vehicle_no"]=="")
		  {
			  $errorMessage = "Enter data ";
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

 $current_time = date('H:i:s');
	 	
     $sql="UPDATE job SET  Driver_Name='$_POST[driver_name]' , driver_id='$_POST[driver_id]', vehicle_type='$_POST[vehicle_type]' , division='$_POST[occupation]' ,time_of_departure='$current_time', department='$_POST[department]' , date='$_POST[datepicker]' , vehicle_owner='$_POST[owner_of_vehicle]', Destination='$_POST[demo_input]' , owner_occupation='$_POST[owner_occupation]' ,reason_for_departure='$_POST[reason_for_departure]' WHERE vehicle_number='$_POST[vehicle_no]'";
	 
	  $result=mysql_query($sql);
	  
 echo "<script>";
         echo 'window.alert("Details are successfully updated.");';

       echo' document.location.href = "main.php?pageID=0";';

echo "</script>";
	      mysql_close($db_handle);
			 
	                 }

	    else {
	     	$errorMessage = "can't find the databse ";
	         }
	    
		
		}
	 }
	
	

	if (isset($_POST["delete"])) {
		 $errorMessage="";
	/*	  
	$user_name = "root";
	$pass_word = "";
	$database = "job_information";
	$server = "localhost";
*/
	$db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
$db_found = mysql_select_db($dbname, $db_handle);

	    if ($db_found) {


		
     $sql111="DELETE FROM job WHERE vehicle_number='$_POST[vehicle_no]'";
	
     $result=mysql_query($sql111);
	  
 echo "<script>";
         echo 'window.alert("Details are successfully deleted.");';

       echo' document.location.href = "main.php?pageID=0";';

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

 

<script type="text/javascript" src="../js/src/jquery.min.js"></script>
    <script type="text/javascript" src="../js/src/jquery.tokeninput.js"></script>
    
     
     <script type="text/javascript">
	    $(document).ready(function() {
            $("#demo_input").tokenInput("get_suggestions.php", { 
			    preventDuplicates: true,
                tokenLimit: 1,
			    prePopulate: [
                    {  name: "<?php echo ($destination); ?>"}
                    
                ]
            });
        });
        </script>
       
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

    <link rel="stylesheet" href="../css/styles/token-input.css" type="text/css" />
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

    <div id="display_drivers">
     
     <form id="Edit_vehicle_Details" name="Edit_vehicle_Details" method="post" action="Edit_vehicle_Details.php">
         <table width="799" border="0" cellspacing="5">
          <tr>
            <td colspan="6"><label for="driver_id">
            <font size="+2"   ><center>Edit Vehicle details</center> </label></td>
          </tr>
          <tr>
            <td width="105"> Driver Id </td>
            <td width="269" colspan="3"><input name="driver_id" type="text" id="driver_id" size="34"   class="txtbox"  value= '<?php echo $driver_id; ?>' onkeypress="return isNumberKey(event)"/> </td>
            <td width="147">Vehicle Number </td>
            <td width="225"><input name="vehicle_no" type="text" id="vehicle_no" size="34" class="txtbox" readonly="readonly" value= '<?php echo $vehicle_id; ?>'/></td>
            
            
          </tr>
          <tr>
            <td>Driver Name</td>
            <td colspan="3">
            <input name="driver_name" type="text" id="driver_name" size="34" class="txtbox" value= '<?php echo $driver_name; ?>'/></td>
            <td width="147"> Vehicle Type </td>
            <td width="225"><input name="vehicle_type" type="text" id="vehicle_type" size="34" class="txtbox" value= '<?php echo $vehicle_type; ?>'/></td>
          </tr>
           <tr><td> </td></tr>
          <tr>
            <td> Division </td>
            <td colspan="3">
            <input name="occupation" type="text" id="occupation" size="34" class="txtbox" value= '<?php echo $division; ?>'/></td>
            
                        <td >Time of departure</td>
            <td><input name="time_of_departure" type="text" id="time_of_departure" size="34" class="txtbox" readonly="readonly" value= '<?php echo $time_of_departure; ?>'/></td>

            
          </tr>
         
          <tr>
            <td> Department </td>
            <td colspan="3">
            <input name="department" type="text" id="department" size="34" class="txtbox" value= '<?php echo $department; ?>'/></td>
            <td>Date</td>
              <td><input name="datepicker" type="text" id="datepicker" size="30" class="txtbox" value= '<?php  echo $date; ?>' /></td>
          </tr>
           <tr><td> </td></tr>
          <tr>
            
             
          </tr>
          <tr>
            <td> Vehicle's owner </td>
            <td colspan="3"><input name="owner_of_vehicle" type="text" id="owner_of_vehicle" size="34" class="txtbox" value= '<?php echo $vehicle_owner; ?>'/></td>
              
             <td>Destination</td>
             <td><input type="text" id="demo_input" name="demo_input" name="Destination"   />
             </td>
          </tr>
          <tr >
            <td>Owner's  occupation </td>
            <td colspan="3"><textarea style="resize:none" name="owner_occupation" cols="26" rows="3" class="txtbox" id="owner_occupation" ><?php echo $owner_occupation;?></textarea></td>
            <td >Reason for departure</td>
            <td><textarea name="reason_for_departure" style="resize:none" cols="26" rows="3" class="txtbox" id="reason_for_departure"><?php echo $reason_for_departure; ?></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" name="cancel" id="cancel" value="Cancel" onclick="javascript:window.location.href='main.php?pageID=0'"  class="btnAddLocation"/></td>
            <td><input type="submit" name="update" id="update" value="Update Details" class="btnAddLocation" /></td>
             <td>
             <?php if(isset($_SESSION['status']) AND $_SESSION['status']=="Admin") {
			  echo '<input type="submit" name="delete" id="delete" value="Remove Vehicle" class="btnAddLocation"/>';
			 }?>
                 </td>
            
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