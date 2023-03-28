<!-- Styling -->
<link rel="stylesheet" href="/public/css/orders_overview.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <h1>Maak een nieuwe bestelling</h1>

<form action="<?= URLROOT ?>/orders/create" method="POST">    
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="Naam">Naam</label>
                    <input type="text" name="Naam" id="naam">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Opmerking">Opmerking</label>
                    <input type="text" name="Opmerking" id="opmerking">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Id">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Aanmaken">
                </td>
            </tr>
        </tbody>
    </table>
</form>
</body>
