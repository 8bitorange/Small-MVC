<?php

    /* Default page controller to create and display static pages */
        
    class Css extends APP {
        
        //Controller name
        var $controller;
        
        //set class name
        function __construct(){
            parent::__construct();
            $this->controller = get_class();
            $this->controller = strtolower($this->controller);
        }
        
        //generic page load function
        function load($params, $renderLayout = true){
            
            $view = $params[0];
            $path = WWW_ROOT . 'css' . DS . $view;
            
            parent::loadCss($path);
            
        }
    
    }
    
?>