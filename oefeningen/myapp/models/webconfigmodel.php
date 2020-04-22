<?php
class WebconfigModel extends TinyMVC_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getTitle() {
        return "Oefeningen";
    }
    
    public function getMainTitle() {
        return strtoupper("PHP en MySQL");
    }
    
    public function getSubTitle() {
        return strtoupper("Professioneel webdesign in een MVC structuur");
    }
}