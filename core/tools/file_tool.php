<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }



/**
 * <h1>General purpose file operations tools</h1>
 * - This class is intended to serve as a tool to deal with files. Some of its 
 *   goals are:
 *   - Checking the existence of a certain file.
 *   - Checking the size of a file.
 *   - Checking the hash of a file.
 *  
 * 
 * ----
 * 
 * 
 * @author          D.Lovotrico <dlov@nucleoid.net>
 *
 * @category        Tools
 * @category        System
 * 
 * @version         0.1
 * @since           0.1
 */


class File_tool {
    // --------> [SINGLETON]
    public static function getInstance() 
    {
        if(is_null (self::$_singleton))
        {
            self::$_singleton = new Info();
        }
        RETURN self::$_singleton;
    } // getInstance()
    
    


    
    // -----------------------------------------------------------------------
    // |----------------------------------------------------> [PUBLIC METHODS]
    // -----------------------------------------------------------------------
    /**
     * <h3>File existence checker</h3>
     * - Checks if a file exists in the system.
     *
     * @version     0.1
     * @since       0.1
     *  
     * @access      public
     * @return      booleanSS
    */
    public function file_exists($file,$options = null,$customMsg = null) 
    {
        if(file_exists($file)) {
            return 1;
        } 
        else {
            
        }
    } // file_exists()
} // File_tool()