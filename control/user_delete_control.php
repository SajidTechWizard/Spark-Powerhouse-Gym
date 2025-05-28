<?php
session_start();
include("../model/db.php");

// ✅ Check if session is valid
if (!isset($_SESSION["username"])) {
    echo "<p class='error-msg'>Access denied. Please <a href='user_log.php'>login</a>.</p>";
    exit;
}

$user_name = $_SESSION["username"];
$conn = createConnObj(); // ✅ Open DB connection

// ✅ Delete user using model function
if (deleteUserByUsername($conn, $user_name)) {
    // ✅ Destroy session and cookies
    session_unset();
    session_destroy();
    setcookie("welcomeName", "", time() - 3600, "/");
    setcookie("visited", "", time() - 3600, "/");

    echo "<p class='success-msg'>Your account has been deleted.</p>";
    header("Refresh:2; url=user_log.php");
    exit;
} else {
    echo "<p class='error-msg'>Delete failed: " . mysqli_error($conn) . "</p>";
}

closeConn($conn); // ✅ Close DB connection
?>
