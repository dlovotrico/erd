<?php

/**
 * <b>Controlador principal</b>.
 * 
 * Del mismo heredan todos los demás controladores. Básicamente
 * existe para cargar la vista pertinente a cada controlador.
 * 
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version     Version 0.1
 * @since       Version 0.1
 * @category    Librerías, controladores
 * 
 */

class Controller {
    public $_View;     // Almacena el objeto armador de vistas.
   
    function __construct() {
        // CARGA LA VISTA
        $viewName = Info::getConfigVars('view engine');
        $this->_View = new $viewName();
    }
}
