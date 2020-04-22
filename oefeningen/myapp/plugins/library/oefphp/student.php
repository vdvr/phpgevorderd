<?php
namespace oefphp;

/**
 * Description of student
 *
 * @author luca
 */
class Student 
{
    /************************** PROPERTIES ***************************/
    /**
     *
     * @access public
     */
    /**
     * @property string $sStudentId
     */
    protected $sStudentId;
    /**
     * @property string $sName
     */
    protected $sName;
    /**
     * @property string $sBirthDate
     */
    protected $sBirthDate;
    /**
     * @property string $sAddress
     */
    protected $sAddress;
    /**
     * @property string $sCity
     */
    protected $sCity;
    /**
     * @property string $sEmail
     */
    protected $sEmail;
    /**
     * @property string $sPhone
     */
    protected $sPhone;
    /**
     * @property string $sMobile
     */
    protected $sMobile;
    /**
     * @property string $sPhotoPath
     */
    protected $sPhotoPath;

    /************************** CONSTRUCTOR ***********************/
    public function __construct($aStudentData) {
        if (isset($aStudentData))
            $this->createStudent($aStudentData);
    }
    
    /**************************** SETTERS *************************/
    public function __set($sProperty, $sValue) {
        switch ($sProperty) {
            case 'sStudentId':
                $this->sStudentId = $sValue;
                break;
            case 'sName':
                $this->sName = $sValue;
                break;
            case 'sBirthDate':
                $this->sBirthDate = $sValue;
                break;
            case 'sAddress':
                $this->sAddress = $sValue;
                break;
            case 'sCity':
                $this->sCity = $sValue;
                break;
            case 'sEmail':
                $this->sEmail = $sValue;
                break;
            case 'sPhone':
                $this->sPhone = $sValue;
                break;
            case 'sMobile':
                $this->sMobile = $sValue;
                break;
            case 'sPhotoPath':
                $this->sPhotoPath = $sValue;
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
     * createStudent
     * This method sets the properties of the current object
     * 
     * @author Van Der Veken Ronan
     * @access public
     * @return variant true if successful or string with missing property
     */
    public function createStudent(array $aStudentData): bool
    {
        $aPropertiesToCheck = array('studentId', 'name', 'birthDate', 'address', 'city', 'email', 
            'phone', 'mobile','photoFile');
        foreach ($aStudentData as $sPropertyName => $sValue) {
            if(!in_array($sPropertyName, $aPropertiesToCheck)) {
                return "Het veld ".$sPropertyName." komt niet voor in de data";
            }
        }

        $this->sStudentId = $aStudentData['studentId'];
        $this->sName = $aStudentData['name'];
        $this->sBirthDate = $aStudentData['birthDate'];
        $this->sAddress = $aStudentData['address'];
        $this->sCity = $aStudentData['city'];
        $this->sEmail = $aStudentData['email'];
        $this->sPhone = $aStudentData['phone'];
        $this->sMobile = $aStudentData['mobile'];
        $this->sPhotoPath = $aStudentData['photoFile'];

        return true;
    }

    /**
     * htmlFiche
     * This method generates the required html to display all students in a form
     * 
     * @author Van Der Veken Ronan
     * @access public
     * @return string html structure of the object
     */
    public function htmlFiche()
    {
        return "<fieldset style=\"border: 2px solid black\">".
            "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"get\">".
            "<p>ID".$this->sStudentId."</p>".
            "<img src=\"".$this->sPhotoPath."\" width=\"200px\">".
            "<table style=\"margin: 0 auto; width 700px;\">".
            "<input type=\"hidden\" name=\"studentId\" value=\"".$this->sStudentId."\">".
            "<tr><td style=\"text-align: left;\">Naam: </td><td style=\"text-align: right;\">".$this->sName."</td></tr>".
            "<tr><td style=\"text-align: left;\">Adres: </td><td style=\"text-align: right;\">".$this->sAddress."</td></tr>".
            "<tr><td style=\"text-align: left;\">Gemeente: </td><td style=\"text-align: right;\">".$this->sCity."</td></tr>".
            "<tr><td style=\"text-align: left;\">Geboortedatum: </td><td style=\"text-align: right;\">".$this->sBirthDate."</td></tr>".
            "<tr><td style=\"text-align: left;\">E-mail: </td><td style=\"text-align: right;\">".$this->sEmail."</td></tr>".
            "<tr><td style=\"text-align: left;\">Telefoon Nr: </td><td style=\"text-align: right;\">".$this->sPhone."</td></tr>".
            "<tr><td style=\"text-align: left;\">GSM Nr: </td><td style=\"text-align: right;\">".$this->sMobile."</td></tr>".
            "</table>".
            "<input type=\"submit\" name=\"edit\" value=\"Edit\">".
            "</form>".
            "</fieldset>";
    }

}
