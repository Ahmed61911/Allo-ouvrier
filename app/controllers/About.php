<?php
    include_once 'Header.php';
    Class About extends Controller{
        public function index(){
            session_start();
            $header = new Header();
            $header->showHeader();
            $this->view('About');
            $this->view('footer');
        }
    }