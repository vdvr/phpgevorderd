<?php

class lottoformModel extends TinyMVC_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function lottoGetallen()
    {
        $iNumberOfGrids = 12;
        $iNumberOfRands = 6;
        $iGridMaxLen = 42;
        
        $aAvailableNumbers = array_flip(range(1, $iGridMaxLen)); 
        // switch keys and values (array_rand gives key not value, so 0 to 41 otherwise)
        
        for ($iGrid = 0; $iGrid < $iNumberOfGrids; $iGrid++) {
            $aLottoNumbersPerGrid[$iGrid] = array_rand($aAvailableNumbers, $iNumberOfRands);
        }
        
        return $aLottoNumbersPerGrid;
    }
    
    public function badLottoGetallen()
    {
        $iNumberOfGrids = 12;
        $iNumberOfRands = 6;
        $iGridMaxLen = 42;
        
        for ($iGrid = 0; $iGrid < $iNumberOfGrids; $iGrid++) {
            for ($iNumber = 0; $iNumber < $iNumberOfRands; $iNumber) {
                do {
                    $bNumberExist = false;
                    $iRand = rand(1, $iGridMaxLen);
                    
                    if ($iNumber > 0) {
                        foreach ($aLottoNumbersPerGrid[$iGrid] as $iCurrNumber) {
                            if ($iCurrNumber == $iRand) {
                                $bNumberExist = true;
                            }
                        }
                    }
                } while ($bNumberExist);
                
                $aLottNumbersPerGrid[$iGrid][$iNumber] = $iRand;
            }
        }
    }
}
