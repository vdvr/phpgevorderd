<?php

/**
 * homecontentmodel.php
 *
 * HomeContentModel Model
 *
 * @package		TinyMVC
 * @author  	Van Der Veken Ronan
 */
class HomeContentModel extends TinyMVC_Model {
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Return the content in html
     */
    public function htmlContent() {
        return ""
        . "<h3>Starpagina van onze oefensite</h3>"
        . "<p>Hier komt telkens de content van de pagina te staan</p>";
    }
}
