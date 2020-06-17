<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


/**
 * <h1>EXECUTION CONTROL AND STATE</h1>
 * <p>Keeps track of the program execution state and running.</p> 
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li>A system wide system logger tool where to report statuses, raise errors and other events.</li>
 *   <li>This class is intended to work closely with <code>Init()</code> and its 
 *       sub-modules, constantly receiving updates from these and maintaining a 
 *       record of the current execution state of the program.</li>
 * </ul>
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

class Status_logger {
    #------> Objects 
    private static $Singleton;
    #------> Data    
    private static $_status       = array();  


    private function __construct() {

    } // __construct()




##
##--------------------------------------------------------------------[PRIVATE METHODS]
##
    public static function getInstance() 
    {
        if(is_null (self::$Singleton)) 
        {
            self::$Singleton = new Status_logger();
        }
        RETURN self::$Singleton;
    } // getInstance()








##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    public function report_issue() {

    }



    /**
    * <h3>REPORT STATES</h3>
    * <p>Takes the reports of the different actions and state of the program during 
    * the execution of the program.</p>
    *
    *
    * <h2>[WORKING NOTES]</h2>
    * <ul>
    *   <li>This method stores all the reported staes in the $this->_status array.</li>
    * </ul>
    *
    *
    * @version      0.1
    * @since        0.1
    *
    * @access       public
    *
    * @param        string      $code           The reported status code.
    */
    public function report_state($code) {
        array_push(self::$_status,$code);
    }

    public function inform_state() {
        return self::$_status;
    }

} // Status_logger()