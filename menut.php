<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.mobile-container {
  max-width: 5000px;
  margin: auto;
  background-color: #1E90FF;
  /* height: 500px; */
  color: white;
  border-radius: 10px;
}

.topnav {
  overflow: hidden;
  background-color: red;
  position: relative;
}

.topnav #myLinks {
  display: none;
}

.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

.topnav a.icon {
  background: red;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}

.topnav a:hover {
  background-color: #1E90FF;
  color: white;
}

.active {
  background-color: #1E90FF;
  color: white;
}
</style>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container">

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="#home" class="active">ADMINISTRATEUR</a>
  <div id="myLinks">
    <a href="secr.php">SECRETAIRS</a>
    <a href="ser.php">SERVICES</a>
    <a href="sp.php">SPECIALITES</a>
    <a href="mede.php">MEDECINS</a>
    <a href="index.php">DECONNEXION</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<!-- <div style="padding-left:16px">
  <h3>Vertical Mobile Navbar</h3>
  <p>This example demonstrates how a navigation menu on a mobile/smart phone could look like.</p>
  <p>Click on the hamburger menu (three bars) in the top right corner, to toggle the menu.</p>
</div>

<!-- End smartphone / tablet look -->
</div> 

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

</body>
</html>
