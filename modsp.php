<?php
require "fon.php";
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
$mat=$_GET['mat'];
$pdostat= $objetpdo->prepare("SELECT *FROM specialite where idsp='$mat'");
$v=$pdostat->execute();
$par=$pdostat->fetch();
if(!empty($_POST))
{
    
    $nom=checkInput($_POST['noms']);
     $objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
     
$modif=$objetpdo->prepare ("UPDATE specialite SET nom_specialite='$nom' where (idsp='$mat')" );
$v=$modif->execute();
if ($v==true) {
    	echo "<script>
    		alert('modification reussit');
 		window.location.href='seraff.php'</script>";
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
    </div>
      <br>
  </head>
  <body background="img/hopital.jpg">
  <center>
      <p><a href="spaff.php"></a></p>
      <h1 style="color:red;">MODIFICATION</h1>
  <form action="" method="POST">
    <label>Nom</label><br>
    <input type="text" name="noms" value=<?= $par['nom_specialite'] ?>>
          <br>
    <input type="submit" name="ajout" value="Enresigtrer" >
  </form>
  </CENTER>
  </body>
  </html>