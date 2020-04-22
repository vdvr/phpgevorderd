<?php
/**
 * createCourse.php
 *
 * createCourse controller
 *
 * @author   Van Der Veken Ronan
 */
class createCourseController extends TinyMVC_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * webconfig()
     *
     * Loads important models for showing title and others
     */
    private function webconfig()
    {
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
    /**
     * showForm()
     *
     */
    public function showForm() 
    {
        $this->load->library('oefphp\course', 'oCourse');
        $this->view->assign('oCourse', $this->oCourse);
        $sHtmlContent = $this->view->fetch('partialviews/addcourse/addcourseView');
        $this->view->assign('sContent', $sHtmlContent);
        $this->view->display('indexView');
    }

    private function createCourse()
    {
        if (!is_null($_POST['courseId']) && !is_null($_POST['courseName'])) {
            $aCourseData['courseId'] = $_POST['courseId'];
            $aCourseData['courseName'] = $_POST['courseName'];
            
            $this->load->model('course', 'oCourse');
            $bSaved = $this->oCourse->saveCourse($aCourseData);
            if ($bSaved)
                $sContent = "Succesvol opgeslagen";
            else
                $sContent = "Er ging iets mis tijdens het opslaan";
        } else {
            $sContent = "Geen geldige invoergegevens";
        }

        $this->view->assign('sContent', $sContent);
        $this->view->display('indexView');
    }

    private function getCourseName($sCourseId)
    {
        $oDb = $this->db->pdo;
        $oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sSqlQuery = "SELECT * FROM courses WHERE courseId=:id";
        $oStmt=$oDb->prepare($sSqlQuery);
        $oStmt->bindParam(':id', $sCourseId, PDO::PARAM_STR);

        try {
            return $oStmt->execute()->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    private function getCourseList()
    {
        $oDb = $this->db->pdo;
        $oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sSqlQuery = "SELECT * FROM courses";
        $oStmt=$oDb->prepare($sSqlQuery);
        try {
            while ($aResult = $oStmt->execute()->fetch(PDO::FETCH_ASSOC))
                ;
            return $aResult;
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function index()
    {
        $this->webconfig();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btnSave'])) {
                $this->createCourse();
            }
        }
        else {
            $this->showForm();
        }
    }
}