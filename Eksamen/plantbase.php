<?php 

require_once "database.php";

$connection = new database();

// Check connection
if ($connection->check_connection) { 
    // Select all plants from database
    $plants = $connection->select("planter");
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
        <?php include "includes/header.php"  ?>
    </header>
    <main class="bg-body-tertiary">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <h1 class="display-2">Plantebasen</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover table-striped table-light">
                        <thead class="bg-body-tertiary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Billede</th>
                                <th scope="col">Navn</th>
                                <th scope="col">Sort</th>
                                <th scope="col">Type</th>
                                <th scope="col">Botanisk Navn</th>
                                <th scope="col" class="w-50">Beskrivelse</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($plants as $value) {  // FIXME Styling
                                ?>
                            <tr>
                                <td scope="row">
                                    <?php echo $value['PID'] ?>
                                </td>
                                <td><img class="img-fluid" src='img/<?php echo $value['PImg'] ?>'></td>
                                <td>
                                    <?php echo $value['PName'] ?>
                                </td>
                                <td>
                                    <?php echo $value['PSort'] ?>
                                </td>
                                <td>
                                    <?php echo $value['PType'] ?>
                                </td>
                                <td>
                                    <?php echo $value['PBotName'] ?>
                                </td>
                                <td class="">
                                    <?php echo substr($value['PDesc'], 0, 300) ?>... (<a href="plant.php?id=<?php echo $value['PID']?>">Læs Mere</a>)
                                </td>
                            </tr>
                            <?php
                                }
                                ?>

                        </tbody>
                    </table>
                </div>
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