<?php
/**
 * <b>Inicializador principal</b>.
 * 
 * Módulo bootstrap encargado de inicializar todos los procesos 
 * de la aplicación, cargar los archivos necesarios, llamar
 * al autoloader, instanciar las clases requeridas para el 
 * controlador pedido, y verificar que estén las condiciones
 * dadas para ejecturar la plataforma. 
 * 
 * La info/recurso requeridos se construyen en base al recurso 
 * solicitado por el usuario y la info de sesión.
 * 
 * 
 * <b>OBSERVACIONES</b>
 * - La lista de controladores aceptados se establen en <i>config.php</i>
 * - El controlador se selecciona en base a la URL devuelta por <b>Apache</b>.
 *   - Por ejemplo: <i>http://www.nucleoid.net/contname/nn</i> 
 *     será convertida en: <i>index.php?controller=contname&id=nn</i>
 *   - Si el usuario entra una URL no válida por defecto es enviado a 
 *     <i>index.php?controller=frontpage&id=0</i>
 *
 * 
 * @author      Diego Lovotrico <diego@nucleoid.net>
 * 
 * @version     Version 0.1
 * @since       Version 0.1
 * @category    Bootstrap
 * 
 * 
 * @todo        Implementar $_session
 * @todo        Crear reportes de errores y testear su depliegue.
 * @todo        Implementar checkeo de errores antes de renderizar
 *              y manejar errores fatales. 
 */
class Init {
    private $_Info;
    private $_Controller;
    private $_contName;
    private $_id;
    private $_session;

    public function __construct() {
        // INCLUSIÓN DE CLASES NECESARIAS
        require_once TOOLS_PATH.'autoloader.php';
        $this->_Info = Info::getInstance();

        // PROCESAMIENTO DE LA REQUEST DEL USUARIO
        // Si el controlador pasado por el usuario no es correcto o público
        // checkController asigna el controlador por defecto establecido en
        // core/config.php
        $this->_contName    = $this->_Info->getController();
        $this->_id          = $this->_Info->getId();
 
echo '<div class="dbox">';
echo '<!-- Información insertada por el controlador de estado -->';
Ot::str('<b>Información de debug:</b><br />');
Ot::str(' Controlador en uso: <small><b>'.$this->_contName.'</b></small> ');
Ot::str(' -- ID del item: <small>'.$this->_id.'</small> ');
Ot::str(' -- Errores capturados: 0');
Ot::str(' -- Modo de ejecuión: development');
echo '</div>';

        // CARGA EL CONTROLADOR ENCARGADO DE PREPARAR EL CONTENIDO SOLICITADO       
        $this->_Controller  = new $this->_contName();

        // Ensamblamos las partes del sitio.
        $this->_Controller->_View->getHeader();
        $this->_Controller->_View->getContent($this->_contName);
        $this->_Controller->_View->getFooter();


/*
Ot::title("Info check",'red');
Ot::str("Host".$this->_Info->getDbInfo('host'),'p');
Ot::str("User".$this->_Info->getDbInfo('user'),'p');
Ot::str("Pass".$this->_Info->getDbInfo('pass'),'p');
 
Ot::title("Inicio del core 3",'red');

 
 
 
 */
    }

}
