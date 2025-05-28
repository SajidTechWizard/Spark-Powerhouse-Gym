<?php
session_start();
include("../model/db.php");

// ✅ Ensure the user is logged in
if (!isset($_SESSION["username"])) {
    echo "<p class='error-msg'>Access denied. Please <a href='user_log.php'>login</a>.</p>";
    exit;
}

$user_name = $_SESSION["username"];
$updateMsg = "";

$conn = createConnObj(); // ✅ Connect to DB

// ✅ Get existing user info to populate the form
$result = getUserByUsername($conn, $user_name);
$row = mysqli_fetch_assoc($result);

// ✅ If the form is submitted
if (isset($_POST["update"])) {
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $membership = $_POST["membership"];
    $newPhoto = ""; // will hold new uploaded file name if present

    // ✅ Check if new profile picture is uploaded
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $target_dir = "../uploads/";
        $newPhoto = time() . "_" . basename($_FILES["photo"]["name"]);
        $target_file = $target_dir . $newPhoto;

        // ✅ Save file to uploads/
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $row["photo"] = $newPhoto; // ✅ Show new photo in form
        } else {
            $updateMsg = "Photo upload failed.";
        }
    }

    // ✅ Call DB function to update (with photo if uploaded)
    if (updateUserProfile($conn, $user_name, $phone, $address, $membership, $newPhoto != "" ? $newPhoto : null);) {
        $updateMsg = "Updated successfully!";

        // ✅ Reload updated info
        $result = getUserByUsername($conn, $user_name);
        $row = mysqli_fetch_assoc($result);
    } else {
        $updateMsg = "Update failed.";
    }
}

closeConn($conn); // ✅ Close connection
?>
