<?php
declare(strict_types=1);
//import files
require("src/logger.php");
//app variables
const APP_NAME = "DateAndTimeAdvanced"; 
const APP_VERSION = "1.0.0"; 
const LICENSE = "MIT"; 
//php settings
const PHP_VERSION_MIN = '7.2';
const PHP_VERSION_RECOMMENDED = '7.4';
//config
const host = null; 
const port = null; 
//now consider php settings
const phpSettings = [
    "logger" => true, 
    "display_errors" => true, 
    "audit_logs" => true, 
    'default_charset' => 'utf-8'
];

const phpExtensions = [
    'json',
    'PDO_MYSQL',
    'session',
];

class Requirements {
    public function __construct(array $INSTALLED_APPS, array $EXTENSIONS)
    {
        $this->INSTALLED_APPS = $INSTALLED_APPS; 
        $this->EXTENSIONS = $EXTENSIONS; 
        $this->requirements = [
            "json", "PDO_MYSQL", "session"
        ];  
        return true; 
    }
}
//init the server
function initialize_server() {
    return; 
}

const logger = new Logger($_SERVER); 
const database = new Database($_SERVER, host, port); 