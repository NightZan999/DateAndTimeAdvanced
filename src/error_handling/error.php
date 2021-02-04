<?php
interface Error {
    public function __construct(string $msg) : void; 
    public function displayError() : void; 
}
