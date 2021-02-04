<?php
class DateAndTime {
    public function __construct($timezone, $format) {
        $this->timezone = $timezone;
        $this->format = $format;
    }

    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getTimezone(): string {
        return $this->timezone; 
    }

    public function setTimezone(string $timezone) : void {
        $this->timezone = $timezone;
    }

    public function FindTime(string $timezone = null, string $format = null) : string {
        if ($timezone == null) {
            $timezone = $this->timezone; 
        }
        if ($format == null) {
            $format = $this->format;
        }
        date_default_timezone_set($timezone);
        return date($format); 
    }
}