<?php 
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$code=$_GET['code'];
$pdostat= $objetpdo->prepare("DELETE FROM patient where(id='$code') ");

 $v=$pdostat->execute();
 if ($v==true) {
    header("location:affpa.php");
}else{
echo "nn ok";
}

?>