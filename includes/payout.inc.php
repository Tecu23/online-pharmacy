<?php
    session_start();
    if(isset($_POST["checkout"])) {
        
        $adresa = $_POST["adresa-livrare"];
        $oras = $_POST['oras'];
        $judet = $_POST['judet'];
        $codPostal = $_POST['cod-postal'];
        $metodaPlata = $_POST['metoda-plata'];

        if($_GET['action'] == "pay"){
            $cantitate = $_GET["cantitate"];
            $pret = $_GET['pret'];
            $nume = $_GET['nume'];

        
        }

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        creeazaComanda($conn,$adresa,$oras,$judet,$codPostal,$_SESSION["userUid"]);

        updateProdus($conn,$nume,$cantitate);
       
        adaudaProduseComandate($conn,$_SESSION["userUid"],$nume,$cantitate);

        
        creeazaFactura($conn,$metodaPlata,$_SESSION["userUid"]);



        header("location: ../vitamine.php?succes=ComandaInregistrata");
        exit();







    }


    