<?php
require 'vendor/autoload.php';

use controller\ItemController;

$datas = new ItemController();
$response = $datas->handleItemDetails();
$payment = $datas->paymentData();
$read = $datas->paymentDataRead();
$data = $response['data'];

$_SESSION['your_bid'] = isset($payment['your_bid']) ? $payment['your_bid'] : 0;

$yourBid = isset($payment['your_bid']) ? $payment['your_bid'] : 0;
$currentBid = isset($read['bid_amount']) ? $read['bid_amount'] : (isset($data['item_price']) ? $data['item_price'] : 0);

$canPay = $yourBid >= $currentBid;


?>