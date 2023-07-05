<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
    session_start();
    include("../db_connection/dbconn.php");
    
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>BulanSneakers Ecommerce Bootstrap Responsive Web Template | Blog :: W3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="BulanSneakers Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="../css/login.css">
    <!-- font-awesome-icons -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>

    <!-- mian-content -->
    <div class="main-banner inner" id="home">
        <!-- header -->
        <header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                        <h1> <a href="../index.php"><span class="fa fa-bold" aria-hidden="true"></span>ulanSneakers</a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../shop/shop.php">Shop</a></li>
                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-2" class="toggle">More <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">More <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul>
                                <li><a href="../contact.html">Contact</a></li>
                                <li><a href="../about.html">About</a></li>
                            </ul>
                        </li>
                        <li class="cart"><a href="../signup/login.php"><i class="fa fa-shopping-cart"></i></a></li>
                        <li class="active"><a href="../signup/login.php"><i class="far fa-user"></i></a></li>
                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->

    </div>
    <!--Login,Register Start-->
    <section id="page-acc">
    <div class="wrapper">
        <div class="title_text">
            <div class="title_login">My Account</div>
            <div class="title_login">Account Register</div>
        </div>
        <div class="form-container">
            <div class="slide-control">
                <input type="radio" name="slider" id="login" checked>
                <input type="radio" name="slider" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Sign up</label>
            <div class="slide-tab"></div>
            </div>
            <!-- LOGIN -->
            <div class="form-inner">
                <form action="log-in.php" method="post" class="login">
                    <div class="field">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    
                    <div class="field">
                        <input type="submit" value="Login" name="login">
                    </div>
                    <div class="signup-link">Not a member? <a href="#">Register</a></div>
                </form>
                <!-- LOGIN END -->
                <form action="signup.php" method="post" class="signup">
                <!-- REGISTER -->
                    <fieldset>
                        <div class="field">
                            <input type="text" placeholder="Name" name="name" id="name" required>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Phone Number" name="phoneno" id="phone" required>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Email Address" name="email" id="email" required>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Username" name="username" id="username" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Password" name="password" id="pass" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Confirm Password" name="password2" id="confirmpass" required>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Address" name="address" id="address" required>
                        </div>
                        <div class="field">
                            <select name="gender" id="gender">
                                <option value="choose" >Choose Gender</option>
                                <option value="Male" id="male">Male</option>
                                <option value="Female" id="female">Female</option>
                            </select>
                        </div>
                        <div class="field">
                            <input type="submit" value="Sign up" name="register">
                        </div>
                        <!-- REGISTER END -->
                        <div class="login-link">I already have <a href="#">Account</a></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </section>
    <!--Login,Register End-->

    <!--Login,Register Javascript Start-->
    <script>
        const loginForm = document.querySelector("form.login");
        const signupForm = document.querySelector("form.signup");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const loginText = document.querySelector(".title_text .title_login");
        const signupText = document.querySelector(".title_text .title_signup");
        const signupLink = document.querySelector(".signup-link a");
        const loginLink = document.querySelector(".login-link a");
        signupBtn.onclick = (()=>{
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (()=>{
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (()=>{
            signupBtn.click();
            return false;
        });
        loginLink.onclick = (()=>{
            loginBtn.click();
            return false;
        });
    </script>
    <!--Login,Register Javascript End-->
    
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row footer-top">
                <div class="col-lg-4 footer-grid_section_w3layouts">
                    <h2 class="logo-2 mb-lg-4 mb-3">
                        <a href="index.php"><span class="fa fa-bold" aria-hidden="true"></span>ulanSneakers</a>
                    </h2>
                    <p>As an online selling sneakers, we sell an original sneakers with a good quality, putting you at the centre of it all. With BULANSNEAKERS, You Own Now.</p>
                    <h4 class="sub-con-fo ad-info my-4">Catch us on Social</h4>
                    <ul class="w3layouts_social_list list-unstyled">
                        <li>
                            <a href="#" class="w3pvt_facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="w3pvt_twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 footer-right">
                    <div class="w3layouts-news-letter">
                        <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Catch the News</h3>

                        <p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
                        <form action="#" method="post" class="w3layouts-newsletter">
                            <input type="email" name="Email" placeholder="Enter your email..." required="">
                            <button class="btn1"><i class="far fa-paper-plane"></i></button>

                        </form>
                    </div>
                    <div class="row mt-lg-4 bottom-w3layouts-sec-nav mx-0">
                        <div class="col-md-4 footer-grid_section_w3layouts">
                            <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Information</h3>
                            <ul class="list-unstyled w3layouts-icons">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="mt-3">
                                    <a href="about.html">About Us</a>
                                </li>
                                <li class="mt-3">
                                    <a href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 footer-grid_section_w3layouts">
                            <!-- social icons -->
                            <div class="agileinfo_social_icons">
                                <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Customer Service</h3>
                                <ul class="list-unstyled w3layouts-icons">

                                    <li class="mt-3">
                                        <a href="#">Terms & Condition</a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#">Privacy Plolicy</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- social icons -->
                        </div>
                        <div class="col-md-4 footer-grid_section_w3layouts my-md-0 my-5">
                            <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Contact Info</h3>
                            <div class="contact-info">
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Phone</h4>
                                    <p>+601 0988 3907</p>
                                </div>
                                <div class="footer-address-inf my-4">
                                    <h4 class="ad-info mb-2">Email </h4>
                                    <p><a href="mailto:info@example.com">bulansneakers@gmail.com</a></p>
                                </div>
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Location</h4>
                                    <p>KLCC, Wilayah Persekutuan, 54200</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="cpy-right text-left row">
                        <p class="col-md-10">© 2019 BulanSneakers. All rights reserved | Design by
                            <a href="http://w3layouts.com"> W3layouts.</a>
                        </p>
                        <!-- move top icon -->
                        <a href="#home" class="move-top text-right col-md-2"><i class="fas fa-angle-up"></i></span></a>
                        <!-- //move top icon -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
</body>

</html>
