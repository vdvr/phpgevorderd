<?php

if(!defined('TMVC_BASEDIR')){
    die("dit is niet toegestaan");
}

/**
 * @property hello_model $oHelloData
 */

class HelloController extends TinyMVC_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        // load the model
        $this->load->model('HelloModel','oHelloData');
        // gatter data from model
        $sFirstTitle = $this->oHelloData->getTitle();
        $sDutchBodyText = $this->oHelloData->getBodyText();
        // assign data to the view
        $this->view->assign('sTitle', $sFirstTitle);
        $this->view->assign('sBodyText', $sDutchBodyText);
        // load the view
        $this->view->display('helloView');
    }
}
