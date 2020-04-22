<?php

/**
 * Name:       TinyMVC
 * About:      An MVC application framework for PHP
 * Copyright:  (C) 2007-2008 Monte Ohrt, All rights reserved.
 * Author:     Monte Ohrt, monte [at] ohrt [dot] com
 * License:    LGPL, see included license file  
 ***/

// ------------------------------------------------------------------------

/**
 * TinyMVC_Load
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */

class TinyMVC_Load
{
 	/**
	 * class constructor
	 *
	 * @access	public
	 */
  function __construct() { }

	/**
	 * model
	 *
	 * load a model object
	 *
	 * @access	public
	 * @param   string $model_name the name of the model class
	 * @param   string $model_alias the property name alias
	 * @param   string $filename the filename
	 * @param   string $pool_name the database pool name to use
	 * @return  boolean
	 */    
  public function model($model_name,$model_alias=null,$filename=null,$pool_name=null)
  {

    /* if no alias, use the model name */
    if(!isset($model_alias))
      $model_alias = $model_name;

    /* if no filename, use the lower-case model name */
    if(!isset($filename))
      $filename = strtolower($model_name) . '.php';

    if(empty($model_alias))  
      throw new Exception("Model name cannot be empty");

    if(!preg_match('!^[a-zA-Z][a-zA-Z0-9_]+$!',$model_alias))
      throw new Exception("Model name '{$model_alias}' is an invalid syntax");
      
    if(method_exists($this,$model_alias))
      throw new Exception("Model name '{$model_alias}' is an invalid (reserved) name");

    /* get instance of controller object */
    $controller = tmvc::instance(null,'controller');
    
    /* model already loaded? silently skip */
    if(isset($controller->$model_alias))
      return true;
    
    /* instantiate the object as a property */
    $controller->$model_alias = new $model_name($pool_name);
    
    return true;
      
  }

	/**
	 * library
	 *
	 * load a library plugin
	 *
	 * @access	public
	 * @param   string $lib_name the library name = full qualified class name
	 * @param   string $alias the property name alias
         * @param   variant $args optional multiple arguments for class constructor
	 * @return  boolean
	 */    
  public function library($lib_name,$alias=null,...$args)
  {

    $lib_name = strtolower($lib_name);
    /* split the full qualified class name into namespace and class name */
     $classname_parts = explode(DS, $lib_name);
     $classname = array_pop($classname_parts);
     $namespace = implode(DS,$classname_parts);
     
    /* if no alias, use the class name as alias */
    if(!isset($alias))
      $alias = $classname;

    if(empty($alias))  
      throw new Exception("Library name cannot be empty");

    if(!preg_match('!^[0-9a-zA-Z][a-zA-Z0-9_]*$!',$alias))
      throw new Exception("Library name '{$alias}' is an invalid syntax");
      
    if(method_exists($this,$alias))
      throw new Exception("Library name '{$alias}' is an invalid (reserved) name");
    
    /* get instance of tmvc object */
    $controller = tmvc::instance(null,'controller');    

    /* library already loaded? silently skip */
    if(isset($controller->$alias)){
        if ($controller->$alias instanceof $namespace.DS.$classname) {
            return true;

        }else{
            throw new Exception("Library name '{$alias}' is already used");
        }
    }
    
    /* check if file exists in plugins/library and load the file
     * else it is TinyMVC_Library
     */  
    $path_of_library = TMVC_MYAPPDIR . 'plugins' . DS . 'library' . DS . $lib_name . '.php';
    if (file_exists($path_of_library)){
        include_once $path_of_library;
        if ($namespace != ""){
            $class = $namespace."\\".$classname; 
        }else{
            $class = $classname;
        }
        
    }else{ //tinyMVC_Library
        $class = "TinyMVC_Library_{$lib_name}";
    }
    $oReflectionClass = new ReflectionClass($class);
    
    if (($args != null)&&($oReflectionClass->getConstructor() != null)){
        $controller->$alias = $oReflectionClass->newInstanceArgs($args);
        return true;
    }else{
        $controller->$alias = $oReflectionClass->newInstance();
        return true;
    }

}

	/**
	 * script
	 *
	 * load a script plugin
	 *
	 * @access	public
	 * @param   string $script_name the full qualified script name
	 * @return  boolean
	 */    
  public function script($script_name)
  {

    /* split the full qualified script name into dir and script name */
    $scriptname_parts = explode(DS, $script_name);
    $file = array_pop($scriptname_parts);
    $dir = implode(DS,$scriptname_parts);
    if(!preg_match('!^[a-zA-Z][a-zA-Z_]+$!',$file))
      throw new Exception("Invalid script name '{$file}'");

    $path_of_script = TMVC_MYAPPDIR . 'plugins' . DS . 'script' . DS . $script_name . '.php';
    try {
      require_once($path_of_script);
    } catch (Exception $e) {
      throw new Exception("Unknown script file '{$file}'");      
    }
      
  }

	/**
	* database
	*
	* returns a database plugin object
	*
	* @access	public
	* @param	string $poolname the name of the database pool (if NULL default pool is used)
	* @return	object
	*/
  public function database($poolname = null) {
    static $dbs = array();
    /* load config information */
    include('config_database.php');
    if(!$poolname) 
      $poolname=isset($config['default_pool']) ? $config['default_pool'] : 'default';
    if ($poolname && isset($dbs[$poolname]))
    {
      /* returns object from runtime cache */
	    return $dbs[$poolname];
    }
    if($poolname && isset($config[$poolname]) && !empty($config[$poolname]['plugin']))
    {
      /* add to runtime cache */
      $dbs[$poolname] = new $config[$poolname]['plugin']($config[$poolname]);
      return $dbs[$poolname];
     }
  }  
  
}

?>
