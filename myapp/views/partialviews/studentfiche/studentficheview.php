 <form action="<?php echo $_SERVER['PHP_SELF'].'?ID='.$aStudentData['studentId']?>" method="post">
    <table style= "margin: 0 auto; border: solid 2px #C0C0C0;">
        <tr>
            <td colspan = "2" align="center">
                <h2>ID <?= $aStudentData['studentId']?></h2>
            </td>
        </tr>
        <tr>
            <td colspan = "2" align="center">
                <img src="<?= $aStudentData['photoFile']?>" alt ="foto" style="width:100%; max-width:250px">
            </td>
        </tr>                 
        <tr>
            <td style= "text-align: right;">
                Naam : 
            </td>
            <td align="left">
                <?php echo $aStudentData['name']?>
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">
                Adres : 
            </td>
            <td align="left">
                <?php echo $aStudentData['address']?>
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">&nbsp;</td>
            <td align="left"><?php echo $aStudentData['city']?></td>
        </tr>
        <tr>
            <td style= "text-align: right;">geboortedatum : </td>
            <td align="left"><?php echo $aStudentData['birthDate']?></td>
        </tr>
        <tr>
            <td style= "text-align: right;">E-mail : </td>
            <td align="left">
                <a href="mailto:<?php echo $aStudentData['email']?>">
                    <?php echo $aStudentData['email'] ?>
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">Telefoon Nr : </td>
            <td align="left"><?php echo $aStudentData['phone']?></td>
        </tr>
        <tr>
            <td style= "text-align: right;">GSM Nr : </td>
            <td align="left"><?php echo $aStudentData['mobile']?></td>
        </tr>
        <tr>
            <td colspan = "2" style= "text-align: center;">
                <button name="studentFicheEditBtn" value="edit">Wijzig</button>
            </td>
        </tr>                
    </table>
</form>
