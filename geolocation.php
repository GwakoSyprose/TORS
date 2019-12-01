
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="getLocation()">



<p id="demo"></p>

<script>
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  var lat=position.coords.latitude;
  var lng=position.coords.longitude
// window.location.href='loc.php?lat='+lat+'&lng='+ lng;
  document.getElementById("iframeid").src = 'loc.php?lat='+lat+'&lng='+ lng;


  // show button function here
  document.getElementsByClassName("showButton")[0].style.display = "block";
  // show button function here


}
</script>

<iframe style="visibility:hidden;position:absolute;height:0px;" id="iframeid" src=""></iframe>

</body>
</html>