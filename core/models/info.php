<?php

/**
 * <h1>Info system tool</h1>
 * - <strong>Program info:</strong> <em>URLs, paths, time, environment, config,
 *                                  user inputted data, etc.</em>
 * 
 * - Basically this class is in charge of collecting info using different
 *   methods and give it to the controllers in a default, easy way.
 * 
 * 
 * <h2>User information</h2>
 * - All info inputted by the user is sanitized before returning it by the 
 *   <code>Sanitizer()</code> tool.
 *
 * 
 * <h2>Class usage notes</h2>
 * - Only one instance allowed <em>(Singleton pattern)</em>.
 * - All configuration data can be requested to Info() from other classes by
 *   invoking <code>Info::getConfigVars()</code>
 * 
 * 
 * ----
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


class Info 
{
   
    private $_database      = null;       // - filled with config vars.
    private $_controllers   = array();    // - filled with config vars.
    private $Sanitizer      = null;       // - Container for the Sanitizer() class.

    

    public function __construct() 
    { 
        ##--------------------------[LOADING THE CONFIGURATION]
        // see $this->getConfigVars() for more
        require_once CORE_PATH.'config.php';

        $this->_database                = $database;


        
/*
 * @todo Remove these and implemente the Router() 
*/
        $this->_controllers['default']  = $controllers['default'];
        $this->_controllers['public']   = explode("|", $controllers['public']);
        
        
        ##--------------------------[TOOLS]
        $this->Sanitizer = new Sanitizer();        
    } //  __construct()

    

    
    
##
##--------------------------------------------------------------------[PRIVATE METHODS]
##
    /**
     * <h1>User variables</h1>
     * - Sanitizes the GET vars sent by the user.
     *
     * @version     0.1
     * @since       0.1
     *  
     * @access      private
     * @param       string $userVar
     * @return      string The GET var sanitized.
    */
    private function getUserVar($userVar) 
    {
        return $this->Sanitizer->fromUrl($_GET[$userVar]);
    }



    
    
    
    
##
##--------------------------------------------------------------------[PUBLIC METHODS]
##

    /**
     * <h1>Controller manager</h1>
     * - Identifies the controller requested by the user, sanitizes it formats it, checks the file of said controller exists, checks
     *   and if the access level of the user <em>(anonymous users can only access public controllers)</em> and if something is not  
     *   valid or it doesn't exist it will default to to the default controller set in the config file.
     * 
     * @version     0.1
     * @since       0.1
     * 
     * @access      public
     * @return      boolean     Returns false if the controller requested by the 
     *                          user doesn't exist or if it isn't public.
    */
    public function getController() 
    {
        // --> Check the controller requested by the user.
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
    } // getController()




    /**
     * <h1>ID manager</h1>
     * - Returns the second part of the URL converted by Apache which allows the system to determine if the user is requesting a specific 
     *   sub item.
     * 
     * - For example, a controller may be a controller for a posting sub-system and the ID may refer to the specific post the user is 
     *   looking for.
     * 
     * @since       0.1
     * 
     * @access      public
     * @return      integer     The ID of the selected resource.
    */
    public function getId() 
    {
       return (int)$this->getUserVar('id');
    } // getId()




    /**
     * <h3>Database credentials</h3>
     * - Database information extracted 
     * - It returns one by one and not all credentials at once. 
     * 
     * @version     0.1
     * @since       0.1
     * 
     * @access      public
     * @param       string $credential      The requested credential
     * @return      string                  The credential of the DB if it exists.
     * @return      false                   If the credential doesn't exist.
     */
    public function getDbInfo($credential) 
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
    } // getDbInfo()



    
    /**
     * <h3>Configuration info</h3>
     * - Returns all the configuration options gathered and processed in the 
     *   constructor and wraps them an user friendly getter method.
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
/*
 * @todo this is a configuration constant, why is it being retrieved by a 
 *       Info() function, is it neccessary? 
 */
            case 'view engine':
                // - Renderization engine.
                return APP_VIEW;
            default:
                return false;
        }
    } // getConfigVars()
}