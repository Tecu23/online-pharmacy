<?php


if(isset($_POST["submit"])){

    $username = $_POST["uid"];
    $parola = $_POST["pwd"];


require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if ( emptyInputLogin($username,$parola) !== false ) {

    header("location: ../login.php?error=emptyinput");
    exit();

}

loginUser($conn,$username,$parola);

}
else{

    header("location: ../login.php");
    exit();

}