<?php

/**
 * <b>Modelo de armado y desplegado de contenido</b>
 *
 * Este tiene con fin suministrar y traer los contenidos del sitio,
 * debe ser el único objeto utilizado con los archivos del theme, ya
 * que los debmas deben quedar encapsulados fuera del theme en si mismo. 
 * 
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version     Version 0.1
 * @since       Version 0.1
 * @category    Modelos, contenidos
 * 
 */

class Content {
    private static $_singleton;
    private $_lastArticle = array(); // la misión de esta propiedad es almacenar
                                     // todas las partes de un artículo, cuestión
                                     // de que si sólo pedimos el título, y luego
                                     // el contenido, etc. disminuyamos la cantidad
                                     // de requests a la base de datos, teniendo
                                     // un cache del último artículo entero. 
                                     // Salvo que modifier sea 'only', tras lo cual
                                     // $_lastArticle se reseteará y traerá sólo lo
                                     // que se pide.
    
    
    private function __construct() {    
    
        
    }

    public static function getInstance() {
        if(is_null (self::$_singleton)) {
            self::$_singleton = new Info();
        }
        RETURN self::$_singleton;
    } // Fin getInstance()
    
    

    
    public function article($item,$modifier) {
        switch ($item) {
            case 'title':
                // traer titulo de la DB
            case 'content':
                // traer contenido 
        }
    }
    
    
    public function getPath($item) {
    // Entrega links absolutos para evitar problemas
   // con apache.
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


// ******* FUNCIONES DE ACCESO A CONTENT() *******
function getVersion() {
    echo APP_VERSION;
}

function getAuthor() {
    echo APP_AUTHOR;
}