<?php echo $data["title"]; ?>

<a href="<?= URLROOT; ?>/countries/create">Nieuw land toevoegen</a>

<table>
  <thead>
    <th>id</th>
    <th>Land</th>
    <th>hoofdstad</th>
  </thead>
  <tbody>
    <?= $data['contacts'] ?>
  </tbody>
</table>
<a href="<?= URLROOT; ?>/homepages/index">terug</a>