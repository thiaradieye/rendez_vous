<?php 
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$code=$_GET['code'];
$pdostat= $objetpdo->prepare("DELETE FROM specialite where(idsp='$code') ");

 $v=$pdostat->execute();
 if ($v==true) {
    header("location:spaff.php");
}else{
echo "nn ok";
}

?>