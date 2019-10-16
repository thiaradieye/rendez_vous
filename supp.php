<?php 
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$code=$_GET['code'];
$pdostat= $objetpdo->prepare("DELETE FROM secretaire where(matricule='$code') ");

 $v=$pdostat->execute();
 if ($v==true) {
    header("location:affsec.php");
}else{
echo "nn ok";
}
$pdostat= $objetpdo->prepare("DELETE FROM utilisateur where(password='$code') ");

 $v=$pdostat->execute();

?>