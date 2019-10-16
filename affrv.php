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
   
</head>
<body>
<?php
include_once "sec.php";
?>
<?php

$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

$pdostat= $objetpdo->prepare('SELECT * FROM rendvous r,patient p,secretaire s,medecin m ,specialite sp
 where r.patient=p.id AND r.secretair=s.id_sec AND r.medecin=m.id  AND m.id_specialite=sp.idsp');

$execution = $pdostat->execute();

//recuperation d'une result a une seul fois
$rv= $pdostat->fetchall();
?>
<CEnter>
 <a href="rv.php"><img src="img/retour.jpg" width=10% align="left"/></a><h1 style="color:red;">LISTES DES RANDEZ_VOUS</h1></CEnter>

<table >
    <tr>
    <th>numero</th>
    <th>Date</th>
    <th>Heur</th>
    <th>JOUR</th>
    <th>DUREE</th>
    <th>Patient</th>
    <th>Secretaire</th>
    <th>Medecin</th>
    <th>SPECIALITE</th>
    <th>MODIFIER</th>
    <th>SIPPRIMER</th>
    </tr>
     <?php foreach ($rv as $rdv): ?>
     <tr>
     <td> <?= $rdv['id'] ?></td>
      <td> <?= $rdv['dates'] ?></td>
       <td><?= $rdv['heurd'] ?>- <?= $rdv['heurf'] ?></td>
       <td><?= $rdv['jour'] ?></td>
       <td><?= $rdv['duree'] ?></td>
       <td><?= $rdv['nomp'] ?></td>
       <td><?= $rdv['nom_secretair'] ?></td>
       <td><?= $rdv['nom_med'] ?></td>
       <td><?= $rdv['nom_specialite'] ?></td>
       <td><center><a href="modrv.php?code=<?=$rdv['id']?>"><img src="img/fie.jpg"></a></center></td>
       <td><a onclick="return confirm('Etes Vous Sur de Vouloir supprimer')" 
       href="supp3p.php?code=<?php echo($s['matricule']);?>"><img src="img/supp.jpg" alt="" ></a></td>       

       
       </tr>

<?php endforeach; ?>
</body>
</html>