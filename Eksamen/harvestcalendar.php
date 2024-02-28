<?php 

require_once "database.php";

$connection = new database();


// Check connection
if ($connection->check_connection) { 

    // Array for Harvest plants based on month
    $harvest = [
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

        // Only run if PHarvest is set
        if (isset($value['PHarvest'])) {

            // Create array from PHarvest string 
            $harvestMonths = explode(" ", $value['PHarvest']);

            // Loop all values in array and add them to $harvest array
            foreach ($harvestMonths as $month) {
                array_push($harvest[$month], $value); // FIXME 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php include "includes/header.php"  ?>
    </header>
    <main class="bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-12 py-5 ">
                    <h1 class="display-2">Høstkalender</h1>
                </div>
                <?php foreach ($harvest as $monthKey => $empty)  { ?>
                    <div class="col-12">
                        <!-- Month Header -->
                        <h2 class="p-2 bg-success-subtle bg-opacity-50">
                            <?php echo $monthKey ?> - Høstklar
                        </h2>
                        <div class="row">
                            <?php foreach ($harvest[$monthKey] as $value) {?>
                                <!-- Plant Card -->
                                <div class="col-6 col-xl-3 mb-3 ">
                                    <div class="card h-100">
                                        <!-- Plant name -->
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
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </main>
    <!-- Bootstrap5 Script Links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>