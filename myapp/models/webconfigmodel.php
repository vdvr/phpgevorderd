<?php

/**
 * Description of webConfigModel
 *
 * @author u0067341
 */
class WebConfigModel extends TinyMVC_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getTitle(){
        return "oefeningen";
    }
    
    public function getMainTitle(){
        return "php en mysql";
    }
    
    public function getSubTitle() {
        return "proffesioneel webdisgn in een MVC structuur";
    }
}
    

