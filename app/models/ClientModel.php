<?php
    Class ClientModel extends Dbh{
        public function getAllWorkers(){
            $sql = 'SELECT * FROM ouvrier';
            $stmt = $this->connect()->query($sql);
            return $stmt->fetchAll();
        }
        public function getWorkers($data){
            $sql = 'SELECT * FROM ouvrier WHERE fonction LIKE ?' ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['%' . $data. '%']);
            return $stmt->fetchAll();
        }
        public function searchWorker($data){
            $sql = 'SELECT * FROM ouvrier WHERE description LIKE ? OR nom LIKE ? OR prenom LIKE ? OR fonction LIKE ?' ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['%' . $data . '%', '%' . $data . '%', '%' . $data . '%', '%' . $data . '%']);
            return $stmt->fetchAll();
        }
        public function getWorkerProfil($data){
            $sql = 'SELECT * FROM ouvrier WHERE id_ouvrier = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$data['id']]);
            $stmt = $stmt->fetchAll();
            return $stmt ? $stmt[0] : [];
        }
        public function getComment($data) {
            $sql = 'SELECT * FROM commentaire WHERE id_ouvrier = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$data['id']]);
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $clientDetails = [];
            foreach ($comments as $comment) {
                $sql2 = 'SELECT nom, prenom, image FROM client WHERE id_client = ?';
                $stmt2 = $this->connect()->prepare($sql2);
                $stmt2->execute([$comment['id_client']]);
                $clientDetails[] = $stmt2->fetch(PDO::FETCH_ASSOC);
            }
            return [$comments, $clientDetails];
        }
        public function setComment($idClient, $idOuvrier, $commentaire, $avis) {
            $sql = 'INSERT INTO commentaire (id_client, id_ouvrier, commentaire) VALUES (?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$idClient, $idOuvrier, $commentaire]);
        
            $sql2 = 'UPDATE ouvrier SET nbr_vote = nbr_vote + 1, score = score + ? WHERE id_ouvrier = ?';
            $stmt2 = $this->connect()->prepare($sql2);
            $stmt2->execute([$avis, $idOuvrier]);
        }

    }