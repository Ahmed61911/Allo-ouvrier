<?php
    include_once 'Header.php';
    Class Contact extends Controller{
        public function index(){
            session_start();
            $header = new Header();
            $header->showHeader();
            $this->view('contact');
        }
    }