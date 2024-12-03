<?php
    class Login extends Controller{
        public $error = '';
        public $email = '';
        public $password = '';
        public function index($err =''){
            if($err == 'notlogged'){
                $this->error = 'Veillez se connecter pour utiliser la plateforme :)';
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->emptyField();
                if($this->emptyField() == false){
                    $this->checkUserMatch();
                    if($this->checkUserMatch() == true){
                        session_start();
                        header('Location: ' . ROOT);
                    }
                }
            }
            $this->view('login', ['error'=>$this->error]);
        }
        public function emptyField(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(empty($_POST['email']) || empty($_POST['password'])){
                   $this->error = 'Vueillez remplire les champs email et mot de passe !';
                   return true;
                }
                else{
                    return false;
                }
            }
        }
        public function checkUserMatch(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $userModel = $this->model('user');
                if($userModel->checkUserMatchDb($this->email, $this->password) == true){
                    $this->error = 'WELCOME';
                    return true;
                }
                else{
                    $this->error = 'Email ou Mot de passe incorrect !';
                    return false;
                }
            }
        }
    }