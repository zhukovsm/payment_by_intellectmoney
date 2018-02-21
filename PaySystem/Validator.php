<?php
namespace PaySystem;
use Exception;
trait Validator{
    public function CheckIsSetProperty($className, $name, $value){
        if (!property_exists($className, $name)){
            throw new Exception('Property - "'.$name.'" not found');
        }
        if (isset($value)){
            $this->$name = $value;
        } else {
            throw new Exception('Value of property -"'.$name.'" cann`t be empty');
        }
    }
}