<?php
class medecin
{

public $idm;
public $nomed;
public $idsp;
public $tel;
public $numlic;
public $idser;

function costruct($id,$nom_med,$id_specialite,$telephone,$num_licence,$id_service)
{

$this->idm=$id;
$this->nomed=$nom_med;
$this->idsp=$id_specialite;
$this->tel=$telephone;
$this->numlic=$num_licence;
$this->idser=$id_service;
}
 public function seconnecter(){
   $this->bdd= new PDO('mysql:host=localhost;dbname=rendez_vous','root','td1997') ;
  }

public function addmedecin(){
    $ins=$this->bdd->req("INSERT INTO medecin(id,nom_med,id_specialite,telephone,num_licence,id_service)
    value(:id,:nom_med,:id_specialite,:telephone,:num_licence,:id_service");
    $ins->execute(':id'=>$this->idm, ':nom_med'=>$this->nomed, ':idsp'=>$this->id_speialite, 
    ':telephone'=>$this->tel, ':num_licence'=>$this->numlic, ':id_service'=>$this->idser);
}
    
    // if(empty($this->cin)||empty($this->nom)||empty($this->prenom)||empty($this->adresse)||empty($this->adressemail)||empty($this->sexe))
    // echo "certains champs sont vide !!! voulez les remplir !!! <a href='inscription.html'>retour</a>";
    
    // $query="INSERT INTO`personne`(`cin`, `nom`, `prenom`, `adressemail`, `adresse`, `ville`, `cp`, `sexe`) VALUES ('".$this->nom."','".$this->prenom."','".$this->adresse."','".$this->adressemail."','".$this->sexe."','".$this->ville."','".$this->cp."')";
    
    // $result=mysql_query($query);
    
    // if ($result){
    
    // echo "inscription avec succes</h3>";}
    
    // else
    // echo "<h3>Echec</h3>";
    
    // }
    
}