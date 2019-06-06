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

$statement = $db->prepare("SELECT section_name FROM SECTION " .$_GET['id']);
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    echo 'The section name is: ';
    $section_name = $row['section_name'];
    echo "{$section_name}";
}

if(isset($_POST['title'])){
    $Query = "INSERT INTO post(title, content, section_id) VALUES ('".$_POST['title']."','".$_POST['content']."',".$_POST['submit'].")";
    $statement = $db->prepare($Query);
    $statement->execute();
}

if(isset($_GET["id"])) {
    echo '<form method="post" action="nav.php?id='.$_GET['id'].'">

<div>
    
    Title <input type="text" name="title"><br><br>
    Content<input type="text" name="content">
    <button type="submit" name="submit" value="' . $_GET["id"] . '">Submit</button>
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


