<?php include_once 'header.php'; ?>


<?php 
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
?>




<div class='container-statistici'>

    <div class="produse-vandute">
        <p>Cele mai vandute produse:</p>
        <?php 

            $result = getCeleMaiVanduteProduse($conn);

            While($row = mysqli_fetch_array($result)){
        
                echo " <div class='row'>
                <p>Nume: "; echo $row[1]; echo"</p>
                <p>Pret: "; echo $row[2]; echo"</p>
                <p>Comanda: "; echo $row[3]; echo"</p>
                </div>";
            }
        ?>

    </div>


    <div class="produse-vandute">
        <p>Cei mai buni clienti:</p>
        <?php 

            $result = getTopClienti($conn);

            While($row = mysqli_fetch_array($result)){
        
                echo " <div class='row'>
                <p>Nume: "; echo $row[0]; echo"</p>
                <p>Prenume: "; echo $row[1]; echo"</p>
                <p>Numar comenzi: "; echo $row[2]; echo"</p>
                </div>";
        
            }
        ?>

    </div>
</div>



<?php include_once 'footer.php'; ?>
