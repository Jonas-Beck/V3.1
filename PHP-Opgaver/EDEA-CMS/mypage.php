<?php 
session_start();

//Redirect if user isnt logged in
if ($_SESSION['logged_in'] !== true){ 
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

     // Create connection
    $connection = new mysqli("localhost", "jona63m2_jona63m2", "cvcv090701", "jona63m2_EDEA_db");

    // Check connection
    if ($connection->connect_error) {
        echo "<script>alert('Connection Error');</script>"; // TEMP Error message
        // TODO Display connection error message
    } 
    else{
        $result = $connection->query("SELECT * FROM users WHERE Username = '{$_SESSION["username"]}'");
        $row = $result->fetch_assoc();
        if($row != null){ // 
            $connection->query("DELETE FROM users WHERE Username = '{$_SESSION["username"]}'");
            session_unset();
            session_destroy();
            header("Location: index.php");
            exit();
        }
        else{ 
            echo "<script>alert('{$_SESSION["username"]}');</script>";
        }
    }
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  <!-- PHP_SELF to update the current page  -->
                <p>
                    <input type="submit" name="submit-deleteuser" value="Slet Bruger" class="submitbtn"> <!-- TODO Style -->
                </p>
        </form>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">
</body>
</html>