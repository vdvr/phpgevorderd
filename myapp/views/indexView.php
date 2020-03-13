<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="nl">
    <head>
        <title><?php echo $sTitle; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo WEBROOT?>css/main.css">
    </head>
    <body>
        <!--<div id="wrapper">-->
        <div id="header">
            <h1><?php echo $sTitle ?>
                <span id="big-title"><?php echo $sBigTitle ?></span>
                <span id="sub-title"><?php echo $sSubTitle ?></span></h1>
            <nav>
                <?php echo \stefan\html\navigationMenuList($aMenuItems);?>
            </nav>
        </div>
        <div id="wrapper" class="clear">
<!--            <div id="left-column">
                 
            </div>-->
             <div id="center-column">
                 <?php echo $sContent ?>
            </div>
<!--             <div id ="right-column">
                 
            </div>            -->
        </div>
        <div id ="footer">
                 
        </div>
        <!--</div-->    
    </body>
</html>
        
