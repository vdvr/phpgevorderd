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
 * @property lottoformModel $oLottoformData
 */

class LottoController extends TinyMVC_Controller
{
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

        $this->load->model('lottoformModel', 'oLottoformData');
        $aLottoNumbersPerGrid = $this->oLottoformData->lottoGetallen();
        $this->view->assign('aNumbersPerGrid', $aLottoNumbersPerGrid);

        $sPageContent = $this->view->fetch("partialviews/lottoform/lottoformView");
        $this->view->assign("sContent", $sPageContent);
        $this->view->display("indexView");
    }
}
