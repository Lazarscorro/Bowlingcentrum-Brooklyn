<?php echo $data["title"]; ?>
<!-- show values and send to create a new contact -->
<a href="<?= URLROOT; ?>/contacts/create">Nieuw contact toevoegen</a>

<table>
  <thead>
    <th>id</th>
    <th>email</th>
    <th>mobile</th>
  </thead>
  <tbody>
    <?= $data['contacts'] ?>
  </tbody>
</table>
<a href="<?= URLROOT; ?>/homepages/index">terug</a>