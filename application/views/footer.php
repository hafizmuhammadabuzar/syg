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
        <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
        <li><a href="<?php echo base_url('work'); ?>">Work</a></li>
        <li class="dropdown">
            <a href="javascript:void(0);"><button onclick="myFunction()" class="dropbtn">Services <i class="fa fa-angle-double-down" aria-hidden="true"></i></button></a>
            <div id="myDropdown" class="dropdown-content">
                <div class="dropdown">
                    <a class="LeftAlign" href="<?php echo base_url('mob-app-development'); ?>">Mobile App Development</a>
                    <button onclick="myFunctionSecond()" class="dropbtn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                    <div id="myDropdownSecond" class="dropdown-content">
                        <ul>
                            <li><a href="<?php echo base_url('ios-application'); ?>">IOS Application</a></li>
                            <li><a href="<?php echo base_url('android-application'); ?>">Android Application</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="LeftAlign" href="<?php echo base_url('web-development'); ?>">Web Development</a><button onclick="myFunctionThird()" class="dropbtn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                    <div id="myDropdownThird" class="dropdown-content">
                        <ul>
                            <li><a href="<?php echo base_url('custom-website'); ?>">Custom Website</a></li>
                            <li><a href="<?php echo base_url('wordpress-website'); ?>">Wordpress Website</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="LeftAlign" href="<?php echo base_url('graphics'); ?>">Graphincs (UI/UX)</a><button onclick="myFunctionFour()" class="dropbtn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                    <div id="myDropdownFour" class="dropdown-content">
                        <ul>
                            <li><a href="<?php echo base_url('app-design'); ?>">App Design</a></li>
                            <li><a href="<?php echo base_url('company-branding'); ?>">Company Branding</a></li>
                            <li><a href="<?php echo base_url('web-design'); ?>">Web Design</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="LeftAlign" href="<?php echo base_url('digital-marketing'); ?>">Digital Marketing </a><button onclick="myFunctionFive()" class="dropbtn"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                    <div id="myDropdownFive" class="dropdown-content">
                        <ul>
                            <li><a href="<?php echo base_url('seo'); ?>">SEO</a></li>
                            <li><a href="<?php echo base_url('social-media-marketing'); ?>">Social Media Marketing</a></li>
                            <li><a href="<?php echo base_url('pay-per-click'); ?>">Pay Per Click</a></li>
                            <li><a href="<?php echo base_url('content-optimization'); ?>">Content Optimization</a></li>
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