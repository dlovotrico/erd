<?php
/**
 * Clase de limpieza y preparación de data
 * 
 * Información del programa, URLs, paths, tiempo, entorno, 
 * configuración, etc.Básicamente esta clase se encarga de
 * tomar información de distintos medios, y prepararla para
 * su uso por los otros módulos.
 * 
 * Toda la información ingresada por el usuario es siempre
 * higienizada antes de ser entregada.
 *
 * 
 * @author       Diego Lovotrico <diego@nucleoid.net>
 *
 * @version      0.1
 * @since        Version 0.1
 */
class Info {
    private static $_singleton;
    private $_Sanitizer     = null;
    private $_Error         = null;    
    private $_database      = null;
    private $_config        = null;
    private $_controllers   = array();


    private function __construct() {
        // Carga los controladores necesarios.
        $this->_Sanitizer = new Sanitizer();
        $this->_Error = Error::getInstance();
        
        // Cargamos la configuración
        require_once CORE_PATH.'config.php';
        
        // Mapeamos las variables de config a 
        // las propiedades de clase.
        $this->_database                = $database;
        $this->_controllers['default']  = $controllers['default'];
        $this->_controllers['public']   = explode("|", $controllers['public']);
    } // fin __construct()


    public static function getInstance() {
        if(is_null (self::$_singleton)) {
            self::$_singleton = new Info();
        }
        RETURN self::$_singleton;
    } // Fin getInstance()
    
    
    
    // ----> METODOS PUBLICOS

    /**
     * <b>Devolución de URLs</b>
     * 
     * Limpia y devuelve la URL generada por Apache.
     *
     * 
     * @since Version 0.1
     * 
     * 
     * @access public
     * 
     * @return string La URL en la request del usuario.
     */
 
    public function getUrl() {
        return $this->_Sanitizer->fromUrl($_GET['url']);
    }

    /**
     * <b>Devolución de variables</b>
     * 
     * Higieniza y devuelve las variables GET enviadas por el usuario.
     *
     * 
     * @since Version 0.1
     * 
     * 
     * @access public
     * 
     * @param string $userVar
     * 
     * @return string El valor de la variable higienizado.
     */
    public function getUserVar($userVar) {
        return $this->_Sanitizer->fromUrl($_GET[$userVar]);
    }

    /**
     * <b>Método identificador de validez de módulos</m>
     * 
     * Identifica el controlador pedido por el usuario, lo higieniza, 
     * lo formatea y revisa que exista el archivo del mismo en. 
     * En caso de que algo falle devuelve el nombre del controlador
     * por defecto y marca un error. 
     * 
     *
     * 
     * @since Version 0.1
     * 
     * 
     * @access public

     * @return boolean Retorna false si el controlador no existe
     *                 o no es aceptado como controlador válido.
     */
    public function getController() {
        // Traemos el controlador solicitado por el usurio y lo pasamos a
        // minúsculas, esto evita errores si el usuario pasa algo como
        // /CoNtrOlADOR/
        $controller = strtolower($this->getUserVar('controller'));
        // Si el la variable controller está vacia es porque el usuario
        // accedio al index. 
        (strlen($controller) == 0 ?  $controller = $this->_controllers['default'] : FALSE);
        // Checkea si la clase del modelo existe físicamente.
        if(file_exists(CONTROLLERS_PATH.$controller.'.php')) {
            // Se formatea el nombre del controlador.
            // Checkea que el modelo permita ser accedido por el público 
            // (ver config.php)
            if(in_array($controller,$this->_controllers['public'])) {
                return ucfirst($controller);
            } else {
                Error::addError(1001,"Error, el módulo '$controller' no se está permitido.");
            }
        } else {
            Error::addError(1001,"Error, recurso '$controller' no existe.");
            return ucfirst($this->_controllers['default']);
        }
    } // Fin getController()

 
    /**
     * <b>Retornador de ID</b>
     * 
     * @return integer la ID del recurso seleccionado
     */
    public function getId() {
       return (int)$this->getUserVar('id');
    } // Fin getId()
            
    
    /**
     * <b>Credenciales de base de datos</b>
     * 
     * 
     * @since Version 0.1
     * 
     * 
     * @access public
     * 
     * @param string $credential    La credencial solicitada. 
     * 
     * @return string|boolean       La credencial de DB si es que existe.
     */
    
    public function getDbInfo($credential) 
    {
        switch ($credential)
        {
            case 'host':
            case 'user':
            case 'pass':
                return (string)$this->_database[$credential];
            default:
                return false;
        }
        
    } // Fin getDbInfo()
    
    
    /**
     * <b>Retornar variables de configuración</B>
     * 
     * 
     * @since Version 0.1
     * 
     * 
     * @access public
     * 
     * @param string $cfgvar        Variable de configuración deseada
     * @return string|boolean       Valor de lo pedido si existe.
     */
    
    public static function getConfigVars($cfgvar) {
        switch ($cfgvar) {
            case 'view engine':
                // La misma se define en config.php y dicata que
                // motor de renderizado se debe utilizar.
                return APP_VIEW;
            default:
                return false;
        }
    } // Fin getConfigVars()s
}