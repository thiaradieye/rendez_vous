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
    width:40%;
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
<body background="img/go.jpg">

<?php

$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

$pdostat= $objetpdo->prepare('SELECT * FROM rendvous r,patient p,secretaire s,medecin m ,specialite sp
 where r.patient=p.id AND r.secretair=s.id_sec AND r.medecin=m.id  AND m.id_specialite=sp.idsp');

$execution = $pdostat->execute();

//recuperation d'une result a une seul fois
$rv= $pdostat->fetchall();
?>
<CEnter>
 
<table >
    <tr>
    <th>Medecin</th>
    <th>Patient</th>
    <th>Detail</th>
    </tr>
     <?php foreach ($rv as $rdv): ?>
     <tr>
       <td><?= $rdv['nomp'] ?></td>
       <td><?= $rdv['nom_med'] ?></td>
       <td><button onclick="trouv()">Try it</button></td>
       </tr>

<?php endforeach; ?>
<script>
function trouv() {
  alert("Hello! <?=$rdv['nom_specialite']?> <?=$rdv['nom_med']?> vous avez un Rendez_vous avec patient <?=$rdv['nomp']?>  <?=$rdv['jour']?> Le <?= $rdv['dates'] ?> NB:DUREE DES RENDEZ_VOS C 15mn");
}
</script>

</body>
</html>