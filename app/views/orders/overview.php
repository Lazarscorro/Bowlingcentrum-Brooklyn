<!-- Styling -->
<link rel="stylesheet" href="/public/css/orders_overview.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <h1>Bestellingen</h1>

    <a href="<?= URLROOT ?>/orders/create" class="btn btn-primary mb-3">Create order</a>

    <?php
        // Show deleteStatus if exists as alert
        if (isset($data['deleteStatus'])) {
            echo "<p class='success'>" . $data['deleteStatus'] . "</p>";
        }

        // If $data['error'] is set, show the error message
        if (isset($data['error'])) {
            echo "<p class='error'>" . $data['error'] . "</p>";
        } else if (isset($data['success'])) {
            echo "<p class='success'>" . $data['success'] . "</p>";
        }
    ?>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>Opmerking</th>
            </tr>
        </thead>
        <tbody>
        <?php
    // Make the data available in the view
    $rows = '';
    foreach ($data['orders'] as $value) {
      echo "
      <tr>
        <td>" . htmlentities($value->Id, ENT_QUOTES, 'ISO-8859-1') . "</td>
        <td>" . htmlentities($value->Naam, ENT_QUOTES, 'ISO-8859-1') . "</td>
        <td>" . htmlentities($value->Opmerking, ENT_QUOTES, 'ISO-8859-1') . "</td>
        <td>
            <div class='dropdown'>
              <button class='dropbtn'><i class='fa fa-bolt'></i> Acties</button>
              <div class='dropdown-content'>
                <a href='" . URLROOT . "/orders/update/$value->Id'>Update</a>
                <a href='" . URLROOT . "/orders/delete/$value->Id'>Verwijder</a>
              </div>
            </div></td>
      </tr>";
    }
    ?>
        </tbody>
    </table>
    </body>
</html>
