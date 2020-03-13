<?php

Class HomeContentModel extends TinyMVC_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function htmlContent() {
        $sHtmlHomeContent = "<p>Dit is de homepage van onze site</p>"
                ."Gebruik de navigatieknoppen om te navigeren";
        return $sHtmlHomeContent;
    }

}