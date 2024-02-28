<?php 
require_once("database.php");

// Variable to check if edit is active
$edit = false;

// Arrays used to create select options
$months = ["Januar", "Februar", "Marts", "April", "Maj", "Juni", "Juli", "August", "September", "Oktober", "November", "December"];
$lights = ["Fuld Skygge", "Delvis skygge", "Delvis sol", "Fuld sol", "Ikke relevant"];
$types = ["Flerårig grøntsag", "Etårig kryderurt", "Flerårig krydderurt", "Korn", "Frugt" ,"Bær", "Nød", "Andet"];
$SqFtNoOption = ["1", "2", "4", "6", "9", "16"];


 // Connect to DB
$connection = new database();

// Check connection
if ($connection->check_connection) {

    // Save plant from database in $plant
    $plant = $connection->select("planter", "PID = '{$_GET['id']}'")[0];

    // plant-edit button
    if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['edit'])){
        $edit = true;
    }

    // plant-delete button
    if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['delete'])){
        if ($connection->delete("planter", "PID = '{$_GET['id']}'")) {
            header("Location: index.php");
            exit();
        }
    }

    // plant-save button
    if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['save'])){

        $PLightString = isset($_POST['PLight']) ? implode(" ", $_POST['PLight']) : null ;
        $PSowInString = isset($_POST['PSowIn']) ? implode(" ", $_POST['PSowIn']) : null ;
        $PSowOutString = isset($_POST['PSowOut']) ? implode(" ", $_POST['PSowOut']) : null ;
        $PHarvestString = isset($_POST['PHarvest']) ? implode(" ", $_POST['PHarvest']) : null ;

        $values = [
            "PName" => $_POST['PName'],
            "PSort" => $_POST['PSort'],
            "PBotName" => $_POST['PBotName'],
            "PImg" => $plant['PImg'],
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


        if ($connection->update("planter", $values, "PID = {$_GET['id']}" )) {

            // Update $plant variable after changes
            $plant = $connection->select("planter", "PID = '{$_GET['id']}'")[0];
        }
    }

    // plant-clear button
    if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['clear'])){
        $edit = false;
    }

}else{
    echo "<script>alert('Connection Error');</script>"; // TEMP Error message
    // TODO Display connection error message
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <header>
        <?php include "includes/header.php"  ?>
    </header>
    <main class="bg-body-tertiary">
        <div class="container py-5">
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["
                PHP_SELF"]);?>">
                    <section class="row">
                        <div class="col-12">
                            <div class="card mb-5">
                                <div class="card-header pt-3">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-7 text-center">
                                            <h1 class="display-2"><?php echo $plant['PName'] ?></h1>
                                        </div>
                                        <div class="col-12 col-lg-6 d-flex justify-content-center">
                                            <img src="./img/<?php echo $plant['PImg'] ?>" class="w-100 p-lg-4 h-auto"
                                                alt="Plante billede">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="d-flex justify-content-center pt-3 pt-lg-0 <?php echo $edit ? "d-none" : "" ?>">
                                                <button type="submit" name="edit" class="btn btn-primary mb-3 w-50" >Rediger</button>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-stretch gap-3 flex-column flex-md-row pt-3 pt-lg-0 <?php echo $edit ? "" : "d-none" ?>">
                                                <button type="submit" name="save" class="btn btn-success mb-3 w-100">Gem</button>
                                                <button type="submit" name="clear" class="btn btn-warning mb-3 w-100">Fortryd</button>
                                                <button type="submit" name="delete" class="btn btn-danger mb-3 w-100">Slet plante</button>
                                            </div>
                                            <!-- Fieldset to group all inputs that should be disabled  -->
                                            <fieldset <?php echo $edit ? "" : "disabled" ?> >
                                                <!-- Plant Name -->
                                                <div class="input-group mb-3">
                                                    <label for="PName" class="w-100 pb-3 fw-semibold">Navn</label>
                                                    <input type="text" name="PName" class="form-control" value="<?php echo $plant['PName'] ?>" required>
                                                    <span class="input-group-text">*</span>
                                                </div>
                                                <!-- Plant Sort -->
                                                <div class="input-group mb-3">
                                                    <label for="PSort" class="w-100 pb-3 fw-semibold">Sort</label>
                                                    <input type="text" name="PSort" class="form-control" value="<?php echo $plant['PSort'] ?>" required>
                                                    <span class="input-group-text">*</span>
                                                </div>
                                                <!-- Plant Botanisk name -->
                                                <div class="input-group mb-3">
                                                    <label for="PBotName" class="w-100 pb-3 fw-semibold">Botanisk navn</label>
                                                    <input type="text" name="PBotName" class="form-control" value="<?php echo $plant['PBotName'] ?>" required>
                                                    <span class="input-group-text">*</span>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Fieldset to group all inputs that should be disabled -->
                                    <fieldset class="row justify-content-center" <?php echo $edit ? "" : "disabled" ?> >
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PType" class="w-100 pb-3 fw-semibold">Type</label>
                                                <select class="form-control" name="PType">
                                                    <?php foreach ($types as $type): // Loop all types and echo option with type as value. Check if $plant[PType] conatins type if true echo selected?>
                                                        <option value="<?php echo $type; ?>" <?php echo str_contains($plant['PType'], $type) ? "selected" : ""; ?>><?php echo $type; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PHeight" class="w-100 pb-3 fw-semibold">Højde</label>
                                                <input type="number" class="form-control" value="<?php echo $plant['PHeight'] ?>" name="PHeight">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PSowDist" class="w-100 pb-3 fw-semibold">Såafstand</label>
                                                <input type="number" class="form-control" value="<?php echo $plant['PSowDist'] ?>" name="PSowDist">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PRowDist" class="w-100 pb-3 fw-semibold">Rækkeafstand</label>
                                                <input type="number" class="form-control" value="<?php echo $plant['PRowDist'] ?>" name="PRowDist">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PSowDepth" class="w-100 pb-3 fw-semibold">Sådybde</label>
                                                <input type="number" class="form-control" value="<?php echo $plant['PSowDepth'] ?>" name="PSowDepth">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PSqFtNo" class="w-100 pb-3 fw-semibold">Kvadratfod antal
                                                    (squarefoot gardening)</label>
                                                <select class="form-control" name="PSqftNo">
                                                    <?php foreach ($SqFtNoOption as $SqFtNo):?>
                                                        <option value="<?php echo $SqFtNo; ?>" <?php echo $plant['PSqftNo'] == $SqFtNo ? "selected" : ""; ?>><?php echo $SqFtNo; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="input-group-text">stk.</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PLight" class="w-100 fw-semibold">Lysforhold</label>
                                                <p class="w-100">Vælg flere ved at holde ctrl nede</p>
                                                <select class="form-control" name="PLight[]" multiple size=5>
                                                    <?php foreach ($lights as $light):?>
                                                        <option value="<?php echo $light; ?>" <?php echo str_contains($plant['PLight'], $light) ? "selected" : ""; ?>><?php echo $light; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PSowIn" class="w-100 fw-semibold">Forspiring</label>
                                                <p class="w-100">Vælg flere ved at holde ctrl nede</p>
                                                <select class="form-control" name="PSowIn[]"multiple size=12>
                                                    <?php foreach ($months as $month): // Loop all months and echo option with month as value. Check if $plant[PSowIn] conatins month if true echo selected?>
                                                        <option value="<?php echo $month; ?>" <?php echo str_contains($plant['PSowIn'], $month) ? "selected" : ""; ?>><?php echo $month; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PSowOut" class="w-100 fw-semibold">Udplantning/såning på
                                                    friland</label>
                                                <p class="w-100">Vælg flere ved at holde ctrl nede</p>
                                                <select class="form-control" name="PSowOut[]" multiple size=12>
                                                    <?php foreach ($months as $month): // Loop all months and echo option with month as value. Check if $plant[PSowOut] conatins month if true echo selected?>
                                                        <option value="<?php echo $month; ?>" <?php echo str_contains($plant['PSowOut'], $month) ? "selected" : ""; ?>><?php echo $month; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-group mb-3">
                                                <label for="PHarvest" class="w-100 fw-semibold">Moden til høst</label>
                                                <p class="w-100">Vælg flere ved at holde ctrl nede</p>
                                                <select class="form-control" name="PHarvest[]" multiple size=12>
                                                    <?php foreach ($months as $month): // Loop all months and echo option with month as value. Check if $plant[PHarvest] conatins month if true echo selected?>
                                                        <option value="<?php echo $month; ?>" <?php echo str_contains($plant['PHarvest'], $month) ? "selected" : ""; ?>><?php echo $month; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="PDesc" class="w-100 fw-semibold">Beskrivelse</p>
                                                <textarea name="PDesc" class="form-control" rows="5"><?php echo $plant['PDesc'] ?></textarea>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </section>
            </form>
        </div>
    </main>
    <!-- Bootstrap5 Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
</body>

</html>

