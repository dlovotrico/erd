<?php


/**
 * <b>Armador de vista estándar</b>
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version     Version 0.1
 * @since       Version 0.1
 * @category    Bootstrap
 * 
 * @todo        Implementar $_session
 */
class Defview extends View{
    public function __construct() {
        // Llama al constructor de la view  madre, el cual incluye
        // todos los elementos afines a todas las vistas de la app.
        parent::__construct();
    }

}
