<?php
require 'Autoloader.php';
use Autoloader as Autoloader;
use PaySystem\MerchantReceiptHelper as mrh;
use PaySystem\Order as ord;
use PaySystem\Exceptions as Exceptions;
use PaySystem\PaymentHelper as PaymentHelper;
use PaySystem\PaySystemSettings as PaySystemSettings;
try{
    $order = Ord::createInstance(12, 2342, 24243, 34, 333, array('sum' => 3));
    $order2 = Ord::createInstance(25, 2342, 24243, 23, 333, array('sum' => 3));
    $ps_settings = new PaySystemSettings();
    $payment = new PaymentHelper($order, $ps_settings);
    //Ord::getInstance()->id = 5;
    Ord::getInstance()->setMoney(100);
    Ord::getInstance()->money = 25;
    print_r(Ord::getInstance()->money->getTestCurrency());
} catch(Exception $e){
    echo $e->getMessage();
}

//interface Observer
//{
//    function notify($obj);
//}
//
//class ExchangeRate
//{
//    static private $instance = NULL;
//    private $observers = array();
//    private $exchange_rate;
//
//    private function __construct()
//    {}
//    
//    private function __clone()
//    {}
//
//    static public function getInstance()
//    {
//        if(self::$instance == NULL)
//        {
//            self::$instance = new ExchangeRate();
//        }
//        return self::$instance;
//    }
//
//    public function getExchangeRate()
//    {
//        return $this->exchange_rate;
//    }
//
//    public function setExchangeRate($new_rate)
//    {
//        $this->exchange_rate = $new_rate;
//        $this->notifyObservers();
//    }
//
//    public function registerObserver(Observer $obj)
//    {
//        $this->observers[] = $obj;
//    }
//
//    function notifyObservers()
//    {
//        foreach($this->observers as $obj)
//        {
//            $obj->notify($this);
//        }
//    }
//}
//
//class ProductItem implements Observer
//{
//    public $price;
//    public function __construct()
//    {
//        ExchangeRate::getInstance()->registerObserver($this);
//    }
//
//    public function notify($obj)
//    {
//        if($obj instanceof ExchangeRate)
//        {
//            // Update exchange rate data
//            print "Received update!\n";
//        }
//    }
//}
//
//$product1 = new ProductItem();
//$product2 = new ProductItem();
//
//ExchangeRate::getInstance()->setExchangeRate(4.5);
//var_dump(ExchangeRate::getInstance()->getExchangeRate(4.5));
//var_dump($product2);