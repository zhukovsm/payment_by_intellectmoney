<?php
require 'Autoloader.php';
use Autoloader as Autoloader;
use PaySystem\MerchantReceiptHelper as mrh;
use PaySystem\Order as ord;
try{
    $order = new ord(12, 2342, 24243, 33, 333, array('sum' => 3));
} catch(Exception $e){
    echo $e->getMessage();
}