<?php
interface Time {
    public function addTime($time);
    public function removeTime($time);
}

class TimeUtils implements Time {
    public function __construct($time = null)
    {
        $this->time = 0 || $time; 
    }

    public function addTime($time) {
        $this->time += $time; 
    }
    public function removeTime($time) {
        $this->time -= $time; 
    }
}