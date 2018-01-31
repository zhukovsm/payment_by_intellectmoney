<?php
namespace MerhantReceipt;
class Item{
    public $price;
    public $quantity;
    public $title;
    public $tax;
    public function __construct($base_price, $quantity, $title, $tax, $discount) {
        $this->price = $base_price - round($base_price * $discount, 2);
        $this->quantity = $quantity;
        $this->tax = $tax;
        $this->title = $title;
    }
}

class MerchantReceiptHelper{
    private $common_price=0;
    private $items = array();
    private $recipient_amount;
    private $discount;
    private $group;
    private $inn;
    private $customer_contact;

    public function __construct($recipient_amount, $inn, $customer_contact, $group=null, $discount_value=0, $order_price=0) {
        $this->recipient_amount = $recipient_amount;
        $this->group = $group;
        $this->inn = $inn;
        $this->customer_contact = $customer_contact;
        $this->setDiscount($discount_value, $order_price);
    }

    public function addItem($base_price, $quantity, $title, $tax) {
        $item = new Item($base_price, $quantity, $title, $tax, $this->discount);
        $this->common_price += $item->price*$item->quantity;
        array_push($this->items, $item);
    }
    
    private function setDiscount($discount_value, $order_price){
        $discount = $discount_value;
        if($this->recipient_amount != $order_price){
            $discount += $order_price - $this->recipient_amount; 
        }
        if ($discount) {
            $discount = $discount / ($order_price+$discount_value);
        }
        $this->discount = $discount;
        if(empty($discount)){
            $this->discount = 0;
        }
    }
    
    public function generateMerchantReceipt(){
        $merchantReceipt = [
            "inn" => $this->inn,
            "group" => $this->group,
            "content" => [
                "type" => "1",
                "positions" => $this->getItems(),
                "customerContact" => $this->customer_contact
            ]
        ];
        return htmlentities(json_encode($merchantReceipt), ENT_QUOTES);
    }
    
    private function getItems(){
        $positions = array();
        $sum_difference = round($this->recipient_amount - $this->common_price, 2);

        foreach ($this->items as $item){
            if (abs($sum_difference) != 0) {
                echo $sum_difference;
                if ($item->quantity == 1){
                    $item->price += $sum_difference;
                } elseif ($item->quantity > 1){
                    $item->quantity--;
                    $positions[] = self::createElementForPositions(1, $item->price+$sum_difference, $item->tax, $item->title);
                } else { 
                    $item->price = $item->price + round($sum_difference/$item->quantity,2);
                }
                $sum_difference = 0;
            }
            $positions[] = $this->createElementForPositions($item->quantity, $item->price, $item->tax, $item->title);
        }

        return $positions;
    }
    
    private function createElementForPositions($quantity, $price, $tax, $title){
        return array(
            'quantity' => $quantity,
            'price' => $price,
            'tax' => $tax,
            'text' => $title
        );
    }
}