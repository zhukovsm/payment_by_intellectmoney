<?php
namespace PaySystem;
use Exception;
use PaySystem\Exceptions as Exceptions;
class Validator{
    public static function CheckIsSetProperty($className, $name, $value){
        if (!property_exists($className, $name)){
            throw new Exceptions\EmptyException('Property - "'.$name.'" not found');
        }
        if (!isset($value)){
            throw new Exceptions\EmptyException('Value of property -"'.$name.'" cann`t be empty');
        }
        return $value;
    }
}