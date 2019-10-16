<?php 
require "fonction.php";
require "fon.php";
$matm=gener_matricul();
if(!empty($_POST))
{
      

      $mt=checkInput($_POST['mate']);
      $nm=checkInput($_POST['nom']);
      $ml=checkInput($_POST['mail']);
      $ad=checkInput($_POST['adr']);
      $sp=checkInput($_POST['spec']);
      $phone=checkInput($_POST['tel']);
      $sr=checkInput($_POST['serv']);

      $db=database::connect();
      $stm=$db->prepare("INSERT INTO medecin(matricule,nom_med,email_med,adress_med,id_specialite,telephon,id_service) values(?,?,?,?,?,?,?)");
      $stm->execute(array($mt,$nm,$ml,$ad,$sp,$phone,$sr));
      $ut=$db->prepare("INSERT INTO utilisateur(nom_ut,login,password,profil) values(?,?,?,?)");
      $ut->execute(array($nm,$ml,$mt,'medecin'));

      database::deconnect();
      header("localisation:secr.php");
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
 
    <br>
</head>
<body background="img/hopital.jpg">
<?php 
$connec= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

$sec= $connec->prepare('SELECT * FROM services');
$sec->execute();

$select= $connec->prepare('SELECT * FROM specialite');
$select->execute();
?>
<center>
    <p><a href="affmed.php"><img src="img/listesec.png" width=10% align="right"/></a></p>
    <h1 style="color:red;">AJOUTE MEDECIN</h1>
<br><br>
<form action="" method="POST" align="left">
  <label>MATRICULE</label><br>
  <input type="text" name="mate" value="<?=$matm?>">
        <br>
        <label>NOM</label><br>
  <input type="text" name="nom">
        <br>
        <label>EMAIL</label><br>
  <input type="text" name="mail">
        <br>
        <label>ADRESSE</label><br>
  <input type="text" name="adr">
        <br>
        <label>SPECIALITE</label><br>
    <select name="spec">
               <option value="" selected>---Choisir le specialite---</option>
         <?php
            while ($sp= $select->fetch()) {
              ?>
                <option value="<?=$sp['idsp']?>"><?=$sp['nom_specialite']?></option>
              <?php
            }
          ?>
            </select>
            <br>
  <label>telephone</label><br>
  <input type="text" name="tel">
        <br>
        <label>SERVICE</label><br>
        <select name="serv">
               <option value="" selected>---Choisir le service---</option>
         <?php
            while ($sr= $sec->fetch()) {
              ?>
                <option value="<?=$sr['ids']?>"><?=$sr['nom_service']?></option>
              <?php
            }
          ?>
            </select>
            <br>
  <input type="submit" name="ajout" value="Enresigtrer" >
</form>


</body>
</html>