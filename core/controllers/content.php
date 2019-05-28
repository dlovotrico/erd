<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }



/**
 * <b>View for controller deployment</b>
 *
 * This controller is tasked with gathering the contents to the user.  * 
 * 
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>

 * 
 * @version     version 0.1
 * @since       version 0.1
 * @category    controllers, contents
 * 
 */


class Content {
    private static $_singleton;
    private $_lastArticle = array(); // this array stores all the parts needed to 
    //                               // render the site. 
                                     // If the modifier is set to 'only' $_lastArticle 
                                     // will be resetted and will only bring back what
                                     // was requested. 

    
    
    private function __construct() {  
    }



    public static function getInstance() {
        if(is_null (self::$_singleton)) {
            self::$_singleton = new Info();
        }
        RETURN self::$_singleton;
    } // END getInstance()

    
    
    public function article($item,$modifier) {
        switch ($item) {
            case 'title':
                // Brings only the title from the DB. 
            case 'content':
        }
    }

    

    public function getPath($item) {
    // Returns absolute links to avoid problems with Apache

        switch ($item) {
            case 'css':
                echo APP_PATH.THEME_PATH."css/";
                break;
            case 'js':
                echo APP_PATH.THEME_PATH."js/";
                break;
        }
        return ;
    }

    

    public function getTitle($id) {
    }
}



// ******* Functions to access CONTENT() *******
function getVersion() {
    echo APP_VERSION;
}



function getAuthor() {
    echo APP_AUTHOR;
}