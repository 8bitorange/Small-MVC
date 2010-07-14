<?php 

    /* Main App Class
     * instantiates smarty lib
     * contains prefilter to strip html comments
     * loads view
     */

    class App {
        
        //Smarty object
        var $tpl;
        
        //Added so that different layouts may be used
        var $layout;
    
        /* Construct smarty app and choose default layout */
        public function __construct(){
            $this->tpl = new AppSmarty();
            $this->layout = 'layouts' . DS . 'default.tpl';
            
        }

        /* Pre filter to strip comments from HTML */
        function strip_comments($tpl_source, &$tpl){
            return preg_replace("/<!-- .* -->/U",'',$tpl_source);
        }
        
        /* Pre filter to strip comments from CSS */
        function css_strip($tpl_source, &$tpl){
            $regex = array('{\t|\r|\n}', '{(/\*(.*?)\*/)}');
            return preg_replace($regex, '', $tpl_source);
        }

        /* Function to load the view */
        public function loadView($view, $pass = array(), $renderLayout = true){
            
            // register the postfilter
            $this->tpl->register_prefilter(array('App', 'strip_comments'));
            
            /* Loop through all passed items and assign them to content loader */
            foreach($pass as $key => $item){
                if($key != 'title_for_page'){
                    $this->tpl->assign($key, $item);
                }
            }
            
            /* Fetch view */
            $content = $this->tpl->fetch($view . '.tpl');
            
            //Check to see if you need to render the layout
            if($renderLayout){
                
                $this->tpl->clear_cache('elements/nav.tpl');
                //Assign the name of the page to set nav on state
                $this->tpl->assign(str_replace('/', '', $view), true);
                //fetch nav
                $nav = $this->tpl->fetch('elements/nav.tpl');
                
                //set url if needed in nav
                $this->tpl->assign('root', SITE_URL);
                
                //Assign nav and content
                $title_for_page = (isset($pass['title_for_page']))? $pass['title_for_page'] : null;
                $this->tpl->assign('title_for_page', $title_for_page);
                $this->tpl->assign('nav', $nav);
                $this->tpl->assign('content_for_layout', $content);
                
                //load layout with nav and view
                $this->tpl->clear_cache($this->layout);
                $this->tpl->display($this->layout);
            } else {
                //if layout is not rendered then return view
                return $content;
            }           
        }
        
        /* Function to load the css */
        public function loadCss($view){
            
            // register the prefilter and set delimiters to avoid conflict
            $this->tpl->register_prefilter(array('App', 'css_strip'));
            $this->tpl->left_delimiter = '<';
            $this->tpl->right_delimiter = '>';
            
            //set headers and load css
            header('Content-type: text/css');
            $this->tpl->display($view);

        }
    
    }

?>