<?php
interface Logger {
    public function __construct(string $name); 
    public function addMessage(string $message); 
    public function __destruct(); 
}