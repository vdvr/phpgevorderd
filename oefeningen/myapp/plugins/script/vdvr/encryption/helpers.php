<?php

/**
 * 
 * @param type $sMessage
 */

function encrypt($sMessage) {
    $sAlphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 .,?!";
    $sKey = "xwhf!VG8ZKeXgEFzku0J6RpN tMSA1i?53YBCUHOmL9lv.oIarTPWqDdy2nc,4bQsj7";
    $sResult = "";
    
    for ($i = 0; $i < strlen($sMessage); $i++) {
        if (strpos($sAlphabet, $sMessage[$i]) !== FALSE) {
            $sResult .= $sKey[strpos($sAlphabet, $sMessage[$i])];
        } else {
            $sResult .= $sMessage[$i];
        }
    }
    
    return $sMessage;
}

/**
 * 
 * @param type $sMessage
 */

function decrypt($sMessage) {
    $sAlphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 .,?*/!@#$%^&*(){}[]|:;'";
    $sKey = "pbnx8mtfom3h&!uhzq0}fv ]czpa2wt[q1^nd4*ry.|beei)(7yovdl*/rj56:;sw4{u,jks9i#lakc'gx@";
    
    for ($i = 0; $i < strlen($sMessage); $i++) {
        if (strpos($sKey, $sMessage[$i]) !== FALSE) {
            $sResult .= $sAlphabet[strpos($Key, $sMessage[$i])];
        } else {
            $sResult .= $sMessage[$i];
        }
    }
    
    return $sMessage;
}