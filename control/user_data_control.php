<?php
session_start();
include("../model/db.php");

// ✅ Ensure session exists
if (!isset($_SESSION["username"])) {
    echo "<p class='error-msg'>Access denied. Please <a href='user_log.php'>login</a>.</p>";
    exit;
}

$user_name = $_SESSION["username"];
$conn = createConnObj();

// ✅ Fetch user info from DB
$result = getUserByUsername($conn, $user_name);
if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    echo "<h2 class='welcome'>Your Profile, <span class='username-highlight'>{$row['user_name']}</span></h2>";

    // ✅ Profile info & photo in same box
    echo "<div class='user-data-box'>";

    // LEFT SIDE — User Info
    echo "<div>";
    echo "<p><strong>Email:</strong> {$row['email']}</p>";
    echo "<p><strong>Birthday:</strong> " . (!empty($row['birthday']) ? $row['birthday'] : 'Not Provided') . "</p>";
    echo "<p><strong>Gender:</strong> " . ucfirst($row['gender']) . "</p>";
    echo "<p><strong>Phone:</strong> {$row['phone']}</p>";
    echo "<p><strong>Address:</strong> {$row['address']}</p>";
    echo "<p><strong>Membership:</strong> " . ucfirst($row['membership']) . "</p>";
    echo "<p><strong>Trainer:</strong> " . ucfirst($row['trainer']) . "</p>";
    echo "<p><strong>Workout Days:</strong> " . rtrim($row['workout_days'], ',') . "</p>";
    echo "</div>";

    // RIGHT SIDE — Profile Photo
    echo "<div>";
    if (!empty($row['photo'])) {
        echo "<img src='../uploads/{$row['photo']}' alt='Profile Picture'>";
    } else {
        echo "<p>No profile picture uploaded</p>";
    }
    echo "</div>";

    echo "</div>"; // close user-data-box

} else {
    echo "<p class='error-msg'>User not found!</p>";
}

closeConn($conn);
?>
