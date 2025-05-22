<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        <h1 class="admin_login">Admin Login</h1>
        <form action="profile.php" method="post">
            <table>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input class="email-box" type="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name="password"></td>
                </tr>
                <t>
                    <td colspan="2" style="text-align: center;">
                        <input class="button" name="submit" type="submit" value="Login">
                    </td>
                </t>
            </table>
        </form>
        <p class="reg">Don't have an account? <a href="../view/register.php">Register</a></p>
        <p> <a href="../view/homepage.php">Go to our homepage</a></p>
    </div>
</body>

</html>