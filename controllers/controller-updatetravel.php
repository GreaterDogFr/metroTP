<?php
require_once '../config.php';
require_once '../models/Utilisateur.php';
require_once '../models/Travel.php';
require_once '../models/Transport.php';

//Session
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: ./controller-signin.php");
}
var_dump($_SESSION);
$transports = Transport::getTransports();
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $errors = [];

    if ((isset($_POST['traveldate'])) && empty($_POST['traveldate'])) {
        $errors['traveldate'] = 'Entrez une date';
    } else {
        $traveldate = $_POST['traveldate'];
    }

    // TODO: Empêcher de dater le futur (quand temps dispo)

    if ((isset($_POST['traveltime'])) && empty($_POST['traveltime'])) {
        $errors['traveltime'] = 'Entrez une durée de voyage';
    } else {
        $traveltime = $_POST['traveltime'];
    }
    // TODO: Empêcher une durée de 00:00 (quand temps dispo)

    if ((isset($_POST['traveldistance'])) && empty($_POST['traveldistance'])) {
        $errors['traveldistance'] = 'Entrez une distance de voyage';
    }

    if ((isset($_POST['traveltype'])) && $_POST['traveltype']=="0" ) {
        $errors['traveltype'] = 'Sélectionnez un moyen de transport';
    }

    if (empty($errors)){
        $travelid = $_SESSION['travelupdate']['TVL_ID'];
        $traveldate = $_POST['traveldate'];
        $traveltime = $_POST['traveltime'];
        $traveldistance = $_POST['traveldistance'];
        $traveltype = $_POST['traveltype'];

        // Travel::update($travelid, $traveldate, $traveltime, $traveldistance, $traveltype);
        // header("Location: ./controller-travelhistory.php");

    }

}

include '../views/view-updatetravel.php';
?>