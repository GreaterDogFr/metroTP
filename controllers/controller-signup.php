<?php
// var_dump($_POST);
// $nonumberpatern = "/[a-zA-ZÀ-ÿ\-]+$/";
$paternSpecChar = '/[\'\/^£$%&*()}{@#~?><>,|=_+¬-]/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    if (isset($_POST['firstname'])) {
        if (preg_match($paternSpecChar, $_POST['firstname'])) {
            $errors['firstname'] = 'Pas de charactère spéciaux';

        } else if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'Entrez votre nom';
        }

        if (isset($_POST['lastname'])) {
            if (preg_match($paternSpecChar, $_POST['lastname'])) {
                $errors['lastname'] = 'Pas de charactère spéciaux';
            } else if (empty($_POST['lastname'])) {
                $errors['lastname'] = 'Entrez votre prénom';
            }
        }

        if (isset($_POST['lastname'])) {
            if (preg_match($paternSpecChar, $_POST['lastname'])) {
                $errors['lastname'] = 'Pas de charactère spéciaux';
            } else if (empty($_POST['lastname'])) {
                $errors['lastname'] = 'Entrez votre prénom';
            }
        }

        if (isset($_POST['username'])) {
            if (strlen($_POST['username'])>50) {
                $errors['username'] = 'Maximum 50 charactères';
            } else if (strlen($_POST['username'])<3){
                $errors['username'] = 'Minimum 3 charactères';
            }
        }

        if (isset($_POST['mail'])) {
            if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $errors['mail'] = 'Adresse Mail non valide';
            } else if (empty($_POST['mail'])) {
                $errors['mail'] = 'Entre une adresse mail';
            }
        }

        if ((isset($_POST['birthday'])) && empty($_POST['date'])) {
            $errors['birthday'] = 'Entrez une date';
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
    }
}
include '../views/view-signup.php';
