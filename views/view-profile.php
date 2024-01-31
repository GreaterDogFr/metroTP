<?php
// Header
include '../views/templates/header.php';
?>
<div>
    <h2>Page profil</h2>
    <img src="../assets/img/placeholder.svg" alt="photo de profil" class="profilepicture">
    <!-- //TODO: Username, Nom Prénom Description Entreprise -->

    //TODO : Permettre d'afficher tout ce formulaire sur l'appui d'un bouton Modifier
    <form action="../controllers/controller-home.php" method="POST" class="form">
        <!-- //TODO: Insérer photo de profil -->
        <div class="formLines">
            <label class="formlabels" for="firstname">Prénom :</label>
            <input type="text" class="inputforms" name="firstname" placeholder="Ex: John" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>">
            <p class="errorText">
                    <?= isset($errors['firstname']) ? $errors['firstname'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="lastname">Nom :</label>
            <input type="text" class="inputforms" name="lastname" placeholder="Ex: Doe" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>">
            <p class="errorText">
                    <?= isset($errors['lastname']) ? $errors['lastname'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="username">Pseudo :</label>
            <input type="text" class="inputforms" name="username"  placeholder="Ex: Usual_Suspect" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>">
            <p class="errorText">
                    <?= isset($errors['username']) ? $errors['username'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="email">Adresse mail :</label>
            <input type="email" class="inputforms"  name="usermail" placeholder="Ex: Doe@gmail.com" value="<?= isset($_POST['usermail']) ? $_POST['usermail'] : ''; ?>">
            <p class="errorText">
                    <?= isset($errors['usermail']) ? $errors['usermail'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="entreprise">Entreprise :</label>
            <select class="entrepriseForms" name="enterprise"  >
                <option value=0>Choississez votre entreprise</option>
                <!-- Permet de garder un select séléctionné -->
                <?php 
                foreach ($entreprises as $entreprise){
                ?>
                    <option value=<?=$entreprise['ENT_ID']?>><?=$entreprise['ENT_NAME']?></option>;
                <?php }
                // TODO: remettre le echo selected dans les formulaires
                // if(isset($_POST['enterprise']) && $_POST['enterprise']=="1") echo "selected"?
                ?>
        </select>
        <p class="errorText">
                <?= isset($errors['enterprise']) ? $errors['enterprise'] : "";?>
        </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="description">Description :</label>
            <textarea type="textarea" class="inputdescription" name="description"> </textarea>
            <!-- //TODO: limiter a 1000 charactères. Si ancienne description il y a, afficher l'ancienne. -->
        </div>
        <div class="formLines">
            <label class="formlabels" for="password">Mot de passe :</label>
            <input type="password" class="inputforms" name="password">
            <p class="errorText">
                    <?= isset($errors['password']) ? $errors['password'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="passwordconfirm">Confirmation de mot de passe :</label>
            <input type="password" class="inputforms" name="passwordconfirm">
            <p class="errorText">
                    <?= isset($errors['passwordconfirm']) ? $errors['passwordconfirm'] : "";?>
            </p>
        </div>

        <button class="submitButton" type="submit">Valider</button>
    </form>
</div>
<?php
// Footer
include '../views/templates/footer.php'
?>