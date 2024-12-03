<?php
    
    class Home extends Controller{
        public function index($name = ''){
            session_start();
            require_once 'Header.php';
            $header = New Header();
            $header->showHeader();         
            $this->view('index');
        }
    }