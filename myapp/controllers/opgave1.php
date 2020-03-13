<?php

/**
 * @property webConfigModel $oConfigData
 * @property navigationModel $oNavigation
 * @property opgave1Model $oOpgave1Data
 */

class Opgave1Controller extends TinyMVC_Controller {

    public function __construct() {
        parent::__construct();
    }
    
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
    
    public function index(){
        //sets the configuration of the website
        $this->webconfig();
        //load the models
        $this->load->model("Opgave1Model","oOpgave1Data");
        //gatter data from the model
        $sMyName = $this->oOpgave1Data->getName();
        $sMyClassGroup = $this->oOpgave1Data->getClassGroup();
        $aStudents = $this->oOpgave1Data->getStudents();
        //assign data to the view
        $this->view->assign("sMyName",$sMyName);
        $this->view->assign("sMyClassGroup",$sMyClassGroup);
        $this->view->assign("aStudents",$aStudents);
        //fets partial view
        $sPageContent = $this->view->fetch("partialviews/opgave1View");
        //assign content to the main view
        $this->view->assign("sContent",$sPageContent);
        //show the view
        $this->view->display("indexView");
    }
}
