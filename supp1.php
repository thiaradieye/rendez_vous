<?php 
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$mod=$_GET['code'];
$pdostat= $objetpdo->prepare("DELETE FROM medecin where(matricule='$mod') ");

 $v=$pdostat->execute();
 if ($v==true) {
    header("location:affmed.php");
}else{
echo "nn ok";
}
$pdostat= $objetpdo->prepare("DELETE FROM utilisateur where(password='$mod') ");

 $v=$pdostat->execute();

?>