<form id="editStudentForm" action="<?php echo $_SERVER['PHP_SELF'].'?ID='.$aStudentData['studentId']?>" method="post">
    <table width="400px" style= "margin: 0 auto; border: solid 2px #C0C0C0;">
        <tr>
            <td colspan = "2" align="center">
                <h2>ID <?php echo $aStudentData['studentId']?></h2>
            </td>
        </tr>
        <tr>
            <td colspan = "2" align="center">
                <img src="<?php echo$aStudentData['photoFile']?>" alt ="foto" width="120">
            </td>
        </tr>                 
        <tr>
            <td style= "text-align: right;">Naam : </td>
            <td align="left"><input type="text" name="editStudentFormName" 
                value="<?php echo $aStudentData['name'] ?>">
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">Adres : </td>
            <td align="left"><input type="text" name="editStudentFormAddress" 
                value="<?php echo $aStudentData['address'] ?>">
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">Gemeente :</td>
            <td align="left"><input type="text" name="editStudentFormCity" 
                value="<?php echo $aStudentData['city']?>">
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">geboortedatum : </td>
            <td align="left"><input type="date" name="editStudentFormBirthDate" 
                value="<?php echo $aStudentData['birthDate'] ?>">
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">E-mail : </td>
            <td align="left"><input type="text" name="editStudentFormEmail" 
                value="<?php echo $aStudentData['email'] ?>">
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">Telefoon Nr : </td>
            <td align="left"><input type="text" name="editStudentFormPhone" 
                value="<?php echo $aStudentData['phone'] ?>">
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">GSM Nr : </td>
            <td align="left"><input type="text" name="editStudentFormMobile" 
                value="<?php echo $aStudentData['mobile'] ?>">
            </td>
        </tr>
        <tr>
            <td style= "text-align: right;">
                <input type="submit" name="editStudentFicheSaveBtn"                       
                       value="save"/>
            </td>
            <td style= "text-align: left;">
                <input type="submit" name="editStudentFicheCancelBtn"                       
                       value="anuleer"/>
            </td>
        </tr>                
    </table>
 </form>