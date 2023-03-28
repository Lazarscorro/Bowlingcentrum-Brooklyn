<!DOCTYPE html>
<html>

<head>
    <title>CRUD Page</title>
</head>

<body>
    <h1>CRUD Page</h1>
    <table>
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Leeftijd</th>
                <th>Score</th>
                <th>Datum</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personen as $persoon): ?>
            <tr>
                <td><?= $persoon->voornaam ?></td>
                <td><?= $persoon->achternaam ?></td>
                <td><?= $persoon->leeftijd ?></td>
                <td><?= $persoon->score ?></td>
                <td><?= $persoon->datum ?></td>
                <td>
                    <a href="<?=URLROOT?>('persoon/edit/' . $persoon->id) ?>">Bewerken</a>
                    <a href="<?=URLROOT?>('persoon/delete/' . $persoon->id) ?>"
                        onclick="return confirm('Weet je zeker dat je deze persoon wilt verwijderen?')">Verwijderen</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= URLROOT?>('persoon/create') ?>">Nieuwe persoon toevoegen</a>
</body>

</html>