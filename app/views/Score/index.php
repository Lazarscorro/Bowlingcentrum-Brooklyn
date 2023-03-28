<?php echo $data["title"]; ?>

<a href="<?= URLROOT; ?>/Score/create">Nieuw land toevoegen</a>

<?php
// haal alle personen op uit de database
$personen = $this->persoonModel->get_personen_scores_reserveringen();

// loop door alle personen en maak een tabelrij voor elke persoon
foreach ($personen as $persoon) {
    echo '<tr>';
    echo '<td>' . $persoon['id'] . '</td>';
    echo '<td>' . $persoon['voornaam'] . '</td>';
    echo '<td>' . $persoon['achternaam'] . '</td>';
    echo '<td>' . $persoon['leeftijd'] . '</td>';
    echo '<td><a href="edit.php?id=' . $persoon['id'] . '">Bewerken</a></td>';
    echo '<td><a href="delete.php?id=' . $persoon['id'] . '">Verwijderen</a></td>';
    echo '</tr>';
}

// voeg een knop toe om een nieuwe persoon toe te voegen
echo '<a href="add.php">Nieuwe persoon toevoegen</a>';
?>

<a href="<?= URLROOT; ?>/homepages/index">terug</a>