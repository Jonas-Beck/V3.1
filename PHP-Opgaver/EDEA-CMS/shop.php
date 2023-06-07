<?php 
session_start();

require_once("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>EDEA skates</title>
</head>

<body class="light">

    <?php 
        include "includes/topmenu.php"; 
        include "includes/sidemenu.php";
    ?>
 
    <div class="content">
        <main>
            <h1>EDEA shop</h1>
            <section>
                <div class="products">
                    <?php 
                        // Connect to DB
                        $connection = new database();

                        // Check connection
                        if ($connection->check_connection) {
                            // Get all rows from SQLQuery 
                            // $products = $connection->get_rows("SELECT * FROM products ORDER BY PID DESC LIMIT 3");
                            $products = $connection->select("products", "", "PID");
                            
                            // Loop through all products
                            foreach ($products as $product) {
                                $productImage; // variable for image url
                                if ($product['PPic'] == null) { // Default image if PPic == NULL
                                    $productImage = "imagecomingsoon.png";
                                }else{
                                    // Explode using " " and select first item in array as image
                                    $productImage = explode(" ", $product['PPic'])[0];
                                }
                                // Echo HTML with text based on current product in for each loop
                                echo <<<HTML
                                    <article>
                                        <img src="img/$productImage" alt="Edea skate">
                                        <h3>{$product['PName']}</h3>
                                        <p>Antal stjerner: {$product['PStars']}</p>
                                        <p>Beskrivelse:</p>
                                        <p>{$product['PDesc']}</p>
                                        <p>Stivhed: {$product['PStiff']}</p>
                                        <p>Understøtter: {$product['PSupp']}</p>
                                        <p>Pris: {$product['PPrice']},-</p>
                                        <a href="showproduct.php?id={$product['PID']}"><button>Læs mere!</button></a> <!-- FIXME-->
                                    </article>
                                HTML;
                            }
                        }else{
                             echo "<script>alert('Connection Error');</script>"; // TEMP Error message
                            // TODO Display connection error message
                        }
                    ?>
            </section>
        </main>

        <?php include "includes/footer.php"; ?>

    </div>

</body>
</html>