<?php
namespace PaySystem;
class Item extends Product{
    public $tax;
    public function __construct($base_price, $quantity, $title, $tax, $discount) {
        $price = round($base_price * $discount, 2);
        parent::__construct($price, $quantity, $title);
        $this->tax = $tax;
    }
}