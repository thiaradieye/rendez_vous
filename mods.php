<?php
require "fon.php";
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$sec=gener_matriculs();
$mat=$_GET['mat'];
$pdostat= $objetpdo->prepare("SELECT *FROM secretaire where matricule='$mat'");
$v=$pdostat->execute();

$par=$pdostat->fetch();

// $user= $objetpdo->prepare("SELECT *FROM utilisateur where password='$mat'");
// $r=$user->execute();

// $par=$pdostat->fetch();
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

$modifi=$objetpdo->prepare ("UPDATE utilisateur SET nom_ut='$nom',login='$ml',
password= '$mt',profil= 'secretair' where (password='$mat')" );
$v=$modifi->execute();
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
    
    <?php
include_once "menut.php";
?>   
</head>
<body background="img/hopital.jpg">
<?php 
$connec= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

$select= $connec->prepare('SELECT * FROM services');
$select->execute();
?>

<center>
    <p><a href="affsec.php"></a></p>
    <h1 style="color:red;">AJOUTE SECRETAIRE</h1>
<form action="" method="POST">
<label>Matricule</label><br>
  <input type="text" name="mate" value="<?=$sec?>">
        <br>
  <label>Nom</label><br>
  <input type="text" name="nom" value="<?=$par['nom_secretair']?>">
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
  <input type="text" name="tel" value="<?=$par['telephon']?>">
        <br>
        <label>Email</label><br>
  <input type="text" name="mail" value="<?=$par['email_sec']?>">
        <br>
  <input type="submit" name="ajout" value="Enresigtrer" >
</form>
</center>
<br>


</body>

</html>