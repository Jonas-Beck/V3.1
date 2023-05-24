<?php
    session_start();

    //  Error variables
    $passwordError = $postcodeError = $phoneError = "";
    $formValidate = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  // TODO More validation
        // Check if both passwords arent the same
        if ( test_input($_POST["newuser-passwordrepeat"]) !== test_input($_POST["newuser-password"])){
            $passwordError = "Adgangskoden er ikke ens"; // Show error message
            $formValidate = false;
        }
        // Check if country == Danmark
        if ( strtolower(test_input($_POST["newuser-country"])) == "danmark"){
            // Check if postcode is 4 char
            if (strlen(test_input($_POST["newuser-postcode"])) !== 4) {
                $postcodeError = "Postnummer skal være  4 cifre"; // Show error message
                $formValidate = false;
            }
            // Check if phonenumber is 8 char
            if (strlen(test_input($_POST["newuser-phone"])) !== 8) {
                $phoneError = "Telefonnummer skal være 8 cifre"; // Show error message
                $formValidate = false;
            }
        }
        // Check if form is validated 
        if ($formValidate) {
            $_SESSION['newuser-username'] = htmlspecialchars($_POST["newuser-username"]);
            header("Location: createuser-landing.php");
            exit();
        }
    }

    // Function to test input for security 
    function test_input($data) {
        $data = trim($data);    //TODO Placement
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
                <input type="text" name="newuser-username" placeholder="Brugernavn" class="logininput" value="<?php echo isset($_POST['newuser-username']) ? test_input($_POST['newuser-username']) : ''; ?>">
            </p>
            <p>
                <label for="newuser-password">Adgangskode: </label>
                <input type="password" name="newuser-password" placeholder="Adgangskode" class="logininput" value="<?php echo isset($_POST['newuser-password']) ? test_input($_POST['newuser-password']) : ''; ?>">
                <label for="newuser-password" class="loginerror"><?php echo $passwordError?></label>
            </p>
            <p>
                <label for="newuser-passwordrepeat">Gentag adgangskode: </label>
                <input type="password" name="newuser-passwordrepeat" placeholder="Gentag adgangskode" class="logininput" value="<?php echo isset($_POST['newuser-passwordrepeat']) ? test_input($_POST['newuser-passwordrepeat']) : ''; ?>">
                <label for="newuser-passwordrepeat" class="loginerror"><?php echo $passwordError?></label>

            </p>
            <p>
                <label for="newuser-firstname">Fornavn: </label>
                <input type="text" name="newuser-firstname" placeholder="Fornavn" class="logininput" value="<?php echo isset($_POST['newuser-firstname']) ? test_input($_POST['newuser-firstname']) : ''; ?>">
            </p>
            <p>
                <label for="newuser-lastname">Efternavn: </label>
                <input type="text" name="newuser-lastname" placeholder="Efternavn" class="logininput" value="<?php echo isset($_POST['newuser-lastname']) ? test_input($_POST['newuser-lastname']): ''; ?>">
            </p>
            <p>
                <label for="newuser-address">Adresse: </label>
                <input type="text" name="newuser-address" placeholder="Gade og nr." class="logininput" value="<?php echo isset($_POST['newuser-address']) ? test_input($_POST['newuser-address']) : ''; ?>">
            </p>
            <p>
                <label for="newuser-postcode">Postnummer: </label>
                <input type="number" name="newuser-postcode" placeholder="Postnummer" class="logininput" value="<?php echo isset($_POST['newuser-postcode']) ? test_input($_POST['newuser-postcode']) : ''; ?>">
                <label for="newuser-postcode" class="loginerror"><?php echo $postcodeError?></label>
            </p>
            <p>
                <label for="newuser-city">By: </label>
                <input type="text" name="newuser-city" placeholder="By" disabled class="logininput" value="<?php echo isset($_POST['newuser-city']) ? test_input($_POST['newuser-city']) : ''; ?>">
            </p>
            <p>
                <label for="newuser-country">Land: </label>
                <input type="text" name="newuser-country" placeholder="Land" class="logininput" value="<?php echo isset($_POST['newuser-country']) ? test_input($_POST['newuser-country']) : ''; ?>">
            </p>
            <p>
                <label for="newuser-email">E-mail: </label>
                <input type="email" name="newuser-email" placeholder="E-mail adresse" class="logininput" value="<?php echo isset($_POST['newuser-email']) ? test_input($_POST['newuser-email']) : ''; ?>">
            </p>
            <p>
                <label for="newuser-website">Website: </label>
                <input type="text" name="newuser-website" placeholder="Indtast URL på din hjemmeside" class="logininput" value="<?php echo isset($_POST['newuser-website']) ? test_input($_POST['newuser-website']) : ''; ?>">
            </p>
            <p>
                <label for="newuser-phone">Telefonnummer: </label>
                <input type="number" name="newuser-phone" placeholder="Telefonnummer" class="logininput" value="<?php echo isset($_POST['newuser-phone']) ? test_input($_POST['newuser-phone']) : ''; ?>">
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