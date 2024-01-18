<?php

class Utilisateur
{
    /**
         * Methode permettant de crée un utilisateur
         * @param int $validate Permet à l'admin de valider l'utilisateur par default 1
         * @param string $firstname Nom de l'utilisateur
         * @param string $lastname prenom de l'utilisateur
         * @param string $username Pseudo de l'utilisateur
         * @param string $usermail Email de l'utilisateur
         * @param string $password Password de l'utilisateur
         * @param string $birthday DDN de l'utilisateur
         * @param string $password Password de l'utilisateur
         * @param string $enterprise entreprise de l'utilisateur
         *
         * @return void
         */

    public static function create($validate, $firstname, $lastname, $username, $usermail, $bday, $password, $enterprise)
    {
        
        $database = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         //  value (:value = marqueur nominatif)
        $sql = 'INSERT INTO `user__usr` (`USR_VALID`, `USR_FNAME`, `USR_LNAME`, `USR_UNAME`, `USR_MAIL`, `USR_BDAY`, `USR_PASS`, `ENT_ID`) 
        VALUES (:VALID, :FNAME, :LNAME, :UNAME, :UMAIL, :BDAY, :PASS , :ENT_ID)';
        //je prepare ma requete pour eviter les injection sql,  $bdd appelle la methode prepare 
        $query = $database->prepare($sql);
         //avec bindValue permet de mettre directement des valeurs sans crée de variable 
        $query->bindValue(':VALID',1, PDO::PARAM_INT); 
        $query->bindValue(':FNAME', htmlspecialchars($_POST['firstname']), PDO::PARAM_STR);
        $query->bindValue(':LNAME', htmlspecialchars($_POST['lastname']),PDO::PARAM_STR);
        $query->bindValue(':UNAME', htmlspecialchars($_POST['username']),PDO::PARAM_STR);
        $query->bindValue(':UMAIL', $_POST['usermail'], PDO::PARAM_STR);
        $query->bindValue(':BDAY', $bday);
        $query->bindValue(':PASS', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $query->bindValue(':ENT_ID',$_POST['enterprise'], PDO::PARAM_INT); 

        try {
            $query->execute();
            echo 'Utilisateur ajouté avec succès !';
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Methode permettant de récupérer les informations d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $usermail Adresse mail de l'utilisateur
     * 
     * @return bool
     */

    public static function checkMailExists(string $usermail): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $database selon la classe PDO
            $database = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `user__usr` WHERE `USR_MAIL` = :mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $database->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':mail', $usermail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les infos d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $usermail Adresse mail de l'utilisateur
     * 
     * @return array Tableau associatif contenant les infos de l'utilisateur
     */

    public static function getInfos(string $usermail): array
    {
        try {
            // Création d'un objet $database selon la classe PDO
            $database = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `user__usr` WHERE `USR_MAIL` = :mail";

            // je prepare ma requête pour éviter les injections SQL
            $query = $database->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':mail', $usermail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
