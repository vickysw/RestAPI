<?php
namespace core;

Class Core{
    public static function run() {

       // echo "run()";

       self::init();

       self::autoload();

       self::dispatch();
 
    }



    private static function init() 
    {

        // Define path constants
    
        define("DS", DIRECTORY_SEPARATOR);
    
        define("ROOT", getcwd() . DS);
    
        define("APP_PATH", ROOT . 'application' . DS);
    
        define("CONFIG_PATH", ROOT . "config" . DS);
    
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
    
        define("MODEL_PATH", APP_PATH . "models" . DS);
    
        if(!file_exists(CONTROLLER_PATH.$_REQUEST['controller'].'Controller.php')){
            header( '404 Not Found' );
            exit( 'Request not found' );
        }


        define("CORE_PATH", "core" . DS);
    
        define('DB_PATH', "database" . DS);
    
        define("LIB_PATH", "libraries" . DS);
    
        define("HELPER_PATH", "helpers" . DS);
    
        define("UPLOAD_PATH", "uploads" . DS);
        
        //Log files
        define("LOG_PATH", UPLOAD_PATH. "logs" . DS);

        define("CONTROLLER", isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'Index');

        define("ACTION", isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index');
    
        // Load core classes
    
        require CORE_PATH . "Controller.class.php";
    
        require CORE_PATH . "Loader.class.php";
    
        require DB_PATH . "Mysql.class.php";
    
        require CORE_PATH . "Model.class.php";
        
        // Load configuration file
    
        $GLOBALS['config'] = require CONFIG_PATH . "config.php";
       
    
    }


    // Autoloading

private static function autoload()
{

    spl_autoload_register(array(__CLASS__,'load'));

}


// Define a custom load method

    private static function load($classname)
    {


        // Here simply autoload app’s controller and model classes

        if (substr($classname, -10) == "Controller"){

            // Controller

            require_once CONTROLLER_PATH . "$classname.php";

        } elseif (substr($classname, -5) == "Model"){

            // Model

            require_once  MODEL_PATH . "$classname.php";

        }

    }
    // Routing and dispatching

    private static function dispatch()
    {

        // Instantiate the controller class and call its action method

        $controller_name = CONTROLLER . "Controller";

        $action_name = ACTION . "Action";

        $controller = new $controller_name;

        $controller->$action_name();

    }

}
?>