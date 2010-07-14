<?php

    class Database {
    
        //Build configuration data
        var $config = array(
    		'host' => 'localhost',
    		'login' => 'autolux',
    		'password' => 'password',
    		'database' => 'autolux',
    	);
    	
    	//Create connection and connect to database    	
    	private function connect(){
	        $connection = mysql_connect($this->config['host'], $this->config['login'], $this->config['password'], true);
	        mysql_select_db($this->config['database'], $connection);
            return $connection;
    	}
    	
    	
    	//Run query
    	public function find($params){
    	   
    	   //create connection
    	   $connection = $this->connect();
    	
    	   //if all is selected set to *
    	   if($params['select'] == 'all'){
    	       $select = '*';
    	   } else {
    	       $select = $params['select'];
    	   }
    	   
    	   //Create query
    	   $query = sprintf("SELECT %s FROM %s", $select, $params['table']);
    	   
    	   $result = mysql_query($query, $connection);
    	   
    	   //Run data to build array and return
    	   $data = $this->buildArray($result);
    	   return $data;
    	   
    	}
    	
    	//Borrowed heavily from php.net
    	private function buildArray($result){

            $data = array();

            while($row = mysql_fetch_assoc($result)){
                
                $arr_row=array();
                $i=0;

                while ($i < mysql_num_fields($result)) {        
                    $col = mysql_fetch_field($result, $i);    
                    $arr_row[$col->name] = $row[$col->name];            
                    $i++;
                }    

                $data[] = $arr_row;
            }    

            return $data;
    	}
    
    }

?>