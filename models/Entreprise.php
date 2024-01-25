<?php 
class Entreprise
{  
    /**
     * Méthode permettant de récupérer les infos des entreprises

     */

    public static function getInfos()
    {
        try{
            // Création d'un objet $database selon la classe PDO
            $database = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `enterprise__ent`";

            // je prepare ma requête pour éviter les injections SQL
            $query = $database->prepare($sql);
            
            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
?>