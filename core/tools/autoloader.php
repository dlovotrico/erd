<?php
/**
 * <b>Función de carga dinámica</b>
 * 
 * La función de la misma es cargar los controladores dinámicamente.
 * En caso de no existir la clase que contiene al controlador retorna
 * FALSE.
 * 
 * 
 * 
 * 
 * @author       Diego Lovotrico <diego@nucleoid.net>
 * 
 * @since        Version 0.1
 * @version      0.1
 * @category     Herramientas
 * 
 * @param  string $class La clase a cargar
 * 
 * @return void|bool     Sólo retorna algo si la clase con el controlador 
 *                       no existe. 
 */
spl_autoload_register(function ($class) {
    // Pasa el nombre de clase a minúsculas ya que por convención
    // si bien las clases tienen la primer letra mayúscula, los 
    // archivos en el filesystem se normalizan enteramente en
    //  minúsculas.
    $class = strtolower($class);
    if(file_exists(MODELS_PATH.$class.'.php')) 
    {     
        include_once MODELS_PATH.$class.'.php';
    } 
    elseif(file_exists(CONTROLLERS_PATH.$class.'.php')) 
    {
        include_once CONTROLLERS_PATH.$class.'.php';
    }
    elseif(file_exists(VIEWS_PATH.$class.'.php')) 
    {
        include_once VIEWS_PATH.$class.'.php';
    }
    elseif(file_exists(TOOLS_PATH.$class.'.php'))
    {
        include_once TOOLS_PATH.$class.'.php';
    } 
    elseif(file_exists(LIBS_PATH.$class.'.php'))
    {
        include_once LIBS_PATH.$class.'.php';        
    }
    else
    {
        return FALSE;
    } 
});
