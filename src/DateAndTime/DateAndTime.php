<?php
namespace DateAndTime;
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

    public static function FindTime(string $timezone, string $format) : string {
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