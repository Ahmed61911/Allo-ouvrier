<?php 
    Class Logout extends Controller{
        public function index(){
            session_start();
            session_unset();
            session_destroy();
            header('Location: ' .ROOT);
        }

    }