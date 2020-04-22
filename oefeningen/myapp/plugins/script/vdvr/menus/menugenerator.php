<?php
namespace vdvr\menus;

/**
 * navigationMenuList
 * 
 * Function to generate a html string based on input menu structure.
 * 
 * @author      Van Der Veken Ronan
 * @since       1.0.0
 * 
 * @param       array   $aMenuItems     structure of the menu: $aMenuItems = array("MenuText" => array ('visible' => 'bool', 'controller' => 'controller name',
 *                                                                                                      'action' => 'controler method name', 'accessLevel' => 'access level',
 *                                                                                                      'submenu' => 'array with same structure or false if not'),
 *                                                                                 "Menu2" => ... );
 * @param       integer $iAccessLevel   access level of the user
 * @return      string                  html structure of the menu
 */

function navigationMenuList($aMenuItems, $iAccessLevel = 0) {
    
    $sMenuStructure = "<ul>";
    
    foreach ($aMenuItems as $sMenuName => $aMenuProperties) {
        if (($aMenuProperties["visible"] == true) && ($aMenuProperties["accessLevel"] <= $iAccessLevel)) {
            $sSubmenuStructure = $aMenuProperties["submenu"] !== false ? navigationMenuList($aMenuProperties["submenu"], $iAccessLevel) : "";
            $sMenuStructure .= "".
                "<li>".
                    "<a href=".WEBROOT."index.php/".$aMenuProperties["controller"]."/".$aMenuProperties["action"].">".$sMenuName."</a>".
                    $sSubmenuStructure.
                "</li>";
        }
    }
    
    $sMenuStructure .= "</ul>";
    
    return $sMenuStructure; 
}

