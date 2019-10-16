<?php
require "fon.php";
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$matm=gener_matricul();
$mat=$_GET['mat'];
$pdostat= $objetpdo->prepare("SELECT *FROM medecin where matricule='$mat'");
$v=$pdostat->execute();

$par=$pdostat->fetch();

// $user= $objetpdo->prepare("SELECT *FROM utilisateur where password='$mat'");
// $r=$user->execute();

// $par=$pdostat->fetch();
if(!empty($_POST))
{
    
    $mt=checkInput($_POST['mate']);
    $nm=checkInput($_POST['nom']);
    $ml=checkInput($_POST['mail']);
    $ad=checkInput($_POST['adr']);
    $sp=checkInput($_POST['spec']);
    $phone=checkInput($_POST['tel']);
    $sr=checkInput($_POST['serv']);
     $objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
     
$modif=$objetpdo->prepare ("UPDATE medecin SET matricule='$mt',nom_med='$mn',
email_med= '$ml',adress_med= '$ad',id_specialite='$sp',
telephon='$phone',id_service='$sp' where (matricule='$mat')" );
$v=$modif->execute();

$modifi=$objetpdo->prepare ("UPDATE utilisateur SET nom_ut='$mn',login='$ml',
password= '$mt',profil= 'medecin' where (password='$mat')" );
$v=$modifi->execute();
if ($v==true) {
    	echo "<script>
    		alert('modification reussit');
 		window.location.href='affmed.php'</script>";
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
    <p><a href="affmed.php"></a></p>
    <h1 style="color:red;">AJOUTE MEDECIN</h1>
<br><br>
<form action="" method="POST" align="left">
  <label>MATRICULE</label><br>
  <input type="text" name="mate" value="<?=$matm?>">
        <br>
        <label>NOM</label><br>
  <input type="text" name="nom" value=<?= $par['nom_med'] ?>>
        <br>
        <label>EMAIL</label><br>
  <input type="text" name="mail" value=<?= $par['email_med'] ?>>
        <br>
        <label>ADRESSE</label><br>
  <input type="text" name="adr" value=<?= $par['adress_med'] ?>>
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
  <input type="text" name="tel" value=<?= $par['telephon'] ?>>
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