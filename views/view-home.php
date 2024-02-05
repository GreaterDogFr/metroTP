<?php
// Header
include '../views/templates/header.php';

?>
<div class="body">
    <h2 class="welcome">Bienvenue <span class="welcomeyellow"><?=$_SESSION['user']['USR_FNAME']?> !</span> </h2>
    <p class="date"><?=$formatteddate?></p>
    <!-- //TODO: ajouter une condition d'affichage du placeholderf si l'utilisateur n'a pas de photo de profil. -->
    <img src="../assets/img/placeholder.svg" alt="photo de profil" class="profilepicture">
    <p class="userinfos"> <?=$_SESSION['user']['USR_FNAME'] . ' ' . $_SESSION['user']['USR_LNAME']?></p>
    <p class="userinfos"> <?=$_SESSION['user']['USR_UNAME']?></p>
    <p class="userinfos"> <?=!empty($_SESSION['user']['USR_DSC']) ? $_SESSION['user']['USR_DSC'] : 'C\'est vide ici. Rajoutez une description'?></p>
    <p class="userinfos">Travaille pour <?=$_SESSION['user']['ENT_NAME']?></p>
    <form action="../controllers/controller-home.php" method="POST" class="homebuttons">
        <button class="profilebtn" type="submit" name="profile" value="profile">Modifier votre profil</button>
        <button class="addtravelbtn" type="submit" name="addtravel" value="addtravel">Ajouter un nouveau trajet</button>
        <button class="travelhistorybtn" type="submit" name="travelhistory" value="travelhistory">Historique des trajets</button>
        <button class="logoutbtn" type="submit" name="logout" value="logout" >Se déconnecter</button>
        <button class="logoutbtn" type="submit" name="delete" value="delete" >Supprimer votre profil</button>
    </form>
</div>
<?php
// Footer
include '../views/templates/footer.php'
?>