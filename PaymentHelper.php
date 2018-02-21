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





