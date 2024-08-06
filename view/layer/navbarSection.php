<section id="header">
        <a href="/main"><img class="image" src="/icons/Nextbid.svg" alt=""></a>
        <div class="navbar-links">
        <ul class="navbar">
            <li><a class="<?php echo ($currentPage == 'home') ? 'active' : ''; ?>" href="/main">Home</a></li>
            <li><a class="<?php echo ($currentPage == 'about') ? 'active' : ''; ?>" href="/about">About</a></li>
            <li><a class="<?php echo ($currentPage == 'contact') ? 'active' : ''; ?>" href="/contact">Contact</a></li>
            <li><a class="<?php echo ($currentPage == 'newItem') ? 'active' : ''; ?>" href="/newItem">Add Product</a></li>
        </ul>
    </div>
        <div class="navbar-icons">
            <div class="search">
                <input type="text" class="search__input" placeholder="Search here">
            </div>
            <a href="cart.php"><img src="/icons/shopping.svg" alt=""></a>
            <a href="log out"> Log out </a>
        </div>
        <div class="toggle-btn">
            <i class="fa-solid fa-bars fa-lg"></i>
        </div>
        <div class="dropdown-menu">
            <li><a href="/main">Home</a></li>
            <li><a class="active" href="about">About</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="new item">Add Product</a></li>
        </div>
    </section>