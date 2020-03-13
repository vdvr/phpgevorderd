<?php

/**
 * default.php
 *
 * default application controller
 *
 * @package		TinyMVC
 * @author		Stefan Segers
 */

/**
 * @property webConfigModel $oConfigData
 * @property navigationModel $oNavigation
 * @property homeContentModel $oHomeContent
 */
class DefaultController extends TinyMVC_Controller {
    
    private function webconfig(){
        //load script
        $this->load->script("ict/html/helpers");
        //load the models
        $this->load->model("webConfigModel", "oConfigData");
        $this->load->model("navigationModel","oNavigation");
        //gatter the data
        $sTitle = $this->oConfigData->getTitle();
        $sBigTitle = $this->oConfigData->getMainTitle();
        $sSubTitle = $this->oConfigData->getSubTitle();
        $aMenuItems = $this->oNavigation->getMenuArray();
        //assign to the view
        $this->view->assign("sTitle",$sTitle);
        $this->view->assign("sBigTitle",$sBigTitle);
        $this->view->assign("sSubTitle",$sSubTitle);
        $this->view->assign("aMenuItems",$aMenuItems);
    }
    
    function index(){
        //configuration of the site
        $this->webconfig();
        //load the model
        $this->load->model("HomeContentModel", "oHomeContent");
        //gatter data from model
        $sHtmlContent = $this->oHomeContent->htmlContent();
        //assign data to the view
        $this->view->assign("sContent",$sHtmlContent);
        //show te view
        $this->view->display('indexView');
    }
}

?>
