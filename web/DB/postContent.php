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
</body>
</html>

<?php

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

//error handling..
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

//posting a comment
if(isset($_POST['comment'])){
    $Query = "INSERT INTO comment(post_comment, comment_id) VALUES ('".$_POST['comment']."',".$_POST['submit'].")";
    $statement = $db->prepare($Query);
    $statement->execute();
}





//Leave a comment box
if(isset($_GET["id"])) {
    echo '<form method="post" action="postContent.php?id='.$_GET['id'].'&post_id='.$_GET['post_id'].'">
<div>
    Post Comment <textarea name="comment" id="comment" rows="3" cols="40"></textarea>

    <button type="submit" name="submit"  value="' . $_GET["post_id"] . '">Submit</button>
    
    <h3><u>Content of the story is below!</u></h3>
</div>

</form>';


//Display content DO NOT CHANGE ANYTHING
$statement = $db->prepare("SELECT content FROM POST WHERE post_id = " .$_GET['post_id']);
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    $content = $row['content'];
    echo "$content";
}
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
echo "<br><br><br><u>Comments</u>";

    $statement = $db->prepare("SELECT post_comment FROM COMMENT WHERE comment_id = " .$_GET['post_id'] );
$statement->execute();

    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $post_comment = $row['post_comment'];

        echo $post_comment;
    }

}


