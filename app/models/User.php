<?php
class User extends Dbh{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $phone;
    public $profilImage;
    public function __construct(){
        
    }
    //signup
    public function addUser($role, $email, $password, $name, $fName){
        if($this->checkUserExist($email) == false){
            if($role == 'client'){
                $sql = 'INSERT INTO client(email ,nom ,prenom , mot_de_passe) VALUES (?, ?, ?, ?)';
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email, $name ,$fName, $password]);
                return true;
            }
            else if($role == 'ouvrier'){
                $sql = 'INSERT INTO ouvrier(email ,nom ,prenom , mot_de_passe) VALUES (?, ?, ?, ?)';
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email, $name ,$fName, $password]);
                return true;
            }
            else{
                header('Location: ' . ROOT . '/Signup/selectRole');
                return false;
            }
        }
        else{
            header('Location: ' . ROOT . '/Signup/userExist');
            return false;
        }
    }
    public function checkUserExist($email){
        $sql1 = 'SELECT email FROM client Where email = ?';
        $sql2 = 'SELECT email FROM ouvrier Where email = ?';
        $stmt1 = $this->connect()->prepare($sql1);
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt1->execute([$email]);
        $stmt2->execute([$email]);
        $row1 = $stmt1->fetchAll();
        $row2 = $stmt2->fetchAll();
        if(count($row1) > 0 || count($row2)){
            return true;
        }
        else{
            return false;
        }
    }
    //login
    public function checkUserMatchDb($email, $password){
        $sql1 = 'SELECT * FROM client WHERE email = ? AND mot_de_passe = ?';
        $sql2 = 'SELECT *  FROM ouvrier WHERE email = ? AND mot_de_passe = ?';
        $stmt1 = $this->connect()->prepare($sql1);
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt1->execute([$email, $password]);
        $stmt2->execute([$email, $password]);
        $result1 = $stmt1->fetch();
        $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        if ($result1){
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['role'] = 'client';
            $_SESSION['id'] = $result1['id_client'];
            $_SESSION['name'] = $result1['nom'];
            $_SESSION['image'] = $result1['image'];
            return true;
        }
        else if ($result2){
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['role'] = 'ouvrier';
            $_SESSION['id'] = $result2['id_ouvrier'];
            $_SESSION['name'] = $result2['nom'];
            $_SESSION['image'] = $result2['photo_profile'];
            return true;
        }
        else{
            return false;
        }
    }
}