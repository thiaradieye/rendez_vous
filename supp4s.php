<?php 
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$code=$_GET['code'];
$pdostat= $objetpdo->prepare("DELETE FROM services where(ids='$code') ");

 $v=$pdostat->execute();
 if ($v==true) {
    header("location:seraff.php");
}else{
echo "nn ok";
}

?>