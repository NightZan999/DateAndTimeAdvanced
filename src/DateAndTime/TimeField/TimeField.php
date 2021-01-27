<?php
abstract class TimeField { // creating a naked class which simply holds functions
    abstract public function get(Instant $time); // the functions
    abstract public function setCopy(Instant $time $value);
    abstract public function addToCopy(Instant $time, $value);
}