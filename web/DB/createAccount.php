<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);


$username = $_POST['txtUser'];
$password = $_POST['txtPassword'];
if (!isset($username) || $username == ""
    || !isset($password) || $password == ""
    || !isset($display_name) || $display_name == "")
{
    header("Location: signUp.php");
    echo "Something was left blank!";
    die();
}

$username = htmlspecialchars($username);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$display_name = htmlspecialchars($display_name);

require("dbConnect.php");
$db = get_db();
$query = 'INSERT INTO StorytimeUser(username, password, display_name) VALUES(:username, :password, :display_name)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);

$statement->bindValue(':password', $hashedPassword);
$statement->execute();

$statement->bindValue(':display_name', $display_name);
$statement->execute();

header("Location: signIn.php");
die();
