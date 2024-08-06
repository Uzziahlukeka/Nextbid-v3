<?php
$pageTitle = 'NextBid-Contact';
require 'view/layer/mainHead.php';
?>

<body>

    <!-- ....................................Here starts navbar........................................ -->

    <?php
    $currentFile = basename($_SERVER['REQUEST_URI'], ".php"); 
    $currentPage = ($currentFile == "") ? "main" : $currentFile; 
    require 'view/layer/navbarSection.php';
    ?>

    <!-- ....................................Here starts contact section........................................ -->

    <section id="contact" class="about">
        <div class="container">
            <h2>Contact Us</h2>
            <form action="#" onsubmit="sendMessage(); return false;">
                <label class="one-label" for="name">Your Full Name*</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                <div class="form-name-email">
                    <div class="form-group">
                        <label class="one-label" for="email">Your Email*</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com" required>
                    </div>
                    <div class="form-group">
                        <label class="one-label" for="name">Phone Number*</label>
                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="+48 123 456 789">
                    </div>
                </div>
                <label class="one-label" for="subjet">Subject*</label>
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">

                <label class="one-label" for="button">Message*</label>
                <textarea name="message" class="form-control" id="message" rows="5" placeholder="Your message here.."></textarea>
                <input type="submit" class="btn" value="Send Request">
            </form>
        </div>
    </section>


    <!-- ....................................Here starts footer........................................ -->

    <?php
    require 'view/layer/mainFooter.php';
    ?>
    <!--*************************************Here starts js links***************************************-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/scroll.js"></script>
    <script src="/js/top-to-scroll.js"></script>
    <script src="/js/toggle-btn.js"></script>
    <script src="/js/contact.js"></script>

</body>

</html>