<?php
namespace oefPhp;

/**
 * Description of course
 *
 * @author luca
 */
class Course 
{
    /************************** PROPERTIES ***************************/
    /**
     *
     * @access public
     */
    
    /**
     * @property string $sCourseId
     */
    protected $sCourseId;
    /**
     * @property string $sCourseName
     */
    protected $sCourseName;
    /**
     * @property array $aStudents
     */
    protected $aStudents = array();
    
    public function __set($sProperty, $sValue) {
        switch ($sProperty) {
            case 'sCourseId':
                $this->sCourseId = $sValue;
                break;
            case 'sCourseName':
                $this->sCourseName = $sValue;
                break;
            case 'aStudents':
                $this->aStudents = $sValue;
                break;
            default:
                return False;
                break;
        }
    }
    
    /**************************** GETTERS *************************/
    public function __get($sProperty) {
        return isset($this->$sProperty) ? $this->$sProperty : false;
    }
    /************************** METHODS ***************************/
    /**
     *
     * @access public
     */
    
    /**
     * createCourse
     * This method sets the properties for the current object
     * 
     * @author Van Der Veken Ronan
     * @access public
     * @return void
     */
    public function createCourse($sCourseId, $sCourseName) {
        if (isset($sCourseId)) {
            $this->sCourseId = $sCourseId;
        }
        if (isset($sCourseName)) {
            $this->sCourseName = $sCourseName;
        }
    }
    
    /**
     * createCourseStudent
     * This method adds a student to the current object
     * 
     * @author Van Der Veken Ronan 
     * @access public
     * @return void
     */
    public function createCourseStudent(Student $oStudent) {
        $this->aStudents[] = $oStudent;
    }
    
    /**
     * htmlPhotoList
     * This method generates the required html to display all students in a table
     * 
     * @author Van Der Veken Ronan 
     * @access public
     * @return string html structure of the object
     */
    public function htmlPhotoList()
    {
        $iRowWidth = 8;
        $iCount = 0;
        
        $sHtml = "<div align=\"center\"><table><tr>";
        
        foreach ($this->aStudents as $iStudentId => $oStudent) {
            $sHtml .= "<td><a href=\"".WEBROOT."index.php".DS."studentfiche?ID=".$oStudent->sStudentId."\">".
                    "<img width=\"200\" src=\"".$oStudent->sPhotoPath."\"></a></td>";
            
            if (++$iCount % $iRowWidth == 0)
                $sHtml .= "</tr><tr>";
        }
        
        while (++$iCount % $iRowWidth != 0)
            $sHtml .= "<td></td>";
        return $sHtml."</tr></table></div>";
       
    }
}
