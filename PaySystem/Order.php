<?php
namespace PaySystem;
use PaySystem\Exceptions as Exceptions;
use Exception;

class Order{
    public $id;
    public $price;
    public $discount;
    public $delivery;
    public $sumPaid;
    public $products;
    public $status;
    public function __construct($id, $price, $discount, $delivery, $sumPaid, $products, $status = null) {
        try{
            $this->id = Validator::CheckIsSetProperty(__CLASS__, 'id', $id);
            $this->price = Validator::CheckIsSetProperty(__CLASS__, 'price', $price);
            $this->discount = Validator::CheckIsSetProperty(__CLASS__, 'discount', $discount);
            $this->delivery = Validator::CheckIsSetProperty(__CLASS__, 'delivery', $delivery);
            $this->sumPaid = Validator::CheckIsSetProperty(__CLASS__, 'sumPaid', $sumPaid);
            $this->products = Validator::CheckIsSetProperty(__CLASS__, 'products', $products);
            $this->status = Validator::CheckIsSetProperty(__CLASS__, 'status', $status);
        } catch(Exceptions\EmptyException $e){
            throw new Exception('Can not create instance of Order');
        }
    }
    
    private function check(){
        
    }
}