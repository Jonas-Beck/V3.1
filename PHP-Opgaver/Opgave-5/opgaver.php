<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opgaver</title>
    <style>
        article{
            display: flex;
            width: 50%;
            justify-content: space-between;
        }
        section{
            display: flex;
            flex-wrap: wrap;
            
        }
        section > h1{
            width: 100%;
        }
        section > div{
            width: 25%;
        }
    </style>
</head>
<body>
    <?php 
    // Opgave 2
    $elever = ["marius", "nikolai", "nikolaj", "rasmus", "laurits", "jonas"];
    $find = "marius";

    function findElev($find, $elever){
        foreach($elever as $key=>$item) {
            if ($item == $find) {
                return $key;
            }
        }
        return false;
    }

    $result = findElev($find, $elever);

    if ($result !== false) { 
        echo "<p>".ucfirst($find)." Findes i arrayet på plads ".$result."</p>";
    }
    else {
        echo "<p>".ucfirst($find)." Findes ikke i arrayet!!"."</p>";
    }

    //Opgave 3
    $result2 = array_search($find, $elever);

    if ($result2 !== false) {
        echo "<p>".ucfirst($find)." Findes i arrayet på plads ".$result2."</p>";
    }
    else {
        echo "<p>".ucfirst($find)." Findes ikke i arrayet!!"."</p>";
    }
    
    // Opgave 4
    $måneder = array(
        "januar" => "31",
        "februar" => "28",
        "marts" => "31",
        "april" => "30",
        "maj" => "31",
        "juni" => "30",
        "juli" => "31",
        "august" => "31",
        "september" => "30",
        "oktober" => "31",
        "november" => "30",
        "december" => "31"
    );
    ?>
    <article>
        <div>
            <h2>Korte Måneder</h2>
            <?php
                foreach ($måneder as $key => $value) {
                    if ($value != 31) {
                        echo "<p>".$key.": ".$value."</p>";
                    }
                }
            ?>
        </div>
        <div>
            <h2>Korte Måneder</h2>
            <?php
                foreach ($måneder as $key => $value) {
                    if ($value == 31) {
                        echo "<p>".$key.": ".$value."</p>";
                    }
                }
            ?>
        </div>
    </article>
    <section>
        <h1> AspIT Lærer</h1>
        <?php 
        // Opgave 5
        
        $laerer = array(
            array(
                "Fornavn" => "Hanne",
                "Efternavn" => "Lund",
                "Fag" => "Visualisering"
            ),
            array(
                "Fornavn" => "Jens",
                "Efternavn" => "Clausen",
                "Fag" => "Softwarekonstruktion"
            ),
            array(
                "Fornavn" => "Ronni",
                "Efternavn" => "Hansen",
                "Fag" => "Teknink"
            ),
            array(
                "Fornavn" => "Ulf",
                "Efternavn" => "Skaaning",
                "Fag" => "AspIT-Lab"
            )
        );

        foreach($laerer as $value){
            echo "<div>";
            foreach($value as $key => $item){
                echo "<p>".$key." ".$item."</p>";
            };
            echo "</div>";
        };

        ?>
    </section>
    

</body>
</html>