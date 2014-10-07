<?php

namespace Tawfekov\ObjectId;


class ObjectId implements ObjectIdInterface
{

    /**
     * @var timezone string
     */
    public $timezone;


    public $objectId;
    /**
     *
     *
     */
    public function __construct($objectId = "" , $timezone = null)
    {
        $this->setTimezone($timezone);
        if(!$objectId){
            $this->getObjectId();
            return $this->objectId;
        }else{
            $this->setObjectId($objectId);
            return $this;
        }
    }


    public function setObjectId($objectId){
        $this->objectId = $objectId;
    }
    /**
     * @return string
     */
    public function getObjectId()
    {
        $this->objectId =   $this->getTimestamp() . $this->getMachineIdentifier() . $this->getProcessId() . $this->getRandomNumber();
    }

    /**
     * @param string $timezone
     * @return $this
     */
    public function setTimezone($timezone = "")
    {
        if (!$timezone) {
            $this->timezone = new \DateTimeZone(date_default_timezone_get());
        } else {
            $this->timezone = new \DateTimeZone($timezone);
        }
        return $this;
    }

    /**
     * @return \DateTimeZone|string
     */
    public function getTimezone()
    {
        if (!$this->timezone) {
            $this->timezone = new \DateTimeZone(date_default_timezone_get());
        }
        return $this->timezone;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        if(!$this->objectId){
            $time = new \DateTime("now", $this->getTimezone());
            return (int)$time->getTimestamp();
        }else{
            return substr($this->objectId,0,10);
        }

    }


    public function getTime(){
        if(!$this->objectId){
            $time = new \DateTime("now", $this->getTimezone());
            return $time;
        }else{
            $timestamp =  substr($this->objectId,0,10);
            $time = new \DateTime('@' . $timestamp);
            return $time;
        }
    }

    /**
     * @return string
     */
    public function getMachineIdentifier()
    {
        return substr(base64_encode(preg_replace("/[^A-Za-z0-9 ]/","",gethostname())),0,5);
    }

    /**
     * @return int
     */
    public function getProcessId()
    {
        if(!$this->objectId){
            return getmypid();
        }else{
            return substr($this->objectId,-10,-4);
        }
    }

    /**
     * @return int
     */
    public function getRandomNumber()
    {
        if(!$this->objectId){
            return mt_rand("1000", "9999");
        }else{
            return substr($this->objectId,-4);
        }
    }

    public function __toString(){
        return $this->objectId;
    }
} 