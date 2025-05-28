<?php
session_start();
include("../model/db.php");

$error = "";

if (isset($_REQUEST["login"])) {
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    $conn = createConnObj(); // ✅ Open DB connection
    $result = getUserByEmail($conn, $email); // ✅ Model function

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // ✅ Plain-text password match (as per project level)
        if ($row["password"] == $password) {
            $_SESSION["username"] = $row["user_name"];
            setcookie("welcomeName", $row["user_name"], time() + 3600, "/");
            closeConn($conn);
            header("Location: user_home.php");
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }

    closeConn($conn); // ✅ Close DB connection
}

// ✅ No echo here — $error will be used by view
?>
