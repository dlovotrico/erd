<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


/**
 * <h1>USER INFORMATION AND STATUS</h1>
 * Information about the user, their request, origin, etc.
 * 
 *
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li>All info inputted by the user is sanitized before returning it by the <code>Sanitizer()</code> tool.</li>
 * </ul>
 * 
 * 
 * 
 * <h2>[ADITIONAL INFORMATION]</h2>
 * <ul>
 *   <li>This class as a related class <code>Program_info()</code></li>
 * </ul>
 * 
 * 
 * 
 * 
 * @author          Diego Lovotrico <diego@nucleoid.net>
 *
 * @category        Models
 * @category        System
 * 
 * @version         0.1
 * @since           0.1
*/


class User_info 
{
    #------> Data
    private $_requested;
    private $_id;
    #------> Objects 
    private $_Sanitizer      = null;      // - Container for the Sanitizer() class.
    

    public function __construct()
    {
        ##--------------------------[TOOLS]
        $this->_Sanitizer = new Sanitizer();
    }




##
##--------------------------------------------------------------------[PRIVATE METHODS]
##
    /**
     * <h1>PROCESS THE USER REQUEST</h1>
     * <p>Sanitizes the GET vars sent by the user.</p>
     *
     * 
     * 
     * @version     0.1
     * @since       0.1
     *  
     * @access      private
     * @param       string $userVar
     * @return      string The GET var sanitized.
    */
    private function processUserRequest() 
    {

        return $this->_Sanitizer->fromUrl($_GET[$userVar]);
    } 







    
    
##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    /**
    * <h1>ID INFO</h1>
    * Returns the item ID requested by the user.
    * 
    * 
    * 
    * <h2>[WORKING NOTES]</h2>
    * <ul>
    *   <li>Returns null if no ID was requested.</li>
    * </ul>
    * 
    * @since       0.1
    * @version     0.1
    * 
    * 
    * @access      public
    * @return      integer     The ID of the selected resource.
    */
    public function getId() 
    {
       return (int)$this->getUserVar('id');
    } // getId()

} // User_info()
