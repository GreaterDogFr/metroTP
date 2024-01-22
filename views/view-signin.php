<?php
// Header
include '../views/templates/header.php';
?>

<form action="../controllers/controller-signin.php" method="POST" class="form">
    <div class="formLines">
        <label for="email">Adresse mail :</label>
        <input type="email" name="usermail" value="<?= isset($_POST['usermail']) ? $_POST['usermail'] : ''; ?>">
        <p class="errorText">
                <?php 
                echo isset($errors['usermail']) ? $errors['usermail'] : "";
                ?>
        </p>
    </div>
    
    <div class="formLines">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password">
        <p class="errorText">
                <?php 
                echo isset($errors['password']) ? $errors['password'] : "";
                ?>
        </p>
    </div>

    <button class="submitButton" type="submit">Se connecter</button>
</form>

<div>
    <p>Pas de compte ? <a href="../controllers/controller-signup.php"> Inscrivez vous !</a></p>
</div>

<?php
// Footer
include '../views/templates/footer.php'
?>