<?php
namespace PaySystem;
class Product{
    public $price;
    public $quantity;
    public $title;
    
    public function __construct($price, $quantity, $title) {
        $this->price = $price;
        $this->quantity = $quantity;
        $this->title = $title;
    }
}
