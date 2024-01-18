<?php
require_once '../config.php';
require_once '../models/Utilisateur.php';

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    if (isset($_POST['usermail'])) {
        if (empty($_POST['usermail'])) {
            $errors['usermail'] = 'Entre une adresse mail';
        }
    }

    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'Entrez votre Mot de passe';
        }
    }

    if (empty($errors)) {
        //Test des connexions
        if(!Utilisateur::checkMailExists($_POST['usermail'])) {
            $errors['usermail'] = 'utilisateur Inconnu';
        } else {
            //récupération
            $userInfos = Utilisateur::getInfos($_POST['usermail']);
            var_dump($userInfos);
            //password_verify : Booleen pour vérifier si password haché
            if (password_verify($_POST['password'], $userInfos['USR_PASS'])){
                echo 'connexion ok';
            } else {
                $errors['password'] = 'mauvais mdp';
            }
        }
    }
}
include '../views/view-signin.php';
