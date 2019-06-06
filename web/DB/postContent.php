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

if(isset($_POST['title'])){
    $Query = "INSERT INTO post(title, content, section_id) VALUES ('".$_POST['title']."','".$_POST['content']."',".$_POST['submit'].")";
    $statement = $db->prepare($Query);
    $statement->execute();
}//change this to insert into comment table.
//run query that runs post content SELECT CONTENT FROM POST WHERE POST_ID = $_GET[POST_ID]
//ECHO THE CONTENT AT TOP

//$Query = ("SELECT CONTENT FROM POST WHERE POST_ID =" .$_GET['POST_ID']);
//$statement->execute();
//
//while($row = $statement->fetch(PDO::FETCH_ASSOC))
//{
//    $content = $row['content'];
//
//    echo "{content}";
//
//}


if(isset($_GET["id"])) {
    echo '<form method="post" action="postContent.php?id='.$_GET['id'].'&post_id='.$_GET['post_id'].'">
<div>
    <input type="text" placeholder="Leave a comment" name="content">
    <button type="submit" name="submit"  value="' . $_GET["post_id"] . '">Submit</button>
</div>

</form>';

$statement = $db->prepare("SELECT post_comment FROM COMMENT WHERE postcom = " .$_GET['post_id']);
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    $content = $row['post_comment'];
    echo $content;
}

}