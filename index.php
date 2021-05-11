<?php include_once 'header.php'; ?>



<div class="container-index">


<?php 

    if(isset($_SESSION["userUid"])){
        echo "<p class='welcome'>Hello there "  . $_SESSION["userUid"] . "!</p>";
        echo"<p>Apasa pe una dintre categorii pentru a incepe shopingul</p>";
        echo"<img src='images/med.jpg'>";
        echo"<img src='images/Doctori.jpg'>";
    } 
    else{
        echo"<p class='notwelcome'>Nu esti conectat inca. Apasa pe butonul de log in ca sa te conectezi la 
        contul tau sau pe butonul de Sign Up pentru a-ti crea un cont</p>";
        echo "<a  href='login.php'  class='submit' type='submit' name='submit'>Log in</a>";
        echo "<a  href='signup.php' class='submit' type='submit' name='submit'>Sign Up</a>";
    }

?>






</div>





<?php include_once 'footer.php'; ?>


