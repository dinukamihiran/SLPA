
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Information System</title>
<meta name="keywords" content="singular theme, free template, web design, clean, simple, professional, CSS, HTML" />
<meta name="description" content="Singular Theme, free CSS template from templatemo.com" />

<link href="css/main_style.css" type="text/css" rel="stylesheet" />

<link href="css/login_page_style.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.10.1.min.js"></script>
 <script src="js/jquery-1.3.2.min.js"></script>
 <script src="js/jquery-ui-1.7.2.custom.min.js"></script>

<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			//var ajaxDisplay = document.getElementById('ajaxDiv');
			//ajaxDisplay.innerHTML = ajaxRequest.responseText;
			//document.myForm.time.value = ajaxRequest.responseText;
			if(ajaxRequest.responseText=="")
			{
				alert("Wrong");
				document.getElementById("uname").style.borderColor="red";
		        document.getElementById("uname").style.boxShadow = "10px 10px 1.2em red";
				document.getElementById("uname").style.boxShadow = "10px 10px 1.2em red";
                $("#uname").effect( "shake", 500);
				document.getElementById("pword").style.borderColor="red";
		        document.getElementById("pword").style.boxShadow = "10px 10px 1.2em red";
				document.getElementById("pword").style.boxShadow = "10px 10px 1.2em red";
                $("#pword").effect( "shake", 500);
			}
			else if(ajaxRequest.responseText=="Admin")
			{
				alert("Admin");
                $('#panel').slideUp('slow', function(){});
				window.open("php/main.php?pageID=0","_self")
				
			}
			else if(ajaxRequest.responseText=="User")
			{
				alert("User");
                $('#panel').slideUp('slow', function(){});
				window.open("php/main.php?pageID=0","_self")
				
			}
			else
			{
				alert("Wrongs"+ajaxRequest.responseText);
				document.getElementById("uname").style.borderColor="red";
		        document.getElementById("uname").style.boxShadow = "10px 10px 1.2em red";
				document.getElementById("uname").style.boxShadow = "10px 10px 1.2em red";
                $("#uname").effect( "shake", 500);
				document.getElementById("pword").style.borderColor="red";
		        document.getElementById("pword").style.boxShadow = "10px 10px 1.2em red";
				document.getElementById("pword").style.boxShadow = "10px 10px 1.2em red";
                $("#pword").effect( "shake", 500);
			}
		}
	}
	var uname = document.getElementById('uname').value;
	var pword = document.getElementById('pword').value;
	//var sex = document.getElementById('sex').value;
	var queryString = "?uname=" + uname + "&pword=" + pword;
	ajaxRequest.open("GET", "login.php" + queryString, true);
	ajaxRequest.send(null); 
}

//-->

 $(window).ready(function() {
  //$('#panel').slideUp("slow");
  $('#panel').slideDown('slow', function() {
// Animation complete.
});});
	
/*

function onchangeContent(){
	//document.getElementById("btn").style.background='#000000';
	document.getElementById("btn").value='Dinuka';
}
*/
</script>

</head> 
<body> 
<div id="slpa_header_wrapper">
	<div id="slpa_header">
    	<div >
          <p><img src="images/logo.png" width="167" height="115" alt="vehicle image" /></p>
          <p>Port Authority Colombo ,Sri Lanka</p>
      </div>
      <p>This software is responsible for keeping records about the drivers , who went outside of port.And also this will keep the track on job given time and the destination that vehicle went.</p>
    </div>
</div>
<div id="slpa_main_wrapper">
  <div id="slpa_main">
    <p class="p_login_head">Login</p>
          
         <div id="p_login" > By login to the system you can view the driver details, edit driver details <br/>and manage user profiles.The description of the software is mentioned <br/>inside the system</div>
	    
    <div id="panel">

<form name='myForm'><center>
<table width="381" border="0">
  <tr>
    <td height="39" colspan="2" ><font size="+1" color="#0099FF"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Sign In</b></font></td>
    </tr>
  <tr>
  <td width="112" height="56"><font face="Georgia, Times New Roman, Times, serif" size="+1" color="#FFFFFF">&nbsp;Username</font></td>
   <div class="target">
    <td width="259">&nbsp;<input id="uname" name="username" type="text" class="txt"  size="30" maxlength="30" placeholder="Username"/></td></div>
  </tr>
  <tr>
    <td height="48"><font face="Georgia, Times New Roman, Times, serif" size="+1" color="#FFFFFF">&nbsp;Password</font></td>
    <td>&nbsp;<input id="pword" name="password" type="password" class="txt" size="30" maxlength="30" placeholder="Password" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;
     <center><input id="btn" name="submit" type="button" class="btn"  value="Sign In" onclick='ajaxFunction()'/> </center> </td>
  </tr>
</table></center>
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