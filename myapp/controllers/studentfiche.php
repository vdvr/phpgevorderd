<?php

/**
 * studentfiche.php
 *
 * studentfiche controller
 *
 * @package		TinyMVC
 * @author		Stefan Segers
 * 
 * 
 * @property WebConfigModel $oWebConfigData
 * @property NavigationModel $oNavigationData
 * @property StudentDataModel $oStudentData
 * 
 */
class studentficheController extends TinyMVC_Controller
{
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
    
    public function index()
    {   
        $this->webConfig();
        //Load the model
        $this->load->model("studentDataModel", "oStudentData");
        $bEditMode = false;
        //check input
        if(isset($_GET["ID"])){
            $sStudentId = $_GET["ID"];
        }
        if(isset($_POST["studentFicheEditBtn"])){
            $bEditMode = true;
        }elseif(isset($_POST["editStudentFicheSaveBtn"])){
            $aStudentData[0] = $_GET["ID"];
            $aStudentData[1] = $_POST["editStudentFormName"];
            $aStudentData[2] = $_POST["editStudentFormBirthDate"];
            $aStudentData[3] = $_POST["editStudentFormAddress"];
            $aStudentData[4] = $_POST["editStudentFormCity"];
            $aStudentData[5] = $_POST["editStudentFormEmail"];
            $aStudentData[6] = $_POST["editStudentFormPhone"];
            $aStudentData[7] = $_POST["editStudentFormMobile"];
            $this->oStudentData->updateStudentData($aStudentData);
            $bEditMode = false;
        }else {
            $bEditMode = false;
        }
        
        if ($bEditMode){
            $sView = "partialviews/studentfiche/editstudentficheview";
            $sHtmlContent = "";
        }else {
            $sView = "partialviews/studentfiche/studentficheview";
            $aListOfStudents = $this->oStudentData->getListOfStudents();
            // assign data to the parcial view
            $this->view->assign("aListOfStudents", $aListOfStudents);
            // fetch the parcial view
            $sHtmlContent = $this->view->fetch("partialviews/studentfiche/studentselectlistview");
        }
        if(isset($sStudentId)){
            // use model to gatter data
            $vStudentData = $this->oStudentData->getStudentData($sStudentId);        
            // assign data to the parcial view
            if ($vStudentData === false){
                $sHtmlContent .= "er kunnen geen gegevens worden gevonden";
            }else{
                $this->view->assign("aStudentData", $vStudentData);
                // fetch the parcial view
                $sHtmlContent .= $this->view->fetch($sView);
            }
        }
        
        // assign data to the mainview
        $this->view->assign("sContent",$sHtmlContent);
        // display the view
        $this->view->display('indexView');     
    }
}
?>
