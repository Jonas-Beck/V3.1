<?php 
session_start();
$_SESSION['logged_in'] = false;
session_unset();
session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Logout</title>
</head>
<body class="light">

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <div class="content">
        <main>
            <h1>Logout</h1>

            <p>Du er nu logget ud!</p>
        </main>

        <?php include "includes/footer.php"; ?>
    </div>
        
</body>
</html>