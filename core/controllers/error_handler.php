<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }



/**
 * <h1>ERROR MANAGEMENT AND HANDLING</h1>
 * <p>Receives errors and alerts from all modules, controllers, etc. and collects them and also reports them if needed. 
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <p>The behavior may changed depending the configured security level.</p>
 * 
 * 
 * <h2>[ERROR CODES]</h2>
 * <p>See documentation</p>
 * 
 * 
 * 
 *  
 * @author          D.Lovotrico <dlov@nucleoid.net>
 *
 * @version         0.1
 * @since           0.1

 */



class Error_handler {    
    #------> Data    
    private static $_reportedErrors = array();  
    private static $_reportedAlerts = array();  
    #------> Objects 
    private static $_singleton;

    
    
    private function __construct() {
        self::$_reportedErrors[1001] = array();
        self::$_reportedErrors[1002] = array();
        self::$_reportedAlerts[1001] = array();
        self::$_reportedAlerts[1002] = array();
    } // __construct()





##
##--------------------------------------------------------------------[PRIVATE METHODS]
##
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
     * <h3>REGISTER AN ERROR</h3>
     * 
     * 
     * 
     * @version     0.1
     * @since       0.1
     * 
     * @access      public
     *
     * @param       int $errorCode type of the reported error. 
     */
    public static function addError($series,$info = TRUE) {
        array_push(self::$_reportedErrors[$series], $info);
    }


    /**
     * <h3>REGISTER AN ALERT</h3>
     * 
     * 
     * 
     * @version     0.1
     * @since       0.1
     * 
     * @access      public
     *
     * @param       int $errorCode type of the reported error. 
     */
    public static function addAlert($series,$info = TRUE) {
        array_push(self::$_reportedAlerts[$series], $info);
    }


    /**
     * <h3>Returns the reported errors array in its entirety</h3>
     * 
     * 
     * @version     0.1
     * @since       0.1
     *
     */

    public static function getError() {
        return self::$_reportedErrors;
    }

// TEST DELETE
public static function active() {
    echo "active";
}



} // Error()

