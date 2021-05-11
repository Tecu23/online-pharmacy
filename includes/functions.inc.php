<?php

function emptyInputSignup($nume,$prenume,$email,$username,$telefon,$parola,$parolaRepetata){

    $result;
    if(empty($nume) || empty($prenume) || empty($email) || empty($username) || empty($telefon) || empty($parola) || empty($parolaRepetata)){
        $result = true;
    }
    else{
        $result = false;
    }


    return $result;
}

function invalidUid($username){

    $result;
    if ( !preg_match("/^[a-zA-z0-9]*$/", $username )) {
        $result = true;
    }
    else {
        $result = false;
    }


    return $result;
}

function invalidEmail($email){

    $result;
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }


    return $result;
}

function pwdMatch($parola,$parolaRepetata){

    $result;
    if ( $parola !== $parolaRepetata ) {
        $result = true;
    }
    else {
        $result = false;
    }


    return $result;
}

function uidExists($conn,$username,$email){

    $sql = "SELECT * FROM client WHERE usernameClient = ? OR emailClient = ?;";
    
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){

        return $row;

    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
    
}

function createUser($conn,$nume,$prenume,$email,$username,$telefon,$parola){

    $sql = "INSERT INTO client (numeClient,prenumeClient,telefonClient,emailClient,usernameClient,parolaClient) VALUES (?,?,?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($parola,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssssss",$nume,$prenume,$telefon,$email,$username,$hashedPwd);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);


    $uidExists = uidExists($conn,$username,$username);



    session_start();
    $_SESSION["userId"] = $uidExists["idClient"]; 
    $_SESSION["userUid"] = $uidExists["usernameClient"];
    header("location: ../index.php");
    exit();
    
}

function emptyInputLogin($username,$parola) { 

    $result;
     
     if ( empty($username) || empty($parola)) {
        $result = true;
    }
    else{
        $result = false;
    }

     return $result;
}
function loginUser($conn,$username,$parola){

    $uidExists = uidExists($conn,$username,$username);


    if($uidExists === false){

        header("location: ../login.php?error=wrongloginusername/email");
        exit();

    }

    $pwdHashed = $uidExists[parolaClient];

    $checkPwd = password_verify($parola,$pwdHashed);

    if($checkPwd === false){

        header("location: ../login.php?error=wrongpassword");
        exit();

    }
    else if($checkPwd === true) {

        session_start();
        $_SESSION["userId"] = $uidExists["idClient"]; 
        $_SESSION["userUid"] = $uidExists["usernameClient"];
        header("location: ../index.php");
        exit();

    }
    
}
function addProdus($conn,$numeProdus,$cantitate,$pret,$idCategorie,$idFurnizor){

    $sql = "INSERT INTO produse (numeProdus,cantitateProdus,pretProdus,Categorie_idCategorie,Furnizor_idFurnizor) VALUES (?,?,?,?,?); ";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){

        header("location: ../admin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssss",$numeProdus,$cantitate,$pret,$idCategorie,$idFurnizor);

    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location: ../admin.php?succes=produsAddedSuccesfull");
    exit();

}
function returnFurnizor ($conn,$numeFurnizor){


    $query = "SELECT idFurnizor
              FROM furnizor
              WHERE numeFurnizor = '$numeFurnizor';";
     
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    return  $row[0];

}

function returnCategorie ($conn,$numeCategorie){


    $query = "SELECT idCategorie
              FROM categorie
              WHERE numeCategorie = '$numeCategorie';";
     
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    return  $row[0];

}
function categorieInexistenta($conn,$numeCategorie){
    $sql = "SELECT * FROM categorie
            WHERE numeCategorie = '$numeCategorie';";

    $result = mysqli_query($conn,$sql);

    if($row = mysqli_fetch_assoc($result)){

        return $row;
    }
    else{
        $result = false;
        return $result;
    }
}
function addFurnizor($conn,$numeFurnizor,$adresa,$contact){

    $sql = "INSERT INTO furnizor (numeFurnizor,adresaFurnizor,contactFurnizor) VALUES (?,?,?); ";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){

        header("location: ../admin.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"sss",$numeFurnizor,$adresa,$contact);

    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);

    header("location: ../admin.php?succes=FurnizorAddSuccesfull");
    exit();

}
function emptyFurnizor($numeFurnizor,$adresa,$contact){
    $result;
    if(empty($numeFurnizor) || empty($adresa) || empty($contact)){
        $result = true;
    } else {
        $result = false;
    }

    return $result;

}
function numeFurnizorExists($conn,$numeFurnizor){

    $sql = "SELECT * FROM furnizor WHERE numeFurnizor = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$numeFurnizor);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){

        return $row;

    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function emptyProdus($numeProdus,$pret,$cantitate,$numeFurnizor,$numeCategorie){

    $result;
    if(empty($numeProdus) || empty($pret) || empty($cantitate) || empty($numeFurnizor) || empty($numeCategorie)){
        $result = true;
    }else{
        $result = false;
    }
}

function getProducts($conn,$numeCategorie){

    $query = "SELECT numeProdus,cantitateProdus,pretProdus 
              FROM produse p
              LEFT JOIN categorie c ON p.Categorie_idCategorie = c.idCategorie
              WHERE c.numeCategorie = '$numeCategorie';";

    $result = mysqli_query($conn,$query);

    return $result;

}
function creeazaComanda($conn,$adresa,$oras,$judet,$codPostal,$nume){

    $sql1 = "SELECT idClient FROM client
             WHERE usernameClient = '$nume';";

    $result = mysqli_query($conn,$sql1);

    $row = mysqli_fetch_array($result);

    $sql2 = "INSERT INTO comanda (adresaLivrare,oras,judet,codPostal,Client_idClient) VALUES(?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql2)){

        header("location: ../admin.php?error=stmtfailed");
        exit(1);
    }

    mysqli_stmt_bind_param($stmt,"sssss",$adresa,$oras,$judet,$codPostal,$row[0]);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

}

function updateProdus($conn,$nume,$cantitate){

    $sql = "UPDATE produse p
            SET p.cantitateProdus = p.cantitateProdus - '$cantitate'
            WHERE p.numeProdus = '$nume' ;";

    mysqli_query($conn,$sql);    
    
}
function adaudaProduseComandate($conn,$username,$nume,$cantitate){

    $sql1 = "SELECT idProduse FROM produse
             WHERE numeProdus = '$nume';";

    $result1 = mysqli_query($conn,$sql1);
    $idProdus = mysqli_fetch_array($result1);

    
    $sql2 = "SELECT MAX(c.idComanda) FROM comanda c
             LEFT JOIN client ci ON ci.idClient = c.Client_idClient
             WHERE ci.usernameClient = '$username';";

    $result2 = mysqli_query($conn,$sql2);
    $idComanda = mysqli_fetch_array($result2);


    $sql3 = "INSERT INTO `produse comandate` (`Comanda_idComanda`, `Produse_idProduse`, `cantitateComandata`) VALUES ('$idComanda[0]', '$idProdus[0]', '$cantitate');";

    mysqli_query($conn,$sql3);

   
}
function showOutOfStock($conn){

    $sql = "SELECT p.numeProdus,f.numeFurnizor,c.numeCategorie 
            FROM produse p 
            LEFT JOIN furnizor f ON p.Furnizor_idFurnizor = f.idFurnizor
            LEFT JOIN categorie c ON p.Categorie_idCategorie = c.idCategorie
            WHERE p.cantitateProdus = 0;";

    $result = mysqli_query($conn,$sql);

    return $result;
}
function deleteProdus($conn,$numeProdus){

    $sql1 = "SELECT idProduse FROM produse 
             WHERE numeProdus='$numeProdus';";

    $result1 = mysqli_query($conn,$sql1);

    $row = mysqli_fetch_array($result1);

    $sql2 = "DELETE FROM `produse comandate` 
             WHERE Produse_idProduse = '$row[0]';";

    mysqli_query($conn,$sql2);

    $sql = "DELETE FROM produse WHERE idProduse='$row[0]';";

    mysqli_query($conn,$sql);

    header("location: ../admin.php?succes=deleteSuccesfull");
}
function wrongEmail($conn,$oldEmail){

    $sql = "SELECT * FROM client 
            WHERE emailClient = '$oldEmail';";

    $result = mysqli_query($conn,$sql);


    if( $row = mysqli_fetch_array($result)){

        echo $row[0];
        echo $row[1];
        
        return false;
    } else {
        return true;
    }
}
function emailsDontMatch($newEmail,$repeatEmail){
    if($newEmail !== $repeatEmail){
        return true;
    } else {
        return false;
    }
}
function updateEmail($conn,$newEmail,$username){

    $sql = "UPDATE client c
            SET c.emailClient = '$newEmail'
            WHERE c.usernameClient = '$username' ;";

    mysqli_query($conn,$sql);

    header("location: ../profile.php?succes=emailChanged");
    exit();
}
function wrongPassword($conn,$oldPassword,$username){


    $sql = "SELECT parolaClient FROM client 
            WHERE usernameClient = '$username';";

    
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    if(password_verify($oldPassword,$row[0])){
        return false;
    } else {
        return true;
    }

}
function updatePassword($conn,$newPassword,$username){

    $hashedPwd = password_hash($newPassword,PASSWORD_DEFAULT);

    $sql = "UPDATE client c
            SET c.parolaClient = '$hashedPwd'
            WHERE c.usernameClient = '$username' ;";

    mysqli_query($conn,$sql);

    header("location: ../profile.php?succes=passwordChanged");
    exit();
}

function deleteAccount($conn,$username){

    $sql1 = "SELECT idClient FROM client
             WHERE usernameClient = '$username';";

    $result = mysqli_query($conn,$sql1);

    $row = mysqli_fetch_array($result);

    $idClient = $row[0];

    $sql2 = "DELETE FROM comanda 
             WHERE Client_idClient = '$idClient';";

    mysqli_query($conn,$sql2);

    $sql3 = "DELETE FROM client
             WHERE idClient = '$idClient';";

    mysqli_query($conn,$sql3);

    header("location: ../profile.php?succes=accountDeleted");
    exit();
}
function creeazaFactura($conn,$metodaPlata,$username){


    $sql1 = "SELECT MAX(c.idComanda) FROM comanda c
             LEFT JOIN client ci ON ci.idClient = c.Client_idClient
             WHERE ci.usernameClient = '$username';";

    $result1 = mysqli_query($conn,$sql1);
    $idComanda = mysqli_fetch_array($result1);

    $dataFacturare = date("Y-m-d");

    $dataLivrare = date('Y-m-d', strtotime($dataFacturare. ' + 2 days'));

    echo $dataFacturare;
    echo "<br>";
    echo $dataLivrare;
    echo "<br>";
    echo $idComanda[0];
    echo "<br>";
    echo $metodaPlata;

    $sql2 = "INSERT INTO `factura` (`dataLivrare`, `metodaPlata`, `dataFacturare`, `Comanda_idComanda`) VALUES ('$dataLivrare', '$metodaPlata', '$dataFacturare', '$idComanda[0]');";

    mysqli_query($conn,$sql2);


}
function getProductsASC($conn,$nume){
    $sql = "SELECT numeProdus,cantitateProdus,pretProdus 
            FROM produse p
            LEFT JOIN categorie c ON p.Categorie_idCategorie = c.idCategorie
            WHERE c.numeCategorie = '$nume'
            ORDER BY p.pretProdus ASC;";

    $result = mysqli_query($conn,$sql);
    return $result;
}

function getProductsDSC($conn,$nume){
    $sql = "SELECT numeProdus,cantitateProdus,pretProdus 
            FROM produse p
            LEFT JOIN categorie c ON p.Categorie_idCategorie = c.idCategorie
            WHERE c.numeCategorie = '$nume'
            ORDER BY p.pretProdus DESC;";

    $result = mysqli_query($conn,$sql);
    return $result;
}
function getProductsPRET($conn,$nume,$pret){
    $sql = "SELECT numeProdus,cantitateProdus,pretProdus 
        FROM produse p
        LEFT JOIN categorie c ON p.Categorie_idCategorie = c.idCategorie
        WHERE c.numeCategorie = '$nume' && p.pretProdus < '$pret';";

    $result = mysqli_query($conn,$sql);
    return $result;
}
function getComenzi($conn,$username){
    $sql ="SELECT numeClient, prenumeClient ,o.Number
        FROM client 
        INNER JOIN (Select Client_idClient, count(*) as Number from comanda Group by Client_idClient order by Number desc limit 5)AS o
        on client.idClient = o.Client_idClient 
        WHERE client.usernameClient = '$username';";
    $result = mysqli_query($conn,$sql);
    return $result;

}
function getCeleMaiVanduteProduse($conn){
    $sql ="SELECT p.idProduse,p.numeProdus,p.pretProdus,Comanda FROM produse p
           LEFT JOIN (select Produse_idProduse, sum(cantitateComandata) AS Comanda
           from `produse comandate` group by Produse_idProduse) t ON t.Produse_idProduse = p.idProduse
           order by Comanda DESC
           LIMIT 3;";

    $result = mysqli_query($conn,$sql);

    return $result;
}
function getTopClienti($conn){
    $sql = "SELECT numeClient, prenumeClient ,o.Number FROM client 
            INNER JOIN (Select Client_idClient, count(*) as Number from comanda Group by Client_idClient order by Number desc limit 5)AS o
            on client.idClient = o.Client_idClient 
            ORDER BY o.Number DESC
            LIMIT 3;";
    $result = mysqli_query($conn,$sql);
    return $result;
}
 


