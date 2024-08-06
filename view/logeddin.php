<?php
require 'vendor/autoload.php';

use controller\ItemController;

$datas = new ItemController();
$response = $datas->listItems();
$data = $response['data'];
$payment = $datas->paymentDataRead();
$name = isset($_SESSION['data']) ? $_SESSION['data'] : null;
$name = $_SESSION['data'];
$id = $_SESSION['id'];

$pageTitle = 'NextBid-Auction';
require 'view/layer/mainHead.php';

?>

<body>
  <!-- ....................................Here starts navbar........................................ -->

  <section id="header">
    <a href="/main"><img class="image" src="/icons/Nextbid.svg" alt=""></a>
    <div class="navbar-links">
      <ul class="navbar">
        <li><a class="active" href="/main">Home</a></li>
        <li><a href="about">About</a></li>
        <li><a href="contact">Contact</a></li>
        <li><a href="/newItem">Add Product</a></li>
      </ul>
    </div>
    <div class="navbar-icons">
      <div class="search">
        <input type="text" class="search__input" placeholder="Search here">
      </div>
      <a href="cart"><img src="/icons/shopping.svg" alt=""></a>
      <a href="logout"> Log out </a>
    </div>
    <div class="navbar-icons">
      <a href="/show?id=<?php echo $id; ?>"><img class="user-profile-icon" src="/icons/user-circle.svg" alt=""></a>
    </div>
    <div class="toggle-btn">
      <i class="fa-solid fa-bars fa-lg"></i>
    </div>
    <div class="dropdown-menu">
      <li><a class="active" href="/main">Home</a></li>
      <li><a href="about">About</a></li>
      <li><a href="contact">Contact</a></li>
      <li><a href="new item">Add Product</a></li>
    </div>
  </section>

  <!-- ....................................Here starts hero section........................................ -->

  <section id="hero">
    <div class="hero">
      <h4>ONLINE THRIFT SHOPPING WITH MEANING</h4>
      <h1>Bid Smart, Save Big.</h1>
      <h4>EVERY PURCHASE SUPPORTS THE NEXTBID MISSION</h4>
    </div>
  </section>

  <!-- ....................................Here starts Brands Section........................................ -->



  <!-- ....................................Here starts Current Goods........................................ -->

  <div class="current-goods">
    <h2>Featured Products</h2>
    <p>Find your next piece of the action</p>
  </div>

  <!-- ....................................Here starts products section........................................ -->
  <div class="search__results"></div>

  <?php
  if (empty($data['data'])) {
    echo "<div class='centered-message'>Nothing has been posted yet</div>";
  } else {
  ?>
    <section class="card-content">
      <div class="wrapper cards">
        <?php foreach ($data['data'] as $row) {

        ?>
          <div class="card auction-card">
            <div class="auction-card-img">
              <a href="/showitem?item_name=<?php echo $row['item_name'] ?>"><img src="/images/<?php echo $row['item_photo'] ?>" alt="Product Image" width="300" height="300" style="background-color: #d4f8f4; "></a>
            </div>
            <div class="card-details">
              <div class="like-icon-num">
                <a class="like-button">
                  <i class="fa-regular fa-heart fa-lg like1-icon" style="color: #000000;"></i>
                  <i class="fa-solid fa-heart fa-lg" style="color: #f92a2a;"></i>
                </a>
                <span class="like-count">0</span>
              </div>
              <h3 class="card-title"><?php echo $row['item_name'] ?></h3>
              <div class="current-price-p">
                <div class="stroke"></div>
                <p class="card-text card-text-2">Your bid: <span class="current-price current-bid">$0</span></p>
                <p class="card-text">Last bid: <span class="current-price last-bid">$<?php echo $payment['bid_amount'] ?? $row['item_price'] ?></span></p>
                <p class="card-text">starting price: <span class="current-price last-bid">$<?php echo $row['item_price'] ?></span></p>
              </div>
              <p class="card-text-last card-text-1">Ends in: <span class="closing-time">2023-04-11T08:00:00Z</span></p>
              <div class="card-bid">
                <input type="number" class="bid-input" placeholder="Offer a price">
                <button onclick="bid(this.closest('.auction-card'))">Bid now</button></>
              </div>
              <p class="card-text-last card-text">Ends in:<span id="timer" class="countdown-timer"></span></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php } ?>


  <!-- ....................................Here starts intro section........................................ -->
  <section class="intro">
    <div class="intro-info">
      <h2>EVERYONE DESERVES THE OPPORTUNITY TO THRIVE</h2>
      <h4>Every purchase powers the Nextbid mission</h4>
    </div>
  </section>
  <!-- ....................................Here starts footer........................................ -->

  <?php
  require 'view/layer/mainFooter.php';
  ?>

  <!--*************************************Here starts js links***************************************-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="/js/script.js"></script>
  <script src="/js/bid.js"></script>
  <script src="/js/scroll.js"></script>
  <script src="/js/top-to-scroll.js"></script>
  <script src="/js/like-counter.js"></script>
  <script src="/js/toggle-btn.js"></script>
  <script src="js/search-filter.js"></script>

</body>

</html>