<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/strict.dtd">
<html>
    <head>
        <title>Resultaten</title>
    </head>
    <body>
        <?php foreach ($aScorePerCoursePerStudent as $sStudent => $aScorePerCourse) { ?>
        <h1>student: <?php echo $sStudent?></h1>
       
        <table>
            <tr>
                <th>Vak</th>
                <th>Score</th>
            </tr>
            <?php foreach ($aScorePerCourse as $sCourse => $iScore) { ?>
            <tr>
                <td><?php echo $sCourse ?></td>
                <td><?php echo $iScore ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </body>