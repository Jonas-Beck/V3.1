<?php 
    session_start();
    // Error Variables
    $passwordEmpty = $usernameError = "";
    $formValidate = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check username isnt empty
        if (empty($_POST["login-username"])){
            $usernameError = "Du har ikke indtastet et brugernavn"; // Show error message
            $formValidate = false;
        }
        // Check username only contains letters / Whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["login-username"])){ // TODO New Regex 
            $usernameError = "Brugernavn må kun indeholde bogstaver og mellemrum"; // Show error message
            $formValidate = false;
        }
        // Check password isnt empty
        if (empty($_POST["login-password"])){
            $passwordEmpty = "Du har ikke indtastet en adgangskode"; // Show error message
            $formValidate = false;
        }
        // Check if form is validatet if true save POST data to session and redirect to login-landing.php
        if ($formValidate) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = htmlspecialchars($_POST['login-username']);
            $_SESSION['password'] = htmlspecialchars($_POST['login-password']);
            header("Location: login-landing.php");
            exit();
        }
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
            <h1>Velkommen til, <?php echo $_SESSION['newuser-username']?>. Du kan logge ind her</h1>

            <!-- TODO Include for login form / php ??-->

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  <!-- PHP_SELF to update the current page  -->
                <!-- If POST data exist for input use that as value  -->
                <!-- Username Form -->
                <p>
                    <label for="login-username" class="loginform">Brugernavn: </label>
                    <input type="text" name="login-username" placeholder="Brugernavn" class="logininput" value="<?php echo isset($_POST['login-username']) ? $_POST['login-username'] : '';?>">
                    <label for="login-username" class="loginerror"><?php echo $usernameError;?></label>

                </p>
                <!-- Password Form -->
                <p>
                    <label for="login-password" class="loginform">Adgangskode: </label>
                    <input type="password" name="login-password" placeholder="Adgangskode" class="logininput" value="<?php echo isset($_POST['login-password']) ? $_POST['login-password'] : '';?>">
                    <label for="login-password" class="loginerror"><?php echo $passwordEmpty;?></label>

                </p>
                
                <p>
                    <input type="submit" name="login-submit" value="Login" class="submitbtn loginbtn">
                </p>
            </form>
        </main>

        <?php include "includes/footer.php"; ?>
    </div>
        
</body>
</html>