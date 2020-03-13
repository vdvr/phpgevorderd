<?php
if(!defined('TMVC_BASEDIR')){
    die("dit is niet toegestaan");
}

/**
 * lotto_model.php
 *
 * lotto model
 *
 * @package		OefeningenPhp
 * @author		Stefan Segers
 */

class LottoModel extends TinyMvc_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lottogetallen(){
        $iNumberOfGrids = 12;
        $iNumberOfNumbers = 6;
        $aLottoNumbers = range(1,42);
        for ($iGridcounter = 1; $iGridcounter <= $iNumberOfGrids; $iGridcounter++){
            $aLottoNumbersPerGrid[$iGridcounter]= array_rand($aLottoNumbers,$iNumberOfNumbers);
        } 
        
        return $aLottoNumbersPerGrid;
    }
}