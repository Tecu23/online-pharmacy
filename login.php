<?php include_once 'header.php'; ?>


<img class="wave" src="images/wave.png">

<div class="container-login">
        
        <div class="img">
            <img src="images/loginbackground.svg">
        </div>

        <div class="login-form">
            
            <form action="includes/login.inc.php" method="post">

                <h2 class="title">Log in</h2>
                <div class="input-div one focus">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username Or Email</h5>
                        <input class="input" type="text" name="uid" autocomplete="off" placeholder="">
                    </div>
                </div>

 
                <div class="input-div pass focus">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" name="pwd" autocomplete="off" placeholder="">
                    </div>
                </div>   

                <a href="signup.php">New here? Register Here</a>

                <button class="submit" type="submit" name="submit">Log in</button>

                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo "<p class='errorlogin'>Fill in all fields!</p>";
                        }
                        else if($_GET["error"] == "wrongloginusername/email"){
                            echo "<p class='errorlogin'>>Incorrent username/email</p>";
                        }
                        else if($_GET["error"] == "wrongpassword"){
                            echo "<p class='errorlogin'>>Incorrent password</p>";
                        }
                        else {
                            echo "<p class='errorlogin'>>Log in succesfull</p>";
                        }
                    }
                ?>
            </form>
        
        </div>
        
</div>

<script type="text/javascript" src="js/login.js">



<?php include_once 'footer.php'; ?>


