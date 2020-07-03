<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' ) {
    /* 
       Up to you which header to send, some prefer 404 even if 
       the files does exist for security
    */
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

    /* choose the appropriate page to redirect users */
    exit( 'Bad method not allowed.' );

}
// Base Controller

class Controller{

    // Base Controller has a property called $loader, it is an instance of Loader class(introduced later)

    protected $loader;
    
    protected $controller;
    protected $action;

    protected $request;


    public function __construct(){
        
        $this->loader = new Loader();
        
        if(is_a($this,$_REQUEST['controller']."Controller"))
        {
            $this->controller = $_REQUEST['controller']."Controller";
            $this->action = $_REQUEST['action']."Action";
          
            if(!in_array($this->action,get_class_methods($this->controller))){
                header( '400 Not Found' );
                exit( 'Action not found' );
            }
            
            $this->request = $_REQUEST;
            
        }else{
            header( '400 Not Found' );
            exit( 'Class not found' );
        }
       
    }


    public function redirect($url,$message,$wait = 0){

        if ($wait == 0){

            header("Location:$url");

        } else {

            include CURR_VIEW_PATH . "message.html";

        }


        exit;

    }

}