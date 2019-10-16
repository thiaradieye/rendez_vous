<?php 
require "fonction.php";
require "fon.php";
$sec=gener_matriculs();
if(!empty($_POST))
{
      $mt=checkInput($_POST['mate']);
      $nom=checkInput($_POST['nom']);
      $serv=checkInput($_POST['ser']);
      $phone=checkInput($_POST['tel']);
      $ml=checkInput($_POST['mail']);

      $db=database::connect();
      $stm=$db->prepare("INSERT INTO secretaire(matricule,nom_secretair,idd_ser,telephon,email_sec) values(?,?,?,?,?)");
      $stm->execute(array($mt,$nom,$serv,$phone,$ml));
      
      $ut=$db->prepare("INSERT INTO utilisateur(nom_ut,login,password,profil) values(?,?,?,?)");
      $ut->execute(array($nom,$ml,$mt,'secretair'));
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
<?php 
$connec= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

$select= $connec->prepare('SELECT * FROM services');
$select->execute();
?>

<center>
    <p><a href="affsec.php"><img src="img/listesec.png" width=30% align="right"/></a></p>
    <h1 style="color:red;">AJOUTE SECRETAIRE</h1>
<form action="" method="POST">
<label>Matricule</label><br>
  <input type="text" name="mate" value="<?=$sec?>" readonly="true" >
        <br>
  <label>Nom</label><br>
  <input type="text" name="nom">
        <br>
        <label>Service</label><br>
    <select name="ser">
               <option value="" selected>---Choisir le service---</option>
         <?php
            while ($sr= $select->fetch()) {
              ?>
                <option value="<?=$sr['ids']?>"><?=$sr['nom_service']?></option>
              <?php
            }
          ?>
            </select>
            <br>
  <label>telephone</label><br>
  <input type="text" name="tel">
        <br>
        <label>Email</label><br>
  <input type="text" name="mail">
        <br>
  <input type="submit" name="ajout" value="Enresigtrer" >
</form>
</center>
<br>


</body>
</html>