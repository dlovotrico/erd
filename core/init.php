<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }

/**
 * <h1>Bootstrapper</h1>
 * Bootstrapper, some of its tasks are:
 * 
 * <ul>
 *   <li>Initializes basic modules.</li>
 *   <li>Loads required files.</li>
 *   <li>Calls the <strong><code>autoloader</code></strong>.</li>
 *   <li>Instantiates necessary classes for the requested controller <em>(not all controllers are started per request, only those relevant 
 *     to the service requested by the user. <code>Init()</code> can know which service to initialize based on the URL from which the request was 
 *     made. It also uses session info for more complex requests.)</em>.</li>
 *   <li>And it checks that all the necessary conditions for the correct operation of the application are meet, otherwise it aborts 
 *     the execution.</li>
 * </ul>
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li><em>core/settings.php</em> Contains all the user configuration data.</li>
 *   <li>Config params are loaded into the system through: <em><code>core/models/program_info.php</code></em> and 
 *   <em><code>core/models/program_info.php</code></em></li>
 *   <li>The controller to be used is selected based on the URL pre-processed by the server.</li>
 *     <ul>
 *       <li>For example: <em><code>/<id>/<item-title>?args=value</code></em></li>
 *       <li>If the user enters an invalid URL they'll be sent to the default controller.</em></li>
 *     </ul>
 * </ul>
 * 
 * 
 * 
 * <h2>[CONFIGURATION]</h2>
 * </ul>
 *   <li><strong><code>core/settings.php<code></strong>             - user configuration options and settings.
 *   <li><strong><code>core/pconfig.php<code></strong>              - contains the internal program configuration data.
 *   <li><strong><code>core/models/Program_info.php<code></strong>    - feeds program information params into the system.
 *   <li><strong><code>core/models/User_info.php<code></strong>       - feeds user information params into the system.
 * </ul>
 * 
 * 
 * 
 * @author          D.Lovotrico <dlov@nucleoid.net>
 * 
 * @version     Version 0.1
 * @since       Version 0.1
 * 
 * @category    Bootstrap
 * @category    System
 */

 
class Init {
    #------> Data
    #------> Objects 
    private $Session;                      // - session data. // TO IMPLEMENT
    private $Error_handler     = null;     // - Stores the Error_handler() class.    
    private $Program_info      = null;     // - Stores the Program_info() class.
    private $User_info         = null;     // - Stores the Program_info() class.


    public function __construct() {    
        require_once TOOLS_PATH.'autoloader.php';
        // --------> [LOADING THE SYSTEM TOOLS]
        // --> Singleton classes.
        $this->Error_handler    = Error_handler::getInstance();

        // --> Instance specific classes.
        $this->Program_info     = new Program_info();     
        $this->User_info        = new User_info();     



// MOVE ALL OF THIS OUTSIDE OF THE CONTRUCT()

        // --------> [USER REQUEST PROCESSING]
        // ----> CONTROLLER IDENTIFICATION
        //$this->_contName    = $this->_Program_info->get_controller();
        // $this->_id          = $this->_Program_info->getId();

        // ----> CONTROLLER LOADING
        // $this->_Controller  = new $this->_contName();


// ------------------------------> [TEMPORAL DEBUGGING BOX]
Error_handler::add_alert(1001);





echo $this->User_info->get_url_params('id')."<br />";
echo $this->User_info->get_url_params('title')."<br />";
echo $this->User_info->get_url_params('subitem')."<br />";

echo "<br /><br />";
print_r($this->User_info->get_available_url_params()); 


echo "<br /><br />";
print_r($_GET); 


// echo '<div class="dbox">';
// Ot::str(' Controller: <small><b>'.$this->_contName.'</b></small> ');
// Ot::str(' -- Item ID: <small>'.$this->_id.'</small> ');
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

