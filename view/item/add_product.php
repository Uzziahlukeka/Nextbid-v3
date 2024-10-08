<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="/icons/Main Logo.svg">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/styles/add-product.css">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Nextbid - Be Seller</title>
</head>

<body>


    <section id="header">
        <a href="/main"><img class="image" src="../icons/Nextbid.svg" alt=""></a>
        <div class="navbar-links">
            <ul class="navbar">
                <li><a href="/main">Home</a></li>
                <li><a href="about">About</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a class="active" href="new item">Add Product</a></li>
            </ul>
        </div>
        <div class="navbar-icons">
            <a href="main"><img class="user-profile-icon" src="/icons/user-circle.svg" alt=""></a>
        </div>
        <div class="toggle-btn">
            <i class="fa-solid fa-bars fa-lg"></i>
        </div>
    </section>

    <div class="product-form">
        <h3>Add Your Item</h3>
        <form class="product-container" method="post" action="newitem" enctype="multipart/form-data">
            <label class="one-label" for="item-name">Title/Name*</label>
            <input class="form-control-1" type="text" id="item-name" name="item_name" placeholder="Item name" required>

            <label class="one-label" for="item-description">Item Description(optional)</label>
            <textarea class="form-control-1" id="item-description" name="item_description" placeholder="Use this section to add any extra information"></textarea>

            <label class="one-label" for="starting-price">Starting Price*</label>
            <input class="form-control-1" type="text" name="item_price" placeholder="Enter amount in USD" id="amount" required>


            <div class="form-group-1 image-upload-container">
                <label class="one-label" for="image">Upload Image*</label>
                <div class="image-and-info">
                    <label class="file-upload">
                        Choose File
                        <input type="file" id="image-upload" name="image" accept="image/jpeg, image/png">

                    </label>
                    <span class="file-info"></span>
                </div>
                <a class="cancel-button" onclick="cancelFile()">
                    <alt="">Clear
                </a>
            </div>

            <button type="submit" class="product-btn" name="add_product">Add Product</button>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script src="/js/toggle-btn.js"></script>
    <script src="/js/date-range.js"></script>
    <script src="/js/ratio-choice.js"></script>
    <script src="/js/choose-image.js"></script>

</body>

</html>