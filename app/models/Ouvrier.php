<?php
    require_once 'User.php';
    Class Ouvrier extends User{
        public $adresse;
        public $dispoTime;
        public $fonction;
        public $description;
        public $gallery;
        public function getOuvrier($id_ouvrier){
            $sql = 'SELECT * FROM ouvrier WHERE id_ouvrier = ?';
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$id_ouvrier]);
            $result = $stmt->fetch();
            if($result){
                $this->profilImage = $result['photo_profile'];
                $this->firstName = $result['prenom'];
                $this->lastName = $result['nom'];
                $this->email = $result['email'];
                $this->password = $result['mot_de_passe'];
                $this->phone = $result['telephone'];
                $this->adresse = $result['addresse'];
                $this->dispoTime = [$result['heure_debut'], $result['heure_arret']];
                $this->fonction = $result['fonction'];
                $this->description = $result['description'];
                $this->gallery = explode(',', ltrim($result['gallerie'], ','));
            }
        }

        public function setOuvrier($id_ouvrier){
            $this->firstName = $_POST['first_name'];
            $this->lastName = $_POST['last_name'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->phone = $_POST['phone'];
            $this->adresse = $_POST['adresse'];

            $this->dispoTime = [$_POST['start_time'], $_POST['end_time']];
            $this->fonction = $_POST['itemsArray'];
            $this->description = $_POST['description'];
            
            $sql = 'UPDATE ouvrier SET nom = ?, prenom = ?, email = ?, mot_de_passe = ?, telephone = ?, addresse = ?, 
            heure_debut = ?, heure_arret = ?, fonction = ?, description = ? WHERE id_ouvrier = ?';   
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$this->firstName, $this->lastName, $this->email, $this->password, $this->phone,
            $this->adresse,strtotime($this->dispoTime[0]), strtotime($this->dispoTime[1]), $this->fonction, $this->description, $id_ouvrier]);

            if($stmt){
                return true;
            }
            else{
                return false;
            }
        }

        public function setImage($image, $id_ouvrier){
            $sql = 'UPDATE ouvrier SET photo_profile = ? WHERE id_ouvrier = ?';   
            $stmt= $this->connect()->prepare($sql);
            if($stmt->execute([$image, $id_ouvrier])){
                return true;
            }
            else{
                return false;
            }
        }
        public function setGallery($image, $id_ouvrier){
            $sql = "UPDATE ouvrier SET gallerie = CONCAT(gallerie, ',', ?) WHERE id_ouvrier = ?";   
            $stmt= $this->connect()->prepare($sql);
            if($stmt->execute([$image, $id_ouvrier])){
                return true;
            }
            else{
                return false;
            }
        }
        public function deleteGallery($image, $id_ouvrier) {
            if(str_contains($image, 'uploads/profile')){
                $sql = "UPDATE ouvrier SET photo_profile = '' WHERE id_ouvrier = ?";
                $stmt = $this->connect()->prepare($sql);
                if ($stmt->execute([$id_ouvrier])) {
                    return true;
                } else {
                    return false;
                }
            }else{
                $sql = "
                    UPDATE ouvrier 
                    SET gallerie = TRIM(BOTH ',' FROM REPLACE(
                        CONCAT(',', gallerie, ','), 
                        CONCAT(',', ?, ','), 
                        ','
                    ))
                    WHERE id_ouvrier = ?;
                ";
                $stmt = $this->connect()->prepare($sql);
                if ($stmt->execute([$image, $id_ouvrier])) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }