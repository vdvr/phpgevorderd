<?php

/**
 * @property webConfigModel $oConfigData
 * @property navigationModel $oNavigation
 * @property lottoModel $oLottoData
 */

class lottoformController extends TinyMVC_Controller {

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
        $this->load->model("LottoModel", "oLottoData");
        //get the lottonumbers
        $aLottoNumbersPerGrid = $this->oLottoData->lottogetallen();
        //assign lottonumbers to the lottoformview
        $this->view->assign("aLottoNumbersPerGrid",$aLottoNumbersPerGrid);
        //fetch the parialview lottoform as content
        //fets partial view
        $sPageContent = $this->view->fetch("partialviews/lottoformview");
        //assign content to the main view
        $this->view->assign("sContent",$sPageContent);
        //show the view
        $this->view->display("indexView");
    }
}
