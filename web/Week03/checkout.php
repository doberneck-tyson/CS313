<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Tyson's Retro Supply</title>
    <link rel="stylesheet" type="text/css" href="shoppingCart.css"/>
</head>
<body>
<header id="bHeader">
    <h1>Checkout</h1>
</header>
<br/><br/>
<div class="itemView">
    <?php
    session_start();
    if(isset($_SESSION["item"])) {
        foreach($_SESSION['item'] as $value) {
            echo "<h2>$value</h2>" . "<br/>";
        }
        echo "<h3>Please enter your address:" . "<br/>";
    }
    ?>
    <?php
    $address = "";
    if(isset($_POST['address'])) {
        $_SESSION['address'] = $_POST['address'];
    }
    ?>
    <br/>
    <form action="checkout.php" method="post">
        <textarea name="address" id="address" rows="3" cols="40"placeholder="street, city, state, zip &#10;Apartment #, PO box"></textarea>
        <br/>
        <input type="submit" value="Save address"/>
    </form>
</div>
<br/><br/>
<div class="flex">
    <button onclick='window.location.href="browseItems.php"' type="button" class="flex-child">Go back to browse page</button>
    <button onclick='window.location.href="confirmation.php"' type="button" class="flex-child">Complete Purchase</button>
</div>
</body>
</html>