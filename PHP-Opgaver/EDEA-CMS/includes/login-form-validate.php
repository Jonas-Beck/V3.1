<?php 
    require_once("database.php");
    // Always place this at the top of the php document due to header() redirect

    // Used with login-form.php include 

    // Error Variables
    $passwordError = $usernameError = "";
    $formValidate = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Test all POST values
        include "test_input.php";

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
       
        if ($formValidate){
            // Create connection
            $connection = new database();
            // Check connection
            if ($connection->check_connection) {
                $row = $connection->select("users", "Username = '{$_POST["login-username"]}'", "Username", "ASC", 1);
                if($row[0]["Password"] != $_POST["login-password"]){
                    $passwordError = "Du har indtastet et forkert adgangskode!";
                    $formValidate = false;
                }
                
            } 
            else{
                echo "<script>alert('Connection Error');</script>"; // TEMP Error message
                // TODO Display connection error message
                $formValidate = false;
            }
        }

        // Check if form is validatet if true save POST data to session and redirect to login-landing.php
        if ($formValidate) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $_POST['login-username'];
            header("Location: login-landing.php");
            exit();
        }
    }
?>