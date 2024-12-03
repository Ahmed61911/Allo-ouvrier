<?php
    Class browse extends Controller{
        public $userFullName = [];
        public $userDesc = [];
        public $userDate = [];
        public $score = [];
        public $ProfileImage = [];
        public function index($fonction = 'all'){
            session_start();
            require_once 'Header.php';
            $header = New Header();
            $header->showHeader();
            switch($fonction){
                case 'all':
                    $this->view('browse', $this->getAll());
                    break;
                case 'search':
                    $this->view('browse', $this->getSearch($_GET['search']));
                default:
                    $this->view('browse', $this->getFonction($fonction));
                    break;
                }
            $this->view('footer');
        }
        public function getAll(){
            $this->model('ClientModel');
            $model = new ClientModel();
            return $model->getAllWorkers();
        }
        public function getFonction($fonction){
            $this->model('ClientModel', $fonction);
            $model = new ClientModel();
            return $model->getWorkers($fonction);
        }
        public function getSearch($fonction){
            $this->model('ClientModel', $fonction);
            $model = new ClientModel();
            return $model->searchWorker($fonction);
        }


    }