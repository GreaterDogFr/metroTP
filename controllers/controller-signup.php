<?php
require_once('../config.php');
require_once('../models/Utilisateur.php');

// $nonumberpatern = "/[a-zA-ZÀ-ÿ\-]+$/";
$paternSpecChar = '/[\'\/^£$%&*()}{@#~?><>,|=_+¬-]/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $errors = [];

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
        $bday = $_POST["birthday"];
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
            $errors['passwordconfirm'] = 'Mot de passe erroné';
        }
    }

    if ((!isset($_POST['cgu']))) {
        $errors['cgu'] = 'Veuillez accepter la CGU';
    }

    // ? Si aucune erreur
    if (empty($errors)){
        $validate = 1;
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $usermail = $_POST['usermail'];
        $bday = $_POST['birthday'];
        $password = $_POST['password'];
        $enterprise = $_POST['enterprise'];


        Utilisateur::create($validate, $firstname, $lastname, $username, $usermail, $bday, $password, $enterprise);
        header("Location: ./controller-signin.php");
    }
}
include '../views/view-signup.php';
