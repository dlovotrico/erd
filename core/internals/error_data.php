<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


/**
 * <h1>ERROR CODES</h1>
 * <p>Stores the error messages and their severity levels.</p> 
 * 
 * 
 * 
 * 
 *  
 * @author          D.Lovotrico <dlov@nucleoid.net>
 * 
 * @version         Version 0.1
 * @since           Version 0.1
 *
 * @category        Configuration
 *
 */


class Error_data
{

    public function __construct() 
    { 
        // ...
    } //  __construct()





##
##--------------------------------------------------------------------[PRIVATE METHODS]
##
    /**
    * <h3>ERROR MESSAGE AND SEVERITY CONTAINER</h3>
    * <p>Contains the description and severity levels for each error code.</p>
    * 
    *
    * 
    * @version     0.1
    * @since       0.1
    * 
    * @access      private
    *
    * @param       int          $code the requested error code.
    */
    private function error_information($code)
    {
        $errorData = array();

        switch ($code) 
        {
            case 9999:
                $errorData['message']   =   'Generic error. Error code does not exist.';
                $errorData['severity']  =   1;
                break;
            case 1001:
                $errorData['message']   =   'Missing theme file.';
                $errorData['severity']  =   1;
                break;
            case 2001:
                $errorData['message']   =   'Bad configuration parameters. The controller value must be a string.';
                $errorData['severity']  =   1;
                break;                
            default:
                $errorData = null;
        }

        return $errorData;
    } // error_information()



    /**
    * <h3>ALERT  MESSAGE AND SEVERITY CONTAINER</h3>
    * <p>Contains the description and severity levels for each alert code.</p>
    * 
    *
    * 
    * @version     0.1
    * @since       0.1
    * 
    * @access      private
    *
    * @param       int          $code the requested alert code.
    */
    private function alert_information($code)
    {
        $errorData = array();

        switch ($code) 
        {
            case 9999:
                $errorData['message']   =   'Generic alert. Alert code does not exist.';
                $errorData['severity']  =   1;
                break;         
            case 1001;
                $errorData['message']   =   'The user requested controller does not exist.';
                $errorData['severity']  =   5;
                break;                     
            default:
                $errorData = null;
        }

        return $errorData;
    } // error_information()






##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    /**
    * <h3>RETURNS ERROR/ALERT INFORMATION</h3>
    * 
    * 
    * 
    * @version     0.1
    * @since       0.1
    * 
    * @access      public
    *
    * @param       int          $code the requested error code.
    */
    public function get_information($type, $code) {
        if($type === 'error')
        {
            return self::error_information($code);
        } elseif($type === 'alert')
        {
            return self::alert_information($code);
        }
    } // get_information()

} //Error_data()