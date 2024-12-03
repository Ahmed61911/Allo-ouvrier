<?php
    class Controller{
        //load the desired model
        public function model($model,  $data = []){
            if (file_exists('../app/models/' . $model . '.php')){
                require_once '../app/models/' . $model . '.php';
                return new $model();
            }
            else {
                echo 'Model not found';
            }
        }

        //load the desired view
        public function view($view, $data = []){
            if (file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }
            else {
                echo 'View not found';
            }
        }

        public function controller($controller, $data = []){
            if (file_exists('../app/controllers/' . $controller . '.php')){
                require_once '../app/controllers/' . $controller . '.php';
            }
            else {
                echo 'Controller not found';
            }
        }
    }