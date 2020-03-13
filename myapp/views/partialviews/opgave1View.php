<?php
/* 
 * this is a partial view must be loaded by the main view
 */
?>
 <h1 style =" color: green">Mijn Naam is <?php echo $sMyName ?></h1>
 <h2 style ="color: blue"> Ik zit in <?php echo $sMyClassGroup ?></h2>
 <hr>
 <p style ="color: red">De volgende studenten zitten in mijn klas:</p>
 <?php foreach($aStudents as $sStudentName) { ?>
    <p><?php echo $sStudentName?></p>
 <?php } ?>


