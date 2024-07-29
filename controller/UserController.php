<?php

namespace controller;

class UserController
{
    private $apiBaseUrl = 'http://localhost:8000/user/';

    private function sendRequest($url, $method, $data = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
        }
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_STDERR, fopen('php://stderr', 'w'));

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            echo 'cURL Error: ' . $error;
            exit();
        }

        $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);
        return ['response' => json_decode($response, true), 'status_code' => $status_code];
    }

    public function createUser(){
        $data = [
            'name' => filter_input(INPUT_POST, 'name'),
            'email' => filter_input(INPUT_POST, 'email'),
            'passw' => filter_input(INPUT_POST, 'password'),
        ];

        $result = $this->sendRequest($this->apiBaseUrl . 'create', 'POST', $data);
        $response = $result['response'];
        $status_code = $result['status_code'];


        $message = $response['message'] ?? 'No message found';

        switch ($message) {
            case 'Failed to create record':
            case 'Email already in use':
                $alertMessage = $message;
                $redirectUrl = '/';
                break;

            case 'Invalid password':
                $alertMessage = "Please enter a password with at least 8 characters, one uppercase letter, and one digit or special character.";
                $redirectUrl = '/';
                break;

            case 'Record created successfully':
                $_SESSION['data'] = $data['name'];
                $_SESSION['id'] = $response['id'];

                header('Location: ../../');
                break;

            default:
                // Optionally handle unexpected messages or set a default message
                $alertMessage = 'An unexpected error occurred.';
                $redirectUrl = '/';
                break;
        }
        echo <<<HTML
        <script type='text/javascript'>
            alert("{$alertMessage}");
            window.location.href = '{$redirectUrl}';
        </script>
        HTML;

        if ($status_code === 422) {
            echo 'Invalid data: ';
            print_r($response['errors']);
            exit();
        }

        if ($status_code !== 200) {
            echo "Unexpected status code: $status_code";
            var_dump($response);
            exit();
        }
    }

    public function deleteUser(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $data = ['id' => $id];

            $result = $this->sendRequest($this->apiBaseUrl . 'delete', 'DELETE', $data);
            $status_code = $result['status_code'];

            if ($status_code !== 200) {
                echo "Unexpected status code: $status_code";
                var_dump($data);
                exit();
            }

            header('Location: /delete');
        }

    }
        

    public function readUser()
    {
        $id = $_GET['id'];
        $result = $this->sendRequest($this->apiBaseUrl . 'read?id=' .$id, 'GET');
        $response = $result['response'];
        $status_code = $result['status_code'];

        if ($status_code === 422) {
            echo 'Invalid data: ';
            print_r($response['errors']);
            exit();
        }

        if ($status_code !== 200) {
            echo "Unexpected status code: $status_code";
            var_dump($response);
            exit();
        }

        // Process the response data as needed
        return $response;
    }

    public function loginUser()
    {
        if (isset($_SESSION['last_login_time']) && time() - $_SESSION['last_login_time'] < 300) {
            header('location:../../main');
            exit();
        }

        $remember = isset($_POST['remember']) && $_POST['remember'] == 'on';

        if (filter_has_var(INPUT_POST, 'sign')) {
            $email = filter_input(INPUT_POST, 'email');
            $passw = filter_input(INPUT_POST, 'password');

            $data = [
                'email' => $email,
                'password' => $passw,
            ];

            $result = $this->sendRequest('http://localhost:8000/login', 'POST', $data);
            $response = $result['response'];

            if (isset($response['message']) && $response['message'] === 'Login successful') {
                $_SESSION['id'] = $response['id'];
                $_SESSION['data'] = $response['name'];
                $_SESSION['last_login_email'] = $response['email'];
                $_SESSION['last_login_time'] = time();

                if ($remember) {
                    setcookie('remember_email', $response['email'], time() + 60 * 60 * 24 * 5);
                    setcookie('remember_pass', $passw, time() + 60 * 60 * 24 * 2);
                } else {
                    if (isset($_COOKIE['remember_email'])) {
                        setcookie('remember_email', '', time() - 3600);
                    }
                    if (isset($_COOKIE['remember_pass'])) {
                        setcookie('remember_pass', '', time() - 3600);
                    }
                }

                header('location:../../main');
                exit();
            } else {
                echo "<script>
                    alert('enter valid email and password !')
                </script>";
                echo "<script>
                    setTimeout(function() {
                        window.location.href = '/homepage';
                    }, 100);
                </script>";
            }
        }
    }

    public function logoutUser()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: /');
        exit();
    }

    public function updateUser()
    {
        $data = [
            'id' => filter_input(INPUT_POST, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'email' => filter_input(INPUT_POST, 'email'),
        ];

        $result = $this->sendRequest($this->apiBaseUrl . 'edit', 'POST', $data);
        $response = $result['response'];
        $status_code = $result['status_code'];

        if ($status_code === 422) {
            echo 'Invalid data: ';
            print_r($response['errors']);
            exit();
        }

        if ($status_code !== 200) {
            echo "Unexpected status code: $status_code";
            var_dump($response);
            exit();
        }

        header('Location: ../../update?name=' . urlencode($data['name']));
    }

    public function createPassword()
    {
        $data = [
            'password' => filter_input(INPUT_POST, 'password'),
            'id' => filter_input(INPUT_POST, 'id'),
        ];

        $result = $this->sendRequest($this->apiBaseUrl . 'newpassword', 'POST', $data);
        $response = $result['response'];
        $status_code = $result['status_code'];

        if ($status_code === 422) {
            echo 'Invalid data: ';
            print_r($response['errors']);
            exit();
        }

        if ($status_code !== 200) {
            echo "Unexpected status code: $status_code";
            var_dump($response);
            exit();
        }
        echo "<script>
            alert('password reset');
            window.location.href = '/';
        </script>";
        exit();
    }

    public function findUserByToken()
    {
        $token = $_GET['token'];
        $apiUrl = $this->apiBaseUrl . 'findbytoken?token=' . urlencode($token);

        $result = $this->sendRequest($apiUrl, 'GET');

        $data = $result['response'];
        $status_code = $result['status_code'];

        if ($status_code === 422) {
            echo 'Invalid data: ';
            print_r($data['errors']);
            exit();
        }

        if ($status_code !== 200) {
            echo "Unexpected status code: $status_code";
            var_dump($data);
            exit();
        }

        // Process the response data as needed
        return $data;
    }

    public function forgetPassword()
    {
        if (filter_has_var(INPUT_GET, 'submit')) {
            $email = filter_input(INPUT_GET, 'email');

            $apiUrl = $this->apiBaseUrl . 'forget?email=' . urlencode($email);

            $result = $this->sendRequest($apiUrl, 'GET');
            $datas = $result['response'];
            $status_code = $result['status_code'];

            if ($status_code === 200) {
                if (!empty($datas['email']) && !empty($datas['token'])) {
                    echo "<script>
                            alert('email sent');
                            window.location.href = 'https://mail.google.com/mail/';
                        </script>";
                    require 'controller/user/message.php';
                } else {
                    header('Location: /nouser');
                    exit();
                }
            } elseif ($status_code === 422) {
                echo 'Invalid data: ';
                print_r($datas['errors']);
                exit();
            } else {
                echo "Unexpected status code: $status_code";
                var_dump($datas);
                exit();
            }

            exit();
        }
    }
}
