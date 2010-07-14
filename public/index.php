<?php 

    /**
     * Define constants
     *
     **/
     
     //Define project status (dev, test, live)
     define('STATUS', 'dev');
     
     //shorten DIRECTORY_SEPERATOR
     define('DS', DIRECTORY_SEPARATOR);
     
     //Define pathing
     //create app root
     define('ROOT', create_root() . DS);
     define('APP', ROOT . 'app' . DS);
     define('CONTROLLERS', ROOT . 'app' . DS . 'controllers' . DS);
     define('VIEWS', ROOT . 'app' . DS . 'views' . DS);
     define('WWW_ROOT', ROOT . 'public' . DS);
     define('SITE_URL', $_SERVER["SERVER_NAME"] . DS);
     define('TMP', APP . 'tmp' . DS);
     define('LIBS', APP . 'libs' . DS);
     define('CONFIG', APP . 'config' . DS);
          
     //include config data
     require_once(CONFIG . 'config.php');
     
     function __autoload($name){
        if(is_file(APP . 'classes' . DS . $name . '.php')){
            require_once(APP . 'classes' . DS . $name . '.php');
        }
     }
     
     /****
     * Setup routing and continue
     */
     
     $router = new Router();
     $router->request();
     
     function create_root(){
        $root = getcwd();
        $new_root = substr($root, 0, (-1 * (strlen(strrchr($root, '/')))));
        return $new_root;
     }
     
?>