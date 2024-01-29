<?php
// Header
// value="isset($_POST['nom']) ? $_POST['nom'] : '';"
include '../views/templates/header.php';
?>

<form action="../controllers/controller-signup.php" method="POST" class="form">
    <div class="formLines">
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>">
        <p class="errorText">
                <?php 
                echo isset($errors['firstname']) ? $errors['firstname'] : "";
                ?>
        </p>
        </div>
    </div>
    <div class="formLines">
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>">
        <p class="errorText">
                <?php 
                echo isset($errors['lastname']) ? $errors['lastname'] : "";
                ?>
        </p>
    </div>
    <div class="formLines">
        <label for="username">Pseudo :</label>
        <input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>">
        <p class="errorText">
                <?php 
                echo isset($errors['username']) ? $errors['username'] : "";
                ?>
        </p>
    </div>
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
        <label for="birthday">Date de naissance :</label>
        <input type="date" name="birthday" value="<?= isset($_POST['birthday']) ? $_POST['birthday'] : ''; ?>">
        <p class="errorText">
                <?php 
                echo isset($errors['birthday']) ? $errors['birthday'] : "";
                ?>
        </p>
    </div>
    <div class="formLines">
        <label for="entreprise">Entreprise :</label>
        <select name="enterprise"  >
            <option value=0>Choississez votre entreprise</option>
            <!-- Permet de garder un select séléctionné -->
            <?php 
            foreach ($entreprises as $entreprise){
                echo '<option value='.$entreprise['ENT_ID'].'>'.$entreprise['ENT_NAME'].'</option>';
            }
            //TODO: remettre le echo selected dans les formulaires
            // if(isset($_POST['enterprise']) && $_POST['enterprise']=="1") echo "selected"?
            ?>
            
        </select>
        <p class="errorText">
                <?php 
                echo isset($errors['enterprise']) ? $errors['enterprise'] : "";
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
    <div class="formLines">
        <label for="passwordconfirm">Confirmation de mot de passe :</label>
        <input type="password" name="passwordconfirm">
        <p class="errorText">
                <?php 
                echo isset($errors['passwordconfirm']) ? $errors['passwordconfirm'] : "";
                ?>
        </p>
    </div>
    <div class="formLines">
        <input type="checkbox" name="cgu" <?php if(isset($_POST['cgu'])) echo "checked='checked'"; ?>>
        <label for="cgu">J'accepte les CGU</label>
        <p class="errorText">
                <?php 
                echo isset($errors['cgu']) ? $errors['cgu'] : "";
                ?>
        </p>
    </div>

    <button class="submitButton" type="submit">Valider</button>
</form>

<div>
    <p>Déjà Inscrit ? <a href="../controllers/controller-signin.php"> Connectez-vous !</a></p>
</div>

<?php
// Footer
include '../views/templates/footer.php'
?>