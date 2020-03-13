<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
    <table style= "margin: 0 auto; ">
        <tr>
            <td>
                <h3>Selecteer een student uit de lijst</h3>
            </td>
        <tr>
            <td style= "text-align: center;">
                <select name ="ID"  onchange="this.form.submit()">
                    <option value ="">kies student uit de lijst</option>
                    <?php foreach ($aListOfStudents as $sStudentId => $aStudentData){ ?>
                    <option value="<?php echo $sStudentId ?>"><?php echo $aStudentData["name"] ?></option>                
                    <?php } ?>
    
                </select>
            </td>
        </tr>
    </table>
</form>
<br>
<hr>