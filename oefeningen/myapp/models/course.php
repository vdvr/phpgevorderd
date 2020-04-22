<?php

if (!defined('TMVC_BASEDIR'))
    die('Actie niet toegestaan!');

class course extends TinyMvc_Model 
{
    public function saveCourse($aCourseData)
    {
        $courseId = (is_null($aCourseData['courseId']) || is_null($aCourseData['courseName'])) ? 
            False : $aCourseData['courseId'];
        try {
            $oDb = $this->db->pdo;
            $oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sSqlQuery = "INSERT INTO course VALUES (?, ?)";
            $oDb->prepare($sSqlQuery)->execute([$aCourseData['courseId'], $aCourseData['courseName']]);
            return True;
        }
        catch(PDOException $oError) {
            $sErrorMessage = $oError->getMessage();
            return $sErrorMessage;
        }
    }
}