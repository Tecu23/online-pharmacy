<?php

if (isset($_POST["submit"])){

    $nume = $_POST["nume"];
    $prenume = $_POST["prenume"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $telefon = $_POST["phone"];
    $parola = $_POST["pwd"];
    $parolaRepetata = $_POST["pwdrepeat"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if ( emptyInputSignup($nume,$prenume,$email,$username,$telefon,$parola,$parolaRepetata) !== false ) {

        header("location: ../signup.php?error=emptyinput");
        exit();

    }

    if ( invalidUid($username) !== false ) {

        header("location: ../signup.php?error=invaliduid");
        exit();

    }

    if ( invalidEmail($email) !== false ) {

        header("location: ../signup.php?error=invalidemail");
        exit();

    }

    if ( pwdMatch($parola,$parolaRepetata) !== false ) {

        header("location: ../signup.php?error=passwordsdontmatch");
        exit();

    }
    if ( uidExists($conn,$username,$email) !== false ) {

        header("location: ../signup.php?error=usernametaken");
        exit();

    }

    createUser($conn,$nume,$prenume,$email,$username,$telefon,$parola);



} 
else {
    header("location: ../signup.php");
    exit();
}