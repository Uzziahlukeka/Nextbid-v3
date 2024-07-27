<?php
if (filter_has_var(INPUT_GET, "submit")) {
    $email = filter_input(INPUT_GET, "email");

    $apiUrl = "http://localhost:8000/user/forget?email=" . urlencode($email);

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => $apiUrl,
        CURLOPT_VERBOSE => true,
        CURLOPT_STDERR => fopen('php://stderr', 'w'),
    ]);

    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $datas = json_decode($response, true);

    if ($status_code === 200) {
        if (!empty($datas['email']) && !empty($datas['token'])) {
            require'message.php';
        } else {
            echo 'Invalid data received from API.';
        }
    } elseif ($status_code === 422) {
        echo "Invalid data: ";
        print_r($datas["errors"]);
        exit;
    } else {
        echo "Unexpected status code: $status_code";
        var_dump($datas);
        exit;
    }
}   
