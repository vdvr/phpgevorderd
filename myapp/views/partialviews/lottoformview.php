<div id="lottoformContainer">
    <div id="lottoformHeader"></div>
    <div id="lottoformLeftsidebar"></div>
    <div id="lottoformRightsidebar"></div>
    
    
    <div id ="lottoformContent">
    <?php
        $iNumberOfGridRows = 2;
        $iNumberOfGridsPerRow = 6;
        for($iGridRowCounter =1; $iGridRowCounter <= $iNumberOfGridRows; $iGridRowCounter++){ ?>
        <table class="lottoformGrid">
        <tr>
            <?php for ($iGridCounter = 1; $iGridCounter <= $iNumberOfGridsPerRow; $iGridCounter++){ ?>
            <td>
            <table class="lottoform">
                <?php for ($iRowCounter = 1; $iRowCounter <= 9; $iRowCounter++){ ?>
                <tr>
                <?php 
                for ($iCelCounter = 1; $iCelCounter <=5; $iCelCounter++){
                    $iCelValue = $iCelCounter +($iRowCounter-1)*5;
                    if (in_array($iCelValue,$aLottoNumbersPerGrid[$iGridCounter])){
                        echo '<td class="highlightFormat">';                                 
                    }else{
                        echo '<td class="standardFormat">'; 
                    } 
                    if ($iCelValue <= 42){                           
                        echo $iCelValue;
                    }
                    echo '</td>';
                }?>
                </tr>
                <?php }?>
            </table>
            </td>
            <?php }?>
        </tr>
        </table>
        <?php } ?>
   
    </div>
    

    <div id="lottoformFooter"></div>
</div>