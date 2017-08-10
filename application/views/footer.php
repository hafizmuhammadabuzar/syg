<footer <?php if ($this->uri->segment(1) == '') echo 'class="home"'; ?>>
    <div class="container">
        &copy; All Rights Reserved
        <div class="socialLinks">
            <a href="https://www.facebook.com/synergisticsae" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href="https://twitter.com/synergisticsae" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            <a href="https://instagram.com/synergisticsae/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/company/synergistics-ae" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        </div>
        <a href="#" class="back-to-top">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </a>
    </div>
</footer>
</div>
</div>
<nav class="outer-nav left vertical">
    <ul>
        <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
        <li><a href="about-us.html">About</a></li>
        <li><a href="work.html">Work</a></li>
        <li class="dropdown">
            <a href="javascript:void(0);"><button onclick="myFunction()" class="dropbtn">Services <i class="fa fa-angle-double-down" aria-hidden="true"></i></button></a>
            <div id="myDropdown" class="dropdown-content">
                <div class="dropdown">
                    <a class="LeftAlign" href="mob-app-development.html">Mobile App Development</a>
                    <button onclick="myFunctionSecond()" class="dropbtn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                    <div id="myDropdownSecond" class="dropdown-content">
                        <ul>
                            <li><a href="ios-development.html">IOS Application</a></li>
                            <li><a href="android-development.html">Android Application</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="LeftAlign" href="web-development.html">Web Development</a><button onclick="myFunctionThird()" class="dropbtn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                    <div id="myDropdownThird" class="dropdown-content">
                        <ul>
                            <li><a href="custom-website.html">Custom Website</a></li>
                            <li><a href="wordpress-website.html">Wordpress Website</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="LeftAlign" href="graphics.html">Graphincs (UI/UX)</a><button onclick="myFunctionFour()" class="dropbtn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                    <div id="myDropdownFour" class="dropdown-content">
                        <ul>
                            <li><a href="app-design.html">App Design</a></li>
                            <li><a href="company-branding.html">Company Branding</a></li>
                            <li><a href="web-design.html">Web Design</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="LeftAlign" href="digital-marketing.html">Digital Marketing </a><button onclick="myFunctionFive()" class="dropbtn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                    <div id="myDropdownFive" class="dropdown-content">
                        <ul>
                            <li><a href="seo.html">SEO</a></li>
                            <li><a href="social-media-marketing.html">Social Media Marketing</a></li>
                            <li><a href="pay-per-click.html">Pay Per Click</a></li>
                            <li><a href="content-optimization.html">Content Optimization</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
        <li><a href="<?php echo base_url('contact-us'); ?>">Contact</a></li>
    </ul>
</nav>
</div>

<script type="text/javascript">

    $('.arrow').click(function () {
        $.fn.fullpage.moveSectionDown();
    });
</script>

<script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/menu.js"></script>
<script src="<?php echo base_url(); ?>assets/js/TweenLite.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/EasePack.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo-1.js"></script>
</body>
</html>