<?php

abstract class AbstractManager
{
    protected PDO $db;
    private string $dbName;
    private string $port;
    private string $host;
    private string $username;
    private string $password;
    
    private function __constructor(string $dbName, string $port, string $host, string $username, string $password)
    {
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "kevincorvaisier_phpj6";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname";
        
        $username = "kevincorvaisier";
        $password = "04646b679a4ab0a202f8007ea81fe675";
        
        $this->db = new PDO(
            $connexionString,
            $username,
            $password
        );
    }
    
}

?>