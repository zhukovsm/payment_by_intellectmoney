<?php
namespace PaySystem;
class Payment{
    public $recipient_amount;
    public $quantity;
    public $title;
    
    public function __construct($price, $quantity, $title) {
        $this->price = $price;
        $this->quantity = $quantity;
        $this->title = $title;
    }
}
