<!doctype html>
<html lang="en" class="no-js"><head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Synergistics</title>

        <meta name="author" content="Synergistics" />
        <meta name="description" content="Synergistics" />
        <meta name="keywords"  content="Synergistics" />
        <meta name="Resource-type" content="Website" />

        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.fullPage.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/component.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/lightslider.css" />
        <!--[if IE]>
                <script type="text/javascript">
                         var console = { log: function() {} };
                </script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.fullPage.js"></script>    
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightslider.js"></script>    
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/navigation.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.formtowizard.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#fullpage').fullpage({
                    navigation: true,
                    scrollBar: true,
                    afterRender: function () {
                        new WOW().init();

                    },
                    responsiveWidth: 767,
                });
            });
        </script>

    </head>
    <body <?php if($this->uri->segment(1) == '') echo 'class="home"'; ?>>

        <div id="perspective" class="perspective effect-airbnb">
            <div class="menubox">
                <div class="wrapper">

                    <header <?php if($this->uri->segment(1) == '') echo 'class="home"'; ?>>
                        <div class="container">
                            <div class="Logo">
                                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.svg" alt="Logo" /></a>
                            </div>

                            <button id="showMenu"><i class="fa fa-navicon" aria-hidden="true"></i></button>

                            <div id="getQuote">
                                <div id="startproject" class="overlay">
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeProject()"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <div class="overlay-content">
                                        <div class="Logo">
                                            <a href="index.html"><img src="<?php echo base_url(); ?>assets/images/logo.svg" alt="Logo" /></a>
                                        </div> 
                                        <div class="clear"></div>

                                        <div class="StartFormBox">

                                            <div id="progress"><div id="progress-complete"></div></div>

                                            <form id="SignupForm" action="<?php echo base_url('project'); ?>" autocomplete="off" method="post" enctype="multipart/form-data">
                                                <fieldset>
                                                    <legend>Start a project </legend>
                                                    <p>Thanks for your interest in working with us. Please complete the details below and we’ll get back to you within one business day.</p>

                                                    <div class="form-group">
                                                        <label for="Name">What should we call you?</label>
                                                        <input id="Name" name="name" type="text" placeholder="Enter your Name" class="form-control" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="organisation">What is the name of your company / organization?</label>
                                                        <input id="Organization" name="organization" type="text" placeholder="E.g Synergistics" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Email">How shall we contact you?</label>
                                                        <div class="InlineBlock">
                                                            <input id="Email" name="email" type="email" placeholder="email@example.com" class="form-control" required />
                                                        </div>
                                                        <div class="InlineBlock">
                                                            <input id="Phone" name="phone" type="tel" placeholder="Phone" class="form-control" required />
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="second">
                                                    <legend>Start a project </legend>
                                                    <p>Nice to meet you, Select all that apply.</p>

                                                    <div class="selecbox">
                                                        <div class="box">
                                                            <input type="checkbox" name="web" id="web" value="web" />
                                                            <label for="web"></label>
                                                        </div>                                            
                                                        <span>Web</span>
                                                    </div>
                                                    <div class="selecbox">
                                                        <div class="box">
                                                            <input type="checkbox" name="mobile" id="mobile" value="mobile" />
                                                            <label for="mobile"></label>
                                                        </div>
                                                        <span>Mobile</span>
                                                    </div>
                                                    <div class="selecbox">
                                                        <div class="box">
                                                            <input type="checkbox" name="marketing" id="marketing" value="marketing" />
                                                            <label for="marketing"></label>
                                                        </div>
                                                        <span>Digital Marketing</span>
                                                    </div>
                                                    <div class="selecbox">
                                                        <div class="box">
                                                            <input type="checkbox" name="graphics" id="graphics" value="graphics" />
                                                            <label for="graphics"></label>
                                                        </div>
                                                        <span>Graphics (UI/UX)</span>
                                                    </div>

                                                    <input id="chkList" name="chkList" type="text" class="form-control" required placeholder="Selected points" style="visibility: hidden;" />
                                                    <div class="OtherCheckBox">
                                                        <div class="OtherProject">
                                                            <input type="checkbox" value="other" id="other_project" name="other_project" />
                                                            <label for="other_project"></label>
                                                        </div>
                                                        <span>Other Project</span>
                                                    </div>
                                                    <div class="clear"></div>

                                                </fieldset>

                                                <fieldset class="form-horizontal" role="form">
                                                    <legend>Tell us about the project</legend>
                                                    <p>Send us the details</p>

                                                    <div class="form-group message">
                                                        <label for="describe_project">Describe the project</label>
                                                        <textarea cols="0" rows="" name="description" required placeholder="Requirements, intentions, target audience, goals etc."></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="uploadBtn">Attach any relevant documents (optional)</label>

                                                        <div class="fileUpload">
                                                            <span class="custom-span"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                                                            <p class="custom-para">Max Size: 5MB</p>
                                                            <input id="uploadBtn" type="file" class="upload" name="attachment" />
                                                        </div>

                                                    </div>
                                                </fieldset>

                                                <button id="SaveAccount" type="submit" class="submit">Send</button>

                                            </form>
                                            <div class="FooterEmail">
                                                <a href="mailto:info@synergistics.ae">info@synergistics.ae</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="icon" onclick="openProject()">Start Project</span>
                            </div>  
                            <div class="clear"></div>
                        </div>
                    </header>