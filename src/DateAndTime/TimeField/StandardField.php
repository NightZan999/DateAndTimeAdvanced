<?php
require("./TimeField.php"); 
require("../../Models/math.php"); 

class StandardField extends TimeField { // getting ready made functions
    private $integerID;
    private $strtimeformat;

    public function __construct($integerID, $strtimeformat = false) // starting the class with init
    {
        $this->integerID = $integerID; // pretty standard stuff
        $this->strtimeformat = $strtimeformat;
        if ($this->strtimeformat == false) {
            $this->strtimeformat = $format // setting our changes into strtimeformat
        }
    }
    public function setCopy(Instant $time)
    {
        $array = $this->instantToArray($time);
        $array[$this->integerID] = $value;

        return $this->arrayToInstant($array);
    }

    public function get(Instant $time)
    {
        $time = new DateAndTime();
        return strftime($this->strtimeformat, $time->getTimestamp());

    }

    public function addToCopy(Instant $time, $value)
    {
        $array = $this->instantToArray($time);
        $array[$this->integerID] = Math::add([$array[$this->integerID], $value]);

        return $this->arrayToInstant($array);
    }

}