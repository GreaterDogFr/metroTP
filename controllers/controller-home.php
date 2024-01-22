<?php
require_once '../config.php';
require_once '../models/Utilisateur.php';
//Récupération de la date, en français pour les jours de la semaine
$todaysdate = new DateTime('now', new DateTimeZone('Europe/Paris'));
$formatteddate = 
    IntlDateFormatter::formatObject( 
    $todaysdate, 
    'eeee d MMMM y', 
    'fr' 
    );
session_start();


include '../views/view-home.php';
?>