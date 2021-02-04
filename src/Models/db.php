<?php
final class Database {
    function __construct(int $port, string $host, string $username, string $password) 
    {
        $this->db = new mysqli($_SERVER["name"], $username, $password); 
        if ($this->db->connect_error) 
        {
            die("Connection failed" . $this->db->connect_error); 
        }
        echo "Connected successfully to MySQL";
        $this->db->close(); 
        // create our database
        $sql = "CREATE DATABASE IF NOT EXISTS users;"; 
        $this->addSQLquery($sql); 
        $this->addSQLquery("CREATE TABLE users (
            userid INT, 
            email VARCHAR(30) NOT NULL,
            password VARCHAR(50) NOT NULL
        );"); 
        $this->usercount = 0; 
    }

    public function addSQLquery(string $sqlQUERY) : bool
    {
        if ($this->db->query($sqlQUERY) === TRUE) {
            return TRUE; 
        }
        else{ 
            return FALSE; 
        }
        $this->db->close(); 
    }

    public function getUserData(int $userid) : array
    {   
        $result = $this->db->query("SELECT * FROM users WHERE userid = " . $userid); 
        $this->db->close(); 
        return $result; 
    } 

    public function insertInto(int $userid, string $username, string $password) : void 
    {   
        $this->usercount; 
        $this->addSQLquery("INSERT INTO users (userid, username, password) VALUES (`$userid`, `$username`, `$password`);"); 
    }

    public function getUsercount() : int {
        return $this->usercount; 
    }

    public function setUsercount(int $x) {
        $this->usercount = $x;
    }

    public function addUsers(int $x) :int {
        return $this->usercount += $x; 
    }
}