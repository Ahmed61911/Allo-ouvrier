<?php
    Class Signup extends Controller{
        public function index($err = ''){
            require_once 'Header.php';
            $header = New Header();            
            $header->showHeader();  
            $error = '';
            if($err == 'selectRole'){
                $error = 'Veuillez choisire un role.';
            }
            else if($err == 'userExist'){
                $error = 'Ce utilisateur deja exist';
            }
            else{
                $error = '';
            }
            $this->view('signup', ['error'=>$error]);
        }

        public function addUser(){
            if(isset($_POST['submit'])){
                $this->model('user');
                $user = new User();
                if($user->addUser($_POST['role'], $_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom']) == true){
                    if($user->checkUserMatchDb($_POST['email'], $_POST['password']) == true){
                        header('Location: ' . ROOT . '/myProfil');
                    }
                    else{
                        header('Location: ' . ROOT . '/login');
                    }
                }
            }
        }
    }