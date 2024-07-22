<?php
if (isset($_SESSION['bid'])) {
    unset($_SESSION['bid']);
}

$item_name = isset($_GET['item_name']) ? $_GET['item_name'] : null;

if ($item_name === null) {
    die(json_encode(['message' => 'Item name not provided']));
}

$apiUrl = "http://localhost:8000/read/item?item_name=".urlencode($item_name);


$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $apiUrl,
    CURLOPT_VERBOSE => true,
    CURLOPT_STDERR => fopen('php://stderr', 'w'),
]);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);
$data = json_decode($response, true);
if ($status_code === 422) {
    echo "Invalid data: ";
    print_r($data["errors"]);
    exit;
}
if ($status_code !== 200) {
    echo "Unexpected status code: $status_code";
    var_dump($data);
    exit;
}
 if (isset($_POST['bid'])) {
     $bid = $_POST['bid'];
     $_SESSION['bid'] = $bid;
 }
 $_SESSION['item_name']=$data['item_name'];

 if (!isset($_SESSION['data'])) {
    header("Location: /");
    exit;
    
}
// Check if the current user is the creator of the item
if ($_SESSION['id'] !== $data['user_id']) {

    header("Location:show iten?item_name=" . urlencode($item_name));

    exit;
}else{
    header("Location:show item?item_name=" . urlencode($item_name));
    exit;
}

