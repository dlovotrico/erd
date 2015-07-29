<?php/** * <h1>Standard view renderer</h1>. *  *  * ---- *  * Edit for git testing. *  *  * @author      Diego Lovotrico <diego@nucleoid.net> *  * @category    Libraries * @cetegory    Views *  * @version     Version 0.1 * @since       Version 0.1 *  *   * @todo        Implementar archivos por defecto para evitar tener *              que matar al sitio en caso de que falte alguno *              de los archivos theme a medida.  *  * @todo        página 404 a medida en caso de que el contenido no  *              sea permitido.  *  */class View {    function __construct() {        // Vista    }            // -----------------------------------------------------------------------    // |----------------------------------------------------> [PUBLIC METHODS]    // -----------------------------------------------------------------------    /**     * <h3>HEADER building</h3>     * - Builds the site header     *     * @since Version 0.1     *       * @access public     * @return string URL requested by the user.     */    public function getHeader() {        // --> Definir qué pasa cuando no se encuentra el recurso.        // --> Definir qué pasa cuando se encuentra un error.        // --> Definir lógica para manejar problemas.        (file_exists(THEME_PATH.'header.php') ?  include_once THEME_PATH.'header.php'                                                  :                                                  Error::addError(1002,'header.php no existe')        );    }        public function getContent($content) {        $content = strtolower($content);        if(file_exists(THEME_PATH."$content.php")) {            include_once THEME_PATH."$content.php";        } else {            Error::addError(1002,"'$content' no existe");            // --> Llamar theme por defecto.            // --> Desplegar el error.        }    }    public function getfooter() {        (file_exists(THEME_PATH.'header.php') ?  include_once THEME_PATH.'footer.php'                                                  :                                                  Error::addError(1002,'footer.php no existe')        );    }} // View()