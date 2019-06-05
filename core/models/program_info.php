<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


/**
* <h1>PROGRAM ENVIROMENT AND CONFIG INFO</h1>
* <p>Information about the program and the enviroment. This class is used to provide the system with configuration data,
* program variables, etc.</p>
* 
*
*  
* <h2>[USAGE NOTES]</h2>
* <ul>
*   <li>Configuration data requested from Info() from other classes by invoking <code>Info::getConfigVars()</code></li>
* </ul>
* 
* 
* 
* 
* <h2>[ADITIONAL INFORMATION]</h2>
* <ul>
*   <li>This class as a related class <code>User_info()</code></li>
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


class Program_info 
{
    #------> Data
    private $_database      = null;       // - filled with config vars.
    private $_controllers   = array();    // - filled with config vars.
    private $_routes        = array();    // - filled with config vars.
    #------> Objects 


    

    public function __construct() 
    { 
        ##--------------------------[LOADING AND PROCESSING THE CONFIGURATION]
        // see $this->getConfigVars() for more
        require_once CORE_PATH.'settings.php';
        require_once CORE_PATH.'pconfig.php';

        #--------------> Extracting controllers from the config
        $this->_controllers['default']  = $controllers['default'];
        $this->_controllers['public']   = explode("|", $controllers['public']);

        #--------------> Populating data
        $this->validate_routes();        
        $this->_database                = $database;
    } //  __construct()

    

    
    
##
##--------------------------------------------------------------------[PRIVATE METHODS]
##
    /**
    * <h3>PROCESS ALL THE VALID ROUTES</h3>
    * <p>Populates the <code>$_routes</code> array with all the available routes.</p>
    * 
    *
    * <h2>[WORKING NOTES]</h2>
    * <ul>
    *   <li>All info inputted by the user is sanitized before returning it by the <code>Sanitizer()</code> tool.</li>
    * </ul> 
    * 
    * @version     0.1
    * @since       0.1
    * 
    * @access  public
    */

// MOVE TO THE VALIDATOR
    public function validate_routes() 
    {

        #--------------> Validate the routes from the config. 
        # ----> If the controller doesn't exist raise an error.

print_r($this->_controllers);

        foreach ($this->_controllers as $key => $val) 
        {


        // Check if the array key belongs to one of the allowed types: default, public, private

            // If not raise a wrong configuration error 
            // If yes proceed.

                // Check if the value is a string 

                    // If yes: validate for the file existence

                    // If it's an array
                        // Loop through the numeric sub array 
                            // Check if the value is a string 
                                // If yes: validate for the file existence.
                                // if no: raise a configuration error 
        } // End for



    }    

    






    
    
##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    /**
     * <h3>PROGRAM CONFIGURATION SETTINGS</h3>
     * <p>Returns all the configuration options gathered and processed in the constructor and wraps them in an 
     * user friendly get method.</p>
     * 
     * 
     * 
     * @version     0.1
     * @since       0.1
     * 
     * @access  public
     * @param       string $cfgvar      Requested configuration variable.
     * @return      string              Value of the requested variable.
     * @return      false               If the requested variable doesn't exist.
    */
    public function getConfigVars($cfgvar) 
    {
        switch ($cfgvar) 
        {
            case 'view engine':
                // - Renderization engine.
                return APP_VIEW;
            default:
                return false;
        }
    } // getConfigVars()



    /**
    * <h1>CONTROLLER INFORMATION</h1>
    * <p>Checks if the controller requested by the user is valid and/or if the user is allowed to access it.</p>
    *
    * 
    * 
    * <h2>[WORKING NOTES]</h2>
    * <ul>
    *   <li>Anonymous users can only access public controllers.</li>
    *   <li>Returns false if the controller requested by the user doesn't exist or if it isn't public.</li>
    * </ul>
    * 
    *
    * 
    * @version     0.1
    * @since       0.1
    * 
    * @access      public
    * @return      boolean     
    *                          
    */
    public function get_controller() 
    {
        // --> Check the controller requested by the user.
 
 
// !!!!!!!!! MOVED TO user_info !!!!!!!!!!!

        $controller = strtolower($this->getUserVar('controller'));
        // --> GET var empty? Default controller is loaded then.
        (strlen($controller) == 0 ?  $controller = $this->_controllers['default'] : FALSE);
        // --> Checks if the class of the model exists as a file.
        if(file_exists(CONTROLLERS_PATH.$controller.'.php')) 
        {
            // - Checks if the controller is publicly accessed (config.php)
            if(in_array($controller,$this->_controllers['public'])) 
            {
                // First character to upprcase.
                return ucfirst($controller);
            } else 
            {
                Error_handler::addError(1001,"Error, access to '$controller' is not allowed.");
            }
        } else 
        {
            Error_handler::addError(1001,"Error, the requested resource ('$controller') doesn't exist.");
            // First character to upprcase.
            return ucfirst($this->_controllers['default']);
        }
    } // get_controller()




    /**
    * <h3>DATABASE INFORMATION</h3>
    * <p>Returns the database information extracted from the config.</p>
    * 
    * 
    *
    * 
    * <h2>[WORKING NOTES]</h2>
    * <ul>
    *   <li>It returns the credentials one by one instead of all at once.</li>
    *   <li>Returns false if the credential doesn't exist..</li>
    * </ul>
    *  
    * 
    * @version     0.1
    * @since       0.1
    * 
    * 
    * @access      public
    * @param       string
    * @return      string                  
    * @return      false                   
    */
    public function get_db_info($credential) 
    {
        switch ($credential)
        {
            case 'host':
            case 'user':
            case 'pass':
                return (string)$this->_database[$credential];
            default:
                return false;
        }
    } // get_db_info()

} // Program_info()
