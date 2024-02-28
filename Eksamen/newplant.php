<?php     
    require_once("database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {  


        include "includes/test_input.php";
        
        
        // Check error value (0 = no Errors) (4 = No file uploaded)
        if ($_FILES['PImg']['error'] == 0 OR $_FILES['PImg']['error'] == 4) {
        
            $uploadSucces = true;
            $imageString = "";

            // If no file uploaded set image string to null
            if ($_FILES['PImg']['error'] == 4) {
                $imageString = "imagecomingsoon.png";
            } else{
                // add image file name to $imagestring that is used to store the image name uploaded
                $imageString = $_FILES['PImg']['name'];

                // Upload images to cpanel and $imagestring variable for database
                $imageDir = "img/";
            
                // Image temp file loaction string
                $imageTmp = $_FILES['PImg']['tmp_name'];

                // Base name for the current image
                $imageFileName = basename($_FILES['PImg']['name']);

                // full file path for image
                $imageFullPath = $imageDir . $imageFileName;

                // Upload image to cpanel
                if(!move_uploaded_file($imageTmp, $imageFullPath)){
                    // Run this if upload failed
                    $uploadSucces = false;
                } 
            }

            // Check if upload image was succesful
            if($uploadSucces){
                
                // Create connection
                $connection = new database();

                // Check connection
                if ($connection->check_connection) {
                
                    
                    $PLightString = isset($_POST['PLight']) ? implode(" ", $_POST['PLight']) : null ;
                    $PSowInString = isset($_POST['PSowIn']) ? implode(" ", $_POST['PSowIn']) : null ;
                    $PSowOutString = isset($_POST['PSowOut']) ? implode(" ", $_POST['PSowOut']) : null ;
                    $PHarvestString = isset($_POST['PHarvest']) ? implode(" ", $_POST['PHarvest']) : null ;

                    $values = [
                        "PName" => $_POST['PName'],
                        "PSort" => $_POST['PSort'],
                        "PBotName" => $_POST['PBotName'],
                        "PImg" => $imageString,
                        "PType" => $_POST['PType'],
                        "PHeight" => $_POST['PHeight'],
                        "PSowDist" => $_POST['PSowDist'],
                        "PRowDist" => $_POST['PRowDist'],
                        "PSowDepth" => $_POST['PSowDepth'],
                        "PSqftNo" => $_POST['PSqFtNo'],
                        "PLight" => $PLightString,
                        "PSowIn" => $PSowInString,
                        "PSowOut" => $PSowOutString,
                        "PHarvest" => $PHarvestString,
                        "PDesc" =>  $_POST['PDesc']
                    ];


                    if ($connection->insert("planter", $values)) {

                        $newPlant = $connection->select("planter", "", "PID", "DESC", "1")[0];

                        header("Location: plant.php?id={$newPlant['PID']}");
                        exit();
                    }
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksamen - plantekalender</title>
    <!--  BOOTSTRAP5 LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <header>
        <?php include "includes/header.php"  ?>
    </header>
    <main class="bg-body-tertiary">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <h1 class="display-2">Opret Plante</h1>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <section class="row">
                    <div class="col-12">
                        <div class="card mb-5">
                            <div class="card-header">
                                <!-- Plant Name -->
                                <div class="input-group mb-3">
                                    <label for="PName" class="w-100 pb-3 fw-semibold">Navn</label>
                                    <input type="text" name="PName" class="form-control" required>
                                    <span class="input-group-text">*</span>
                                </div>
                                <!-- Plant Sort -->
                                <div class="input-group mb-3">
                                    <label for="PSort" class="w-100 pb-3 fw-semibold">Sort</label>
                                    <input type="text" name="PSort" class="form-control" required>
                                    <span class="input-group-text">*</span>
                                </div>
                                <!-- Plant Botanic name -->
                                <div class="input-group mb-3">
                                    <label for="PBotName" class="w-100 pb-3 fw-semibold">Botanisk navn</label>
                                    <input type="text" name="PBotName" class="form-control" required>
                                    <span class="input-group-text">*</span>
                                </div>
                                <!-- Plant Image -->
                                <div class="input-group mb-3">
                                    <label for="PImg" class="w-100 pb-3 fw-semibold">Billede (428 x 428px)</label>
                                    <input type="file" class="form-control" name="PImg">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant Type -->
                                        <div class="input-group mb-3">
                                            <label for="PType" class="w-100 pb-3 fw-semibold">Type</label>
                                            <select name="PType" class="form-control">
                                                <option value="Etårig grøntsag">Etårig grøntsag</option>
                                                <option value="Flerårig grøntsag">Flerårig grøntsag</option>
                                                <option value="Etårig krydderurt">Etårig krydderurt</option>
                                                <option value="Flerårig krydderurt">Flerårig krydderurt</option>
                                                <option value="Korn">Korn</option>
                                                <option value="Frugt">Frugt</option>
                                                <option value="Bær">Bær</option>
                                                <option value="Nød">Nød</option>
                                                <option value="Andet">Andet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant Height -->
                                        <div class="input-group mb-3">
                                             <label for="PHeight" class="w-100 pb-3 fw-semibold">Højde</label>
                                            <input type="number" class="form-control" name="PHeight">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant SowDist -->
                                        <div class="input-group mb-3">
                                             <label for="PSowDist" class="w-100 pb-3 fw-semibold">Såafstand</label>
                                            <input type="number" class="form-control" name="PSowDist">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant RowDist -->
                                        <div class="input-group mb-3">
                                             <label for="PRowDist" class="w-100 pb-3 fw-semibold">Rækkeafstand</label>
                                            <input type="number" class="form-control" name="PRowDist">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant SowDepth -->
                                        <div class="input-group mb-3">
                                             <label for="PSowDepth" class="w-100 pb-3 fw-semibold">Sådybde</label>
                                            <input type="number" class="form-control" name="PSowDepth">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant SqftNo -->
                                        <div class="input-group mb-3">
                                            <label for="PSqFtNo" class="w-100 pb-3 fw-semibold">Kvadratfod antal (squarefoot gardening)</label>
                                            <select name="PSqFtNo" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="4">4</option>
                                                <option value="6">6</option>
                                                <option value="9">9</option>
                                                <option value="16">16</option>
                                            </select>
                                            <span class="input-group-text">stk.</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant Light -->
                                        <div class="input-group mb-3">
                                            <label for="PLight" class="w-100 fw-semibold">Lysforhold</label>
                                            <p class="w-100">Vælg flere ved at holde ctrl nede</p>
                                            <select name="PLight[]"multiple size="5" class="form-control">
                                                <option value="Fuld skygge">Fuld skygge</option>
                                                <option value="Delvis skygge">Delvis skygge</option>
                                                <option value="Delvis sol">Delvis sol</option>
                                                <option value="Fuld sol">Fuld sol</option>
                                                <option value="NA">Ikke relevant</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant SowIn -->
                                        <div class="input-group mb-3">
                                            <label for="PSowIn" class="w-100 fw-semibold">Forspiring</label>
                                            <p class="w-100">Vælg flere ved at holde ctrl nede</p>
                                            <select class="form-control" name="PSowIn[]"multiple size=12>
                                                <option value="Januar">Januar</option>
                                                <option value="Februar">Februar</option>
                                                <option value="Marts">Marts</option>
                                                <option value="April">April</option>
                                                <option value="Maj">Maj</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant SowOut -->
                                        <div class="input-group mb-3">
                                            <label for="PSowOut" class="w-100 fw-semibold">Udplantning/såning på friland</label>
                                            <p class="w-100">Vælg flere ved at holde ctrl nede</p>
                                            <select class="form-control" name="PSowOut[]"multiple size=12>
                                                <option value="Januar">Januar</option>
                                                <option value="Februar">Februar</option>
                                                <option value="Marts">Marts</option>
                                                <option value="April">April</option>
                                                <option value="Maj">Maj</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Plant Harvest -->
                                        <div class="input-group mb-3">  
                                            <label for="PHarvest" class="w-100 fw-semibold">Moden til høst</label>
                                            <p class="w-100">Vælg flere ved at holde ctrl nede</p>
                                            <select class="form-control" name="PHarvest[]" multiple size=12>
                                                <option value="Januar">Januar</option>
                                                <option value="Februar">Februar</option>
                                                <option value="Marts">Marts</option>
                                                <option value="April">April</option>
                                                <option value="Maj">Maj</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Plant Desc -->
                                    <div class="col-12 mb-3">
                                        <label for="PDesc" class="w-100 fw-semibold">Beskrivelse</p>
                                        <textarea name="PDesc" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="col-12 col-md-8 col-lg-6">
                                        <input type="submit"name="submitPlant" class="w-100 btn btn-primary" value="Gem">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </main>
    <!-- Bootstrap5 Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>