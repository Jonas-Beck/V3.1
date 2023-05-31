<?php 
session_start();

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
                    <article>
                        <img src="img/imagecomingsoon.png" alt="Edea skate">
                        <h3>Edea Flamenco Ice</h3>
                        <p>Antal stjerner: 6</p>
                        <p>Beskrivelse:</p>
                        <p>Flamenco Ice er fremstillet med henblik på den ynde og elegance, der kendetagner dansesporten.<br>Ved hjælp af Edeas mangeårige erfaring har vi lavet en støvle, som giver dansere fuld kontrol over deres skær og ekstra fleksibilitet med den lave støvle.<br>Den unikke indersål giver bedre føling med isen og stabilitet.</p>
                        <p>Stivhed: 70</p>
                        <p>Understøtter: Alle-danseniveauer</p>
                        <p>Pris: 2500,-</p>
                        <a href="showproduct.php"><button>Læs mere!</button></a>
                    </article>
                    <article>
                        <img src="img/piano-edea-skates.jpg" alt="Edea skate">
                        <h3>Edea Piano</h3>
                        <p>Antal stjerner: 6</p>
                        <p>Beskrivelse:</p>
                        <p>Kunstskøjteløbere forsøger altid at flytte grænserne, og med den nyeste teknologi er det nu blevet endnu lettere<br>Vores dygtige teknikere har med feedback fra verdens bedste skøjteløbere og med brug af den allernyeste teknologi skabt en helt unik ny støvle, Piano.<br>Edea Piano er 100% håndlavet italiensk design. Vores første støvle, der giver ekstra stabilitet, kraft og bevægelse med det dobbelte antichok system og revolutionære design.</p>
                        <p>Stivhed: 95</p>
                        <p>Understøtter: Triplespring Quadspring</p>
                        <p>Pris: 4500,-</p>
                        <a href="showproduct.php"><button>Læs mere!</button></a>
                    </article>
                    <article>
                        <img src="img/overture-edea-skates.jpg" alt="Edea skate">
                        <h3>Edea Overture</h3>
                        <p>Antal stjerner: 3</p>
                        <p>Beskrivelse:</p>
                        <p>Overture er en kombination af let design og Edea teknologi. Det er den mest solgte Edea støvle. Støvlen har stor støtte og fleksibilitet for kunstskøjteløbere, der arbejder på deres grundløb, enkeltspring og axel.<br>Overture er baseret på vores teknologisk viden om kunstskøjteløb på højt niveau og er baseret på vores passion for kunstskøjteløb.<br>Edea Overture er 100% håndlavet italiensk design. Støvlen er letvægtsdesign, som sikrer god responsivitet. Den giver en god fornemmelse for isen, som gør det lettere at udvikle det grundlæggende skøjteløb.</p>
                        <p>Stivhed: 48</p>
                        <p>Understøtter: Enkeltspring Axel</p>
                        <p>Pris: 1175,-</p>
                        <a href="showproduct.php"><button>Læs mere!</button></a>
                    </article>
                </div>
            </section>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">



</body>
</html>