<?php
$pageTitle = 'NextBid-About Us';
require 'view/layer/mainHead.php';
?>

<body>

    <!-- ....................................Here starts navbar........................................ -->
    <?php
    $currentFile = basename($_SERVER['REQUEST_URI'], ".php"); 
    $currentPage = ($currentFile == "") ? "main" : $currentFile; 
    require 'view/layer/navbarSection.php';
    ?>
    <!-- ....................................Here starts about section........................................ -->

    <section id="our-story" class="about">
        <h2>OUR STORY</h2>
        <p class="about-info">NextBid was born from a shared vision between Uzziah Lukeka and Akbarali Nabiev. In 2022, while working 
           on a freelance project together, they realized the potential for a new kind of auction platform—one 
           that could leverage modern technology to create a more accessible, efficient, and transparent auction experience. 
           Combining Uzziah's expertise in backend development and Akbarali's flair for creative design, they set out to build 
           NextBid from the ground up.</p>
        <p class="about-info">Starting from a small garage in Uzziah's hometown, the duo faced numerous challenges, from securing funding 
           to developing a robust platform that could handle high traffic and transactions securely. Their determination 
           and complementary skills, however, saw them through these early hurdles. They launched the first version of NextBid 
           in late 2022, quickly gaining traction due to its user-friendly interface and innovative features.</p>
        <p class="about-info">Today, NextBid stands as a testament to their hard work and vision, connecting buyers and sellers from all 
           over the world and revolutionizing the way auctions are conducted. With a growing team and an ever-expanding 
           user base, Uzziah and Akbarali continue to drive NextBid forward, always looking for new ways to innovate and 
           improve the auction experience for everyone involved.</p>
    </section>

    <section id="new-section" class="about">
        <h2>OUR MISSION</h2>
        <h5 class="about-info">At NextBid, our mission is to revolutionize the auction industry by providing a seamless, 
           innovative, and user-friendly platform that connects buyers and sellers globally. 
           We strive to create a transparent and efficient auction experience, leveraging technology 
           to enhance accessibility and trust in the auction process.</h5>
    </section>

    <section id="about" class="about">
        <h2>MEET OUR TEAM</h2>
        <div class="about-column">
            <div class="about-wrapper">

                <div class="about-info">
                    <div class="person-image">
                        <img src="/images/the h.jpg" alt="">
                    </div>
                    <div class="person-info">
                        <h4>Uzziah Lukeka</h4>
                        <h6>FOUNDER & LEAD DEVELOPER</h6>
                        <p>Uzziah is Founder and Lead Developer of NextBid Auction.
                            With a year of experience in the IT industry,
                            he has established himself as a thought leader in the field, helping businesses
                            grow and succeed through innovative IT strategies.
                            For the last 1.5 year Uzziah has found his forte
                            creating websites backend, extranets and apps for international clients with a
                            heavy focus on public sector and private healthcare clients and working with teams

                        </p>
                    </div>
                </div>

                <div class="about-info ">
                    <div class="person-image">
                        <img src="/images/ali.jpg" alt="">
                    </div>
                    <div class="person-info">
                        <h4>Akbarali Nabiev</h4>
                        <h6>FOUNDER & CREATIVE DIRECTOR</h6>
                        <p>Ali is a co-founder of Mixd and a highly skilled visual
                            designer with an extensive background in service design for
                            online health services. He brings a freshness and clarity of
                            vision to everything he does with expertise in both visual design,
                            information design and user-centred design processes.
                        </p>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
    <!-- ....................................Here starts footer........................................ -->
    <?php
    require 'view/layer/mainFooter.php';
    ?>
    <!--*************************************Here starts js links***************************************-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/scroll.js"></script>
    <script src="/js/top-to-scroll.js"></script>
    <script src="/js/toggle-btn.js"></script>

</body>

</html>