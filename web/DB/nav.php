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

if(isset($_GET["id"])) {
    echo '<form method="post" action="nav.php?id='.$_GET['id'].'">
<div>

    Title <input type="text" name="title"><br><br>
    Content<input type="text" name="content">
    <button type="submit" name="submit" value="' . $_GET["id"] . '">Submit</button>
</div>

</form>';
    $statement = $db->prepare("SELECT title, content FROM POST WHERE section_id = " .$_GET['id']);
    $statement->execute();

    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $title = $row['title'];
        $content = $row['content'];

        echo "<p>$title $content<p>";
    }

}
