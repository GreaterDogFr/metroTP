<?php
// Header
include '../views/templates/header.php';
?>
<div class="travelhistory">
    <h2 class="travelwelcome">Historique des <span class="travelyellow">Trajets</span></h2>
    <?php
foreach ($travelhistory as $travels) {
    ?>
    <div class="travel">
        <p>Trajet effectué le <span class="formatteddate"><?=$formatteddate?></span> en <?=$formattedhour?> </p>
        <p><?=$travels['TRA_NAME']?></p>
        <p><?=$travels['TVL_DISTANCE']?> Km parcourus</p>
        <form action="../controllers/controller-travelhistory.php" class="travelbuttons" method="POST">
            <input type="hidden" name="travelid" value=<?=$travels['TVL_ID']?> >
            <button onclick='return confirm("Supprimer le trajet en date du <?=$formatteddate?> ?")' class="deletebtn" type="submit" id="delete" name="delete" value="delete">Supprimer</button>
        </form>
        <hr>
    </div>
    <?php
}
?>
    <form action="../controllers/controller-travelhistory.php" method="POST">
        <button type="submit" class="addbtn" name="add" value="add">Ajouter un nouveau trajet</button>
    </form>
</div>
<?php
// Footer
include '../views/templates/footer.php';
?>