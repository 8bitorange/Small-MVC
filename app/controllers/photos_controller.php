<?php
    
    class Photos extends APP {
        
        //controller name
        var $controller;
        
        //API key
        var $api_key;
        
        //set name and key
        function __construct(){
            parent::__construct();
            $this->controller = get_class();
            $this->controller = strtolower($this->controller);
            $this->api_key = 'your_api_key_here';
        }
        
        /* Index function */
        function index($params, $renderLayout = true){
        
            //set per page request to whats passed in or default to 50
            $per_page = (isset($params[0]))? $params[0] : 50;
            //set size to whats passed in or square
            $size = (isset($params[1]))? $params[1] : 's';
            
            //Create flickr path and load xml
            $path = sprintf("http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=%s&tags=autolux&per_page=%s", $this->api_key, $per_page);
            $flickr_feed = simplexml_load_file($path);
            
            
            //Loop through flickr feed and build url to pass to view
            $count = 0;
            $display = array();
            foreach($flickr_feed->photos->photo as $photo){
                $display[$count]['link'] = (string)'http://flickr.com/photos/' . $photo[@owner] . '/' . $photo[@id];
                $display[$count]['photo'] = (string)"http://farm" . $photo[@farm] . ".static.flickr.com/" . $photo[@server] . "/" . $photo[@id] . "_" . $photo[@secret] . "_$size.jpg";
                $count++;
            }
            
            //pass the photos array to the page
            $pass = array(
                'photos' => $display,
                'title_for_page' => 'Photos'
            );

            
            $path = $this->controller . DS . 'index';
            
            return parent::loadView($path, $pass, $renderLayout);
            
        }
    
    }
    
?>