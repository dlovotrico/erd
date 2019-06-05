<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }



/** 
 * <h1>Input string sanitization engine</h1>
 *
 * - Each method or class which requires a sanitized string can use Sanitizer().
 *
 * - <strong>This class uses different levels of sanitization for different types of inputs and outputs.</strong>
 * 
 * 
 * 
 * ----
 * 
 * 
 * 
 * @author          D.Lovotrico <dlov@nucleoid.net>
 * 
 * @version     Version 0.1
 * @since       Version 0.1
 */



class Sanitizer 
{
##
##--------------------------------------------------------------------[PRIVATE METHODS]
## 
    
   /**
    * <h1>STRING SANITIZER TOOL</h1>
    * <p>This method is the engine of the class.</p>
    * 
    * 
    * 
    * 
    * @access   private
    * 
    * @param    string  $str    Sting to sanitize
    * @param    integer $level  Cleaning level, the higher the highest to level.
    *                               - 1: User output
    *                               - 2: DB queries
    *                               - 3: URLs, URIs, etc.
    * 
    * @return string
    */    
    
    private function sanitizeString($str, $level = 3) 
    {
        if($level == 3)
        {
            // Alphanumeric characters cleaning.
            $str = preg_replace('#[^-a-zA-Z0-9_ ]#', '', $str);  
            // Dashes formatting for the URL.
            $str = preg_replace('#[-_ ]+#', '-', $str);
        }

        if($level == 3 OR 2)
        {
            // Escape special chars.
            $str = htmlspecialchars($str);
            // Remove whte spaces. 
            $str = trim($str);
        }

        return $str;
   } // sanitizeString()




  

   
##
##--------------------------------------------------------------------[PUBLIC METHODS]
##
    public function fromUrl($url) 
    {
        return $this->sanitizeString($url,3);
    } // fromUrl()
    
    

    
    public function fromQuery($query) 
    {
        return $this->sanitizeString($query,2);        
    } // fromQuery()


    
    
    public function toOutput($output) 
    {
        return $this->sanitizeString($output,1);     
    } // toOutput()



} // SANITIZER()