<?php
if (isset($_GET['name'])) {
    $data = urldecode($_GET['name']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>update Client</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
        }

        main {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
    <link rel="icon" href="/icons/Main Logo.svg">
</head>

<body>

    <main>

        <h1>user updated</h1>

        <p>Repository updated successfully.
        <p>votre profil
            <a href="/show?name=<?php echo $data ?>">Show</a>
        </p>
        </p>
        <p>click on <a href="/main">auction</a> to continue</p>
    </main>
</body>

</html>