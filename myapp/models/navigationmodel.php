<?php

/**
 * Description of navigationModel
 *
 * @author u0067341
 */
class NavigationModel extends TinyMVC_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function htmlListNavigation(){
        $sHtmlList = "<li> <a href='".WEBROOT."index.php/default' title='homepage'>home</a><li>"
                    ."<li> <a href='".WEBROOT."index.php/opgave1' title='oefening1'>opgave 1</a><li>"
                    ."<li> <a href='".WEBROOT."index.php/lottoform' title='quick pick'>lotto form</a><li>"
                    ."<li> <a href='".WEBROOT."index.php/studentfiche' title='fiche'>student fiche</a><li>";
        return $sHtmlList;
    }
    
    public function getMenuArray(){
       $aMenuItems = array(
        "home" => array(
            'visible' => true,
            'controller'=>'' ,
            'action' => '',
            'accessLevel' => 0 ,
            'submenu' => array(
                "home" => array(
                    'visible' => true,
                    'controller'=>'' ,
                    'action' => '',
                    'accessLevel' => 0 ,
                    'submenu' => false
                    ),
                "oefening1" => array(
                    'visible' => true,
                    'controller'=>'oefening1' ,
                    'action' => 'index',
                    'accessLevel' => 0 ,
                    'submenu' =>  array(
                        "home" => array(
                            'visible' => true,
                            'controller'=>'' ,
                            'action' => '',
                            'accessLevel' => 0 ,
                            'submenu' => false),
                        ),
                    ),
                ),
            ),
        "opgave1" => array(
            'visible' => true,
            'controller'=>'opgave1' ,
            'action' => '',
            'accessLevel' => 0 ,
            'submenu' => false),
        "lotto" => array(
            'visible' => true,
            'controller'=>'lottoform' ,
            'action' => '',
            'accessLevel' => 0 ,
            'submenu' => false),
        "studentfiche" => array(
            'visible' => true,
            'controller'=>'studentfiche' ,
            'action' => '',
            'accessLevel' => 0 ,
            'submenu' => false),
        "decoder" => array(
        'visible' => true,
        'controller'=>'decoder' ,
        'action' => '',
        'accessLevel' => 0 ,
        'submenu' => false)
           );
       return $aMenuItems;
    }
}