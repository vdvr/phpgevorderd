<?php

use vdvr\menus;


class NavigationModel extends TinyMVC_Model {
    public function __construct() {
        parent::__construct();
        $a = TRUE;
    }
    
    public function htmlListNavigation() {
        $aMenuStructure = array(
            "Home" => array(
                'visible' => true, 
                'controller' => 'default',
                'action' => '', 
                'accessLevel' => 0,
                'submenu' => false
            ),
            "Oefening 1" => array(
                'visible' => true, 
                'controller' => 'oefening1',
                'action' => '', 
                'accessLevel' => 0,
                'submenu' => false
            ),
            "Lotto" => array(
                'visible' => true, 
                'controller' => 'lotto',
                'action' => '', 
                'accessLevel' => 1,
                'submenu' => false
            ),
            "Fiche" => array(
                'visible' => true, 
                'controller' => 'studentfiche',
                'action' => '', 
                'accessLevel' => 2,
                'submenu' => false
            ),
            "Foto's" => array(
                'visible' => true, 
                'controller' => 'photolist',
                'action' => '', 
                'accessLevel' => 2,
                'submenu' => false
            ),
            "Course's" => array(
                'visible' => true, 
                'controller' => 'createcourse',
                'action' => '', 
                'accessLevel' => 2,
                'submenu' => false
            ),
            "Functies" => array(
                'visible' => true, 
                'controller' => '#',
                'action' => '', 
                'accessLevel' => 0,
                'submenu' => array(
                    "SubmenuItem1" => array(
                        'visible' => true, 
                        'controller' => '#',
                        'action' => '', 
                        'accessLevel' => 0,
                        'submenu' => array(
                            "SubmenuItem1_1" => array(
                                'visible' => true, 
                                'controller' => '#',
                                'action' => '', 
                                'accessLevel' => 0,
                                'submenu' => false
                            ),
                            "SubmenuItem1_2" => array(
                                'visible' => true, 
                                'controller' => '#',
                                'action' => '', 
                                'accessLevel' => 0,
                                'submenu' => false
                            )
                        )
                    ),
                    "SubmenuItem2" => array(
                        'visible' => false, 
                        'controller' => '#',
                        'action' => '', 
                        'accessLevel' => 0,
                        'submenu' => false
                    ),
                    "SubmenuItem3" => array(
                        'visible' => true, 
                        'controller' => '#',
                        'action' => '', 
                        'accessLevel' => 3,
                        'submenu' => array(
                            "SubmenuItem3_1" => array(
                                'visible' => false, 
                                'controller' => '#',
                                'action' => '', 
                                'accessLevel' => 0,
                                'submenu' => false
                            ),
                            "SubmenuItem3_2" => array(
                                'visible' => true, 
                                'controller' => '#',
                                'action' => '', 
                                'accessLevel' => 5,
                                'submenu' => false
                            ),
                            "SubmenuItem3_3" => array(
                                'visible' => true, 
                                'controller' => '#',
                                'action' => '', 
                                'accessLevel' => 0,
                                'submenu' => false
                            )
                        )
                    )
                )
            )
        );
        
        return menus\navigationMenuList($aMenuStructure, 5);
    }
}