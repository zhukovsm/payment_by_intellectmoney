<?php
namespace PaySystem;
use PaySystem\Exceptions as Exceptions;
use PaySystem\Money as Money;

class Order{
    public $id;
    public $money;
    public $discount;
    public $delivery;
    public $sumPaid;
    public $products;
    public $status;
    public function __construct($id, $price, $discount, $delivery, $sumPaid, $products, $status = 0) {
            $this->id = $id;
            $this->setMoney($price);
            $this->discount = $discount;
            $this->delivery = $delivery;
            $this->sumPaid = $sumPaid;
            $this->products = $products;
            $this->status = $status;
    }
    
    
    public function setMoney($price){
        $this->money = Money($price);
    }
    public function __set($name, $value){
        var_dump(empty($value));
        if (empty($value)){
            throw new Exceptions\EmptyException('Value of property -"'.$name.'" cann`t be empty');
        }
        if(property_exists(__CLASS__, $name) == 1){
            $this->$name = $value;
        } else {
            throw new Exceptions\EmptyException('Property - "'.$name.'" not found');
        }
    }
    
}