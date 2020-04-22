<fieldset style="border: 2px solid black">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?studentId=<?php echo $sStudentId; ?>" method="post">
        <p>ID <?php echo $sStudentId; ?></p>
        <img src="<?php echo WEBROOT.'data/photos/'.$sStudentId; ?>.jpeg" width="200">
        <input type="hidden" name="studentId" value="<?php echo $sStudentId; ?>">
        <table>
            <tr><td>Naam: </td><td><input type="text" name="name" placeholder="Naam Voornaam"></td></tr>
            <tr><td>Adres: </td><td><input type="text" name="address" placeholder="Straat Nr"</td></tr>
            <tr><td>Gemeente: </td><td><input type="text" name="city" placeholder="Postnr Gemeente"</td></tr>
            <tr><td>Geboortedatum </td><td><input type="text" name="birthDate" placeholder="dd.mm.jjjj"</td></tr>
            <tr><td>E-mail: </td><td><input type="email" name="email" placeholder="E-mailadres"</td></tr>
            <tr><td>Telefoon Nr: </td><td><input type="text" name="phone" placeholder="xxx xxxxxx"</td></tr>
            <tr><td>GSM Nr: </td><td><input type="text" name="mobile" placeholder="xxxx xxxxxx"</td></tr>
        </table>
        <input type="submit" name="save" value="Save">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</fieldset>