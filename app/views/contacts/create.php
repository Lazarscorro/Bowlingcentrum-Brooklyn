<?= $data['title'] ?>

<form action="<?= URLROOT ?>/contacts/create" method="POST">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="email">email</label>
                    <input type="text" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mobile">mobiele nummer</label>
                    <input type="number" name="mobile" id="mobile">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id">
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