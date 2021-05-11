<?php
session_start();
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

if(isset($_POST["update-email"])){

    
    $oldEmail = $_POST["old-email"];
    $newEmail = $_POST["new-email"];
    $repeatEmail = $_POST["repeat-email"];
    
    if(wrongEmail($conn,$oldEmail)){

        header("location: ../profile.php?error=AiGresitEmailul");
        exit();
    }
   
    if(emailsDontMatch($newEmail,$repeatEmail)){
        header("location: ../profile.php?error=EmailurileNuSePotrivesc");
        exit();
    }
    
    if(emailsDontMatch($oldEmail,$newEmail) == false){
       
        header("location: ../profile.php?error=EmailulNouNuPoateFiCelVechi");
        exit();
    }

    updateEmail($conn,$newEmail,$_SESSION["userUid"]);
}