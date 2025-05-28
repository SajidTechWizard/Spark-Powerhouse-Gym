<?php
include("../model/db.php");

$userNameError = $emailError = $passwordError = $phoneError = "";
$uploadError = "";
$hasError = 0;

if (isset($_POST["Submit"])) {
    $conn = createConnObj(); // ✅ Connect to DB

    // === VALIDATE USERNAME ===
    if (empty($_POST["user_name"])) {
        $userNameError = "Username is required";
        $hasError = 1;
    } else {
        $user_name = $_POST["user_name"];
        if (!preg_match("/^[A-Z][a-z]+(\s[A-Z][a-z]+)*$/", $user_name)) {
            $userNameError = "Each word must start with a capital letter";
            $hasError = 1;
        } else {
            // ✅ Check if username already exists
            $checkUsername = getUserByUsername($conn, $user_name);
            if ($checkUsername && mysqli_num_rows($checkUsername) > 0) {
                $userNameError = "Username already taken!";
                $hasError = 1;
            }
        }
    }

    // === VALIDATE EMAIL ===
    if (empty($_POST["email"])) {
        $emailError = "Email is required";
        $hasError = 1;
    } else {
        $email = $_POST["email"];
        if (!preg_match("/^[a-z0-9._-]+@(gmail|yahoo|hotmail)+\.[a-z]{3}$/", $email)) {
            $emailError = "Invalid email format";
            $hasError = 1;
        } else {
            // ✅ Check if email already exists
            $checkEmail = getUserByEmail($conn, $email);
            if ($checkEmail && mysqli_num_rows($checkEmail) > 0) {
                $emailError = "Email already registered!";
                $hasError = 1;
            }
        }
    }

    // === VALIDATE PASSWORD ===
    if (empty($_POST["password"])) {
        $passwordError = "Password is required";
        $hasError = 1;
    } elseif (strlen($_POST["password"]) <= 6) {
        $passwordError = "Password must be more than 6 characters";
        $hasError = 1;
    } else {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // ✅ Use hash
    }

    // === VALIDATE PHONE ===
    if (empty($_POST["phone"])) {
        $phoneError = "Phone number is required";
        $hasError = 1;
    } else {
        $phone = $_POST["phone"];
        if (!preg_match("/^(013|014|015|016|017|018|019)[0-9]{8}$/", $phone)) {
            $phoneError = "Phone number must be 11 digits";
            $hasError = 1;
        }
    }

    // === HANDLE OTHER FIELDS ===
    $gender     = $_POST["gender"] ?? "";
    $address    = $_POST["address"] ?? ""; // ✅ corrected field name
    $membership = $_POST["membership"] ?? "";
    $trainer    = $_POST["trainer"] ?? "no";
    $birthday   = $_POST["Date_of_Birth"] ?? "";

    // === COLLECT CHECKBOX WORKOUT DAYS ===
    $days = "";
    foreach (["saturday", "sunday", "monday", "tuesday", "wednesday", "thursday", "friday"] as $day) {
        if (isset($_POST[$day])) {
            $days .= $_POST[$day] . ",";
        }
    }

    // === FILE UPLOAD (PHOTO) ===
    $photo = "";
    if ($_FILES["photo"]["error"] == 0) {
        $photoName = time() . "_" . basename($_FILES["photo"]["name"]);
        $uploadPath = "../uploads/" . $photoName;
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath)) {
            $photo = $photoName;
        } else {
            $uploadError = "❌ Failed to upload photo";
            $hasError = 1;
        }
    }

    // === INSERT INTO DATABASE ===
    if ($hasError == 0) {
        if (insertUser($conn, $user_name, $email, $password, $birthday, $gender, $address, $phone, $membership, $trainer, $days, $photo)) {
            closeConn($conn);
            header("Location: user_log.php");
            exit();
        } else {
            $uploadError = "❌ " . mysqli_error($conn);
        }
    }

    closeConn($conn);
}
?>
