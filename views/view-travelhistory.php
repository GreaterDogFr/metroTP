<?php
// Header
include '../views/templates/header.php';
?>
<a href="../controllers/controller-home.php">home</a>
<h1>Historique des trajets</h1>
<?php
foreach($travelhistory as $travels) {
    ?>
    <p>Trajet effectué le <?= $formatteddate ?> en <?= $formattedhour ?> </p>
    <p><?= $travels['TRA_NAME'] ?></p>
    <p><?= $travels['TVL_DISTANCE'] ?> Km parcourus</p>
    <form action="../controllers/controller-travelhistory.php" method="POST">
    <button type="submit" name="update" value="update">Modifier</button>
    <input type="hidden" name="travelid" value=<?= $travels['TVL_ID'] ?> >
    <button onclick='return confirm("Supprimer le trajet en date du <?= $formatteddate ?> ?")' type="submit" id="delete" name="delete" value="delete">Supprimer</button>
    </form>
    <hr>
    <?php
}
?>
    <form action="../controllers/controller-travelhistory.php" method="POST">
        <button type="submit" name="add" value="add">Ajouter un nouveau trajet</button>
    </form>
<?php
// Footer
include '../views/templates/footer.php';
?>