<?php
if(!defined('FROM_INDEX') ) { die("Execute from site root."); }



/**
 * <h1>View loader</h1>
 * - This controller is basically a front loader for the view engine. 
 * - It basically loads the view specific to the controller requested
 *   by the user.
 * 
 * 
 * ----
 * 
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>
 * 
 * @category    Controllers
 * @Category    System
 * 
 * @version     0.1
 * @since       0.1
 */


class Controller {    
    function __construct() {
    }
    
    
    
/**
     * <h3>HEADER building</h3>
     * - Builds the site's header.
     *
     * @version     0.1
     * @since       0.1
     *  
     * @access      public
     * @return      string      URL requested by the user. 
    */
    public function getHeader() {
/*
 * @todo Define what happens when the resource isn't found.
 * @todo Define what happens when an error appears. 
 * @todo Define the logic to handle the problem.
 * 
 */
        (file_exists(THEME_PATH.'header.php') ?  include_once THEME_PATH.'header.php' 
                                                 : 
                                                 Error::addError(1002,'header.php doesn\'t exist.')
        );
    }

    
    
    

    /**
     * <h3>CONTENT building</h3>
     * - Builds the site's content section.
     *
     * @version     0.1
     * @since       0.1
     *  
     * @access      public
     * @return      string      URL requested by the user. 
    */
    public function getContent($content) {
        if(file_exists(THEME_PATH.content.php)) {
            include_once THEME_PATH.content.php;
        } else {
            Error::addError(1002,"'$content' no existe");
            // --> Call the default theme. 
            // --> Display errors (if any)
        }
    }

    
    
    
    
    
    /**
     * <h3>FOOTER  building</h3>
     * - Builds the site's footer.
     *
     * @version     0.1
     * @since       0.1
     *  
     * @access      public
     * @return      string      URL requested by the user. 
    */
    public function getfooter() {
        (file_exists(THEME_PATH.'header.php') ?  include_once THEME_PATH.'footer.php' 
                                                 : 
                                                 Error::addError(1002,'footer.php doesn\'t exist.')
        );
    }
    
} // Controller()

