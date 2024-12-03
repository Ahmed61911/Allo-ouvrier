<?php
    
    class showProfile extends Controller{
        public function index($id = ''){
            session_start();
            if(isset($_SESSION["loggedIn"])){
                if($_SESSION["loggedIn"] == true){
                require_once 'Header.php';
                $header = New Header();
                $header->showHeader();
                $profilData = $this->model('Clientmodel')->getWorkerProfil(['id' => $id]);
                $commentData = $this->model('Clientmodel')->getComment(['id' => $id]);
                $this->view('showProfil',  [$profilData, 'Commentaire'=>$commentData, 'id'=>$id]);
                }
            }
            else{
                header('Location: ' . ROOT . '/login/notlogged');
            }
        }

        public function insertComment($id){
            session_start();
            $avis = $_GET['avis'];
            $this->model('clientmodel')->setComment($_SESSION['id'], $id, $_GET['comment_input'], $avis);
            header('Location: ' . ROOT . '/showprofile/'. $id);
        }
    }