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
    <link rel="stylesheet" href="/styles/inner-card.css">
    <title>Nextbid - Auction Website</title>
</head>

<body>


    <section class="card-content">
        <div class="wrapper cards">
            <!-- ............................................................................ -->
            <div class="back-button">
                <a href="/"><i class="fa-solid fa-arrow-left fa-lg" style="color: #3b3b3b;"></i> Back</a>
            </div>
            <div class="card auction-card">
                <div class="auction-card-img">
                    <a href="#"><img src="https://robohash.org/13" alt="Product Image"></a>
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
                            Machinex
                        </h3>
                    </div>

                    <!-- Description -->
                    <div class="description">
                        <label class="one-label" for="description">Description</label>
                        <p>A random robot is a hypothetical robotic system or algorithm that performs actions or generates
                            outputs in a completely unpredictable or random manner. Instead of following a predefined set of rules or logic,
                            a random robot makes decisions or produces results based on random choices or probabilities.
                        </p>
                    </div>
                    <div class="current-price-p">
                        <div class="stroke"></div>
                        <p class="card-text card-text-2">Your bid: <span class="current-price current-bid">$0</span></p>
                        <p class="card-text">Last bid: <span class="current-price last-bid">$90.00</span></p>
                    </div>
                    <p class="card-text-last card-text-1">Ends in: <span class="closing-time">2023-04-11T08:00:00Z</span></p>
                    <div class="card-bid">
                        <input type="number" class="bid-input" placeholder="Offer a price">
                        <button onclick="bid(this.closest('.auction-card'))">Bid now</button>
                    </div>
                    <p class="card-text-last card-text">Ends in:<span id="timer" class="countdown-timer"></span></p>
                </div>
            </div>
        </div>
    </section>
    <script src="/js/script.js"></script>
    <script src="/js/bid.js"></script>
    <script src="/js/like-counter.js"></script>

</body>

</html>