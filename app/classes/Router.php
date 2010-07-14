<?php
    
    /*
     * Dispatching class
     */
    class Router {
       
        //This is the main function to route urls to appropriate controller 
        public function request($url = null, $renderLayout = true){
            
            /* Assure that url is set appropriately in case it is passed in
             * to be fetched as included element
             */
            $final = isset($_GET['url'])? $_GET['url'] : null;
            $final = (isset($url))? $url : $final;
            
            //split path
            $paths = explode('/', $final);
            
            //Check if controller and action are set, if not default to Pages/index
            $controller = (!empty($paths[0]))? ucwords($paths[0]) : 'Pages';
            $path = CONTROLLERS . strtolower($controller) . '_controller.php';
            $action = (isset($paths[1]))? $paths[1] : 'index';
            
            //Loop through path and create params
            $params = array();
            for($i = 2; isset($paths[$i]); $i++){
                $params[] = $paths[$i];
            }
            
            //assure $class is file
            if(is_file($path)){
                //require and instantiate the class
                require_once($path);
                $class = new $controller();
                
                //if method exists call it and move on
                if(method_exists($class, $action)){
                    $result = $class->$action($params, $renderLayout);
                } elseif($controller == 'Pages' || $controller == 'Css') {
                    //if not then call default load method and pass page name
                    array_unshift($params, $action);
                    $result = $class->load($params, $renderLayout);
                } else {
                    $result = $this->error();
                }
                
                //if not rendering layout, then return page
                if(!$renderLayout){
                    return $result;
                }
            } else {
                $result = $this->error();
            }
            
        }
        
        private function error(){
            $path = CONTROLLERS . 'pages_controller.php';
            require_once($path);
            $page = new Pages();
            $params = array('404');
            return $page->load($params, true);
        }
    
    }

?>