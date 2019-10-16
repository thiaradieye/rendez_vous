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
    width: 30%;
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

$select= $connec->prepare('SELECT * FROM specialite');

$exe = $select->execute();

//recuperation d'une result a une seul fois
$sers= $select->fetchall();
?><CEnter>
<a href="sp.php"><img src="img/retour.jpg" width=10% align="left"/></a><h1 style="color:red;">LISTES DES SPECIALITES</h1>
<table >
    <tr>
    <th>numero</th>
    <th>nom</th>
    <th>MODIFIER</th>
    <th>SIPPRIMER</th>
    </tr>
     <?php foreach ($sers as $patient): ?>
     <tr>
     <td> <?= $patient['idsp'] ?></td>
      <td> <?= $patient['nom_specialite'] ?></td>
      <td><center><a href="modsp.php?mat=<?=$patient['idsp']?>"><img src="img/fie.jpg"></a></center></td>
       <td><a onclick="return confirm('Etes Vous Sur de Vouloir supprimer')"
        href="suppsp.php?code=<?php echo($patient['idsp']);?>"><img src="img/supp.jpg" alt="" ></a></td>
       </tr>

<?php endforeach; ?>
</table>
</CEnter>
</body>
</html>