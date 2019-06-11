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
 *   <li>The behavior may changed depending the configured security level.</li>
 *   <li>The <code>Error_handler()</code> not always kills the program. If the error code isn't a kill error.</li>
 * </ul>
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
    private static $_reported   = array();  
    #------> Objects 
    private static $_singleton;

    
    
    private function __construct() {
        // Construct...
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
    * @version     0.1
    * @since       0.1
    * 
    * @access      private
    *
    * @param       string      $type 'error' or 'alert'. 
    * @param       int         $code the error code.
    * @param       string      $info optional additional information about the error.
    */
    private static function process_report($type, $code,$info = null) {
        $report = array();
        ($type == 'alert' ? $type = 'alerts' : $type = 'errors');

        // Backtracing the error
        $report['file']     = debug_backtrace()[1]['file'];
        $report['function'] = debug_backtrace()[1]['function'];
        $report['line']     = debug_backtrace()[1]['line'];

        // Create the array entry if needed.
        if(self::$_reported[$type][$code] == null) {
            self::$_reported[$type][$code] = array();
        }

        // Add the error/alert to the reported errors array. 
        array_push(self::$_reported[$type][$code], $report);
    } //process_report()









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
    public static function add_error($series,$info = null) {
        self::process_report('error',$series, $info);
    } // add_error()



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
    public static function add_alert($series,$info = null) {
        self::process_report('alert',$series, $info);
    } // add_alert()



    /**
    * <h3>Returns the reported errors array in its entirety</h3>
    * 
    * 
    * @version     0.1
    * @since       0.1
    *
    */
    public static function get_error() {
        return self::$_reportedErrors;
    } // get_error()



// TEST DELETE
public static function active() {
    echo "active";
}



} // Error()

