<?php
require 'vendor/autoload.php';
use controller\ItemController;
$data = new ItemController();
$response = $data->handleItemDetails();
$datas = $response['data'];
require 'view/layer/head.php';
?>
<body>

    <section class="card-content">
        <div class="wrapper cards">

            <!-- ............................................................................ -->
            <form method="post" action="edititem">
                <div class="back-button">
                    <a href="/main"><i class="fa-solid fa-arrow-left fa-lg" style="color: #3b3b3b;"></i> Back</a>
                </div>
                <div class="card auction-card">
                    <div class="auction-card-img">
                        <a href="#"><img src="/images/<?php echo $datas['item_photo'] ?>" alt="Product Image"></a>
                        <input type="hidden" name="item_photo" value="<?php echo $datas['item_photo'] ?>">
                    </div>
                    <div class="card-details">
                        <div class="like-icon-num">
                            <a class="like-button">
                                <i class="fa-regular fa-heart fa-lg like1-icon" style="color: #000000;"></i>
                                <i class="fa-solid fa-heart fa-lg" style="color: #f92a2a;"></i>
                            </a>
                            <span class="like-count">0</span>
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="one-label" for="title">Title</label>
                            <h3 class="card-title">
                                <input type="text" name="item_name" value="<?php echo $datas['item_name'] ?>">
                            </h3>
                        </div>

                        <!-- Description -->
                        <div class="description">
                            <label class="one-label" for="description">Description</label>
                            <input type="text" name="item_description" value="<?php echo $datas['item_description'] ?>" class="input-field">
                            </p>
                        </div>
                        <div class="current-price-p">
                            <div class="stroke"></div>
                            <p class="card-text card-text-2">Your bid: <span class="current-price current-bid">$0</span></p>
                            <p class="card-text">Last bid: <span class="current-price last-bid"></span></p>
                            <input type="text" name="item_price" value="<?php echo $datas['item_price'] ?>" class="input-field">
                        </div>
                        <p class="card-text-last card-text-1">Ends in: <span class="closing-time">2023-04-11T08:00:00Z</span></p>
                        <!-- <div class="card-bid">
                        <input type="number" class="bid-input" placeholder="Offer a price">
                        <button onclick="bid(this.closest('.auction-card'))">Bid now</button>
                    </div> -->
                        <p class="card-text-last card-text">Ends in:<span id="timer" class="countdown-timer"></span></p>
                    </div>
                </div>
                <button type="submit" class="auction-button">submit</button>
            </form>
        </div>
    </section>
    <script src="/js/script.js"></script>
    <script src="/js/bid.js"></script>
    <script src="/js/like-counter.js"></script>

</body>

</html>