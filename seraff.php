<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
    <style>
    table {
  margin-top: 10%;
    border-collapse: collapse;
    border-spacing: 0;
    width: 50%;
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
include_once "menut.php";
?>          
</head>
<body>
<?php

$connec= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

$select= $connec->prepare('SELECT * FROM services');

$exe = $select->execute();

//recuperation d'une result a une seul fois
$sers= $select->fetchall();
?>
<CEnter><a href="ser.php"><img src="img/retour.jpg" width=10% align="left"/></a><h1 style="color:red;">LISTES DES SERVICES</h1>
<table >
    <tr>
    <th>numero</th>
    <th>nom</th>
    <th>MODIFIER</th>
    <th>SIPPRIMER</th>
    </tr>
     <?php foreach ($sers as $patient): ?>
     <tr>
     <td> <?= $patient['ids'] ?></td>
      <td> <?= $patient['nom_service'] ?></td>
      <td><center><a href="modser.php?mat=<?=$patient['ids']?>"><img src="img/fie.jpg"></a></center></td>
       <td><a onclick="return confirm('Etes Vous Sur de Vouloir supprimer')"
        href="supp4s.php?code=<?php echo($patient['ids']);?>"><img src="img/supp.jpg" alt="" ></a></td>       

       </tr>

<?php endforeach; ?>
</table>
</CEnter>
</body>
</html>