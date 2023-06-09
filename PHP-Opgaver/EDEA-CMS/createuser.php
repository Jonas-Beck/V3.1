<?php
    session_start();
    require_once("database.php");

    //  Error variables
    $passwordError = $postcodeError = $phoneError = $usernameError = "";
    $formValidate = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  // TODO More validation

        // Test all POST array values 
        include "includes/test_input.php";

        // Check if both passwords arent the same
        if ( $_POST["newuser-passwordrepeat"] !== $_POST["newuser-password"]){
            $passwordError = "Adgangskoden er ikke ens"; // Show error message
            $formValidate = false;
        }
        // Check if country == Danmark
        if ( strtolower($_POST["newuser-country"]) == "danmark"){
            // Check if postcode is 4 char
            if (strlen($_POST["newuser-postcode"]) !== 4) {
                $postcodeError = "Postnummer skal være  4 cifre"; // Show error message
                $formValidate = false;
            }
            // Check if phonenumber is 8 char
            if (strlen($_POST["newuser-phone"]) !== 8) {
                $phoneError = "Telefonnummer skal være 8 cifre"; // Show error message
                $formValidate = false;
            }
        }

        if ($formValidate){ 

            // Create connection
            $connection = new database();

            // Check connection
            if ($connection->check_connection) {
                $row = $connection->select("users", "Username = '{$_POST["newuser-username"]}'")[0];

                // Array with all values for database
                $values = [
                    "Username" => $_POST["newuser-username"],
                    "Password" => $_POST["newuser-password"],
                    "Firstname" => $_POST["newuser-firstname"],
                    "Lastname" => $_POST["newuser-lastname"],
                    "Address" => $_POST["newuser-address"],
                    "Postcode" => $_POST["newuser-postcode"],
                    "Country" => $_POST["newuser-country"],
                    "Email" => $_POST["newuser-email"],
                    "Website" => $_POST["newuser-website"]
                ];

                if($row == null){ // Make sure username isnt already used
                    if (!$connection->insert("users", $values)) {
                        $formValidate = false; 
                    }
                }
                else{  // Error if username is used
                    $usernameError = "Brugernavnet er allerede brugt.";
                    $formValidate = false;
                }
            } 
            else{
                echo "<script>alert('Connection Error');</script>"; // TEMP Error message
                // TODO Display connection error message
                $formValidate = false;
            }
        }

        // Check if form is validated 
        if ($formValidate) {
            $_SESSION['newuser-username'] = $_POST["newuser-username"];
            header("Location: createuser-landing.php");
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
    <title>Newsletter</title>
</head>
<body class="light">

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <div class="content">
        <main>
        <h1>Opret bruger</h1>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  <!-- PHP_SELF to update the current page  -->
            <!-- If POST data exist for input use that as value  -->
            <p>
                <label for="newuser-username">Brugernavn: </label>
                <input type="text" name="newuser-username" placeholder="Brugernavn" class="logininput" value="<?php echo isset($_POST['newuser-username']) ? $_POST['newuser-username'] : ''; ?>">
                <label for="newuser-username" class="loginerror"><?php echo $usernameError?></label>
            </p>
            <p>
                <label for="newuser-password">Adgangskode: </label>
                <input type="password" name="newuser-password" placeholder="Adgangskode" class="logininput" >
                <label for="newuser-password" class="loginerror"><?php echo $passwordError?></label>
            </p>
            <p>
                <label for="newuser-passwordrepeat">Gentag adgangskode: </label>
                <input type="password" name="newuser-passwordrepeat" placeholder="Gentag adgangskode" class="logininput">
                <label for="newuser-passwordrepeat" class="loginerror"><?php echo $passwordError?></label>
            </p>
            <p>
                <label for="newuser-firstname">Fornavn: </label>
                <input type="text" name="newuser-firstname" placeholder="Fornavn" class="logininput" value="<?php echo isset($_POST['newuser-firstname']) ? $_POST['newuser-firstname'] : ''; ?>">
            </p>
            <p>
                <label for="newuser-lastname">Efternavn: </label>
                <input type="text" name="newuser-lastname" placeholder="Efternavn" class="logininput" value="<?php echo isset($_POST['newuser-lastname']) ? $_POST['newuser-lastname']: ''; ?>">
            </p>
            <p>
                <label for="newuser-address">Adresse: </label>
                <input type="text" name="newuser-address" placeholder="Gade og nr." class="logininput" value="<?php echo isset($_POST['newuser-address']) ? $_POST['newuser-address'] : ''; ?>">
            </p>
            <p>
                <label for="newuser-postcode">Postnummer: </label>
                <input type="number" name="newuser-postcode" placeholder="Postnummer" class="logininput" value="<?php echo isset($_POST['newuser-postcode']) ? $_POST['newuser-postcode'] : ''; ?>">
                <label for="newuser-postcode" class="loginerror"><?php echo $postcodeError?></label>
            </p>
            <p>
                <label for="newuser-city">By: </label>
                <input type="text" name="newuser-city" placeholder="By" disabled class="logininput" value="<?php echo isset($_POST['newuser-city']) ? $_POST['newuser-city'] : ''; ?>">
            </p>
            <p>
                <label for="newuser-country">Land: </label>
                <input type="text" name="newuser-country" placeholder="Land" class="logininput" value="<?php echo isset($_POST['newuser-country']) ? $_POST['newuser-country'] : ''; ?>">
            </p>
            <p>
                <label for="newuser-email">E-mail: </label>
                <input type="email" name="newuser-email" placeholder="E-mail adresse" class="logininput" value="<?php echo isset($_POST['newuser-email']) ? $_POST['newuser-email'] : ''; ?>">
            </p>
            <p>
                <label for="newuser-website">Website: </label>
                <input type="text" name="newuser-website" placeholder="Indtast URL på din hjemmeside" class="logininput" value="<?php echo isset($_POST['newuser-website']) ? $_POST['newuser-website'] : ''; ?>">
            </p>
            <p>
                <label for="newuser-phone">Telefonnummer: </label>
                <input type="number" name="newuser-phone" placeholder="Telefonnummer" class="logininput" value="<?php echo isset($_POST['newuser-phone']) ? $_POST['newuser-phone'] : ''; ?>">
                <label for="newuser-phone" class="loginerror"><?php echo $phoneError?></label>
            </p>
            <p>
                <input type="submit" name="newuser-submit" value="Opret" class="submitbtn">
            </p>
        </form>

        </main>

        <?php include "includes/footer.php"; ?>
    </div>
        
</body>
</html>