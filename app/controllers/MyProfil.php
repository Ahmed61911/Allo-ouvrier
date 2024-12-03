<?php
    Class MyProfil extends Controller{
        public function index($err = ''){
            session_start();
            include 'Header.php';
            $header = New Header();
            $header->showHeader();
            if(isset($_SESSION['role'])){
                $error = '';
                $errType = '';
                if($err == 'success'){
                    $error = 'Mise à jour des données réussite.';
                }
                else if($err == 'failure'){
                    $error = "UNE ERREUR EST SURVENUE LORS DE L'INSERTION DE VOS DONNÉES!!!";
                }
                else if($err == 'imageSuccess'){
                    $error = 'Image de profil mise à jour avec succès.';
                }
                else if($err == 'gallerySuccess'){
                    $error = 'Image supprimé.';
                }
                else if($err == 'passwordErrorfail'){
                    $error = 'Les mot de passe ne correspond pas.';
                }
                else if($err == 'imageFailure'){
                    $error = "ÉCHEC DE LA MISE À JOUR DE L'IMAGE DE PROFIL.";
                }
                else if($err == 'imageEmptyfail'){
                    $error = "VEUILLEZ TÉLÉCHARGER L'IMAGE D'ABORD.";
                }
                else{
                    $error = '';
                }
                if(str_contains(strtolower($err), 'fail')){
                    $errType = 'fail';
                }
                else if(str_contains(strtolower($err), 'success')){
                    $errType = 'success';
                }
                else {
                    $errType = 'null';
                }
                if($_SESSION['role'] == 'client'){
                    $this->model('client');
                    $client = new Client();
                    $client->getClient($_SESSION['id']);
                    $this->view('profileClient', [$client, 'error'=>$error, 'id'=>$_SESSION['id'], 'errortype'=>$errType]);
                }
                else if($_SESSION['role'] == 'ouvrier'){
                    $this->model('ouvrier');
                    $ouvrier = new Ouvrier();
                    $ouvrier->getOuvrier($_SESSION['id']);
                    $this->view('profileOuvrier', [$ouvrier, 'error'=>$error, 'errortype'=>$errType]);
                }
            }
            else{
                $this->view('index');
            }   
        }

        public function insertClient(){
            session_start();
            if(isset($_POST['submit'])){
                if($_POST['password'] == $_POST['repeat_password']){
                    $this->model('client');
                    $client = new Client();
                    if($client->setClient($_SESSION['id']) == true){
                        header('Location: '. ROOT .'/myprofil/success');
                    }
                    else{
                        header('Location: '. ROOT .'/myprofil/failure');
                    }
                }
                else{
                    header('Location: '. ROOT .'/myprofil/passwordErrorfail');
                }
            }
        }
        public function insertOuvrier(){
            session_start();
            if(isset($_POST['submit_button'])){
                if($_POST['password'] == $_POST['repeat_password']){
                    $this->model('ouvrier');
                    $Ouvrier = new Ouvrier();
                    //$Ouvrier->setOuvrier($_SESSION['id']);
                    if($Ouvrier->setOuvrier($_SESSION['id']) == true){
                        header('Location: '. ROOT .'/myprofil/success');
                    }
                    else{
                        header('Location: '. ROOT .'/myprofil/failure');
                    }
                }
                else{
                    header('Location: '. ROOT .'/myprofil/passwordErrorfail');
                }
            }
            else if(isset($_POST['addimg'])){
                $profile_img = $_FILES['image']['name'];
                $profile_image_ext = explode('.', $profile_img);
                $profile_image_actual_ext = strtolower(end($profile_image_ext));
                $profile_image_destination = "/assets/uploads/profile/OU" . uniqid("", false) . "." . $profile_image_actual_ext;
                $profile_image_actual_destination = UPLOADS_PATH . $profile_image_destination ;
                //move_uploaded_file($_FILES["image"]["tmp_name"], UPLOADS_PATH . $profile_image_destination);
                
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $profile_image_actual_destination)){
                    $this->model('ouvrier');
                    $ouvrier = new Ouvrier();
                    if($ouvrier->setImage($profile_image_destination, $_SESSION['id']) == true){
                        header('Location: '. ROOT .'/myprofil/imageSuccess');
                    }
                    else{
                        header('Location: '. ROOT .'/myprofil/imageFailure');
                    }
                }
                else {
                    header('Location: '. ROOT .'/myprofil/imageEmptyfail');;
                }
            }
            else{
                echo "ERREUR DE TÉLÉCHARGEMENT DE L'IMAGE SUR LE SERVEUR !!!";
            }
        }

        public function setImageClient(){
            session_start();
            if(isset($_POST['up_image'])){
                $profile_img = $_FILES['image']['name'];
                $profile_image_ext = explode('.', $profile_img);
                $profile_image_actual_ext = strtolower(end($profile_image_ext));
                $profile_image_destination = "/assets/uploads/profile/CL" . uniqid("", false);
                $profile_image_destination = $profile_image_destination . "." . $profile_image_actual_ext;
                $profile_image_actual_destination = UPLOADS_PATH . $profile_image_destination ;
                //move_uploaded_file($_FILES["image"]["tmp_name"], UPLOADS_PATH . $profile_image_destination);
                
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $profile_image_actual_destination)){
                    $this->model('client');
                    $client = new Client();
                    if($client->setImage($profile_image_destination, $_SESSION['id']) == true){
                        header('Location: '. ROOT .'/myprofil/imageSuccess');
                    }
                    else{
                        header('Location: '. ROOT .'/myprofil/imageFailure');
                    }
                }
                else {
                    header('Location: '. ROOT .'/myprofil/imageEmpty');;
                }
            }
        }
        public function setGallery(){
            session_start();
            if(isset($_POST['upload'])){
                $img = $_FILES['upImage']['name'];
                $image_ext = explode('.', $img);
                $image_actual_ext = strtolower(end($image_ext));
                $image_destination = "/assets/uploads/galleries/" . uniqid("", false) . "." . $image_actual_ext;
                $image_actual_destination = UPLOADS_PATH . $image_destination ;
                //move_uploaded_file($_FILES["image"]["tmp_name"], UPLOADS_PATH . $profile_image_destination);
                
                if(move_uploaded_file($_FILES["upImage"]["tmp_name"], $image_actual_destination)){
                    $this->model('ouvrier');
                    $ouvrier = new Ouvrier();
                    if($ouvrier->setGallery($image_destination, $_SESSION['id']) == true){
                        header('Location: '. ROOT .'/myprofil/gallerySuccess');
                    }
                    else{
                        header('Location: '. ROOT .'/myprofil/galleryFailure');
                    }
                }
                else {
                    header('Location: '. ROOT .'/myprofil/galleryEmpty');;
                }
            }
            else{
                echo "ERREUR DE TÉLÉCHARGEMENT DE LA GALERIE SUR LE SERVEUR !!!";
            }
        }

        public function deleteGallery(){
            session_start();
            if(isset($_POST['delete_image_button'])){
                $image = $_POST['abc'];
                if (file_exists(UPLOADS_PATH . $image)) {
                    if (unlink(UPLOADS_PATH . $image)) {
                        $this->model('ouvrier');
                        $ouvrier = new Ouvrier();
                        if($ouvrier->deleteGallery($image, $_SESSION['id']) == true){
                            header('Location: '. ROOT .'/myprofil/galleryDeleteSuccess');
                        }
                        else{
                            header('Location: '. ROOT .'/myprofil/galleryDeleteFailure');
                        }
                    } 
                    else {
                        echo "Erreur : Impossible de supprimer le fichier.";
                    }
                } 
                else {
                    echo "Erreur : le fichier n'existe pas.";
                }
            }
        }

    }