<?php
require 'vendor/autoload.php';

use controller\UserController;

$datas = new UserController();
$data = $datas->readUser();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Client</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
    <link rel="icon" href="/icons/Main Logo.svg">
</head>

<body>

    <main>

        <h1>User Details</h1>

        <form method="post" action="/user/update">

            <input type="hidden" name="id" value="<?= $data["id"] ?>">

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $data["name"] ?>">

            <label for="email">email</label>
            <textarea name="email" id="email"><?= htmlspecialchars($data["email"]) ?></textarea>

            <button>Submit</button>
        </form>
    </main>
</body>

</html>