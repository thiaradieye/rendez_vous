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
include_once "menut.php";
?> 
</head>
<body>
<?php

$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

$pdostat= $objetpdo->prepare('SELECT * FROM medecin m,specialite s,services ser where  m.id_specialite=s.idsp AND m.id_service=ser.ids');

 $pdostat->execute();


?><CEnter>
<a href="mede.php"><img src="img/retour.jpg" width=10% align="left"/></a><h1 style="color:red;">LISTES DES MEDECINS</h1></CEnter>

<table >
    <tr>
    <th>Numero</th>
    <th>MATRICULE</th>
    <th>NOM</th>
    <th>EMAIL</th>
    <th>ADRESS</th>
    <th>SPECIALITE</th>
    <th>TELEPHONE</th>
    <th>SERVICE</th>
    <th>MODIFIER</th>
    <th>SIPPRIMER</th>
    </tr>
     <?php foreach ($pdostat as $s): ?>
     <tr>
     <td> <?= $s['id'] ?></td>
      <td> <?= $s['matricule'] ?></td>
      <td> <?= $s['nom_med'] ?></td>
       <td><?= $s['email_med'] ?></td>
       <td><?= $s['adress_med'] ?></td>
       <td><?= $s['nom_specialite'] ?></td>
       <td><?= $s['telephon'] ?></td>
       <td><?= $s['nom_service'] ?></td>
       <td><center><a href="modmed.php?mat=<?=$s['matricule']?>"><img src="img/fie.jpg"></a></center></td>
       <td><a onclick="return confirm('Etes Vous Sur de Vouloir supprimer')" href="supp1.php?mod=<?php echo($s['matricule']);?>"><img src="img/supp.jpg" alt="" ></a></td>       

       
       </tr>

<?php endforeach; ?>

</body>
</html>