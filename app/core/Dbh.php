<?php
    class Dbh{
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'allo_ouvrier123';

        public function connect(){
            try{
                $dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
                //echo 'Connection successful!!!';
                return $dbh;
            }
            catch (PDOException $e){
                echo 'ERROR: ' . $e->getMessage();
            }
        }
    }