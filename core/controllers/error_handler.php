<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }



/**
 * <h1>Error checking and handling Model</h1>
 * - Receives errors from all modules, controllers, etc and collects them and 
 *   also reports if needed. 
 * - The behavior may changed depending the configured security 
 *   level.
 * 
 * 
 * <h2>Codes</h2>
 *      - <strong>Series 1000</strong> - <em>Not available/allowed resources</em>
 *              - <em>1001</em>: The requested controller doesn't exist. 
 *                               This error doesn't require terminating the app
 *                               and just proceeds to take the user to the
 *                               frontpage.
 *              - <em>1002</em>: Incomplete theme, a file is missing.
 *                               <strong>severe error</b> the program is terminated
 *                               and a message is displayed.
 *
 * 
 * ----
 * 
 *  
 * @author          D.Lovotrico <dlov@nucleoid.net>
 *
 * @version      0.1
 * @since        0.1

 */



class Error_handler {
    private static $_singleton;
    
    private static $_reportedErrors = array();  

    
    
    
    private function __construct() {
        // - Reported errors array initialization.
        // - These errors are stored. 
        self::$_reportedErrors[1001] = array();
        self::$_reportedErrors[1002] = array();
    } // __construct()




    
    // --------> [SINGLETON]
    public static function getInstance() {
        if(is_null (self::$_singleton)) {
            self::$_singleton = new Error_handler();
        }
        RETURN self::$_singleton;
    } // getInstance()



    
    
##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    

    /**
     * <h3>Reports an error to the system itself</h3>
     *
     * @author       Diego Lovotrico <diego@nucleoid.net>
     * 
     * @access      public
     * @version     0.1
     * @since       0.1
     *
     * 
     * @param int $errorCode type of the reported error. 
     */
    public static function addError($series,$info = TRUE) {
        array_push(self::$_reportedErrors[$series], $info);
    }


    /**
     * <h3>Returns the reported errors array in its entirety</h3>
     * 
     * @since        Version 0.1
     *
     */

    public static function getError() {
        return self::$_reportedErrors;
    }

} // Error()

