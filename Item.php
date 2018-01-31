<?php
namespace MerhantReceipt;
class Item{
    public $price;
    public $quantity;
    public $title;
    public $tax;
    public function __construct($base_price, $quantity, $title, $tax, $discount) {
        $this->price = $base_price - round($base_price * $discount, 2);
        $this->quantity = $quantity;
        $this->tax = $tax;
        $this->title = $title;
    }
}