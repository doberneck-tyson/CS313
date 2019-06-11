<?php

// If you have an earlier version of PHP (earlier than 5.5)
// You need to download and include password.php.
//require("password.php");

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);


$username = $_POST['txtUser'];
$password = $_POST['txtPassword'];
if (!isset($username) || $username == ""
    || !isset($password) || $password == "")
{
    header("Location: signUp.php");
    die();
}

$username = htmlspecialchars($username);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require("dbConnect.php");
$db = get_db();
$query = 'INSERT INTO StorytimeUser(username, password) VALUES(:username, :password)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);

$statement->bindValue(':password', $hashedPassword);
$statement->execute();
// finally, redirect them to the sign in page
header("Location: signIn.php");
die();
?>