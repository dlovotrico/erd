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
 * @author          D.Lovotrico <dlov@nucleoid.net>
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
        $this->process_user_request();
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
    private function process_user_request() 
    {
        $tempMatch          = array();


        #------> Extract the ID and the Title from the URL
        preg_match("@(?P<id>re[0-9]+)/{0,1}(?P<title>([-a-zA-Z0-9])+)@", $_SERVER['REQUEST_URI'], $tempMatch);

        if($tempMatch['id'] != null) {
            $this->_userRequest['id'] = $this->_Sanitizer->fromUrl($tempMatch['id']);    
        } else {
            $this->_userRequest['id'] = null; 
        }
        if($tempMatch['title'] != null) {
            $this->_userRequest['title'] = $this->_Sanitizer->fromUrl($tempMatch['title']);            
        } else {
            $this->_userRequest['title'] = null;
        }

        #------> Sanitize the arguments
        // Clean the get
        foreach ($_GET as $key => $val) {
            $this->_userRequest[$key] = $this->_Sanitizer->fromUrl($val);
        }
    } // process_user_request()







    
    
##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    /**
    * <h1>PARAM REQUESTED BY THE USER</h1>
    * <p>Returns the different params <strong>requested</strong> by the user though the URL. The source for these params
    * comes from the from the <code>$_userRequest</code> array pre-processed by the <code>processUserRequest()</code>
    * function.</p>
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
    * @access       public
    *
    * @param        string      The string naming the requested URL param.
    * @return       integer     The ID of the selected resource.
    * @return       string      If the value is a string.
    * @return       null        If the requested itm is empty.     
    */
    public function get_url_params($request) 
    {
        if($this->_userRequest[$request] != null) 
        {
            return $this->_userRequest[$request];
        } else 
        {
            return null;
        }
    } // get_url_params()



    /**
    * <h1>LIST THE AVAILABLE THE URL PARAMETERS</h1>
    * <p>Returns a numeric array listing all the params available in the URL from the user request.</p>
    * 
    *
    * <h2>[WORKING NOTES]</h2>
    * <ul>
    *   <li>Returns null if no ID was requested.</li>
    * </ul>
    * 
    *
    *
    * @since       0.1
    * @version     0.1
    * 
    * @access       public
    *
    * @return       array       An array with all the params found in the URL.
    * @return       null        If the URL was empty.     
    */
    public function get_available_url_params() 
    {
        $urlParams  =   array();
        $i          =   0;

        foreach ($this->_userRequest as $key => $val) 
        {
            if($this->_userRequest[$key] != null) {
                $urlParams[$i] = $key;
                $i++;
            }
        }

        return $urlParams;

    } // get_available_url_params()





} // User_info()
