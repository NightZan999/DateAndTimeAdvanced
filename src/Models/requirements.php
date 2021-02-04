<?php
class Requirements {
    function __construct($phpExtensions, $phpDependencies)
    {
        $this->phpExtensions = $phpExtensions;
        $this->phpDependencies = $phpDependencies;
    }
    
    public function reqChecks($phpExtensions = null, $phpDependencies = null) {
        if ($phpExtensions == null) $phpExtensions = $this->phpExtensions;
        $json = false; 
        $mysql = false;
        $session = false; 
        foreach ($phpExtensions as $extension) 
        {
            if ($extension == "json")
            {
                $json = true; 
            } else if ($extension == "MYSQL") $mysql = true; 
            else if ($extension == 'session') $session = true; 
        }

        if ($mysql && $session && $json) return true; 
        return false; 
    }
}