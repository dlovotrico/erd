<?php

/**
 * <b>Modelo controlador de errores</b>
 *
 * Recibe errores de todos los módulos de la aplicación, los
 * colecciona y reporta en caso de ser requeridos informando
 * además el nivel de seguridad. 
 * 
 * 
 * <b>Códigos</b>
 *      - <b>Serie 1000</b> - <i>Recursos no disponibles</i>
 *              - 1001: El controlador solicitado por el usuario no existe.
 *                      Este error no justifica terminar el programa, se
 *                      procede redireccionando al usuario a la frontpage.
 *              - 1002: Theme incompleto, falta algún archivo del mismo. 
 *                      <b>error severo</b> se finaliza el programa y despliega
 *                      mensaje. 
 * 
 * @author       Diego Lovotrico <diego@nucleoid.net>
 *
 * @since        Version 0.1
 * @version      0.1
 * 
 */

class Error {
    private static $_singleton;
    private static $_reportedErrors = array();

    private function __construct() {
        // INICIALIZANDO EL ARRAY DE ERRORES REPORTADOS
        self::$_reportedErrors[1001] = array();
        self::$_reportedErrors[1002] = array();
    }
    
    public static function getInstance() {
        if(is_null (self::$_singleton)) {
            self::$_singleton = new Error();
        }
        RETURN self::$_singleton;
    } // Fin getInstance()

    
    
    // ----> METODOS PUBLICOS
    /**
     * <b>Reporta un error al sistema</m>
     * 
     * 
     * @since        Version 0.1
     * 
     * 
     * @param int $errorCode tipo de error reportado. 
     */
    public static function addError($series,$info = TRUE) {
         array_push(self::$_reportedErrors[$series], $info);
    }
    
    public static function getError() {
        return self::$_reportedErrors;
    }
}
