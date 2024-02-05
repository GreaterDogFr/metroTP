<?php
// Header
include '../views/templates/header.php';
?>
<div class="body">
    <h2 class="welcome">Modifier <span class="welcomeyellow">Profil</span></h2>
    <!-- //TODO : Permettre d'afficher tout ce formulaire sur l'appui d'un bouton Modifier -->
    <form action="../controllers/controller-profile.php" method="POST" class="form">
        <!-- //TODO: Insérer photo de profil -->
        <div class="formLines">
            <label class="formlabels" for="firstname">Prénom :</label>
            <input type="text" class="inputforms" name="firstname" placeholder="Ex: John" value="<?= $_SESSION['user']['USR_FNAME']  ?>">
            <p class="errorText">
                    <?= isset($errors['firstname']) ? $errors['firstname'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="lastname">Nom :</label>
            <input type="text" class="inputforms" name="lastname" placeholder="Ex: Doe" value="<?= $_SESSION['user']['USR_LNAME']?>">
            <p class="errorText">
                    <?= isset($errors['lastname']) ? $errors['lastname'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="username">Pseudo :</label>
            <input type="text" class="inputforms" name="username"  placeholder="Ex: Usual_Suspect" value="<?= $_SESSION['user']['USR_UNAME']?>">
            <p class="errorText">
                    <?= isset($errors['username']) ? $errors['username'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="email">Adresse mail :</label>
            <input type="email" class="inputforms"  name="usermail" placeholder="Ex: Doe@gmail.com" value="<?= $_SESSION['user']['USR_MAIL'] ?>">
            <p class="errorText">
                    <?= isset($errors['usermail']) ? $errors['usermail'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="birthday">Date de naissance :</label>
            <input type="date" class="inputforms" name="birthday" value="<?= $_SESSION['user']['USR_BDAY'] ?>">
            <p class="errorText">
                    <?= isset($errors['birthday']) ? $errors['birthday'] : "";?>
            </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="entreprise">Entreprise :</label>
            <select class="entrepriseForms" name="enterprise"  >
                <option value=0>Choississez votre entreprise</option>
                <?php 
                foreach ($entreprises as $entreprise){
                    ?>
                    <option value=<?=$entreprise['ENT_ID']?>><?=$entreprise['ENT_NAME']?></option>;
                    <?php }
                // TODO: remettre le echo selected dans les formulaires
                // Permet de garder un select séléctionné 
                // if(isset($_POST['enterprise']) && $_POST['enterprise']=="1") echo "selected"?
                ?>
        </select>
        <p class="errorText">
                <?= isset($errors['enterprise']) ? $errors['enterprise'] : "";?>
        </p>
        </div>
        <div class="formLines">
            <label class="formlabels" for="description">Description :</label>
            <textarea type="textarea" class="inputdescription" name="description"> <?= $_SESSION['user']['USR_DSC'] ?> </textarea>
            <!-- //TODO: limiter a 1000 charactères. -->
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