<?php
/**
 * Created by PhpStorm.
 * User: tawfek
 * Date: 10/7/14
 * Time: 1:04 PM
 */

namespace Tawfekov\ObjectId;


interface ObjectIdInterface {
    public function getObjectId();
    public function setObjectId($objectId);
    public function getTimestamp();
    public function __toString();
    public function getRandomNumber();
    public function getProcessId();
    public function getMachineIdentifier();
    public function getTimezone();
    public function setTimezone();
}