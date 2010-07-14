<?php

    /* Default page controller to create and display static pages */
        
    class Pages extends APP {
        
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
            
            //get page name
            $view = $params[0];
            
            //Set twitter element if on index page
            if($view == 'index'){
                $pass['twitter'] = Router::request('twitter/index', false);
            } else {
                $pass = array();
            }
            
            $pass['title_for_page'] = ucwords($view);
            
            $path = $this->controller . DS . $view;
            
            parent::loadView($path, $pass);
            
        }
        
        //Create seperate page for about to call data from db
        function about($params, $renderLayout = true){
            
            //instantiate db
            $db = new Database();
            
            //put together call
            $find = array(
                'table' => 'content',
                'select' => 'all'
            );
            
            //return data array
            $content = $db->find($find);
                        
            $pass = array(
                'title_for_page' => 'About',
                'data' => $content
            );
            
            $path = $this->controller . DS . 'about';
            
            parent::loadView($path, $pass);
            
        }
    
    }
    
?>