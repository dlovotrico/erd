<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }

/**
 * <h1>Settings file</h1>
 * User configuration arrays and variables
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li>During execution, this file is retrieved by <em><code>models/info.php</code></em></li>
 *   <li>for processing and then its contents are made available through the <code>Info()</code> class.</li>
 *   <li>A third kind of configuration options presented here are by passing values to PHP's own configuration functions.</li>
 * </ul> 
 * 
 * 
 * 
 * 
 * @author       Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version      0.1
 * @since        0.1
 * 
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