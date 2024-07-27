<?php

$to = $datas['email'];
$subject = "Password Reset";

// Make sure to properly escape and format the URL
$token = htmlspecialchars($datas['token']);
$url = "http://localhost:3000/newpassword?token=$token";

// Construct the HTML message
$message = <<<EOD
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <p>Click <a href="$url">here</a> to reset your password.</p>
</body>
</html>
EOD;

// Set content-type header for sending HTML email
$headers = "From: no-reply@example.com\r\n";
$headers .= "Reply-To: no-reply@example.com\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo 'Password reset email sent successfully.';
} else {
    echo 'Failed to send password reset email.';
}
