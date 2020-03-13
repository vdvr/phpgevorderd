<?php


/**
 * Description of resultsModel
 *
 * @author u0067341
 */
class ResultsModel extends TinyMVC_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getResultsPerCoursePerStudent() {
        $aScorePerCoursePerStudent = array( 
            "Michiel Janssen" => array( 
                "engels" => 12, 
                "wiskunde" => 9, 
                "informatica" => 14, 
                ), 
            "Pieter Vandael" => array( 
                "engels" => 18, 
                "wiskunde" => 12, 
                "informatica" => 10, 
                ), 
            "Joris Peters" => array( 
                "engels" => 17, 
                "wiskunde" => 14, 
                "informatica" => 12, 
                )
            );
        return $aScorePerCoursePerStudent;
    }
}


