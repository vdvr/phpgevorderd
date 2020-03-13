<?php

class Lotto2Model extends TinyMVC_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lottogetallen() {
        $iNumberOfGrids = 12;
        $iNumberOfNumbers = 6;
        for ($iGridCounter = 1; $iGridCounter <= $iNumberOfGrids; $iGridCounter++){
            for ($iNumberCounter = 1; $iNumberCounter <= $iNumberOfNumbers; $iNumberCounter++){
                do {
                    $bNumberExist = false;
                    $iRandomNumber = rand(1, 42);
                    if ($iNumberCounter == 1){
                        $aNumbersPerGrid[$iGridCounter][$iNumberCounter] = $iRandomNumber;
                    }else{
                        foreach ($aNumbersPerGrid[$iGridCounter] as $iCurrentNumber){
                            if ($iCurrentNumber == $iRandomNumber){
                                $bNumberExist = true;
                            }
                        }                        
                    }           
                } while ($bNumberExist);
                $aNumbersPerGrid[$iGridCounter][$iNumberCounter] = $iRandomNumber;
            }       
        }
        return $aNumbersPerGrid;
    }
}