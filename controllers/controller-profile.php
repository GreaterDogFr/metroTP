<?php
require_once '../config.php';
require_once '../models/Utilisateur.php';
//On récupère la session
session_start();
var_dump($_SESSION);
if(!isset($_SESSION['user']))
{
    header("Location: ./controller-signin.php");
}

include '../views/view-profile.php';
?>