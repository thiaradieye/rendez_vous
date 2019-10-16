<?php 
class database
{
    private static $dbhost="localhost";
    private static $dbname="rendez_vous";
    private static $user="root";
    private static $password="td1997";

    private static $connexion=null;

    public static function connect()
    {
        try{
            self::$connexion = new PDO("mysql:host=".self::$dbhost.";dbname=" .self
            ::$dbname,self::$user,self::$password);
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return self::$connexion;
    }
    function deconnect()
    {
        self::$connexion=null;
    }


public static function rechmed($name)
{
    
     $db=database::connect();
        $rec=$db->prepare("SELECT * FROM medecin m,patient p,rendvous r where r.patient=p.id 
     AND r.medecin=m.id AND m.matricule='$name'") or die(mysqli_error($c));
    $s=$rec->execute();
    if ($s==true) {
        return  $s;
    }
 }

}
?>