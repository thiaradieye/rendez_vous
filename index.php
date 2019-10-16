<?php
$c=mysqli_connect("localhost","root","td1997","rendez_vous")or die(mysqli_error($c));
  if(isset($_POST['sent']))
  {
      // echo "OK";
       
 
       $login = $_POST['login'];
       $pwd = $_POST['pwd'];
       $prof = $_POST['profil'];
       if ((empty($login)or empty($pwd)or empty($prof))) {
         echo "<script>alert('veuillez renseigner tous les champs');</script>";
       }
       else{
       $req = "SELECT * FROM utilisateur WHERE login = '$login' AND password = '$pwd' AND profil = '$prof' AND profil='admin'";
       $res = mysqli_query($c,$req)or die(mysqli_error($c));
      // var_dump($res);
       if($res == false){
          echo "Erreur du serveur";
       }
       else{
            $tab = mysqli_fetch_array($res);
            if($tab['login'] == $login AND $tab['password'] == $pwd AND $tab['profil'] == $prof)
            {
              // echo "Connexion reuissi";
              header("location:ut.php");
            }
            else{
              echo "Identifiant incorrect";
            }
            $req = "SELECT * FROM utilisateur WHERE login = '$login' AND password = '$pwd' AND profil = '$prof' AND profil='secretair'";
            $res = mysqli_query($c,$req)or die(mysqli_error($c));
           // var_dump($res);
            if($res == false){
               echo "Erreur du serveur";
            }
            else{
                 $tab = mysqli_fetch_array($res);
                 if($tab['login'] == $login AND $tab['password'] == $pwd AND $tab['profil'] == $prof)
                 {
                   // echo "Connexion reuissi";
                   header("location:menus.php");
                 }
       }
       $req = "SELECT * FROM utilisateur WHERE login = '$login' AND password = '$pwd' AND profil = '$prof' AND profil='medecin'";
            $res = mysqli_query($c,$req)or die(mysqli_error($c));
           // var_dump($res);
            if($res == false){
               echo "Erreur du serveur";
            }
            else{
                 $tab = mysqli_fetch_array($res);
                 if($tab['login'] == $login AND $tab['password'] == $pwd AND $tab['profil'] == $prof)
                 {
                   // echo "Connexion reuissi";
                   header("location:med.php");
                 }
   }
  }
  }
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;

}
 

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #1E90FF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 16%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

.box{
    top: 40px;
             display: flex;
         }
         .inner{
         
             width: 600px;
             height: 150px;
             line-height: 150px;
             font-size: 6em;
             font-family: sans-serif;
             font-weight: 800;
             white-space: nowrap;
             overflow: hidden;
             box-shadow: 4px 6px rgba(0,0,0,0,5);
         }
         .inner:first-child{
             background:#1E90FF;
             width: 600px;
             color: red;
             transform-origin: right;
             transform: perspective(100px)rotateY(-15deg);
         }
         .inner:last-child{
             background: #1E90FF;
             width: 600px;
             color: #ffff;
             transform-origin: left;
             transform: perspective(100px)rotateY(15deg);
         }
         .inner span{
                position: absolute;
                animation: marquee 5s linear infinite;
         }
         .inner:first-child span{
                animation-delay: 2.5s;
                left: -100%
         }
         @keyframes marquee{
              from{
                  left: 100%;
              }
         }
</style>
</head>
<body background="img/go.jpg">
<br><br><br>
<center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">connexion</button></center>


<div id="id01" class="modal">
  
  <form class="modal-content animate"  method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/les med.jpg"  alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>login</b></label>
      <input type="text" placeholder="Enter vos email svp" name="login" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pwd" required>
      <label for="uname"><b>profil</b></label>
      <input type="text" placeholder="Enter Username" name="profil" required>
      <button type="submit" name="sent">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
