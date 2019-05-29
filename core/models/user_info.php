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
    private $_userRequest   = array();
    #------> Objects 
    private $_Sanitizer     = null;      // - Container for the Sanitizer() class.
    

    public function __construct()
    {
        ##--------------------------[TOOLS]
        $this->_Sanitizer = new Sanitizer();

        #--------------> Populating data
        $this->processUserRequest();
    }




##
##--------------------------------------------------------------------[PRIVATE METHODS]
##
    /**
    * <h1>PROCESS THE USER REQUEST</h1>
    * <p>Sanitizes the URL  sent by the user and then process the URL finding valid patterns within it for the ID, the
    * controller and any suitable action. If found, it will populate the array <code>$_userRequest</code> with all the 
    * data.</p>
    *
    * 
    * 
    *
    * <h2>[WORKING NOTES]</h2>
    * <ul>
    *   <li>It doesn't return anything, but it populates the class <code>$_userRequest</code> array with the processed 
    *   URL sent by the user.</li>
    * </ul>
    *
    *
    * @version     0.1
    * @since       0.1
    *  
    * @access      private
    */
    private function processUserRequest() 
    {
        $processedURL       = $this->_Sanitizer->fromUrl($_SERVER['REQUEST_URI']);
        $tempMatch          = array();

        #------> ID REGEX
        preg_match('/re[1-9]+/', $processedURL, $tempMatch);

        if($tempMatch[0] != null)
        {
            $this->_userRequest['id'] = $tempMatch[0];
        } else
        {
            $this->_userRequest['id'] = null;
        }
    } 







    
    
##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    /**
    * <h1>ID REQUESTED BY THE USER</h1>
    * <p>Returns the item ID <strong>requested</strong> by the user from the pre-processed during construction class 
    * array containing the processed URL sent by the user.</p>
    * 
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
    * @return      integer     If no proper ID was found. 
    */
    public function getId() 
    {
       return $this->_userRequest['id'];
    } // getId()

} // User_info()
