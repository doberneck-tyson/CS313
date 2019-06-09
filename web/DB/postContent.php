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
if(isset($_POST['title'])){
    $Query = "INSERT INTO comment(post_comment, comment_id) VALUES ('".$_POST['post_comment']."',".$_POST['submit'].")";
    $statement = $db->prepare($Query);
    $statement->execute();
}


//Display content
$statement = $db->prepare("SELECT content FROM POST WHERE post_id = " .$_GET['post_id']);
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    $content = $row['content'];
    echo "$content";
}




//Leave a comment box
if(isset($_GET["id"])) {
    echo '<form method="post" action="postContent.php?id='.$_GET['id'].'">
<div>
    Post Comment<input type="text" name="submit">
    <button type="submit" name="submit"  value="' . $_GET["id"] . '">Submit</button>
</div>

</form>';
$statement = $db->prepare("SELECT post_comment FROM COMMENT" );
//WHERE comment_id = " .$_GET['id']
$statement->execute();

    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $post_comment = $row['post_comment'];

        echo $post_comment;
    }

}