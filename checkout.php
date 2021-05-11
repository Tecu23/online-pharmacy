<?php include_once 'header.php'; ?>


<?php
    
    if(isset($_POST["add-to-cart"])) {
        
        $cantitate = $_POST["cantitate"];

        if($_GET['action'] == "add"){
            $pret = $_GET['pret'];
            $nume = $_GET['nume'];

        
        }
    }
    echo"<div class='container-checkout'>";
    echo "<p class='comanda'>Comanda ta este urmatoarea:  "; echo $cantitate; 
    echo " bucati de ";  echo $nume; 
    echo" la pretul de "; echo $pret; echo" pe bucata  </p>";
?>

<div class="form-checkout">


    <h1>Completeaza urmatorul formular cu datele de livrare</h1>
    <?php echo"<form action='includes/payout.inc.php?action=pay&nume=$nume&pret=$pret&cantitate=$cantitate' method='post'>";?>

        <h5>Adresa de livrare</h5>
        <input class="input adresa-livrare" type="text" name="adresa-livrare">
        <h5>Oras</h5>
        <input class="input oras" type="text" name="oras">
        <h5>Judet</h5>
        <input class="input judet" type="text" name="judet">
        <h5>Cod postal</h5>
        <input class="input cod-postal" type="number"name="cod-postal">
        <h5>Metoda de plata</h5>
        <input class="input metoda-plata" type="text"name="metoda-plata">
        <button class="button" type="submit" name="checkout">CHECKOUT</button>


    </form>
</div>

</div>



<?php include_once 'footer.php'; ?>