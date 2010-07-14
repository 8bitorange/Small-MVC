<?php
    
    class Eventful{
        
        //API Key
        var $api_key;
        
        //Base eventful url
        var $base_url;
        
        //Set api_key and url
        function __construct(){
            $this->api_key = 'your_api_key_here';
            $this->base_url = "http://api.evdb.com/rest/";
        }
        
        function find($params){
            
            //create path to eventful call
            $path = $this->base_url . $params['section'] . DS . $params['method'] . '?app_key=' . $this->api_key;
            
            //Loop through options and cat to path
            foreach($params['options'] as $key => $val){
                $path .= '&' . $key . '=' . $val;
            }
            
            //send to xml call
            return $this->get($path);
        
        }
        
        
        /* This is seperated off to be extendable at a later date */
        function get($path){
         
            $data = simplexml_load_file($path);
            return $data;
        
        }
        
    }
    
?>