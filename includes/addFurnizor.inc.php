<?php
if(isset($_POST["submit"])){

    $numeFurnizor = $_POST["numeFurnizor"];
    $adresa = $_POST["adresa"];
    $contact = $_POST["contact"];
   


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyFurnizor($numeFurnizor,$adresa,$contact)){
        header("location: ../admin.php?error=emptyInput");
        exit();
    }
    if(numeFurnizorExists($conn,$numeFurnizor)){
        header("location: ../admin.php?error=furnizorExistent");
        exit(1);
    }

    

    addFurnizor($conn,$numeFurnizor,$adresa,$contact);


} else {
    header("location: ../admin.php");
    exit();
}