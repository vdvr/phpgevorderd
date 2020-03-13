<?php namespace stefan\encryption ;

/**
 * encrypt a message
 * 
 * @package stefan\encryption
 * @author Stefan Segers <stefan.segers@ucll.be>
 * @param string $sMessage The message to be encrypted
 * @return string The encrypted message
 * 
 */

function encrypt($sMessage)
{
    $sAlphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $sKey = "portezcwhiskyauvxjgblndqfmPORTEZCWHISKYAUVXJGBLNDQFM";
    $sEncryptedMessage = strtr($sMessage,$sAlphabet,$sKey);
    return $sEncryptedMessage;
}
function decrypt($sMessage)
{
    $sAlphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $sKey = "portezcwhiskyauvxjgblndqfmPORTEZCWHISKYAUVXJGBLNDQFM";
    $sDecryptedMessage = strtr($sMessage,$sKey,$sAlphabet);
    return $sDecryptedMessage;
}
?>