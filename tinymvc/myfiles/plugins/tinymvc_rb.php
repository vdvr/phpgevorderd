<?php

/***
 * Name:       TinyMVC
 * About:      An MVC application framework for PHP
 * Copyright:  (C) 2007-2008 Monte Ohrt, All rights reserved.
 * Author:     Monte Ohrt, monte [at] ohrt [dot] com
 * License:    LGPL, see included license file  
 ***/

// ------------------------------------------------------------------------

/**
 * TinyMVC_RB
 * 
 * RedBeanPHP database access
 * RedBeanPHP 4 requires PHP 5.3.4 or higher.
 * You need to have PDO installed and you need a PDO driver for the database 
 * you want to connect to. Most PHP stacks come with PDO and a bunch of drivers 
 * so this should not be a problem. RedBeanPHP supports a wide range of 
 * relational databases. RedBeanPHP also requires the MB String extension, 
 * once again, this is probably already there. 
 *
 * @package		TinyMVC
 * @author		Stefan Segers
 */

class TinyMVC_RB
{
    function __construct($config) {
    
        if(!class_exists('PDO',false))
            throw new Exception("PHP PDO package is required.");

        if(empty($config))
            throw new Exception("database definitions required.");

        if(empty($config['charset']))
            $config['charset'] = 'utf8';

        if(!empty($config['dsn']))
            $dsn = $config['dsn'];
        elseif($config['type'] == 'sqlsrv')
            $dsn = "{$config['type']}:Server={$config['host']};Database={$config['name']}";
        else
            $dsn = "{$config['type']}:host={$config['host']};dbname={$config['name']}";
       if ($config['useDb'] === TRUE) {
           require_once '../../redbeans/rb.php';
        /* attempt to instantiate PDO object and database connection */
            try {
 
                R::setup(
                        $dsn,
                        $config['user'],
                        $config['pass']); 

            } catch (PDOException $e) {
                throw new Exception(sprintf("Can't connect to PDO database '{$config['type']}'. Error: %s",$e->getMessage()));
            }


        }
    }
  
}

?>
