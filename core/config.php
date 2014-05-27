<?php
/**
 * Arrays y funciones de configuración
 *
 * Este archivo simplemente sirve para la comodidad en la configuración,
 * luego durante ejecución es levantado por el modelo Info(), procesado
 * y formateado para su uso, por lo que si necesitamos pedir cierta info
 * deberemos utilizar Info() y sus métodos. 
 * 
 * 
 * @author       Diego Lovotrico <diego@nucleoid.net>
 *
 * @version      0.1
 * @since        Version 0.1
 * 
 * 
 * @todo         Cambiar permisos a sólo lectura.
 * 
 */


// ******* CONFIGURAMOS EL REPORTE DE ERRORES *******
error_reporting(E_ALL & ~E_NOTICE);



// ******* PARAMETROS INTERNOS *******
date_default_timezone_set('America/Argentina/Buenos_Aires');



// ******* VARIABLES DE EJECUCIÓN *******
define('CFG_ERROR_LEVEL',   3);
define('CFG_RUN_MODE',      'deployment');
// define('CACHING_MODE',      'off');  // - Implementar más adelante.



// ******* CONFIGURAMOS LA META-INFO *******
define('INFO_VERSION',   '0.1 alpha');
define('INFO_AUTHOR',    'Diego Lovótrico');
define('INFO_COPYRIGHT', 'Creative Commons License');



// ******* CONFIGURACIÓN VIEWS ACEPTADAS *******
$controllers['default'] = 'Frontpage';          // Controlador por defecto a cargar.
$controllers['public']  = 'frontpage|test';     // Respetar el formato, el nombre de
                                                // cada controlador se escribe en
                                                // minúsculas.


// ******* SELECCION DEL THEME Y EL MOTOR DE VISTAS*******
define('APP_PATH',          '/lab/test/');      // *** Base path de la aplicación. ***
define('THEME_PATH',        CONTENT_PATH.'themes/v1/');
define('APP_VIEW',          'View');            // Permite cambiar el motor de renderizado
                                                // del sitio. Por ahora implemento uno simple
                                                // y generalizado, pero en el futuro voy a 
                                                // crear uno específico para distintas 
                                                // tecnologías, móviles, desktop, etc.


// ******* CONFIGURACIÓN BASE DE DATOS *******
$database['host'] = 'def';
$database['user'] = 'daf';
$database['pass'] = 'dif';
// $database['lib'] = '';       // - Implementar más adelante. 
