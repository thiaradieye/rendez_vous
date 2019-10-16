<?php 
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$code=$_GET['code'];
$pdostat= $objetpdo->prepare("DELETE FROM rendvous where(idr='$code') ");

 $v=$pdostat->execute();
 if ($v==true) {
    header("location:affrv.php");
}else{
echo "nn ok";
}

?>