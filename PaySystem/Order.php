<?php
namespace PaySystem;
use PaySystem\Exceptions as Exceptions;
use PaySystem\Money as Money;
use PaySystem\Delivery as Delivery;

class Order{
    static private $instance;
    private $id;
    private $money;
    private $discount;
    private $delivery;
    private $sumPaid;
    private $products  = array();
    private $status;
    private $available_propertys = array(
        'id', 'money', 'discount', 'delivery', 'sumPaid', 'products', 'status'
    );
    private function __construct($id, $price, $discount, $delivery, $sumPaid, $products, $status = 0) {
            $this->id = $id;
            $this->setMoney($price);
            $this->discount = $discount;
            $this->setDelivery($delivery);
            $this->sumPaid = $sumPaid;
            $this->products = $products;
            $this->status = $status;
    }
    
    public static function createInstance($id, $price, $discount, $delivery, $sumPaid, $products, $status = 0){
        if (self::$instance == null){
            self::$instance = new Order($id, $price, $discount, $delivery, $sumPaid, $products, $status = 0);
        }
        return self::$instance;
    }
    
    public static function getInstance(){
        return self::$instance;
    }
    
    public function __get($name){
        if (property_exists(__CLASS__, $name) != 1){
            throw new Exceptions\EmptyException('Property - "'.$name.'" not found');
        }
        if (!in_array($name, $this->available_propertys)){
            throw new Exceptions\EmptyException('Value of property -"'.$name.'" cann`t be empty');
        }
        
        return $this->$name;
    }
    
    public function setMoney($price){
        $this->money = new Money($price);
    }
    public function setDelivery($delivery){
        $this->money = $delivery;
    }
    
}