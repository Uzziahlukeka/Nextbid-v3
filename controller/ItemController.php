<?php

namespace controller;

if (isset($_POST['bidAmount'])) {
    // Store the bid amount in the session
    $_SESSION['lastBid'] = $_POST['bidAmount'];

    var_dump($_SESSION['lastBid'] = $_POST['bidAmount']);
    die();
}

class ItemController
{
    private $apiBaseUrl = "http://localhost:8000";

    public function __construct()
    {

    }
    public function deleteItem()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $item_name = $_POST["item_name"];
            $data = ["item_name" => $item_name];

            $response = $this->sendApiRequest("/delete/item", "DELETE", $data);
            if ($response['status_code'] === 200) {
                header('Location: ../../delete_item');
                exit;
            } else {
                echo "Unexpected status code: " . $response['status_code'];
                var_dump($response['data']);
                exit;
            }
        }
    }

    public function editItem()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                'item_name' => filter_input(INPUT_POST, "item_name"),
                'item_photo' => filter_input(INPUT_POST, "item_photo"),
                'item_description' => filter_input(INPUT_POST, "item_description"),
                'item_price' => filter_input(INPUT_POST, "item_price"),
                'user_id' => $_SESSION['id']
            ];

            $response = $this->sendApiRequest("/edit/item", "POST", $data);

            if ($response['status_code'] === 422) {
                echo "Invalid data: ";
                print_r($response['data']["errors"]);
                exit;
            } elseif ($response['status_code'] !== 200) {
                echo "Unexpected status code: " . $response['status_code'];
                var_dump($response['data']);
                exit;
            } else {
                header("Location: edit_item?item_name=" . urlencode($data['item_name']));
                exit;
            }
        }
    }

    public function viewItem()
    {
        $item_name = $_GET['item_name'] ?? null;

        if ($item_name === null) {
            die(json_encode(['message' => 'Item name not provided']));
        }

        $response = $this->sendApiRequest("/read/item?item_name=" . urlencode($item_name), "GET");

        if ($response['status_code'] === 422) {
            echo "Invalid data: ";
            print_r($response['data']["errors"]);
            exit;
        } elseif ($response['status_code'] !== 200) {
            echo "Unexpected status code: " . $response['status_code'];
            var_dump($response['data']);
            exit;
        }



        $_SESSION['item_name'] = $response['data']['item_name'];
       
        if (!isset($_SESSION['data'])) {
            header("Location: /");
            exit;
        }

        if ($_SESSION['id'] !== $response['data']['user_id']) {

            header("Location: show_iten?item_name=" . urlencode($item_name));
        } else {
            header("Location: show_item?item_name=" . urlencode($item_name));
        }
        exit;
    }

    public function handleItemDetails()
    {
        // Unset the bid session variable if it exists
         if (isset($_SESSION['bid'])) {
             unset($_SESSION['bid']);
         }

        // Get item name from the query parameter
        $name = $_GET['item_name'] ?? null;
        if ($name === null) {
            die(json_encode(['message' => 'Item name not provided']));
        }

        // Fetch item data from the API
        $apiUrl = $this->apiBaseUrl . "/read/item?item_name=" . urlencode($name);
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

        // Handle different status codes
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

        $_SESSION['item_name'] = $data['item_name'];

        return ['status_code' => $status_code, 'data' => $data];
    }

    public function uploadItem()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty($_FILES)) {
                exit('No file was uploaded');
            }

            if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
                exit('Error uploading file');
            }

            $maxFileSize = 50 * 1024 * 1024; // 50MB
            if ($_FILES["image"]["size"] > $maxFileSize) {
                exit('File too large (max 50MB)');
            }

            $allowedMimeTypes = ["image/gif", "image/png", "image/jpeg"];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $_FILES["image"]["tmp_name"]);
            finfo_close($finfo);

            if (!in_array($mime_type, $allowedMimeTypes)) {
                exit("Invalid file type");
            }

            $filename = $_FILES["image"]["name"];
            $destination = "images/" . $filename;

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
                exit("Can't move uploaded file");
            }

            $data = [
                'item_name' => filter_input(INPUT_POST, "item_name"),
                'item_photo' => $filename,
                'item_description' => filter_input(INPUT_POST, "item_description"),
                'item_price' => filter_input(INPUT_POST, "item_price", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
                'user_id' => $_SESSION['id']
            ];

            $response = $this->sendApiRequest("/add/item", "POST", $data);

            if ($response['status_code'] === 422) {
                echo "Invalid data: ";
                print_r($response['data']["errors"]);
                exit;
            } elseif ($response['status_code'] !== 200) {
                echo "Unexpected status code: " . $response['status_code'];
                var_dump($response['data']);
                exit;
            } else {
                header("Location: ../../upload?item_name=" . urlencode($data['item_name']));
                exit;
            }
        }
    }

    public function handlePayment()
    {
        
         if (isset($_POST['pay']) && isset($_POST['bid'])) {
            $_SESSION['bids'] = $_POST['bid'];
            var_dump($_SESSION);
            die();
            header('Location: /payes');
            exit;
        } else {
            echo "<script>alert('Bid value not found in the form.');</script>";
            echo "<a href='/main' style='height: auto;'>Back</a>";
            exit;
        }
    }

    public function listItems()
    {
        $response = $this->sendApiRequest("/read/items", "GET");

        if ($response['status_code'] === 422) {
            echo "Invalid data: ";
            print_r($response['data']["errors"]);
            exit;
        } elseif ($response['status_code'] !== 200) {
            echo "Unexpected status code: " . $response['status_code'];
            var_dump($response['data']);
            exit;
        }
        return [
            'error' => false,
            'data' => $response['data']
        ];
    }

    private function sendApiRequest($endpoint, $method, $data = [])
    {
        $url = $this->apiBaseUrl . $endpoint;
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $method === "POST" || $method === "DELETE" ? json_encode($data) : null,
            CURLOPT_VERBOSE => true,
            CURLOPT_STDERR => fopen('php://stderr', 'w'),
        ]);

        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return [
            'status_code' => $status_code,
            'data' => json_decode($response, true)
        ];
    }

    public function updateBid(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bid'])) {
            $bidAmount = floatval($_POST['bid']);
            $_SESSION['bid'] = $bidAmount;
            echo 'Bid updated successfully';
        } else {
            http_response_code(400); // Bad Request
            echo 'Invalid request';
        }
    }
}