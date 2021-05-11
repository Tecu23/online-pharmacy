<?php include_once 'header.php'; ?>


<div class = "container-profile">

    <div class = "update-email">

            <form action="services/updateEmail.php" method="post">
                <h1>SCHIMBARE EMAIL</h1>
                <h5>Emailul Vechi</h5>
                <input class="input" type="email" name="old-email" autocomplete="off">
                <h5>Emailul Nou</h5>
                <input class="input" type="email" name="new-email" autocomplete="off">  
                <h5>Repetare Email</h5>
                <input class="input" type="email" name="repeat-email" autocomplete="off">          
            
                <button class="button" type="submit" name="update-email">Submit</button>      
            </form>

    </div>

    <div class = "update-password">

            <form action="services/updatePassword.php" method="post">
            
                <h1>Schimbare parola</h1>
                <h5>Parola Veche</h5>
                <input class="input" type="password" name="old-password" autocomplete="off">
                <h5>Parola Noua</h5>
                <input class="input" type="password" name="new-password" autocomplete="off">  
                <h5>Repetare Parola</h5>
                <input class="input" type="password" name="repeat-password" autocomplete="off">          
            
                <button class="button" type="submit" name="update-password">Submit</button>      
            </form>

    </div>

    <div class ="delete-account">
        <form action="services/deleteAccount.php" method ="post">
            <h1>Poti sa iti stergi contul apasand pe acest buton</h1>
            <button class="button" type="submit" name="delete-account">DELETE ACCOUNT</button>
        
        </form>
    </div>

<?php
    require_once 'includes/functions.inc.php';
    require_once 'includes/dbh.inc.php';
    $result = getComenzi($conn,$_SESSION["userUid"]);
    $row = mysqli_fetch_array($result); 
    echo "
    <div class='comenzi'>
        <h2>$row[0]  $row[1] a facut $row[2] comenzi.</h2>
    </div>
    ";
?>
</div>





<?php include_once 'footer.php'; ?>