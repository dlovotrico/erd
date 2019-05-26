<?php
if(!defined('FROM_INDEX') ) { die("Execute from site root."); }



/**
 * Description of outputtools
 * 
 * This tool is used for debugging processes: string processing, reporting, text
 * formatting, etc. All wrapped in HTML and in-line CSS. 
 * 
 * 
 * @author       Diego Lovotrico <diego@nucleoid.net>
 *
 * @version      0.1
 * @since        version 0.1
 */



/**
 * Clase principal de output tools.
 * 
 * Ot is the main class of the OUTPUT TOOLS. It offers the basic methods for 
 * formatting strings and be accessible from the entire scope of the program. 
 *
 * 
 * @todo add a production in which the text is very visible. Also report the class, 
 *       function or line from which it was called.
 *
 * @version      0.1
 * @since        version 0.1
 */

class Ot {
    private static $_singleton;
    private function __construct()
    {

    }



    public static function getInstance() 
    {
        IF (is_null (self::$_singleton))
        {
            self::$_singleton = new Ot(); 
        }
        RETURN self::$_singleton;
    }
    
    
    /**
     * Adds HTML elements to help formatting blocks. 
     * 
     * @todo Change the param order.
     * 
     * @since Version 0.1
     * 
     * 
     * @param string $str   string to wrap. 
     * @param string $side  type of block
     * 
     */
    public function bk($str,$side = b)
    {
        if($side == l OR b) echo "<br />";
        echo $str;
        if($side == r OR b) echo "<br />";
    }


    /**
     * Process a string and formats it with HTML. 
     * 
     * 
     * <b>Usage</b>
     * The following will output a bold, red line of text:     * 
     * <code>
     * $o->st("Inicio del core",b,'red')
     * </code>
     * 
     * @since        Version 0.1
     * @version      0.1
     * 
     * @param string $str     String to process
     * @param string $opOne   An HTML element to wrap the string in,
     *                        only the element letters are needed
     * @param string $color   The color for the CSS style.
     * 
     * 
     */

    public static function str($str,$opOne = false,$color = false)
    {
        if($opOne != false)
        {
            echo "<$opOne";
            if($color != false) echo " style='color: $color'";
            echo ">".$str."</$opOne>";
        }
        else
        {
            echo $str;
        }
    }


    public static function p($str)
    {
        echo "<p>".$str."</p>";
    }


    public static function title($str,$color = "000000",$size = 21)
    {
        echo "<p style='color:$color;font-size:$size"."px;font-weight: bold'>".$str."</p>";
    }

}





?>
