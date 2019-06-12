<?php

/**
 * <h1>START POINT</h1>
 * <p>Defines program constant and calls the <em>Init()</em> bootstrapper.</p>
 *
 *
 *
 *
 * @author          D.Lovotrico <dlov@nucleoid.net>
 * 
 * @version         Version 0.1
 * @since           Version 0.1
 *
 * @category        System
 * @category        Program execution
 */


// --------> [PATHS]
define('CORE_PATH',     'core/');
define('CONTENT_PATH',  'content/');
// --------> [SUBPATHS]
define('CONTROLLERS_PATH',  CORE_PATH.'controllers/');
define('MODELS_PATH',       CORE_PATH.'models/');
define('VIEWS_PATH',        CORE_PATH.'views/');
define('INTERNALS_PATH',    CORE_PATH.'internals/');
define('LIBS_PATH',         CORE_PATH.'libs/');
define('TOOLS_PATH',        CORE_PATH.'tools/');



// --------> [ROOT EXECUTION]
// @todo Implement inside the other files.
define('FROM_INDEX', 1);



// --------> [SYSTEM INITIALIZATION.]
/*
 * @todo handle exception if the file doesn't exist.
 */

require_once CORE_PATH.'init.php';
$init = new Init();