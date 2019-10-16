<?php 
require "fonction.php";
if(!empty($_POST))
{
      $nom=checkInput($_POST['noms']);
      

      $db=database::connect();
      $stm=$db->prepare("INSERT INTO specialite(nom_specialite) values(?)");
      $stm->execute(array($nom));
      database::deconnect();
      header("localisation:sp.php");
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
    
    <div>
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
  <?php
include_once "menut.php";
?>                  
  </div>
    <br>
</head>
<body background="img/hopital.jpg">
<center>
    <p><a href="spaff.php"><img src="img/listesec.png" width=30% align="right"/></a></p>
    <h1 style="color:red;">AJOUTE SPECIALITE</h1>
<form action="" method="POST">
  <label>Nom</label><br>
  <input type="text" name="noms">
        <br>
  <input type="submit" name="ajout" value="Enresigtrer" >
</form>
</CENTER>
</body>
</html>