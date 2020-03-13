<?php

namespace oefphp;

class Student {
    /*************************** PROPERTIES ********************************/
    /**
     * @property string $sStudentId
     * The students student-id
     */
    public $sStudentId;
    /**
     * @property string $sName
     * The students full name
     */
    public $sName;
    /**
     * @property string $sBirthDate
     * The students birthdate
     */
    public $sBirthDate;
    /**
     * @property string $sAddress
     * The address where the student lives
     */
    public $sAddress;
    /**
     * @property string $sCity
     * The city where the student lives
     */
    public $sCity;
    /**
     * @property string $sEmail
     * The students student-email
     */
    public $sEmail;
    /**
     * @property string $sPhone
     * The students phone number
     */
    public $sPhone;
    /**
     * @property string $sMobile
     * The students mobile number
     */
    public $sMobile;
    /**
     * @property string $sPhotoFile
     * The students image file-name located on the server (data/)
     */
    public $sPhotoFile;

    /**
     * createStudent
     * Fill in the class properties with the needed student data.
     *
     * @author  Ronan Van Der Veken
     * @access  public
     * @return  VARIANT boolean true if successful, error message (string)
     *  if not
     */
    public function createStudent($aStudentData) {
        $aPropsToCheck = array('studentId', 'name', 'birthDate', 'address',
                                    'city', 'phone', 'mobile', 'photoFile');
        foreach($aStudentData as $sPropName => $sValue)
            if (!in_array($sPropName, $aPropsToCheck))
                return "Het veld " . $sPropName . "komt niet voor in de data";

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
     * Display student form
     * 
     * @author Vanderlinden Luca
     * @access public
     * @return string html structure of the object
     */
    public function htmlFiche()
    {
        return "<fieldset style=\"border: 2px solid black; \">".
            "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"get\">".
            "<p>ID".$this->sStudentId."</p>".
            "<img src=\"".$this->sPhotoPath."\" width=\"200\">".
            "<table>".
            "<input type=\"hidden\" name=\"studentId\" value=\"".$this->sStudentId."\">".
            "<tr><td>Naam: </td><td>".$this->sName."</td></tr>".
            "<tr><td>Adres: </td><td>".$this->sAddress."</td></tr>".
            "<tr><td>Gemeente: </td><td>".$this->sCity."</td></tr>".
            "<tr><td>Geboortedatum: </td><td>".$this->sBirthDate."</td></tr>".
            "<tr><td>E-mail: </td><td>".$this->sEmail."</td></tr>".
            "<tr><td>Telefoon Nr: </td><td>".$this->sPhone."</td></tr>".
            "<tr><td>GSM Nr: </td><td>".$this->sMobile."</td></tr>".
            "</table>".
            "<input type=\"submit\" name=\"edit\" value=\"Edit\">".
            "</form>".
            "</fieldset>";
    }
    
}
