<form formid ="encryptForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <table style= "margin: 0 auto; ">
        <tr>
            <td colspan="2">
                <h3>vul in het onderstaande vak het te coderen/decoderen bericht in</h3>
            </td>
        <tr>
            <td colspan="2">
                
                <textarea name = "encryptFormMessage" rows = "3" cols = "80" 
                          placeholder="voeg hier de te coderen tekst in"><?php echo $sMessage ?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="encryptFormSubmitBtn" value="codeer"/>             
            </td>
            <td>
                <input type="submit" name="encryptFormSubmitBtn" value="decodeer"/>             
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea rows = "3" cols = "80"><?php echo $sEncryptedMessage ?></textarea>
            </td>
        </tr>
    </table>
</form>