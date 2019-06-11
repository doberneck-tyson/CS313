<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);


$username = $_POST['txtUser'];
$password = $_POST['txtPassword'];
if (!isset($username) || $username == ""
    || !isset($password) || $password == "")
{
    header("Location: signUp.php");
    echo "Something was left blank!";
    die();
}

$username = htmlspecialchars($username);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require("dbConnect.php");
$db = get_db();
$query = 'INSERT INTO StorytimeUser(username, password, display_name) VALUES(:username, :password, :display_name)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);

$statement->bindValue(':password', $hashedPassword);
$statement->execute();

header("Location: signIn.php");
die();
