<?php
/** 
 * <b>Higienización inteligente de cadenas</b>
 *
 * Cada método o clase que requiera una cadena higienizada utilizará
 * Sanitizer() para su limpieza. Esta clase brinda distintos niveles
 * de higiene para distintos tipos de inputs y outputs. 
 * 
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version     Version 0.1
 * @since       Version 0.1
 */


class Sanitizer {
   /**
    * <b>Higie de cadenas</b>
    * 
    * Este método es el "motor" de la clase. 
    * 
    * 
    * @access   private
    * 
    * @param    string  $str    Cadena a limpiar
    * 
    * @param    integer $level  Nivel de limpieza, mientras más alto sea el nivel
    *                           más se limpiará la cadena de caracteres especiales 
    *                           y demás.
    *                               - 1: output para un usuario
    *                               - 2: database querries
    *                               - 3: URLs, URIs, etc.
    * 
    * @return string
    */ 
    private function sanitizeString($str, $level = 3) 
    {
        if($level == 3)
        {
            // Eliminar chars no alfanuméricos
            $str = preg_replace('#[^-a-zA-Z0-9_ ]#', '', $str);  
            // Formatea guiones para la URL
            $str = preg_replace('#[-_ ]+#', '-', $str);
        }

        if($level == 3 OR 2)
        {
            // Escapar caracteres especiales
            $str = htmlspecialchars($str);
            // eliminar espacios en blanco 
            $str = trim($str);
        }
        return $str;
   }


   // ------------------> METODOS PUBLICOS
    public function fromUrl($url) {
        return $this->sanitizeString($url,3);
    }
    
    public function fromQuery($query) {
        return $this->sanitizeString($query,2);        
    }

    public function toOutput($output) {
        return $this->sanitizeString($output,1);     
    }
}