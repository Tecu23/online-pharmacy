<?php include_once 'header.php'; ?>


<img class="wave" src="images/wave.png">

<div class="container-signup">

        <div class="img">
            <img src="images/loginbackground.svg">
        </div>

        <div class="signup-form">
    
            <form action="includes/signup.inc.php" method="post">

                <h2 class="title">Sign Up</h2>

                <div class="input-div focus">
                    <div class="i">
                        <i class="fa fa-user-circle""></i>
                    </div>
                    <div>
                        <h5>First Name</h5>
                        <input class="input" autocomplete="off" type="text" name="prenume" placeholder="">
                    </div>
                </div>
                

                <div class="input-div focus">
                    <div class="i">
                        <i class="fa fa-user-circle"></i>
                    </div>
                    <div>
                        <h5>Last Name</h5>
                        <input type="text" name="nume" class="input" autocomplete="off">
                    </div>
                </div>

                <div class="input-div focus">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input class="input" autocomplete="off" type="text" name="email" placeholder="">
                    </div>
                </div>

                <div class="input-div focus">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" autocomplete="off" type="text" name="uid" placeholder="">
                    </div>
                </div>

                <div class="input-div focus">
                    <div class="i">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h5>Phone </h5>
                        <input class="input" autocomplete="off" type="text" name="phone" placeholder="">
                    </div>
                </div>

                <div class="input-div focus">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" autocomplete="off" type="password" name="pwd" placeholder="">
                    </div>
                </div>

                <div class="input-div focus">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5> Repeat Password </h5>
                        <input class="input" autocomplete="off" type="password" name="pwdrepeat" placeholder="">
                    </div>
                </div>

                <a href="login.php">Already have an account? Log in Here</a>

                <button class="submit" type="submit" name="submit">Sign Up</button>     

                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo "<p class='errorsignup'>Fill in all fields!</p>";
                        }
                        else if($_GET["error"] == "invaliduid"){
                            echo "<p class='errorsignup'>Choose a proper username</p>";
                        }
                        else if($_GET["error"] == "invalidemail"){
                            echo "<p class='errorsignup'>Choose a proper email</p>";
                        }
                        else if($_GET["error"] == "usernametaken"){
                            echo "<p class='errorsignup'>Choose another username</p>";
                        }
                        else if($_GET["error"] == "passwordsdontmatch"){
                            echo "<p class='errorsignup'>Passwords don't match</p>";
                        }
                        else if($_GET["error"] == "stmtfailed"){
                            echo "<p class='errorsignup'>Something went wrong,try again</p>";
                        }
                        else {
                            echo "<p class='errorsignup'>Sign up succesfull</p>";
                        }
                    }
                ?>
            </form>
        </div>
    

</div>





<?php include_once 'footer.php'; ?>


