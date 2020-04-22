<?php

/**
 * studentfiche.php
 *
 * student fiche application controller
 *
 * @package		TinyMVC
 * @author      Van Der Veken Ronan
 * 
 * @property oefPhp\student $oStudent
 * @property webconfigModel $oConfigData
 * @property navigationModel $oNavigation
 * @property studentdataModel $oStudentData
 */

class StudentficheController extends TinyMVC_Controller {
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
    
    public function index(){
        $this->webConfig();
        
        // load the model
        $this->load->model('StudentDataModel','oStudentData');
        
        if (isset($_GET['ID'])) {
            $id = $_GET['ID'];
        }
        else {
            $id = '0703771';
        }
        
        // load the data
        $aStudentData = $this->oStudentData->getStudentData($id);
        // instantiate object of student
        $this->load->library('oefphp/student', 'oStudent', $aStudentData);
        
        // assign studentobject to partial view
        $this->view->assign('sHtmlStudent', $this->oStudent->htmlFiche());
        $sHtmlContent = $this->view->fetch('partialviews'.DS.'studentfiche'.DS.'studentficheView');
        
        // assign data to the mainview
        $this->view->assign('sContent',$sHtmlContent);
        
        // display the view
        $this->view->display('indexView');
    }
}
