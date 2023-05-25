<?php 
    // Always place this at the top of the php document due to header() redirect

    // Used with login-form.php include 

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