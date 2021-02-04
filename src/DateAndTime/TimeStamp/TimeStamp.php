<?php
require("../DateAndTime.php"); 
class TimeStamp extends DateAndTime {
    private $timestamp;
    private $durationAdd;
    public $i = 0;


    public function getDurationAdd()
    {
        return $this->durationAdd;
    }

    public function setDurationAdd($durationAdd)
    {
        $this->durationAdd = $durationAdd;
    }

    public function getTimestamp()
    {
        return $this->timestamp; // returns timestamp
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp; // sets timestamp
        return $this->getTimestamp(); // returns it also, ngl pretty useful
    }
    function __construct($timestamp = false) {
        if (!$timestamp) {$timestamp = time();}
        $this->timestamp = $timestamp; // setting the timestamp in construct function
    }
    public function addDuration($seconds) {
        $timestamp = $this->getTimestamp();
        $clone = clone $this; // cloning our object

        $newstamp = $clone->setTimestamp($timestamp + $seconds); // adding seconds to the timestamp
        return $newstamp; // simply returning the cloned timestamp, thus saving the old one:
        // see, so incase the user needs the other one they can get the timestamp
    }
    public function isAfter($instant) {
        return $this->timestamp > $instant->getTimestamp();
    }
    public function reduceDuration($seconds) {
        $timestamp = $this->getTimestamp();
        $clone = clone $this; // cloning our object

        $newstamp = $clone->setTimestamp($timestamp - $seconds); // adding seconds to the timestamp
        return $newstamp; // simply returning the cloned timestamp, thus saving the old one:
        // see, so incase the user needs the other one they can get the timestamp
    }
    protected function getDuration() {
        $timestamp = $this->getTimestamp();
        $clone = clone $this; // cloning our object

        // which means we return timestamp, which is useless so we add the duration of 0:
        $this->convertDuration($this->timestamp, "m"); // lol
    }

    final private function convertDuration($seconds, $type = "m")
    {
        if ($type == "m") {
            return $seconds / 60;
        } else if ($type == "h") {
            return $seconds / 3600;
        } else if ($type == "d") {
            return $seconds / (3600 * 24); // a day
        } else if ($type == "w") {
            return $seconds / (3600 * 24 * 7);
        } else if ($type == "month") {
            return $seconds / (3600 * 24 * 30);
        }
    }
    final public function createConstantTimeStamp(string $timestamp = false) {
        return parent::FindTime(); 
    }

}

