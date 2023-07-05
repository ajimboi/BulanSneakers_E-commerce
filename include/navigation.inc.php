<header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                        <h1> <a href="index.php"><span class="fa fa-bold" aria-hidden="true"></span>ulanSneakers</a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-2" class="toggle">Drop Down <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">More <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="about.html">About</a></li>
                            </ul>
                        </li>
                        <li class="cart"><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>

                        <?php if(empty($_SESSION['u_id'])) { ?>
                            <li><a href="authentication.php">Sign In/Sign Up</a></li>
                        <?php } else { ?>
                            <li><a href="dashboard/dashboard.php">Account</a></li>
                            <li><a href="functions/logout.func.php">Sign Out</a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->