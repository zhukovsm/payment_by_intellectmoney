<?php
class PaymentHelper{
    private $public_values = array();
    private $money;
    private $url;
    private $delivery;
    private $payment_button;
    private $user;
    private $order;
    private $preference;
    private $is_test;
    private $hold_mode;
    private $expire_date;
    private $hold_time;
    private $service_name;
    private $inn;
    private $tax;
    private $group;
    private $lang;
    private $secret_key;
    private $item;
    public function __construct($order, $ps_settings, $options) {
        
    }
    
}

class Money{
    private $amount;
    private $currency;
    public function __construct($amount, $currency){
        $this->amount = $amount;
        $this->currency = $currency;
    }
}

class Url{
    private $path;
    private $lang;
}

class Delivery{
    private $description;
    private $amount;
}

class PaymentButton{
    private $description;
    private $is_auto_redirect;
}

class User{
    private $name;
    private $email;
}

class Order{
    private $id;
    private $full_amount;
    private $amount;
    private $products;
    private $status;
}

class Product{
    public $price;
    public $quantity;
    public $title;
    public $tax;
    
    public function __construct($price, $quantity, $title) {
        $this->price = $price;
        $this->quantity = $quantity;
        $this->title = $title;
    }
}

class Item extends Product{
    private $encoding = LANG_CHARSET == "windows-1251" ? "cp1251" : "UTF-8";
    public function __construct($base_price, $quantity, $title, $tax, $discount) {
        $this->price = round($base_price * $discount, 2);
        $this->quantity = $quantity;
        $this->tax = $tax;
        $this->title = $this->encoding != "UTF-8" ? mb_convert_encoding($title, "UTF-8", 'cp1251') : $title;
    }
}

