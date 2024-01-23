<?php
// Header
include '../views/templates/header.php';
?>
<form action="../controllers/controller-addtravel.php" method="POST" class="form">
    <div class="formlines">
        <label for="traveldate">Date du voyage</label>
        <input type="date" name="traveldate" value="<?= isset($_POST['traveldate']) ? $_POST['traveldate'] : ''; ?>">
        <p class="errorText">
            <?php 
            echo isset($errors['traveldate']) ? $errors['traveldate'] : "";
            ?>
        </p>
    </div>

    <div class="formLines">
        <label for="traveltime">Durée du voyage(heures:minutes)</label>
        <input type="time" name="traveltime" value="<?= isset($_POST['traveltime']) ? $_POST['traveltime'] : ''; ?>">
        <p class="errorText">
            <?php 
                echo isset($errors['traveltime']) ? $errors['traveltime'] : "";
            ?>
        </p>
    </div>

    <div class="formLines">
        <label for="traveldistance">Distance parcourue(en km)</label>
        <input type="number" name="traveldistance" value="<?= isset($_POST['traveldistance']) ? $_POST['traveldistance'] : ''; ?>"">
        <p class="errorText">
            <?php 
                echo isset($errors['traveldistance']) ? $errors['traveldistance'] : "";
            ?>
        </p>
    </div>

    <div class="formLines">
        <label for="traveltype">Moyen de transport</label>
        <select name="traveltype"  >
            <option value="0">Choississez votre moyen  de transport</option>
            <!-- Permet de garder un select séléctionné -->
            <option <?php if(isset($_POST['traveltype']) && $_POST['traveltype']=="1") echo "selected"?> value=1>A pied</option>
            <option <?php if(isset($_POST['traveltype']) && $_POST['traveltype']=="2") echo "selected"?> value=2>Vélo</option>
            <option <?php if(isset($_POST['traveltype']) && $_POST['traveltype']=="3") echo "selected"?> value=3>Metro/bus</option>
            <option <?php if(isset($_POST['traveltype']) && $_POST['traveltype']=="4") echo "selected"?> value=4>Covoiturage</option>
            <option <?php if(isset($_POST['traveltype']) && $_POST['traveltype']=="5") echo "selected"?> value=5>Voiture</option>
        </select>
        <p class="errorText">
                <?php 
                echo isset($errors['traveltype']) ? $errors['traveltype'] : "";
                ?>
        </p>
    </div>

    
    <button class="submitButton" type="submit">Ajouter un voyage</button>
</form>
<div></div>
<?php
// Footer
include '../views/templates/footer.php'
?>