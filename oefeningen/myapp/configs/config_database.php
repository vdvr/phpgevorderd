<?php

/**
 * database.php
 *
 * application database configuration
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */
$config['default']['useDb'] 		= true;
$config['default']['plugin'] 		= 'TinyMVC_PDO'; 	// plugin for db access TinyMVC_PDO, TinyMVC_RB
$config['default']['type'] 			= 'mysql';      	// connection type
$config['default']['host'] 			= 'localhost';  	// db hostname
$config['default']['name'] 			= 'oefeningen_php';    	// db name
$config['default']['user'] 			= 'oefeningen';    		// db username
$config['default']['pass'] 			= 'eloict';  				// db password
$config['default']['persistent']	= false;  			// db connection persistence?

?>
