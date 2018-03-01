<?php
namespace PaySystem;
use PaySystem\Order as Order;
use PaySystem\PaySystemSettings as PaySystemSettings;

class PaymentHelper{
    private $order;
    private $ps_settings;
    private $options;
    public function __construct(Order $order, PaySystemSettings $ps_settings) {
        $this->order = $order;
        $this->ps_settings = $ps_settings;
        $this->options = $ps_options;
    }
    
    private function getPayment(){
        $entityId = $GLOBALS["SALE_INPUT_PARAMS"]["PAYMENT"]["ID"];
        $order = Sale\Order::load($this->order["ID"]);
        $paymentCollection = $order->getPaymentCollection();
        $payment = $paymentCollection->getItemById($entityId);
        $this->payment = $payment;
    }
    
    private function getLang(){
        $lang = $this->ps_settings->lang;
        return empty($lang) ? 'ru' : strtolower($lang);
    }

    private function getCurrency() {
        return $this->ps_settings->is_test ? "TST" : "RUB";
    }

    private function getAmount() {
        //$recipient_amount = $this->payment->getSum(); 
        return number_format($recipient_amount, 2, '.', '');
    }

    private function getServiceName() {
        return $this->ps_settings->service_name;
    }
    
    private function getHoldMode(){
        $holdModeValue = $this->ps_system->GetParamValue("IM.HOLD_MODE");
        return empty($holdModeValue) ? $holdModeValue : "NONE";
    }

    private function prepareHoldData() {
        $hold_mode = getHoldMode();
        if($hold_mode == "1"){
            $this->expire_date = date('Y-m-d H:i:s', strtotime('+' . $this->getHoldHours($this->expire_date) . ' hour'));
            $this->hold_time = $this->getHoldHours($this->hold_time);
        } elseif($hold_mode == "0") {
            $this->expire_date = date('Y-m-d H:i:s', strtotime('+' . $this->getExpiredHours($this->expire_date) . ' hour'));
            $this->hold_time = 0;
        }
    }

    private function getExpiredHours($days) {
        return (intval($days) && $days > 0 && $days < 4319) ? $days : 4319;
    }

    private function getHoldHours($hours) {
        return (intval($hours) && $hours > 0 && $hours < 119) ? $hours : 72;
    }

    private function getGroup(){
        $groupValue = $this->ps_system->group;
        return !empty($groupValue) ? $groupValue : null;
    }
    
    private function generateMerchantReceipt() {
        $products = CSaleBasket::GetList(array(), array("ORDER_ID" => $this->order["ID"]), false, false, array());
        $merchant_helper = new MerchantReceiptHelper($this->recipient_amount, $this->inn, $this->user_email, $this->group, $this->order['DISCOUNT_VALUE'], $this->order['PRICE']);
        
        while ($product = $products->Fetch()){
            $title = $this->convertEncoding($product['NAME']);
            $merchant_helper->addItem($product["PRICE"], $product['QUANTITY'], $title, $this->tax);
        }
        if ($this->order['PRICE_DELIVERY'] > 0){
            $title = $this->convertEncoding("Доставка");
            $merchant_helper->addItem($this->order['PRICE_DELIVERY'], 1, $title, $this->delivery_tax);
        }
        
        $this->merchant_receipt = $merchant_helper->generateMerchantReceipt();
    }
    
    private function convertEncoding($title){
        if(LANG_CHARSET != "UTF-8"){
            $title = mb_convert_encoding($title, "UTF-8", "cp1251");
        }
        return $title;
    }

    private function generateHash() {
        $this->pre_hash = md5(join('::', array($this->eshop_id, $this->order["ID"], $this->service_name, $this->recipient_amount, $this->recipient_currency, $this->secret_key)));
    }
    
    private function getUserName(){
        $this->user_name = $this->order["USER_NAME"]." ".$this->order["USER_LAST_NAME"];
    }

    function getTemplate() {
        require($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/sale_payment/im.payment/template/template.php");
    }
}
