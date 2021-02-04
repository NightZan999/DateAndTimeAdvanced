<?php
declare(strict_types=1);
//import files
require("./src/Models/runtime.php"); 
require("./src/Models/db.php");
require("./src/Models/logging/customLogger.php"); 
require("./src/Models/requirements.php"); 
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

//initialize the server and bring it all together
function init() : bool {
    //now consider php settings
    $phpSettings = [
        "logger" => true, 
        "display_errors" => true, 
        "audit_logs" => true, 
        'default_charset' => 'utf-8'
    ];

    $phpExtensions = [
        'json',
        'MYSQL',
        'session',
    ];

    $phpDependencies = [
        "php>=7.4", 
    ];

    $phpSettings = [
        'error_reporting' => E_ALL ^ E_NOTICE,
        'log_errors' => true,
        'display_errors' => true,
        'error_log' => __DIR__ . '/installer.error.log',
        'time_limit' => 0,
        'default_charset' => 'utf-8',
        'LC_ALL' => 'en_US.UTF8',
    ];

    $logger = new CustomLogger("myLogger"); 
    $runtime = new Runtime($logger); 
    $runtime->setSettings($phpSettings); 
    $runtime->execute(); 
    $requirements = new Requirements($phpExtensions, $phpDependencies);
    $requirements->reqChecks(); 
    return true;
}