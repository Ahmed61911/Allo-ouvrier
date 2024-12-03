<?php
    require_once 'User.php';
    Class Client extends User{
        
        public function getClient($id_client){
            $sql = 'SELECT * FROM client WHERE id_client = ?';
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$id_client]);
            $result = $stmt->fetch();
            if($result){
                //$this->id = $result['id_client'];
                $this->firstName = $result['nom'];
                $this->lastName = $result['prenom'];
                $this->email = $result['email'];
                $this->password = $result['mot_de_passe'];
                $this->phone = $result['telephone'];
                $this->profilImage = $result['image'];
            }
        }
        
        public function setClient($id_client){
            $this->firstName = $_POST['nom'];
            $this->lastName = $_POST['prenom'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->phone = $_POST['phone'];
            $sql = 'UPDATE client SET nom = ?, prenom = ?, email = ?, mot_de_passe = ?, telephone = ? WHERE id_client = ?';   
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$this->firstName, $this->lastName, $this->email, $this->password, $this->phone, $id_client]);
            if($stmt){
                return true;
            }
            else{
                return false;
            }
        }

        public function setImage($image, $id_client){
            $sql = 'UPDATE client SET image = ? WHERE id_client = ?';   
            $stmt= $this->connect()->prepare($sql);
            if($stmt->execute([$image, $id_client])){
                return true;
            }
            else{
                return false;
            }
        }

    }