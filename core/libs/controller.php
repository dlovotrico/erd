<?php/** * <h1>View loader</h1> * - This controller is basically a front loader for the view engine.  * - It basically loades the view specific to the controller requested *   by the user. *  *  * ---- *  *  * @author      Diego Lovotrico <diego@nucleoid.net> *  * @category    Controllers * @Category    System *  * @version     0.1 * @since       0.1 */class Controller {    public $_View;             // - stores the view builder object.    function __construct() {        // --------> [VIEW LOADING]        $viewName = Info::getConfigVars('view engine');/* * @todo terminal exception here if the view doesn't exist.  */        $this->_View = new $viewName(); // - variable named object.    }}