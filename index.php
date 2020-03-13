<?php

/***
 * Name:       TinyMVC
 * About:      An MVC application framework for PHP
 * Copyright:  (C) 2007, New Digital Group Inc.
 * Author:     Monte Ohrt, monte [at] ohrt [dot] com
 * License:    LGPL, see included license file  
 ***/

/* PHP error reporting level, if different from default */
error_reporting(E_ALL);

/* directory separator alias */
if(!defined('DS'))
  define('DS','/');

/* if the webroot is different from "/",uncomment and set here */
define ('WEBROOT',dirname($_SERVER['SCRIPT_NAME']).DS);

/* if the /tinymvc/ dir is not up one directory, uncomment and set here */
# define('TMVC_BASEDIR',dirname(__FILE__) . DS . '..' . DS .'..' . DS . 'tinymvc' . DS);
define('TMVC_BASEDIR',dirname(__FILE__) . DS . DS . 'tinymvc' . DS);

/* if the /myapp/ dir is not inside the /tinymvc/ dir, uncomment and set here */
define('TMVC_MYAPPDIR',dirname(__FILE__).DS .'myapp'. DS );

/* define to 0 if you want errors/exceptions handled externally */
define('TMVC_ERROR_HANDLING', 0);

/* set the base directory */
if(!defined('TMVC_BASEDIR'))
  define('TMVC_BASEDIR',dirname(__FILE__) . DS . '..' . DS . 'tinymvc' . DS);
/* include main tmvc class */
require(TMVC_BASEDIR . 'sysfiles' . DS . 'TinyMVC.php');

/* instantiate */
$tmvc = new tmvc();

/* tally-ho! */
$tmvc->main();

?>
