<?php

/**
 * <h1>Bootstrapper</h1>
 * Bootstrapper, some of its tasks are:
 *   - Initializes basic modules,
 *   - Loads required files, 
 *   - Calls the autoloader,
 *   - Instantiates necessary classes for the requested controller (not all controllers are started per request, only those relevant 
 *     to the service requested by the user. Init() can know which service to initialize based on the URL from which the request was 
 *     made. It also uses session info for more complex requests.),
 *   - And it checks that all the necessary conditions for the correct operation of the application are meet, otherwise it aborts 
 *     the execution. 
 * 
 * 
 * ----
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * - The controller to be used is selected based on the URL pre-processed by <strong>Apache</strong> or <strong>Nginx</strong>.
 *   -- For example: <i>http://www.nucleoid.net/contname/nn</i>
 *      --- Will be converted into: <i>index.php?controller=contname&id=nn</i>
 *   -- If the user enters an invalid URL he'll be set to: <i>index.php?controller=frontpage&id=0</i>
 *
 * - <em>Info()</em> is in charge of telling the program which controller the user requested.
 * 
 * 
 * ----
 * 
 * 
 * <h2>[CONFIGURATION]</h2>
 *   - core/config.php          - configuration options.
 *   - core/controllers/Info()  - feeds configuration params into the system.
 * 
 * 
 * ----
 * 
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version     Version 0.1
 * @since       Version 0.1
 * 
 * @category    Bootstrap
 * @category    System
 */

 
class Init {
    private $_contName;     // - 
    private $_id;           // - specific id within the controller.
    private $_Session;      // - session data. // TO IMPLEMENT

    // 
    private $Info;                      // - Stores the Info() class.
    private $Error_handler     = null;  // - Stores the Error_handler() class.    
    


    public function __construct() {    
        require_once TOOLS_PATH.'autoloader.php';

        // --------> [LOADING THE SYSTEM TOOLS]
        // --> Singleton classes.
        $this->Error_handler    = Error_handler::getInstance();

        // --> Instance specific classes.
        $this->Info             = new Info();     




// MOVE ALL OF THIS OUTSIDE OF THE CONTRUCT()

        // --------> [USER REQUEST PROCESSING]
        // ----> CONTROLLER IDENTIFICATION
        $this->_contName    = $this->Info->getController();
        $this->_id          = $this->Info->getId();

        // ----> CONTROLLER LOADING
        // $this->_Controller  = new $this->_contName();



// ------------------------------> [TEMPORAL DEBUGGING BOX]
echo '<div class="dbox">';
Ot::str(' Controller: <small><b>'.$this->_contName.'</b></small> ');
Ot::str(' -- Item ID: <small>'.$this->_id.'</small> ');
echo '</div>';
// ---------------------------------------------------------------------------->        



// --------> [BEGIN SITE BUILDING]
//        $this->_Controller->getHeader();
//        $this->_Controller->getContent($this->_contName);
//        $this->_Controller->getFooter();



        
//Ot::title("Info check",'red');
//Ot::str("Host".$this->_Info->getDbInfo('host'),'p');
//Ot::str("User".$this->_Info->getDbInfo('user'),'p');
//Ot::str("Pass".$this->_Info->getDbInfo('pass'),'p');
//Ot::title("Inicio del core 3",'red');




    } //  __construct()
}

