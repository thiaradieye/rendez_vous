<?php
session_start();

session_unset();

session_destroy();
header("localisation:index.php")
?>