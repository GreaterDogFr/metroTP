<?php
require_once '../config.php';
require_once '../models/Utilisateur.php';
require_once('../models/Entreprise.php');

//On récupère la session
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: ./controller-signin.php");
}
// $nonumberpatern = "/[a-zA-ZÀ-ÿ\-]+$/";
$paternSpecChar = '/[\'\/^£$%&*()}{@#~?><>,|=_+¬-]/';

//On récupère les noms d'entreprises
$entreprises = Entreprise::getInfos();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errors =  [];

    if (isset($_POST['firstname'])) {
        if (preg_match($paternSpecChar, $_POST['firstname'])) {
            $errors['firstname'] = 'Pas de charactère spéciaux';
        } else if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'Entrez votre nom';
        }
    }

    if (isset($_POST['lastname'])) {
        if (preg_match($paternSpecChar, $_POST['lastname'])) {
            $errors['lastname'] = 'Pas de charactère spéciaux';
        } else if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Entrez votre prénom';
        }
    }
    
    // TODO: Vérfier que le username n'existe pas

    if (isset($_POST['username'])) {
        if (strlen($_POST['username'])>50) {
            $errors['username'] = 'Maximum 50 charactères';
        } else if (strlen($_POST['username'])<3){
            $errors['username'] = 'Minimum 3 charactères';
        }
    }

    if (isset($_POST['usermail'])) {
        if (!filter_var($_POST['usermail'], FILTER_VALIDATE_EMAIL)) {
            $errors['usermail'] = 'Adresse Mail non valide';
        } else if (empty($_POST['usermail'])) {
            $errors['usermail'] = 'Entre une adresse mail';
        }
    }


    if ((isset($_POST['birthday'])) && empty($_POST['birthday'])) {
        $errors['birthday'] = 'Entrez une date';
    } else {
        $userbday = $_POST["birthday"];
    }

    if (isset($_POST['enterprise']) && ($_POST['enterprise'])== "0")
    {
        $errors['enterprise'] = "Choisissez une entreprise";
    }

    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'Entrez votre Mot de passe';
        } else if (strlen($_POST['password']) < 8) {
            $errors['password'] = 'Plus de 8 charactères';
        }
    }

    if (isset($_POST['password']) && (isset($_POST['passwordconfirm']))) {
        if (empty($_POST['passwordconfirm'])) {
            $errors['passwordconfirm'] = 'Confirmez votre mot de passe';
        } else if ($_POST['password'] != $_POST['passwordconfirm']) {
            $errors['passwordconfirm'] = 'Mot de passe non identique';
        }
    }


    if (empty($errors)){
        $userid = $_SESSION['user']['USR_ID'];
        $userfname = $_POST['firstname'];
        $userlname = $_POST['lastname'];
        $useruname = $_POST['username'];
        $userbday = $_POST['birthday'];
        $usermail = $_POST['usermail'];
        $userdesc = $_POST['description'];
        $userpass = $_POST['password'];
        $entid = $_POST['enterprise'];

        Utilisateur::update($userid,$userfname,$userlname, $useruname,$userbday,$usermail,$userdesc,$userpass, $entid);
        Header("Location: ./controller-home.php");
    }
    //TODO : Gérer l'insertion des photos de profil avec $_FILES
}

include '../views/view-profile.php';
?>