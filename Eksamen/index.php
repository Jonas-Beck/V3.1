<?php 

require_once "database.php";

$connection = new database();


// Check connection
if ($connection->check_connection) { 

    // Array for sowIn plants based on month
    $sowIn = [
        "Januar" => array(),
        "Februar" => array(),
        "Marts" => array(),
        "April" => array(),
        "Maj" => array(),
        "Juni" => array(),
        "Juli" => array(),
        "August" => array(),
        "September" => array(),
        "Oktober" => array(),
        "November" => array(),
        "December" => array()
    ];

    // Array for sowOut plants based on month
    $sowOut = [
        "Januar" => array(),
        "Februar" => array(),
        "Marts" => array(),
        "April" => array(),
        "Maj" => array(),
        "Juni" => array(),
        "Juli" => array(),
        "August" => array(),
        "September" => array(),
        "Oktober" => array(),
        "November" => array(),
        "December" => array()
    ];

    // Select all plants from database
    $plants = $connection->select("planter");

    // Loop all plants
    foreach ($plants as $value) {

        // Only run if PSowIn is set
        if (isset($value['PSowIn'])) {

            // Create array from PSowIn string 
            $sowInMonths = explode(" ", $value['PSowIn']);

            // Loop all values in array and add them to $sowIn array
            foreach ($sowInMonths as $month) {
                array_push($sowIn[$month], $value);
            }
        }

        // Only run if PSSowOut is set
        if (isset($value['PSowOut'])) {
            // Create Array from PSowOut string
            $sowOutMonths = explode(" ", $value['PSowOut']);

            // Loop all values in array and add them to $sowOut array
            foreach ($sowOutMonths as $month) {
                array_push($sowOut[$month], $value);
            }
        }

    }
} 
else{
    echo "<script>alert('Connection Error');</script>"; // TEMP Error message
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
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <?php include "includes/header.php"?>
    </header>
    <main class="bg-body-tertiary">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 ">
                    <h1 class="display-2">Såkalender</h1>
                </div>
                <?php foreach ($sowIn as $monthKey => $empty)  { ?>
                    <!-- SowIn -->
                    <div class="col-12 col-lg-6">
                        <!-- Header -->
                        <h2 class="p-2 bg-success-subtle bg-opacity-50">
                            <?php echo $monthKey ?> - Forspiring
                        </h2>
                        <div class="row ">
                            <?php foreach ($sowIn[$monthKey] as $value) { ?>
                                <!-- Plant Cards -->
                                <div class="col-6 col-xl-4 mb-3 ">
                                    <div class="card h-100">
                                        <!-- Plant Name -->
                                        <div class="card-header fw-semibold fs-4">
                                            <?php echo $value['PName']?>
                                        </div>
                                        <div class="card-body">
                                            <!-- Card Sort -->
                                            <h5 class="card-title">
                                                <?php echo $value['PSort'] ?>
                                            </h5>
                                            <!-- Card Botanic Name -->
                                            <p class="card-text fst-italic">
                                                <?php echo $value['PBotName'] ?>
                                            </p>
                                            <!-- Card Link -->
                                            <a href="plant.php?id=<?php echo $value['PID']?>" class="stretched-link"></a>
                                        </div>
                                        <!-- Card Image -->
                                        <img src="./img/<?php echo $value['PImg'] ?>" class="card-img-bottom" alt="...">
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>

                    <!-- SowOut -->
                    <div class="col-12 col-lg-6">
                        <!-- Header -->
                        <h2 class="p-2 bg-success-subtle bg-opacity-50">
                            <?php echo $monthKey ?> - Såning På Friland
                        </h2>
                        <div class="row ">
                            <?php foreach ($sowOut[$monthKey] as $value) { ?>
                                <!-- Plant Cards -->
                                <div class="col-6 col-xl-4 mb-3">
                                    <div class="card h-100">
                                        <!-- Plant Name -->
                                        <div class="card-header fw-semibold fs-4">
                                            <?php echo $value['PName']?>
                                        </div>
                                        <div class="card-body">
                                            <!-- Plant Sort -->
                                            <h5 class="card-title">
                                                <?php echo $value['PSort'] ?>
                                            </h5>
                                            <!-- Plant Botanic Name -->
                                            <p class="card-text fst-italic">
                                                <?php echo $value['PBotName'] ?>
                                            </p>
                                            <!-- Plant Link -->
                                            <a href="plant.php?id=<?php echo $value['PID']?>" class="stretched-link"></a>
                                        </div>
                                        <!-- Plant Image -->
                                        <img src="./img/<?php echo $value['PImg'] ?>" class="card-img-bottom" alt="...">
                                    </div>
                                </div>
                            <?php  }   ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
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