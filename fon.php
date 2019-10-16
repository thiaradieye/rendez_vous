<?php
function gener_matricul()
{
    $c=mysqli_connect("localhost","root","td1997","rendez_vous")or die(mysqli_error($c));
    $mat="MD-0";
    $date=Date('y');
    $req=("SELECT MAX(id) AS id FROM medecin");
    $exe=mysqli_query($c,$req)or die(mysqli_error($c));
    if($exe==true)
    {
        if(mysqli_num_rows($exe)>0)
        {
            $tab=mysqli_fetch_array($exe);
            $max_id=$tab['id'];
        }
        else{
        $max_id=1;
    }
    return $mat."".$date."".($max_id+1);
}
}

function gener_matriculs()
{
    $c=mysqli_connect("localhost","root","td1997","rendez_vous")or die(mysqli_error($c));
    $mat="SR-0";
    $date=Date('y');
    $req=("SELECT MAX(id_sec) AS id_sec FROM secretaire");
    $exe=mysqli_query($c,$req)or die(mysqli_error($c));
    if($exe==true)
    {
        if(mysqli_num_rows($exe)>0)
        {
            $tab=mysqli_fetch_array($exe);
            $max_id=$tab['id_sec'];
        }
        else{
        $max_id=1;
    }
    return $mat."".$date."".($max_id+1);
}
}

function rechmed($name){
    $c=mysqli_connect("localhost","root","td1997","rendez_vous")or die(mysqli_error($c));
    $sel=("SELECT * FROM rendvous r,patient p,secretaire s,medecin m ,specialite sp
    where r.patient=p.id AND r.secretair=s.id_sec AND r.medecin=m.id  AND m.id_specialite=sp.idsp AND m.nom_med='$name'") or die(mysqli_error($c));
    $exe=mysqli_query($c,$sel) or die(mysqli_error($c));
    if ($exe==true) {
        return $exe;
    }
 }
?>