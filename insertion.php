<?php
//ouverture d'une connexion
$objetpdo= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;

if(isset($_POST['ajout']))
{

  $nom=($_POST['nom']);
  $adr=($_POST['adr']);
  $phone=($_POST['phone']);
  $prob=($_POST['prob']);

//preparation de la requet
$pdostat=$objetpdo->prepare('INSERT INTO patient 
values(NULL, :nomp, :adress, :telephone, :problem)');

//lie chaque marqueur a une valeur
$pdostat->bindvalue(':nomp',$_POST['nom'],PDO::PARAM_STR);
$pdostat->bindvalue(':adress',$_POST['adr'],PDO::PARAM_STR);
$pdostat->bindvalue(':telephone',$_POST['phone'],PDO::PARAM_INT);
$pdostat->bindvalue(':problem',$_POST['prob'],PDO::PARAM_STR);

//execution de la requete preparee
$ok=$pdostat->execute();
if($ok){
    $message = 'le patient a ete ajoute';
}
else{
    $message = 'echec';
}
}
?>
