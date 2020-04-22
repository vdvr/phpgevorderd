<div style="width: 350px; margin: 0px auto; padding:50px;">
<fieldset style="border: 2px solid black">
<form action="" method="post">
<table style="padding:50px">
<tr>
<td>Vak ID:</td>
<td><input type="text" name="courseId"></td>
</tr>
<tr>
<td>Vak Naam:</td>
<td><input type="text" name="courseName"></td>
</tr>
</table>
<input type="submit" name="btnSave" value="Maak">
<input type="submit" name="btnCancel" value="Annuleer">
</fieldset>
<?php if (isset($sMessage)) { echo $sMessage; } ?>
</div>