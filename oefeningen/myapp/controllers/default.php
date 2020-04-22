<?php

/**
 * default.php
 *
 * default application controller
 *
 * @author   Van Der Veken Ronan
 *
 * @property webconfigModel $oConfigData
 * @property navigationModel $oNavigation
 * @property homeContentModel $oHomeContent
 */
class DefaultController extends TinyMVC_Controller {

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
    
    function index(){
        $this->webconfig();
        
        $this->load->model('homeContentModel', 'oHomeContent');
        $sHomeContent = $this->oHomeContent->htmlContent();
        $this->view->assign('sContent', $sHomeContent);
        
        $this->view->display("indexView");
    }
}
