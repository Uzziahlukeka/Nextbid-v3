<?php
require 'view/layer/layerShow.php';
require 'view/layer/head.php';
?>
<body>

    <section class="card-content">
        <div class="wrapper cards">
            <!-- ............................................................................ -->
            <div class="card auction-card">
                <div class="auction-card-img">
                    <a href="#"><img src="/images/<?php echo $data['item_photo'] ?>" alt="Product Image"></a>
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
                            <?php echo $data['item_name'] ?>
                        </h3>
                    </div>

                    <!-- Description -->
                    <div class="description">
                        <label class="one-label" for="description">Description</label>
                        <p><?php echo $data['item_description'] ?>
                        </p>
                    </div>
                    <div class="current-price-p">
                        <div class="stroke"></div>
                        <p class="card-text card-text-2">Your Bid:<span class="current-price current-bid">$<?php echo isset($_SESSION['bid']) ? $_SESSION['bid'] : '0'; ?></span></p>
                        <p class="card-text">Your Last bid: <span class="current-price ">$<?php echo $yourBid ?></span></p>
                        <p class="card-text">The Bid: <span class="current-price last-bid">$<?php echo $currentBid ?></span></p>
                    </div>
                    <p class="card-text-last card-text-1">Ends in: <span class="closing-time">2023-04-11T08:00:00Z</span></p>

                    <div class="card-bid">
                        <div class="bid-container">
                            <input type="number" class="bid-input" placeholder="Offer a price" name="bid">
                            <button onclick="bid(this.closest('.auction-card'))">Bid now</button>
                        </div>
                        <?php if ($canPay) : ?>
                            <form method="post" action="/pay">
                                <input type="hidden" value="<?php echo $payment['your_bid'] ?>" name="bet">
                                <button type="submit" id="submitButton" name="pay">Pay</button>
                            </form>
                        <?php else : ?>
                            <button id="alertButton" disabled style="background-color: gray;">Pay</button>
                        <?php endif; ?>
                    </div>

                    <p class="card-text-last card-text">Ends in:<span id="timer" class="countdown-timer"></span></p>
                    <form method="post" action="deleteItem">
                        <input type="hidden" name="item_name" value="<?= $data["item_name"] ?>">
                        <button class="delete-button">Delete</button>
                    </form>

                    <form method="get" action="updateitem" class="edit-button">
                        <!-- <input type="hidden" name="_method" value="PUT"> -->
                        <input type="hidden" name="item_name" value="<?php echo $data["item_name"]; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $data["user_id"]; ?>">
                        <button class="edit-button">edit</button>
                    </form>

                    <form method="get" action="/">
                        <button type="submit" class="auction-button">AUCTION</button>
                    </form>

                </div>

            </div>
        </div>

    </section>
    <script src="/js/script.js"></script>
    <script src="/js/bid.js"></script>
    <script src="/js/like-counter.js"></script>

</body>

</html>