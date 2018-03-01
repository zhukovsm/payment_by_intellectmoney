<?php
namespace PaySystem;
use PaySystem\Tax as Tax;
class Item extends Product{
    private $tax;
    public function __construct($base_price, $quantity, $title, Tax $tax, $discount) {
        $price = round($base_price * $discount, 2);
        parent::__construct($price, $quantity, $title);
        $this->setTax($tax);
    }
    
    public function setTax($tax){
        $tihs->tax = $tax;
    }
}