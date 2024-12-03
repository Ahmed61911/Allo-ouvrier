<?php
    Class Header extends Controller{
        public function showHeader(){
            if(isset($_SESSION["loggedIn"])){
                if($_SESSION["loggedIn"] === true){
                    if($_SESSION['role'] == 'client'){
                        $this->model('client');
                        $client = new Client();
                        $client->getClient($_SESSION['id']);
                        $this->view('header_on', ['image'=>$client->profilImage, 'name'=>$client->firstName]);
                    }
                    else if($_SESSION['role'] == 'ouvrier'){
                        $this->model('ouvrier');
                        $ouvrier = new Ouvrier();
                        $ouvrier->getOuvrier($_SESSION['id']);
                        $this->view('header_on', ['image'=>$ouvrier->profilImage, 'name'=>$ouvrier->firstName]);
                    }
                }
            }
            else{
                $this->view('header_off');
            }
        }
    }