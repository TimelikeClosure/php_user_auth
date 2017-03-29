
<?php
    require_once('resource/utilities.php');

    if (isset($_POST['signup'])){
        $formErrors = [];

        $requiredFields = ['email', 'username', 'password'];
        $formErrors = emptyFieldErrors($formErrors, $requiredFields);

        $minFieldLengths = ['email' => 6, 'username' => 4, 'password' => 8];
        $formErrors = shortFieldErrors($formErrors, $minFieldLengths);

        $formErrors = validFieldErrors($formErrors);

        if (empty($formErrors)){
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            require_once('./resource/password_encrypt.php');
            $password = passwordEncrypt($password);

            try {

                include_once('resource/database.php');

                $sqlInsert = "INSERT INTO `users` (`username`, `email`, `password`, `join_date`) VALUES (:username, :email, :password, now())";

                $statement = $db->prepare($sqlInsert);
                $statement->execute([
                    ':username' => $username,
                    ':email' => $email,
                    ':password' => $password
                ]);

                if ($statement->rowCount() > 0){
                    $result = '<ul style="padding: 20px; border: 1px solid gray; color: green;">Registration Successful</ul>';
                }

            } catch (PDOException $exception) {
                $result = '<ul style="padding: 20px; border: 1px solid gray; color: red;"><li>'.$exception->getMessage().'</li></ul>';
            }
        } else {
            $result = displayErrors($formErrors);
        }
    }
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Register Page</title>
</head>
<body>
    <h2>User Authentication System</h2><hr>

    <h3>Register Form</h3>
    <?php if(isset($result)){echo $result;}?>
    <form method="post" action="">
        <table>
            <tr><td>Email:</td> <td><input type="email" value="" name="email"></td></tr>
            <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
            <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
            <tr><td></td><td><input style="float: right;" type="submit" name="signup"</td></tr>
        </table>
    </form>

    <p><a href="index.php">Back</a></p>
</body>
</html>