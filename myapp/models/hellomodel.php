<?php


/**
 * Description of hello_model
 *
 * @author u0067341
 */
class HelloModel extends TinyMVC_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getTitle() {
        return "Hello";
    }
    
    public function getBodyText() {
        return "Hello World";
    }
}
