<?php
$mat=$_GET['mat'];
require "fonction.php";

if(!empty($_POST))
{
    
    $mt=checkInput($_POST['mate']);
     $nom=checkInput($_POST['nom']);
     $serv=checkInput($_POST['ser']);
     $phone=checkInput($_POST['tel']);
     $ml=checkInput($_POST['mail']);
     $objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
     
$modif=$objetpdo->prepare ("UPDATE secretaire SET matricule='$mt',nom_secretair='$nom',
idd_ser= '$serv',telephon= '$phone',email_sec='$ml' where (matricule='$mat')" );
$v=$modif->execute();
if ($v==true) {
    	echo "<script>
    		alert('modification reussit');
 		window.location.href='affsec.php'</script>";
     	}
    	else{
    		echo"erreur";
        }
    }
    function checkInput($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
 
        return $data;
  }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>