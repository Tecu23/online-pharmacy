<?php

require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

if(isset($_POST["delete"])){
    if($_GET['action'] == "delete"){
        $numeProdus = $_GET['numeProdus'];


        deleteProdus($conn,$numeProdus);
    }
}