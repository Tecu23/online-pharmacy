<?php include_once 'header.php'; ?>
<div class ="container-admin">
    <div class="add-produs">
        
        <form action="includes/addProdus.inc.php" method="post">
            <h1>Add Produs</h1>
                <h5>Nume Produs</h5>
                <input class="input" type="text" name="numeProdus" autocomplete="off">

                <h5>Cantitate Produs</h5>
                <input class="input" type="text" name="cantitate" autocomplete="off">

                <h5>Pret Produs</h5>
                <input class="input" type="text" name="pret" autocomplete="off">

                <h5>Nume Furnizor</h5>
                <input class="input" type="text" name="numeFurnizor" autocomplete="off">

                <h5>Nume Categorie</h5>
                <input class="input" type="text" name="numeCategorie" autocomplete="off">

                <button class="button" type="submit" name="submit">Adauga Produsul</button>
        </form>
    </div>


    <div class="add-furnizor">
        
        <form action="includes/addFurnizor.inc.php" method="post">
            <h1>Add Furnizor</h1>
                <h5>Nume Furnizor</h5>
                <input class="input" type="text" name="numeFurnizor" autocomplete="off">

                <h5>Adresa Furnizor</h5>
                <input class="input" type="text" name="adresa" autocomplete="off">

                <h5>Contact Furnizor</h5>
                <input class="input" type="text" name="contact" autocomplete="off">
                <button class="button" type="submit" name="submit">Adauga Furnizor</button>
            
        </form>
    </div>


    <div class="delete-outofstock">
    <?php

    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    $results = showOutOfStock($conn);
    echo "<h2> Produsele care sunt OUT of Stock</h2>";
    echo "<div class='products-outofstock'>";    

        while( $row = mysqli_fetch_array($results)){

                
            echo "
            <div class='row'>
                <img class='imagine-produs' width='400' height='100' src='images/logo.png'>
                <p class='numeProdus'>"; echo $row[0]; echo "</p> 
                <p class='numeFurnizor'>"; echo $row[1]; echo "</p>
                <p class='numeCategorie'>"; echo $row[2]; echo "</p>
            
            <form action='services/deleteProdus.php?action=delete&numeProdus=$row[0]' method ='post'>
                <button class='button' type='submit' name='delete'>Delete</button>
            </form>
            </div>";
        }
        echo "</div> "
    ?>
    </div>
    </div>
</div>




<?php include_once 'footer.php'; ?>