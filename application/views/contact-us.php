
<main id="main">
    <section class="MobAppDevel Contact">
        <div class="container">
            <h1>Contact Us</h1>
        </div>
    </section>
    <section id="map">
        <div class="map-hover"></div>
        <div class="map-close">
            <a href="#"></a>
        </div>
        <div id="map-holder"></div>
    </section>

    <section id="MainContactBox">
        <div class="container">
            <span class="iconBorder"><img src="<?php echo base_url(); ?>assets/images/img-border.png" alt="Border" /></span>

            <div class="AddressBox">
                <span><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:hr@synergistics.ae">hr@synergistics.ae</a></span>
                <span><i class="fa fa-inbox" aria-hidden="true"></i> <a href="mailto:hr@synergistics.ae">hr@synergistics.ae</a></span>
                <span><i class="fa fa-map-marker" aria-hidden="true"></i> P.O.Box. 51999,<br>
                    Dubai, United Arab Emirates.</span>
            </div>
            <?php 
            echo $this->session->userdata('msg'); $this->session->unset_userdata('msg'); 
            echo validation_errors(); 
            ?>
            <div class="ContactForm">
                <form action="<?php echo base_url('contact-us'); ?>" method="post">
                    <input type="text" placeholder="Your Name" name="name" required="required" />
                    <input type="email" placeholder="Your Email" name="email" required="required" />
                    <textarea cols="" rows="" placeholder="Your Message" name="message" required="required"></textarea>
                    <input type="submit" value="SEND" name="submit" />
                </form>
            </div>
            <div class="Socialicons">
                <a href="https://twitter.com/synergisticsae" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/synergisticsae" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://instagram.com/synergisticsae/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/company/synergistics-ae" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>

    <?php include 'our-applications.php'; ?>
    
</main>  


