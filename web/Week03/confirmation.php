f<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm | Tyson's Retro Supply</title>
    <link rel="stylesheet" type="text/css" href="shoppingCart.css"/>
</head>
<body>
<header id="bHeader">
    <h1>Purchase Confirmation</h1>
</header>
<br/><br/>
<div class="itemView">
    <?php
    session_start();
    if(isset($_SESSION["item"])) {
        foreach($_SESSION['item'] as $value) {
            echo "<h2>$value</h2>" . "<br/>";
        }
    }
    ?>
    <?php
    $address = "";
    if(isset($_SESSION['address'])) {
        $address = $_SESSION['address'];
        echo "<h2>Shipped to:</h2>" . "<br/>";
        echo "<h2>$address</h2>" . "<br/>";
        echo "<h2>Thank you for shopping with us!</h2>";
    }
    ?>
</div>
<br/>
<div class="flex">
    <button onclick='window.location.href="browseItems.php"' type="button" class="flex-child">Go back to browse page</button>
</div>
</body>
</html>