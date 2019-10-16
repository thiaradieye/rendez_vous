<?php 
require "fonction.php";
if(!empty($_POST))
{
      $dat=checkInput($_POST['dat']);
      $heur=checkInput($_POST['heur']);
      $heurf=checkInput($_POST['heurf']);
      $jr=checkInput($_POST['jour']);
      $dr=checkInput($_POST['dure']);
      $pate=checkInput($_POST['pat']);
      $secr=checkInput($_POST['sec']);
      $mede=checkInput($_POST['med']);

      $db=database::connect();
      $stm=$db->prepare("INSERT INTO rendvous(dates,heurd,heurf,jour,duree,patient,secretair,medecin) values(?,?,?,?,?,?,?,?)");
      $stm->execute(array($dat,$heur,$heurf,$jr,$dr,$pate,$secr,$mede));
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
    
    <div>
    <style>
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
</head>
<body background="img/hopital.jpg">
<?php
include_once "sec.php";
?>
<?php
$db= $objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$stat= $db->prepare('SELECT * FROM patient');
$stat->execute();

$statu= $db->prepare('SELECT * FROM secretaire sec,services s where sec.idd_ser=s.ids');
$statu->execute();

$stats= $db->prepare('SELECT * FROM medecin m,specialite s,services ser where  m.id_specialite=s.idsp AND m.id_service=ser.ids');
$stats->execute();
?>
<center>
    <p><a href="affrv.php"><img src="img/listesec.png" width=5% align="right"/></a></p>
    <h1 style="color:red;">AJOUTE randez_vous</h1>

<form action="" method="POST">
  <label>Date</label><br>
  <input type="date" name="dat">
        <br>
  <label>Heur Debut</label><br>
  <input type="heur" name="heur">
        <br>
        <label>Heur Fin</label><br>
  <input type="heur" name="heurf">
        <br>
        <label>Jour</label><br>
  <input type="heur" name="jour">
        <br>
        <label>Duree</label><br>
  <input type="heur" name="dure">
        <br>
        <label>Patient</label><br>
    <select name="pat">
               <option value="" selected>---Choisir le patient---</option>
         <?php
            while ($patient= $stat->fetch()) {
              ?>
                <option value="<?=$patient['id']?>"><?=$patient['nomp']?></option>
              <?php
            }
          ?>
            </select>
            <br>
            <label>Secretair</label><br>
    <select name="sec">
               <option value="" selected>---Choisir le Secretair---</option>
         <?php
            while ($secretair= $statu->fetch()) {
              ?>
                <option value="<?=$secretair['id_sec']?>"><?=$secretair['nom_secretair']?></option>
              <?php
            }
          ?>
            </select>
            <br>
            <label>Medecin</label><br>
    <select name="med">
               <option value="" selected>---Choisir le Soldat---</option>
         <?php
            while ($medecin= $stats->fetch()) {
              ?>
                <option value="<?=$medecin['id']?>"><?=$medecin['nom_med']?></option>
              <?php
            }
          ?>
            </select>
            <br>
  <input type="submit" name="ajout" value="Enresigtrer" >
</form>
</body>
</html>