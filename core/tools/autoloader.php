<?php
if(!defined('FROM_INDEX') ) { die("Execute from site root."); }



/**
 * <h1>Autoloader<h1>
 * - Autoloads classes dynamically. 
 * - If the class with a container doesn't exist, it returns FALSE, otherwise
 *   nothing is returned.
 * 
 * @author          Diego Lovotrico <diego@nucleoid.net>
 * 
 * @since           0.1
 * @version         0.1
 * 
 * @category        Tools
 * @category        System
 * 
 * @param           string $class the class to be loaded
 * @return          void|bool
 * 
 */

spl_autoload_register(function ($class) {
    // Convert the class name to small caps because of personal convention the
    // files in the system are all smallcaps. 
    $class = strtolower($class);
    if(file_exists(MODELS_PATH.$class.'.php')) {     
        include_once MODELS_PATH.$class.'.php';
    } 

    elseif(file_exists(CONTROLLERS_PATH.$class.'.php')) {
        include_once CONTROLLERS_PATH.$class.'.php';
    }

    elseif(file_exists(VIEWS_PATH.$class.'.php')) {
        include_once VIEWS_PATH.$class.'.php';
    }

    elseif(file_exists(TOOLS_PATH.$class.'.php')) {
        include_once TOOLS_PATH.$class.'.php';
    } 

    elseif(file_exists(LIBS_PATH.$class.'.php')) {
        include_once LIBS_PATH.$class.'.php';        
    }

    else {
        return FALSE;
    }
});

