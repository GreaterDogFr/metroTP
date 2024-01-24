<?php
// Header
include '../views/templates/header.php';
?>
<h1>Historique des trajets</h1>
<?php
foreach($travelhistory as $travels) {
    echo 'Trajet effectué le ' . $formatteddate. ' en ' . $formattedhour . '<br>';
    echo '' . $travels['TRA_NAME'] . '<br>';
    echo '' . $travels['TVL_DISTANCE'] . ' Km parcourus <br>';
    echo '<button>Modifier</button>';
    //TODO : permettre de modifier l'historique
    echo '<hr>';
}
?>
<?php
// Footer
include '../views/templates/footer.php'
?>