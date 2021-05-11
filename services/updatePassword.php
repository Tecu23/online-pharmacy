<?php
session_start();
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

if(isset($_POST["update-password"])){


    $oldPassword = $_POST["old-password"];
    $newPassword = $_POST["new-password"];
    $repeatPassword = $_POST["repeat-password"];
    
    if(wrongPassword($conn,$oldPassword,$_SESSION["userUid"])){

        header("location: ../profile.php?error=AiGresitParola");
        exit();
    }
   
    if(pwdMatch($newPassword,$repeatPassword)){
        header("location: ../profile.php?error=ParolelelNuSePotrivesc");
        exit();
    }
    
    if(pwdMatch($newPassword,$oldPassword) == false){
       
        header("location: ../profile.php?error=ParolaNouaNuPoateFiCeaVeche");
        exit();
    }

    updatePassword($conn,$newPassword,$_SESSION["userUid"]);
}