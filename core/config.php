<?php

/**
 * <h1>Configuration arrays and variables</h1>
 * - This file exists only to make configuration easy and confortable.
 * - <strong>Many configuration options are set as constants, these are widely 
 *   accessible through all the programs.</strong>
 * - During execution, this file is retrieved by <em><strong>models/info.php</strong></em> 
 *   for processing and then the configuration arrays and variables <strong>
 *   which arent constants</strong> and made them available throug the Info() 
 *   class tool.
 * - A third kind of configuration options presented here are by passing values
 *   to PHP's own configuration functions.
 * 
 * 
 * <h2>Accessing the configuration</h2>
 * - Constants: can be called directly.
 * - Arrays: can be called through: 
 * - <em>Info()->getConfigVars($cfgvar)</em> : retrieves the general cfg vars. 
 * - <em>Info()->getDbInfo($credential)</em> : retrieves the DB configuration
 *                                             data in a one by one basis.
 * 
 * ----
 * 
 * 
 * @author       Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version      0.1
 * @since        0.1
 * 
 * 
 * ----
 * 
 * 
 * @todo         Change reading permissions 
 * 
 */


##
##--------------------------------------------------------------------[EXECUTION VARIBLES]
##
define('APP_PATH',          '/');      // *** APP BASE-PATH ***

define('CFG_ERROR_LEVEL',   3);
error_reporting(E_ALL & ~E_NOTICE);
define('CFG_RUN_MODE',      'deployment');
date_default_timezone_set('America/Argentina/Buenos_Aires');

// define('CACHING_MODE',      'off');          // - To be implemented.



##
##--------------------------------------------------------------------[METADATA AND AUTHORSHIP]
##
define('INFO_VERSION',   '0.1 alpha');
define('INFO_AUTHOR',    'Diego Lovótrico');
define('INFO_COPYRIGHT', 'Creative Commons License');




##
##--------------------------------------------------------------------[AVAILABLE CONTRLLERS]
##
/*
 * @todo Why is default in upper case? 
 */
$controllers['default'] = 'Frontpage';          // Controlador por defecto a cargar.
$controllers['public']  = 'frontpage|test';     // must be written in lower case.






##
##--------------------------------------------------------------------[THEMING AND VIEWS]
##
define('THEME_PATH',        CONTENT_PATH.'themes/v1/');





##
##--------------------------------------------------------------------[DATABASE CONFIGURATION]
##
$database['host'] = 'def';
$database['user'] = 'daf';
$database['pass'] = 'dif';

// $database['lib'] = '';       // - Implementar más adelante.