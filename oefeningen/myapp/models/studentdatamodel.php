Hello World!Hello World!<?php
/**
 *
 * studentdatamodel.php
 *
 * StudentdataModel Model
 * @package oefeningen  (phpgevorderd)
 * @author  Ronan Van Der Veken
 */
class StudentdataModel extends TinyMVC_Model {
    public function __construct() {
        parent::__construct();
    }
    public function getStudentData($sStudentId) {
        try {
            $oDb = $this->db->pdo;
            $oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sSqlQuery = "SELECT * FROM student";
            $oResultSet = $oDb->query($sSqlQuery);
            $aDataTable = $oResultSet->fetchAll(PDO::FETCH_ASSOC);

            $aStudents = array();
            foreach($aDataTable as $aRow){
                if ($aRow['student_id'] == $sStudentId)
                    return array(
                        "studentId" => $aRow['student_id'],
                        "name" => $aRow['name'],
                        "birthDate" => $aRow['birthdate'],
                        "address" => $aRow['address'],
                        "city" => $aRow['city'],
                        "email" => $aRow['email'],
                        "phone" => $aRow['phone'],
                        "mobile" => $aRow['mobile'],
                        "photoFile" => WEBROOT . 'data/photos/' . $aRow["student_id"] . '.jpeg'
                );
            }
            return $aStudents;
        }
        catch(PDOException $oError) {
            print_r("PDO Error: " . $oError->getMessage());
        }
    }
    
    public function updateStudentData($aStudentData) {
        try {
            $oDb = $this->db->pdo;
            $oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sSqlQuery = "UPDATE student SET name=?, birthDate=?, address=?, city=?,
                            email=?, phone=?, photoFile=? WHERE student_id=?";
            $oDb->prepare($sSqlQuery)->execute([$aStudentData['name'], $aStudentData['birthDate'], $aStudentData['birthDate'],
                            $aStudentData['address'], $aStudentData['city'], $aStudentData['email'], $aStudentData['phone'],
                            WEBROOT . 'data/photos/' . $aStudentData["studentId"] . '.jpeg']);

        }
        catch(PDOException $oError) {
            print_r("PDO Error: " . $oError->getMessage());
        }
    }
    
    public function allStudentsData() {
        try {
            $oDb = $this->db->pdo;
            $oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sSqlQuery = "SELECT * FROM student";
            $oResultSet = $oDb->query($sSqlQuery);
            $aDataTable = $oResultSet->fetchAll(PDO::FETCH_ASSOC);
            foreach ($aDataTable as $key => $rwStudent) {
                $aStudents[$rwStudent["student_id"]] = array(
                        "studentId" => $rwStudent["student_id"],
                        "name" => $rwStudent['name'],
                        "birthDate" => $rwStudent['birthdate'],
                        "address" => $rwStudent['address'],
                        "city" => $rwStudent['city'],
                        "email" => $rwStudent['email'],
                        "phone" => $rwStudent['phone'],
                        "mobile" => $rwStudent['mobile'],
                        "photoFile" => WEBROOT . 'data/photos/' . $rwStudent["student_id"] . '.jpeg'
                    );
            }
            return $aStudents;
        }
        catch(PDOException $oError) {
            print_r("PDO Error: " . $oError->getMessage());
        }
    }
}
