<?php 
    session_start();
    include "includes/login-form-validate.php"; // PHP Code to valiate login form
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
        include "includes/topmenu.php"; // Header

        include "includes/sidemenu.php"; // Aside
    ?>

    <div class="content">
        <main>
            <h1>Login</h1>
            <?php 
                include "includes/login-form.php"; // Login Form
            ?>
        </main>

        <?php include "includes/footer.php"; // Footer ?>
    </div>
        
</body>
</html>