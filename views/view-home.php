<?php
// Header
include '../views/templates/header.php';

?>
<div class="home">
    <h1 class="welcome">Bienvenue <?= $_SESSION['user']['USR_FNAME'] ?> !</h1> 
    <p class="date"><?=$formatteddate?></p>
    <!-- //TODO: Quand les session seront en place, ajouter la photo de l'utilisateur/placeholder -->
    <img src="../assets/img/placeholder.png" alt="photo de profil" class="profilepicture">
    <!-- placeholder by freepik -->
    <button class="addtravelbtn">Ajouter un nouveau trajet</button>
    <form action="../controllers/controller-home.php" method="POST" >
        <button class="logoutbtn" type="submit" name="logout" value="logout" >Se déconnecter</button>
    </form>
</div>
<?php
// Footer
include '../views/templates/footer.php'
?>