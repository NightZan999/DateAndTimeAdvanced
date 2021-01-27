<?php
class Math {
    public static function add(array $args) : int {
        $sum = 0; 
        for ($i = 0; $i < $args.count, ++$i) {
            $sum += $args[i]; 
        }
        return $sum; 
    }

    public static function multiply(array $args) : int {
        $product = 1; 
        for ($i = 0; $i < $args.count, ++$i) {
            $product *= $args[i];
        }
        return $product; 
    }
}