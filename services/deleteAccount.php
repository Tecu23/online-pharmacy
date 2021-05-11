<?php
session_start();
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

if(isset($_POST["delete-account"])){

    $username = $_SESSION["userUid"];
    session_destroy();
    deleteAccount($conn,$username);


}