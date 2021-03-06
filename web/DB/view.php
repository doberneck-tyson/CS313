<?php

session_start();
if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
}
else
{
    header("Location: signIn.php");
    die();
}


try
{
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);
    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}

if(isset($_POST['title'])){
    $Query = "INSERT INTO post(title, content, section_id) VALUES ('".$_POST['title']."','".$_POST['content']."',".$_POST['submit'].")";
    $statement = $db->prepare($Query);
    $statement->execute();
}
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Storytime</title>
</head>
<body>
<br>
<h1> <u>Storytime</u></h1>
<h3><u>A place for story tellers to tell their tales.</u></h3><br>
Your username is: <?= $username ?><br /><br />



<?php


$statement = $db->prepare("SELECT section_id, section_name, section_description FROM SECTION ");
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    $section_id = $row['section_id'];
    $section_name = $row['section_name'];
    $section_description = $row['section_description'];

    echo "<p><a href='nav.php?id=". $section_id."'> {$section_name}</a>, {$section_description}<p>";
}


?>

</body>
</html>
