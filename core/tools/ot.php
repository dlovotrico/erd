<?php

/**
 * Description of outputtools
 * 
 * Utilizado principalmente para el debug y el proceso de cadenas.
 * Su función no va más alla que la de formatear cadenas de texto,
 * utilizando HTML y CSS in-line.
 * 
 * 
 * @author       Diego Lovotrico <diego@nucleoid.net>
 *
 * @version      0.1
 * @since        Version 0.1
 */

/**
 * Clase principal de output tools.
 * 
 * Ot es la clase principal de output tools, y la misión de la misma
 * es la de brindar los métodos básicos para el formateo de cadenas
 * en un formato accesible en todo el scope del programa sin necesidad
 * de ser instanciada. 
 * 
 * 
 * @todo agregar un modo de producción en el que el texto sea muy
 *       notorio y titilante, y que a su vez informe de la clase, 
 *       función y linea desde la que fue llamada. Esto concordaría
 *       con un modo de configuración tipo producción que se declara
 *       como constante al principio del archivo ot.php
 * 
 * @version      0.1
 * @since        Version 0.1
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
     * Agrega elementos HTML br para formar un bloque.
     * 
     * @todo Cambiar el orden de los parámetros.
     * 
     * @since Version 0.1
     * 
     * 
     * @param string $str   cadena a encerrar.
     * @param string $side  tipo de bloque
     * 
     */
    public function bk($str,$side = b)
    {
        if($side == l OR b) echo "<br />";
        echo $str;
        if($side == r OR b) echo "<br />";
    }

    /**
     * Procesa una string y le da formato HTML básico
     * 
     * La idea no es que sea muy compleja, sino que sirva para
     * outputear paragraphs and titles quickly while debugging.
     * <b>Usage</b>
     * The following will output a bolded, red line of text:     * 
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
    public function str($str,$opOne = false,$color = false)
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

    public function p($str)
    {
        echo "<p>".$str."</p>";
    }

    public function title($str,$color = "000000",$size = 21)
    {
        echo "<p style='color:$color;font-size:$size"."px;font-weight: bold'>".$str."</p>";
    }
            
}
