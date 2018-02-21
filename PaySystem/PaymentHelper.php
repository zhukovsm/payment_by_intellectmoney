<?php
namespace PaySystem;

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
    public function __construct(Order $order, $ps_settings, $options) {
        
    }
    
}
//options
// protocol -  протокол IntellectMoney/WebMoney
// isForm - подготовить параметры к отображения в форме
// 
//
