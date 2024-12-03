<?php
    class App{
        protected $controller = 'home';
        protected $method = 'index';
        protected $params = [];
        public function __construct(){
            //parse the url
            $url = $this->parseUrl();
            //check if the controller exists in the controller folder
            if (isset($url) && file_exists('../app/controllers/' . $url[0] . '.php')){
                //if the wanted controller exists set it to this conroller, if not set home as the current controller
                $this->controller = $url[0];
                unset($url[0]);
            }
            require_once '../app/controllers/' . $this->controller . '.php';
                //create a new object of the controller
            $this->controller = new $this->controller();

            //check if the method exists
            if (isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                   $this->method = $url[1];
                   unset($url[1]);
                }
            }  
            
            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseUrl(){
            if (isset($_GET['url'])){
                return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            }
        }
    }