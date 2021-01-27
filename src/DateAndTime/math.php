<?php
public class Math {
    public static function add($a, $b) {
        return $a + $b;
    }
    public static function subtract($a, $b) {
        return $a - $b;
    }
    public static function multiply($a, $b) {
        return $a * $b;
    }
    public static function divide($a, $b) {
        return $a / $b;
    }
    public static function square($a) return $this->multiply($a, $a);
    public static function sqrt($a) {
        for ($i = 0; $i < $a; ++$i) {
            if ($this->multiply($i, $i)) {
                return $i;
            }
        }
    }
}