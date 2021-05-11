<?php
if(isset($_POST["submit"])){

    $numeProdus = $_POST["numeProdus"];
    $pret = $_POST["pret"];
    $cantitate = $_POST["cantitate"];
    $idFurnizor;
    $numeFurnizor = $_POST["numeFurnizor"];
    $idCategorie;
    $numeCategorie = $_POST["numeCategorie"];



    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyProdus($numeProdus,$pret,$cantitate,$numeFurnizor,$numeCategorie)){
        header("location: ../admin.php?error=emptyProdus");
        exit();
    }
    echo $numeCategorie;
    if(numeFurnizorExists($conn,$numeFurnizor) == false){
        echo"muie fraiere , e falsa";
        header("location: ../admin.php?error=acelFurnizorNuExista");
        exit();
    }
    if(categorieInexistenta($conn,$numeCategorie) == false){
        
        header("location: ../admin.php?error=aceaCategorieNuExista");
        exit();
    }

    $idFurnizor = returnFurnizor ($conn,$numeFurnizor);
    $idCategorie = returnCategorie ($conn,$numeCategorie);

    addProdus($conn,$numeProdus,$cantitate,$pret,$idCategorie,$idFurnizor);


}