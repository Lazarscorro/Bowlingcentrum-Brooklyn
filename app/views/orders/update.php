<!-- Styling -->
<link rel="stylesheet" href="/public/css/orders_overview.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <h1>Maak een nieuwe bestelling</h1>

    <table>
        <tbody>
            <tr>
                <td>
                    <label for="naam">Naam</label>
                    <input type="text" name="Naam" id="naam" value="<?= $data["row"]->Naam ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="opmerking">Opmerking</label>
                    <input type="text" name="Opmerking" id="opmerking" value="<?= $data["row"]->Opmerking ?>">
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
    </body>
</html>
