<div id="lottoformContainer">
    <div id="lottoformHeader"></div>
    
        <div id="lottoformLeftsidebar"></div>
        
        <div id="lottoformRightsidebar"></div>

        <div id="lottoformContent">
            <?php $iGridMaxRows = 2;
                $iGridMaxCols = 6;
                $iMaxNumber = 42;
                $iTableMaxCols = 5;
                $iTableMaxRows = ceil($iMaxNumber / $iTableMaxCols); ?>
            
            <table class="lottoform">
                <?php for ($iGridRow = 0; $iGridRow < $iGridMaxRows; $iGridRow++) { ?>
                    <tr>
                        <?php for ($iGridCol = 0; $iGridCol < $iGridMaxCols; $iGridCol++) {
                            $iGrid = $iGridRow * $iGridMaxCols + $iGridCol; ?>
                        <td>
                            <table class="lottoformGrid">
                                <?php for ($iRow = 0; $iRow < $iTableMaxRows; $iRow++) { ?>
                                    <tr>
                                        <?php for ($iCol = 1; $iCol <= $iTableMaxCols; $iCol++) {
                                            $iCell = $iRow * $iTableMaxCols + $iCol;
                                            if ($iCell <= $iMaxNumber) { ?>
                                                <?php if (in_array($iCell, $aNumbersPerGrid[$iGrid])) { ?>
                                                    <td class="highlightFormat">
                                                <?php } else { ?>
                                                    <td class="standardFormat">
                                                <?php }
                                                    echo $iCell ?>
                                                </td>
                                            <?php }
                                        } ?>
                                    </tr>
                                <?php } ?>
                            </table>
                        </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>

    
    <div id="lottoformFooter"></div>
</div>