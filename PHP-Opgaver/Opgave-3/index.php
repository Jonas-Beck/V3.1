<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        // A
        $string = "the quick brown fox jumped over the lazy dog";
        // B
        echo "<p>".strtoupper($string)."</p>"; // Upper Case
        // C
        echo "<p>".ucfirst($string)."</p>"; //First letter Uppercase
        // D
        echo "<p>".ucwords($string)."</p>"; //First letter each word Uppercase

        // E
        if (strpos($string, "fox") == false) { // Returns false if word isnt in selected string
           echo "<p>Ordet findes ikke i strengen</p>";
        }
        else {
            echo "<p>Order findes i strengen</p>";
        }

        // F
        $email = "halu@aspit.dk";
        echo "<p>".substr($email, 0, strpos($email, "@"))."</p>"; // Returns substring from email with length of "@" strpos value 

        // G
        function createPassword($length){
            $temp = ""; // Temp variable for password
            $charArray = str_split("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"); // Array with all char useable for password
            for ($x = 0; $x < $length; $x++) { // Loop x amount of times based on $length value
                shuffle($charArray); // Shuffle array 
                $temp .= $charArray[0]; // add first char to $temp
            }
            
            echo "<p>$temp</p>";  // Print password
        }

        createPassword(5);

        // H
        function checkPalindrom($word){
            if ($word == strrev($word)) {
               echo "<p>Ordet er et palindrom</p>";
            }
            else {
                echo "<p>Ordet er ikke et palindrom</p>";
            }
        }

        checkPalindrom("PHP");
        ?>
</body>
</html>