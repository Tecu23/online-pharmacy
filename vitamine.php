<?php include_once 'header.php'; ?>

<?php 
    $nume = "Vitamine si Suplimente";

    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';

    if(isset($_POST["order-asc"]) || isset($_POST["order-desc"]) || isset($_POST["order-pret"])){
        if($_GET['action'] == "orderASC"){
            $result = getProductsASC($conn,$nume);
        }else if($_GET['action'] == "orderDSC"){
            $result = getProductsDSC($conn,$nume);
        }else if($_GET['action'] == "orderPRET"){
            $pret = $_POST['pret'];
            $result = getProductsPRET($conn,$nume,$pret);
        } 
            
        
    } else {
        $result = getProducts($conn,$nume);
    }
     ?>

    <div class="container">
        <div class="butoane">
            <form action = "vitamine.php?action=orderASC" method='post'>
                <button class= "button" type="submit" name="order-asc">Ordonati crescator dupa pret</button>
            </form>
            <form action = "vitamine.php?action=orderDSC" method='post'>
                <button class= "button" type="submit" name="order-desc">Ordonati descrescator dupa pret</button>
            </form>
            <form class="last-form" action = "vitamine.php?action=orderPRET" method='post'>
                <input class="input" type="number" name="pret" autocomplete="off">
                <button class= "button" type="submit" name="order-pret">Ordonati</button>
            </form>
        </div>
    <div class="container-vitamine">
<?php    
    while($row = mysqli_fetch_array($result)){
        echo "
        <div class='row'>
            <img class='imagine-produs' width='400' height='100' src='images/medicament.png'>
            <p class='nume'>"; echo $row[0]; echo "</p> 
            <p class='cantitate'>"; echo $row[1]; echo "</p>
            <p class='pret'>"; echo $row[2]; echo "</p>
            <h5>Introduceti cantitatea pe care o doriti sa o cumparati </h5>
        
            <form action='checkout.php?action=add&nume=$row[0]&pret=$row[2]' method ='post'>
                <input class='input' autocomplete='off' type='text' name='cantitate'>
                <button class='button' type='submit' name='add-to-cart'>ADD TO CART</button>
            </form>
        </div>
        ";
     } ?>




     </div>
     
    
     </div>






     <?php include_once 'footer.php'; ?>


