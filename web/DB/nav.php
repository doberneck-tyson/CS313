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

//initiates query
if(isset($_POST['title'])){
    $Query = "INSERT INTO post(title, content, section_id) VALUES ('".$_POST['title']."','".$_POST['content']."',".$_POST['submit'].")";
    $statement = $db->prepare($Query);
    $statement->execute();
}


//Welcome statement
$statement = $db->prepare("SELECT section_name FROM SECTION WHERE section_id = " .$_GET['id']);
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    $section_name = $row['section_name'];

    echo "<strong>$section_name</strong>";
    echo " <strong>Category:</strong> Feel free to post any stories relating to the " . $section_name . " genre";
}


//All of the buttons
if(isset($_GET["id"])) {
    echo '<form method="post" action="nav.php?id='.$_GET['id'].'">
    <div>
    <br><br>
        Title <br><input type="text" name="title"><br><br>
        Content<br><textarea rows="5" cols="50" name="content"></textarea>
        <button type="submit" name="submit" value="' . $_GET["id"] . '">Submit</button><br><br>
        <h3>Click on the titles below to read stories in this category!</h3>
    </div>
</form>';
    $statement = $db->prepare("SELECT title, content, post_id FROM POST WHERE section_id = " .$_GET['id']);
    $statement->execute();

    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $title = $row['title'];
        $content = $row['content'];
        $post_id = $row['post_id'];

        echo "<p><a href='postContent.php?id=".$_GET['id']."&post_id=".$post_id."'> $title</a><p>";
        if(isset($_GET['post_id'])&& $_GET['post_id']== $post_id){
            echo "it worked";
        }
    }

}


