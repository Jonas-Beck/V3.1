<?php 

// Function to test input for security 
function test_input($data) {
    $data = trim($data);    //TODO Placement
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Use test input on all POST Array items
foreach($_POST as $key => $value){
    $_POST[$key] = test_input($value);
}

?>