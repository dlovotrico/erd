<?php

/*
 * Clases y funciones de testeo y prueba.
 */

/**
 * Clase utilizada exclusivamente para propositos de testeo.
 * del código, archivos e includes.
 *
 * @author q
 */
class Test extends Controller {
    public function __construct() {
        echo "<br /><b>Hola, test a sido incluida.</b><br />";
        parent::__construct();
    }
}
