<?php


require("password.php"); // used for password hashing.
session_start();
$badLogin = false;

if (isset($_POST['txtUser']) && isset($_POST['txtPassword']))
{
    $username = $_POST['txtUser'];
    $password = $_POST['txtPassword'];
    // Connect to the DB
    require("dbConnect.php");
    $db = get_db();
    $query = 'SELECT password FROM StorytimeUser WHERE username=:username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $result = $statement->execute();
    if ($result)
    {
        $row = $statement->fetch();
        $hashedPasswordFromDB = $row['password'];
        if (password_verify($password, $hashedPasswordFromDB))
        {
            $_SESSION['username'] = $username;
            header("Location: view.php");
            die(); //
        }
        else
        {
            $badLogin = true;
        }
    }
    else
    {
        $badLogin = true;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
</head>

<body>
<div>

    <?php
    if ($badLogin)
    {
        echo "Incorrect username or password!<br /><br />\n";
    }
    ?>

    <h1>Please sign in below:</h1>

    <form id="mainForm" action="signIn.php" method="POST">

        <input type="text" id="txtUser" name="txtUser" placeholder="Username">
        <label for="txtUser">Username</label>
        <br /><br />

        <input type="password" id="txtPassword" name="txtPassword" placeholder="Password">
        <label for="txtPassword">Password</label>
        <br /><br />

        <input type="submit" value="Sign In" />

    </form>

    <br /><br />

    Or <a href="signUp.php">Sign up</a> for a new account.

</div>

</body>
</html>