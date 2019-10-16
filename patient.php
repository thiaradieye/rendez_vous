<?php 
require "fonction.php";
if(!empty($_POST))
{
      $nom=checkInput($_POST['nom']);
      $pr=checkInput($_POST['pren']);
      $ag=checkInput($_POST['age']);
      $adre=checkInput($_POST['adr']);
      $phone=checkInput($_POST['tel']);

      $db=database::connect();
      $stm=$db->prepare("INSERT INTO patient(nomp,prenom,age,adress,telephon) values(?,?,?,?,?)");
      $stm->execute(array($nom,$pr,$ag,$adre,$phone));
      database::deconnect();
      header("localisation:pathient.php");
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
    <p><a href="affpa.php"><img src="img/listesec.png" width=5% align="right"/></a></p>
    <h1 style="color:red;">AJOUTE PATIENT</h1>

<form action="" method="POST">
  <label>Nom</label><br>
  <input type="text" name="nom">
        <br>
  <label>Prenom</label><br>
  <input type="text" name="pren">
        <br>
  <label>Age</label><br>
  <input type="text" name="age">
        <br>
  <label>Adresse</label><br>
  <input type="text" name="adr">
        <br>
        <label>telephone</label><br>
  <input type="text" name="tel">
        <br>
  <input type="submit" name="ajout" value="Enresigtrer" >
</form>


</body>
</html>