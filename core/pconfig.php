<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }



/**
 * <h1>User configuration arrays and variables</h1>
 * - During execution, this file is retrieved by <em><strong>models/info.php</strong></em> 
 *   for processing and then its contents are made available through the Info() class tool.
 *
 *  - This file contains <strong>internal configuration options</strong> defininf many aspects
 *    of the program's internal configuration.
 * 
 * 
 * 
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
 */



##
##--------------------------------------------------------------------[METADATA AND AUTHORSHIP]
##
define('INFO_VERSION',   '0.1 alpha');
define('INFO_AUTHOR',    'Diego Lovótrico');
define('INFO_COPYRIGHT', 'Creative Commons License');





##
##--------------------------------------------------------------------[AVAILABLE CONTRLLERS]
##
$controllers['default'] = 'frontpage';          // Controlador por defecto a cargar.
$controllers['public']  = 'frontpage|test';     // must be written in lower case.