<?php
    
    class Shows extends APP {
        
        //controller name
        var $controller;
        
        //eventful object
        var $Eventful;
        
        function __construct(){
            parent::__construct();
            $this->controller = get_class();
            $this->controller = strtolower($this->controller);
        }
        
        /* Index
         * function to load all events from eventful page
         */
        function index($params, $renderLayout = true){
            
            //instantiate eventful class
            $this->Eventful = new Eventful();
            
            //create options for eventful call
            $eventful_opts = array(
                'section' => 'performers',
                'method' => 'get',
                'options' => array(
                    'id' => 'P0-001-000014425-1',
                    'show_events' => 'true'
                )
            );
            
            //Find events and pass back xml
            $events = $this->Eventful->find($eventful_opts);
            
            //Loop through XML and create events array
            $events = $events->events->children();
            $count = 0;
            foreach($events->event as $event){
                $display[$count]['link'] = (string)$event->url;
                $display[$count]['title'] = (string)$event->title;
                $display[$count]['date'] = date('M d,Y', strtotime((string)$event->start_time));
                $display[$count]['location'] = (string)$event->location;
                $count++;
            }
            
            //Pass events to view
            $pass = array(
                'events' => $display,
                'title_for_page' => 'Shows'
            );
            
            $path = $this->controller . DS . 'index';
            
            return parent::loadView($path, $pass, $renderLayout);
            
        }
    
    }
    
?>