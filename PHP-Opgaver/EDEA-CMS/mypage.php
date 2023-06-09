<?php 
session_start();
require_once "database.php";


//Redirect if user isnt logged in
if ($_SESSION['logged_in'] !== true){ 
    header("Location: login.php");
    exit();
}

$edit = "";

 // Create connection
$connection = new database();

// Check connection
if ($connection->check_connection) { 

    $row = $connection->select("users","Username = '{$_SESSION['username']}'")[0];

    // mypage-edit-accept button
    if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['mypage-edit-accept'])){

        $values = [
            "Firstname" => $_POST["mypage-firstname"],
            "Lastname" => $_POST["mypage-lastname"],
            "Address" => $_POST["mypage-address"],
            "Postcode" => $_POST["mypage-postcode"],
            "Country" => $_POST["mypage-country"],
            "Email" => $_POST["mypage-email"],
            "Website" => $_POST["mypage-website"]
        ];
        
        $connection->update("users", $values, "Username = '{$_SESSION["username"]}'");
        $edit = false;

        $row = $connection->select("users","Username = '{$_SESSION['username']}'")[0];
    }

    // mypage-deleteuser button 
    if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['mypage-deleteuser'])){
        if($row != null){ 
            if($connection->delete("users", "Username = '{$_SESSION["username"]}'")){
                session_unset();
                session_destroy();
                header("Location: index.php");
                exit();
            } else{
                // ERROR
            }
        } else{ 
            // ERROR User dosent exist
        }
    }   
    // mypage-edit button
    if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['mypage-edit'])){
        $edit = true;
    }
    // mypage-edit-decline button
    if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['mypage-edit-decline'])){
        $edit = false;
    }

} 
else{
    echo "<script>alert('Connection Error');</script>"; // TEMP Error message
    // TODO Display connection error message

}


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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  <!-- PHP_SELF to update the current page  -->
            <!-- If POST data exist for input use that as value  -->
            <p>
                <!-- First Name -->
                <label for="mypage-firstname">Fornavn: </label>
                <input type="text" name="mypage-firstname" placeholder="Fornavn" class="logininput" value="<?php echo $row['Firstname']?>" <?php echo $edit? "": "disabled"?>>
            </p>
            <p>
                <!-- Last Name -->
                <label for="mypage-lastname">Efternavn: </label>
                <input type="text" name="mypage-lastname" placeholder="Efternavn" class="logininput" value="<?php echo $row['Lastname']?>" <?php echo $edit? "": "disabled"?>>
            </p>
            <p>
                <!-- Adresse -->
                <label for="mypage-address">Adresse: </label>
                <input type="text" name="mypage-address" placeholder="Gade og nr." class="logininput" value="<?php echo $row['Address']?>" <?php echo $edit? "": "disabled"?>>
            </p>
            <p>
                <!-- Postcode -->
                <label for="mypage-postcode">Postnummer: </label>
                <input type="number" name="mypage-postcode" placeholder="Postnummer" class="logininput" value="<?php echo $row['Postcode']?>" <?php echo $edit? "": "disabled"?>>
            </p>
            <p>
                <!-- City -->
                <label for="mypage-city">By: </label>
                <input type="text" name="mypage-city" placeholder="By" class="logininput" value="<?php echo $row['City']?>" <?php echo $edit? "": "disabled"?>>
            </p>
            <p>
                <!-- Country -->
                <label for="mypage-country">Land: </label>
                <input type="text" name="mypage-country" placeholder="Land" class="logininput" value="<?php echo $row['Country']?>" <?php echo $edit? "": "disabled"?>>
            </p>
            <p>
                <!-- Email -->
                <label for="mypage-email">E-mail: </label>
                <input type="email" name="mypage-email" placeholder="E-mail adresse" class="logininput" value="<?php echo $row['Email']?>" <?php echo $edit? "": "disabled"?>>
            </p>
            <p>
                <!-- Website -->
                <label for="mypage-website">Website: </label>
                <input type="text" name="mypage-website" placeholder="Indtast URL på din hjemmeside" class="logininput" value="<?php echo $row['Website']?>" <?php echo $edit? "": "disabled"?>>
            </p>
            <p>
                <!-- Submit Buttons -->
                <input type="submit" name="mypage-edit" value="Edit" class="submitbtn <?php echo $edit? "d-none": ""?>">
            </p>
            <p>
                <input type="submit" name="mypage-deleteuser" value="Slet Bruger" class="submitbtn"> <!-- TODO Style -->
            </p>
            <p>
                <input type="submit" name="mypage-edit-accept" value="Accepter Ændringer" class="submitbtn <?php echo $edit? "": "d-none"?> " > <!-- TODO Style -->
            </p>
            <p>
                <input type="submit" name="mypage-edit-decline" value="Fortryd Ændringer" class="submitbtn <?php echo $edit? "": "d-none"?> " > <!-- TODO Style -->
            </p>
        </form>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">
</body>
</html>