<?php
if(isset($_GET["id"])) {
    echo '<form method="post" action="nav.php">
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
