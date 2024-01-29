<?php
// Header
include '../views/templates/header.php';
?>

<form action="../controllers/controller-updatetravel.php" method="POST" class="form">
    <div class="formLines">
        <label for="traveldate">Date du voyage</label>
        <input type="date" name="traveldate" value="<?= isset($_SESSION['travelupdate']['TVL_DATE']) ? $_SESSION['travelupdate']['TVL_DATE'] : ''; ?>">
        <p class="errorText">
            <?php 
            echo isset($errors['traveldate']) ? $errors['traveldate'] : "";
            ?>
        </p>
    </div>

    <div class="formLines">
        <label for="traveltime">Durée du voyage(heures:minutes)</label>
        <input type="time" name="traveltime" value="<?= isset($_SESSION['travelupdate']['TVL_TIME']) ? $_SESSION['travelupdate']['TVL_TIME'] : ''; ?>">
        <p class="errorText">
            <?php 
                echo isset($errors['traveltime']) ? $errors['traveltime'] : "";
            ?>
        </p>
    </div>

    <div class="formLines">
        <label for="traveldistance">Distance parcourue(en km)</label>
        <input type="number" name="traveldistance" value="<?= isset($_SESSION['travelupdate']['TVL_DISTANCE']) ? $_SESSION['travelupdate']['TVL_DISTANCE'] : ''; ?>"">
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
            <?php
            foreach($transports as $transport){
                echo '<option value='.$transport['TRA_ID'].'>'.$transport['TRA_NAME'].'</option>';
                // TODO : Quand temps libre, réparer la sélection pour qu'elle soit automatique
            }
            ?>
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