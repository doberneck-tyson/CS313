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

//$statement = $db->prepare("SELECT section_id, section_name, section_description FROM Section");
//$statement->execute();
//
//while($row = $statement->fetch(PDO::FETCH_ASSOC))
//{
//    $section_id = $row['section_id'];
//    $section_name = $row['section_name'];
//    $section_description = $row['section_description'];
//
//    echo "<p>{$section_id}, {$section_name}, {$section_description}<p>";
//}


foreach($db->query('SELECT section_id, section_name, section_description FROM Section')as $row){
    $section_id = $row['section_id'];
    $section_name = $row['section_name'];
    $section_description = $row['section_description'];

    echo "<p>{$section_id}, {$section_name}, {$section_description}<p>";
}
?>
</body>
</html>
