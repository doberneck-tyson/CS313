<?php

require "dbConnect.php";
$db = get_db();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storytime</title>
</head>
<body>

<h1> Storytime</h1>

<?php

$statement = $db->prepare("SELECT post_id, title, content, FROM post");
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    $post_id = $row['post_id'];
    $title = $row['title'];
    $content = $row['title'];

    echo "<p>$ $post_id, $title, $content<p>";
}




?>
</body>
</html>
