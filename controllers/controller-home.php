<?php
require_once '../config.php';
require_once '../models/Utilisateur.php';
//Récupération de la date, en français pour les jours de la semaine
$todaysdate = new DateTime('now', new DateTimeZone('Europe/Paris'));
$formatteddate = 
    IntlDateFormatter::formatObject( $todaysdate, 'eeee d MMMM y', 'fr' );

//Session
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: ./controller-signin.php");
}

//Si boutton disconnect
if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: ./controller-signin.php");
}

include '../views/view-home.php';
?>