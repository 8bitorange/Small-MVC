<?php

require_once(LIBS . 'smarty/Smarty.class.php');

// smarty configuration
class AppSmarty extends Smarty { 

    var $template_dir;
    var $compile_dir;
    var $config_dir;
    var $cache_dir;

    function AppSmarty() {
        $this->template_dir = VIEWS;
        $this->compile_dir = TMP . 'templates_c';
        $this->cache_dir = TMP . 'cache';
        $this->caching = 1;
    }

}

?>