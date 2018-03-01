<?php
namespace PaySystem;

class PaySystemSettings{
    private $secret_key;
    private $eshop_id;
    private $is_test;
    private $preference;
    private $hold_mode;
    private $expire_date;
    private $hold_time;
    private $service_name;
    private $inn;
    private $tax;
    private $delivery_tax;
    private $group;
    private $lang;
    private $success_url;
    private $fail_url;
    private $back_url;
    private $user_email;
    private $user_name;
    private $is_reccuring;
    
    public function __construct(){}
    
    private function setIsTest(){
        
    }
}