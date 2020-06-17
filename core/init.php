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
 *   <li>Instantiates necessary classes for the requested controller <em>(not all 
 *     controllers are started per request, only those relevant to the service 
 *     requested by the user. <code>Init()</code> can know which service to 
 *     initialize based on the URL from which the request was made. It also uses 
 *     session info for more complex requests.)</em>.</li>
 *   <li>And it checks that all the necessary conditions for the correct operation 
 *       of the application are meet, otherwise it aborts the execution.</li>
 * </ul>
 * 
 * 
 * 
 * <h2>[WORKING NOTES]</h2>
 * <ul>
 *   <li><em>core/settings.php</em> Contains all the user configuration data.</li>
 *   <li>Config params are loaded into the system through: 
 *       <em><code>core/models/program_info.php</code></em> and 
 *   <em><code>core/models/program_info.php</code></em></li>
 *   <li>The controller to be used is selected based on the URL pre-processed by 
 *       the server.</li>
 *     <ul>
 *       <li>For example: <em><code>/<id>/<item-title>?args=value</code></em></li>
 *       <li>If the user enters an invalid URL they'll be sent to the default 
 *           controller.</em></li>
 *     </ul>
  *   <li>Furthermore, it log every action or status into the Status_logger() and 
 *       reads constantly from it to determine the best course of action.</li>
 * </ul>
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
 */

 
class Init {
    #------> Objects 
    private $Error_handler      = null;     // - Stores the Error_handler() class. 
    private $Status_logger      = null;     // - Stores the Status_logger() class. 
    private $Program_info       = null;     // - Stores the Program_info() class.
    private $User_info          = null;     // - Stores the User_info() class.


    public function __construct() {    
        require_once TOOLS_PATH.'autoloader.php';
        // --------> [LOADING THE SYSTEM TOOLS]
        $this->Error_handler    = Error_handler::getInstance();
        $this->Status_logger    = Status_logger::getInstance();
        $this->Program_info     = new Program_info();     
        $this->User_info        = new User_info();
        
        // --------> [INITIATING THE SYSTEM]        
        $this->Status_logger->report_state(1001);
        $this->Status_logger->report_state(1002);
        $this->Status_logger->report_state(1003);

        print_r($this->Error_handler->getc());

        // --------> [USER REQUEST PROCESSING]
        // ----> CONTROLLER IDENTIFICATION
        // $this->_contName    = $this->_Program_info->get_controller();
        // $this->_id          = $this->_Program_info->getId();

        // ----> CONTROLLER LOADING
        // $this->_Controller  = new $this->_contName();





        
Ot::title('Starting tests','red',21);






#print_r($this->User_info->get_available_url_params()); 
#echo $this->User_info->get_url_params('id')."<br />";
#echo $this->User_info->get_url_params('title')."<br />";
#echo $this->User_info->get_url_params('subitem')."<br />";



// --------> [ERRORS AND ALERTS]
#Error_handler::add_error(3001);
#Error_handler::add_alert(1001);

#print_r(Error_handler::get_all_errors() );



// --------> [BEGIN SITE BUILDING]
#$this->_Controller->getHeader();
#$this->_Controller->getContent($this->_contName);
#$this->_Controller->getFooter();



// --------> [INFORMATION]
#Ot::str('Controller: '.$this->_contName);
#Ot::str('Item ID: '.$this->_id);

#Ot::str("Host".$this->_Info->getDbInfo('host'),'p');
#Ot::str("User".$this->_Info->getDbInfo('user'),'p');
#Ot::str("Pass".$this->_Info->getDbInfo('pass'),'p');

 
    } //  __construct()


}

