<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


/**
 * <h1>INTERNAL PROGRAM CONFIGURATION</h1>
 * - Internal configuration options. 
 * 
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
##--------------------------------------------------------------------[METADATA AND AUTHORSHIP]
##
define('INFO_VERSION',   '0.1 alpha');
define('INFO_AUTHOR',    'Diego Lovótrico');
define('INFO_COPYRIGHT', 'Creative Commons License');





##
##--------------------------------------------------------------------[AVAILABLE CONTRLLERS]
##

# - Accepted controller domains: default, public, private. 
# - Any other domain will be ignored.
$controllers['default'] =   array();          // Default controller
$controllers['public']  =   'frontpage|test';     
$controllers['private'] =   'admin';
