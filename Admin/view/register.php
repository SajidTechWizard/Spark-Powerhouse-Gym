<?php
include "../control/control_page.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gymnasium Admin Registration Form</title>
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <div class="form">
        <div class="form-container register-container">
            <div class="form">
                <h3 class="title">Gymnasium Admin Registration Form</h3>
                <hr>

                <div>
                    <form method="post" action="">
                        <fieldset>
                            <legend class="info">Personal Information</legend>
                            <table>
                                <tr>
                                    <td><label for="name">Full Name:</label></td>
                                    <td>
                                        <input type="name" name="name" id="name"
                                            value="<?php echo isset($name) ? $name : ''; ?>">
                                        <?php if (!empty($nameError))
                                            echo "<div class='error-message'>$nameError</div>"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="email">Email:</label></td>
                                    <td>
                                        <input type="email" name="email" id="email"
                                            value="<?php echo isset($email) ? $email : ''; ?>">
                                        <?php if (!empty($emailError))
                                            echo "<div class='error-message'>$emailError</div>"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="reg-password">Password:</label></td>
                                    <td>
                                        <input type="password" name="password" id="reg-password"
                                            value="<?php echo isset($password) ? $password : ''; ?>">
                                        <?php if (!empty($passwordError))
                                            echo "<div class='error-message'>$passwordError</div>"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="phone">Phone Number:</label></td>
                                    <td>
                                        <input type="tel" id="phone" name="phone"
                                            value="<?php echo isset($phone) ? $phone : ''; ?>">
                                        <?php if (!empty($phoneError))
                                            echo "<div class='error-message'>$phoneError</div>"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="dob">Date of Birth:</label></td>
                                    <td>
                                        <input type="date" id="dob" name="dob"
                                            value="<?php echo isset($dob) ? $dob : ''; ?>">
                                        <?php if (!empty($dobError))
                                            echo "<div class='error-message'>$dobError</div>"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Gender:</label></td>
                                    <td>
                                        <input type="radio" id="male" name="gender" value="Male" <?php if (isset($gender) && $gender == "Male")
                                            echo "checked"; ?>>
                                        <label class="gen" for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="Female" <?php if (isset($gender) && $gender == "Female")
                                            echo "checked"; ?>>
                                        <label class="gen" for="female">Female</label>
                                        <?php if (!empty($genderError))
                                            echo "<div class='error-message'>$genderError</div>"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="address">Address:</label></td>
                                    <td>
                                        <textarea id="address"
                                            name="address"><?php echo isset($address) ? $address : ''; ?></textarea>
                                        <?php if (!empty($addressError))
                                            echo "<div class='error-message'>$addressError</div>"; ?>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>

                        <div class="form-group">
                            <?php if (!empty($allFieldsError))
                                echo "<div id='all-field' class='err-message'>$allFieldsError</div>"; ?>
                            <input class="button" name="submit" type="submit" value="Register">
                        </div>
                    </form>

                    <div class="already">
                        <p class="already-acc">Already have an account? <a class="login-here" href="login.php">Login
                                here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- <script src="../JS/events.js"></script> -->

</html>