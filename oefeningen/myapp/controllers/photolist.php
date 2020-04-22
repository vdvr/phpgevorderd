<?php

/**
 * photolist.php
 *
 * photo list application controller
 *
 * @package		TinyMVC
 * @author		Van Der Veken Ronan
 *
 * @property oefPhp\course $oCourse
 * @property oefPhp\student $oStudent
 * @property webconfigModel $oConfigData
 * @property navigationModel $oNavigation
 * @property studentdataModel $oStudentModel
 */

class PhotoListController extends TinyMVC_Controller
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

    public function index(){
        $this->webConfig();

        // load the model
        $this->load->model('StudentDataModel','oStudentModel');

        $aAllStudents = $this->oStudentModel->allStudentsData();

        // instantiate object of course
        $this->load->library('oefphp/course', 'oCourse');

        $this->oCourse->createCourse('q45789', 'PHP');

        $iCount = 0;

        foreach ($aAllStudents as $aStudent) {
            $sStudent = "student".$iCount++;
            $this->load->library('oefphp/student', $sStudent, $aStudent);
            $this->$sStudent->createStudent($aStudent);
            $this->oCourse->createCourseStudent($this->$sStudent);
        }

        $this->view->assign('oCourse', $this->oCourse);

        $sHtmlContent = $this->view->fetch('partialviews/course/photolistView');

        $this->view->assign('sContent', $sHtmlContent);

        $this->view->display('indexView');
    }
}
