<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


/**
 * <h1>ERROR MANAGEMENT AND HANDLING</h1>
 * <p>Receives errors and alerts from all modules, controllers, etc. and collects them and also reports them if needed.
 * </p> 
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li>Error data and error severity levels are pooled from Error_data().</li>
 *   <li>The behavior may changed depending the configured security level.</li>
 * </ul>
 * 
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
 * @version         Version 0.1
 * @since           Version 0.1
 *
 * @category        System
 * @category        Program execution
 * @category        Program control
 */



class Error_handler {    
    #------> Objects 
    private static $Singleton;
    private static $Error_data          = null;
    #------> Data    
    private static $_reported           = array();  
    

// DELETE    

    
    


    private function __construct() {
        // Load the error messages and severity levels.
        self::$Error_data  = new Error_data();
    } // __construct()




##
##--------------------------------------------------------------------[PRIVATE METHODS]
##
    // --------> [SINGLETON]
    public static function getInstance() {
        if(is_null (self::$Singleton)) {
            self::$Singleton = new Error_handler();
        }
        RETURN self::$Singleton;
    } // getInstance()



    /**
    * <h3>PROCESS REPORT</h3>
    * <p>Takes all the data about the error or alert report, formats it into an array and then inserts it into
    * <code>$_reported</code>.</p>
    * 
    *
    * <h2>[WORKING NOTES]</h2>
    * <ul>
    *   <li>The method creates a new entry each time an error/alert code is called then stores it into 
    *   <code>$_reported</code>.</li>
    *   <li>For example if the error code 1001 happens twice <code>$_reported['erros'][1001]</code> will have two
    *   numeric keys, each one with an array corresponding to the data of each of the two error instances. </li>
    * </ul>
    *
    *
    *
    * @version      0.1
    * @since        0.1
    * 
    * @access       private
    *
    * @param        string      $type           'error' or 'alert'. 
    * @param        int         $code           The error code.
    * @param        string      $callerMethod   The name of the method generating the error/alert.
    * @param        string      $extra          Optional additional information about the error.
    */
    private static function process_report($type, $code, $callerMethod, $extra = null) {
        $errorData  = array();

        // Get the error/alert code information. 
        $errorData  = self::$Error_data->get_information($type, $code);
        // If that failed then bring the information for the default error/alert code.
        if($errorData == null) {
            $code       = 9999;
            $errorData  = self::$Error_data->get_information($type,9999);
        }
        // Backtracing the error/alert
        $errorData['file']      = debug_backtrace()[1]['file'];
        $errorData['function']  = $callerMethod;
        $errorData['line']      = debug_backtrace()[1]['line'];
        // Adding the code, type and extra info to the error data.
        $errorData['code']      = $code;
        $errorData['type']      = $type;
        $errorData['extra']     = $extra;

        // Create the $_reported array entry if needed.
        if(self::$_reported[($type == 'alert' ? 'alerts' : 'errors')][$code] == null) {
            self::$_reported[($type == 'alert' ? 'alerts' : 'errors')][$code] = array();
        }

        // Add the error/alert into the reported errors array. 
        array_push(self::$_reported[($type == 'alert' ? 'alerts' : 'errors')][$code], $errorData);

echo "REMEMBER TO REPORT THE ERROR TO THE EXECUTOR";

    } //process_report()





##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    /**
    * <h3>REGISTER AN ERROR</h3>
    * <p>Allows to register an error in the error report array.</p>
    * 
    * 
    * @version      0.1
    * @since        0.1
    * 
    * @access       public
    *
    * @param        int         $code       Type of the reported error. 
    * @param        string      $extra      Any additional/custom information to be included in the error message. 
    */
    public static function add_error($code,$extra = null) {
        $callerMethod = debug_backtrace()[1]['function'];

        self::process_report('error',$code, $callerMethod, $extra);
    } // add_error()



    /**
    * <h3>REGISTER AN ALERT</h3>
    * <p>Allows to register an alert in the alert report array.</p>
    * 
    * 
    * 
    * @version      0.1
    * @since        0.1
    * 
    * @access       public
    *
    * @param        int         $code       Type of the reported error. 
    * @param        string      $extra      Any additional/custom information to be included in the error message. 
    */
    public static function add_alert($code,$extra = null) {
        $callerMethod = debug_backtrace()[1]['function'];

        self::process_report('alert',$code, $callerMethod, $extra);
    } // add_alert()



    /**
    * <h3>Returns the reported errors array in its entirety</h3>
    * 
    * 
    * @version     0.1
    * @since       0.1
    *
    */
    public static function get_all_errors() {
        return self::$_reported;
    } // get_all_errors()








} // Error()

