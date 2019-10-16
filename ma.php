

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Menu CSS3 - webdesignweb.fr</title>
 
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
 
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<style>
@charset "UTF-8";
/* CSS Document */
 
body {
    margin: 0;
    padding: 0;
    font-family:'Abel', arial, serif; 
    text-transform: uppercase;
    background:#313131 url(../img/fond-menu.png) no-repeat top center;
}
 
#conteneur-menu2 {
    height: 150px;
    width: 220px;
    padding-top: 50px;
    margin: 290px auto 0px auto;
}
 
#conteneur-menu2 ul {
    padding: 0;
    margin: 0;
    margin-left: 50px;
    float: left;
}
 
#conteneur-menu2 ul li {
    list-style: none;
    padding: 0px;
}
 
#conteneur-menu2 ul li a {
    text-decoration: none;
    font-size: 25px;
    padding: 4px;
    display: block;
    color: white;
    background: transparent;
    width: 230px;
    -moz-transition: all .5s; 
    -webkit-transition: all .5s; 
    -o-transition: all .5s; 
    transition: all .5s;
    line-height: 20px;
}
 
 
#conteneur-menu2 ul li a:hover {
    background: #54B6A8;
    padding-left: 20px;
    width: 130px;
    -moz-transition: all .5s; 
    -webkit-transition: all .5s; 
    -o-transition: all .5s; 
    transition: all .5s;
}
</style>
</head>
 
<body>
 
    <div id="conteneur-menu2">
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">A propos</a></li>
            <li><a href="#">Projets</a></li>
            <li><a href="#">Parcours</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
         
    </div>
     
</body>
</html>