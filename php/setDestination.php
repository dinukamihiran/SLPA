<!DOCTYPE html>
<html
     lang="en-US">
<!------------------------ Html Document definitions and page setups ------------------------>
<head>

<<<<<<< HEAD
<link rel="stylesheet" href="../css/css_map/jquery-ui.css" />
=======
<link rel="stylesheet" href="../js1/jquery-ui.css" />
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
<title>Welcome to SLPA Vehicle Tracking System</title>
<meta name="keywords"
     content="srilanka port authority, SLPA,UOM,FIT,vehicle tracking system" />
<!-- SEO meta contents keywords -->
<meta name="author"
     content="University Of Moratuwa Faculty Of Information Technology" />
     
<meta name="description"
     content="Vehicle Tracking System for Srilanka Port Authority" />
<meta charset="UTF-8" />
<!------------------------ End ------------------------>
<link href="../css/main_page_style.css" type="text/css" rel="stylesheet" />

<!-- CSS style sheet for Leaflet API from online CDN -->

<<<<<<< HEAD
<link rel="stylesheet" href="../css/css_map/leaflet.css" />
=======
<link rel="stylesheet" href="../js1/leaflet.css" />
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b

<!------------------------------------------------ End ------------------------------------------------>

<!-------------------------- JavaScript file for Leaflet API from online CDN -------------------------->

<<<<<<< HEAD
<script src="../js/js_map/leaflet.js"></script>
=======
<script src="../js1/leaflet.js"></script>
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b

<!------------------------------------------------ End ------------------------------------------------>

<!-------------------------- Javascript JQuery 1.8.3 API for animations and AJAX -------------------------->

<<<<<<< HEAD
<script src="../js/js_map/jquery-1.8.3.js"></script>

<script src="../js/js_map/jquery-ui-1.9.2.js"></script>
=======
<script src="../js1/jquery-1.8.3.js"></script>

<script src="../js1/jquery-ui-1.9.2.js"></script>
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b

<!------------------------------------------------ End ------------------------------------------------>
<script type="text/javascript">
function createMap(){
     var map = L.map('destinationMap').setView([7.05826, 79.93961], 13);
	 <!--13=zoom level"-->



     var myMapToSetDestination = L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
         attribution: 'SysCall',
         maxZoom: 18
     }).addTo(map);

     map.on("click",getCoordinates);


}
$(document).ready(function (){

createMap();

});

function getCoordinates(passedObject){
    
   var latitude = passedObject.latlng.lat;
   var longitude = passedObject.latlng.lng;
   showUser(latitude);
   showUser1(longitude);
   alert("Latitude = "+latitude+"\n Longitude = "+longitude);
}
function showUser(str)
{
var xmlhttp;
if (str=="")
  {
  document.getElementById("lati").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("lati").innerHTML=xmlhttp.responseText;
    }
  }
<<<<<<< HEAD
xmlhttp.open("GET","get_from_ajax.php?q="+str,true);
=======
xmlhttp.open("GET","set.php?q="+str,true);
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
xmlhttp.send();
}
function showUser1(str1)
{
var xmlhttp;
if (str1=="")
  {
  document.getElementById("lon").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("lon").innerHTML=xmlhttp.responseText;
    }
  }
<<<<<<< HEAD
xmlhttp.open("GET","get_from_ajax.php?p="+str1,true);
=======
xmlhttp.open("GET","set.php?p="+str1,true);
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
xmlhttp.send();
}



</script>
</head>
<body>

<div id="destinationMap" style="width: 750px;height: 400px">

</div>
<<<<<<< HEAD
<div> 
=======
<div>
<font color="#FFFFFF">
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
<table width="605" border="0" cols="4" rows="1">
<tr><td width="88" height="32">Latitude :</td><td width="142"><div id="lati"></div></td>
<td width="84">Longitude :</td><td width="167"><div id="lon"></div></td></tr>
<tr>
  <td>Town Name </td>
  <td>
  
  <input type="text" name="tname" id="town" class="txtboxSearchuser">
  </td>
  <td>&nbsp;</td>
  <td>
 <div id="target">
<input type="button" name="submit" value="Add Location" class="btnAddLocation" >
</div>
  </td>
</tr>

<<<<<<< HEAD
</table> 
=======
</table></font>
>>>>>>> 196240c3772e4e56f44b2fcb59e1d0ff11f1660b
</div>

<script>
$("#target").click(function() {
	if(document.getElementById("town").value==""){
		 alert("Please enter town name");
	}
	else{
	window.location = "addDestination.php?lat="+document.getElementById("lati").innerHTML+"&lon="+document.getElementById("lon").innerHTML+"&town="+document.getElementById("town").value;
	}
});
</script>
</body>

</html>

