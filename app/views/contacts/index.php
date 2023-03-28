<?php echo $data["title"]; ?>

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