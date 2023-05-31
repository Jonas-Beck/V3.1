<?php 
    // Always place this at the top of the php document due to header() redirect

    // Used with login-form.php include 

    // Error Variables
    $passwordError = $usernameError = "";
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
            $passwordError = "Du har ikke indtastet en adgangskode"; // Show error message
            $formValidate = false;
        }
        // TODO Change to class for connection
        if ($formValidate){

            // Create connection
            $connection = new mysqli("localhost", "jona63m2_jona63m2", "cvcv090701", "jona63m2_EDEA_db");

            // Check connection
            if ($connection->connect_error) {
                echo "<script>alert('Connection Error');</script>"; // TEMP Error message
                // TODO Display connection error message
                $formValidate = false;
            } 
            else{
                $result = $connection->query("SELECT * FROM users WHERE Username = '{$_POST["login-username"]}'");
                $row = $result->fetch_assoc();
                if($row["Password"] != $_POST["login-password"]){
                    $passwordError = "Du har indtastet en forkert adgangskode!";
                    $formValidate = false;
                }
            }
        }

        // Check if form is validatet if true save POST data to session and redirect to login-landing.php
        if ($formValidate) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = htmlspecialchars($_POST['login-username']);
            header("Location: login-landing.php");
            exit();
        }
    }
?>