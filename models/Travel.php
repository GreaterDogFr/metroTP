<?php 
class travel
{
    /**
         * Methode permettant de crée un travel
         * @param date $traveldate Date du travel
         * @param time $traveltime temps de trajet
         * @param string $traveldistance distnace du trajet
         * @param string $traveltype Type de moyen de transport utilisé
         * @param string $userid id de l'utilisateur qui créée le travel
         * 
         * @return void
         */
    public static function create($traveldate,$traveltime,$traveldistance,$traveltype,$userid) {
        $database = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO `travels__tvl` (`TVL_DATE`,`TVL_TIME`,`TVL_DISTANCE`,`TRA_ID`,`USR_ID`) 
        VALUES (:TVL_DATE, :TVL_TIME, :DISTANCE, :TRA_ID,:USR_ID)';
        //je prepare ma requete pour eviter les injection sql,  $bdd appelle la methode prepare 
        $query = $database->prepare($sql);
        //avec bindValue permet de mettre directement des valeurs sans crée de variable
        $query->bindValue(':TVL_DATE', $traveldate);
        $query->bindValue(':TVL_TIME', $traveltime);
        $query->bindValue(':DISTANCE',$_POST['traveldistance'], PDO::PARAM_STR);
        $query->bindValue(':TRA_ID',$_POST['traveltype'], PDO::PARAM_INT);
        $query->bindValue(':USR_ID',$_SESSION['user']['USR_ID'], PDO::PARAM_INT);


        try{
            $query->execute();
            echo 'Travel ajouté avec succès !';
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public static function getInfosByUSRID(int $userid): array
    {
        try {
             // Création d'un objet $database selon la classe PDO
            $database = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

             // stockage de ma requete dans une variable
             $sql = "SELECT * FROM `travels__tvl` NATURAL JOIN `transportation__tra` WHERE `USR_ID` = :USR_ID";

             // je prepare ma requête pour éviter les injections SQL
            $query = $database->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':USR_ID', $userid, PDO::PARAM_STR);

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