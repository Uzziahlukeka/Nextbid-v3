<?php 
    require 'vendor/autoload.php';

    use controller\UserController;
    
    $datas = new UserController();
    $data = $datas->findUserByToken();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Reset Password</h1>

    <form method="post" action="updatepassword">

        <input type="hidden" name="token" value="<?= $data['token'] ?>">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        

        <label for="password">New password</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation">

        <button type="submit">Send</button>
    </form>

</body>
</html>