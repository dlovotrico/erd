<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


/**
 * <h1>EXECUTION CONTROL AND STATE</h1>
 * <p>Keeps track of the program execution state and running.</p> 
 * 
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li>This class is intended to work closely with <code>Init()</code> and its sub-modules, constantly receiving updates from these 
 *   and maintaining a record of the current execution state of the program.</li>
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

class Executor {
    #------> Objects 
    private static $Singleton;



    // STAGES TO IMPLEMENT

    // Did the init tools load correctly? 

    
    // Can the site's barebones structure be created? 



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








##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    public function report_issue() {

    }

    public function report_state($code) {

    }

} // Executor()