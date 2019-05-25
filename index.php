<?php

/**
 * <h1>START POINT</h1>
 * This interface calls <em>init()</em> which is the app's loading module, also called the INIT CORE. Besides 
 * defining some path information this file doesn't do much else other than instantiating the Init() 
 * bootstrapper core.
 *
 *   
 * <h2>ADDITIONAL INFORMATION<h2>
 *   * core/config.php  - contains all the configuration data.
 *                      - config params are loaded into the system 
 *                        by: core/controllers/Info()
 * 
 *   * Init             - init is the bootstrap, it initializes the
 *                        program and all its subsystems. 
 *
 *  
 * ----
 * 
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>
 * 
 * @category    Bootstrap
 * @category    System, Init 
 *                      
 * @version     0.1
 * @since       0.1
 */




// --------> [PATHS]
define('CORE_PATH',     'core/');
define('CONTENT_PATH',  'content/');
// --------> [SUBPATHS]
define('CONTROLLERS_PATH',  CORE_PATH.'controllers/');
define('MODELS_PATH',       CORE_PATH.'models/');
define('VIEWS_PATH',        CORE_PATH.'views/');
define('LIBS_PATH',         CORE_PATH.'libs/');
define('TOOLS_PATH',        CORE_PATH.'tools/');


// --------> [ROOT EXECUTION]
define('FROM_INDEX',     1);




// --------> [SYSTEM INITIALIZATION.]
/*
 * @todo handle exception if the file doesn't exist.
 */

require_once CORE_PATH.'init.php';
$init = new Init();