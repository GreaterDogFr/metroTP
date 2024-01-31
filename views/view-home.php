<?php
// Header
include '../views/templates/header.php';

?>
<div class="home">
    <h2 class="welcome">Bienvenue <span class="welcomeyellow"><?= $_SESSION['user']['USR_FNAME'] ?> !</span> </h2> 
    <p class="date"><?=$formatteddate?></p>
    <!-- //TODO: ajouter une condition d'affichage du placeholderf si l'utilisateur n'a pas de photo de profil. -->
    <img src="../assets/img/placeholder.svg" alt="photo de profil" class="profilepicture">
    <!-- //! placeholder by freepik -->
    <form action="../controllers/controller-home.php" method="POST" class="homebuttons">
        <button class="profilebtn" type="submit" name="profile" value="profile">Profil</button>
        <button class="addtravelbtn" type="submit" name="addtravel" value="addtravel">Ajouter un nouveau trajet</button>
        <button class="travelhistorybtn" type="submit" name="travelhistory" value="travelhistory">Historique des trajets</button>
        <button class="logoutbtn" type="submit" name="logout" value="logout" >Se déconnecter</button>
    </form>
</div>
<?php
// Footer
include '../views/templates/footer.php'
?>