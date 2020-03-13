<?php

/**
 * 
 */

class Opgave1Model extends TinyMVC_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getName(){
        return "Stefan Segers";
    }
    
    public function getClassGroup(){
        return "ELO-ICT/ICT1";
    }  
    
    public function getStudents(){
        $aStudents = array(
            "Jan Janssen",
            "Piet Nauwelaers",
            "Ronny Van Buel",
            "Katy Peters");
        return $aStudents;
    }    
}