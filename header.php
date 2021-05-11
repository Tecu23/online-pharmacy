<?php
    session_start();
?>

<!DOCTYPE html>

<html lang = "en" dir = "ltr" >

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial scale=1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/headerstyle.css" /> 
        <link rel="stylesheet" href="styles/loginstyle.css" /> 
        <link rel="stylesheet" href="styles/sign-upstyle.css" />
        <link rel="stylesheet" href="styles/indexstyle.css" />
        <link rel="stylesheet" href="styles/profilestyle.css" />
        <link rel="stylesheet" href="styles/adminstyle.css" />
        <link rel="stylesheet" href="styles/vitaminstyle.css" />
        <link rel="stylesheet" href="styles/medicamentestyle.css" />
        <link rel="stylesheet" href="styles/ingrijirestyle.css" />
        <link rel="stylesheet" href="styles/dietastyle.css" />
        <link rel="stylesheet" href="styles/dispozitivestyle.css" />
        <link rel="stylesheet" href="styles/checkout-style.css" />
        <link rel="stylesheet" href="styles/statistici-style.css" />
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        
        <title> Tema BD </title>

    </head>


 
    <body>
        <div class=header></div>
            <div class="header-row">
                    <a class="logo" href="index.php"><img width="167" height="40"src="images/logo.png"></a>
                    
                <ul class="login-links">
                    <?php
                        if(isset($_SESSION["userUid"])){
                            echo "<li> <a href='admin.php'> Admin </a> </li>";
                            echo "<li> <a href='profile.php'> Profile </a> </li>";
                            echo "<li> <a href='includes/logout.inc.php'> Log out  </a> </li>";
                            echo "<li><a href='statistici.php'> Statistici site </a></li>";
                        }
                        else{
                            echo "<li><a href='statistici.php'> Statistici site </a></li>";
                            echo "<li> <a href='signup.php'> Signup </a> </li>";
                            echo "<li> <a href='login.php'> Login </a> </li>";
                        }
                    ?>
                </ul>
            </div>
            <nav>
                <ul class="nav-links">
                    <li> <a class="first" href="vitamine.php"> Vitamine si Suplimente </a> </li>
                    <li> <a href="medicamente.php"> Medicamente fara reteta </a> </li>
                    <li> <a href="ingrijire.php"> Ingrijire Personala </a> </li>
                    <li> <a href="dieta.php"> Dieta si Wellness </a> </li>
                    <li> <a class="last" href="dispozitive.php"> Dispozitive Medicale </a> </li>
                </ul> 
            </nav>
        </div>