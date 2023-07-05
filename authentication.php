<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<?php 
    $page = "Authentication";
    include('include/header.inc.php');
?>
<body>

    <!-- mian-content -->
    <div class="main-banner inner" id="home">
        <!-- header -->
        <?php include('include/navigation.inc.php')?>
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
                <form action="functions/login.func.php" method="POST" class="login">
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
                <form action="functions/register.func.php" method="POST" class="signup">
                <!-- REGISTER -->
                    <fieldset>
                        <div class="field">
                            <input type="text" placeholder="Name" name="name" id="name" required>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Phone Number" name="number" id="phone" required>
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
                            <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpass" required>
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
    <?php include('include/footer.inc.php')?>
    <!-- //footer -->
</body>

</html>
