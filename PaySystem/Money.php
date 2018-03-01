<?php
namespace PaySystem;
class Money {
    private $amount;

    public function __construct($amount) {
        $this->setAmount($amount);
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function getAmount(){
        return $amount;
    }

    public function getTestCurrency(){
        return 'TST';
    }

    public function getRealCurrency(){
        return 'RUB';
    }
}