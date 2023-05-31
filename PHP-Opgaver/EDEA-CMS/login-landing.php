<?php 
session_start();

//Redirect if user isnt logged in
if ($_SESSION['logged_in'] !== true){ 
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login</title>
</head>
<body class="light">

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <div class="content">
        <main>
            
            <h1>Du er nu logget ind</h1>
        </main>

        <?php include "includes/footer.php"; ?>
    </div>
        
</body>
</html>