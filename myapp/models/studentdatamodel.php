<?php

if(!defined('TMVC_BASEDIR')){
    die("dit is niet toegestaan");
}

/**
 * StudentData_Model extends TinyMVC_Model 
 * 
 * PHP version 7.3
 *
 *
 * @package    OefeningenPhp
 * @author     Stefan Segers <stefan.segers@ucll.be>
 * @copyright  2019
 * @license    
 * 
 */
class StudentDataModel extends TinyMVC_Model {
    
    
/********************* METHODS ********************/
/**
* @access	public
*/

  /**
    * 
    * This method returns the studentdata of the given studentid as an array
    * 
    * @author   Stefan Segers
    * @access   public
    * @param    string $sStudentId the Id of a student
    * @return   array data of the student

    */    
    public function getStudentData($sStudentId){
        if (($hFileHandle = fopen("data/studentdata.csv", "r")) != FALSE) {
            $bFinishLoop = false;

            while (($aFileRow = fgetcsv($hFileHandle,1000, ";")) !== FALSE and (!$bFinishLoop)){
                if ($aFileRow[0] == $sStudentId){
                    $aStudentData = array(
                        'studentId'=>$aFileRow[0],
                        'name'=>$aFileRow[1],
                        'birthDate'=>$aFileRow[2],
                        'address'=>$aFileRow[3],
                        'city'=>$aFileRow[4],
                        'email'=>$aFileRow[5],
                        'phone'=>$aFileRow[6],
                        'mobile'=>$aFileRow[7],
                        'photoFile'=>WEBROOT.'data/photos/'.$aFileRow[0].'.jpeg',
                        );
                    $bFinishLoop = true;
                }
            }                  
            fclose($hFileHandle);
            if (!isset($aStudentData)){
                return false;
            }
            return $aStudentData;
        }else{
            return false;
        }
    }

   /**
     * 
     * This method updates the studentdata in the file studentdata.csv based on
     * the data in the array aUpdateData
     * 
     * First, the file is opened in read mode and all data and changes are 
     * stored in a twodimensional array,
     * Next the file is opened in write mode and the array is written 
     * to the file
     * 
     * @author 		Segers Stefan
     * @access 		public
     * @param 		$aUpdateData  Studentdata to update
     * @return 		boolean TRUE if the data was successfully written 
     *                  and FALSE on error

     */
     public function updateStudentData ($aUpdateData){
        if (is_writable("data/studentdata.csv")) {
            if (($hFileHandle = fopen("data/studentdata.csv", "r")) != FALSE) {
                while (($aFileRow = fgetcsv($hFileHandle, 0, ";")) !== FALSE) {
                    if ($aFileRow[0] == $aUpdateData[0]){
                        $aFileRow = $aUpdateData;                        
                    }
                    if ($aFileRow[0]!=Null){
                    $aStudentsData[$aFileRow[0]] = $aFileRow;
                    }
                }
                fclose($hFileHandle);

                if (($hFileHandle = fopen("data/studentdata.csv", "w")) != FALSE) {                
                    foreach ($aStudentsData as $aStudentData) {         
                            fputcsv($hFileHandle, $aStudentData,";");
                    }  
                    fclose($hFileHandle);
                    return TRUE;
                }else{
                    return FALSE;
                }
            }else{
                return FALSE;
            }
                
        }else{
            return FALSE;
        }            
    }

    /**
    *
    * This method return the ID and Name of all the students in the file 
    * studentdata.csv as a single array or False if the file is not
    * readable
    *
    * @author 	Segers Stefan
    * @access 	public
    * @return 	array|boolean a array with id and name or FALSE
    *            
    */
    public function getListOfStudents(){
        if (($hFileHandle = fopen("data/studentdata.csv", "r")) != FALSE) {
            $aFileHeaders = fgetcsv($hFileHandle, 1000, ";");
            while (($aFileRow = fgetcsv($hFileHandle, 1000, ";")) !== FALSE ){
                $aListOfStudents[$aFileRow[0]] = array(
                    'name'=>$aFileRow[1],
                    );
            }                  
            fclose($hFileHandle);
            return $aListOfStudents;
        }else{
            return FALSE;
        }
    }    
}