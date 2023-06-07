<?php 
session_start();

require_once("database.php");

 // Connect to DB
$connection = new database();

// Check connection
if ($connection->check_connection) {
    // Save product from database in $product
    $product = $connection->select("products", "PID = '{$_GET['id']}'")[0];

    // Turn product PPic into array 
    $product['PPic'] = explode(" ", $product['PPic']);

    // Array to store images
    $productImage = [];
    // Loop 3 times 
    for ($i=0; $i < 3; $i++) { 
        // Check if array is empty if true use default image
        if ($product['PPic'][$i] == null) { 
            $productImage[$i] = "imagecomingsoon.png";
        }else{
            // Use current image 
            $productImage[$i] = $product['PPic'][$i];
        }
    }
}else{
    echo "<script>alert('Connection Error');</script>"; // TEMP Error message
    // TODO Display connection error message
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Vis produkt</title>
</head>
<body class="light">
    
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <main>
            <h1><?php echo $product['PName']?></h1>
            <div class="showProduct">
                <section class="leftColumn">
                    <div>
                        <div>
                            <img src="img/<?php echo $productImage[0]?>" alt="Overture Edea skates">
                        </div>
                        <div>
                            <img src="img/<?php echo $productImage[1]?>" alt="Overture Edea skates">
                            <img src="img/<?php echo $productImage[2]?>" alt="Overture Edea skates">
                        </div>
                    </div>
                    <h2>Beskrivelse:</h2>
                    <p><?php echo $product['PDesc']?></p>
                </section>

                <section class="rightColumn">
                    <a href="#">Køb nu!</a>
                    <p><span>Antal stjerner: </span><?php echo $product['PStars']?></p>
                    <p><span>Støvle stivhed: </span><?php echo $product['PStiff']?></p>
                    <p><span>Understøtter: </span><?php echo $product['PSupp']?></p>
                    <p><span>Pris: </span><?php echo $product['PPrice']?>,-</p>
                    <p><span>På lager: </span><?php echo $product['PDesc'] > 0 ? "Ja": "Nej"?></p>
                </section>
            </div>
        </main>
    
        <?php include "includes/footer.php"; ?>
    </div>
</body>
</html>