<?php
if (isset($_GET['item_name'])) {
    $data = urldecode($_GET['item_name']);
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>upload file</title>
    <style>
        html, body {
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
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
</head>
<body>
    <main>

<h1>WELCOME</h1>

<p> created successfully.
    <p>click on <a href="/main">auction</a> to continue</p>
    <p>go to your item <a href="/show item?item_name=<?php echo $data ; ?>"> go on </a></p>
    
</p>

</main>
</body>
</html>