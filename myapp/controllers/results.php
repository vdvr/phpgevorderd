<?php
/**
 * @property ResultsModel $oResultsData
 */

class ResultsController extends TinyMVC_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        // load the model
        $this->load->model('ResultsModel','oResultsData');
        // gatter data from model
        $aScorePerCousePerStudent = $this->oResultsData->getResultsPerCoursePerStudent();
        // assign data to the view
        $this->view->assign('aScorePerCoursePerStudent', $aScorePerCousePerStudent);
        // load the view
        $this->view->display('resultsView');
    }
}
