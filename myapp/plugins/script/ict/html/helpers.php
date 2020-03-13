<?php namespace stefan\html ;
/**
 * formats a number in Euro format
 * 
 * formtats a number into decimal and thousands preceded by the euro sign.
 * <br>for example :
 * o 12.47 will be € 12,47
 * o 1412,756 will be € 1.412,76
 * 
 * @package stefan\html\helpers
 * @author Stefan Segers <stefan.segers@ucll.be>
 * @version 1.0
 * @param float $fltNumber The number being formatted
 * @return string The Euro Formatted number
 * 
 */

function number_to_euro($fltNumber = 0){
    if (is_numeric($fltNumber)){
        $strEuroNumber = '&euro;'.' '.number_format($fltNumber, 2, ',', '.');
        return $strEuroNumber;
    }else{
        trigger_error('the value of $fltNumber is no number', E_USER_NOTICE);
        return false;
    }
     
}

/**
 * formats a navigation list model based on a array of menuitems
 * 
 *  
 * @package stefan\html\helpers
 * @author Stefan Segers <stefan.segers@ucll.be>
 * @version 1.0
 * @param array $aMenuItems The array containing the menu items
                <br>$arrMenuItems = array(
                <br>    "MenuText" => array(
                <br>            ‘visible’ => ‘boolean that indicates that the menuitem is visible’
                <br>            'controller'=>'controllername' ,
                <br>            'action' => 'name of controller method',
                <br>            'accessLevel' =>'number according to the access level',
                <br>           'submenu' => 'array with the same structure as arrMenuItems or false if no submenu is present’,
                <br>           ),
 *              <br>)
 * 
 * @param int $iAccessLevel The accessLevel of the visitor
 * @return string The menustructure as list model
 * 
 */

function navigationMenuList($aMenuItems,$iAccessLevel=0){
     
    $sMenuItemsList = "<ul> \n ";
    foreach ($aMenuItems as $sMenuText => $aMenuProperties){
        if ($aMenuProperties['visible'] == True){
            if ($iAccessLevel >= $aMenuProperties['accessLevel']) {
                $sMenuItemsList .= '<li><a href="'.WEBROOT.'index.php'.DS.$aMenuProperties['controller']. DS. 
                     $aMenuProperties['action']. DS.'">'.$sMenuText."</a>\n";
            }              
            if ($aMenuProperties['submenu']!=false){
                $sMenuItemsList .= navigationMenuList ($aMenuProperties['submenu'],$iAccessLevel);

            }else{
                $sMenuItemsList .= "</li>\n";
            }        
        }
    }
    $sMenuItemsList .= "</ul>\n";
    return $sMenuItemsList;
}
/**
 * get accesslevel for specific controller out of the array of menuitems
 * 
 *  
 * @package stefan\html\helpers
 * @author Stefan Segers <stefan.segers@ucll.be>
 * @version 1.0
 * @param string $sController the controller to search for
 * @param array $aMenuItems The array containing the menu items
                <br>$arrMenuItems = array(
                <br>    "MenuText" => array(
                <br>            ‘visible’ => ‘boolean that indicates that the menuitem is visible’
                <br>            'controller'=>'controllername' ,
                <br>            'action' => 'name of controller method',
                <br>            'accessLevel' =>'number according to the access level',
                <br>           'submenu' => 'array with the same structure as arrMenuItems or false if no submenu is present’,
                <br>           ),
 *              <br>)
 * 
 * 
 * @return integer The accesslevel
 * 
 */
function getAccesLevel($sController, $aMenuItems) {
    foreach ($aMenuItems as $sMenuText => $aMenuProperties){
	if ($aMenuProperties['controller'] == $sController){
            $iAccessLevel = $aMenuProperties['accessLevel'];
        }elseif($aMenuProperties['submenu']!=false){
            $iAccessLevel = getAccesLevel($sController, ($aMenuProperties['submenu']));
        }
    }
    if (isset($iAccessLevel)){
        return $iAccessLevel;
    }else{
        return false;
    }
}
/**
 * Drop-down Select List
 *
 * @package stefan\html\helpers
 * @author Stefan Segers <stefan.segers@ucll.be>
 * 
 * @param	string	$sName  name and id from select tag
 * @param	array	$aOptions a key=>value array of which the key = ‘option value’ and value = text shown
 * @param	array	$aSelected array with items to be marked as selected
 * @param	mixed	$vParams A key => value array or a string that allows you to set optional features of a selection tag
 * @return	string  html code dropdown select list
 */

function formSelect($sName, $sId, $aOptions, $aSelected = '', $vParams = ''){
    $sSelected = '';
    //attributen uit de $vParams halen
    if (is_array($vParams)){
        $sAtts = '';
        foreach ($vParams as $sKey => $sVal){
                $sAtts .= ' '.$sKey.'="'.$sVal.'"';
        }
    }
    if (is_string($vParams)){
            $sAtts = ' '.$vParams;
    }
    if (is_array($aSelected)){
        // set attribuut multiple if aSelected has more dan one value and multiple is not set
        $sMultiple = (count($aSelected) > 1 && stripos($sAtts, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
        // create html code for dropdown select list
        $sHtmlSelectList = '<select id = "'.$sId.'" name="'.$sName.'"'.$sAtts.$sMultiple.">\n";
    }
    $sHtmlSelectList = '<select id = "'.$sId.'" name="'.$sName.'"'.$sAtts.">\n";
    

    foreach ($aOptions as $sKey => $sValue) {
        if (is_array($aSelected)){ 
            $sSelected = in_array($sKey, $aSelected) ? ' selected="selected"' : '';
        }
        $sHtmlSelectList .= '<option value="'.esc($sKey).'"'.$sSelected.'>' 
            .(string) $sValue."</option>\n"; 
    }
    $sHtmlSelectList .= '</select>';
    return $sHtmlSelectList;
}

function esc($string) {
  return htmlentities($string);
}

?>
