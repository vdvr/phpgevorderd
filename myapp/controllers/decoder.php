<?php
use function \ict\html\number_to_euro;

/**
 * decoder.php
 *
 * decoder application controller
 *
 * @package		TinyMVC
 * @author		Stefan Segers
 * 
 * @property WebconfigModel $oWebconfigData
 * @property NavigationModel $oNavigationData
 * @property DecoderModel $oDecoderData
 * 
 */

class DecoderController extends TinyMVC_Controller
{
    public function __construct() 
    {
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

        //load script libraries
        $this->load->script('ict/encryption/helpers');
        $this->load->model('DecoderModel','oDecoderData');

        $sMessage = "vul hier de te coderen/decoderen tekst in";

        if (isset($_POST["encryptFormSubmitBtn"])){
            $sMessage = $_POST["encryptFormMessage"];
            if ($_POST["encryptFormSubmitBtn"] == "codeer") {
                $sEncryptedMessage = $this->oDecoderData->encryptText($sMessage);
            }else{
                $sEncryptedMessage = $this->oDecoderData->decryptText($sMessage);
            }
        }else{
            $sEncryptedMessage = "hier komt de gecodeerde/gedecodeerde tekst te staan";
        }

        // assign data to the view
        $this->view->assign('sMessage',$sMessage);
        $this->view->assign ('sEncryptedMessage',$sEncryptedMessage);
        $sHtmlContent = $this->view->fetch('partialviews/encryptie/encryptformView');

        $this->view->assign('sContent',$sHtmlContent);
        $this->view->display('indexView');
   
    }
}

?>
