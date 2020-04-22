<?php

class Oefening1Model extends TinyMVC_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getName() {
        return "Ronan Van Der Veken";
    }
    
    public function getClassGroup() {
        return "2ICT-1";
    }
    
    public function getStudents() {
        return array("Saleem Ben Haj Hassen", 
            "Rube Theys", 
            "Kris Theys", 
            "Ronan Vanderveken", 
            "Aadil Mimon Buyemaa");
    }
}
