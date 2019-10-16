<?php
require "fon.php";
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$code=$_GET['code'];
$pdostat= $objetpdo->prepare("SELECT *FROM patient where id='$code'");
$v=$pdostat->execute();
$par=$pdostat->fetch();

// $user= $objetpdo->prepare("SELECT *FROM utilisateur where password='$mat'");
// $r=$user->execute();

// $par=$pdostat->fetch();
if(!empty($_POST))
{
    
    $nom=checkInput($_POST['nom']);
    $pr=checkInput($_POST['pren']);
    $ag=checkInput($_POST['age']);
    $adre=checkInput($_POST['adr']);
    $phone=checkInput($_POST['tel']);

     $objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
     
$modif=$objetpdo->prepare ("UPDATE patient SET nomp='$nom',prenom='$pr',age='$ag',
adress='$adre',telephon='$phone' where (id='$code')" );
$v=$modif->execute();
if ($v==true) {
    	echo "<script>
    		alert('modification reussit');
 		window.location.href='affpa.php'</script>";
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
    <!-- <link rel="stylesheet" href="tab.css"> -->
    <style>
    
  
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    input[type=text], select { 
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border-radius: 4px;
      box-sizing: border-box;
    border: none;
    border-bottom: 2px solid blue;
    }
    input[type=time], select {
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border-radius: 4px;
      box-sizing: border-box;
    border: none;
    border-bottom: 2px solid blue;
    }
    input[type=date], select {
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border-radius: 4px;
      box-sizing: border-box;
    border: none;
    border-bottom: 2px solid blue;
    }
    input[type=submit] {
      width: 40%;
      background-color: #1E90FF;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: rgb(52, 19, 241);;
    }
    img {
    border-radius: 50%;
    position: center;
  }
    
      </style>
    </style>
  <?php
include_once "sec.php";
?>                  
  </div>
    <br>
</head>
<body background="img/hopital.jpg" >
<center>
    <p><a href="affpa.php"></a></p>
    <h1 style="color:red;">AJOUTE PATIENT</h1>

<form action="" method="POST">
  <label>Nom</label><br>
  <input type="text" name="nom" value= <?=$par['nomp']?>>
        <br>
  <label>Prenom</label><br>
  <input type="text" name="pren" value= <?=$par['prenom']?>>
        <br>
  <label>Age</label><br>
  <input type="text" name="age" value= <?=$par['age']?>>
        <br>
  <label>Adresse</label><br>
  <input type="text" name="adr" value= <?=$par['adress']?>>
        <br>
        <label>telephone</label><br>
  <input type="text" name="tel" value= <?=$par['telephon']?>>
        <br>
  <input type="submit" name="ajout" value="Enresigtrer" >
</form>
