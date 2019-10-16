<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    table {
  margin-top: 10%;
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }
  table tr:hover {background-color: #1E90FF;}
  table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #1E90FF;
    color: white;
  }
  
  th, td {
    text-align: left;
     padding: 16px; 
  }
  
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  img{
    width: 60px;
  }
    </style>
  <?php
include_once "sec.php";
?> 
</head>
<body>
<?php

$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

$pdostat= $objetpdo->prepare('SELECT * FROM patient');

$execution = $pdostat->execute();

//recuperation d'une result a une seul fois
$patients= $pdostat->fetchall();
?>
<CEnter>
 <a href="patient.php"><img src="img/retour.jpg" width=10% align="left"/></a><h1 style="color:red;">LISTES DES PATIENTS</h1></CEnter>

<table >
    <tr>
    <th>Numero</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Age</th>
    <th>Adress</th>
    <th>Telephon</th>
    <th>MODIFIER</th>
    <th>SIPPRIMER</th>
    </tr>
     <?php foreach ($patients as $patient): ?>
     <tr>
     <td> <?= $patient['id'] ?></td>
      <td> <?= $patient['nomp'] ?></td>
      <td> <?= $patient['prenom'] ?></td>
      <td> <?= $patient['age'] ?></td>
       <td><?= $patient['adress'] ?></td>
       <td><?= $patient['telephon'] ?></td>
       <td><center><a href="modp.php?code=<?=$patient['id']?>"><img src="img/fie.jpg"></a></center></td>
       <td><a onclick="return confirm('Etes Vous Sur de Vouloir supprimer')" href="supp2p.php?code=<?php echo($patient['id']);?>"><img src="img/supp.jpg" alt="" ></a></td>       

       
       </tr>

<?php endforeach; ?>

</body>
</html>