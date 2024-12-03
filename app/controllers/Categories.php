<?php
    Class Categories extends Controller{
        public function index(){
            session_start();
            require_once 'Header.php';
            $header = new Header();
            $header->showHeader();
            $this->view('categories');
            $this->view('footer');
        }
    }