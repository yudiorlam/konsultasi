<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

<title>Chain App Dev - App Landing Page HTML5 Template</title>
<link href="{{ asset('/') }}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/templatemo-chain-app-dev.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/animated.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/owl.css">

</head>
<body>
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
            <span></span>
            <span></span>
            <span></span>
            </div>
        </div>
    </div>
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                <a href="index.html" class="logo">
                    <img src="assets/images/logo3.png" alt="Chain App Dev">
                </a>
                <ul class="nav">
                    {{-- <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                    <li class="scroll-to-section"><a href="#services">Services</a></li>
                    <li class="scroll-to-section"><a href="#about">About</a></li>
                    <li class="scroll-to-section"><a href="#pricing">Pricing</a></li>
                    <li class="scroll-to-section"><a href="#newsletter">Newsletter</a></li> --}}
                    <li><div class="gradient-button"><a id="modal_trigger" href="{{ url('/login') }}"><i class="fa fa-sign-in-alt"></i> Sign In Now</a></div></li> 
                </ul>        
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                </nav>
            </div>
            </div>
        </div>
    </header>

    <div id="modal" class="popupContainer" style="display:none;">
        <div class="popupHeader">
            <span class="header_title">Login</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </div>
    <section class="popupBody">
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
                    <span class="icon"><i class="fab fa-facebook"></i></span>
                    <span class="icon_title">Connect with Facebook</span>

                </a>

                <a href="#" class="social_box google">
                    <span class="icon"><i class="fab fa-google-plus"></i></span>
                    <span class="icon_title">Connect with Google</span>
                </a>
            </div>

            <div class="centeredText">
                <span>Or use your Email address</span>
            </div>
            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
            </div>
        </div>
    </div>
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
            <div class="row">
                <div class="col-lg-20">
                <h1 size="45">PERIKSA KI'</h1>
                <p>Peningkatan Peran Inspektorat Daerah Kabupaten Luwu Timur Melalui Layanan Konsultasi</p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
            <img src="assets/images/slider-dec.png" alt="">
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>

<div id="services" class="services section">
<div class="container">
    <div class="row">
    <div class="col-lg-3">
        <div class="service-item first-service">
        <div class="icon"></div>
        <h4>App Maintenance</h4>
        <p>You are not allowed to redistribute this template ZIP file on any other website.</p>
        <div class="text-button">
            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
        </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="service-item second-service">
        <div class="icon"></div>
        <h4>Rocket Speed of App</h4>
        <p>You are allowed to use the Chain App Dev HTML template. Feel free to modify or edit this layout.</p>
        <div class="text-button">
            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
        </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="service-item third-service">
        <div class="icon"></div>
        <h4>Multi Workflow Idea</h4>
        <p>If this template is beneficial for your work, please support us <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">a little via PayPal</a>. Thank you.</p>
        <div class="text-button">
            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
        </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="service-item fourth-service">
        <div class="icon"></div>
        <h4>24/7 Help &amp; Support</h4>
        <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
        <div class="text-button">
            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
        </div>
        </div>
    </div>
    </div>
</div>
</div>

<div id="clients" class="the-clients">
<div class="container">
    <div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="section-heading">
        <h4>Check What <em>The Clients Say</em> About Our App Dev</h4>
        <img src="assets/images/heading-line-dec.png" alt="">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut labore et dolore magna.</p>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="naccs">
        <div class="grid">
            <div class="row">
            <div class="col-lg-7 align-self-center">
                <div class="menu">
                <div class="first-thumb active">
                    <div class="thumb">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-12">
                        <h4>David Martino Co</h4>
                        <span class="date">30 November 2021</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                        <span class="category">Financial Apps</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="rating">4.8</span>
                        </div>
                    </div>
                    </div>
                </div>
                <div>
                    <div class="thumb">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-12">
                        <h4>Jake Harris Nyo</h4>
                        <span class="date">29 November 2021</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                        <span class="category">Digital Business</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="rating">4.5</span>
                        </div>
                    </div>
                    </div>
                </div>
                <div>
                    <div class="thumb">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-12">
                        <h4>May Catherina</h4>
                        <span class="date">27 November 2021</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                        <span class="category">Business &amp; Economics</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="rating">4.7</span>
                        </div>
                    </div>
                    </div>
                </div>
                <div>
                    <div class="thumb">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-12">
                        <h4>Random User</h4>
                        <span class="date">24 November 2021</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                        <span class="category">New App Ecosystem</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="rating">3.9</span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="last-thumb">
                    <div class="thumb">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-12">
                        <h4>Mark Amber Do</h4>
                        <span class="date">21 November 2021</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                        <span class="category">Web Development</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="rating">4.3</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div> 
            <div class="col-lg-5">
                <ul class="nacc">
                <li class="active">
                    <div>
                    <div class="thumb">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="client-content">
                            <img src="assets/images/quote.png" alt="">
                            <p>“Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                            </div>
                            <div class="down-content">
                            <img src="assets/images/client-image.jpg" alt="">
                            <div class="right-content">
                                <h4>David Martino</h4>
                                <span>CEO of David Company</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </li>
                <li>
                    <div>
                    <div class="thumb">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="client-content">
                            <img src="assets/images/quote.png" alt="">
                            <p>“CTO, Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                            </div>
                            <div class="down-content">
                            <img src="assets/images/client-image.jpg" alt="">
                            <div class="right-content">
                                <h4>Jake H. Nyo</h4>
                                <span>CTO of Digital Company</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </li>
                <li>
                    <div>
                    <div class="thumb">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="client-content">
                            <img src="assets/images/quote.png" alt="">
                            <p>“May, Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                            </div>
                            <div class="down-content">
                            <img src="assets/images/client-image.jpg" alt="">
                            <div class="right-content">
                                <h4>May C.</h4>
                                <span>Founder of Catherina Co.</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </li>
                <li>
                    <div>
                    <div class="thumb">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="client-content">
                            <img src="assets/images/quote.png" alt="">
                            <p>“Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                            </div>
                            <div class="down-content">
                            <img src="assets/images/client-image.jpg" alt="">
                            <div class="right-content">
                                <h4>Random Staff</h4>
                                <span>Manager, Digital Company</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </li>
                <li>
                    <div>
                    <div class="thumb">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="client-content">
                            <img src="assets/images/quote.png" alt="">
                            <p>“Mark, Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                            </div>
                            <div class="down-content">
                            <img src="assets/images/client-image.jpg" alt="">
                            <div class="right-content">
                                <h4>Mark Am</h4>
                                <span>CTO, Amber Do Company</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </li>
                </ul>
            </div>          
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<footer id="newsletter">
<div class="container">
    <div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="section-heading">
        <h4>Join our mailing list to receive the news &amp; latest trends</h4>
        </div>
    </div>
    <div class="col-lg-6 offset-lg-3">
        <form id="search" action="#" method="GET">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
            <fieldset>
                <input type="address" name="address" class="email" placeholder="Email Address..." autocomplete="on" required>
            </fieldset>
            </div>
            <div class="col-lg-6 col-sm-6">
            <fieldset>
                <button type="submit" class="main-button">Subscribe Now <i class="fa fa-angle-right"></i></button>
            </fieldset>
            </div>
        </div>
        </form>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-3">
        <div class="footer-widget">
        <h4>Contact Us</h4>
        <p>Rio de Janeiro - RJ, 22795-008, Brazil</p>
        <p><a href="#">010-020-0340</a></p>
        <p><a href="#">info@company.co</a></p>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="footer-widget">
        <h4>About Us</h4>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Pricing</a></li>
        </ul>
        <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Pricing</a></li>
        </ul>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="footer-widget">
        <h4>Useful Links</h4>
        <ul>
            <li><a href="#">Free Apps</a></li>
            <li><a href="#">App Engine</a></li>
            <li><a href="#">Programming</a></li>
            <li><a href="#">Development</a></li>
            <li><a href="#">App News</a></li>
        </ul>
        <ul>
            <li><a href="#">App Dev Team</a></li>
            <li><a href="#">Digital Web</a></li>
            <li><a href="#">Normal Apps</a></li>
        </ul>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="footer-widget">
        <h4>About Our Company</h4>
        <div class="logo">
            <img src="assets/images/white-logo.png" alt="">
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="copyright-text">
        <p>Copyright © 2022 Chain App Dev Company. All Rights Reserved. 
        <br>Design: <a href="https://templatemo.com/" target="_blank" title="css templates">TemplateMo</a></p>
        </div>
    </div>
    </div>
</div>
</footer>


<!-- Scripts -->
    <script src="{{ asset('/') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}assets/js/owl-carousel.js"></script>
    <script src="{{ asset('/') }}assets/js/animation.js"></script>
    <script src="{{ asset('/') }}assets/js/imagesloaded.js"></script>
    <script src="{{ asset('/') }}assets/js/popup.js"></script>
    <script src="{{ asset('/') }}assets/js/custom.js"></script>
</body>
</html>