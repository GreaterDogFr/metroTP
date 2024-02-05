<?php
// Header
include '../views/templates/header.php';
?>
<div class="body">

    <form action="../controllers/controller-signin.php" method="POST" class="form">
        <div class="formLines">
            <label class="formlabels" for="email">Adresse mail :</label>
        <input type="email" class="inputforms" name="usermail" placeholder="Ex: Doe@gmail.com" value="<?=isset($_POST['usermail']) ? $_POST['usermail'] : '';?>">
        <p class="errorText">
                <?=isset($errors['usermail']) ? $errors['usermail'] : "";?>
        </p>
        </div>

        <div class="formLines">
            <label class="formlabels" for="password">Mot de passe :</label>
            <input type="password" class="inputforms"name="password">
            <p class="errorText">
                    <?=isset($errors['password']) ? $errors['password'] : "";?>
            </p>
        </div>

        <button class="submitButton" type="submit">Se connecter</button>
    </form>

    <div class="signedupyet">
        <p>Pas de compte ? <a class="signlink" href="../controllers/controller-signup.php"> Inscrivez vous !</a></p>
    </div>

</div>
<?php
// Footer
include '../views/templates/footer.php'
?>