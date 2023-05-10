<?php

class Connection{

    private $host = 'localhost';
    private $dbname = 'test2fa';
    private $user = 'root';
    private $password = '';

    public function conne(){
       try {
        $pdo = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo " Connected successfully ";
        return $pdo;
       } catch (PDOException $th) {
        echo "Connection failed: " . $th->getMessage();
       }
    }
}

?>