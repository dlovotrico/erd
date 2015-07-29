<?php/** * <h1>Info system tool</h1> * - <strong>Program info</strong>: <em>URLs, paths, time, enviroment, config, *                                  user inputed data, etc.</em> *  * - Basically this class is in charge of collecting info using different *   methods and give it to the controllers in a default, easy way. *  *  * <h2>User information</h2> * - All info inputed by the user is sanitized before returning it. * *  * <h2>Class usage notes</h2> * - Only one instance allowed (Singleton pattern). *  *  * ---- *  *  * @author          Diego Lovotrico <diego@nucleoid.net> * * @category        Models * @category        System *  * @version         0.1 * @since           0.1*/class Info {    private static $_singleton;    private $_Sanitizer     = null;       // - stores the sanitization engine.    private $_Error         = null;       // - stores the error handler.    private $_database      = null;       // - filled with config vars.    private $_config        = null;    private $_controllers   = array();    // - filled with config vars.    private function __construct() {        // --------> [LOADING THE SYSTEM TOOLS]        $this->_Sanitizer = new Sanitizer();        $this->_Error = Error::getInstance();        // --------> [LOADING THE CONFIGURATION]        // - Note: all these values can be requested by the user through        //         $this->getConfigVars()        require_once CORE_PATH.'config.php';        // - maps the config vars into class arrays.        $this->_database                = $database;        $this->_controllers['default']  = $controllers['default'];        $this->_controllers['public']   = explode("|", $controllers['public']);    } //  __construct()    // --------> [SINGLETON]    public static function getInstance() {        if(is_null (self::$_singleton)) {            self::$_singleton = new Info();        }        RETURN self::$_singleton;    } // getInstance()    // -----------------------------------------------------------------------    // |----------------------------------------------------> [PUBLIC METHODS]    // -----------------------------------------------------------------------    /**     * <h3>URL collector</h3>     * - Cleans and returns the URL generated by Apache.     *     * @since Version 0.1     *       * @access public     * @return string URL requested by the user.     */    public function getUrl() {        return $this->_Sanitizer->fromUrl($_GET['url']);    }    /**     * <h3>User variables</h3>     * - Sanitizes the GET vars sent by the user.     *     * @since Version 0.1     *       * @access public     * @param string $userVar     * @return string The GET var sanitized.    */    public function getUserVar($userVar) {        return $this->_Sanitizer->fromUrl($_GET[$userVar]);    }    /**     * <h3>Controller manager</h3>     * - Identifies the controller requested by the user, sanitizes it      *   formats it, checks the file of said controller exists, checks     *   and if the access level of the user <em>(anonymous users can only     *   access public controllers)</em> and if something is not correct it      *   points out to the default controller.     *     * @since 0.1     *      * @access public     * @return boolean Returns false if the controller requested by the      *                 user doesn't exist or if it isn't public.    */    public function getController() {        // --> Brings the controller requested by the user from the GET         //     array and it converts it to small case, just in case the         //     user inputed something like: /CoNtrOlLEr/        $controller = strtolower($this->getUserVar('controller'));/** * @todo Is the following line necessary? if it's empty it will not match with *       anything in the default controllers config options, which means the  *       default will be loaded anyway when it doesn't match anything.  */             // --> If the GET variable is empty it means the user accessed         //     the index. Default controller is loaded then.        (strlen($controller) == 0 ?  $controller = $this->_controllers['default'] : FALSE);        // --> Checks if the class of the model exists as a file.        if(file_exists(CONTROLLERS_PATH.$controller.'.php')) {/** * @todo Convert it to lowercase here so the array doesn't need to be  *       carefully written in the config.php */             // - Checks if the controller is publicly accessed.             // (ver config.php)            if(in_array($controller,$this->_controllers['public'])) {                return ucfirst($controller);            } else {/** * @todo Integrate the session */                Error::addError(1001,"Error, access to '$controller' is not allowed.");            }        } else {            Error::addError(1001,"Error, the requested resource ('$controller') doesn't exist.");            return ucfirst($this->_controllers['default']);        }    } // getController()    /**     * <h3>ID manager</h3>     * - Returns the second part of the URL converted by Apache which allows the     *   system to determine if the user is requesting a specific sub item.     *      * - For example, a controller may be a controller for a posting sub-system     *   and the ID may refer to the specific post the user is looking for.     *      * @since 0.1     *      * @access public     * @return integer The ID of the selected resource.    */    public function getId() {       return (int)$this->getUserVar('id');    } // getId()        /**     * <h3>Database credentials</h3>     * - Database information extracted      * - It returns one by one and not all credentials at once.      *      * @since Version 0.1     *      * @access public     * @param string $credential    The requested credential     * @return string               The credential of the DB if it exists.     * @return false                If the credential doesn't exist.     */    public function getDbInfo($credential)     {        switch ($credential)        {            case 'host':            case 'user':            case 'pass':                return (string)$this->_database[$credential];            default:                return false;        }    } // getDbInfo()    /**     * <h3>Configuration info</h3>     * - Returns all the configuration options gathered and prcessed in the      *   contructor and wraps them an user friendly getter method.     *      * @since Version 0.1     *      * @access public     * @param string $cfgvar        Requested configuration variable.     * @return string               Value of the requested variable.     * @return false                If the requested variable doesn't exist.    */    public static function getConfigVars($cfgvar) {        switch ($cfgvar) {/* * @todo this is a configuration constant, why is it being retrieved by a  *       Info() function, is it neccessary?  */            case 'view engine':                // - Renderization engine.                return APP_VIEW;            default:                return false;        }    } // getConfigVars()}