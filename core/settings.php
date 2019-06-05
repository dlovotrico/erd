<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }

/**
 * <h1>USER SETTINGS</h1>
 * User configuration arrays and variables.
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li>During execution, this file is retrieved by <em><code>models/Program_info.php</code></em></li>
 *   <li>for processing and then its contents are made available through the <code>Program_info()</code> class.</li>
 *   <li>A third kind of configuration options presented here are by passing values to PHP's own configuration functions.</li>
 * </ul> 
 * 
 * 
 * 
 * 
 * @author       D.Lovotrico <dlov@nucleoid.net>
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

error_reporting             (E_ALL & ~E_NOTICE);
date_default_timezone_set   ('Europe/Paris');

define                      ('CFG_ERROR_LEVEL',   3);
define                      ('CFG_RUN_MODE',      'deployment');

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