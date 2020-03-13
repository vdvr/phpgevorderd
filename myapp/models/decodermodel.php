<?php

/**
 * decoder_model.php
 *
 * decoder model
 * dit model codeert een bericht volgens de enkelvoudige           *
 * substitutie met een opgegeven sleutel of translatietabel.          *
 * parameters   strOrigineelBericht (het te coderen bericht)                   *
 *              strAlfabet (de originele letters)                     *
 *              strSleutel (de sleutel voor het coderen)    
 * @author	Stefan Segers
 */

class DecoderModel extends TinyMVC_Model
{
  function encryptText($sMessage)
  {
    return \stefan\encryption\encrypt($sMessage);
    
  }
  
  function decryptText($sMessage)
  {
    
    return \stefan\encryption\decrypt($sMessage);
    
  }
}
?>
