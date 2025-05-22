<?php


$name = $email = $password = $phone = $dob = $gender = $address = "";
$nameError = $emailError = $passwordError = $phoneError = $dobError = $genderError = $addressError = "";
$allFieldsError = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){

if (isset($_POST['submit'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? ''; 
    $address = $_POST['address'] ?? '';

    $allEmpty = empty($name) && empty($email) && empty($password) && 
               empty($phone) && empty($dob) && empty($gender) && empty($address);
    
    if ($allEmpty) {
        $allFieldsError = "All fields are required!";
    } else {
        if (empty($name)) $nameError = "Please enter your name";
        if (empty($email)) $emailError = "Please enter your email";
        if (empty($password)) $passwordError = "Please enter your password";
        if (empty($phone)) $phoneError = "Please enter your phone number";
        if (empty($dob)) $dobError = "Please enter your date of birth";
        if (empty($gender)) $genderError = "Please select your gender";
        if (empty($address)) $addressError = "Please enter your address";
    }

    if (!$allEmpty && empty($nameError) && empty($emailError) && empty($passwordError) && 
        empty($phoneError) && empty($dobError) && empty($genderError) && empty($addressError)) {
        echo "<h2>Submitted Data:</h2>";
        echo "Name: $name<br>Email: $email<br>DOB: $dob<br>Gender: $gender<br>Phone: $phone<br>";
        exit;
    }
}
}



?>