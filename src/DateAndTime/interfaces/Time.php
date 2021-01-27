<?php
interface Time {
    public function addTime($time);
    public function removeTime($time);
    public function createTimeStamp($timestamp);
}