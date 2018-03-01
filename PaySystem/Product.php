<?php
namespace PaySystem;
class Product{
    private $price;
    private $quantity;
    public $title;
    
    public function __construct($price, $quantity, $title) {
        $this->setPrice($price);
        $this->setQuantity($quantity);
        $this->title = $title;
    }
    
    public function setPrice($price){
        $this->price = $price;
    }
    
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
    
    public function setTitle($title){
        $this->title = $title;
    }
    
    public function getPrice(){
        return $this->price;
    }

    public function getQuaintity(){
        return $this->price;
    }

    public function getTitle(){
        return $this->title;
    }
}
