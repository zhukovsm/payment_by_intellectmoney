<?php
namespace PaySystem;
use Exception;

class Order{
    use Validator;
    public $id;
    public $price;
    public $discount;
    public $delivery;
    public $sumPaid;
    public $products;
    public $status;
    public function __construct($id, $price, $discount, $delivery, $sumPaid, $products, $status = null) {
        $this->CheckIsSetProperty(__CLASS__, 'id', $id);
        $this->CheckIsSetProperty(__CLASS__, 'price', $price);
        $this->CheckIsSetProperty(__CLASS__, 'discount', $discount);
        $this->CheckIsSetProperty(__CLASS__, 'delivery', $delivery);
        $this->CheckIsSetProperty(__CLASS__, 'sumPaid', $sumPaid);
        $this->CheckIsSetProperty(__CLASS__, 'products', $products);
        $this->CheckIsSetProperty(__CLASS__, 'status', $status);
        $this->price = round($price, 2);
    }
    
    private function check(){
        
    }
}