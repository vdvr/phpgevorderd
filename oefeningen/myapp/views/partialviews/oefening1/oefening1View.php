<h1 style="color: red">Mijn naam is <?php echo $sName ?></h1>
<h2 style="color:blue">Ik zit in <?php echo $sClassGroup ?></h2>
<hr>
<p>
    <span style="font-weight:bold">De volgende studenten zijn mijn klasgenoten</span>
    <ul style="list-style:none">
        <?php foreach ($aClass as $sStudentName) { ?>
            <li><?php echo $sStudentName ?></li>
        <?php } ?>
    </ul>
    
        
</p>
