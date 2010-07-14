<?php
    
    //setup error reporting
    switch(STATUS){
        
        case 'dev':
            ini_set("display_errors","1");
            ERROR_REPORTING(E_ALL);
            break;       
        case 'test':
            ini_set("display_errors", "1");
            ERROR_REPORTING(E_NOTICE);
            break;
        case 'live':
            init_set("display_errors", "0");
            ERROR_REPORTING(0);
            break;
    }
    
    
?>