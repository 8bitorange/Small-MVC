<?php
    
    class Twitter extends APP {
        
        //controller name
        var $controller;
        
        function __construct(){
            parent::__construct();
            $this->controller = get_class();
            $this->controller = strtolower($this->controller);
        }
        
        /* Index
         * Brief function to pull down twitter RSS, parse it and pass it to view
         */
        function index($params, $renderLayout = true){
           
            //set twitter rss path and load xml 
            $path = "https://twitter.com/statuses/user_timeline/17672775.rss";
            $twitter_feed = simplexml_load_file($path);
            
            //Loop through xml and pass data array to view
            $count = 0;
            $display = array();
            foreach($twitter_feed->channel->item as $tweet){
                if($count > 7){
                    break;
                }
                $display[$count]['title'] = (string)$tweet->title;
                $display[$count]['date'] = date('M d,Y', strtotime((string)$tweet->pubDate));
                $display[$count]['link'] = (string)$tweet->link;
                $count++;
            }
            
            $pass = array('feed' => $display);
            
            $path = $this->controller . DS . 'index';
            
            return parent::loadView($path, $pass, $renderLayout);
            
        }
    
    }
    
?>