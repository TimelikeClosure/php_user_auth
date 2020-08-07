<?php

require_once('resource/utilities.php');
include_once('resource/session.php');
include_once('resource/database.php');

if (!empty($_POST['login'])){

}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
    <h2>User Authentication System</h2><hr>

    <h3>Login Form</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="email">Username:</label></td>
                <td><input type="text" value="" id="username" name="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" value="" id="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input style="float: right;" type="submit" value="signin" name="login"></td>
            </tr>
        </table>
    </form>

    <p><a href="index.php">Back</a></p>
</body>
</html>