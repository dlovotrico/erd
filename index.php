<?php

/**
 * Punto de inicio
 * 
 * Simplemente es una interface para llamar a <i>init()</i>.
 * La idea es que si hay un problema con el soft del
 * servidor no se depliegue el código fuente de <i>init()</i>
 * al usuario.
 * 
 *  
 * @author Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version 0.1
 * @since 0.1
 * 
 * 
 * INFO ADICIONAL:
 * [Config]
 *   - core/config.php  - contiene toda la info de configuración.
 *                        modelo por defecto, reporte de errores
 * 
 *   - Init      - se encarga de cargar el programa e ini-
 *                 cializar todo.
 * 
 *   - Info      - Maneja toda la información interna de la app.
 * 
 * 
 */

// DEFINIMOS LOS PATHS
define('CORE_PATH',     'core/');
define('CONTENT_PATH',  'content/');

// Subpaths
define('CONTROLLERS_PATH',  CORE_PATH.'controllers/');
define('MODELS_PATH',       CORE_PATH.'models/');
define('VIEWS_PATH',        CORE_PATH.'views/');
define('LIBS_PATH',         CORE_PATH.'libs/');
define('TOOLS_PATH',        CORE_PATH.'tools/');

// CONFIGURACIÓN
// El resto de las opciones de configuración están en 
// core/config.php y son cargadas en el sistema mediante
// core/controllers/Info()

// INICIALIZAMOS EL SISTEMA
// Init es el bootstrap, toda la aplicación se ramifica desde ahí
require_once CORE_PATH.'init.php';
$init = new Init();