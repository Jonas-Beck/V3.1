<?php 

session_start();
require_once("database.php");

//Redirect if user isnt logged in
if ($_SESSION['logged_in'] !== true){ 
    header("Location: login.php");
    exit();
}

// Check for POST REQUEST METHOD
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check error value (0 = no Errors) (4 = No file uploaded)
    if ($_FILES['createproduct-image']['error'][0] == 0 OR $_FILES['createproduct-image']['error'][0] == 4) {
        
        $uploadSucces = true;
        $imageString = "";

        // If no file uploaded set image string to null
        if ($_FILES['createproduct-image']['error'][0] == 4) {
            $imageString = null;
        } else{
            // Upload images to cpanel and $imagestring variable for database
            $imageDir = "img/";
        
            // Check if count is above 3 if true change to 3 
            $imageCount = count($_FILES['createproduct-image']['name']) < 3 ? count($_FILES['createproduct-image']['name']) : 3;
            // TODO max amount of images
            for ($i=0; $i < $imageCount; $i++) { 
                
                // Image temp file loaction string
                $imageTmp = $_FILES['createproduct-image']['tmp_name'][$i];

                // add image file name to $imagestring that is used to store all images that was uploaded
                $imageString .= $_FILES['createproduct-image']['name'][$i]." ";

                // Base name for the current image
                $imageFileName = basename($_FILES['createproduct-image']['name'][$i]);

                // full file path for image
                $imageFullPath = $imageDir . $imageFileName;

                // Upload image to cpanel
                if(!move_uploaded_file($imageTmp, $imageFullPath)){
                    // Run this if upload failed
                    $uploadSucces = false;
                } 

                // TODO Multiple SELECT 
            }
        }

        // Check if upload image was succesful
        if($uploadSucces){ // WIP
            
            // Create connection
            $connection = new database();

            // Check connection
            if ($connection->check_connection) {
                // Turn createproduct-supports into string for database
                $productSupport = implode(" ", $_POST['createproduct-supports']);

                $values = [
                    "PName" => $_POST['createproduct-name'],
                    "PStars" => $_POST['createproduct-stars'],
                    "PDesc" => $_POST['createproduct-desc'],
                    "PStiff" => $_POST['createproduct-stiff'],
                    "PSupp" => $productSupport,
                    "PPrice" => $_POST['createproduct-price'],
                    "PPic" => $imageString,
                    "PStock" => $_POST['createproduct-stock']
                ];

                $connection->insert("products", $values);
            } 
            else{
                echo "<script>alert('Connection Error');</script>"; // TEMP Error message
                 // TODO Display connection error message    
            }
        }
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
        <h1>Opret Product</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  <!-- PHP_SELF to update the current page  -->
                <p>
                    <label for="createproduct-name">Produkt navn: </label>
                    <input type="text" name="createproduct-name" placeholder="Produktnavn" class="logininput" >
                </p>
                <p>
                    <label for="createproduct-image">Klik for at uploade produkt billede</label>
                    <input type="file" name="createproduct-image[]" multiple class="logininput fileupload" >
                </p>
                <p>
                    <p>ctrl + klik for at markere og uploade flere billeder (Max 3 billeder)</p>
                </p>
                <p>
                    <label for="createproduct-stars">Antal Stjerner</label>
                    <select name="createproduct-stars">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </p>
                <p>
                    <label for="createproduct-desc">Beskrivelse: </label>
                    <textarea name="createproduct-desc" class="logininput" cols="30" rows="3"></textarea>
                </p>
                <p>
                    <label for="createproduct-stiff">Stivhed </label>
                    <select name="createproduct-stiff">
                        <option value="95" selected>95</option>
                        <option value="90">90</option>
                        <option value="85">85</option>
                        <option value="70">70</option>
                        <option value="48">48</option>
                    </select>
                </p>
                <p>
                    <label for="createproduct-supports">Understøtter (Hold ctrl nede for at vælge flere) </label>
                    <select name="createproduct-supports[]" multiple size="5">
                        <option value="Enkeltspring" selected>Enkeltspring</option>
                        <option value="Dobbeltspring">Dobbeltspring</option>
                        <option value="Triplespring">Triplespring</option>
                        <option value="Quadspring">Quadspring</option>
                        <option value="Alle-danseniveauer">Alle-danseniveauer</option>
                    </select>
                </p>
                <p>
                    <label for="createproduct-price">Pris: </label>
                    <input type="number" name="createproduct-price" placeholder="Pris" class="logininput">
                </p>
                <p>
                    <label for="createproduct-stock">På Lager: </label>
                    <input type="number" name="createproduct-stock" placeholder="Lagerbeholdning" class="logininput">
                </p>
                <p>
                    <input type="submit" name="createproduct-submit" value="Opret" class="submitbtn">
                </p>
            </form>
        
        </main>

        <?php include "includes/footer.php"; ?>
    </div>
        
</body>
</html>