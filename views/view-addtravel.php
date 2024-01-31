<?php
// Header
include '../views/templates/header.php';
?>
<form action="../controllers/controller-addtravel.php" method="POST" class="form">
    <div class="formLines">
        <label class="formlabels" for="traveldate">Date du voyage</label>
        <input type="date" name="traveldate" class="traveldate"  value="<?= isset($_POST['traveldate']) ? $_POST['traveldate'] : ''; ?>">
        <p class="errorText">
            <?= isset($errors['traveldate']) ? $errors['traveldate'] : "";?>
        </p>
    </div>

    <div class="formLines">
        <label class="formlabels" for="traveltime">Durée du voyage(heures:minutes)</label>
        <input type="time" name="traveltime" class="traveltime" value="<?= isset($_POST['traveltime']) ? $_POST['traveltime'] : ''; ?>">
        <p class="errorText">
            <?= isset($errors['traveltime']) ? $errors['traveltime'] : ""; ?>
        </p>
    </div>

    <div class="formLines">
        <label class="formlabels" for="traveldistance">Distance parcourue(en km)</label>
        <input type="number" name="traveldistance"  class="traveldistance"  value="<?= isset($_POST['traveldistance']) ? $_POST['traveldistance'] : ''; ?>"">
        <p class="errorText">
            <?= isset($errors['traveldistance']) ? $errors['traveldistance'] : ""; ?>
        </p>
    </div>

    <div class="formLines">
        <label class="formlabels" for="traveltype">Moyen de transport</label>
        <select name="traveltype" class="traveltype">
            <option value="0">Choississez votre moyen  de transport</option>
            <!-- Permet de garder un select séléctionné -->
            <?php
            foreach($transports as $transport){
                echo '<option  class="traveltime" value='.$transport['TRA_ID'].'>'.$transport['TRA_NAME'].'</option>';
            }
            ?>
        </select>
        <p class="errorText">
                <?= isset($errors['traveltype']) ? $errors['traveltype'] : ""; ?>
        </p>
    </div>

    <button class="submitButton" type="submit">Ajouter un voyage</button>
</form>
<div></div>
<?php
// Footer
include '../views/templates/footer.php'
?>