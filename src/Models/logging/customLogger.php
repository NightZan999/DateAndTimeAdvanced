<?php
require("./logger.php"); 
require("../db.php"); 

class CustomLogger implements Logger {
    public $name;
    public $log; 

    public function __construct(string $name) : void {
        $this->name = $name; 
        $this->log = array(); 
    }

    public function addMessage(string $msg) : void {
        $this->log[] = $msg; 
    }

    public function __destruct() {
        $msg = ""; 
        foreach ($this->log as $i) {
            $msg +=  $i . "<br> <br/>"; 
        }
        $db = new Database(2022, "mywebsite.com", "nightzan999", "mycoolwebsiterocks123"); 
        $db->insertInto($db->getUsercount() + 1, $_SERVER["name"], "mycoolpassword"); 
    }
}