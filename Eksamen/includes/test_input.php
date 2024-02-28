<?php 
// Function to test input for security 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Use test input on all POST Array items
foreach($_POST as $key => $value){

    if (!is_array($value)) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);

        $_POST[$key] = $value;
    }
}

?>