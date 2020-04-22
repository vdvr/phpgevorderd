<?php

/**
 * oefening1.php
 *
 * oefening1 application controller
 *
 * @package		TinyMVC
 * @author		Van Der Veken Ronan
 * 
 * @property webconfigModel $oConfigData
 * @property navigationModel $oNavigation
 * @property oefening1Model $oOefening1Data
 */

class Oefening1Controller extends TinyMVC_Controller {
    public function __construct() {
        parent::__construct();
    }
    /**
     * webconfig()
     *
     * Loads important models for showing title and others
     */    
    private function webconfig() {
        $this->load->script('vdvr/menus/menugenerator');
        
        $this->load->model('webconfigModel', 'oConfigData');
        $this->load->model('navigationModel', 'oNavigation');
        
        $sTitle = $this->oConfigData->getTitle();
        $sBigTitle = $this->oConfigData->getMainTitle();
        $sSubTitle = $this->oConfigData->getSubTitle();
        $sHtmlNavigationList = $this->oNavigation->htmlListNavigation();

        $this->view->assign('sTitle', $sTitle);
        $this->view->assign('sBigTitle', $sBigTitle);
        $this->view->assign('sSubTitle', $sSubTitle);
        $this->view->assign('sSiteNavigation', $sHtmlNavigationList);
    }
    
    public function index() {
        $this->webconfig();
        
        $this->load->model("oefening1Model", "oOefening1Data");
        
        $sMyName = $this->oOefening1Data->getName();
        $sMyClassGroup = $this->oOefening1Data->getClassGroup();
        $aMyClass = $this->oOefening1Data->getStudents();
        
        $this->view->assign("sName", $sMyName);
        $this->view->assign("sClassGroup", $sMyClassGroup);
        $this->view->assign("aClass", $aMyClass);
        
        //fetch partial view
        $sPageContent = $this->view->fetch("partialviews/oefening1/oefening1View");
        $this->view->assign("sContent", $sPageContent);
        $this->view->display("indexView");
    }
}

