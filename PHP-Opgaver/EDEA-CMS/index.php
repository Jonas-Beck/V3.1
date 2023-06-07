<?php 
session_start();
require_once("database.php");

// Display background color based on current time
function bodyColor(){
    if (date("i") % 2 == 0) {
        echo "light";
    }
    else {
        echo "dark";
    } 
}

// Display image based on current month
function headerImage(){
     if (date("m") >= 0 && date("m") <= 6) {
        echo "edea-ice-skate-collection-2018.jpg";
    }
    else {
        echo "edea-home-of-champions.jpg";
    }
}

// Display header text based on current month
function headerText(){
    $currentMonth = date("n") - 1;
    $danishMonths = ["januar", "februar", "marts", "april", "maj", "juni", "juli", "august", "september", "oktober", "november", "december"];
    $seasons = ["vinter", "forår", "sommer", "efterår"];
    $monthDesc = [
        ". Er din skøjter helt up-to-date til sæsonens sidste konkurrencer?", 
        ". Skal du have nye skøjter klar til næste sæsons programmer?", 
        ". Off-ice træning er i fuld gang. Vidste du, at vi også sælger in-line rulleskøjtehjul til at sætte under dine Edea støvler", 
        ". Er du kommet godt i gang med sæsonen? Er dine skøjter klar til de første konkurrencer?"
    ];

    switch (true) {
        case $currentMonth <= 2 OR $currentMonth == 12:
            echo "Det er $danishMonths[$currentMonth] og dermed $seasons[0]$monthDesc[0]";
            break;
        case $currentMonth >= 3 AND $currentMonth <= 5:
            echo "Det er $danishMonths[$currentMonth] og dermed $seasons[1]$monthDesc[1]";
            break;
        case $currentMonth >= 6 AND $currentMonth <= 8:
            echo "Det er $danishMonths[$currentMonth] og dermed $seasons[2]$monthDesc[2]";
            break;
        case $currentMonth >= 9 AND $currentMonth <= 11:
            echo "Det er $danishMonths[$currentMonth] og dermed $seasons[3]$monthDesc[3]";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Edea skates</title>
</head>
<!-- Opgave 4 -->
<body class="<?php bodyColor(); ?>">
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <header>
            <h1>
                <?php
                    // Opgave 5.6
                    headerText();
                ?>
            </h1>
            <!-- Opgave 4 -->
            <img src="img/<?php headerImage(); ?>" alt="Edea skates">
                

        </header>

        <main>
            <h1>Edea støvler - høj kvalitet til top præstationer!</h1>
            <section>
                <article>
                    <p>Kunstskøjteløbere har altid flyttet grænser, og de ønsker den nyeste teknologi til at hjælpe dem med dette. 
                    Edea's højt kvalificerede teknikere har fået feedback på, hvilke ønsker og krav skøjteløbere har til støvler. 
                    Dette, kombineret med den nyeste forskning, gør Edeas støvler både revolutionerende og af højeste kvalitet.</p>
                </article>
            </section>
            <section>
                <h2>Udvalgte produkter:</h2>
                <div class="products">
                    <?php 
                        // Connect to DB
                        
                        $connection = new database();

                        // Check connection
                        if ($connection->check_connection) {
                            // Get all rows from SQLQuery 
                            // $products = $connection->get_rows("SELECT * FROM products ORDER BY PID DESC LIMIT 3");
                            $products = $connection->select("products", "", "PID", "DESC", "3");
                            
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

                </div>
            </section>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">



</body>
</html>