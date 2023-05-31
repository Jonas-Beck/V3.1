<?php 
session_start();
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
<body>
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">
        <main>
            <h1>Kære <?php echo htmlspecialchars($_POST['newsletter-firstname']); ?>.</h1>
            <p>Du er nu tilmeldt vores nyhedsbrev. Vi glæder os til hver måned at bringe dig spændende nyhder fra kunstskøjteløbets verden. Husk,at du altid kan afmelde dig nyhedsbrevet igen ved at følge linket i bunden af nyhedsbrevet. Med venlig hilsen dit Edea team</p>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">



</body>
</html>